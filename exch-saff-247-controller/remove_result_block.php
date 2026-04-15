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
<title><?php echo SITE_NAME; ?> | Block Result list</title>
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
				<h3>Block Result</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Block Result List</h2>
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
											<td>Event Name
											</td>
											<td>Market Name
											</td>
											<td>Click To Unblock
											</td>
										</tr>
									</thead>
									<tbody>
										<?php
											$get_block_result = $conn->query("select * from result_block_details");
											while($fetch_get_block_result = mysqli_fetch_assoc($get_block_result)){
												$event_id = $fetch_get_block_result['event_id'];
												$market_id = $fetch_get_block_result['market_id'];
												
												$get_event_data = $conn->query("select * from bet_details where event_id='$event_id' and market_id='$market_id' ");
												$fetch_get_event_data = mysqli_fetch_assoc($get_event_data);
												$event_name = $fetch_get_event_data['event_name'];
												$market_name = $fetch_get_event_data['market_name'];
										?>
											<tr>
												<td>
													<?php echo $event_name; ?>
												</td>
												<td>
													<?php echo $market_name; ?>
												</td>
												<td>
													<a href="ajaxfiles/unblock_result?event_id=<?php echo $event_id; ?>&market_id=<?php echo $market_id; ?>" class="btn btn-danger btn-xs">Unblock</a>
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