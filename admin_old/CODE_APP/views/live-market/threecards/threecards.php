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
    <div class="listing-grid cardj3 casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">3 Cards Judgement &nbsp; 
                            <small class="teenpatti-rules" data-toggle="modal" data-target="#modalrulesteenpatti"><u>Rules</u></small></span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">

<iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                        <!-- <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".A3CJ_CODE; ?>" style="border:0px"></iframe> -->
                        <div class="video-overlay">
                            <div>
                                <img id="card_c1" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                <img id="card_c2" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                <img id="card_c3" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div class="card-content m-t-5 m-b-5">
                        <table data-title="SUSPENDED" class="table main-table table-bordered  market_2_row market_1_row">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center brate"><span class="market_1_b_value">1.78</span></td>
                                </tr>
                                <tr style="background-color: rgb(114, 187, 239);">
                                    <td width="10%">
                                        <div id="nation1" class="p-title text-center">YES</div>
                                        <span class="d-block text-center text-danger market_1_b_exposure market_exposure" style="color: black;">0</span>
                                    </td>
                                    <td id="andar-box" class="text-center" style="padding: 5px;">

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/1.jpg" class="card-image market_1_b_btn back-1" nat_1="A" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/2.jpg" class="card-image market_1_b_btn back-1" nat_1="2" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/3.jpg" class="card-image market_1_b_btn back-1" nat_1="3" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/4.jpg" class="card-image market_1_b_btn back-1" nat_1="4" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/5.jpg" class="card-image market_1_b_btn back-1" nat_1="5" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/6.jpg" class="card-image market_1_b_btn back-1" nat_1="6" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/7.jpg" class="card-image market_1_b_btn back-1" nat_1="7" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/8.jpg" class="card-image market_1_b_btn back-1" nat_1="8" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/9.jpg" class="card-image market_1_b_btn back-1" nat_1="9" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/10.jpg" class="card-image market_1_b_btn back-1" nat_1="10" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/11.jpg" class="card-image market_1_b_btn back-1" nat_1="J" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/12.jpg" class="card-image market_1_b_btn back-1" nat_1="Q" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                        <span class="game-section m-r-5 "><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/13.jpg" class="card-image market_1_b_btn back-1" nat_1="K" side="Back" selectionid="1" marketid="1" runner="YES" marketname="YES" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.78" fullfancymarketrate="1.78"></span>

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-right text-info remark">Select any 3 card and you will win if you will get at least 1 card from the 3 cards you have selected.</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center brate"><span class="market_2_l_value">1.84</span></td>
                                </tr>

                                <tr style="background-color: rgb(250, 169, 186);">
                                    <td width="10%">
                                        <div id="nation2" class="p-title text-center">No</div>
                                        <span class="d-block text-center text-danger market_2_b_exposure market_exposure" style="color: black;">0</span>
                                    </td>
                                    <td class="text-center" style="padding: 5px;">
                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/1.jpg" class="card-image lay-1 market_2_l_btn" nat_1="A" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/2.jpg" class="card-image lay-1 market_2_l_btn" nat_1="2" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/3.jpg" class="card-image lay-1 market_2_l_btn" nat_1="3" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5 "><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/4.jpg" class="card-image lay-1 market_2_l_btn" nat_1="4" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/5.jpg" class="card-image lay-1 market_2_l_btn" nat_1="5" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5 "><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/6.jpg" class="card-image lay-1 market_2_l_btn" nat_1="6" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/7.jpg" class="card-image lay-1 market_2_l_btn" nat_1="7" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5 "><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/8.jpg" class="card-image lay-1 market_2_l_btn" nat_1="8" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/9.jpg" class="card-image lay-1 market_2_l_btn" nat_1="9" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/10.jpg" class="card-image lay-1 market_2_l_btn" nat_1="10" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/11.jpg" class="card-image lay-1 market_2_l_btn" nat_1="J" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5"><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/12.jpg" class="card-image lay-1 market_2_l_btn" nat_1="Q" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>

                                        <span class="game-section m-r-5 "><img src="<?php echo WEB_URL; ?>storage/front/img/andar_bahar/13.jpg" class="card-image lay-1 market_2_l_btn" nat_1="K" side="Lay" selectionid="2" marketid="2" runner="No" marketname="No" eventid="201607173324" markettype="3_CARD_J" event_name="3_CARD_J" fullmarketodds="1.84" fullfancymarketrate="1.84"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="remark2" class="text-right text-info remark">Select any 3 card and you will win If you do not get any card from the 3 cards you have selected.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=3cardj" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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
                        <img src="../../../storage/front/img/rules/tp-rules.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">3 Cards Judgement Result</h4>
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
    var markettype = "3_CARD_J";
    var back_html = "";
    var lay_html = "";
    var gstatus = "";
    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', '3cardj');
        });
    
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
    });

        socket.on('game', function (data) {

            if (data && data['t1'] && data['t1'][0]) {

                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);

                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    }

                    if (data.t1[0].C2 != 1) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                    }

                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
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
                    l1 = data['t2'][j].rate;



                    markettype = "3_CARD_J";

                    if (selectionid == 1) {
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
                    } else {
                        $(".market_" + selectionid + "_l_value").text(l1);
                        $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
                        $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                        $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                        $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                        $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                        $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                        $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                        $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                    }






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


    function updateResult(data) {
        data = JSON.parse(JSON.stringify(data));
        resultGameLast = data[0].mid;
        var html = "";
        casino_type = "'3cardj'";
        data.forEach(function (runData) {

            ab = "playera";
            ab1 = "R";
            eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
            html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
        }
        );
        $("#last-result").html(html);
        if (oldGameId == 0 || oldGameId == resultGameLast) {
            $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/3cardj/' + event_id,
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
            url: MASTER_URL + '/live-market/threecards/active_bets/3cardj/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/threecards/view_more_matched/3cardj/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/threecards/market_analysis/3cardj/' + get_round_no(),
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