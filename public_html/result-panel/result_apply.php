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
			<?php echo SITE_NAME; ?>| Result</title>
		<?php include( "header.php");?>
			<div class="right_col" role="main" style="min-height: 1171px;">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Result Apply</h3>
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
														Result Value
													</td>
													<td>
														Profit Loss
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
														<option value="bookmaker">Bookmaker</option>
														<option value="bookmakersmall">Bookmaker small</option>
														<option value="Toss Odds">Toss Odds</option>
														<option value="Tie Odds">Tie Odds</option>
														<option value="Other Odds">Other Odds</option>
														<option value="Over">Run Market</option>
														<option value="lottery">Lottery</option>
														<option value="Yes_no">Yes & NO </option>
														<option value="odd_even">ODD & EVEN </option>
														<option value="khado">Khado </option>
														<option value="meter">Meter </option>
														</select>
													</td>
													<td id="result_type">
														
													</td>
													<td id="result_profit_loss">
														
													</td>
													<td>
													<a href="javascript:void(0);" class="btn btn-success btn-xs" id="submit_result">Submit Result</a>
													</td>
												</tr>
												<tr><td ><a href="javascript:void(0);" onclick="one_click_apply_result()" style="display:none;" class="btn btn-success btn-xs">Apply One Click Result</a></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					
									
<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Result Details</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			
				<div class="x_panel">
				
				
				<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Event Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							
							<?php
							$current_date =  date('Y-m-d H:i:s', strtotime('-2 day', strtotime(date("Y-m-d H:i:s"))));
														
	$get_active_market_name = $conn->query("select  * from bet_details where  bet_time>='$current_date' and bet_status=0 and market_type='FANCY_ODDS' GROUP BY event_id,oddsmarketId ORDER BY bet_time DESC");
										
	$event_list = array();
	while($fetch_get_active_market_name = mysqli_fetch_assoc($get_active_market_name)){
		$event_id = $fetch_get_active_market_name['event_id'];
		$event_name = $fetch_get_active_market_name['event_name'];
		$bet_time = $fetch_get_active_market_name['bet_time'];
		$oddsmarketId = $fetch_get_active_market_name['oddsmarketId'];
		$event_list[$event_id] = $event_id;
		$bet_time = date("d-m-Y",strtotime($bet_time));
		$market_name_data[] = array(
								"event_id"=>$event_id,
								"event_name"=>$event_name,
								"bet_time"=>$bet_time,
								"oddsmarketId"=>$oddsmarketId,
								);
	}
	

	
	$market_name_data1 = array_map("unserialize", array_unique(array_map("serialize", $market_name_data)));
	$market_name_data = array();
	foreach($market_name_data1 as $market_name_data111){
		$market_name_data[] = array(
								"event_id"=>$market_name_data111['event_id'],
								"event_name"=>$market_name_data111['event_name'],
								"bet_time"=>$market_name_data111['bet_time'],
								"oddsmarketId"=>$market_name_data111['oddsmarketId'],
								);
	}
							?>
							<select id="event_name1">
								<option value="">Select Event</option>
								<?php
									foreach($market_name_data as $market_data){
										?>
										<option value="<?php echo $market_data['event_id']; ?>" data-oddsmarketId="<?php echo $market_data['oddsmarketId']; ?>"><?php echo $market_data['event_name']; ?> (<?php echo $market_data['bet_time']; ?>)</option>
										<?php
									}
								?>
								
							</select>
							
							
							</div>
							</div>
							</div>
					</div>
					<?php/*<div class="col-md-4" style="display:none;">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Market Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							<input type="text" class="form-control" name="market_name" id="market_name" onkeyup="betUpdate()" onchange="betUpdate()"  value="<?php if($_REQUEST['market_name']){ echo $_REQUEST['market_name']; } ?>">
							
							</div>
							</div>
							</div>
					</div> */ ?>
					<div class="x_content">
						<div class="alert alert-success" style="display:none;">
  <strong></strong>
</div>
<div class="alert alert-danger" style="display:none;">
  <strong></strong>
