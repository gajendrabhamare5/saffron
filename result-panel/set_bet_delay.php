<?php
include('../include/conn.php');
include "session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo SITE_NAME; ?> | Bet Delay Details</title>
	<?php

	include("header.php");
	?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Bet Delay Details</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Bet Delay Details</h2>

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

									<?php

									$fetch_data = $conn->query("select * from bet_delay_master ");
									while ($data = mysqli_fetch_assoc($fetch_data)) {
										$market_type_name = $data['market_type_name'];
										$delay_value = $data['delay_value'];
										$market_type_id = $data['market_type_id'];

									?>


										<label class="control-label col-md-2 col-sm-2 col-xs-12" for="name"><?php echo $market_type_name; ?><span class="required">*</span>
										</label>
										<div class="col-md-2 col-sm-2 col-xs-12">
											<input type='number' name="market_type_name" data-market_type_id="<?php echo $market_type_id; ?>" required="required" class="form-control col-md-7 col-xs-12 market_type_name" value="<?php echo $delay_value; ?>">

										</div>

									<?php
									}
									?>
								</div>



								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-3">

										<a id="insertv" type="submit" onclick="doInsertTime()" class="btn btn-success">Submit</a>
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


<script type="text/javascript">
	function fetch_value(value) {
		var idd = $(value).attr('data-market_type_id');
		console.log(idd);
		console.log(myArray);
		for (var key in myArray) {
			console.log("key " + JSON.stringify(myArray[key]));
		}
		console.log(value);
		console.log($(value).val());


	}

	function doInsertTime() {
		var delay_value = $(".market_type_name").map(function() {
			return $(this).val();
		}).get().join(',');
		var delay_value_id = $(".market_type_name").map(function() {
			return $(this).attr('data-market_type_id');
		}).get().join(',');
		$("#insertv").html("Loading..");
		$("#insertv").removeAttr("onclick");
		$("#insertv").attr("disable");
		marquee = $("#marquee").val()
		/* if(isUrlValid(tv_url))
		{ */
		$.ajax({
			type: 'POST',
			url: 'set_bet_delay_proccess.php',
			dataType: 'JSON',
			data: {
				delay_value: delay_value,
				delay_value_id: delay_value_id
			},
			success: function(response) {
				var status = response.status;
				var message = response.message;
				$("#insertv").html("Submit");
				$("#insertv").attr("onclick", "doInsertTime()");
				$("#insertv").removeAttr("disable");
				if (status == "ok") {
					$(".alert-success").text(message);
					$(".alert-success").fadeIn('fast').delay(3000).hide(0);
					setTimeout(function() {
						location.reload();
					}, 2000);
				} else {
					$(".alert-danger").text(message);
					$(".alert-danger").fadeIn('fast').delay(3000).hide(0);
				}
			}
		});
		/* }
		else
		{
			 $("#insertv").html("Submit");
					$("#insertv").attr("onclick","doInsertTime()");
					$("#insertv").removeAttr("disable");
			 $(".alert-danger").text("Insert proper TV URL");
			$(".alert-danger").fadeIn('fast').delay(3000).hide(0);
		} */

	}
</script>