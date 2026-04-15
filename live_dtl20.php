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
include("head_css.php");
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
}

.casino-table-left-box, .casino-table-center-box, .casino-table-right-box {
    width: 49%;
    border-left: 1px solid #c7c8ca;
    border-right: 1px solid #c7c8ca;
    border-top: 1px solid #c7c8ca;
    background-color: #f2f2f2;
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

.casino-table-header .casino-odds-box {
    cursor: unset;
    padding: 2px;
    min-height: unset;
    height: 28px !important;
}

.casino-odds-box {
    width: 20%;
}

.casino-nation-name {
    font-size: 16px;
    font-weight: bold;
}

.casino-odds {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}

.nav {
    display: flex
;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}


   .nav,
   .tab-content {
      width: 100%;
   }
   
ul, ol {
    margin-bottom: 0;
    padding: 0;
}

ul li, ol li {
    list-style: none;
}

.nav-link {
    display: block;
    padding: .5rem 1rem;
    color: #0d6efd;
    text-decoration: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
}

[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
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
    font-weight: 500;
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
    background-color: #2c3e50;
    color: #ffffff;
}

.nav-pills .nav-item:last-child .nav-link {
    border-right: 0;
}

.casino-table .tab-content {
    width: 100%;
}

.tab-content>.active {
    display: block;
}

.casino-nation-name img {
    height: 35px;
}
img, svg {
    vertical-align: middle;
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
    background-color: #2c3e50d9;
    color: #ffffff;
    font-size: 14px;
    display: flex
;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
    height: 41px;
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

.casino-last-results .result.result-a {
    color: #ff4500;
}

.casino-last-results .result.result-b {
    color: #ffff33;
}

.casino-last-results .result.result-c {
    color: #33c6ff;
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
                        <div  class="col-md-10 featured-box">
                            <div  class="row row5 teen20-container dtl20">
                                
									<div class="col-md-9 casino-container coupon-card featured-box-detail">
    <div class="coupon-card">
        <div class="game-heading"><span class="card-header-title">20-20 D T L
                        <!-- <small role="button" class="teenpatti-rules"  onclick="view_rules('dtl20-rules.jpg')" data-target="#rules_popup" data-toggle="modal" tabindex="0"><u>Rules</u></small> -->
                     <!----></span>
                     <small role="button" class="teenpatti-rules"  onclick="view_rules('dtl20')" data-target="#rules_popup" data-toggle="modal"  tabindex="0"><u>Rules</u></small> 
                     <span class="float-right">
                        Round ID:
                        <span class="round_no">0</span></span>
        </div>
        <!---->
        <div class="video-container">
        <?php
  if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".DTL_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
           <!-- <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
        	 <iframe class="iframedesign" src="<?php echo IFRAME_URL; echo DTL_CODE; ?>" width="100%" height="400" style="border: 0px;"></iframe> -->
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
            <!-- <div class="video-overlay">
                <div class="videoCards">
                    <div>
                        <h3 class="text-white">Dealer</h3>
                        <div><img id="card_c1" src="storage/front/img/cards_new/1.png"> <img id="card_c2" src="storage/front/img/cards_new/1.png"> <img id="card_c3" src="storage/front/img/cards_new/1.png"></div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="casino-detail">
            <div class="casino-table">
                <div class="casino-table-box d-none d-md-flex">
                    <div class="casino-table-left-box">
                        <div class="casino-table-header">
                        <div class="casino-nation-detail"></div>
                        <div class="casino-odds-box back">Dragon</div>
                        <div class="casino-odds-box back">Tiger</div>
                        <div class="casino-odds-box back">Lion</div>
                        </div>
                        <div class="casino-table-body">
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name">Winner</div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_1_row market_1_b_btn"><span class="casino-odds market_1_b_value">0</span><span class="casino-nation-book d-block market_1_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_21_row market_21_b_btn"><span class="casino-odds market_21_b_value">0</span><span class="casino-nation-book d-block market_21_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_41_row market_41_b_btn"><span class="casino-odds market_41_b_value">0</span><span class="casino-nation-book d-block market_41_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-2 market_2_row market_2_b_btn"><span class="casino-odds market_2_b_value">0</span><span class="casino-nation-book d-block market_2_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_22_row market_22_b_btn"><span class="casino-odds market_22_b_value">0</span><span class="casino-nation-book d-block market_22_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_42_row market_42_b_btn"><span class="casino-odds market_42_b_value">0</span><span class="casino-nation-book d-block market_42_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_3_row market_3_b_btn"><span class="casino-odds market_3_b_value">0</span><span class="casino-nation-book d-block market_3_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_23_row market_23_b_btn"><span class="casino-odds market_23_b_value">0</span><span class="casino-nation-book d-block market_23_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_43_row market_43_b_btn"><span class="casino-odds market_43_b_value">0</span><span class="casino-nation-book d-block market_43_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name">Odd</div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_4_row market_4_b_btn"><span class="casino-odds market_4_b_value">0</span><span class="casino-nation-book d-block market_4_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_24_row market_24_b_btn"><span class="casino-odds market_24_b_value">0</span><span class="casino-nation-book d-block market_24_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_44_row market_44_b_btn"><span class="casino-odds market_44_b_value">0</span><span class="casino-nation-book d-block market_44_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name">Even</div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_5_row market_5_b_btn"><span class="casino-odds market_5_b_value">0</span><span class="casino-nation-book d-block market_5_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_25_row market_25_b_btn"><span class="casino-odds market_25_b_value">0</span><span class="casino-nation-book d-block market_25_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_45_row market_45_b_btn"><span class="casino-odds market_45_b_value">0</span><span class="casino-nation-book d-block market_45_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/A.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_6_row market_6_b_btn"><span class="casino-odds market_6_b_value">0</span><span class="casino-nation-book d-block market_6_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_26_row market_26_b_btn"><span class="casino-odds market_26_b_value">0</span><span class="casino-nation-book d-block market_26_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_46_row market_46_b_btn"><span class="casino-odds market_46_b_value">0</span><span class="casino-nation-book d-block market_46_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/2.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_7_row market_7_b_btn"><span class="casino-odds market_7_b_value">0</span><span class="casino-nation-book d-block market_7_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_27_row market_27_b_btn"><span class="casino-odds market_27_b_value">0</span><span class="casino-nation-book d-block market_27_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_47_row market_47_b_btn"><span class="casino-odds market_47_b_value">0</span><span class="casino-nation-book d-block market_47_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/3.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_8_row market_8_b_btn"><span class="casino-odds market_8_b_value">0</span><span class="casino-nation-book d-block market_8_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_28_row market_28_b_btn"><span class="casino-odds market_28_b_value">0</span><span class="casino-nation-book d-block market_28_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_48_row market_48_b_btn"><span class="casino-odds market_48_b_value">0</span><span class="casino-nation-book d-block market_48_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/4.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_9_row market_9_b_btn"><span class="casino-odds market_9_b_value">0</span><span class="casino-nation-book d-block market_9_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_29_row market_29_b_btn"><span class="casino-odds market_29_b_value">0</span><span class="casino-nation-book d-block market_29_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_49_row market_49_b_btn"><span class="casino-odds market_49_b_value">0</span><span class="casino-nation-book d-block market_49_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        </div>
                    </div>
                    <div class="casino-table-right-box">
                        <div class="casino-table-header">
                        <div class="casino-nation-detail"></div>
                        <div class="casino-odds-box back">Dragon</div>
                        <div class="casino-odds-box back">Tiger</div>
                        <div class="casino-odds-box back">Lion</div>
                        </div>
                        <div class="casino-table-body">
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/5.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_10_row market_10_b_btn"><span class="casino-odds market_10_b_value">0</span><span class="casino-nation-book d-block market_10_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_30_row market_30_b_btn"><span class="casino-odds market_30_b_value">0</span><span class="casino-nation-book d-block market_30_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_50_row market_50_b_btn"><span class="casino-odds market_50_b_value">0</span><span class="casino-nation-book d-block market_50_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/6.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_11_row market_11_b_btn"><span class="casino-odds market_11_b_value">0</span><span class="casino-nation-book d-block market_11_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_31_row market_31_b_btn"><span class="casino-odds market_31_b_value">0</span><span class="casino-nation-book d-block market_31_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_51_row market_51_b_btn"><span class="casino-odds market_51_b_value">0</span><span class="casino-nation-book d-block market_51_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/7.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_12_row market_12_b_btn"><span class="casino-odds market_12_b_value">0</span><span class="casino-nation-book d-block market_12_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_32_row market_32_b_btn"><span class="casino-odds market_32_b_value">0</span><span class="casino-nation-book d-block market_32_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_52_row market_52_b_btn"><span class="casino-odds market_52_b_value">0</span><span class="casino-nation-book d-block market_52_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/8.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_13_row market_13_b_btn"><span class="casino-odds market_13_b_value">0</span><span class="casino-nation-book d-block market_13_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_33_row market_33_b_btn"><span class="casino-odds market_33_b_value">0</span><span class="casino-nation-book d-block market_33_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_53_row market_53_b_btn"><span class="casino-odds market_53_b_value">0</span><span class="casino-nation-book d-block market_53_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/9.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_14_row market_14_b_btn"><span class="casino-odds market_14_b_value">0</span><span class="casino-nation-book d-block market_14_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_34_row market_34_b_btn"><span class="casino-odds market_34_b_value">0</span><span class="casino-nation-book d-block market_34_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_54_row market_54_b_btn"><span class="casino-odds market_54_b_value">0</span><span class="casino-nation-book d-block market_54_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/10.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_15_row market_15_b_btn"><span class="casino-odds market_15_b_value">0</span><span class="casino-nation-book d-block market_15_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_35_row market_35_b_btn"><span class="casino-odds market_35_b_value">0</span><span class="casino-nation-book d-block market_35_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_55_row market_55_b_btn"><span class="casino-odds market_55_b_value">0</span><span class="casino-nation-book d-block market_55_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/J.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_16_row market_16_b_btn"><span class="casino-odds market_16_b_value">0</span><span class="casino-nation-book d-block market_16_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_36_row market_36_b_btn"><span class="casino-odds market_36_b_value">0</span><span class="casino-nation-book d-block market_36_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_56_row market_56_b_btn"><span class="casino-odds market_56_b_value">0</span><span class="casino-nation-book d-block market_56_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/Q.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_17_row market_17_b_btn"><span class="casino-odds market_17_b_value">0</span><span class="casino-nation-book d-block market_17_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_37_row market_37_b_btn"><span class="casino-odds market_37_b_value">0</span><span class="casino-nation-book d-block market_37_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_57_row market_57_b_btn"><span class="casino-odds market_57_b_value">0</span><span class="casino-nation-book d-block market_57_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        <div class="casino-table-row">
                            <div class="casino-nation-detail">
                                <div class="casino-nation-name"><img src="storage/front/img/cards_new/K.png"></div>
                            </div>
                            <div class="casino-odds-box back suspended-box back-1 market_18_row market_18_b_btn"><span class="casino-odds market_18_b_value">0</span><span class="casino-nation-book d-block market_18_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_38_row market_38_b_btn"><span class="casino-odds market_38_b_value">0</span><span class="casino-nation-book d-block market_38_b_exposure market_exposure" style="color: black;"></span></div>
                            <div class="casino-odds-box back suspended-box back-1 market_58_row market_58_b_btn"><span class="casino-odds market_58_b_value">0</span><span class="casino-nation-book d-block market_58_b_exposure market_exposure" style="color: black;"></span></div>
                        </div>
                        </div>
                    </div>
                </div>
                <ul class="d-xl-none nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-0" role="tab" data-rr-ui-event-key="0" aria-controls="uncontrolled-tab-example-tabpane-0" aria-selected="true" class="nav-link commontabsdtl active">Dragon</button></li>
                    <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-1" role="tab" data-rr-ui-event-key="1" aria-controls="uncontrolled-tab-example-tabpane-1" aria-selected="false" tabindex="-1" class="nav-link commontabsdtl" tabindex="-1">Tiger</button></li>
                    <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-2" role="tab" data-rr-ui-event-key="2" aria-controls="uncontrolled-tab-example-tabpane-2" aria-selected="false" tabindex="-1" class="nav-link commontabsdtl" tabindex="-1">Lion</button></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="uncontrolled-tab-example-tabpane-0" aria-labelledby="uncontrolled-tab-example-tab-0" class="fade d-xl-none tab-pane tab-pane-common active show">
                        <div class="casino-table-box">
                        <div class="casino-table-left-box">
                            <div class="casino-table-body">
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Winner</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_1_row market_1_b_btn"><span class="casino-odds market_1_b_value">0</span><span class="d-block market_1_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-2 market_2_row market_2_b_btn"><span class="casino-odds market_2_b_value">0</span><span class="d-block market_2_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_3_row market_3_b_btn"><span class="casino-odds market_3_b_value">0</span><span class="d-block market_3_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Odd</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_4_row market_4_b_btn"><span class="casino-odds market_4_b_value">0</span><span class="d-block market_4_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Even</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_5_row market_5_b_btn"><span class="casino-odds market_5_b_value">0</span><span class="d-block market_5_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/A.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_6_row market_6_b_btn"><span class="casino-odds market_6_b_value">0</span><span class="d-block market_6_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/2.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_7_row market_7_b_btn"><span class="casino-odds market_7_b_value">0</span><span class="d-block market_7_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/3.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_8_row market_8_b_btn"><span class="casino-odds market_8_b_value">0</span><span class="d-block market_8_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/4.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_9_row market_9_b_btn"><span class="casino-odds market_9_b_value">0</span><span class="d-block market_9_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="casino-table-right-box">
                            <div class="casino-table-body">
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/5.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_10_row market_10_b_btn"><span class="casino-odds market_10_b_value">0</span><span class="d-block market_10_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/6.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_11_row market_11_b_btn"><span class="casino-odds market_11_b_value">0</span><span class="d-block market_11_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/7.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_12_row market_12_b_btn"><span class="casino-odds market_12_b_value">0</span><span class="d-block market_12_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/8.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_13_row market_13_b_btn"><span class="casino-odds market_13_b_value">0</span><span class="d-block market_13_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/9.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_14_row market_14_b_btn"><span class="casino-odds market_14_b_value">0</span><span class="d-block market_14_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/10.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_15_row market_15_b_btn"><span class="casino-odds market_15_b_value">0</span><span class="d-block market_15_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/J.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_16_row market_16_b_btn"><span class="casino-odds market_16_b_value">0</span><span class="d-block market_16_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/Q.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_17_row market_17_b_btn"><span class="casino-odds market_17_b_value">0</span><span class="d-block market_17_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/K.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_18_row market_18_b_btn"><span class="casino-odds market_18_b_value">0</span><span class="d-block market_18_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div role="tabpanel" id="uncontrolled-tab-example-tabpane-1" aria-labelledby="uncontrolled-tab-example-tab-1" class="fade d-xl-none tab-pane tab-pane-common">
                        <div class="casino-table-box">
                        <div class="casino-table-left-box">
                            <div class="casino-table-body">
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Winner</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_21_row market_21_b_btn"><span class="casino-odds market_21_b_value">0</span><span class="d-block market_21_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_22_row market_22_b_btn"><span class="casino-odds market_22_b_value">0</span><span class="d-block market_22_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_23_row market_23_b_btn"><span class="casino-odds market_23_b_value">0</span><span class="d-block market_23_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Odd</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_24_row market_24_b_btn"><span class="casino-odds market_24_b_value">0</span><span class="d-block market_24_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Even</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_25_row market_25_b_btn"><span class="casino-odds market_25_b_value">0</span><span class="d-block market_25_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/A.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_26_row market_26_b_btn"><span class="casino-odds market_26_b_value">0</span><span class="d-block market_26_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/2.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_27_row market_27_b_btn"><span class="casino-odds market_27_b_value">0</span><span class="d-block market_27_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/3.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_28_row market_28_b_btn"><span class="casino-odds market_28_b_value">0</span><span class="d-block market_28_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/4.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_29_row market_29_b_btn"><span class="casino-odds market_29_b_value">0</span><span class="d-block market_29_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="casino-table-right-box">
                            <div class="casino-table-body">
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/5.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_30_row market_30_b_btn"><span class="casino-odds market_30_b_value">0</span><span class="d-block market_30_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/6.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_31_row market_31_b_btn"><span class="casino-odds market_31_b_value">0</span><span class="d-block market_31_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/7.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_32_row market_32_b_btn"><span class="casino-odds market_32_b_value">0</span><span class="d-block market_32_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/8.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_33_row market_33_b_btn"><span class="casino-odds market_33_b_value">0</span><span class="d-block market_33_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/9.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_34_row market_34_b_btn"><span class="casino-odds market_34_b_value">0</span><span class="d-block market_34_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/10.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_35_row market_35_b_btn"><span class="casino-odds market_35_b_value">0</span><span class="d-block market_35_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/J.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_36_row market_36_b_btn"><span class="casino-odds market_36_b_value">0</span><span class="d-block market_36_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/Q.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_37_row market_37_b_btn"><span class="casino-odds market_37_b_value">0</span><span class="d-block market_37_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/K.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_38_row market_38_b_btn"><span class="casino-odds market_38_b_value">0</span><span class="d-block market_38_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div role="tabpanel" id="uncontrolled-tab-example-tabpane-2" aria-labelledby="uncontrolled-tab-example-tab-2" class="fade d-xl-none tab-pane">
                        <div class="casino-table-box">
                        <div class="casino-table-left-box">
                            <div class="casino-table-body">
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Winner</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_41_row market_41_b_btn"><span class="casino-odds market_41_b_btn">0</span><span class="d-block market_41_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_42_row market_42_b_btn"><span class="casino-odds market_42_b_btn">0</span><span class="d-block market_42_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_43_row market_43_b_btn"><span class="casino-odds market_43_b_btn">0</span><span class="d-block market_43_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Odd</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_44_row market_44_b_btn"><span class="casino-odds market_44_b_btn">0</span><span class="d-block market_44_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name">Even</div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_45_row market_45_b_btn"><span class="casino-odds market_45_b_btn">0</span><span class="d-block market_45_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/A.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_46_row market_46_b_btn"><span class="casino-odds market_46_b_btn">0</span><span class="d-block market_46_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/2.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_47_row market_47_b_btn"><span class="casino-odds market_47_b_btn">0</span><span class="d-block market_47_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/3.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_48_row market_48_b_btn"><span class="casino-odds market_48_b_btn">0</span><span class="d-block market_48_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/4.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_49_row market_49_b_btn"><span class="casino-odds market_49_b_btn">0</span><span class="d-block market_49_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="casino-table-right-box">
                            <div class="casino-table-body">
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/5.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_50_row market_50_b_btn"><span class="casino-odds market_50_b_btn">0</span><span class="d-block market_50_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/6.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_51_row market_51_b_btn"><span class="casino-odds market_51_b_btn">0</span><span class="d-block market_51_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/7.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_52_row market_52_b_btn"><span class="casino-odds market_52_b_btn">0</span><span class="d-block market_52_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/8.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_53_row market_53_b_btn"><span class="casino-odds market_53_b_btn">0</span><span class="d-block market_53_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/9.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_54_row market_54_b_btn"><span class="casino-odds market_54_b_btn">0</span><span class="d-block market_54_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/10.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_55_row market_55_b_btn"><span class="casino-odds market_55_b_btn">0</span><span class="d-block market_55_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/J.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_56_row market_56_b_btn"><span class="casino-odds market_56_b_btn">0</span><span class="d-block market_56_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/Q.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_57_row market_57_b_btn"><span class="casino-odds market_57_b_btn">0</span><span class="d-block market_57_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                                <div class="casino-table-row">
                                    <div class="casino-nation-detail">
                                    <div class="casino-nation-name"><img src="storage/front/img/cards_new/K.png"></div>
                                    </div>
                                    <div class="casino-odds-box back suspended-box back-1 market_58_row market_58_b_btn"><span class="casino-odds market_58_b_btn">0</span><span class="d-block market_58_b_exposure market_exposure" style="color: black;"></span></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=dtl20">View All</a></span></div>
            <div class="casino-last-results" id="last-result">
                <!-- <span class="result result-c">L</span><span class="result result-a">D</span><span class="result result-a">D</span><span class="result result-a">D</span><span class="result result-a">D</span><span class="result result-b">T</span><span class="result result-c">L</span><span class="result result-c">L</span><span class="result result-c">L</span><span class="result result-b">T</span> -->
            </div>
            </div>
    </div>
</div>
                                <?php
									include("right_sidebar.php");
								?>
                                <div >
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

    jQuery(document).on("click", ".commontabsdtl", function() {

        $(".commontabsdtl").removeClass("active");
        $(".tab-pane-common").removeClass("active");
        $(".tab-pane-common").removeClass("show");

        var tab_name = $(this).attr("aria-controls");
        $(this).addClass("active");
        $("#" + tab_name).addClass("active");
        $("#" + tab_name).addClass("show");
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
	var markettype = "DTL20";
    var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) {
		socket = io.connect(websocketurl, {
			transports: ['websocket']
		});
		socket.on('connect', function () {
			socket.emit('Room', 'dtl20');
		});
		socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
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
			$(".round_no").text(data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid);
			eventId = data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
				  	
				  	
				  	markettype = "DTL20";
					
				 	
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
						
						$(".market_" + selectionid + "_row").addClass("suspended-box");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
					}
					else {
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended-box");
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

    function getType(data) {
            var data1 = data;
            if (data) {
               data = data.split('DD');
               if (data.length > 1) {
                  var obj = {
                     type: '[',
                     color: 'red',
                     card: data[0]
                  }
                  return obj;
               } else {
                  data = data1;
                  data = data.split('HH');
                  if (data.length > 1) {
                     var obj = {
                        type: '{',
                        color: 'red',
                        card: data[0]
                     }
                     return obj;
                  } else {
                     data = data1;
                     data = data.split('SS');
                     if (data.length > 1) {
                        var obj = {
                           type: ']',
                           color: 'black',
                           card: data[0]
                        }
                        return obj;
                     } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                           var obj = {
                              type: '}',
                              color: 'black',
                              card: data[0]
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
		
	function clearCards(){
		refresh(markettype);
		$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
		$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
	}

	function updateResult(data) {
		if(data && data[0]){
			/* data = JSON.parse(JSON.stringify(data)); */
			resultGameLast = data[0].mid;
		
			if(last_result_id != resultGameLast){
				last_result_id = resultGameLast;
				/* refresh(markettype); */
			}
		
			var html = "";
            var ab = "";
            var ab1 = "";
			casino_type = "'dtl20'";
			data.forEach((runData) => {
				if(parseInt(runData.win) == 1){
					ab = "result-a";
					ab1 = "D";
			
				}
				else if(parseInt(runData.win) == 21){
					ab = "result-b";
					ab1 = "T";
			
				}else if(parseInt(runData.win) == 41){
					ab = "result-c";
					ab1 = "L";
			
				}else{
					ab = "playertie";
					ab1 = "T";
			
				}
			
				eventId = runData.mid;
				html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1  ' + ab + ' last-result">' + ab1 + '</span>';
			});
			$("#last-result").html(html);
			if(oldGameId == 0 || oldGameId == resultGameLast){	
			
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
	
jQuery(document).on("click", ".label_stake", function () {
   stake = $(this).attr("stake");
   eventId = $("#fullMarketBetsWrap").attr("eventid");
	$("#inputStake").val(stake);
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
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'DTL20';
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
		if (bet_markettype != "FANCY_ODDS") {
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
		setTimeout(function() {
			$.ajax({
				 type: 'POST',
				 url: 'ajaxfiles/bet_place_dtl20.php',
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
						error_message_text = message;
						$("#errorMsgText").text(error_message_text);
						$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
						$(".close-bet-slip").click();
						refresh(markettype);
				 }
			 });
        }, bet_sec - 2000);
		 
	});
    </script>
</body>
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
				include("footer-js.php");
				include("footer-result-popup.php");
			?>
</html>