#!/usr/bin/env node
/** Compare websocket vs polling connect time and stability */
const { io } = require('socket.io-client');

const URL = process.env.SOCKET_URL || 'https://saffronexch247.com:8443/';
const CLIENTS = parseInt(process.argv[2] || '20', 10);
const LOG_PATH = process.env.LOG_PATH || '/home/saffron/public_html/.cursor/debug-d61eaa.log';

async function testTransport(transport, label) {
  const stats = { connected: 0, errors: 0, times: [], transports: new Set() };
  const sockets = [];

  await Promise.all(Array.from({ length: CLIENTS }, (_, i) => new Promise((resolve) => {
    const t0 = Date.now();
    const opts = {
      transports: [transport],
      forceNew: true,
      timeout: 15000,
      reconnection: false,
    };
    if (transport === 'polling') opts.upgrade = false;

    const s = io(URL, opts);
    sockets.push(s);
    const timer = setTimeout(() => { stats.errors++; s.close(); resolve(); }, 15000);
    s.on('connect_error', () => { clearTimeout(timer); stats.errors++; resolve(); });
    s.on('connect', () => {
      clearTimeout(timer);
      stats.connected++;
      stats.times.push(Date.now() - t0);
      const t = s.io.engine.transport ? s.io.engine.transport.name : transport;
      stats.transports.add(t);
      resolve();
    });
  })));

  for (const s of sockets) { try { s.close(); } catch (e) {} }

  const sorted = [...stats.times].sort((a, b) => a - b);
  const p50 = sorted[Math.floor(sorted.length * 0.5)] || 0;
  const p95 = sorted[Math.floor(sorted.length * 0.95)] || 0;
  const result = { label, transport, connected: stats.connected, errors: stats.errors, p50, p95, max: sorted[sorted.length - 1] || 0, actual: [...stats.transports] };

  require('fs').appendFileSync(LOG_PATH, JSON.stringify({
    sessionId: 'd61eaa', runId: 'transport-ab', hypothesisId: 'L',
    location: 'tools/socket-transport-test.js', message: 'transport compare',
    data: result, timestamp: Date.now(),
  }) + '\n');

  return result;
}

(async () => {
  console.log(`Transport A/B: ${CLIENTS} clients → ${URL}\n`);
  const polling = await testTransport('polling', 'polling-only');
  console.log('POLLING:', polling);
  await new Promise((r) => setTimeout(r, 2000));
  const ws = await testTransport('websocket', 'websocket-only');
  console.log('WEBSOCKET:', ws);
  console.log('\nWinner (lower p50):', polling.p50 <= ws.p50 ? 'polling' : 'websocket');
})();
