<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.theme.default.css">
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
        .andar-bahar-image
        {
            width: 45px;
            cursor: pointer;
        }
        .ab-slider{
            margin: 0 25px;
            width: 140px;
        }
        .ab-slider .items{
            width: 25px
        }
        #andar-box, #bahar-box{
            vertical-align: top;
            height: 80px;
        }
        #andar-box .game-section, #bahar-box .game-section{
            position: relative;
        }
        #andar-box .game-section .odds, #bahar-box .game-section .odds{
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
        }
        .owl-next{
            position: absolute;
            top: 0;
            left: -20px;
        }
        .owl-prev{
            position: absolute;
            top: 0;
            right: -20px;
        }
        .owl-next span, .owl-prev span{
            color: #fff;
            font-size: 33px;
        }

    </style>

    <div class="listing-grid casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">Andarbahar &nbsp; 
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small>
                        </span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span> | Min: <span id="min-bet">100</span> | Max: <span id="max-bet">200000</span>
                        </span>
                    </div>

                    <div style="position: relative;">

						<iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                       <!--  <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".ANDARBAHAR_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="card-inner">
                                    <h3 class="text-white">Andar</h3>
                                    <div class="ab-slider owl-carousel owl-theme owl-rtl owl-loaded owl-drag" id="andar-cards">
                                        <div class="owl-stage-outer"><div class="owl-stage"></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">�</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">�</span></button></div><div class="owl-dots disabled"></div></div>
                                </div>
                                <div class="card-inner">
                                    <h3 class="text-white">Bahar</h3>
                                    <div class="ab-slider owl-carousel owl-theme owl-rtl owl-loaded owl-drag" id="bahar-cards">

                                        <div class="owl-stage-outer"><div class="owl-stage"></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">�</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">�</span></button></div><div class="owl-dots disabled"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                    </div>

                    <div class="card-content m-t-5">
                        <div class="main-market">
                            <table class="table coupon-table table table-bordered andar-bahar">
                                <tbody class="">
                                    <tr class="bet-info" style="background: lightsalmon">
                                        <td class="p-title"><b>Andar</b></td>
                                        <td class="text-center" id="andar-box">
                                            <span class="game-section" data-nation="Ander A" data-sid="1" data-gstatus="0" data-rate="2.00">
                                                <img id="ab_cards_1" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_1_b_exposure market_exposure">0</span>        
                                            </span>
                                            <span class="game-section" data-nation="Ander 2" data-sid="2" data-gstatus="0" data-rate="2.00">
                                                <img id="ab_cards_2" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_2_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 3" data-sid="3" data-gstatus="0" data-rate="2.00">
                                                <img id="ab_cards_3" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_3_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 4" data-sid="4" data-gstatus="0" data-rate="2.00">
                                                <img id="ab_cards_4" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_4_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 5" data-sid="5" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_5" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_5_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 6" data-sid="6" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_6" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_6_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 7" data-sid="7" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_7" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_7_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 8" data-sid="8" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_8" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_8_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 9" data-sid="9" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_9" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_9_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander 10" data-sid="10" data-gstatus="0" data-rate="2.00"> 
                                                <img  id="ab_cards_10"src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_10_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander J" data-sid="11" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_11" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_11_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander Q" data-sid="12" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_12" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_12_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Ander K" data-sid="13" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_13" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_13_b_exposure market_exposure">0</span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="bet-info" style="background: lightgreen">
                                        <td class="p-title"><b>Bahar</b></td>
                                        <td class="text-center" id="bahar-box">
                                            <span class="game-section" data-nation="Bahar A" data-sid="21" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_21" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_21_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 2" data-sid="22" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_22" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_22_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 3" data-sid="23" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_23" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_23_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 4" data-sid="24" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_24" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_24_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 5" data-sid="25" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_25" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_25_b_exposure market_exposure">0</span> 
                                            </span>
                                            <span class="game-section" data-nation="Bahar 6" data-sid="26" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_26" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_26_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 7" data-sid="27" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_27" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_27_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 8" data-sid="28" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_28" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_28_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 9" data-sid="29" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_29" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_29_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar 10" data-sid="30" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_30" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_30_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar J" data-sid="31" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_31" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_31_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar Q" data-sid="32" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_32" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_32_b_exposure market_exposure">0</span>
                                            </span>
                                            <span class="game-section" data-nation="Bahar K" data-sid="33" data-gstatus="0" data-rate="2.00"> 
                                                <img id="ab_cards_33" src="<?php echo WEB_URL; ?>/storage/front/img/cards/1.png" class="andar-bahar-image">
                                                <span class="odds market_33_b_exposure market_exposure">0</span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="commetry" class="text-right text-info m-t-5 m-b-5">Payout : Bahar 1st Card 25% and All Other Andar-Bahar Cards 100%.</div>
                        </div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=ab20" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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

                        <h4 class="modal-title">View More Bet</h4>

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

                        <img src="<?php echo WEB_URL; ?>/storage/front/img/rules/tp-rules.jpg" class="img-fluid">

                    </div>

                </div>

            </div>

        </div>

        <div id="modalpokerresult" class="modal fade show" tabindex="-1">

            <div class="modal-dialog" style="min-width: 650px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">1 Day Poker Result</h4>

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


<script src="<?php echo WEB_URL; ?>/js/socket.io.js" type="text/javascript"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/flipclock.js" type="text/javascript"></script>
<script src="<?php echo WEB_URL; ?>/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>


