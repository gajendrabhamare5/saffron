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
      <title><?php echo SITE_NAME; ?> | TV URL</title>
      <?php 
         include("header.php");
         ?>
      <div class="right_col" role="main" style="min-height: 1171px;">
         
         <div class="">
            <div class="page-title">
               <div class="title_left">
                  <h3>TV URL</h3>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
               <div class="clearfix"></div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                     <div class="x_title">
                        <h2>URL </h2>
                        <div class="clearfix"></div>
                       
                     </div>
                     <div class="x_content">
						
						
						<div class="alert alert-success" style="display:none;">
  <strong></strong>
</div>
<div class="alert alert-danger" style="display:none;">
  <strong></strong>
</div>


<form method="post" class="form-horizontal form-label-left" novalidate>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TV URL <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="url_name" class="form-control col-md-7 col-xs-12"  name="url_name" placeholder="Enter URL Name" required="required" type="text">
</div>
</div>




<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<a id="send" type="submit" onclick="doInsertTv()" class="btn btn-success">Submit</a>
</div>
 </div>
</form>
                        <div class="table-responsive">
                           <table class="table table-striped jambo_table bulk_action dataTable no-footer nowrap display" id="example">
                              <thead>
                                 <tr class="headings">
                                 	<th class="column-title" style="display: table-cell;">URL</th>
                                    <th class="column-title" style="display: table-cell;">Action</th>
                                 </tr>
                              </thead>
							  
							  <tbody>
								<?php
								
									$get_url_data = $conn->query("select * from hdmi_tv_url");
									while($fetch_get_url_data = mysqli_fetch_assoc($get_url_data)){
										$url_name = $fetch_get_url_data['url_name'];
								?>
									<tr>
										<td><?php echo $url_name; ?></td>
										<td>
											<a href="javascript:void(0);" class="btn_delete_tv_url" style="color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</td>
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
</html>

<div id="modal-new_event" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update URL</h4>
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
			<label for="pwd">URL:</label>
			<input type="text" class="form-control" id="update_url_name" name="update_url_name" autocomplete="off">
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
$("#example").DataTable();
	
function doInsertTv(){
	var url_name = $("#url_name").val();
	
	$(".alert").hide();
	
	if(url_name == ""){
		$(".alert-danger strong").text("Please Enter TV URL");
		$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
		return false;
	}
	
	$.ajax({
		url:'ajaxfiles/add_tv_url.php',
		type:'POST',
		data:{'url_name':url_name},
		dataType:'json',
		success:function (responce){
			
			
			if(responce.status == 'ok'){
				$(".alert-success strong").text(responce.message);
				$(".alert-success").fadeIn('slow').delay(3000).hide(0);
				
				setTimeout(function(){
					location.reload();
				}, 3000);
			}
			else{
				$(".alert-danger strong").text(responce.message);
				$(".alert-danger").fadeIn('slow').delay(3000).hide(0);
			}
			
		}
	});
}
</script>