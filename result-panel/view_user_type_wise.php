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
<title><?php echo SITE_NAME; ?> | User List list</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main" style="min-height: 1171px;">
<?php 

include("below_header.php");
?>
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>User List</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>User List List</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
					
					<?php
					if($_REQUEST['type']){
						if($_REQUEST['type'] == 0){
					?>
						<div class="alert alert-danger" >
						  <strong><?php echo $_REQUEST['msg']; ?></strong>
						</div>
					<?php
						}else if($_REQUEST['type'] == 1){
					?>
						<div class="alert alert-success" >
						  <strong><?php echo $_REQUEST['msg']; ?></strong>
						</div>
					<?php					
						}
					}
					?>
						<div class="col-md-4 col-sm-4 col-xs-4">
						<select id="user_type_filter" class="form-control" >
							<option>Select User Type</option>
							<option value="7">King Admin</option>
							<option value="4">Super Master</option>
							<option value="3">Master</option>
							<option value="2">Agent</option>
							<option value="1">User</option>
						</select>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="javascript:void(0);" onclick="get_user_data()" class="btn btn-success">Submit</a>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action dataTable no-footer nowrap display" id="example">
								<thead>
									<tr class="headings">
										
											<th class="column-title" style="display: table-cell;">Login name </th>
											<th class="column-title" style="display: table-cell;">Points Available </th>
											
											
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
	</div>
<?php
include("footer.php");
?>
</body>

</html>
<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<style>
.inactive_user{
	background: red;
    padding: 6px;
    border-radius: 15px;
    width: 12px;
    float: right;
}
.active_user{
	background: green;
    padding: 6px;
    border-radius: 15px;
    width: 12px;
    float: right;
}
</style>
<script src="../js/socket.io.js"></script>  
<script>
var socket = io("<?php echo SITE_IP; ?>");
socket.on('connect', function() {
  	
	socket.emit('getListOfLoggedInClients',{user:1});
});

/* socket.on("listOfLoggedInUsers",function(args){
	console.log(args);
	
	if(args && args.list){
		for(var id in args.list){
			
			user_id = args.list[id];
			$("#inactive_user_"+user_id).hide();
			$("#active_user_"+user_id).hide();
			$("#active_user_"+user_id).show();
				
			
		}
	}
	
}); */


socket.on("listOfLoggedInUsers",function(args){
	
	
	if(args && args.list){
		i=0;
		for(var id in args.list){
			
			if(args.list[id]){
				if(i==0){
					$(".active_user").hide();
					$(".inactive_user").show(); 
				} 
				i++;
				user_id = args.list[id];
				$("#inactive_user_"+user_id).hide();
				$("#active_user_"+user_id).hide();
				$("#active_user_"+user_id).show();
			}				
		}
	}
});
setInterval(function(){
	socket.emit('getListOfLoggedInClients',{user:1});
},1000);
</script> 
<script>
function get_user_data(){
	
	user_type = $("#user_type_filter").val();
	 if($.fn.DataTable.isDataTable("#example")){
				 $("#example").dataTable().fnDestroy();
			 }
			 
    var table = $('#example').DataTable( {
        responsive: true,
		info: false,
		processing: true,
        serverSide: true,
        serverMethod: 'post',
		ajax:{
			url :"ajaxfiles/view_user_type_wise.php?user_type="+user_type, // json datasource
       },
	   fnDrawCallback:function(oSettings){
		   
socket.emit('getListOfLoggedInClients',{user:1});
	   },
	   columns: [
         { data: 'Email_ID' },
         { data: 'points' },
      ]
    });   
}
</script>	