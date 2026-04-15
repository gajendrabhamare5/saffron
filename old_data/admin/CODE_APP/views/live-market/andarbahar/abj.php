<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.theme.default.css">
<div class="col-md-12 main-container">
    <style>
        .ab-2 .video-overlay img {
            border-radius: 4px;
            width: 30px !important;
            height: auto;
            margin-right: 3px;
        }

        .ab-2 .card-right {
            margin-top: 0;
        }

        .video-overlay img {
            width: 35px;
            height: auto;
            margin-right: 2px;
            margin-left: 2px;
        }

        .ab-2 .video-overlay .card-inner {
            margin-bottom: 3px;
        }

        .last-result-slider .owl-prev {
            position: absolute;
            top: 0;
            right: -20px !important;
            left: unset;
        }

        .last-result-slider .owl-next span,
        .last-result-slider .owl-prev span {
            color: #333;
            font-size: 35px;
            line-height: 1;
        }

        .last-result-slider .owl-next {
            position: absolute;
            top: 0;
            left: -20px !important;
            right: unset;
        }

        .owl-carousel .owl-dots {
            display: none;
        }

        .winner-icon {
            position: absolute;
            right: 0;
            bottom: 15%;
        }
    </style>
    <div class="listing-grid ddb-container casino-grid">
        <div class="coupon-card row ab-2">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">Andar Bahar2 &nbsp;
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small>
                        </span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span> | Min: <span id="min-bet">100</span> | Max: <span id="max-bet">200000</span>
                        </span>
                    </div>

                    <div style="position: relative;">
                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL . "" . ANDARBAHAR2_CODE; ?>" style="border:0px"></iframe>
                        <div class="video-overlay">
                            <div id="game-cards">
                                <div class="row row5 align-items-center">
                                    <!-- <div class="col-1">
                                        <div class="row row5">
                                            <div class="col-12">
                                                <p class="mb-0 text-white" style="line-height: 44px;"><b>A</b></p>
                                            </div>
                                        </div>
                                        <div class="row row5">
                                            <div class="col-12">
                                                <p class="mb-0 text-white" style="line-height: 44px;"><b>B</b></p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-2"><img id="card_joker" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png" class="card-right"></div>
                                    <div class="col-10">
                                        <div class="card-inner">
                                            <p class="text-white m-b-0"><b>Andar</b></p>
                                            <div class="row row5">
                                                <div class="col-2"><img id="card_1st_andar" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                                                <div class="col-8">
                                                    <div id="andar-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                                        <div class="owl-stage-outer">
                                                            <div class="owl-stage" id="cards_1" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 371px !important;">

                                                            </div>
                                                        </div>
                                                        <div class="owl-nav">
                                                            <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">&#8249;</span></button>
                                                            <button type="button" role="presentation" class="owl-next"><span aria-label="Next"> &#8250;</span></button>
                                                        </div>
                                                        <div class="owl-dots disabled"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <p class="text-white m-b-0"><b>Bahar</b></p>
                                            <div class="row row5">
                                                <div class="col-2"><img id="card_1st_bahar" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png"></div>
                                                <div class="col-8">
                                                    <div id="bahar-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                                        <div class="owl-stage-outer">
                                                            <div class="owl-stage" id="cards_2" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 371px;">

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                    </div>

                    <div class="casino-container">
                        <div class="ab-2-container">
                            <div class="bet-a">
                                <div class="a-title">A</div>
                                <div class="sa">
                                    <div class="suspended market_1_row market_1_b_btn back-1">
                                        <div>SA</div>
                                        <div class="mt-1 market_1_b_value">13</div>
                                    </div>
                                    <div class="book market_1_b_exposure market_exposure" style="color: black;">0</div>
                                </div>
                                <div class="first-bet">
                                    <div class="suspended market_2_row market_2_b_btn back-1">
                                        <div>1st Bet</div>
                                        <div class="mt-1 market_2_b_value">2</div>
                                    </div>
                                    <div class="book market_2_b_exposure market_exposure" style="color: black;">0</div>
                                </div>
                                <div class="second-bet">
                                    <div class="suspended market_3_row market_3_b_btn back-1">
                                        <div>2nd Bet</div>
                                        <div class="mt-1 market_3_b_value">2</div>
                                    </div>
                                    <div class="book market_3_b_exposure market_exposure" style="color: black;">0</div>
                                </div>
                                <div class="a-title">A</div>
                            </div>
                            <div class="bet-a">
                                <div class="a-title">B</div>
                                <div class="sa">
                                    <div class="suspended market_4_row market_4_b_btn back-1">
                                        <div>SB</div>
                                        <div class="mt-1 market_4_b_value">13</div>
                                    </div>
                                    <div class="book market_4_b_exposure market_exposure" style="color: black;">0</div>
                                </div>
                                <div class="first-bet">
                                    <div class="suspended market_5_row market_5_b_btn back-1">
                                        <div>1st Bet</div>
                                        <div class="mt-1 market_5_b_value">2</div>
                                    </div>
                                    <div class="book market_5_b_exposure market_exposure" style="color: black;">0</div>
                                </div>
                                <div class="second-bet">
                                    <div class="suspended market_6_row market_6_b_btn back-1">
                                        <div>2nd Bet</div>
                                        <div class="mt-1 market_6_b_value">2</div>
                                    </div>
                                    <div class="book market_6_b_exposure market_exposure" style="color: black;">0</div>
                                </div>
                                <div class="a-title">B</div>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-6">
                                <div class="ab-2-box">
                                    <div class="row row5">
                                        <div class="col-6 text-center">
                                            <div class="bltitle"><b>Odd</b></div>
                                            <div class="back mt-1 blbox suspended market_24_row market_24_b_btn back-1"><span class="odd market_24_b_value">1.83</span></div>
                                            <div class="mt-1"><span style="color: black;" class="market_24_b_exposure market_exposure">0</span></div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="bltitle"><b>Even</b></div>
                                            <div class="back mt-1 blbox suspended market_25_row market_25_b_btn back-1"><span class="odd market_25_b_value">2.12</span></div>
                                            <div class="mt-1"><span style="color: black;" class="market_25_b_exposure market_exposure">0</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="ab-2-box">
                                    <div class="row row5">
                                        <div class="col-3 text-center">
                                            <div class="bltitle"><img src="<?php echo WEB_URL; ?>storage/front/img/cards/spade_race.png"></div>
                                            <div class="back mt-1 blbox suspended market_20_row market_20_b_btn back-1"><span class="odd market_20_b_value">3.83</span></div>
                                            <div class="mt-1"><span style="color: black;" class="market_20_b_exposure market_exposure">0</span></div>
                                        </div>
                                        <div class="col-3 text-center">
                                            <div class="bltitle"><img src="<?php echo WEB_URL; ?>storage/front/img/cards/club_race.png"></div>
                                            <div class="back mt-1 blbox suspended market_21_row market_21_b_btn back-1"><span class="odd market_21_b_value">3.83</span></div>
                                            <div class="mt-1"><span style="color: black;" class="market_21_b_exposure market_exposure">0</span></div>
                                        </div>
                                        <div class="col-3 text-center">
                                            <div class="bltitle"><img src="<?php echo WEB_URL; ?>storage/front/img/cards/heart_race.png"></div>
                                            <div class="back mt-1 blbox suspended market_22_row market_22_b_btn back-1"><span class="odd market_22_b_value">3.83</span></div>
                                            <div class="mt-1"><span style="color: black;" class="market_22_b_exposure market_exposure">0</span></div>
                                        </div>
                                        <div class="col-3 text-center">
                                            <div class="bltitle"><img src="<?php echo WEB_URL; ?>storage/front/img/cards/diamond_race.png"></div>
                                            <div class="back mt-1 blbox suspended market_23_row market_23_b_btn back-1"><span class="odd market_23_b_value">3.83</span></div>
                                            <div class="mt-1"><span style="color: black;" class="market_23_b_exposure market_exposure">0</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <div class="ab-2-box">
                                    <div class="row"></div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            12
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12 text-center">
                                            <div class=" m-r-5 card-image ">
                                                <div class="suspended market_7_row market_7_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/1.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_7_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_8_row market_8_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/2.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_8_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_9_row market_9_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/3.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_9_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_10_row market_10_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/4.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_10_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_11_row market_11_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/5.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_11_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_12_row market_12_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/6.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_12_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_13_row market_13_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/7.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_13_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_14_row market_14_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/8.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_14_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_15_row market_15_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/9.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_15_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_16_row market_16_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/10.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_16_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_17_row market_17_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/11.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_17_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_18_row market_18_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/12.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_18_b_exposure market_exposure">0</b></div>
                                            </div>
                                            <div class=" m-r-5 card-image">
                                                <div class="suspended market_19_row market_19_b_btn back-1"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/13.jpg"></div>
                                                <div class="ubook text-center m-t-5"><b style="color: black;" class="market_19_b_exposure market_exposure">0</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=abj" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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

                        <img src="<?php echo WEB_URL; ?>/storage/front/img/rules/abj-rules.jpg" class="img-fluid">

                    </div>

                </div>

            </div>

        </div>

        <div id="modalpokerresult" class="modal fade show" tabindex="-1">

            <div class="modal-dialog" style="min-width: 650px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">Andar Bahar 2 Result</h4>

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
    var data6;
    var markettype = "ABJ";
    var last_result_id = '0';

    var CARDS_IMG_URL = site_url + "storage/front/img/cards";

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'abj');
        });
        socket.on('game', function(data) {

            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    var desc = data.t1[0].Cards;
                    desc = desc.split(",");
                    aall = [];
                    ball = [];
                    for (var i in desc) {
                        if (i == 0) {
                            $("#card_joker").attr("src", site_url + "storage/front/img/cards/" + desc[i] + ".png");
                        } else if (i == 2) {
                            $("#card_1st_andar").attr("src", site_url + "storage/front/img/cards/" + desc[i] + ".png");
                        } else if (i == 1) {
                            $("#card_1st_bahar").attr("src", site_url + "storage/front/img/cards/" + desc[i] + ".png");
                        } else {
                            if (desc[i] != 1) {
                                if (i % 2 == 0) {
                                    aall.push(desc[i]);
                                } else {
                                    ball.push(desc[i]);
                                }
                            }
                        }
                    }


                    acards_html_array = [];
                    var acards_html = "";
                    var len1 = 0;

                    if (aall != "") {
                        for (ac in aall) {


                            acards_html_array.push('  <div class="owl-item " id="owl_ac_img_id' + ac + '" style=""><div class="item"><img src="' + site_url + 'storage/front/img/cards/' + aall[ac] + '.png"></div></div>');
                            acards_html += acards_html_array[len1];

                            len1++;
                            if (len1 == aall.length) {
                                acards_html_array.reverse();

                                acards_html = acards_html_array.join('');

                                $("#cards_1").html(acards_html);
                                $('#andar-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                            } else {
                                $("#cards_1").html(acards_html);
                                $('#andar-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                            }



                        }

                    } else {
                        $("#cards_1").html("");
                        $('#andar-cards').owlCarousel().trigger('add.owl.carousel',
                            [jQuery(acards_html)]).trigger('refresh.owl.carousel');
                    }

                    bcards_html_array = [];
                    var bcards_html = "";
                    var lenb = 0;
                    if (ball != "") {
                        for (bc in ball) {



                            bcards_html_array.push('  <div class="owl-item " id="owl_bc_img_id_' + bc + '"  style=""><div class="item"><img src="' + site_url + 'storage/front/img/cards/' + ball[bc] + '.png"></div></div>');
                            bcards_html += bcards_html_array[lenb];

                            lenb++;

                            if (lenb == ball.length) {
                                bcards_html_array.reverse();

                                bcards_html = bcards_html_array.join('');

                                $("#cards_2").html(bcards_html);
                                $('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(bcards_html)]).trigger('refresh.owl.carousel');
                            } else {
                                $("#cards_2").html(bcards_html);
                                $('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
                                    [jQuery(bcards_html)]).trigger('refresh.owl.carousel');
                            }



                        }
                    } else {
                        $("#cards_2").html("");
                        $('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
                            [jQuery(bcards_html)]).trigger('refresh.owl.carousel');
                    }

                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat || data['t2'][j].nation;
                    b1 = data['t2'][j].b1;
                    bs1 = data['t2'][j].bs1;


                    b11 = b1;
                    markettype = "ABJ";

                    $(".market_" + selectionid + "_b_value").html(b1);

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
                        $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                    }
                }
            }
        });
        socket.on('gameResult', function(args) {
            updateResult(args.data);
        });
        socket.on('error', function(data) {});
        socket.on('close', function(data) {});
    }

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('SS');
            if (data.length > 1) {
                var obj = {
                    type: '[',
                    color: 'red',
                    ctype: 'diamond',
                    card: data[0],
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                }
                return obj;
            } else {
                data = data1;
                data = data.split('DD');
                if (data.length > 1) {
                    var obj = {
                        type: '{',
                        color: 'red',
                        ctype: 'heart',
                        card: data[0],
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                    }
                    return obj;
                } else {
                    data = data1;
                    data = data.split('HH');
                    if (data.length > 1) {
                        var obj = {
                            type: ']',
                            color: 'black',
                            ctype: 'spade',
                            card: data[0],
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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
                                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
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


    function clearCards() {
        $("#cards_1").html("")
        $("#cards_2").html("");

        $("#card_joker").attr(site_url + "storage/front/img/cards/1.png");
        $("#card_1st_andar").attr(site_url + "storage/front/img/cards/1.png");
        $("#card_1st_bahar").attr(site_url + "storage/front/img/cards/1.png");

        $('#andar-cards').owlCarousel().trigger('add.owl.carousel',
            [jQuery('')]).trigger('refresh.owl.carousel');

        $('#bahar-cards').owlCarousel().trigger('add.owl.carousel',
            [jQuery('')]).trigger('refresh.owl.carousel');
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
            casino_type = "'abj'";
            data.forEach((runData) => {
                if (parseInt(runData.result) == 1) {
                    ab = "playera";
                    ab1 = "A";

                } else if (parseInt(runData.result) == 2) {
                    ab = "playerb";
                    ab1 = "B";

                }

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });


            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {

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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/abj/' + event_id,
            dataType: 'json',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
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

    $('.last-result').on('click', function() {

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
            url: MASTER_URL + '/live-market/andarbahar/active_bets/abj/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {

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
            url: MASTER_URL + '/live-market/andarbahar/view_more_matched/abj/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            data: $('#form-view_more_bets').serialize(),
            success: function(data) {

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
            url: MASTER_URL + '/live-market/andarbahar/market_analysis/abj/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.results == 0) {
                    $('.market_exposure').text(0).css('color', 'black');
                } else {
                    $.each(data.results, function(index, value) {
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

    $(function() {

        setTimeout(function() {
            call_active_bets();
            call_analysis();
        }, 2000);
        setInterval(function() {
            call_active_bets();
            call_analysis();
        }, <?php echo CASINO_SET_INTERVAL;  ?>);
        $('#view_more_bets').on('click', function() {

            call_view_more_bets();
        });
        $('#form-view_more_bets').on('submit', function() {

            call_view_more_bets();
            return false;
        });
        $('#btn-view_all_matched').on('click', function() {

            $('#search-client_name').html('');
            setTimeout(function() {

                call_view_more_bets();
            }, 1);
        });
        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'select..',
            ajax: {
                url: MASTER_URL + '/reports/common/get_clients',
                data: function(params) {

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