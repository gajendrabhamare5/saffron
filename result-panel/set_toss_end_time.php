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
<title><?php echo SITE_NAME; ?> | Enter Toss End Time</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Enter Toss End Time</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Enter Toss End Time</h2>

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
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event Id <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="event_id" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="event_id" placeholder="Enter Event ID" required="required" type="text">
</div>
</div>


<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="event_end_time">Event Id <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="event_end_time" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="event_end_time" required="required" type="datetime-local">
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
	var event_id = $("#event_id").val();
	var event_end_time = $("#event_end_time").val();
	
	if(event_id == ""){
		$(".alert-success").hide();
		$(".alert-danger").show();
		$(".alert-danger strong").text("Please Enter Event ID");
		return;
	}
	
	if(event_end_time == ""){
		$(".alert-success").hide();
		$(".alert-danger").show();
		$(".alert-danger strong").text("Please Set Toss End Time");
		return;
	}
	
	
	 $.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/set_toss_end_time.php',
		 dataType: 'JSON',
		 data: {event_id:event_id,event_end_time:event_end_time},
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