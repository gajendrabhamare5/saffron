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
.casino-table-box {
    padding: 5px;
}

.casino-table-box {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
}

.casino-table-left-box {
    margin-bottom: 20px;
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

.seven-up-down-box {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    border: 2px solid #72bbef;
}

h4,
.h4 {
    font-size: 16px;
}

.up-box {
    width: 50%;
    height: 50px;
    display: flex;
    align-items: center;
    padding-left: 10px;
    padding-right: 40px;
    position: relative;
    justify-content: flex-end;
}

.up-box .up-down-book {
    position: absolute;
    left: 10px;
}

.text-end {
    text-align: right !important;
}

.up-down-odds {
    font-weight: bold;
    font-size: 18px;
}

.down-box {
    width: 50%;
    text-align: right;
    height: 50px;
    display: flex;
    align-items: center;
    padding-right: 10px;
    padding-left: 40px;
    justify-content: flex-start;
    position: relative;
}

.down-box .up-down-book {
    position: absolute;
    right: 10px;
    z-index: 1;
}

.seven-box {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
}

.seven-box img {
    height: 70px;
}

.casino-table-box-divider {
    background-color: var(--table-border);
    width: 2px;
}

.casino-table-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    border-bottom: 1px solid var(--table-border);
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

.casino-nation-detail {
    width: 60%;
}

.casino-nation-name {
    font-size: 12px;
    font-weight: bold;
}

.casino-nation-detail img {
    height: 30px;
    margin-right: 5px;
}

.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
    z-index: 1;
}

.back {
    background-color: #72bbef !important;
}

.casino-odds-box {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 5px 0;
    font-weight: bold;
    border-left: 1px solid var(--table-border);
    cursor: pointer;
    min-height: 46px;
}

.casino-odds-box {
    width: 20%;
}

.casino-odds {
    font-size: 14px;
    font-weight: bold;
    line-height: 1;
}

.lay {
    background-color: #faa9ba !important;
}

.text-yellow {
    color: #fdcf13;
}

