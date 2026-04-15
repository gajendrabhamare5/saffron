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

.casino-table {
        background-color: #f7f7f7;
        color: #333;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .casino-table-header, .casino-table-row {
    display: flex
;
    flex-wrap: wrap;
    justify-content: space-between;
    border-bottom: 1px solid #c7c8ca;
}

.casino-nation-detail {
    display: flex
;
    align-items: flex-start;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: center;
    padding-left: 5px;
    min-height: 46px;
}

.casino-table-header .casino-nation-detail {
    font-weight: bold;
    min-height: unset;
}

.casino-nation-detail {
    width: 40%;
}

.casino-table-header .casino-nation-detail {
        width: 0;
        padding: 0;
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

 .casino-odds-box {
        width: 40%;
    }

.casino-table-header .casino-odds-box {
    cursor: unset;
    padding: 2px;
    min-height: unset;
    height: auto !important;
}

/*.casino-odds-box {
    width: 10%;
}*/

.casino-table-header .casino-odds-box {
    width: 16.66%;
}

.flip-card {
    background-color: transparent;
    perspective: 1000px;
    height: 50px;
    width: 40px;
    margin-right: 5px;
}

.flip-card {
        height: 20px;
        width: 16px;
    }

    .flip-card:last-child {
    margin-right: 0;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.casino-odds-box img {
    height: 100%;
    width: 100%;
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.flip-card-back {
    transform: rotateY(180deg);
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -ml-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
}

.casino-table-full-box {
    width: 100%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
}

    .casino-table-header .casino-nation-detail {
        width: 0;
        padding: 0;
    }

    .casino-nation-detail {
        width: 60%;
    }

    .casino-nation-name {
    font-size: 12px;
    font-weight: bold;
}

ul, ol {
    margin-bottom: 0;
    padding: 0;
}

.nav {
    display: flex
;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

.nav-tabs {
    border-bottom: 1px solid #dee2e6;
}

.main-container .nav-tabs {
        background-color: #0088cc;
        border-bottom: 0;
        box-shadow: 0px -5px 5px -5px rgba(0, 0, 0, 0.5);
        position: relative;
        width: 100%;
        flex-wrap: nowrap;
    }

    .nav-tabs .nav-item {
    padding: 10px 0;
    flex: auto;
}

    .main-container .nav-tabs .nav-item {
        display: flex
;
        align-items: center;
        padding: 5px 0;
    }

        .main-container .nav-tabs .nav-item {
        padding: 5px 0;
    }

        .casino-page-container .casino-table-full-box .nav-tabs .nav-item {
        flex: 1;
    }

    .nav-link {
    display: block;
    padding: .5rem 1rem;
    color: #0d6efd;
    text-decoration: none;
    transition: color .15sease-in-out, background-color .15sease-in-out, border-color .15sease-in-out;
}

[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}

.nav-tabs .nav-link {
    margin-bottom: -1px;
    background: 0 0;
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
}

.nav-tabs .nav-link {
    color: #ffffff;
    border: 0;
    border-right: 1px solid #ffffff;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ml-border-radius: 0;
    -o-border-radius: 0;
    padding: 0 8px;
    font-weight: bold;
    text-transform: us;
    position: relative;
    text-align: center;
    text-transform: uppercase;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #ffffff;
    background-color: transparent;
}

.nav-tabs .nav-link {
        width: 100%;
    }

    .main-container .nav-tabs .nav-link {
        padding: 0 5px;
    }

    .fade {
    transition: opacity .15slinear;
}

.tab-content>.tab-pane {
    display: none;
}

.tab-content>.active {
    display: block;
}

.card-icon {
    font-family: Card Characters !important;
    display: inline-block;
    width: unset;
}

.casino-nation-name img {
    height: 28px;
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
                <div class="casino-title"><span class="casino-name">Casino War</span><span class="d-block"><a href="#" onclick="view_rules('casino_war')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

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
                               <iframe src="<?php echo IFRAME_URL."".CASINOWAR_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

    <!-- <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
        <iframe src="<?php echo IFRAME_URL."".CASINOWAR_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe> -->
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
            <div>
                <div>
                   <!--  <h3 class="text-white">Dealer</h3> -->
                    <div><img id="card_c7" src="../storage/front/img/cards_new/1.png"></div>
                </div>
            </div>
        </div>
    </div>
        <div class="casino-detail">
               <div class="casino-table">
                  <div class="casino-table-header w-100">
                     <div class="casino-nation-detail"></div>
                     <div class="casino-odds-box ">
                        <div class="flip-card">
                           <div class="flip-card-inner ">
                              <div class="flip-card-front"><img id="card_c1" src="../storage/front/img/cards_new/1.png"></div>
                           </div>
                        </div>
                     </div>
                     <div class="casino-odds-box ">
                        <div class="flip-card">
                           <div class="flip-card-inner ">
                              <div class="flip-card-front"><img id="card_c2" src="../storage/front/img/cards_new/1.png"></div>
                           </div>
                        </div>
                     </div>
                     <div class="casino-odds-box ">
                        <div class="flip-card">
                           <div class="flip-card-inner ">
                              <div class="flip-card-front"><img id="card_c3" src="../storage/front/img/cards_new/1.png"></div>
                           </div>
                        </div>
                     </div>
                     <div class="casino-odds-box ">
                        <div class="flip-card">
                           <div class="flip-card-inner ">
                              <div class="flip-card-front"><img id="card_c4" src="../storage/front/img/cards_new/1.png"></div>
                           </div>
                        </div>
                     </div>
                     <div class="casino-odds-box ">
                        <div class="flip-card">
                           <div class="flip-card-inner ">
                              <div class="flip-card-front"><img id="card_c5" src="../storage/front/img/cards_new/1.png"></div>
                           </div>
                        </div>
                     </div>
                     <div class="casino-odds-box ">
                        <div class="flip-card">
                           <div class="flip-card-inner ">
                              <div class="flip-card-front"><img id="card_c6" src="../storage/front/img/cards_new/1.png"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="casino-table-full-box d-none d-md-block">
                     <div class="casino-table-header">
                        <div class="casino-nation-detail"></div>
                        <div class="casino-odds-box ">1</div>
                        <div class="casino-odds-box ">2</div>
                        <div class="casino-odds-box ">3</div>
                        <div class="casino-odds-box ">4</div>
                        <div class="casino-odds-box ">5</div>
                        <div class="casino-odds-box ">6</div>
                     </div>
                     <div class="casino-table-body">
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><span>Winner</span></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.98</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.98</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.98</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.98</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.98</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.98</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><span>Black</span><span class="card-icon ml-1"><span class="card-black ">}</span></span><span class="card-icon ml-1"><span class="card-black ">]</span></span></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><span>Red</span><span class="card-icon ml-1"><span class="card-red ">{</span></span><span class="card-icon ml-1"><span class="card-red ">[</span></span></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><span>Odds</span></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><span>Even</span></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><img src="../storage/front/img/cards/spade.png"></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><img src="../storage/front/img/cards/heart.png"></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><img src="../storage/front/img/cards/club.png"></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                        </div>
                        <div class="casino-table-row">
                           <div class="casino-nation-detail">
                              <div class="casino-nation-name"><img src="../storage/front/img/cards/diamond.png"></div>
                           </div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                           <div class="casino-odds-box back"><span class="casino-odds">3.85</span></div>
                        </div>
                     </div>
                  </div> -->
                  <div class="casino-table-full-box d-md-none">
                     <ul class="menu-tabs d-xl-none nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-0" role="tab" data-rr-ui-event-key="0" aria-controls="uncontrolled-tab-example-tabpane-0" aria-selected="true" class="nav-link commontabswar active">1</button></li>
                        <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-1" role="tab" data-rr-ui-event-key="1" aria-controls="uncontrolled-tab-example-tabpane-1" aria-selected="false" tabindex="-1" class="nav-link commontabswar">2</button></li>
                        <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-2" role="tab" data-rr-ui-event-key="2" aria-controls="uncontrolled-tab-example-tabpane-2" aria-selected="false" tabindex="-1" class="nav-link commontabswar">3</button></li>
                        <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-3" role="tab" data-rr-ui-event-key="3" aria-controls="uncontrolled-tab-example-tabpane-3" aria-selected="false" tabindex="-1" class="nav-link commontabswar">4</button></li>
                        <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-4" role="tab" data-rr-ui-event-key="4" aria-controls="uncontrolled-tab-example-tabpane-4" aria-selected="false" tabindex="-1" class="nav-link commontabswar">5</button></li>
                        <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-5" role="tab" data-rr-ui-event-key="5" aria-controls="uncontrolled-tab-example-tabpane-5" aria-selected="false" tabindex="-1" class="nav-link commontabswar">6</button></li>
                     </ul>
                     <div class="tab-content">
                        <div role="tabpanel" id="uncontrolled-tab-example-tabpane-0" aria-labelledby="uncontrolled-tab-example-tab-0" class="fade tab-pane tab-pane tab-pane-common active show">
                           <div class="casino-table-body">
                              <div class="row row5">
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Winner</div>
                                          <div class="casino-nation-book market_1_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_1_b_btn market_1_row back-1"><span class="casino-odds market_1_b_value">1.98</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Black</span><span class="card-icon ml-1"><span class="card-black ">}</span></span><span class="card-icon ml-1"><span class="card-black ">]</span></span></div>
                                          <div class="casino-nation-book market_2_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_2_b_btn market_2_row back-1"><span class="casino-odds market_2_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Red</span><span class="card-icon ml-1"><span class="card-red ">{</span></span><span class="card-icon ml-1"><span class="card-red ">[</span></span></div>
                                             <div class="casino-nation-book market_3_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_3_b_btn market_3_row back-1"><span class="casino-odds market_3_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Odd</div>
                                          <div class="casino-nation-book market_4_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_4_b_btn market_4_row back-1"><span class="casino-odds market_4_b_value">1.83</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Even</div>
                                          <div class="casino-nation-book market_5_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_5_b_btn market_5_row back-1"><span class="casino-odds market_5_b_value">2.12</span></div>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/spade.png"></div>
                                          <div class="casino-nation-book market_6_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_6_b_btn market_6_row back-1"><span class="casino-odds market_6_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/club.png"></div>
                                          <div class="casino-nation-book market_7_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_7_b_btn market_7_row back-1"><span class="casino-odds market_7_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/heart.png"></div>
                                          <div class="casino-nation-book market_8_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_8_b_btn market_8_row back-1"><span class="casino-odds market_8_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/diamond.png"></div>
                                          <div class="casino-nation-book market_9_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_9_b_btn market_9_row back-1"><span class="casino-odds market_9_b_value">3.85</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" id="uncontrolled-tab-example-tabpane-1" aria-labelledby="uncontrolled-tab-example-tab-1" class="fade tab-pane tab-pane-common">
                           <div class="casino-table-body">
                              <div class="row row5">
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Winner</div>
                                          <div class="casino-nation-book market_11_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_11_b_btn market_11_row back-1"><span class="casino-odds market_11_b_value">1.98</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Black</span><span class="card-icon ml-1"><span class="card-black ">}</span></span><span class="card-icon ml-1"><span class="card-black ">]</span></span></div>
                                          <div class="casino-nation-book market_12_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_12_b_btn market_12_row back-1"><span class="casino-odds market_12_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Red</span><span class="card-icon ml-1"><span class="card-red ">{</span></span><span class="card-icon ml-1"><span class="card-red ">[</span></span></div>
                                             <div class="casino-nation-book market_13_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_13_b_btn market_13_row back-1"><span class="casino-odds market_13_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Odd</div>
                                          <div class="casino-nation-book market_14_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_14_b_btn market_14_row back-1"><span class="casino-odds market_14_b_value">1.83</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Even</div>
                                          <div class="casino-nation-book market_15_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_15_b_btn market_15_row back-1"><span class="casino-odds market_15_b_value">2.12</span></div>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/spade.png"></div>
                                          <div class="casino-nation-book market_16_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_16_b_btn market_16_row back-1"><span class="casino-odds market_16_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/club.png"></div>
                                          <div class="casino-nation-book market_17_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_17_b_btn market_17_row back-1"><span class="casino-odds market_17_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/heart.png"></div>
                                          <div class="casino-nation-book market_18_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_18_b_btn market_18_row back-1"><span class="casino-odds market_18_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/diamond.png"></div>
                                          <div class="casino-nation-book market_19_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_19_b_btn market_19_row back-1"><span class="casino-odds market_19_b_value">3.85</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" id="uncontrolled-tab-example-tabpane-2" aria-labelledby="uncontrolled-tab-example-tab-2" class="fade tab-pane tab-pane-common">
                           <div class="casino-table-body">
                              <div class="row row5">
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Winner</div>
                                          <div class="casino-nation-book market_21_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_21_b_btn market_21_row back-1"><span class="casino-odds market_21_b_value">1.98</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Black</span><span class="card-icon ml-1"><span class="card-black ">}</span></span><span class="card-icon ml-1"><span class="card-black ">]</span></span></div>
                                          <div class="casino-nation-book market_22_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_22_b_btn market_22_row back-1"><span class="casino-odds market_22_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Red</span><span class="card-icon ml-1"><span class="card-red ">{</span></span><span class="card-icon ml-1"><span class="card-red ">[</span></span></div>
                                             <div class="casino-nation-book market_23_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_23_b_btn market_23_row back-1"><span class="casino-odds market_23_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Odd</div>
                                          <div class="casino-nation-book market_24_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_24_b_btn market_24_row back-1"><span class="casino-odds market_24_b_value">1.83</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Even</div>
                                          <div class="casino-nation-book market_25_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_25_b_btn market_25_row back-1"><span class="casino-odds market_25_b_value">2.12</span></div>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/spade.png"></div>
                                          <div class="casino-nation-book market_26_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_26_b_btn market_26_row back-1"><span class="casino-odds market_26_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/club.png"></div>
                                          <div class="casino-nation-book market_27_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_27_b_btn market_27_row back-1"><span class="casino-odds market_27_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/heart.png"></div>
                                          <div class="casino-nation-book market_28_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_28_b_btn market_28_row back-1"><span class="casino-odds market_28_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/diamond.png"></div>
                                          <div class="casino-nation-book market_29_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_29_b_btn market_29_row back-1"><span class="casino-odds market_29_b_value">3.85</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" id="uncontrolled-tab-example-tabpane-3" aria-labelledby="uncontrolled-tab-example-tab-3" class="fade tab-pane tab-pane-common">
                           <div class="casino-table-body">
                              <div class="row row5">
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Winner</div>
                                          <div class="casino-nation-book market_31_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_31_b_btn market_31_row back-1"><span class="casino-odds market_31_b_value">1.98</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Black</span><span class="card-icon ml-1"><span class="card-black ">}</span></span><span class="card-icon ml-1"><span class="card-black ">]</span></span></div>
                                          <div class="casino-nation-book market_32_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_32_b_btn market_32_row back-1"><span class="casino-odds market_32_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Red</span><span class="card-icon ml-1"><span class="card-red ">{</span></span><span class="card-icon ml-1"><span class="card-red ">[</span></span></div>
                                             <div class="casino-nation-book market_33_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_33_b_btn market_33_row back-1"><span class="casino-odds market_33_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Odd</div>
                                          <div class="casino-nation-book market_34_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_34_b_btn market_34_row back-1"><span class="casino-odds market_34_b_value">1.83</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Even</div>
                                          <div class="casino-nation-book market_35_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_35_b_btn market_35_row back-1"><span class="casino-odds market_35_b_value">2.12</span></div>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/spade.png"></div>
                                          <div class="casino-nation-book market_36_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_36_b_btn market_36_row back-1"><span class="casino-odds market_36_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/club.png"></div>
                                          <div class="casino-nation-book market_37_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_37_b_btn market_37_row back-1"><span class="casino-odds market_37_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/heart.png"></div>
                                          <div class="casino-nation-book market_38_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_38_b_btn market_38_row back-1"><span class="casino-odds market_38_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/diamond.png"></div>
                                          <div class="casino-nation-book market_39_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_39_b_btn market_39_row back-1"><span class="casino-odds market_39_b_value">3.85</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" id="uncontrolled-tab-example-tabpane-4" aria-labelledby="uncontrolled-tab-example-tab-4" class="fade tab-pane tab-pane-common">
                           <div class="casino-table-body">
                              <div class="row row5">
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Winner</div>
                                          <div class="casino-nation-book market_41_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_41_b_btn market_41_row back-1"><span class="casino-odds market_41_b_value">1.98</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Black</span><span class="card-icon ml-1"><span class="card-black ">}</span></span><span class="card-icon ml-1"><span class="card-black ">]</span></span></div>
                                          <div class="casino-nation-book market_42_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_42_b_btn market_42_row back-1"><span class="casino-odds market_42_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Red</span><span class="card-icon ml-1"><span class="card-red ">{</span></span><span class="card-icon ml-1"><span class="card-red ">[</span></span></div>
                                             <div class="casino-nation-book market_43_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_43_b_btn market_43_row back-1"><span class="casino-odds market_43_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Odd</div>
                                          <div class="casino-nation-book market_44_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_44_b_btn market_44_row back-1"><span class="casino-odds market_44_b_value">1.83</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Even</div>
                                          <div class="casino-nation-book market_45_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_45_b_btn market_45_row back-1"><span class="casino-odds market_45_b_value">2.12</span></div>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/spade.png"></div>
                                          <div class="casino-nation-book market_46_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_46_b_btn market_46_row back-1"><span class="casino-odds market_46_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/club.png"></div>
                                          <div class="casino-nation-book market_47_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_47_b_btn market_47_row back-1"><span class="casino-odds market_47_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/heart.png"></div>
                                          <div class="casino-nation-book market_48_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_48_b_btn market_48_row back-1"><span class="casino-odds market_48_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/diamond.png"></div>
                                          <div class="casino-nation-book market_49_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_49_b_btn market_49_row back-1"><span class="casino-odds market_49_b_value">3.85</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" id="uncontrolled-tab-example-tabpane-5" aria-labelledby="uncontrolled-tab-example-tab-5" class="fade tab-pane tab-pane-common">
                           <div class="casino-table-body">
                              <div class="row row5">
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Winner</div>
                                          <div class="casino-nation-book market_51_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_51_b_btn market_51_row back-1"><span class="casino-odds market_51_b_value">1.98</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Black</span><span class="card-icon ml-1"><span class="card-black ">}</span></span><span class="card-icon ml-1"><span class="card-black ">]</span></span></div>
                                          <div class="casino-nation-book market_52_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_52_b_btn market_52_row back-1"><span class="casino-odds market_52_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><span>Red</span><span class="card-icon ml-1"><span class="card-red ">{</span></span><span class="card-icon ml-1"><span class="card-red ">[</span></span></div>
                                             <div class="casino-nation-book market_53_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_53_b_btn market_53_row back-1"><span class="casino-odds market_53_b_value">1.97</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Odd</div>
                                          <div class="casino-nation-book market_54_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_54_b_btn market_54_row back-1"><span class="casino-odds market_54_b_value">1.83</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name">Even</div>
                                          <div class="casino-nation-book market_55_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_55_b_btn market_55_row back-1"><span class="casino-odds market_55_b_value">2.12</span></div>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/spade.png"></div>
                                          <div class="casino-nation-book market_56_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_56_b_btn market_56_row back-1"><span class="casino-odds market_56_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/club.png"></div>
                                          <div class="casino-nation-book market_57_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_57_b_btn market_57_row back-1"><span class="casino-odds market_57_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/heart.png"></div>
                                          <div class="casino-nation-book market_58_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_58_b_btn market_58_row back-1"><span class="casino-odds market_58_b_value">3.85</span></div>
                                    </div>
                                    <div class="casino-table-row">
                                       <div class="casino-nation-detail">
                                          <div class="casino-nation-name"><img src="../storage/front/img/cards/diamond.png"></div>
                                          <div class="casino-nation-book market_59_b_exposure market_exposure"></div>
                                       </div>
                                       <div class="casino-odds-box back suspended market_59_b_btn market_59_row back-1"><span class="casino-odds market_59_b_value">3.85</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=war">View All</a></span></div>
               <div class="casino-last-results" id="last-result">

               </div>
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
<script type="text/javascript" src='footer-js.js?39'></script>

