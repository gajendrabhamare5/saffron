<?php
	include("../include/conn.php");
	include("../include/flip_function.php");
	
	
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
.report-container{
	height: 100vh;
}
</style>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
	include ("loader.php");
?>
        <div>
             <?php
				include("header.php");
			?>
            <div class="report-container">
                <!---->
				
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Change Password:</h4></div>
                    <div class="card-body container-fluid container-fluid-5">
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Current Password:</label>
                                    <input type="password" id="current_password" class="form-control" placeholder="Enter Current password">
                                </div>
                                <div class="form-group">
                                    <label>New Password:</label>
                                    <input type="password" id="new_password" class="form-control" placeholder="Enter New password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password:</label>
                                    <input type="password" id="confirm_password" class="form-control" placeholder="Confirm New password">
                                </div>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-sm" id="changePassword">Change Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript" src="../js/jquery.min.js"></script>    
<?php
	include "footer.php";
?>
</body>

</html>
<script>
jQuery(document).on("click", "#changePassword", function () {
	$(".loader").show();
	var current_password =  $("#current_password").val();
	var new_password =  $("#new_password").val();
	var confirm_password =  $("#confirm_password").val();

	// $("#bet-error-class").removeClass("b-toast-danger");
	// $("#bet-error-class").removeClass("b-toast-success");
	
	if(current_password == ""){
		// $("#bet-error-class").addClass("b-toast-danger");
		// $("#errorMsgText").text("Please Enter Current Password");
		// $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		toastr.clear()
					toastr.warning("","Please Enter Current Password", {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
		$(".loader").hide();
		return;
	}
	if(new_password == ""){
		// $("#bet-error-class").addClass("b-toast-danger");
		// $("#errorMsgText").text("Please Enter New Password");
		// $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		toastr.clear()
					toastr.warning("","Please Enter New Password", {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
		$(".loader").hide();
		return;
	}
	if(confirm_password == ""){
		// $("#bet-error-class").addClass("b-toast-danger");
		// $("#errorMsgText").text("Please Enter Confirm Password");
		// $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		toastr.clear()
					toastr.warning("","Please Enter Confirm Password", {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
		$(".loader").hide();
		return;
	}
	if(new_password != confirm_password){
		// $("#bet-error-class").addClass("b-toast-danger");
		// $("#errorMsgText").text("Password & Confirm Password is not matched.");
		// $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
		toastr.clear()
					toastr.warning(""," Password & Confirm Password is not matched.", {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
		$(".loader").hide();
		return;
	}
	
		$.ajax({
			 type: 'POST',
			 url: '../ajaxfiles/change_password.php',
			 dataType: 'json',
			 data: {current_password:current_password,new_password:new_password,confirm_password:confirm_password},
			 success: function(response) {
				var check_status = response['status'];
				var message = response['message'];
				$(".loader").hide();
				if(check_status == "ok"){
					
					// $("#bet-error-class").addClass("b-toast-success");
					// $("#errorMsgText").text(message);
					// $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
                                        
                    //                     setTimeout(function (){
                    //                         window.location = 'login';
                    //                     },1000); 
										toastr.clear()
					toastr.success("", message, {
						"timeOut": "3000",
						"iconClass": "toast-success",
						"positionClass": "toast-top-center",
						"extendedTImeout": "0"
					});
					 setTimeout(function (){
                                            window.location = 'login';
                                        },1000);
					
				}else{
					
					// $("#bet-error-class").addClass("b-toast-danger");
					// $("#errorMsgText").text(message);
					// $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
					toastr.clear()
					toastr.warning("", message, {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
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
                <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>