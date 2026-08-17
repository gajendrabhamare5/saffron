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
                        <h4 class="mb-0">Un-Setteled Bet</h4></div>
                    <div class="card-body container-fluid container-fluid-5 unsetteledbet">
                        <div class="row row5">
                            <div class="col-12 text-center">
                                <div id="match_unmatched_delete" role="radiogroup" tabindex="-1">
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="matched" type="radio" name="match_unmatched_delete" autocomplete="off" value="1" class="custom-control-input">
                                        <label for="matched" class="custom-control-label"><span>Matched</span></label>
                                    </div>
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="unmatched" type="radio" name="match_unmatched_delete" autocomplete="off" value="3" class="custom-control-input">
                                        <label for="unmatched" class="custom-control-label"><span>Un-Matched</span></label>
                                    </div>
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="deleteed" type="radio" name="match_unmatched_delete" autocomplete="off" value="2" class="custom-control-input">
                                        <label for="deleteed" class="custom-control-label"><span>Deleted</span></label>
                                    </div>
                                </div>
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

<script>
 $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var bet_type = $("input[name='match_unmatched_delete']:checked").val();
            if(bet_type == 1){
                current_bet_data();
            }else if(bet_type == 2){
				deleted_data();
			}else if(bet_type == 3){
				current_unmatched_bet_data();
			}
        });
    });
	
	function deleted_data(){
		$(".loader").show();
	var open_bet_html = "";
	eventType = $("#eventType").val();	
	$.ajax({
		 type: 'POST',
		 url: '../ajaxfiles/deleted_bet.php',
		 dataType: 'json',
		 data: {deleted:true},
		 success: function(response) {
			 $(".loader").hide();
			var check_status = response['status'];
				if(check_status == "ok"){
					open_bet_data = response['open_bet_data'];
						if(open_bet_data == null || open_bet_data.length == null || open_bet_data.length == 0){
							var message = response['message'];
							$("#bet-error-class").removeClass("b-toast-success");
							$("#bet-error-class").removeClass("b-toast-danger");
							$("#bet-error-class").addClass("b-toast-danger");
							$("#errorMsgText").text(message);
							$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
							
						}else{
							
							for(i=0;i<open_bet_data.length;i++){
								
								bet_stack = open_bet_data[i].bet_stack;
								market_name = open_bet_data[i].market_name;
								bet_odds = open_bet_data[i].bet_odds;
								bet_runs = open_bet_data[i].bet_runs;
								bet_runs2 = open_bet_data[i].bet_runs2;
								event_name = open_bet_data[i].event_name;
								bet_type = open_bet_data[i].bet_type;
								market_type = open_bet_data[i].market_type;
								bet_time = open_bet_data[i].bet_time;
								event_type = open_bet_data[i].event_type;
								if(bet_type == "No"){
									class_type = "lay";
								}else{
									class_type = "back";
								}
								
								var odds = bet_odds;
                                                        
								if(market_type == "BOOKMAKER_ODDS"){
									odds = parseInt(parseFloat(odds) * 100 - 100);
								}
								
								if(market_type == "KHADO_ODDS"){
									odds = bet_runs;
									market_name += '-'+ ((bet_runs2 - bet_runs)+1);
								}
								else if(bet_runs > 0){
									odds = bet_runs;
									market_name += ' / '+bet_odds;
								}
								
								if(event_type == 4){
									event_type_label = "Cricket";
								}else if(event_type == 2){
									event_type_label = "Tennis";
								}else if(event_type == 1) {
									event_type_label = "Soccer";
								}else if(event_type == 2020) {
									event_type_label = "2020 Teenpatti";
								}
								sr_no = i+ 1; 
								
								
								open_bet_html +="<div class='unsetteled-bet "+class_type+"'><div class='row row5'><div class='col-6'><div><a><b>"+event_name+"</b></a></div><div><b>Event Type: </b>"+event_type_label+"</div><div><b>Market Name: </b>"+market_type+"</div><div><b>Place Date: </b>"+bet_time+"</div><div><b>Matched Date: </b>"+bet_time+"</div></div><div class='col-2 '><div><b>Nation</b></div><div>"+market_name+"</div></div><div class='col-2 text-right'><div><b>Rate</b></div><div>"+odds+"</div></div><div class='col-2 text-right'><div><b>Amount</b></div><div>"+bet_stack+"</div></div></div></div>";
								
							}
							
						}
						$("#Open_Bet_Body").html(open_bet_html);
				}
				
		}
	});
}