<?

include("betpopcss.php");
?>

 <script type="text/javascript">
   jQuery(document).on("click", ".commontabswar", function () {

	 $(".commontabswar").removeClass("active");
	 $(".tab-pane-common").removeClass("active");
	 $(".tab-pane-common").removeClass("show");

     var tab_name=$(this).attr("aria-controls");
     $(this).addClass("active");
     $("#"+tab_name).addClass("active");
     $("#"+tab_name).addClass("show");
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
	var markettype = "CASINO_WAR";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'War');
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

				if (data.t1[0].C1 && data.t1[0].C1 != 1) {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
					}

				if (data.t1[0].C2 && data.t1[0].C2 != 1) {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
					}

				if (data.t1[0].C3 && data.t1[0].C3 != 1) {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
					}

				if (data.t1[0].C4 && data.t1[0].C4 != 1) {
						$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
					}

				if (data.t1[0].C5 && data.t1[0].C5 != 1) {
						$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
					}

				if (data.t1[0].C6 && data.t1[0].C6 != 1) {
						$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
					}
				if (data.t1[0].C7 && data.t1[0].C7 != 1) {
						$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C7 + ".png");
					}


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


				  	markettype = "CASINO_WAR";


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
						type	:	'}',
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
							type	:	']',
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



function clearCards(){
		refresh(markettype);
		$("#card_c1").attr("src",site_url + "storage/front/img/cards_new/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
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
		casino_type = "'war'";
		data.forEach((runData) => {
			ab = "result-b";
				ab1 = "R";

				eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="last-result ml-1  '+ ab +' result">'+ ab1 + '</span>';

		});


		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){
			$("#card_c1").attr("src",site_url + "storage/front/img/cards_new/1.png");
			$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
		}
    }
}
function teenpatti(type) {
    gameType = type
    websocket();
}

teenpatti("ok");
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
   // stake = $(this).attr("stake");
   // eventId = $("#fullMarketBetsWrap").attr("eventid");
	// $("#inputStake").val(stake);
   
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
		eventType = 'CASINO_WAR';
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
				 url: '../ajaxfiles/bet_place_casino_war.php',
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
                            <div class="mt-1 d-flex"><span>Range: 100 to 25K</span></div>
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