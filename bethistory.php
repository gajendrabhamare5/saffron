<?php
include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head_css.php");
?>
<style>
input.custom-text {
    display: inline-block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem 0.1rem .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background-size: 8px 10px;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
</style>
<body cz-shortcut-listen="true" class="" data-modal-open-count="0">
    <div id="app">
        <?php
			include("loader.php");
			?>
        <div class="wrapper">
             <?php
			include("header.php");
			?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">
                        
						<?php
						include("left_sidebar.php");
						?>
						
                        <div class="col-md-10 report-main-content m-t-5">
						<div class="loader" style="display:none;"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Bet History</h4></div>
                                <div class="card-body container-fluid container-fluid-5">
                                    <div class="row row5 mt-2">
                                        <div class="col-2">
                                            <div class="form-group mb-0">
                                                <select name="reportType" id="eventType" class="custom-select">
                                                    <option value="" disabled="disabled">Sport Type</option>
                                                    <option value="1">Football</option>
                                                    <option value="2">Tennis</option>
                                                    <option value="4">Cricket</option>
													<option value="999">Casino</option>
													
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group mb-0">
                                                <select name="reportType" id="betType" class="custom-select">
                                                    <option value="" disabled="disabled">Bet Status</option>
                                                    <option value="0">Matched</option>
                                                    <option value="2">Deleted</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group mb-0">
                                                <input type="date" name="from_date" id="from_date" class="custom-text"/>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group mb-0">
                                                <input type="date" name="to_date" id="to_date" class="custom-text"/>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-primary btn-block" onclick="past_bet()">Submit</button>
                                        </div>
                                    </div>
                                    <div class="row row5 mt-2"></div>
                                    <!---->
                                    <div class="row row5 mt-2">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table role="table" aria-busy="false" aria-colcount="8" class="table b-table table-bordered" id="__BVID__148">
                                                    <!---->
                                                    <!---->
                                                    <thead role="rowgroup" class="">
                                                        <!---->
                                                        <tr role="row" class="">
                                                            <th role="columnheader" scope="col" aria-colindex="1" class="text-center">Event Name</th>
                                                            <th role="columnheader" scope="col" aria-colindex="2" class="text-center">Nation</th>
                                                            <th role="columnheader" scope="col" aria-colindex="3" class="text-center">Bet Type</th>
                                                            <th role="columnheader" scope="col" aria-colindex="4" class="text-center">User Rate</th>
                                                            <th role="columnheader" scope="col" aria-colindex="5" class="text-right">Amount</th>
                                                            <th role="columnheader" scope="col" aria-colindex="6" class="text-right">Profit/Loss</th>
                                                            <th role="columnheader" scope="col" aria-colindex="7" class="text-center">Place Date</th>
                                                            <th role="columnheader" scope="col" aria-colindex="8" class="text-center">Match Date</th>
                                                        </tr>
                                                    </thead>
                                                      <tbody id="Past_Bet_Body">
            
        </tbody>
                                                    <!---->
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row5 mt-2">
                                        <div class="col-12">
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript" src="js/jquery.min.js"></script>    
	<?php
			include("footer.php");
			?>
        </div>
    </div>
	
     <?php
				include("footer-js.php");
			?>
<script>
function past_bet(){
	$(".loader").show();
	var betStatus = "All";	
	startDate = $("#from_date").val();	
	endDate = $("#to_date").val();	
	eventType = $("#eventType").val();	
	betType = $("#betType").val();	
	var open_bet_html= "";
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/bet_history.php',
			 dataType: 'json',
			 data: {betStatus:betStatus,startDate:startDate,endDate:endDate,eventType:eventType,betType:betType},
			 success: function(response) {
				 $(".loader").hide();
						var check_status = response['status'];
						if(response['message']){
							var message = response['message'];
							$("#bet-error-class").removeClass("b-toast-success");
							$("#bet-error-class").removeClass("b-toast-danger");
							$("#bet-error-class").addClass("b-toast-danger");
							$("#errorMsgText").text(message);
							$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
							open_bet_html = "<tr id='noDataTemplate' style='display: table-row;'><td class='no-data' colspan='8'><p>"+message+"</p></td></tr>";
							$("#report").show();
									$("#loading").hide();
									$("#Past_Bet_Body").html(open_bet_html);
						}else{
							
							if(check_status == "ok"){
								bet_history_data = response['bet_history_data'];
									if(bet_history_data == null || bet_history_data.length == 0){
										$("#bet-error-class").removeClass("b-toast-success");
							$("#bet-error-class").removeClass("b-toast-danger");
							$("#bet-error-class").addClass("b-toast-danger");
							$("#errorMsgText").text(message);
							$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
										open_bet_html = "<tr id='noDataTemplate' style='display: table-row;'><td class='no-data' colspan='8'><p>"+message+"</p></td></tr>";
									}else{
										
										for(i=0;i<bet_history_data.length;i++){
											
											bet_stack = bet_history_data[i].bet_stack;
											market_name = bet_history_data[i].market_name;
											bet_odds = bet_history_data[i].bet_odds;
											bet_runs = bet_history_data[i].bet_runs;
											event_name = bet_history_data[i].event_name;
											bet_type = bet_history_data[i].bet_type;
											market_type = bet_history_data[i].market_type;
											bet_time = bet_history_data[i].bet_time;
											return_stake = bet_history_data[i].bet_result;
											bet_status = bet_history_data[i].bet_status;
											event_type = bet_history_data[i].event_type;
											if(bet_status == 1 ){
												bet_status = "Open";
											}else if(bet_status == 0){
												bet_status = "Closed";
											}else{
												bet_status = "Cancelled";
											}
											if(bet_type == "No"){
												class_type = "lay";
											}else{
												class_type = "back";
											}
											if(event_type == 4){
												event_type_label = "Cricket";
											}else if(event_type == 2){
												event_type_label = "Tennis";
											}else if(event_type == 1) {
												event_type_label = "Soccer";
											}
											return_stake = parseFloat(return_stake).toFixed(2);
											if(return_stake >= 0){
												amount_color_stake = 'color: green;font-weight: bold;';
											}else{
												amount_color_stake = 'color: red;font-weight: bold;';
											}
											open_bet_html +="<tr style='display: table-row;' class='"+class_type+"'><td class='no-data'><p>"+event_name+"</p></td><td class='no-data'><p>"+market_name+"</p></td><td class='no-data'><p>"+bet_type+"</p></td><td class='no-data'><p>"+bet_odds+"</p></td><td class='no-data'><p>"+bet_stack+"</p></td><td class='no-data'><p>"+return_stake+"</p></td><td class='no-data'><p>"+bet_time+"</p></td><td class='no-data'><p>"+bet_time+"</p></td></tr>";
											
										}
										
									}
									$("#report").show();
									$("#loading").hide();
									$("#Past_Bet_Body").html(open_bet_html);
							}else{
								$("#bet-error-class").removeClass("b-toast-success");
							$("#bet-error-class").removeClass("b-toast-danger");
							$("#bet-error-class").addClass("b-toast-danger");
							$("#errorMsgText").text("Something went wrong, please try again later.");
							$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
							}
						}
			 }
	});
}
</script>
</body>

</html>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
<div class="b-toaster-slot vue-portal-target">
    <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
        <div tabindex="0"  class="toast">
            <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>