<?php
include('../include/conn.php');
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if($login_type != 5){
	header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Change Password</title>
<?php 
include("header.php");
$credit_debit_user_id = $_REQUEST['user_id'];
?>

<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>Change Password</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Change Password</h2>

<div class="clearfix"></div>
</div>
<div class="x_content">

<div class="alert alert-success" style="display:none;">
  <strong></strong>
</div>
<div class="alert alert-danger" style="display:none;">
  <strong></strong>
</div>

<form method="post" class="form-horizontal form-label-left" novalidate>



<div class="item form-group">
<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Select User<span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select name="user_name" id="user_name" class="form-control col-md-7 col-xs-12" required="required">
<option value="">Select User</option>
<?php 
if($login_type == 5){
	$get_my_user_list = $conn->query("select * from user_master as um left outer join user_login_master as ulm on ulm.UserId=um.Id where ulm.UserType IN (4,7) ORDER BY ulm.UserType DESC");
}
	
	while($user_data = (mysqli_fetch_assoc($get_my_user_list))){
	$UserID = $user_data['UserID'];
	$UserType = $user_data['UserType'];
	
	$user_type_lable = "";
	if($UserType == 4){
		$user_type_lable = " (SMDL)";
	}
	else if($UserType == 7){
		$user_type_lable = " (King Admin)";
	}
	
?>
<option value="<?php echo $user_data['UserID']; ?>" <?php if($credit_debit_user_id == $user_data['UserID']){ echo "selected='selected'"; } ?>><?php  echo $user_data['Email_ID']."  ".$user_type_lable; ?></option>
<?php
	}
?>
</select>
</div>
</div>	

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">New Password<span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="password" id="new_password" name="new_password" required="required" class="form-control col-md-7 col-xs-12">
</div>
</div>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Confirm Password<span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="password" id="new_confirm_password" name="new_confirm_password" required="required" class="form-control col-md-7 col-xs-12">
</div>
</div>


<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<a id="send" type="submit" onclick="doChangePassword()" class="btn btn-success">Submit</a>
</div>
 </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>

<script>
function doChangePassword(){
	var user_name =$("#user_name").val();
	var new_password =$("#new_password").val();
	var new_confirm_password =$("#new_confirm_password").val();
	if(user_name == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Select User Account");
		return;
	}
	if(new_password == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter New Password");
		return;
	}
	if(new_confirm_password == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter New Confirm Password");
		return;
	}
	if(new_password != new_confirm_password){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Password & Confirm Password is not matched.");
		return;
	}
	
		$.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/change_password.php',
		 dataType: 'JSON',
		 data: {user_name:user_name,new_password:new_password},
		 success: function(response) {
			 console.log(response);
			var status  = response.status;
			var message  = response.message;
			if(status == "ok"){
				$(".alert-success").show();
				$(".alert-danger").hide();
				$(".alert-success strong").text(message);
			}else{
				$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text(message);
			}
		 }
	 });
}
</script>