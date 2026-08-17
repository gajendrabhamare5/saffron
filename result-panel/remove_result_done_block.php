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
			<?php echo SITE_NAME; ?>| Result Dashboard</title>
	</head>
	<body>
		<?php include( "header.php");?>
			<div class="right_col" role="main" style="min-height: 1171px;">
				<div class="">
					
					<div class="clearfix"></div>
					
					
					
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
														
	$get_active_market_name = $conn->query("select  * from bet_details where  bet_time>='$current_date' and bet_status IN (0,1) and market_type='FANCY_ODDS' GROUP BY event_id ORDER BY bet_time DESC");
														
	while($fetch_get_active_market_name = mysqli_fetch_assoc($get_active_market_name)){
		$event_id = $fetch_get_active_market_name['event_id'];
		$event_name = $fetch_get_active_market_name['event_name'];
		$bet_time = $fetch_get_active_market_name['bet_time'];
		
		$bet_time = date("d-m-Y",strtotime($bet_time));
		$market_name_data[] = array(
								"event_id"=>$event_id,
								"event_name"=>$event_name,
								"bet_time"=>$bet_time,
								);
	}
	

	$market_name_data1 = array_map("unserialize", array_unique(array_map("serialize", $market_name_data)));
	$market_name_data = array();
	foreach($market_name_data1 as $market_name_data111){
		$market_name_data[] = array(
								"event_id"=>$market_name_data111['event_id'],
								"event_name"=>$market_name_data111['event_name'],
								"bet_time"=>$market_name_data111['bet_time'],
								);
	}
							?>
							<select id="event_name1">
								<option value="">Select Event</option>
								<?php
									foreach($market_name_data as $market_data){
										?>
										<option value="<?php echo $market_data['event_id']; ?>"><?php echo $market_data['event_name']; ?> (<?php echo $market_data['bet_time']; ?>)</option>
										<?php
									}
								?>
								
							</select>
							
							
							</div>
							</div>
							</div>
					</div>
					
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
											<th class="column-title" style="display: table-cell;">Date Time</th>
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
	<script src="../assets/js/socket.io.js"></script>   
<script>
var socket = io("https://fever11.com:4002");
socket.on('connect', function() {
});

</script>

<script>
/* 
$(document).ready(function() {
  $("#event_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_last_2_days_event_name.php",
	select: function(){
         betUpdate();
    }
  });
}); */
/* $(document).ready(function() {
  $("#market_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_last_2_days_market_name.php",
	select: function(){
         betUpdate();
    }
  });
}); */

//setInterval(function(){

$("#event_name1").change(function(){
	betUpdate();
});
function betUpdate(){
	var event_name = $("#event_name1").val();
	var market_name = $("#market_name").val();
	
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/view_last_bet_result_done.php',
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
					eventId = bet_ticker[i].eventId;
					marketId = bet_ticker[i].marketId;
					
					bet_ticker_html +="<tr>";
					bet_ticker_html +="<td>"+event_name+"</td>";
					bet_ticker_html +="<td>"+market_name+"</td>";
					bet_ticker_html +="<td>"+result_runs+"</td>";
					bet_ticker_html +="<td>"+result_date_time+"</td>";
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
			 url: 'ajaxfiles/view_last_bet_result_done.php',
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
					
					
					
					eventId = bet_ticker[i].eventId;
					marketId = bet_ticker[i].marketId;
					
					
					bet_ticker_html +="<tr>";
					bet_ticker_html +="<td>"+event_name+"</td>";
					bet_ticker_html +="<td>"+market_name+"</td>";
					bet_ticker_html +="<td>"+result_runs+"</td>";
					bet_ticker_html +="<td>"+result_date_time+"</td>";
					
					bet_ticker_html +="<td><a class='btn btn-danger' href='javascript:void(0);' onclick='delete_result("+eventId+","+marketId+")'>Delete</a></td>";
					bet_ticker_html +="</tr>";
				}
				
					$("#active_bet_ticker").html(bet_ticker_html);
			 }
		 });

		
		 function delete_result(event_id,market_id){
			  if (!confirm('Are you sure?')) return false;
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/delete_marketwise_result.php',
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
