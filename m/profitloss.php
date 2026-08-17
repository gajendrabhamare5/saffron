<?php
	include("../include/conn.php");
	include("../include/flip_function.php");
	include("../session.php");
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

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
	include ("loader.php");
?>
        <div>
             <?php
				include("header.php");
			?>
            <div class="report-container">
                <!---->
				
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Profit Loss</h4></div>
                    <div class="card-body container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-6">
                                <div class="form-group mb-0">
                                    <input type="date" name="from_date" id="from_date" class="custom-text"  value="<?php echo date("Y-m-d",strtotime("-7 days")); ?>"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-0">
                                    <input type="date" name="to_date" id="to_date" class="custom-text"  value="<?php echo date("Y-m-d"); ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-sm" id="setFilter">Submit</button>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12" id="Open_Bet_Body">
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>    
<?php
	include "footer.php";
?>
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
			 url: '../ajaxfiles/profit_loss_report.php',
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
											}else if(event_type == 1){
												event_type_label = "Soccer";
											}else{
												event_type_label = event_type;
											}
											if(sum_profit_loss < 0){
												font_color = "danger";
											}else{
												font_color = "success";
											}
											
											
											
											open_bet_html +="<div class='profit-loss'><div class='row row5'><div class='col-7'><div><a>"+event_type_label+"</a></div><div><b>Event Name: </b>"+event_name+"</div></div><div class='col-5 text-right'><div><b>Amount</b></div><div class='text-"+font_color+"'> "+sum_profit_loss+"</div></div></div></div>";
											
										}
										
									}
									
									$("#Open_Bet_Body").html(open_bet_html);
									
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