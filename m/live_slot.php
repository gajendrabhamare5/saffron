<?php
	include("../include/conn.php");
	include("../include/flip_function.php");
	include("../session.php");
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
	
	/* if($fetch_access['video_access'] == 1){
		echo "<script>window.location.href='home'</script>";
	} */
?>
<!DOCTYPE html>
<html lang="en">

<?php
	include("head_css.php");
?>

<body cz-shortcut-listen="true">
    <div id="app">
        <?php
	include ("loader.php");
?>
        <div>
            <?php
				include("header.php");
			?>
            <div class="main-content">
                <div class="loader"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                <ul class="nav nav-tabs game-nav-bar">
					<li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Lottery </a></li>
                    <li class="nav-item"><a href="home" class="nav-link newclass"> Sports </a></li>
                    <!-- <li class="nav-item"><a href="sports" class="nav-link"> Sports </a></li> -->
                    <li class="nav-item"><a href="slot" class="nav-link router-link-exact-active router-link-active active newclass"> Our Casino </a></li>
					<li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass" > Live Casino </a></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Slots </a></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Fantasy </a></li>
                    <!-- <?php if(ELECTION_EVENT_ID != ''){ ?>
                    	<li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="nav-link"> <?php echo ELECTION_MARKET_NAME;?> </a></li>
                    <?php } ?> -->
                   <!--  <li class="nav-item"><a href="others" class="nav-link"> Others </a></li> -->
                </ul>
				
					<ul class="nav nav-tabs slot-nav-bar">
					<li class="nav-item">
							<a data-toggle="tab"  data-id="casino" class="tabshow nav-link active">Our Casino</a>
						</li>
						<li class="nav-item"><a data-toggle="tab" data-id="tembo_casino" class="tabshow nav-link"><span class="new-launch-text">Tembo Casino</span></a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="live_casino" class="tabshow nav-link"><span>Live Casino</span></a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-0" class="tabshow nav-link">NEWLY RELEASED GAMES</a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-1" class="tabshow nav-link">HOT GAMES</a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-2" class="tabshow nav-link">SLOTS</a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-3" class="tabshow nav-link">TABLE GAMES</a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-4" class="tabshow nav-link">SHOOTING GAMES</a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-5" class="tabshow nav-link">Instant WIN</a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-6" class="tabshow nav-link">SCRATCH CARD</a></li>
					<li class="nav-item"><a data-toggle="tab" data-id="slot-7" class="tabshow nav-link">PUSH GAMING</a></li>
						<!-- <li class="nav-item">
							<a data-toggle="tab" href="#live_casino" class="nav-link"><span class="new-launch-text">Live Casino</span></a>
						</li> -->
					</ul>
				<style>
				.live_csino_div .casino-name {
						background-image: linear-gradient(var(--theme1-bg), var(--theme2-bg));
						color: var(--primary-color);
						padding: 5px;
						position: absolute;
						width: 100%;
						bottom: -15px;
						text-align: center;
						text-transform: uppercase;
						font-weight: bold;
						font-size: 14px;
					}

					.live_csino_div .casino-icon .casino-name {
						bottom: 0;
					}
				:root{--red-color: #ff0000;--yellow-color: #ffff00;--green-color: #00ff00;--white-color: #fff;}
				
				
				.blinking span{animation:blinkingText .8s infinite}.blinking:hover span{animation:blinkingHoverText .8s infinite}@keyframes blinkingText{0%{color:var(--red-color)}20%{color:var(--red-color)}40%{color:var(--yellow-color)}60%{color:var(--yellow-color)}80%{color:var(--white-color)}100%{color:var(--white-color)}}@keyframes blinkingHoverText{0%{color:var(--red-color)}20%{color:var(--red-color)}40%{color:var(--yellow-color)}60%{color:var(--yellow-color)}80%{color:var(--white-color)}100%{color:var(--white-color)}}@keyframes blinkingHoverWhite{0%{color:var(--red-color)}20%{color:var(--red-color)}40%{color:var(--yellow-color)}60%{color:var(--yellow-color)}80%{color:var(--white-color)}100%{color:var(--white-color)}}
				
				
				
				
				</style>
                <div id="show_casino" style="display:block;" >
                	<?php if($fetch_access['video_access'] == 1){?>
						<div class="tab-content">
							<div id="casino" class="tab-pane active casino-tables">
								<div class="container-fluid">
									<div class="row row5">
										<div class="col-12">
											<h4 class="text-uppercase mt-3">Our Casino</h4></div>
									</div>
								
								
									<div class="row row5 mt-2">
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_ballbyball" class=""><img src="../storage/front/img/casinoicons/ballbyball.jpg" class="img-fluid">
													<div class="casino-name">Ball By Ball</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_superover" class=""><img src="../storage/mobile/img/casinoicons/superover.jpg" class="img-fluid">
													<div class="casino-name">Super Over</div>
													<div class="new-launch-casino">New Launch</div>
												</a>
											</div>
										</div>
									
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_race20" class=""><img src="../storage/mobile/img/casinoicons/race20.png" class="img-fluid">
													<div class="casino-name">Race 20-20</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_queen" class=""><img src="../storage/mobile/img/casinoicons/queen.jpeg" class="img-fluid">
													<div class="casino-name">Casino Queen</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_5_cricket" class=""><img src="../storage/mobile/img/casinoicons/cricketv3.jpeg" class="img-fluid">
													<div class="casino-name">5Five Cricket</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_ab202" class=""><img src="../storage/mobile/img/casinoicons/andar-bahar2.jpg" class="img-fluid">
													<div class="casino-name">Andar Bahar 2</div>
													
												</a>
											</div>
										</div>
									
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_dt202" class=""><img src="../storage/mobile/img/casinoicons/dt202.jpg" class="img-fluid">
													<div class="casino-name">20-20 DT 2</div>
													
												</a>
											</div>
										</div>
									
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_baccarat2" class=""><img src="../storage/mobile/img/casinoicons/baccarat2.jpg" class="img-fluid">
													<div class="casino-name">Baccarat 2</div>
													
												</a>
											</div>
										</div><div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_baccarat" class=""><img src="../storage/mobile/img/casinoicons/baccarat.png" class="img-fluid">
													<div class="casino-name">Baccarat</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_lucky7eu" class=""><img src="../storage/mobile/img/casinoicons/lucky7Bhome.jpg" class="img-fluid">
													<div class="casino-name">Lucky 7 - B</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="javascript:void(0);" class=""><img src="../storage/mobile/img/casinoicons/teencasino.jpg" class="img-fluid">
													<div class="casino-name">Teenpatti 2.0</div>
												</a>
											</div>
										</div>
										
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_cc20" class=""><img src="../storage/mobile/img/casinoicons/cc-20.jpg" class="img-fluid">
													<div class="casino-name">20-20 Cricket Match</div>
													
												</a>
											</div>
										</div>


										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_cmeter" class=""><img src="../storage/mobile/img/casinoicons/cmeter.jpg" class="img-fluid">
													<div class="casino-name">Casino Meter</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_casino_war" class=""><img src="../storage/mobile/img/casinoicons/war.jpg" class="img-fluid">
													<div class="casino-name">Casino War</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_dtl20" class=""><img src="../storage/mobile/img/casinoicons/dtl.jpg" class="img-fluid">
													<div class="casino-name">20-20 DTL</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_odi_teenpatti" class=""><img src="../storage/mobile/img/casinoicons/teenpatti.jpg" class="img-fluid">
													<div class="casino-name">1 Day Teenpatti</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_test_teenpatti" class=""><img src="../storage/mobile/img/casinoicons/teenpatti.jpg" class="img-fluid">
													<div class="casino-name">Test Teenpatti</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_20_teenpatti" class=""><img src="../storage/mobile/img/casinoicons/teenpatti.jpg" class="img-fluid">
													<div class="casino-name">20-20 Teenpatti</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_open_teenpatti" class=""><img src="../storage/mobile/img/casinoicons/teenpatti.jpg" class="img-fluid">
													<div class="casino-name">Open Teenpatti</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_1day_poker" class=""><img src="../storage/mobile/img/casinoicons/poker.jpg" class="img-fluid">
													<div class="casino-name">1 Day Poker</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_6player_poker" class=""><img src="../storage/mobile/img/casinoicons/poker.jpg" class="img-fluid">
													<div class="casino-name">6 Player Poker</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_20poker" class=""><img src="../storage/mobile/img/casinoicons/poker.jpg" class="img-fluid">
													<div class="casino-name">20-20 Poker</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_32_cards-a" class=""><img src="../storage/mobile/img/casinoicons/32cardsA.jpg" class="img-fluid">
													<div class="casino-name">32 Cards A</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_odi_dragon_tiger" class=""><img src="../storage/mobile/img/casinoicons/dt.jpg" class="img-fluid">
													<div class="casino-name">1 Day Dragon Tiger</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_20_dragon_tiger" class=""><img src="../storage/mobile/img/casinoicons/dt.jpg" class="img-fluid">
													<div class="casino-name">20-20 Dragon Tiger</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_32_cards-b" class=""><img src="../storage/mobile/img/casinoicons/32cardsB.jpg" class="img-fluid">
													<div class="casino-name">32 Cards B</div>
												</a>
											</div>
										</div>
										
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_aaa" class=""><img src="../storage/mobile/img/casinoicons/aaa.jpg" class="img-fluid">
													<div class="casino-name">Amar Akbar Anthony</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_ddb" class=""><img src="../storage/mobile/img/casinoicons/bollywood-casino.jpg" class="img-fluid">
													<div class="casino-name">Bollywood Casino</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_lucky7" class=""><img src="../storage/mobile/img/casinoicons/lucky7.jpg" class="img-fluid">
													<div class="casino-name">Lucky 7 - A</div>
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_worli_matka" class=""><img src="../storage/mobile/img/casinoicons/worli.jpg" class="img-fluid">
													<div class="casino-name">Worli Matka</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_instant_worli" class=""><img src="../storage/mobile/img/casinoicons/worli.jpg" class="img-fluid">
													<div class="casino-name">Instant Worli</div>
													
												</a>
											</div>
										</div>
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_3cardj" class=""><img src="../storage/mobile/img/casinoicons/3cardsJ.jpg" class="img-fluid">
													<div class="casino-name">3 Cards Judgement</div>
													
												</a>
											</div>
										</div>										
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="live_ab20" class=""><img src="../storage/mobile/img/casinoicons/andar-bahar.jpg" class="img-fluid">
													<div class="casino-name">Andar Bahar</div>
												</a>
											</div>
										</div>										
										<div class="col-3 text-center">
											<div class="casinoicons">
												<a href="javascript:void(0);" class=""><img src="../storage/mobile/img/casinoicons/lottery.jpg" class="img-fluid">
													<div class="casino-name">Lottery</div>
												</a>
											</div>
										</div>
										
										
										
										
										
										
									</div>
								
								
								</div>
							</div>
							<div id="tembo_casino" class="tab-pane container">
								<div class="container-fluid">
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"   data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/tembo1.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"   data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/tembo2.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"   data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/lucky72.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/baccarat2.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/baccaratb2.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/dragontiger2.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/teenpattioneday.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/dragontiger.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/baccarat.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/teenpatti2020.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/lucky7.jpg" class="img-fluid"></a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/tembo_casino/baccaratb.jpg" class="img-fluid"></a></div>
									</div> <!---->
								</div>
							</div>
							<div id="live_casino" class="tab-pane container">
								<div class="container-fluid live_csino_div">
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon" style="position: relative;"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/livecasino/livecasino1.jpg" class="img-fluid">
												<div class="casino-name">SuperSpade Casino</div>
											</a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon" style="position: relative;"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/livecasino/livecasino2.png" class="img-fluid">
												<div class="casino-name">Ezugi Casino</div>
											</a></div>
									</div>
									<div class="row">
										<div class="ml-2 mr-2 mt-2 casino-icon" style="position: relative;"  data-target='#games_modal' data-toggle='modal'><a href="javascript:void(0);"><img src="../storage/casinotab/livecasino/livecasino3.png" class="img-fluid">
												<div class="casino-name">Evolution Casino</div>
											</a></div>
									</div> <!---->
								</div>
							</div>
							<div id="slot-0" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
									<?php
										for ($i = 1; $i <= 66; $i++) {
										?>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot/<? echo $i;?>.png" src="../storage/casinotab/slot/<? echo $i;?>.png" lazy="loaded"></div>
										<?
										}
										?>
										<!--<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/2.png" src="../storage/casinotab/slot/2.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/3.png" src="../storage/casinotab/slot/3.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/4.png" src="../storage/casinotab/slot/4.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/5.png" src="../storage/casinotab/slot/5.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/6.png" src="../storage/casinotab/slot/6.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/7.png" src="../storage/casinotab/slot/7.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/8.png" src="../storage/casinotab/slot/8.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/9.png" src="../storage/casinotab/slot/9.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/10.png" src="../storage/casinotab/slot/10.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/11.png" src="../storage/casinotab/slot/11.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/12.png" src="../storage/casinotab/slot/12.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/13.png" src="../storage/casinotab/slot/13.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/14.png" src="../storage/casinotab/slot/14.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/15.png" src="../storage/casinotab/slot/15.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/16.png" src="../storage/casinotab/slot/16.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/17.png" src="../storage/casinotab/slot/17.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/18.png" src="../storage/casinotab/slot/18.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/19.png" src="../storage/casinotab/slot/19.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/20.png" src="../storage/casinotab/slot/20.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/21.png" src="../storage/casinotab/slot/21.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/22.png" src="../storage/casinotab/slot/22.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/23.png" src="../storage/casinotab/slot/23.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/24.png" src="../storage/casinotab/slot/24.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/25.png" src="../storage/casinotab/slot/25.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/26.png" src="../storage/casinotab/slot/26.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/27.png" src="../storage/casinotab/slot/27.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/28.png" src="../storage/casinotab/slot/28.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/29.png" src="../storage/casinotab/slot/29.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/30.png" src="../storage/casinotab/slot/30.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/31.png" src="../storage/casinotab/slot/31.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/32.png" src="../storage/casinotab/slot/32.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/33.png" src="../storage/casinotab/slot/33.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/34.png" src="../storage/casinotab/slot/34.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/35.png" src="../storage/casinotab/slot/35.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/36.png" src="../storage/casinotab/slot/36.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/37.png" src="../storage/casinotab/slot/37.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/38.png" src="../storage/casinotab/slot/38.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/39.png" src="../storage/casinotab/slot/39.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/40.png" src="../storage/casinotab/slot/40.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/41.png" src="../storage/casinotab/slot/41.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/42.png" src="../storage/casinotab/slot/42.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/43.png" src="../storage/casinotab/slot/43.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/44.png" src="../storage/casinotab/slot/44.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/45.png" src="../storage/casinotab/slot/45.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/46.png" src="../storage/casinotab/slot/46.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/47.png" src="../storage/casinotab/slot/47.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/48.png" src="../storage/casinotab/slot/48.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/49.png" src="../storage/casinotab/slot/49.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/50.png" src="../storage/casinotab/slot/50.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/51.png" src="../storage/casinotab/slot/51.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/52.png" src="../storage/casinotab/slot/52.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/53.png" src="../storage/casinotab/slot/53.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/54.png" src="../storage/casinotab/slot/54.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/55.png" src="../storage/casinotab/slot/55.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/56.png" src="../storage/casinotab/slot/56.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/57.png" src="../storage/casinotab/slot/57.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/58.png" src="../storage/casinotab/slot/58.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/59.png" src="../storage/casinotab/slot/59.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/60.png" src="../storage/casinotab/slot/60.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/61.png" src="../storage/casinotab/slot/61.png" lazy="loading"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/62.png" src="../storage/casinotab/slot/62.png" lazy="loading"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/63.png" src="../storage/casinotab/slot/63.png" lazy="loading"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/64.png" src="../storage/casinotab/slot/64.png" lazy="loading"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/65.png" src="../storage/casinotab/slot/65.png" lazy="loading"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot/66.png" src="../storage/casinotab/slot/66.png" lazy="loading"></div>-->
									</div>
								</div>
							</div>
							<div id="slot-1" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
									<?php
										for ($i = 1; $i <= 49; $i++) {
										?>
										<div class="col-3">
										<img class="img-fluid mt-1"   data-target='#games_modal' data-toggle='modal' data-src="../storage/casinotab/slot1/<? echo $i;?>.png" src="../storage/casinotab/slot1/<? echo $i;?>.png" lazy="loaded"></div>
										<?
										}
										?>
										<!-- <div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/2.png" src="../storage/casinotab/slot1/2.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/3.png" src="../storage/casinotab/slot1/3.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/4.png" src="../storage/casinotab/slot1/4.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/5.png" src="../storage/casinotab/slot1/5.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/6.png" src="../storage/casinotab/slot1/6.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/7.png" src="../storage/casinotab/slot1/7.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/8.png" src="../storage/casinotab/slot1/8.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/9.png" src="../storage/casinotab/slot1/9.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/10.png" src="../storage/casinotab/slot1/10.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/11.png" src="../storage/casinotab/slot1/11.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/12.png" src="../storage/casinotab/slot1/12.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/13.png" src="../storage/casinotab/slot1/13.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/14.png" src="../storage/casinotab/slot1/14.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/15.png" src="../storage/casinotab/slot1/15.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/16.png" src="../storage/casinotab/slot1/16.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/17.png" src="../storage/casinotab/slot1/17.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/18.png" src="../storage/casinotab/slot1/18.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/19.png" src="../storage/casinotab/slot1/19.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/20.png" src="../storage/casinotab/slot1/20.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/21.png" src="../storage/casinotab/slot1/21.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/22.png" src="../storage/casinotab/slot1/22.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/23.png" src="../storage/casinotab/slot1/23.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/24.png" src="../storage/casinotab/slot1/24.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/25.png" src="../storage/casinotab/slot1/25.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/26.png" src="../storage/casinotab/slot1/26.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/27.png" src="../storage/casinotab/slot1/27.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/28.png" src="../storage/casinotab/slot1/28.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/29.png" src="../storage/casinotab/slot1/29.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/30.png" src="../storage/casinotab/slot1/30.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/31.png" src="../storage/casinotab/slot1/31.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/32.png" src="../storage/casinotab/slot1/32.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/33.png" src="../storage/casinotab/slot1/33.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/34.png" src="../storage/casinotab/slot1/34.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/35.png" src="../storage/casinotab/slot1/35.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/36.png" src="../storage/casinotab/slot1/36.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/37.png" src="../storage/casinotab/slot1/37.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/38.png" src="../storage/casinotab/slot1/38.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/39.png" src="../storage/casinotab/slot1/39.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/40.png" src="../storage/casinotab/slot1/40.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/41.png" src="../storage/casinotab/slot1/41.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/42.png" src="../storage/casinotab/slot1/42.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/43.png" src="../storage/casinotab/slot1/43.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/44.png" src="../storage/casinotab/slot1/44.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/45.png" src="../storage/casinotab/slot1/45.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/46.png" src="../storage/casinotab/slot1/46.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/47.png" src="../storage/casinotab/slot1/47.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/48.png" src="../storage/casinotab/slot1/48.png" lazy="loaded"></div>
										<div class="col-3"><img class="img-fluid mt-1" data-src="../storage/casinotab/slot1/49.png" src="../storage/casinotab/slot1/49.png" lazy="loaded"></div> -->
									</div>
								</div>
							</div>
							<div id="slot-2" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
										<?php
										for ($i = 1; $i <= 393; $i++) {
										?>
											<div class="col-3"><img class="img-fluid mt-1"   data-target='#games_modal' data-toggle='modal' data-src="../storage/casinotab/slot1/1.png" src="../storage/casinotab/slot2/<? echo $i; ?>.png" lazy="loaded"></div>
										<?php
										}
										?>
									</div>
								</div>
							</div>
							<div id="slot-3" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
										<?php
										for ($j = 1; $j <= 29; $j++) {
										?>
											<div class="col-3"><img   data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot3/<? echo $j; ?>.png" src="../storage/casinotab/slot3/<? echo $j; ?>.png" lazy="loaded"></div>
										<?php
										}
										?>
									</div>
								</div>
							</div>
							<div id="slot-4" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot4/1.png" src="../storage/casinotab/slot4/1.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot4/2.png" src="../storage/casinotab/slot4/2.png" lazy="loaded"></div>
									</div>
								</div>
							</div>
							<div id="slot-5" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot5/1.png" src="../storage/casinotab/slot5/1.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot5/2.png" src="../storage/casinotab/slot5/2.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot5/3.png" src="../storage/casinotab/slot5/3.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot5/4.png" src="../storage/casinotab/slot5/4.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot5/5.png" src="../storage/casinotab/slot5/5.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot5/6.png" src="../storage/casinotab/slot5/6.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot5/7.png" src="../storage/casinotab/slot5/7.png" lazy="loaded"></div>
									</div>
								</div>
							</div>
							<div id="slot-6" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/1.png" src="../storage/casinotab/slot6/1.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/2.png" src="../storage/casinotab/slot6/2.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/3.png" src="../storage/casinotab/slot6/3.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/4.png" src="../storage/casinotab/slot6/4.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/5.png" src="../storage/casinotab/slot6/5.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/6.png" src="../storage/casinotab/slot6/6.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/7.png" src="../storage/casinotab/slot6/7.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/8.png" src="../storage/casinotab/slot6/8.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/9.png" src="../storage/casinotab/slot6/9.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/10.png" src="../storage/casinotab/slot6/10.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot6/11.png" src="../storage/casinotab/slot6/11.png" lazy="loaded"></div>
									</div>
								</div>
							</div>
							<div id="slot-7" class="tab-pane container">
								<div class="container-fluid mt-3">
									<div class="row">
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot7/1.png" src="../storage/casinotab/slot7/1.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot7/2.png" src="../storage/casinotab/slot7/2.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot7/3.png" src="../storage/casinotab/slot7/3.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot7/4.png" src="../storage/casinotab/slot7/4.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot7/5.png" src="../storage/casinotab/slot7/5.png" lazy="loaded"></div>
										<div class="col-3"><img  data-target='#games_modal' data-toggle='modal' class="img-fluid mt-1" data-src="../storage/casinotab/slot7/6.png" src="../storage/casinotab/slot7/6.png" lazy="loaded"></div>
									</div>
								</div>
							</div>
						</div>
                    <?php } ?>           
                </div>
            </div>
        </div>
    </div><script type="text/javascript" src="../js/socket.io.js"></script><script type="text/javascript" src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
function url_redirect(link){
	location.href='<?php echo str_replace("index","",MOBILE_URL); ?>'+link;
}
</script>
</body>

<?php
	include "footer.php";
?>
<style>
	.nav-tabs .nav-link.active,
	.nav-tabs .nav-link {
		color: var(--primary-color) !important;
	}
</style>

</html>

<div id="games_modal" class="modal" role="dialog" >
   <div class="modal-dialog" style="max-width: 100% !important;">
        <div class="modal-dialog modal-lg">
            <div role="document" id="__BVID__51___BV_modal_content_" tabindex="-1" class="modal-content">
                <header id="__BVID__51___BV_modal_header_" class="modal-header">
                    <!-- <h5 class="modal-title" id="Rules">Bookmaker Rules</h5> -->
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div id="__BVID__51___BV_modal_body_" class="modal-body">
                    
					
					<div class="">
						<span class="text-danger">Coming Soon</span>
					</div>
					
                </div>
                <!---->
            </div></div>
    </div>
    
</div>


<script type="text/javascript">
$(document).on('click', '.tabshow', function() {
		var showtab = $(this).data('id');
		$('.tabshow').removeClass('active');
		$('.tab-pane').removeClass('active');
		$(this).addClass('active');
		$("#" + showtab).addClass('active');

	});

 function tab_view(tab_name){
	 
	 $("#game1").hide();
	 $("#game2").hide();
	 $("#game4").hide();
	 $("#"+tab_name).show();
 }
 
 function formatAMPM(date) {
	  var hours = date.getHours();
	  var minutes = date.getMinutes();
	  var ampm = hours >= 12 ? 'PM' : 'AM';
	  hours = hours % 12;
	  hours = hours ? hours : 12; // the hour '0' should be '12'
	  minutes = minutes < 10 ? '0'+minutes : minutes;
	  var strTime = hours + ':' + minutes + '' + ampm;
	  return strTime;
	}
	
var month_name = function(dt){
mlist = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
  return mlist[dt.getMonth()];
};


var cricket_html= "";
var football_html= "";
var tennis_html = "";
var b11="-";
var b21="-";
var b31="-";

var l11="-";
var l21="-";
var l31="-";

var site_url = '<?php echo WEB_URL; ?>';
var socket = io("<?php echo GAME_IP; ?>");

 socket.on('connect', function() {
		socket.emit('getMatches',{
			eventType : 4
		});
		socket.emit('getMatches',{
			eventType : 1
		});      	
      	socket.emit('getMatches',{
			eventType : 2
		});
	  });
	  
	  socket.on('eventGetLiveEventName',function(data) {
	  		if(data){
	  			if(data.sport){
	  				if(data.sport.body){
					var list_sport = data.sport.body;
					eventNotIncluded = data.eventNotIncluded;
					
					var result = Object.keys(data.sport.body).length;
	  				if(result > 0){
	  					var main_datas = data;
						var main_x = data;
			
						
						smdl_c = ['1','2'];
						mdl_c = ['1','2'];
						dl_c = ['1','2'];
						smdl_s = ['1','2'];
						smdl_b = ['1','2'];
						smdl_r = ['1','2'];
						mdl_s = ['1','2'];
						dl_s = ['1','2'];
						smdl_t = ['1','2'];
						mdl_t = ['1','2'];
						mdl_b = ['1','2'];
						mdl_r = ['1','2'];
						dl_t = ['1','2'];
						dl_b = ['1','2'];
						dl_r = ['1','2'];
						evnt = ['1','2'];
						evnt = eventNotIncluded || [];
						if(main_x.SMDL && main_x.SMDL[<?php echo SITE_ID; ?>] != undefined){
							if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>] != undefined){
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['cricket']){
									smdl_c = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['cricket'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['soccer']){
									smdl_s = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['soccer'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['tennis']){
									smdl_t = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['tennis'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['basketball']){
									smdl_b = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['basketball'];
								}
								if(main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['rugby']){
									smdl_r = main_x.SMDL[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['rugby'];
								}
							}
						}
						if(main_x.MDL && main_x.MDL[<?php echo SITE_ID; ?>] != undefined){
							if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>] != undefined){
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['cricket']){
									mdl_c = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['cricket'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['soccer']){
									mdl_s = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['soccer'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['tennis']){
									mdl_t = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['tennis'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['basketball']){
									mdl_b = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['basketball'];
								}
								if(main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['rugby']){
									mdl_r = main_x.MDL[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['rugby'];
								}
							}
						}
						
						if(main_x.DL && main_x.DL[<?php echo SITE_ID; ?>] != undefined){
							
							if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>] != undefined){
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['cricket']){
									dl_c = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['cricket'];		
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['soccer']){
									dl_s = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['soccer'];
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['tennis']){
									dl_t = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['tennis'];
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['basketball']){
									dl_b = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['basketball'];
								}
								if(main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['rugby']){
									dl_r = main_x.DL[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['rugby'];
								}
							}
						}
			
						data = main_datas.sport;
						
						key = Object.keys(data.body)[0];
						eventType = parseInt(data.body[key].SportId);
						for(var i in data.body){
				
							
						if(data.body[i]){
							event_id = data.body[i].matchid.toString();
							marketId = data.body[i].marketid;
							n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
							n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString()) ;
							n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());
	
							s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
							s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
							s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());
	
							t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
							t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
							t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());
							
							b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
							b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
							b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());
							
							r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
							r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
							r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
							e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
							if(!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !r1 && !r2 && !r3 && !e1){
								
							if(eventType == 4){
								event_name = data.body[i].matchName;
								
								marketTime = data.body[i].matchdate;
								marketDateTime = data.body[i].matchdate;
							
								if(event_name.indexOf("/") != -1){
									event_name_arr = event_name.split("/");
									event_name = event_name_arr[0];
								}
								
								var temp_event_name = (event_name).split(' v ');
								var home_team = (temp_event_name[0]).trim();
								
								if(event_id == '30306599')
									continue;
								
								if(['Karnataka','Jammu And Kashmir','Baroda','Uttarakhand','Chhattisgarh','Himachal Pradesh','Gujarat','Maharashtra','Jharkhand','Tamil Nadu','Odisha','Bengal','Railways','Tripura','Punjab','Uttar Pradesh','','Hyderabad','Chandigarh','Nagaland','Bihar','Arunachal Pradesh','Mumbai','Delhi','Haryana','Andhra','Mizoram','Sikkim','Vidarbha','Rajasthan','Services','Saurashtra','Meghalaya','Manipur','Kerala','Puducherry','Madhya Pradesh','Goa'].includes(home_team)){
									continue;
								}

									inPlay = data.body[i].inPlay || "0";
									marketId = data.body[i].marketid;
									marketinPlay = data.body[i].inPlay || "0";
									isFancy = data.body[i].fancy || "0";
									is_tv = data.body[i].tv || "0";
									fancySpan = "";
									if(marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1){
										market_status = "active-icon";										
									}else{
										market_status = "";
							
									}
									
									if(isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1){
										fancy_status = "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";										
									}else{
										fancy_status = "";
							
									}
									
									if(is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1){
										tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";										
									}else{
										tv_status = "";
							
									}
					
								
								b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
								b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b2 : "-";
								
								
								l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
								l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
								l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";
								
							
								
								cricket_html +="<span onclick=\"url_redirect('event_full_market?eventType="+eventType+"&eventId="+event_id+"&marketId="+marketId+"');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong >"+event_name+"</strong></p><p class='mb-0'>"+marketTime+"</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='"+market_status+"' style='vertical-align: bottom;'></span></span> "+tv_status+" "+fancy_status+" <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b11+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l11+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b31+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l31+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b21+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l21+"</a></div></div></div></div> </span>";
								
								
							
							}
							
							if(eventType == 1){
								event_name = data.body[i].matchName;
								
								marketTime = data.body[i].matchdate;
								matchdate_ = (marketTime).toString();
										
								if(matchdate_.search("(IST)") == -1){
									var _date = new Date(marketTime);
									var _matchtime = formatAMPM(_date);
									marketTime = month_name(_date) + ' ' + _date.getDate() + ' ' + _date.getFullYear() + ' '+ _matchtime;
								}
							

									inPlay = data.body[i].inPlay || "0";
									marketId = data.body[i].marketid;
									marketinPlay = data.body[i].inPlay || "0";
									isFancy = data.body[i].fancy || "0";
									is_tv = data.body[i].tv || "0";
									fancySpan = "";
									if(marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1){
										market_status = "active-icon";										
									}else{
										market_status = "";
							
									}
									
									if(isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1){
										fancy_status = "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";										
									}else{
										fancy_status = "";
							
									}
									
									if(is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1){
										tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";										
									}else{
										tv_status = "";
							
									}
					
								
								b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
								b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b2 : "-";
								
								
								l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
								l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
								l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";
								
								if (b11 == undefined || b11 == "undefined") {
									b11 = 0;
								}
								if (b21 == undefined || b21 == "undefined") {
									b21 = 0;
								}
								if (b31 == undefined || b31 == "undefined") {
									b31 = 0;
								}


								if (l11 == undefined || l11 == "undefined") {
									l11 = 0;
								}
								if (l21 == undefined || l21 == "undefined") {
									l21 = 0;
								}
								if (l31 == undefined || l31 == "undefined") {
									l31 = 0;
								}
								
								football_html +="<span onclick=\"url_redirect('event_full_market?eventType="+eventType+"&eventId="+event_id+"&marketId="+marketId+"');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong >"+event_name+"</strong></p><p class='mb-0'>"+marketTime+"</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='"+market_status+"' style='vertical-align: bottom;'></span></span> "+tv_status+" "+fancy_status+" <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b11+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l11+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b31+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l31+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b21+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l21+"</a></div></div></div></div> </span>";
								
								
							
							}
							
							if(eventType == 2){
								event_name = data.body[i].matchName;
								
								marketTime = data.body[i].matchdate;
								
								matchdate_ = (marketTime).toString();
										
								if(matchdate_.search("(IST)") == -1){
									var _date = new Date(marketTime);
									var _matchtime = formatAMPM(_date);
									marketTime = month_name(_date) + ' ' + _date.getDate() + ' ' + _date.getFullYear() + ' '+ _matchtime;
								}

								inPlay = data.body[i].inPlay || "0";
								marketId = data.body[i].marketid;
								marketinPlay = data.body[i].inPlay || "0";
								isFancy = data.body[i].fancy || "0";
								is_tv = data.body[i].tv || "0";
								fancySpan = "";
								if(marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1){
									market_status = "active-icon";										
								}else{
									market_status = "";
								}
								
								if(isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1){
									fancy_status = "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";										
								}else{
									fancy_status = "";
								}
								
								if(is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1){
									tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";										
								}else{
									tv_status = "";
								}
								
								b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
								b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
								b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b2 : "-";
								
								l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
								l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
								l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";
								
								
								if (b11 == undefined || b11 == "undefined") {
									b11 = 0;
								}
								if (b21 == undefined || b21 == "undefined") {
									b21 = 0;
								}
								if (b31 == undefined || b31 == "undefined") {
									b31 = 0;
								}


								if (l11 == undefined || l11 == "undefined") {
									l11 = 0;
								}
								if (l21 == undefined || l21 == "undefined") {
									l21 = 0;
								}
								if (l31 == undefined || l31 == "undefined") {
									l31 = 0;
								}
								
								tennis_html +="<span onclick=\"url_redirect('event_full_market?eventType="+eventType+"&eventId="+event_id+"&marketId="+marketId+"');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong >"+event_name+"</strong></p><p class='mb-0'>"+marketTime+"</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='"+market_status+"' style='vertical-align: bottom;'></span></span> "+tv_status+" "+fancy_status+" <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b11+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l11+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b31+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l31+"</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>"+b21+"</a> <a href='javascript:void(0);' class='btn-lay'>"+l21+"</a></div></div></div></div> </span>";				
							}
							
							}
						}
			
				  }
				  
				
							if(eventType == 4){
								$("#cricket_event").html(cricket_html);
								cricket_html = "";
							}
							
							if(eventType == 1){
								$("#football_event").html(football_html);
								football_html = "";
							}
							if(eventType == 2){
								$("#tennis_event").html(tennis_html);
								tennis_html = "";
							}
					}
				}
				}
	  		}		
	  });
	  
	  function show_hide(type){
		  
		  $("#show_casino").hide();
		  if(type == 1){
			$("#show_casino").show();  
		  }
	  }
	  
			
</script>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>