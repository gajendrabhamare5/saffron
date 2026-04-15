<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: unset;
    }

    .form-check-inline label {
        margin-bottom: 0 !important;
        padding-left: 5px !important;
    }
</style>

<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Current Bets</h2>
                <div class="viewMoreMatchedDataSection m-t-30">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#matched-bet2" onclick="tab_view('sport')">Sports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#matched-bet2" onclick="tab_view('casino')">Casino</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Matched Bets Tab -->
                        <div id="matched-bet2" class="tab-pane active">
                            <form method="post" id="form-search">
                                <div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-md-12 hideshow">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="search-bet_type" value="matched" id="matched" checked>
                                                    <label for="bet-matched">Matched</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="search-bet_type" value="deleted" id="deleted">
                                                    <label for="bet-deleted">Deleted</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" style="display: flex;justify-content: left;">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="bettype" value="all" id="all" checked>
                                                    <label for="all">All</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="bettype" value="back" id="back">
                                                    <label for="back">Back</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="bettype" value="lay" id="lay">
                                                    <label for="lay">Lay</label>
                                                </div>
                                                <button type="submit" class="btn btn-diamond" id="loaddata">Load</button>
                                            </div>

                                        </div>
                                        <div class="col-md-9 text-right">
                                            <h4 style="font-size: 1.1rem">Total Soda: <span class=" mr-2 total_bet">0</span> Total Amount: <span class=" total_pl">0.00</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive data-table" id="tbldata">
                <table id="table-active_bets" class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <!-- <th>Event Type</th>
                            <th>Event Name</th>
                            <th>Username</th>
                            <th>Runner Name</th>
                            <th>Bet Type</th>
                            <th>User Rate</th>
                            <th>Amount</th>
                            <th>Win Amount</th>
                            <th>Place Date</th>
                            <th>Match Date</th>  -->
                            <th class="hidshow">Event Type</th>
                            <th>Event Name</th>
                            <th>User Name</th>
                            <th class="hidshow">M Name</th>
                            <th>Nation</th>
                            <th>U Rate</th>
                            <th>Amount</th>
                            <th>Place Date</th>
                        </tr>
                    </thead>
                    <tbody id="bet_tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>

