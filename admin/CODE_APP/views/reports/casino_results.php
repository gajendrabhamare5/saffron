<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css"
    href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.theme.default.css">
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

.cricket20ballresult {
    position: relative;
    width: auto;
    left: unset;
    top: unset;
    margin: 0;
    display: inline-block;
}

.cricket20ballresult span {
    position: absolute;
    transform: translate(-50%, -50%);
    text-transform: uppercase;
    top: unset;
    left: 58%;
    color: #000;
    font-weight: bold;
    bottom: -10px;
    font-size: 15px;
    width: 60%;
    height: 40px;
    display: flex;
    align-items: center;
    bottom: -10px;
    justify-content: center;
}

.result-image {
    text-align: center !important;
}

.result-image span {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 32px;
}
/* .winner-icon {
    position: relative !important;
    right: 102px !important;
    top: -59px !important;
} */
 table.dataTable tbody td {
    padding: 8px 10px;
    height: 40px;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 10px 18px;
    border-bottom: 1px solid #111;
    height: 40px !important;
}
.mx-icon-calendar, .mx-icon-clear{
    position: absolute;
    top: 60%;
    right: 8px;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    font-size: 16px;
    line-height: 1;
    color: rgba(0, 0, 0, 0.5);
    vertical-align: middle;
}
</style>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Casino Result Report</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="mx-input-wrapper">
                                        <input type="text" name="search-date" id="search-date" class="form-control"
                                            value="<?php echo DATE('Y-m-d'); ?>" readonly="" />
                                            <i class="mx-icon-calendar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" width="1em" height="1em"><path d="M940.218182 107.054545h-209.454546V46.545455h-65.163636v60.50909H363.054545V46.545455H297.890909v60.50909H83.781818c-18.618182 0-32.581818 13.963636-32.581818 32.581819v805.236363c0 18.618182 13.963636 32.581818 32.581818 32.581818h861.090909c18.618182 0 32.581818-13.963636 32.581818-32.581818V139.636364c-4.654545-18.618182-18.618182-32.581818-37.236363-32.581819zM297.890909 172.218182V232.727273h65.163636V172.218182h307.2V232.727273h65.163637V172.218182h176.872727v204.8H116.363636V172.218182h181.527273zM116.363636 912.290909V442.181818h795.927273v470.109091H116.363636z"></path></svg></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="search-type" id="search-type" class="form-control">
                                        <option value="teen">1 Day Teenpatti</option>
                                        <option value="teen9">Test Teenpatti</option>
                                        <option value="teen20">20-20 Teenpatti</option>
                                        <option value="teen8">Open Teenpatti</option>
                                        <option value="poker">1 Day Poker</option>
                                        <option value="poker20">20-20 Poker</option>
                                        <option value="poker6">6 Player Poker</option>
                                        <option value="ab20">Andar Bahar</option>
                                        <option value="abj">Andar Bahar 2</option>
                                        <option value="3cardj">3 Card Judgement</option>
                                        <option value="card32">32 Cards - A</option>
                                        <option value="card32eu">32 Cards - B</option>
                                        <option value="worli">Worli Matka</option>
                                        <option value="worli2">Instant Worli Matka</option>
                                        <option value="lucky7">Lucky 7 - A</option>
                                        <option value="lucky7eu">Lucky 7 - B</option>
                                        <option value="dt20">20-20 Dragon Tiger</option>
                                        <option value="dt202">20-20 Dragon Tiger 2</option>
                                        <option value="dt6">1-Day Dragon Tiger</option>
                                        <option value="aaa">Amar Akbar Anthoni</option>
                                        <option value="aaa2">Amar Akbar Anthoni2</option>
                                        <option value="btable">Bollywood Casino</option>
                                        <option value="war">War</option>
                                        <option value="dtl20">20-20 Dragon Tiger Lion</option>


                                        <option value="cmeter">
                                            Casino Meter</option>

                                        <option value="cmatch20">
                                            Cricket Casino 20-20</option>

                                        <option value="baccarat">
                                            Baccarat</option>

                                        <option value="baccarat2">
                                            Baccarat 2</option>

                                        <option value="race20">
                                            Race 20-20</option>

                                        <option value="queen">
                                            Queen</option>

                                        <option value="cricketv3">
                                            Five Cricket</option>

                                        <option value="superover">
                                            Super Over</option>
                                        <option value="ballbyball">
                                            Ball By Ball</option>
                                        <option value="goal">
                                            Goal</option>
                                        <option value="lucky15">
                                            Lucky15</option>
                                        <option value="superover3">
                                            Mini Super Over</option>
                                        <option value="superover2">
                                            Super Over 2</option>
                                        <option value="lucky7eu2">
                                            Lucky 7 - C</option>
                                        <option value="teen41">
                                            Queen Top Open Teenpatti</option>
                                        <option value="teen42">
                                            Jack Top Open Teenpatti</option>
                                        <option value="teen6">
                                            Teenpatti - 2.0</option>
                                        <option value="teen33">
                                            Instant Teenpatti 3.0</option>
                                        <option value="teen3">
                                            Instant Teenpatti</option>
                                        <option value="teen32">
                                            Instant Teenpatti 2.0</option>
                                        <option value="sicbo2">
                                            Sic Bo 2</option>
                                        <option value="sicbo">
                                            Sic Bo</option>
                                        <option value="lottcard">
                                            Lottery</option>
                                        <option value="trap">
                                            The Trap</option>
                                        <option value="patti2">
                                            2 Cards Teenpatti</option>
                                        <option value="teensin">
                                            29Card Baccarat</option>
                                        <option value="teenmuf">
                                            Muflis Teenpatti</option>
                                        <option value="race17"> Race17</option>

                                        <option value="teen20b"> 20-20 Teenpatti B</option>
                                        <option value="trio">TRIO</option>
                                        <option value="notenum"> Note Number</option>
                                        <option value="kbc"> KBC</option>
                                        <option value="teen120"> 1 CARD 20-20</option>
                                        <option value="teen1"> 1 CARD ONE-DAY</option>
                                        <option value="race2"> Race to 2nd</option>
                                        <option value="dum10"> Dus ka Dum</option>
                                        <option value="teen20c">20-20 Teenpatti C</option>
                                        <option value="cmeter1">1 Card Meter</option>
                                        <option value="teenjoker">Teenpatti Joker</option>
                                        <option value="btable2">Bollywood Casino 2</option>
                                        <option value="ab3">ANDAR BAHAR 50 CARDS</option>


                                        <!--<option value="war">War</option>
                                        <option value="teenOdi">1 Day Teenpatti</option>
                                        <option value="teen9">Test Teenpatti</option>
                                        <option value="teen20">20-20 Teenpatti</option>
                                        
                                        <option value="poker">1 Day Poker</option>
                                        <option value="poker20">20-20 Poker</option>
                                        <option value="ab20">Andar Bahar Casino</option>
                                        <option value="card32">32 Cards-A</option>
                                        <option value="card32eu">32 Cards-B</option>
                                        <option value="lucky7">Lucky 7 - A</option>
                                        <option value="lucky7eu">Lucky 7 - B</option>
                                        <option value="dtl20">DTL 20</option>
                                        <option value="dt20">20-20 Dragon Tiger</option>
                                        <option value="dt6">1 Day Dragon Tiger</option>
                                        <option value="btable">Bollywood Table</option>-->

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-diamond" id="loaddata">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <div class="col-md-12">
                            <div class="col-md-2" style="float: right;">
                                Search:
                                <div class="form-group">
                                    <input type="text" name="search-round_id" id="search-round_id"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table id="account_history_table" class="table table-striped table-bordered datatable" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 30%;">Round ID</th>
                        <th>Winner</th>
                    </tr>
                </thead>
                <tbody id="bet_tbody">

                </tbody>
            </table>
            <div class="row m-t-10 m-b-10">
                <div class="col-md-6">
                </div>
                <div class="col-md-6" id="pagination"></div>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div id="modalresult" class="modal fade show" tabindex="-1" style="">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Result Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body nopading" style="min-height: 300px">


                <div class="table-responsive" id="result-details" style="overflow-x: visible;">
                </div>
                <div class="row row5 show_bet">
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
                <div class="table-responsive show_bet">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr>
                                <!-- <td>Uplevel</td>
                                    <td>Uername</td>
                                    <td>Nation</td>
                                    <td>UserRate</td>
                                    <td>Amount</td>
                                    <td>Win/Loss</td>
                                    <td>PlaceDate</td>
                                    <td>MatchDate</td>
                                    <td>Ip</td>
                                    <td>BrowsersDetails</td> -->
                                <td><b>Username</b></td>
                                <td><b>Nation</b></td>
                                <td><b>Rate</b></td>
                                <td><b>Amount</b></td>
                                <td><b>Win/Loss</b></td>
                                <td><b>Date</b></td>
                                <td><b>IP</b></td>
                                <td><b>B Details</b></td>
                                <!-- <td>Action</td> -->

                            </tr>
                        </thead>
                        <tbody id="ac_more_details_tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo WEB_URL; ?>/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>

