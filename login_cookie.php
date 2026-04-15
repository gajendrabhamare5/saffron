<?php
include('../include/conn.php');
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type=$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

$get_my_marquee = $conn->query("select * from marquee_message where user_id=$user_id");
$fetch_get_my_marquee = mysqli_fetch_assoc($get_my_marquee);
$current_login_cookie_data = $fetch_get_my_marquee['login_cookie_data'];
$current_marquee_end_time = $fetch_get_my_marquee['end_time'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Login Cookie </title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Login Cookie  </h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Login Cookie  </h2>

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
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Login Cookie <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<textarea id="login_cookie_data" name="login_cookie_data" required="required" value="" class="form-control col-md-7 col-xs-12" style="height: 350px;"></textarea>
</div>
</div>





<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<a id="send" type="submit" onclick="setlogincookieData()" class="btn btn-success">Submit</a>
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
<script type="text/javascript" src="../../js/socket.io.js"></script>
<script>
var socket = io("http://5.189.170.200:4003");
 socket.on('connect', function() {
	 
 });
function setlogincookieData(){

login_cookie_data = $("#login_cookie_data").val();
	
	 $.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/set_login_cookie.php',
		 dataType: 'JSON',
		 data: {login_cookie_data:login_cookie_data},
		 success: function(response) {
			var status  = response.status;
			var message  = response.message;
			if(status == "ok"){
				$(".alert-success").show();
				$(".alert-danger").hide();
				$(".alert-success strong").text(message);
				socket.emit('cookie', {
						"cookie":login_cookie_data
					});
			}else{
				$(".alert-success").hide();
				$(".alert-danger").show();
				$(".alert-danger strong").text(message);
			}
		 }
	 });
	
	
					
}
</script>