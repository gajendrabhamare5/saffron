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

    span.account_bets1 {
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

    .dataTables_paginate {
        text-align: right;
        margin-top: 20px;
    }

    /* All pagination buttons */
    .dataTables_paginate .paginate_button {
        background-color: #fff !important;
        /* dark background */
        color: #ced4da !important;
        border: none !important;
        padding: 6px 12px;
        margin: 0 2px;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Active Page Button */
    .dataTables_paginate .paginate_button.current {
        background: unset !important;
        background-color: #ae4600 !important;
        /* Teal active background */
        color: white !important;
        border-radius: 4px;
    }

    /* .col-md-2 {
  flex: 0 0 100%;
  max-width: 100%;
}

@media (min-width: 768px) {
    .col-md-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%;
    }
} */
    /* Default (mobile first): full width */

    .mx-icon-calendar,
    .mx-icon-clear {
        position: absolute;
        top: 70%;
        right: 8px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        font-size: 16px;
        line-height: 1;
        color: rgba(0, 0, 0, 0.5);
        vertical-align: middle;
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

    /* Make the main select2 box take full width */
    .select2-container {
        width: 100% !important;
    }

    /* Make dropdown width match the parent */
    .select2-container--open .select2-dropdown {
        /* width: 100% !important; */
        left: 0 !important;
        right: 0 !important;
    }

    /* Make search field responsive */
    .select2-search__field {
        width: 100% !important;
        box-sizing: border-box;
    }

    /* Optional: prevent cutoff on mobile */
    @media (max-width: 767px) {
        .select2-container--open .select2-dropdown {
            position: relative !important;
        }
    }

    .hidden-column {
        display: none !important;
    }

    .ui-autocomplete {
        /* background-color: #007bff !important;  */
        background-color: #556ee6 !important;

    }

    .ui-menu-item-wrapper {
        color: #fff !important;
        /* padding: 8px 10px; */
    }

    .datepicker-dropdown {
        font-family: 'Poppins', sans-serif !important;
        /* width: 248px !important; */
        color: #73879c !important;
    }

    .btn-light{
    color: #212529;
    background-color: #eff2f7;
    border-color: #eff2f7;
    }
</style>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row mb-10">
                <h2>User Register Detail</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">

                            <div class="col-sm-12 col-lg-2 client_name">
                                <!-- col-md-2  -->
                                <div class="form-group">
                                    <label for="search-client_name">Search By Client Name</label>
                                    <!-- <select class="form-control" name="search-client_name" id="search-client_name"></select> -->
                                    <input type="text" class="form-control" id="search-client_name" placeholder=" Select option">
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-2">
                                <div class="form-group">
                                    <label for="search-report_type">Type</label>
                                    <select name="search-report_type" id="search-report_type" class="form-control">
                                        <option value="1">All</option>
                                        <option value="2">Created Date</option>
                                        <option value="3">Last Login Date</option>
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-2">
                                <div class="form-group">
                                    <label for="search-from_date">Select Date Range From</label>
                                    <input id="search-from_date" class="form-control  datepicker1"
                                        name="search-from_date" type="text"
                                        value="<?php echo date('Y-m-d', strtotime('-7 day')); ?>" style="font-family: 'Poppins', sans-serif;"
                                        placeholder="Choose Date">
                                    <i class="mx-icon-calendar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" width="1em" height="1em">
                                            <path d="M940.218182 107.054545h-209.454546V46.545455h-65.163636v60.50909H363.054545V46.545455H297.890909v60.50909H83.781818c-18.618182 0-32.581818 13.963636-32.581818 32.581819v805.236363c0 18.618182 13.963636 32.581818 32.581818 32.581818h861.090909c18.618182 0 32.581818-13.963636 32.581818-32.581818V139.636364c-4.654545-18.618182-18.618182-32.581818-37.236363-32.581819zM297.890909 172.218182V232.727273h65.163636V172.218182h307.2V232.727273h65.163637V172.218182h176.872727v204.8H116.363636V172.218182h181.527273zM116.363636 912.290909V442.181818h795.927273v470.109091H116.363636z"></path>
                                        </svg></i>
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-2">
                                <div class="form-group">
                                    <label for="todate">Select Date Range To</label>
                                    <input id="search-to_date" class="form-control  datepicker1"
                                        name="search-to_date" type="text"
                                        value="<?php echo date('Y-m-d', time()); ?>" style="font-family: 'Poppins', sans-serif;"
                                        placeholder="Choose Date">
                                    <i class="mx-icon-calendar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" width="1em" height="1em">
                                            <path d="M940.218182 107.054545h-209.454546V46.545455h-65.163636v60.50909H363.054545V46.545455H297.890909v60.50909H83.781818c-18.618182 0-32.581818 13.963636-32.581818 32.581819v805.236363c0 18.618182 13.963636 32.581818 32.581818 32.581818h861.090909c18.618182 0 32.581818-13.963636 32.581818-32.581818V139.636364c-4.654545-18.618182-18.618182-32.581818-37.236363-32.581819zM297.890909 172.218182V232.727273h65.163636V172.218182h307.2V232.727273h65.163637V172.218182h176.872727v204.8H116.363636V172.218182h181.527273zM116.363636 912.290909V442.181818h795.927273v470.109091H116.363636z"></path>
                                        </svg></i>
                                </div>
                            </div>

                            <div class="col-lg-2" style="margin-top: 21px;">
                                <!-- <label style="width: 100%">&nbsp</label> -->
                                <button type="submit" class="btn btn-diamond" id="loaddata">Load</button>
                                <button type="button" class="btn btn-light" id="resetForm">Reset</button>
                            </div>

                            <div class="col-lg-2" style="margin-top: 21px;">
                                <!-- <label style="width: 100%">&nbsp</label> -->
                                
                            </div>


                        </div>
                       <!--  <div class="row">
                            
                        </div> -->
                    </div>
                </form>

            </div>
            <table id="account_history_table" class="table table-striped table-bordered datatable mt-3" style="width:100%">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Agent Name</th>
                        <th>Debit</th>
                        <th>Mobile</th>
                        <th>Created Date</th>
                        <th>Last Login</th>
                        <th>First Deposit Date</th>
                        <th>Last Deposit Date</th>
                        <th>Deposit</th>
                        <th>Sports Balance</th>
                        <th>Casino Balance</th>
                        <th>Third Party Credit Balance</th>
                        <th>Sport Book Balance</th>
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


   <!--  <div class="modal fade" id="ReportMatchbetModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="ReportMatchbetHeading">Client Ledger</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="table-responsive" id="result-details" style="overflow-x: visible;">
                    </div>
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
    </div> -->
</div>
<style>
    .back {
        box-shadow: inset 3px 0 0px #72bbef;
        background-color: #72bbef57 !important;
        border: 0px solid #72bbef !important;
    }

    .lay {
        box-shadow: inset 3px 0 0px #f994ba;
        background-color: #f994ba57 !important;
        border: 0px solid #f994ba !important;
    }
</style>
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

$casino_option = '';
foreach (unserialize(GAME_LIST) as $key => $value) {
    $casino_option .= '<option value="' . $key . '">' . $value . '</option>';
}

$CASINO = array(
    '4' => 'Cricket',
    '1' => 'Soccer',
    '2' => 'Tennis',
);
$sports_option = '';
foreach ($CASINO as $key => $value) {
    $sports_option .= '<option value="' . $key . '">' . $value . '</option>';
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript">
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

    /* $('#search-from_date').datepicker({
         format: 'dd/mm/yyyy',
         autoclose: true,
         todayHighlight: true,
         endDate: new Date()
     });

     $('#search-to_date').datepicker({
         format: 'dd/mm/yyyy',
         autoclose: true,
         todayHighlight: true,
         endDate: new Date()
     });*/

    function preparesearch() {
        var search_string = "";
        search_string += set_search_single("from_date", $('#search-from_date').val());
        search_string += set_search_single("to_date", $('#search-to_date').val());
        search_string += set_search_single("client_name", $("#search-client_name").data("selected-id"));
        search_string += set_search_single("event_type", $('#search-event_type').val());
        search_string += set_search_single("report_type", $('#search-report_type').val());
        return search_string;
    }


    function call_page() {

        $("#account_history_table").html('');
        $('#divLoading').addClass('show');

        $("#account_history_table").DataTable().destroy();

        var total_amt = 0;

        var table = $('#account_history_table').DataTable({
            "ajax": {
                "url": MASTER_URL + '/reports/userregisterdetail',
                "type": "POST",
                "data": function(d) {
                    return {
                        from_date: $('#search-from_date').val(),
                        to_date: $('#search-to_date').val(),
                        client_name: $("#search-client_name").data("selected-id"),
                        event_type: $('#search-event_type').val(),
                        report_type: $('#search-report_type').val(),
                        
                    };
                },
                "dataSrc": ""
            },
            "columns": [{
                    "className": "text-center",
                    "data": function(data) {
                        return data.edt;
                    }
                },
                {
                    "className": "text-right",
                    "data": function(data) {
                        var cr_amt = (data.amount >= 0) ? data.amount : 0;
                        return Number(cr_amt).toFixed(2);
                    },
                    "createdCell": function(td, cellData, rowData) {
                        if (rowData.amount > 0) $(td).addClass('text-success');
                    }
                },
                {
                    "className": "text-right",
                    "data": function(data) {
                        var dr_amt = (data.amount >= 0) ? 0 : data.amount;
                        return Number(dr_amt).toFixed(2);
                    },
                    "createdCell": function(td, cellData, rowData) {
                        if (rowData.amount < 0) $(td).addClass('text-danger');
                    }
                },
                {
                    "className": "text-right",
                    "data": function(data, type, row) {
                        // Compute running total (balance)
                        total_amt += Number(data.amount);

                        // Return formatted balance
                        var formatted = total_amt.toFixed(2);

                        // Add styling inline (or do in createdCell)
                        var cssClass = (total_amt >= 0) ? 'text-success' : 'text-danger';
                        return '<span class="' + cssClass + '">' + formatted + '</span>';
                    }
                },
                {
                    "className": "td-account_bets",
                    "data": function(data) {
                        if (data.bid == 0 || data.remark == 'Opening') {
                            return '<span class="account_bets1">' + data.remark + '</span>';
                        } else {
                            var remark = data.event_name + ' Rno. ' + data.event_id + '/' + data.market_type + '-' + data.market_name;

                            if (['FANCY_ODDS', 'METER_ODDS', 'KHADO_ODDS'].includes(data.market_type)) {
                                remark = data.market_name + '/' + (data.market_type.replace('_ODDS', '')) + '-' + data.result;
                            }

                            var eventType = data.type;
                            var gameMap = JSON.parse('<?php echo GAME_LIST2; ?>');
                            if (gameMap.hasOwnProperty(eventType)) eventType = gameMap[eventType];

                            var sportName = '';
                            if (data.type == 4) sportName = 'CRICKET/';
                            else if (data.type == 1) sportName = 'FOOTBALL/';
                            else if (data.type == 2) sportName = 'TENNIS/';
                            else if (data.type == 8) sportName = 'ELECTION/';

                            return '<span data-id="' + data.event_id + '" data-game_type="' + data.game_type +
                                '" data-event_type="' + eventType + '" data-market_id="' + data.market_id +
                                '" data-market_type="' + data.market_type + '" class="account_bets">' +
                                sportName + remark + '</span>';
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
            "paging": true,
            "pagingType": 'full_numbers',
            "lengthMenu": [25, 50, 75, 100, 125, 150, 200],
            "pageLength": 50,
            "info": false,
            "stateSave": false,
            "initComplete": function() {
                total_amt = 0;
                $('#divLoading').removeClass('show');
            },
            "preDrawCallback": function() {
                // Reset totals before every render (important!)
                total_amt = 0;
            },
            "drawCallback": function() {
                $('.dataTables_paginate > a').addClass('btn btn-diamond');
            },
            dom: 'Bfrtp',
            buttons: [{
                    extend: 'pdfHtml5',
                    title: 'Account Statement',
                    filename: 'Account Statement',
                    action: function(e, dt, node, config) {
                        total_amt = 0;
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, node, config);
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: 'Account Statement',
                    filename: 'Account Statement',
                    action: function(e, dt, node, config) {
                        total_amt = 0;
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
                    }
                }
            ],
            language: {
                emptyTable: "No records found",
                zeroRecords: "No matching records found",
                paginate: {
                    first: '«',
                    last: '»',
                    next: '›',
                    previous: '‹'
                }
            }
        });

        // Style search input
        $('.dataTables_filter input').addClass('form-control');


    }

    $(document).ready(function() {
       
         function toggleDateFields() {
        var report_type = $('#search-report_type').val();

        if (report_type == 1) {
            $('#search-from_date').closest('.col-lg-2').addClass('hidden-column');
            $('#search-to_date').closest('.col-lg-2').addClass('hidden-column');
        } else {
            $('#search-from_date').closest('.col-lg-2').removeClass('hidden-column');
            $('#search-to_date').closest('.col-lg-2').removeClass('hidden-column');
        }
    }

    // Run on change
    $('#search-report_type').on('change', function() {
        toggleDateFields();
    });

    // Run on page load
    toggleDateFields();

    $('#resetForm').on('click', function() {

        // Reset full form
        $('#form-search')[0].reset();

        // Reset default dates manually (because reset may not restore PHP values)
        $('#search-from_date').val('<?php echo date('Y-m-d', strtotime('-7 day')); ?>');
        $('#search-to_date').val('<?php echo date('Y-m-d'); ?>');

        // Clear client name
        $('#search-client_name').val('');

        // Trigger change to apply your hide/show logic
        $('#search-report_type').trigger('change');

    });


        // $('#search-client_name').select2({
        //     width: '100%',
        //     allowClear: true,
        //     minimumInputLength: 3,
        //     placeholder: '',
        //     ajax: {
        //         url: MASTER_URL + '/reports/common/get_clients',
        //         data: function(params) {
        //             var query = {
        //                 search: params.term,
        //                 type: 'public'
        //             }
        //             return query;
        //         }
        //     },
        // });

        $("#search-client_name").autocomplete({
            minLength: 2,
            source: function(request, response) {
                $.ajax({
                    url: MASTER_URL + '/reports/common/get_clients',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        // Format the response based on your API
                        // If your API returns [{id: 1, text: 'John'}, {id: 2, text: 'Mike'}]
                        // adjust this mapping as needed:
                        response($.map(data.results || data, function(item) {
                            return {
                                label: item.text || item.client_name || item.name,
                                value: item.text || item.client_name || item.name,
                                id: item.id
                            };
                        }));
                    }
                });
            },
            select: function(event, ui) {
                // When an item is selected
                console.log("Selected Name:", ui.item.label); // demoage
                console.log("Selected ID:", ui.item.id); // 9245

                // ✅ Store ID in a data attribute of the same input
                $("#search-client_name").data("selected-id", ui.item.id);
            }

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
            client_name = $("#search-client_name").data("selected-id");

            $('input[name=match_all][value=0]').prop('checked', true);

            view_bets(0);
            return false;
        });

        $('#btn-export_to_excel').on('click', function() {
            window.location = MASTER_URL + '/reports/account_statement/export_to_excel/?' + preparesearch();
            return false;
        });

      
    });

    $('input[type=radio][name=match_all]').change(function() {
        view_bets(this.value);
    });

    /* function view_bets(bet_type) {

        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/' + event_type + '/' + id,
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
            success: function(response) {

                $('#modalpokerresult').modal('show');
                var html = '';
                $(".total-bets-count").text(response.no_rows);

                if (response.result_bet.length > 0) {

                    var totalpl = 0;

                    $('#result-details').html(response.result);
                    for (var i in response.result_bet) {

                        var bet_data = response.result_bet[i];

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
                        // html += '   <td class="text-left">' + uplevel_text + '</td>';
                        html += '   <td class="text-left">' + bet_data['cl_name'] + '</td>';
                        html += '   <td class="text-left">' + market_name + '</td>';
                        html += '   <td class="text-left">' + odds + '</td>';
                        html += '   <td class="text-left">' + bet_amount + '</td>';
                        html += '   <td class="text-right"> <span style="color: ' + pl_span_class + '">' +
                            bet_wl + '</span> </td>';
                        html += '   <td class="text-left">' + bet_data['date'] + '</td>';
                        // html += '   <td class="text-left">' + bet_data['date'] + '</td>';
                        html += '   <td class="text-left">' + bet_data['ip_address'] + '</td>';
                        html += '   <td><a href="#" data-toggle="tooltip" data-placement="top"style="color:#128412 !important" title="" data-original-title="' +
                            user_agent + '">Detail</a></td>';
                        html += `   <td class="text-right"><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input bet-checkbox" id="pro_los_${i}" data-wl="${bet_wl}" data-amount="${bet_amount}"><label class="custom-control-label" for="pro_los_${i}"></label></div></td>`;
                        html += '</tr>';
                    }
                }

                $(document).on("change", ".bet-checkbox", function() {
                    let total_pl1 = 0;
                    let total_checked1 = 0;

                    $(".bet-checkbox:checked").each(function() {
                        total_pl1 += Number($(this).data("wl")); // sum wl
                        total_checked1++;
                    });
                    if (total_pl1 == 0) {
                        total_pl1 = totalpl;
                    }
                    if (total_checked1 == 0) {
                        total_checked1 = response.result_bet.length;
                    }
                    // update DOM
                    $(".total_pl").text(total_pl1);
                    $(".total_bet").text(total_checked1);
                });

                $('.resultt_show').html(response.result);
                $('#ac_more_details_tbody').html(html);
                $('#modal_ac_more_details').modal('show');
                $('[data-toggle="tooltip"]').tooltip();
                $('#divLoading').removeClass('show');

                var mypl = (totalpl > 0) ? (0 - totalpl) : (Math.abs(totalpl));

                const arrayClinets = response.result_bet.map(x => x['cl_name']);
                var prt_unique_clinets = [...new Set(arrayClinets)];
                $('.total_pl').text(mypl);
                $('.total_bet').text(response.result_bet.length);
                $('#total_count').text(prt_unique_clinets.length);
                //  $("#cards_data1").html(response.result);
            }
        });

    } */
</script>
<style>
    .custom-control-inline {
        align-items: center;
    }
</style>