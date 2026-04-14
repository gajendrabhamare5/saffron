<?php
include('../include/conn.php');
include "session.php";
$user_id= 1;
$maintanance="0";
$fetch_unser=$conn->query("select * from casino_under_maintanance limit 1");
if(mysqli_num_rows($fetch_unser) > 0){
	$data_under=mysqli_fetch_assoc($fetch_unser);
	$maintanance=$data_under['type'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Result Dashboard</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">		<div class="page-title">			

<div class="title_left">				<h3>Welcome to Result Panel</h3>			 </div>	



</div>	
<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				
				<div class="x_content">

					<div class="alert alert-success" style="display:none;">
						<strong></strong>
					</div>
					<div class="alert alert-danger" style="display:none;">
						<strong></strong>
					</div>
<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<?php
								if($maintanance=="0"){
									?>
									<a id="send" type="submit" onclick="doInsertTime(1)" class="btn btn-danger">Set Casino Under Maintanance</a>
									<?php
								}
								if($maintanance=="1")
								{
									?>
									<a id="send" type="submit" onclick="doInsertTime(0)" class="btn btn-success">Set Casino Live</a>
									<?php
								}
								?>
							</div>
						</div>
				</div>
				</div>
			</div>
		</div>

	<div class="clearfix"></div>		






</div>

</div>

<?php
include("footer.php");
?>
</body>
<script>
function doInsertTime(type){
	var msg="";
	if(type=="1")
	{
		msg="Are you sure want to set casino under maintanance"
	}
	if(type=="0")
	{
		msg="Are you sure want to set casino live"
	}
	if(confirm(msg)){
	$.ajax({
			 type: 'POST',
			 url: 'undermaintanance_proccess.php',
			 dataType: 'JSON',
			 data: {type:type},
			 success: function(response) {
				var status = response.status;
				var casino_type = response.casino_type;
				 var message = response.message;
				 if(status == "ok"){
					$(".alert-success").text(message);
					$(".alert-success").fadeIn('fast').delay(3000).hide(0);
					setTimeout(function(){
						location.reload();
					},2000);
				 }
				 else
				 {
					 $(".alert-danger").text(message);
					$(".alert-danger").fadeIn('fast').delay(3000).hide(0);
				 }
			 }
		});
	}
}
</script>
</html>