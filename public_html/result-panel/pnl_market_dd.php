<?php

include('../include/conn.php');

include "session.php";

$user_id = $_SESSION['CONTROLLER_LOGIN_ID']; 







$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

$start_date = date("Y-m-d", strtotime($start_date));

$end_date = date("Y-m-d", strtotime($end_date));



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
td.details-control , td.details-control:hover{
    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center !important;
    cursor: pointer;
}
tr.shown td.details-control, tr.shown td.details-control:hover {
    background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center !important;
}
</style>

<div class="right_col" role="main" style="min-height: 1171px;">

<?php 



//include("below_header.php");

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

			<div class="col-md-12 col-sm-12 col-xs-12">
			

				<div class="col-md-3">

					</div>

					<div class="col-md-3">

					</div>

					<div class="col-md-3">

					</div>

				

				</div>

				<div class="x_panel">


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
					

				

					<div class="col-md-2">

						

							<div class="control-group">

							

							<div class="controls">

							<label class="form-group ">Event Type:</label>

							<div class="col-md-11 xdisplay_inputx form-group has-feedback">

							<select  class="form-control" name="event_type" id="event_type">

								<option value="All">All</option>

								<option value="4" >Cricket</option>

								<option value="1" >Soccer</option>

								<option value="2" >Tennis</option>

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

							<input type="text" class="form-control" name="event_name" id="event_name" value="">

							

							</div>

							</div>

							</div>

					</div>
					<div class="col-md-3">

						

							<div class="control-group">

							

							<div class="controls">

							<label class="form-group ">Market Name:</label>

							<div class="col-md-11 xdisplay_inputx form-group has-feedback">

							<input type="text" class="form-control" name="market_name" id="market_name" value="">

							

							</div>

							</div>

							</div>

					</div>

					<div class="col-md-3">

						

							<div class="control-group">

							

							<div class="controls">

							<label class="form-group ">Start date:</label>

							<div class="col-md-11 xdisplay_inputx form-group has-feedback">

							

							<input type="text" class="form-control has-feedback-left" name="start_date" id="single_cal1" placeholder="Start Date" aria-describedby="inputSuccess2Status" value="<?php echo date('m/d/Y'); ?>">

							<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>

							 <span id="inputSuccess2Status" class="sr-only">(success)</span>

							</div>

							</div>

							</div>

					</div>

					

					

					<div class="col-md-3">

					

						

							<div class="control-group">

							

							<div class="controls">

							<label class="form-group ">End date:</label>

							<div class="col-md-11 xdisplay_inputx form-group has-feedback">

							

							<input type="text" class="form-control has-feedback-left" name="end_date" id="single_cal2" placeholder="End Date" aria-describedby="inputSuccess2Status" value="">

							<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>

							 <span id="inputSuccess2Status" class="sr-only">(success)</span>

							</div>

							</div>

							</div>

						

					</div>

					

					<div class="col-md-1">

					

						

						

							<div class="control-group">

							

							<div class="controls">

							<label class="form-group ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

							<div class="col-md-11 xdisplay_inputx form-group has-feedback">

							

							<button type="submit" class="btn btn-success" id="search_pnl_filter">Search</button>

							</div>

							</div>

							</div>

						

					</div>

				</div>


					<div class="x_content">

						

						<div class="table-responsive">

						<table class="table table-striped bulk_action">
								<thead>
									<tr class="headings">
										
											<th class="column-title" style="display: table-cell;"></th>
											<th class="column-title" colspan="4" style="display: table-cell;border-left:1px solid #ddd;text-align:center;">Member</th>
											<th class="column-title" colspan="3" style="display: table-cell;border-left:1px solid #ddd;text-align:center;"> Agent</th>
											<th class="column-title" style="display: table-cell;border-left:1px solid #ddd;text-align:center;">Upline</th>
											
											
										</tr>
										<tr class="headings">
										
											<th class="column-title" style="display: table-cell;"></th>
											<th class="column-title" style="display: table-cell;border-left:1px solid #ddd;">T/O</th>
											<th class="column-title" style="display: table-cell;">Win </th>
											<th class="column-title" style="display: table-cell;">Comm</th>
											<th class="column-title" style="display: table-cell;"> P&L </th>
											<th class="column-title" style="display: table-cell;border-left:1px solid #ddd;"> Win</th>
											<th class="column-title" style="display: table-cell;">Comm(Controller)</th>
											<th class="column-title" style="display: table-cell;">P&L </th>
											<th class="column-title" style="display: table-cell;border-left:1px solid #ddd;">Upline</th>
											
											
										</tr>
									</thead>
									<tbody id="event_wise_net_exposure">
											
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


<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">

</body>

<script>

//setInterval(function(){ 
event_name = "";
		market_name = "";
		eventType = "All"
		start_date = "<?php echo date('m/d/Y'); ?>";
		end_date = "<?php echo date("m/d/Y"); ?>";
		var client_name = $("#client_name").val();
		var dl_name = $("#dl_name").val();
		var mdl_name = $("#mdl_name").val();
		
		$.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/pnl_market_report_dd.php',
		 dataType: 'text',
		 data: {eventType:eventType,start_date:start_date,end_date:end_date,client_name:client_name,dl_name:dl_name,mdl_name:mdl_name,event_name:event_name,market_name:market_name},
		 success: function(response) {
			
			
			$("#event_wise_net_exposure").html(response);
		 }
	 });
		
	//}, 3000);

	jQuery(document).on("click", "#search_pnl_filter", function () {
		event_name = "";
		market_name = "";
		var event_type = $("#event_type").val();
		 event_name = $("#event_name").val();
		var start_date = $("#single_cal1").val();
		var end_date = $("#single_cal2").val();
		var client_name = $("#client_name").val();
		var dl_name = $("#dl_name").val();
		var mdl_name = $("#mdl_name").val();
		market_name = $("#market_name").val();
		
		$.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/pnl_market_report_dd.php',
		 dataType: 'text',
		 data: {eventType:event_type,event_name:event_name,start_date:start_date,end_date:end_date,client_name:client_name,dl_name:dl_name,mdl_name:mdl_name,market_name:market_name},
		 success: function(response) {
			
			
			$("#event_wise_net_exposure").html(response);
		 }
	 });
	});


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
<div class="modal" id="myModal">
  <div class="modal-dialog" style="width:75%;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>

jQuery(document).on("click", ".view_market_exposure", function () {
	var event_name = $(this).attr('event_name');
	var event_id = $(this).attr('event_id');
	var market_id = $(this).attr('market_id');
		var client_name = $("#client_name").val();
		var dl_name = $("#dl_name").val();
		var mdl_name = $("#mdl_name").val();
	$(".modal-title").text(event_name);
		$.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/pnl_market_report_bet_details.php',
		 dataType: 'text',
		 data: {market_id:market_id,event_id:event_id,client_name:client_name,dl_name:dl_name,mdl_name:mdl_name},
		 success: function(response) {
			
	
			$(".modal-body").html(response);
			 var table = $('#example').DataTable( { 
							info: false,"paging":   false,
							});
	
	$(document).on('click', 'td.details-control', function () {
        var user_id = $(this).attr('user_id');
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
			$.ajax({
		 type: 'POST',
		 url: 'ajaxfiles/pnl_market_report_bet_details_user_wise.php',
		 dataType: 'text',
		 data: {market_id:market_id,event_id:event_id,client_name:client_name,dl_name:dl_name,mdl_name:mdl_name,user_id:user_id},
		 success: function(response) {
		  row.child( response ).show();
            tr.addClass('shown');
		 }
		});
            
        }
    } );
	
		 }
	 });
	
});

 
</script>
</html>