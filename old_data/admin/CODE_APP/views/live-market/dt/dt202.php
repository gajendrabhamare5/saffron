<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">
        .box-w3{
            width: 340px;
            min-width: 340px;
            max-width: 340px;
        }
        span.odd{
            display: block;
        }
        #matched-bet th, #unmatched-bet th{
            min-width: 100px;
        }
        .mtree table td, .mtree table th{
            width: 33.3%;
        }
        #openFancyBook{
        }
        .fancyBookModal .modal-body {
            background: none;
            padding-right: 15px;
        }
        #playStopButton {
            height:30px;
            width:70px;
            font-weight:bold;
            border-radius:8px;
            border:none;
            color:black;
            background-color:lightsteelblue;
            outline:none;
            cursor:pointer;
            font-size:12px;
            font:Arial, Helvetica, sans-serif;
        }
        .coupon-table button span{
            font-size: 14px;
        }
        .coupon-table button span.odd{
            font-size: 14px;
        }
        .live-poker
        {
            background: #EEEEEE;
        }
        .w-33
        {
            min-width: 33.33% !important;
            width: 33.33% !important;
        }
        .suspended:after{
            width: 66.5%;
        }
        td.suspendedtd:after{
            width: 100%;
        }
    </style>
    <div class="listing-grid lucky7-container casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">20-20 DRAGON TIGER LION 2 &nbsp; 
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">
                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".A2020DT2_CODE;?>" style="border:0px"></iframe>
                        <div class="video-overlay">
                            <div>
                                <img id="card_c1" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                                <img id="card_c2" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png">
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div id="tableData">
                        <div class="dt-container">
                            <div class="d-t-box m-b-10">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-5 text-center">
                                                <b>2.00</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase dt-button showbet-action market_1_b_btn market_1_row" data-index="0">
                                                        <b>Dragon</b>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_1_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <b>50.00</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase  dt-button showbet-action market_3_b_btn market_3_row" data-index="2">
                                                        <b>Tie</b>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_3_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 text-center">
                                                <b>2.00</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase dt-button showbet-action market_2_b_btn market_2_row" data-index="1">
                                                        <b>Tiger</b>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_2_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pair-block text-center">
                                        <b>12.00</b>
                                        <div class="m-t-10">
                                            <button class="suspended text-uppercase dt-button showbet-action market_4_b_btn market_4_row" data-index="3">
                                                <b>Pair</b>
                                            </button>
                                            <div class="ubook m-t-5">
                                                <b class="market_4_b_exposure market_exposure">0</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-t-10 text-right">
                                        <span class="m-r-5">
                                            <b>Min:</b>100
                                        </span>
                                        <span class="m-r-5">
                                            <b>Max:</b>300000
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 p-r-5">
                                    <div class="d-t-box m-b-10">
                                        <div class="row ">
                                            <div class="col-12">
                                                <h4 class="m-b-0 text-center text-uppercase">Dragon</h4>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <b>2.12</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase dt-button showbet-action market_5_b_btn market_5_row" data-index="4">
                                                        <b>Even</b>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_5_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <b>1.83</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase dt-button showbet-action market_6_b_btn market_6_row" data-index="5">
                                                        <b>Odd</b>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_6_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    <b>Min:</b>100
                                                </span>
                                                <span class="m-r-5">
                                                    <b>Max:</b>100000
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center m-t-10">
                                                <b>1.97</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase btn-theme market_7_b_btn market_7_row" data-index="6">
                                                        <div class="color-card"></div>
                                                        <span class="card-icon">
                                                            <span class="card-red">[</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-red">{</span>
                                                        </span>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_7_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center m-t-10">
                                                <b>1.97</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase btn-theme market_8_b_btn market_8_row" data-index="7">
                                                        <div class="color-card"></div>
                                                        <span class="card-icon">
                                                            <span class="card-black">]</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-black">}</span>
                                                        </span>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_8_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    <b>Min:</b>100
                                                </span>
                                                <span class="m-r-5">
                                                    <b>Max:</b>100000
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-l-5">
                                    <div class="d-t-box m-b-10">
                                        <div class="row ">
                                            <div class="col-12">
                                                <h4 class="m-b-0 text-center text-uppercase">Tiger</h4>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <b>2.12</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase dt-button showbet-action market_22_b_btn market_22_row" data-index="21">
                                                        <b>Even</b>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_22_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <b>1.83</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase dt-button showbet-action market_23_b_btn market_23_row" data-index="22">
                                                        <b>Odd</b>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_23_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    <b>Min:</b>100 
                                                </span>
                                                <span class="m-r-5">
                                                    <b>Max:</b>100000 
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center m-t-10">
                                                <b>1.97</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase btn-theme market_24_b_btn market_24_row" data-index="23">
                                                        <div class="color-card"></div>
                                                        <span class="card-icon">
                                                            <span class="card-red">[</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-red">{</span>
                                                        </span>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_24_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center m-t-10">
                                                <b>1.97</b>
                                                <div class="m-t-10">
                                                    <button class="suspended text-uppercase btn-theme market_25_b_btn market_25_row" data-index="24">
                                                        <div class="color-card"></div>
                                                        <span class="card-icon">
                                                            <span class="card-black">]</span>
                                                        </span>
                                                        <span class="card-icon">
                                                            <span class="card-black">}</span>
                                                        </span>
                                                    </button>
                                                    <div class="ubook m-t-5">
                                                        <b class="market_25_b_exposure market_exposure">0</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 m-t-10 text-right">
                                                <span class="m-r-5">
                                                    <b>Min:</b>100 
                                                </span>
                                                <span class="m-r-5">
                                                    <b>Max:</b>100000 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 p-r-5">
                            <div class="d-t-box m-b-10">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h4 class="m-b-0 text-center text-uppercase">Dragon <span id="dcard-rate">12.00</span></h4> 
                                    </div>
                                    <div class="card-dt col-md-12 text-center m-t-10">
                                        <div class=" m-r-5 card-image showbet-action" data-index="25">
                                            <div class="suspended card market_9_b_btn market_9_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/1.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_9_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="26">
                                            <div class="suspended card market_10_b_btn market_10_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/2.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_10_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="27">
                                            <div class="suspended card market_11_b_btn market_11_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/3.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_11_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="28">
                                            <div class="suspended card market_12_b_btn market_12_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/4.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_12_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="29">
                                            <div class="suspended card market_13_b_btn market_13_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/5.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_13_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="30">
                                            <div class="suspended card market_14_b_btn market_14_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/6.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_14_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="31">
                                            <div class="suspended card market_15_b_btn market_15_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/7.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_15_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="32">
                                            <div class="suspended card market_16_b_btn market_16_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/8.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_16_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="33">
                                            <div class="suspended card market_17_b_btn market_17_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/9.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_17_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="34">
                                            <div class="suspended card market_18_b_btn market_18_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/10.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_18_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="35">
                                            <div class="suspended card market_19_b_btn market_19_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/11.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_19_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="36">
                                            <div class="suspended card market_20_b_btn market_20_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/12.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_20_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="37">
                                            <div class="suspended card market_21_b_btn market_21_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/13.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_21_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 m-t-10 text-right" id="dcard-minmax"><span class="m-r-5"><b>Min:</b>100 </span><span class="m-r-5"><b>Max:</b>5000</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-l-5">
                            <div class="d-t-box m-b-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="m-b-0 text-center text-uppercase">
                                            Tiger <span id="tcard-rate">12.00</span>
                                        </h4> 
                                    </div>
                                    <div class="card-dt col-md-12 text-center m-t-10">
                                        <div class=" m-r-5 card-image showbet-action" data-index="8">
                                            <div class="suspended card  market_26_b_btn market_26_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/1.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_26_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="9">
                                            <div class="suspended card market_27_b_btn market_27_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/2.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_27_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="10">
                                            <div class="suspended card market_28_b_btn market_28_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/3.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_28_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="11">
                                            <div class="suspended card market_29_b_btn market_29_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/4.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_29_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="12">
                                            <div class="suspended card market_30_b_btn market_30_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/5.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_30_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="13">
                                            <div class="suspended card market_31_b_btn market_31_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/6.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_31_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="14">
                                            <div class="suspended card market_32_b_btn market_32_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/7.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_32_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="15">
                                            <div class="suspended card market_33_b_btn market_33_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/8.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_33_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="16">
                                            <div class="suspended card market_34_b_btn market_34_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/9.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_34_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="17">
                                            <div class="suspended card market_35_b_btn market_35_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/10.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_35_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="18">
                                            <div class="suspended card market_36_b_btn market_36_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/11.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_36_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="19">
                                            <div class="suspended card market_37_b_btn market_37_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/12.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_37_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                        <div class=" m-r-5 card-image showbet-action" data-index="20">
                                            <div class="suspended card market_38_b_btn market_38_row"> <img src="<?php echo WEB_URL; ?>/storage/front/img/andar_bahar/13.jpg"> </div>
                                            <div class="ubook m-t-5">
                                                <div class="ubook m-t-5"><b class="market_38_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-t-10 text-right" id="tcard-minmax"><span class="m-r-5"><b>Min:</b>100 </span><span class="m-r-5"><b>Max:</b>5000</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=dt20" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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
                        <h4 class="modal-title">20-20 Dragon Tiger Result</h4>
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
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "2020_DRAGON_TIGER2";
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'dt202');
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
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    }

                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                    }


                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat;
                    b1 = data['t2'][j].rate;


                    markettype = "2020_DRAGON_TIGER2";


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
        $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
    }

    function updateResult(data) {
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;
        var html = "";
        casino_type = "'dt202'";
        data.forEach(function (runData) {
            if (parseInt(runData.result) == 1) {
                ab = "playera";
                ab1 = "D";

            }
            else if (parseInt(runData.result) == 2) {
                ab = "playerb";
                ab1 = "T";

            } else if (parseInt(runData.result) == 3) {
                ab = "playertie";
                ab1 = "T";

            }

            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
        });
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/dt202/' + event_id,
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
            url: MASTER_URL + '/live-market/dt/active_bets/dt202/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/dt/view_more_matched/dt202/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/dt/market_analysis/dt202/' + get_round_no(),
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