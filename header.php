<?php
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$maintenance_sql = 'SELECT * FROM `site_under_maintenance` LIMIT 1';
$maintenance_result = mysqli_query($conn, $maintenance_sql);
$row = mysqli_fetch_array($maintenance_result, MYSQLI_ASSOC);

if ($row['site_status'] == 1 and $user_id !=4) {
    
	echo "<script>location.href='maintenance.html'</script>";
	
}

?>


<header class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="header-top col-md-12">
                            <div class="float-left">
                                <a href="home" class="logo"><img src="storage/logo.png?12456"></a>
                            </div>
                            <ul class="float-right">
                                <li class="search float-left">
                                    <input
                                        name="game_keyword"
                                        placeholder="Search here"
                                        autocomplete="off"
                                        type="text"
                                        class="search-input"
                                        style="display: none;"
                                    />
                                    <a href="javascript:void(0)" class="search-toggle">
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                </li>

                                <li class="float-left download-apklink">
                                    <div><a href="javascript:void(0)" data-toggle="modal" data-target="#rulesPopup" class="rules-link m-r-5"><b>Rules</b></a></div>
                                    <div><a href="#"><span><b>Download Apk</b> <i class="fab fa-android"></i></span></a></div>
                                </li>
                                <li class="ballance float-left">
                                    <div><span>Balance:</span> <b><span id="betCredit">0</span></b></div>
                                    <div><a href="javascript:void(0);" id="btn_exposure_popup"><span>Exposure:</span> <b><span id="betExposure">0</span></b></a></div>
                                </li>
                                <li class="account float-left">
                                <span id="headerMenu">
                            <?php 
										$user_name_details = $conn->query("select * from user_login_master where UserId=$user_id");
										$fetch_user_name_details = mysqli_fetch_assoc($user_name_details);
										$_SESSION['userName'] = $fetch_user_name_details['Email_ID'];
										echo $_SESSION['userName'];
								?> <i class="fas fa-chevron-down"></i></span>
                                    <ul class="headerMenu1">
                                        <li><a href="accountstatement" class="">
                                    Account Statement
                                </a></li>
                                <li><a href="current-bet" class="">
                                    Current Bet
                                </a></li>
                                <?
                                    if($user_id  != LOGINDEMOID){
                                ?>
                                <li><a href="activity_log" class="">
                                    Activity Logs
                                </a></li>
                                <?
                                    }
                                ?>
                                <li><a href="casinoresults" class="">
                                    Casino Results
                                </a></li>
                                <?
                                if($user_id  != LOGINDEMOID){
                                    ?>
                                <li><a href="javascript:void(0)" class="">
                                    Live  Casino Bets
                                </a></li>
                                <?
                                }
                                ?>
                                <li><a href="javascript:void(0)" data-target="#set_btn_value" data-toggle="modal">
                                    Set Button Values
                                </a></li>
                                        <!-- <li><a href="profitloss" class="">
                                    Profit Loss Report
                                </a></li>
                                        <li><a href="bethistory" class="">
                                    Bet History
                                </a></li>
                                        <li><a href="unsetteledbet" class="">
                                    Unsetteled Bet
                                </a></li>
                                        <li><a href="casinoresults" class="">
                                    Casino Report History
                                </a></li>
                                        <li><a href="changebtnvalue" class="">
                                    Set Button Values
                                </a></li> -->
                                <?
                                if($user_id  != LOGINDEMOID){
                                   
                                    ?>

                                <li><a href="securityauth" class="">
                                    Security Auth Verification
                                </a></li>
                               
                                <li><a href="changepassword" class="">
                                    Change Password
                                </a></li>
                                <?
                                }
                                ?>
                                <!-- <li><a href="javascript:void(0)" data-target="#rulesmenu" data-toggle="modal" class="">
                                    Rules
                                </a></li>
                                <li><a href="javascript:void(0)" class="">
                                    Balance
                                    <div class="custom-control custom-checkbox float-right"><input type="checkbox" id="customCheck" onclick="balance_checkbox()" checked class="custom-control-input" name="balance_checkbox"> <label for="customCheck" class="custom-control-label"></label></div>
                                </a></li>
                                <li><a href="accountstatement" class="">
                                    Exposure
                                    <div class="custom-control custom-checkbox float-right"><input type="checkbox" id="customCheck1" checked class="custom-control-input" name="balance_exposure" onclick="balance_exposure()"> <label for="customCheck1" class="custom-control-label"></label></div>
                                </a></li> -->
                                        <li>
                                            <hr>
                                        </li>
                                        <li><a href="logout">signout</a></li>
                                    </ul>
                                </li>
                             </ul>
                            <marquee scrollamount="3">
                                <?php //echo SITE_MARQUEE; ?>
                            </marquee>
                        </div>
                        <div class="header-bottom m-t-10 col-md-12">
                            <nav class="navbar navbar-expand-md btco-hover-menu">
                                <button type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="    navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
                                <div class="collapse navbar-collapse">
                                    <ul class="list-unstyled navbar-nav">
                                        <li class="nav-item active"><a href="home" class=""><b>Home</b></a></li>
                                        <li class="nav-item"><a href="#" class=""><b>Lottery</b></a></li>
                                        <li class="nav-item"><a href="home" class=""><b>Cricket</b></a></li>
                                        <li class="nav-item"><a href="home" class=""><b>Tennis</b></a></li>
                                        <li class="nav-item"><a href="home" class=""><b>Football</b></a></li>
                                        <li class="nav-item"><a href="home" class=""><b>Table Tennis</b></a></li>
                                        <!---->
                                        <!---->
                                      <?php
										$user_id = $_SESSION['CLIENT_LOGIN_ID'];
										$get_parent_ids = $conn->query("select * from user_login_master where UserID=$user_id");
										$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
										$parentDL = $fetch_parent_ids['parentDL'];
										$parentMDL = $fetch_parent_ids['parentMDL'];
										$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
										$parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];

										if($parentKingAdmin > 0){
											$check_cess_parent = $parentKingAdmin;
										}
										else{
											$check_cess_parent = $parentSuperMDL;
										}
										$get_access = $conn->query("select cricket_access,soccer_access,tennis_access,video_access from user_master where Id=$check_cess_parent");
										$fetch_access = mysqli_fetch_assoc($get_access);
										
										 if($fetch_access['video_access'] == 1){
									  ?>
                                        <li class="nav-item"><a href="baccarat-list" class=""><span><b>Baccarat</b></span></a></li>
                                        <li class="nav-item"><a href="card32-list" class=""><span><b>32 Cards</b></span></a></li>
                                        <li class="nav-item"><a href="teenpatti-list" class=""><span><b>Teenpatti</b></span></a></li>
                                        <li class="nav-item"><a href="poker-list" class=""><span><b>Poker</b></span></a></li>
                                        <li class="nav-item"><a href="lucky7-list" class=""><span><b>Lucky 7</b></span></a></li>
                                        <!--  <li class="nav-item"><a href="live_ab20" class=""><span><b>Andar Bahar</b></span></a></li>
                                        <li class="nav-item"><a href="dt-list" class=""><span><b>Dragon Tiger</b></span></a></li>
                                        <li class="nav-item"><a href="bollywood-table" class=""><span><b>Bollywood Casino</b></span></a></li> -->
										<?php
										 }
										 ?>
                                        <?php if (IPL_EVENT_ID != ''){ ?>
                                        	<li class="nav-item newlacunch-menu"><a href="/event_full_market?eventType=<?php echo IPL_EVENT_TYPE_ID;?>&eventId=<?php echo IPL_EVENT_ID;?>&marketId=<?php echo IPL_MARKET_ID;?>" class="router-link-exact-active router-link-active"><b><?php echo IPL_MARKET_NAME;?></b></a></li>
                                        <?php } ?>
                                        <?php if (ELECTION_EVENT_ID != ''){ ?>
                                        	<li class="nav-item newlacunch-menu"><a href="/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="router-link-exact-active router-link-active"><b><?php echo ELECTION_MARKET_NAME;?></b></a></li>
                                        <?php }  ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div>
                    <!---->
                </div>
                <div class="modal-market">
                    <!---->
                </div>
            </header> 
            <?
            $curPageName = pathinfo($_SERVER["SCRIPT_NAME"], PATHINFO_FILENAME);
            ?>
            <script>
            var curPageName = '<?php echo $curPageName; ?>';  
            </script>
            <style>
                /* .casino-name {
                    color: red !important;
                } */

                .custom-position-modal {
                    position: fixed;
                    top: 0;
                    left: 0;
                    z-index: 1055;
                    display: none;
                    width: 100%;
                    height: 100%;
                    overflow-x: hidden;
                    overflow-y: auto;
                    outline: 0;
                }

                .custom-position-modal .modal-dialog {
                    position: relative;
                    width: auto;
                    margin: .5rem;
                    pointer-events: none;
                }

                .custom-position-modal .modal-dialog {
                    max-width: 500px;
                    margin: 1.75rem auto;
                }

                .custom-position-modal .modal-dialog {
                    margin: 1vh auto;
                }

                .custom-position-modal .modal.fade .modal-dialog {
                    transition: transform .3s ease-out;
                    transform: translate(0, -50px);
                }

                .custom-position-modal .modal.show .modal-dialog {
                    transform: none;
                }

                .custom-position-modal .modal-content {
                    position: relative;
                    display: flex
                ;
                    flex-direction: column;
                    width: 100%;
                    pointer-events: auto;
                    background-color: #fff;
                    background-clip: padding-box;
                    border: 1px solid rgba(0, 0, 0, .2);
                    border-radius: .3rem;
                    outline: 0;
                }

                .custom-position-modal .modal-content {
                    background-color: #ffffff;
                    color: #000000;
                    border: 0;
                    border-radius: 0;
                }

                .custom-position-modal .modal-header {
                    display: flex;
                    flex-shrink: 0;
                    align-items: center;
                    justify-content: space-between;
                    padding: 1rem 1rem;
                    border-bottom: 1px solid #dee2e6;
                    border-top-left-radius: calc(.3rem - 1px);
                    border-top-right-radius: calc(.3rem - 1px);
                }

                .custom-position-modal .modal-header {
                    padding: 10px;
                    background: var(--theme1-bg);
                    color: #ffffff;
                    border-radius: 0;
                    border: 0;
                }

                .custom-position-modal .modal-title {
                    margin-bottom: 0;
                    line-height: 1.5;
                }

                .custom-position-modal h4, .h4 {
                    font-size: 20px;
                    font-weight: 400;
                    margin-bottom: 0;
                }

                .custom-position-modal .modal-title {
                    font-weight: bold;
                }

                .custom-position-modal .btn-close {
                    box-sizing: content-box;
                    width: 1em;
                    height: 1em;
                    padding: .25em .25em;
                    color: #000;
                    background: transparent url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e) center / 1em auto no-repeat;
                    border: 0;
                    border-radius: .25rem;
                    opacity: .5;
                }

                .custom-position-modal [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
                    cursor: pointer;
                }

                .custom-position-modal .modal-header .btn-close {
                    padding: .5rem .5rem;
                    margin: -.5rem -.5rem -.5rem auto;
                }

                .custom-position-modal .modal-header .btn-close {
                    filter: invert(1);
                    -webkit-filter: invert(1);
                    opacity: 1;
                    box-shadow: none;
                }

                .custom-position-modal .modal-body {
                    position: relative;
                    flex: 1 1 auto;
                    padding: 1rem;
                }

                .custom-position-modal .modal-body {
                    max-height: calc(98vh - 50px);
                    /* height: 100vh; */
                    padding: 10px;
                    overflow-x: hidden;
                    overflow-y: auto;
                }

                .custom-position-modal .tab-content>.active {
                    display: block;
                }

                .custom-position-modal .nav {
                    display: flex
                ;
                    flex-wrap: wrap;
                    padding-left: 0;
                    margin-bottom: 0;
                    list-style: none;
                }

                .custom-position-modal .nav-link1 {
                    display: block;
                    padding: .5rem 1rem;
                    color: #0d6efd;
                    text-decoration: none;
                    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
                }

                .custom-position-modal .nav-pills .nav-link1 {
                    background: 0 0;
                    border: 0;
                    border-radius: .25rem;
                }

                .custom-position-modal .nav-pills .nav-link1 {
                    background-color: #cccccc;
                    color: #000000;
                    border-radius: 0;
                    -webkit-border-radius: 0;
                    -moz-border-radius: 0;
                    -ms-border-radius: 0;
                    -o-border-radius: 0;
                    border-right: 1px solid #2c3e50;
                    /* font-weight: 500; */
                    font-size: 16px;
                    text-align: center;
                    line-height: 1;
                    cursor: pointer;
                    white-space: nowrap;
                }

                .custom-position-modal .nav-pills .nav-link1.active, .custom-position-modal .nav-pills .show>.nav-link1 {
                    color: #fff;
                    background-color: #0d6efd;
                }

                .custom-position-modal .nav-pills .nav-link1.active, .custom-position-modal .nav-pills .show > .nav-link1 {
                    background-color: var(--theme1-bg);
                    color: #ffffff;
                }

                .nav-pills .nav-item:last-child .nav-link1 {
                    border-right: 0;
                }

                .custom-position-modal .tab-content .btn {
                    display: inline-block;
                    font-weight: 400;
                    line-height: 1.5;
                    color: #212529;
                    text-align: center;
                    text-decoration: none;
                    vertical-align: middle;
                    cursor: pointer;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    user-select: none;
                    background-color: transparent;
                    border: 1px solid transparent;
                    padding: .375rem .75rem;
                    font-size: 1rem;
                    border-radius: .25rem;
                    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                }

                .custom-position-modal .tab-content .btn-primary {
                    color: #fff;
                    background-color: var(--theme1-bg);
                    border-color: var(--theme1-bg);
                }

                .custom-position-modal .tab-content .btn {
                    transition: 0.5s;
                    -webkit-transition: 0.5s;
                    -moz-transition: 0.5s;
                    -ms-transition: 0.5s;
                    -o-transition: 0.5s;
                    border-radius: 0;
                }

                .custom-position-modal .tab-content .btn-primary {
                    background-color: var(--theme1-bg);
                    color: #ffffff;
                    border-color: var(--theme1-bg);
                }

                
                

            </style>