<script type="text/javascript">
    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var current_andar_number = -1;
    var current_bahar_number = -1;
    var markettype = "AB20";

    var CARD_SHOW_COUNTER = 1;
    var GLOBAL_MARKET_ID = "";
    var GLOBAL_AALL = "";
    var GLOBAL_BALL = "";

    var CARDS_IMG_URL = site_url + "storage/front/img/cards";
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'ab20');
        });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });
        socket.on('game', function (data) {

            if (data && data['t1'] && data['t1'][0]) {

                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    clearCards();
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);



                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
                GLOBAL_MARKET_ID = data.t1[0].mid;

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nation;
                    b1 = data['t2'][j].rate;


                    markettype = "AB20";


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

                        $("#ab_cards_" + selectionid).attr("src", site_url + "/storage/front/img/andar_bahar/0.jpg");
                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                    }
                    else {
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $("#ab_cards_" + selectionid).attr("src", site_url + "/storage/front/img/andar_bahar/" + selectionid + ".jpg");
                    }
                }

                BINDTABLE2DATA(data['t3']);
                for (var j in data['t3']) {
                   	aall = data['t3'][j].aall;
					if(aall){
						aall = aall.split(",");
					}
					ball = data['t3'][j].ball;
					if(ball){
						ball = ball.split(",");
					}
					andar = data['t3'][j].ar;
					if(andar){
						andar = andar.split(",");
					}
					bahar = data['t3'][j].br;
					if(bahar){
						bahar = bahar.split(",");
					}
                    if (andar && andar.length) {
                        for (a in andar) {
                            $("#ab_cards_" + andar[a]).attr("src", site_url + "/storage/front/img/andar_bahar/" + andar[a] + ".jpg");
                        }
                    }
                    if (bahar && bahar.length) {
                        for (b in bahar) {
                            $("#ab_cards_" + bahar[b]).attr("src", site_url + "/storage/front/img/andar_bahar/" + bahar[b] + ".jpg");
                        }
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

    function BINDTABLE2DATA(tdata) {
		if(tdata[0].aall){
			tdata[0].aall = tdata[0].aall.split(",");
		}
		if(tdata[0].ball){
			tdata[0].aall = tdata[0].ball.split(",");
		}
        if (tdata[0].aall == "" && tdata[0].ball == "") {
            $(".video-overlay").hide();
            return;
        }

        if (CARD_SHOW_COUNTER > 1) {
            if (GLOBAL_MARKET_ID != 0) {
                var acardsHtml = "";
                if (GLOBAL_AALL != tdata[0].aall) {
                    var andarStr = tdata[0].aall;
                    if ($.trim(andarStr) != "") {
                        var andarArr = andarStr.reverse();
                        for (var i = 0; i < andarArr.length; i++) {
                            acardsHtml += '<div class="item"><img src="' + CARDS_IMG_URL + '/' + andarArr[i] + '.png"></div>';
                        }
                        $('#andar-cards').trigger('replace.owl.carousel', acardsHtml).trigger('refresh.owl.carousel');
                    } else {
                        $('#andar-cards').trigger('replace.owl.carousel', "<div></div>").trigger('refresh.owl.carousel');
                    }
                    GLOBAL_AALL = tdata[0].aall;
                }

                var bcardsHtml = "";
                if (GLOBAL_BALL != tdata[0].ball) {
                    var baharStr = tdata[0].ball;
                    if ($.trim(baharStr) != "") {
                        var baharArr = baharStr.reverse();
                        for (var i = 0; i < baharArr.length; i++) {
                            bcardsHtml += '<div class="item"><img src="' + CARDS_IMG_URL + '/' + baharArr[i] + '.png"></div>';
                        }
                        $('#bahar-cards').trigger('replace.owl.carousel', bcardsHtml).trigger('refresh.owl.carousel');
                    } else {
                        $('#bahar-cards').trigger('replace.owl.carousel', "<div></div>").trigger('refresh.owl.carousel');
                    }
                    GLOBAL_BALL = tdata[0].ball;
                }
                $(".video-overlay").show();
            } else {
                $(".video-overlay").hide();
            }
            CARD_SHOW_COUNTER = 0;
        }
        CARD_SHOW_COUNTER++;
    }

    function clearCards() {
        $("#cards_1").html("")
        $("#cards_2").html("");

        $('#andar-cards').owlCarousel().trigger('add.owl.carousel',
                [jQuery('')]).trigger('refresh.owl.carousel');

        $('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
                [jQuery('')]).trigger('refresh.owl.carousel');
    }

    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;
            html = "";
            casino_type = "'ab20'";
            data.forEach(function (runData) {

                ab = "playera";
                ab1 = "R";

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#cards_1").html("")
                $("#cards_2").html("");
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

    $('#andar-cards, #bahar-cards').owlCarousel({
        rtl: true,
        loop: false,
        margin: 2,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/ab20/' + event_id,
            dataType: 'json',
            data: {event_id: event_id, casino_type: casino_type},
            success: function (response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
                $('.last-result-slider').owlCarousel({
                    loop: false,
                    margin: 2,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 8
                        }
                    }
                });
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
            return false;
        }

        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/live-market/andarbahar/active_bets/ab20/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/andarbahar/view_more_matched/ab20/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/andarbahar/market_analysis/ab20/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.results == 0) {
                    $('.market_exposure').text(0).css('color', 'black');
                }
                else {
                    $.each(data.results, function (index, value) {
                        var element = $('.market_' + value.market_id + '_b_exposure');
                        $(element).text(value.pl);
                        if (value.pl > 0)
                            $(element).css('color', 'green');
                        else
                            $(element).css('color', 'red');
                    });
                }
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