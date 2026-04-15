<?php
include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	
$get_parent_ids = $conn->query("select parentSuperMDL from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

$get_access = $conn->query("select cricket_access,soccer_access,soccer_access,video_access from user_master where Id=$parentSuperMDL");
$fetch_access = mysqli_fetch_assoc($get_access);

if($fetch_access['video_access'] != 1){
	echo "<script>alert('you are does not access this game');window.location.href='/';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css2.php");
?>

<style>

.casino-table {
    background-color: #f7f7f7;
    color: #333;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 5px;
}

.casino-table-box {
    width: 100%;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    padding-right: 4px;
}

.casino-odd-box-container {
    width: 100%;
}

.casino-odd-box-container {
    width: calc(25% - 7.5px);
    margin-right: 10px;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
}

.casino-nation-name {
    font-size: 16px;
    font-weight: bold;
}

.casino-nation-name {
    width: 100%;
    text-align: center;
}

.casino-nation-name img {
    height: 40px;
    margin-bottom: 5px;
}

.back {
    background-color: #72bbef !important;
}

.lay {
    background-color: #faa9ba !important;
}

.casino-odds-box {
    display: flex !important;
    flex-wrap: wrap !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 5px 0 !important;
    font-weight: bold !important;
    border-left: 1px solid #c7c8ca !important;
    cursor: pointer !important;
    min-height: 46px !important;
}

.casino-odds-box {
    width: 49% !important;
}

.casino-odds {
    font-size: 18px !important;
    font-weight: bold;
    line-height: 1;
}

.new-casino .casino-odds-box > div {
    width: unset;
    display: unset;
    justify-content: unset;
    align-items: unset;
    flex-direction: unset;
    height: unset;
}

.casino-volume {
    font-size: 12px;
    font-weight: 100;
    line-height: 1;
    margin-top: 5px;
}

.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
    z-index: 1;
}

