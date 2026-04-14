<?php
include("../include/conn.php");
include("../include/flip_function.php");
include("../session.php");
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
<style>
	input.custom-text {
		display: inline-block;
		width: 100%;
		height: calc(2.25rem + 2px);
		padding: .375rem 0.1rem .375rem .75rem;
		line-height: 1.5;
		color: #495057;
		vertical-align: middle;
		background-size: 8px 10px;
		border: 1px solid #ced4da;
		border-radius: .25rem;
	}
</style>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
	<div id="app">
		<?php
		include("loader.php");
		?>
		<div>
			<?php
			include("header.php");
			?>
			<div class="report-container">
				<!---->

				<div class="card">
					<div class="card-header">
						<h4 class="mb-0">Change Button Values</h4>
					</div>
					<div class="card-body container-fluid container-fluid-5 button-value">
						<ul class="nav nav-pills mb-1">
							<li class="nav-item">
								<button type="button" class="nav-link1 active tabsbox gamesbtn_tab_btn" onclick="tab_view('gamesbtn')">Games Button</button>
							</li>
							<li class="nav-item">
								<button type="button" class="nav-link1 tabsbox casinobtn_tab_btn" onclick="tab_view('casinobtn')">Casino Buttons</button>
							</li>

						</ul>
						<div class="tab-content">
							<div role="tabpanel" id="gamesbtn" aria-labelledby="uncontrolled-tab-example-tab-hands" class="hands tab-pane active show">
								<div class="row row5 mb-1">
									<div class="col-6">
										<div class="button-title"><span><b>Price Label</b></span></div>
									</div>
									<div class="col-6">
										<div class="button-title"><span><b>Price Value</b></span></div>
									</div>
								</div>
								<?php
								$get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
								$num_rows = $get_button_value->num_rows;
								$button_array = array();
								if ($num_rows <= 0) {
									$button_array[] = 1000;
									$button_array[] = 5000;
									$button_array[] = 10000;
									$button_array[] = 25000;
									$button_array[] = 50000;
									$button_array[] = 100000;
									$button_array[] = 200000;
									$button_array[] = 500000;
									$button_array[] = 1000000;
									$button_array[] = 2500000;
								} else {
									$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
									$fetch_button_value = $fetch_button_value_data['button_value'];
									$default_stake = $fetch_button_value_data['default_stake'];
									$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
									$button_array = explode(",", $fetch_button_value);
								}
								$j = 1;
								foreach ($button_array as $button_value) {
								?>
									<div class="row row5 mb-1">
										<div class="col-6">
											<div class="form-group mb-0">
												<input placeholder="Button Name" type="text" maxlength="7" value="<?php echo $button_value; ?>" class="form-control">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group mb-0">
												<input placeholder="Button Value" id="stakeEdit_<?php echo $j; ?>" button_position="<?php echo $j; ?>" type="number" min="1" max="99999999" value="<?php echo $button_value; ?>" maxlength="9" class="form-control">
											</div>
										</div>
									</div>
								<?php
									$j++;
								}
								?>
								<div class="row row5 mt-2">
									<div class="col-12">
										<button class="btn btn-primary btn-block btn-sm" id="edit_stake_save">Update</button>
									</div>
								</div>
							</div>
							<div role="tabpanel" id="casinobtn" aria-labelledby="uncontrolled-tab-example-tab-hands" class="hands tab-pane">
								<div class="row row5 mb-1">
									<div class="col-6">
										<div class="button-title"><span><b>Price Label</b></span></div>
									</div>
									<div class="col-6">
										<div class="button-title"><span><b>Price Value</b></span></div>
									</div>
								</div>
								<?php
								$get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
								$num_rows = $get_button_value->num_rows;
								$button_array = array();
								if ($num_rows <= 0) {
									$button_array[] = 1000;
									$button_array[] = 5000;
									$button_array[] = 10000;
									$button_array[] = 25000;
									$button_array[] = 50000;
									$button_array[] = 100000;
									$button_array[] = 200000;
									$button_array[] = 500000;
									$button_array[] = 1000000;
									$button_array[] = 2500000;
								} else {
									$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
									$fetch_button_value = $fetch_button_value_data['casino_button_value'];
									$default_stake = $fetch_button_value_data['default_stake'];
									$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
									$button_array = explode(",", $fetch_button_value);
								}
								$j = 1;
								foreach ($button_array as $button_value) {
								?>
									<div class="row row5 mb-1">
										<div class="col-6">
											<div class="form-group mb-0">
												<input placeholder="Button Name" type="text" maxlength="7" value="<?php echo $button_value; ?>" class="form-control">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group mb-0">
												<input placeholder="Button Value" id="casino_stakeEdit_<?php echo $j; ?>" button_position="<?php echo $j; ?>" type="number" min="1" max="99999999" value="<?php echo $button_value; ?>" maxlength="9" class="form-control">
											</div>
										</div>
									</div>
								<?php
									$j++;
								}
								?>
								<div class="row row5 mt-2">
									<div class="col-12">
										<button class="btn btn-primary btn-block btn-sm" id="edit_stake_save_casino">Update</button>
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<?php
include "footer.php";
?>

