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
<script type="0bd6eebcc54f441fedf66bc1-text/javascript">
    var platform = '';
    var ismobile = 'False' == "True" ? true : false;
    var tvData = {};
    Object.defineProperty(tvData, 'ssl', {
    value: '' == "True" ? true : false,
            writable : false,
            enumerable : true,
            configurable : false
          });

    Object.defineProperty(tvData, 'camstring', {
    value: '',
            writable: false,
            enumerable: true,
            configurable: false
        });

    Object.defineProperty(tvData, 'IP', {
    value: '',
            writable: false,
            enumerable: true,
            configurable: false
        });

    Object.defineProperty(tvData, 'port', {
    value: parseInt(),
            writable : false,
            enumerable : true,
            configurable : false
          });

    Object.defineProperty(tvData, 'ptype', {
    value: '',
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
<img src="/Images/lock.jpg" style="width:100%;" />
</div>
<script src="/videoplayer/urplayer/js/player.js" type="0bd6eebcc54f441fedf66bc1-text/javascript"></script>
<script src="/videoplayer/urplayer/js/gameplayer.js" type="0bd6eebcc54f441fedf66bc1-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="0bd6eebcc54f441fedf66bc1-|49" defer=""></script></body>
</html>