<script type="text/javascript">
$("#account_history_table").DataTable({
    "drawCallback": function() {
        $('.dataTables_paginate > a,.dataTables_paginate span a').addClass('button btn btn-diamond')
            .removeClass('paginate_button');
        //                $('.dataTables_paginate > a,.dataTables_paginate span a.current').addClass('disabled');
    },
    "pagingType": "full_numbers"
});

var q = '<?php echo $this->input->get('q'); ?>';
if (q !== '')
    $('#search-type').val(q);

var xhr;
var _user_id = 0;

function call_xhr(url, mydata) {
    if (xhr && xhr.readyState != 4)
        xhr.abort();
    xhr = $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: mydata,
        error: function(data) {

        }
    });
}

function set_search_single(field_name, field_val) {
    if ($.trim(field_name) != "" && $.trim(field_val) != "") {
        return ("&" + $.trim(field_name) + "=" + $.trim(field_val));
    } else {
        return "";
    }
}

function preparesearch() {
    var search_string = "";
    search_string += set_search_single("date", $('#search-date').val());
    search_string += set_search_single("type", $('#search-type').val());
    search_string += set_search_single("round_id", $('#search-round_id').val());
    return search_string;
}


function call_page(limit_page, orderby) {
    var limit = 0;
    if (typeof limit_page != 'undefined')
        limit = limit_page;
    var data = "";
    if (typeof(orderby) != 'undefined' && orderby != '') {
        data = '&orderby=' + orderby;
    }

    $('#bet_tbody').html('');

    call_xhr(MASTER_URL + '/reports/casino-results/get_casino_results/' + limit, preparesearch() + data);
    xhr.success(function(data) {
        if (typeof(data.result) != "undefined") {

            if ($.fn.DataTable.isDataTable('#account_history_table')) {
                $('#account_history_table').dataTable().fnDestroy();
            }
            $('#bet_tbody').html(data.result);

            $("#account_history_table").DataTable({
                "drawCallback": function() {
                    $('.dataTables_paginate > a,.dataTables_paginate span a').addClass(
                        'button btn btn-diamond').removeClass('paginate_button');
                    //                $('.dataTables_paginate > a,.dataTables_paginate span a.current').addClass('disabled');
                },
                "pagingType": "full_numbers"
            });

        }
    });
}

