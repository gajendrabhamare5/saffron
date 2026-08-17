<?php
include('../include/conn.php');
include "session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID']; 
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$client_name = $_REQUEST['client_name'];
$event_name = $_REQUEST['event_name'];
$event_type = $_REQUEST['event_type'];
$market_name = $_REQUEST['market_name'];
if($market_name != ""){
	$search_market_name =" and b.market_name='$market_name'";
}else{
	$search_market_name ="";
}

$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

$search_smdl_name = "";
$search_mdl_name = "";
$search_dl_name = "";

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

$start_date = date("Y-m-d", strtotime($start_date));
$end_date = date("Y-m-d", strtotime($end_date));



$get_count_pnl_report  = $conn->query("select SUM(`bet_result`) as pnl_bet_amount from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where  DATE(b.bet_time) >= '$start_date' and DATE(b.bet_time) <= '$end_date' $search_event_name $search_event_type $search_market_name");



	$fetch_get_count_pnl_report = mysqli_fetch_assoc($get_count_pnl_report);
	$pnl_amount = $fetch_get_count_pnl_report['pnl_bet_amount'];
	if($pnl_amount == ""){
		$pnl_amount = 0;
	}		
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Profit & Loss Report</title>
<?php 

include("header.php");
?>
<link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
<div class="right_col" role="main" style="min-height: 1500px !important;">
<?php 

