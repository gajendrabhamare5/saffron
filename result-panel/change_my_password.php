<?php

include('../include/conn.php');

include "session.php";

$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

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

<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Old Password<span class="required">*</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input type="password" id="old_password" name="old_password" required="required" class="form-control col-md-7 col-xs-12">

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

	var old_password =$("#old_password").val();

	var new_password =$("#new_password").val();

	var new_confirm_password =$("#new_confirm_password").val();

	if(old_password == ""){

		$(".alert-success").hide();

				$(".alert-danger").show();

				$(".alert-danger strong").text("Please Old Password");

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

		 url: 'ajaxfiles/change_my_password.php',

		 dataType: 'JSON',

		 data: {current_password:old_password,new_password:new_password,confirm_password:new_confirm_password},

		 success: function(response) {

			 console.log(response);

			var status  = response.status;

			var message  = response.message;

			if(status == "ok"){

				$(".alert-success").show();

				$(".alert-danger").hide();

				$(".alert-success strong").text(message);
				location.href='login';
			}else{

				$(".alert-success").hide();

				$(".alert-danger").show();

				$(".alert-danger strong").text(message);

			}

		 }

	 });

}

</script>