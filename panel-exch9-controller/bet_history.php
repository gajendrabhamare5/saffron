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
}
else{	
	$search_market_name ="";
}

$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];


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
	$explode = explode("#",$event_name);
	$event_name = $explode[1];
	$search_event_name = "and b.event_id ='$event_name'";
}else{
	$search_event_name = "";
}


$search_event_type_casino = " and 1=1";

if($event_type != null and $event_type[0] != ''){
	$search_event_type = "and b.event_type IN(".implode(',',$event_type).")";
	$search_event_type_casino = " and 1!=1";
}else{
	$search_event_type = "";
}

$start_date = date("Y-m-d", strtotime($start_date));
$end_date = date("Y-m-d", strtotime($end_date));

if(in_array("9999999999",$event_type)){
	$search_event_type_casino = " and 1=1";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Bet History</title>
<?php 

include("header.php");
?>
<link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<link href="assets/toastr.min.css" rel="stylesheet"/>
                              

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
				<h3>Bet History</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			
				<div class="x_panel">
				<form action="bet_history.php" method="get">
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					
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
								$casino_selected = "";
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
									if($event_id == 9999999999){
										$casino_selected = "selected='selected'";
									}
								}
							?>
								<option value="">All</option>
								<option value="4" <?php echo $cricket_selected; ?>>Cricket</option>
								<option value="1" <?php echo $soccer_selected; ?>>Soccer</option>
								<option value="2" <?php echo $tennis_selected; ?>>Tennis</option>
								<option value="9999999999" <?php echo $casino_selected; ?>>Casino</option>
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
					</div>										<div class="col-md-4">
						
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
							<a href="bet_history.php" class="btn btn-success">Reset</a>
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
											
											<th class="column-title" style="display: table-cell;">Master </th>
											<th class="column-title" style="display: table-cell;">Master </th>
											<th class="column-title" style="display: table-cell;">Master </th>
											<th class="column-title" style="display: table-cell;">Master </th>
											<th class="column-title" style="display: table-cell;">Master </th>
											
											<th class="column-title" style="display: table-cell;">Event</th>
											<th class="column-title" style="display: table-cell;">Market </th>
											<th class="column-title" style="display: table-cell;">Type </th>
											<th class="column-title" style="display: table-cell;">Stake	 </th>
											<th class="column-title" style="display: table-cell;">Rate</th>
											<th class="column-title" style="display: table-cell;">Odds</th>
											<th class="column-title" style="display: table-cell;">Result</th>
											<th class="column-title" style="display: table-cell;">Status</th>
											<th class="column-title" style="display: table-cell;">Action</th>
											<th class="column-title" style="display: table-cell;">Date Time</th>
											
										</tr>
										
									</thead>
									
									<tbody>
									<?php
									 
									
									if($start_date != "" and $end_date != ""){
										if($login_type == 5){
											$get_pnl_report  = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where  1=1 and DATE(b.bet_time) >= '$start_date' and DATE(b.bet_time) <= '$end_date' $search_event_name $search_client_name $search_event_type $search_smdl_name $search_mdl_name $search_dl_name $search_market_name and b.bet_status!=2");
											
										
											
											$get_pnl_report_casino  = $conn->query("select ulm.Email_ID,ulm.UserID,ulm.parentDL,ulm.parentMDL,ulm.parentSuperMDL,ulm.parentKingAdmin,b.event_name,b.event_id,b.market_name,b.bet_type,b.bet_stack,b.bet_runs,b.bet_odds,b.bet_result,b.bet_id,b.bet_time from bet_teen_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where  DATE(b.bet_time) >= '$start_date' and DATE(b.bet_time) <= '$end_date' $search_event_name $search_client_name $search_event_type_casino $search_smdl_name $search_mdl_name $search_dl_name $search_market_name and b.bet_status!=2");
											
										}
										
										
										$all_master_details = array();
										$get_all_user_data = $conn->query("select * from user_login_master where UserType<>1");
										while($fetch_get_all_user_data = mysqli_fetch_assoc($get_all_user_data)){
											$user_id = $fetch_get_all_user_data['UserID'];
											$master_emaild = $fetch_get_all_user_data['Email_ID'];
											$all_master_details[$user_id] = $master_emaild;
										}
										
										while($fetch_pnrl_report = mysqli_fetch_assoc($get_pnl_report)){
									?>
										<tr>
										
												<td>
												<?php 
													$dl_email = $fetch_pnrl_report['Email_ID'];
													echo strip_tags($dl_email);
												?>	
												</td>
												<?php
												$user_id = $fetch_pnrl_report['UserID'];
												
												$parentDL = $fetch_pnrl_report['parentDL'];
												$parentMDL = $fetch_pnrl_report['parentMDL'];
												$parentSuperMDL = $fetch_pnrl_report['parentSuperMDL'];
												$parentKingAdmin = $fetch_pnrl_report['parentKingAdmin'];
												
												$dl_email_id = "";
												$mdl_email_id = "";
												$smdl_email_id = "";
												$king_email_id = "";
												
												
												if(isset($all_master_details[$parentDL])){
													$dl_email_id = $all_master_details[$parentDL];
												}
												
												
												if(isset($all_master_details[$parentMDL])){
													$mdl_email_id = $all_master_details[$parentMDL];
												}
												
												if(isset($all_master_details[$parentSuperMDL])){
													$smdl_email_id = $all_master_details[$parentSuperMDL];
												}
												
												
												if(isset($all_master_details[$parentKingAdmin])){
													$king_email_id = $all_master_details[$parentKingAdmin];
												}
												
												
												if($dl_email_id == $mdl_email_id){
													$dl_email_id = "";
												}
												
												if($mdl_email_id == $smdl_email_id){
													$mdl_email_id = "";
												}
												
												if($smdl_email_id == $king_email_id){
													$smdl_email_id = "";
												}
												
												?>
											<td><?php echo strip_tags($dl_email_id); ?></td>
											<td><?php echo strip_tags($mdl_email_id); ?></td>
											<td><?php echo strip_tags($smdl_email_id); ?></td>
											<td><?php echo strip_tags($king_email_id); ?></td>
											<td><?php echo SITE_NAME; ?></td>
											<td><?php echo $fetch_pnrl_report['event_name']; ?></td>
											<td><?php echo $fetch_pnrl_report['market_name']; ?></td>
											<td><?php echo $fetch_pnrl_report['bet_type']; ?></td>
											<td><?php echo $fetch_pnrl_report['bet_stack']; ?></td>
											<td><?php echo $fetch_pnrl_report['bet_runs']; ?></td>
											<td><?php echo $fetch_pnrl_report['bet_odds']; ?></td>
											<td><?php echo $fetch_pnrl_report['bet_result']; ?></td>
											<td><?php 
											if($fetch_pnrl_report['bet_result'] > 0){
												echo "Client Win";
											}else if ($fetch_pnrl_report['bet_result'] < 0){
												echo "Client Loss";
											}else{
												echo "No Result";
											}
												?></td>
												
												<td>
													<select name="set_result" id="set_result_<?php echo $fetch_pnrl_report['bet_id'];  ?>" onchange="$('#delete_otp').val('');set_otp('<?php echo $fetch_pnrl_report['bet_id']; ?>','bet')">
													<option value="">Select</option>
													<option value="Delete">Delete</option>
												</select>
												</td>
											<td><?php echo date("d-m-Y H:i:s",strtotime($fetch_pnrl_report['bet_time'])); ?>
											</td>
										</tr>
									<?php
										}
										
										
										while($fetch_get_pnl_report_casino = mysqli_fetch_assoc($get_pnl_report_casino)){
									?>
										<tr>
										
												<td>
												<?php 
													$dl_email = $fetch_get_pnl_report_casino['Email_ID'];
													echo strip_tags($dl_email);
												
												?>	
												</td>
												
												<?php
												
												
												$user_id = $fetch_get_pnl_report_casino['UserID'];
												
												$parentDL = $fetch_get_pnl_report_casino['parentDL'];
												$parentMDL = $fetch_get_pnl_report_casino['parentMDL'];
												$parentSuperMDL = $fetch_get_pnl_report_casino['parentSuperMDL'];
												$parentKingAdmin = $fetch_get_pnl_report_casino['parentKingAdmin'];
												
												$dl_email_id = "";
												$mdl_email_id = "";
												$smdl_email_id = "";
												$king_email_id = "";
												
												
												if(isset($all_master_details[$parentDL])){
													$dl_email_id = $all_master_details[$parentDL];
												}
												
												
												if(isset($all_master_details[$parentMDL])){
													$mdl_email_id = $all_master_details[$parentMDL];
												}
												
												
												if(isset($all_master_details[$parentSuperMDL])){
													$smdl_email_id = $all_master_details[$parentSuperMDL];
												}
												
												
												if(isset($all_master_details[$parentKingAdmin])){
													$king_email_id = $all_master_details[$parentKingAdmin];
												}
												
												
												if($dl_email_id == $mdl_email_id){
													$dl_email_id = "";
												}
												
												if($mdl_email_id == $smdl_email_id){
													$mdl_email_id = "";
												}
												
												if($smdl_email_id == $king_email_id){
													$smdl_email_id = "";
												}
												
												
												?>
											<td><?php echo strip_tags($dl_email_id); ?></td>
											<td><?php echo strip_tags($mdl_email_id); ?></td>
											<td><?php echo strip_tags($smdl_email_id); ?></td>
											<td><?php echo strip_tags($king_email_id); ?></td>
											<td><?php echo SITE_NAME; ?></td>
											
											<td><?php echo $fetch_get_pnl_report_casino['event_name']." (".$fetch_get_pnl_report_casino['event_id'].")"; ?></td>
											
											<td><?php echo $fetch_get_pnl_report_casino['market_name']; ?></td>
											<td><?php echo $fetch_get_pnl_report_casino['bet_type']; ?></td>
											<td><?php echo $fetch_get_pnl_report_casino['bet_stack']; ?></td>
											<td><?php echo $fetch_get_pnl_report_casino['bet_runs']; ?></td>
											<td><?php echo $fetch_get_pnl_report_casino['bet_odds']; ?></td>
											<td><?php echo $fetch_get_pnl_report_casino['bet_result']; ?></td>
											<td><?php 
											if($fetch_get_pnl_report_casino['bet_result'] > 0){
												echo "Client Win";
											}else if ($fetch_get_pnl_report_casino['bet_result'] < 0){
												echo "Client Loss";
											}else{
												echo "No Result";
											}
												?></td>
												
												<td>
												
													<select name="set_result_casino" id="set_result_casino_<?php echo $fetch_get_pnl_report_casino['bet_id'];  ?>" onchange="$('#delete_otp').val('');set_otp('<?php echo $fetch_get_pnl_report_casino['bet_id']; ?>','casino_bet')">
													<option value="">Select</option>
													<option value="Delete">Delete</option>
												</select>
												</td>
												
											<td><?php echo date("d-m-Y H:i:s",strtotime($fetch_get_pnl_report_casino['bet_time'])); ?>
											</td>
										</tr>
									<?php
										}
										
										
									 
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
<script src="assets/toastr.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<div class="myLoading" style="display:none;">Loading&#8230;</div>
<style>
.myLoading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.myLoading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.myLoading:not(:required) {
  /* hide "myLoading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.myLoading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

</style>

</body>
<div id="modal-delete_otp" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">OTP Verification</h4>
      </div>
      <div class="modal-body">        
		
		
		  <div class="form-group">
			<input type="hidden" id="bet_type">
			<input type="hidden" id="bet_id">
			<label for="pwd">OTP:</label>
			<input type="text" class="form-control" id="delete_otp" name="delete_otp">
		  </div>
		  <?php 
		  /*
		  <div class="form-group">
			<label for="pwd">BOOKMAKER:</label>
			<input type="text" class="form-control" id="bookmaker_max" name="bookmaker_max" value="200000" autocomplete="off">
		  </div>
		  
		  <div class="form-group" style="display:none;">
			<label for="pwd">Exposure Limit:</label>
			<input type="text" class="form-control" id="net_exposure_limit" name="net_exposure_limit" value="2000000" autocomplete="off">
		  </div> */ ?>
		  <button type="button" class="btn btn-default " id="otp_verify" onclick="otp_verify()">Submit</button>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
	/* $("#market_name").autocomplete({   
	source: "ajaxfiles/ajax_autocomplete_market_name.php", 
	}); */
	 $("#market_name").autocomplete({   
	source: function(request, response) {
		$.getJSON("ajaxfiles/ajax_autocomplete_market_name.php", { event_name: $('#event_name').val() }, 
				  response);
	  },
	  minLength: 2,
	  select: function(event, ui){
		//action
	  }
	  });
});

