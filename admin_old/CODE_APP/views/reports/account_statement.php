<?php
$userdata = $handler->users->data();
?>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: unset;
}

span.account_bets {
    cursor: pointer;
    background: #444;
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 3px;
    margin-right: 3px;
    text-transform: uppercase;
    display: inline-block;
}

a.button.btn.btn-diamond {
    margin: 0 4px 4px 0;
}
</style>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Account Statement</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-report_type">Account Type</label>
                                    <select name="search-report_type" id="search-report_type" class="form-control">
                                        <option value="1">All</option>
                                        <option value="2">Balance Report</option>
                                        <option value="3">Game Report</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-game_name">Game Name</label>
                                    <select name="search-game_name" id="search-game_name" class="form-control">
                                        <option value="all">All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="list-ac">Search By Client Name</label>
                                    <select class="form-control" name="search-client_name" id="search-client_name"
                                        id=""></select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-from_date">From</label>
                                    <input id="search-from_date" class="form-control datepicker1"
                                        name="search-from_date" type="text"
                                        value="<?php echo DATE('Y-m-d', strtotime('-7 day')); ?>"
                                        placeholder="Choose Date" readonly="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="todate">To</label>
                                    <input id="search-to_date" class="form-control datepicker1" name="search-to_date"
                                        type="text" value="<?php echo DATE('Y-m-d', time()); ?>"
                                        placeholder="Choose Date" readonly="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label style="width: 100%">&nbsp</label>
                                <button type="submit" class="btn btn-diamond" id="loaddata">Load</button>
                                <!--<button type="reset" class="btn btn-diamond">View All</button>-->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table id="account_history_table" class="table table-striped table-bordered datatable" style="width:100%">
                <thead>
                    <tr>
                        <th width="15%">Date</th>
                        <th width="10%">Credit</th>
                        <th width="10%">Debit</th>
                        <th width="10%">Closing</th>
                        <th>Description</th>
                        <th width="15%">Fromto</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
            <div class="row m-t-10 m-b-10">
                <div class="col-md-6">
                </div>
                <div class="col-md-6" id="pagination"></div>
            </div>
        </div>
    </div>

    <div id="modal_ac_more_details" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Client Ledger (Total Win Loss : <span id="total_pl"></span>) (Total Count :
                        <span id="total_count"></span>) (Total Soda : <span id="total_bet"></span>)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row row5">
                        <div class="col-12">
                            <div id="match_all" role="radiogroup" tabindex="-1">
                                <div class="custom-control custom-control-inline custom-radio">
                                    <input id="all" type="radio" name="match_all" autocomplete="off" value="0"
                                        class="custom-control-input" checked>
                                    <label for="all" class="custom-control-label"><span>All</span></label>
                                </div>
                                <div class="custom-control custom-control-inline custom-radio">
                                    <input id="matched" type="radio" name="match_all" autocomplete="off" value="1"
                                        class="custom-control-input">
                                    <label for="matched" class="custom-control-label"><span>Matched</span></label>
                                </div>
                                <div class="custom-control custom-control-inline custom-radio">
                                    <input id="deleteed" type="radio" name="match_all" autocomplete="off" value="2"
                                        class="custom-control-input">
                                    <label for="deleteed" class="custom-control-label"><span>Deleted</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table">
                            <thead>
                                <tr>
                                    <td>Uplevel</td>
                                    <td>Uername</td>
                                    <td>Nation</td>
                                    <td>UserRate</td>
                                    <td>Amount</td>
                                    <td>Win/Loss</td>
                                    <td>PlaceDate</td>
                                    <td>MatchDate</td>
                                    <td>Ip</td>
                                    <td>BrowsersDetails</td>
                                </tr>
                            </thead>
                            <tbody id="ac_more_details_tbody"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="ReportMatchbetModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="ReportMatchbetHeading">Client Ledger</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <form>
                                    <input type="hidden" value="" id="marketidgamereport">
                                    <div class="account-radio">
                                        <input type="radio" value="all" name="cnt-lgr" id="cnt-lgr1"
                                            class="clientledger" checked><label for="cnt-lgr1">All</label>
                                        <input type="radio" value="matched" name="cnt-lgr" id="cnt-lgr2"
                                            class="clientledger"><label for="cnt-lgr2">Matched</label>
                                        <input type="radio" value="deleted" name="cnt-lgr" id="cnt-lgr3"
                                            class="clientledger"><label for="cnt-lgr3">Deleted</label>
                                    </div>
                                </form>
                            </div>
                            <table id="ReportMatchbettable" class="table table-bordered" border="0" cellpadding="0"
                                cellspacing="0">
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>
<?php
$SPORTS = array(
    '4' => 'Cricket',
    '1' => 'Soccer',
    '2' => 'Tennis',
    'ODITEENPATTI' => '1 Day Teenpatti',
    'TESTTEENPATTI' => 'Test Teenpatti',
    '2020TEENPATTI' => '20-20 Teenpatti',
    'OPENTEENPATTI'    => 'Open Teenpatti',
    'LUCKY7' =>    'Lucky 7 - A',
    'LUCKY7B' =>    'Lucky 7 - B',
    'ODI_POKER'    =>    '1 Day Poker',
    '2020_POKER' =>    '20-20 Poker',
    '6_PLAYER_POKER' => '6 Player Poker',
    'ODI_DRAGON_TIGER'    =>    '1 Day Dragon Tiger',
    '2020_DRAGON_TIGER'    =>    '20-20 Dragon Tiger',
    '2020_DRAGON_TIGER2' =>    '20-20 Dragon Tiger - 2',
    'DTL20' => 'DTL 20',
    'BACCARAT' => 'BACCARAT',
    'BACCARAT2' => 'BACCARAT 2',
    'AB20' => 'Andar Bahar Casino',
    '3_CARD_J' => '3 Cards Judgement',
    '32CARDS' => '32 Cards - A',
    '32CARDSB' => '32 Cards - B',
    '2020_CRICKET_MATCH' => '2020 Cricket Casino',
    'CASINO_METER' => 'Casino Meter',
    'CASINO_WAR' => 'War',
    'INSTANT_WORLI' => 'Instant Worli',
    'AMAR_AKBAR_ANTHONY' => 'Amar Akbar Anthony',
    'B_TABLE' => 'Bollywood Table'
);

