<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= PROJECTNAME; ?></title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/storage/front/theme/theme.css?v=<?php echo time();?>">
        <link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/all.css">
        <link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <style>
            .error{
                display: none;
            }
        </style>
    </head>
    <body class="login">
        <div class="wrapper">
            <section class="login-mn">
                <div class="log-logo m-b-20">
                    <img src="<?php echo MASTER_URL; ?>/assets/logo.png" style="max-width: 250px; max-height: 100px;">
                </div>
                <div class="log-fld">
                    <h2 class="text-center">Sign In</h2>
                    <?php
                    if (isset($handler->layout["alerts"]))
                        foreach ($handler->layout["alerts"] as $type => $data) {
                            $alert_icon = (($type == "success") ? "check" : (($type == "info") ? "info" : "exclamation-triangle"));
                            $class_name = ($type !== 'success') ? 'danger' : 'success';
                            ?>
                            <div class="alert alert-<?= $class_name ?>" role="alert">
                                <strong><i class="fas fa-<?php echo $alert_icon; ?>" aria-hidden="true"></i></strong>
                                <?php echo implode("<br>", $data); ?>
                            </div>
                            <?php
                        }
                    ?>

                    <form method="post" action="">
                        <div class="form-group m-b-20">
                            <input type="text" placeholder="Username" name="login-email" id="login-email" class="form-control" required="" />
                            <!--<i class="fas fa-user"></i>-->
                            <span id="username-error" class="error">please fill the username</span>
                        </div>
                        <div class="form-group m-b-20">
                            <input name="login-password" id="login-password" placeholder="Password  " value="" class="form-control" required="" autocomplete="off" type="password">
                            <!--<i class="fas fa-key"></i>-->
                            <span id="password-error" class="error">please fill the Password</span>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-submit btn-login">Login<i class="fas fa-sign-in-alt"></i></button>
                        </div>
                    </form>
                </div>
                <div class="log-copy">
                    <p>&copy; <?= PROJECTNAME; ?></p>
                </div>
            </section>
        </div>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="|49" defer=""></script></body>
</html>