function current_bet_data(){
	$(".loader").show();
	var open_bet_html = "";
	eventType = $("#eventType").val();	
	$.ajax({
		 type: 'POST',
		 url: '../ajaxfiles/open_bet.php',
		 dataType: 'json',
		 data: {unsetteled:true},
		 success: function(response) {
			 $(".loader").hide();
			var check_status = response['status'];
				if(check_status == "ok"){
					open_bet_data = response['open_bet_data'];
						if(open_bet_data == null || open_bet_data.length == null || open_bet_data.length == 0){
							var message = response['message'];
							$("#bet-error-class").removeClass("b-toast-success");
							$("#bet-error-class").removeClass("b-toast-danger");
							$("#bet-error-class").addClass("b-toast-danger");
							$("#errorMsgText").text(message);
							$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
							
						}else{
							
							for(i=0;i<open_bet_data.length;i++){
								
								bet_stack = open_bet_data[i].bet_stack;
								market_name = open_bet_data[i].market_name;
								bet_odds = open_bet_data[i].bet_odds;
								bet_runs = open_bet_data[i].bet_runs;
								bet_runs2 = open_bet_data[i].bet_runs2;
								event_name = open_bet_data[i].event_name;
								bet_type = open_bet_data[i].bet_type;
								market_type = open_bet_data[i].market_type;
								bet_time = open_bet_data[i].bet_time;
								event_type = open_bet_data[i].event_type;
								
								if(bet_type == "No" || bet_type == "Lay"){
									class_type = "lay";
								}else{
									class_type = "back";
								}
								
								var odds = bet_odds;
                                                        
								if(market_type == "BOOKMAKER_ODDS"){
									odds = parseInt(parseFloat(odds) * 100 - 100);
								}
								
								if(market_type == "KHADO_ODDS"){
									odds = bet_runs;
									market_name += '-'+ ((bet_runs2 - bet_runs)+1);
								}
								else if(bet_runs > 0){
									odds = bet_runs;
									market_name += ' / '+bet_odds;
								}
								
								event_type_label  = "";
								if(event_type == 4){
									event_type_label = "Cricket";
								}else if(event_type == 2){
									event_type_label = "Tennis";
								}else if(event_type == 1) {
									event_type_label = "Soccer";
								}else if(event_type == 2020) {
									event_type_label = "2020 Teenpatti";
								}
								sr_no = i+ 1; 
								open_bet_html +="<div class='unsetteled-bet "+class_type+"'><div class='row row5'><div class='col-6'><div><a><b>"+event_name+"</b></a></div><div><b>Event Type: </b>"+event_type_label+"</div><div><b>Market Name: </b>"+market_type+"</div><div><b>Place Date: </b>"+bet_time+"</div><div><b>Matched Date: </b>"+bet_time+"</div></div><div class='col-2 '><div><b>Nation</b></div><div>"+market_name+"</div></div><div class='col-2 text-right'><div><b>Rate</b></div><div>"+odds+"</div></div><div class='col-2 text-right'><div><b>Amount</b></div><div>"+bet_stack+"</div></div></div></div>";
								
							}
							
						}
						$("#Open_Bet_Body").html(open_bet_html);
				}
				
		}
	});
}

function current_unmatched_bet_data(){
	$(".loader").show();
	var open_bet_html = "";
	eventType = $("#eventType").val();	
	$.ajax({
		 type: 'POST',
		 url: '../ajaxfiles/unmatched_bet.php',
		 dataType: 'json',
		 data: {eventType:eventType},
		 success: function(response) {
			$(".loader").hide(); 
			var check_status = response['status'];
				if(check_status == "ok"){
					open_bet_data = response['unmatched_bet_data'];
						if(open_bet_data == null || open_bet_data.length == null || open_bet_data.length == 0){
							var message = response['message'];
							$("#bet-error-class").removeClass("b-toast-success");
							$("#bet-error-class").removeClass("b-toast-danger");
							$("#bet-error-class").addClass("b-toast-danger");
							$("#errorMsgText").text(message);
							$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
							
						}else{
							
							for(i=0;i<open_bet_data.length;i++){
								
								bet_stack = open_bet_data[i].bet_stack;
								market_name = open_bet_data[i].market_name;
								bet_odds = open_bet_data[i].bet_odds;
								bet_runs = open_bet_data[i].bet_runs;
								bet_runs2 = open_bet_data[i].bet_runs2;
								event_name = open_bet_data[i].event_name;
								bet_type = open_bet_data[i].bet_type;
								market_type = open_bet_data[i].market_type;
								bet_time = open_bet_data[i].bet_time;
								event_type = open_bet_data[i].event_type;
								if(bet_type == "No" || bet_type == "Lay"){
									class_type = "lay";
								}else{
									class_type = "back";
								}
								
								var odds = bet_odds;
                                                        
								if(market_type == "BOOKMAKER_ODDS"){
									odds = parseInt(parseFloat(odds) * 100 - 100);
								}
								
								if(market_type == "KHADO_ODDS"){
									odds = bet_runs;
									market_name += '-'+ ((bet_runs2 - bet_runs)+1);
								}
								else if(bet_runs > 0){
									odds = bet_runs;
									market_name += ' / '+bet_odds;
								}
								
								if(event_type == 4){
									event_type_label = "Cricket";
								}else if(event_type == 2){
									event_type_label = "Tennis";
								}else if(event_type == 1) {
									event_type_label = "Soccer";
								}else if(event_type == 2020) {
									event_type_label = "2020 Teenpatti";
								}
								sr_no = i+ 1; 
							open_bet_html +="<div class='unsetteled-bet "+class_type+"'><div class='row row5'><div class='col-6'><div><a><b>"+event_name+"</b></a></div><div><b>Event Type: </b>"+event_type_label+"</div><div><b>Market Name: </b>"+market_type+"</div><div><b>Place Date: </b>"+bet_time+"</div><div><b>Matched Date: </b>"+bet_time+"</div></div><div class='col-2 '><div><b>Nation</b></div><div>"+market_name+"</div></div><div class='col-2 text-right'><div><b>Rate</b></div><div>"+odds+"</div></div><div class='col-2 text-right'><div><b>Amount</b></div><div>"+bet_stack+"</div></div></div></div>";
								
							}
							
						}
						$("#Open_Bet_Body").html(open_bet_html);
				}
				
		}
	});
}

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