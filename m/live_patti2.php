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
	include("head_css2.php");
?>

<style>
    .casino-table {
        background-color: #f7f7f7;
        color: #333;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .casino-table-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
    }


    .casino-table-left-box,
    .casino-table-center-box,
    .casino-table-right-box {
        width: 49%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }
    
    .casino-table-left-box,
    .casino-table-right-box {
        width: 100%;
        padding: 0 5px;
    }

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
    }

    .casino-nation-detail {
        width: 60%;
    }

    .casino-table-header .casino-nation-detail {
        font-weight: bold;
        min-height: unset;
    }

    .casino-nation-detail {
        display: flex;
        align-items: flex-start;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        padding-left: 5px;
        min-height: 46px;
    }

    .teenpatti2 .casino-odds-box {
        width: 20%;
    }

    .casino-table-header .casino-odds-box {
        cursor: unset;
        padding: 2px;
        min-height: unset;
        height: auto !important;
    }

    .casino-odds-box {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5px 0;
        font-weight: bold;
        border-left: 1px solid #c7c8ca;
        cursor: pointer;
        min-height: 46px;
        width:20%;
        /*font-size: 14px;*/
    }

    .casino-odds-box-full{
        width: 40%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 5px 0;
        font-weight: bold;
        border-left: 1px solid #c7c8ca;
        cursor: pointer;
        min-height: 46px;
        /*font-size: 14px;*/
    }

    .casino-nation-name {
        font-size: 12px;
        font-weight: bold;
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

    .casino-odds {
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
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

    .under-over-row .uo-box {
        display: flex;
        flex-wrap: wrap;
        width: 48%;
        margin-top: 10px;
        border: 1px solid #c7c8ca;
    }

    .teenpatti2 .under-over-row .uo-box .casino-nation-detail {
        width: 70%;
    }

    .teenpatti2 .under-over-row .uo-box .casino-odds-box {
        width: 30%;
    }

    .teenpatti2 .teen2other {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border: 0;
    }

    .casino-table-full-box {
        width: 100%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
    }

    .casino-table-full-box .casino-odds-box{
        width: 100%;
    }

    .teenpatti2 .teen2other .casino-odds-box {
        width: 16%;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .bltitle img {
        height: 35px;
    }

    .teen2cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border: 0;
        padding: 10px 10px 0 10px;
    }

    .card-odd-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        margin-right: 10px;
        cursor: pointer;
    }

    .card-odd-box .casino-odds {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .card-odd-box img {
        height: 75px;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
        .card-odd-box img {
            height: 45px;
        }
    }

    @media only screen and (max-width: 767px) {
        .casino-table-box {
            padding: 5px;
        }

        .casino-table-left-box,
        .casino-table-right-box {
            width: 100%;
            padding: 0 5px;
        }

        .teenpatti2 .teen2other .casino-odds-box {
            width: 49%;
            margin-bottom: 10px;
        }

        .teenpatti2 .casino-table-right-box {
            margin-top: 10px;
        }

        .card-odd-box img {
            height: 45px;
        }
    }

    .casino-table-box-divider {
        background-color: #c7c8ca;
        width: 2px;
    }

	.casino-last-results {
		/* display: flex;
		flex-wrap: wrap;
		justify-content: flex-end;
		margin-top: 10px;
		width: 100%; */
        padding: 10px;
    background-color: var(--theme2-bg);
    color: #ffffff;
    font-size: 14px;
    display: flex
;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
	}

	.casino-last-results .result {
		background: #355e3b;
		color: #fff;
		height: 25px;
		width: 25px;
		border-radius: 50%;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
		font-size: 14px;
		font-weight: bold;
		margin-left: 5px;
		cursor: pointer;
	}

	.casino-last-results .result.result-b {
		color: #ffff33;
	}

	.casino-last-results .result.result-c {
		color: #33c6ff;
	}

	.casino-last-results .result.result-a {
		color: #ff4500;
	}
	.casino-volume {
        font-size: 12px;
        font-weight: 100;
    }

    .sec-cards{
        margin-top: 3px;
    }

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
    .last-result-container .last-result.playerc {
    color: #33c6ff !important;
}
.casino-last-results a{
    color: white !important;
}
 marquee{
    position: unset !important;
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
                <div class="casino-title"><span class="casino-name">2 Cards Teenpatti</span><span class="d-block"><a href="#" onclick="view_rules('patti2')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

<?php
    include("casino_header.php");
?>

                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">
                            
                            <!---->
                            <div class="casino-video">


                            <?php 
                            if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe src="<?php echo IFRAME_URL."".PATTI2_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

                             <!--  <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                              <iframe src="<?php echo IFRAME_URL."".PATTI2_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe> -->
                                <div class="clock clock2digit flip-clock-wrapper">
                                    <ul class="flip play">
                                        <li class="flip-clock-before">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
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
                                                    <div class="inn">2</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">2</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
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
                                    </ul>
                                </div>
                                <div class="video-overlay">
								<div>
                                                        <div>
                                                            <img id="card_c1" src="../storage/front/img/cards/1.png">
                                                            <img id="card_c2" src="../storage/front/img/cards/1.png">
                                                        </div>
                                                    </div>
                                                    <div class="sec-cards">
                                                        <div>
                                                            <img id="card_c3" src="../storage/front/img/cards/1.png">
                                                            <img id="card_c4" src="../storage/front/img/cards/1.png">
                                                        </div>
                                                    </div>
                                </div>
								<div class="bet-note theme2bg theme1color specialRemarkdiv" style="display:none;"><span class="greenbx">Result: </span> <span id="specialRemark"></span></div>
                            </div>
                            <div class="casino-detail">
                                <div class="casino-table">
                                    <div class="casino-table-box">
                                        <div class="casino-table-left-box">
                                            <div class="casino-table-body">
                                            <div class="casino-table-row ">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Player A</div>
                                                    <div class="casino-nation-book market_1_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="casino-odds-box back back-1 market_1_row  market_1_b_btn suspended"><span class="casino-odds">0</span></div>
                                                <div class="casino-odds-box lay lay-1 market_1_row  market_1_l_btn suspended"><span class="casino-odds">0</span></div>
                                            </div>
                                            <div class="casino-table-row mini-baccarat">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Mini Baccarat A</div>
                                                    <div class="casino-nation-book market_5_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="casino-odds-box-full back back-1 market_5_row  market_5_b_btn suspended"><span class="casino-odds">1.9</span></div>
                                            </div>
                                            <div class="casino-table-row ">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Total A</div>
                                                    <div class="casino-nation-book market_3_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="casino-odds-box lay lay-1 market_3_row  market_3_l_btn  suspended"><span class="casino-volume"></span><span class="casino-odds"></span></div>
                                                <div class="casino-odds-box back back-1 market_3_row  market_3_b_btn  suspended"><span class="casino-volume"></span><span class="casino-odds"></span></div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="casino-table-box-divider"></div>
                                        <div class="casino-table-right-box">
                                            <div class="casino-table-body">
                                            <div class="casino-table-row ">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Player B</div>
                                                    <div class="casino-nation-book market_2_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="casino-odds-box back back-1 market_2_row  market_2_b_btn suspended"><span class="casino-odds"></span></div>
                                                <div class="casino-odds-box lay lay-1 market_2_row  market_2_l_btn suspended"><span class="casino-odds">0</span></div>
                                            </div>
                                            <div class="casino-table-row mini-baccarat">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Mini Baccarat B</div>
                                                    <div class="casino-nation-book market_6_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="casino-odds-box-full back back-1 market_6_row  market_6_b_btn suspended"><span class="casino-odds"></span></div>
                                            </div>
                                            <div class="casino-table-row ">
                                                <div class="casino-nation-detail">
                                                    <div class="casino-nation-name">Total B</div>
                                                    <div class="casino-nation-book market_4_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="casino-odds-box lay lay-1 market_4_row  market_4_l_btn  suspended"><span class="casino-volume"></span><span class="casino-odds"></span></div>
                                                <div class="casino-odds-box back back-1 market_4_row  market_4_b_btn  suspended"><span class="casino-volume">15</span><span class="casino-odds"></span></div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-full-box color-plus my-2">
                                        <div class="casino-odds-box back back-1 market_7_row  market_7_b_btn suspended"><span class="casino-odds">Color Plus</span>
                                        <div class="casino-nation-book market_7_b_exposure market_exposure"></div>
                                    </div>
                                    </div>
                                </div>

                            <div class="mt-1 casino-remark-div">
                                                 <marquee style="color: #097c93;">Play Our New Game Premium Teenpatti 1 Day</marquee>
                                                 </div>

                                <div class="casino-last-results"><span>Last Result</span> <span><a href="casinoresults?game_type=patti2">View All</a></span></div>
								<div class="last-result-container text-right mt-1" id="last-result">
								
							
								
								</div>
                                <!-- <div class="last-result-container text-right mt-1" id="last-result"></div> -->
                               
                                <div class="last-result-tiele mt-1"><span>Rules</span></div>
                                <div class="table-responsive rules-table">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="box-10 text-center">Color Plus Rules</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="box-7">Three card Sequence</td>
                                                <td class="box-3">1 To 3</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <!---->
                                        <tbody>
                                            <tr>
                                                <td class="box-7">Four card color</td>
                                                <td class="box-3">1 To 9</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <!---->
                                        <tbody>
                                            <tr>
                                                <td class="box-7">Four card Sequence</td>
                                                <td class="box-3">1 To 9</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <!---->
                                        <tbody>
                                            <tr>
                                                <td class="box-7">Three of a kind</td>
                                                <td class="box-3">1 To 12</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <!---->
                                        <tbody>
                                            <tr>
                                                <td class="box-7">Three card pure Sequence</td>
                                                <td class="box-3">1 To 15</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                     <table class="table table-bordered">
                                        <!---->
                                        <tbody>
                                            <tr>
                                                <td class="box-7">Four card pure Sequence</td>
                                                <td class="box-3">1 To 150</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                     <table class="table table-bordered">
                                        <!---->
                                        <tbody>
                                            <tr>
                                                <td class="box-7">Four of a kind</td>
                                                <td class="box-3">1 To 200</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
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

</html>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?24'></script>

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
	var data6;
	var markettype = "PATTI2";
	var markettype_2 = markettype;
	var last_result_id = '0';
	
	function websocket(type) {
		socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
		socket.on('connect', function () {
			socket.emit('Room', 'patti2');
		});
        socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
		socket.on('game', function (data) {
			
            data1 = data;
			if (data && data1.t1) {
				if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
				oldGameId = data.t1[0].mid;
				if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
                    }
                }
                clock.setValue(data1.t1[0].autotime);
				$(".round_no").text(data1.t1[0].mid == 0 ? 0 : typeof data1.t1[0].mid=="string" ? data1.t1[0].mid.split(".")[1] : data1.t1[0].mid);
				eventId = data1.t1[0].mid == 0 ? 0 : typeof data1.t1[0].mid=="string" ? data1.t1[0].mid.split(".")[1] : data1.t1[0].mid;
				for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    if(bs1 == "0"){
                        bs1="-"; 
                    }
                    if(ls1 == "0"){
                        ls1="-"; 
                    }
                    var className="odds d-block";
                    if(selectionid == "3" || selectionid == "4"){
                        className="casino-volume d-block";
                    }
                    back_html = '<span class="'+className+'"><b>' + b1 + '</b></span> ';
                    if(selectionid == "3" || selectionid == "4"){
                        back_html += '<span class="odds d-block">' + bs1 + '</span>';
                    }
                    $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                    $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", bs1);
                    if(selectionid != "7"){
                        $(".market_" + selectionid + "_b_btn").html(back_html);
                    }
                    $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                    if(b1 > 0){
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                    }
                    lay_html = '<span class="'+className+'"><b>' + l1 + '</b></span> ';
                    if(selectionid == "3" || selectionid == "4"){
                        lay_html += '<span class="odds d-block">' + ls1 + '</span>';
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
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", ls1);
                    $(".market_" + selectionid + "_l_btn").html(lay_html);
                    
                    $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                    if(l1 > 0){
                        $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                    }
                    gstatus = data.t2[j].gstatus.toString(); 
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_row").addClass("suspended");
                    } else {
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

	function clearCards() {
		refresh(markettype);
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
	}

	function updateResult(data) {
	
		if (data && data[0]) {
			data = JSON.parse(JSON.stringify(data));
			resultGameLast = data[0].mid;

			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				refresh(markettype);
			}
		
			html = "";
			var ab = "";
			var ab1 = "";
			casino_type = "'patti2'";
			data.forEach((runData) => {
				eventId = runData.mid == 0 ? 0 : runData.mid;
               
                var classs="playera";
                var resultt="A";
                if(parseInt(runData.win) == 2){
                    classs="playerb";
                    var resultt="B";
                }
                if(parseInt(runData.win) == 0){
                    classs="playerc";
                    var resultt="T";
                }
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs last-result ml-1 ' + classs + '">' +resultt + '</span>';
			});
			$("#last-result").html(html);
			if (oldGameId == 0 || oldGameId == resultGameLast) {
				$("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
			}
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}

	teenpatti("ok");
    jQuery(document).on("click", ".back-1", function () {	
        		$("#popup_color").removeClass("back");		
                	$("#popup_color").removeClass("lay");	
                    		$("#popup_color").addClass("back");
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
			
            
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";

            if(marketId != "3" && marketId != "4"){
			    fullfancymarketrate = fullmarketodds;
            }
			
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
	});		
    	jQuery(document).on("click", ".lay-1", function () {		$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("lay");
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
				

			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";

            if(marketId != "3" && marketId != "4"){
			    fullfancymarketrate = fullmarketodds;
            }
			
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
		if (bet_markettype != "FANCY_ODDS") {
			if (bet_stake_side == "Lay") {
				profit = parseInt(inputStake);
			}
			else {
				profit = (odds - 1) * inputStake;
			}
		}
		$("#profitLiability").text(profit.toFixed(2));
	});
	jQuery(document).on("click", ".label_stake", function () {
		// stake = $(this).attr("stake");
		// eventId = $("#fullMarketBetsWrap").attr("eventid");
		// $("#inputStake").val(stake);
        
  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

		odds = parseFloat($("#odds_val").val());
		inputStake = $("#inputStake").val();
		bet_stake_side = $("#bet_stake_side").val();
		bet_markettype = $("#bet_markettype").val();
		if (bet_markettype != "FANCY_ODDS") {
			if (bet_stake_side == "Lay") {
				profit = (odds - 1) * inputStake;
			}
			else {
				profit = (odds - 1) * inputStake;
			}
		}
		$("#profitLiability").text(profit.toFixed(2));
	});

	jQuery(document).on("click", "#placeBet", function () {

		$("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
		$(".placeBet").attr('disabled',true);
		$(".placeBet").removeAttr("id", "placeBet");
		var last_place_bet = "";
		bet_stake_side = $("#bet_stake_side").val();
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'PATTI2';
		bet_event_name = $("#bet_event_name").val();
		inputStake = $("#inputStake").val();
		market_runner_name = $("#market_runner_name").val();
		market_odd_name = $("#market_odd_name").val();
		var runsNo;
		var oddsNo;

		bet_market_name = $("#bet_market_name").val();
		eventManualType = 'Auto';
		if (bet_stake_side == "Lay") {
			type = "No";
			class_type = "no";
			unmatched_side_type = false;
		}
		else {
			type = "Yes";
			class_type = "yes";
			unmatched_side_type = true;
		}
		bet_markettype = $("#bet_markettype").val();
		if (bet_markettype != "FANCY_ODDS") {
			bet_market_type = bet_markettype;
			runsNo = parseFloat($("#odds_val").val());
			oddsNo = parseFloat($("#odds_val").val());
            if(marketId == "3" || marketId == "4"){
			    oddsNo = parseFloat($("#fullfancymarketrate").val());
            }
			if (bet_stake_side == "Lay") {
				return_stake = (oddsNo - 1) * inputStake;
				return_stake = parseInt(return_stake);
			}
			else {
				return_stake = (oddsNo - 1) * inputStake;
				return_stake = parseInt(return_stake);
			}
			bet_seconds = 1;
			bet_sec = 1000;
		}
		
		/* $("#inputStake").val(""); */
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		$("#loadingMsg").show();
		$('.header_Back_' + bet_event_id).remove();
		$('.header_Lay_' + bet_event_id).remove();
		$('#betSlipFullBtn').hide();
		$('#backSlipHeader').hide();
		$('#laySlipHeader').hide();
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		setTimeout(function () {
			$.ajax({
				type: 'POST',
				url: '../ajaxfiles/bet_place_patti2.php',
				dataType: 'json',
				data: {
					eventId: bet_event_id,
					eventType: eventType,
					marketId: bet_marketId,
					stack: inputStake,
					type: type,
					odds: oddsNo,
					runs: runsNo,
					bet_market_type: bet_market_type,
					oddsmarketId: oddsmarketId,
					eventManualType: eventManualType,
					market_runner_name: market_runner_name,
					market_odd_name: market_odd_name,
					bet_event_name: bet_event_name,
					bet_type: bet_type
				},
				success: function (response) {
					var check_status = response['status'];
					var message = response['message'];
					if (check_status == 'ok') {
						if (bet_markettype != "FANCY_ODDS") {
							oddsNo = runsNo;
						}
						else {
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
					}
					else {
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
					$(".placeBet").attr("id", "placeBet");
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
                    <div class="mt-1 d-flex"><span>Range: 100 to 1L</span></div>
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