include("below_header.php");
?>
<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Profit & Loss By Market</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
		
				<div class="x_panel" style="top: 100px;height: 100%;">
				<form action="profit_loss_market.php" method="get">
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php
						if($login_type == 7){
					?>
					<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">SMDL Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="smdl_name" id="smdl_name" value="<?php if($_REQUEST['smdl_name']){ echo $_REQUEST['smdl_name']; } ?>">
							</div>
							</div>
							</div>
					</div>
					<?php
						}
					?>
					
					<?php
						if($login_type == 4){
					?>
					<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">MDL Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="mdl_name" id="mdl_name" value="<?php if($_REQUEST['mdl_name']){ echo $_REQUEST['mdl_name']; } ?>">
							</div>
							</div>
							</div>
					</div>
					<?php
						}
					?>
					<?php
						if($login_type == 3){
					?>
					<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">DL Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="dl_name" id="dl_name" value="<?php if($_REQUEST['dl_name']){ echo $_REQUEST['dl_name']; } ?>">
							</div>
							</div>
							</div>
					</div>
					<?php
						}
						if($login_type == 2){
					?>
					<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Client Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="client_name" id="client_name" value="<?php if($_REQUEST['client_name']){ echo $_REQUEST['client_name']; } ?>">
							</div>
							</div>
							</div>
					</div>
					<?php
						}
					?>
					<div class="col-md-4">
						
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
					<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Event Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							<input type="text" class="form-control" name="event_name" id="event_name" value="<?php if($_REQUEST['event_name']){ echo $_REQUEST['event_name']; } ?>">
							
							</div>
							</div>
							</div>
					</div>
					<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Market Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							<input type="text" class="form-control" name="market_name" id="market_name" value="<?php if($_REQUEST['market_name']){ echo $_REQUEST['market_name']; } ?>">
							
							</div>
							</div>
							</div>
					</div>
					<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Start date:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							
							<input type="text" class="form-control has-feedback-left" name="start_date" id="single_cal1" placeholder="Start Date" aria-describedby="inputSuccess2Status" value="<?php if($_REQUEST['start_date']){ echo $_REQUEST['start_date']; } ?>">
							<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
							 <span id="inputSuccess2Status" class="sr-only">(success)</span>
							</div>
							</div>
							</div>
					</div>
					
					
					<div class="col-md-4">
					
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">End date:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							
							<input type="text" class="form-control has-feedback-left" name="end_date" id="single_cal2" placeholder="End Date" aria-describedby="inputSuccess2Status" value="<?php if($_REQUEST['end_date']){ echo $_REQUEST['end_date']; } ?>">
							<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
							 <span id="inputSuccess2Status" class="sr-only">(success)</span>
							</div>
							</div>
							</div>
						
					</div>
					
					<div class="col-md-4">
					
						
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							
							<button type="submit" class="btn btn-success">Search</button>
							<a href="profit_loss_market.php" class="btn btn-success">Reset</a>
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
											<?php
											if($login_type == 2){
											?>
											<th class="column-title" style="display: table-cell;">User Name</th>
											<?php
											}
											if($login_type == 3){
											?>
											<th class="column-title" style="display: table-cell;">DL Name</th>
											<?php
												}
												if($login_type == 4){
											?>
												<th class="column-title" style="display: table-cell;">MDL Name</th>
											<?php											
											}
											if($login_type == 7){
											?>
												<th class="column-title" style="display: table-cell;">SMDL Name</th>
											<?php											
											}
											
											?>
											<th class="column-title" style="display: table-cell;">Event</th>
											<th class="column-title" style="display: table-cell;">Market </th>
											<th class="column-title" style="display: table-cell;">Type </th>
											<th class="column-title" style="display: table-cell;">Stake	 </th>
											<th class="column-title" style="display: table-cell;">Rate</th>
											<th class="column-title" style="display: table-cell;">Odds</th>
											<th class="column-title" style="display: table-cell;">Result</th>										
											<th class="column-title" style="display: table-cell;">My Stake</th>									
											<th class="column-title" style="display: table-cell;">My Result</th>
											<th class="column-title" style="display: table-cell;">Status</th>
											<th class="column-title" style="display: table-cell;">Date Time</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
									
									
									if($start_date != "" and $end_date != ""){
										
											$get_pnl_report  = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where DATE(b.bet_time) >= '$start_date' and DATE(b.bet_time) <= '$end_date' $search_event_name $search_client_name $search_event_type $search_smdl_name $search_mdl_name $search_dl_name $search_market_name");
										
										
										
										$get_pnl_report_num_rows = $get_pnl_report->num_rows;
										if($get_pnl_report_num_rows <= 0){
											?>
									
									<?php
										}
										else{		
										$total_my_stake = 0;				
										$total_my_result = 0;					
										$total_dl_stake = 0;					
										$total_dl_result = 0;																														$total_mdl_result = 0;
										while($fetch_pnrl_report = mysqli_fetch_assoc($get_pnl_report)){
											
											$bet_user_id = $fetch_pnrl_report['user_id'];								
											$bet_stack = $fetch_pnrl_report['bet_stack'];							
											$bet_result = $fetch_pnrl_report['bet_result'];

											$get_my_percentage = $conn->query("select * from user_master where Id=$user_id");													
											$fetch_get_my_percentage = mysqli_fetch_assoc($get_my_percentage);													
											$my_percentage = $fetch_get_my_percentage['my_percentage'];																										$upline_percentage = 100 - $my_percentage;
											if($login_type == 2){										
												$my_actual_percentage = $my_percentage;	
											
											}
											else if($login_type ==3){		
											
											$get_dl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
											$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);										
											$dl_id = $fetch_dl_id['parentDL'];											
											$get_dl_percentage = $conn->query("select * from user_master where Id=$dl_id");
											$fetch_get_dl_percentage = mysqli_fetch_assoc($get_dl_percentage);
											$my_dl_percentage = $fetch_get_dl_percentage['my_percentage'];																												$my_actual_percentage = $my_percentage - $my_dl_percentage;
											$dl_stake = ($bet_stack * $my_dl_percentage) /100;				
											$dl_result = ($bet_result * $my_dl_percentage) /100;				
											$dl_result = ($dl_result) * (-1);										
											$total_dl_result  = $total_dl_result + $dl_result;						
											}
											else if($login_type ==4){											
												$get_mdl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
												$fetch_mdl_id = mysqli_fetch_assoc($get_mdl_id);											
												$mdl_id = $fetch_mdl_id['parentMDL'];												
												
												$get_mdl_percentage = $conn->query("select * from user_master where Id=$mdl_id");
												$fetch_get_mdl_percentage = mysqli_fetch_assoc($get_mdl_percentage);
												$my_mdl_percentage = $fetch_get_mdl_percentage['my_percentage'];
												
												$my_actual_percentage = $my_percentage - $my_mdl_percentage;
												$mdl_result = ($my_mdl_percentage * $bet_result) /100;							
												$mdl_result = ($mdl_result) * (-1);												
												$total_mdl_result = $total_mdl_result + $mdl_result;							
											}	
											else if($login_type == 7){
												$get_mdl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
												$fetch_mdl_id = mysqli_fetch_assoc($get_mdl_id);											
												$smdl_id = $fetch_mdl_id['parentSuperMDL'];												
												
												$get_smdl_percentage = $conn->query("select * from user_master where Id=$smdl_id");
												$fetch_get_smdl_percentage = mysqli_fetch_assoc($get_smdl_percentage);
												$my_smdl_percentage = $fetch_get_smdl_percentage['my_percentage'];
												
												$my_actual_percentage = $my_percentage - $my_smdl_percentage;
												$smdl_result = ($my_smdl_percentage * $bet_result) /100;							
												$smdl_result = ($smdl_result) * (-1);												
												$total_smdl_result = $total_smdl_result + $smdl_result;
											}
									?>
										<tr>
											
											<?php
											
												if($login_type == 2){
											?>
											<td><?php echo $fetch_pnrl_report['Email_ID']; ?></td>
											<?php
												}																										 
												if($login_type == 3){																										 
												?>
												<td>
												<?php 
													$bet_user_id = $fetch_pnrl_report['user_id'];
													$get_dl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
													$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);
													$dl_id = $fetch_dl_id['parentDL'];
													
													$get_dl_name = $conn->query("select * from user_login_master where UserID=$dl_id");
													$fetch_dl_name = mysqli_fetch_assoc($get_dl_name);
													$dl_name = $fetch_dl_name['Email_ID'];
													echo $dl_name;
												?>	
												</td>												
												<?php
												}if($login_type == 4){
											?>
												<td>
												<?php 
													$bet_user_id = $fetch_pnrl_report['user_id'];
													$get_dl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
													$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);
													$dl_id = $fetch_dl_id['parentMDL'];
													
													$get_dl_name = $conn->query("select * from user_login_master where UserID=$dl_id");
													$fetch_dl_name = mysqli_fetch_assoc($get_dl_name);
													$dl_name = $fetch_dl_name['Email_ID'];
													echo $dl_name;
												?>	
												</td>
											<?php											
											}
											if($login_type == 7){
											?>
												<td>
												<?php 
													$bet_user_id = $fetch_pnrl_report['user_id'];
													$get_dl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
													$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);
													$dl_id = $fetch_dl_id['parentSuperMDL'];
													
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
											<td><?php echo $fetch_pnrl_report['bet_result']; ?></td>					
											<td>
											<?php 
											echo $my_stake =  $my_actual_percentage * $fetch_pnrl_report['bet_stack'] /100;
											$total_my_stake = $total_my_stake + $my_stake;
											?></td>			
											
											<td>
											<?php 
												echo $my_result = (($my_actual_percentage * $fetch_pnrl_report['bet_result']) / 100)  * (-1);
												$total_my_result = $total_my_result + $my_result;						
											?>
											</td>
											
											<td>
											
											<?php 
											if($fetch_pnrl_report['bet_result'] > 0){
												echo "Client Win";
											}else if ($fetch_pnrl_report['bet_result'] < 0){
												echo "Client Loss";
											}else{
												echo "No Result";
											}
												?></td>
											<td><?php echo $fetch_pnrl_report['bet_time']; ?>
											</td>
										</tr>
									<?php
										}
									
										}
									}else{
									?>
									<tr class="">
											<td>No data</td>
											
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									<?php
									}
									?>
									
										
									</tbody>
								</table>
									
							</div>
						</div>
					</div>						
					<div class="col-md-12 col-sm-12 col-xs-12" style="position: absolute;top: 0%;">			
					<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">						
					
					<div class="tile-stats">				
					
					<div class="icon"><i class="fa fa-check-square-o"></i>			
					
					</div>						
					<div class="count">
					<?php echo number_format($pnl_amount,2); ?></div>			
					<h3>Client Profit</h3>						
					</div>				
					</div>					
					<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">				
					<div class="tile-stats">					
					<div class="icon"><i class="fa fa-check-square-o"></i>				
					
					</div>						
					<div class="count"> 
					<?php echo number_format($total_my_result,2); ?></div>						
					<h3>My Profit</h3>						
					</div>					
					</div>					
					<?php						
					if($login_type == 2){			
					?>					
					<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">					
						<div class="tile-stats">
							<div class="icon"><i class="fa fa-check-square-o"></i>						
						</div>				
						<div class="count"> 
						<?php						
						$total_up_result = $pnl_amount + $total_my_result;			
						$total_up_result = $total_up_result * -1;					
						echo number_format($total_up_result,2); 
						?></div>					
						<h3>MDL Profit</h3>					
						</div>					
						</div>					
						<?php						
						}				
						?>					
						<?php				
						if($login_type == 3){		
						?>				
						<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">					
						<div class="tile-stats">					
						<div class="icon"><i class="fa fa-check-square-o"></i>						
						</div>						
						<div class="count">
						<?php echo number_format($total_dl_result,2); ?></div>			
						<h3>DL Profit</h3>			
						</div>					
						</div>					
						
						<?php					
						}			
						?>				
						<?php						
						if($login_type == 4){					
						?>
						<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">						
						<div class="tile-stats">						
						<div class="icon"><i class="fa fa-check-square-o"></i>				
						</div>						
						<div class="count"> 
							<?php echo number_format($total_mdl_result,2); ?>
						</div>						
						<h3>MDL Profit</h3>						
						</div>				
						</div>					
						<?php					
						}				
						?>	
						
						<?php						
						if($login_type == 7){					
						?>
						<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">						
						<div class="tile-stats">						
						<div class="icon"><i class="fa fa-check-square-o"></i>				
						</div>						
						<div class="count"> 
							<?php echo number_format($total_smdl_result,2); ?>
						</div>						
						<h3>SMDL Profit</h3>						
						</div>				
						</div>					
						<?php					
						}				
						?>		
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
</body>
<script>
$(document).ready(function() {
  $("#smdl_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_smdl_name.php",
  });
});

$(document).ready(function() {
  $("#mdl_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_mdl_name.php",
  });
});
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
    source: "ajaxfiles/ajax_autocomplete_event_name.php",
  });
});
$(document).ready(function() {
  $("#market_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_market_name.php",
  });
});
</script>
</html>