<?php
include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$user_auth_status = $conn->query("select * from  user_master where Id='$user_id'");
$user_auth_status_data = mysqli_fetch_assoc($user_auth_status);
$user_verification_status = $user_auth_status_data['user_verification_status'];
$user_verification_type = $user_auth_status_data['user_verification_type'];
$auth_status = true;
if ($user_verification_status == "DISABLED") {
    $auth_status = false;
}
$user_verification_type_show="";
if(!empty($user_verification_type)){
    $user_verification_type_show="( $user_verification_type )";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head_css.php");
?>
<style>
    input.custom-text {
        display: inline-block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem 0.1rem .375rem .75rem;
        line-height: 1.5;
        color: #495057;
        vertical-align: middle;
        background-size: 8px 10px;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }

    .setting-box {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .setting-box span {
        font-size: 24px;
    }

    .security-auth .verify-code {
        border: 1px solid #f2f2f2;
        width: auto;
        font-size: 45px;
        line-height: 1;
        color: #585858;
        background: #e4e4e4;
        padding: 10px;
    }

    .btn-download {
        background-color: #59a845;
        border: 2px solid #59a845;
        color: #fff;
        box-shadow: 2px 4px 4px #00000047;
        text-decoration: none !important;
    }

    .btn-download .fa-android {
        font-size: 45px;
    }

    .btn-download h4 {
        line-height: 1;
        text-transform: uppercase;
        font-size: 22px;
        font-weight: bold;
        text-decoration: none;
    }

    .btn-download .dtext {
        font-size: 18px;
        line-height: 15px;
        text-decoration: none;
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
    }

    .otp-input:focus {
        border-bottom: 3px solid orange;
        outline: none;
    }

    .otp-input:nth-child(1) {
        cursor: pointer;
        pointer-events: all;
    }

    .security-auth a.btn {
        text-decoration: none;
    }

    .login-password {
        display: flex;
        justify-content: center;
    }

    .login-password input {
        width: auto;
    }

    .login-password .btn, .login-password .form-control, .login-password .form-select {
        height: 38px;
        border-radius: 0;
    }

    .login-password button {
        display: inline-block;
        margin: 0 10px;
    }

    .follow-instruction {
        background: #e4e4e4;
        color: #000;
        padding: 5px;
        text-align:center
    }
    
    .follow-instruction h4 {
        font-size: 20px;
        font-weight: 400;
    }
    
    .follow-instruction p {
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    kbd {
        padding: .2rem .4rem;
        font-size: .875em;
        color: #fff;
        background-color: #212529;
        border-radius: .2rem;
    }

    .font-hindi h4{
        font-size: 20px;
        font-weight: 400;
    }
</style>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div class="wrapper">
            <?php
            include("header.php");
            ?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">
                        <?php
                        include("left_sidebar.php");
                        ?>
                        <div class="col-md-10 report-main-content m-t-5">
                            <div class="loader" style="display:none;"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Secure Auth Verification</h4>
                                </div>
                                <div class="card-body security-auth">
                                    <div class="row justify-content-center mt-5 mb-5">
                                        <div class="col-6">

                                            <?

                                            if ($auth_status) {

                                            ?>
                                                <div class="setting-box">
                                                    <span class="mr-3">Secure Auth Verification Status:</span>


                                                    <a href="javascript:void(0)" title="Click here to disable secure auth verification" class="btn btn-success disabled_click">Enabled <? echo $user_verification_type_show; ?></a>
                                                </div>
                                                <div class="text-center mt-3"><!---->
                                                    <span class="sec_code"></span>
                                                    <?php
                                                        if($user_verification_type == 'Mobile'){
                                                    ?>
                                                        <h4 class="mb-2">If you haven't downloaded,<br> please download 'Secure Auth Verification App' from below link. </h4>
                                                        <h6 class="mb-2">Using this app you will receive auth code during login authentication</h6> 
                                                        <a href="apk/auth_v1.apk" class="btn btn-download btn-lg mt-3">
                                                            <div class="row5 row align-items-center">
                                                                <div class="col-4 text-center"><i class="fab fa-android"></i></div>
                                                                <div class="col-8 text-left">
                                                                    <h4 class="mb-0">Download</h4>
                                                                    <div class="mt-0 dtext">on the android</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            <?
                                            }
                                            if (!$auth_status) {
                                            ?>
                                                <div class="setting-box">
                                                    <span class="mr-3">Secure Auth Verification Status:</span>

                                                    <span class="badge badge-danger"><? echo $user_verification_status; ?></span>

                                                </div>
                                                <div class="mt-2 text-center">
                                                    <fieldset class="form-group">
                                                        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">Please select below option to enable secure auth verification</legend>
                                                        <div>
                                                            <div id="radio-group-1" role="radiogroup" tabindex="-1" class="btn-group-toggle btn-group btn-group-lg bv-no-focus-ring">
                                                                <label class="enable_click btn btn-outline-success btn-lg" data-val="mobile_app">
                                                                    <span>Enable Using Mobile App</span>
                                                                </label>
                                                                <label class="enable_click btn btn-outline-success btn-lg" data-val="telegram">
                                                                    <span>Enable Using Telegram</span>
                                                                </label>
                                                            </div><!----><!----><!---->
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <span class="otpbox">

                                                </span>
                                            <?
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/socket.io.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <?php
        include("footer.php");
        ?>
    </div>
    </div>

    <?php
    include("footer-js.php");
    ?>
</body>

</html>
<link href="toastr/toastr.min.css" rel="stylesheet" />
<script src="toastr/toastr.min.js" type="text/javascript"></script>
<script>
    var TELEGRAM_BOT = '<? echo TELEGRAM_BOT;?>';
    var TELEGRAM_link_BOT = '<? echo TELEGRAM_link_BOT;?>';
    jQuery(document).on("click", ".disabled_click", function() {
        if ($(".sec_code").html() != "") {
            $(".sec_code").html("");
            return false;
        }
        var userVrificationType = '<?php echo $user_verification_type; ?>';
        if(userVrificationType == 'Telegram'){
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/telegram_otp_generation.php',
                dataType: 'json',
                data: {},
                success: function(response) {
                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == "ok") {


                    } else {

                        toastr.clear()
                        toastr.error("", message, {
                            "positionClass": "toast-top-center",
                            "timeOut": "3000",
                            "extendedTImeout": "0"
                        });
                        return false;


                    }


                }
            });
        }
        $(".sec_code").html(`<div class="mt-2 mb-3">
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
                                                        </div>`);
        const inputs = document.querySelectorAll(".otp-input");
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
                        url: 'ajaxfiles/auth_disable_verification.php',
                        dataType: 'json',
                        data: {code:otp},
                        success: function(response) {
                            var check_status = response['status'];
                            var message = response['message'];
                            if (check_status == "ok") {

                                toastr.clear()
                                toastr.success("", message, {
                                    "positionClass": "toast-top-center",
                                    "timeOut": "3000",
                                    "extendedTImeout": "0"
                                });

                               
                                return false;



                            } else {

                                toastr.clear()
                                toastr.error("", message, {
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
    });
    jQuery(document).on("click", ".enable_click", function() {
        var auth_type = $(this).attr("data-val");
        if (auth_type == "telegram") {
            $(".otpbox").html('');
            // var userId = '<?php echo $user_id; ?>';
            // if(userId != 26){
            //     toastr.clear()
            //     toastr.error("", "Under maintanace", {
            //         "positionClass": "toast-top-center",
            //         "timeOut": "3000",
            //         "extendedTImeout": "0"
            //     });
            //     return false;
            // }

            $(".otpbox").html(`<div class="text-center mt-3">
                                    <div class="mt-2">Please enter your login password to continue</div>
                                    <div class="login-password mt-2">
                                        <input type="password" class="form-control password-input" id="password-input-id" placeholder="Enter your login password" value="">
                                        <button class="btn btn-success password-btn enable_click" data-val="telegram_block" disabled="">Get Connection ID</button>
                                    </div>
                                </div>`);

            $(".otpbox").on("input", ".password-input", function() {
                var password = $(this).val();
                var button = $(".password-btn");
                if (password.trim() !== "") {
                    button.prop("disabled", false); // Enable button
                } else {
                    button.prop("disabled", true); // Disable button
                }
            });
            
        } else if(auth_type == "telegram_block"){
            var passwordToSend = $('#password-input-id').val()
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/auth_enable_verification_telegram.php',
                dataType: 'json',
                data: {'password':passwordToSend},
                success: function(response) {
                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == "ok") {

                        var ottpp = response['verification_code'];
                        $(".otpbox").html(`<div class="mt-3 follow-instruction">
                                            <h4 class="mb-3">
                                                <b>Please follow below instructions for the telegram 2-step verification</b>
                                            </h4>
                                            <p>Find <a target="_blank" href="https://t.me/${TELEGRAM_link_BOT}?start" class="text-primary">${TELEGRAM_BOT}</a> in your telegram and type<kbd>/start</kbd> command. Bot will respond you.</p>
                                            <p>After this type <kbd>/connect ${ottpp}</kbd> and send it to BOT.</p>
                                            <p>Now your telegram account will be linked with your website account and 2-Step verification will be enabled.</p>
                                            <hr>
                                            <div class="font-hindi mt-4">
                                                <h4 class="mb-3"><b>कृपया टेलीग्राम 2-Step verification के लिए नीचे दिए गए निर्देशों का पालन करें:</b></h4>
                                                <p>अपने टेलीग्राम में <a target="_blank" href="https://t.me/${TELEGRAM_link_BOT}?start" class="text-primary">${TELEGRAM_BOT}</a> खोजें और कमांड <kbd>/start</kbd> टाइप करें. BOT आपको जवाब देगा.</p>
                                                <p class="text-dark">इसके बाद <kbd>/connect ${ottpp}</kbd> टाइप करें और इसे BOT पर भेजें.</p>
                                                <p>अब आपका टेलीग्राम account आपके वेबसाइट account से जुड़ जाएगा और 2-Step veriication चालू हो जाएगा.</p>
                                            </div>
                                        </div>`);

                    } else {

                        toastr.clear()
                        toastr.error("", message, {
                            "positionClass": "toast-top-center",
                            "timeOut": "3000",
                            "extendedTImeout": "0"
                        });
                        return false;


                    }


                }
            });
        } else {
            $(".otpbox").html('');
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/auth_enable_verification_mobile.php',
                dataType: 'json',
                data: {},
                success: function(response) {
                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == "ok") {

                        var ottpp = response['verification_code'];
                        $(".otpbox").html(`<div class="text-center mt-3">
                                                    <h6 class="mb-2">Please enter below auth code in your 'Secure Auth Verification App'.</h6>
                                                    <div class="text-center row mt-2 mb-2 align-items-center">
                                                        <div class="col-12 d-flex justify-content-center align-items-center">
                                                            <div class="verify-code d-inline-block">${ottpp}</div>
                                                        </div>
                                                    </div>
                                                    <h4 class="mb-2">If you haven't downloaded,<br> please download 'Secure Auth Verification App' from below link. </h4>
                                                    <h6 class="mb-2">Using this app you will receive auth code during login authentication</h6> <a href="apk/auth_v1.apk" class="btn btn-download btn-lg mt-3">
                                                        <div class="row5 row align-items-center">
                                                            <div class="col-4 text-center"><i class="fab fa-android"></i></div>
                                                            <div class="col-8 text-left">
                                                                <h4 class="mb-0">Download</h4>
                                                                <div class="mt-0 dtext">on the android</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>`);

                    } else {

                        toastr.clear()
                        toastr.error("", message, {
                            "positionClass": "toast-top-center",
                            "timeOut": "3000",
                            "extendedTImeout": "0"
                        });
                        return false;


                    }


                }
            });

        }

    });
    var socket = io("<?php echo GAME_IP; ?>", {
        transports: ['websocket']
    });
    socket.on('connect', function () {
    });
    socket.on('authDisableVerifiedSuccessfully', function (data) {
        if(data.status == "DISABLED"){
            location.href = "logout";
        }
        if(data.status == "ENABLED"){
            location.href = "logout";
        }
    });

    setInterval(function() {
        chkStatus();  // Refresh the entire page
    }, 5000);

   function chkStatus() {
        var auth_status = '<? echo $auth_status; ?>';
        
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/chkStatusAuth.php',
                dataType: 'json',
                data: {auth_status:auth_status},
                success: function(response) {
                  
                   if(response.refresh){
                    location.href = "logout";
                   }
                }
            });

    }
</script>


<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>