.teenpatti-1day .suspended:after {
    width: 100% !important;
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

.trap-number-icon {
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    background: var(--theme2-bg);
    margin-bottom: 10px;
    padding: 5px;
}

.trap-number-icon {
        margin-top: 10px;
    }

    .trap-number-icon img {
    height: 50px;
    margin-right: 5px;
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
}

.casino-last-result-title a {
    color: #ffffff;
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

    .remark{
        color: #097c93 !important;
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
                <div class="casino-title"><span class="casino-name">The Trap</span><span class="d-block"><a href="#" onclick="view_rules('thetrap')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

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
                               <iframe src="<?php echo IFRAME_URL."".TRAP_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

                        <!--    <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                 <iframe src="<?php echo IFRAME_URL; echo TRAP_CODE; ?>" width="100%" height="200"
                                    style="border: 0px;"></iframe> -->
                                <div class="clock clock2digit flip-clock-wrapper">
                                    <ul class="flip play">
                                        <li class="flip-clock-before">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">4</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">4</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">3</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">3</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="flip play">
                                        <li class="flip-clock-before">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">6</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">6</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">5</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">5</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="video-overlay" style="height:200px;">
                                    <div class="row row5 text-white text-center cardblock d-none">
                                        <div class="col-6">
                                            <div style="line-height: 20px;">
                                                <b>A</b>
                                                <div class="text-yellow a_count">0</div>
                                            </div>
                                            <div class="v-slider mt-2">
                                                <div class="slick-slider slick-vertical slick-initialized">
                                                    <div class="slick-list">
                                                        <div class="slick-track"
                                                            style="opacity: 1; transform: translate3d(0px, 0px, 0px); height: 374px;">
                                                            <div data-index="0"
                                                                class="slick-slide slick-active slick-current a_card"
                                                                tabindex="-1" aria-hidden="false"
                                                                style="outline: none; width: 25px;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div style="line-height: 20px;">
                                                <b>B</b>
                                                <div class="text-yellow b_count">0</div>
                                            </div>
                                            <div class="v-slider mt-2">
                                                <div class="slick-slider slick-vertical slick-initialized">
                                                    <div class="slick-list">
                                                        <div class="slick-track "
                                                            style="opacity: 1; transform: translate3d(0px, 0px, 0px); height: 374px;">
                                                            <div data-index="0"
                                                                class="slick-slide slick-active slick-current b_card"
                                                                tabindex="-1" aria-hidden="false"
                                                                style="outline: none; width: 25px;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="casino-container teenpatti-1day">
                                <div class="table-responsive mb-1">
                                    <table class="table table-bordered mb-0">

                                        <tbody>
                                            <tr data-title="SUSPENDED">
                                                <td class="box-6"><b>Player A</b><div class="casino-nation-book market_1_b_exposure market_exposure"></div></td>
                                                <td class="suspended box-2 back text-center back-1 market_1_row  market_1_b_btn"
                                                    style="padding:15px;"><b>82</b></td>
                                                <td class="suspended box-2 lay text-center lay-1  market_1_row  market_1_l_btn"
                                                    style="padding:15px;"><b>86</b></td>
                                            </tr>
                                            <tr data-title="SUSPENDED">
                                                <td class="box-6"><b>Player B</b><div class="casino-nation-book market_2_b_exposure market_exposure"></div></td>
                                                <td class="box-2 back text-center back-1 market_2_row  market_2_b_btn"
                                                    style="padding:15px;"><b>0</b> </td>
                                                <td class="box-2 lay text-center lay-1 market_2_row  market_2_l_btn"
                                                    style="padding:15px;"><b>0</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="casino-table-box mt-3 sevenupbox other_markets">

                                </div>
                                <div class="remark text-right pr-2">
                                    <marquee class="casino-remark">

                                    </marquee>
                                </div>
                                <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=trap">View All</a></span></div>
                                <div class="casino-last-results"  id="last-result"></div>
                                <div class="trap-number-icon d-xl-none"><img src="../storage/front/img/trap/trap13.png"><img src="../storage/front/img/trap/trap14.png"><img src="../storage/front/img/trap/trap15.png"></div>
                                <!---->
                                <!---->
                                <!---->
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

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?75'></script>
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
var markettype = "TRAP";
var markettype_2 = markettype;
var back_html = "";
var lay_html = "";
var gstatus = "";
var last_result_id = '0';

function websocket(type) {
    socket = io.connect(websocketurl, {
        transports: ['websocket']
    });
    socket.on('connect', function() {
        socket.emit('Room', 'trap');
    });
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
    socket.on('game', function(data) {
       
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
                if (data1.t1[0].cards) {
                    var arr = data1.t1[0].cards.split(',');

                    var a_count = 0;
                    var b_count = 0;
                    var a_card = "";
                    var b_card = "";
                    for (var i in arr) {
                        card_details = arr[i];
                        if (card_details != 1) {
                            card_value = getType(card_details);
                            card_rank = card_value.rank;
                            if (i % 2 === 0) {
                                a_count += card_rank;
                                a_card +=
                                    `<div class="mb-1"><img src="${site_url}storage/front/img/cards_new/${card_details}.png" tabindex="-1" style="width: 100%; display: inline-block;"></div>`;
                            } else {
                                b_count += card_rank;
                                b_card +=
                                    `<div class="mb-1"><img src="${site_url}storage/front/img/cards_new/${card_details}.png" tabindex="-1" style="width: 100%; display: inline-block;"></div>`;
                            }
                        }
                    }
                    var allOne = arr.every(function(val) {
                        return val === "1";
                    });
                    if (!allOne) {
                        $(".cardblock").removeClass("d-none");
                    } else {
                        $(".cardblock").addClass("d-none");
                    }
                    $(".a_count").text(a_count);
                    $(".b_count").text(b_count);
                    $(".a_card").html(a_card);
                    $(".b_card").html(b_card);
                }
                /* if (data[0].C1 != 1) {
                    $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data[0].C1 + ".png");
                }
                if (data[0].C2 != 1) {
                    $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data[0].C2 + ".png");
                }
                if (data[0].C3 != 1) {
                    $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data[0].C3 + ".png");
                }
                if (data[1].C1 != 1) {
                    $("#card_c4").attr("src", site_url + "storage/front/img/cards/" + data[1].C1 + ".png");
                }
                if (data[1].C2 != 1) {
                    $("#card_c5").attr("src", site_url + "storage/front/img/cards/" + data[1].C2 + ".png");
                }
                if (data[1].C3 != 1) {
                    $("#card_c6").attr("src", site_url + "storage/front/img/cards/" + data[1].C3 + ".png");
                } */
            }
            clock.setValue(data.t1[0].autotime);
            $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
            $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
            eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
            var high_markets = "";
            var low_markets = "";
            var jqk_markets = "";
            for (var j in data.t2) {
                selectionid = data.t2[j].sectionId || data.t2[j].sid;
                runner = data.t2[j].nation || data.t2[j].nat;
                b1 = data.t2[j].b1;
                bs1 = data.t2[j].bs1;
                l1 = data.t2[j].l1;
                ls1 = data.t2[j].ls1;
                visible = data.t2[j].visible;
                back_html = '<span class="odds d-block"><b>' + b1 + '</b></span>';

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

                lay_html = '<span class="odds d-block"><b>' + l1 + '</b></span> ';
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
                $(".market_" + selectionid + "_l_btn").html(lay_html);

                var statuss = "";

                gstatus = data.t2[j].gstatus.toString();
                if (gstatus == "SUSPENDED" || gstatus == "0") {
                    $(".market_" + selectionid + "_l_btn").addClass("suspended");
                    $(".market_" + selectionid + "_b_btn").addClass("suspended");
                    statuss = "suspended";
                } else {
                    $(".market_" + selectionid + "_l_btn").removeClass("suspended");
                    $(".market_" + selectionid + "_b_btn").removeClass("suspended");
                }
                subtype = data.t2[j].subtype;
                if (data.t2[j].odds && visible == "1") {
                    for (var k in data.t2[j].odds) {
                        odd_selectionid = data.t2[j].odds[k].sectionId || data.t2[j].odds[k].sid;
                        odd_runner = data.t2[j].odds[k].nation || data.t2[j].odds[k].nat;
                        odd_b1 = data.t2[j].odds[k].b;
                        odd_l1 = data.t2[j].odds[k].l;
                        new_selectionid = selectionid + "_" + odd_selectionid;
                        new_runner = runner + " - " + odd_runner;
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
                        if (subtype == "highlow") {


                            if (odd_selectionid == "2") {

                                low_markets += `<div class="up-box back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">
                                                <div class="up-down-book "><div class="casino-nation-book market_${new_selectionid}_b_exposure market_exposure">${exposure}</div></div>
                                                <div class="text-end">
                                                <div class="up-down-odds">${odd_b1}</div>
                                                <span>${odd_runner}</span>
                                                </div>
                                            </div>`;
                            }
                            if (odd_selectionid == "1") {
                                high_markets += ` <div class="down-box back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">
                                                <div class="up-down-book"><div class="casino-nation-book market_${new_selectionid}_b_exposure market_exposure">${exposure}</div></div>
                                                <div class="text-start">
                                                <div class="up-down-odds">${odd_b1}</div>
                                                <span>${odd_runner}</span>
                                                </div>
                                            </div>`;
                            }
                        }
                        if (subtype == "jqk") {




                            jqk_markets +=
                                `<div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/11.jpg"><img src="../storage/front/img/andar_bahar/12.jpg"><img src="../storage/front/img/andar_bahar/13.jpg"></div>
                                                <div class="casino-nation-book market_${new_selectionid}_b_exposure market_exposure">${exposure}</div>
                                                </div>
                                                <div class="casino-odds-box back back-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_b_btn" side="Back" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_b1}" fullfancymarketrate="${odd_b1}">${odd_b1}</div>
                                                <div class="casino-odds-box lay lay-1 market_${new_selectionid}_row ${statuss} market_${new_selectionid}_l_btn" side="Lay" selectionid="${new_selectionid}" marketid="${new_selectionid}" runner="${new_runner}" marketname="${new_runner}" eventid="${eventId}" markettype="${markettype}" event_name="${markettype}" fullmarketodds="${odd_l1}" fullfancymarketrate="${odd_l1}">${odd_l1}</div>`;


                        }


                    }
                }
            }
            $(".other_markets").html(`<div class="casino-table-left-box">
                                        <h4 class="d-md-none mb-2">Player</h4>
                                        <div class="seven-up-down-box">
											${low_markets}
											${high_markets}
                                           
                                            <div class="seven-box"><img src="../storage/front/img/casinoicons/trape-seven.png"></div>
                                        </div>
                                    </div>
                                    <div class="casino-table-box-divider"></div>
                                    <div class="casino-table-right-box">
                                        <div class="casino-table-body">
                                            <div class="casino-table-row ">
                                                
			${jqk_markets}
                                            </div>
                                        </div>
                                    </div>`);
        }
    });
    socket.on('gameResult', function(args) {
        if (args.data) {
            updateResult(args.data);
        } else {
            updateResult(args['res']);
        }
    });
    socket.on('error', function(data) {});
    socket.on('close', function(data) {});
}

function clearCards() {
    refresh(markettype);
    $(".cardblock").addClass('d-none');
    /* $("#card_c1").attr("src",site_url + "storage/front/img/cards/1.png");
    $("#card_c2").attr("src",site_url + "storage/front/img/cards/1.png");
    $("#card_c3").attr("src",site_url + "storage/front/img/cards/1.png");
    $("#card_c4").attr("src",site_url + "storage/front/img/cards/1.png");
    $("#card_c5").attr("src",site_url + "storage/front/img/cards/1.png");
    $("#card_c6").attr("src",site_url + "storage/front/img/cards/1.png"); */
}

function updateResult(data) {

    if (data && data[0]) {
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;

        if (last_result_id != resultGameLast) {
            last_result_id = resultGameLast;
            refresh(markettype);
        }

        var html = "";
        casino_type = "'trap'";
        data.forEach((runData) => {

            eventId = runData.mid == 0 ? 0 : runData.mid;
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type +
                ')"  class="result ml-1 ' + (parseInt(runData.win) == 1 ? 'result-a' : 'result-b') + '">' + (
                    parseInt(runData.win) == 1 ? 'A' : 'B') + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $(".cardblock").addClass('d-none');
            /* $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c4").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c5").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c6").attr("src", site_url + "storage/front/img/cards/1.png"); */
        }
    }
}

function teenpatti(type) {
    gameType = type
    websocket();
}
teenpatti("ok");
jQuery(document).on("click", ".back-1", function() {
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
        $(".placeBet").attr('disabled', false);
        $("#inputStake").val("");

        $('.open_back_place_bet').show();
        $('#open_back_place_bet').modal("show");
    }
});
jQuery(document).on("click", ".lay-1", function() {
    $("#popup_color").removeClass("back");
    $("#popup_color").removeClass("lay");
    $("#popup_color").addClass("lay");
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
        $(".placeBet").attr('disabled', false);
        $("#inputStake").val("");

        $('.open_back_place_bet').show();
        $('#open_back_place_bet').modal("show");
    }
});

