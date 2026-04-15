<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$userdata = $handler->users->data();
$admin = $this->session->userdata('user_login');     // Admins
$employee = $this->session->userdata('employee_data'); // Employees

$is_admin = true;
$privileges = [];

/* var_dump($admin); */

/*if ($admin) {
    $is_admin = true;
} elseif ($employee) {
    $privileges = $employee['privileges'] ?? [];
} */
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= PROJECTNAME; ?></title>
        <link rel="icon" href="<?php echo MASTER_URL; ?>/favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-10/css/all.css">
        <link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/vendors/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/front/theme/theme.css?v=<?php echo time();?>">
        <link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/style.css?12369">
        <script src="<?php echo MASTER_URL; ?>/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">var MASTER_URL = '<?php echo MASTER_URL; ?>'</script>
     
    </head>
       <style>
            .loader-ac_balance{
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                opacity: 0.8;
                z-index: 9;
                margin: 1px;
                background-color: #2C3E50;
                position: absolute;
                text-align: center;
            }

            .dataTables_paginate > a {
                margin: 10px;
            }
            .navbar-nav {
    flex-wrap: wrap;
    gap: 7px 0px;
}
.customeclass{
    width:70%;
}

.navbar-nav{
    padding-left: 156px !important;
}

.header-bottom .container-fluid {
  display: flex;
}

.side-menu-button {
  position: relative; 
  z-index: 9999;     
  cursor: pointer;
  top: 5px !important;
}

