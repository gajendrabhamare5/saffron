<?php
include('../include/conn.php');
include "session.php";
$user_id = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo SITE_NAME; ?> | Controller Dashboard</title>
	<?php

	include("header.php");
	?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">

				<div class="title_left">
					<h3>Dashboard</h3>
				</div>
				<div class="title_right"> <a href="javascript:void(0);" onclick="view_comm_by_user()" data-toggle="modal" data-target="#myModal1">
						<h3 style="text-align: right;"> Account Balance:
							<?php

							$get_account_sum = $conn->query("select SUM(amount) as total_commision from accounts where user_id=1");
							$fetch_get_account_sum = mysqli_fetch_assoc($get_account_sum);
							$total_commision = $fetch_get_account_sum['total_commision'];
							echo number_format($total_commision, 2);

							?>

						</h3>
					</a> </div>

			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="alert alert-success" id="successMessage" style="display:none;"> <strong></strong></div>
				<div class="alert alert-danger" id="errorMessage" style="display:none;"> <strong></strong></div> <?php $check_site_under_maintenance = $conn->query("select * from site_under_maintenance where site_status=1");
																													$row_coun_check_site_under_maintenance = mysqli_num_rows($check_site_under_maintenance);				?> <?php if ($row_coun_check_site_under_maintenance >= 1) {		?> <div class="col-md-12">
						<div id="currentStatusHeading">
							<div class='alert alert-danger'>Currently Site Is Under Maintenance</div>
						</div>
					</div>
					<div class="col-md-3" style="float:right;">
						<div id="currentStatusButton"><button type='submit' class='btn btn-success' onclick="set_maintenance('0')" style='float: right;'>Set To Live</button></div>
					</div> <?php				} else {		?> <div class="col-md-12">
						<div id="currentStatusHeading">
							<div class='alert alert-success'>Currently Site Is Live</div>
						</div>
					</div>
					<div class="col-md-3" style="float:right;">
						<div id="currentStatusButton"><button type='submit' class='btn btn-danger' onclick="set_maintenance('1')" style='float: right;'>Set To Under Maintenance</button></div>
					</div> <?php		}		?>


			</div>


			<div class="row">
				<div class="col-md-12">

					<div class="title_left">
						<h3>Block Market</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="alert alert-success" style="display:none;"> <strong></strong></div>
				<div class="col-md-3" style="float:right;text-align: right;">
					<button type="submit" class="btn btn-success" id="change_block_market">Change Block Market Setting</button>
				</div>
			</div>
			<div class="row">
				<div class="tree">
					<?php
					$cricket_up_line = "";
					$soccer_up_line = "";
					$tennis_up_line = "";
					$rugby_up_line = "";
					$basketball_up_line = "";


					$get_parent_ids = $conn->query("select * from user_login_master where UserID=$user_id");
					$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
					$parentMDL = $fetch_parent_ids['parentMDL'];
					$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


					$check_cricket_block = $conn->query("select * from block_sport where block_by=$user_id and event_type=4");
					$fetch_num_rows = $check_cricket_block->num_rows;
					if ($fetch_num_rows == 0) {
						$cricket_disable_css = "";
					} else {
						$cricket_disable_css = "checked='yes'";
					}



					$check_tennis_block = $conn->query("select * from block_sport where block_by=$user_id and event_type=2");
					$fetch_num_rows_tennis = $check_tennis_block->num_rows;
					if ($fetch_num_rows_tennis == 0) {
						$tennis_disable_css = "";
					} else {
						$tennis_disable_css = "checked='yes'";
					}


					$check_soccer_block = $conn->query("select * from block_sport where block_by=$user_id and event_type=1");
					$fetch_num_rows_soccer = $check_soccer_block->num_rows;
					if ($fetch_num_rows_soccer == 0) {
						$soccer_disable_css = "";
					} else {
						$soccer_disable_css = "checked='yes'";
					}



					$check_rugby_block = $conn->query("select * from block_sport where block_by=$user_id and event_type=5");
					$fetch_num_rows_rugby = $check_rugby_block->num_rows;
					if ($fetch_num_rows_rugby == 0) {
						$rugby_disable_css = "";
					} else {
						$rugby_disable_css = "checked='yes'";
					}


					$check_basketball_block = $conn->query("select * from block_sport where block_by=$user_id and event_type=7522");
					$fetch_num_rows_basketball = $check_basketball_block->num_rows;
					if ($fetch_num_rows_basketball == 0) {
						$basketball_disable_css = "";
					} else {
						$basketball_disable_css = "checked='yes'";
					}




					?>
					<ul>
						<li>
							<a>
								<label>
									<input type="checkbox" name="sport_block" value="4" <?php echo $cricket_disable_css; ?> /> Cricket
									<?php echo $cricket_up_line; ?>
								</label>
							</a>
							<ul id="cricket_event_name"> </ul>
						</li>
						<li>
							<a>
								<label>
									<input type="checkbox" name="sport_block" value="1" <?php echo $soccer_disable_css; ?> /> Soccer
									<?php echo $soccer_up_line; ?>
								</label>
							</a>
							<ul id="soccer_event_name" class=""> </ul>
						</li>
						<li>
							<a>
								<label>
									<input type="checkbox" name="sport_block" value="2" <?php echo $tennis_disable_css; ?> /> Tennis
									<?php echo $tennis_up_line; ?>
								</label>
							</a>
							<ul id="tennis_event_name" class=""> </ul>
						</li>
						<li><a><label><input type="checkbox" name="sport_block" id="rugby_block" value="5" <?php echo $rugby_disable_css; ?> /> Rugby <?php echo $rugby_up_line; ?></label></a>
							<ul id="rugby_event_name">

							</ul>
						</li>
						<li><a><label><input type="checkbox" name="sport_block" id="basketball_block" value="7522" <?php echo $basketball_disable_css; ?> /> Basketball <?php echo $basketball_up_line; ?></label></a>
							<ul id="basketball_event_name">

							</ul>
						</li>
					</ul>
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

