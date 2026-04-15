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
                                    <h4 class="mb-0">Profit Loss</h4></div>
                                <div class="card-body container-fluid container-fluid-5">
                                    <div class="row row5">
                                        <div class="col-2">
                                            <div class="form-group mb-0">
                                                <input type="date" name="from_date" id="from_date" value="<?php echo date("Y-m-d",strtotime("-7 days")); ?>" class="custom-text"/>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group mb-0">
                                                <input type="date" name="to_date" id="to_date" value="<?php echo date("Y-m-d"); ?>" class="custom-text"/>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-primary btn-block" id="setFilter">Submit</button>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="row row5 mt-2">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table b-table table-striped table-bordered" id="prodit_loss_table">
                                                    <!---->
                                                    <!---->
                                                    <thead class="">
                                                        <!---->
                                                        <tr class="">
                                                            <th class="text-center">Event Type</th>
                                                            <th class="text-center">Event Name</th>
                                                            <th class="text-right">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="Open_Bet_Body"></tbody>
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
			<script src="storage/js/jquery.dataTables.min.js" type="text/javascript"></script>

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="storage/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>


<script type="text/javascript">

jQuery(document).on("click", "#setFilter", function () {
	
	$(".loader").show();
	var betStatus = '0';	
	startDate = $("#from_date").val();	
	endDate = $("#to_date").val();	
	var eventType = "All";	
	var open_bet_html= "";
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/profit_loss_report.php',
			 dataType: 'json',
			 data: {betStatus:betStatus,startDate:startDate,endDate:endDate,eventType:eventType},
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
						}else{
							
							if(check_status == "ok"){
								bet_profit_loss = response['bet_profit_loss'];
									if(bet_profit_loss == null || bet_profit_loss.length == 0){
										
										$("#bet-error-class").removeClass("b-toast-success");
										$("#bet-error-class").removeClass("b-toast-danger");
										$("#bet-error-class").addClass("b-toast-danger");
										$("#errorMsgText").text("You have no bets in this time period.");
										$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
										open_bet_html = "<tbody id='Open_Bet_Body'><tr id='noDataTemplate' style='display: table-row;'><td class='no-data' colspan='3'><p>You have no bets in this time period.</p></td></tr></tbody>";
									}else{
										
										for(i=0;i<bet_profit_loss.length;i++){
											
											
											event_type = bet_profit_loss[i].event_type;
											event_name = bet_profit_loss[i].event_name;
											sum_profit_loss = bet_profit_loss[i].sum_profit_loss;
											bet_time = bet_profit_loss[i].bet_onlydate;
											sum_profit_loss = parseFloat(sum_profit_loss).toFixed(2);
											
											if(event_type == 4){
												event_type_label = "Cricket";
											}else if(event_type == 2){
												event_type_label = "Tennis";
											}else if(event_type == 1) {
												event_type_label = "Soccer";
											}else{
												event_type_label = event_type;
											}
											if(sum_profit_loss < 0){
												font_color = "red";
											}else{
												font_color = "green";
											}
											
											open_bet_html +="<tr id='noDataTemplate' style='display: table-row;'><td class='no-data text-center'><p>"+event_type_label+"</p></td><td class='no-data text-center'><p>"+event_name+"</p></td><td class='no-data text-right' style='color:"+font_color+";'><p>"+sum_profit_loss+"</p></td></tr>";
											
										}
										
									}
									
									$("#Open_Bet_Body").html(open_bet_html);
									$("#prodit_loss_table").DataTable({ "pageLength": 50});
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
	
});
		
</script>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
<div class="b-toaster-slot vue-portal-target">
    <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
        <div tabindex="0"  class="toast">
            <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>