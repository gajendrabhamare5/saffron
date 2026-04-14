<?php
include('../include/conn.php');
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type=$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

$get_my_marquee = $conn->query("select * from marquee_message where user_id=$user_id");
$fetch_get_my_marquee = mysqli_fetch_assoc($get_my_marquee);
$current_marquee_data = $fetch_get_my_marquee['marquee_data'];
$current_marquee_end_time = $fetch_get_my_marquee['end_time'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Marquee Message</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Marquee Message </h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Marquee Message </h2>

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
/* if(strtotime(date('Y-m-d H:i:s')) > strtotime($current_marquee_end_time)){
?>
<h4 style="color:red;text-align: center;" class="expire_marquee_heading">Your Marquee is Expired Now.</h4>
<?php	
}else{
?>
<h4 style="color:red;text-align: center;" class="current_time_marquee_heading">Current Marquee End Time: <?php echo date("d-m-Y H:i:s",strtotime($current_marquee_end_time)); ?></h4>
<?php
} */
?>



<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Current Marquee <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="marquee_data" name="marquee_data" required="required" value="<?php echo $current_marquee_data; ?>" class="form-control col-md-7 col-xs-12">
</div>
</div>





<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<a id="send" type="submit" onclick="setMarqueeData()" class="btn btn-success">Submit</a>
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
function setMarqueeData(){

marquee_data = $("#marquee_data").val();
	
	 $.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/set_marquee.php',
		 dataType: 'JSON',
		 data: {marquee_data:marquee_data},
		 success: function(response) {
			var status  = response.status;
			var message  = response.message;
			if(status == "ok"){
				$(".alert-success").show();
				$(".alert-danger").hide();
				$(".alert-success strong").text(message);
				var end_time  = response.end_time;
				$(".current_time_marquee_heading").text(end_time);
			}else{
				$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text(message);
			}
		 }
	 });
	
	
					
}
</script>