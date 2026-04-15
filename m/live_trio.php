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

    .casino-table-box {
        padding: 5px;
    }

    .casino-odd-box-container {
        width: 100%;
    }

    .casino-odd-box-container {
        width: calc(25% - 7.5px);
        margin-right: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .casino-odd-box-container {
        width: calc(33.33% - 4px);
        margin-right: 5px;
    }

    .casino-odd-box-container:last-child {
        margin-right: 0;
    }

    .triocards .casino-odd-box-container {
        width: calc(50% - 3px);
        margin-bottom: 10px;
    }

    .triocards .casino-odd-box-container:nth-child(2n) {
        margin-right: 0;
    }

    .casino-nation-name {
        font-size: 12px;
        font-weight: bold;
    }

    .casino-nation-name {
        width: 100%;
        text-align: center;
        font-size: 11px;
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
    }

    .casino-odds-box {
        width: 49%;
    }

    .casino-odds {
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
    }

    .casino-volume {
        font-size: 10px;
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

    .casino-table-box.trioodds {
        justify-content: center;
    }

    .trioodds .casino-odds-box {
        width: 100%;
    }

    .trioodds .casino-odd-box-container {
        width: calc(33.33% - 4px);
        margin-bottom: 10px;
    }

    .trioodds .casino-odd-box-container:nth-child(3n) {
        margin-right: 0;
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

   
	.casino-last-results {
		display: flex;
		flex-wrap: wrap;
		justify-content: flex-end;
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
                <div class="casino-title"><span class="casino-name">Trio</span><span class="d-block"><a href="#" onclick="view_rules('trio')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

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
                               <iframe src="<?php echo IFRAME_URL."".TRIO_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

                           <!-- <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                 <iframe src="<?php echo IFRAME_URL."".TRIO_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe> -->
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
                                                            <img id="card_c3" src="../storage/front/img/cards/1.png">
                                                        </div>
                                    </div>
                                </div>
								<div class="bet-note theme2bg theme1color specialRemarkdiv" style="display:none;"><span class="greenbx">Result: </span> <span id="specialRemark"></span></div>
                            </div>
                            <div class="casino-detail">
                                <div class="casino-table">
                                    <div class="casino-table-box markets_all1">
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name pointer">Session <i class="fas fa-info-circle"></i></div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">21</span><span class="casino-volume">80</span></div>
                                            <div class="casino-odds-box lay suspended-box"><span class="casino-odds">21</span><span class="casino-volume">100</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">3 Card Judgement(1 2 4)</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">1.78</span></div>
                                            <div class="casino-odds-box lay suspended-box"><span class="casino-odds">1.83</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">3 Card Judgement(J Q K)</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">1.78</span></div>
                                            <div class="casino-odds-box lay suspended-box"><span class="casino-odds">1.83</span></div>
                                            
                                        </div>
                                    </div>
                                    <div class="casino-table-box triocards mt-3 markets_all2">
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Two Red Only</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.52</span></div>
                                            <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.72</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Two Black Only</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.52</span></div>
                                            <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.72</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Two Odd Only</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.33</span></div>
                                            <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.53</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Two Even Only</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">2.75</span></div>
                                            <div class="casino-odds-box lay suspended-box"><span class="casino-odds">2.95</span></div>
                                            
                                        </div>
                                    </div>
                                    <div class="casino-table-box trioodds mt-3 markets_all3">
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Pair</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">5.5</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Flush</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">17</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Straight</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">24</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Trio</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">201</span></div>
                                            
                                        </div>
                                        <div class="casino-odd-box-container">
                                            <div class="casino-nation-name">Straight Flush</div>
                                            <div class="casino-odds-box back suspended-box"><span class="casino-odds">226</span></div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=trio" class="">View All</a></span></div>
                                 <div class="last-result-container text-right mt-1" id="last-result"></div>
                                
                               
                                
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
<script type="text/javascript" src='footer-js.js?19'></script>

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
	var markettype = "TRIO";
	var markettype_2 = markettype;
	var last_result_id = '0';
	
	function websocket(type) {
		socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
		socket.on('connect', function () {
			socket.emit('Room', 'trio');
		});
        socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
		socket.on('game', function (data) {
			
			data1 = data;
            if (data && data.t1) {
                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data1.t1[0].mid;
                if (data1.t1[0].mid != 0 && data1.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark")
                        .text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 +
                            ".png");
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 +
                            ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 +
                            ".png");
                    }
                }
                clock.setValue(data1.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                var markets_all1 = "";
                var markets_all2 = "";
                var markets_all3 = "";
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    new_selectionid = selectionid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    /* back_html = '<span class="odds d-block"><b>' + b1 + '</b></span>';
                    if(selectionid == 1){
                        back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> <span style="color: black;">' + bs1 + '</span>';
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
                    $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);
                    $(".market_" + selectionid + "_b_btn").html(back_html);

                    lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span>';
                    if(selectionid == 1){ 
                        lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span> <span style="color: black;">' + ls1 + '</span>';
                    }
                    $(".market_" + selectionid + "_l_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                    $(".market_" + selectionid + "_l_btn").html(lay_html); */
                    var statuss = "";
                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        /* $(".market_" + selectionid + "_row").addClass("suspended-box"); */
                        statuss = "suspended";
                    } else {
                       /*  $(".market_" + selectionid + "_row").removeClass("suspended-box"); */
                    }
                    var size_back="";
                    var info="";
                    var size_lay="";
                    var rateeb=b1;
                    var rateel=l1;
                    if(selectionid == 1){
                        info=`<i class="fas fa-info-circle"></i>`;
                        size_back=` <span class="casino-volume">${bs1}</span>`;
                        size_lay=` <span class="casino-volume">${ls1}</span>`;
                        rateeb=bs1;
                        rateel=ls1;
                    }
                    var back_data =
                        `side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${b1}" fullfancymarketrate="${rateeb}"`;
                    var lay_data =
                        `side="Lay" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${runner}" marketname="${runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${l1}" fullfancymarketrate="${rateel}"`;

                        var exposure="";
                            if ($('.casino-nation-book').hasClass("market_"+new_selectionid+"_b_exposure")) {
                                exposure=$(".market_"+new_selectionid+"_b_exposure").html();
                               
                                if(exposure != ""){
                                    if (parseInt(exposure,10) < 0) {
                                        $(".market_" + new_selectionid + "_b_exposure").css("color", "red");
                                    } else {
                                        $(".market_" + new_selectionid + "_b_exposure").css("color", "green");
                                    }
                                }
                            }
                    if(selectionid >= 1 && selectionid <= 3){
                        markets_all1+=`<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name pointer">${runner}${info}</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                            ${size_back}
                                                        </div>
                                                        <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_1_${new_selectionid}_btn ${statuss}" ${lay_data}>
                                                            <span class="casino-odds">${l1}</span>
                                                            ${size_lay}
                                                        </div>
                                                        <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure">${exposure}</div>
                                                    </div>`;
                    }
                    if(selectionid >= 4 && selectionid <= 7){
                        markets_all2+=`<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name pointer">${runner}</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                        <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row  market_1_${new_selectionid}_btn ${statuss}" ${lay_data}>
                                                            <span class="casino-odds">${l1}</span>
                                                        </div>
                                                        <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure">${exposure}</div>
                                                    </div>`;
                    }
                    if(selectionid >= 8 && selectionid <= 12){
                        markets_all3+=`<div class="casino-odd-box-container">
                                                        <div class="casino-nation-name pointer">${runner}</div>
                                                        <div class="casino-odds-box back back-1 market_${new_selectionid}_row  market_${new_selectionid}_b_btn ${statuss}" ${back_data}>
                                                            <span class="casino-odds">${b1}</span>
                                                        </div>
                                                    <div class="casino-nation-book text-center w-100 market_${new_selectionid}_b_exposure market_exposure">${exposure}</div>
                                                        
                                                    </div>`;
                    }
                }
                $(".markets_all1").html(markets_all1);
                $(".markets_all2").html(markets_all2);
                $(".markets_all3").html(markets_all3);
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
			casino_type = "'trio'";
			data.forEach((runData) => {
				ab = "playerb";
					ab1 = "R";
				eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
				html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
			});
			$("#last-result").html(html);
			if (oldGameId == 0 || oldGameId == resultGameLast) {
				$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
				$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
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
			
			/* fullfancymarketrate = fullmarketodds; */
			
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
			/* fullfancymarketrate = fullmarketodds;	 */

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
		eventType = 'TRIO';
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
            runsNo = parseFloat($("#odds_val").val());
			oddsNo = parseFloat($("#fullfancymarketrate").val());
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
			$.ajax({
				type: 'POST',
				url: '../ajaxfiles/bet_place_trio.php',
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