.casino-table-left-box, .casino-table-center-box, .casino-table-right-box {
    width: calc(50% - 2px);
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

.casino-table-left-box {
    width: 33%;
    padding: 5px 5px 0 5px;
}

.casino-table-left-box .casino-odd-box-container {
    width: 100%;
    align-items: center;
    margin-bottom: 10px;
}

.casino-table-right-box .casino-odds-box {
    width: 100%;
}

.casino-table-left-box .casino-odd-box-container .casino-nation-name, .casino-table-left-box .casino-odd-box-container .casino-odds-box {
    width: 33.33% !important;
}

.casino-table-left-box .casino-odd-box-container > .casino-nation-book {
    width: 66.66%;
    text-align: center;
    margin-left: auto;
    margin-top: 5px;
}

.casino-odd-box-container:last-child {
    margin-right: 0;
}

.casino-table-right-box {
    width: 66%;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    padding: 5px 5px 0 5px;
}

.casino-table-right-box .casino-odds-box {
    width: 100% !important;
}

.casino-table-right-box .casino-odd-box-container {
    width: calc(33.33% - 10px);
}

.casino-table-right-box .casino-odd-box-container:nth-child(3n) {
    margin-right: 0;
}

.text-danger {
    --bs-text-opacity: 1;
    color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important;
}

.text-danger {
    color: #bd1828 !important;
}

.suspended-box {
    position: relative;
    pointer-events: none;
    cursor: none;
}

.suspended-box::before {
    background-image: url(storage/front/img/lock.svg);
    background-size: 17px 17px;
    filter: invert(1);
    -webkit-filter: invert(1);
    background-repeat: no-repeat;
    content: "";
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-position: center;
    pointer-events: none;
}

.suspended-box::after {
    content: "";
    background-color: #373636d6;
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    cursor: not-allowed;
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
}

.casino-last-result-title {
    padding: 10px;
    background-color: var(--theme2-bg);
    color: #ffffff;
    font-size: 14px;
    display: flex
;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
    /* height: 41px; */
    align-items: center;
}

.casino-last-result-title a {
    color: #ffffff;
}

.casino-last-results {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-end;
    margin-top: 10px;
    width: 100%;
}

.casino-last-results .result {
    background: #355e3b;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    display: flex
;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    margin-left: 5px;
    cursor: pointer;
}

.casino-last-results .result {
    background-color: #d5d5d5;
    border: 1px solid #626262;
}

.casino-last-results .result.result-a {
    color: #ff4500;
}

.casino-last-results .result.result-b {
    color: #ffff33;
}

.casino-last-results .result.result-c {
    color: #33c6ff;
}

.casino-last-results .result img {
    height: 30px;
}

.rules-section img {
    max-width: 300px;
}

</style>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
       <?php
			include("loader.php");
			?>
        <div class="wrapper">
            <?php
			include("header.php");
			?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">
                         <?php
						include("left_sidebar.php");
						?>
                        <!---->
                        
						<div class="col-md-10 featured-box white-bg">
   <div class="row row5">
      <div class="col-md-9 casino-container coupon-card featured-box-detail">
         <div class="coupon-card  new-casino race">
		 	<div class="game-heading"><span class="card-header-title">Race 20
				<!-- <small role="button" class="teenpatti-rules" onclick="view_rules('race20')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small>  -->
				<!----></span> 
				<small role="button" class="teenpatti-rules" onclick="view_rules('race20')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> 
				<span class="float-right">
				Round ID:
				<span class="round_no">0</span></span>
			</div>
            <div class="casino-video">
               <div class="casino-video-title">
                  <!-- <span class="casino-name">Race 20-20</span> 
                  <div class="casino-video-rid">Round ID:
                     <span class="round_no">0</span>
                  </div> -->
                  <div class="total-points">
                     <div>
                        <div>Total Card:</div>
                        <div id="total_card">0</div>
                     </div>
                     <div>
                        <div>Total Point:</div>
                        <div id="total_point">0</div>
                     </div>
                  </div>
               </div>
               <!-- <div title="Rules" onclick="view_rules('race20.jpg')" data-target="#rules_popup" data-toggle="modal" class="casino-video-rules-icon" role="button" tabindex="0"><i class="fas fa-info-circle"></i></div> -->
               <!----> 
               <div class="video-box-container">
                  <div class="video-container">
				  <?php
  							if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".RACE20_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
					<!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL."".RACE20_CODE;?>"  width="100%" height="500" style="border: 0px;"></iframe> -->
					</div>
               </div>
               <div class="clock clock2digit flip-clock-wrapper">
                  <ul class="flip play">
                     <li class="flip-clock-before">
                        <a href="#">
                           <div class="up">
                              <div class="shadow"></div>
                              <div class="inn">1</div>
                           </div>
                           <div class="down">
                              <div class="shadow"></div>
                              <div class="inn">1</div>
                           </div>
                        </a>
                     </li>
                     <li class="flip-clock-active">
                        <a href="#">
                           <div class="up">
                              <div class="shadow"></div>
                              <div class="inn">0</div>
                           </div>
                           <div class="down">
                              <div class="shadow"></div>
                              <div class="inn">0</div>
                           </div>
                        </a>
                     </li>
                  </ul>
                  <ul class="flip play">
                     <li class="flip-clock-before">
                        <a href="#">
                           <div class="up">
                              <div class="shadow"></div>
                              <div class="inn">1</div>
                           </div>
                           <div class="down">
                              <div class="shadow"></div>
                              <div class="inn">1</div>
                           </div>
                        </a>
                     </li>
                     <li class="flip-clock-active">
                        <a href="#">
                           <div class="up">
                              <div class="shadow"></div>
                              <div class="inn">0</div>
                           </div>
                           <div class="down">
                              <div class="shadow"></div>
                              <div class="inn">0</div>
                           </div>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="video-overlay">
                  <div class="mb-1">
					  <span><img src="storage/front/img/cards/spade_race.png"></span> 
					  
					  <span><img src="storage/front/img/cards/1.png" id="card_spade_1" class="cl_cards" style="display:none;"></span>
					  <span><img src="storage/front/img/cards/1.png" id="card_spade_2" class="cl_cards" style="display:none;"></span>
					  <span><img src="storage/front/img/cards/1.png" id="card_spade_3" class="cl_cards" style="display:none;"></span>
					  <span><img src="storage/front/img/cards/1.png" id="card_spade_4" class="cl_cards" style="display:none;"></span> 
					  <span><img src="storage/front/img/cards/1.png" id="card_spade_5" class="cl_cards" style="display:none;"></span>
					  <span><img src="storage/front/img/cards/1.png" id="card_spade_6" class="cl_cards" style="display:none;"></span>
				</div>
                
				<div class="mb-1">
					<span><img src="storage/front/img/cards/heart_race.png"></span> 
					
					<span><img src="storage/front/img/cards/1.png" id="card_heart_1" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_heart_2" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_heart_3" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_heart_4" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_heart_5" class="cl_cards" style="display:none;"></span> 
					<span><img src="storage/front/img/cards/1.png" id="card_heart_6" class="cl_cards" style="display:none;"></span>
					
				</div>
                
				<div class="mb-1">
					<span><img src="storage/front/img/cards/club_race.png"></span> 
					
					<span><img src="storage/front/img/cards/1.png" id="card_club_1" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_club_2" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_club_3" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_club_4" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_club_5" class="cl_cards" style="display:none;"></span> 
					<span><img src="storage/front/img/cards/1.png" id="card_club_6" class="cl_cards" style="display:none;"></span>
				</div>
                
				<div class="mb-1">
					<span><img src="storage/front/img/cards/diamond_race.png"></span> 
					
					<span><img src="storage/front/img/cards/1.png" id="card_diamond_1" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_diamond_2" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_diamond_3" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_diamond_4" class="cl_cards" style="display:none;"></span>
					<span><img src="storage/front/img/cards/1.png" id="card_diamond_5" class="cl_cards" style="display:none;"></span> 
					<span><img src="storage/front/img/cards/1.png" id="card_diamond_6" class="cl_cards" style="display:none;"></span>
					
				</div>
				
               </div>
            </div>
            <div class="casino-detail">
				<div class="casino-table">
					<div class="casino-table-box">
						<div class="casino-odd-box-container">
							<div class="casino-nation-name"><img src="storage/front/img/cards/KHH.png"></div>
							<div class="casino-odds-box back suspended-box market_1_row market_1_b_btn back-1">
							<span class="casino-odds">3.85</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-odds-box lay suspended-box market_1_row market_1_l_btn lay-1">
							<span class="casino-odds">4.15</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-nation-book text-center w-100 market_1_b_exposure market_exposure"></div>
						</div>
						<div class="casino-odd-box-container">
							<div class="casino-nation-name"><img src="storage/front/img/cards/KDD.png"></div>
							<div class="casino-odds-box back suspended-box market_2_row market_2_b_btn back-1">
							<span class="casino-odds">3.85</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-odds-box lay suspended-box market_2_row market_2_l_btn lay-1">
							<span class="casino-odds">4.15</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-nation-book text-center w-100 market_1_b_exposure market_exposure"></div>
						</div>
						<div class="casino-odd-box-container">
							<div class="casino-nation-name"><img src="storage/front/img/cards/KCC.png"></div>
							<div class="casino-odds-box back suspended-box market_3_row market_3_b_btn back-1">
							<span class="casino-odds">3.85</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-odds-box lay suspended-box market_3_row market_3_l_btn lay-1">
							<span class="casino-odds">4.15</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-nation-book text-center w-100 market_3_b_exposure market_exposure"></div>
						</div>
						<div class="casino-odd-box-container">
							<div class="casino-nation-name"><img src="storage/front/img/cards/KSS.png"></div>
							<div class="casino-odds-box back suspended-box market_4_row market_4_b_btn back-1">
							<span class="casino-odds">3.85</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-odds-box lay suspended-box market_4_row market_4_l_btn lay-1">
							<span class="casino-odds">4.15</span>
							<div class="casino-volume">10000</div>
							</div>
							<div class="casino-nation-book text-center w-100 market_4_b_exposure market_exposure"></div>
						</div>
					</div>
					<div class="casino-table-box mt-3">
						<div class="casino-table-left-box">
							<div class="casino-odd-box-container">
							<div class="casino-nation-name"></div>
							<div class="casino-nation-name">No</div>
							<div class="casino-nation-name">Yes</div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Total points</div>
							<div class="casino-odds-box lay suspended-box market_5_row market_5_l_btn lay-1">
								<span class="casino-odds">79</span>
								<div class="casino-volume text-center">100</div>
							</div>
							<div class="casino-odds-box back suspended-box market_5_row market_5_b_btn back-1">
								<span class="casino-odds">83</span>
								<div class="casino-volume text-center">100</div>
							</div>
							<div class="casino-nation-book market_5_b_exposure market_exposure"></div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name"></div>
							<div class="casino-nation-name">No</div>
							<div class="casino-nation-name">Yes</div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Total cards</div>
							<div class="casino-odds-box lay suspended-box market_6_row market_6_l_btn lay-1">
								<span class="casino-odds">13</span>
								<div class="casino-volume text-center">105</div>
							</div>
							<div class="casino-odds-box back suspended-box market_6_row market_6_b_btn back-1">
								<span class="casino-odds">13</span>
								<div class="casino-volume text-center">90</div>
							</div>
							<div class="casino-nation-book market_6_b_exposure market_exposure"></div>
							</div>
						</div>
						<div class="casino-table-right-box">
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Win with 5</div>
							<div class="casino-odds-box back suspended-box market_7_row market_7_b_btn back-1"><span class="casino-odds">101</span></div>
							<div class="casino-nation-book text-center w-100 text-danger market_7_b_exposure market_exposure"></div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Win with 6</div>
							<div class="casino-odds-box back suspended-box market_8_row market_8_b_btn back-1"><span class="casino-odds">51</span></div>
							<div class="casino-nation-book text-center w-100 text-danger market_8_b_exposure market_exposure"></div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Win with 7</div>
							<div class="casino-odds-box back suspended-box market_9_row market_9_b_btn back-1"><span class="casino-odds">26</span></div>
							<div class="casino-nation-book text-center w-100 text-danger market_9_b_exposure market_exposure"></div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Win with 15</div>
							<div class="casino-odds-box back suspended-box market_10_row market_10_b_btn back-1"><span class="casino-odds">8</span></div>
							<div class="casino-nation-book text-center w-100 text-danger market_10_b_exposure market_exposure"></div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Win with 16</div>
							<div class="casino-odds-box back suspended-box market_11_row market_11_b_btn back-1"><span class="casino-odds">11</span></div>
							<div class="casino-nation-book text-center w-100 text-danger market_11_b_exposure market_exposure"></div>
							</div>
							<div class="casino-odd-box-container">
							<div class="casino-nation-name">Win with 17</div>
							<div class="casino-odds-box back suspended-box market_12_row market_12_b_btn back-1"><span class="casino-odds">31</span></div>
							<div class="casino-nation-book text-center w-100 text-danger market_12_b_exposure market_exposure"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=race20">View All</a></span></div>
				<div class="casino-last-results" id="last-result">
					<!-- <span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/spade.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/heart.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/heart.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/diamond.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/spade.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/heart.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/diamond.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/spade.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/club.png"></span><span class="result"><img src="https://versionobj.ecoassetsservice.com/v36/static/front/img/icons/spade.png"></span> -->
				</div>
			</div>
         </div>
      </div>
      
	   <?php
									include("right_sidebar.php");
								?>
								
      <div>
         <!---->
      </div>
      <!---->
   </div>
</div>
						
						
                    </div>
                </div>
            </div>
           	<script type="text/javascript" src="js/socket.io.js"></script>
			<script type="text/javascript" src="js/jquery.min.js"></script>
            <?php
			include("footer.php");
			?>
        </div>
    </div>
 
	<script src="storage/front/js/flipclock.js" type="text/javascript"></script>
	<script type="text/javascript" src='footer-js.js?1'></script>

   <script type="text/javascript">
   
   $(function () { 
		var header = $("#sidebar-right"); 
		$(window).scroll(function () { 
			var scroll = $(window).scrollTop(); 
		
			if (scroll >= $(window).height()/3) { 
				$("#sidebar-right").css('position','fixed') ;
				$("#sidebar-right").css('top','0px') ;
				$("#sidebar-right").css('right','0px') ;
				$("#sidebar-right").css('width','25.5%') ;
			} else { 
				$("#sidebar-right").css('position','relative') ;
				$("#sidebar-right").css('top','0px') ;
				$("#sidebar-right").css('right','0px') ;
				$("#sidebar-right").css('width','25.5%') ;
			} 
		}); 
	});


	var site_url = '<?php echo WEB_URL; ?>';
	var websocketurl = '<?php echo GAME_IP; ?>';
	var clock = new FlipClock($(".clock"), {
                        clockFace: "Counter"
                    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var selectionid = "";
	var runner = "";
	var b1 = "";
	var bs1 = "";
	var l1 = "";
	var ls1 = "";
	var markettype = "RACE_20";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'race20');
    });
	socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
    socket.on('game', function(data) {	
		  if (data && data['t1'] && data['t1'][0]) {
		  	if(oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0"){
		  		setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
		  	}
		  	oldGameId = data.t1[0].mid;
        		if(data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast){
				$(".casino-remark").text(data.t1[0].remark);
				var desc = data.t1[0].cards || data.t1[0].desc;
				desc = desc.split(",");
				var total_card_value =0;
				var total_card_rank =0;
				var spade_card_show =0;
				var heart_card_show =0;
				var club_card_show =0;
				var diamond_card_show =0;
				
			
				
				for(var i in desc){
					card_details = desc[i];

					if(card_details != 1){
						card_value = getType(card_details);
						card_rank = card_value.rank;
						ctype = card_value.ctype;
						
						if(ctype == "spade"){
							spade_card_show++;
							spade_master_card_show = spade_card_show + 1;
							$("#card_"+ctype+"_"+spade_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+spade_card_show).show();
							$("#card_"+ctype+"_"+spade_master_card_show).attr("src", site_url + "storage/front/img/cards/KHH.png");
							$("#card_"+ctype+"_"+spade_master_card_show).show();
						}
						else if(ctype == "heart"){
							heart_card_show++;
							heart_master_card_show = heart_card_show + 1;
							$("#card_"+ctype+"_"+heart_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+heart_card_show).show();
							$("#card_"+ctype+"_"+heart_master_card_show).attr("src", site_url + "storage/front/img/cards/KDD.png");
							$("#card_"+ctype+"_"+heart_master_card_show).show();
						}
						else if(ctype == "club"){
							club_card_show++;
							club_master_card_show = club_card_show + 1;
							$("#card_"+ctype+"_"+club_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+club_card_show).show();
							$("#card_"+ctype+"_"+club_master_card_show).attr("src", site_url + "storage/front/img/cards/KCC.png");
							$("#card_"+ctype+"_"+club_master_card_show).show();
						}
						else if(ctype == "diamond"){
							diamond_card_show++;
							diamond_master_card_show = diamond_card_show + 1;
							$("#card_"+ctype+"_"+diamond_card_show).attr("src", site_url + "storage/front/img/cards_new/" + card_details+ ".png");
							$("#card_"+ctype+"_"+diamond_card_show).show();
							$("#card_"+ctype+"_"+diamond_master_card_show).attr("src", site_url + "storage/front/img/cards/KSS.png");
							$("#card_"+ctype+"_"+diamond_master_card_show).show();
						}
						
						
						
						
						total_card_rank += card_rank;
						total_card_value++;
					}
				}
				
				$("#total_card").text(total_card_value);
				$("#total_point").text(total_card_rank);
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					bs1 = data['t2'][j].bs1;
					l1 = data['t2'][j].l1;
					ls1 = data['t2'][j].ls1;
				  	
				  	b11 = b1;
				  	markettype = "RACE_20";
					
						
					
					if(selectionid <= 6){
						if(selectionid == 5){
							bs1 = 100;
						}
						else if(selectionid == 6){
							bs1 = 90;
						}
						back_html = '<span class="casino-odds-box-odd market_'+selectionid+'_b_value">'+ b1 + '</span> <span>'+ bs1 +'</span>';
					}
					else{
						back_html = '<span class="casino-odds-box-odd market_'+selectionid+'_b_value">'+ b1 + '</span>';
					}
					
				 	$(".market_"+selectionid+"_b_btn").html(back_html);
					
				  	$(".market_"+selectionid+"_b_btn").attr("side","Back");
				  	$(".market_"+selectionid+"_b_btn").attr("selectionid",selectionid);
				  	$(".market_"+selectionid+"_b_btn").attr("marketid",selectionid);
				  	$(".market_"+selectionid+"_b_btn").attr("runner",runner);
				  	$(".market_"+selectionid+"_b_btn").attr("marketname",runner);
				  	$(".market_"+selectionid+"_b_btn").attr("eventid",eventId);
				  	$(".market_"+selectionid+"_b_btn").attr("markettype",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("event_name",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("fullmarketodds",b1);
				  	$(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",b1);
					
					if(selectionid <= 6){
						if(selectionid == 5){
							ls1 = 100;
						}
						else if(selectionid == 6){
							ls1 = 105;
						}
						lay_html = '<span class="casino-odds-box-odd market_'+selectionid+'_l_value">'+ l1 + '</span> <span>'+ ls1 +'</span>';
					}
					else{
						lay_html =  '<span class="casino-odds-box-odd market_'+selectionid+'_l_value">'+ l1 + '</span>';
					}
					
					$(".market_" + selectionid + "_l_btn").attr("side", "Lay");
					$(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
					$(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
					$(".market_" + selectionid + "_l_btn").attr("runner", runner);
					$(".market_" + selectionid + "_l_btn").attr("marketname", runner);
					$(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
					$(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
					$(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
					$(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
					$(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
					$(".market_" + selectionid + "_l_btn").html(lay_html);
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						$(".market_"+selectionid+"_row").addClass("suspended-box");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
						$(".market_"+selectionid+"_l_btn").removeClass("lay-1");
					}
					else{
				  		$(".market_"+selectionid+"_row").removeClass("suspended-box");
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_"+selectionid+"_l_btn").addClass("lay-1");
					}
			}
		}
    });
    socket.on('gameResult', function(args){
		
    	if(args.data){
				updateResult(args.data);
			}else{
				updateResult(args['res']);
			}
    });
    socket.on('error', function(data){
    });
    socket.on('close', function(data){
    });
}

function getType(data){
	var data1 = data;
	if(data){
		data = data.split('DD');
		if(data.length > 1){
			var obj = {
				type	:	'[',
				color	:	'red',
				ctype	:	'diamond',
				card	:	data[0],
				rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
			}
			return obj;
		}
		else{
			data = data1;
			data = data.split('HH');
			if(data.length > 1){
				var obj = {
					type	:	'{',
					color	:	'red',
					ctype	:	'heart',
					card	:	data[0],
					rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
				}
				return obj;
			}
			else{
				data = data1;
				data = data.split('SS');
				if(data.length > 1){
					var obj = {
						type	:	']',
						color	:	'black',
						ctype	:	'spade',
						card	:	data[0],
						rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
					}
					return obj;
				}
				else{
					data = data1;
					data = data.split('CC');
					if(data.length > 1){
						var obj = {
							type	:	'}',
							color	:	'black',
							ctype	:	'club',
							card	:	data[0],
							rank 	:	data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0]) 
						}
						return obj;
					}
					else{
						return 0;
					}
				}
			}
		}
	}
	return 0;
}


function clearCards(){
	
	refresh(markettype);
	$("#total_card").text(0);
	$("#total_point").text(0);
	$(".cl_cards").attr("storage/front/img/cards_new/1.png");
	$(".cl_cards").hide();
}
function updateResult(data) {

	
	if(data && data[0]){
		resultGameLast = data[0].mid;
		
		if(last_result_id != resultGameLast){
			last_result_id = resultGameLast;
			
		}

		html = "";
		var ab = "";
		var ab1 = "";
		casino_type = "'race20'";
		data.forEach((runData) => {
			if(parseInt(runData.win) == 1){
				ab = "playersuit";
				ab1 = "<img src='storage/front/img/cards/spade_race.png'>";
			
			}
			else if(parseInt(runData.win) == 2){
				ab = "playersuit";
				ab1 = "<img src='storage/front/img/cards/heart_race.png'>";
			
			}
			else if(parseInt(runData.win) == 3){
				ab = "playersuit";
				ab1 = "<img src='storage/front/img/cards/club_race.png'>";
			
			}
			else{
				ab = "playersuit";
				ab1 = "<img src='storage/front/img/cards/diamond_race.png'>";
			}
			
			eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs  '+ ab +' result">'+ ab1 + '</span>';
		});
		
			
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){		
		
		}
    }
}
function teenpatti(type) {
    gameType = type
    websocket();
}

teenpatti("ok");

jQuery(document).on("input", "#inputStake", function () {
	var stake = $("#inputStake").val();
	eventId = $("#fullMarketBetsWrap").attr("eventid");
	$("#inputStake").val(stake);
	odds = parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = parseInt(inputStake);
		}else{
			profit = (odds - 1 ) * inputStake;
		}
	}
	$("#profitLiability").text(profit.toFixed(2));
});
jQuery(document).on("click", ".label_stake", function () {
//    stake = $(this).attr("stake");
//    eventId = $("#fullMarketBetsWrap").attr("eventid");
// 	$("#inputStake").val(stake);

  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

	odds =  parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = (odds - 1 ) * inputStake;
		}else{
			profit = (odds - 1 ) * inputStake;
		}
	}
	$("#profitLiability").text(profit.toFixed(2));
});
jQuery(document).on("click", ".close-bet-slip", function () {
	 $('.bet-slip-data').remove();
	 $(".back-1").removeClass("select");
	$(".lay-1").removeClass("select");
 });
 jQuery(document).on("click", "#placeBet", function () {
	 $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
	 $("#placeBet").addClass('disabled');
	 $(".placeBetLoader").addClass('show');
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'RACE_20';
		bet_event_name = $("#bet_event_name").val();
		inputStake = $("#inputStake").val();
		market_runner_name = $("#market_runner_name").val();
		market_odd_name = $("#market_odd_name").val();
		var runsNo; 
		var oddsNo; 
		bet_market_name = $("#bet_market_name").val();
		eventManualType = 'Auto';
		if(bet_stake_side == "Lay"){
			type = "No";
			class_type = "no";
			unmatched_side_type = false;
		}else{
			type = "Yes";
			class_type = "yes";
			unmatched_side_type = true;
		}
		bet_markettype = $("#bet_markettype").val();
		if(bet_markettype != "FANCY_ODDS"){
			bet_market_type = bet_markettype;
			runsNo = parseFloat($("#odds_val").val());
			oddsNo = parseFloat($("#odds_val").val());
			if(bet_stake_side == "Lay"){
				return_stake = (oddsNo - 1 ) * inputStake;
				return_stake = parseInt(return_stake);
			}else{
				return_stake = (oddsNo - 1 ) * inputStake;
				return_stake = parseInt(return_stake);
			}
		bet_seconds = 1;
		bet_sec = 1000;
		}
		$(".placeBet").addClass("disable");
		/* $("#inputStake").val(""); */
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		$("#loadingMsg").show();
		$('.header_Back_'+bet_event_id).remove();
		$('.header_Lay_'+bet_event_id).remove();
		$('#betSlipFullBtn').hide();
		$('#backSlipHeader').hide();
		$('#laySlipHeader').hide();
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		$("#placeBets").addClass('disable');
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		setTimeout(function(){ 
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/bet_place_race20.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_type},
				 success: function(response) {
					 $(".placeBetLoader").removeClass('show');
					var check_status = response['status'];
					var message = response['message'];
					if(check_status == 'ok'){
							if(bet_markettype != "FANCY_ODDS"){
								oddsNo = runsNo;
							}else{
								oddsNo = oddsNo;
							}
							auth_key = 1;
							/* $("#bet-error-class").addClass("b-toast-success"); */
							toastr.clear()
							toastr.success("", message, {
								"timeOut": "3000",
								"iconClass":"toast-success",
								"positionClass":"toast-top-center",
								"extendedTImeout": "0"
							});
						}else{
							/* $("#bet-error-class").addClass("b-toast-danger"); */
							toastr.clear()
							toastr.warning("", message, {
								"timeOut": "3000",
								"iconClass":"toast-warning",
								"positionClass":"toast-top-center",
								"extendedTImeout": "0"
							});
						}
						/* error_message_text = message;
						$("#errorMsgText").text(error_message_text);
						$("#errorMsg").fadeIn('fast').delay(3000).hide(0); */
						$(".close-bet-slip").click();
						refresh(markettype);
				 }
			 });
		 }, bet_sec - 2000);
	});
    </script>

      <?php

				include("footer-js.php");
				include("footer-result-popup.php");

			?>

<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
<div class="b-toaster-slot vue-portal-target">
    <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
        <div tabindex="0"  class="toast">
            <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>


</body>

</html>