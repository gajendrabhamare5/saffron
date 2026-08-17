<?php

$user_id = isset($_SESSION['CLIENT_LOGIN_ID']) ? (int)$_SESSION['CLIENT_LOGIN_ID'] : 0;
$maintenance_sql = 'SELECT * FROM `site_under_maintenance` LIMIT 1';
$maintenance_result = mysqli_query($conn, $maintenance_sql);
$row = $maintenance_result ? mysqli_fetch_array($maintenance_result, MYSQLI_ASSOC) : null;

if ($row && isset($row['site_status']) && $row['site_status'] == 1 && $user_id != 4) {

	echo "<script>location.href='maintenance.html'</script>";

}
$current_page = basename($_SERVER['PHP_SELF']);


$logo = '';
$name = '';
$sql = "SELECT * FROM `logo` WHERE `Id`=1";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$name = isset($row['name']) ? $row['name'] : '';
	$logo = isset($row['logo_image']) ? $row['logo_image'] : '';
}

?>
<style>
	.dropdown-toggle::after {
		content: unset !important;
	}

	#headerMenu2 {
		font-size: 14px !important;
	}

	.fa-search-plus:before {
		content: "\f00e" !important;
	}

	.search_icon {
		color: #fff !important;
	}
</style>
<style>
	.side-menu-button {
		cursor: pointer;
		position: absolute;
		left: 5px;
		top: 10px;
		z-index: 10;
	}

	.bar1,
	.bar2,
	.bar3 {
		width: 20px;
		height: 3px;
		background-color: #fff;
		margin: 3px 0;
		transition: 0.4s;
	}

	.change .bar1 {
		-webkit-transform: rotate(-45deg) translate(-4px, 4px);
		transform: rotate(-45deg) translate(-4px, 4px);
	}

	.change .bar2 {
		opacity: 0;
	}

	.change .bar3 {
		-webkit-transform: rotate(45deg) translate(-4px, -4px);
		transform: rotate(45deg) translate(-4px, -4px);
	}

	header {

		top: 0px !important;
	}

	.marquedata {
		position: absolute;
		top: 47px;
	}

	.header-bottom {
		margin-top: 16px !important;
	}

	.top-head-sec {
		margin-top: -15px !important;
	}

	.download-apklink {
		width: max-content;
		position: absolute;
		bottom: -1px;

		display: flex;
		justify-content: space-around;
	}

	.search-box .search_input-hover,
	.search-box1 .search_input-hover {
		background-color: white;
	}

	.latest-event-item {
		background-color: var(--theme2-bg);
	}

	.sports .nav-tabs {
		background-color: var(--theme2-bg);
	}

	.rules-content-title {
		background-color: var(--theme1-bg);
		color: white;
		padding: 5px 10px;
		font-size: 18px;
		font-weight: bold;
	}

	.rules-content-desc {
		padding: 10px;
	}

	.marquee-container {
		background: #ffffff45;
		width: 90%;

	}

	.header-bottom marquee {
		background: none !important;
	}

	.iphone-marquee {
		display: none;
		overflow: hidden;
		width: 60%;
		position: relative;
		padding: 4px;
	}
	

	.track {
		display: inline-block;
		white-space: nowrap;
		position: relative;
		/* right: -200%; */
		left: 50%;
		transform: translateX(-50%);
		will-change: transform;
	}

	.track span {
    display: inline-block;
}

.track span:first-child {
    margin-right: 150px; /* 👈 gap adjust kar sakte ho */
}
</style>
<div class="top-head-sec">
	<!-- <div style="float: left;" class="m-t-10 m-b-10"><a href="/m/rules" class="text-white p-2">Rules</a></div>
	<div style="float: right;" class="download-apklink m-t-10 m-b-10"><a href="#" class="text-white p-2"><span>Download Apk <i class="fab fa-android"></i></span></a></div> -->