$(document).ready(function() {
    $("#search-date").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        endDate: '+0d',
    });
    call_page();
    /*  $('#pagination').delegate('a', 'click', function () {
         var page = $(this).attr('href').split('/');
         if ($.trim(page) != '') {
             page = page[page.length - 1];
             if (isNaN(page))
                 page = 0;
             call_page(page);
         }
         return false;
     }); */

    $('#form-search').on('submit', function() {
        call_page(0);
        return false;
    });

    $('#search-round_id').on('keyup', function() {
        call_page(0);
        return false;
    });

    $('#bet_tbody').on('click', '.btn_modal_result', function() {
        $(".show_bet").hide();
        var id = $(this).attr('href');
        var type = $(this).attr('data-type');
        // console.log("type",type);
        //     console.log("id",id);
        $('#modal-round_id').text(id);
        $('#modalresult').modal('show');
        $('#result-details').html('loading...');
        call_xhr(MASTER_URL + '/reports/casino-results/get_result/' + type + '/' + id, '');
        xhr.success(function(data) {
            
            // console.log("data",data.result);
            
            $('#modalresult').find('.modal-dialog').removeClass(
                'modal-md modal-dialog-centered');
            if (type == 'war') {
                $('#modalresult').find('.modal-dialog').addClass(
                    'modal-md modal-dialog-centered');
            }
            if (typeof(data.result) != "undefined") {
                $('#pagination').html(data.links);
                $('#result-details').html(data.result);
                if (type == 'ab20') {
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
                if (data.result_bet.length > 0) {
                    var html = '';
                    var totalpl = 0;
                    $(".show_bet").show();
                    for (var i in data.result_bet) {
                        var bet_data = data.result_bet[i];
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

                        var level_arr = [bet_data['dl_name'], bet_data['mdl_name'], bet_data[
                            'smdl_name']];

                        var prt_unique = [...new Set(level_arr)];
                        var uplevel_text = prt_unique[0];

                        var user_agent = (bet_data['user_agent']) ? bet_data['user_agent'] :
                            bet_data[
                                'ip_address'];

                        var bet_wl = Number(bet_data['wl']);
                        var bet_amount = Number(bet_data['amount']);

                        html += '<tr class="' + tr_class + '">';
                        // html += '   <td class="text-left">' + uplevel_text + '</td>';
                        html += '   <td class="text-left">' + bet_data['cl_name'] + '</td>';
                        html += '   <td class="text-left">' + market_name + '</td>';
                        html += '   <td class="text-left">' + odds + '</td>';
                        html += '   <td class="text-left">' + bet_amount + '</td>';
                        html += '   <td class="text-right"> <span style="color: ' +
                            pl_span_class + '">' +
                            bet_wl + '</span> </td>';
                        html += '   <td class="text-left">' + bet_data['date'] + '</td>';
                        // html += '   <td class="text-left">' + bet_data['date'] + '</td>';
                        html += '   <td class="text-left">' + bet_data['ip_address'] + '</td>';
                        html +=
                            '   <td><a href="#" data-toggle="tooltip" data-placement="top"style="color:#128412 !important" title="" data-original-title="' +
                            user_agent + '">Detail</a></td>';
                        html += '</tr>';
                    }
                    $('#ac_more_details_tbody').html(html);

                }
            }
        });
        return false;
    });
});
</script>