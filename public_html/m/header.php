<?php

$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$maintenance_sql = 'SELECT * FROM `site_under_maintenance` LIMIT 1';
$maintenance_result = mysqli_query($conn, $maintenance_sql);
$row = mysqli_fetch_array($maintenance_result, MYSQLI_ASSOC);

if ($row['site_status'] == 1 and $user_id != 4) {
    
	echo "<script>location.href='maintenance.html'</script>";
	
}
$current_page = basename($_SERVER['PHP_SELF']); 
?>
<style>
	.dropdown-toggle::after {
		content : unset !important;
	}
	#headerMenu2{
		font-size: 14px !important;
	}
	.fa-search-plus:before {
    content: "\f00e" !important;
}
.search_icon{
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
.bar1, .bar2, .bar3 {
    width: 20px;
    height: 3px;
    background-color: #ffff;
    margin: 4px 0;
    transition: .4s;
}
.search-box .search_input-hover, .search-box1 .search_input-hover{
	    background-color: white;
}

.latest-event-item{
	background-color: var(--theme1-bg);
}
.sports .nav-tabs{
	background-color: var(--theme1-bg);
}

.rules-content-title{
	background-color: var(--theme1-bg);
    color: white;
    padding: 5px 10px;
    font-size: 18px;
    font-weight: bold;
}
.rules-content-desc{
	padding: 10px;
}
</style>
<header class="header">
    <div class="container-fluid">
        <div class="row row5 pb-1">
            <div class="logo col-6  pt-1">
				 <!-- <div class="side-menu-button">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div> -->
						<!-- <a class="d-xl-none" href=""><i class="fas fa-bars me-2" style="font-size: 20px;color:#fff"></i></a> -->
            	<!-- <a href="home" class="router-link-exact-active router-link-active">
            		<i class="fas fa-home mr-1"></i> 
					 
            		<img src="../storage/logo.png" alt="Exchange" class="img-fluid logo">
            	</a> -->

				 <?php if ($current_page == 'home.php') : ?>
        <div class="side-menu-button">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
		<div id="sidebarContainer"></div>
		<img src="../storage/logo.png" alt="Exchange" class="img-fluid logo" style="margin-left: 23px;">
    <?php else : ?>
        <a href="home" class="router-link-exact-active router-link-active">
            <i class="fas fa-home mr-1"></i>
            <img src="../storage/logo.png" alt="Exchange" class="img-fluid logo">
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
							<span id="btn_exposure_popup"><b id="betExposure">Exp:0</b></span>
						</span>
						<div class="dropdown d-inline-block">
							<a id="headerMenu2" href="#" data-toggle="dropdown" class=" dropdown-toggle">
								<b>								
									<?php
										$user_name_details = $conn->query("select * from user_login_master where UserId=$user_id");										
										$fetch_user_name_details = mysqli_fetch_assoc($user_name_details);										
										$_SESSION['userName'] = $fetch_user_name_details['Email_ID'];										
										echo $_SESSION['userName'];								
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
								<?
									if($user_id  != LOGINDEMOID){
										?>
								<a href="activity_log" class="dropdown-item">
									Activity Logs
								</a> 
								<?
									}
									?>
								<a href="casinoresults" class="dropdown-item">
									Casino Results
								</a> 
								<?
									if($user_id  != LOGINDEMOID){
										?>
								<a href="javascript:void(0)" class="dropdown-item">
								Live Casino Bets
								</a> 
								<?
									}
									?>
								<a class="dropdown-item"  data-target="#set_btn_value" data-toggle="modal">
									Set Button Values
								</a>
								<?
									if($user_id  != LOGINDEMOID){
										?>
								<a href="securityauth" class="dropdown-item">
								Security Auth Verification
								</a> 
								
								<a href="changepassword" class="dropdown-item">
									Change Password
								</a> 
								<?
									}
									?>
									<a class="dropdown-item"  data-target="#rulesmenu" data-toggle="modal">
									Rules
								</a> 
								<!--  <a href="profitloss" class="dropdown-item">
									Profit Loss Report
								</a> 
								
								<a href="unsetteledbet" class="dropdown-item">
									Unsetteled Bet
								</a> -->
								
								
								
								<a href="#" class="dropdown-item" >
									Balance
									<div class="custom-control custom-checkbox float-right"><input type="checkbox" id="customCheck" onclick="balance_checkbox()" checked class="custom-control-input" name="balance_checkbox"> <label for="customCheck" class="custom-control-label"></label></div>
								</a> 
								<a href="#" class="dropdown-item">
									Exposure
									<div class="custom-control custom-checkbox float-right"><input type="checkbox" id="customCheck1" checked class="custom-control-input" name="balance_exposure" onclick="balance_exposure()"> <label for="customCheck1" class="custom-control-label"></label></div>
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
						<a id="searchHeader" href="javascript:void(0)" class="search_icon"><i id="searchB" style="font-size:24px;" class="fas fa-search-plus"></i></a>
					</div>
				</div>
				<marquee scrollamount="3" class="searchClose" style="font-style:italic">
					<?php echo SITE_MARQUEE; ?>
				<!-- Newly Launched! Premium Casino Games Now Live Play Teenpatti Baccarat Lucky 7 & More on Our Exchange. -->
				</marquee>
				
			
		</div>
		
		<?php if ((IPL_EVENT_ID != '' || ELECTION_EVENT_ID != '') && 1!=1){ ?>
			<div class="row header-b-menu">
				<?php if (IPL_EVENT_ID != ''){ ?>
					<div class="col ipl">
						<a href="/m/event_full_market?eventType=<?php echo IPL_EVENT_TYPE_ID;?>&eventId=<?php echo IPL_EVENT_ID;?>&marketId=<?php echo IPL_MARKET_ID;?>" class="text-link"><?php echo IPL_MARKET_NAME;?></a>
					</div>
				<?php } ?>
				<?php if (ELECTION_EVENT_ID != ''){ ?>
					<div class="col election">
						<a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="text-link"><?php echo ELECTION_MARKET_NAME;?></a>
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

.sidebar .nav-item .nav-link{
	background: #bbbbbb;
	border-bottom: 1px solid #9e9e9e ;
}

	#sidebarContainer {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.6);
  z-index: 999;
}

#sidebarContainer .sidebar {
  background: #cccccc;
  width: 300px;
  height: 100%;
  overflow-y: auto;
  box-shadow: 2px 0 5px rgba(0,0,0,0.3);
  position: absolute;
  left: 0;
  top: 0;
  animation: slideIn 0.3s ease;
}

@keyframes slideIn {
  from { left: -320px; opacity: 0; }
  to { left: 0; opacity: 1; }
}
</style>


<div class="loader" ><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
<div class="stop-site" style="display:none;"><div><p>Due to some inactivity or security reasons stop your website, please close the developer tool.</p> <p>Thank you for your support</p></div></div>
<?
            $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
            ?>
            <script>
            var curPageName = '<?php echo $curPageName; ?>';  
            </script>
