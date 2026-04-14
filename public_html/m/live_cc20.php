<?php
	include("../include/conn.php");
		include('../include/flip_function.php');
	include('../session.php');
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
	include("head_css.php");
?>

<style>

    .casino-title{
        display: flex;
    }

    .casino-title .d-block{
        margin-top:1px;
    }

    .casino-title a{
        color: #fff;
        text-decoration: underline;
    }

        .casino-detail {
        margin-top: 30px;
    }

    .casino-table {
    background-color: #f7f7f7;
    color: #333;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 5px;
}

.cricket20-container {
    display: flex
;
    display: -webkit-flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
}

.cricket20-left, .cricket20-right {
    width: 49%;
    padding: 5px;
    background: #f2f2f2;
    box-shadow: 0 0 3px #aaa;
}

.cricket20-left, .cricket20-right {
        width: 100%;
        padding-top: 0;
        padding-bottom: 0;
    }

     .score-box {
    position: relative;
    height: 64px;
    margin-top: 30px;
    padding: 0;
    background-image: url(../storage/img/score-bg.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position: center;
    margin-bottom: 45px;
}

.score-box {
        margin-top: 0;
        margin-bottom: 60px;
    }

    .team-score {
    position: unset;
    left: unset;
    top: unset;
    background-color: unset;
    padding: 5px;
    display: flex
;
    align-items: center;
    height: unset;
    left: unset;
    width: unset;
    flex-direction: unset;
    justify-content: unset;
    align-items: unset;
}

    .team-score {
    display: flex
;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    color: #fff;
    font-size: 14px;
}

.text-center {
    text-align: center !important;
}

.ball-icon {
    position: absolute;
    left: 50%;
    top: -25px;
    height: 50px;
    transform: translateX(-50%);
}



 .ball-icon img {
    height: 60px;
}

.blbox {
    display: flex
;
    justify-content: center;
    align-items: center;
    position: absolute;
    left: 50%;
    width: 170px;
    height: 40px;
    transform: translateX(-50%);
    bottom: -15px;
}

    .blbox {
        bottom: -25px;
    }

.casino-odds-box {
    display: flex
;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 5px 0;
    font-weight: bold;
    border-left: 1px solid #c7c8ca;
    cursor: pointer;
    min-height: 46px;
}

 .blbox div {
    width: 35%;
    text-align: center;
    color: #000;
    height: 40px;
    line-height: 40px;
    border: 0;
}

.casino-odds {
    font-size: 14px;
    font-weight: bold;
    line-height: 1;
}

 .score-box {
        margin-top: 0;
        margin-bottom: 60px;
    }

.casino-remark {
    padding: 0 5px;
    color: #097c93;
    font-weight: bold;
    font-size: 12px;
    max-width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}

.casino-remark marquee {
    width: calc(100% - 60px);
    float: right;
    padding-left: 10px;
}

.ml-1, .mx-1 {
    margin-left: .25rem !important;
}

.casino-last-result-title {
    padding: 10px;
    background-color: #2c3e50d9;
    color: #ffffff;
    font-size: 14px;
    display: flex
;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
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
        width: 25px;
        height: 25px;
    }

 .casino-last-results .result {
    background-color: transparent;
    border: 1px solid 0;
}

 .casino-last-results .result img {
    height: 30px;
}

    .race20 .casino-last-results .result img, .casino-last-results .result img {
        height: 25px;
    }

    .right-sidebar {
    width: 450px;
    padding: 0;
    min-height: calc(100vh - 135px);
    max-height: calc(100vh - 135px);
    overflow-x: hidden;
    overflow-y: auto;
    margin-left: 2px;
}

.right-sidebar {
        display: none;
    }

    .right-sidebar.sticky {
    position: fixed;
    top: 0;
    right: 5px;
    width: 450px;
    max-height: calc(100vh - 50px);
}

.casino-page .right-sidebar {
    margin-left: 5px;
}

.sidebar-box {
    margin-bottom: 5px;
}

.sidebar-title {
    background-color: #0088cc;
    color: #ffffff;
    position: relative;
    height: 30px;
}

.right-sidebar .sidebar-title {
    background-color: #2c3e50;
    color: #ffffff;
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    padding: 0 5px 0 0;
}

.sidebar-title h4 {
    padding: 5px;
    font-size: 16px;
}
.suspended:after {
    width: 100% !important;
}
</style>

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
                <!---->
                <!---->
                <div>
                <div class="casino-title"><span class="casino-name">Cricket Match 20-20</span><span class="d-block"><a href="#" onclick="view_rules('cc20')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

<?php
    include("casino_header.php");
?>
                    <div class="tab-content cc-20">


						<div id="bhav" class="tab-pane active">


    <!---->
    <div class="casino-video">


    <?php 
                            if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe src="<?php echo IFRAME_URL."".CRICKET20_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

  <!--  <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
        
         <iframe src="<?php echo IFRAME_URL; echo CRICKET20_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe> -->
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
            <div><img id="card_c1" src="../storage/mobile/img/cards_new/1.png"></div>
        </div>
         <!--<div class="video-overlay1">
                <p>1 -> <span class="market_1_b_exposure">0</span></p>
                <p>2 -> <span class="market_2_b_exposure">0</span></p>
                <p>3 -> <span class="market_3_b_exposure">0</span></p>
                <p>4 -> <span class="market_4_b_exposure">0</span></p>
                <p>5 -> <span class="market_5_b_exposure">0</span></p>
                <p>6 -> <span class="market_6_b_exposure">0</span></p>
                <p>7 -> <span class="market_7_b_exposure">0</span></p>
                <p>8 -> <span class="market_8_b_exposure">0</span></p>
                <p>9 -> <span class="market_9_b_exposure">0</span></p>
                <p>10 -> <span class="market_10_b_exposure">0</span></p>


            </div>-->
        <!---->
    </div>
    <div class="casino-detail">
       <div class="casino-table">
          <div class="cricket20-container">
             <div class="cricket20-left">
                <div class="score-box ">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball2.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_1_b_btn suspended market_1_row"><span class="casino-odds market_1_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_1_l_btn suspended market_1_row"><span class="casino-odds market_1_l_value">0</span></div>
                   </div>
                </div>
                <div class="score-box ">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball3.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_2_b_btn suspended market_2_row"><span class="casino-odds market_2_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_2_l_btn suspended market_2_row"><span class="casino-odds market_2_l_value">0</span></div>
                   </div>
                </div>
                <div class="score-box">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball4.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_3_b_btn suspended market_3_row"><span class="casino-odds market_3_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_3_l_btn suspended market_3_row"><span class="casino-odds market_3_l_value">0</span></div>
                   </div>
                </div>
                <div class="score-box">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball5.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_4_b_btn suspended market_4_row"><span class="casino-odds market_4_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_4_l_btn suspended market_4_row"><span class="casino-odds market_4_l_value">0</span></div>
                   </div>
                </div>
                <div class="score-box">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball6.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_5_b_btn suspended market_5_row"><span class="casino-odds market_5_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_5_l_btn suspended market_5_row"><span class="casino-odds market_5_l_value">0</span></div>
                   </div>
                </div>
             </div>
             <div class="cricket20-right">
                <div class="score-box">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball7.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_6_b_btn suspended market_6_row"><span class="casino-odds market_6_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_6_l_btn suspended market_6_row"><span class="casino-odds market_6_l_value">0</span></div>
                   </div>
                </div>
                <div class="score-box">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball8.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_7_b_btn suspended market_7_row"><span class="casino-odds market_7_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_7_l_btn suspended market_7_row"><span class="casino-odds market_7_l_value">0</span></div>
                   </div>
                </div>
                <div class="score-box">
                   <div class="team-score">
                      <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball9.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_8_b_btn suspended market_8_row"><span class="casino-odds market_8_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_8_l_btn suspended market_8_row"><span class="casino-odds market_8_l_value">0</span></div>
                   </div>
                </div>
                <div class="score-box">
                   <div class="team-score">
                     <div>
                         <div class="text-center team_1_name"><b>Team A</b></div>
                         <div class="text-center"><span class="ml-1 team_1_score">220/7 </span><span class="ml-2 team_1_over">20 Over</span></div>
                      </div>
                      <div>
                         <div class="text-center team_2_name"><b>Team B</b></div>
                         <div class="text-center"><span class="ml-1 team_2_score">211/6 </span><span class="ml-1 team_2_over"> 20 Over</span></div>
                      </div>
                   </div>
                   <div class="ball-icon"><img src="/storage/img/balls/ball10.png"></div>
                   <div class="blbox">
                      <div class="casino-odds-box back  back-1 market_9_b_btn suspended market_9_row"><span class="casino-odds market_9_b_value">0</span></div>
                      <div class="casino-odds-box lay  lay-1 market_9_l_btn suspended market_9_row"><span class="casino-odds market_9_l_value">0</span></div>
                   </div>
                </div>
             </div>
          </div>
          <div class="mt-1">
             <marquee scrollamount="3" class="casino-remark">Team B Need 12 Runs to WIN Match. If The Score is Tie Team B will WIN. </marquee> 
          </div>
       </div>
       <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=cmatch20">View All</a></span></div>
       <div class="casino-last-results" id="last-result"></div>
    </div>
    <!---->
    <!---->
</div>


                        <?php
							include("open_bet.php");
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?35'></script>

<?

include("betpopcss.php");
?>

 <script type="text/javascript">
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
	var markettype = "2020_CRICKET_MATCH";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	function websocket(type) {
		socket = io.connect(websocketurl);
		socket.on('connect', function () {
			socket.emit('Room', 'cmatch20');
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



				if (data.t1[0].C1 != 1) {
						$("#card_c1").attr("src", "../storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
				}

				$(".team_1_name").text("Team A");
				$(".team_2_name").text("Team B");

				$(".team_1_score").text(data.t1[0].C2+"/"+data.t1[0].C3);
				$(".team_2_score").text(data.t1[0].C5+"/"+data.t1[0].C6);

				$(".team_1_over").text(data.t1[0].C4+" Over");
				$(".team_2_over").text(data.t1[0].C7+" Over");

			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;

				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					l1 = data['t2'][j].l1;


				  	markettype = "2020_CRICKET_MATCH";


				  	$(".market_"+selectionid+"_b_value").text(b1);
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


					$(".market_"+selectionid+"_l_value").text(l1);
				  	$(".market_"+selectionid+"_l_btn").attr("side","Lay");
				  	$(".market_"+selectionid+"_l_btn").attr("selectionid",selectionid);
				  	$(".market_"+selectionid+"_l_btn").attr("marketid",selectionid);
				  	$(".market_"+selectionid+"_l_btn").attr("runner",runner);
				  	$(".market_"+selectionid+"_l_btn").attr("marketname",runner);
				  	$(".market_"+selectionid+"_l_btn").attr("eventid",eventId);
				  	$(".market_"+selectionid+"_l_btn").attr("markettype",markettype);
				  	$(".market_"+selectionid+"_l_btn").attr("event_name",markettype);
				  	$(".market_"+selectionid+"_l_btn").attr("fullmarketodds",l1);
				  	$(".market_"+selectionid+"_l_btn").attr("fullfancymarketrate",l1);

				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){

						$(".market_" + selectionid + "_row").addClass("suspended");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
					}
					else {
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended");
					}
			}


        }
    });

		socket.on('gameResult', function (args) {
			if(args.data){
				updateResult(args.data);
			}else{
				updateResult(args['res']);
			}
		});
		socket.on('error', function (data) {});
		socket.on('close', function (data) {});
	}


	function clearCards(){
		refresh(markettype);
		$("#card_c1").attr("src", "../storage/front/img/cards_new/1.png");

	}
	function updateResult(data) {

		data = JSON.parse(JSON.stringify(data));
		resultGameLast = data[0].mid;

		if(last_result_id != resultGameLast){
			last_result_id = resultGameLast;

		}

		var html = "";
		casino_type = "'cmatch20'";
		data.forEach((runData) => {

			ball_result =  parseInt(runData.win);

			eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class=" result"><img src="../storage/img/balls/ball'+ball_result+'.png" class="result-ball"></span>';
		});
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){

			$("#card_c1").attr("src", "../storage/front/img/cards_new/1.png");


		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");
function getType(data){
	var data1 = data;
	if(data){
		data = data.split('DD');
		if(data.length > 1){
			var obj = {
				type	:	'[',
				color	:	'red',
				card	:	data[0]
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
					card	:	data[0]
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
						card	:	data[0]
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
							card	:	data[0]
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


	jQuery(document).on("click", ".back-1", function () {			$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("back");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';

			fullfancymarketrate = fullmarketodds;

			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";

			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name);
			$("#bet_stake_side").val("Back");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);

			$('#profitLiability').text('');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("");

			$('.open_back_place_bet').show();
			$('#open_back_place_bet').modal("show");
		}
	});			jQuery(document).on("click", ".lay-1", function () {		$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("lay");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';
			fullfancymarketrate = fullmarketodds;

			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";

			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name);
			$("#bet_stake_side").val("Lay");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);

			$('#profitLiability').text('');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("");

			$('.open_back_place_bet').show();
			$('#open_back_place_bet').modal("show");
		}
	});

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