</div>
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action" id="">
								<thead>
									<tr class="headings">
										
											<th class="column-title" style="display: table-cell;">Event</th>
											<th class="column-title" style="display: table-cell;">Market </th>
											<th class="column-title" style="display: table-cell;">Result</th>
											<th class="column-title" style="display: table-cell;">PNL</th>
											<th class="column-title" style="display: table-cell;">Date Time</th>
											<th class="column-title" style="display: table-cell;">Edit</th>
											<th class="column-title" style="display: table-cell;">Delete</th>
											
										</tr>
									</thead>
									<tbody id="active_bet_ticker">
									
									<tr class="">
											<td>No data</td>
											
											
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
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
        var sport_id=$("#sport_name").val();
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/get_market_name.php',
			 dataType: 'JSON',
			 data: {event_id:selectedEvent_name,sport_id:sport_id},
			 success: function(response) {
				 html_market_name = "";
				 html_market_name += "<option value=''>Select Market Name</option>";
				 var status = response.status;
				 var market_name_data = response.market_name_data;
				 if(status == "ok"){
					 for(i=0;i<market_name_data.length;i++){
						 html_market_name += "<option value='"+market_name_data[i].market_id+"' data-mmtype='"+market_name_data[i].market_type+"' data-db_market_type='"+market_name_data[i].market_type+"'>"+market_name_data[i].market_type+" - "+market_name_data[i].market_name+"</option>";
					 }
					 
					 $("#market_name").html(html_market_name);
				 }
			 }
		});
		
		
    });
});