</div>
<header class="header">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-6 position-relative text-left logo-sec">
				<?php if ($current_page == 'home.php' || $current_page == 'home'): ?>
					<div class="side-menu-button d-inline-block" onclick="sidebar_toggle(this)">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
					</div>
					<div id="sidebarContainer"></div>
					<img src="<?php echo WEB_URL .$logo ?>" alt="Exchange" class="img-fluid logo" style="margin-left: 23px;">
				<?php else: ?>
					<a href="home" class="router-link-exact-active router-link-active">
						<i class="fas fa-home mr-1"></i>
						<img src="<?php echo WEB_URL .$logo ?>" alt="Exchange" class="img-fluid logo">
					</a>
				<?php endif; ?>
			</div>
			<div class="col-6 text-right bal-expo">
				<div class="bal-expo-inner">
					<div>
						<span>Balance:</span>
						<!--<i class="fas fa-landmark mr-1"></i>-->
						<b id="betCredit"> 0 </b>
					</div>
					<div class="">
						<span class="mr-1">
							<a href="javascript:void(0);" id="btn_exposure_popup"><b><span id="betExposure" style="color: white;">0</span></b></a>
							<!-- <span id="btn_exposure_popup"><b id="betExposure">Exp:0</b></span> -->
						</span>
						<div class="dropdown d-inline-block">
							<a id="headerMenu2" href="#" data-toggle="dropdown" class=" dropdown-toggle">
								<b>
									<?php
									if ($user_id > 0) {
										$user_name_details = $conn->query("select * from user_login_master where UserId=$user_id");
										if ($user_name_details && mysqli_num_rows($user_name_details) > 0) {
											$fetch_user_name_details = mysqli_fetch_assoc($user_name_details);
											$_SESSION['userName'] = isset($fetch_user_name_details['Email_ID']) ? $fetch_user_name_details['Email_ID'] : '';
										}
									}
									echo isset($_SESSION['userName']) ? $_SESSION['userName'] : '';
									?>

								</b>
								<i class="fas fa-chevron-down ms-1"></i>
							</a>
							<div class="dropdown-menu headerMenu12">
								<!-- <a href="home" class="dropdown-item router-link-exact-active router-link-active">
									Home
								</a> -->
								<a href="accountstatement" class="dropdown-item">
									Account Statement
								</a>

								<a href="current-bet" class="dropdown-item">
									Current Bet
								</a>
								<?php

								if ($user_id != LOGINDEMOID) {
								?>
									<a href="activity_log" class="dropdown-item">
										Activity Logs
									</a>
								<?php
								}
								if (CASINO_PLAY) {
								?>
									<a href="casinoresults" class="dropdown-item">
										Casino Results
									</a>
								<?php
								}
								if ($user_id != LOGINDEMOID && CASINO_PLAY) {
								?>
									<a href="javascript:void(0)" class="dropdown-item">
										Live Casino Bets
									</a>
								<?php
								}
								?>
								<a class="dropdown-item" data-target="#set_btn_value" data-toggle="modal">
									Set Button Values
								</a>
								<?php
								if ($user_id != LOGINDEMOID) {
								?>
								<?php if(authcheck){?>
									<a href="securityauth" class="dropdown-item">
										Security Auth Verification
									</a>
									 <?php }?>
									<a href="changepassword" class="dropdown-item">
										Change Password
									</a>
								<?php
								}
								?>
								<a class="dropdown-item" data-target="#rulesmenu" data-toggle="modal">
									Rules
								</a>
								<!--  <a href="profitloss" class="dropdown-item">
									Profit Loss Report
								</a> 
								
								<a href="unsetteledbet" class="dropdown-item">
									Unsetteled Bet
								</a> -->



								<a href="#" class="dropdown-item">
									Balance
									<div class="custom-control custom-checkbox float-right"><input type="checkbox"
											id="customCheck" onclick="balance_checkbox()" checked
											class="custom-control-input" name="balance_checkbox"> <label
											for="customCheck" class="custom-control-label"></label></div>
								</a>
								<a href="#" class="dropdown-item">
									Exposure
									<div class="custom-control custom-checkbox float-right"><input type="checkbox"
											id="customCheck1" checked class="custom-control-input"
											name="balance_exposure" onclick="balance_exposure()"> <label
											for="customCheck1" class="custom-control-label"></label></div>
								</a>
								<hr style="margin: .5rem 0;">
								<a href="logout" class="dropdown-item mt-2">
									SignOut
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom">

			<div class="search-box-container">
				<div class="search-box1 float-left">
					<input id="searchHeader1" type="text" class="search_input" placeholder="Search here">
					<a id="searchHeader" href="javascript:void(0)" class="search_icon"><i id="searchB"
							style="font-size:24px;" class="fas fa-search-plus"></i></a>
				</div>
			</div>
			<div class="marquee-container">

				<marquee scrollamount="3" class="searchClose android-marquee" style="font-style:italic;">
					<?php echo SITE_MARQUEE; ?>
				</marquee>

				<div class="iphone-marquee" style="font-style:italic;">
					<div class="track">
						<span><?php echo SITE_MARQUEE; ?></span>
						<span><?php echo SITE_MARQUEE; ?></span>
					</div>
				</div>

			</div>


		</div>

		<?php if ((IPL_EVENT_ID != '' || ELECTION_EVENT_ID != '') && 1 != 1) { ?>
			<div class="row header-b-menu">
				<?php if (IPL_EVENT_ID != '') { ?>
					<div class="col ipl">
						<a href="/m/event_full_market?eventType=<?php echo IPL_EVENT_TYPE_ID; ?>&eventId=<?php echo IPL_EVENT_ID; ?>&marketId=<?php echo IPL_MARKET_ID; ?>"
							class="text-link"><?php echo IPL_MARKET_NAME; ?></a>
					</div>
				<?php } ?>
				<?php if (ELECTION_EVENT_ID != '') { ?>
					<div class="col election">
						<a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID; ?>&eventId=<?php echo ELECTION_EVENT_ID; ?>&marketId=<?php echo ELECTION_MARKET_ID; ?>"
							class="text-link"><?php echo ELECTION_MARKET_NAME; ?></a>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</header>

<style>
	.sidebar-title {
		background-color: var(--theme1-bg) !important;
	}

	.sidebar .sidebar-title.collapsed :before {
		content: "\f105";
	}

	/* .collapse:not(.show) {
	display: none;
} */
	.fa-minus-square:before {
		content: "\f146";
	}

	.sidebar .sidebar-title :before {
		font-family: "Font Awesome 5 Free";
		content: "\f107";
		display: inline-block;
		padding-right: 3px;
		vertical-align: middle;
		font-weight: 900;
		float: right;
	}

	.sidebar .nav-item .nav-link {
		background: #bbbbbb;
		border-bottom: 1px solid #9e9e9e;
	}

	#sidebarContainer {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.6);
		z-index: 999;
	}

	#sidebarContainer .sidebar {
		background: #cccccc;
		width: 300px;
		height: 100%;
		overflow-y: auto;
		box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
		position: absolute;
		left: 0;
		top: 0;
		animation: slideIn 0.3s ease;
	}

	@keyframes slideIn {
		from {
			left: -320px;
			opacity: 0;
		}

		to {
			left: 0;
			opacity: 1;
		}
	}
