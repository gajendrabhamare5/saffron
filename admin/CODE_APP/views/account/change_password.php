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
        <style>
            .error{
                display: none;
            }
            .wrapper{
                width: 100% !important;
            }
        </style>
    </head>
    <body class="login">
        <div class="wrapper" >
            <section class="login-mn">
                <div class="log-logo m-b-20">
                    <img src="<?php echo MASTER_URL; ?>/assets/logo.png" style="max-width: 250px; max-height: 100px;">
                </div>
                <div class="log-fld">
                    <h2 class="text-center">Change Password</h2>
                     <?php
                    if ($handler->session->userdata("alerts") !== NULL) {
                        foreach ($handler->session->userdata("alerts") as $type => $data) {
                            
                            $alert_icon = (($type == "success") ? "check" : "warning");
                            ?>
                                <div class="alert alert-<?php echo($alert_icon); ?>"><i class="fas fa-<?php echo $alert_icon; ?>" aria-hidden="true"></i><?php echo $data[0]; ?></div> 
                            <?php
                            $handler->session->unset_userdata("alerts");
                            
                        }
                    }
                    ?>

                    <form action="<?php echo MASTER_URL; ?>/account/change_password" method="post" name="change_password_form" id="change_password_form" >
                         <div class="form-group m-b-20">
                            <label for="account-password">Old Password</label>
                            <input type="password" name="account-password" id="account-password" placeholder="" class="form-control" required="true">
                           <span class="error"></span>
                        </div>
                        <div class="form-group m-b-20">
                             <label for="account-new-password">New Password</label>
                            <input type="password" placeholder="" name="account-new-password" id="account-new-password" class="form-control" required="true" />
                            <span class="error"></span>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="account-confirm-new-password">Confirm Password</label>
                            <input type="password" name="account-confirm-new-password" id="account-confirm-new-password" placeholder="" class="form-control" required="true">
                            <span class="error"></span>
                        </div>
                       
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-submit btn-login">Change Password<i class="fas fa-sign-in-alt"></i></button>
                        </div>
                    </form>
                </div>
                
            </section>
        </div>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="|49" defer=""></script></body>

</html>

<script>
    $(document).ready(function() {

    $('#all').on('change', function() {
        $('input[name="plist[]"]').not('#all').prop('checked', this.checked);
    });

     $('input[name="plist[]"]').not('#all').on('change', function() {
        if (!this.checked) {
            $('#all').prop('checked', false);
        } else {
            const total = $('input[name="plist[]"]').not('#all').length;
            const checked = $('input[name="plist[]"]').not('#all').filter(':checked').length;
            if (total === checked) {
                $('#all').prop('checked', true);
            }
        }
    });

      function validateField(input) {
        const fieldName = input.attr('id');
        const fieldLabel = $('label[for="' + fieldName + '"]').text().trim() || fieldName;
        const errorMessage = `The ${fieldLabel} field is required`;

        const value = input.val().trim();
        const errorSpanId = fieldName + '-error';

        if (value === '') {
           
            input.addClass('is-invalid');
            if ($('#' + errorSpanId).length === 0) {
                input.after('<span id="' + errorSpanId + '" class="text-danger small">' + errorMessage + '</span>');
            }
        } else {
           
            input.removeClass('is-invalid');
            $('#' + errorSpanId).remove();
        }
    }

     // On blur of each input inside the form
    $('#change_password_form input[type="text"], #change_password_form input[type="password"]').on('blur', function() {
        validateField($(this));
    });

    
    function validatePrivileges() {
        const checked = $('input[name="plist[]"]:checked').length;
        const errorSpanId = 'plist-error';
        if (checked === 0) {
            
            if ($('#' + errorSpanId).length === 0) {
                $('.previlage-box').after('<span id="' + errorSpanId + '" class="text-danger small">The Privileges field is required</span>');
            }
            return false;
        } else {
            // Remove red border and error if valid
            $('.previlage-box').removeClass('border border-danger rounded p-2');
            $('#' + errorSpanId).remove();
            return true;
        }
    }

    // Validate privileges on checkbox change
    $('input[name="plist[]"]').on('change', function() {
        validatePrivileges();
    });

$('#change_password_form').on('submit', function(e) {
        let hasError = false;

        $('#change_password_form input[type="text"], #change_password_form input[type="password"]').each(function() {
           
            if ($(this).val().trim() === '') {
                validateField($(this));
                hasError = true;
            }
        });


        const privilegesValid = validatePrivileges();
        if (!privilegesValid) {
            hasError = true;
        }

        if (hasError) {
            e.preventDefault();
        }
    });
});
</script>