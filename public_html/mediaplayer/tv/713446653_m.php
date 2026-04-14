<?php
	header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Game Player</title>
<link href="/videoplayer/urplayer/css/v1-mobile.css" rel="stylesheet" />
<script type="b684fab48291d164f5be8986-text/javascript">
    var platform = 'Android';
    var ismobile = 'True' == "True" ? true : false;
    var tvData = {};
    Object.defineProperty(tvData, 'ssl', {
    value: 'True' == "True" ? true : false,
            writable : false,
            enumerable : true,
            configurable : false
          });

    Object.defineProperty(tvData, 'camstring', {
    value: 'HDMI36',
            writable: false,
            enumerable: true,
            configurable: false
        });

    Object.defineProperty(tvData, 'IP', {
    value: 'www.livesports1611.com',
            writable: false,
            enumerable: true,
            configurable: false
        });

    Object.defineProperty(tvData, 'port', {
    value: parseInt(443),
            writable : false,
            enumerable : true,
            configurable : false
          });

    Object.defineProperty(tvData, 'ptype', {
    value: 'TCP',
            writable: false,
            enumerable: true,
            configurable: false
        });
    </script>
<style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        html {
            overflow: hidden;
        }

        #p1 {
            width: 100%;
            height: 100%;
        }

        .p1_fullscreen {
            display: none !important;
        }
    </style>
</head>
<body>
<div class="container body-content">
<div id="p1" class="playButton"> <button onclick="if (!window.__cfRLUnblockHandlers) return false; playPlayback()" data-cf-modified-b684fab48291d164f5be8986-=""></button></div>
</div>
<script src="/videoplayer/urplayer/js/player.js" type="b684fab48291d164f5be8986-text/javascript"></script>
<script src="/videoplayer/urplayer/js/gameplayer.js" type="b684fab48291d164f5be8986-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="b684fab48291d164f5be8986-|49" defer=""></script></body>
</html>