function set_otp(bet_id,type){
	jQuery(".myLoading").show();
	var result_status="";
	if(type=="bet"){
		result_status = $('#set_result_'+bet_id).val();
	}
	if(type=="casino_bet"){
		result_status = $('#set_result_casino_'+bet_id).val();
	}
	if(result_status == ""){
		jQuery(".myLoading").hide();
		return false;
	}
	$.ajax({
			 type: 'POST',
			 url: 'processing/otp_send.php',
			 dataType: 'JSON',
			 data: {bet_id:bet_id,type:type},
			 success: function(response) {
				var status  = response.status;
			var message  = response.message;
			jQuery(".myLoading").hide();
			if(status == "ok"){
				toastr.clear()
                toastr.success("", message, {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
				$("#bet_type").val(type);
				$("#bet_id").val(bet_id);
				$("#modal-delete_otp").modal();
			}else{
				toastr.clear()
                toastr.error("", message, {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
			}
			
			 }
		});
}
function set_result(bet_id){
	
	var result_status = $('#set_result_'+bet_id).val();
	var otp =$("#delete_otp").val();
	if(otp == ""){
		jQuery(".myLoading").hide();
		jQuery("#otp_verify").removeAttr("disabled");
        jQuery("#otp_verify").attr("onclick", "otp_verify()");
		toastr.clear()
                toastr.error("", "Please enter OTP", {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
				
	}else{
		$.ajax({
			 type: 'POST',
			 url: 'processing/set_result_controller.php',
			 dataType: 'JSON',
			 data: {bet_id:bet_id,result_status:result_status,otp:otp},
			 success: function(response) {
				var status  = response.status;
			var message  = response.message;
			if(status == "ok"){
				toastr.clear()
                toastr.success("", message, {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
				location.reload();
			}else{
				jQuery(".myLoading").hide();
				jQuery("#otp_verify").removeAttr("disabled");
        		jQuery("#otp_verify").attr("onclick", "otp_verify()");
				toastr.clear()
                toastr.error("", message, {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
			
			}
			
			 }
		});
	}
		
}

function set_result_casino(bet_id){
	var result_status = $('#set_result_casino_'+bet_id).val();
	var otp =$("#delete_otp").val();
	if(otp == ""){
		jQuery(".myLoading").hide();
		jQuery("#otp_verify").removeAttr("disabled");
        jQuery("#otp_verify").attr("onclick", "otp_verify()");
		toastr.clear()
                toastr.error("", "Please enter OTP", {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
				
	}else{
		$.ajax({
			 type: 'POST',
			 url: 'processing/set_result_casino_controller.php',
			 dataType: 'JSON',
			 data: {bet_id:bet_id,result_status:result_status,otp:otp},
			 success: function(response) {
				var status  = response.status;
			var message  = response.message;
			if(status == "ok"){
				toastr.clear()
                toastr.success("", message, {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
				location.reload();
				
			}else{
				jQuery(".myLoading").hide();
				jQuery("#otp_verify").removeAttr("disabled");
				jQuery("#otp_verify").attr("onclick", "otp_verify()");
				toastr.clear()
                toastr.error("", message, {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
				
			}
			
			 }
		});
	}
}

$('#modal-delete_otp').on('hidden.bs.modal', function () {
	jQuery(".myLoading").show();
   location.reload();
});

function otp_verify(){
	jQuery(".myLoading").show();
	jQuery("#otp_verify").attr("disabled","disabled");
    jQuery("#otp_verify").removeAttr("onclick");
	var otp =$("#delete_otp").val();
	if(otp == ""){
		jQuery(".myLoading").hide();
		jQuery("#otp_verify").removeAttr("disabled");
        jQuery("#otp_verify").attr("onclick", "otp_verify()");
		toastr.clear()
                toastr.error("", "Please enter OTP", {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });
				
	}
	else{
		var bet_type = $("#bet_type").val();
		var bet_id = $("#bet_id").val();
		if(bet_type=="bet"){
			set_result(bet_id);
		}
		if(bet_type=="casino_bet"){
			set_result_casino(bet_id);
		}
	}
	
}
</script>
</html>