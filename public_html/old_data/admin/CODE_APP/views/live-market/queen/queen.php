<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<style type="text/css">
    .new-casino.race .card-content {
        background-color: #eee;
        padding: 10px;
    }

    .new-casino .casino-odds-box-wrapper {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .new-casino .casino-odds-box-container {
        width: calc(25% - 8px);
        margin-right: 8px;
        margin-bottom: 15px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .new-casino .casino-odds-box-bhav {
        text-align: center;
        position: relative;
        font-size: 14px;
        color: #333;
        width: 100%;
    }

    .new-casino .range-icon {
        margin-left: 5px;
        display: inline-block;
        vertical-align: middle;
    }

    .new-casino .icon-range {
        position: absolute;
        top: 100%;
        background-color: #333;
        padding: 4px;
        max-width: 100%;
        word-wrap: break-word;
        font-size: 12px;
        z-index: 10;
        right: 0;
        transition: 0.1s;
        text-transform: capitalize;
        color: #fff;
    }

    .new-casino .casino-odds-box {
        padding: 4px;
        text-align: center;
        margin-top: 5px;
        cursor: pointer;
        height: 48px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .suspended {
        position: relative;
    }

    .new-casino.race .suspended:after {
        width: 100%;
    }

    .casino-grid .suspended:after {
        font-family: "Font Awesome 5 Free";
        content: "\f023";
        font-weight: 900;
        font-size: 16px;
        color: #fff;
    }

    .suspended:after {
        position: absolute;
        content: attr(data-title);
        top: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #ff0000;
        width: 510px;
        height: 100%;
        font-size: 20px;
        /* text-transform: uppercase; */
        cursor: not-allowed;
        align-items: center;
        display: flex;
        display: -ms-flex;
        display: -webkit-flex;
        justify-content: center;
    }

    .new-casino .casino-odds-box>div {
        width: 49%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100%;
    }

    .new-casino .back-border {
        border: 2px solid #72bbef;
    }

    .new-casino .casino-odds-box .casino-odds-box-odd {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 3px;
        text-transform: uppercase;
    }

    .new-casino .casino-odds-box span {
        display: block;
        font-size: 12px;
        width: 100%;
    }

    .new-casino .lay-border {
        border: 2px solid #f994ba;
    }

    .casino-odds-book {
        text-align: center;
        font-size: 14px;
        color: #333;
        width: 100%;
        font-weight: bold;
        margin-top: 5px;
    }

    .new-casino.race .casino-odds-box-container-extra {
        width: 100%;
    }

    .new-casino .casino-yn {
        display: flex;
        width: 100%;
    }

    .new-casino .casino-yn>div {
        width: 33.33% !important;
        margin-right: 1%;
    }

    .new-casino .casino-yn .casino-odds-box-bhav {
        flex-direction: row;
    }

    .new-casino .casino-yn+.casino-odds-book {
        width: 66.66%;
        margin-left: auto;
    }

    .new-casino .casino-video-title {
        position: absolute;
        left: 5px;
        top: 5px;
        background-color: rgba(0, 0, 0, 0.8);
        padding: 10px;
        z-index: 10;
        text-align: center;
        min-width: 220px;
        display: flex;
        display: -webkit-flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .new-casino .casino-video-title .casino-name {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
        color: #FDCF13;
        line-height: 22px;
        padding: 0;
        background: transparent;
        position: unset;
        width: auto;
    }

    .new-casino .casino-video-rid {
        font-weight: bold;
        color: #ddd;
        margin-top: 3px;
    }

    .new-casino.race .total-points {
        display: flex;
        margin-top: 10px;
    }

    .new-casino.race .total-points>div {
        padding: 5px;
        margin-right: 5px;
        border: 1px solid #FDCF13;
        color: #fff;
    }

    .new-casino.race .video-overlay {
        width: 297px;
        top: 50%;
        transform: translateY(-30%);
    }

    .new-casino.race .video-overlay>div {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .new-casino.race .video-overlay span {
        min-height: 44px;
    }

    .new-casino.race .video-overlay img {
        margin-left: 3px;
        margin-right: 3px;
    }

    .last-result.playersuit {
        background-color: #d5d5d5;
        border: 1px solid #626262;
        line-height: 27px;
    }

    .last-result {
        cursor: pointer;
        margin-left: 2px;
    }

    .last-result.playersuit img {
        height: 26px;
    }

    .race-modal .race-result-box {
        width: 386px;
        position: relative;
        z-index: 10;
    }

    .race-modal img {
        width: 50px;
        margin-left: 2px;
        margin-right: 2px;
    }

    .p-r {
        position: relative;
    }

    .race-modal .result-image.k-image {
        position: absolute;
        right: -60px;
    }

    .winner-icon {
        position: absolute;
        right: 0;
        bottom: 15%;
    }

    .winner-icon i {
        font-size: 26px;
        box-shadow: 0 0 0 var(--secondary-bg);
        -webkit-animation: winnerbox 2s infinite;
        animation: winnerbox 1.5s infinite;
        border-radius: 50%;
        color: #169733;
    }

    .race-modal .winner-icon {
        right: -110px;
        top: 0;
        bottom: unset;
    }

    .race-modal .video-winner-text {
        color: #000;
        position: absolute;
        right: -3px;
        top: 0;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        height: calc(100% - 5px);
        font-size: 30px;
        width: 55px;
        border: 1px solid yellow;
        padding: 20px;
        z-index: -1;
        background-color: #efeded;
    }

    .result-image img,
    .player-type img,
    .sixplayer-image img,
    .andar-bahar-image {
        width: 50px;
    }
</style>
<div class="col-md-12 main-container">
    <div class="listing-grid cardj3 casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content new-casino race">
                <div class="coupon-card">
                    <div style="position: relative;">
                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL . "" . QUEEN_CODE; ?>" style="border:0px"></iframe>
                        <div class="casino-video-title">
                            <span class="casino-name">Queen</span>
                            <div class="casino-video-rid">Round ID: <span id="round-id" class="round_no"></span></div>
                        </div>
                        <div class="video-overlay">
                            <div>
                                <div class="videoCards">
                                    <div>
                                        <p class="m-b-0 text-white"><b><span class="" id="player_1_value">Total 0</span>
                                                :
                                                <span class="text-warning" id="card_1_value">0</span></b>
                                        </p>
                                        <div>
                                            <img id="cards_0" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_4" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_8" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_12" style="display:none;" src="storage/front/img/cards/1.png">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-b-0 text-white"><b><span class="" id="player_2_value">Total 1</span>
                                                :
                                                <span class="text-warning" id="card_2_value">1</span></b>
                                        </p>
                                        <div>
                                            <img id="cards_1" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_5" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_9" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_13" style="display:none;" src="storage/front/img/cards/1.png">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-b-0 text-white"><b><span class="" id="player_3_value">Total 2</span>
                                                :
                                                <span class="text-warning" id="card_3_value">2</span></b>
                                        </p>
                                        <div>
                                            <img id="cards_2" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_6" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_10" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_14" style="display:none;" src="storage/front/img/cards/1.png">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-b-0 text-white"><b><span class="" id="player_4_value">Total 3</span>
                                                :
                                                <span class="text-warning" id="card_4_value">3</span></b>
                                        </p>
                                        <div>
                                            <img id="cards_3" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_7" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_11" style="display:none;" src="storage/front/img/cards/1.png">
                                            <img id="cards_15" style="display:none;" src="storage/front/img/cards/1.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div class="card-content redqueen m-t-10">
                        <div class="casino-odds-box-wrapper">
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav"><b>Total 0</b></div>
                                <div class="casino-odds-box suspended market_1_row">
                                    <div class="back-border market_1_b_btn back-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                    <div class="lay-border market_1_l_btn lay-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                </div>
                                <span style="color: black;" class="market_1_b_exposure market_exposure">0</span>
                            </div>
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav"><b>Total 1</b></div>
                                <div class="casino-odds-box suspended market_2_row">
                                    <div class="back-border market_2_b_btn back-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                    <div class="lay-border market_2_l_btn lay-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                </div>
                                <span style="color: black;" class="market_2_b_exposure market_exposure">0</span>
                            </div>
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav"><b>Total 2</b></div>
                                <div class="casino-odds-box suspended market_3_row">
                                    <div class="back-border market_3_b_btn back-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                    <div class="lay-border market_3_l_btn lay-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                </div>
                                <span style="color: black;" class="market_3_b_exposure market_exposure">0</span>
                            </div>
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav"><b>Total 3</b></div>
                                <div class="casino-odds-box suspended market_4_row">
                                    <div class="back-border market_4_b_btn back-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                    <div class="lay-border market_4_l_btn lay-1"><span class="casino-odds-box-odd">0</span> <span>0</span></div>
                                </div>
                                <span style="color: black;" class="market_4_b_exposure market_exposure">0</span>
                            </div>
                        </div>
                        <div class="min-max text-right">Min: <span>100</span>
                            | Max: <span>100000</span>
                        </div>
                    </div>
                    <marquee scrollamount="3" id="mar" class="casino-remark m-b-10">
                        This is 21 cards game 2,3,4,5,6 x 4 =20 and 1 Queen. Minimum total 10 or queen is required to win.
                    </marquee>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=queen" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="ball-by-ball row m-t-10"></p>
                        <p id="last-result" class="text-right"></p>
                        <p></p>
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
                        <img src="../../../storage/front/img/rules/race20.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog" style="max-width: 60%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Queen Result</h4>
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
    var markettype = "QUEEN";
    var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'queen');
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
                    if (data.t1[0].desc) {
                        cards_img = data.t1[0].desc;
                        cards_img = cards_img.split(",");

                        card_value_1 = 0;
                        card_value_2 = 1;
                        card_value_3 = 2;
                        card_value_4 = 3;

                        for (var i in cards_img) {
                            if (cards_img[i] && cards_img[i] != 1) {
                                get_rank = getType(cards_img[i]);
                                get_rank = get_rank['rank'];
                                if (i == 0 || i == 4 || i == 8 || i == 12) {
                                    card_value_1 += get_rank;
                                } else if (i == 1 || i == 5 || i == 9 || i == 13) {
                                    card_value_2 += get_rank;
                                } else if (i == 2 || i == 6 || i == 10 || i == 14) {
                                    card_value_3 += get_rank;
                                } else if (i == 3 || i == 7 || i == 11 || i == 15) {
                                    card_value_4 += get_rank;
                                }


                                $("#cards_" + i).attr("src", site_url + "storage/front/img/cards/" + cards_img[i] + ".png");
                                $("#cards_" + i).show();
                            }
                        }
                        $("#card_1_value").text(card_value_1);
                        $("#card_2_value").text(card_value_2);
                        $("#card_3_value").text(card_value_3);
                        $("#card_4_value").text(card_value_4);
                        if (card_value_1 > card_value_2 && card_value_1 > card_value_3 && card_value_1 > card_value_4) {
                            $("#player_2_value").removeClass("text-success");
                            $("#player_3_value").removeClass("text-success");
                            $("#player_4_value").removeClass("text-success");
                            $("#player_1_value").addClass("text-success");
                        }

                        if (card_value_2 > card_value_1 && card_value_2 > card_value_3 && card_value_2 > card_value_4) {
                            $("#player_3_value").removeClass("text-success");
                            $("#player_4_value").removeClass("text-success");
                            $("#player_1_value").removeClass("text-success");
                            $("#player_2_value").addClass("text-success");
                        }

                        if (card_value_3 > card_value_1 && card_value_3 > card_value_2 && card_value_3 > card_value_4) {
                            $("#player_4_value").removeClass("text-success");
                            $("#player_1_value").removeClass("text-success");
                            $("#player_2_value").removeClass("text-success");
                            $("#player_3_value").addClass("text-success");
                        }

                        if (card_value_4 > card_value_1 && card_value_4 > card_value_2 && card_value_4 > card_value_3) {
                            $("#player_1_value").removeClass("text-success");
                            $("#player_2_value").removeClass("text-success");
                            $("#player_3_value").removeClass("text-success");
                            $("#player_4_value").addClass("text-success");
                        }


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
                    l1 = data['t2'][j].l1;
                    ls1 = data['t2'][j].ls1;

                    b11 = b1;
                    markettype = "QUEEN";




                    back_html = '<span class="casino-odds-box-odd market_' + selectionid + '_b_value">' + b1 + '</span> <span>' + bs1 + '</span>';


                    $(".market_" + selectionid + "_b_btn").html(back_html);

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


                    lay_html = '<span class="casino-odds-box-odd market_' + selectionid + '_l_value">' + l1 + '</span> <span>' + ls1 + '</span>';


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
                    $(".market_" + selectionid + "_l_btn").html(lay_html);

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


    function updateResult(data) {


        if (data && data[0]) {
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;

            }

            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'queen'";
            data.forEach((runData) => {
                if (parseInt(runData.result) == 1) {
                    ab = "playerb";
                    ab1 = "0";

                } else if (parseInt(runData.result) == 2) {
                    ab = "playerb";
                    ab1 = "1";

                } else if (parseInt(runData.result) == 3) {
                    ab = "playerb";
                    ab1 = "2";

                } else {
                    ab = "playerb";
                    ab1 = "3";
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

        $("#player_1_value").removeClass("text-success");
        $("#player_2_value").removeClass("text-success");
        $("#player_3_value").removeClass("text-success");
        $("#player_4_value").removeClass("text-success");
        $("#card_1_value").text("0");
        $("#card_2_value").text("1");
        $("#card_3_value").text("2");
        $("#card_4_value").text("3");
        for (i = 0; i <= 15; i++) {
            $("#cards_" + i).hide();
            $("#cards_" + i).attr("storage/front/img/cards/1.png");
        }
    }
    teenpatti("ok");
</script>
<script>
    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/queen/' + event_id,
            dataType: 'json',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
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
        }
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/live-market/queen/active_bets/queen/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/queen/view_more_matched/queen/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/queen/market_analysis/queen/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.results == 0) {
                    $('.market_exposure').text(0).css('color', 'black');
                }
                $.each(data.results, function(index, value) {
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