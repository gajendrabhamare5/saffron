<?php
   include('../include/conn.php');
   include "session.php";
   
   	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
   	$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
   	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
   	if($login_type != 5){
   		header("Location: ../logout.php");
   	}
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo SITE_NAME; ?> | Manage Events</title>
      <?php 
         include("header.php");
         ?>
      <div class="right_col" role="main" style="min-height: 1171px;">
         
         <div class="">
            <div class="page-title">
               <div class="title_left">
                  <h3>Manage Events</h3>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
               <div class="clearfix"></div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                     <div class="x_title">
                        <h2>Events List</h2>
                        <div class="clearfix"></div>
                        <div id="box-tools" style="float: right; margin-top: -30px;">
							<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-new_event" onclick="$('#event_name').attr('disabled',false);$('#sport_id').attr('disabled',false);">Add</a>
						 </div>
                     </div>
                     <div class="x_content">
						
                        <div class="table-responsive">
                           <table class="table table-striped jambo_table bulk_action dataTable no-footer nowrap display" id="example">
                              <thead>
                                 <tr class="headings">
                                 	<th class="column-title" style="display: table-cell;">Sport</th>
                                    <th class="column-title" style="display: table-cell;">Event Name </th>
                                    <th class="column-title" style="display: table-cell;">DATE</th>
                                    <th class="column-title" style="display: table-cell;">MATCH_ODD MAX</th>
                                    <th class="column-title" style="display: table-cell;">BOOKMAKER MAX</th>
                                    <th class="column-title" style="display: table-cell;">Exposure Limit</th>
                                    <th class="column-title" style="display: table-cell;">Action</th>
                                 </tr>
                              </thead>
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
</html>

<div id="modal-new_event" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Event</h4>
      </div>
      <div class="modal-body">        
		<form action="" name="form-add_new_event" id="form-add_new_event">
		
		<div id="ajax_alert" class="alert alert-dismissible" role="alert" style="display:none;">
		  <span id="ajax_alert_msg"></span>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		  <div class="form-group">
			<label for="email">Sports</label>
			<select class="form-control" id="sport_id" name="sport_id">
				<option value="">Select</option>
				<option value="4">Cricket</option>
				<option value="1">Football</option>
				<option value="2">Tennis</option>
			</select>
		  </div>
		  <div class="form-group">
			<label for="email">Event Name</label>
			<select class="form-control" id="event_name" name="event_name">
				<option value="">Select</option>
			</select>
		  </div>
		  <div class="form-group">
			<label for="pwd">MATCH_ODDS:</label>
			<input type="text" class="form-control" id="match_max" name="match_max" value="10000" autocomplete="off">
		  </div>
		  <div class="form-group">
			<label for="pwd">BOOKMAKER:</label>
			<input type="text" class="form-control" id="bookmaker_max" name="bookmaker_max" value="200000" autocomplete="off">
		  </div>
		  
		  <div class="form-group" style="display:none;">
			<label for="pwd">Exposure Limit:</label>
			<input type="text" class="form-control" id="net_exposure_limit" name="net_exposure_limit" value="2000000" autocomplete="off">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="../js/socket.io.js"></script> 
