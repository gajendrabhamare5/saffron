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
include("head_css.php");
?>
<style>
    .tpjudgement img {
    border: unset;
}
.tpjudgement .selected {
    border: 3px solid green !important;
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

    .casino-table {
        background-color: #c7c8ca;
    }

    .casino-table .nav {
        width: 100%;
    }
    
    .casino-table .nav .nav-item {
        flex: auto;
    }

    .tab-content>.active {
    display: block;
}

 .single, .double, .tripple {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    height: auto;
    align-items: flex-start;
    padding: 5px;
}

.lottery-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    align-content: center;
    padding: 0;
    width: 100%;
}

.lottery-box .lottery-card {
    width: 10%;
    text-align: center;
    margin: 5px 0;
}

.lottery-box .lottery-card {
        width: 20%;
    }


    .lottery-box .lottery-card img {
        width: 55px !important;
        cursor: pointer;
    }

    .random-bets {
        width: auto;
        display: flex
    ;
        flex-wrap: wrap;
        justify-content: center;
        background-color: #2c3e50b3;
        color: #ffffff;
        border-radius: 16px;
        padding: 5px;
        margin: 10px auto 0;
    }

    .random-bets h4 {
        font-size: 16px;
    }

    [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
        cursor: pointer;
    }

    .random-bets button {
        min-width: 50px;
        height: 40px;
        margin-right: 7px;
        margin-bottom: 7px;
        border-radius: 8px;
    }

    .lottery-btn.active {
        border: 1px solid #0088cce6;
        background-color: #0088cca5;
        color: #ffffff;
    }

    .lottery-buttons {
        display: flex
    ;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .lottery-buttons {
        width: 100%;
        padding: 5px;
    }

    button, input, optgroup, select, textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    button, select {
        text-transform: none;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        /* color: #212529; */
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        /* background-color: transparent; */
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .btn {
        transition: 0.5s;
        -webkit-transition: 0.5s;
        -moz-transition: 0.5s;
        -ms-transition: 0.5s;
        -o-transition: 0.5s;
        border-radius: 0;
    }

    [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
        cursor: pointer;
    }

    .lottery-buttons .btn {
        background: var(--theme1-bg);
        color: #fff;
        width: 30%;
        font-size: 18px;
    } 

    .casino-last-result-title {
        padding: 6px;
        background-color: #2c3e50d9;
        color: #ffffff;
        font-size: 14px;
        display: flex
    ;
        justify-content: space-between;
        margin-top: 4px;
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
        margin-top: 4px;
        width: 100%;
    }

    .casino-last-results {
        padding: 5px;
        margin-top: 5px;
    }

    .lottery-result-group {
       /*  padding: 5px; */
        margin-right: 5px;
        height: 28px;
        background-color: var(--theme2-bg);
        color: #ffffff;
        display: flex
    ;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        -ms-border-radius: 8px;
        -o-border-radius: 8px;
        cursor: pointer;
        margin-bottom: 5px;
    }

    .lottery-result-group {
        width: calc(20% - 5px);
    }

    .lottery-result-icon {
        margin-right: 5px;
    }

    .lottery-bets {
        display: flex
    ;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 10px;
    }

    .casino-title{
        display: flex;
    }

    .casino-title .d-block{
        /* margin-top:1px; */
    }

    .casino-title a{
        color: #fff;
        text-decoration: underline;
    }

    .lottery-rules-box {
        border: 1px solid #fdcf13;
    }

    .lottery-rules-row {
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px solid #fdcf13;
    }

    .lottery-rules-title-name {
        display: flex
    ;
        flex-wrap: wrap;
        align-items: center;
        border-right: 1px solid #fdcf13;
        width: 20%;
        justify-content: center;
        padding: 5px;
    }

    .lottery-rules-title-name > div {
        width: 100%;
    }

    .lottery-rules-title-name > div:first-child {
        font-size: 22px;
        font-weight: bold;
        color: #fdcf13;
    }

    .lottery-rules-cards {
        display: flex
    ;
        flex-wrap: wrap;
        padding: 10px;
        align-items: center;
        justify-content: center;
        width: 80%;
    }

    .lottery-rules-cards .lottery-card {
        margin-right: 5px;
        text-align: center;
    }

    .lottery-rules-cards .lottery-card img {
        width: 40px;
        height: auto;
        max-height: unset;
    }

    .nav {
        display: flex
    ;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .nav-link {
        display: block;
        padding: .5rem 1rem;
        color: #0d6efd;
        text-decoration: none;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
    }

    .nav-pills .nav-link {
        background: 0 0;
        border: 0;
        border-radius: .25rem;
    }

    .nav-pills .nav-link {
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

    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #0d6efd;
    }

    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        background-color: var(--theme2-bg);
        color: #ffffff;
    }
</style>

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
                <!-- <div class="casino-title">
                    <span class="casino-name">Lottery</span>
                    <a class="ms-1"><small>Rules</small></a>
                </div> -->
                <div class="casino-title">
                    <span class="casino-name">Lottery</span>
                    <span class="d-block"><a href="#" onclick="view_rules('lottcard')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span>
                </div>
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
                               <iframe src="<?php echo IFRAME_URL."".LOTTCARD_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

                                <!-- <iframe src="<?php echo IFRAME_URL . "" . LOTTCARD_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe> -->
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
                                </div>
                                <div class="video-overlay">
                                    <div>
                                        <div>
                                            <div class="d-flex flex-column">
                                                <img id="card_c1" src="../storage/front/img/cards/1.png">
                                                <img id="card_c2" src="../storage/front/img/cards/1.png">
                                                <img id="card_c3" src="../storage/front/img/cards/1.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="casino-detail tpjudgement">
                                <div class="casino-table">
                                    <div class="nav nav-pills" role="tablist">
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="single" aria-controls="single" aria-selected="true" class="nav-link active tab_btn single_tab_btn" data-tab_name="single" tabindex="0" href="javascrip:void(0)">Single (0)</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="double" aria-controls="double" aria-selected="false" tabindex="-1" class="nav-link tab_btn double_tab_btn" data-tab_name="double" href="javascrip:void(0)">Double (0)</a></div>
                                        <div class="nav-item"><a role="tab" data-rr-ui-event-key="tripple"  aria-controls="tripple" aria-selected="false" tabindex="-1" class="nav-link tab_btn tripple_tab_btn" data-tab_name="tripple" href="javascrip:void(0)">Tripple (0)</a></div>
                                    </div>
                                    <div class="w-100 tab-content">
                                        <div role="tabpanel" id="single" aria-labelledby="lottery-tabs-tab-single" class="fade tab-pane active tab_btn_block show">
                                            <div class="single market_1_row suspended-box">
                                            <div class="lottery-box">
                                                <div class="lottery-card"><img src="../storage/front/img/cards/A.png" class="card-image back-1 market_1_b_btn" nat_1="1"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/2.png" class="card-image back-1 market_1_b_btn" nat_1="2"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/3.png" class="card-image back-1 market_1_b_btn" nat_1="3"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/4.png" class="card-image back-1 market_1_b_btn" nat_1="4"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/5.png" class="card-image back-1 market_1_b_btn" nat_1="5"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/6.png" class="card-image back-1 market_1_b_btn" nat_1="6"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/7.png" class="card-image back-1 market_1_b_btn" nat_1="7"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/8.png" class="card-image back-1 market_1_b_btn" nat_1="8"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/9.png" class="card-image back-1 market_1_b_btn" nat_1="9"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/10.png" class="card-image back-1 market_1_b_btn" nat_1="0"></div>
                                            </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="double" aria-labelledby="lottery-tabs-tab-double" class="fade tab-pane tab_btn_block">
                                            <div class="double market_2_row suspended-box">
                                            <div class="lottery-box">
                                                <div class="lottery-card"><img src="../storage/front/img/cards/A.png" class="card-image back-1 market_2_b_btn" nat_1="1"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/2.png" class="card-image back-1 market_2_b_btn" nat_1="2"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/3.png" class="card-image back-1 market_2_b_btn" nat_1="3"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/4.png" class="card-image back-1 market_2_b_btn" nat_1="4"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/5.png" class="card-image back-1 market_2_b_btn" nat_1="5"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/6.png" class="card-image back-1 market_2_b_btn" nat_1="6"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/7.png" class="card-image back-1 market_2_b_btn" nat_1="7"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/8.png" class="card-image back-1 market_2_b_btn" nat_1="8"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/9.png" class="card-image back-1 market_2_b_btn" nat_1="9"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/10.png" class="card-image back-1 market_2_b_btn" nat_1="0"></div>
                                            </div>
                                            <div class="random-bets">
                                                <h4 class="w-100 text-center mb-1">Random Bets</h4>
                                                <button class="lottery-btn market_2_b_btn active" nat_1="5">5</button>
                                                <button class="lottery-btn market_2_b_btn active" nat_1="10">10</button>
                                                <button class="lottery-btn market_2_b_btn active" nat_1="15">15</button>
                                                <button class="lottery-btn market_2_b_btn active" nat_1="20">20</button>
                                                <button class="lottery-btn market_2_b_btn active" nat_1="25">25</button>
                                                <button class="lottery-btn market_2_b_btn active" nat_1="50">50</button>
                                                <button class="lottery-btn market_2_b_btn active" nat_1="75">75</button>
                                            </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="tripple" aria-labelledby="lottery-tabs-tab-tripple" class="fade tab-pane tab_btn_block">
                                            <div class="tripple market_3_row suspended-box">
                                            <div class="lottery-box">
                                                <div class="lottery-card"><img src="../storage/front/img/cards/A.png" class="card-image back-1 market_3_b_btn" nat_1="1"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/2.png" class="card-image back-1 market_3_b_btn" nat_1="2"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/3.png" class="card-image back-1 market_3_b_btn" nat_1="3"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/4.png" class="card-image back-1 market_3_b_btn" nat_1="4"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/5.png" class="card-image back-1 market_3_b_btn" nat_1="5"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/6.png" class="card-image back-1 market_3_b_btn" nat_1="6"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/7.png" class="card-image back-1 market_3_b_btn" nat_1="7"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/8.png" class="card-image back-1 market_3_b_btn" nat_1="8"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/9.png" class="card-image back-1 market_3_b_btn" nat_1="9"></div>
                                                <div class="lottery-card"><img src="../storage/front/img/cards/10.png" class="card-image back-1 market_3_b_btn" nat_1="0"></div>
                                            </div>
                                            <div class="random-bets">
                                                <h4 class="w-100 text-center mb-1">Random Bets</h4>
                                                <button class="lottery-btn market_3_b_btn active" nat_1="5">5</button>
                                                <button class="lottery-btn market_3_b_btn active" nat_1="10">10</button>
                                                <button class="lottery-btn market_3_b_btn active" nat_1="15">15</button>
                                                <button class="lottery-btn market_3_b_btn active" nat_1="20">20</button>
                                                <button class="lottery-btn market_3_b_btn active" nat_1="25">25</button>
                                                <button class="lottery-btn market_3_b_btn active" nat_1="50">50</button>
                                                <button class="lottery-btn market_3_b_btn active" nat_1="100">100</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lottery-buttons d-xl-none">
                                        <button class="repeat_bet btn btn-lottery suspended-box">Repeat</button>
                                        <button class="clear_bet btn btn-lottery suspended-box">Clear</button>
                                        <button class="undo_bet btn btn-lottery suspended-box">Remove</button>
                                    </div>
                                </div>
                                <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=lottcard">View All</a></span></div>
                                <div class="casino-last-results" id="last-result">
                                    <!-- <div class="lottery-result-group">
                                        <div class="lottery-result-icon">0</div>
                                        <div class="lottery-result-icon">4</div>
                                        <div class="lottery-result-icon">7</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">8</div>
                                        <div class="lottery-result-icon">4</div>
                                        <div class="lottery-result-icon">8</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">3</div>
                                        <div class="lottery-result-icon">3</div>
                                        <div class="lottery-result-icon">5</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">6</div>
                                        <div class="lottery-result-icon">5</div>
                                        <div class="lottery-result-icon">3</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">0</div>
                                        <div class="lottery-result-icon">0</div>
                                        <div class="lottery-result-icon">3</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">7</div>
                                        <div class="lottery-result-icon">3</div>
                                        <div class="lottery-result-icon">8</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">4</div>
                                        <div class="lottery-result-icon">5</div>
                                        <div class="lottery-result-icon">0</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">4</div>
                                        <div class="lottery-result-icon">6</div>
                                        <div class="lottery-result-icon">5</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">0</div>
                                        <div class="lottery-result-icon">4</div>
                                        <div class="lottery-result-icon">1</div>
                                    </div>
                                    <div class="lottery-result-group">
                                        <div class="lottery-result-icon">7</div>
                                        <div class="lottery-result-icon">4</div>
                                        <div class="lottery-result-icon">0</div>
                                    </div> -->
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

    <script type="text/javascript" src="../js/socket.io.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
    <script src="../storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src='footer-js.js?75'></script>

    <?

include("betpopcss.php");
?>

    <script type="text/javascript">
        $(document).on('click', '.tab_btn', function(e) {
            var tab_name = $(this).data('tab_name');

            $(".tab_btn").removeClass("active");
            $(".tab_btn").removeClass("show");
            $("." + tab_name + "_tab_btn").addClass("active");
            $("." + tab_name + "_tab_btn").addClass("show");
            $(".tab_btn_block").hide();
            $(".tab_btn_block").removeClass("active");
            $(".tab_btn_block").removeClass("show");
            $("#" + tab_name).addClass("active");
            $("#" + tab_name).addClass("show");
            $("#" + tab_name).show();
            closeBetSlip();
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
        var markettype = "LOTTCARD";
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
                socket.emit('Room', 'lottcard');
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

                        if (data.t1[0].C1 != 1) {
                            $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
                        }

                        if (data.t1[0].C2 != 1) {
                            $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
                        }

                        if (data.t1[0].C3 != 1) {
                            $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
                        }




                    }
                    clock.setValue(data.t1[0].autotime);
                    $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                    $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                    eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

                    for (var j in data['t2']) {
                        selectionid = parseInt(data['t2'][j].sid);
                        runner = data['t2'][j].nat || data['t2'][j].nation;
                        b1 = data['t2'][j].b1;
                        l1 = data['t2'][j].l1;



                        markettype = "LOTTCARD";


                        $(".market_" + selectionid + "_b_value").text(b1);
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



                        gstatus = data['t2'][j].gstatus.toString();
                        if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                            $(".market_" + selectionid + "_row").addClass("suspended");
                            $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                            $(".btn-lottery").addClass("suspended");
						$(".btn-lottery").css("pointer-events", "none");
                        } else {
                            $(".market_" + selectionid + "_b_btn").addClass("back-1");
                            $(".market_" + selectionid + "_row").removeClass("suspended");
                            $(".btn-lottery").removeClass("suspended");
						$(".btn-lottery").css("pointer-events", "");
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


        function updateResult(data) {
            if (data && data[0]) {
                data = JSON.parse(JSON.stringify(data));
                resultGameLast = data[0].mid;

                if (last_result_id != resultGameLast) {
                    last_result_id = resultGameLast;
                    //refresh(markettype);
                }

                var html = "";
                casino_type = "'lottcard'";
                data.forEach((runData) => {

                    ab = "playerb";
                    ab1 = runData.win;

                    eventId = runData.mid == 0 ? 0 : runData.mid;
                    
                    html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' lottery-result-group"><div class="lottery-result-icon">' + ab1 + '</div></span>';
                });
                $("#last-result").html(html);
                if (oldGameId == 0 || oldGameId == resultGameLast) {



                }
            }
        }

        function clearCards() {
            refresh(markettype);
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
        }

        function teenpatti(type) {
            gameType = type
            websocket();
        }
        teenpatti("ok");

    /* jQuery(document).on("click", ".undo_bet", function() {
        button_action('undo');
    });
    jQuery(document).on("click", ".repeat_bet", function() {
        button_action('repeat');
    });
    jQuery(document).on("click", ".clear_bet", function() {
        button_action('clear');
    });
    function button_action(action_type){
        $.ajax({
				 type: 'POST',
				 url: '../ajaxfiles/bet_action_lootcard.php',
				 dataType: 'json',
				 data: {eventId:eventId,eventType:'LOTTCARD',action_type:action_type},
				 success: function(response) {
                    if(response.status == "ok"){
                    var message="";
                    if(action_type=="undo"){
                        message="Bets remove successfully";
                    }
                    else if(action_type=="clear"){
                        message="Bets clear successfully";
                    }
                    else if(action_type=="repeat"){
                        message="Bets repeated successfully";
                    }
                    toastr.clear()
                            toastr.success("", message, {
                                "timeOut": "3000",
                                "iconClass":"toast-success",
                                "positionClass":"toast-top-center",
                                "extendedTImeout": "0"
                            });
                    }else{
                        toastr.clear()
                            toastr.error("", message, {
                                "timeOut": "3000",
                                "iconClass":"toast-success",
                                "positionClass":"toast-top-center",
                                "extendedTImeout": "0"
                            });
                    }
					fetch_bets();
                    refresh(markettype);
				 }
			 });
    } */
        var nat_1 = [];
        var nat_count = 0;
        var back = 0;
        var lay = 0;
        var lottery = 0;

        jQuery(document).on("click", ".back-1", function() {

            var activeTabId = $(".tab_btn_block.active").attr("id");
            if (lay > 0) {
                return false;
            }

            var bigger = 1;

            if (activeTabId == "double") {
                bigger = 2;
            }
            if (activeTabId == "tripple") {
                bigger = 3;
            }
            if (lottery == "1") {
                return false;
            }
            if (activeTabId == "single") {
                nat_1 = [];
                nat_1_temp = $(this).attr("nat_1");
                check_already = nat_1.includes(nat_1_temp);
                if(check_already){
                    return false;
                }
                
                nat_1.push(nat_1_temp);
                nat_count++;
            } else {
                nat_1_temp = $(this).attr("nat_1");
                check_already = nat_1.includes(nat_1_temp);
                if(check_already){
                    return false;
                }
                nat_1.push(nat_1_temp);
                nat_count++;
                $(this).addClass("selected");
                if (nat_count != bigger) {
                    return false;
                }
            }




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


                return_html = "";
                var return_ball = "";
                var nat_1_string = nat_1.join();
                if (nat_1) {
                    for (var j in nat_1) {
                        return_ball += `<img class="ballss" src="../storage/img/lottery/ball${nat_1[j]}.png">`;
                    }
                }
                $("#inputStake").val();
                $("#market_runner_label").html(return_ball);
                $("#bet_stake_side").val("Back");
                $("#odds_val").val(fullmarketodds);
                $("#bet_event_id").val(eventId);
                $("#bet_marketId").val(marketId);
                $("#bet_event_name").val(event_name);
                $("#bet_market_name").val(marketname);
                $("#bet_markettype").val(markettype);
                $("#fullfancymarketrate").val(fullfancymarketrate);
                $("#oddsmarketId").val(marketId);
                $("#market_runner_name").val(market_runner_name + " " + nat_1_string);
                $("#market_odd_name").val(market_odd_name);

                $('#profitLiability').text('');
                $(".placeBet").attr('disabled', false);
                $("#inputStake").val("");

                $('.open_back_place_bet').show();
                $('#open_back_place_bet').modal("show");
            }
        });


        jQuery(document).on("click", ".lottery-btn", function() {
            lottery = 1;
            var activeTabId = $(".tab_btn_block.active").attr("id");
            if (lay > 0) {
                return false;
            }

            var bigger = 1;
            nat_1 = [];
            nat_count = 0;

            $(this).addClass("selected");


            $("#popup_color").removeClass("back");
            $("#popup_color").removeClass("lay");
            $("#popup_color").addClass("back");

            var fullmarketodds = $(this).attr("fullmarketodds");
            if (fullmarketodds != "") {
                nat_1_temp = $(this).attr("nat_1");
                /* check_already = nat_1.includes(nat_1_temp);
                if(check_already){
                    return false;
                } */
                nat_1.push(nat_1_temp);
                nat_count++;
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


                return_html = "";
                var return_ball = "";
                var nat_1_string = nat_1.join();

                $("#inputStake").val();
                $("#market_runner_label").text(market_runner_name +" "+nat_1_string);
                $("#bet_stake_side").val("Back");
                $("#odds_val").val(fullmarketodds);
                $("#bet_event_id").val(eventId);
                $("#bet_marketId").val(marketId);
                $("#bet_event_name").val(event_name);
                $("#bet_market_name").val(marketname);
                $("#bet_markettype").val(markettype);
                $("#fullfancymarketrate").val(fullfancymarketrate);
                $("#oddsmarketId").val(marketId);
                $("#market_runner_name").val(market_runner_name + " " + nat_1_string);
                $("#market_odd_name").val(market_odd_name);

                $('#profitLiability').text('');
                $(".placeBet").attr('disabled', false);
                $("#inputStake").val("");

                $('.open_back_place_bet').show();
                $('#open_back_place_bet').modal("show");
            }
        });

        jQuery(document).on("click", ".lay-1", function() {


            if (back > 0) {
                return false;
            }

            nat_1_temp = $(this).attr("nat_1");

            check_already = nat_1.includes(nat_1_temp);
            if (check_already) {
                return false;
            }
            nat_1.push(nat_1_temp);
            nat_count++;
            $(this).addClass("selected");
            if (nat_count != 3) {
                return false;
            }

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


                return_html = "";
                var nat_1_string = nat_1.join();
                $("#inputStake").val();
                $("#market_runner_label").text(market_runner_name + " " + nat_1_string);
                $("#bet_stake_side").val("Lay");
                $("#odds_val").val(fullmarketodds);
                $("#bet_event_id").val(eventId);
                $("#bet_marketId").val(marketId);
                $("#bet_event_name").val(event_name);
                $("#bet_market_name").val(marketname);
                $("#bet_markettype").val(markettype);
                $("#fullfancymarketrate").val(fullfancymarketrate);
                $("#oddsmarketId").val(marketId);
                $("#market_runner_name").val(market_runner_name + " " + nat_1_string);
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
        jQuery(document).on("click", ".close-bet-slip", closeBetSlip);

function closeBetSlip() {
    back = 0;
    lay = 0;
    nat_count = 0;
    nat_1 = [];
    random=false;
    lottery = 0;
}
        jQuery(document).on("click", "#placeBet", function() {

            $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');

            $(".placeBet").attr('disabled', true);

            $(".placeBet").removeAttr("id", "placeBet");

            $("#bet-error-class").removeClass("b-toast-danger");
            $("#bet-error-class").removeClass("b-toast-success");

            var activeTabId = $(".tab_btn_block.active").attr("id");
		var bigger = 1;

		if (activeTabId == "double") {
			bigger = 2;
		}
		if (activeTabId == "tripple") {
			bigger = 3;
		}
		if (lottery == "1") {
			bigger = 1;
		}

            if (nat_count != bigger) {
                toastr.clear()
					toastr.warning("", message, {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-danger");*/

                $("#errorMsgText").text("Bet Not Confirmed Card Not Valid");
                $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
                $(".placeBet").attr("id", "placeBet");
                        $("#placeBet").html('Submit');
                        $(".placeBet").attr('disabled', false);
                        return true;
            }
            var last_place_bet = "";
            nat_1 = [];
            
            nat_count = 0;

            bet_stake_side = $("#bet_stake_side").val();
            bet_type = bet_stake_side;
            bet_event_id = $("#bet_event_id").val();
            bet_marketId = $("#bet_marketId").val();
            oddsmarketId = bet_marketId;
            eventType = 'LOTTCARD';
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


            setTimeout(function() {
                $.ajax({
                    type: 'POST',
                    url: '../ajaxfiles/bet_place_lottcard.php',
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
                        random: lottery,
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




        $(document).ready(function() {
            $('#open_back_place_bet').on('hide.bs.modal', function() {
                $(".back-1").removeClass("select");
                $(".lay-1").removeClass("select");
                back = 0;
                lay = 0;
                nat_count = 0;
                nat_1 = [];
                lottery = 0;
                $(".selected").removeClass("selected");
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
                <button type="button" data-dismiss="modal" class="close close-bet-slip">&times;</button>
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
                            <button class="btn btn-danger" data-dismiss="modal" class="close close-bet-slip">Reset</button>
                            <button class="btn btn-success placeBet" id="placeBet" disabled>Place Bet</button>
                        </div>
                             <div class="mt-1 d-flex"><span>Range: 10 to 20k</span></div>
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