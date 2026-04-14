<?php
include('../include/conn.php');
include "session.php";
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Controller Dashboard</title>
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
<?php 

include("header.php");
?>

<div class="right_col" role="main" style="min-height: 1171px;">

<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Bet Ticker</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			
				<div class="x_panel">
				<div class="col-md-4" style="display:none;">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">SMDL Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="smdl_name" id="smdl_name" onkeyup="betUpdate()" onchange="betUpdate()"  value="<?php if($_REQUEST['smdl_name']){ echo $_REQUEST['smdl_name']; } ?>">
							</div>
							</div>
							</div>
					</div>
					<div class="col-md-4" style="display:none;">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">MDL Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="mdl_name" id="mdl_name" onkeyup="betUpdate()" onchange="betUpdate()"  value="<?php if($_REQUEST['mdl_name']){ echo $_REQUEST['mdl_name']; } ?>">
							</div>
							</div>
							</div>
					</div>
				<div class="col-md-4" style="display:none;">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">DL Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="dl_name" id="dl_name" onkeyup="betUpdate()" onchange="betUpdate()"  value="<?php if($_REQUEST['dl_name']){ echo $_REQUEST['dl_name']; } ?>">
							</div>
							</div>
							</div>
					</div>
				<div class="col-md-4" style="display:none;">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Client Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
								<input type="text" class="form-control" name="client_name" id="client_name" onkeyup="betUpdate()" onchange="betUpdate()"   value="<?php if($_REQUEST['client_name']){ echo $_REQUEST['client_name']; } ?>">
							</div>
							</div>
							</div>
				</div>
				<div class="col-md-4" style="display:none;">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Event Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							<input type="text" class="form-control" name="event_name" id="event_name" onkeyup="betUpdate()" onchange="betUpdate()"  value="<?php if($_REQUEST['event_name']){ echo $_REQUEST['event_name']; } ?>">
							
							</div>
							</div>
							</div>
					</div>
					<div class="col-md-4" style="display:none;">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Market Name:</label>
							<div class="col-md-11 xdisplay_inputx form-group has-feedback">
							<input type="text" class="form-control" name="market_name" id="market_name" onkeyup="betUpdate()" onchange="betUpdate()"  value="<?php if($_REQUEST['market_name']){ echo $_REQUEST['market_name']; } ?>">
							
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
										
											<th class="column-title" style="display: table-cell;">User Name</th>
											
											<th class="column-title" style="display: table-cell;">DL Name</th>
											
											<th class="column-title" style="display: table-cell;">MDL Name</th>
											<th class="column-title" style="display: table-cell;">SMDL Name</th>
											
											
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
											<th class="column-title" style="display: table-cell;">Date Time</th>
											
											<th class="column-title" style="display: table-cell;">Ip Address</th>
											<th class="column-title" style="display: table-cell;">User Agent</th>
											<td><?php echo $fetch_pnrl_report['bet_ip_address']; ?></td>
												<td><?php echo $fetch_pnrl_report['bet_user_agent']; ?></td>
											
										</tr>
									</thead>
									<tbody id="active_bet_ticker">
									<?php
									
									
										if($login_type == 5){
											
											$get_pnl_report_casino  = $conn->query("select * from bet_teen_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where b.bet_status =1 order by b.bet_time DESC");
										}else{
											header("Location: logout.php");
										}
										
										
											
											while($fetch_get_pnl_report_casino = mysqli_fetch_assoc($get_pnl_report_casino)){
										?>
											<tr>
												<td><?php echo $fetch_get_pnl_report_casino['Email_ID']; ?></td>
												
												<?php
												$bet_user_id = $fetch_get_pnl_report_casino['user_id'];
												$get_dl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
												$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);
												$dl_id = $fetch_dl_id['parentDL'];
												$mdl_id = $fetch_dl_id['parentMDL'];
												$smdl_id = $fetch_dl_id['parentSuperMDL'];
												?>
												<td>
												<?php
												$get_dl_name = $conn->query("select * from user_login_master where UserID=$dl_id");
												$fetch_dl_name = mysqli_fetch_assoc($get_dl_name);
												$dl_name = $fetch_dl_name['Email_ID'];
												echo $dl_name;
												?>
												</td>
												<td>
												<?php
												$get_mdl_name = $conn->query("select * from user_login_master where UserID=$mdl_id");
												$fetch_mdl_name = mysqli_fetch_assoc($get_mdl_name);
												$mdl_name = $fetch_mdl_name['Email_ID'];
												echo $mdl_name;
												?>
												</td>
												<td>
												<?php
												$get_smdl_name = $conn->query("select * from user_login_master where UserID=$smdl_id");
												$fetch_smdl_name = mysqli_fetch_assoc($get_smdl_name);
												$smdl_name = $fetch_smdl_name['Email_ID'];
												echo $smdl_name;
												?>
												</td>
												
												
												<td><?php echo $fetch_get_pnl_report_casino['event_name']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['market_type']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['market_name']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_type']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_stack']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_margin_used']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_runs']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_odds']; ?></td>
												
												<td>
												<?php
												$market_type = $fetch_get_pnl_report_casino['market_type'];
												$bet_type = $fetch_get_pnl_report_casino['bet_type'];
												$bet_odds = $fetch_get_pnl_report_casino['bet_odds'];
												$bet_stack = $fetch_get_pnl_report_casino['bet_stack'];
												$bet_margin_used = $fetch_get_pnl_report_casino['bet_margin_used'];
												
												if($market_type == "MATCH_ODDS"){
													if($bet_type == 'Yes'){
														echo $win = (($bet_odds-1)) * $bet_stack;
													}else{
														echo $win = $bet_stack;
													}
												}else{
													$net_profit = ($bet_stack * ($bet_odds-1));
													echo $win = $bet_stack + $net_profit;
												}
												?>
												</td>
												
												<td>
												<?php
												if($market_type == "MATCH_ODDS"){
													if($bet_type == 'Yes'){
														echo $loss = $bet_margin_used;
													}else{
														echo $loss = ($bet_odds-1) * $bet_stack;
													}
												}else{
														echo $loss = $bet_stack;
												}
												?>
												</td>
												
												
												<td>
												<select name="set_result_casino" id="set_result_casino<?php echo $fetch_get_pnl_report_casino['bet_id'];  ?>" onchange="$('#delete_otp').val('');set_otp('<?php echo $fetch_get_pnl_report_casino['bet_id']; ?>','casino_bet')">
													<option value="">Select</option>
													<option value="Cancel">Cancel</option>
												</select>
												</td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_time']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_ip_address']; ?></td>
												<td><?php echo $fetch_get_pnl_report_casino['bet_user_agent']; ?></td>
											</tr>
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
</body>

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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="assets/toastr.min.css" rel="stylesheet"/>
<script src="assets/toastr.min.js" type="text/javascript"></script>
<script>

