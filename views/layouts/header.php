<!doctype html>

<head>
    <meta charset="utf-8">
    <title><?php echo Config::APP_TITLE; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <!-- <link rel="stylesheet" type="text/css" href="<?php echo './Views/Assets/default.css'; ?> "> -->

</head>
<style>
    body {
        display: flex;
        min-height: 1080px;
        flex-direction: column;
    }

    .page-footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        z-index: 2;
    }
</style>

<body>
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="<?php echo Constants::REDIRECT_INDEX; ?>" class="brand-logo">Zenith</a>
            </div>
        </div>
    </nav>

    <br />
    <div class="container">