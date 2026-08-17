<?php
	header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Game Player</title>
<link href="/videoplayer/urplayer/css/v1.css" rel="stylesheet" />
<script type="b79ef59896c9e0cc8a8a9a7a-text/javascript">
    var platform = 'Microsoft Windows';
    var ismobile = 'False' == "True" ? true : false;
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
    value: 'www.livesports1511.com',
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
<HTML5VideoPlayer id="p1"></HTML5VideoPlayer>
</div>
<script src="/videoplayer/urplayer/js/player.js" type="b79ef59896c9e0cc8a8a9a7a-text/javascript"></script>
<script src="/videoplayer/urplayer/js/gameplayer.js" type="b79ef59896c9e0cc8a8a9a7a-text/javascript"></script>
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="b79ef59896c9e0cc8a8a9a7a-|49" defer=""></script></body>
</html>
