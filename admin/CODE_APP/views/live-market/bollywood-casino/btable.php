<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">
        .aaa-button
        {
            margin-top: 10px;
        }
        .aaa-button button
        {
            padding: 8px;
            border: 0;
            outline: none;
            width: 48%;
            float: left;
        }
        .aaa-content
        {
            /* background-color: #eee; */
            padding: 15px;
        }
        .bollywood-casino-btn
        {
            color:#fff;
            background-image: linear-gradient(to right ,#0088CC,#2C3E50);
            width: 100%;
            border-radius: 4px;
            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);
            border: 0;
            padding: 8px 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        .card-image
        {
            display: inline-block;
        }
        .card-image img
        {
            width: 40px;
        }
        .suspended
        {
            position: relative;
            
        }
        .suspended:after
        {
            width: 100%;
            content: "\f023";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color:#fff;
            background:rgba(0, 0, 0, 0.90);
        }
        .info-icon
        {
            color: #000;
            font-size: 16px;
        }
        .info-block
        {
            position: relative;
        }
        .info-block .min-max-info
        {
            background: rgb(102, 102, 102) none repeat scroll 0% 0%;
            padding: 6px 14px;
            position: absolute;
            color: rgb(255, 255, 255);
            right: 0px;
            z-index: 1000;
        }
        .aaa-content b
        {
            font-size: 16px;
        }
        .ddb-second-row .aaa-content
        {
            height: 240px;
        }
        .ball-runs{
            margin-left: 2px;
        }
        .ubook b{
            font-size: 14px;
        }
        #view-more label{
            display: block;
        }

         .casino-bl-box-item {
        width: 100%;
        height: 40px;
    }

    .video-overlay.right {
    /* right: 0; */
    left: auto;
    text-align: right;
}
    </style>
     <style>
    .casino-video-right-icons {
        position: absolute;
        right: 5px;
        top: 5px;
        display: flex;
        display: -webkit-flex;
    }

    .casino-video-rules-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border: 2px solid #999;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        display: flex;
        display: -webkit-flex;
        align-items: center;
        justify-content: center;
        margin-right: 5px;
        cursor: pointer;
        font-size: 24px;
    }

    .casino-video-rules-icon i {
        font-size: 24 px !important;
        color: #fff;
        cursor: pointer;

    }
    
  .tooltip-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
        font-family: Arial, sans-serif;
    }

    .tooltip-box {
        visibility: hidden;
        /* background-color: #fff; */
        color: #333;
        /* border: 1px solid #ccc; */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        position: absolute;
        z-index: 1;
        top: 125%;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        overflow: hidden;
        left: -617%;
    width: 1500%;
    height: 550%;
    }

    .tooltip-header {
        background-color: #333;
        display: flex;
        justify-content: center;
        font-size: 16px;
        padding: 4px 8px;
        width: 100%;
        color: white;
         position: relative;
    }

    .tooltip-content {
        padding: 10px;
        overflow-x: hidden;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #666666 #333333;
        height: calc(100% - 74px);
        line-height: normal;
        width: 100%;
        background-color: black;
        color: white;
        font-size: 12px;
    }

    .tooltip-container.show-tooltip .tooltip-box {
        visibility: visible;

    }
    .tooltip-close {
        cursor: pointer;
    font-size: 23px;
    font-weight: bold;
    position: absolute;
    right: 8px; 
    top: 50%;
    transform: translateY(-50%);
}
</style>
    <div class="listing-grid ddb-container casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">Bollywood Casino &nbsp; 
                            <!-- <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small> -->
                        </span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">