</style>


<div class="loader"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
<?php if (preg_match('/^live_/', $current_page)) { ?>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="live-boot.js"></script>
<?php } ?>
<div class="stop-site" style="display:none;">
	<div>
		<p>Due to some inactivity or security reasons stop your website, please close the developer tool.</p>
		<p>Thank you for your support</p>
	</div>
</div>
<script>
	var ua = navigator.userAgent;

	var androidMarquee = document.querySelector('.android-marquee');
	var iphoneMarquee = document.querySelector('.iphone-marquee');
	var track = document.querySelector('.track');

	if (/Android/i.test(ua)) {
		androidMarquee.style.display = 'block';
		iphoneMarquee.style.display = 'none';

		androidMarquee.setAttribute("direction", "left"); // right ➝ left

	} else if (/iPhone|iPad|iPod/i.test(ua)) {
		androidMarquee.style.display = 'none';
		iphoneMarquee.style.display = 'block';

		requestAnimationFrame(() => {
		var textWidth = track.scrollWidth;
		var containerWidth = iphoneMarquee.offsetWidth;
		var distance =  textWidth + (containerWidth / 2) ;
		var speed = 60;
		var duration = distance / speed;
		
		track.style.animation = `scrollLeft  ${duration}s linear infinite`;

		var style = document.createElement('style');
		style.innerHTML = `
            @keyframes scrollLeft {
                0% {
                    transform: translateX(-50%);
                }
                100% {
                    transform: translateX(-${distance}px);
                }
            }
        `;
		document.head.appendChild(style);
 });
		// wrap text in span for animation
		/* iphoneDiv.innerHTML = "<span>" + iphoneDiv.innerHTML + "</span>"; */
	}
</script>

<?
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>
<script>
	var curPageName = '<?php echo $curPageName; ?>';
</script>