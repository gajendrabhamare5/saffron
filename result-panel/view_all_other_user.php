<?php
include('../include/conn.php');
include "session.php";

	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
									$smdl_id = $_REQUEST['user_id'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
$user_type = $_REQUEST['user_type'];
if($user_type == 3){
	$search_type = "parentSuperMDL";
	$heading_label = "MDl";
}else if($user_type == 2){
	$search_type = "parentMDL";
	$heading_label = "DL";
}else if($user_type == 1){
	$search_type = "parentDL";
}else{
	echo "<h1>Error: Wrong Value</h1>";
	exit();
}
	$heading_label = "Customer";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | <?php echo $heading_label; ?> list</title>
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
				<h3> <?php echo $heading_label; ?></h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo $heading_label; ?> List</h2>
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
					
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action dataTable no-footer nowrap display" id="example">
								<thead>
									<tr class="headings">
										
											<th class="column-title" style="display: table-cell;">Login name </th>
											<th class="column-title" style="display: table-cell;"> </th>
											<th class="column-title" style="display: table-cell;"> </th>
											<th class="column-title" style="display: table-cell;">Points Available </th>
											<th class="column-title" style="display: table-cell;">Statue</th>
											
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
$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true,
		info: false,
		processing: true,
        serverSide: true,
        serverMethod: 'post',
		ajax:{
			url :"ajaxfiles/view_all_other_user.php?user_type=<?php echo $user_type; ?>&user_id=<?php echo $smdl_id; ?>", // json datasource
			
       },
	   columns: [
         { data: 'Email_ID' },
         { data: 'Email_ID1' },
         { data: 'Email_ID2' },
         { data: 'points' },
         { data: 'Status' },
      ],
      "drawCallback": function(settings) {
		   socket.emit('getListOfLoggedInClients',{user:1});
		},

    });   
});
</script>
<script>
jQuery(document).on("click", "#login_as_new_user", function () {
	var user_type = $(this).attr('user_type');
	var user_id = $(this).attr('user_id');
	$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/login_as_different_user.php',
			 dataType: 'JSON',
			 data: {user_type:user_type,user_id:user_id},
			 success: function(response) {
				var status  = response.status;
				
				if(status == "ok"){
					var url  = response.url;
					window.open(url);
				}else{
					var message  = response.message;
					$(".alert-success").hide();
					$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
					$(".alert-danger strong").text(message);
				}
			 }
		});
});
</script>

