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
<h3>Tv Details</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Tv Details</h2>

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

<script src="../js/socket.io.js"></script> 


<script type="text/javascript">

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
			data.sport = data.cricket;
			
			if (data.sport) {
				if (data.sport.body) {
				
					var list_sport = data.sport.body;
					eventNotIncluded = data.eventNotIncluded;
					
					var result = Object.keys(data.sport.body).length;
					if (result > 0) {
						var main_datas = data;
						var main_x = data;


						smdl_c = ['1', '2'];
						mdl_c = ['1', '2'];
						dl_c = ['1', '2'];
						smdl_s = ['1', '2'];
						smdl_b = ['1', '2'];
						smdl_r = ['1', '2'];
						mdl_s = ['1', '2'];
						dl_s = ['1', '2'];
						smdl_t = ['1', '2'];
						mdl_t = ['1', '2'];
						mdl_b = ['1', '2'];
						mdl_r = ['1', '2'];
						dl_t = ['1', '2'];
						dl_b = ['1', '2'];
						dl_r = ['1', '2'];
						evnt = ['1', '2'];
						evnt = eventNotIncluded || [];
					
						data = main_datas.sport;
						
						key = Object.keys(data.body)[0];
						eventType = parseInt(data.body[key].SportId);
						var option_html = '<option value="">Select</option>';
						for (var i in data.body) {

							if (data.body[i]) {
								event_id = data.body[i].matchid.toString();
								marketId = data.body[i].marketid;
								n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
								n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString());
								n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());

								s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
								s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
								s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());

								t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
								t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
								t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());

								b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
								b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
								b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());

								r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
								r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
								r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
								e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
								if (!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !r1 && !r2 && !r3 && !e1) {
								
								
									if (eventType == 4) {
										event_name = data.body[i].matchName;

										marketTime = data.body[i].matchdate;
										marketDateTime = data.body[i].matchdate;





										inPlay = data.body[i].inPlay || "0";
										marketId = data.body[i].marketid;
										marketinPlay = data.body[i].inPlay || "0";
										isFancy = data.body[i].fancy || "0";
										is_tv = data.body[i].tv || "0";
										fancySpan = "";
										if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1 ) {
											market_status = "active";
										

										if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
											fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
										} else {
											fancy_status = "";

										}

										if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
											tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
										} else {
											tv_status = "";

										}


										var back_0="-";
										var back_1="-";
										var back_2="-";
										
										var lay_0="-";
										var lay_1="-";
										var lay_2="-";
										
										if(data.body[i].b1){
											back_0 = data.body[i].b1;
										}
										if(data.body[i].b2){
											back_1 = data.body[i].b2;
										}
										if(data.body[i].b3){
											back_2 = data.body[i].b3;
										}
										
										if(data.body[i].l1){
											lay_0 = data.body[i].l1;
										}
										if(data.body[i].l2){
											lay_1 = data.body[i].l2;
										}
										if(data.body[i].b3){
											lay_2 = data.body[i].l3;
										}
										
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
										
									

										}
									}

								}
							}

						}


						
						$("#event_name").html(option_html);
						option_html = "";
						
					}
				}
			}
		}
	});
	
	function doInsertTime(){
		eventId = $("#event_name").val() || 123;
		if(!parseInt(eventId)){
			eventId = 123;
		}
		
		console.log(eventId);
		socket_fever.emit('mapLiveTV', {
			eventId:eventId,  
		});
		
		$(".alert-success").text("Tv Mapped");
		$(".alert-success").fadeIn('fast').delay(3000).hide(0);
	}
   
</script>