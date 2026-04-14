<?php
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
?>
    
<link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">

<link href="assets/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
<div class="left_col scroll-view">
<div class="navbar nav_title" style="border: 0;">
<a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span><?php echo SITE_NAME; ?></span></a>
</div>
<div class="clearfix"></div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
</br>
<?php
if($_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'] == 5){
	$panel_type = "(Controller Panel)";
}else{
	header("Location: logout.php");
}
?>
<h3>Welcome, <?php echo $_SESSION['CONTROLLER_LOGIN_NAME']; ?> <?php echo $panel_type; ?></h3>
<ul class="nav side-menu">
<li><a href="index.php"><i class="fa fa-home"></i> Home </a>
</li>

<?php
/*
<li><a href="set_marquee.php"><i class="fa fa-bullhorn"></i> Set Marquee </a>
</li>

<li><a href="set_toss_end_time.php"><i class="fa fa-clock-o"></i> Toss End Time </a>
</li>

<li><a href="manageevents.php"><i class="fa fa-clock-o"></i>Event Maximum Limit </a>
</li>


<li><a href="set_all_user_max_limit_stake.php"><i class="fa fa-clock-o"></i> Maximum Limit </a>
</li>

<li><a href="slider.php"><i class="fa fa-clock-o"></i> Slider </a>
</li>
*/?>

<!-- <li><a href="tv_mapping.php"><i class="fa fa-clock-o"></i> Tv Management </a> -->
<li><a href="manageevents.php"><i class="fa fa-clock-o"></i> Limit </a>
<li><a href="bet_history_new.php"><i class="fa fa-clock-o"></i> Bet History </a>
<li><a href="view_casino_bet.php"><i class="fa fa-clock-o"></i> View Casino </a>
<li><a href="home_panel.php"><i class="fa fa-clock-o"></i> Home Custom Event </a>
</li>

<li style="display:none;" id="report_menu"><a><i class="fa fa-file-text-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="profit_loss_market.php">P&L Report</a></li>
<li><a href="pnl_market_dd.php">P&L Report V2</a></li>
<li><a href="pnl_report_2020_teenpatti.php">P&L Report Live 2020 Teenpatti</a></li>
<li><a href="active_bet.php">Active Bet</a></li>
<li><a href="bet_history.php">Bet History</a></li><li><a href="chip_history.php">Chip History</a></li>
</ul>

</li>
 

<li id="usma"><a><i class="fa fa-users"></i> User Management <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">

<li><a href="view_user.php">View User</a></li>
<li><a href="view_user_type_wise.php">Filter User</a></li>
</ul>
</li>

<li id="usma"><a><i class="fa fa-users"></i> Export data <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">

<li><a href="bet_export.php">Bet Export</a></li>
<li><a href="casino_export.php">Casino Export</a></li>
</ul>
</li>
<li><a href="account_balace_equal.php"><i class="fa fa-home"></i> Account Balance Equal </a>
</li>

<li><a><i class="fa fa-asterisk"></i> Result Management <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<?php
if(false){
?>
<li><a href="view_cancel.php">View Cancel Bet</a></li>
<li><a href="view_bet.php">View Active Bet</a></li>
<li><a href="revert_result.php">Revert Result</a></li>
<li><a href="teenpatti_result_apply.php">2020 Teenpatti Result</a></li>
<li><a href="remove_result_block.php">Unblock Result</a></li>

<?php
}
?>


<li><a href="result_apply.php">Apply Result</a></li>

<li><a href="view_bet_v2.php">Apply Cancel Odds Result</a></li>
<li><a href="result_cancel.php">Cancel Result</a></li>
<li><a href="revert_market_result.php">Revert Result Marketwise</a></li>


</ul>

</ul>
</div>
</div>

</div>
</div>

<div class="top_nav">
<div class="nav_menu">
<nav>
<div class="nav toggle">
<a id="menu_toggle"><i class="fa fa-bars"></i></a>
</div>
<ul class="nav navbar-nav navbar-right">
<li class="">
<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<?php echo $_SESSION['CONTROLLER_LOGIN_NAME']; ?>
<span class=" fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">

<li><a href="change_my_password.php"><i class="fa fa-lock pull-right"></i> Change Password</a></li>
<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>
</li>
</ul>
</nav>
</div>
</div>
