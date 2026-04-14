<?
if (!isset($handler->layout['CLIENT_AUTH_UID']) && !isset($handler->layout['CLIENT_AUTH_STATUS'])) {
    header("Location: " . MASTER_URL);
}

$auth_uid=$handler->layout['CLIENT_AUTH_UID'];
$whereArr = array('UserID' => $auth_uid);
$user_query = $this->db->get_where('user_login_master', $whereArr, 1);
$user_data = $user_query->result_array()[0];
$user_verification_status = $user_data['user_verification_status'];
$user_verification_type = $user_data['user_verification_type'];
?>
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
    .logo-login {
        max-width: none !important;
        max-height: none !important;
        width: auto !important;
        height: 64px !important;
    }

    .otp-input {
        width: 40px;
        border: none;
        border-bottom: 3px solid rgba(0, 0, 0, 0.5);
        margin: 0 10px;
        text-align: center;
        font-size: 36px;
        /* cursor: not-allowed;
        pointer-events: none; */
        cursor: pointer;
        pointer-events: all;
        background: white;
    }

    .otp-input:focus {
        border-bottom: 3px solid orange;
        outline: none;
    }

    .otp-input:nth-child(1) {
        cursor: pointer;
        pointer-events: all;
    }

    .loginInner2 {
        width: 450px !important;
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
                    <h4 class="text-center">Auth Code <i class="fas fa-hand-point-down"></i></h4>

                    <div class="row justify-content-center mt-3 mb-3">
                        <div class="col-md-12">
                            <div class="text-center mt-3">
                                <div class="mt-2 mb-3">
                                    <h3 class="text-center">Security Code Verification</h3>
                                    <?
                                    if(strtolower($user_verification_type) == "telegram"){
                                    ?>
                                    <div class="mt-3 text-center">Enter 6-digit code from Telegram</div>
                                    <?
                                    }else{
                                        ?>
                                        
                                        <div class="mt-3 text-center">Enter 6-digit code from your security auth verification App</div>
                                        <?
                                    }
                                    ?>
                                    <form role="form" autocomplete="off" method="post" class="mt-3">
                                        <div style="display: flex; flex-direction: row; justify-content: center;" id="inputs" class="inputs">

                                            <input class="otp-input 1" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="otp-input 2" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 3" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 4" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 5" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 6" type="text" inputmode="numeric" maxlength="1" disabled />

                                        </div>
                                    </form>
                                </div>
                                </div>
                                </div>
                                </div>
                </div>
                <div class="log-copy">
                    <p>&copy; <?= PROJECTNAME; ?></p>
                </div>
            </section>
        </div>
         <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/socket.io.js"></script>
    <link href="/toastr/toastr.min.css" rel="stylesheet" />
    <script src="/toastr/toastr.min.js" type="text/javascript"></script>
    <div id="view_auth_pop" class="modal" role="dialog">
        <div class="modal-dialog modal-md  modal-dialog-centered">
            <div role="document" tabindex="-1" class="modal-content">
                <header class="modal-header">
                    <h5 class="modal-title" id="result_title">Auth Code</h5>
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div class="modal-body">
                    <div class="row justify-content-center mt-3 mb-3">
                        <div class="col-md-12">
                            <div class="text-center mt-3">
                                <div class="mt-2 mb-3">
                                    <h3 class="text-center">Security Code Verification</h3>
                                    <div class="mt-3 text-center">Enter 6-digit code from your security auth verification App</div>
                                    <form role="form" autocomplete="off" method="post" class="mt-3">
                                        <div style="display: flex; flex-direction: row; justify-content: center;" id="inputs" class="inputs">

                                            <input class="otp-input 1" type="text" inputmode="numeric" maxlength="1" />
                                            <input class="otp-input 2" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 3" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 4" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 5" type="text" inputmode="numeric" maxlength="1" disabled />
                                            <input class="otp-input 6" type="text" inputmode="numeric" maxlength="1" disabled />

                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!---->
            </div>
        </div>

    </div>
    <script type="text/javascript">
        var auth_login_id = '<? echo $auth_uid; ?>';
        var MASTER_URL = '<? echo MASTER_URL; ?>';
       
        var inputs = document.querySelectorAll(".otp-input");
        inputs.forEach((input, index1) => {
            input.addEventListener("keyup", (e) => {
                const currentInput = input,
                    nextInput = input.nextElementSibling,
                    prevInput = input.previousElementSibling;
                if (currentInput.value.length > 1) {
                    currentInput.value = "";
                    return;
                }
                if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                    nextInput.removeAttribute("disabled");
                    nextInput.focus();
                }
                if (e.key.toLowerCase() == "backspace" || e.key.toLowerCase() == "delete") {
                    inputs.forEach((input, index2) => {
                        if (index1 <= index2 && prevInput) {
                            input.setAttribute("disabled", true);
                            input.value = "";
                            prevInput.focus();
                        }
                    });
                }
                //if the fourth input( which index number is 3) is not empty and has not disable attribute then
                //add active class if not then remove the active class.
                if (!inputs[5].disabled && inputs[5].value !== "") {
                    var otpval = [];
                    inputs.forEach((input, index2) => {
                        if (input.value != "") {
                            otpval.push(input.value);
                        }
                    });
                    var otp = otpval.join("");
                    $.ajax({
                        type: 'POST',
                        url: MASTER_URL + '/LoginAuth/auth_verify_code',
                        dataType: 'json',
                        data: {
                            code: otp,
                            'auth_login_id': auth_login_id,
                        },
                        success: function(response_data) {
                            response = response_data.status;

                            if (response == "error") {
                                toastr.clear()
                                toastr.error("", response_data.message, {
                                    "positionClass": "toast-top-center",
                                    "timeOut": "3000",
                                    "extendedTImeout": "0"
                                });
                                return false;
                            }else if (response == "ok") {
                                location.href = MASTER_URL + '/market-analysis';
                            }else{
                                toastr.clear()
                                toastr.error("", response_data.message, {
                                    "positionClass": "toast-top-center",
                                    "timeOut": "3000",
                                    "extendedTImeout": "0"
                                });
                                return false;
                            }
                        }
                    });
                    return false;
                }

            });
        });

        function hideError() {
            $("#errortext").text("");
            $("#errortext").hide();
        }
    </script>    
    </body>
</html>