#!/usr/bin/env node
/**
 * Socket.IO polling load test — mirrors m/event_full_market.php client config.
 * Usage: node socket-load-test.js [clients] [durationSec] [marketId]
 * Example: node socket-load-test.js 50 30 4737401464863
 */

const { io } = require('socket.io-client');

const SOCKET_URL = process.env.SOCKET_URL || 'https://saffronexch247.com:8443/';
const CLIENTS = parseInt(process.argv[2] || process.env.CLIENTS || '10', 10);
const DURATION_SEC = parseInt(process.argv[3] || process.env.DURATION_SEC || '30', 10);
const MARKET_ID = process.argv[4] || process.env.MARKET_ID || '4737401464863';
const LOG_PATH = process.env.LOG_PATH || '/home/saffron/public_html/.cursor/debug-d61eaa.log';
const RAMP_MS = parseInt(process.env.RAMP_MS || '50', 10);

const stats = {
  runId: `load-${CLIENTS}c-${Date.now()}`,
  targetClients: CLIENTS,
  durationSec: DURATION_SEC,
  marketId: MARKET_ID,
  socketUrl: SOCKET_URL,
  connected: 0,
  connectErrors: 0,
  engineErrors: 0,
  disconnects: 0,
  getOddDataEmitted: 0,
  connectTimesMs: [],
  errorMessages: {},
  sids: new Set(),
  startTime: Date.now(),
};

const sockets = [];

function logEvent(message, data) {
  const line = JSON.stringify({
    sessionId: 'd61eaa',
    runId: stats.runId,
    hypothesisId: 'K',
    location: 'tools/socket-load-test.js',
    message,
    data: Object.assign({ elapsedSec: +((Date.now() - stats.startTime) / 1000).toFixed(1) }, data || {}),
    timestamp: Date.now(),
  });
  try {
    require('fs').appendFileSync(LOG_PATH, line + '\n');
  } catch (e) {}
}

function pct(arr, p) {
  if (!arr.length) return 0;
  const s = [...arr].sort((a, b) => a - b);
  return s[Math.min(s.length - 1, Math.floor((p / 100) * s.length))];
}

function connectClient(index) {
  return new Promise((resolve) => {
    const t0 = Date.now();
    const socket = io(SOCKET_URL, {
      transports: ['polling'],
      upgrade: false,
      forceNew: true,
      timeout: 15000,
      reconnection: false,
    });

    const done = (result) => {
      resolve(result);
    };

    const failTimer = setTimeout(() => {
      stats.connectErrors++;
      const err = 'connect timeout 15s';
      stats.errorMessages[err] = (stats.errorMessages[err] || 0) + 1;
      logEvent('client connect timeout', { index, ms: Date.now() - t0 });
      try { socket.close(); } catch (e) {}
      done({ index, ok: false });
    }, 15000);

    socket.io.engine.on('error', (err) => {
      stats.engineErrors++;
      const msg = String(err && err.message ? err.message : err);
      stats.errorMessages[msg] = (stats.errorMessages[msg] || 0) + 1;
    });

    socket.on('connect_error', (err) => {
      stats.connectErrors++;
      const msg = String(err && err.message ? err.message : err);
      stats.errorMessages[msg] = (stats.errorMessages[msg] || 0) + 1;
      clearTimeout(failTimer);
      logEvent('connect_error', { index, msg, ms: Date.now() - t0 });
      done({ index, ok: false });
    });

    socket.on('disconnect', () => {
      stats.disconnects++;
    });

    socket.on('connect', () => {
      clearTimeout(failTimer);
      const ms = Date.now() - t0;
      stats.connected++;
      stats.connectTimesMs.push(ms);
      const sid = socket.io && socket.io.engine ? socket.io.engine.id : null;
      if (sid) stats.sids.add(sid);
      socket.emit('getOddData', { eventId: String(MARKET_ID) });
      stats.getOddDataEmitted++;
      done({ index, ok: true, ms, sid });
    });

    sockets.push(socket);
  });
}

async function rampUp() {
  logEvent('load test start', {
    clients: CLIENTS,
    durationSec: DURATION_SEC,
    marketId: MARKET_ID,
    transport: 'polling',
  });

  const results = [];
  for (let i = 0; i < CLIENTS; i++) {
    results.push(connectClient(i));
    if (RAMP_MS > 0) await new Promise((r) => setTimeout(r, RAMP_MS));
  }
  await Promise.all(results);

  logEvent('ramp up complete', {
    connected: stats.connected,
    connectErrors: stats.connectErrors,
    uniqueSids: stats.sids.size,
    connectP50: pct(stats.connectTimesMs, 50),
    connectP95: pct(stats.connectTimesMs, 95),
    connectMax: stats.connectTimesMs.length ? Math.max(...stats.connectTimesMs) : 0,
  });
}

function holdOpen() {
  return new Promise((r) => setTimeout(r, DURATION_SEC * 1000));
}

function shutdown() {
  for (const s of sockets) {
    try {
      s.io.opts.reconnection = false;
      if (s.io && s.io.engine) s.io.engine.close();
      s.close();
    } catch (e) {}
  }
}

async function main() {
  console.log(`Socket load test: ${CLIENTS} clients, ${DURATION_SEC}s hold, market ${MARKET_ID}`);
  console.log(`URL: ${SOCKET_URL} (polling only)`);

  await rampUp();

  console.log(`Connected: ${stats.connected}/${CLIENTS}, errors: ${stats.connectErrors}, unique sids: ${stats.sids.size}`);
  if (stats.connectTimesMs.length) {
    console.log(`Connect ms — p50: ${pct(stats.connectTimesMs, 50)}, p95: ${pct(stats.connectTimesMs, 95)}, max: ${Math.max(...stats.connectTimesMs)}`);
  }

  console.log(`Holding ${DURATION_SEC}s (simulating active match viewers)...`);
  await holdOpen();

  shutdown();

  const summary = {
    connected: stats.connected,
    failed: CLIENTS - stats.connected,
    connectErrors: stats.connectErrors,
    engineErrors: stats.engineErrors,
    disconnects: stats.disconnects,
    uniqueSids: stats.sids.size,
    getOddDataEmitted: stats.getOddDataEmitted,
    connectP50: pct(stats.connectTimesMs, 50),
    connectP95: pct(stats.connectTimesMs, 95),
    connectMax: stats.connectTimesMs.length ? Math.max(...stats.connectTimesMs) : 0,
    topErrors: stats.errorMessages,
  };

  logEvent('load test complete', summary);
  console.log('\n=== SUMMARY ===');
  console.log(JSON.stringify(summary, null, 2));
}

main().catch((err) => {
  logEvent('load test fatal', { error: String(err) });
  console.error(err);
  process.exit(1);
});
