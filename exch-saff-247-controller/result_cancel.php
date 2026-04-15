<?php
include( '../include/conn.php');
include "session.php";
$login_type=$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			<?php echo SITE_NAME; ?>| Controller Dashboard</title>
		<?php include( "header.php");?>
			<div class="right_col" role="main" style="min-height: 1171px;">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Result Cancel</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="clearfix"></div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_content">
									<div class="alert alert-success" style="display:none;"><strong></strong>
									</div>
									<div class="alert alert-danger" style="display:none;"><strong></strong>
									</div>
									<div class="table-responsive">
										<table class="table table-striped jambo_table bulk_action" id="">
											<thead>
												<tr class="headings">
													<td>
														Sport Name
													</td>
													<td>
														Event Name
													</td>
													<td>
														Market Name
													</td>
													<td>
														Market Type
													</td>
													<td>
														Start Date
													</td>
													<td>
														End Date
													</td>
													<td>
														Result Value
													</td>
													<td>
														
													</td>
												</tr>
											</thead>
											<tbody id="">
												<tr>
												<td>
														<select name="sport_name" id="sport_name">
														
														<option value="">Select Sport Name</option>
														<option value="4">Cricket</option>
														<option value="2">Tennis</option>
														<option value="1">Soccer</option>
														<option value="5">Rugby</option>
														<option value="7522">Basket Ball</option>
														</select>
													</td>
													
													<td>
														<select name="event_name" id="event_name">
														
														<option value="">Select Event Name</option>
														
														</select>
													</td>
													
													<td>
														<select name="market_name" id="market_name">
														
														<option value="">Select Market Name</option>
														</select>
													</td>
													<td>
														<select name="market_type" id="market_type">
														
														<option value="">Select Market Type</option>
														<option value="Match Odds">Match Odds</option>
														<option value="Over">Fancy Odds</option>
														</select>
													</td>
													
													<td>
													<input type='datetime-local' class="date_filter" id='start_time' name='start_time' value='' step=1>
													</td>
													
													<td>
													<input type='datetime-local' class="date_filter" id='end_time' name='end_time' value=''  step=1>
													</td>
													
													
													<td id="result_type">
														
													</td>
													
													<td>
													<a href="javascript:void(0);" class="btn btn-success btn-xs" id="submit_result">Submit Result</a>
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include( "footer.php");?>
				</body>
	</html>
	
<script>

$(document).ready(function(){
    $("#sport_name").change(function(){
        var selectedEvent_name = $(this).children("option:selected").val();
        
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/get_event_name.php',
			 dataType: 'JSON',
			 data: {sport_id:selectedEvent_name},
			 success: function(response) {
				 html_market_name = "";
				 html_market_name += "<option value=''>Select Event Name</option>";
				 var status = response.status;
				 var event_name_data = response.event_name_data;
				 if(status == "ok"){
					 for(i=0;i<event_name_data.length;i++){
						 html_market_name += "<option value='"+event_name_data[i].event_id+"'>"+event_name_data[i].event_name+"</option>";
					 }
					 
					 $("#event_name").html(html_market_name);
				 }
			 }
		});
		
		
    });


    $("#event_name").change(function(){
        var selectedEvent_name = $(this).children("option:selected").val();
        
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/get_market_name.php',
			 dataType: 'JSON',
			 data: {event_id:selectedEvent_name},
			 success: function(response) {
				 html_market_name = "";
				 html_market_name += "<option value=''>Select Market Name</option>";
				 var status = response.status;
				 var market_name_data = response.market_name_data;
				 if(status == "ok"){
					 for(i=0;i<market_name_data.length;i++){
						 html_market_name += "<option value='"+market_name_data[i].market_id+"'>"+market_name_data[i].market_type+" - "+market_name_data[i].market_name+"</option>";
					 }
					 
					 $("#market_name").html(html_market_name);
				 }
			 }
		});
		
		
    });
});

$(document).ready(function(){
    $("#market_type").change(function(){
        var selectedmarket_type = $(this).children("option:selected").val();
        html_result_type = "";
        
		
		
			html_result_type += "<input type='text' name='fancy_bet_result' id='fancy_bet_result' value='' /><p>Note: Write <strong>CAN</strong> To cancel this bets.</p>";
		
		
		$("#result_type").html(html_result_type);
		
    });
});

jQuery(document).on("click", "#submit_result", function () {
	var event_name = $("#event_name").val();
	var market_name = $("#market_name").val();
	var market_type = $("#market_type").val();
	var match_odds_result = $("#match_odds_result").val();
	var toss_odds_result = $("#toss_odds_result").val();
	var tie_odds_result = $("#tie_odds_result").val();
	var other_odds_result = $("#other_odds_result").val();
	var fancy_bet_result = $("#fancy_bet_result").val();
	var fancy_odds_yes_no_result = $("#fancy_odds_yes_no_result").val();
	var start_time = $("#start_time").val();
	var end_time = $("#end_time").val();
	if(event_name == ""){
		$(".alert-success").hide();
		$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
		$(".alert-danger strong").text("Please Select Event name");
		return;
	}
	
	if(market_name == ""){
		$(".alert-success").hide();
		$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
		$(".alert-danger strong").text("Please Select Market name");
		return;
	}
	
	if(market_type == ""){
		$(".alert-success").hide();
		$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
		$(".alert-danger strong").text("Please Select Market Type");
		return;
	}
	
		if(fancy_bet_result == ""){
			$(".alert-success").hide();
			$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
			$(".alert-danger strong").text("Please Set Result Staus");
			return;
		}
		
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/all_bet_cancel.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,market_id:market_name,market_type:market_type,match_odds_result:fancy_bet_result,start_time:start_time,end_time:end_time},
			 success: function(response) {
					var status  = response.status;
			var message  = response.message;
				if(status == "ok"){
					$(".alert-danger").hide();
					$(".alert-success").fadeIn('slow').delay(3000).hide(0);
					$(".alert-success strong").text(message);
				}else{
					$(".alert-success").hide();
					$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
					$(".alert-danger strong").text(message);
				}
			 }
		});
	
});


function one_click_apply_result(){
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/one_click_result.php',
			 dataType: 'JSON',
			 data: {1:1},
			 success: function(response) {
					var status  = response.status;
					var message  = response.message;
				if(status == "ok"){
					$(".alert-danger").hide();
					$(".alert-success").fadeIn('slow').delay(3000).hide(0);
					$(".alert-success strong").text(message);
				}else{
					$(".alert-success").hide();
					$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
					$(".alert-danger strong").text(message);
				}
			 }
		});
}
</script>