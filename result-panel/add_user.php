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
<title><?php echo SITE_NAME; ?> | Create Downline User</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Create King Admin</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Create King Admin</h2>

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
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="user_name" placeholder="Downline Name" required="required" type="text">
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="email" id="email" name="user_email" required="required" class="form-control col-md-7 col-xs-12">
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">User Name (Login Id) <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="user_login_id" name="user_login_id"  data-validate-length-range="3"  required="required" class="form-control col-md-7 col-xs-12">
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile Number <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="number" name="user_number" required="required" class="form-control col-md-7 col-xs-12">
</div>
</div>

<div class="item form-group">
<label for="password" class="control-label col-md-3">Password</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="password" type="password" name="user_password" class="form-control col-md-7 col-xs-12" required="required">
</div>
</div>
<div class="item form-group">
<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="password2" type="password" name="user_password2" data-validate-linked="user_password" class="form-control col-md-7 col-xs-12" required="required">
</div>
</div>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="my_percentage">King Percentage <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="my_percentage" name="my_percentage" required="required" class="form-control col-md-7 col-xs-12">
</div>
</div>

<div class="item form-group">
<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Bet Delete?</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select name="bet_delete_status" id="bet_delete_status" class="form-control col-md-7 col-xs-12" required="required">
	<option  value="0">No</option>
	<option  value="1">Yes</option>
</select>
</div>
</div>

<div class="item form-group">
<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Is USD?</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select name="is_usd_status" id="is_usd_status" class="form-control col-md-7 col-xs-12" required="required">
	<option  value="0">No</option>
	<option  value="1">Yes</option>
</select>
</div>
</div>

<div class="item form-group">
<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Is Casino Allowed?</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select name="is_casino" id="is_casino" class="form-control col-md-7 col-xs-12" required="required">
	<option  value="1">Yes</option>
	<option  value="0">No</option>
</select>
</div>
</div>

<div class="item form-group">
<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select name="user_status" id="user_status" class="form-control col-md-7 col-xs-12" required="required">
	<option  value="1">Active</option>
	<option  value="0">In-Active</option>
</select>
</div>
</div>


<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<a id="send" type="submit" onclick="doRegister()" class="btn btn-success">Submit</a>
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
function doRegister(){
	var user_name = $("#name").val();
	var user_email = $("#email").val();
	var user_login_id = $("#user_login_id").val();
	var user_number = $("#number").val();
	var user_password = $("#password").val();
	var user_password2 = $("#password2").val();
	var user_status = $("#user_status").val();
	var bet_delete_status = $("#bet_delete_status").val();
	var is_usd_status = $("#is_usd_status").val();
	var is_casino = $("#is_casino").val();
	var min_stake = $("#min_stake").val();
	var max_stake = $("#max_stake").val();
	
	if(user_name == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter User Name");
		return;
	}
	if(user_email == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter User Email");
		return;
	}
	if(user_login_id == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter User Login Id");
		return;
	}
	if(user_number == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter User Mobile Number");
		return;
	}
	if(user_password == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter User Password");
		return;
	}
	if(user_password2 == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter Confirm Password");
		return;
	}
	
	if(user_password2 != user_password){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Password & Confirm Password is not matched");
		return;
	}
	if(min_stake == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Select Min Stake Value");
		return;
	}
	if(max_stake == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Select Max Stake Value");
		return;
	}
	<?php
		if($login_type == 5){
	?>
	 my_percentage = $("#my_percentage").val();
	if(my_percentage == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter Downline Percentage");
		return;
	}
	<?php
	}
	?>
	
	if(user_status == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Select Status");
		return;
	}
	
	 $.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/create_user.php',
		 dataType: 'JSON',
		 data: {user_name:user_name,user_email:user_email,user_login_id:user_login_id,user_number:user_number,user_password:user_password,user_status:user_status,min_stake:min_stake,max_stake:max_stake,my_percentage:my_percentage,bet_delete_status:bet_delete_status,is_usd_status:is_usd_status,is_casino:is_casino},
		 success: function(response) {
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