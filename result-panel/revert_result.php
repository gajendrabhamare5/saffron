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
							<h3>Revert Result Apply</h3>
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
														Event Name
													</td>
													
												</tr>
											</thead>
											<tbody id="">
												<tr>
													<td>
														<select name="event_name" id="event_name">
														
														<option value="">Select Event Name</option>
														<?php
														$current_date =  date('Y-m-d H:i:s', strtotime('-3 day', strtotime(date("Y-m-d H:i:s"))));
														
														$get_active_event_name = $conn->query("select  * from bet_details where bet_time>='$current_date' GROUP BY event_id ORDER BY event_name");
														while($fetch_get_active_event_name = mysqli_fetch_assoc($get_active_event_name)){
														?>
														<option value="<?php echo $fetch_get_active_event_name['event_id']; ?>"><?php echo $fetch_get_active_event_name['event_name']; ?></option>
														<?php
														}
														?>
														</select>
													</td>
													
													
												</tr>
											</tbody>
										</table>
										
										<table class="table table-striped jambo_table bulk_action" id="">
								<thead>
									<tr class="headings">
										
											<th class="column-title" style="display: table-cell;">User Name</th>
											
											<th class="column-title" style="display: table-cell;">Event</th>
											<th class="column-title" style="display: table-cell;">Market </th>
											<th class="column-title" style="display: table-cell;">Selection </th>
											<th class="column-title" style="display: table-cell;">Type </th>
											<th class="column-title" style="display: table-cell;">Stake	 </th>
											<th class="column-title" style="display: table-cell;">Bet Amount</th>
											<th class="column-title" style="display: table-cell;">Rate</th>
											<th class="column-title" style="display: table-cell;">Odds</th>
											<th class="column-title" style="display: table-cell;">Win</th>
											<th class="column-title" style="display: table-cell;">Loss</th>
											<th class="column-title" style="display: table-cell;">Result</th>
											<th class="column-title" style="display: table-cell;">Action</th>
											<th class="column-title" style="display: table-cell;">Date Time</th>
											
										</tr>
									</thead>
									<tbody id="active_bet_ticker">
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
    $("#event_name").change(function(){
        var selectedEvent_name = $(this).children("option:selected").val();
        
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/revert_result.php',
			 dataType: 'JSON',
			 data: {event_id:selectedEvent_name},
			 success: function(response) {
				 var bet_ticker  = response.bet_ticker;
				
				bet_ticker_html ="";
				for(i=0;i<bet_ticker.length;i++){
					bet_id = bet_ticker[i].bet_id;
					user_name = bet_ticker[i].user_name;
					dl_name = bet_ticker[i].dl_name;
					mdl_name = bet_ticker[i].mdl_name;
					event_name = bet_ticker[i].event_name;
					market_name = bet_ticker[i].market_name;
					type = bet_ticker[i].type;
					stake = bet_ticker[i].stake;
					rate = bet_ticker[i].rate;
					odds = bet_ticker[i].odds;
					win = bet_ticker[i].win;
					loss = bet_ticker[i].loss;
					margin_used = bet_ticker[i].margin_used;
					date_time = bet_ticker[i].date_time;
					market_type = bet_ticker[i].market_type;
					bet_result = bet_ticker[i].bet_result;
					var result_label;
					if(bet_result > 0){
						result_label ="Win";
					}else{
						result_label ="Loss";
					}
					
					bet_ticker_html +="<tr>";
					bet_ticker_html +="<td>"+user_name+"</td>";
					
					
					
					bet_ticker_html +="<td>"+event_name+"</td>";
					bet_ticker_html +="<td>"+market_type+"</td>";
					bet_ticker_html +="<td>"+market_name+"</td>";
					bet_ticker_html +="<td>"+type+"</td>";
					bet_ticker_html +="<td>"+stake+"</td>";
					bet_ticker_html +="<td>"+margin_used+"</td>";
					bet_ticker_html +="<td>"+rate+"</td>";
					bet_ticker_html +="<td>"+odds+"</td>";
					bet_ticker_html +="<td>"+win+"</td>";
					bet_ticker_html +="<td>"+loss+"</td>";
					bet_ticker_html +="<td>"+result_label+"</td>";
					bet_ticker_html +="<td><a href='javascript:void(0)' class='btn btn-success btn-xs' onclick='revert_result("+bet_id+")'> Revert Entry </a></td>";
					bet_ticker_html +="<td>"+date_time+"</td>";
					
					bet_ticker_html +="</tr>";
				}
				
					$("#active_bet_ticker").html(bet_ticker_html);
			 }
		});
		
		
    });
});

function revert_result(bet_id){
	
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/apply_revert_result.php',
			 dataType: 'JSON',
			 data: {bet_id:bet_id},
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
			betUpdate();
			 }
		});
}
</script>