$sports_option = '';
foreach (unserialize(GAME_LIST) as $key => $value) {
    $sports_option .= '<option value="' . strtoupper($key) . '">' . $value . '</option>';
}
?>

<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript">
    var gameList = JSON.parse('<?php echo json_encode(unserialize(GAME_LIST)); ?>');
var xhr, xhr_ac_details;
var _user_id = 0;
var id;
var game_type;
var event_type;
var market_type;
var market_id;
var client_name;
$("#account_history_table").DataTable();
$('.dataTables_filter input').addClass('form-control');

function set_search_single(field_name, field_val) {
    if ($.trim(field_name) != "" && $.trim(field_val) != "") {
        return ("&" + $.trim(field_name) + "=" + (encodeURIComponent($.trim(field_val))));
    } else {
        return "";
    }
}

function preparesearch() {
    var search_string = "";
    search_string += set_search_single("from_date", $('#search-from_date').val());
    search_string += set_search_single("to_date", $('#search-to_date').val());
    search_string += set_search_single("client_name", $('#search-client_name').val());
    search_string += set_search_single("event_type", $('#search-event_type').val());
    search_string += set_search_single("report_type", $('#search-report_type').val());
    search_string += set_search_single("game_name", $('#search-game_name').val());
    return search_string;
}


