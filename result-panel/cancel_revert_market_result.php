<?php
include( '../include/conn.php');
include "session.php";
$login_type=$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
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
		
		<link rel="stylesheet" type="text/css" href="https://rawgit.com/Semantic-Org/Semantic-UI/next/dist/semantic.css">
		<?php include( "header.php");?>
		
		
			<div class="right_col" role="main" style="min-height: 1171px;">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Cancel Revert Result Apply - Marketwise</h3>
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
													<?php /*
													<td>
														Start Time
													</td>
													
													<td>
														End Time
													</td> */ ?>
													
													<td>
														Action
													</td>
													
												</tr>
											</thead>
											<tbody id="">
												<tr>
												
												<td>
												
													<select name="sport_name" id="sport_name" class="">
														
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
														<select name="event_name" id="event_name" class="">
														
														<option value="">Select Event Name</option>
														
														</select>
													</td>
													
													
														
													<td>
														<select name="market_name" id="market_name" class="">
														
														<option value="">Select Market Name</option>
														</select>
													</td>
													
													<?php /*
													<td>
													<input type='datetime-local' class="date_filter" id='start_time' name='start_time' value='' step=1>
													</td>
													
													<td>
													<input type='datetime-local' class="date_filter" id='end_time' name='end_time' value=''  step=1>
													</td>
													*/ ?>
													
													<td>
														<a href='javascript:void(0)' style="display:none;" class='btn btn-success btn-xs revert_all'> Revert All Entry </a>
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
	
	<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<script src="https://rawgit.com/Semantic-Org/Semantic-UI/next/dist/semantic.js"></script>  
<script>

$(document).ready(function() { 
		$('.form-control1').dropdown();
	});

$(document).ready(function(){
	
  $("#sport_name").change(function(){
        var selectedEvent_name = $(this).children("option:selected").val();
        
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/get_lastfew_event_name_cancel.php',
			 dataType: 'JSON',
			 data: {sport_id:selectedEvent_name},
			 success: function(response) {
				 html_market_name = "";
				 html_market_name += "<option value=''>Select Event Name</option>";
				 var status = response.status;
				 var event_name_data = response.event_name_data;
				 if(status == "ok"){
					 for(i=0;i<event_name_data.length;i++){
						 html_market_name += "<option value='"+event_name_data[i].event_id+"' data-oddsmarketId='"+event_name_data[i].oddsmarketId+"'>"+event_name_data[i].event_name+"</option>";
					 }
					 
					 $("#event_name").html(html_market_name);
				 }
			 }
		});
		
		
    });
	
	$(document).on( "click", ".revert_all_entry", function() {
		$(".revert_all").removeClass('revert_all_entry');	
		$(".revert_all").html('Loading...');
		var event_id = $("#event_name").val();
		var market_id = $("#market_name").val();
		var start_time = $("#start_time").val();
		var end_time = $("#end_time").val();
		var oddsmarketId = $("#event_name").children("option:selected").attr('data-oddsmarketId');
		if(event_id){
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/apply_cancel_revert_marketwise_result.php',
				 dataType: 'JSON',
				 data: {event_id:event_id,market_id:market_id,start_time:start_time,end_time:end_time,oddsmarketId:oddsmarketId},
				 success: function(response) {

					
					
					var status  = response.status;
				var message  = response.message;
				if(status == "ok"){
					$(".revert_all").hide();
					$(".alert-success").show();
					$(".alert-danger").hide();
					$(".alert-success strong").text(message);
				}else{
					$(".alert-success").hide();
					$(".alert-danger").show();
					$(".alert-danger strong").text(message);
				}
				$(".revert_all").addClass('revert_all_entry');	
					$(".revert_all").html(' Revert All Entry');
				 }
			});
		}	
});
  
	
    $("#event_name").change(function(){
        var selectedEvent_name = $(this).children("option:selected").val();
		var oddsmarketId = $("#event_name").children("option:selected").attr('data-oddsmarketId');
        var sport_id = $("#sport_name").val();
        
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/get_cancel_market_name.php',
			 dataType: 'JSON',
			 data: {event_id:selectedEvent_name,sport_id:sport_id,oddsmarketId:oddsmarketId},
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

	$("#market_name").change(function(){
		
					$(".revert_all").show();
					$(".revert_all").addClass('revert_all_entry');
					
	});
	
	
	
});

</script>