<?php
include('../include/conn.php');
include "session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

$client_name = $_REQUEST['client_name'];
$event_name = $_REQUEST['event_name'];
$event_type = $_REQUEST['event_type'];


$search_smdl_name = "";

	$search_mdl_name = "";

	$search_dl_name ="";


if($client_name != ""){
	$get_client_id = $conn->query("select * from user_login_master where Email_ID='$client_name'");
	$fetch_client_id = mysqli_fetch_assoc($get_client_id);
	$client_id = $fetch_client_id['UserID'];
	$search_client_name=" and b.user_id=$client_id";
	
}else{
	$search_client_name ="";
}

if($event_name != ""){
	$search_event_name = "and b.event_name ='$event_name'";
}else{
	$search_event_name = "";
}


if($event_type != null and $event_type[0] != ''){
	$search_event_type = "and b.event_type IN(".implode(',',$event_type).")";
	
}else{
	$search_event_type = "";
}

$check_bet_delete_status = $conn->query("select * from user_master where Id=$user_id");
$fetch_check_bet_delete_status = mysqli_fetch_assoc($check_bet_delete_status);
$bet_delete_actual_status = $fetch_check_bet_delete_status['bet_delete_status'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Active Bet</title>
<?php 

include("header.php");
?>
<link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link rel="stylesheet" href="assets/jquery-confirm.min.css">
<style>
.ui-autocomplete {
    position: absolute;
    z-index: 1000;
    cursor: default;
    padding: 0;
    margin-top: 2px;
    list-style: none;
    background-color: #ffffff;
    border: 1px solid #ccc;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
       -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.ui-autocomplete > li {
  padding: 3px 20px;
border-bottom: 1px solid #ccc;
    font-size: 16px;
}
.ui-autocomplete > li.ui-state-focus {
  background-color: #DDD;
}
.ui-helper-hidden-accessible {
  display: none;
}
</style>
<div class="right_col" role="main" style="min-height: 1171px;">

<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Open bet</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			
				<div class="x_panel">
				<form action="active_bet.php" method="get">
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					
					<div class="col-md-3">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Event Type:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							<select  class="form-control" name="event_type[]" id="event_type" multiple>
							<?php
								$cricket_selected = "";
								$soccer_selected = "";
								$tennis_selected = "";
								foreach($event_type as $event_id){
									if($event_id == 4){
										$cricket_selected = "selected='selected'";
									}
									if($event_id == 1){
										$soccer_selected = "selected='selected'";
									}
									if($event_id == 2){
										$tennis_selected = "selected='selected'";
									}
								}
							?>
								<option value="">All</option>
								<option value="4" <?php echo $cricket_selected; ?>>Cricket</option>
								<option value="1" <?php echo $soccer_selected; ?>>Soccer</option>
								<option value="2" <?php echo $tennis_selected; ?>>Tennis</option>
							</select>
							
							</div>
							</div>
							</div>
					</div>
					<div class="col-md-3">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Event Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							<input type="text" class="form-control" name="event_name" id="event_name" value="<?php if($_REQUEST['event_name']){ echo $_REQUEST['event_name']; } ?>">
							
							</div>
							</div>
							</div>
					</div>
					<div class="col-md-3">
					
						
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							
							<button type="submit" class="btn btn-success">Search</button>
							<a href="active_bet.php" class="btn btn-success">Reset</a>
							</div>
							</div>
							</div>
						
					</div>
				</div>
				</form>
					<div class="x_content">
						
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action" id="datatable">
								<thead>
									<tr class="headings">
											<th class="column-title" style="display: table-cell;">User Name</th>
											
											<th class="column-title" style="display: table-cell;">Event</th>
											<th class="column-title" style="display: table-cell;">Market </th>
											<th class="column-title" style="display: table-cell;">Type </th>
											<th class="column-title" style="display: table-cell;">Stake	 </th>
											<th class="column-title" style="display: table-cell;">Rate</th>
											<th class="column-title" style="display: table-cell;">Odds</th>
											<th class="column-title" style="display: table-cell;">Date Time</th>
											
											
										</tr>
									</thead>
									<tbody>
									<?php
									if($search_dl_name == ""){
										$my_user_ids = array();
										 if($login_type == 5){
											$my_user_ids = array();
											
											$get_my_downline_id = $conn->query("select * from user_login_master where 1");
											while($fetch_donwline = mysqli_fetch_assoc($get_my_downline_id)){
												$my_user_ids[] = $fetch_donwline['UserID'];
												
											}
											
										}
										
										$search_my_user_id = "and b.user_id IN (".implode(',',$my_user_ids).")";
									}else{
										$search_my_user_id = $search_dl_name;
										
									}
										

									if($search_my_user_id != ""){
											
										$get_pnl_report  = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where b.bet_status =1 $search_event_name $search_smdl_name $search_mdl_name $search_client_name $search_event_type $search_my_user_id ");
										
										
										$get_pnl_report_num_rows = $get_pnl_report->num_rows;
										if($get_pnl_report_num_rows <= 0){
											?>
									
									<?php
										}else{
											while($fetch_pnrl_report = mysqli_fetch_assoc($get_pnl_report)){
										?>
											<tr>
											<?php
												if($login_type == 5){
												?>
												<td>
												<?php 
													$bet_user_id = $fetch_pnrl_report['user_id'];
													$get_dl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
													$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);
													$dl_id = $fetch_dl_id['parentKingAdmin'];
													
													$get_dl_name = $conn->query("select * from user_login_master where UserID=$dl_id");
													$fetch_dl_name = mysqli_fetch_assoc($get_dl_name);
													$dl_name = $fetch_dl_name['Email_ID'];
													echo $dl_name;
												?>	
												</td>												
												<?php
												}
												?>
												<td><?php echo $fetch_pnrl_report['event_name']; ?></td>
												<td><?php echo $fetch_pnrl_report['market_name']; ?></td>
												<td><?php echo $fetch_pnrl_report['bet_type']; ?></td>
												<td><?php echo $fetch_pnrl_report['bet_stack']; ?></td>
												<td><?php echo $fetch_pnrl_report['bet_runs']; ?></td>
												
												<td><?php echo $fetch_pnrl_report['bet_odds']; ?></td>
												
												<td><?php echo date("d-m-Y H:i:s",strtotime($fetch_pnrl_report['bet_time'])); ?>
												</td>
												
											</tr>
										<?php
											}
										}
									}else{
										?>
									
									<?php
									}
									?>
									
										
									</tbody>
								</table>
									
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
include("footer.php");
?>

<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js" type="text/javascript"></script>
<script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
<script src="assets/vendors/jszip/dist/jszip.min.js" type="text/javascript"></script>
<script src="assets/vendors/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
<script src="assets/vendors/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>

<script src="assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="assets/jquery-confirm.min.js"></script>
</body>
<script>
$(document).ready(function() {
  $("#dl_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_dl_name.php",
  });
});
$(document).ready(function() {
  $("#client_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_client_name.php",
  });
});
$(document).ready(function() {
  $("#event_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_active_event_name.php",
  });
});

function cancel_active_bet(bet_id){
	
	$.confirm({
		title: 'Cancel',
		content: 'Do You Really Want To Cancel This Bet?',
		buttons: {
			confirm: function () {
				$.ajax({
						 type: 'POST',
						 url: 'ajaxfiles/cancel_active_bet.php',
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
						
						 }
					});
		},
			cancel: function () {
				
			}
		}
	});
}
</script>
</html>