<script type="text/javascript">

	var socket_name = io("<?php echo SITE_IP; ?>");
	var _event_id = '';
	
	
	socket_name.on('connect', function () {});
    
    socket_name.on('eventGetMatchesOnlyOnce', function (data) {
        var sport_id = $('#sport_id').val();
        var option_html = '<option value="">Select</option>';
        if(sport_id == '4'){
        	var result = Object.keys(data.cricket.body).length;
			for (var i in data.cricket.body) {
				var event_id = data.cricket.body[i].matchid;
				var eventType = parseInt(data.cricket.body[i].SportId);
				var event_name_with_date = data.cricket.body[i].matchName;
				var event_data = (event_name_with_date).split('/');
				var event_name = (event_data[0]).trim();
				var marketTime = data.cricket.body[i].matchdate;
				var marketDateTime = data.cricket.body[i].matchdate;
				var marketid = data.cricket.body[i].marketid;
			
				var is_selected = '';
				if(_event_id == event_id){
					is_selected = ' selected ';
				}
				option_html += '<option value="'+event_id+'" data-marketid="'+marketid+'" '+is_selected+'>'+event_name_with_date+'</option>';
			}
        }
        else if(sport_id == '1'){
        	var result_soccer = Object.keys(data.soccer.body).length;
			for (var i in data.soccer.body) {
				var event_id = data.soccer.body[i].matchid;
				var eventType = parseInt(data.soccer.body[i].SportId);
				var event_name_with_date = data.soccer.body[i].matchName;
				var event_data = (event_name_with_date).split('/');
				var event_name = (event_data[0]).trim();
				var marketTime = data.soccer.body[i].matchdate;
				var marketDateTime = data.soccer.body[i].matchdate;
				var marketid = data.soccer.body[i].marketid;
			
				var is_selected = '';
				if(_event_id == event_id){
					is_selected = ' selected ';
				}
				option_html += '<option value="'+event_id+'" data-marketid="'+marketid+'" '+is_selected+'>'+event_name_with_date+'</option>';
			}
        }
        else if(sport_id == '2'){
        	var result_tennis = Object.keys(data.tennis.body).length;
			for (var i in data.tennis.body) {
				var event_id = data.tennis.body[i].matchid;
				var eventType = parseInt(data.tennis.body[i].SportId);
				var event_name_with_date = data.tennis.body[i].matchName;
				var event_data = (event_name_with_date).split('/');
				var event_name = (event_data[0]).trim();
				var marketTime = data.tennis.body[i].matchdate;
				var marketDateTime = data.tennis.body[i].matchdate;
				var marketid = data.tennis.body[i].marketid;
			
				var is_selected = '';
				if(_event_id == event_id){
					is_selected = ' selected ';
				}
				option_html += '<option value="'+event_id+'" data-marketid="'+marketid+'" '+is_selected+'>'+event_name_with_date+'</option>';
			}
        
        }
        
        $('#event_name').html(option_html);

    });
    
    
	function getTime(time) {
		//12:30PM
		time1 = time.split(":");
		var hours;
		var minutes;
		var seconds = "00";
		hours = parseInt(time1[0]);
		minutes = parseInt(time1[1]);
		if (time1[1].includes('PM') && hours != 12) {
			hours = hours + 12;
		} else if (hours < 10) {
			hours = "0" + hours;
		}
		if (minutes < 10) {
			minutes = "0" + minutes;
		}
		var str = hours + ":" + minutes + ":" + seconds
		return str;
	}

	function getMonth(month) {
		if (month.toUpperCase() == 'JAN') {
			return 1;
		} else if (month.toUpperCase() == 'FEB') {
			return 2;
		} else if (month.toUpperCase() == 'MAR') {
			return 3;
		} else if (month.toUpperCase() == 'APR') {
			return 4;
		} else if (month.toUpperCase() == 'MAY') {
			return 5;
		} else if (month.toUpperCase() == 'JUN') {
			return 6;
		} else if (month.toUpperCase() == 'JUL') {
			return 7;
		} else if (month.toUpperCase() == 'AUG') {
			return 8;
		} else if (month.toUpperCase() == 'SEP') {
			return 9;
		} else if (month.toUpperCase() == 'OCT') {
			return 10;
		} else if (month.toUpperCase() == 'NOV') {
			return 11;
		} else if (month.toUpperCase() == 'DEC') {
			return 12;
		}
	}

	function convertDate(date1) {
		var x = date1.split(" ");
		var i = 0;
		var j = 0;
		var month;
		var year;
		var date2;
		var time;
		while (i != x.length) {
			//console.log(x[i]);
			if (x[i]) {
				//console.log(j);
				if (j == 0) {
					month = getMonth(x[i]);
					if (month < 10) {
						month = "0" + month;
					}
				} else if (j == 1) {
					date2 = x[i];
					if (date2 < 10) {
						date2 = "0" + date2;
					}
				} else if (j == 2) {
					year = x[i]
				} else if (j == 3) {
					time = getTime(x[i]);
				}
				j++;
			}
			i++;
			if (i == x.length) {
				var str = year + "-" + month + "-" + date2 + "T" + time;
				str = new Date(str);
				str = str.getTime();
				str = str / 1000;
				str = parseInt(str);
				return str;
			}
		}
	}
    
   $(document).ready(function() {
   
   		$('#sport_id').on('change',function (){
   			var sport_id = $(this).val();
   			if(sport_id != ''){
   				socket_name.emit('getMatchesOnlyOnce');
   			}
   		});
   		
   		$("#example").DataTable();
   		
   		get_list();
   		function get_list(){
   			$("#example").DataTable().destroy();
			$('#example').DataTable({
				"ajax": {
					"url": 'ajaxfiles/get_active_events.php',
					"type": "POST",
					"dataSrc": ""
				},
				"columns": [
					{"data": function (data) {
							if(data.sport_id == 1){
								return 'Football';
							}else if (data.sport_id == 2){
								return 'Tennis';
							}else if (data.sport_id == 4){
								return 'Cricket';
							}else{
								return '';
							}
						}},
					{"data": function (data) {
							return  data.event_name;
						}},
					{"data": function (data) {
							return data.matchdate;
						}},
					{"data": function (data) {
							return  data.match_max;
						}},
					{"data": function (data) {
							return data.bookmaker_max;
						}},{"data": function (data) {
							return data.net_exposure_limit;
						}},
					
					{"data": function (data) {
							return ('<a href="'+data.event_id+'" class="btn_edit_event"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="'+data.event_id+'" class="btn_delete_event"><i class="fa fa-trash" aria-hidden="true"></i></a>');
						}},
				],
				ordering:  false
			});
   		}
        
        $('#modal-new_event').on('shown.bs.modal', function (e) {
			socket_name.emit('getMatchesOnlyOnce');
		});
		
		$('#form-add_new_event').on('submit',function (){
			
			var event_data = ($('#event_name').val()).split('###');
			var event_id = $('#event_name').val();
			var sport_id = $('#sport_id').val();
			
			var market_id = $('#event_name option:selected').attr('data-marketid');
			
			var event_text = $('#event_name option:selected').text();
			var event_name = event_text;
			var match_date = '';
			if(event_text.includes("/")){
				var eventname_with_date = ($('#event_name option:selected').text()).split('/');
				
				event_name = eventname_with_date[0];
				match_date = convertDate(eventname_with_date[1]);
			}
			
			var match_max = $('#match_max').val();
			var bookmaker_max = $('#bookmaker_max').val();
			var net_exposure_limit = $('#net_exposure_limit').val();
			console.log(market_id);
			$.ajax({
				url:'ajaxfiles/add_new_event.php',
				type:'POST',
				data:{'event_id':event_id,'sport_id':sport_id,'market_id':market_id,'event_name':event_name,'match_date':match_date,'match_max':match_max,'bookmaker_max':bookmaker_max,'net_exposure_limit':net_exposure_limit},
				dataType:'json',
				success:function (responce){
					$('#ajax_alert').removeClass('alert-success').removeClass('alert-danger').show();
					
					if(responce.status == 'ok'){
						get_list();	
						$('#ajax_alert').addClass('alert-success');
					}else{
						$('#ajax_alert').addClass('alert-danger');
					}
					
					$('#ajax_alert_msg').text(responce.msg);
					
					$('#ajax_alert').fadeOut(3000);
				}
			});
			
			return false;
			
		});
		
		$('#example').on('click','.btn_edit_event',function (){
			var event_id = $(this).attr('href');
			
			$.ajax({
				url:'ajaxfiles/get_active_events.php',
				type:'POST',
				data:{'event_id':event_id},
				dataType:'json',
				success:function (responce){
				
					$('#match_max').val(responce[0].match_max);
					$('#bookmaker_max').val(responce[0].bookmaker_max);					
					$('#net_exposure_limit').val(responce[0].net_exposure_limit);					
					$('#sport_id').val(responce[0].sport_id);
					socket_name.emit('getMatchesOnlyOnce');
					_event_id = responce[0].event_id;
					
					var option_html = '<option value="">Select</option>';
					option_html = '<option value="'+responce[0].event_id+'" data-marketid="'+responce[0].oddsmarketId+'" selected >'+responce[0].event_name+'</option>';
					$("#event_name").val(option_html);
					$('#modal-new_event').modal('show');
					$('#sport_id').attr('disabled','disabled');
					$('#event_name').attr('disabled','disabled');
				}
			});
			return false;
		});
		
		$('#example').on('click','.btn_delete_event',function (){
			var cm = confirm('Are you want to sure?');
			if(cm){
				var event_id = $(this).attr('href');
				$.ajax({
					url:'ajaxfiles/event_status_update.php',
					type:'POST',
					data:{'event_id':event_id},
					dataType:'json',
					success:function (responce){
						get_list();
						alert(responce.msg);
					}
				});
				return false;
			}
		});

   });
</script>