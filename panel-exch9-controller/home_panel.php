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
<title><?php echo SITE_NAME; ?> | Home Page Event Details</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Home Page Event Details</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				<div class="x_title">
					<h2>Home Page Event Details</h2>

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
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sport_name">Sport Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="sport_name" id="sport_name" class="form-control">

									<option value="">Select Sport Name</option>
									
									<?php
														$sport_query=$conn->query("select * from sport_list where is_delete='0'");
														while($sport_data=mysqli_fetch_assoc($sport_query)){
															$sport_id_db=$sport_data['sport_id'];
															$sport_name_db=$sport_data['sport_name'];
															?>
															<option value="<? echo $sport_id_db; ?>"><? echo $sport_name_db; ?></option>
															<?
														}
														?>
														<!-- <option value="4">Cricket</option>
														<option value="2">Tennis</option>
														<option value="1">Soccer</option>
														<option value="5">Rugby</option>
														<option value="7522">Basket Ball</option>
														<option value="3">Golf</option>
														<option value="7524">Ice Hockey</option>
														<option value="8">Election</option> -->
								</select>
							</div>
						</div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="event_name" name="event_name">
									<option value="">Select</option>
								</select>
							</div>
						</div>
						<!-- <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">URL <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" id="tv_url" name="tv_url" pattern="https://.*"  required="required" class="form-control col-md-7 col-xs-12">
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
// function isUrlValid(url) {
//     return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
// }
$(document).ready(function(){
	
  $("#sport_name").change(function(){

	
	   var selectedEvent_name = $(this).children("option:selected").val();
	   if(selectedEvent_name == 8){
		var event_id='<? echo ELECTION_EVENT_ID_NEW;?>';
		var marketId='<? echo ELECTION_MARKET_ID_NEW;?>';
		var event_name='<? echo ELECTION_MARKET_NAME_NEW;?>';
		var option_html = '<option value="'+event_id+'" data-marketid="'+marketId+'" data-marketname="'+event_name+'">'+event_name+'</option>';
		$("#event_name").html(option_html);
		return true;
	   }
	var socket_fever = io("https://fever11.com:4002", {
			transports: ['websocket']
		});
		var socket = io("<?php echo SITE_SPORTS_IP; ?>", {
			transports: ['websocket']
		});

	socket_fever.on('connect', function () {
		
	});
	socket.on('connect', function () {
		
		socket.emit('getMatchesOnlyOnce', {
			eventType: selectedEvent_name
		});
	});
    
	
	socket.on('eventGetMatchesOnlyOnce', function (data) {
		
		
		
		if (data) {
			console.log("data=",data);
			var sportdata="";
			if(selectedEvent_name=="4")
			{
				sportdata=data.cricket;
			}
			if(selectedEvent_name=="2")
			{
				sportdata=data.tennis;
			}
			if(selectedEvent_name=="1")
			{
				sportdata=data.soccer;
			}
			if(selectedEvent_name=="5")
			{
				sportdata=data.rugby;
			}
			if(selectedEvent_name=="7522")
			{
				sportdata=data.basketball;
			}
			
			if (sportdata) {
				if (sportdata.body) {
				
					var list_sport = sportdata.body;
					
					var result = Object.keys(sportdata.body).length;
					console.log(result);
					if (result > 0) {
						var option_html = '<option value="">Select</option>';
						if(selectedEvent_name == 4){
							var event_id='<? echo IPL_EVENT_TYPE_ID_NEW;?>';
							var marketId='<? echo IPL_MARKET_ID_NEW;?>';
							var event_name='<? echo IPL_MARKET_NAME_NEW;?>';
							if(event_id != ""){
								option_html += '<option value="'+event_id+'" data-marketid="'+marketId+'" data-marketname="'+event_name+'">'+event_name+'</option>';
							}
							
						}
						for (var i in sportdata.body) {
							console.log(sportdata.body[i]);
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
								// if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1 ) {
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
									option_html += '<option value="'+event_id+'" data-marketid="'+marketId+'" data-marketname="'+event_name+'">'+event_name_with_date+'</option>';
								// }
							}
						}
						$("#event_name").html(option_html);
						option_html = "";
					}
				}
				}else{
			var option_html = '<option value="">Select</option>';
			$("#event_name").html(option_html);
						option_html = "";
			}
		}
	});
	 });
});
	function doInsertTime(){
		$("#insertv").html("Loading..");
		$("#insertv").removeAttr("onclick");
		$("#insertv").attr("disable");
		eventId = $("#event_name").val();
	var	marketId = $("#event_name option:selected").data("marketid");
	var	eventName = $("#event_name option:selected").data("marketname");
		console.log("eventId",eventId);
		console.log("marketid",marketId);
		console.log("Event Name with Date:", eventName);
		sport_name = $("#sport_name").val()
		console.log("sport_name",sport_name);
		tv_url = $("#tv_url").val()
		/* if(isUrlValid(tv_url))
		{ */
			$.ajax({
				 type: 'POST',
				 url: 'home_panel_add_proccess.php',
				 dataType: 'JSON',
				 data: {eventId:eventId,sport_name:sport_name,marketId:marketId,eventName:eventName},
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