<script type="text/javascript">
    var sport_type = 'sport';

    function tab_view(status) {

        sport_type = status;
        var table = $('#table-active_bets').DataTable();
        if (sport_type === "casino") {
            $('.hideshow').hide();
        } else if (sport_type === "sport") {
            $('.hideshow').show();
        }
        call_page(0);
        return false;
    }
    $("#table-active_bets").DataTable({
        "drawCallback": function() {
            $('.dataTables_paginate > a').addClass('button btn btn-diamond').removeClass('paginate_button');
        }
    });
    $('.dataTables_filter input').addClass('form-control');

    var SPORTS = JSON.parse('<?php echo json_encode(unserialize(SPORTS)); ?>');
    var gameList = JSON.parse('<?php echo json_encode(unserialize(GAME_LIST)); ?>');
    // console.log(gameList); 
    function call_page() {

        $("#table-active_bets").DataTable().destroy();
   
        $('#divLoading').addClass('show');
        var i = 1;
        var total_amt = 0;
        $('#table-active_bets').removeClass('table-striped').addClass('table-striped');
        $('#table-active_bets').DataTable({
            "ajax": {
                "url": MASTER_URL + '/reports/current_bets/get_current_bets/',
                "type": "POST",
                "data": {
                    bet_type: $('input[name="search-bet_type"]:checked').val(),
                    backlay: $('input[name="bettype"]:checked').val(),
                    sport_type: sport_type,
                },
                "dataSrc": ""
            },
            "columns": [{
                    "data": function(data) {
                        var return_Data = "";

                        if (data.event_type == 1 || data.event_type == 2 || data.event_type == 4) {
                            if ((SPORTS[data.event_type] === undefined)) {

                            } else {
                                return_Data = SPORTS[data.event_type];
                            }
                        } else {
                            return_Data = data.event_type;
                            return_Data = return_Data.toLowerCase();
                            if (return_Data in gameList) {
                                if (gameList[return_Data]) {
                                    return_Data = gameList[return_Data]
                                }
                            }
                        }

                        return return_Data;
                    },
                },

                {
                    "data": function(data) {
                        var return_Data = data.event_name;
                        return_Data = return_Data.toLowerCase();
                        if (return_Data in gameList) {
                            if (gameList[return_Data]) {
                                return_Data = gameList[return_Data]
                            }
                        }
                        return return_Data;
                    },
                    className: 'hidshow_class'
                },
                {
                    "data": function(data) {
                        return data.Email_ID;
                    }
                },
                {
                    "data": function(data) {
                        return data.market_type;
                        if (data.market_type == 'KHADO_ODDS') {
                            var playzone = (data.bet_runs2 - data.bet_runs) + 1;
                            return data.market_name + ' - ' + playzone;
                        } else {
                            return data.market_name;
                        }
                    },
                    className: 'hidshow_class'
                },
                {
                    "data": function(data) {
                        if (data.market_type == 'KHADO_ODDS') {
                            var playzone = (data.bet_runs2 - data.bet_runs) + 1;
                            return data.market_name + ' - ' + playzone;
                        } else {
                            return data.market_name;
                        }
                        return data.bet_type;
                    }
                },
                {
                    "data": function(data) {
                        var odds = parseFloat(data.bet_odds);
                        var bet_runs = data.bet_runs;
                        if (data.market_type == 'BOOKMAKER_ODDS') {
                            odds = odds * 100 - 100;
                            odds = Math.round(odds * 100) / 100; /*  Round to at most 2 decimal places (only if necessary)    */
                        } else if (bet_runs > 0) {
                            odds = bet_runs;
                        }
                        return odds;
                    }
                },
             /*   {
                    "data": function(data) {
                        return data.bet_margin_used;
                    }
                }, */
                 {"data": function (data) {
                        return data.bet_stack;
                     }},
                {
                    "data": function(data) {
                        /*  return data.bet_time.slice(0, -9); */
                        return data.bet_time;
                    }
                },
                // {"data": function (data) {
                //         return data.bet_time;
                //     }}
            ],
            createdRow: function(row, data, index) {
                if (data.bet_type == "Back" || data.bet_type == "Yes") {
                    $(row).addClass('back-color');
                } else {
                    $(row).addClass('lay-color');
                }
            },
            "lengthMenu": [25, 50, 75, 100, 125, 150],
            "pageLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();

                // Count total rows
                var totalRows = api.rows({
                    page: 'current'
                }).count();

                // Sum amount (7th column index = 6)
                var totalAmount = api.column(6, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    var x = parseFloat(a) || 0;
                    var y = parseFloat(b) || 0;
                    return x + y;
                }, 0);

                // Update in HTML
                $('.total_bet').text(totalRows);
                $('.total_pl').text(totalAmount.toFixed(2));
            },
            "initComplete": function() {
                $('#divLoading').removeClass('show');
                var table = $('#table-active_bets').DataTable();

                $('div.dataTables_filter input')
                    .addClass('form-control')
                    .attr('placeholder', 'Search...');


                if (sport_type === "casino") {
                    table.columns('.hidshow_class').visible(false);
                } else if (sport_type === "sport") {
                    table.columns('.hidshow_class').visible(true);
                }
            },
            // "drawCallback": function () {
            //     $('.dataTables_paginate > a,.dataTables_paginate span a').addClass('button btn btn-diamond').removeClass('paginate_button');
            // }
        });

        // $('.dataTables_filter input').addClass('form-control');


    }

    $(document).ready(function() {
        call_page(); 

        $(".date").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });

        $('#form-search').on('submit', function() {
            call_page(0);
            return false;
        });

    });
</script>