jQuery(document).on("input", "#inputStake", function() {
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
        } else {
            profit = (odds - 1) * inputStake;
        }
    }
    $("#profitLiability").text(profit.toFixed(2));
});
jQuery(document).on("click", ".label_stake", function() {
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
        } else {
            profit = (odds - 1) * inputStake;
        }
    }
    $("#profitLiability").text(profit.toFixed(2));
});

jQuery(document).on("click", "#placeBet", function() {

    $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
    $(".placeBet").attr('disabled', true);
    $(".placeBet").removeAttr("id", "placeBet");
    var last_place_bet = "";
    bet_stake_side = $("#bet_stake_side").val();
    bet_type = bet_stake_side;
    bet_event_id = $("#bet_event_id").val();
    bet_marketId = $("#bet_marketId").val();
    oddsmarketId = bet_marketId;
    eventType = 'TRAP';
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
    } else {
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
        } else {
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
    setTimeout(function() {
        $.ajax({
            type: 'POST',
            url: '../ajaxfiles/bet_place_trap.php',
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
            success: function(response) {
                var check_status = response['status'];
                var message = response['message'];
                if (check_status == 'ok') {
                    if (bet_markettype != "FANCY_ODDS") {
                        oddsNo = runsNo;
                    } else {
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
                } else {
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
                $(".placeBet").attr('disabled', false);
                $('.open_back_place_bet').hide();
                $('#open_back_place_bet').modal("hide");
            }
        });
    }, bet_sec - 2000);
});


function getType(data) {
    var data1 = data;
    if (data) {
        data = data.split('DD');
        if (data.length > 1) {
            var obj = {
                type: '[',
                color: 'red',
                ctype: 'diamond',
                card: data[0],
                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 :
                    parseInt(data[0])
            }
            return obj;
        } else {
            data = data1;
            data = data.split('HH');
            if (data.length > 1) {
                var obj = {
                    type: '{',
                    color: 'red',
                    ctype: 'heart',
                    card: data[0],
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 :
                        parseInt(data[0])
                }
                return obj;
            } else {
                data = data1;
                data = data.split('SS');
                if (data.length > 1) {
                    var obj = {
                        type: ']',
                        color: 'black',
                        ctype: 'spade',
                        card: data[0],
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 :
                            parseInt(data[0])
                    }
                    return obj;
                } else {
                    data = data1;
                    data = data.split('CC');
                    if (data.length > 1) {
                        var obj = {
                            type: '}',
                            color: 'black',
                            ctype: 'club',
                            card: data[0],
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ?
                                11 : parseInt(data[0])
                        }
                        return obj;
                    } else {
                        return 0;
                    }
                }
            }
        }
    }
    return 0;
}
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
        <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class"
            class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
            <div tabindex="0" class="toast">
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