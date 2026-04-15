<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">
        .video-overlay{
            right: 0;
            left: auto;
        }
        #result-desc {
            top: auto;
            right: auto;
            bottom: 0;
            left: 0;
        }
    </style>
    <div class="listing-grid hv-container casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">INSTANT WORLI</span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div style="position: relative;">
                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL."".INSTANTWORLI_CODE; ?>" style="border:0px"></iframe>
                        <div class="video-overlay">
                            <div>
                                <img id="card_c1" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                <img id="card_c2" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                <img id="card_c3" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                            </div>
                        </div>
                        <div id="result-desc" style="display: none;">550 - 0</div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                    </div>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=worli2" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
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
    var data6;
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "INSTANT_WORLI";
    var back_html = "";
    var lay_html = "";
    var gstatus = "";

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function () {
            socket.emit('Room', 'worli2');
        });
        socket.on('game', function (data) {

            if (data && data['t1'] && data['t1'][0]) {

                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    $('#result-desc').hide();
                }

                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 3) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
                    }

                    if (data.t1[0].C1 != 1 && data.t1[0].C2 != 1 && data.t1[0].C3 != 1) {
                        var c1 = data.t1[0].C1;
                        var c2 = data.t1[0].C2;
                        var c3 = data.t1[0].C3;


                        c1 = c1.replace('A', 1);
                        c2 = c2.replace('A', 1);
                        c3 = c3.replace('A', 1);

                        c1 = (c1.replace(/[^0-9]/g, '')).substr(-1);
                        c2 = (c2.replace(/[^0-9]/g, '')).substr(-1);
                        c3 = (c3.replace(/[^0-9]/g, '')).substr(-1);

                        var c_arr = [c1, c2, c3].sort();

                        var result = ((Number(c1) + Number(c2) + Number(c3)).toString()).substr(-1);

                        var result_html = ' ' + c_arr[0] + '' + c_arr[1] + '' + c_arr[2] + ' - ' + result;
                        $('#result-desc').html(result_html).show();
                    }
                    else {
                        $('#result-desc').html('').hide();
                    }
                }
                clock.setValue(data.t1[0].autotime);

                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);

                    b1 = 9;



                    markettype = "INSTANT_WORLI";

                    $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);

                    $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                    $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);

                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
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



    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;
            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'worli2'";
            data.forEach(function (runData) {

                ab = "playera";
                ab1 = "R";

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
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
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/worli2/' + event_id,
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
            url: MASTER_URL + '/live-market/instant-worli/active_bets/worli2/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/instant-worli/view_more_matched/worli2/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/instant-worli/market-analysis/worli2/' + get_round_no(),
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