<script>
	function set_maintenance(current_status) {
		$.ajax({
			type: 'POST',
			url: 'ajaxfiles/set_under_maintenance.php',
			dataType: 'JSON',
			data: {
				current_status: current_status
			},
			success: function(response) {
				var status = response.status;
				var message = response.message;
				if (status == 'ok') {
					$("#successMessage").text(message);
					$("#successMessage").show();
					if (current_status == 1) {
						$("#currentStatusButton").html("<div class='alert alert-danger'>Currently Site Is Under Maintenance</div>");
						$("#currentStatusHeading").html("<button type='submit' class='btn btn-success' onclick='set_maintenance(0)' style='float: right;'>Set To Live</button>");
					} else {
						$("#currentStatusButton").html("<div class='alert alert-success'>Currently Site Is Live</div>");
						$("#currentStatusHeading").html("<button type='submit' class='btn btn-danger' onclick='set_maintenance(1)' style='float: right;'>Set To Under Maintenance</button>");
					}
				} else {
					$("#errorMessage").text(message);
					$("#errorMessage").show();
				}
			}
		});
	}
</script>



<script>
	function checked() {
		$.ajax({
			type: 'POST',
			url: 'ajaxfiles/get_block_event.php',
			dataType: 'JSON',
			data: "",
			success: function(response) {
				var block_event_ids = response.block_event_ids;
				var block_market_ids = response.block_market_ids;
				var block_parent_event_ids = response.block_parent_event_ids;

				if (block_parent_event_ids != null) {
					for (i = 0; i < block_parent_event_ids.length; i++) {
						$("#event_id_" + block_parent_event_ids[i] + "").prop('checked', true);
						$("#span_event_id_" + block_parent_event_ids[i] + "").show();
					}
				}
				if (block_event_ids != null) {
					for (i = 0; i < block_event_ids.length; i++) {
						$("#event_id_" + block_event_ids[i] + "").prop('checked', true);
					}
				}
				if (block_market_ids != null) {
					for (j = 0; j < block_market_ids.length; j++) {
						$("#market_id_" + block_market_ids[j] + "").prop('checked', true);
					}
				}
			}
		});
	}
	var event_ids = [];
	var market_ids1 = [];
	var socket = io("<?php echo SITE_IP; ?>");
	socket.on('connect', function() {
		socket.emit('getMatchesOnlyOnce');
		socket.emit('emitFancyDataOnlyOnce');
		socket.emit('getListOfLoggedInClients', {
			user: 1
		});
	});

	socket.on("listOfLoggedInUsers", function(args) {
		console.log(args);
	});

	socket.on('eventGetMatchesOnlyOnce', function(data) {

		html_data_event_name = "";
		html_data_event_name_soccer = "";
		html_data_event_name_tennis = "";
		html_data_event_name_basketball = "";
		html_data_event_name_rugby = "";
		block_event_css = "";
		var result = Object.keys(data.cricket.body).length;
		var k = 0;
		for (var i in data.cricket.body) {
			event_id = data.cricket.body[i].matchid;
			eventType = parseInt(data.cricket.body[i].SportId);
			event_name = data.cricket.body[i].matchName;
			marketTime = data.cricket.body[i].matchdate;
			marketDateTime = data.cricket.body[i].matchdate;
			event_ids[k] = event_id;
			market_ids1[k] = data.cricket.body[i].marketid;

			html_data_event_name += "<li><a><label><input type='checkbox' name='event_block' id='event_id_" + event_id + "' value='" + event_id + "' /> " + event_name + " <span style='color:red;display:none;' id='span_event_id_" + event_id + "'>(Block By Upline)</span></label></a><ul id='market_name_" + event_id + "'></ul></li>";
			k++;

		}
		document.getElementById("cricket_event_name").innerHTML = html_data_event_name;


		var result_soccer = Object.keys(data.soccer.body).length;
		for (var i in data.soccer.body) {
			event_id = data.soccer.body[i].matchid;
			eventType = parseInt(data.soccer.body[i].SportId);
			event_name = data.soccer.body[i].matchName;
			marketTime = data.soccer.body[i].matchdate;
			marketDateTime = data.soccer.body[i].matchdate;



			html_data_event_name_soccer += "<li><a><label><input type='checkbox' name='event_block' id='event_id_" + event_id + "' value='" + event_id + "' /> " + event_name + " <span style='color:red;display:none;' id='span_event_id_" + event_id + "'>(Block By Upline)</span></label></a><ul id='market_name_" + event_id + "'></ul></li>";


		}
		document.getElementById("soccer_event_name").innerHTML = html_data_event_name_soccer;



		var result_tennis = Object.keys(data.tennis.body).length;
		for (var i in data.tennis.body) {
			event_id = data.tennis.body[i].matchid;
			eventType = parseInt(data.tennis.body[i].SportId);
			event_name = data.tennis.body[i].matchName;
			marketTime = data.tennis.body[i].matchdate;
			marketDateTime = data.tennis.body[i].matchdate;



			html_data_event_name_tennis += "<li><a><label><input type='checkbox' name='event_block' id='event_id_" + event_id + "' value='" + event_id + "' /> " + event_name + " <span style='color:red;display:none;' id='span_event_id_" + event_id + "'>(Block By Upline)</span></label></a><ul id='market_name_" + event_id + "'></ul></li>";


		}

		document.getElementById("tennis_event_name").innerHTML = html_data_event_name_tennis;

		if (data.rugby) {
			var result_rugby = Object.keys(data.rugby.body).length;
			for (var i in data.rugby.body) {
				event_id = data.rugby.body[i].matchid;
				eventType = parseInt(data.rugby.body[i].SportId);
				event_name = data.rugby.body[i].matchName;
				marketTime = data.rugby.body[i].matchdate;
				marketDateTime = data.rugby.body[i].matchdate;



				html_data_event_name_rugby += "<li><a><label><input type='checkbox' name='event_block' class='rugby_event_block' id='event_id_" + event_id + "' value='" + event_id + "' /> " + event_name + " <span style='color:red;display:none;' id='span_event_id_" + event_id + "'>(Block By Upline)</span></label></a><ul id='market_name_" + event_id + "'></ul></li>";


			}

			document.getElementById("rugby_event_name").innerHTML = html_data_event_name_rugby;
		}
		if (data.basketball) {
			var result_basketball = Object.keys(data.basketball.body).length;
			for (var i in data.basketball.body) {
				event_id = data.basketball.body[i].matchid;
				eventType = parseInt(data.basketball.body[i].SportId);
				event_name = data.basketball.body[i].matchName;
				marketTime = data.basketball.body[i].matchdate;
				marketDateTime = data.basketball.body[i].matchdate;



				html_data_event_name_basketball += "<li><a><label><input type='checkbox' name='event_block' class='basketball_event_block' id='event_id_" + event_id + "' value='" + event_id + "' /> " + event_name + " <span style='color:red;display:none;' id='span_event_id_" + event_id + "'>(Block By Upline)</span></label></a><ul id='market_name_" + event_id + "'></ul></li>";


			}

			document.getElementById("basketball_event_name").innerHTML = html_data_event_name_basketball;
		}
		checked();

	});

	socket.on('getFancyDataOnlyOnce', function(data) {

		var body_data = data.body;


		for (j = 0; j < market_ids1.length; j++) {


			html_data_market_name = "";
			if (body_data[market_ids1[j]]) {
				if (body_data[market_ids1[j]].session) {
					if (body_data[market_ids1[j]].session[0]) {
						if (body_data[market_ids1[j]].session[0].value) {
							if (body_data[market_ids1[j]].session[0].value.session) {
								var data = body_data[market_ids1[j]].session[0].value.session;
								if (data) {
									for (i = 0; i < data.length; i++) {
										if (data[i]) {
											marketName = data[i].RunnerName;
											runsNo = data[i].LayPrice1;
											var marketId = data[i].SelectionId;
											if (data[i].GameStatus != "CLOSED" && data[i].GameStatus != "OFFLINE") {
												html_data_market_name += "<li><a><label><input type='checkbox' id='market_id_" + marketId + "' name='market_block' value='" + marketId + "'/> " + marketName + "</label></a></li>";
											}
										}

									}

								}
							}
						}
					}
				}
			}
			if (html_data_market_name != "") {

				document.getElementById("market_name_" + event_ids[j] + "").innerHTML = html_data_market_name;
			}



		}
	});


	jQuery(document).on("click", "#change_block_market", function() {

		market_block = [];

		market_block = [];
		$.each($("input[name='market_block']:checked"), function() {
			market_block.push(parseInt($(this).val()));

		});

		sport_block = [];
		$.each($("input[name='sport_block']:checked"), function() {
			sport_block.push($(this).val());

		});

		event_block = [];
		$.each($("input[name='event_block']:checked"), function() {
			event_block.push($(this).val());

		});

		$.ajax({
			type: 'POST',
			url: 'ajaxfiles/block_event.php',
			dataType: 'JSON',
			data: {
				sport_block: sport_block,
				event_block: event_block,
				market_block: market_block
			},
			success: function(response) {
				var status = response.status;
				var message = response.message;
				if (status == 'ok') {

					socket.emit("eventBlockedByController", {
						id: 1
					});



					$(".alert-success").text(message);
					$(".alert-success").fadeIn('slow').delay(5000).hide(0);
					checked();
				}

			}
		});


	});


	function view_comm_by_user() {
		return false;
		$.ajax({
			type: 'POST',
			url: 'ajaxfiles/get_parent_user_commission.php',
			dataType: 'text',
			data: "",
			success: function(response) {

				$("#tot_comm").html(response);

			}
		});
	}
</script>

<div class="modal" id="myModal">
	<div class="modal-dialog" style="">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Commission Details By User</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div id="tot_comm"></div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>