function call_page() {

    $("#account_history_table").html('');
    $('#divLoading').addClass('show');

    $("#account_history_table").DataTable().destroy();

    var i = 1;
    var total_amt1 = true;
    var total_amt = 0;
    $('#account_history_table').DataTable({
        "ajax": {
            "url": MASTER_URL + '/reports/account_statement/get_account_statement',
            "type": "POST",
            "data": {
                from_date: $('#search-from_date').val(),
                to_date: $('#search-to_date').val(),
                client_name: $('#search-client_name').val(),
                event_type: $('#search-event_type').val(),
                report_type: $('#search-report_type').val(),
                game_name: $('#search-game_name').val()
            },
            "dataSrc": ""
        },
        "columns": [{
                "className": "text-center",
                "data": function(data) {
                    /* return data.edt.slice(0, -9); */
                    return data.edt;
                }
            },
            {
                "className": "text-right",
                "data": function(data) {

                    var cr_amt = (data.amount >= 0) ? data.amount : 0;
                    return (Number(cr_amt)).toFixed(2);
                }
            },
            {
                "className": "text-right",
                "data": function(data) {

                    var dr_amt = (data.amount >= 0) ? 0 : data.amount;
                    return (Number(dr_amt)).toFixed(2);
                }
            },
            {
                "className": "text-right",
                "data": function(data) {



                    total_amt += Number(data.amount);
                    console.log("data=", data);
                    return total_amt.toFixed(2);
                }
            },
            {
                "className": " td-account_bets",
                "data": function(data) {
                    if (data.bid == 0 || data.remark == 'Opening') {
                        return data.remark;
                    } else {
                         var return_Data=data.event_name;
                         return_Data = return_Data.toLowerCase();
                            if (return_Data in gameList) {
                                return_Data=gameList[return_Data]
                            }
                        var remark = return_Data + ' Rno. ' + data.event_id + '/' + data
                            .market_type + '-' + data.market_name;

                        if (['FANCY_ODDS', 'METER_ODDS', 'KHADO_ODDS'].includes(data.market_type)) {
                            remark = data.market_name + '/' + (data.market_type.replace('_ODDS', '')) +
                                '-' + data.result;
                        }

                        /* if(data.remark.length > 65){
                            remark = remark.slice(0, 65)+'..';
                        } */

                        var sportName = '';
                        if (data.type == 4)
                            sportName = 'CRICKET/';
                        else if (data.type == 1)
                            sportName = 'FOOTBALL/';
                        else if (data.type == 2)
                            sportName = 'TENNIS/';
                        else if (data.type == 8)
                            sportName = 'ELECTION/';
                        return '<span data-id="' + data.event_id + '" data-game_type="' + data
                            .game_type + '" data-event_type="' + data.type + '" data-market_id="' + data
                            .market_id + '" data-market_type="' + data.market_type +
                            '" class="account_bets">' + sportName + remark + '</span>';
                    }
                }
            },
            {
                "className": "text-left",
                "data": function(data) {
                    if (data.bid == 0) {
                        return (data.from_user + '/' + data.to_user);
                    } else {
                        return '';
                    }
                }
            }
        ],
        "ordering": false,
        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
        "pageLength": 50,
        "initComplete": function() {
            total_amt = 0;
            $('#divLoading').removeClass('show');
        },
        dom: 'Bfrtip',
        buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Account Statement',
                    filename: 'Account Statement',
                    action: function (e, dt, node, config) {
                        // Reset total_amt before exporting Excel
                        total_amt = 0;
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Account Statement',
                    filename: 'Account Statement', 
                    action: function (e, dt, node, config) {
                        // Reset total_amt before exporting PDF
                        total_amt = 0;
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
                    }
                }
            ], 
        "drawCallback": function() {
            $('.dataTables_paginate > a,.dataTables_paginate span a').addClass('button btn btn-diamond')
                .removeClass('paginate_button');
            //                $('.dataTables_paginate > a,.dataTables_paginate span a.current').addClass('disabled');
        },
        "pagingType": "full_numbers"
    });

    $('.dataTables_filter input').addClass('form-control');

}

$(document).ready(function() {

    $('#search-client_name').select2({
        allowClear: true,
        minimumInputLength: 3,
        placeholder: '',
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

    $(".datepicker1").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        endDate: '+0d',
    });
    //        call_page();
    $('#pagination').delegate('a', 'click', function() {
        var page = $(this).attr('href').split('/');
        if ($.trim(page) != '') {
            page = page[page.length - 1];
            //                if (isNaN(page))
            //                    page = 0;
            call_page(page);
        }
        return false;
    });

    $('#form-search').on('submit', function() {
        call_page(0);
        return false;
    });

    $('#form-search').on('reset', function() {
        $('#search-client_name').html('');
        $('#search-from_date').val('');
        $('#search-to_date').val('');
        setTimeout(function() {
            call_page(0);
        }, 1);
    });

    $('#common_search').on('keyup', function() {
        call_page();
    });

    $('#account_history_table').on('click', '.account_bets', function() {

        $('#divLoading').addClass('show');

        id = $(this).attr('data-id');
        game_type = $(this).attr('data-game_type');
        event_type = $(this).attr('data-event_type');
        market_type = $(this).attr('data-market_type');
        market_id = $(this).attr('data-market_id');
        client_name = $('#search-client_name').val();

        $('input[name=match_all][value=0]').prop('checked', true);

        view_bets(0);
        return false;
    });

    $('#btn-export_to_excel').on('click', function() {
        window.location = MASTER_URL + '/reports/account_statement/export_to_excel/?' + preparesearch();
        return false;
    });

    $('#search-report_type').on('change', function() {

        var report_type = $(this).val();

        var html_option = '<option value="all">All</option>';

        if (report_type == 2) {
            html_option += '<option value="upper">Upper</option>';
            html_option += '<option value="down">Down</option>';
        }
        if (report_type == 3) {
            html_option += '<?php echo $sports_option; ?>';
        }

        $('#search-game_name').html(html_option);

    });
});

