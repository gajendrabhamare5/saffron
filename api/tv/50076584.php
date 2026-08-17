<?php
	header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Game Player</title>
<style type="text/css">
        body {
            margin: 0;
            padding: 0;
            text-align: center;
        }

        iframe {
            max-width: 400px;
            width: 100%;
            height: calc(100vh - 5px);
            border: 0;
            background: #333;
            margin: 0;
            padding: 0;
        }
        /*video{
            width: 100%;
            height: 100%;
        }
        .video-js {
                width: 100vw;
                height: 100vh;
        }
        .vjs-fullscreen-control, .vjs-control vjs-button{
            display: none !important;
        }*/
    </style>
</head>
<body>
<div class="container body-content">
<img src="/Images/not-supported.jpg" style="width:100%;" />
</div>
</body>
</html>