function market_change(){
	selectedEvent_name = $("#event_name").val();
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
						 selected_value = "";
						 if(i == 0){
							 selected_value = "selected='selected'";
						 }
						 html_market_name += "<option value='"+market_name_data[i].market_id+"' "+selected_value+" data-mmtype='"+market_name_data[i].market_type+"' data-db_market_type='"+market_name_data[i].market_type+"'>"+market_name_data[i].market_type+" - "+market_name_data[i].market_name+"</option>";
					 }
					 
					 $("#market_name").html(html_market_name);
				 }
			 }
		});
}

 
$(document).ready(function(){
    $("#market_type").change(function(){
        var selectedmarket_type = $(this).children("option:selected").val();
        html_result_type = "";
        
		
		if(selectedmarket_type == "Match Odds" || selectedmarket_type == "bookmaker" || selectedmarket_type == "bookmakersmall"){
			html_result_type += "<select name='match_odds_result' id='match_odds_result'><option value=''>Select Result Status</option>";
			html_result_type +="<option value='Win'>Win</option>";
			html_result_type +="<option value='Loss'>Loss</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}else if(selectedmarket_type == "Toss Odds"){
			html_result_type += "<select name='toss_odds_result' id='toss_odds_result'><option value=''>Select Result Status</option>";
			html_result_type +="<option value='Win'>Win</option>";
			html_result_type +="<option value='Loss'>Loss</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}else if(selectedmarket_type == "Tie Odds"){
			html_result_type += "<select name='tie_odds_result' id='tie_odds_result'><option value=''>Select Result Status</option>";
			html_result_type +="<option value='Win'>Win</option>";
			html_result_type +="<option value='Loss'>Loss</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}else if(selectedmarket_type == "Other Odds"){
			html_result_type += "<select name='other_odds_result' id='other_odds_result'><option value=''>Select Result Status</option>";
			html_result_type +="<option value='Win'>Win</option>";
			html_result_type +="<option value='Loss'>Loss</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}
                else if(selectedmarket_type == "Yes_no"){
			html_result_type += "<select name='fancy_odds_yes_no_result' id='fancy_odds_yes_no_result'><option value=''>Select Win Status</option>";
			html_result_type +="<option value='Yes'>Yes</option>";
			html_result_type +="<option value='No'>No</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}
                else if(selectedmarket_type == "odd_even"){
			html_result_type += "<select name='fancy_odds_yes_no_result' id='fancy_odds_yes_no_result'><option value=''>Select Win Status</option>";
			html_result_type +="<option value='odd'>ODD(1,3,5)</option>";
			html_result_type +="<option value='even'>EVEN(0,2,4)</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}
                else{
			html_result_type += "<input type='text' name='fancy_bet_result' id='fancy_bet_result' value='' /><p>Note: Write <strong>CAN</strong> To cancel this bets.</p>";
			html_result_type += "<a href='javascript:void(0);' class='btn btn-danger btn-xs' id='block_result'>Block Result</a>";
		}
		
		$("#result_type").html(html_result_type);
		
    });
	
	$("#result_market_type").change(function(){
        var selectedmarket_type = $(this).children("option:selected").val();
        html_result_type = "";
        
		
		if(selectedmarket_type == "Yes_no"){
			html_result_type += "<select name='change_fancy_odds_yes_no_result' id='change_fancy_odds_yes_no_result'><option value=''>Select Win Status</option>";
			html_result_type +="<option value='Yes'>Yes</option>";
			html_result_type +="<option value='No'>No</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}
        else if(selectedmarket_type == "odd_even"){
			html_result_type += "<select name='change_fancy_odds_yes_no_result' id='change_fancy_odds_yes_no_result'><option value=''>Select Win Status</option>";
			html_result_type +="<option value='odd'>ODD(1,3,5)</option>";
			html_result_type +="<option value='even'>EVEN(0,2,4)</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}
        else{
			html_result_type += "<input type='text' name='change_fancy_bet_result' id='change_fancy_bet_result' value='' />";
			
		}
		
		$("#change_result_type").html(html_result_type);
		$("#change_fancy_bet_result").val($("#result_market_runs").val());
		
    });
});

jQuery(document).on("click", "#block_result", function () {
	var event_name = $("#event_name").val();
	var market_name = $("#market_name").val();
	var market_type = $("#market_type").val();
	var fancy_bet_result = $("#fancy_bet_result").val();
	var result_profit_loss = $("#result_profit_loss").text();
	
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
		$(".alert-danger strong").text("Please Enter Fancy Result");
		return;
	}
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/apply_result_block.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,market_id:market_name,market_type:market_type,fancy_bet_result:fancy_bet_result,result_profit_loss:result_profit_loss},
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
jQuery(document).on("change", "#fancy_bet_result", function () {
	var event_name = $("#event_name").val();
	var market_name = $("#market_name").val();
	var market_type = $("#market_type").val();
	var fancy_bet_result = $("#fancy_bet_result").val();
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
		$(".alert-danger strong").text("Please Enter Fancy Result");
		return;
	}
	
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/get_profit_loss_before_result.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,market_id:market_name,market_type:market_type,match_odds_result:fancy_bet_result},
			 success: function(response) {
				 console.log(response);
					var status  = response.status;
			var profit_loss  = response.profit_loss;
				if(status == "ok"){
					$("#result_profit_loss").text(profit_loss);
				}else{
					$("#result_profit_loss").text(profit_loss);
				}
			 }
		});
	
});
jQuery(document).on("click", "#submit_result", function () {
	$("#submit_result").attr("disabled","disabled");
	var event_name = $("#event_name").val();
	var market_name = $("#market_name").val();
	var market_type = $("#market_type").val();
	var match_odds_result = $("#match_odds_result").val();
	var toss_odds_result = $("#toss_odds_result").val();
	var tie_odds_result = $("#tie_odds_result").val();
	var other_odds_result = $("#other_odds_result").val();
	var fancy_bet_result = $("#fancy_bet_result").val();
	var fancy_odds_yes_no_result = $("#fancy_odds_yes_no_result").val();
	var db_market_type = $("#market_name").children("option:selected").attr('data-db_market_type');
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
	
	var mmtype = "";
	if(market_type == ""){
		mmtype = $("#market_name").children("option:selected").attr('data-mmtype');
	}
	
	if(market_type == "Match Odds" || market_type =="Toss Odds" || market_type =="Tie Odds" || market_type == "Other Odds"){
		if(market_type == "Match Odds"){
			if(match_odds_result == ""){
				$(".alert-success").hide();
				$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
				$(".alert-danger strong").text("Please Set Result Staus");
				return;
			}
			match_odds_result = match_odds_result;
		}
		
		if(market_type =="Toss Odds"){
			if(toss_odds_result == ""){
				$(".alert-success").hide();
				$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
				$(".alert-danger strong").text("Please Set Result Staus");
				return;
			}
			match_odds_result = toss_odds_result;
		}
		
		if(market_type =="Tie Odds"){
			if(tie_odds_result == ""){
				$(".alert-success").hide();
				$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
				$(".alert-danger strong").text("Please Set Result Staus");
				return;
			}
			match_odds_result = tie_odds_result;
		}
		
		if(market_type =="Other Odds"){
			if(other_odds_result == ""){
				$(".alert-success").hide();
				$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
				$(".alert-danger strong").text("Please Set Result Staus");
				return;
			}
			match_odds_result = other_odds_result;
		}
		
		
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/match_odds_result_apply.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,market_id:market_name,market_type:market_type,match_odds_result:match_odds_result,mmtype:mmtype,db_market_type:db_market_type},
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
	
	else if(market_type == "bookmaker" || market_type == "bookmakersmall"){
            if(match_odds_result == ""){
                $(".alert-success").hide();
                $(".alert-danger").fadeIn('slow').delay(3000).hide(0);
                $(".alert-danger strong").text("Please Set Result Staus");
                return;
            }
            
			
			
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/bookmaker_result_apply.php',
                dataType: 'JSON',
                data: {event_id:event_name,market_id:market_name,market_type:market_type,match_odds_result:match_odds_result},
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
	else if(market_type == "Yes_no" || market_type == "odd_even"){
		
		if(fancy_odds_yes_no_result == ""){
			$(".alert-success").hide();
			$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
			$(".alert-danger strong").text("Please Select..!");
			return;
		}
		
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/fancy_odds_result_apply.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,market_id:market_name,market_type:market_type,match_odds_result:fancy_odds_yes_no_result},
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
	else if(market_type == "Yes_no"){
		
		if(fancy_odds_yes_no_result == ""){
			$(".alert-success").hide();
			$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
			$(".alert-danger strong").text("Please Select Yes & No Result Status");
			return;
		}
		
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/fancy_odds_result_apply.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,market_id:market_name,market_type:market_type,match_odds_result:fancy_odds_yes_no_result},
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
		
	}else{
		if(fancy_bet_result == ""){
			$(".alert-success").hide();
			$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
			$(".alert-danger strong").text("Please Set Result Staus");
			return;
		}
		
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/fancy_odds_result_apply.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,market_id:market_name,market_type:market_type,match_odds_result:fancy_bet_result},
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


<script>


$("#event_name1").change(function(){
	betUpdate();
});
function betUpdate(){
	var event_name = $("#event_name1").val();
	var market_name = $("#market_name").val();
	
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/view_last_bet.php',
			 dataType: 'JSON',
			 data: {event_name:event_name,market_name:market_name},
			 success: function(response) {
				console.log(response);
				var bet_ticker  = response.bet_ticker;
				
				bet_ticker_html ="";
				for(i=0;i<bet_ticker.length;i++){
					event_name = bet_ticker[i].event_name;
					market_name = bet_ticker[i].market_name;
					result_runs = bet_ticker[i].result_runs;
					result_date_time = bet_ticker[i].result_date_time;
					total_pnl = bet_ticker[i].total_pnl;
					result_market_type = bet_ticker[i].result_market_type;
					
					eventId = bet_ticker[i].eventId;
					marketId = bet_ticker[i].marketId;
					if(!result_runs){
						result_runs = "0";
					}
					bet_ticker_html +="<tr>";
					bet_ticker_html +="<td>"+event_name+"</td>";
					bet_ticker_html +="<td>"+market_name+"</td>";
					bet_ticker_html +="<td>"+result_runs+"</td>";
					bet_ticker_html +="<td>"+total_pnl+"</td>";
					bet_ticker_html +="<td>"+result_date_time+"</td>";
					bet_ticker_html +="<td><a class='btn btn-success' href='javascript:void(0);'  data-toggle='modal' data-target='#myModal' onclick='view_rsult_popup("+eventId+","+marketId+","+result_runs+",\""+result_market_type+"\")'>Edit</a></td>";
					bet_ticker_html +="<td><a class='btn btn-danger' href='javascript:void(0);' onclick='delete_result("+eventId+","+marketId+")'>Delete</a></td>";
					
					bet_ticker_html +="</tr>";
				}
				
					$("#active_bet_ticker").html(bet_ticker_html);
			 }
		 });
}

	var event_name = $("#event_name1").val();
	var market_name = $("#market_name").val();
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/view_last_bet.php',
			 dataType: 'JSON',
			 data: {event_name:event_name,market_name:market_name},
			 success: function(response) {
				
				var bet_ticker  = response.bet_ticker;
				
				bet_ticker_html ="";
				for(i=0;i<bet_ticker.length;i++){
					event_name = bet_ticker[i].event_name;
					market_name = bet_ticker[i].market_name;
					result_runs = bet_ticker[i].result_runs;
					result_date_time = bet_ticker[i].result_date_time;
					result_market_type = bet_ticker[i].result_market_type;
					
					
					
					eventId = bet_ticker[i].eventId;
					marketId = bet_ticker[i].marketId;
					total_pnl = bet_ticker[i].total_pnl;
					
					
					bet_ticker_html +="<tr>";
					bet_ticker_html +="<td>"+event_name+"</td>";
					bet_ticker_html +="<td>"+market_name+"</td>";
					bet_ticker_html +="<td>"+result_runs+"</td>";
					bet_ticker_html +="<td>"+total_pnl+"</td>";
					bet_ticker_html +="<td>"+result_date_time+"</td>";
					bet_ticker_html +="<td><a class='btn btn-success' href='javascript:void(0);' data-toggle='modal' data-target='#myModal' onclick='view_rsult_popup("+eventId+","+marketId+","+result_runs+",\""+result_market_type+"\")'>Edit</a></td>";
					
					bet_ticker_html +="<td><a class='btn btn-danger' href='javascript:void(0);' onclick='delete_result("+eventId+","+marketId+")'>Delete</a></td>";
					bet_ticker_html +="</tr>";
				}
				
					$("#active_bet_ticker").html(bet_ticker_html);
			 }
		 });

		 function view_rsult_popup(event_id,market_id,result_runs,result_market_type){
			 
			 $('#result_event_id').val(event_id);
			 $('#result_market_id').val(market_id);
			 $('#result_market_runs').val(result_runs);
			 $('#result_type_heading').text(result_market_type+" Market");
			 $('#result_market_type').val("");
			 $('#change_result_type').html("");
			 
			/*  $.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/view_last_bet.php',
			 dataType: 'JSON',
			 data: {event_name:event_name,market_name:market_name},
			 success: function(response) {
				 
			 }
			 }); */
		 }
		 
		 function changeResult(){
			 result_event_id = $("#result_event_id").val();
			 result_market_id = $("#result_market_id").val();
			 change_fancy_bet_result = $("#change_fancy_bet_result").val();
			 result_market_type = $("#result_market_type").val();
			 
			 $("#show_error").hide();
			 $("#show_msg").hide();
			 
			 if(result_market_type == ""){
				$("#show_error").show();
				$("#show_msg").hide();
				$("#show_error").text("Select Market Type");
				return false;
			 }
			 if(change_fancy_bet_result == ""){
				$("#show_error").show();
				$("#show_msg").hide();
				$("#show_error").text("Select Result Status/Value");
				return false;
			 }
			 
			 
			  $.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/change_result.php',
			 dataType: 'JSON',
			 data: {result_event_id:result_event_id,result_market_id:result_market_id,result_market_runs:change_fancy_bet_result,result_market_type:result_market_type},
			 success: function(response) {
				 status = response.status;
				 message = response.message;
				 if(status == "ok"){
					 $("#show_msg").text(message);
					 $("#show_error").hide();
					 $("#show_msg").show();
					 betUpdate();
				 }else{
					 $("#show_error").show();
					 $("#show_msg").hide();
					 
					 $("#show_error").text(message);
				 }
			 }
			 });
		 }
		 
		 function delete_result(event_id,market_id){
			  if (!confirm('Are you sure?')) return false;
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/apply_revert_marketwise_result.php',
				 dataType: 'JSON',
				 data: {event_id:event_id,market_id:market_id},
				 success: function(response) {
					var status  = response.status;
				var message  = response.message;
				if(status == "ok"){
					$(".alert-success").show();
					$(".alert-danger").hide();
					$(".alert-success strong").text(message);
					betUpdate();
				}else{
					$(".alert-success").hide();
					$(".alert-danger").show();
					$(".alert-danger strong").text(message);
				}
				 }
			});
		 }
</script>


<div class="modal" id="myModal">
  <div class="modal-dialog" style="">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Result</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
			<input type="hidden" id="result_event_id" value="" />
			<input type="hidden" id="result_market_id" value="" />
			
			<p id="result_type_heading"></p>
			<select name="result_market_type" id="result_market_type" >
														
														<option value="" selected='selected'>Select Market Type</option>
														<option value="Over">Run Market</option>
														<option value="Yes_no">Yes & NO </option>
														<option value="odd_even">ODD & EVEN </option>
														<option value="khado">Khado </option>
														<option value="meter">Meter </option>
														</select>
														</br>
														</br>
											<div id="change_result_type"></div>
											</br>
											<input type="text" id="result_market_runs" style="display:none;" value="" />
      </div>

      <!-- Modal footer -->
	  <div class="alert alert-danger" id="show_error" style="display:none;"></div>
	  <div class="alert alert-success" id="show_msg" style="display:none;"></div>
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="changeResult()">Change</button>
      </div>

    </div>
  </div>
</div> 