<?php
include('../include/conn.php');

session_start();
unset($_SESSION['CLIENT_AUTH_STATUS']);
unset($_SESSION['CLIENT_AUTH_UID']);
$login_type = $_SESSION['CLIENT_LOGIN_STATUS'];
if($login_type == true){
	header("Location: home");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
	include ("head_css.php");
?>

<script type="text/javascript">
		  var check = false;
		  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		  if(check == false){
		  	window.location.assign('<?php echo WEB_URL; ?>');
		  }
    </script>
<style>
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
<body cz-shortcut-listen="true">
    <div id="app">
        <div id="load" style="">
            <div id="load-inner" class="logo-login"><img src="../storage/logo.png" class="img-fluid logo"> <i class="fa fa-spinner fa-spin"></i></div>
        </div>
        <div class="login-wrapper">
            <div class="text-center logo-login mb-3" style="margin: 2% 0;"><img src="../storage/logo.png"></div>
            <div class="login-form">
			<h4 class="text-center">Login <i class="fas fa-hand-point-down"></i></h4>
				<div role="alert" class="alert alert-danger" id="errortext" style="display:none;"></div>
                    <div class="form-group input-group mb-4">
                        <input name="User Name" type="text" placeholder="Username" id="email" class="form-control" aria-required="true" aria-invalid="false">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
                        <!----><span class="text-danger error-msg" style="display: none;">

                    </span></div>
                    <div class="form-group input-group mb-4">
                        <input name="Password" type="password" placeholder="Password" id="pass" class="form-control" aria-required="true" aria-invalid="false">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
                        <!----><span class="text-danger error-msg" style="display: none;">

                    </span></div>
					<div class="form-group mb-0 ">
							<button type="submit" class="btn btn-primary btn-block"  id="logi" onclick="goLogin()">
								Login
								<i class="mt-1 fas fa-sign-in-alt float-end"></i>
							</button>
						</div>
                    <div class="form-group1 mt-2">
                        <button type="submit" class="btn btn-primary btn-block"  id="logid" onclick="goDemoLogin()">
						Login with demo ID
                            <i class="mt-1 fas fa-sign-in-alt float-end"></i></button>
                    </div>
					<small class="recaptchaTerms mt-1">This site is protected by reCAPTCHA and the Google
							<a href="https://policies.google.com/privacy">Privacy Policy</a> and
							<a href="https://policies.google.com/terms">Terms of Service</a> apply.
						</small>
                    
                
            </div>
			<section class="footer footer-login"><div class="footer-top"><div class="footer-links"><nav class="navbar navbar-expand-sm"><ul class="navbar-nav"><li class="nav-item"><a class="nav-link" href="/terms-and-conditions" target="_blank"> Terms and Conditions </a></li><li class="nav-item"><a class="nav-link" href="/responsible-gaming" target="_blank"> Responsible Gaming </a></li></ul></nav></div><div class="support-detail"><h2>24X7 Support</h2></div><div class="social-icons-box"></div></div></section>
        </div>
    </div>

	<script type="text/javascript" src="../js/socket.io.js"></script>

	<script type="text/javascript" src="../js/jquery.min.js"></script>
	
		<link href="../toastr/toastr.min.css" rel="stylesheet" />
    	<script src="../toastr/toastr.min.js" type="text/javascript"></script>
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
var auth_login_id = "";
$('body').on('keydown', function(e){
				if(e.which == 13){
					goLogin();
				}
			});
        	function goLogin(){
					var username = $("#email").val();
					var password = $("#pass").val();
					if(username=="" || password=="")
					{
						$("#errortext").css({"display":"block"});
						$("#errortext").text("Please Enter Email and Password");
					}
					else
					{
					
					$('#logi').html("<i class='fa fa-spinner fa-spin' id='loading'></i>Loading");
					$('#logi').attr("disabled","disabled");
					 $.ajax({
						 type: 'POST',
						 url: '../ajaxfiles/logincheck.php',
						 dataType: 'JSON',
						 data: {username:username,password:password},
						 success: function(response_data) { 
							response = response_data.status;
							
							if(response=="NA")
							{
								$("#errortext").css({"display":"block"});
								$("#errortext").text("Account is not activated!");
								$('#logi').text("Login");	
								$('#logi').attr("disabled",false);								
							}
							else if(response=="0")
							{
								$("#errortext").css({"display":"block"});
								$("#errortext").text("Login failed. Please try again");
								$('#logi').text("Login");	
								$('#logi').attr("disabled",false);																
							}
                                                        else if (response == "maintenance"){
                                                            $("#errortext").css({"display": "block"});
                                                            $("#errortext").text(response_data.msg);
                                                            $('#logi').text("Login");
                                                            $('#logi').attr("disabled", false);
                                                        }
							else if(response == "verify")
							{
								$("#errortext").css({"display":"block"});
								$("#errortext").html("Please verify your email from your inbox or spam. </br> <a href='email_resend.php?"+email+"' style='color:blue'>Resend Mail</a>");
								$('#logi').text("Login");	
								$('#logi').attr("disabled",false);																
							} else if(response == "telegram_error")
							{
								$("#errortext").css({"display":"block"});
								$("#errortext").text(response_data.msg);
								$('#logi').text("Login");	
								$('#logi').attr("disabled",false);																
							} else if (response == 'auth') {
                            /* $('#logi').html("Login <i class='ml-2 fas fa-sign-in-alt'></i>");
                            $('#logi').attr("disabled", false);
                            $("#view_auth_pop").modal('show');
                            auth_login_id = response_data.user_auth_id; */

                            location.href = "loginauth";
                        } 
							
							else
							{
								
								var socket = io("<?php echo SITE_IP; ?>");
								socket.on('connect', function() {});
								var login_id = response_data.login_id;
								var login_string = response_data.login_string;
									socket.emit('loggedIn',{
										userId:login_id,
										randomString:login_string,
										
                                    siteId: <?php echo SITE_ID; ?>,
									});
								location.href="home";
							}
						 }
					 });
					}
			} 
			function hideError()
			{
				$("#errortext").text("");
				$("#errortext").hide();
			}
      </script>
	  
	  	  <script>

			

function goDemoLogin() {
	 

	 $('#logid').html("Loading <i class='fa fa-spinner fa-spin' id='loading'></i>");
	 $('#logid').attr("disabled", "disabled");
	 $.ajax({
		 type: 'POST',
		 url: '../ajaxfiles/logindemocheck.php',
		 dataType: 'JSON',
		 data: {},
		 success: function (response_data) {
			 
			response = response_data.status;

if (response == "NA")
{
	$("#errortext").css({"display": "block"});
	$("#errortext").text("Account is not activated!");
	$('#logid').html("Login with demo ID <i class='ml-2 fas fa-sign-in-alt'></i>");
	$('#logid').attr("disabled", false);
}
else if (response == "0")
{
	$("#errortext").css({"display": "block"});
	$("#errortext").text("Login failed. Please try again");
	$('#logid').html("Login with demo ID <i class='ml-2 fas fa-sign-in-alt'></i>");
	$('#logid').attr("disabled", false);
}
else if (response == "maintenance"){
	
	$("#errortext").css({"display": "block"});
	$("#errortext").text(response_data.msg);
	$('#logid').html("Login with demo ID <i class='ml-2 fas fa-sign-in-alt'></i>");
	$('#logid').attr("disabled", false);
}
else if (response == "verify")
{
	$("#errortext").css({"display": "block"});
	$("#errortext").html("Please verify your email from your inbox or spam. </br> <a href='email_resend.php?" + email + "' style='color:blue'>Resend Mail</a>");
	$('#logid').html("Login with demo ID <i class='ml-2 fas fa-sign-in-alt'></i>");
	$('#logid').attr("disabled", false);
}
else if (response == "skey")
{
	location.href = "two-step_auth";
}
else
{
 var socket = io("<?php echo SITE_IP; ?>");
	socket.on('connect', function () {
	});
var login_id = response_data.login_id;
var login_string = response_data.login_string;
socket.emit('loggedIn', {
	userId: login_id,
	randomString: login_string,
	siteId: <?php echo SITE_ID; ?>,
});

location.href = "home";
}
			 }
		 
	 });
 
 }

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
</body>

</html>