$('input[type=radio][name=match_all]').change(function() {
    view_bets(this.value);
});

function view_bets(bet_type) {

    $.ajax({
        url: MASTER_URL + '/reports/account_statement/get_bets',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            type: game_type,
            event_type: event_type,
            market_type: market_type,
            market_id: market_id,
            client_name: client_name,
            bet_type: bet_type
        },
        success: function(data) {
            if (data.status) {
                var html = '';
                if (data.result.length > 0) {

                    var totalpl = 0;
                    for (var i in data.result) {
                        var bet_data = data.result[i];
                        var tr_class = 'lay';
                        if (bet_data['side'] == 'Yes' || bet_data['side'] == 'Back')
                            tr_class = 'back';

                        var odds = bet_data['rate'];
                        var runs = bet_data['runs'];
                        var market_name = bet_data['nation'];

                        if (Number(runs) > 0) {
                            market_name += ' / ' + odds;
                            odds = runs;
                        }

                        var pl_span_class = 'red';
                        if (bet_data['wl'] > 0)
                            pl_span_class = 'green';


                        totalpl += Number(bet_data['wl']);

                        var level_arr = [bet_data['dl_name'], bet_data['mdl_name'], bet_data['smdl_name']];

                        var prt_unique = [...new Set(level_arr)];
                        var uplevel_text = prt_unique[0];

                        var user_agent = (bet_data['user_agent']) ? bet_data['user_agent'] : bet_data[
                            'ip_address'];

                        var bet_wl = Number(bet_data['wl']);
                        var bet_amount = Number(bet_data['amount']);

                        html += '<tr class="' + tr_class + '">';
                        html += '   <td class="text-left">' + uplevel_text + '</td>';
                        html += '   <td class="text-left">' + bet_data['cl_name'] + '</td>';
                        html += '   <td class="text-left">' + market_name + '</td>';
                        html += '   <td class="text-left">' + odds + '</td>';
                        html += '   <td class="text-left">' + bet_amount + '</td>';
                        html += '   <td class="text-right"> <span style="color: ' + pl_span_class + '">' +
                            bet_wl + '</span> </td>';
                        html += '   <td class="text-left">' + bet_data['date'] + '</td>';
                        html += '   <td class="text-left">' + bet_data['date'] + '</td>';
                        html += '   <td class="text-left">' + bet_data['ip_address'] + '</td>';
                        html +=
                            '   <td><a href="#" data-toggle="tooltip" data-placement="top" class="text-secondary" title="" data-original-title="' +
                            user_agent + '">Detail</a></td>';
                        html += '</tr>';
                    }
                }
                $('#ac_more_details_tbody').html(html);
                $('#modal_ac_more_details').modal('show');
                $('[data-toggle="tooltip"]').tooltip();
                $('#divLoading').removeClass('show');

                var mypl = (totalpl > 0) ? (0 - totalpl) : (Math.abs(totalpl));

                const arrayClinets = data.result.map(x => x['cl_name']);
                var prt_unique_clinets = [...new Set(arrayClinets)];
                $('#total_pl').text(mypl);
                $('#total_bet').text(data.result.length);
                $('#total_count').text(prt_unique_clinets.length);

            }
        }
    });
}
</script>
<style>
.custom-control-inline {
    align-items: center;
}
</style>