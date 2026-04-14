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
<title><?php echo SITE_NAME; ?> | Tv Details</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Stop delay Details</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				<div class="x_title">
					<h2>Stop delay Details</h2>

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
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="event_name" name="event_name">
									<option value="">Select</option>
								</select>
							</div>
						</div>
                        <!-- 
                        <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Delay <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="number" id="delay_value" name="delay_value"   required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div> -->





						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">

								<a id="insertv" type="submit" onclick="doInsertTime()" class="btn btn-success">Submit</a>
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

<script src="../js/socket.io.js"></script> 


<script type="text/javascript">

$(document).ready(function(){

	var socket_fever = io("https://fever11.com:4002", {
			transports: ['websocket']
		});
		var socket = io("<?php echo GAME_IP; ?>", {
			transports: ['websocket']
		});

	socket_fever.on('connect', function () {
		
	});
	socket.on('connect', function () {
		
		socket.emit('getMatchesOnlyOnce', {
			eventType: 4
		});
	});
    
	
	socket.on('eventGetMatchesOnlyOnce', function (data) {
		
		
		
		if (data) {
		/* console.log("data=",data); */
			var sportdata="";
			sportdata=data.cricket;
			
			
			if (sportdata) {
				if (sportdata.body) {
				
					var list_sport = sportdata.body;
					
					var result = Object.keys(sportdata.body).length;
					/* console.log(result); */
					if (result > 0) {
						var option_html = '<option value="">Select</option>';
						for (var i in sportdata.body) {
							/* console.log(sportdata.body[i]); */
							if (sportdata.body[i]) {
								event_id = sportdata.body[i].matchid.toString();
								marketId = sportdata.body[i].marketid;
								event_name = sportdata.body[i].matchName;
								marketTime = sportdata.body[i].matchdate;
								marketDateTime = sportdata.body[i].matchdate;

								inPlay = sportdata.body[i].inPlay || "0";
								marketId = sportdata.body[i].marketid;
								marketinPlay = sportdata.body[i].inPlay || "0";
								isFancy = sportdata.body[i].fancy || "0";
								is_tv = sportdata.body[i].tv || "0";
								fancySpan = "";
								/* if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1 ) { */
									market_status = "active";
									const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

									marketTime1 = new Date(marketTime);
									marketdate = ("0" + (marketTime1.getDate())).slice(-2);
									marketMonth = monthNames[marketTime1.getMonth()];
									marketYear = marketTime1.getFullYear();
									marketHours = ("0" + (marketTime1.getHours())).slice(-2);
									marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
									var ampm = marketHours >= 12 ? 'pm' : 'am';
									 
									marketHours = marketHours % 12;
									marketHours = marketHours ? marketHours : 12;

									market_full_date = marketMonth+" "+marketdate+" "+marketYear+" "+marketHours+":"+marketMinutes+" "+ampm+ " (IST)";
									
									event_name_with_date = event_name+" "+market_full_date;
									option_html += '<option value="'+event_id+'" data-marketid="'+marketId+'">'+event_name_with_date+'</option>';
								/* } */
							}
						}
						$("#event_name").html(option_html);
						option_html = "";
					}
				}
			}
		}
	});
	
});
	function doInsertTime(){
		$("#insertv").html("Loading..");
		$("#insertv").removeAttr("onclick");
		$("#insertv").attr("disable");
		eventId = $("#event_name").val();
		
		/* if(isUrlValid(tv_url))
		{ */
			$.ajax({
				 type: 'POST',
				 url: 'event_sleep_add_proccess.php',
				 dataType: 'JSON',
				 data: {eventId:eventId},
				 success: function(response) {
					var status = response.status;
					 var message = response.message;
					 $("#insertv").html("Submit");
					$("#insertv").attr("onclick","doInsertTime()");
					$("#insertv").removeAttr("disable");
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
		/* }
		else
		{
			 $("#insertv").html("Submit");
					$("#insertv").attr("onclick","doInsertTime()");
					$("#insertv").removeAttr("disable");
			 $(".alert-danger").text("Insert proper TV URL");
			$(".alert-danger").fadeIn('fast').delay(3000).hide(0);
		} */
		
	}
   
</script>