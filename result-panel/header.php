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
	$panel_type = "(Result Panel)";
}else{
	header("Location: logout.php");
}
?>
<h3>Welcome, <?php echo $_SESSION['CONTROLLER_LOGIN_NAME']; ?> <?php echo $panel_type; ?></h3>
<ul class="nav side-menu">
<li><a href="index.php"><i class="fa fa-home"></i> Home </a>
</li>



<li><a><i class="fa fa-asterisk"></i> Result Management <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">



<li><a href="result_apply.php">Apply Result</a></li>
<li><a href="revert_market_result.php">Revert Result Marketwise</a></li>
<li><a href="remove_result_done_block.php">Remove Bet Closed Result</a></li>
<li><a href="remove_result_block.php">Unblock Result</a></li>

</ul>
<li><a><i class="fa fa-asterisk"></i> TV Management <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">


<li><a href="tv_mapping_add.php">TV Mapping</a></li>
</ul>
</li>
<li><a href="set_bet_delay.php"><i class="fa fa-home"></i>Set Bet Delay </a>
</li>
<li><a href="event_sleeptime_add.php"><i class="fa fa-home"></i>Event Wise Delay </a>
</li>
<li><a href="marquee_add.php"><i class="fa fa-asterisk"></i> Marquee set </a></li>
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

<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
<li><a href="change_my_password.php"><i class="fa fa-key pull-right"></i>Change Password</a></li>
</ul>
</li>
</ul>
</nav>
</div>
</div>
