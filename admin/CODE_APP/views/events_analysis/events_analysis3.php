<?php
defined('BASEPATH') or exit('No direct script access allowed');

$userdata = $handler->users->data();

$power = $userdata['power'];
$eventType = $_GET['eventType'];

$event_id = $this->input->get('eventId');

$accounts = array(1 => 'CLIENT', 2 => 'DL', 3 => 'MDL', 4 => 'SMDL', 5 => 'CN');
$event_name = '';
if ($event_id == ELECTION_EVENT_ID) {
    $event_name = ELECTION_MARKET_NAME;
} elseif ($event_id == IPL_EVENT_ID) {
    $event_name = 'Indian Premier League'; //IPL_MARKET_NAME;
}
?>
<div class="col-md-12 main-container">
    <style type="text/css">
        .back {
            background-color: #72bbef;
        }

        .back2 {
            background-color: #72bbefa3;
        }

        .back1 {
            background-color: #72bbefcc;
        }

        .lay {
            background-color: #f994ba;
        }

        .lay1 {
            background-color: #f994bacc;
        }

        .lay2 {
            background-color: #f994baa3;
        }

        .bookmaker-container .box-w1 {
            width: 60px;
            min-width: 60px;
            max-width: 60px;
        }

        #bm-section .suspended::after {
            width: 360px;
            font-size: 14px;
            font-family: "Roboto Condensed", sans-serif;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0.6);
        }

        #bm1-section .suspended::after {
            width: 120px;
            font-size: 14px;
            font-family: "Roboto Condensed", sans-serif;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .bet-info .suspended::after {
            width: 120px;
            font-size: 14px;

        }

        .coupon-table button span {
            font-size: 10px;
        }

        span.odd {
            display: block;
        }

        #matched-bet th,
        #unmatched-bet th {
            min-width: 100px;
        }

        .mtree table td,
        .mtree table th {
            width: 33.3%;
        }

        #openFancyBook {}

        .fancyBookModal .modal-body {
            background: none;
            padding-right: 15px;
        }

        .fancy-market .suspended:after {
            width: 200px;
            font-size: 14px;
            font-family: "Roboto Condensed", sans-serif;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .match_odds_all_full_markets .suspended:after {
            font-size: 14px;
            font-family: "Roboto Condensed", sans-serif;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0.6);
        }

        #playStopButton {
            height: 30px;
            width: 70px;
            font-weight: bold;
            border-radius: 8px;
            border: none;
            color: black;
            background-color: lightsteelblue;
            outline: none;
            cursor: pointer;
            font-size: 12px;
            font: Arial, Helvetica, sans-serif;
        }

        /*Scorecard Design*/
        .scorecard {
            background-color: #f2f2f2;
            /* box-shadow: 0px 1px 5px rgba(0,0,0,0.5); */
            width: 100%;
            /* border: 2px solid #C3C3C3; */
            padding: 5px;
            font-size: 12px;

            background-image: url('/storage/img/scorecard-bg.png');
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
        }

        .scorecard:before {
            content: "";
            background-color: rgba(0, 0, 0, 0.55);
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .ball-runs {
            background: #0088CC;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            display: inline-block;
            line-height: 30px;
            text-align: center;
            color: #fff;
            font-weight: bold;
        }

        .ball-runs.four {
            background: #087F23;
        }

        .ball-runs.six {
            background: #883997;
        }

        .ball-runs.wicket {
            background: #ff0000;
        }

        .bookmaker-market .suspended::after {
            width: 170px;
        }

        .coupon-table button {
            min-height: 30px;
        }

        .bookmaker-market span.odd {
            text-align: center;
            font-weight: 600;
        }

        .bookmaker-market span.d-block {
            text-align: center;
        }

        .userBookContainer .table {
            font-weight: 600;
            font-size: 16px;
            background-color: #eff8ff;
        }

        .userBookContainer tr.header {
            background-color: #0088cc;
            text-decoration: none;
        }

        .userBookContainer tr td {
            padding: 7px 14px !important;
        }

        .userBookContainer tr {
            //text-decoration: underline;
        }

        .userBookContainer .child_table {
            background-color: #7cb9e8;
        }

        .runner-size {
            font-size: 10px;
        }

        .back {
            background-color: #72bbef !important;
            border: 2px solid #72bbef !important;
            margin-right: -3px;
        }

        .lay {
            background-color: #faa9ba !important;
            border: 2px solid #faa9ba !important;
            margin-right: -3px;
        }

        .my-bet .nav-tabs .nav-item.show .nav-link,
        .my-bet .nav-tabs .nav-link.active {
            color: #495057 !important;
            background-color: #fff !important;
            border-color: #ced4da #ced4da #fff !important;
            border-style: solid !important;
            border-width: 1px !important;
        }

        .my-bet .nav-tabs .nav-link {
            color: black !important;
        }

        .btn-primary,
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: var(--theme2-bg) !important;
            border-color: var(--theme2-bg) !important;
            color: white !important;
        }

        .btn-light {
            color: #212529;
            background-color: #eff2f7;
            border-color: #eff2f7;
        }

        .btn-light {
            color: #212529;
            background-color: #eff2f7;
            border-color: #eff2f7;
        }

        .form-group label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            /* space between radio and text */
            font-size: 14px;
            cursor: pointer;
        }


        /* Only for checkboxes with class .bet-checkbox */
        .bet-checkbox:checked~.custom-control-label::before {
            background-color: #000 !important;
            /* black background */
            border: #000 !important;
            width: 20px;
            height: 20px;
        }

        /* Default border for this checkbox */
        .bet-checkbox~.custom-control-label::before {
            /* border: 2px solid #000 !important; */
            background-color: #000 !important;
            border-color: #000 !important;
            width: 20px;
            height: 20px;
        }

        /* White checkmark for this checkbox */
        .bet-checkbox:checked~.custom-control-label::after {
            /* filter: invert(1);  */
            color: #fff;
            /* white tick */
            font-size: 14px;
        }

        .bet-checkbox~.custom-control-label::before {
            top: 0.2rem;
            /* adjust vertical alignment if needed */
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
            width: 20px;
            height: 20px;
        }
    </style>
    <div class="listing-grid">
        <div class="table-top-buttons row">
            <div class="col-md-6"></div>
            <div class="col-md-6 float-right text-right">
                <form>
                    <ul class="d-inline-block">
                        <li class="form-group active-button m-l-20 d-inline-block BetActives">
                            <a href="javascript:void(0)" class="btn btn-back active" id="bet_lock">Bet Lock</a>
                            <ul class="sub-button">
                                <li>
                                    <a href="javascript:void(0)" id="btn-bet_active_all" data-status="0">All
                                        Deactive</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" id="btn-modal_userwisebetsttus">Userwise</a>
                                </li>
                            </ul>
                        </li>
                        <li class="form-group active-button m-l-20 d-inline-block FancyActive">
                            <a href="javascript:void(0)" class="btn btn-back active" id="btn-fancy_bet_lock">Fancy
                                Lock</a>
                            <ul class="sub-button">
                                <li>
                                    <a href="javascript:void(0)" id="btn-fancy_bet_active_all">All Deactive</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" id="btn-modal_userwisefencybetsttus">Userwise</a>
                                </li>
                            </ul>
                        </li>
                        <li class="form-group active-button m-l-20 d-inline-block">
                            <a href="javascript:void(0)" class="btn btn-back active" id="modal-btn_userbook">User
                                Book</a>
                        </li>
                        <li class="form-group active-button m-l-20 d-inline-block">
                            <a href="javascript:void(0)" class="btn btn-back active"
                                id="modal-btn_userbookmaker">Bookmarkers Book</a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="game-heading m-b-5">
                    <span class="card-header-title event_name_heading"
                        id="spn_event_title"><?php echo $event_name; ?></span>
                </div>
                <div class="card-content">
                    <?php if ($eventType == 4) { ?>
                        <div id="scoreboard-box"></div>
                    <?php }
                    ?>
                    <?php
                    if ($event_id != IPL_EVENT_ID) {
                        ?>
                        <div id="match_odds_all_full_markets" class="match_odds_all_full_markets"></div>
                        <?php
                    }
                    ?>
                    <div id="bookmaker_markets"></div>
                    <div>
                        <div class="row row5 bookmaker-container" id="bookmaker_market_div" style="display: none;">
                            <div class="fancy-marker-title col-12" id="bm-head" style="">
                                <h4>Bookmaker Market 0% commission fast bet confirm</h4>
                                <div class="m-b-10 bookmaker-market">
                                    <div id="bm-section">
                                        <table class="table coupon-table table table-bordered m-t-10 " border="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <span class="text-info p-r-5">Min:<span
                                                                id="bookmaker_min">500</span></span>
                                                        <span class="text-info">Max:<span
                                                                id="bookmaker_max">200000</span></span>
                                                    </th>
                                                    <th class="box-w1"></th>
                                                    <th class="box-w1"></th>
                                                    <th class="back box-w1">Back</th>
                                                    <th class="lay box-w1">lay</th>
                                                    <th class="box-w1"></th>
                                                    <th class="box-w1"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="match_odds_bookmaker_market">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row5 bookmaker-container " id="bookmaker_tied_market_div"
                            style="display: none;">
                            <div class="fancy-marker-title col-12" id="bm-head" style="">
                                <h4>Bookmaker Tied Market</h4>
                                <div class="m-b-10 bookmaker-market">
                                    <div id="bm-section">
                                        <table class="table coupon-table table table-bordered m-t-10 " border="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <span class="text-info p-r-5">Min:<span
                                                                id="bookmaker_min">500</span></span>
                                                        <span class="text-info">Max:<span
                                                                id="bookmaker_max">200000</span></span>
                                                    </th>
                                                    <th class="box-w1"></th>
                                                    <th class="box-w1"></th>
                                                    <th class="back box-w1">Back</th>
                                                    <th class="lay box-w1">lay</th>
                                                    <th class="box-w1"></th>
                                                    <th class="box-w1"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="match_tied_bookmaker_market">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fancy-marker-title col-xl-4" id="bm1-market_div" style="display: none;">
                            <h4>Bookmaker Market</h4>
                            <div class="m-b-10 bookmaker-market">
                                <div id="bm1-section">
                                    <table class="table coupon-table table table-bordered m-t-10 " border="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="text-info p-r-5">Min:100</span>
                                                    <span class="text-info">Max:25000</span>
                                                </th>
                                                <th class="back box-w1">Back</th>
                                                <th class="lay box-w1">lay</th>
                                            </tr>
                                        </thead>
                                        <tbody id="match_odds_bookmakersmall_market">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-6 fancy-market" id="fancy-market" style="">
                            <div class="fancy-marker-title">
                                <h4>Fancy Market</h4>
                            </div>
                            <div id="div_fancy">
                                <table class="table coupon-table table table-bordered m-t-10 ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center box-w1 lay">No</th>
                                            <th class="text-center back box-w1">Yes</th>
                                            <th class="box-w2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="fancy_odds_market_tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 fancy-market" id="fancy-market" style="">
                            <div class="fancy-marker-title">
                                <h4>Ball by Ball Session Market</h4>
                            </div>
                            <div id="div_fancy">
                                <table class="table coupon-table table table-bordered m-t-10 ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center box-w1 lay">No</th>
                                            <th class="text-center back box-w1">Yes</th>
                                            <th class="box-w2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="ball_odds_market_tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 fancy-market" id="fancy-market" style="">
                            <div class="fancy-marker-title">
                                <h4>Fancy1 Market</h4>
                            </div>
                            <div id="div_fancy">
                                <table class="table coupon-table table table-bordered m-t-10 ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center box-w1 lay">No</th>
                                            <th class="text-center back box-w1">Yes</th>
                                            <th class="box-w2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="fancy_odds_market1_tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 fancy-market" id="fancy-market" style="">
                            <div class="fancy-marker-title">
                                <h4>Khado Market</h4>
                            </div>
                            <div id="div_fancy">
                                <table class="table coupon-table table table-bordered m-t-10 ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center box-w1 lay">No</th>
                                            <th class="text-center back box-w1">Yes</th>
                                            <th class="box-w2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="khado_odds_market_tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6 fancy-market" id="fancy-market" style="">
                            <div class="fancy-marker-title">
                                <h4>Odd/Even Market</h4>
                            </div>
                            <div id="div_fancy">
                                <table class="table coupon-table table table-bordered m-t-10 ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center box-w1 back">Odd</th>
                                            <th class="text-center back box-w1">Even</th>
                                            <th class="box-w2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="oddeven_odds_market_tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6 fancy-market" id="meter-market" style="">
                            <div class="fancy-marker-title">
                                <h4>Meter Market</h4>
                            </div>
                            <div id="div_fancy">
                                <table class="table coupon-table table table-bordered m-t-10 ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center box-w1 lay">No</th>
                                            <th class="text-center back box-w1">Yes</th>
                                            <th class="box-w2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="secure_meter_market_tbody">
                                        <tr id="secure_meter"></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="fancy-market row row5">
                        <div class="col-6">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10">
                    <div class="card-header" data-toggle="collapse" data-target=".video-tv" id="showtv">
                        <h6 class="card-title">
                            Live Match

                            <span class="float-right">
                                <i class="fa fa-tv"></i> live stream started
                            </span>
                        </h6>
                    </div>
                    <div id="video-tv" class="video-tv collapse ">
                        <div align="center" class="tv-container" style="margin-top: 2px; margin-bottom: 5px">
                            <div id="matchDate1">
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="card m-b-10" id="scoreboard-main">
                                    <div class="card-header">
                                        <h6 class="card-title">Score Card</h6>
                                    </div>
                                    <div class="card-body scoreboard-detail collapse" id="scoreboard-box" style="display: block;">
                                        <div class="scorecard m-b-5">
                                            <div class="row">
                                                <span class="team-name col-md-2">WAR</span>
                                                <span class="score col-md-6"></span>
                                                <span class="col-md-2 run-rate"></span>
                                                <span class="col-md-2 run-rate"></span>
                                            </div>
                                            <div class="row m-t-10">
                                                <span class="team-name col-md-2">CC</span>
                                                <span class="score col-md-6">130-3 (30.4)</span>
                                                <span class="col-md-2 run-rate">CRR 4.24</span>
                                                <span class="col-md-2 run-rate"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 m-t-10"></div>
                                                <div class="col-md-6 ball-runs-container m-t-5">
                                                    <p class="text-right ball-by-ball">
                                                        <span class="ball-runs ">w</span>
                                                        <span class="ball-runs ">0</span>
                                                        <span class="ball-runs ">1</span>
                                                        <span class="ball-runs ">0</span>
                                                        <span class="ball-runs ">1</span>
                                                        <span class="ball-runs ">0</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                <div class="card m-b-10 my-bet">
                    <div class="card-header">
                        <ul class="nav nav-tabs d-inline-block" role="tablist ">
                            <!-- <li class="nav-item d-inline-block">
                                <a class="nav-link active" data-toggle="tab" href="#matched-bet">Matched 
                                    <span id="matchedCount">(0)</span>
                                </a>
                            </li>
                            <li class="nav-item d-inline-block">
                                <a class="nav-link" data-toggle="tab" href="#unmatched-bet">Unmatched 
                                    <span id="unmatchedCount">0</span>
                                </a>
                            </li>  -->
                            <li>
                                <span>MY BETS</span>
                            </li>
                        </ul>
                        <a href="javascript:void(0)" id="view_more_bets" class="btn btn-back float-right">View More</a>
                    </div>
                    <ul class="nav nav-tabs d-inline-block" role="tablist " style="padding:8px;">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link active" data-toggle="tab" href="#matched-bet">Matched Bets
                                <!-- <span id="matchedCount"></span> -->
                            </a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link" data-toggle="tab" href="#unmatched-bet">Unmatched Bets
                                <!-- <span id="unmatchedCount">0</span> -->
                            </a>
                        </li>
                        <!-- <li>
                                 <span>MY BETS</span>
                            </li> -->
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="matched-bet" class="tab-pane active">
                                <div class="table-responsive">
                                    <table id="matched" class="table coupon-table table-bordered table-stripted">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 50px">UserName</th>
                                                <th style="min-width: 200px">Nation</th>
                                                <th style="min-width: 50px">Rate</th>
                                                <th style="min-width: 70px;">Amount</th>
                                                <th>PlaceDate</th>
                                                <th>MatchDate</th>
                                                <th style="min-width:70px">Gametype</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody-active_bets">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="unmatched-bet" class="tab-pane">
                                <div class="table-responsive">
                                    <table id="unmatched" class="table coupon-table table-bordered table-stripted">
                                        <thead>
                                            <tr>
                                                <th>UserName</th>
                                                <th style="min-width: 200px">Nation</th>
                                                <th style="min-width: 50px">Rate</th>
                                                <th style="min-width: 70px;">Amount</th>
                                                <th>MatchDate</th>
                                                <th>Gametype</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="100%" align="center"> No record found!...</td>
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
                                <a class="nav-link  active " data-toggle="tab" href="#matched-bet2"
                                    id="matchedDataLink">Matched Bets</a>
                            </li>
                            <!-- <li class="nav-item d-inline-block">
                                <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>
                            </li> -->
                            <li class="nav-item d-inline-block">
                                <a class="nav-link " data-toggle="tab" href="#deleted-bet2"
                                    id="deletedMatchedDataLink">Deleted Bets</a>
                            </li>
                        </ul>
                        <div class="tab-content m-t-20" style="border: 1px solid #ced4da;padding:7px">
                            <div id="matched-bet2" class="tab-pane active">
                                <!-- <form method="POST" id="form-view_more_bets">
                                    <div class="row form-inline">
                                        <div class="col-md-5">
                                            <div class="form-group m-t-20">
                                                <label for="list-ac" class="d-inline-block">Username</label>
                                                <select class="form-control" name="search-client_name" id="search-client_name" id="" style="width: 160px;"></select>
                                            </div>
                                            <div class="form-group m-t-20">
                                                <label class="d-inline-block">IP Address</label>
                                                <input type="text" name="search-ipaddress" id="search-ipaddress" class="form-control" placeholder="IP Address">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group m-t-20">
                                                <label class="d-inline-block">Amount</label>
                                                <input type="text" name="search-amount_min" id="search-amount_min" class="form-control" placeholder="Amount From">
                                                <input type="text" name="search-amount_max" id="search-amount_max" class="form-control m-l-10" placeholder="Amount To">
                                            </div>
                                            <div class="form-group m-t-20">
                                                <label class="d-inline-block">Type</label>
                                                <select name="search-bettype" class="form-control d-inline-block" id="search-bettype"> 
                                                    <option value="">All</option>
                                                    <option value="back">Back</option>
                                                    <option value="lay">Lay</option>
                                                    <option value="2">deleted</option>
                                                </select>
                                                <button class="btn btn-back m-l-10" id="btn-search" type="submit">Search</button>
                                                <button type="reset" class="btn btn-back m-l-10" id="btn-view_all_matched">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>  -->
                                <form method="POST" id="form-view_more_bets">
                                    <div class="form-row align-items-end"
                                        style="display: flex; flex-wrap: wrap; gap: 10px;">

                                        <div class="form-group">
                                            <label for="search-client_name">Username</label>
                                            <select class="form-control" name="search-client_name"
                                                id="search-client_name" id="" style="width: 160px;"></select>
                                        </div>

                                        <div class="form-group">
                                            <label for="search-amount_min">Amount From</label>
                                            <input type="text" name="search-amount_min" id="search-amount_min"
                                                class="form-control" placeholder="Amount From" style="width:120px;">
                                        </div>

                                        <div class="form-group">
                                            <label for="search-amount_max">Amount To</label>
                                            <input type="text" name="search-amount_max" id="search-amount_max"
                                                class="form-control" placeholder="Amount To" style="width:120px;">
                                        </div>

                                        <div class="form-group">
                                            <label for="search-ipaddress">IP Address</label>
                                            <input type="text" name="search-ipaddress" id="search-ipaddress"
                                                class="form-control" placeholder="IP Address" style="width:150px;">
                                        </div>

                                        <div class="form-group"
                                            style="display: flex; align-items: center; gap: 10px; margin-top: 25px;">
                                            <button class="btn btn-back" id="btn-search" type="submit">Search</button>
                                            <button type="reset" class="btn btn-light"
                                                id="btn-view_all_matched">Reset</button>
                                        </div>
                                    </div>


                                    <div class="form-group mt-3 mb-0"
                                        style="display: flex; justify-content: space-between;">

                                        <div style="display: flex; gap: 20px; align-items: center;">
                                            <label>
                                                <input type="radio" name="search-bettype" value="" checked> All
                                            </label>
                                            <label>
                                                <input type="radio" name="search-bettype" value="back"> Back
                                            </label>
                                            <label>
                                                <input type="radio" name="search-bettype" value="lay"> Lay
                                            </label>
                                            <label>
                                                <input type="radio" name="search-bettype" value="2"> Deleted
                                            </label>
                                        </div>

                                        <div>
                                            <h5 style="font-size: 1.015625rem;">Total Soda: <span
                                                    class="text-success mr-2 total_bet">0</span> Total Win: <span
                                                    class="text-success total_pl">0.00</span></h5>

                                        </div>
                                    </div>

                                </form>


                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <!-- <th>No</th> -->
                                                <th>UserName</th>
                                                <th>Nation</th>
                                                <!-- <th>Bet Type</th> -->
                                                <th> Rate</th>
                                                <th>Amount</th>
                                                <!-- <th>Place Date</th> -->
                                                <th> Date</th>
                                                <th>IP</th>
                                                <th>B Details</th>
                                                <th>Action</th>
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

    <div class="modal fade fancyBookModal" id="fancyBookModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Books</h4>
                    <button type="button" class="close" data-dismiss="modal">�</button>
                </div>
                <div class="modal-body">
                    <div class="book-pop"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="userwisebet">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Active User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="usertypewiseactive-container">
                        <form action="" id="form_userwisebet" method="post" autocomplete="off">
                            <div class="msgContainer"
                                style="display: inline-block; width: 50%; margin-bottom: 5px;text-align: center"></div>
                            <table border="0" cellpadding="0" cellspacing="0" class="table table-diamond">
                                <thead>
                                    <tr>
                                        <th width="20%">Sr. No.</th>
                                        <th width="60%">User Name</th>
                                        <th width="20%">Checked</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_betstatus">
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="userwisefancy_bet">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Active User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="usertypewiseactive-container">
                        <form action="form_userwisefancy" id="" method="post" autocomplete="off">
                            <div class="msgContainer"
                                style="display: inline-block; width: 50%; margin-bottom: 5px;text-align: center"></div>
                            <table border="0" cellpadding="0" cellspacing="0" class="table table-diamond">
                                <thead>
                                    <tr>
                                        <th width="20%">Sr. No.</th>
                                        <th width="60%">User Name</th>
                                        <th width="20%">Checked</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_fancy_betstatus">
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="user-book">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="book_title">User Book</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body ">
                    <div class="userBookContainer">
                        <ul class="mtree transit bubba mtree-header">
                            <li class="mtree-node mtree-closed">
                                <a href="#">
                                    <table class="table m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Cape Cobras</th>
                                                <th>Warriors</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </a>
                            </li>
                        </ul>
                        <ul class="mtree transit bubba">

                            <li class="mtree-node mtree-closed"><a href="javascript:void(0);">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>jjm09</td>
                                                <td>0</td>
                                                <td>60</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </a></li>
                        </ul>

                        <!--<script src="http://diamondexch999.com/storage/backend/js/mtree.js"></script></div>-->
                    </div>

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade show" id="fancy_book">
        <div class="modal-dialog modal-lg" style="width:25%;">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Fancy Book</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body ">
                    <div class="modal_error"></div>
                    <div class="fancyBookContainer">



                    </div>


                </div>

                <div class="modal-footer pull-right">
                    <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo"
                            aria-hidden="true"></i> Back</button>

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        var GAME_ID;
        //var GAME_ID = "30065962";
        //var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
        var SCOREBOARD_URL = "wss://sportsscore24.com/";
        var ssocket = null;
        var socketScoreBoard;


        function scoreboardConnect() {
            socketScoreBoard = io.connect(SCOREBOARD_URL, {
                transports: ['websocket']
            });
            socketScoreBoard.on("connect", function () {
                socketScoreBoard.emit("subscribe", {
                    type: 1,
                    rooms: [parseInt(GAME_ID)]
                });
            });
            socketScoreBoard.on("error", function (abc) {
                console.log(abc);
            });
            socketScoreBoard.on("update", function (response) {
                //console.log(response);
                if (
                    response.data != undefined &&
                    response.data != null &&
                    response.data.isfinished == 1
                ) {
                    socketScoreBoard.emit("unsubscribe", {
                        type: 1,
                        rooms: []
                    });
                    // $("#scoreboard-box").html("");
                } else {
                    if (response.data != undefined && response.data != null) {
                        //self.scoreboardData = response.data;
                        updateScoreBoard(response.data);
                    } else {
                        $("#scoreboard-box").html("");
                    }
                }
            });
            socketScoreBoard.on("disconnect", function () {
                // console.log("disconnect");
            });
        }

        function updateScoreBoard(data) {

            if (data.isfinished == "1") {
                $("#scoreboard-box").hide();
                return;
            } else {
                $("#scoreboard-box").show();
            }

            var scoreboardStr = "";
            scoreboardStr += "<div class=\"scorecard scorecard-mobile\"><div data-v-68a8f00a='' class='score-inner'>";
            scoreboardStr += "    <div class=\"row\">";
            scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation1 + "<\/span>";
            scoreboardStr += "        <span class=\"score col-6\">" + data.score1 + "<\/span>";
            scoreboardStr += "<span class=\"col-2 run-rate\">";
            if (data.spnrunrate1 != null && data.spnrunrate1 != "") {
                scoreboardStr += "CRR " + data.spnrunrate1;
            }
            scoreboardStr += "<\/span>";
            scoreboardStr += "<span class=\"col-2 run-rate\">";
            if (data.spnreqrate1 != null && data.spnreqrate1 != "") {
                scoreboardStr += " RR " + data.spnreqrate1;
            }
            scoreboardStr += "<\/span>";
            scoreboardStr += "    <\/div>";
            scoreboardStr += "    <div class=\"row m-t-10\">";
            scoreboardStr += "        <span class=\"team-name col-2\">" + data.spnnation2 + "<\/span>";
            scoreboardStr += "        <span class=\"score col-6\">" + data.score2 + "<\/span>";
            scoreboardStr += "        <span class=\"col-2 run-rate\">";
            if (data.spnrunrate2 != null && data.spnrunrate2 != "") {
                scoreboardStr += "CRR " + data.spnrunrate2;
            }
            scoreboardStr += "<\/span>";
            scoreboardStr += "        <span class=\"col-2 run-rate\">";
            if (data.spnreqrate2 != null && data.spnreqrate2 != "") {
                scoreboardStr += " RR " + data.spnreqrate2;
            }
            scoreboardStr += "<\/span>";
            scoreboardStr += "    <\/div>";
            scoreboardStr += "    <div class=\"row\">";
            scoreboardStr += "        <div class=\"col-6 m-t-10\">";
            if (data.spnballrunningstatus != "") {
                scoreboardStr += "<p>";
                if (data.dayno != "") {
                    scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
                }
                scoreboardStr += data.spnballrunningstatus + "<\/p>";
            } else if (data.spnmessage != "") {
                scoreboardStr += "<p>";
                if (data.dayno != "") {
                    scoreboardStr += "<span>Day " + data.dayno + "<\/span> | ";
                }
                scoreboardStr += data.spnmessage + "<\/p>";
            }

            scoreboardStr += "        <\/div>";
            scoreboardStr += "        <div class=\"col-6 ball-runs-container m-t-5\">";
            scoreboardStr += "            <p class=\"text-right ball-by-ball\">";
            $.each(data.balls, function (key, ballVal) {
                if (ballVal != "") {
                    var b_class = "";
                    if (ballVal == '4') {
                        b_class = "four";
                    } else if (ballVal == '6') {
                        b_class = "six";
                    } else if (ballVal == 'ww') {
                        b_class = "wicket";
                    }
                    scoreboardStr += "<span class=\"ball-runs " + b_class + "\">" + ballVal + "<\/span> ";
                }
            });
            scoreboardStr += "            <\/p>";
            scoreboardStr += "        <\/div>";
            scoreboardStr += "    <\/div>";
            scoreboardStr += "<\/div><\/div>";
            $("#scoreboard-box").html(scoreboardStr);
            return;
        }

        $('#showtv').on('click', function () {
            var name = "collapseTV";
            if ($("#" + name).length == 0) {
                $('.tv-container').addClass('show');

                <?php

                $get_url = $this->db->query("select * from tv_url_master where event_id=$event_id")->row();
                $iframe_url = "";
                if (!empty($get_url)) {
                    $iframe_url = $get_url->url;
                }

                ?>
                var iframe_url = "https://mis3.sqmr.xyz/livetv.php?eventId=" + oldGameIdId;
                <?php
                if ($eventType != 4) {
                    ?>
                    iframe_url = "<? echo tv_url; ?>&eventId=<? echo $event_id; ?>&sportid=<? echo $eventType; ?>";
                    <?php
                }
                ?>
                iframe_url = "<? echo tv_url; ?>&eventId=<? echo $event_id; ?>&sportid=<? echo $eventType; ?>";
                iframe_url = "<? echo tv_url; ?>&gmid=" + <?php echo $event_id; ?> + "&sportid=" + <?php echo $eventType; ?>;
                $("#matchDate1").append('<div data-v-68a8f00a="" id="collapseTV"><iframe data-v-68a8f00a="" src="' + iframe_url + '" width="100%" height="250" class="video-iframe"></iframe></div>');
            } else {
                $('.tv-container').removeClass('show');
                $("#" + name).remove();
            }
        });


        var html_fancy_market_new = "";
        var html_fancy_market_new1 = "";
        var html_ball_market_new = "";
        var html_khado_market_new = "";
        var html_meter_market_new = "";
        var html_oddeven_market_new = "";
        var one_size_1 = 0;
        var one_size_2 = 0;
        var one_size_3 = 0;
        var lay_one_size_1 = 0;
        var lay_one_size_2 = 0;
        var lay_one_size_3 = 0;
        var runnerName;
        var marketName;
        var runsNo = "";
        var runsYes = "";
        var oddsNo = "";
        var oddsYes = "";
        var runRate = "";
        var class_add_yes_change = "";
        var class_add_no_change = "";
        var marketIdArray = [];
        var marketIdArrayNew = [];
        var selectorIdArray = [];
        var selectorIdBookmakerArray = [];
        var marketIdArrayFancy1 = [];
        var marketIdArrayNewFancy1 = [];
        var marketIdArrayKhado = [];
        var marketIdArrayOddEven = [];
        var marketIdArrayNewKhado = [];
        var marketIdArrayBall = [];
        var marketIdArrayNewBall = [];
        var marketIdArrayMeter = [];
        var marketIdArrayNewMeter = [];
        var bookmaker1_back_rate = "";
        var bookmaker1_back_size = "";
        var bookmaker1_lay_rate = "";
        var bookmaker1_lay_size = "";
        var bookmaker1_back_2_rate = "";
        var bookmaker1_back_2_size = "";
        var bookmaker1_lay_2_rate = "";
        var bookmaker1_lay_2_size = "";
        var bookmaker1_back_3_rate = "";
        var bookmaker1_back_3_size = "";
        var bookmaker1_lay_3_rate = "";
        var bookmaker1_lay_3_size = "";
        var html_bookmaker_odds = "";
        var oddsmarketId = 1.171497845;
        var eventId = '<?php echo $handler->layout['event_id']; ?>';

        var site_url = '<?php echo WEB_URL; ?>';
        var socket = io('<?php echo GAME_IP; ?>');

        var odds_socket_active = false;
        socket.on('connect', function () {
            <?php if ($handler->layout['marketId']) { ?>
                socket.emit('getOddData', {
                    eventId: '<?php echo $handler->layout['marketId']; ?>'
                });
                odds_socket_active = true;
            <?php } ?>
            socket.emit('getMatches', {
                eventType: 4
            });
        });


        socket.on('eventGetLiveEventName', function (data) {
            var eventId = '<?php echo $handler->layout['event_id']; ?>';
            if (data) {
                if (data.sport) {
                    if (data.sport.body) {
                        var list_sport = data.sport.body;
                        eventNotIncluded = data.eventNotIncluded;

                        var result = Object.keys(data.sport.body).length;
                        if (result > 0) {
                            const gameList = data.sport.body;

                            for (var i in gameList) {

                                if (gameList[i].matchid == eventId) {

                                    var matchNameArr = (gameList[i].matchName).split('/');
                                    var matchName = (matchNameArr[0]).trim();

                                    matchdate = gameList[i].matchdate;
                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                                    marketTime1 = new Date(matchdate);
                                    marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                    marketMonth = monthNames[marketTime1.getMonth()];
                                    marketYear = marketTime1.getFullYear();
                                    marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                    marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                    var ampm = marketHours >= 12 ? 'pm' : 'am';

                                    marketHours = marketHours % 12;
                                    marketHours = marketHours ? marketHours : 12;

                                    market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " + marketHours + ":" + marketMinutes + " " + ampm;

                                    var event_name_heading = matchName + ' -> MATCH_ODDS -> ' + market_full_date;
                                    $('.event_name_heading').text(event_name_heading);
                                    <?php if (!$handler->layout['marketId']) { ?>
                                        if (!odds_socket_active) {
                                            socket.emit('getOddData', {
                                                eventId: gameList[i].marketid
                                            });
                                            odds_socket_active = true;
                                        }
                                    <?php } ?>
                                }
                            }

                        }

                    }
                }
            }
        });

        socket.on('eventGetLiveEventFancyData', function (args) {
            if (args.body == undefined) {
                //window.location.href = "/index";
            } else {
                if (args.body.data) {
                    if (args.body.data[0]) {
                        matchdate = args.body.data[0].matchdate;
                        $("#matchdate").html(matchdate);
                        eventName = args.body.data[0].matchName;
                        eventName2 = args.body.data[0].matchName;
                        oddsmarketId = args.body.data[0].marketid;
                        eventId = args.body.data[0].matchid;
                        marketId = args.body.data[0].marketid;

                        oldGameId = args.body.data[0].oldGameId;
                        oldGameIdId = args.body.data[0].oldGameIdId;

                        GAME_ID = oldGameId;
                        var inPlay = 1;
                        html_match_odds = "";
                        html_match_odds += "";
                        match_odds_lay_place_status = "";
                        for (k = 0; k < args.body.data.length; k++) {
                            market_type_name = args.body.data[k].market_name;
                            match_status = args.body.data[k].status;

                            market_market_id = args.body.data[k].marketid;
                            market_odd_name = market_type_name;
                            html_match_odds +=
                                '<div id="div_gamedata" class="table-responsive m-b-10 main-market">' +
                                '    <table class="table coupon-table table table-bordered m-t-10 " border="0">' +
                                '        <thead>' +
                                '            <tr>' +
                                '                <th>' + market_type_name + '</th>' +
                                '                <th class="box-w1"></th>' +
                                '                <th class="box-w1"></th>' +
                                '                <th class="back box-w1">Back</th>' +
                                '                <th class="lay box-w1">lay</th>' +
                                '                <th class="box-w1"></th>' +
                                '                <th class="box-w1"></th>' +
                                '            </tr>' +
                                '        </thead>' +
                                '        <tbody>';
                            if (market_type_name == "Match Odds") {
                                marketType = "MATCH_ODDS";
                            } else if (market_type_name == "Tied Match") {
                                marketType = "TIE_ODDS";
                            } else if (market_type_name == "To Win the Toss") {
                                marketType = "TOSS_ODDS";
                            } else {
                                if (market_type_name) {
                                    market_type_name = market_type_name.replace(".", "_");
                                    market_type_name = market_type_name.replace(" ", "_");
                                    market_type_name = market_type_name.replace("/", "_");
                                    market_type_name = market_type_name.replace(" ", "_");
                                    marketType = market_type_name;
                                }
                                marketType = market_type_name;
                            }
                            market_type_name2 = marketType;
                            market_marketid = market_type_name2;
                            if (args.body.data[k].runners) {
                                for (j = 0; j < args.body.data[k].runners.length; j++) {
                                    var selectionId = args.body.data[k].runners[j].id;
                                    selectorIdArray.push(selectionId);
                                    runnerName = args.body.data[k].runners[j].name;
                                    marketName = args.body.data[k].runners[j].name;
                                    var bet_suspended = "";
                                    if (market_type_name == "Match Odds") {
                                        marketType = "MATCH_ODDS";
                                    } else if (market_type_name == "Tied Match") {
                                        marketType = "TIE_ODDS";
                                    } else if (market_type_name == "To Win the Toss") {
                                        marketType = "TOSS_ODDS";
                                    } else {
                                        if (market_type_name) {
                                            market_type_name = market_type_name.replace(".", "_");
                                            market_type_name = market_type_name.replace(" ", "_");
                                            market_type_name = market_type_name.replace("/", "_");
                                            market_type_name = market_type_name.replace(" ", "_");
                                            marketType = market_type_name;
                                        }
                                        marketType = market_type_name;
                                    }
                                    if (args.body.data[k].runners[j].back[2]) {
                                        one_price_1 = args.body.data[k].runners[j].back[2].price || "-";
                                        one_size_1 = args.body.data[k].runners[j].back[2].size || "";
                                    } else {
                                        one_price_1 = "";
                                        one_size_1 = "";
                                    }
                                    if (args.body.data[k].runners[j].back[1]) {
                                        one_price_2 = args.body.data[k].runners[j].back[1].price || "-";
                                        one_size_2 = args.body.data[k].runners[j].back[1].size || "";
                                    } else {
                                        one_price_2 = "-";
                                        one_size_2 = "";
                                    }
                                    if (args.body.data[k].runners[j].back[0]) {
                                        one_price_3 = args.body.data[k].runners[j].back[0].price || "-";
                                        one_size_3 = args.body.data[k].runners[j].back[0].size || "";
                                    } else {
                                        one_price_3 = "-";
                                        one_size_3 = "";
                                    }
                                    if (args.body.data[k].runners[j].lay[0]) {
                                        lay_one_price_1 = args.body.data[k].runners[j].lay[0].price || "-";
                                        lay_one_size_1 = args.body.data[k].runners[j].lay[0].size || "";
                                    } else {
                                        lay_one_size_1 = "";
                                        lay_one_price_1 = "";
                                    }
                                    if (args.body.data[k].runners[j].lay[1]) {
                                        lay_one_price_2 = args.body.data[k].runners[j].lay[1].price || "-";
                                        lay_one_size_2 = args.body.data[k].runners[j].lay[1].size || "";
                                    } else {
                                        lay_one_size_2 = "";
                                        lay_one_price_2 = "-";
                                    }
                                    if (args.body.data[k].runners[j].lay[2]) {
                                        lay_one_price_3 = args.body.data[k].runners[j].lay[2].price || "-";
                                        lay_one_size_3 = args.body.data[k].runners[j].lay[2].size || "";
                                    } else {
                                        lay_one_price_3 = "-";
                                        lay_one_size_3 = "";
                                    }
                                    if (one_size_1 == 0 && one_size_2 == 0 && one_size_3 == 0 && lay_one_size_1 == 0 && lay_one_size_2 == 0 && lay_one_size_3 == 0) {
                                        //	window.location.href = "/index";
                                    }
                                    html_match_odds +=
                                        '<tr class="bet-info sec-4297012 " data-title="ACTIVE" class="table-row" id="fullSelection_' + selectionId + '_' + market_marketid + '"  eventtype="4" eventid="' + eventId + '" marketid="' + market_market_id + '" selectionid="' + selectionId + '" eventname="' + runnerName + '" status="' + status + '">' +
                                        '    <td>' +
                                        '        <span class="team-name">' + runnerName + '</span>' +
                                        '        <p class="box-w4">' +
                                        '            <span class="float-left profit live_match_points" id="live_match_points_' + selectionId + '_' + market_marketid + '">0</span>' +
                                        '        </p>' +
                                        '    </td>' +
                                        '    <td class="box-w1 back2">' +
                                        '        <button id="back_3_' + selectionId + '_' + market_marketid + '">' +
                                        '            <span class="odd">' + one_price_1 + '</span>' +
                                        '            <span>' + one_size_1 + '</span>' +
                                        '        </button>' +
                                        '    </td>' +
                                        '    <td class="box-w1 back1">' +
                                        '        <button id="back_2_' + selectionId + '_' + market_marketid + '">' +
                                        '            <span class="odd">' + one_price_2 + '</span>' +
                                        '            <span>' + one_size_2 + '</span>' +
                                        '        </button>' +
                                        '    </td>' +
                                        '    <td class="back box-w1">' +
                                        '        <button class="back" id="back_1_' + selectionId + '_' + market_marketid + '">' +
                                        '            <span class="odd">' + one_price_3 + '</span>' +
                                        '            <span>' + one_size_3 + '</span>' +
                                        '        </button>' +
                                        '    </td>' +
                                        '    <td class="lay box-w1">' +
                                        '        <button class="lay" id="lay_1_' + selectionId + '_' + market_marketid + '">' +
                                        '            <span class="odd">' + lay_one_price_1 + '</span>' +
                                        '            <span>' + lay_one_size_1 + '</span>' +
                                        '        </button>' +
                                        '    </td>' +
                                        '    <td class="box-w1 lay1">' +
                                        '        <button id="lay_2_' + selectionId + '_' + market_marketid + '">' +
                                        '            <span class="odd">' + lay_one_price_2 + '</span>' +
                                        '            <span>' + lay_one_size_2 + '</span>' +
                                        '        </button>' +
                                        '    </td>' +
                                        '    <td class="box-w1 lay2">' +
                                        '        <button id="lay_3_' + selectionId + '_' + market_marketid + '">' +
                                        '            <span class="odd">' + lay_one_price_3 + '</span>' +
                                        '            <span>' + lay_one_size_3 + '</span>' +
                                        '        </button>' +
                                        '    </td>' +
                                        '</tr>';
                                }
                            }

                            html_match_odds +=
                                '       </tbody>' +
                                '    </table>' +
                                '</div>';
                        }
                        html_match_odds += "";
                        $(".event_name_heading").attr("eventid", <?php echo $event_id; ?>);
                        $(".event_name_heading").attr("marketid", oddsmarketId);
                        $(".event_name_heading").attr("event_name", eventName);
                        //$(".event_name_heading").text(eventName);
                        $("#match_odds_all_full_markets").html(html_match_odds);
                    }
                }
                if (args.body1) {
                    if (args.body1.body) {
                        if (args.body1.body.cricket) {
                            if (args.body1.body.cricket[0]) {
                                console.log("bookmaker-remakrs=", args.body1.body.cricket[0]);
                                if (args.body1.body.cricket[0][0]) {
                                    args.body1.body.cricket[0] = args.body1.body.cricket[0][0];
                                }
                                $("#bookmaker_min").html(args.body1.body.cricket[0].min);
                                $("#bookmaker_max").html(args.body1.body.cricket[0].max);
                                bookmaker_remarks = "";
                                html_bookmaker_odds = "";
                                eventName = $(".event_name_heading").attr("event_name");

                                if (args.body1.body.cricket[0].bookmaker && args.body1.body.cricket[0].bookmaker != null) {
                                    //for(z=0;z<args.body1.body.cricket[0].bookmaker.length;z++){
                                    var bookmaker1_data = args.body1.body.cricket[0].bookmaker;

                                    for (var b in bookmaker1_data) {
                                        marketType = "BOOKMAKER_ODDS";
                                        selectionId = bookmaker1_data[b].selectionId
                                        selectorIdBookmakerArray.push(selectionId);
                                        runnerName = bookmaker1_data[b].name;
                                        book_status = bookmaker1_data[b].status;

                                        bookmaker_remarks = '';
                                        bookmaker1_data[b].remark;

                                        marketName = runnerName;
                                        var bet_suspended = "";
                                        if (bookmaker1_data[b]['back'][0]['price']) {
                                            bookmaker1_back_rate = bookmaker1_data[b]['back'][0]['price'] || "";
                                        } else {
                                            bookmaker1_back_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['back'][0]['size']) {
                                            bookmaker1_back_size = bookmaker1_data[b]['back'][0]['size'] || "";
                                        } else {
                                            bookmaker1_back_size = "";
                                        }
                                        if (bookmaker1_data[b]['back'][1]['price']) {
                                            bookmaker1_back_2_rate = bookmaker1_data[b]['back'][1]['price'] || "";
                                        } else {
                                            bookmaker1_back_2_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['back'][1]['size']) {
                                            bookmaker1_back_2_size = bookmaker1_data[b]['back'][1]['size'] || "";
                                        } else {
                                            bookmaker1_back_2_size = "";
                                        }
                                        if (bookmaker1_data[b]['back'][2]['price']) {
                                            bookmaker1_back_3_rate = bookmaker1_data[b]['back'][2]['price'] || "";
                                        } else {
                                            bookmaker1_back_3_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['back'][2]['size']) {
                                            bookmaker1_back_3_size = bookmaker1_data[b]['back'][2]['size'] || "";
                                        } else {
                                            bookmaker1_back_3_size = "";
                                        }
                                        if (bookmaker1_data[b]['lay'][0]['price']) {
                                            bookmaker1_lay_rate = bookmaker1_data[b]['lay'][0]['price'] || "";
                                        } else {
                                            bookmaker1_lay_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['lay'][0]['size']) {
                                            bookmaker1_lay_size = bookmaker1_data[b]['lay'][0]['size'] || "";
                                        } else {
                                            bookmaker1_lay_size = "";
                                        }
                                        if (bookmaker1_data[b]['lay'][1]['price']) {
                                            bookmaker1_lay_2_rate = bookmaker1_data[b]['lay'][1]['price'] || "";
                                        } else {
                                            bookmaker1_lay_2_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['lay'][1]['size']) {
                                            bookmaker1_lay_2_size = bookmaker1_data[b]['lay'][1]['size'] || "";
                                        } else {
                                            bookmaker1_lay_2_size = "";
                                        }
                                        if (bookmaker1_data[b]['lay'][2]['price']) {
                                            bookmaker1_lay_3_rate = bookmaker1_data[b]['lay'][2]['price'] || "";
                                        } else {
                                            bookmaker1_lay_3_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['lay'][2]['size']) {
                                            bookmaker1_lay_3_size = bookmaker1_data[b]['lay'][2]['size'] || "";
                                        } else {
                                            bookmaker1_lay_3_size = "";
                                        }

                                        bookmaker_suspended = "";
                                        if (book_status != "ACTIVE") {
                                            bookmaker_suspended = "suspended";
                                        }

                                        var temp_selectionId = ((runnerName).split(" ").join('_')).trim();
                                        html_bookmaker_odds +=
                                            '<tr class="bet-info sec-1 table-row ' + bookmaker_suspended + '" id="bookmaker_row_' + temp_selectionId + '" data-title="' + book_status + '">' +
                                            '    <td>' +
                                            '        <span class="team-name">' + runnerName + '</span>' +
                                            '        <p class="box-w4">' +
                                            '            <span class="float-left profit" id="live_match_points_' + temp_selectionId + '_BOOKMAKER_ODDS">0</span>' +
                                            '        </p>' +
                                            '    </td>' +
                                            '    <td class="back2 box-w1" id="back_3_' + temp_selectionId + '_BOOKMAKER_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_back_3_rate + '</span>' +
                                            '            <span>' + bookmaker1_back_3_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="back1 box-w1" id="back_2_' + temp_selectionId + '_BOOKMAKER_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_back_2_rate + '</span>' +
                                            '            <span>' + bookmaker1_back_2_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="back box-w1" id="back_1_' + temp_selectionId + '_BOOKMAKER_ODDS">' +
                                            '        <button class="back">' +
                                            '            <span class="odd">' + bookmaker1_back_rate + '</span>' +
                                            '            <span>' + bookmaker1_back_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="lay box-w1" id="lay_1_' + temp_selectionId + '_BOOKMAKER_ODDS">' +
                                            '        <button class="lay">' +
                                            '            <span class="odd">' + bookmaker1_lay_rate + '</span>' +
                                            '            <span>' + bookmaker1_lay_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="lay1 box-w1" id="lay_2_' + temp_selectionId + '_BOOKMAKER_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_lay_2_rate + '</span>' +
                                            '            <span>' + bookmaker1_lay_2_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="lay2 box-w1" id="lay_3_' + temp_selectionId + '_BOOKMAKER_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_lay_3_rate + '</span>' +
                                            '            <span>' + bookmaker1_lay_3_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '</tr>';
                                    }
                                    if (html_bookmaker_odds != "") {
                                        $("#bookmaker_market_div").show();
                                        $("#match_odds_bookmaker_market").html(html_bookmaker_odds);
                                        $("#bookmaker-remakrs").html(bookmaker_remarks);
                                    }
                                    //}
                                }


                                html_bookmaker_tied_odds = "";
                                if (args.body1.body.cricket[0].bookmaker_tied && args.body1.body.cricket[0].bookmaker_tied != null) {
                                    //for(z=0;z<args.body1.body.cricket[0].bookmaker.length;z++){
                                    var bookmaker1_data = args.body1.body.cricket[0].bookmaker_tied;

                                    for (var b in bookmaker1_data) {
                                        marketType = "BOOKMAKER_TIED_ODDS";
                                        selectionId = bookmaker1_data[b].selectionId
                                        selectorIdBookmakerArray.push(selectionId);
                                        runnerName = bookmaker1_data[b].name;
                                        book_status = bookmaker1_data[b].status;

                                        bookmaker_remarks = '';
                                        bookmaker1_data[b].remark;

                                        marketName = runnerName;
                                        var bet_suspended = "";
                                        if (bookmaker1_data[b]['back'][0]['price']) {
                                            bookmaker1_back_rate = bookmaker1_data[b]['back'][0]['price'] || "";
                                        } else {
                                            bookmaker1_back_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['back'][0]['size']) {
                                            bookmaker1_back_size = bookmaker1_data[b]['back'][0]['size'] || "";
                                        } else {
                                            bookmaker1_back_size = "";
                                        }
                                        if (bookmaker1_data[b]['back'][1]['price']) {
                                            bookmaker1_back_2_rate = bookmaker1_data[b]['back'][1]['price'] || "";
                                        } else {
                                            bookmaker1_back_2_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['back'][1]['size']) {
                                            bookmaker1_back_2_size = bookmaker1_data[b]['back'][1]['size'] || "";
                                        } else {
                                            bookmaker1_back_2_size = "";
                                        }
                                        if (bookmaker1_data[b]['back'][2]['price']) {
                                            bookmaker1_back_3_rate = bookmaker1_data[b]['back'][2]['price'] || "";
                                        } else {
                                            bookmaker1_back_3_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['back'][2]['size']) {
                                            bookmaker1_back_3_size = bookmaker1_data[b]['back'][2]['size'] || "";
                                        } else {
                                            bookmaker1_back_3_size = "";
                                        }
                                        if (bookmaker1_data[b]['lay'][0]['price']) {
                                            bookmaker1_lay_rate = bookmaker1_data[b]['lay'][0]['price'] || "";
                                        } else {
                                            bookmaker1_lay_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['lay'][0]['size']) {
                                            bookmaker1_lay_size = bookmaker1_data[b]['lay'][0]['size'] || "";
                                        } else {
                                            bookmaker1_lay_size = "";
                                        }
                                        if (bookmaker1_data[b]['lay'][1]['price']) {
                                            bookmaker1_lay_2_rate = bookmaker1_data[b]['lay'][1]['price'] || "";
                                        } else {
                                            bookmaker1_lay_2_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['lay'][1]['size']) {
                                            bookmaker1_lay_2_size = bookmaker1_data[b]['lay'][1]['size'] || "";
                                        } else {
                                            bookmaker1_lay_2_size = "";
                                        }
                                        if (bookmaker1_data[b]['lay'][2]['price']) {
                                            bookmaker1_lay_3_rate = bookmaker1_data[b]['lay'][2]['price'] || "";
                                        } else {
                                            bookmaker1_lay_3_rate = "-";
                                        }
                                        if (bookmaker1_data[b]['lay'][2]['size']) {
                                            bookmaker1_lay_3_size = bookmaker1_data[b]['lay'][2]['size'] || "";
                                        } else {
                                            bookmaker1_lay_3_size = "";
                                        }

                                        bookmaker_suspended = "";
                                        if (book_status != "ACTIVE") {
                                            bookmaker_suspended = "suspended";
                                        }

                                        var temp_selectionId = ((runnerName).split(" ").join('_')).trim();
                                        html_bookmaker_tied_odds +=
                                            '<tr class="bet-info sec-1 table-row ' + bookmaker_suspended + '" id="bookmaker_row_' + temp_selectionId + '" data-title="' + book_status + '">' +
                                            '    <td>' +
                                            '        <span class="team-name">' + runnerName + '</span>' +
                                            '        <p class="box-w4">' +
                                            '            <span class="float-left profit" id="live_match_points_' + temp_selectionId + '_BOOKMAKER_TIED_ODDS">0</span>' +
                                            '        </p>' +
                                            '    </td>' +
                                            '    <td class="back2 box-w1" id="back_3_' + temp_selectionId + '_BOOKMAKER_TIED_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_back_3_rate + '</span>' +
                                            '            <span>' + bookmaker1_back_3_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="back1 box-w1" id="back_2_' + temp_selectionId + '_BOOKMAKER_TIED_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_back_2_rate + '</span>' +
                                            '            <span>' + bookmaker1_back_2_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="back box-w1" id="back_1_' + temp_selectionId + '_BOOKMAKER_TIED_ODDS">' +
                                            '        <button class="back">' +
                                            '            <span class="odd">' + bookmaker1_back_rate + '</span>' +
                                            '            <span>' + bookmaker1_back_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="lay box-w1" id="lay_1_' + temp_selectionId + '_BOOKMAKER_TIED_ODDS">' +
                                            '        <button class="lay">' +
                                            '            <span class="odd">' + bookmaker1_lay_rate + '</span>' +
                                            '            <span>' + bookmaker1_lay_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="lay1 box-w1" id="lay_2_' + temp_selectionId + '_BOOKMAKER_TIED_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_lay_2_rate + '</span>' +
                                            '            <span>' + bookmaker1_lay_2_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '    <td class="lay2 box-w1" id="lay_3_' + temp_selectionId + '_BOOKMAKER_TIED_ODDS">' +
                                            '        <button>' +
                                            '            <span class="odd">' + bookmaker1_lay_3_rate + '</span>' +
                                            '            <span>' + bookmaker1_lay_3_size + '</span>' +
                                            '        </button>' +
                                            '    </td>' +
                                            '</tr>';
                                    }
                                    if (html_bookmaker_tied_odds != "") {
                                        $("#bookmaker_tied_market_div").show();
                                        // $("#match_odds_bookmaker_market").html(html_bookmaker_odds);
                                        $("#match_tied_bookmaker_market").html(html_bookmaker_tied_odds);
                                    }
                                    //}
                                }
                            }
                        }
                    }
                }



                if (args.body1) {
                    if (args.body1.body) {
                        if (args.body1.body.bm1) {
                            if (args.body1.body.bm1[0]) {

                                bookmaker_remarks = "";
                                html_bookmaker_odds = "";
                                eventName = $(".event_name_heading").attr("event_name");

                                var bm_small1 = args.body1.body.bm1[0];

                                if (bm_small1.value && bm_small1.value != null) {
                                    if (bm_small1.value.session && bm_small1.value.session != null) {
                                        bm_small1_datas = bm_small1.value.session;

                                        html_bookmaker_odds = "";
                                        for (z = 0; z < bm_small1_datas.length; z++) {

                                            if (bm_small1_datas[z] && bm_small1_datas[z]) {

                                                var bookmaker1_data = bm_small1_datas[z];

                                                runnerName = bookmaker1_data['RunnerName'];
                                                book_status = bookmaker1_data['GameStatus'];

                                                selectionId = bookmaker1_data['SelectionId'];

                                                marketType = "BOOKMAKERSMALL_ODDS";
                                                selectorIdBookmakerArray.push(selectionId);

                                                marketName = runnerName;
                                                var bet_suspended = "";

                                                if (bookmaker1_data.BackPrice1) {
                                                    bookmaker1_back_rate = bookmaker1_data.BackPrice1 || "";
                                                } else {
                                                    bookmaker1_back_rate = "-";
                                                }

                                                if (bookmaker1_data.BackSize1) {
                                                    bookmaker1_back_size = bookmaker1_data.BackSize1 || 0;
                                                } else {
                                                    bookmaker1_back_size = 0;
                                                }
                                                bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;


                                                if (bookmaker1_data.LayPrice1) {
                                                    bookmaker1_lay_rate = bookmaker1_data.LayPrice1 || "";
                                                } else {
                                                    bookmaker1_lay_rate = "-";
                                                }

                                                if (bookmaker1_data.LaySize1) {
                                                    bookmaker1_lay_size = bookmaker1_data.LaySize1 || 0;
                                                } else {
                                                    bookmaker1_lay_size = 0;
                                                }
                                                bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;


                                                bookmaker_suspended = "";
                                                if (book_status != "ACTIVE") {
                                                    bookmaker_suspended = "suspended";
                                                }

                                                var temp_selectionId = ((runnerName).split(" ").join('_')).trim();
                                                temp_selectionId = temp_selectionId.replace(".", "");
                                                html_bookmaker_odds +=
                                                    '<tr class="bet-info sec-1 table-row ' + bookmaker_suspended + '" id="bookmakersmall_row_' + temp_selectionId + '" data-title="' + book_status + '">' +
                                                    '    <td>' +
                                                    '        <span class="team-name">' + runnerName + '</span>' +
                                                    '        <p class="box-w4">' +
                                                    '            <span class="float-left profit" id="live_match_points_' + temp_selectionId + '_BOOKMAKERSMALL_ODDS">0</span>' +
                                                    '        </p>' +
                                                    '    </td>' +
                                                    '    <td class="back box-w1" id="back_1_' + temp_selectionId + '_BOOKMAKERSMALL_ODDS">' +
                                                    '        <button class="back">' +
                                                    '            <span class="odd">' + bookmaker1_back_rate + '</span>' +
                                                    '            <span>' + bookmaker1_back_size + '</span>' +
                                                    '        </button>' +
                                                    '    </td>' +
                                                    '    <td class="lay box-w1" id="lay_1_' + temp_selectionId + '_BOOKMAKERSMALL_ODDS">' +
                                                    '        <button class="lay">' +
                                                    '            <span class="odd">' + bookmaker1_lay_rate + '</span>' +
                                                    '            <span>' + bookmaker1_lay_size + '</span>' +
                                                    '        </button>' +
                                                    '    </td>' +
                                                    '</tr>';
                                            }

                                        }

                                    }

                                    if (html_bookmaker_odds != "" && bm_small1_datas.length > 0) {
                                        $("#bm1-market_div").css('display', 'block');
                                        $("#bm-head").removeClass('col-12').removeClass('col-8');
                                        $("#bm-head").addClass('col-8');
                                        $("#match_odds_bookmakersmall_market").html(html_bookmaker_odds);
                                    }

                                }

                            }
                        }
                    }
                }
            }
        });
        socket.on('eventGetLiveEventsFancyData', function (args) {

            if (args.body == undefined) {
                //window.location.href = "/index";
            } else {
                if (args.body.cricket) {
                    if (args.body.cricket[0]) {
                        if (args.body.cricket[0][0]) {
                            args.body.cricket[0] = args.body.cricket[0][0];
                        }
                        var eventName = args.body.cricket[0].matchName;
                        var oddsmarketId = args.body.cricket[0].marketid;
                        var eventId = args.body.cricket[0].matchid;
                        var marketId = "";
                        var marketName = "";
                        var eventName2 = "";
                        var runsNo = "";
                        var runsYes = "";
                        var oddsNo = "";
                        var oddsYes = "";
                        var one_click_back_bet_status = "";
                        var one_click_lay_bet_status = "";
                        var class_add_yes_change = "";
                        var class_add_no_change = "";
                        var statusLabel = "";
                        var status = "";
                        for (k = 0; k < args.body.cricket.length; k++) {
                            market_type_name = args.body.cricket[0].marketName;
                            //market_marketid = args.body.cricket[k].marketId;
                            if (market_type_name == "Match Odds") {
                                marketType = "MATCH_ODDS";
                            } else if (market_type_name == "Tied Match") {
                                marketType = "TIE_ODDS";
                            } else if (market_type_name == "To Win the Toss") {
                                marketType = "TOSS_ODDS";
                            } else {
                                if (market_type_name) {
                                    market_type_name = market_type_name.replace(".", "_");
                                    market_type_name = market_type_name.replace(" ", "_");
                                    market_type_name = market_type_name.replace("/", "_");
                                    market_type_name = market_type_name.replace(" ", "_");
                                    marketType = market_type_name;
                                }
                                marketType = market_type_name;
                            }
                            market_type_name2 = marketType;
                            market_marketid = market_type_name2;
                            if (market_marketid) {
                                market_marketid = market_marketid.replace(".", "_");
                            }
                            if (args.body.cricket[0].runners) {
                                for (j = 0; j < args.body.cricket[0].runners.length; j++) {
                                    var selectionId = args.body.cricket[0].runners[j].id;
                                    //selectorIdArray[k*(j+1)] = selectionId;
                                    runnerName = args.body.cricket[0].runners[j].name;
                                    marketName = args.body.cricket[0].runners[j].name;
                                    var bet_suspended = "";
                                    if (args.body.cricket[0].runners[j].back[2]) {
                                        one_price_1 = args.body.cricket[0].runners[j].back[2].price;
                                        if (!one_price_1) {
                                            one_price_1 = "";
                                        }
                                        one_size_1 = args.body.cricket[0].runners[j].back[2].size || 0;
                                    } else {
                                        one_price_1 = "";
                                        one_size_1 = 0;
                                    }
                                    if (args.body.cricket[0].runners[j].back[1]) {
                                        one_price_2 = args.body.cricket[0].runners[j].back[1].price;
                                        if (!one_price_2) {
                                            one_price_2 = "";
                                        }
                                        one_size_2 = args.body.cricket[0].runners[j].back[1].size || 0;
                                    } else {
                                        one_price_2 = "";
                                        one_size_2 = 0;
                                    }
                                    if (args.body.cricket[0].runners[j].back[0]) {
                                        one_price_3 = args.body.cricket[0].runners[j].back[0].price;
                                        if (!one_price_3) {
                                            one_price_3 = "";
                                        }
                                        one_size_3 = args.body.cricket[0].runners[j].back[0].size || 0;
                                    } else {
                                        one_price_3 = "";
                                        one_size_3 = 0;
                                    }
                                    if (args.body.cricket[0].runners[j].lay[0]) {
                                        lay_one_price_1 = args.body.cricket[0].runners[j].lay[0].price;
                                        if (!lay_one_price_1) {
                                            lay_one_price_1 = "";
                                        }
                                        lay_one_size_1 = args.body.cricket[0].runners[j].lay[0].size || 0;
                                    } else {
                                        lay_one_size_1 = 0;
                                        lay_one_price_1 = "";
                                    }
                                    if (args.body.cricket[0].runners[j].lay[1]) {
                                        lay_one_price_2 = args.body.cricket[0].runners[j].lay[1].price;
                                        if (!lay_one_price_2) {
                                            lay_one_price_2 = "";
                                        }
                                        lay_one_size_2 = args.body.cricket[0].runners[j].lay[1].size || 0;
                                    } else {
                                        lay_one_size_2 = 0;
                                        lay_one_price_2 = "";
                                    }
                                    if (args.body.cricket[0].runners[j].lay[2]) {
                                        lay_one_price_3 = args.body.cricket[0].runners[j].lay[2].price;
                                        if (!lay_one_price_3) {
                                            lay_one_price_3 = "";
                                        }
                                        lay_one_size_3 = args.body.cricket[0].runners[j].lay[2].size || 0;
                                    } else {
                                        lay_one_price_3 = "";
                                        lay_one_size_3 = 0;
                                    }
                                    one_size_1 = parseInt(one_size_1);
                                    if (parseInt(one_size_1)) {
                                        one_size_1 = one_size_1.toFixed(2);
                                    } else {
                                        one_size_1 = 0;
                                    }
                                    if (one_size_1 > 10000) {
                                        one_size_1 = one_size_1 / 10000;
                                    }
                                    one_size_2 = parseInt(one_size_2);
                                    if (one_size_2) {
                                        one_size_2 = one_size_2.toFixed(2);
                                    } else {
                                        one_size_2 = 0;
                                    }
                                    if (one_size_2 > 10000) {
                                        one_size_2 = one_size_2 / 10000;
                                    }
                                    one_size_3 = parseInt(one_size_3);
                                    if (one_size_3) { } else {
                                        one_size_3 = 0;
                                    }
                                    one_size_3 = one_size_3.toFixed(2);
                                    if (one_size_3 > 10000) {
                                        one_size_3 = one_size_3 / 10000;
                                    }
                                    lay_one_size_1 = parseInt(lay_one_size_1);
                                    if (lay_one_size_1) { } else {
                                        lay_one_size_1 = 0;
                                    }
                                    lay_one_size_1 = lay_one_size_1.toFixed(2);
                                    if (lay_one_size_1 > 10000) {
                                        lay_one_size_1 = lay_one_size_1 / 10000;
                                    }
                                    lay_one_size_2 = parseInt(lay_one_size_2);
                                    if (lay_one_size_2) { } else {
                                        lay_one_size_2 = 0;
                                    }
                                    lay_one_size_2 = lay_one_size_2.toFixed(2);
                                    if (lay_one_size_2 > 10000) {
                                        lay_one_size_2 = lay_one_size_2 / 10000;
                                    }
                                    lay_one_size_3 = parseInt(lay_one_size_3);
                                    if (lay_one_size_3) { } else {
                                        lay_one_size_3 = 0;
                                    }
                                    lay_one_size_3 = lay_one_size_3.toFixed(2);
                                    if (lay_one_size_3 > 10000) {
                                        lay_one_size_3 = lay_one_size_3 / 10000;
                                    }
                                    one_size_1 = parseFloat(one_size_1);
                                    one_size_2 = parseFloat(one_size_2);
                                    one_size_3 = parseFloat(one_size_3);
                                    lay_one_size_1 = parseFloat(lay_one_size_1);
                                    lay_one_size_2 = parseFloat(lay_one_size_2);
                                    lay_one_size_3 = parseFloat(lay_one_size_3);
                                    one_size_1 = one_size_1.toFixed(2);
                                    one_size_2 = one_size_2.toFixed(2);
                                    one_size_3 = one_size_3.toFixed(2);
                                    lay_one_size_1 = lay_one_size_1.toFixed(2);
                                    lay_one_size_2 = lay_one_size_2.toFixed(2);
                                    lay_one_size_3 = lay_one_size_3.toFixed(2);
                                    if (one_size_1 == 0 && one_size_2 == 0 && one_size_3 == 0 && lay_one_size_1 == 0 && lay_one_size_2 == 0 && lay_one_size_3 == 0) {
                                        //window.location.href = "/index";
                                    }
                                    $("#back_3_" + selectionId + "_" + market_marketid).attr("fullmarketodds", one_price_1);
                                    $("#back_2_" + selectionId + "_" + market_marketid).attr("fullmarketodds", one_price_2);
                                    $("#back_1_" + selectionId + "_" + market_marketid).attr("fullmarketodds", one_price_3);
                                    back_1_html = "<span class='odd d-block'>" + one_price_1 + "</span> <span class='d-block'>" + one_size_1 + "</span>";
                                    back_2_html = "<span class='odd d-block'>" + one_price_2 + "</span> <span class='d-block'>" + one_size_2 + "</span>";
                                    back_3_html = "<span class='odd d-block'>" + one_price_3 + "</span> <span class='d-block'>" + one_size_3 + "</span>";
                                    $("#back_1_" + selectionId + "_" + market_marketid).html(back_3_html);
                                    $("#back_2_" + selectionId + "_" + market_marketid).html(back_2_html);
                                    $("#back_3_" + selectionId + "_" + market_marketid).html(back_1_html);
                                    lay_1_html = "<span class='odd d-block'>" + lay_one_price_1 + "</span> <span class='d-block'>" + lay_one_size_1 + "</span>";
                                    lay_2_html = "<span class='odd d-block'>" + lay_one_price_2 + "</span> <span class='d-block'>" + lay_one_size_2 + "</span>";
                                    lay_3_html = "<span class='odd d-block'>" + lay_one_price_3 + "</span> <span class='d-block'>" + lay_one_size_3 + "</span>";
                                    $("#lay_1_" + selectionId + "_" + market_marketid).html(lay_1_html);
                                    $("#lay_2_" + selectionId + "_" + market_marketid).html(lay_2_html);
                                    $("#lay_3_" + selectionId + "_" + market_marketid).html(lay_3_html);
                                    $("#lay_1_" + selectionId + "_" + market_marketid).attr("fullmarketodds", lay_one_price_1);
                                    $("#lay_2_" + selectionId + "_" + market_marketid).attr("fullmarketodds", lay_one_price_2);
                                    $("#lay_3_" + selectionId + "_" + market_marketid).attr("fullmarketodds", lay_one_price_3);
                                }
                            }
                            if (args.body.cricket[0].bookmaker && args.body.cricket[0].bookmaker != null) {
                                //                        for (z = 0; z < args.body.cricket[0].bookmaker.length; z++) {
                                var bookmaker1_data = args.body.cricket[0].bookmaker;
                                for (var b in bookmaker1_data) {
                                    marketType = "BOOKMAKER_ODDS";
                                    selectionId = bookmaker1_data[b].selectionId
                                    selectorIdBookmakerArray.push(selectionId);
                                    runnerName = bookmaker1_data[b].name;
                                    book_status = bookmaker1_data[b].status;

                                    bookmaker_remarks = bookmaker1_data[b].remark;
                                    marketName = runnerName;
                                    var bet_suspended = "";
                                    if (bookmaker1_data[b]['back'][0]['price']) {
                                        bookmaker1_back_rate = bookmaker1_data[b]['back'][0]['price'] || "";
                                    } else {
                                        bookmaker1_back_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['back'][0]['size']) {
                                        bookmaker1_back_size = bookmaker1_data[b]['back'][0]['size'] || "";
                                    } else {
                                        bookmaker1_back_size = "";
                                    }
                                    bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;
                                    if (bookmaker1_data[b]['back'][1]['price']) {
                                        bookmaker1_back_2_rate = bookmaker1_data[b]['back'][1]['price'] || "";
                                    } else {
                                        bookmaker1_back_2_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['back'][1]['size']) {
                                        bookmaker1_back_2_size = bookmaker1_data[b]['back'][1]['size'] || "";
                                    } else {
                                        bookmaker1_back_2_size = "";
                                    }
                                    bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;
                                    if (bookmaker1_data[b]['back'][2]['price']) {
                                        bookmaker1_back_3_rate = bookmaker1_data[b]['back'][2]['price'] || "";
                                    } else {
                                        bookmaker1_back_3_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['back'][2]['size']) {
                                        bookmaker1_back_3_size = bookmaker1_data[b]['back'][2]['size'] || "";
                                    } else {
                                        bookmaker1_back_3_size = "";
                                    }
                                    bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;
                                    if (bookmaker1_data[b]['lay'][0]['price']) {
                                        bookmaker1_lay_rate = bookmaker1_data[b]['lay'][0]['price'] || "";
                                    } else {
                                        bookmaker1_lay_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['lay'][0]['size']) {
                                        bookmaker1_lay_size = bookmaker1_data[b]['lay'][0]['size'] || "";
                                    } else {
                                        bookmaker1_lay_size = "";
                                    }
                                    bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

                                    if (bookmaker1_data[b]['lay'][1]['price']) {
                                        bookmaker1_lay_2_rate = bookmaker1_data[b]['lay'][1]['price'] || "";
                                    } else {
                                        bookmaker1_lay_2_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['lay'][1]['size']) {
                                        bookmaker1_lay_2_size = bookmaker1_data[b]['lay'][1]['size'] || "";
                                    } else {
                                        bookmaker1_lay_2_size = "";
                                    }
                                    bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;
                                    if (bookmaker1_data[b]['lay'][2]['price']) {
                                        bookmaker1_lay_3_rate = bookmaker1_data[b]['lay'][2]['price'] || "";
                                    } else {
                                        bookmaker1_lay_3_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['lay'][2]['size']) {
                                        bookmaker1_lay_3_size = bookmaker1_data[b]['lay'][2]['size'] || "";
                                    } else {
                                        bookmaker1_lay_3_size = "";
                                    }

                                    bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;

                                    var temp_selectionId = ((runnerName).split(" ").join('_')).trim();

                                    if (book_status != "ACTIVE") {
                                        $("#bookmaker_row_" + temp_selectionId).addClass("suspended");
                                    } else {
                                        $("#bookmaker_row_" + temp_selectionId).removeClass("suspended");
                                    }

                                    $("#bookmaker_row_" + temp_selectionId).attr("data-title", book_status);
                                    $("#back_1_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_rate);
                                    $("#back_2_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_2_rate);
                                    $("#back_3_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_3_rate);
                                    $("#lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_rate);
                                    $("#lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_2_rate);
                                    $("#lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_3_rate);
                                    back_1_html = "<span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_back_size + "</span>";
                                    back_2_html = "<span class='odd d-block'>" + bookmaker1_back_2_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_back_2_size + "</span>";
                                    back_3_html = "<span class='odd d-block'>" + bookmaker1_back_3_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_back_3_size + "</span>";
                                    lay_1_html = "<span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_lay_size + "</span>";
                                    lay_2_html = "<span class='odd d-block'>" + bookmaker1_lay_2_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_lay_2_size + "</span>";
                                    lay_3_html = "<span class='odd d-block'>" + bookmaker1_lay_3_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_lay_3_size + "</span>";
                                    $("#back_1_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_1_html);
                                    $("#back_2_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_2_html);
                                    $("#back_3_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_3_html);
                                    $("#lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_1_html);
                                    $("#lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_2_html);
                                    $("#lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_3_html);
                                }
                                //                        }
                            }

                            if (args.body.cricket[0].bookmaker_tied && args.body.cricket[0].bookmaker_tied != null) {
                                //                        for (z = 0; z < args.body.cricket[0].bookmaker.length; z++) {
                                var bookmaker1_data = args.body.cricket[0].bookmaker_tied;
                                for (var b in bookmaker1_data) {
                                    marketType = "BOOKMAKER_TIED_ODDS";
                                    selectionId = bookmaker1_data[b].selectionId
                                    selectorIdBookmakerArray.push(selectionId);
                                    runnerName = bookmaker1_data[b].name;
                                    book_status = bookmaker1_data[b].status;

                                    bookmaker_remarks = bookmaker1_data[b].remark;
                                    marketName = runnerName;
                                    var bet_suspended = "";
                                    if (bookmaker1_data[b]['back'][0]['price']) {
                                        bookmaker1_back_rate = bookmaker1_data[b]['back'][0]['price'] || "";
                                    } else {
                                        bookmaker1_back_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['back'][0]['size']) {
                                        bookmaker1_back_size = bookmaker1_data[b]['back'][0]['size'] || "";
                                    } else {
                                        bookmaker1_back_size = "";
                                    }
                                    bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;
                                    if (bookmaker1_data[b]['back'][1]['price']) {
                                        bookmaker1_back_2_rate = bookmaker1_data[b]['back'][1]['price'] || "";
                                    } else {
                                        bookmaker1_back_2_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['back'][1]['size']) {
                                        bookmaker1_back_2_size = bookmaker1_data[b]['back'][1]['size'] || "";
                                    } else {
                                        bookmaker1_back_2_size = "";
                                    }
                                    bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;
                                    if (bookmaker1_data[b]['back'][2]['price']) {
                                        bookmaker1_back_3_rate = bookmaker1_data[b]['back'][2]['price'] || "";
                                    } else {
                                        bookmaker1_back_3_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['back'][2]['size']) {
                                        bookmaker1_back_3_size = bookmaker1_data[b]['back'][2]['size'] || "";
                                    } else {
                                        bookmaker1_back_3_size = "";
                                    }
                                    bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;
                                    if (bookmaker1_data[b]['lay'][0]['price']) {
                                        bookmaker1_lay_rate = bookmaker1_data[b]['lay'][0]['price'] || "";
                                    } else {
                                        bookmaker1_lay_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['lay'][0]['size']) {
                                        bookmaker1_lay_size = bookmaker1_data[b]['lay'][0]['size'] || "";
                                    } else {
                                        bookmaker1_lay_size = "";
                                    }
                                    bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

                                    if (bookmaker1_data[b]['lay'][1]['price']) {
                                        bookmaker1_lay_2_rate = bookmaker1_data[b]['lay'][1]['price'] || "";
                                    } else {
                                        bookmaker1_lay_2_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['lay'][1]['size']) {
                                        bookmaker1_lay_2_size = bookmaker1_data[b]['lay'][1]['size'] || "";
                                    } else {
                                        bookmaker1_lay_2_size = "";
                                    }
                                    bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;
                                    if (bookmaker1_data[b]['lay'][2]['price']) {
                                        bookmaker1_lay_3_rate = bookmaker1_data[b]['lay'][2]['price'] || "";
                                    } else {
                                        bookmaker1_lay_3_rate = "-";
                                    }
                                    if (bookmaker1_data[b]['lay'][2]['size']) {
                                        bookmaker1_lay_3_size = bookmaker1_data[b]['lay'][2]['size'] || "";
                                    } else {
                                        bookmaker1_lay_3_size = "";
                                    }

                                    bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;

                                    var temp_selectionId = ((runnerName).split(" ").join('_')).trim();

                                    if (book_status != "ACTIVE") {
                                        $("#bookmaker_row_" + temp_selectionId).addClass("suspended");
                                    } else {
                                        $("#bookmaker_row_" + temp_selectionId).removeClass("suspended");
                                    }

                                    $("#bookmaker_row_" + temp_selectionId).attr("data-title", book_status);
                                    $("#back_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_back_rate);
                                    $("#back_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_back_2_rate);
                                    $("#back_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_back_3_rate);
                                    $("#lay_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_lay_rate);
                                    $("#lay_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_lay_2_rate);
                                    $("#lay_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").attr("fullmarketodds", bookmaker1_lay_3_rate);
                                    back_1_html = "<span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_back_size + "</span>";
                                    back_2_html = "<span class='odd d-block'>" + bookmaker1_back_2_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_back_2_size + "</span>";
                                    back_3_html = "<span class='odd d-block'>" + bookmaker1_back_3_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_back_3_size + "</span>";
                                    lay_1_html = "<span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_lay_size + "</span>";
                                    lay_2_html = "<span class='odd d-block'>" + bookmaker1_lay_2_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_lay_2_size + "</span>";
                                    lay_3_html = "<span class='odd d-block'>" + bookmaker1_lay_3_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_lay_3_size + "</span>";
                                    $("#back_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(back_1_html);
                                    $("#back_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(back_2_html);
                                    $("#back_3_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(back_3_html);
                                    $("#lay_1_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(lay_1_html);
                                    $("#lay_2_" + temp_selectionId + "_BOOKMAKER_TIED_ODDS").html(lay_2_html);
                                    $("#lay_3_" + temp_selectionId + "BOOKMAKER_TIED_ODDS").html(lay_3_html);
                                }
                                //                        }
                            }
                        }
                    }
                }

                if (args.body) {

                    if (args.body.bm1) {

                        if (args.body.bm1[0]) {

                            html_bookmaker_odds = "";

                            var bm_small1 = args.body.bm1[0];

                            if (bm_small1.value && bm_small1.value != null) {
                                if (bm_small1.value.session && bm_small1.value.session != null) {
                                    bm_small1_datas = bm_small1.value.session;

                                    for (z = 0; z < bm_small1_datas.length; z++) {

                                        if (bm_small1_datas[z] && bm_small1_datas[z]) {
                                            var bookmaker1_data = bm_small1_datas[z];

                                            runnerName = bookmaker1_data['RunnerName'];
                                            book_status = bookmaker1_data['GameStatus'];
                                            selectionId = bookmaker1_data['SelectionId'];

                                            var temp_selectionId;
                                            temp_selectionId = runnerName.split(" ").join('_');
                                            temp_selectionId = temp_selectionId.replace(".", "");
                                            marketType = "BOOKMAKERSMALL_ODDS";
                                            selectorIdBookmakerArray.push(selectionId);

                                            marketName = runnerName;
                                            var bet_suspended = "";

                                            if (bookmaker1_data.BackPrice1) {
                                                bookmaker1_back_rate = bookmaker1_data.BackPrice1 || "";
                                            } else {
                                                bookmaker1_back_rate = "-";
                                            }

                                            if (bookmaker1_data.BackSize1) {
                                                bookmaker1_back_size = bookmaker1_data.BackSize1 || 0;
                                            } else {
                                                bookmaker1_back_size = 0;
                                            }
                                            bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;

                                            if (bookmaker1_data.LayPrice1) {
                                                bookmaker1_lay_rate = bookmaker1_data.LayPrice1 || "";
                                            } else {
                                                bookmaker1_lay_rate = "-";
                                            }

                                            if (bookmaker1_data.LaySize1) {
                                                bookmaker1_lay_size = bookmaker1_data.LaySize1 || 0;
                                            } else {
                                                bookmaker1_lay_size = 0;
                                            }
                                            bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;

                                            bookmaker_suspended = "";
                                            if (book_status != "ACTIVE") {
                                                bookmaker_suspended = "suspended";
                                            }

                                            if (book_status != "ACTIVE" || (bookmaker1_back_rate == 0 && bookmaker1_lay_rate == 0)) {
                                                $("#bookmakersmall_row_" + temp_selectionId).addClass("suspended");
                                            } else {
                                                $("#bookmakersmall_row_" + temp_selectionId).removeClass("suspended");
                                            }
                                            $("#bookmakersmall_row_" + temp_selectionId).attr("data-title", book_status);

                                            $("#back_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_back_rate);
                                            $("#lay_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").attr("fullmarketodds", bookmaker1_lay_rate);

                                            if (bookmaker1_back_rate == 0) {
                                                bookmaker1_back_rate = '-';
                                                bookmaker1_back_size = '';
                                            }

                                            if (bookmaker1_lay_rate == 0) {
                                                bookmaker1_lay_rate = '-';
                                                bookmaker1_lay_size = '';
                                            }

                                            back_1_html = "<span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_back_size + "</span>";

                                            lay_1_html = "<span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block runner-size'>" + bookmaker1_lay_size + "</span>";

                                            $("#back_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(back_1_html);

                                            $("#lay_1_" + temp_selectionId + "_BOOKMAKERSMALL_ODDS").html(lay_1_html);

                                        }

                                    }

                                }

                            }
                        }
                    }

                }

                if (args.body.cricket.length) { }
                var main_x = args;

                var smdlm_c = [];
                var mdlm_c = [];
                var dlm_c = [];
                /*  var smdlm_c = [1, 2];
                 var mdlm_c = [1, 2];
                 var dlm_c = [1, 2]; */
                marketIdArrayNew = [];
                marketIdArrayNewFancy1 = [];
                var n1;
                var n2;
                var n3;
                if (main_x.SMDLMarket[5]) {
                    if (main_x.SMDLMarket[5][2]) {
                        if (main_x.SMDLMarket[5][2]['cricket']) {
                            smdlm_c = main_x.SMDLMarket[5][2]['cricket'];
                        }
                    }
                }
                if (main_x.MDLMarket[5]) {
                    if (main_x.MDLMarket[5][3]) {
                        if (main_x.MDLMarket[5][3]['cricket']) {
                            mdlm_c = main_x.MDLMarket[5][3]['cricket'];
                        }
                    }
                }
                if (main_x.DLMarket[5]) {
                    if (main_x.DLMarket[5][4]) {
                        if (main_x.DLMarket[5][4]['cricket']) {
                            dlm_c = main_x.DLMarket[5][4]['cricket'];
                        }
                    }
                }
                if (args.body.session) {
                    if (args.body.session[0]) {
                        if (args.body.session[0].value) {
                            if (args.body.session[0].value.session) {
                                eventId = $(".event_name_heading").attr("eventid");
                                event_name = $(".event_name_heading").attr("event_name");
                                counter2 = 0;
                                marketIdArrayNew = [];
                                //start for
                                var body2 = args.body.session[0].value.session.map(function (a) {
                                    let b = {};
                                    b = a;
                                    b['SelectionId'] = parseInt(b['SelectionId']);
                                    return b;
                                });
                                args.body.session[0].value.session = _.sortBy(body2, 'SelectionId');
                                for (i = 0; i < args.body.session[0].value.session.length; i++) {
                                    html_fancy_market_new = "";
                                    /* var eventId = 29916013; */
                                    marketId = args.body.session[0].value.session[i].SelectionId;
                                    if (marketId == "" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
                                        //	if(marketId == ""){
                                    } else {
                                        min_stack = args.body.session[0].value.session[i].Min;
                                        max_stack = args.body.session[0].value.session[i].Max;
                                        marketName = args.body.session[0].value.session[i].RunnerName;
                                        statusLabel = args.body.session[0].value.session[i].GameStatus;
                                        if (statusLabel == "" || statusLabel == "ACTIVE" || statusLabel == "OPEN") {
                                            $(".fancy-suspend-tr_" + marketId).removeClass("suspended");
                                        } else if (statusLabel == "BALL_RUN") {
                                            $(".fancy-suspend-tr_" + marketId).addClass("suspended");
                                        } else if (statusLabel == "SUSPEND") {
                                            $(".fancy-suspend-tr_" + marketId).addClass("suspended");
                                        } else {
                                            $(".fancy-suspend-tr_" + marketId).addClass("suspended");
                                        }
                                        $(".fancy-suspend-tr_" + marketId).attr("data-title", statusLabel);
                                        if (args.body.session[0].value.session[i] != undefined) {
                                            runsNo = args.body.session[0].value.session[i].LayPrice1;
                                            oddsNo = args.body.session[0].value.session[i].LaySize1;
                                            runsYes = args.body.session[0].value.session[i].BackPrice1;
                                            oddsYes = args.body.session[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        eventName2 = eventName.split(' ').join('_');
                                        if (oddsNo == null) {
                                            oddsNo = "";
                                        }
                                        if (oddsYes == null) {
                                            oddsYes = "";
                                        }
                                        check_runsNo_interger = isNaN(runsNo);
                                        check_oddsNo_interger = isNaN(oddsNo);
                                        check_runsYes_interger = isNaN(runsYes);
                                        check_oddsYes_interger = isNaN(oddsYes);
                                        if (check_runsNo_interger == true) {
                                            runsNo = 0;
                                        }
                                        if (check_oddsNo_interger == true) {
                                            oddsNo = 0;
                                        }
                                        if (check_runsYes_interger == true) {
                                            runsYes = 0;
                                        }
                                        if (check_oddsYes_interger == true) {
                                            oddsYes = 0;
                                        }
                                        marketId = parseInt(marketId);
                                        n1 = smdlm_c.includes(marketId);
                                        n2 = mdlm_c.includes(marketId);
                                        n3 = dlm_c.includes(marketId);
                                        if (!n1 && !n2 && !n3) {
                                            m1 = marketIdArray.includes(marketId);

                                            if (m1) {
                                                marketIdArrayNew[counter2] = marketId;
                                                counter2++;
                                                lay_runs_info = "<span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
                                                $("#fancy_market_lay_btn_" + marketId).html(lay_runs_info);
                                                back_runs_info = "<span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
                                                $("#fancy_market_back_btn_" + marketId).html(back_runs_info);
                                            } else {
                                                marketIdArrayNew[counter2] = marketId;
                                                counter2++;
                                                html_fancy_market_new += "<tr data-title='' class='bet-info sec-3  suspended fancy-suspend-tr_" + marketId + "' id='fancyBetMarket_" + eventId + "_" + marketId + "'> <td> <a href='javascript:void(0)' class='modal-book' onclick='view_book(<?php echo $userdata['Id']; ?>,<?php echo $userdata['power'] ?>," + eventId + "," + marketId + ")' data-mid='" + oddsmarketId + "' data-sid='3' data-gametype='Fancy' data-run='6'>" + marketName + " </a>    <p class='client' id='live_match_points_" + marketId + "_FANCY_ODDS'>0</p> </td> <td class='lay box-w1'>    <button class='lay' id='fancy_market_lay_btn_" + marketId + "'> <span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span> </button> </td> <td class='back box-w1'>    <button class='back' id='fancy_market_back_btn_" + marketId + "'> <span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span> </button> </td> <td class='text-right p-r-10 box-w2'> <span class='d-block text-info'>Min:" + min_stack + "</span> <span class='d-block text-info'>Max:" + max_stack + "</span> </td> </tr>";
                                                lastrunsNo = runsNo;
                                                lastrunsYes = runsYes;
                                                if (marketIdArray[i - 1]) {
                                                    $('#fancyBetMarket_' + eventId + '_' + marketIdArray[i - 1]).after(html_fancy_market_new);
                                                } else if (i > 0) {
                                                    var x = args.body.session[0].value.session[i - 1].SelectionId;
                                                    if ($('#fancyBetMarket_' + eventId + '_' + x).length > 0) {
                                                        $('#fancyBetMarket_' + eventId + '_' + x).after(html_fancy_market_new);
                                                    } else {
                                                        $("#fancy_odds_market_tbody").after(html_fancy_market_new);
                                                    }
                                                } else {
                                                    $("#fancy_odds_market_tbody").after(html_fancy_market_new);
                                                }
                                            }
                                        }
                                    }
                                }
                                if (html_fancy_market_new != "") {
                                    $("#fancy_odds_market").show();
                                } else { }
                                var z = $.grep(marketIdArray, function (el) {
                                    return $.inArray(el, marketIdArrayNew) == -1
                                });
                                if (z) {
                                    for (i = 0; i < z.length; i++) {
                                        marketId = z[i];
                                        if ($("#fancyBetMarket_" + eventId + "_" + marketId).length > 0) {
                                            document.getElementById("fancyBetMarket_" + eventId + "_" + marketId).remove();
                                            $(".fancy-suspend-tr_" + marketId).remove();
                                        }
                                    }
                                }
                                marketIdArray = marketIdArrayNew;
                            }
                            //end for
                        }
                    }
                }
                if (args.body.session1 && true) {
                    if (args.body.session1[0]) {
                        if (args.body.session1[0].value) {
                            if (args.body.session1[0].value.session) {
                                eventId = $(".event_name_heading").attr("eventid");
                                event_name = $(".event_name_heading").attr("event_name");
                                counter2 = 0;
                                marketIdArrayNewFancy1 = [];
                                //start for
                                var body2 = args.body.session1[0].value.session.map(function (a) {
                                    let b = {};
                                    b = a;
                                    b['SelectionId'] = parseInt(b['SelectionId']);
                                    return b;
                                });
                                args.body.session1[0].value.session = _.sortBy(body2, 'SelectionId');
                                for (i = 0; i < args.body.session1[0].value.session.length; i++) {
                                    html_fancy_market_new1 = "";
                                    /* var eventId = 29916013; */
                                    marketId = args.body.session1[0].value.session[i].SelectionId;
                                    if (marketId == "" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
                                        //	if(marketId == ""){
                                    } else {
                                        min_stack = args.body.session1[0].value.session[i].Min;
                                        max_stack = args.body.session1[0].value.session[i].Max;
                                        marketName = args.body.session1[0].value.session[i].RunnerName;
                                        statusLabel = args.body.session1[0].value.session[i].GameStatus;
                                        if (statusLabel == "" || statusLabel == "ACTIVE" || statusLabel == "OPEN") {
                                            $(".fancy1-suspend-tr_" + marketId).removeClass("suspended");
                                        } else if (statusLabel == "BALL_RUN") {
                                            $(".fancy1-suspend-tr_" + marketId).addClass("suspended");
                                        } else if (statusLabel == "SUSPEND") {
                                            $(".fancy1-suspend-tr_" + marketId).addClass("suspended");
                                        } else {
                                            $(".fancy1-suspend-tr_" + marketId).addClass("suspended");
                                        }
                                        $(".fancy1-suspend-tr_" + marketId).attr("data-title", statusLabel);
                                        if (args.body.session1[0].value.session[i] != undefined) {
                                            runsNo = args.body.session1[0].value.session[i].LayPrice1;
                                            oddsNo = args.body.session1[0].value.session[i].LaySize1;
                                            runsYes = args.body.session1[0].value.session[i].BackPrice1;
                                            oddsYes = args.body.session1[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        eventName2 = eventName.split(' ').join('_');
                                        if (oddsNo == null) {
                                            oddsNo = "";
                                        }
                                        if (oddsYes == null) {
                                            oddsYes = "";
                                        }
                                        check_runsNo_interger = isNaN(runsNo);
                                        check_oddsNo_interger = isNaN(oddsNo);
                                        check_runsYes_interger = isNaN(runsYes);
                                        check_oddsYes_interger = isNaN(oddsYes);
                                        if (check_runsNo_interger == true) {
                                            runsNo = 0;
                                        }
                                        if (check_oddsNo_interger == true) {
                                            oddsNo = 0;
                                        }
                                        if (check_runsYes_interger == true) {
                                            runsYes = 0;
                                        }
                                        if (check_oddsYes_interger == true) {
                                            oddsYes = 0;
                                        }
                                        marketId = parseInt(marketId);
                                        n1 = smdlm_c.includes(marketId);
                                        n2 = mdlm_c.includes(marketId);
                                        n3 = dlm_c.includes(marketId);
                                        if (!n1 && !n2 && !n3) {
                                            m1 = marketIdArrayFancy1.includes(marketId);
                                            if (m1) {
                                                marketIdArrayNewFancy1[counter2] = marketId;
                                                counter2++;
                                                if (runsNo == 0) {
                                                    runsNo = "-";
                                                    oddsNo = "";
                                                }
                                                if (runsYes == 0) {
                                                    runsYes = "-";
                                                    oddsYes = "";
                                                }
                                                lay_runs_info = "<span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
                                                $("#fancy1_market_lay_btn_" + marketId).html(lay_runs_info);
                                                back_runs_info = "<span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
                                                $("#fancy1_market_back_btn_" + marketId).html(back_runs_info);
                                            } else {
                                                marketIdArrayNewFancy1[counter2] = marketId;
                                                counter2++;
                                                html_fancy_market_new1 += "<tr data-title='' class='bet-info sec-3 suspended fancy1-suspend-tr_" + marketId + "' id='fancy1BetMarket_" + eventId + "_" + marketId + "'> <td> <a href='javascript:void(0)' class='modal-book' data-mid='" + oddsmarketId + "' data-sid='3' data-gametype='Fancy' data-run='6'>" + marketName + " </a>    <p class='client'>0</p> </td> <td class='lay box-w1'>    <button class='lay' id='fancy1_market_lay_btn_" + marketId + "'> <span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span> </button> </td> <td class='back box-w1'>    <button class='back' id='fancy1_market_back_btn_" + marketId + "'> <span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span> </button> </td> <td class='text-right p-r-10 box-w2'> <span class='d-block text-info'>Min:" + min_stack + "</span> <span class='d-block text-info'>Max:" + max_stack + "</span> </td> </tr>";
                                                lastrunsNo = runsNo;
                                                lastrunsYes = runsYes;
                                                if (marketIdArrayFancy1[i - 1]) {
                                                    $('#fancy1BetMarket_' + eventId + '_' + marketIdArrayFancy1[i - 1]).after(html_fancy_market_new1);
                                                } else if (i > 0) {
                                                    var x = args.body.session1[0].value.session[i - 1].SelectionId;
                                                    if ($('#fancy1BetMarket_' + eventId + '_' + x).length > 0) {
                                                        $('#fancy1BetMarket_' + eventId + '_' + x).after(html_fancy_market_new1);
                                                    } else {
                                                        $("#fancy_odds_market1_tbody").after(html_fancy_market_new1);
                                                    }
                                                } else {
                                                    $("#fancy_odds_market1_tbody").after(html_fancy_market_new1);
                                                }
                                            }
                                        }
                                    }
                                }
                                if (html_fancy_market_new1 != "") {
                                    $("#fancy_odds_market1").show();
                                } else { }
                                var z = $.grep(marketIdArrayFancy1, function (el) {
                                    return $.inArray(el, marketIdArrayNewFancy1) == -1
                                });
                                if (z) {
                                    for (i = 0; i < z.length; i++) {
                                        marketId = z[i];
                                        if ($("#fancy1BetMarket_" + eventId + "_" + marketId).length > 0) {
                                            document.getElementById("fancy1BetMarket_" + eventId + "_" + marketId).remove();
                                            $(".fancy1-suspend-tr_" + marketId).remove();
                                        }
                                    }
                                }
                                marketIdArrayFancy1 = marketIdArrayNewFancy1;
                            }
                            //end for
                        }
                    }
                }
                if (args.body.khado && true) {
                    if (args.body.khado[0]) {
                        if (args.body.khado[0].value) {
                            if (args.body.khado[0].value.session) {
                                eventId = $(".event_name_heading").attr("eventid");
                                event_name = $(".event_name_heading").attr("event_name");
                                counter2 = 0;
                                marketIdArrayNewKhado = [];
                                //start for
                                var body2 = args.body.khado[0].value.session.map(function (a) {
                                    let b = {};
                                    b = a;
                                    b['SelectionId'] = parseInt(b['SelectionId']);
                                    return b;
                                });
                                args.body.khado[0].value.session = _.sortBy(body2, 'SelectionId');
                                for (i = 0; i < args.body.khado[0].value.session.length; i++) {
                                    html_khado_market_new = "";
                                    /* var eventId = 29916013; */
                                    marketId = args.body.khado[0].value.session[i].SelectionId;
                                    if (marketId == "" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
                                        //	if(marketId == ""){
                                    } else {
                                        min_stack = args.body.khado[0].value.session[i].Min;
                                        max_stack = args.body.khado[0].value.session[i].Max;
                                        marketName = args.body.khado[0].value.session[i].RunnerName;
                                        statusLabel = args.body.khado[0].value.session[i].GameStatus;
                                        if (statusLabel == "" || statusLabel == "ACTIVE" || statusLabel == "OPEN") {
                                            $(".khado-suspend-tr_" + marketId).removeClass("suspended");
                                        } else if (statusLabel == "BALL_RUN") {
                                            $(".khado-suspend-tr_" + marketId).addClass("suspended");
                                        } else if (statusLabel == "SUSPEND") {
                                            $(".khado-suspend-tr_" + marketId).addClass("suspended");
                                        } else {
                                            $(".khado-suspend-tr_" + marketId).addClass("suspended");
                                        }
                                        $(".khado-suspend-tr_" + marketId).attr("data-title", statusLabel);
                                        if (args.body.khado[0].value.session[i] != undefined) {
                                            runsNo = args.body.khado[0].value.session[i].LayPrice1;
                                            oddsNo = args.body.khado[0].value.session[i].LaySize1;
                                            runsYes = args.body.khado[0].value.session[i].BackPrice1;
                                            oddsYes = args.body.khado[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        eventName2 = eventName.split(' ').join('_');
                                        if (oddsNo == null) {
                                            oddsNo = "";
                                        }
                                        if (oddsYes == null) {
                                            oddsYes = "";
                                        }
                                        check_runsNo_interger = isNaN(runsNo);
                                        check_oddsNo_interger = isNaN(oddsNo);
                                        check_runsYes_interger = isNaN(runsYes);
                                        check_oddsYes_interger = isNaN(oddsYes);
                                        if (check_runsNo_interger == true) {
                                            runsNo = 0;
                                        }
                                        if (check_oddsNo_interger == true) {
                                            oddsNo = 0;
                                        }
                                        if (check_runsYes_interger == true) {
                                            runsYes = 0;
                                        }
                                        if (check_oddsYes_interger == true) {
                                            oddsYes = 0;
                                        }
                                        marketId = parseInt(marketId);
                                        n1 = smdlm_c.includes(marketId);
                                        n2 = mdlm_c.includes(marketId);
                                        n3 = dlm_c.includes(marketId);
                                        if (!n1 && !n2 && !n3) {
                                            m1 = marketIdArrayKhado.includes(marketId);
                                            if (m1) {
                                                marketIdArrayNewKhado[counter2] = marketId;
                                                counter2++;
                                                if (runsNo == 0) {
                                                    runsNo = "";
                                                    oddsNo = "";
                                                }
                                                if (runsYes == 0) {
                                                    runsYes = "";
                                                    oddsYes = "";
                                                }
                                                lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
                                                $("#khado_market_lay_btn_" + marketId).html(lay_runs_info);
                                                winning_zone = parseInt(runsYes) + parseInt(runsNo);
                                                back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
                                                $("#khado_market_back_btn_" + marketId).html(back_runs_info);
                                            } else {
                                                marketIdArrayNewKhado[counter2] = marketId;
                                                counter2++;
                                                winning_zone = parseInt(runsYes) + parseInt(runsNo);
                                                html_khado_market_new += "<tr data-title='' class='bet-info sec-3 suspended khado-suspend-tr_" + marketId + "' id='khadoBetMarket_" + eventId + "_" + marketId + "'> <td> <a href='javascript:void(0)' class='modal-book' data-mid='" + oddsmarketId + "' data-sid='3' data-gametype='Fancy' data-run='6'>" + marketName + " </a>    <p class='client'>0</p> </td> <td class='lay box-w1'>    <button class='lay' id='khado_market_lay_btn_" + marketId + "'> <span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span> </button> </td> <td class='back box-w1'>    <button class='back' id='khado_market_back_btn_" + marketId + "'> <span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span> </button> </td> <td class='text-right p-r-10 box-w2'> <span class='d-block text-info'>Min:" + min_stack + "</span> <span class='d-block text-info'>Max:" + max_stack + "</span> </td> </tr>";
                                                lastrunsNo = runsNo;
                                                lastrunsYes = runsYes;
                                                if (marketIdArrayKhado[i - 1]) {
                                                    $('#khadoBetMarket_' + eventId + '_' + marketIdArrayKhado[i - 1]).after(html_khado_market_new);
                                                } else if (i > 0) {
                                                    var x = args.body.khado[0].value.session[i - 1].SelectionId;
                                                    if ($('#khadoBetMarket_' + eventId + '_' + x).length > 0) {
                                                        $('#khadoBetMarket_' + eventId + '_' + x).after(html_khado_market_new);
                                                    } else {
                                                        $("#khado_odds_market_tbody").after(html_khado_market_new);
                                                    }
                                                } else {
                                                    $("#khado_odds_market_tbody").after(html_khado_market_new);
                                                }
                                            }
                                        }
                                    }
                                }
                                if (html_khado_market_new != "") {
                                    $("#khado_odds_market").show();
                                } else { }
                                var z = $.grep(marketIdArrayKhado, function (el) {
                                    return $.inArray(el, marketIdArrayNewKhado) == -1
                                });
                                if (z) {
                                    for (i = 0; i < z.length; i++) {
                                        marketId = z[i];
                                        if ($("#khadoBetMarket_" + eventId + "_" + marketId).length > 0) {
                                            document.getElementById("khadoBetMarket_" + eventId + "_" + marketId).remove();
                                            $(".khado-suspend-tr_" + marketId).remove();
                                        }
                                    }
                                }
                                marketIdArrayKhado = marketIdArrayNewKhado;
                            }
                            //end for
                        }
                    }
                }
                if (args.body.ballByBall && true) {
                    if (args.body.ballByBall[0]) {
                        if (args.body.ballByBall[0].value) {
                            if (args.body.ballByBall[0].value.session) {
                                eventId = $(".event_name_heading").attr("eventid");
                                event_name = $(".event_name_heading").attr("event_name");
                                counter2 = 0;
                                marketIdArrayNewBall = [];
                                //start for
                                var body2 = args.body.ballByBall[0].value.session.map(function (a) {
                                    let b = {};
                                    b = a;
                                    b['SelectionId'] = parseInt(b['SelectionId']);
                                    return b;
                                });
                                args.body.ballByBall[0].value.session = _.sortBy(body2, 'SelectionId');
                                for (i = 0; i < args.body.ballByBall[0].value.session.length; i++) {
                                    html_ball_market_new = "";
                                    /* var eventId = 29916013; */
                                    marketId = args.body.ballByBall[0].value.session[i].SelectionId;
                                    if (marketId == "" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
                                        //	if(marketId == ""){
                                    } else {
                                        min_stack = args.body.ballByBall[0].value.session[i].Min;
                                        max_stack = args.body.ballByBall[0].value.session[i].Max;
                                        marketName = args.body.ballByBall[0].value.session[i].RunnerName;
                                        statusLabel = args.body.ballByBall[0].value.session[i].GameStatus;
                                        if (statusLabel == "" || statusLabel == "ACTIVE" || statusLabel == "OPEN") {
                                            $(".ballByBall-suspend-tr_" + marketId).removeClass("suspended");
                                        } else if (statusLabel == "BALL_RUN") {
                                            $(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
                                        } else if (statusLabel == "SUSPEND") {
                                            $(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
                                        } else {
                                            $(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
                                        }
                                        $(".ballByBall-suspend-tr_" + marketId).attr("data-title", statusLabel);
                                        if (args.body.ballByBall[0].value.session[i] != undefined) {
                                            runsNo = args.body.ballByBall[0].value.session[i].LayPrice1;
                                            oddsNo = args.body.ballByBall[0].value.session[i].LaySize1;
                                            runsYes = args.body.ballByBall[0].value.session[i].BackPrice1;
                                            oddsYes = args.body.ballByBall[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        eventName2 = eventName.split(' ').join('_');
                                        if (oddsNo == null) {
                                            oddsNo = "";
                                        }
                                        if (oddsYes == null) {
                                            oddsYes = "";
                                        }
                                        check_runsNo_interger = isNaN(runsNo);
                                        check_oddsNo_interger = isNaN(oddsNo);
                                        check_runsYes_interger = isNaN(runsYes);
                                        check_oddsYes_interger = isNaN(oddsYes);
                                        if (check_runsNo_interger == true) {
                                            runsNo = 0;
                                        }
                                        if (check_oddsNo_interger == true) {
                                            oddsNo = 0;
                                        }
                                        if (check_runsYes_interger == true) {
                                            runsYes = 0;
                                        }
                                        if (check_oddsYes_interger == true) {
                                            oddsYes = 0;
                                        }
                                        marketId = parseInt(marketId);
                                        n1 = smdlm_c.includes(marketId);
                                        n2 = mdlm_c.includes(marketId);
                                        n3 = dlm_c.includes(marketId);
                                        if (!n1 && !n2 && !n3) {
                                            m1 = marketIdArrayBall.includes(marketId);
                                            if (m1) {
                                                marketIdArrayNewBall[counter2] = marketId;
                                                counter2++;
                                                if (runsNo == 0) {
                                                    runsNo = "-";
                                                    oddsNo = "";
                                                }
                                                if (runsYes == 0) {
                                                    runsYes = "-";
                                                    oddsYes = "";
                                                }
                                                lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
                                                $("#ball_market_lay_btn_" + marketId).html(lay_runs_info);
                                                back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
                                                $("#ball_market_back_btn_" + marketId).html(back_runs_info);
                                            } else {
                                                marketIdArrayNewBall[counter2] = marketId;
                                                counter2++;

                                                html_ball_market_new += "<tr data-title='' class='bet-info sec-3 suspended ballByBall-suspend-tr_" + marketId + "' id='ballBetMarket_" + eventId + "_" + marketId + "'> <td> <a href='javascript:void(0)' class='modal-book' data-mid='" + oddsmarketId + "' data-sid='3' data-gametype='Fancy' data-run='6'>" + marketName + " </a>    <p class='client'>0</p> </td> <td class='lay box-w1'>    <button class='lay' id='ball_market_lay_btn_" + marketId + "'> <span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span> </button> </td> <td class='back box-w1'>    <button class='back' id='ball_market_back_btn_" + marketId + "'> <span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span> </button> </td> <td class='text-right p-r-10 box-w2'> <span class='d-block text-info'>Min:" + min_stack + "</span> <span class='d-block text-info'>Max:" + max_stack + "</span> </td> </tr>";
                                                lastrunsNo = runsNo;
                                                lastrunsYes = runsYes;
                                                if (marketIdArrayBall[i - 1]) {
                                                    $('#ballBetMarket_' + eventId + '_' + marketIdArrayBall[i - 1]).after(html_ball_market_new);
                                                } else if (i > 0) {
                                                    var x = args.body.ballByBall[0].value.session[i - 1].SelectionId;
                                                    if ($('#ballBetMarket_' + eventId + '_' + x).length > 0) {
                                                        $('#ballBetMarket_' + eventId + '_' + x).after(html_ball_market_new);
                                                    } else {
                                                        $("#ball_odds_market_tbody").after(html_ball_market_new);
                                                    }
                                                } else {
                                                    $("#ball_odds_market_tbody").after(html_ball_market_new);
                                                }
                                            }
                                        }
                                    }
                                }
                                if (html_ball_market_new != "") {
                                    $("#ball_odds_market").show();
                                } else { }
                                var z = $.grep(marketIdArrayBall, function (el) {
                                    return $.inArray(el, marketIdArrayNewBall) == -1
                                });
                                if (z) {
                                    for (i = 0; i < z.length; i++) {
                                        marketId = z[i];
                                        if ($("#ballBetMarket_" + eventId + "_" + marketId).length > 0) {
                                            document.getElementById("ballBetMarket_" + eventId + "_" + marketId).remove();
                                            $(".ballByBall-suspend-tr_" + marketId).remove();
                                        }
                                    }
                                }
                                marketIdArrayBall = marketIdArrayNewBall;
                            }
                            //end for
                        }
                    }
                }
                if (args.body.meter && true) {
                    if (args.body.meter[0]) {
                        if (args.body.meter[0].value) {
                            if (args.body.meter[0].value.session) {
                                eventId = $(".event_name_heading").attr("eventid");
                                event_name = $(".event_name_heading").attr("event_name");
                                counter2 = 0;
                                marketIdArrayNewMeter = [];
                                //start for
                                var body2 = args.body.meter[0].value.session.map(function (a) {
                                    let b = {};
                                    b = a;
                                    b['SelectionId'] = parseInt(b['SelectionId']);
                                    return b;
                                });
                                args.body.meter[0].value.session = _.sortBy(body2, 'SelectionId');
                                for (i = 0; i < args.body.meter[0].value.session.length; i++) {
                                    html_meter_market_new = "";
                                    /* var eventId = 29916013; */
                                    marketId = args.body.meter[0].value.session[i].SelectionId;
                                    if (marketId == "" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
                                        //	if(marketId == ""){
                                    } else {
                                        min_stack = args.body.meter[0].value.session[i].Min;
                                        max_stack = args.body.meter[0].value.session[i].Max;
                                        marketName = args.body.meter[0].value.session[i].RunnerName;
                                        statusLabel = args.body.meter[0].value.session[i].GameStatus;
                                        if (statusLabel == "" || statusLabel == "ACTIVE" || statusLabel == "OPEN") {
                                            $(".meter-suspend-tr_" + marketId).removeClass("suspended");
                                        } else if (statusLabel == "BALL_RUN") {
                                            $(".meter-suspend-tr_" + marketId).addClass("suspended");
                                        } else if (statusLabel == "SUSPEND") {
                                            $(".meter-suspend-tr_" + marketId).addClass("suspended");
                                        } else {
                                            $(".meter-suspend-tr_" + marketId).addClass("suspended");
                                        }
                                        $(".meter-suspend-tr_" + marketId).attr("data-title", statusLabel);
                                        if (args.body.meter[0].value.session[i] != undefined) {
                                            runsNo = args.body.meter[0].value.session[i].LayPrice1;
                                            oddsNo = args.body.meter[0].value.session[i].LaySize1;
                                            runsYes = args.body.meter[0].value.session[i].BackPrice1;
                                            oddsYes = args.body.meter[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        eventName2 = eventName.split(' ').join('_');
                                        if (oddsNo == null) {
                                            oddsNo = "";
                                        }
                                        if (oddsYes == null) {
                                            oddsYes = "";
                                        }
                                        check_runsNo_interger = isNaN(runsNo);
                                        check_oddsNo_interger = isNaN(oddsNo);
                                        check_runsYes_interger = isNaN(runsYes);
                                        check_oddsYes_interger = isNaN(oddsYes);
                                        if (check_runsNo_interger == true) {
                                            runsNo = 0;
                                        }
                                        if (check_oddsNo_interger == true) {
                                            oddsNo = 0;
                                        }
                                        if (check_runsYes_interger == true) {
                                            runsYes = 0;
                                        }
                                        if (check_oddsYes_interger == true) {
                                            oddsYes = 0;
                                        }
                                        marketId = parseInt(marketId);
                                        n1 = smdlm_c.includes(marketId);
                                        n2 = mdlm_c.includes(marketId);
                                        n3 = dlm_c.includes(marketId);
                                        if (!n1 && !n2 && !n3) {
                                            m1 = marketIdArrayMeter.includes(marketId);
                                            if (m1) {
                                                marketIdArrayNewMeter[counter2] = marketId;
                                                counter2++;
                                                if (runsNo == 0) {
                                                    runsNo = "-";
                                                    oddsNo = "";
                                                }
                                                if (runsYes == 0) {
                                                    runsYes = "-";
                                                    oddsYes = "";
                                                }
                                                lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
                                                $("#meter_market_lay_btn_" + marketId).html(lay_runs_info);
                                                back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
                                                $("#meter_market_back_btn_" + marketId).html(back_runs_info);
                                            } else {
                                                marketIdArrayNewMeter[counter2] = marketId;
                                                counter2++;
                                                html_meter_market_new += "<tr data-title='' class='bet-info sec-3 suspended meter-suspend-tr_" + marketId + "' id='meterBetMarket_" + eventId + "_" + marketId + "'> <td> <a href='javascript:void(0)' class='modal-book' data-mid='" + oddsmarketId + "' data-sid='3' data-gametype='Fancy' data-run='6'>" + marketName + " </a>    <p class='client'>0</p> </td> <td class='lay box-w1'>    <button class='lay' id='meter_market_lay_btn_" + marketId + "'> <span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span> </button> </td> <td class='back box-w1'>    <button class='back' id='meter_market_back_btn_" + marketId + "'> <span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span> </button> </td> <td class='text-right p-r-10 box-w2'> <span class='d-block text-info'>Min:" + min_stack + "</span> <span class='d-block text-info'>Max:" + max_stack + "</span> </td> </tr>";
                                                lastrunsNo = runsNo;
                                                lastrunsYes = runsYes;
                                                if (marketIdArrayMeter[i - 1]) {
                                                    $('#meterBetMarket_' + eventId + '_' + marketIdArrayMeter[i - 1]).after(html_meter_market_new);
                                                } else if (i > 0) {
                                                    var x = args.body.meter[0].value.session[i - 1].SelectionId;
                                                    if ($('#meterBetMarket_' + eventId + '_' + x).length > 0) {
                                                        $('#meterBetMarket_' + eventId + '_' + x).after(html_meter_market_new);
                                                    } else {
                                                        $("#secure_meter").after(html_meter_market_new);
                                                    }
                                                } else {
                                                    $("#secure_meter").after(html_meter_market_new);
                                                }
                                            }
                                        }
                                    }
                                }
                                if (html_meter_market_new != "") {
                                    $("#meter_odds_market").show();
                                } else { }
                                var z = $.grep(marketIdArrayMeter, function (el) {
                                    return $.inArray(el, marketIdArrayNewMeter) == -1
                                });
                                if (z) {
                                    for (i = 0; i < z.length; i++) {
                                        marketId = z[i];
                                        if ($("#meterBetMarket_" + eventId + "_" + marketId).length > 0) {
                                            document.getElementById("meterBetMarket_" + eventId + "_" + marketId).remove();
                                            $(".meter-suspend-tr_" + marketId).remove();
                                        }
                                    }
                                }
                                marketIdArrayMeter = marketIdArrayNewMeter;
                            }
                            //end for
                        }
                    }
                }

                if (args.body.oddEven && true) {

                    if (args.body.oddEven[0]) {
                        if (args.body.oddEven[0].value) {
                            if (args.body.oddEven[0].value.session) {
                                event_name = $(".event_name_heading").attr("event_name");
                                counter2 = 0;
                                marketIdArrayNewOddEven = [];
                                //start for
                                var body2 = args.body.oddEven[0].value.session.map(function (a) {
                                    let b = {};
                                    b = a;
                                    b['SelectionId'] = parseInt(b['SelectionId']);
                                    return b;
                                });
                                args.body.oddEven[0].value.session = _.sortBy(body2, 'SelectionId');
                                for (i = 0; i < args.body.oddEven[0].value.session.length; i++) {
                                    html_oddeven_market_new = "";
                                    marketId = args.body.oddEven[0].value.session[i].SelectionId;
                                    if (marketId == "" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
                                        //	if(marketId == ""){
                                    } else {
                                        min_stack = args.body.oddEven[0].value.session[i].Min;
                                        max_stack = args.body.oddEven[0].value.session[i].Max;
                                        marketName = args.body.oddEven[0].value.session[i].RunnerName;
                                        statusLabel = args.body.oddEven[0].value.session[i].GameStatus;
                                        statusLabel = (statusLabel.toUpperCase() == 'OPEN') ? '' : statusLabel;

                                        if (statusLabel == "" || statusLabel == "ACTIVE" || statusLabel == "OPEN") {
                                            $("#fancyBetMarket_" + eventId + "" + marketId).removeClass("suspended");
                                        } else {
                                            $("#fancyBetMarket_" + eventId + "" + marketId).addClass("suspended");
                                        }
                                        $("#fancyBetMarket_" + eventId + "" + marketId).attr("data-title", statusLabel);

                                        if (args.body.oddEven[0].value.session[i] != undefined) {
                                            runsNo = args.body.oddEven[0].value.session[i].LayPrice1;
                                            oddsNo = args.body.oddEven[0].value.session[i].LaySize1;
                                            runsYes = args.body.oddEven[0].value.session[i].BackPrice1;
                                            oddsYes = args.body.oddEven[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        eventName2 = eventName.split(' ').join('_');
                                        if (oddsNo == null) {
                                            oddsNo = "";
                                        }
                                        if (oddsYes == null) {
                                            oddsYes = "";
                                        }
                                        check_runsNo_interger = isNaN(runsNo);
                                        check_oddsNo_interger = isNaN(oddsNo);
                                        check_runsYes_interger = isNaN(runsYes);
                                        check_oddsYes_interger = isNaN(oddsYes);
                                        if (check_runsNo_interger == true) {
                                            runsNo = 0;
                                        }
                                        if (check_oddsNo_interger == true) {
                                            oddsNo = 0;
                                        }
                                        if (check_runsYes_interger == true) {
                                            runsYes = 0;
                                        }
                                        if (check_oddsYes_interger == true) {
                                            oddsYes = 0;
                                        }
                                        marketId = parseInt(marketId);
                                        n1 = smdlm_c.includes(marketId);
                                        n2 = mdlm_c.includes(marketId);
                                        n3 = dlm_c.includes(marketId);
                                        /if (!n1 && !n2 && !n3) {/
                                        if (true) {
                                            m1 = marketIdArrayOddEven.includes(marketId);
                                            if (m1) {
                                                marketIdArrayNewOddEven[counter2] = marketId;
                                                counter2++;
                                                if (runsNo == 0) {
                                                    runsNo = "-";
                                                    oddsNo = "";
                                                }
                                                if (runsYes == 0) {
                                                    runsYes = "-";
                                                    oddsYes = "";
                                                }
                                                lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
                                                $("#oddeven_market_lay_btn_" + marketId).html(lay_runs_info);
                                                back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
                                                $("#oddeven_market_back_btn_" + marketId).html(back_runs_info);
                                            } else {
                                                marketIdArrayNewOddEven[counter2] = marketId;
                                                counter2++;
                                                html_oddeven_market_new += "<tr data-title='' class='bet-info sec-3 suspended fancyBetMarket" + marketId + "' id='fancyBetMarket_" + eventId + "" + marketId + "'> <td> <a href='javascript:void(0)' class='modal-book' data-mid='" + oddsmarketId + "' data-sid='3' data-gametype='Fancy' data-run='6'>" + marketName + " </a>    <p id='live_match_points" + marketId + "FANCY_ODDS'>0</p> </td> <td class='back box-w1'>    <button class='back' id='oddeven_market_lay_btn" + marketId + "'> <span class='odd'>" + runsNo + "</span> <span>" + oddsNo + "</span> </button> </td> <td class='back box-w1'>    <button class='back' id='oddeven_market_back_btn_" + marketId + "'> <span class='odd'>" + runsYes + "</span> <span>" + oddsYes + "</span> </button> </td> <td class='text-right p-r-10 box-w2'> <span class='d-block text-info'>Min:" + min_stack + "</span> <span class='d-block text-info'>Max:" + max_stack + "</span> </td> </tr>";
                                                lastrunsNo = runsNo;
                                                lastrunsYes = runsYes;
                                                if (marketIdArrayOddEven[i - 1]) {
                                                    $('#fancyBetMarket_' + eventId + '_' + marketIdArrayOddEven[i - 1]).after(html_oddeven_market_new);
                                                } else if (i > 0) {
                                                    var x = args.body.oddEven[0].value.session[i - 1].SelectionId;
                                                    if ($('#fancyBetMarket_' + eventId + '_' + x).length > 0) {
                                                        $('#fancyBetMarket_' + eventId + '_' + x).after(html_oddeven_market_new);
                                                    } else {
                                                        $("#oddeven_odds_market_tbody").after(html_oddeven_market_new);
                                                    }
                                                } else {
                                                    $("#oddeven_odds_market_tbody").after(html_oddeven_market_new);
                                                }
                                            }
                                        }
                                    }
                                }
                                if (html_oddeven_market_new != "") {
                                    $("#oddeven_odds_market").show();
                                } else { }
                                var z = $.grep(marketIdArrayOddEven, function (el) {
                                    return $.inArray(el, marketIdArrayNewOddEven) == -1
                                });
                                if (z) {
                                    for (i = 0; i < z.length; i++) {
                                        marketId = z[i];
                                        if ($("#fancyBetMarket_" + eventId + "_" + marketId).length > 0) {
                                            document.getElementById("fancyBetMarket_" + eventId + "_" + marketId).remove();
                                            $('#fancyBetMarket_' + eventId + '_' + marketId).remove();
                                        }
                                    }
                                }
                                marketIdArrayOddEven = marketIdArrayNewOddEven;
                            }
                            //end for
                        }
                    }
                }

            }
        });
        socket.on('liveScore', function (args) {
            if (args && args.data) {
                <?php
                if ($eventType == 4) {
                    ?>
                    updateScoreBoard(args.data);
                    <?php
                }
                ?>
            } else if (args && args.score) {
                <?php
                if ($eventType == 1) {
                    ?>

                    if (args.score.home) {
                        if (args.score.home.name) {
                            home_team_name = args.score.home.name;
                            home_team_score = args.score.home.score;
                            home_team_numberOfYellowCards = args.score.home.numberOfYellowCards;
                            home_team_numberOfRedCards = args.score.home.numberOfRedCards;
                            home_team_numberOfCorners = args.score.home.numberOfCorners;

                        }
                    }

                    if (args.score.away) {
                        if (args.score.away.name) {
                            away_team_name = args.score.away.name;


                            away_team_score = args.score.away.score;
                            away_team_numberOfYellowCards = args.score.away.numberOfYellowCards;
                            away_team_numberOfRedCards = args.score.away.numberOfRedCards;
                            away_team_numberOfCorners = args.score.away.numberOfCorners;


                        }
                    }


                    soccer_timeElapsed = 0;
                    if (args && args.timeElapsed) {
                        soccer_timeElapsed = args.timeElapsed;
                    }

                    if (eventName2) {
                        html_score_card = "<div class='table-container table-responsive'>" +
                            "	<div class='' style='width:100%'>" +
                            "	  <div class='col-sm-12' style='color:#FFFFFF;' id='footballScoreBoard'>" +
                            "		 <table style='width:100%'>" +
                            "			<tbody>" +
                            "			   <tr>" +
                            "				  <td style='text-align:center'><span class='badge badge-score' style='background-color:#55c331;padding:8px;'>LIVE</span></td>" +
                            "			   </tr>" +
                            "			   <tr>" +
                            "				  <td style='text-align:center;color:#fff;font-size:17px;'>" +
                            "					 <p class='mtitle'><img src='images/football_new.png?12' width='30' height='30'> " + eventName2 + "</p>" +
                            "				  </td>" +
                            "			   </tr>" +
                            "			   <tr>" +
                            "				  <td style='text-align:center;color:#fff;font-size:17px;'>" +
                            "					 <table style='width:100%;border-radius:20px;'>" +
                            "						<thead>" +
                            "						   <tr>" +
                            "							  <th style='text-align:center;font-size:12px;'>&nbsp;</th>" +
                            "							  <th style='text-align:center;font-size:12px;'>&nbsp;</th>" +
                            "							  <th style='text-align:center;font-size:12px;'><span class='badge badge-score' style='background-color:yellow;width:20px;height:20px;'> </span></th>" +
                            "							  <th style='text-align:center;font-size:12px;'><span class='badge badge-score' style='background-color:red;width:20px;height:20px;'> </span></th>" +
                            "							  <th style='text-align:center;font-size:12px;'><img src='images/football_new.png?1' width='15' height='15'></th>" +
                            "							  <th style='text-align:center;font-size:12px;'><img src='images/football_new.png?1' width='15' height='15'></th>" +
                            "						   </tr>" +
                            "						</thead>" +
                            "						<tbody class='text-center'>" +
                            "						   <tr style='background:#ffc722 !important;border-radius:20px;'>" +
                            "							  <td style='text-align:left;font-size:14px;height:30px;padding:5px;color:#000'>" + home_team_name + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_score + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_numberOfYellowCards + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_numberOfRedCards + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + home_team_numberOfCorners + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>0-0</td>" +
                            "						   </tr>" +
                            "						   <tr style='background:#ffc722 !important;border-top:1px solid #000;'>" +
                            "							  <td style='text-align:left;font-size:14px;height:30px;padding:5px;color:#000'>" + away_team_name + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_score + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_numberOfYellowCards + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_numberOfRedCards + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'>" + away_team_numberOfCorners + "</td>" +
                            "							  <td style='text-align:center;font-size:12px;color:#000'></td>" +
                            "						   </tr>" +
                            "					</tbody>" +
                            "					 </table>" +
                            "				  </td>" +
                            "			   </tr>" +
                            "			</tbody>" +
                            "		 </table>" +
                            "	  </div>" +
                            "  </div>" +
                            "</div>";
                        $("#scoreboard-box").html(html_score_card);
                    }

                    <?php
                } else if ($eventType == 2) {
                    ?>

                        if (args.score.home) {
                            if (args.score.home.name) {
                                home_team_name = args.score.home.name;
                                home_team_score = args.score.home.score;
                                home_team_halfTimeScore = args.score.home.halfTimeScore;
                                if (home_team_halfTimeScore == "") {
                                    home_team_halfTimeScore = 0;
                                }


                                home_team_gameSequence = "";
                                home_team_gameSequence2 = "";
                                home_team_gameSequence3 = "";

                                home_gameSequenceLength = args.score.home.gameSequence.length;
                                if (home_gameSequenceLength >= 2) {
                                    home_team_gameSequence = args.score.home.gameSequence[home_gameSequenceLength - 2];
                                    home_team_gameSequence2 = args.score.home.gameSequence[home_gameSequenceLength - 1];
                                    home_team_gameSequence3 = args.score.home.games;
                                } else if (home_gameSequenceLength == 1) {
                                    home_team_gameSequence = args.score.home.gameSequence[home_gameSequenceLength - 1];
                                    home_team_gameSequence2 = args.score.home.games;
                                    home_team_gameSequence3 = "-";
                                } else {
                                    home_team_gameSequence = args.score.home.games;
                                    home_team_gameSequence2 = "-";
                                    home_team_gameSequence3 = "-";
                                }


                                home_team_fullTimeScore = args.score.home.fullTimeScore;
                                home_team_penaltiesScore = args.score.home.penaltiesScore;
                                home_team_sets = args.score.home.sets;
                                home_team_games = args.score.home.games;
                                home_team_isServing = args.score.home.isServing;

                                if (home_team_isServing == true) {
                                    home_team_serving_true = '<span class="serviceon"><img src="images/tennis_ball_1.png" width="20" height="20"></span>';
                                } else {
                                    home_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
                                }



                            }
                        }

                        if (args.score.away) {
                            if (args.score.away.name) {
                                away_team_name = args.score.away.name;

                                away_team_score = args.score.away.score;
                                away_team_halfTimeScore = args.score.away.halfTimeScore;
                                if (away_team_halfTimeScore == "") {
                                    away_team_halfTimeScore = 0;
                                }


                                away_team_gameSequence = "";
                                away_team_gameSequence2 = "";
                                away_team_gameSequence3 = "";

                                away_gameSequenceLength = args.score.away.gameSequence.length;
                                if (away_gameSequenceLength >= 2) {
                                    away_team_gameSequence = args.score.away.gameSequence[away_gameSequenceLength - 2];
                                    away_team_gameSequence2 = args.score.away.gameSequence[away_gameSequenceLength - 1];
                                    away_team_gameSequence3 = args.score.away.games;
                                } else if (away_gameSequenceLength == 1) {
                                    away_team_gameSequence = args.score.away.gameSequence[away_gameSequenceLength - 1];
                                    away_team_gameSequence2 = args.score.away.games;
                                    away_team_gameSequence3 = "-";
                                } else {
                                    away_team_gameSequence = args.score.away.games;
                                    away_team_gameSequence2 = "-";
                                    away_team_gameSequence3 = "-";
                                }


                                away_team_fullTimeScore = args.score.away.fullTimeScore;
                                away_team_penaltiesScore = args.score.away.penaltiesScore;
                                away_team_sets = args.score.away.sets;
                                away_team_games = args.score.away.games;

                                away_team_isServing = args.score.away.isServing;

                                if (away_team_isServing == true) {
                                    away_team_serving_true = '<span class="serviceon"><img src="images/tennis_ball_1.png" width="20" height="20"></span>';
                                } else {
                                    away_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
                                }

                            }
                        }

                        currentSet = "";
                        if (args.currentSet) {
                            currentSet = args.currentSet;
                        }

                        currentGame = "";
                        if (args.currentGame) {
                            currentGame = args.currentGame;
                        }

                        var fullTimeShowMix = "";
                        if (args.fullTimeElapsed) {
                            if (args.fullTimeElapsed.hour && args.fullTimeElapsed.min && args.fullTimeElapsed.sec) {

                                fullTimeHours = args.fullTimeElapsed.hour;
                                fullTimeMin = args.fullTimeElapsed.min;
                                fullTimeSec = args.fullTimeElapsed.sec;

                                fullTimeShowMix = fullTimeHours + ":" + fullTimeMin + ":" + fullTimeSec;

                            }

                        }


                        html_score_card = "<div class='table-container table-responsive'>" +
                            "<div class='' style='width:100%'>" +
                            "  <div class='col-sm-12' style='color:#FFFFFF;' id=''>" +
                            "	 <table style='width:100%'>" +
                            "		<tbody>" +
                            "		   <tr>" +
                            "			  <td style='text-align:center'><span class='badge badge-score' style='background-color:#55c331;padding:8px;'>LIVE</span></td>" +
                            "		   </tr>" +
                            "		   <tr>" +
                            "			  <td style='text-align:center'>" +
                            "				 <table style='width:100%'>" +
                            "					<thead>" +
                            "					   <tr>" +
                            "						  <th></th>" +
                            "						  <th width='16%' style='text-align:center;font-size:12px;'>1</th>" +
                            "						  <th width='16%' style='text-align:center;font-size:12px;'>2</th>" +
                            "						  <th width='16%' style='text-align:center;font-size:12px;'>3</th>" +
                            "						  <th style='text-align:center;font-size:12px;width:16%'>Sets</th>" +
                            "						  <th style='text-align:center;font-size:12px;width:16%'>Points</th>" +
                            "					   </tr>" +
                            "					</thead>" +
                            "				<tbody>" +
                            "					   <tr style='background:#ffc722 !important;color:#000;font-weight:bold;'>" +
                            "						  <td style='text-align:left;font-size:12px;height:40px;padding:5px;'>" + home_team_serving_true + "" + home_team_name + "</td>" +
                            "						  <td width='16%' style='text-align:center;font-size:12px;'>" + home_team_gameSequence + "</td>" +
                            "						  <td width='16%' style='text-align:center;font-size:12px;'>" + home_team_gameSequence2 + "</td>" +
                            "						  <td width='16%' style='text-align:center;font-size:12px;'>" + home_team_gameSequence3 + "</td>" +
                            "						  <td style='text-align:center;font-size:12px;'>" + home_team_sets + "</td>" +
                            "						  <td style='text-align:center;font-size:12px;'>" + home_team_score + "</td>" +
                            "					   </tr>" +
                            "					   <tr style='background:#ffc722 !important;border-top:1px solid #000;color:#000;font-weight:bold;'>" +
                            "						  <td style='text-align:left;font-size:12px;height:40px;padding:5px;'>" + away_team_serving_true + "" + away_team_name + "</td>" +
                            "						  <td width='16%' style='text-align:center;font-size:12px;'>" + away_team_gameSequence + "</td>" +
                            "						  <td width='16%' style='text-align:center;font-size:12px;'>" + away_team_gameSequence2 + "</td>" +
                            "						  <td width='16%' style='text-align:center;font-size:12px;'>" + away_team_gameSequence3 + "</td>" +
                            "						  <td style='text-align:center;font-size:12px;'>" + away_team_sets + "</td>" +
                            "						  <td style='text-align:center;font-size:12px;'>" + away_team_score + "</td>" +
                            "					   </tr>" +
                            "					</tbody>" +
                            "				 </table>" +
                            "			  </td>" +
                            "		   </tr>" +
                            "		</tbody>" +
                            "	 </table>" +
                            " </div>" +
                            "</div>" +
                            "</div>";


                        $("#scoreboard-box").html(html_score_card);


                    <?php
                }
                ?>


            }
        });
    </script>
    <script type="text/javascript">
        var _i = '<?php echo $userdata['Id']; ?>';
        /* var ac = '<?php echo $accounts[$power]; ?>'; */
        var eid = '<?php echo $handler->layout['event_id']; ?>';
        var fancy_bet_data = [];

        function call_fancy_analysis() {
            /*  $.get(MASTER_URL + '/events_analysis3/get_fancy_analysis/' + eid, function (data) { 
                fancy_bet_data = data;
            }); */
        }

        function call_fancy_analysis_new(eid, downline_user_list, self_percentage_array) {
            console.log("self_percentage_array=", self_percentage_array);
            var requestData = {
                downline_user_list: downline_user_list,
                self_percentage_array: self_percentage_array
            };
            $.post(MASTER_URL + '/events_analysis3/get_analysis_fancy/' + eid, requestData, function (data) {


                if (data.results) {
                    $.each(data.results.market_pl, function (index, val) {

                        var id = '#live_match_points_' + val.market_id + '_' + val.market_type;

                        $(id).text(val.pl);
                        if (val.pl > 0)
                            $(id).css('color', 'green');
                        else
                            $(id).css('color', 'red');
                    });
                }
            });
        }

        function call_analysis() {
            $.get(MASTER_URL + '/events_analysis3/get_analysis/' + eid, function (data) {
                $('.live_match_points').text('0').css('color', 'black');

                setTimeout(function () {
                    call_all_function();
                }, 10000);

                if (data.results) {
                    // console.log("data=",data.results);


                    //                var title_html = '<span>' + data.results.event_name + ' -&gt; </span><span>MATCH_ODDS</span>';
                    //                $('#spn_event_title').html(title_html);
                    $.each(data.results.market_pl, function (index, val) {

                        var id = '#live_match_points_' + val.market_id + '_' + val.market_type;
                        if (val.market_type == 'BOOKMAKER_ODDS') {
                            var temp_selectionId = ((val.market_name).split(" ").join('_')).trim();
                            id = '#live_match_points_' + temp_selectionId + '_' + val.market_type;
                        }

                        if (val.market_type == 'BOOKMAKER_TIED_ODDS') {
                            var temp_selectionId = ((val.market_name).split(" ").join('_')).trim();
                            id = '#live_match_points_' + temp_selectionId + '_' + val.market_type;
                        }

                        if (val.market_type == 'BOOKMAKERSMALL_ODDS') {
                            var temp_selectionId = ((val.market_name).split(" ").join('_')).trim();
                            id = '#live_match_points_' + temp_selectionId + '_' + val.market_type;
                        }

                        $(id).text(val.pl);
                        if (val.pl > 0)
                            $(id).css('color', 'green');
                        else
                            $(id).css('color', 'red');
                    });

                    call_fancy_analysis_new(data.results.event_id, data.results.downline_user_list, data.results.self_percentage_array);
                }
            });
        }

        function call_active_bets() {
            $.get(MASTER_URL + '/events_analysis3/get_active_bets/' + eid, function (responce) {
                if (responce) {
                    $('#tbody-active_bets').html(responce.results);
                    $('#matchedCount').html(responce.total);
                }
            });
        }

        function refresh_active_bets_users(fancy) {
            var data = {};
            var btn_id = '#btn-bet_active_all';
            if (fancy !== undefined) {
                data = {
                    fancy: 1
                }
                btn_id = '#btn-fancy_bet_active_all';
            }
            $.get(MASTER_URL + '/events_analysis3/get_active_bets_users/' + eid, data, function (responce) {
                if (responce.inactive == 0) {
                    $(btn_id).attr('data-status', 0);
                    $(btn_id).text('All Deactive');
                } else {
                    $(btn_id).attr('data-status', 1);
                    $(btn_id).text('All Active');
                }
            });
        }

        var xhr_vm;

        function call_view_more_bets() {


            if (xhr_vm && xhr_vm.readyState != 4)
                xhr_vm.abort();
            xhr_vm = $.ajax({
                url: MASTER_URL + '/events_analysis3/view_more_matched/' + eid,
                type: 'POST',
                dataType: 'json',
                data: $('#form-view_more_bets').serialize(),
                success: function (data) {
                    if (data.results) {
                        $('#tbody-view_more_matched').html(data.results);
                        $('.total_bet').text(data.total);
                        $('.total_pl').text(data.amttot);

                        window.original_total_bet = parseInt(data.total) || 0;
                        window.original_total_pl = parseFloat(data.amttot) || 0;

                        $('#modal-view_more').modal('show');
                        $('[data-toggle="tooltip"]').tooltip();
                        bindCheckboxEvents();
                    }
                }
            });
        }

        function bindCheckboxEvents() {

            $(document).off('change', '.bet-checkbox').on('change', '.bet-checkbox', function () {

                let totalBets = 0;
                let totalAmount = 0;

                $('.bet-checkbox:checked').each(function () {
                    let amount = parseFloat($(this).data('wl'));
                    totalAmount += amount;
                    totalBets++;
                });
                if (totalBets == 0) {
                    totalBets = window.original_total_bet;
                }
                if (totalAmount == 0) {
                    totalAmount = window.original_total_pl;
                }

                $('.total_bet').text(totalBets);
                $('.total_pl').text(totalAmount.toFixed(2));
            });
        }

        function update_user_bet_status(status, users) {
            $.post(MASTER_URL + '/events_analysis3/user_bet_status', {
                'status': status,
                users: users,
                event_id: eid
            }, function (responce) {
                refresh_active_bets_users();
                if (responce.status == 1) {
                    // alert(responce.msg);
                    toastr.clear()
                    toastr.success("", responce.msg, {
                        "timeOut": "3000",
                        "iconClass": "toast-success",
                        "positionClass": "toast-top-right",
                        "extendedTImeout": "0"
                    });
                } else {
                    toastr.clear()
                    toastr.warning("", responce.msg, {
                        "timeOut": "3000",
                        "iconClass": "toast-warning",
                        "positionClass": "toast-top-right",
                        "extendedTImeout": "0"
                    });
                }
            });
        }

        function update_user_fancy_bet_status(status, users) {
            $.post(MASTER_URL + '/events_analysis3/user_fancy_bet_status', {
                'status': status,
                users: users,
                event_id: eid
            }, function (responce) {
                refresh_active_bets_users(1);
                if (responce.status == 1) {
                    // alert(responce.msg);
                    toastr.clear()
                    toastr.success("", responce.msg, {
                        "timeOut": "3000",
                        "iconClass": "toast-success",
                        "positionClass": "toast-top-right",
                        "extendedTImeout": "0"
                    });
                } else {
                    toastr.clear()
                    toastr.warning("", responce.msg, {
                        "timeOut": "3000",
                        "iconClass": "toast-warning",
                        "positionClass": "toast-top-right",
                        "extendedTImeout": "0"
                    });
                }
            });
        }

        function call_all_function() {
            call_active_bets();
            call_fancy_analysis();
            call_analysis();

        }

        $(function () {

            <?php
            if ($power != 5 or true) {
                ?>
                /* setTimeout(function (){ */

                call_active_bets();
                call_fancy_analysis();
                call_analysis();
                refresh_active_bets_users();
                refresh_active_bets_users(1);
                /*  },900); */


                /*  setInterval(function (){
                     call_active_bets();
                 },5000);
 
                 setInterval(function (){
                     call_fancy_analysis();
                     call_analysis();
                     refresh_active_bets_users();
                     refresh_active_bets_users(1);
                 },10000); */
                <?php
            }

            ?>


            $('#view_more_bets').on('click', function () {
                call_view_more_bets();
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

            $(document).on('change', 'input[name="search-bettype"]', function () {
                // Show console log for debugging
                console.log("Selected type:", $(this).val());

                // Call your existing function
                call_view_more_bets();
            });

            $('#btn-modal_userwisebetsttus, #btn-modal_userwisefencybetsttus').on('click', function () {
                var id = $(this).attr('id');
                var is_fancy = false;
                if (id == 'btn-modal_userwisefencybetsttus' || id == 'fancy_bet_lock')
                    is_fancy = true;
                $.get(MASTER_URL + '/events_analysis3/getusers_block_data/' + eid, function (responce) {

                    var html = '';
                    $.each(responce.results, function (index, rowdata) {
                        var status = rowdata.status;
                        if (is_fancy)
                            status = rowdata.fstatus;
                        html +=
                            '<tr>' +
                            '    <td>' + (index + 1) + '</td>' +
                            '    <td>' + rowdata.username + '</td>' +
                            '    <td>' +
                            '        <div class="form-check form-check-inline ">' +
                            '            <label class="form-check-label">' +
                            '                <input class="form-check-input check-users_bet_active" value="' + rowdata.username + '" ' + ((status == 0) ? 'checked=""' : '') + ' type="checkbox" name="userArr[]">' +
                            '                <span class="checkmark"></span>' +
                            '            </label>' +
                            '        </div>' +
                            '    </td>' +
                            '</tr>';
                    });
                    if (is_fancy)
                        $('#tbody_fancy_betstatus').html(html);
                    else
                        $('#tbody_betstatus').html(html);
                });
                if (is_fancy)
                    $('#userwisefancy_bet').modal('show');
                else
                    $('#userwisebet').modal('show');
            });
            $('#tbody_betstatus').on('change', '.check-users_bet_active', function () {
                var status = ($(this).prop("checked")) ? 0 : 1;
                update_user_bet_status(status, $(this).val());
            });
            $('#btn-bet_active_all').on('click', function () {
                var status = $(this).attr('data-status');
                update_user_bet_status(status, 'all');
            });
            $('#tbody_fancy_betstatus').on('change', '.check-users_bet_active', function () {
                var status = ($(this).prop("checked")) ? 0 : 1;
                update_user_fancy_bet_status(status, $(this).val());
            });
            $('#btn-fancy_bet_active_all').on('click', function () {
                var status = $(this).attr('data-status');
                update_user_fancy_bet_status(status, 'all');
            });

            $('#modal-btn_userbook').on('click', function () {
                $('#book_title').text("User Book");
                $('#divLoading').addClass('show');
                $.get(MASTER_URL + '/events_analysis3/get_userbook/' + eid + '/MATCH_ODDS', function (data) {
                    $('#user-book').modal('show');
                    $('#divLoading').removeClass('show');
                    $('.userBookContainer').html(data.results);
                });
            });

            $('#modal-btn_userbookmaker').on('click', function () {
                $('#book_title').text("Bookmakers Book");
                $('#divLoading').addClass('show');
                $.get(MASTER_URL + '/events_analysis3/get_userbook/' + eid + '/BOOKMAKER_ODDS', function (data) {
                    $('#user-book').modal('show');
                    $('#divLoading').removeClass('show');
                    $('.userBookContainer').html(data.results);
                });
            });

            $('#modal-btn_max_limit').on('click', function () {
                $('#divLoading').addClass('show');
                $.get(MASTER_URL + '/events_analysis3/max_limit/' + eid + '', function (data) {
                    $('#max-book').modal('show');
                    $('#divLoading').removeClass('show');
                    $('.matchBookContainer').html(data.results);
                });
            });

        });

        function get_down_level_book(event_id, market_type, user_id, $this) {

            if ($($this).attr('data-is_open') == 1) {
                $('#userbook_child_' + user_id).remove();
                $($this).attr('data-is_open', 0);
            } else {
                $.get(MASTER_URL + '/events_analysis3/get_userbook/' + eid + '/' + market_type + '/' + user_id, function (data) {
                    $($this).attr('data-is_open', 1);
                    $('#userbook_child_' + user_id).remove();
                    $('#userbook_level' + user_id).after("<tr id='userbook_child_" + user_id + "'><td colspan='100%'>" + data.results + "</td></tr>");
                });
            }
        }

        function view_book(bid, btype, event_id, market_id) {
            $('#divLoading').addClass('show');
            $.ajax({
                url: MASTER_URL + '/events_analysis3/fancy_bet_book_master/' + event_id + '/' + market_id,
                type: 'POST',
                dataType: 'json',
                data: {},
                success: function (rdata) {

                    html_book = '<table class="table coupon-table table-bordered table-stripted">' +
                        '<tr>' +
                        '    <th width="50%" class="align-C" style="text-align:center;">Runs</th>' +
                        '   <th width="50%" class="border-l" style="text-align:right";>Amount</th>' +
                        '</tr>';

                    for (var i in rdata.data) {
                        runs = rdata.data[i].runs;
                        exposure = rdata.data[i].exposure;
                        if (exposure > 0) {
                            bg_color = '    background-color: #72bbef';
                        } else {
                            bg_color = '    background-color: #faa9ba;';
                        }
                        html_book += '<tr style="' + bg_color + '">' +
                            '    <th width="50%" class="align-C" style="text-align:center;">' + runs + '</th>' +
                            '   <th width="50%" class="border-l" style="text-align:right";>' + exposure + '</th>' +
                            '</tr>';
                    }


                    $('#fancy_book').modal('show');
                    $('#divLoading').removeClass('show');
                    $('.fancyBookContainer').html(html_book);



                }
            });
        }




        var xhr, xhr_gud, xhr_act, xhr_sel, xhr_cs, xhr_cp, xhr_scr;
        /* var _agent_id = '<?php echo $agent_id; ?>'; */
        function set_max_limit() {

            var limit_status = $('#limit_status').val();
            var match_odds_limit = $('#match_odds_limit').val();
            var bookmaker_limit = $('#bookmaker_limit').val();
            var sport_id = $('#sport_id').val();
            var event_id = $('#event_id').val();
            var event_name = $('#event_name_limit').val();
            var oddsmarketId = $('#oddsmarketId').val();
            var matchdate = $('#matchdate').val();

            if (limit_status == "") {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> Select Status.' +
                    '</div>';
                $('#max-book').find('.modal_error').html(error);
                return false;
            }
            var master_password = "";
            /* var master_password = $('#deposit_master_password').val();
            
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                        '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                        '    <strong>Error!</strong> The master password field is required.' +
                        '</div>';
                $('#max-book').find('.modal_error').html(error);
                return false;
            } */

            $('#max-book .btn-submit').attr('disabled', true);
            var data = "&limit_status=" + limit_status + "&match_odds_limit=" + match_odds_limit + "&bookmaker_limit=" + bookmaker_limit + "&sport_id=" + sport_id + "&event_id=" + event_id + "&event_name=" + event_name + "&oddsmarketId=" + oddsmarketId + "&matchdate=" + matchdate + "&master_password=" + master_password;
            if (xhr_act && xhr_act.readyState != 4)
                xhr_act.abort();
            xhr_act = $.ajax({
                url: MASTER_URL + '/events-analysis/set_max_limit',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (rdata) {
                    $('#max-book .btn-submit').attr('disabled', false);
                    // alert(rdata.message);
                    if (rdata.status == 'ok') {
                        toastr.clear()
                        toastr.success("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });

                        setTimeout(function () {
                            $('#max-book').modal('hide');

                        }, 1000);

                    }
                    return false;
                }
            });
            return false;
        }
    </script>

    <div class="modal fade show" id="max-book">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Market Limit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body ">
                    <div class="modal_error"></div>
                    <div class="matchBookContainer">


                        <!--<script src="http://diamondexch999.com/storage/backend/js/mtree.js"></script></div>-->
                    </div>

                    <input type="hidden" name="sport_id" id="sport_id" value="<?php echo $_GET['eventType']; ?>" />
                    <input type="hidden" name="event_id" id="event_id"
                        value="<?php echo $handler->layout['event_id']; ?>" />
                    <input type="hidden" name="event_name_limit" id="event_name_limit" value="" />
                    <input type="hidden" name="matchdate" id="matchdate" value="" />
                    <input type="hidden" name="oddsmarketId" id="oddsmarketId"
                        value="<?php echo $handler->layout['marketId']; ?>" />
                </div>

                <div class="modal-footer pull-right">
                    <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo"
                            aria-hidden="true"></i> Back</button>
                    <button class="btn btn-submit" type="submit" onclick="set_max_limit()"> Submit <i
                            class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                </div>

            </div>
        </div>
    </div>