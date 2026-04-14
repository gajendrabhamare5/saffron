<?php
	include('../include/conn.php');
	session_start();
	if (!isset($_SESSION['CLIENT_AUTH_STATUS']) && !isset($_SESSION['CLIENT_AUTH_UID'])) {
        header("Location: login");
    }
    
    $auth_uid=$_SESSION['CLIENT_AUTH_UID'];
    $user_auth_status = $conn->query("select * from  user_master where Id='$auth_uid'");
$user_auth_status_data = mysqli_fetch_assoc($user_auth_status);
$user_verification_status = $user_auth_status_data['user_verification_status'];
$user_verification_type = $user_auth_status_data['user_verification_type'];
?>
<style>
.logo-login img{
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
</style>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			include ("head_css.php");
		?>
		<script type="text/javascript" src="../js/socket.io.js"></script>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript"></script>
		<link href="../toastr/toastr.min.css" rel="stylesheet" />
    	<script src="../toastr/toastr.min.js" type="text/javascript"></script>
		
		
	</head>
	<body cz-shortcut-listen="true">
		<div id="app">
			<div id="load" style="">
				<div id="load-inner" class="logo-login">
					<img src="../storage/logo.png" class="img-fluid logo">
					<i class="fa fa-spinner fa-spin"></i>
				</div>
			</div>
			<div class="login-wrapper">
				<div class="text-center logo-login mb-3">
					<img src="../storage/logo.png">
				</div>
				<div class="login-form" style="max-width: 380px;">
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
			</div>
		</div>
		<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
			<div class="b-toaster-slot vue-portal-target">
				<div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
					<div tabindex="0"  class="toast">           
						 <header class="toast-header">
							<strong class="mr-2" id="errorMsgText"></strong>                
							<button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>            
						 </header>            
						<div class="toast-body"> 
						</div>       
					</div>    
				</div>
			</div>
		</div>
	</body>
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
			var check = false;
			(
				function(a){
				if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;
			})(navigator.userAgent||navigator.vendor||window.opera);
			if(check == false){
				window.location.assign('<?php echo WEB_URL; ?>');
			}
			
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
                        url: '../ajaxfiles/auth_verify_code.php',
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
                                var socket = io("<?php echo SITE_IP; ?>");
                                socket.on('connect', function() {});
                                var login_id = response_data.login_id;
                                var login_string = response_data.login_string;
                                socket.emit('loggedIn', {
                                    userId: login_id,
                                    randomString: login_string,
                                });
                                var call_s = {
                                    userId: login_id,
                                    randomString: login_string,
                                }

                                location.href = "home";
                            }
                            else{
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
			document.onreadystatechange = function () {
				var state = document.readyState
				if (state == 'interactive') {
				} else if (state == 'complete') {
					setTimeout(function () {
						document.getElementById('load').style.visibility = "hidden";
					}, 1000);
				}
			}
		</script>
		</html>
		