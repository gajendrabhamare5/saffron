<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
        background:unset;
    }
</style>

<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Current Bets</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-bet_type">Choose Type</label>
                                    <select name="search-bet_type" id="search-bet_type" class="form-control">
                                        <option value="matched">Matched</option>
                                        <option value="unmatched">Unmatched</option>
                                        <option value="deleted">Deleted</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label style="width: 100%">&nbsp</label>
                                <button type="submit" class="btn btn-diamond" id="loaddata">Load</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive data-table" id="tbldata">
                <table id="table-active_bets" class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Event Type</th>
                            <th>Event Name</th>
                            <th>Username</th>
                            <th>Runner Name</th>
                            <th>Bet Type</th>
                            <th>User Rate</th>
                            <th>Amount</th>
                            <th>Win Amount</th>
                            <th>Place Date</th>
                            <th>Match Date</th> 
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

    $("#table-active_bets").DataTable({
        "drawCallback": function () {
            $('.dataTables_paginate > a').addClass('button btn btn-diamond').removeClass('paginate_button');
        }
    });
    $('.dataTables_filter input').addClass('form-control');

    var SPORTS = JSON.parse('<?php echo json_encode(unserialize(SPORTS)); ?>');

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
                    bet_type: $('#search-bet_type').val()
                },
                "dataSrc": ""
            },
            "columns": [
                {"data": function (data) {
						var return_Data = "";
						
						if(data.event_type == 1 || data.event_type == 2 || data.event_type == 4){
							if((SPORTS[data.event_type] === undefined)){
								
							}
							else{
								return_Data = SPORTS[data.event_type];
							}
						}
						else{
							return_Data = data.event_type;
						}
						
                        return return_Data;
                    }
                },
                {"data": function (data) {
                        return  data.event_name;
                    }},
                {"data": function (data) {
                        return  data.Email_ID;
                    }},
                {"data": function (data) {
                        if(data.market_type == 'KHADO_ODDS'){
                            var playzone = (data.bet_runs2 - data.bet_runs) + 1;
                            return data.market_name +' - '+playzone;
                        }else{
                            return data.market_name;
                        }
                    }},
                {"data": function (data) {
                        return data.bet_type;
                    }},
                {"data": function (data) {
                        var odds = parseFloat(data.bet_odds);
                        var bet_runs = data.bet_runs;
                        if(data.market_type == 'BOOKMAKER_ODDS'){
                            odds = odds * 100 - 100;
                            odds = Math.round(odds * 100) / 100;	/*  Round to at most 2 decimal places (only if necessary)    */
                        }
                        else if(bet_runs > 0){
                            odds = bet_runs;
                        }
                        return odds;
                    }},
                {"data": function (data) {
                        return data.bet_margin_used;
                    }},
                {"data": function (data) {
                        return data.bet_win_amount;
                    }},
                {"data": function (data) {
                       /*  return data.bet_time.slice(0, -9); */
                        return data.bet_time;
                    }},
                {"data": function (data) {
                        /* return data.bet_time.slice(0, -9); */
                        return data.bet_time;
                    }}
            ],
            createdRow: function (row, data, index) {
                if (data.bet_type == "Back" || data.bet_type == "Yes") {
                    $(row).addClass('back-color');
                }
                else {
                    $(row).addClass('lay-color');
                }
            },
            "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
            "pageLength": 50,
            "initComplete": function () {
                $('#divLoading').removeClass('show');
            },
            "drawCallback": function () {
                $('.dataTables_paginate > a,.dataTables_paginate span a').addClass('button btn btn-diamond').removeClass('paginate_button');
            }
        });

        $('.dataTables_filter input').addClass('form-control');
    }

    $(document).ready(function () {
        $(".date").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });

        $('#form-search').on('submit', function () {
            call_page(0);
            return false;
        });

    });

</script>