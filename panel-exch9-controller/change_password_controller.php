<?php
include('../include/conn.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo SITE_NAME; ?> | Change Password</title>
	<link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">

<link href="assets/build/css/custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
	<?php
	/* include("header.php"); */
	/* $credit_debit_user_id = $_REQUEST['user_id']; */
	?>

	<div class="right_col" role="main">

		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Change Password</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Change Password</h2>

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
									<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Select User<span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										
										<select name="user_name" id="user_name" class="form-control col-md-7 col-xs-12" required="required">
											<option value="">Select User</option>
											<?php
											
												 $get_my_user_list = $conn->query("select * from user_master as um left outer join user_login_master as ulm on ulm.UserId=um.Id where ulm.UserType IN (5,10) ORDER BY ulm.UserType DESC");
											
											while ($user_data = (mysqli_fetch_assoc($get_my_user_list))) {
												$UserID = $user_data['UserID'];
												$UserType = $user_data['UserType'];

												$user_type_lable = "";
												if ($UserType == 10) {
													$user_type_lable = " (Result Panel)";
												} else if ($UserType == 5) {
													$user_type_lable = " (Controller Panel)";
												}

											?>
												<option value="<?php echo $user_data['UserID']; ?>" <?php if ($credit_debit_user_id == $user_data['UserID']) {
																										echo "selected='selected'";
																									} ?>><?php echo $user_data['Email_ID'] . "  " . $user_type_lable; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>

								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">New Password<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" id="new_password" name="new_password" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Confirm Password<span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" id="new_confirm_password" name="new_confirm_password" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>


								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-3">

										<a id="send" type="submit" onclick="doChangePassword()" class="btn btn-success">Submit</a>
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
<script src="assets/toastr.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	</body>

</html>
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
</style>

<script>

	function doChangePassword() {
		var user_name = $("#user_name").val();
		var new_password = $("#new_password").val();
		var new_confirm_password = $("#new_confirm_password").val();

		if (user_name == "") {
			$(".alert-success").hide();
			$(".alert-danger").show();
			$(".alert-danger strong").text("Please Select User Account");
			return;
		}
		if (new_password == "") {
			$(".alert-success").hide();
			$(".alert-danger").show();
			$(".alert-danger strong").text("Please Enter New Password");
			return;
		}
		if (new_confirm_password == "") {
			$(".alert-success").hide();
			$(".alert-danger").show();
			$(".alert-danger strong").text("Please Enter New Confirm Password");
			return;
		}
		if (new_password != new_confirm_password) {
			$(".alert-success").hide();
			$(".alert-danger").show();
			$(".alert-danger strong").text("Password & Confirm Password is not matched.");
			return;
		}

		$.ajax({
			type: 'POST',
			url: 'ajaxfiles/change_password_controller.php',
			dataType: 'JSON',
			data: {
				user_name: user_name,
				new_password: new_password
			},
			success: function(response) {
				console.log(response);
				var status = response.status;
				var message = response.message;
				
				if (status == "ok") {
					$(".alert-success").show();
					$(".alert-danger").hide();
					$(".alert-success strong").text(message);

				} else {
					$(".alert-success").hide();
					$(".alert-danger").show();
					$(".alert-danger strong").text(message);
				} 
			}
		});
	}
</script>