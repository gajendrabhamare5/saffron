<?php
include("include/conn.php");
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$get_parent_ids = $conn->query("select parentSuperMDL from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

$get_access = $conn->query("select cricket_access,soccer_access,soccer_access,video_access from user_master where Id=$parentSuperMDL");
$fetch_access = mysqli_fetch_assoc($get_access);

if ($fetch_access['video_access'] != 1) {
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

    .casino-table-header,
    .casino-table-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #c7c8ca;
    }

    .teenpatti2 .casino-nation-detail {
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
    }

    .casino-nation-name {
        font-size: 16px;
        font-weight: bold;
    }

    .casino-table-full-box {
        width: 100%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

    .teen2other .casino-odds-box {
    width: 16%;
    flex-direction: row;
    justify-content: space-between;
    padding: 5px 10px;
}

.teen2other img {
    height: 35px;
}

.teen2other .casino-odds-box .casino-odds {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.teen2cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    border: 0;
    padding: 10px 10px 0 10px;
    background: #ae4600;
    color: white;
}

.card-odd-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
    margin-bottom: 4px;
    margin-right: 4px;
    cursor: pointer;
}

.card-odd-box .casino-odds {
    margin-bottom: 5px;
    font-size: 14px;
}

.card-odd-box img {
        height: 45px;
    }

    /* img.select {
        transform: scale(1.4);
        border: 2px solid #ff9800;
        border-radius: 5px;
        transition: 0.2s;
    } */

    .card-selected {
        transform: scale(1.4);
        border: 2px solid #ff9800;
        border-radius: 5px;
        transition: 0.2s;
    }



    .casino-nation-book {
        font-size: 12px;
        font-weight: bold;
        min-height: 18px;
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
        font-size: 18px;
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
        /* width: 100%;
    border-left: 1px solid var(--table-border);
    border-right: 1px solid var(--table-border);
    border-top: 1px solid var(--table-border);
    background-color: var(--bg-table-row); */
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
        background-color: var(--table-border);
        width: 2px;
    }
    .joker1-other-cards{
        background-color: #7b3607;
    }

    .text-orange {
    color: #ef910f;
    font-size: 20px;
    font-weight: bold;
}

.casino-last-result-title {
    padding: 10px;
    background-color: var(--theme2-bg);
    color: #ffffff;
    font-size: 14px;
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
}

.casino-last-result-title a {
    color: #ffffff;
}

.joker-card img {
    height: 50px;
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
                        <div class="col-md-10 featured-box">
                            <div class="row row5 teenpatti-1day">
                                <div class="col-md-9 coupon-card featured-box-detail">
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">Unlimited Joker Oneday
                                                <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('tp-rules.jpg')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> --> <!----></span> 
                                                <small role="button" class="teenpatti-rules"  onclick="view_rules('joker1')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
                                                <span class="float-right">
                                                Round ID:
                                                <span class="round_no">0</span><!--   | Min: <span>100</span> | Max: <span>500000</span> --></span>
                                        </div>
                                        <!---->
                                        <div class="video-container">
                                        <?php
                            if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".JOKER1_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
                                            <!---->
                                            <!-- <iframe class="iframedesign" src="<?php echo IFRAME_URL;
                                                            echo JOKER1_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
                                                                <div class="inn">3</div>
                                                            </div>
                                                            <div class="down">
                                                                <div class="shadow"></div>
                                                                <div class="inn">3</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="flip-clock-active">
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
                                                </ul>
                                            </div>
                                            <div class="video-overlay">
                                                <div class="videoCards">
                                                     <div>
                                        <h4 class="text-orange">Joker</h4>
                                        <div>
                                            <div><img id="select_joker" src="storage/front/img/cards_new/14.png"> </div>
                                        </div>
                                    </div>
                                                    <div>
                                                        <h3 class="text-white">PLAYER A</h3>
                                                        <div>
                                                            <img id="card_c1" src="storage/front/img/cards_new/1.png">
                                                            <img id="card_c2" src="storage/front/img/cards_new/1.png">
                                                            <img id="card_c3" src="storage/front/img/cards_new/1.png">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-white">PLAYER B</h3>
                                                        <div>
                                                            <img id="card_c4" src="storage/front/img/cards_new/1.png">
                                                            <img id="card_c5" src="storage/front/img/cards_new/1.png">
                                                            <img id="card_c6" src="storage/front/img/cards_new/1.png">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casino-container teenpatti-1day">
                                            <div class="casino-table teenpatti2">

                                                <div class="casino-table-full-box teen2cards mt-3  jokerboxhide">
                                                    <!-- <span class="casino-odds">Select your Joker</span> -->
                                                    <h4 class="w-100 text-center mb-2 joker1-other-cards">Select your Joker</h4>
                                                    <!-- <h4>Select your Joker</h4> -->
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/A.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/2.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/3.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/4.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/5.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/6.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/7.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/8.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/9.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/10.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/J.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/Q.png">
                                                    </div>
                                                    <div class="card-odd-box">
                                                        <img src="storage/front/img/cards_new/K.png">
                                                    </div>
                                                </div> 

                                                <div class="casino-table-box">
                                                    <div class="casino-table-left-box">
                                                        
                                                        <div class="casino-table-body">
                                                            <div class="casino-table-row ">
                                                                <div class="casino-nation-detail">
                                                                    <div class="casino-nation-name">Player A</div>
                                                                    <div class="casino-nation-book text-center market_14_b_exposure market_exposure"></div>
                                                                </div>
                                                                <div class="casino-odds-box back back-2 market_14_b_btn"><span class="casino-odds">1.56</span></div>
                                                                <div class="casino-odds-box lay lay-2 market_14_l_btn"><span class="casino-odds">1.61</span></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="casino-table-box-divider"></div>
                                                    <div class="casino-table-right-box">
                                                       
                                                        <div class="casino-table-body">
                                                            <div class="casino-table-row">
                                                                <div class="casino-nation-detail">
                                                                    <div class="casino-nation-name">Player B</div>
                                                                    <div class="casino-nation-book text-center market_140_exposure market_exposure"></div>
                                                                </div>
                                                                <div class="casino-odds-box back back-2 market_140_b_btn suspended-box"><span class="casino-odds">0</span></div>
                                                                <div class="casino-odds-box lay lay-2 market_140_l_btn suspended-box"><span class="casino-odds">0</span></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="casino-last-result-title"><span>Last Result</span> <span class="float-right"><a
                                                     href="casinoresults?game_type=joker1" class="">View All</a></span></div>
                                            <div id="last-result" class="last-result-container text-right mt-1"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                include("right_sidebar.php");
                                ?>
                                <div>
                                    <!---->
                                </div>
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






</body>

<script src="storage/front/js/flipclock.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?10'></script>

<script type="text/javascript">
    $(function() {
        var header = $("#sidebar-right");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= $(window).height() / 3) {
                $("#sidebar-right").css('position', 'fixed');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
            } else {
                $("#sidebar-right").css('position', 'relative');
                $("#sidebar-right").css('top', '0px');
                $("#sidebar-right").css('right', '0px');
                $("#sidebar-right").css('width', '25.5%');
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
    var markettype = "JOKER1";
    var markettype_2 = markettype;
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    var last_result_id = '0';
    var selectedCard = '14';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'joker1'); 
        }); 
        socket.on('gameIframe', function(data){
            $("#casinoIframe").attr('src',data);
        });
        socket.on('game', function(data) {
           
            data1 = data;
            if (data) {  
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
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                        $(".teen2cards").hide();
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                        $(".teen2cards").hide();
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                        $(".teen2cards").hide();
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
                        $(".teen2cards").hide();
                    }
                    if (data.t1[0].C5 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
                        $(".teen2cards").hide();
                    }
                    if (data.t1[0].C6 != 1) {
                        $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
                        $(".teen2cards").hide();
                    }

                    if(data.t1[0].C1 == 1 && data.t1[0].C2 == 1 && data.t1[0].C3 == 1 && data.t1[0].C4 == 1 && data.t1[0].C5 == 1 && data.t1[0].C6 == 1){
                        if (window.jokerPlacedForEvent != data1.t1[0].mid) {
                            $(".teen2cards").show();
                        }

                        if(oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0"){
                            $(".hideplacebet").hide();
                        }
                    }
                }
                clock.setValue(data1.t1[0].autotime);
                $(".round_no").text(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                $("#casino_event_id").val(data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid);
                eventId = data1.t1[0].mid == 0 ? 0 : data1.t1[0].mid;
                for (var j in data.t2) {
                    selectionid = data.t2[j].sectionId || data.t2[j].sid;
                    runner = data.t2[j].nation || data.t2[j].nat;
                    b1 = data.t2[j].b1;
                    bs1 = data.t2[j].bs1;
                    l1 = data.t2[j].l1;
                    ls1 = data.t2[j].ls1;
                    visible = data.t2[j].visible;
                    back_html = '<span class="odds d-block"><b>' + b1 + '</b></span> ';
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

                    var statuss="";
                    gstatus = data.t2[j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                        $(".market_" + selectionid + "_l_btn").addClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").addClass("suspended-box");
                        statuss="suspended-box";
                    } else {
                        $(".market_" + selectionid + "_l_btn").removeClass("suspended-box");
                        $(".market_" + selectionid + "_b_btn").removeClass("suspended-box");
                    }
                }
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
        $(".card-odd-box img").removeClass("card-selected");
        $("#select_joker").attr("src",site_url + "storage/front/img/cards_new/14.png");
        $(".joker-display").attr("src",site_url + "storage/front/img/cards_new/14.png");
        $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
        $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
    }

    function updateResult(data) {

        if (data && data[0]) {
            data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;
                //refresh(markettype);
            }

            var html = "";
            casino_type = "'joker1'";
            data.forEach((runData) => {

                eventId = runData.mid == 0 ? 0 : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs last-result ml-1 playerb">R</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#select_joker").attr("src",site_url + "storage/front/img/cards_new/14.png");
            $(".joker-display").attr("src",site_url + "storage/front/img/cards_new/14.png");
                $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
                $("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
            }
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");
    
    
    jQuery(document).on("click", ".close-bet-slip", function() {
        $('.bet-slip-data').remove();
        $(".back-2").removeClass("select");
        $(".lay-2").removeClass("select");
    });
    jQuery(document).on("click", ".back-2", function() {
        $(".hideplacebet").show();
        
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
            /* fullmarketodds = (fullmarketodds / 100) + 1;
            fullfancymarketrate = (fullfancymarketrate / 100) + 1;
            fullfancymarketrate = fullfancymarketrate.toFixed(2);
            fullmarketodds = fullmarketodds.toFixed(2); */
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
            return_html +=
                "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th class='place-bet-for'>(Bet for)</th><th class='place-bet-odds'>Odds</th><th class='place-bet-stake'>Stake</th><th class='place-bet-profit'>Profit</th></tr></thead><tbody>";
            return_html +=
                "<tr><td class='text-center place-bet-for'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times me-1'></i></a> <span>"+ runner +"</span></td><td class='bet-odds place-bet-odds'><div class='form-group'> <input placeholder='0' value='" +
                fullmarketodds +
                "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'></div></td><td class='bet-stakes place-bet-stake'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='" +
                eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid +
                "'/><input type='hidden' id='bet_event_name' value='" + event_name +
                "'/><input type='hidden' id='bet_market_name' value='" + marketname +
                "'/><input type='hidden' id='bet_markettype' value='" + markettype +
                "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate +
                "'/> <input type='hidden' id='oddsmarketId' value='" + marketId +
                "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name +
                "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name +
                "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='number' ></div></td><td class='text-right bet-profit place-bet-profit' id='profitLiability'>0</td></tr>";
            return_html += "<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
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
                    $button_array[] = 20000;
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
            return_html +=
                " <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake btn-place-bet'> <?php echo $button_value; ?> </button>";
            <?php
                }
                ?>
            return_html += "<div class='btn btn-sm btn-link text-dark flex-fill text-end place-bet-clear-btn'>clear</div>";
            return_html +=
                "</td></tr></tbody></table><div class='col-md-12 place-bet-action-buttons'><div> <button type='button' class='btn btn-sm btn-info float-left btn-edit' data-target='#set_btn_value' data-toggle='modal'> Edit </button> </div> <div class='joker-card'><span><img class='joker-display' src='" + site_url + "storage/front/img/cards_new/" + selectedCard + ".png'></span></div> <div><button type='button' class='btn btn-sm btn-danger close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></div></form></div></div></div>";
            $(".bet_slip_details").html(return_html);
        }
    });

    jQuery(document).on("click", ".lay-2", function() {
        $(".hideplacebet").show();
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
            /* fullfancymarketrate = (fullfancymarketrate / 100) + 1;
            fullmarketodds = (fullmarketodds / 100) + 1;
            fullfancymarketrate = fullfancymarketrate.toFixed(2);
            fullmarketodds = fullmarketodds.toFixed(2); */
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
            return_html +=
                "<div class='bet-slip-data'><div><div class='table-responsive lay'><form><table class='coupon-table table table-borderedless'><thead><tr><th class='place-bet-for'>(Bet for)</th><th class='place-bet-odds'>Odds</th><th class='place-bet-stake'>Stake</th><th class='place-bet-profit'>Profit</th></tr></thead><tbody>";
            return_html +=
                "<tr><td class='text-center place-bet-for'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times me-1'></i></a> <span>"+ runner +"</span> </td><td class='bet-odds place-bet-odds'><div class='form-group'> <input placeholder='0' value='" +
                fullmarketodds +
                "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'></div></td><td class='bet-stakes'><div class='form-group bet-stake place-bet-stake'><input type='hidden' id='bet_stake_side' value='Lay'/><input type='hidden' id='bet_event_id' value='" +
                eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid +
                "'/><input type='hidden' id='bet_event_name' value='" + event_name +
                "'/><input type='hidden' id='bet_market_name' value='" + marketname +
                "'/><input type='hidden' id='bet_markettype' value='" + markettype +
                "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate +
                "'/> <input type='hidden' id='oddsmarketId' value='" + marketId +
                "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name +
                "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name +
                "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit place-bet-profit' id='profitLiability'>0</td></tr>";
            return_html += "<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
            <?php
                $get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
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
                    $button_array[] = 20000;
                    $button_array[] = 20000;
                } else {
                    $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                    $fetch_button_value = $fetch_button_value_data['button_value'];
                    $default_stake = $fetch_button_value_data['default_stake'];
                    $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                    $button_array = explode(",", $fetch_button_value);
                }
                foreach ($button_array as $button_value) {
                ?>
            return_html +=
                " <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake btn-place-bet'> <?php echo $button_value; ?> </button>";
            <?php
                }
                ?>
            return_html += "<div class='btn btn-sm btn-link text-dark flex-fill text-end place-bet-clear-btn'>clear</div>"
            return_html +=
                "</td></tr></tbody></table><div class='col-md-12 place-bet-action-buttons'> <div><button type='button' class='btn btn-sm btn-info float-left btn-edit'> Edit </button></div> <div class='joker-card'><span><img class='joker-display' src='" + site_url + "storage/front/img/cards_new/" + selectedCard + ".png'></span></div> <div> <button type='button' class='btn btn-sm btn-danger close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div> </div></form></div></div></div>";
            $(".bet_slip_details").html(return_html);
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
        stake = $(this).attr("stake");
        eventId = $("#fullMarketBetsWrap").attr("eventid");
        $("#inputStake").val(stake);
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
        $("#placeBet").addClass('disabled');
        $(".placeBetLoader").addClass('show');
        var last_place_bet = "";
        bet_stake_side = $("#bet_stake_side").val();
        bet_type = bet_stake_side;
        bet_event_id = $("#bet_event_id").val();
        bet_marketId = $("#bet_marketId").val();
        oddsmarketId = bet_marketId;
        eventType = 'JOKER1';
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

        $(".placeBet").addClass("disable");
        /* $("#inputStake").val(""); */
        $(".back-2").removeClass("select");
        $(".lay-2").removeClass("select");
        $("#loadingMsg").show();
        $('.header_Back_' + bet_event_id).remove();
        $('.header_Lay_' + bet_event_id).remove();
        $('#betSlipFullBtn').hide();
        $('#backSlipHeader').hide();
        $('#laySlipHeader').hide();
        $(".back-2").removeClass("select");
        $(".lay-2").removeClass("select");
        $("#placeBets").addClass('disable');
        $("#bet-error-class").removeClass("b-toast-danger");
        $("#bet-error-class").removeClass("b-toast-success");
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/bet_place_joker1.php',
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
                    bet_type: bet_type,
                    joker_card: selectedCard
                },
                success: function(response) {
                    $(".placeBetLoader").removeClass('show');
                    var check_status = response['status'];
                    var message = response['message'];
                    if (check_status == 'ok') {
                        if (bet_markettype != "FANCY_ODDS") {
                            oddsNo = runsNo;
                        } else {
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
                    window.jokerPlacedForEvent = bet_event_id;
                    $("#select_joker").attr("src", site_url + "storage/front/img/cards_new/" + selectedCard + ".png");
                    $(".joker-display").attr("src", site_url + "storage/front/img/cards_new/" + selectedCard + ".png");
                    $(".teen2cards").hide();
                    } else {
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

    

    /* document.querySelectorAll(".card-odd-box img").forEach(img => {
        img.addEventListener("click", function () {

            // Remove selection only from card images
            document.querySelectorAll(".card-odd-box img")
                .forEach(i => i.classList.remove("card-selected"));

            // Add selection
            this.classList.add("card-selected");

            selectedCard = this.src.split('/').pop().replace('.png', '');
    

             const jokerImg = document.querySelector(".joker-display");

                if (!jokerImg) return;

                if (selectedCard) {
                    jokerImg.src = site_url + "storage/front/img/cards_new/" + selectedCard + ".png";
                } else {
                    jokerImg.src = site_url + "storage/front/img/cards_new/14.png"; // default
                }
        });
    }); */

    document.querySelectorAll(".card-odd-box img").forEach(img => {
        img.addEventListener("click", function () {

            const clickedCard = this.src.split('/').pop().replace('.png', '');

            const jokerImg = document.querySelector(".joker-display");

            /* if (!jokerImg) return; */

            // If clicking same card, deselect
            if (clickedCard === selectedCard) {
                this.classList.remove("card-selected");
                selectedCard = '14';
                if(jokerImg){
                    jokerImg.src = site_url + "storage/front/img/cards_new/14.png";
                }
                return;
            }

            // Remove previous selection
            document.querySelectorAll(".card-odd-box img")
                .forEach(i => i.classList.remove("card-selected"));

            // Add selection
            this.classList.add("card-selected");
            selectedCard = clickedCard;

            
            if(jokerImg){
                if (selectedCard) {
                    jokerImg.src = site_url + "storage/front/img/cards_new/" + selectedCard + ".png";
                } else {
                    jokerImg.src = site_url + "storage/front/img/cards_new/14.png"; // default
                }
            }
        });
    });



</script>
<?php

include("footer-js.php");
include("footer-result-popup.php");
?>

<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
    <div class="b-toaster-slot vue-portal-target">
        <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
            <div tabindex="0" class="toast">
                <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                    <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
                </header>
                <div class="toast-body"> </div>
            </div>
        </div>
    </div>

    </body>



</html>