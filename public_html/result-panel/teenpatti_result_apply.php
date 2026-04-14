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
														Event Name
													</td>
													<td>
														Event Id
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
														<select name="event_name" id="event_name">
														
														<option value="">Select Event Name</option>
														<?php
														$get_active_event_name = $conn->query("select  * from bet_teen_details where bet_status=1 GROUP BY event_id");
														while($fetch_get_active_event_name = mysqli_fetch_assoc($get_active_event_name)){
														?>
														<option value="<?php echo $fetch_get_active_event_name['event_id']; ?>"><?php echo $fetch_get_active_event_name['event_id']." - ".date("d-m-Y",strtotime($fetch_get_active_event_name['bet_time'])); ?></option>
														<?php
														}
														?>
														</select>
													</td>
													
													<td>
														<span id="event_id"></span>
													</td>
													<td id="result_type">
														<select name="winner_name" id="winner_name">
														
														<option value="">Select Winner</option>
														<option value="1">Player A</option>
														<option value="2">Player B</option>
														
														</select>
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
    $("#event_name").change(function(){
        var selectedEvent_name = $(this).children("option:selected").val();
        
		$("#event_id").text(selectedEvent_name);
    });
});
jQuery(document).on("click", "#submit_result", function () {
	event_name = $("#event_name").val();
	winner_name = $("#winner_name").val();
	
	if(event_name == ""){
		$(".alert-success").hide();
		$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
		$(".alert-danger strong").text("Please Select Event Id");
		return;
	}

	if(winner_name == ""){
		$(".alert-success").hide();
		$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
		$(".alert-danger strong").text("Please Select Winner Name");
		return;
	}
			$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/teenpatti_result_apply.php',
			 dataType: 'JSON',
			 data: {event_id:event_name,winner_name:winner_name},
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
</script>