.modal-body, .pb-1, .py-1 {
    padding-bottom: 1.25rem !important;
}
        </style>
    <body>
        <div id="divLoading" class=""></div>
        <div class="wrapper">
            <header>
                <div class="header-bottom">
                    <div class="container-fluid">
                        <a href="<?php echo MASTER_URL; ?>/manage-clients/listing2" class="logo">
                            <img src="<?php echo MASTER_URL; ?>/assets/logo.png">
                        </a>
                        <div class="side-menu-button">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                        <nav class="navbar navbar-expand-md btco-hover-menu customeclass">
                            <div class="collapse navbar-collapse">
                                <ul class="list-unstyled navbar-nav">
                                    <?php if ($is_admin || in_array('view_clients', $privileges)): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo MASTER_URL; ?>/manage-clients/listing">
                                                <b>List of clients</b>
                                            </a>
                                        </li>
                                    <?php endif; ?>

									
										<li class="nav-item">
											<a class="" href="<?php echo MASTER_URL; ?>/assign_agent/agent_list">
												<span><b>Assign Agent</b></span>
											</a>
										</li>
                                    
                                    <?php if (($is_admin || in_array('view_election_market', $privileges)) && ELECTION_EVENT_ID != ''): ?>
                                        <li class="nav-item newlacunch-menu">
                                            <a href="<?php echo MASTER_URL; ?>/events-analysis?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>">
                                                <span><b><?php echo ELECTION_MARKET_NAME;?></b></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

									
                                    <?php if ($is_admin || in_array('view_market_analysis', $privileges)): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo MASTER_URL; ?>/market-analysis">
                                                <b>Market Analysis</b>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <li class="nav-item dropdown">
                                        <a href="javascript:void(0);">
                                            <span><b>Live Market</b> <i class="fa fa-caret-down"></i></span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item" href="">
                                                    <span><b>Premium Casino</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="">
                                                    <span><b>Tembo Casino</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="">
                                                    <span><b>Vip Casino</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/lucky5">
                                                    <span><b>Lucky 6</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/mogambo">
                                                    <span><b>Mogambo</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/teenunique">
                                                    <span><b>Unique Teenpatti</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/roulette">
                                                    <span><b>Roulette</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/ballbyball">
                                                    <span><b>Super Over2</b></span>
                                                </a>
                                            </li>
                                             <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/lucky15">
                                                    <span><b>Lucky 15</b></span>
                                                </a>
                                            </li>
                                             <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/goal">
                                                    <span><b>Goal</b></span>
                                                </a>
                                            </li>
                                             <li>
                                                <a class="dropdown-item" href="">
                                                    <span><b>Binary</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/race20">
                                                    <span><b>Race 20-20</b></span>
                                                </a>
                                            </li>
											<li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/queen">
                                                    <span><b>Queen</b></span>
                                                </a>
                                            </li>
											<li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/baccarat/listing">
                                                    <span><b>Baccarat</b></span>
                                                </a>
                                            </li>
											<li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/sports-casino">
                                                    <span><b> Sports Casino</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/war">
                                                    <span><b>Casino War</b></span>
                                                </a>
                                            </li>
                                               <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/instant_worli/list1">
                                                    <span><b>Worli</b></span>
                                                </a>
                                            </li>
											 <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/threecards">
                                                    <span><b>3 Cards Judgement</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/card32">
                                                    <span><b>32 Cards Casino</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/teenpatti">
                                                    <span><b>Live TeenPatti</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/teenpatti/teen6">
                                                    <span><b>Teenpatti 2.0</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/poker">
                                                    <span><b>Live Poker</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/andarbahar">
                                                    <span><b>Andar Bahar</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/lucky7">
                                                    <span><b>Lucky 7</b></span>
                                                </a>
                                            </li>
                                           
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/dt">
                                                    <span><b>Dragon Tiger</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/bollywood-casino">
                                                    <span><b> Bollywood Casino</b></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/bollywood-casino/btable2">
                                                    <span><b> Cricket Casino</b></span>
                                                </a>
                                            </li>
											
											 <!-- <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/cmeter">
                                                    <span><b> Casino Meter</b></span>
                                                </a>
                                            </li>
											   
                                             <li>
                                                 <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/ballbyball">
                                                    <span><b>Ball by Ball</b></span>
                                                </a>
                                             </li>-->
                                            <li>
                                                <a class="dropdown-item" href="<?php echo MASTER_URL; ?>/live-market/others">
                                                    <span><b>Others</b></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <?php if (($is_admin || in_array('view_IPL_market', $privileges)) && IPL_EVENT_ID != ''): ?>
										<li class="nav-item newlacunch-menu">
											<a class="" href="<?php echo MASTER_URL; ?>/events-analysis?eventType=<?php echo IPL_EVENT_TYPE_ID;?>&eventId=<?php echo IPL_EVENT_ID;?>&marketId=<?php echo IPL_MARKET_ID;?>">
												<span><b><?php echo IPL_MARKET_NAME;?></b></span>
											</a>
										</li>
									<?php endif; ?>

                                    <li class="nav-item">
											<a class="" href="#">
												<span><b>Live Virtual Market </b></span>
											</a>
										</li>

                                    <?php if ($is_admin || in_array('view_reports', $privileges)): ?>
                                        <li class="nav-item dropdown">
                                            <a href="javascript:void(0);">
                                                <b>Reports</b> <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <?php if ($is_admin || in_array('view_account_statement', $privileges)): ?>
                                                <li>
                                                    <a href="<?php echo MASTER_URL; ?>/reports/account-statement" class="dropdown-item">
                                                        <b>Account's Statement</b>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php if ($is_admin || in_array('view_current_bets', $privileges)): ?>
                                                <li>
                                                    <a href="<?php echo MASTER_URL; ?>/reports/current-bets" class="dropdown-item">
                                                        <b>Current Bets</b>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php if ($is_admin || in_array('view_general_report', $privileges)): ?>
                                                <li>
                                                    <a href="<?php echo MASTER_URL; ?>/reports/general-report" class="dropdown-item">
                                                        <b>General Report</b>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php if ($is_admin || in_array('view_game_report', $privileges)): ?>
                                                <li>
                                                    <a href="<?php echo MASTER_URL; ?>/reports/game-report" class="dropdown-item">
                                                        <b>Game Report</b>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php if ($is_admin || in_array('view_profit_loss', $privileges)): ?>
                                                <li>
                                                    <a href="<?php echo MASTER_URL; ?>/reports/profit-loss" class="dropdown-item">
                                                        <b>Profit And Loss</b>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                <?php if ($is_admin || in_array('view_casino_results', $privileges)): ?>
                                                <li>
                                                    <a href="<?php echo MASTER_URL; ?>/reports/casino-results" class="dropdown-item">
                                                        <b>Casino Result Report</b>
                                                    </a>
                                                </li>
                                                <?php endif; ?>

                                                 <?php if ($is_admin || in_array('general_lock', $privileges)): ?>
                                                <li>
                                                    <a href="<?php echo MASTER_URL; ?>/reports/userlock" class="dropdown-item">
                                                        <b>General Lock</b>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>


                                    <?php if ($is_admin || in_array('multi_login', $privileges)): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo MASTER_URL; ?>/reports/createaccount">
                                                <b>Multi Login</b>
                                            </a>
                                        </li>
                                    <?php endif; ?>


                                </ul>
                            </div>
                        </nav>
                        <ul class="user-search list-unstyled">
                            <li class="username">
                                <span><?php echo $userdata['Email_ID']; ?> <i class="fa fa-caret-down"></i></span>
                                <ul>
                                  <li>
                                        <a href="<?php echo MASTER_URL; ?>/SecurityAuth"><b>Secure Auth Verification</b></a>
                                    </li> 
                                    <?php if ($is_admin || in_array('change_password', $privileges)): ?>
                                        <li>
                                            <a href="<?php echo MASTER_URL; ?>/account/change_pwd_new"><b>Change Password</b></a>
                                        </li>
                                    <?php endif; ?>
                                   
                                    <li>
                                        <a href="<?php echo MASTER_URL; ?>/logout"><b>Logout</b></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="search">
                                <!--<select type="text" class="form-control" name="search-account_details" id="search-account_details" id=""></select>-->
                                <input type="text" name="search-account_details" id="search-account_details" placeholder="All Client">
                                <a id="clientList" data-value="" href="javascript:void(0)"><i class="fas fa-search-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="main"> 
                <div class="container-fluid">
                    <?php if (isset($handler->layout['summary']) && $handler->layout['summary']) { ?>
                        <?php if (($userdata['power'] > 1 && $userdata['power'] < 6) || $userdata['power'] == 7) { ?>
                             <div class="row">
                                <div class="master-balance">
                                    <div class="text-center">
                                        <span class="far fa-arrow-alt-circle-down" id="user-account_summary"></span>
                                        <span class="far fa-arrow-alt-circle-up"></span>
                                    </div>
                                    <div class="master-balance-detail m-t-20" id="master-balance-detail" style="position: relative;">
                                        <div class="loader-ac_balance" style="display: none;">
                                            <img src="<?php echo MASTER_URL; ?>/assets/common/loading.gif" width="40px">
                                        </div>
                                        <ul class="row">
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Upper Level Credit Referance:</label>
                                                <span class="text-right col-md-4" id="ac_summary-credit_reference">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Down level Occupy Balance:</label>
                                                <span class="text-right col-md-4" id="ac_summary-down_level_balances">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Down Level Credit Referance:</label>
                                                <span class="text-right col-md-4" id="ac_summary-down_level_credit_reference">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Total Master Balance</label>
                                                <span class="text-right col-md-4" id="ac_summary-master_balance">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Upper Level:</label>
                                                <span class="text-right col-md-4" id="ac_summary-up_pl">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Down Level Profit/Loss :</label>
                                                <span class="text-right col-md-4" id="ac_summary-down_pl">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Available Balance:</label>
                                                <span class="text-right col-md-4" id="ac_summary-available_balance">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">Available Balance With Profit/Loss:</label>
                                                <span class="text-right col-md-4" id="ac_summary-available_balance_with_pl">0</span>
                                            </li>
                                            <li class="col-md-4">
                                                <label class="col-md-8 text-left">My Profit/Loss:</label>
                                                <span class="text-right col-md-4" id="ac_summary-my_pl">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        <?php } ?>
                    <?php } ?>
                    <div class="row">
                        <div class="sidebar">
                            <nav>
                                <h2>Sports</h2>
                                <i class="fa fa-times"></i>
                                <ul class="mtree transit bubba">
									
									<li>
										<a href="#">Football</a>
										<ul id="tree_soccer" class="mtree-level-1">
										</ul>
									</li>
									<li>
										<a href="#">Tennis</a>
										<ul id="tree_tennis" class="mtree-level-1">
										</ul>
									</li>
									<li class="mtree-node">
										<a href="#">Cricket</a>
										<ul id="tree_cricket" class="mtree-level-1">
										</ul>
									</li>
									<li class="mtree-node">
										<a href="#">Boxing</a>
										<ul id="tree_boxing" class="mtree-level-1">
										</ul>
									</li>
									<li class="mtree-node">
										<a href="#">Table Tennis</a>
										<ul id="tree_table_tennis" class="mtree-level-1">
										</ul>
									</li>
									<li class="mtree-node">
										<a href="#">Badminton</a>
										<ul id="tree_badminton" class="mtree-level-1">
										</ul>
									</li>
									<li class="mtree-node">
										<a href="#">Basketball</a>
										<ul id="tree_basketball" class="mtree-level-1">
										</ul>
									</li>
									<li class="mtree-node">
										<a href="#">Vollyball</a>
										<ul id="tree_vollyball" class="mtree-level-1">
										</ul>
									</li>
									<li class="mtree-node">
										<a href="#">Politics</a>
										<ul id="tree_politics" class="mtree-level-1">
										</ul>
									</li>
									
									
                                </ul>                                
                            </nav>

                        </div>

                        <div id="divLoading" class=""></div>