jQuery(document).on("click", "#placeBet", function () {

	 $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
	 $(".placeBet").attr('disabled',true);
	 $(".placeBet").removeAttr("id","placeBet");
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = '2020_CRICKET_MATCH';
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

		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		setTimeout(function(){
			$.ajax({
				 type: 'POST',
				 url: '../ajaxfiles/bet_place_2020_cricket_match.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_type},
				 success: function(response) {
					var check_status = response['status'];
					var message = response['message'];
					if(check_status == 'ok'){
							if(bet_markettype != "FANCY_ODDS"){
								oddsNo = runsNo;
							}else{
								oddsNo = oddsNo;
							}
							auth_key = 1;
							toastr.clear()
					toastr.success("", message, {
						"timeOut": "3000",
						"iconClass":"toast-success",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-success");*/
						}else{
							toastr.clear()
					toastr.warning("", message, {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-danger");*/
						}
						/*error_message_text = message;
					$("#errorMsgText").text(error_message_text);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);*/
						$(".close-bet-slip").click();
						refresh(markettype);
						$(".placeBet").attr("id","placeBet");
						$("#placeBet").html('Submit');
						$(".placeBet").attr('disabled',false);
						$('.open_back_place_bet').hide();
						$('#open_back_place_bet').modal("hide");
				 }
			 });
		 }, bet_sec - 2000);
	});
</script>
<style>
	  .modal-body {
    padding: 0px !important;
}
</style>
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog">
    <div class="modal-dialog" style="margin:0;">
        <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
            <header id="__BVID__30___BV_modal_header_" class="modal-header">
                <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Place Bet</h5>
                <button type="button" data-dismiss="modal" class="close">&times;</button>
            </header>
            <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
                <div class="place-bet1 pt-2 pb-2 back place-bet-modal" id="popup_color">
                       <div class="row row5">
                            <div class="col-6"><b id="market_runner_label"></b></div>
                            <div class="col-6 text-right pt-1">Profit: <span id="profitLiability"></span></div>
                        </div>
                        <div class="odd-stake-box">
                            <div class="row row5 mt-1">
                                <div class="col-6 text-center">Odds</div>
                                <div class="col-6 text-center">Amount</div>
                            </div>
                            <div class="row row5 mt-1">
                                <div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100" disabled="" value="1.7"></div>
                                <div class="col-6">
                                    <div class="float-right"><input type="number" id="inputStake" class="stakeinput w-100" value=""></div>
                                    <input type='hidden' id='market_runner_label' value='' />
                                    <input type='hidden' id='bet_stake_side' value='' /><input type='hidden' id='bet_event_id' value='' /><input type='hidden' id='bet_marketId' value='' /><input type='hidden' id='bet_event_name' value='' /><input type='hidden' id='bet_market_name' value='' /><input type='hidden' id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate' value='' /> <input type='hidden' id='oddsmarketId' value='' /><input type='hidden' id='market_runner_name' value='' /><input type='hidden' id='market_odd_name' value='' />
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row row5">
                            <div class="col-5"><b id="market_runner_label">Player A</b></div>
                            <div class="col-7 text-right">
                                <div class="float-right">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" placeholder="0" class="stakeinput" id="odds_val">
                                    <button class="stakeactionminus btn disabled">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                            </div>
                        </div> -->

                       <!--  <div class="row row5 mt-2">
                            <div class="col-4">
                                <input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                                    Submit
                                </button>
                            </div>

                        </div> -->
                        <div class="place-bet-buttons mt-1">
                            <?php
                            $get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
                            $num_rows = $get_button_value->num_rows;
                            $button_array = array();
                            if ($num_rows <= 0) {
                                $button_array[] = 500;
                                $button_array[] = 1000;
                                $button_array[] = 2000;
                                $button_array[] = 3000;
                                $button_array[] = 4000;
                                $button_array[] = 5000;
                                $button_array[] = 10000;
                                $button_array[] = 20000;
                            } else {
                                $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                                $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                                $default_stake = $fetch_button_value_data['default_stake'];
                                $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                                $button_array = explode(",", $fetch_button_value);
                            }
                            foreach ($button_array as $button_value) {
                            ?>
                                <button type="button" class="btn-place-bet btn btn-secondary btn-block1 label_stake" stake='<?php echo $button_value; ?>'>
                                        +<?php echo $button_value; ?>
                                    </button>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="mt-1 place-bet-btn-box">
                            <button class="btn btn-link stackclear" style="text-decoration: underline;">Clear</button>
                            <button class="btn btn-info" data-target="#set_btn_value" data-toggle="modal">Edit</button>
                            <button class="btn btn-danger" data-dismiss="modal" class="close">Reset</button>
                            <button class="btn btn-success placeBet" id="placeBet" disabled>Place Bet</button>
                        </div>
                             <div class="mt-1 d-flex"><span>Range: 100 to 3L</span></div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</div>
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
<?php
	include "footer.php";
	include "footer-result-popup.php";
?>
</html>