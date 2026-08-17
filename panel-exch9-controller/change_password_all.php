<?php
include('../include/conn.php');
include "session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
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
										<div class="xdisplay_inputx form-group has-feedback">
											<input type="text" class="form-control" name="user_name" id="user_name" value="<?php if($_REQUEST['user_name']){ echo $_REQUEST['user_name']; } ?>">
											<input type="hidden" id="usertype" name="usertype">
											<input type="hidden" id="userid" name="userid">
										</div>
										
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

$(document).ready(function() {
  $("#user_name").autocomplete({
    source: function(request, response) {
        $.getJSON("ajaxfiles/fetch_all_users.php", {
            term: request.term
        }, function(data) {
            response($.map(data, function(item) {
                var type = "";
                switch (parseInt(item.usertype)) {
                    case 1:
                        type = "User";
                        break;
                    case 2:
                        type = "DL";
                        break;
                    case 3:
                        type = "MDL";
                        break;
                    case 4:
                        type = "Super MDL";
                        break;
                    case 5:
                        type = "Admin";
                        break;
					case 7:
						type = "King Admin";
						break;
                    default:
                        type = "User";
                }

                return {
                   /*  label: item.value + " - " + item.name + " (" + type + ")", */
					 label: (item.email == item.name) ? item.email  : item.email + " - " + item.name,
                    value: item.email,
                    id: item.id,
                    usertype: item.usertype
                };
            }));

        });

    },

    minLength: 2,

    select: function(event, ui) {

        $("#user_name").val(ui.item.value);
        $("#usertype").val(ui.item.usertype);
        $("#userid").val(ui.item.id);

        return false;
    }

});
});

	function doChangePassword() {
		var user_name = $("#user_name").val();
		var userid = $("#userid").val();
		var usertype = $("#usertype").val();
    	var option_type = $("select[name='option_type']").val();

		var new_password = $("#new_password").val();
		var new_confirm_password = $("#new_confirm_password").val();

		console.log("user_name",user_name);
		console.log("userid",userid);
		console.log("usertype",usertype);
		console.log("new_password",new_password);

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
			url: 'ajaxfiles/change_password_all.php',
			dataType: 'JSON',
			data: {
				user_name: user_name,
				userid: userid,
				usertype: usertype,
				option_type: option_type,
				new_password: new_password
			},
			success: function(response) {
				console.log(response);
				var status = response.status;
				var message = response.message;
				var transaction_password = response.transaction_password;

				if (status == "ok") {
					$(".alert-success").show();
					$(".alert-danger").hide();
					$(".alert-success strong").text(message);
					 if (transaction_password != "") {
						alert("Transaction Password : " + transaction_password);
					}

				} else {
					$(".alert-success").hide();
					$(".alert-danger").show();
					$(".alert-danger strong").text(message);
				} 
			}
		});
	}
</script>