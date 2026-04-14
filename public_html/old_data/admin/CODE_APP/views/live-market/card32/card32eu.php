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
            width: 50%;
            float: left;
        }
        .aaa-content
        {
            background-color: #eee;
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
    </style>
    <div class="listing-grid ddb-container casino-grid">
        <div class="coupon-card row card32eu-container">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">32 Cards - A &nbsp; 
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span>
                        </span>
                    </div>
                    <div style="position: relative;">
                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".A32CARDSB_CODE; ?>" style="border:0px"></iframe>
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <h3 class="text-white"><span id="player_1_value">Player 8:</span> <span class="text-warning" id="card_1_value">8</span></h3>
                                    <div>
                                        <img id="cards_0" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_4" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_8" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_12" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_16" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_20" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_24" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_28" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_32" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                    </div>
                                    <h3 class="text-white"><span id="player_2_value">Player 9:</span> <span class="text-warning" id="card_2_value">9</span></h3>
                                    <div>
                                        <img id="cards_1" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_5" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_9" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_13" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_17" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_21" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_25" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_29" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_33" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                    </div>
                                    <h3 class="text-white"><span id="player_3_value">Player 10:</span> <span class="text-warning" id="card_3_value">10</span></h3>
                                    <div>
                                        <img id="cards_2" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_6" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_10" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_14" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_18" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_22" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_26" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_30" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_34" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                    </div>
                                    <h3 class="text-white"><span id="player_4_value">Player 11:</span> <span class="text-warning" id="card_4_value">11</span></h3>
                                    <div>
                                        <img id="cards_3" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_7" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_11" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_15" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_19" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_23" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_27" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_31" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                        <img id="cards_35" style="display:none;" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div class="card-content m-t-10">
                        <div class="row row5">
                            <div class="table-responsive col-md-6 main-market m-b-10">
                                <div class="live-poker">
                                    <table class="table coupon-table table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="w-6">
                                        <div class="info-block"><a href="#" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                            <div id="min-max-info1" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>500000</span></div>
                                        </div>
                                        </th>
                                        <th class=" back w-2">BACK</th>
                                        <th class=" lay w-2">LAY</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bet-info suspended market_1_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 8</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_1_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_1_b_btn"><span class="odd market_1_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                                <td class=" lay w-2">
                                                    <button class="lay market_1_l_btn"><span class="odd">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_2_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 9</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_2_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_2_b_btn"><span class="odd market_2_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                                <td class=" lay w-2">
                                                    <button class="lay market_2_l_btn"><span class="odd">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_3_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 10</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_3_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_3_b_btn"><span class="odd market_3_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                                <td class=" lay w-2">
                                                    <button class="lay market_3_l_btn"><span class="odd">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_4_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 11</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_4_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_4_b_btn"><span class="odd market_4_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                                <td class=" lay w-2">
                                                    <button class="lay market_4_l_btn"><span class="odd">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive col-md-6 main-market m-b-10">
                                <div class="live-poker">
                                    <table class="table coupon-table table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="w-6">
                                        <div class="info-block"><a href="#" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                            <div id="min-max-info2" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                        </div>
                                        </th>
                                        <th class=" back w-2">Even</th>
                                        <th class=" back w-2">Odd</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bet-info suspended market_6_row market_5_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 8</b></p>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_6_b_btn"><span class="odd market_6_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_6_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_5_b_btn"><span class="odd market_5_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_5_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_7_row market_8_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 9</b></p>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_8_b_btn"><span class="odd market_8_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_8_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_7_b_btn"><span class="odd market_7_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_7_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_9_row market_10_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 10</b></p>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_10_b_btn"><span class="odd market_10_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_10_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_9_b_btn"><span class="odd market_9_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_9_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_11_row market_12_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Player 11</b></p>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_12_b_btn"><span class="odd market_12_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_12_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_11_b_btn"><span class="odd market_11_b_value">0.00</span>
                                                        <div>
                                                            <div class="ubook m-t-5 text-danger"><b class="market_11_b_exposure market_exposure">0</b></div>
                                                        </div>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row row5">
                            <div class="table-responsive col-md-6 main-market m-b-10">
                                <div class="live-poker">
                                    <table class="table coupon-table table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="w-6">
                                        <div class="info-block">
                                            <a href="#" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false" class="info-icon collapsed">
                                                <i class="fas fa-info-circle m-l-10"></i>
                                            </a>
                                            <div id="min-max-info3" class="min-max-info collapse">
                                                <span class="m-r-5"><b>Min:</b>100</span>
                                                <span class="m-r-5"><b>Max:</b>100000</span>
                                            </div>
                                        </div>
                                        </th>
                                        <th class=" back w-2">BACK</th>
                                        <th class=" lay w-2">LAY</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bet-info suspended market_13_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Any Three Card Black</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_13_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_13_b_btn"><span class="odd market_13_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                                <td class=" lay w-2">
                                                    <button class="lay market_13_l_btn"><span class="odd">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_14_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Any Three Card Red</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_14_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_14_b_btn"><span class="odd market_14_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                                <td class=" lay w-2">
                                                    <button class="lay market_14_l_btn"><span class="odd">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_27_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>Two Black Two Red</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_27_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-2">
                                                    <button class="back market_27_b_btn"><span class="odd market_27_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                                <td class=" lay w-2">
                                                    <button class="lay market_27_l_btn"><span class="odd">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive col-md-6 main-market m-b-10 card-total-block">
                                <div class="live-poker">
                                    <table class="table coupon-table table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="w-6">
                                        <div class="info-block"><a href="#" data-toggle="collapse" data-target="#min-max-info4" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                            <div id="min-max-info4" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                        </div>
                                        </th>
                                        <th class=" w-4"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bet-info suspended market_25_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>8 &amp; 9 Total</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_25_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-4">
                                                    <button class="back market_25_b_btn"><span class="odd market_25_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                            <tr class="bet-info suspended market_26_row">
                                                <td class="w-6">
                                                    <p class="m-b-0"><b>10 &amp; 11 Total</b></p>
                                                    <div>
                                                        <div class="ubook m-t-5 text-danger"><b class="market_26_b_exposure market_exposure">0</b></div>
                                                    </div>
                                                </td>
                                                <td class=" back w-4">
                                                    <button class="back market_26_b_btn"><span class="odd market_26_b_value">0.00</span> <span>0</span></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row row5 card32worli">
                            <div class="col-12">
                                <div class=" m-b-10">
                                    <table class="table table-bordered ">
                                        <tbody class="suspended market_15_row market_16_row market_17_row market_18_row market_19_row market_20_row market_21_row market_22_row market_23_row market_24_row">
                                            <tr>
                                                <th colspan="5" class="text-center card-odds"><span><b>0.00</b></span>
                                        <div class="info-block float-right"><a href="http://diamondexch999.com/admin/casino/card32eu/1d79ba131f0fbb4dc5bd89267eff87eea3f384a5" data-toggle="collapse" data-target="#min-max-info5" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                            <div id="min-max-info5" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>30000</span></div>
                                        </div>
                                        </th>
                                        </tr>
                                        <tr class="back">
                                            <td class="text-center bet-action market_15_b_btn"><span class="d-block card-number">1</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_15_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_16_b_btn"><span class="d-block card-number">2</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_16_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_17_b_btn"><span class="d-block card-number">3</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_17_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_18_b_btn"><span class="d-block card-number">4</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_18_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_19_b_btn"><span class="d-block card-number">5</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_19_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="back">
                                            <td class="text-center bet-action market_20_b_btn"><span class="d-block card-number">6</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_20_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_21_b_btn"><span class="d-block card-number">7</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_21_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_22_b_btn"><span class="d-block card-number">8</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_22_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_23_b_btn"><span class="d-block card-number">9</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_23_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                            <td class="text-center bet-action market_24_b_btn"><span class="d-block card-number">0</span>
                                                <div>
                                                    <div class="ubook m-t-5 text-danger"><b class="market_24_b_exposure market_exposure">0</b></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <marquee scrollamount="3" id="mar" class="casino-remark">Hi.</marquee>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=card32eu" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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
                                    <a class="nav-link active " data-toggle="tab" href="#matched-bet">Matched <span id="matchedCount">(0)</span></a>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">View More</a>
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
                                                    <th>MatchDate</th>
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
                        <button type="button" class="close" data-dismiss="modal">×</button>
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
                        <h4 class="modal-title">View More Bet</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
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
                        <h4 class="modal-title">32 Cards B Result</h4>
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
                <h4 class="modal-title">View More Bet</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="viewMoreMatchedDataModal">
                    <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2" id="matchedDataLink">Matched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2" id="deletedMatchedDataLink">Deleted Bets</a>
                        </li>
                    </ul>
                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">
                            <form method="POST" id="form-view_more_bets">
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
                            </form>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
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
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
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
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
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
    var data6;
    var markettype = "32CARDSB";
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'card32eu');
        });
        socket.on('game', function (data) {

            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    clearCards();
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_1_value").text(data.t1[0].C1);
                    }
                    if (data.t1[0].C2 != 1) {
                        $("#card_2_value").text(data.t1[0].C2);
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_3_value").text(data.t1[0].C3);
                    }
                    if (data.t1[0].C4 != 1) {
                        $("#card_4_value").text(data.t1[0].C4);
                    }

                    if (data.t1[0].C1 > data.t1[0].C2 && data.t1[0].C1 > data.t1[0].C3 && data.t1[0].C1 > data.t1[0].C4) {
                        $("#player_2_value").removeClass("text-success");
                        $("#player_3_value").removeClass("text-success");
                        $("#player_4_value").removeClass("text-success");
                        $("#player_1_value").addClass("text-success");
                    }

                    if (data.t1[0].C2 > data.t1[0].C1 && data.t1[0].C2 > data.t1[0].C3 && data.t1[0].C2 > data.t1[0].C4) {
                        $("#player_3_value").removeClass("text-success");
                        $("#player_4_value").removeClass("text-success");
                        $("#player_1_value").removeClass("text-success");
                        $("#player_2_value").addClass("text-success");
                    }

                    if (data.t1[0].C3 > data.t1[0].C1 && data.t1[0].C3 > data.t1[0].C2 && data.t1[0].C3 > data.t1[0].C4) {
                        $("#player_4_value").removeClass("text-success");
                        $("#player_1_value").removeClass("text-success");
                        $("#player_2_value").removeClass("text-success");
                        $("#player_3_value").addClass("text-success");
                    }

                    if (data.t1[0].C4 > data.t1[0].C1 && data.t1[0].C4 > data.t1[0].C2 && data.t1[0].C4 > data.t1[0].C3) {
                        $("#player_1_value").removeClass("text-success");
                        $("#player_2_value").removeClass("text-success");
                        $("#player_3_value").removeClass("text-success");
                        $("#player_4_value").addClass("text-success");
                    }



                    if (data.t1[0].desc) {
                        cards_img = data.t1[0].desc;
						cards_img=cards_img.split(',');
                        for (var i in cards_img) {
                            if (cards_img[i] && cards_img[i] != 1) {
                                $("#cards_" + i).attr("src", site_url + "storage/front/img/cards/" + cards_img[i] + ".png");
                                $("#cards_" + i).show();
                            }
                        }
                    }


                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nation;
                    b1 = data['t2'][j].b1;
                    bs1 = data['t2'][j].bs1;
                    l1 = data['t2'][j].l1;
                    ls1 = data['t2'][j].ls1;

                    b11 = b1;
                    markettype = "32CARDSB";
                    if (selectionid >= 15 && selectionid <= 24) {
                        runner1 = runner.replace("Single ", "");
                        b11 = runner1;

                    }


                    //$(".market_" + selectionid + "_b_btn").html(back_html);
                    $(".market_" + selectionid + "_b_value").text(b11);

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

                    lay_html = '<span class="odd"><b>' + l1 + '</b></span> <span style="color: black;">' + ls1 + '</span>';
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

                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                        $(".market_" + selectionid + "_row").addClass("suspended");
                    }
                    else {
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

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('SS');
            if (data.length > 1) {
                var obj = {
                    type: '[',
                    color: 'red',
                    card: data[0]
                }
                return obj;
            }
            else {
                data = data1;
                data = data.split('DD');
                if (data.length > 1) {
                    var obj = {
                        type: '{',
                        color: 'red',
                        card: data[0]
                    }
                    return obj;
                }
                else {
                    data = data1;
                    data = data.split('HH');
                    if (data.length > 1) {
                        var obj = {
                            type: ']',
                            color: 'black',
                            card: data[0]
                        }
                        return obj;
                    }
                    else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: '}',
                                color: 'black',
                                card: data[0]
                            }
                            return obj;
                        }
                        else {
                            return 0;
                        }
                    }
                }
            }
        }
        return 0;
    }

    function clearCards() {

        $("#player_1_value").removeClass("text-success");
        $("#player_2_value").removeClass("text-success");
        $("#player_3_value").removeClass("text-success");
        $("#player_4_value").removeClass("text-success");

        $("#card_1_value").text("0");
        $("#card_2_value").text("0");
        $("#card_3_value").text("0");
        $("#card_4_value").text("0");
        for (i = 0; i <= 35; i++) {
            $("#cards_" + i).hide();
            $("#cards_" + i).attr("storage/front/img/cards/1.png");
        }
    }
    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;
            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'card32eu'";
            data.forEach(function (runData) {
                if (parseInt(runData.result) == 1) {
                    ab = "playera";
                    ab1 = "8";

                }
                else if (parseInt(runData.result) == 2) {
                    ab = "playerb";
                    ab1 = "9";

                }
                else if (parseInt(runData.result) == 3) {
                    ab = "playerc";
                    ab1 = "10";

                }
                else {
                    ab = "playerd";
                    ab1 = "11";
                }

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });


            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {

                $("#player_1_value").removeClass("text-success");
                $("#player_2_value").removeClass("text-success");
                $("#player_3_value").removeClass("text-success");
                $("#player_4_value").removeClass("text-success");
                $("#card_1_value").text("0");
                $("#card_2_value").text("0");
                $("#card_3_value").text("0");
                $("#card_4_value").text("0");
                for (i = 0; i <= 35; i++) {
                    $("#cards_" + i).hide();
                    $("#cards_" + i).attr("storage/front/img/cards/1.png");
                }
            }
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/card32eu/' + event_id,
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
            url: MASTER_URL + '/live-market/card32/active_bets/card32eu/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/card32/view_more_matched/card32eu/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/card32/market_analysis/card32eu/' + get_round_no(),
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