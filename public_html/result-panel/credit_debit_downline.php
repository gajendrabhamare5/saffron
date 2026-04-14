<?php
include('../include/conn.php');
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Credit / Debit</title>
<?php 
include("header.php");
$credit_debit_user_id = $_REQUEST['user_id'];
?>

<div class="right_col" role="main">
<?php 

include("below_header.php");
?>
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Credit/Debit</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Credit/Debit</h2>

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
<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select name="user_name" id="user_name" class="form-control col-md-7 col-xs-12" required="required">
<option value="">Select User</option>
<?php 

	$get_my_user_list = $conn->query("select * from user_master as um left outer join user_login_master as ulm on ulm.UserId=um.Id where  ulm.UserType=7");

	
	while($user_data = (mysqli_fetch_assoc($get_my_user_list))){
	$UserID = $user_data['UserID'];
	$get_account_balance = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$UserID and status=1");
	$fetch_account_balance = mysqli_fetch_assoc($get_account_balance);
	$account_balance = $fetch_account_balance['total_balance'];
	if($account_balance == null){
		$account_balance = 00;
	}
?>
<option value="<?php echo $user_data['UserID']; ?>" <?php if($credit_debit_user_id == $user_data['UserID']){ echo "selected='selected'"; } ?>><?php  echo $user_data['Email_ID']." - ".$account_balance." points"; ?></option>
<?php
	}
?>
</select>
</div>
</div>

<div class="item form-group">
	<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Transaction Type<span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<select name="transaction_type" id="transaction_type" class="form-control col-md-7 col-xs-12" required="required">			<?php				if($_REQUEST['type']){					if($_REQUEST['type'] == 8){			?>			<option value="8">Settlement Amount</option>			<?php					}				}else{			?>						<option value="">Select Type</option>			<option value="1">Deposit</option>			<option value="2">Withdraw</option>			<?php				}			?>			
		</select>
	</div>
</div>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Points<span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="transaction_points" name="transaction_points" required="required" value="<?php if($_REQUEST['amount']){	echo $_REQUEST['amount'];} ?>" class="form-control col-md-7 col-xs-12">
</div>
</div>


<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<a id="send" type="submit" onclick="doTransaction()" class="btn btn-success">Submit</a>
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
function doTransaction(){
	var user_name =$("#user_name").val();
	var transaction_type =$("#transaction_type").val();
	var transaction_points =$("#transaction_points").val();
	if(user_name == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Select User Account");
		return;
	}
	if(transaction_type == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Select Transaction Type");
		return;
	}
	if(transaction_points == ""){
		$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text("Please Enter Points Value");
		return;
	}
	$.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/credit_debit_downline.php',
		 dataType: 'JSON',
		 data: {user_name:user_name,transaction_type:transaction_type,transaction_points:transaction_points},
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