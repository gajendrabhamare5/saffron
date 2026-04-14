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
														<option value="bookmaker">Bookmaker</option>
														<option value="bookmakersmall">Bookmaker small</option>
														<option value="Toss Odds">Toss Odds</option>
														<option value="Tie Odds">Tie Odds</option>
														<option value="Other Odds">Other Odds</option>
														<option value="Over">Run Market</option>
														<option value="Yes_no">Yes & NO </option>
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
												<tr><td ><a href="javascript:void(0);" onclick="one_click_apply_result()" class="btn btn-success btn-xs">Apply One Click Result</a></td>
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
		}else if(selectedmarket_type == "Yes_no"){
			html_result_type += "<select name='fancy_odds_yes_no_result' id='fancy_odds_yes_no_result'><option value=''>Select Win Status</option>";
			html_result_type +="<option value='Yes'>Yes</option>";
			html_result_type +="<option value='No'>No</option>";
			html_result_type +="<option value='Cancel'>Cancel</option>";
			html_result_type +="</select>";
		}else{
			html_result_type += "<input type='text' name='fancy_bet_result' id='fancy_bet_result' value='' /><p>Note: Write <strong>CAN</strong> To cancel this bets.</p>";
			/* html_result_type += "<a href='javascript:void(0);' class='btn btn-danger btn-xs' id='block_result'>Block Result</a>"; */
		}
		
		$("#result_type").html(html_result_type);
		
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