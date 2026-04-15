<?php
include('include/conn.php');
include('include/flip_function.php');


session_start();

if(isset($_SESSION['CLIENT_LOGIN_STATUS'])){
	
}else{
		echo "<script>window.location.href='login';</script>";
	}
	

$user_id = $_SESSION['CLIENT_LOGIN_ID'];

?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head_css2.php");
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

.card {
	position: relative;
	display: flex;
	flex-direction: column;
	min-width: 0;
	word-wrap: break-word;
	background-color: #fff;
	background-clip: border-box;
	border: 1px solid rgba(0, 0, 0, .125);
	border-radius: .25rem;
}

.card {
	box-shadow: 0 0 5px #a4a4a4;
}

.card {
	margin-bottom: 10px;
}

.card-header {
	padding: .5rem 1rem;
	margin-bottom: 0;
	background-color: rgba(0, 0, 0, .03);
	border-bottom: 1px solid rgba(0, 0, 0, .125);
}

.card-header {
	background-color: var(--theme1-bg);
	color: #ffffff;
}

.card-header:first-child {
	border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
	margin-top: 0;
	margin-bottom: .5rem;
	font-weight: 500;
	line-height: 1.2;
}

h4, .h4 {
	font-size: 20px;
	font-weight: 400;
	margin-bottom: 0;
}

.card-title {
	margin-bottom: 0;
}

.card-body {
	flex: 1 1 auto;
	padding: 1rem 1rem;
}

.card-body {
	padding: 6px;
}

.row {
	--bs-gutter-x: 1.5rem;
	--bs-gutter-y: 0;
	display: flex
	;
	flex-wrap: wrap;
	margin-top: calc(-1 * var(--bs-gutter-y));
	margin-right: calc(-.5 * var(--bs-gutter-x));
	margin-left: calc(-.5 * var(--bs-gutter-x));
}

.row.row5 {
    margin-left: -10px;
    margin-right: -10px;
}

.row.row5 > [class*="col-"], .row.row5 > [class*="col"] {
    padding-left: 10px;
    padding-right: 10px;
}

label {
    display: inline-block;
}

.form-label {
    margin-bottom: .5rem;
	color: #000000
}

button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.form-control, .form-select {
    background-color: #ffffff !important;
    color: #000000 !important;
    border-color: #dbdbdb !important;
    padding: 5px;
    border-radius: 0;
}

.btn, .form-control, .form-select {
    height: 38px;
    border-radius: 0;
}

.btn-primary {
    background-color: var(--theme1-bg);
    color: #ffffff;
    border-color: var(--theme1-bg);
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active {
    background-color: var(--theme1-bg);
    color: ffffff;
    border-color: var(--theme1-bg);
}

.btn:hover, .btn:focus, .btn:active {
    opacity: 0.85;
}

</style>
<body cz-shortcut-listen="true" class="" data-modal-open-count="0">
    <div id="app">
        <?php
			include("loader.php");;
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
                                    <h4 class="mb-0">Change Password</h4></div>
                                <div class="card-body container-fluid container-fluid-5">
                                    <div class="row row5 mt-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Current Password</label>
                                                <input type="password" id="current_password" class="form-control" placeholder="Enter Current password">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">New Password</label>
                                                <input type="password" id="new_password" class="form-control" placeholder="Enter New Password">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirm New Password</label>
                                                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row5 mt-2">
                                        <div class="mb-3 col-6">
                                            <button class="btn btn-primary w-100" id="changePassword">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
<script>
jQuery(document).on("click", "#changePassword", function () {
	$(".loader").show();
	var current_password =  $("#current_password").val();
	var new_password =  $("#new_password").val();
	var confirm_password =  $("#confirm_password").val();

	$("#bet-error-class").removeClass("b-toast-danger");
	$("#bet-error-class").removeClass("b-toast-success");
	
	if(current_password == ""){
		$("#bet-error-class").addClass("b-toast-danger");
		$("#errorMsgText").text("Please Enter Current Password");
		$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		$(".loader").hide();
		return;
	}
	if(new_password == ""){
		$("#bet-error-class").addClass("b-toast-danger");
		$("#errorMsgText").text("Please Enter New Password");
		$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		$(".loader").hide();
		return;
	}
	if(confirm_password == ""){
		$("#bet-error-class").addClass("b-toast-danger");
		$("#errorMsgText").text("Please Enter Confirm Password");
		$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		$(".loader").hide();
		return;
	}
	if(new_password != confirm_password){
		$("#bet-error-class").addClass("b-toast-danger");
		$("#errorMsgText").text("Password & Confirm Password is not matched.");
		$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		$(".loader").hide();
		return;
	}
	
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/change_password.php',
			 dataType: 'json',
			 data: {current_password:current_password,new_password:new_password,confirm_password:confirm_password},
			 success: function(response) {
				 $(".loader").hide();
				var check_status = response['status'];
				var message = response['message'];
				
				if(check_status == "ok"){
					
					$("#bet-error-class").addClass("b-toast-success");
					$("#errorMsgText").text(message);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
                                        
                                        setTimeout(function (){
                                            window.location = 'login';
                                        },1000);
					
				}else{
					
					$("#bet-error-class").addClass("b-toast-danger");
					$("#errorMsgText").text(message);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
				}
				
			 }
		});
});
</script>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
<div class="b-toaster-slot vue-portal-target">
    <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
        <div tabindex="0"  class="toast">
            <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>