<?php
include('../include/conn.php');
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type=$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

$get_my_marquee = $conn->query("select * from marquee_message where user_id=$user_id");
$fetch_get_my_marquee = mysqli_fetch_assoc($get_my_marquee);
$current_marquee_data = $fetch_get_my_marquee['marquee_data'];
$current_marquee_end_time = $fetch_get_my_marquee['end_time'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME; ?> | Slider</title>
<?php 

include("header.php");
?>

<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Slider </h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Slider </h2>

<div class="clearfix"></div>
</div>
<div class="x_content">

<?php


if(isset($_SESSION['SLIDER_MSG'])){
	if($_SESSION['SLIDER_MSG'] == "ok"){
?>

<div class="alert alert-success">
  <strong>Slider Uploaded</strong>
</div>

<?php		
$_SESSION['SLIDER_MSG'] = "";
	}
}


?>

<?php


if(isset($_SESSION['SLIDER_MSG'])){
	if($_SESSION['SLIDER_MSG'] == "invalidformate"){
?>

<div class="alert alert-danger" >
  <strong>Invalid File Format Selected</strong>
</div>


<?php		
$_SESSION['SLIDER_MSG'] = "";
	}
	
	if($_SESSION['SLIDER_MSG'] == "delete"){
?>

<div class="alert alert-danger" >
  <strong>Slider Deleted</strong>
</div>


<?php		
$_SESSION['SLIDER_MSG'] = "";
	}
	if($_SESSION['SLIDER_MSG'] == "wrong"){
?>

<div class="alert alert-danger" >
  <strong>Somthing went wrong, please try again later</strong>
</div>


<?php		
$_SESSION['SLIDER_MSG'] = "";
	}
}


?>



<form method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" action="import_slider.php" >





<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Select Page<span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select name="select_page" class="form-control" required>
	<option value="0">Home Page</option>
	<option value="1">Change Password</option>
</select>
</div>
</div>


<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Select File<span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="file" name="select_slide_file" class="form-control"  accept="image/*" required>
</div>
</div>





<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">

<button type="submit" id="send" type="submit" onclick="setMarqueeData()" class="btn btn-success">Submit</button>
</div>
 </div>
</form>





<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action dataTable no-footer nowrap display" id="example">
								<thead>
									<tr class="headings">
										
											<th class="column-title" style="display: table-cell;">Image </th>
											<th class="column-title" style="display: table-cell;">Page Name </th>
											<th class="column-title" style="display: table-cell;">Delete </th>
											
										</tr>
									</thead>
									
									<tbody>
										<?php
											
											$get_slider_image = $conn->query("select * from slider_details ORDER BY sider_type ASC");
											while($fetch_get_slider_image = mysqli_fetch_assoc($get_slider_image)){
												$sider_image = $fetch_get_slider_image['sider_image'];
												$sider_type = $fetch_get_slider_image['sider_type'];
												$id = $fetch_get_slider_image['id'];
										?>
										<tr>
										
											<td><img src="slider/<?php echo $sider_image; ?>" style="width:450px;"/></td>
											<td><?php 
													if($sider_type == 0){
														echo "Home";
													}
													else{
														echo "Change Password";
													}
											?></td>
											<td>
												<a href="delete_slider.php?id=<?php echo $id;  ?>"  onclick="return confirm('Are you sure you want to delete this slider?');" class="btn btn-danger">Delete</a>
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