$(document).ready(function() {
  $("#smdl_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_smdl_name.php",
	select: function(){
         betUpdate();
    }
  });
});
$(document).ready(function() {
  $("#mdl_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_mdl_name.php",
	select: function(){
         betUpdate();
    }
  });
});
$(document).ready(function() {
  $("#dl_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_dl_name.php",
	select: function(){
         betUpdate();
    }
  });
});
$(document).ready(function() {
  $("#client_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_client_name.php",
	select: function(){
         betUpdate();
    }
  });
});
$(document).ready(function() {
  $("#event_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_active_event_name.php",
	/* onSelect: function(e){
         betUpdate();
		 console.log(e);
    } */
  });
});
$(document).ready(function() {
  $("#market_name").autocomplete({
    source: "ajaxfiles/ajax_autocomplete_active_market_name.php",
	select: function(){
         betUpdate();
    }
  });
});



/* setInterval(function(){
	betUpdate();
},5000); */
//setInterval(function(){

function betUpdate(){
	console.log("ok");
	$('#modal-delete_otp').modal('hide');
	var client_name = $("#client_name").val();
	var dl_name = $("#dl_name").val();
	var mdl_name = $("#mdl_name").val();
	var smdl_name = $("#smdl_name").val();
	var event_name = $("#event_name").val();
	var market_name = $("#market_name").val();
	console.log(client_name);
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/bet_ticker_casino.php',
			 dataType: 'JSON',
			 data: {client_name:client_name,dl_name:dl_name,mdl_name:mdl_name,smdl_name:smdl_name,event_name:event_name,market_name:market_name},
			 success: function(response) {
				console.log(response);
				var bet_ticker  = response.bet_ticker;
				
				bet_ticker_html ="";
				for(i=0;i<bet_ticker.length;i++){
					bet_id = bet_ticker[i].bet_id;
					user_name = bet_ticker[i].user_name;
					dl_name = bet_ticker[i].dl_name;
					mdl_name = bet_ticker[i].mdl_name;
					smdl_name = bet_ticker[i].smdl_name;
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
					bet_ip_address = bet_ticker[i].bet_ip_address;
					bet_user_agent = bet_ticker[i].bet_user_agent;
					
					bet_ticker_html +="<tr>";
					bet_ticker_html +="<td>"+user_name+"</td>";
					bet_ticker_html +="<td>"+dl_name+"</td>";
					bet_ticker_html +="<td>"+mdl_name+"</td>";
					bet_ticker_html +="<td>"+smdl_name+"</td>";
					
					
					
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
					
					if(market_type == "FANCY_ODDS" || market_type == "MATCH_ODDS" || market_type == "BOOKMAKER_ODDS"){
						bet_ticker_html +=`<td><select name="set_result" id="set_result_${bet_id}" onchange="$('#delete_otp').val('');set_otp(${bet_id},'bet')"><option value="">Select</option><option value="Win">Win</option><option value="Loss">Loss</option><option value="Delete">Delete</option><option value="Cancel">Cancel</option></select></td>`;
					
					}
					else{
						bet_ticker_html +=`<td><select name="set_result_casino" id="set_result_casino${bet_id}" onchange="$('#delete_otp').val('');set_otp(${bet_id},'casino_bet')"><option value="">Select</option><option value="Cancel">Cancel</option></select></td>`;
					
					}
					
					bet_ticker_html +="<td>"+date_time+"</td>";
					bet_ticker_html +="<td>"+bet_ip_address+"</td>";
					bet_ticker_html +="<td>"+bet_user_agent+"</td>";
					
					bet_ticker_html +="</tr>";
				}
				
					$("#active_bet_ticker").html(bet_ticker_html);
			 }
		 });
}

	var client_name = $("#client_name").val();
	var dl_name = $("#dl_name").val();
	var mdl_name = $("#mdl_name").val();
	var smdl_name = $("#smdl_name").val();
	var event_name = $("#event_name").val();
	var market_name = $("#market_name").val();
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/bet_ticker_casino.php',
			 dataType: 'JSON',
			 data: {client_name:client_name,dl_name:dl_name,mdl_name:mdl_name,smdl_name:smdl_name,event_name:event_name,market_name:market_name},
			 success: function(response) {
				
				var bet_ticker  = response.bet_ticker;
				
				bet_ticker_html ="";
				for(i=0;i<bet_ticker.length;i++){
					bet_id = bet_ticker[i].bet_id;
					user_name = bet_ticker[i].user_name;
					dl_name = bet_ticker[i].dl_name;
					mdl_name = bet_ticker[i].mdl_name;
					smdl_name = bet_ticker[i].smdl_name;
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
					
					bet_ip_address = bet_ticker[i].bet_ip_address;
					bet_user_agent = bet_ticker[i].bet_user_agent;
					
					bet_ticker_html +="<tr>";
					bet_ticker_html +="<td>"+user_name+"</td>";
					bet_ticker_html +="<td>"+dl_name+"</td>";
					bet_ticker_html +="<td>"+mdl_name+"</td>";
					bet_ticker_html +="<td>"+smdl_name+"</td>";
					
					
					
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
					
					if(market_type == "FANCY_ODDS" || market_type == "MATCH_ODDS" || market_type == "BOOKMAKER_ODDS"){
						bet_ticker_html +=`<td><select name="set_result" id="set_result_${bet_id}" onchange="$('#delete_otp').val('');set_otp(${bet_id},'bet')"><option value="">Select</option><option value="Win">Win</option><option value="Loss">Loss</option><option value="Delete">Delete</option><option value="Cancel">Cancel</option></select></td>`;
					
					}
					else{
						bet_ticker_html +=`<td><select name="set_result_casino" id="set_result_casino${bet_id}" onchange="$('#delete_otp').val('');set_otp(${bet_id},'casino_bet')"><option value="">Select</option><option value="Cancel">Cancel</option></select></td>`;
					
					}

					/* if(market_type == "FANCY_ODDS" || market_type == "MATCH_ODDS" || market_type == "BOOKMAKER_ODDS"){
						bet_ticker_html +="<td><select name='set_result' id='set_result_"+bet_id+"' onchange='set_result("+bet_id+")'><option value=''>Select</option><option value='Win'>Win</option><option value='Loss'>Loss</option><option value='Delete'>Delete</option><option value='Cancel'>Cancel</option></select></td>";
					
					}
					else{
						bet_ticker_html +="<td><select name='set_result_casino' id='set_result_casino"+bet_id+"' onchange='set_result_casino("+bet_id+")'><option value=''>Select</option><option value='Cancel'>Cancel</option></select></td>";
					
					} */
					
					
					bet_ticker_html +="<td>"+date_time+"</td>";
					bet_ticker_html +="<td>"+bet_ip_address+"</td>";
					bet_ticker_html +="<td>"+bet_user_agent+"</td>";
					
					bet_ticker_html +="</tr>";
				}
				
					$("#active_bet_ticker").html(bet_ticker_html);
			 }
		 });
//},3000);


function set_otp(bet_id,type){
	jQuery(".myLoading").show();
	var result_status="";
	if(type=="bet"){
		result_status = $('#set_result_'+bet_id).val();
	}
	if(type=="casino_bet"){
		result_status = $('#set_result_casino'+bet_id).val();
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
				betUpdate();
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
	var result_status = $('#set_result_casino'+bet_id).val();
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
				betUpdate();
				
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
			/* if(status == "ok"){
				$(".alert-success").fadeIn('slow').delay(3000).hide(0);;
				$(".alert-danger").hide();
				$(".alert-success strong").text(message);
			}else{
				$(".alert-success").hide();
				$(".alert-danger").fadeIn('slow').delay(3000).hide(0);;
				$(".alert-danger strong").text(message);
			}
			betUpdate(); */
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
