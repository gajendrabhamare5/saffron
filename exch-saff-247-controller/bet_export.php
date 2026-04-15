<?php
include('../include/conn.php');
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if($login_type != 5){
	header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Trade Export</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Trade Export</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Trade Export</h2>

<div class="clearfix"></div>
</div>
<div class="x_content">

<div class="alert alert-success" style="display:none;">
  <strong></strong>
</div>
<div class="alert alert-danger" style="display:none;">
  <strong></strong>
</div>

<form method="post" action="bet_export_csv.php" class="form-horizontal form-label-left" onsubmit="return export_trade()">

					
	<div class="col-md-4">
		
			<div class="control-group">
			
			<div class="controls">
			<label class="form-group ">User Name :</label>
			<div class="col-md-12 form-group">
				<select class="js-states form-control"  multiple id="client_name_new" name="client_name_new[]">
				</select>
			</div>
			</div>
			</div>
	</div>
	<div class="col-md-4">
		
			<div class="control-group">
			
			<div class="controls">
			<label class="form-group ">Master Name :</label>
			<div class="col-md-12 form-group">
				<select class="js-states form-control"  multiple id="master_name_new" name="master_name_new[]">
				</select>
			</div>
			</div>
			</div>
	</div>
	<div class="col-md-4">
		
			<div class="control-group">
			
			<div class="controls">
			<label class="form-group ">Event Id :</label>
			<div class="col-md-12 form-group">
				<select class="js-states form-control" id="event_name" name="event_name">
					
				</select>
			</div>
			</div>
			</div>
	</div>
	<div class="col-md-4">
		
			<div class="control-group">
			
			<div class="controls">
			<label class="form-group ">Type :</label>
			<div class="col-md-12 form-group">
				<select class="js-states form-control" id="type_name" name="type_name">
					<option value="">All</option>
					<option value="MATCH_ODDS">MATCH_ODDS</option>
					<option value="BOOKMAKER_ODDS">BOOKMAKER_ODDS</option>
					<option value="FANCY_ODDS">FANCY_ODDS</option>
					
				</select>
			</div>
			</div>
			</div>
	</div>
	<div class="col-md-4">
		
			<div class="control-group">
			
			<div class="controls">
			<label class="form-group ">Status :</label>
			<div class="col-md-12 form-group">
				<select class="js-states form-control" id="status_name" name="status_name">
					<option value="">All</option>
					<option value="1">Active</option>
					<option value="0">Settled</option>
					<option value="2">Cancelled</option>
					<option value="hard_delete">Hard Delete</option>
					
				</select>
			</div>
			</div>
			</div>
	</div>
	<div class="col-md-4">
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">Start date:</label>
							<div class="col-md-12 form-group">
							
							<input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
							
							</div>
							</div>
							</div>
					</div>
					
					
					<div class="col-md-4">
					
						
							<div class="control-group">
							
							<div class="controls">
							<label class="form-group ">End date:</label>
							<div class="col-md-12 form-group">
							
							<input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date">
							
							</div>
							</div>
							</div>
						
					</div>

<!--<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-4">
		<div class="item form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Name <span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<select class="js-states form-control"  multiple id="client_name_new" name="client_name_new[]">
				</select>
			</div>
		</div>
	</div>
</div>-->





<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<input id="send" type="submit" class="btn btn-success" value="Submit">
</div>
 </div>
</form>
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
</html>

<script src="../js/socket.io.js"></script> 
 <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
     
      
      $("#client_name_new").select2({
          placeholder: "Select User",
          allowClear: true,
		  minimumInputLength: 2,
			ajax: { 
				url: "ajaxfiles/ajax_autocomplete_client_name_bet_export.php",
				dataType: 'json',
				data:function(dataa){
					return {
						term:dataa.term,
					};
				},
				processResults: function (data) { 
					return {
						results : $.map(data,function(item){
							return {
								text : item,
								id : item,
							}
						})
						
					};
				},
				cache:true,
			}
      });
	  $("#master_name_new").select2({
          placeholder: "Select Master",
          allowClear: true,
		  minimumInputLength: 2,
			ajax: { 
				url: "ajaxfiles/ajax_autocomplete_master_name_bet_export.php",
				dataType: 'json',
				data:function(dataa){
					return {
						term:dataa.term,
					};
				},
				processResults: function (data) { 
					return {
						results : $.map(data,function(item){
							return {
								text : item,
								id : item,
							}
						})
						
					};
				}, 
				cache:true,
			}
      });
	   $("#event_name").select2({
          placeholder: "Select Event",
          allowClear: true,
		  minimumInputLength: 2,
			ajax: { 
				url: "ajaxfiles/ajax_autocomplete_active_event_name2_bet_export.php",
				dataType: 'json',
				data:function(dataa){
					return {
						term:dataa.term,
					};
				},
				processResults: function (data) { 
					return {
						results : $.map(data,function(item){
							return {
								text : item,
								id : item,
							}
						})
						
					};
				},
				cache:true,
			}
      });
	 /*  $(document).ready(function() {
		  $("#client_name_new").autocomplete({
			source: "ajaxfiles/ajax_autocomplete_client_name.php",
		  });
		}); */
	function export_trade(){
	
		var client_name_new = $("#client_name_new").val();
		
		var master_name_new = $("#master_name_new").val();
		var event_name = $("#event_name").val();
		var type_name = $("#type_name").val();
		var status_name = $("#status_name").val();
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		
		/*if(client_name_new == null && master_name_new == null && event_name == null && type_name.length <= 0 && status_name.length <= 0 && start_date.length <= 0 && end_date.length <= 0)
		{
			$(".alert-danger").text("Select at least one value");
			$(".alert-danger").fadeIn('fast').delay(3000).hide(0);
			return false;
		}*/
		$("#send").html("Loading...");
		$("#send").removeAttr("onclick");
		return true;
		/* 
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/trade_export_csv.php',
			 data: {client_name_new:client_name_new,master_name_new:master_name_new,event_name:event_name,type_name:type_name,status_name:status_name,start_date:start_date,end_date:end_date},
			 dataType: 'JSON',
			 success: function(response) {
					
				var status  = response.status;
				var message  = response.message;
				if(status == "ok"){
					$(".alert-success").text("Restart API Successfully...");
					$(".alert-success").fadeIn('fast').delay(3000).hide(0);
					setTimeout(function(){ location.reload(); }, 3000);
		
				}
			 },
			 error:function(){
				 $("#send").html("Restart");
				$("#send").attr("onclick","export_trade()");
			 }
		 }); */
		
	}
    </script>