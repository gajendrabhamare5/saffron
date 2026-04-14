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
<title><?php echo SITE_NAME; ?> | Maximum Limit</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Maximum Limit</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Maximum Limit</h2>

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

<?php

$get_max_limit = $conn->query("select * from controller_set_max_limit ORDER BY id ASC LIMIT 1");
$fetch_get_max_limit = mysqli_fetch_assoc($get_max_limit);
$max_stake = $fetch_get_max_limit['max_stake'];
$max_tennis_stake = $fetch_get_max_limit['max_tennis_stake'];
$max_soccer_stake = $fetch_get_max_limit['max_soccer_stake'];
$max_casino_stake = $fetch_get_max_limit['max_casino_stake'];
$max_fancy_stake = $fetch_get_max_limit['max_fancy_stake'];

$net_exposure_limit = $fetch_get_max_limit['net_exposure_limit'];


?>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Max Stake For Match Odds (Cricket)
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="max_stake" name="max_stake" required="required" value="<?php echo $max_stake; ?>" class="form-control col-md-7 col-xs-12">
</div>
</div>



<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Max Stake For Match Odds (Tennis)
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="max_tennis_stake" name="max_tennis_stake" required="required" value="<?php echo $max_tennis_stake; ?>" class="form-control col-md-7 col-xs-12">
</div>
</div>



<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Max Stake For Match Odds (Soccer)
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="max_soccer_stake" name="max_soccer_stake" required="required" value="<?php echo $max_soccer_stake; ?>" class="form-control col-md-7 col-xs-12">
</div>
</div>



<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Max Stake For Casino
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="max_casino_stake" name="max_casino_stake" required="required" value="<?php echo $max_casino_stake; ?>" class="form-control col-md-7 col-xs-12">
</div>
</div>


<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Max Stake For Fancy market 
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="max_fancy_stake" name="max_fancy_stake" required="required" value="<?php echo $max_fancy_stake; ?>" class="form-control col-md-7 col-xs-12">
</div>
</div>



<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Net Exposure Limit 
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="number" id="net_exposure_limit" name="net_exposure_limit" value="<?php echo $net_exposure_limit; ?>" required="required" class="form-control col-md-7 col-xs-12">
</div>
</div>


<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<a id="send" type="submit" onclick="doInsertTime()" class="btn btn-success">Submit</a>
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
function doInsertTime(){
	
	var max_stake = $("#max_stake").val();		
	var max_tennis_stake = $("#max_tennis_stake").val();		
	var max_soccer_stake = $("#max_soccer_stake").val();	
	var max_casino_stake = $("#max_casino_stake").val();		
	var max_fancy_stake = $("#max_fancy_stake").val();
	var net_exposure_limit = $("#net_exposure_limit").val();
	
	 $.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/set_max_limit_stake.php',
		 dataType: 'JSON',
		 data: {
			 max_stake:max_stake,
			 max_tennis_stake:max_tennis_stake,
			 max_soccer_stake:max_soccer_stake,
			 max_casino_stake:max_casino_stake,
			 max_fancy_stake:max_fancy_stake,
			 net_exposure_limit:net_exposure_limit,
		 },
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