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

if ($fetch_access['video_access'] != 1) {
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

    .andar-box {
        background-color: #ffa07a;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        align-content: center;
    }

    .andar-box,
    .andarbg3 {
        background-color: #fc424280;
    }

    .ab-title {
        width: 10%;
        text-align: center;
        border-left: 1px solid #000;
        display: flex;
        flex-wrap: wrap;
        align-content: center;
        justify-content: center;
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        font-weight: bold;
    }

    .ab-title {
        writing-mode: vertical-lr;
        text-orientation: upright;
    }

    .ab-cards {
        width: 90%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        border: 1px solid #000;
        padding: 10px;
        padding-bottom: 0;
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

    .casino-odds {
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
    }

    .card-odd-box .casino-odds {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .card-odd-box img {
        height: 44px;
    }

    .bahar-box {
        background-color: #90ee90;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        align-content: center;
    }

    .bahar-box,
    .baharbg3 {
        background-color: #fdcf1380;
    }

    .casino-title {
        display: flex;
    }

    .casino-title .d-block {
        margin-top: 1px;
    }

    .casino-title a {
        color: #fff;
        text-decoration: underline;
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

    .video-overlay .ab-rtlslider1 {
        width: 90px !important;
    }

    .video-overlay img {
        width: 24px !important;
        margin-right: unset !important;
    }

    /* .card-inner {
        height: 40px;
    }
 */
    #andar-cards, #bahar-cards {
    visibility: hidden;
}
.owl-loaded {
    visibility: visible !important;
}


#cards_data h4 {
    font-size: 16px !important;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<body cz-shortcut-listen="true">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div>
            <?php
            include("header.php");
            ?>
            <div class="main-content">
                <!---->
                <!---->
                <div>
                    <div class="casino-title"><span class="casino-name">ANDAR BAHAR 150 cards</span><span class="d-block"><a href="#" onclick="view_rules('ab204')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                    <?php
                    include("casino_header.php");
                    ?>
                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">

                            <!---->
                            <div class="casino-video">


                                <?php
                                if (!empty(IFRAME_URL_SET)) {
                                ?>
                                    <iframe src="<?php echo IFRAME_URL . "" . AB4_CODE; ?>" width="100%" height="250px" style="border: 0px;"></iframe>
                                <?php

                                } else {
                                ?>
                                    <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                                }
                                ?>

                                <!-- <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <iframe src="<?php echo IFRAME_URL;
                                                echo AB4_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe> -->
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
                                <div class="video-overlay" style="">
                                    <div id="game-cards">
                                        <div class="mt-1">
                                            <div class="nextcard">
                                                <span class="text-white">Next Card Count: <span class="text-warning"><b class="runnernext"></b></span></span>

                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <p class="text-white mb-0"><b>Andar</b></p>
                                            <div id="andar-cards" class="ab-rtlslider ab-rtlslider1 owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage" id="cards_1" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 196px;">

                                                    </div>
                                                </div>
                                                <div class="owl-nav">
                                                    <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                    <button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
                                                </div>
                                                <div class="owl-dots disabled"></div>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <p class="text-white mb-0"><b>Bahar</b></p>
                                            <div id="bahar-cards" class="ab-rtlslider ab-rtlslider1 owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage" id="cards_2" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 224px;">


                                                    </div>
                                                </div>
                                                <div class="owl-nav">
                                                    <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                    <button type="button" role="presentation" class="owl-next"><span aria-label="Next">&#8250;</span></button>
                                                </div>
                                                <div class="owl-dots disabled"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="casino-container andar-bahar">
                                <div class="casino-table">
                                    <div class="casino-table-box">
                                        <div class="andar-box market_1_row">
                                            <div class="ab-title">ANDAR</div>
                                            <div class="ab-cards">
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_1_b_value">1</div>
                                                    <div class="back-1 market_1_b_btn"><img class="ab_cards_blank" id="ab_cards_1" src="../storage/front/img/andar_bahar/1.jpg"></div>
                                                    <div class="casino-nation-book market_1_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_2_b_value">1</div>
                                                    <div class="back-1 market_2_b_btn"><img class="ab_cards_blank" id="ab_cards_2" src="../storage/front/img/andar_bahar/2.jpg"></div>
                                                    <div class="casino-nation-book market_2_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_3_b_value">2</div>
                                                    <div class="back-1 market_3_b_btn"><img class="ab_cards_blank" id="ab_cards_3" src="../storage/front/img/andar_bahar/3.jpg"></div>
                                                    <div class="casino-nation-book market_3_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_4_b_value">0</div>
                                                    <div class="back-1 market_4_b_btn"><img class="ab_cards_blank" id="ab_cards_4" src="../storage/front/img/andar_bahar/4.jpg"></div>
                                                    <div class="casino-nation-book market_4_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_5_b_value">2</div>
                                                    <div class="back-1 market_5_b_btn"><img class="ab_cards_blank" id="ab_cards_5" src="../storage/front/img/andar_bahar/5.jpg"></div>
                                                    <div class="casino-nation-book market_5_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_6_b_value">3</div>
                                                    <div class="back-1 market_6_b_btn"><img class="ab_cards_blank" id="ab_cards_6" src="../storage/front/img/andar_bahar/6.jpg"></div>
                                                    <div class="casino-nation-book market_6_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_7_b_value">1</div>
                                                    <div class="back-1 market_7_b_btn"><img class="ab_cards_blank" id="ab_cards_7" src="../storage/front/img/andar_bahar/7.jpg"></div>
                                                    <div class="casino-nation-book market_7_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_8_b_value">2</div>
                                                    <div class="back-1 market_8_b_btn"><img class="ab_cards_blank" id="ab_cards_8" src="../storage/front/img/andar_bahar/8.jpg"></div>
                                                    <div class="casino-nation-book market_8_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_9_b_value">0</div>
                                                    <div class="back-1 market_9_b_btn"><img class="ab_cards_blank" id="ab_cards_9" src="../storage/front/img/andar_bahar/9.jpg"></div>
                                                    <div class="casino-nation-book market_9_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_10_b_value">2</div>
                                                    <div class="back-1 market_10_b_btn"><img class="ab_cards_blank" id="ab_cards_10" src="../storage/front/img/andar_bahar/10.jpg"></div>
                                                    <div class="casino-nation-book market_10_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_11_b_value">2</div>
                                                    <div class="back-1 market_11_b_btn"><img class="ab_cards_blank" id="ab_cards_11" src="../storage/front/img/andar_bahar/11.jpg"></div>
                                                    <div class="casino-nation-book market_11_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_12_b_value">1</div>
                                                    <div class="back-1 market_12_b_btn"><img class="ab_cards_blank" id="ab_cards_12" src="../storage/front/img/andar_bahar/12.jpg"></div>
                                                    <div class="casino-nation-book market_12_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_13_b_value">1</div>
                                                    <div class="back-1 market_13_b_btn"><img class="ab_cards_blank" id="ab_cards_13" src="../storage/front/img/andar_bahar/13.jpg"></div>
                                                    <div class="casino-nation-book market_13_b_exposure market_exposure"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bahar-box market_21_row">
                                            <div class="ab-title">BAHAR</div>
                                            <div class="ab-cards">
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_21_b_value">1</div>
                                                    <div class="market_21_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_21" src="../storage/front/img/andar_bahar/1.jpg"></div>
                                                    <div class="casino-nation-book market_21_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_22_b_value">1</div>
                                                    <div class="market_22_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_22" src="../storage/front/img/andar_bahar/2.jpg"></div>
                                                    <div class="casino-nation-book market_22_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_23_b_value">2</div>
                                                    <div class="market_23_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_23" src="../storage/front/img/andar_bahar/3.jpg"></div>
                                                    <div class="casino-nation-book market_23_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_24_b_value">0</div>
                                                    <div class="market_24_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_24" src="../storage/front/img/andar_bahar/4.jpg"></div>
                                                    <div class="casino-nation-book market_24_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_25_b_value">2</div>
                                                    <div class="market_25_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_25" src="../storage/front/img/andar_bahar/5.jpg"></div>
                                                    <div class="casino-nation-book market_25_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_26_b_value">3</div>
                                                    <div class="market_26_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_26" src="../storage/front/img/andar_bahar/6.jpg"></div>
                                                    <div class="casino-nation-book market_26_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_27_b_value">1</div>
                                                    <div class="market_27_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_27" src="../storage/front/img/andar_bahar/7.jpg"></div>
                                                    <div class="casino-nation-book market_27_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_28_b_value">2</div>
                                                    <div class="market_28_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_28" src="../storage/front/img/andar_bahar/8.jpg"></div>
                                                    <div class="casino-nation-book market_28_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_29_b_value">0</div>
                                                    <div class="market_29_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_29" src="../storage/front/img/andar_bahar/9.jpg"></div>
                                                    <div class="casino-nation-book market_29_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_30_b_value">2</div>
                                                    <div class="market_30_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_30" src="../storage/front/img/andar_bahar/10.jpg"></div>
                                                    <div class="casino-nation-book market_30_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_31_b_value">2</div>
                                                    <div class="market_31_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_31" src="../storage/front/img/andar_bahar/11.jpg"></div>
                                                    <div class="casino-nation-book market_31_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_32_b_value">1</div>
                                                    <div class="market_32_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_32" src="../storage/front/img/andar_bahar/12.jpg"></div>
                                                    <div class="casino-nation-book market_32_b_exposure market_exposure"></div>
                                                </div>
                                                <div class="card-odd-box">
                                                    <div class="casino-odds market_33_b_value">1</div>
                                                    <div class="market_33_b_btn back-1"><img class="ab_cards_blank" id="ab_cards_33" src="../storage/front/img/andar_bahar/13.jpg"></div>
                                                    <div class="casino-nation-book market_33_b_exposure market_exposure"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=ab4">View All</a></span></div>
                                <div class="casino-last-results" id="last-result"></div>



                            </div>
                            <!---->
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
    </div>


    <script type="text/javascript" src="../js/socket.io.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
    <script src="../storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src='footer-js.js?68'></script>
    <?

    include("betpopcss.php");
    ?>
    <script type="text/javascript">
         (function($) {


            carousel_start();

            jQuery("#andar_div").owlCarousel({

                loop: false,
                margin: 1,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3
                    },

                    600: {
                        items: 3
                    },

                    1000: {
                        items: 3
                    },
                }
            });
            jQuery("#bahar_div").owlCarousel({

                loop: false,
                margin: 1,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3
                    },

                    600: {
                        items: 3
                    },

                    1000: {
                        items: 3
                    },
                }
            });

        }(jQuery));


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
        var markettype = "AB4";
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
                socket.emit('Room', 'ab4');
            });
            socket.on('gameIframe', function(data) {
                $("#casinoIframe").attr('src', data);
            });
            socket.on('game', function(data) {
                
                if (data && data['t1'] && data['t1'][0]) {
                    if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                        setTimeout(function() {
                            clearCards();
                        }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                    }
                    oldGameId = data.t1[0].mid;
                    if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                        $(".casino-remark").text(data.t1[0].remark);


                    }
                    clock.setValue(data.t1[0].autotime);
                    $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                    $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                    eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

                  
                    for (var j in data['t1']) {


                        allcards = data['t1'][j].cards;
                        var ball = [];
                        var aall = [];
                        var count_non_ones = 0;
                        var count_non_ones_new = 0;

                         acards_html_array = [];
                        var acards_html = "";
                        var len1 = 0;

                        bcards_html_array = [];
                        var bcards_html = "";
                        var lenb = 0;

                       

                        // Loop through the array and push values to the appropriate array
                        for (var i = 0; i < allcards.length; i++) {

                            if (allcards[i] != "1") {
                                count_non_ones++;
                                if (i % 2 === 0) {
                                    ball.push(allcards[i]); // For even indices
                                     bcards_html_array.push('  <div class="owl-item " id="owl_bc_img_id_' + (ball.length - 1) + '"  style=""><div class="item"><img src="../storage/front/img/cards_new/' + allcards[i] + '.png"></div></div>');
                               // bcards_html += bcards_html_array[lenb];

                                lenb++;
                                } else {
                                    aall.push(allcards[i]); // For odd indices
                                     acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id' + (aall.length - 1) + '" style="margin-right:25px !important;"><div class="item"><img src="../storage/front/img/cards_new/' + allcards[i] + '.png"></div></div>');
                                       // acards_html += acards_html_array[len1];

                                        len1++;
                                }
                            }
                        } 
                        $(".nextcard").hide();
                        if (count_non_ones > 0) {
                            count_non_ones_new = count_non_ones;
                            count_non_ones = count_non_ones + 1;
                            
                            if (count_non_ones % 2 === 0) {
                                count_non_ones += " / Bahar";
                                 $(".bahar-box").addClass("suspended");
                                $(".andar-box").removeClass("suspended");
                            } else {
                                count_non_ones += " / Andar";
                                 $(".andar-box").addClass("suspended");
                                $(".bahar-box").removeClass("suspended");
                            }
                            $(".nextcard").show();
                            $(".runnernext").html(count_non_ones);
                        }
                       

                      const $andar = $('#andar-cards');

if ($andar.hasClass('owl-loaded')) {
   
    
    if (aall.length > 0) {
        $andar.trigger('replace.owl.carousel', [jQuery("")]);
        acards_html_array.reverse();
        for (let i = 0; i < acards_html_array.length; i++) {
            $andar.trigger('add.owl.carousel', [jQuery(acards_html_array[i])]);
        }
        $andar.trigger('refresh.owl.carousel');
    }

    
}


                        
       const $bahar = $('#bahar-cards');

if ($bahar.hasClass('owl-loaded')) {
   
    
    if (ball.length > 0) {
         $bahar.trigger('replace.owl.carousel', [jQuery("")]);
        bcards_html_array.reverse();
        for (let i = 0; i < bcards_html_array.length; i++) {
            $bahar.trigger('add.owl.carousel', [jQuery(bcards_html_array[i])]);
        }
          $bahar.trigger('refresh.owl.carousel');
    }

  
}





                    }
                    var bet_card="";
                    for (var j in data['t2']) {
                        bet_card =  data['t2'][j].sid.toString();
                         gstatus =  data['t2'][j].gstatus.toString();
                        if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                           $(".andar-box, .bahar-box").addClass("suspended");
                        } 
                    }
                    for (var j in data['t3']) {
                        selectionid = parseInt(data['t3'][j].sid);
                        runner = data['t3'][j].nat || data['t3'][j].nation;
                        b1 = data['t3'][j].b1;
                        l1 = data['t3'][j].l1;


                        markettype = "AB4";
                        //$(".ab_cards_blank").attr("src", "../storage/front/img/andar_bahar/0.jpg");
                       
                        if (count_non_ones_new % 2 === 0) {
                            // $(".market_21_row").addClass("suspended");
                            // $(".market_1_row").removeClass("suspended");
                            $(".bahar-box").addClass("suspended");
                            $(".andar-box").removeClass("suspended");
                           // $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/" + selectionid + ".jpg");
                             
                        }else{
                            // $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/" + selectionid + ".jpg");
                        //    $(".market_21_row").removeClass("suspended");
                        //     $(".market_1_row").addClass("suspended");
                         $(".andar-box").addClass("suspended");
                            $(".bahar-box").removeClass("suspended");
                            
                        }
                         $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                         $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                         $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                         $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                         $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                         $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                         $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                         $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                         $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", 2);
                         $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", 2);
                         $(".market_" + selectionid + "_b_btn").attr("bet_card", bet_card);
                         $(".market_"+selectionid+"_b_value").html(l1); 

                       /* $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
                        $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                        $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                        $(".market_" + selectionid + "_l_btn").attr("bet_card", bet_card);
                        $(".market_" + selectionid + "_l_value").html(l1);*/


                        /*  gstatus = data['t2'][j].gstatus.toString();
                         if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                             $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/0.jpg");
                             $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                             $(".market_"+selectionid+"_row").addClass("suspended");
                         } else {
                             $(".market_" + selectionid + "_b_btn").addClass("back-1");
                             $("#ab_cards_" + selectionid).attr("src", "../storage/front/img/andar_bahar/" + selectionid + ".jpg");
                             $(".market_"+selectionid+"_row").removeClass("suspended");
                         } */
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
            $(".nextcard").hide();
            $("#cards_1").html("")
            $("#cards_2").html("");
        }

        function updateResult(data) {
            
            if (data && data[0]) {
                resultGameLast = data[0].mid;

                if (last_result_id != resultGameLast) {
                    last_result_id = resultGameLast;

                }

                html = "";
                var ab = "";
                var ab1 = "";
                casino_type = "'ab4'";
                data.forEach((runData) => {

                    ab = "result-b";
                    ab1 = "R";

                    eventId = runData.mid == 0 ? 0 : runData.mid;
                    html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1  ' + ab + ' result">' + ab1 + '</span>';

                });

                $("#player_1_value").removeClass("text-success");
                $("#player_2_value").removeClass("text-success");
                $("#player_3_value").removeClass("text-success");
                $("#player_4_value").removeClass("text-success");


                $("#last-result").html(html);
                if (oldGameId == 0 || oldGameId == resultGameLast) {
                    $("#cards_1").html("");
                    $(".nextcard").hide();
                    $("#cards_2").html("");
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
                market_odd_name = $(this).attr("bet_card");
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
                market_odd_name = $(this).attr("bet_card");
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
            eventType = 'AB4';
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
                    url: '../ajaxfiles/bet_place_ab204.php',
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
                                "iconClass": "toast-success",
                                "positionClass": "toast-top-center",
                                "extendedTImeout": "0"
                            });
                            /*$("#bet-error-class").addClass("b-toast-success");*/
                        } else {
                            toastr.clear()
                            toastr.warning("", message, {
                                "timeOut": "3000",
                                "iconClass": "toast-warning",
                                "positionClass": "toast-top-center",
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


       
        function carousel_start() {
            jQuery("#andar-cards").owlCarousel({
                rtl: true,
                loop: false,
                margin: 1,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3
                    },

                    600: {
                        items: 3
                    },

                    1000: {
                        items: 3
                    },
                }
            });
            jQuery("#bahar-cards").owlCarousel({
                rtl: true,
                loop: false,
                margin: 1,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3
                    },

                    600: {
                        items: 3
                    },

                    1000: {
                        items: 3
                    },
                }
            });
        }
    </script>
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
                            <div class="mt-1 d-flex"><span>Range: 100 to 10k</span></div>
                    </div>
                </div>
                <!---->
            </div>
        </div>
    </div>
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
    </div>
    <?php
    include "footer.php";
    include "footer-result-popup.php";
    ?>

</html>