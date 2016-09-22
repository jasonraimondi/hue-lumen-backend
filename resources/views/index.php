<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flipp</title>

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css" />
    <link rel="stylesheet" href="./assets/css/style.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="./assets/package.js"></script>

</head>
<body id="app">
    <app></app>
</body>

<style>
    body {
        background-size: 100% 100%;
        background: black url('/images/blur-background.jpg') no-repeat;
        z-index: -999;
        background-size: cover;
    }
</style>

<script>
    $(document).ready(function() {
        $(document).on('click touchstart', function () {
            $("#flipp-phone-input").focus();
        })
    });
</script>

</html>