<?php
  							if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe class="iframedesign" src="<?php echo IFRAME_URL."".BTABLE_CODE;?>" width="100%" height="400px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>
                        <!-- <iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <!-- <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".BTABLE_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay right">
                            <div>
                                <!-- <h4 class="text-white">Card</h4>  -->
                                <img id="card_c1" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                            </div>
                        </div>

                               <div class="casino-video-right-icons">
                            <div title="Rules" class="casino-video-rules-icon tooltip-container" id="tooltipBtn">
                                <i class="fas fa-info-circle" style="margin: 6px 0 0 6px;"></i>
                                <div class="tooltip-box">
                                    <div class="tooltip-header">Rules  <span class="tooltip-close" id="tooltipClose">&times;</span></div>
                                    <div class="tooltip-content">
                                        <div class="rules-body"><div><style type="text/css">
    .rules-section .row.row5 {
        margin-left: -5px;
        margin-right: -5px;
    }

    .rules-section .pl-2 {
        padding-left: .5rem !important;
    }

    .rules-section .pr-2 {
        padding-right: .5rem !important;
    }

    .rules-section .row.row5>[class*="col-"],
    .rules-section .row.row5>[class*="col"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .rules-section {
        text-align: left;
        margin-bottom: 10px;
    }

    .rules-section .table {
        color: #fff;
        border: 1px solid #444;
        background-color: #222;
        font-size: 12px;
    }

    .rules-section .table td,
    .rules-section .table th {
        border-bottom: 1px solid #444;
    }

    .rules-section ul li,
    .rules-section p {
        margin-bottom: 5px;
    }

    .rules-section::-webkit-scrollbar {
        width: 8px;
    }

    .rules-section::-webkit-scrollbar-track {
        background: #666666;
    }

    .rules-section::-webkit-scrollbar-thumb {
        background-color: #333333;
    }

    .rules-section .rules-highlight {
        color: #FDCF13;
        font-size: 16px;
    }

    .rules-section .rules-sub-highlight {
        color: #FDCF13;
        font-size: 14px;
    }

    .rules-section .list-style,
    .rules-section .list-style li {
        list-style: disc;
    }

    .rules-section .rule-card {
        height: 20px;
        margin-left: 5px;
    }

    .rules-section .card-character {
        font-family: Card Characters;
    }

    .rules-section .red-card {
        color: red;
    }

    .rules-section .black-card {
        color: black;
    }

    .rules-section .cards-box {
        background: #fff;
        padding: 6px;
        display: inline-block;
        color: #000;
        min-width: 150px;
    }
    </style>

<div class="rules-section">
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>The bollywood table game will be played with a total of 16 cards including (J,Q, K, A) these cards and 2 deck that means game is playing with total 16*2 = 32 cards</li>
                                                <li>
                                                    <div class="cards-box">
                                                        <span>If the card is</span>
                                                        <span class="card-character black-card ml-1">A}</span>
                                                        <span>Don Wins</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cards-box">
                                                        <span>If the card is</span>
                                                        <span class="card-character red-card ml-1">A{</span>
                                                        <span class="card-character red-card ml-1">A[</span>
                                                        <span class="card-character black-card ml-1">A]</span>
                                                        <span>Amar Akbar Anthony Wins</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cards-box">
                                                        <span>If the card is</span>
                                                        <span class="card-character black-card ml-1">K}</span>
                                                        <span class="card-character black-card ml-1">Q}</span>
                                                        <span class="card-character black-card ml-1">J}</span>
                                                        <span>Sahib Bibi aur Ghulam Wins.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cards-box">
                                                        <span>If the card is</span>
                                                        <span class="card-character red-card ml-1">K[</span>
                                                        <span class="card-character black-card ml-1">K]</span>
                                                        <span>Dharam Veer Wins.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cards-box">
                                                        <span>If the card is</span>
                                                        <span class="card-character red-card ml-1">K{</span>
                                                        <span class="card-character black-card ml-1">Q]</span>
                                                        <span class="card-character red-card ml-1">Q[</span>
                                                        <span class="card-character red-card ml-1">Q{</span>
                                                        <span>Kis Kisko Pyaar Karoon Wins.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="cards-box">
                                                        <span>If the card is</span>
                                                        <span class="card-character red-card ml-1">J{</span>
                                                        <span class="card-character black-card ml-1">J]</span>
                                                        <span class="card-character red-card ml-1">J[</span>
                                                        <span>Ghulam Wins.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>
                                                    <b>ODD:</b>
                                                    <span>J K A</span>
                                                </li>
                                                <li>
                                                    <b>DULHA DULHAN:</b>
                                                    <span>Q K</span>
                                                    <span>Payout: 1.97</span>
                                                </li>
                                                <li>
                                                    <b>BARATI:</b>
                                                    <span>A J</span>
                                                    <span>Payout: 1.97</span>
                                                </li>
                                                <li>
                                                    <b>RED:</b>
                                                    <span>Payout: 1.97</span>
                                                </li>
                                                <li>
                                                    <b>BLACK:</b>
                                                    <span>Payout: 1.97</span>
                                                </li>
                                                <li>
                                                    <span>J,Q,K,A</span>
                                                    <div>PAYOUT: 3.75</div>
                                                </li>
                                                <li>A = DON</li>
                                                <li>B = AMAR AKBAR ANTHONY</li>
                                                <li>C = SAHIB BIBI AUR GHULAM</li>
                                                <li>D = DHARAM VEER</li>
                                                <li>E = KIS KISKO PYAAR KAROON</li>
                                                <li>F = GHULAM</li>
                                                
                                            </ul>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div>
                        <div class="card-content aaa-content m-t-10">
                            <!-- <div class="row">
                                <div class="col-12 text-right">
                                    <div class="info-block">
                                        <a href="#" data-toggle="collapse" data-target="#min-max-info1" class="info-icon">
                                            <i class="fas fa-info-circle m-l-10"></i>
                                        </a>
                                        <div id="min-max-info1" class="collapse min-max-info">
                                            <span class="m-r-5"><b>Min:</b>100</span> 
                                            <span class="m-r-5"><b>Max:</b>300000</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div><span class="d-block"><b>A. DON</b>
                                        </span>
                                    </div>
                                    <div class="aaa-button clearfix ">
                                        <button class="back market_1_b_btn suspended market_1_row" style="margin-right:10px;"><span class="odd">15</span></button>
                                        <button class="lay market_1_l_btnbsuspended market_1_row"><span class="odd">17</span></button>
                                    </div>
                                    <div>
                                        <div class="ubook m-t-5 market_1_b_exposure market_exposure text-danger"><b>0</b></div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div><span class="d-block"><b>B. Amar Akbar Anthony</b>
                                        </span>
                                    </div>
                                    <div class="aaa-button clearfix">
                                        <button class="back market_2_b_btn suspended market_2_row" style="margin-right:10px;"><span class="odd">5.15</span></button>
                                        <button class="lay  market_2_l_btn suspended market_2_row"><span class="odd">5.50</span></button>
                                    </div>
                                    <div>
                                        <div class="ubook m-t-5 market_2_b_exposure market_exposure text-danger"><b>0</b></div>
                                    </div>
                                </div>
                                <div class="col-4 text-center ">
                                    <div><span class="d-block"><b>C. Sahib Bibi Aur Ghulam</b>
                                        </span>
                                    </div>
                                    <div class="aaa-button clearfix">
                                        <button class="back market_3_b_btn suspended market_3_row" style="margin-right:10px;"><span class="odd">5.15</span></button>
                                        <button class="lay market_3_l_btn suspended market_3_row"><span class="odd">5.50</span></button>
                                    </div>
                                    <div>
                                        <div class="ubook m-t-5 market_3_b_exposure market_exposure text-danger"><b>0</b></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-4 text-center">
                                    <div><span class="d-block"><b>D. Dharam Veer</b>
                                        </span>
                                    </div>
                                    <div class="aaa-button clearfix">
                                        <button class="back market_4_b_btn suspended market_4_row" style="margin-right:10px;"><span class="odd">7.65</span></button>
                                        <button class="lay market_4_l_btn suspended market_4_row"><span class="odd">8.35</span></button>
                                    </div>
                                    <div>
                                        <div class="ubook m-t-5 market_4_b_exposure market_exposure text-danger"><b>0</b></div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div><span class="d-block"><b>E. Kis KisKo Pyaar Karoon</b>
                                        </span>
                                    </div>
                                    <div class="aaa-button clearfix">
                                        <button class="back market_5_b_btn suspended market_5_row" style="margin-right:10px;"><span class="odd">3.85</span></button>
                                        <button class="lay market_5_l_btn suspended market_5_row"><span class="odd">4.15</span></button>
                                    </div>
                                    <div>
                                        <div class="ubook m-t-5 market_5_b_exposure market_exposure text-danger"><b>0</b></div>
                                    </div>
                                </div>
                                <div class="col-4 text-center ">
                                    <div><span class="d-block"><b>F. Ghulam</b>
                                        </span>
                                    </div>
                                    <div class="aaa-button clearfix">
                                        <button class="back market_6_b_btn suspended market_6_row" style="margin-right:10px;"><span class="odd">5.15</span></button>
                                        <button class="lay market_6_l_btn suspended market_6_row"><span class="odd">5.50</span></button>
                                    </div>
                                    <div>
                                        <div class="ubook m-t-5 market_6_b_exposure market_exposure text-danger"><b>0</b></div>
                                    </div>
                                    <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>1L</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-4 p-r-5">
                                <div class="aaa-content">
                                    <!-- <div class="text-right">
                                        <div class="info-block">
                                            <a href="#" data-toggle="collapse" data-target="#min-max-info6" class="info-icon">
                                                <i class="fas fa-info-circle m-l-10"></i>
                                            </a>
                                            <div id="min-max-info6" class="collapse min-max-info">
                                                <span class="m-r-5"><b>Min:</b>100</span> 
                                                <span class="m-r-5"><b>Max:</b>100000</span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="text-center row">
                                        <div class="col-12">
                                            <div><span class="d-block"><b>Odd</b></span></div>
                                            <div class="aaa-button clearfix ">
                                                <button class="back market_7_b_btn suspended market_7_row" style="margin-right:10px;"><span class="odd">1.31</span></button>
                                                <button class="lay market_7_l_btn suspended market_7_row"><span class="odd">1.36</span></button>
                                            </div>
                                            <div>
                                                <div class="ubook m-t-5 market_7_b_exposure market_exposure text-danger"><b>0</b></div>
                                            </div>
                                             <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>1L</span></div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 p-l-5">
                                <div class="aaa-content">
                                    <div class="row">
                                        <div class="col-6">
                                            <!-- <div class="text-right">
                                                <div class="info-block">
                                                    <a href="#" data-toggle="collapse" data-target="#min-max-info13" class="info-icon">
                                                        <i class="fas fa-info-circle m-l-10"></i>
                                                    </a>
                                                    <div id="min-max-info13" class="collapse min-max-info">
                                                        <span class="m-r-5"><b>Min:</b>100</span>
                                                        <span class="m-r-5"><b>Max:</b>100000</span>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="text-center m-t-5">
                                                <div><b class=" market_14_b_value">0</b></div>
                                                <div class="m-b-5 m-t-5">
                                                    <button class="back suspended market_14_b_btn market_14_row casino-bl-box-item"> Dulha Dulhan K-Q </button>
                                                </div>
                                                <div>
                                                    <div class="ubook m-t-5 market_14_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                                 <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>1L</span></div>
                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <!-- <div class="text-right">
                                                <div class="info-block">
                                                    <a href="#" data-toggle="collapse" data-target="#min-max-info14" class="info-icon">
                                                        <i class="fas fa-info-circle m-l-10"></i>
                                                    </a>
                                                    <div id="min-max-info14" class="collapse min-max-info">
                                                        <span class="m-r-5"><b>Min:</b>100</span> 
                                                        <span class="m-r-5"><b>Max:</b>100000</span>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="text-center m-t-5">
                                                <div><b class=" market_15_b_value">0</b></div>
                                                <div class="m-b-5 m-t-5">
                                                    <button class="back suspended market_15_b_btn market_15_row casino-bl-box-item"> Barati J-A </button>
                                                </div>
                                                <div>
                                                    <div class="ubook m-t-5 market_15_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                                 <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>1L</span></div>
                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-6 p-r-5">
                                <div class="aaa-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- <div class="text-right">
                                                <div class="info-block">
                                                    <a href="#" data-toggle="collapse" data-target="#min-max-info7" class="info-icon">
                                                        <i class="fas fa-info-circle m-l-10"></i>
                                                    </a>
                                                    <div id="min-max-info7" class="collapse min-max-info">
                                                        <span class="m-r-5"><b>Min:</b>100</span>
                                                        <span class="m-r-5"><b>Max:</b>100000</span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="text-center">
                                                <div><b class=" market_8_b_value">0</b></div>
                                                <div class="m-b-5 m-t-5">
                                                    <button class="back  suspended market_8_b_btn market_8_row casino-bl-box-item">
                                                        <div class="color-card"></div> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                                    </button>
                                                </div>
                                                <div>
                                                    <div class="ubook m-t-5 market_8_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                                 <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>1L</span></div>
                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center ">
                                                <div><b class=" market_9_b_value">0</b></div>
                                                <div class="m-b-5 m-t-5">
                                                    <button class="back suspended market_9_b_btn market_9_row casino-bl-box-item">
                                                        <div class="color-card"></div> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                                    </button>
                                                </div>
                                                <div>
                                                    <div class="ubook m-t-5 market_9_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                                 <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>1L</span></div>
                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-l-5">
                                <div class="aaa-content">
                                    <div class="row">
                                        <div class="col-8 text-right"><b>Cards <span class="market_10_b_value"> 3.75</span></b></div>
                                        <div class="col-4">
                                            <!-- <div class="text-right">
                                                <div class="info-block"><a href="#" data-toggle="collapse" data-target="#min-max-info9" class="info-icon">
                                                        <i class="fas fa-info-circle m-l-10"></i>
                                                    </a>
                                                    <div id="min-max-info9" class="collapse min-max-info">
                                                        <span class="m-r-5"><b>Min:</b>100</span> 
                                                        <span class="m-r-5"><b>Max:</b>100000</span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="text-center m-t-10">
                                        <div class="m-b-5 m-t-5">
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_10_b_btn market_10_row"><img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/11.jpg"></div>
                                                <div>
                                                    <div class="ubook m-t-5 market_10_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_11_b_btn market_11_row"><img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/12.jpg"></div>
                                                <div>
                                                    <div class="ubook m-t-5 market_11_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_12_b_btn market_12_row"><img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/13.jpg"></div>
                                                <div>
                                                    <div class="ubook m-t-5 market_12_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_13_b_btn market_13_row"><img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/1.jpg"></div>
                                                <div>
                                                    <div class="ubook m-t-5 market_13_b_exposure market_exposure text-danger"><b>0</b></div>
                                                </div>
                                            </div>
                                             <div class="teen1daycasino-container casino-min-max w-100">
                                        <div style="text-align: end;">R:<span>100</span>-<span>25k</span></div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=btable" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="text-right" id="last-result"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10 scorecard" style="margin-bottom: 0px;">
                    <div class="card m-b-10 my-bet">
                        <div class="card-header">
                            <ul class="nav nav-tabs d-inline-block" role="tablist ">
                                <li class="nav-item d-inline-block">
                                    <!-- <a class="nav-link active " data-toggle="tab" href="#matched-bet">Matched <span id="matchedCount">(0)</span></a> -->
                                     <span>MY BETS</span>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">VIEW MORE</a>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="matched-bet" class="tab-pane active">
                                    <div class="table-responsive">
                                        <table id="matched" class="table coupon-table table-bordered table-stripted">
                                            <thead>
                                                <tr>
                                                    <th>UserName</th>
                                                    <th style="min-width: 140px">Nation</th>
                                                    <th style="min-width: 50px">Rate</th>
                                                    <th>Amount</th>
                                                    <th>PlaceDate</th>
                                                    <!-- <th>MatchDate</th> -->
                                                    <th style="min-width:70px">Gametype</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_body">
                                                <tr class="">
                                                    <td colspan="100%" align="center">Loading</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="userwise">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Active User</h4>
                        <button type="button" class="close" data-dismiss="modal">�</button>
                    </div>
                    <div class="modal-body">
                        <div class="usertypewiseactive-container"></div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view-more">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View More</h4>
                        <button type="button" class="close" data-dismiss="modal">�</button>
                    </div>
                    <div class="modal-body">
                        <div class="viewMoreMatchedDataModal"></div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalrulesteenpatti" class="modal fade teenpatti">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Rules</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <img src="../../../storage/front/img/rules/tp-rules.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog" style="min-width: 650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Bollywood Casino Result</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="cards_data1">
                        <div>
                            <h6 class="text-right round-id">
                                <b>Round Id:</b> 
                            </h6>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-view_more">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View More</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="viewMoreMatchedDataModal">
                    <!-- <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2" id="matchedDataLink">Matched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2" id="deletedMatchedDataLink">Deleted Bets</a>
                        </li>
                    </ul> -->
                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">
                            <!-- <form method="POST" id="form-view_more_bets">
                                <div class="row form-inline">
                                    <div class="col-md-5">
                                        <div class="form-group m-t-20">
                                            <label for="list-ac" class="d-inline-block">Client Name</label>
                                            <select class="form-control" name="search-client_name" id="search-client_name" id="" style="width: 160px;"></select>
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">IP Address</label>
                                            <input type="text" name="search-ipaddress" id="search-ipaddress" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Amount</label>
                                            <input type="text" name="search-amount_min" id="search-amount_min" class="form-control" placeholder="Min">
                                            <input type="text" name="search-amount_max" id="search-amount_max" class="form-control m-l-10" placeholder="Max">
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Type</label>
                                            <select name="search-bettype" class="form-control d-inline-block" id="search-bettype"> 
                                                <option value="">All</option>
                                                <option value="back">Back</option>
                                                <option value="lay">Lay</option>
                                            </select>
                                            <button class="btn btn-back m-l-10" id="btn-search" type="submit">Search</button>
                                            <button type="reset" class="btn btn-back m-l-10" id="btn-view_all_matched">View All</button>
                                        </div>
                                    </div>
                                </div>
                            </form> -->
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-view_more_matched">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="unmatched-bet2" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td colspan="100%" align="center">No Record Found!..</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="deleted-bet2" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td colspan="100%" align="center">No Record Found!..</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/flipclock.js" type="text/javascript"></script>


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
    var markettype = "B_TABLE";
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'btable');
        });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });

        socket.on('game', function (data) {
        data1 = data;
            if (data && data['t1'] && data['t1'][0]) {

                if (oldGameId != data1.t1[0].mid && data1.t1[0].mid != 0 && data1.t1[0].mid != "0") {
                 setTimeout(function() {
                     clearCards();
                 }, <?php //echo CASINO_RESULT_TIMEOUT; ?>);
            }

                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);

                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    }


                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat;
                    b1 = data['t2'][j].b1;
                    b1 = parseFloat(b1);
                    l1 = data['t2'][j].l1;
                    l1 = parseFloat(l1);


                    markettype = "B_TABLE";


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


                    $(".market_" + selectionid + "_l_value").text(l1);
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




                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                        $(".market_" + selectionid + "_row").addClass("suspended");
                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                    }
                    else {
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                    }
                }


            }
        });

        socket.on('gameResult', function (args) {
            updateResult(args.data);
        });
        socket.on('error', function (data) {
        });
        socket.on('close', function (data) {
        });
    }
    function clearCards() {
        $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
    }

    function updateResult(data) {
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;
        var html = "";
        casino_type = "'btable'";
        data.forEach(function (runData) {
            if (parseInt(runData.result) == 1) {
                ab = "playerb";
                ab1 = "A";

            }
            else if (parseInt(runData.result) == 2) {
                ab = "playerb";
                ab1 = "B";

            }
            else if (parseInt(runData.result) == 3) {
                ab = "playerb";
                ab1 = "C";
            } else if (parseInt(runData.result) == 4) {
                ab = "playerb";
                ab1 = "D";
            } else if (parseInt(runData.result) == 5) {
                ab = "playerb";
                ab1 = "E";
            } else if (parseInt(runData.result) == 6) {
                ab = "playerb";
                ab1 = "F";
            }

            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }
    teenpatti("ok");

</script>
<script>

    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/btable/' + event_id,
            dataType: 'json',
            data: {event_id: event_id, casino_type: casino_type},
            success: function (response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
            }
        });
    }

    function get_round_no() {
        return $.trim($('.round_no').text());
    }

    $('.last-result').on('click', function () {

        $('#modalpokerresult').modal('show');
    });
    var xhr;
    function call_active_bets() {

        if (get_round_no() == 0) {
            $('#table_body').html('');
            $('#matchedCount').html('(0)');
        }
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/live-market/bollywood-casino/active_bets/btable/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {

                if (data.results) {

                    $('#table_body').html(data.results);
                    $('#matchedCount').html('(' + data.total_bets + ')');
                }

            }

        });
    }

    var xhr_vm;
    function call_view_more_bets() {

        if (xhr_vm && xhr_vm.readyState != 4)
            xhr_vm.abort();
        xhr_vm = $.ajax({
            url: MASTER_URL + '/live-market/bollywood-casino/view_more_matched/btable/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            data: $('#form-view_more_bets').serialize(),
            success: function (data) {

                if (data.results) {

                    $('#tbody-view_more_matched').html(data.results);
                    $('#modal-view_more').modal('show');
                    $('[data-toggle="tooltip"]').tooltip();
                }

            }

        });
    }



    var xhr_analysis;
    function call_analysis() {
        if (get_round_no() == 0) {
            $('.market_exposure').text(0).css('color', 'black');
            return false;
        }

        if (xhr_analysis && xhr_analysis.readyState != 4)
            xhr_analysis.abort();
        xhr_analysis = $.ajax({
            url: MASTER_URL + '/live-market/bollywood-casino/market_analysis/btable/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.results == 0) {
                    $('.market_exposure').text(0).css('color', 'black');
                }
                $.each(data.results, function (index, value) {
                    var element = $('.market_' + value.market_id + '_b_exposure');
                    $(element).text(value.pl);
                    if (value.pl > 0)
                        $(element).css('color', 'green');
                    else
                        $(element).css('color', 'red');
                });
            }

        });
    }

    $(function () {

        setTimeout(function () {
            call_active_bets();
            call_analysis();
        }, 2000);
        setInterval(function () {
            call_active_bets();
            call_analysis();
        }, <?php echo CASINO_SET_INTERVAL;  ?>);
        $('#view_more_bets').on('click', function () {

            call_view_more_bets();
        });
        $('#form-view_more_bets').on('submit', function () {

            call_view_more_bets();
            return false;
        });
        $('#btn-view_all_matched').on('click', function () {

            $('#search-client_name').html('');
            setTimeout(function () {

                call_view_more_bets();
            }, 1);
        });
        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'select..',
            ajax: {
                url: MASTER_URL + '/reports/common/get_clients',
                data: function (params) {

                    var query = {
                        search: params.term,
                        type: 'public'

                    }

                    return query;
                }

            },
        });
    });

</script>
<script>
const tooltipBtn = document.getElementById("tooltipBtn");
const tooltipClose = document.getElementById("tooltipClose");

tooltipBtn.addEventListener("click", function(e) {
    // Prevent closing when clicking inside tooltip-box
    if (!e.target.closest('.tooltip-box')) {
        this.classList.toggle("show-tooltip");
    }
});

// Close button action
tooltipClose.addEventListener("click", function(e) {
    e.stopPropagation(); // Prevent triggering the main click event
    tooltipBtn.classList.remove("show-tooltip");
});
</script>