</html>
<script>
	function tab_view(tab_name) {
		$(".tabsbox").removeClass("active");
		$("." + tab_name + "_tab_btn").addClass("active");
		$("#gamesbtn").hide();
		$("#casinobtn").hide();
		$("#" + tab_name).show();
	}
	jQuery(document).on("click", "#edit_stake_save", function() {

		$(".loader").show();
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		button_1 = $("#stakeEdit_1").val();
		button_2 = $("#stakeEdit_2").val();
		button_3 = $("#stakeEdit_3").val();
		button_4 = $("#stakeEdit_4").val();
		button_5 = $("#stakeEdit_5").val();
		button_6 = $("#stakeEdit_6").val();
		button_7 = $("#stakeEdit_7").val();
		button_8 = $("#stakeEdit_8").val();
		button_9 = $("#stakeEdit_9").val();
		button_10 = $("#stakeEdit_10").val();

		all_button_value = button_1 + "," + button_2 + "," + button_3 + "," + button_4 + "," + button_5 + "," + button_6 + "," + button_7 + "," + button_8 + "," + button_9 + "," + button_10;

		$.ajax({
			type: 'POST',
			url: '../ajaxfiles/button_value_change.php',
			dataType: 'json',
			data: {
				all_button_value: all_button_value,				
				type: 'games',
			},
			success: function(response) {
				$(".loader").hide();
				var check_status = response['status'];
				var message = response['message'];

				if (check_status == "ok") {

					$("#bet-error-class").addClass("b-toast-success");

				} else {

					$("#bet-error-class").addClass("b-toast-danger");

				}
				$("#errorMsgText").text(message);
				$("#errorMsg").fadeIn('fast').delay(3000).hide(0);

			}
		});
	});
	jQuery(document).on("click", "#edit_stake_save_casino", function() {

		$(".loader").show();
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		button_1 = $("#casino_stakeEdit_1").val();
		button_2 = $("#casino_stakeEdit_2").val();
		button_3 = $("#casino_stakeEdit_3").val();
		button_4 = $("#casino_stakeEdit_4").val();
		button_5 = $("#casino_stakeEdit_5").val();
		button_6 = $("#casino_stakeEdit_6").val();
		button_7 = $("#casino_stakeEdit_7").val();
		button_8 = $("#casino_stakeEdit_8").val();
		button_9 = $("#casino_stakeEdit_9").val();
		button_10 = $("#casino_stakeEdit_10").val();

		all_button_value = button_1 + "," + button_2 + "," + button_3 + "," + button_4 + "," + button_5 + "," + button_6 + "," + button_7 + "," + button_8 + "," + button_9 + "," + button_10;

		$.ajax({
			type: 'POST',
			url: '../ajaxfiles/button_value_change.php',
			dataType: 'json',
			data: {
				all_button_value: all_button_value,
				type: 'casino',
			},
			success: function(response) {
				$(".loader").hide();
				var check_status = response['status'];
				var message = response['message'];

				if (check_status == "ok") {

					$("#bet-error-class").addClass("b-toast-success");

				} else {

					$("#bet-error-class").addClass("b-toast-danger");

				}
				$("#errorMsgText").text(message);
				$("#errorMsg").fadeIn('fast').delay(3000).hide(0);

			}
		});
	});
</script>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
	<div class="b-toaster-slot vue-portal-target">
		<div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
			<div tabindex="0" class="toast">
				<header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
					<button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
				</header>
				<div class="toast-body"> </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>