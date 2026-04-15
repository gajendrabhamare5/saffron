<?php
include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head_css.php");
?>
<style>
    input.custom-text {
        display: inline-block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem 0.1rem .375rem .75rem;
        line-height: 1.5;
        color: #495057;
        vertical-align: middle;
        background-size: 8px 10px;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }

    table.dataTable thead .sorting_asc:after {
        display: none;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card {
        box-shadow: 0 0 5px #a4a4a4;
    }

    .card {
        margin-bottom: 10px;
    }

    .card-header {
        padding: .5rem 1rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, .03);
        border-bottom: 1px solid rgba(0, 0, 0, .125);
    }

    .card-header {
        background-color: var(--theme1-bg);
        color: #ffffff;
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    h4, .h4 {
        font-size: 20px;
        font-weight: 400;
        margin-bottom: 0;
    }

    .card-title {
        margin-bottom: 0;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1rem 1rem;
    }

    .card-body {
        padding: 6px;
    }

    .row.row5 {
        margin-left: -5px;
        margin-right: -5px;
    }

    @media (min-width: 768px) {
        .col-md-3 {
            flex: 0 0 auto;
            width: 25%;
        }
    }

    @media (min-width: 992px) {
        .col-lg-2 {
            flex: 0 0 auto;
            width: 16.66666667%;
        }
    }

    @media (min-width: 992px) {
        .col-lg-3 {
            flex: 0 0 auto;
            width: 25%;
        }
    }

    .row.row5 > [class*="col-"], .row.row5 > [class*="col"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .react-datepicker-wrapper {
        /* display: inline-block; */
        padding: 0;
        border: 0;
    }

    .react-datepicker__input-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .custom-datepicker {
        position: relative;
    }

    button, input, optgroup, select, textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .form-control, .form-select {
        background-color: #ffffff !important;
        color: #000000 !important;
        border-color: #dbdbdb !important;
        padding: 5px;
        border-radius: 0;
    }

    .form-control:disabled, .form-control[readonly] {
        background-color: #e9ecef;
        opacity: 1;
    }

    .fa, .fab, .fad, .fal, .far, .fas {
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        line-height: 1;
    }

    .far {
        font-weight: 400;
    }

    .fa, .far, .fas {
        font-family: "Font Awesome 5 Free";
    }

    .custom-datepicker i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
    }

    /* .fa-calendar:before {
        content: "\f133";
    } */

    .input-group {
        position: relative;
        display: flex
    ;
        flex-wrap: wrap;
        align-items: stretch;
        width: 100%;
    }

    .position-relative {
        position: relative !important;
    }

    .form-select {
        display: block;
        width: 100%;
        padding: .375rem 2.25rem .375rem .75rem;
        -moz-padding-start: calc(0.75rem - 3px);
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e);
        background-repeat: no-repeat;
        background-position: right .75rem center;
        background-size: 16px 12px;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .form-control, .form-select {
        background-color: #ffffff !important;
        color: #000000 !important;
        border-color: #dbdbdb !important;
        padding: 5px;
        border-radius: 0;
    }

    .input-group>.form-control, .input-group>.form-select {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
    }

    .btn, .form-control, .form-select {
        height: 38px;
        border-radius: 0;
    }

    .btn-primary {
        background-color: var(--theme1-bg);
        color: #ffffff;
        border-color: var(--theme1-bg);
    }

    .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
        background-color: var(--theme1-bg);
        color: ffffff;
        border-color: var(--theme1-bg);
    }

    .btn:hover, .btn:focus, .btn:active {
        opacity: 0.85;
    }

    .d-grid {
        display: grid !important;
    }

    .mt-2 {
        margin-top: .5rem !important;
    }

    .row.row10 {
        margin-left: -10px;
        margin-right: -10px;
    }

    .input-group>.form-control, .input-group>.form-select {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
    }

    .input-group:not(.has-validation)>.dropdown-toggle:nth-last-child(n+3), .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        margin-left: -1px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .input-group span {
        display: flex;
        align-items: center;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .dataTables_wrapper {
        min-height: 300px;
    }

    table {
        caption-side: bottom;
        border-collapse: collapse;
        --bs-table-bg: transparent;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;

        background-color: #f7f7f7;
        color: #333;
        margin-bottom: 0;
    }

    .table {
        background-color: #f7f7f7;
        color: #333;
        margin-bottom: 0;
    }

    .table tbody {
        border: 0 !important;
    }

    tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
    }

    tbody, td, tfoot, th, thead, tr {
        border-color: #c7c8ca !important;
    }

    .table>thead {
        vertical-align: bottom;
    }

    .table-bordered>:not(caption)>* {
        border-width: 1px 0;
    }

    .table td, .table th {
        /* padding: 4px 8px; */
        font-size: 16px;
    }

    .table-bordered thead td, .table-bordered thead th {
        border-bottom-width: 0;
    }

    .report-date {
        width: 190px !important;
    }

    .report-sr {
        width: 70px !important;
    }

    .report-amount {
        width: 100px !important;
    }

</style>
<style>
        /* Custom Pagination Styling */
        .pagination-container {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
            font-size: 16px;
            justify-content : center;
        }

            .pagination {
            list-style: none;
            padding: 0;
            margin: 0;
            }

            .page-btn {
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 6px 12px;
                /* margin-right: 5px; */
                font-size: 16px;
                cursor: pointer;
                transition: background 0.2s;
                height: 38px;
                line-height: 26px;
            }

            .page-btn:hover {
            background-color: #f0f0f0;
            }

            .page-input {
            width: 80px;
            display: inline-block;
            padding: 5px;
            font-size: 14px;
            height: 32px;
            margin-left: 5px;
            }

            .pagination  > li:first-child {
                border-top-left-radius: 0.25rem;
                border-bottom-left-radius: 0.25rem;
            }

            .pagination > li:nth-child(4n) {
                border-top-right-radius: 0.25rem;
                border-bottom-right-radius: 0.25rem;
            }

        .dataTables_paginate{
            display: none;
        }
        .dataTables_info{
            display: none;
        }


       
       
    </style>
<body cz-shortcut-listen="true" class="" data-modal-open-count="0">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div class="wrapper">
            <?php
            include("header.php");
            ?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">

                        <?php
                        include("left_sidebar.php");
                        ?>
                        <div class="col-md-10 report-main-content m-t-5">
                            <div class="loader" style="display:none;"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Account Statement</h4>
                                </div>
                                <div class="card-body">
                                    <div class="report-form">
                                        <div class="row row5">
                                            <div class="col-lg-2 col-md-3 col-6">
                                            <div class="react-datepicker-wrapper">
                                                <div class="react-datepicker__input-container">
                                                    <div class="mb-2 custom-datepicker date-container"><input type="date" name="from_date" id="from_date" class="form-control" value="<?php echo date("Y-m-d", strtotime("-7 days")); ?>">
                                                        <!-- <i class="far fa-calendar mr-2"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-6">
                                            <div class="react-datepicker-wrapper">
                                                <div class="react-datepicker__input-container">
                                                    <div class="mb-2 custom-datepicker"><input type="date" name="to_date" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                                        <!-- <i class="far fa-calendar mr-2"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4">
                                            <div class="mb-2 input-group position-relative">
                                                <select class="form-select" name="reportType" id="report_type">
                                                    <!-- <option value="" disabled="">Select Report Type</option> -->
                                                    <option value="2">Deposite/Withdraw Reports</option>
                                                    <option value="4">Sport Report</option>
                                                    <option value="5">Casino Reports</option>
                                                    <option value="6">Third-Party Casino Reports</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 d-grid"><button class="btn btn-primary btn-block" onclick="get_account_statement();">Submit</button></div>
                                        </div>
                                        <!-- <div class="row row10 mt-2 justify-content-between">
                                            <div class="col-lg-2 col-6">
                                            <div class="mb-2 input-group position-relative">
                                                <span class="me-2">Show</span>
                                                <select class="form-select">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                </select>
                                                <span class="ms-2">Entries</span>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-6">
                                            <div class="mb-2 input-group position-relative"><span class="me-2">Search:</span><input type="search" class="form-control" placeholder="0 records..." value=""></div>
                                            </div>
                                        </div> -->
                                        <div class="mt-2 table-responsive">
                                            <table role="table" class="table table-bordered" id="account_history_table">
                                                <thead>
                                                    <tr role="row">
                                                        <th colspan="1" role="columnheader" class="report-date">Date</th>
                                                        <th colspan="1" role="columnheader" class="report-sr text-end">Sr no</th>
                                                        <th colspan="1" role="columnheader" class="report-amount text-end">Credit</th>
                                                        <th colspan="1" role="columnheader" class="report-amount text-end">Debit</th>
                                                        <th colspan="1" role="columnheader" class="report-amount text-end">Pts</th>
                                                        <th colspan="1" role="columnheader">Remark</th>
                                                    </tr>
                                                </thead>
                                                <tbody role="rowgroup"  id="account_history">
                                                   
                                                </tbody>
                                            </table>

                                            <div class="pagination-container" style="display:none;">
                                                <ul class="pagination mb-0 d-flex align-items-center">
                                                    <li><button id="firstPage" class="page-btn">First</button></li>
                                                    <li><button id="prevPage" class="page-btn">Previous</button></li>
                                                    <li><button id="nextPage" class="page-btn">Next</button></li>
                                                    <li><button id="lastPage" class="page-btn">Last</button></li>
                                                </ul>
                                                <ul class="pagination mb-0 d-flex align-items-center">
                                                <li><span class="me-2">Page <b><span id="currentpage">1</span> of <span id="totalPages">1</span></b></span> | Go to Page <input type="text" id="pageNumber" class="page-input form-control d-inline-block ms-2" value="1"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <?php
            include("footer.php");
            ?>
        </div>
    </div>
    <?php
    include("footer-js.php");
    ?>
    <script src="storage/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <script src="storage/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>
<script>
    var table;
    function get_account_statement() {
        $(".loader").show();
        $("#account_history_table").DataTable().destroy();
        from_date = $("#from_date").val();
        to_date = $("#to_date").val();
        report_type = $("#report_type").val();
        var account_html = "";
        if ($.fn.DataTable.isDataTable('#account_history_table')) {
            $("#account_history_table").DataTable().destroy();
        }
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/account_statement.php',
            dataType: 'json',
            data: {
                from_date: from_date,
                to_date: to_date,
                report_type: report_type
            },
            success: function(response) {
                $(".loader").hide();
                status = response.status;
                if (status == "ok") {
                    data = response.data;
                    c_balance = 0;
                    $(".pagination-container").show();
                    for (var i in data) {
                        sr_no = parseInt(i) + 1;
                        account_date_time = data[i]['account_date_time'];
                        total_pnl = data[i]['total_pnl'];
                        remakrs = data[i]['remakrs'];
                        pop = data[i]['pop'];
                        game_type = data[i]['game_type'];
                        market_id = data[i]['market_id'];
                        event_id = data[i]['event_id'];
                        event_type = data[i]['event_type'];
                        market_type = data[i]['market_type'];

                        if (total_pnl < 0) {
                            credit_amount = 0;
                            debit_amount = parseFloat(total_pnl);
                            c_balance = parseFloat(c_balance) + parseFloat(total_pnl);

                        } else {
                            credit_amount = parseFloat(total_pnl);
                            debit_amount = 0;
                            c_balance = parseFloat(c_balance) + parseFloat(total_pnl);
                        }

                        if (pop == 1) {
                            account_html += '<tr onclick="view_account_bet(\'' + account_date_time + '\',\'' + event_id + '\',\'' + game_type + '\',\'' + event_type + '\',\'' + market_id + '\',\'' + market_type + '\')">';
                        } else {
                            account_html += "<tr>";
                        }

                        if (credit_amount != 0) {
                            credit_amount = credit_amount.toFixed(2);
                        } else {
                            credit_amount = "-";
                        }
                        if (debit_amount != 0) {
                            debit_amount = debit_amount.toFixed(2);
                        } else {
                            debit_amount = "-";
                        }
                        var class_name="";
                        if(c_balance> 0){
                            class_name= "text-success";
                        }
                        if(c_balance< 0){
                            class_name= "text-danger";
                        }
                        account_html += `<td role="cell" class="report-datex">${account_date_time}</td>
                                                        <td role="cell" class="report-sr text-end">${sr_no}</td>
                                                        <td role="cell" class="report-amount text-end"><span role="cell" class="text-success">${credit_amount}</span></td>
                                                        <td role="cell" class="report-amount text-end"><span role="cell" class="text-danger">${debit_amount}</span></td>
                                                        <td role="cell" class="report-amount text-end"><span role="cell" class="${class_name}">${c_balance.toFixed(2)}</span></td>
                                                        <td role="cell">${remakrs}</td>`;
                        
                        // account_html += "<td>" + account_date_time + "</td>";
                        // account_html += "<td>" + sr_no + "</td>";
                        // account_html += "<td style='color:green;'>" + credit_amount + "</td>";
                        // account_html += "<td style='color:red;'>" + debit_amount + "</td>";
                        // account_html += "<td style='color:green;'>" + c_balance.toFixed(2) + "</td>";
                        // account_html += "<td style='text-align:center;'>" + remakrs + "</td>";
                        account_html += "</tr>";
                    }
                    $("#account_history").html(account_html);

                    table =$("#account_history_table").DataTable({
                        "ordering": false,
                        bInfo: false,
                        "paging": true,
                        "searching": true,
                        "info": true,
                        "lengthChange": true,
                       "pageLength": 10,
                        "renderer": "bootstrap",
                        "drawCallback": function() {
                            updatePaginationControls();
                        },
                        "pagingType": "full_numbers"
                    });
                    updatePaginationControls();

                }
            }
        });
    }

    function updatePaginationControls() {
        if (table) { 
            $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');
            let pageInfo = table.page.info();
            console.log("pageInfo=",pageInfo);
            console.log("pageInfo=",pageInfo.page + 1);
            $("#pageNumber").val(pageInfo.page + 1);
            $("#currentpage").val(pageInfo.page + 1);
            $("#totalPages").text(pageInfo.pages);
        }
    }

    // Pagination Button Handlers
    $("#firstPage").on("click", function () {
        if (table) table.page('first').draw('page');
    });

    $("#prevPage").on("click", function () {
        if (table) table.page('previous').draw('page');
    });

    $("#nextPage").on("click", function () {
        if (table) table.page('next').draw('page');
    });

    $("#lastPage").on("click", function () {
        if (table) table.page('last').draw('page');
    });

    $("#pageNumber").on("change", function () {
        let pageNum = parseInt($(this).val(), 10) - 1;
        if (!isNaN(pageNum) && table) {
            table.page(pageNum).draw('page');
        }
    });

    function view_account_bet(bet_time, event_id, game_type, event_type, market_id, market_type) {
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/account_bet_statement.php',
            dataType: 'text',
            data: {
                bet_time: bet_time,
                event_id: event_id,
                game_type: game_type,
                event_type: event_type,
                market_id: market_id,
                market_type: market_type
            },
            success: function(response) {
                $("#bet_time").val(bet_time);
                $("#account_bet_statement").html(response);
                $('#account_bet_popup').modal("show");
            }
        });
    }

    $(document).ready(function() {
        
        $(".pagination-container").hide();
        $("#account_history_table").DataTable({});
        $('.dataTables_empty').hide();
        $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');
        
        $("input[type='radio']").click(function() {
            var bet_type = $("input[name='match_delete']:checked").val();
            if (bet_type == 1) {
                bet_time = $("#bet_time").val();
                view_account_bet(bet_time);
            } else if (bet_type == 2) {
                $("#account_bet_statement").html(""); 
            }
        });
    });
</script>

<div id="account_bet_popup" class="modal" role="dialog">
    <div class="modal-dialog" style="    max-width: 80% !important;">
        <div class="modal-dialog modal-full"><span tabindex="0"></span>
            <div role="document" id="__BVID__694___BV_modal_content_" tabindex="-1" class="modal-content">
                <!---->
                <div id="__BVID__694___BV_modal_body_" class="modal-body">
                    <div class="container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-12 text-center">
                                <div id="match_delete" role="radiogroup" tabindex="-1">
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="matched" type="radio" name="match_delete" autocomplete="off" checked='checked' value="1" class="custom-control-input">
                                        <label for="matched" class="custom-control-label"><span>Matched</span></label>
                                    </div>
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="deleteed" type="radio" name="match_delete" autocomplete="off" value="2" class="custom-control-input">
                                        <label for="deleteed" class="custom-control-label"><span>Deleted</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row5">
                            <div class="col-12">
                                <input type="hidden" name="bet_time" id="bet_time" />
                                <div class="table-responsive">
                                    <table role="table" aria-busy="false" aria-colcount="8" class="table b-table table-bordered" id="__BVID__886">
                                        <!---->
                                        <!---->
                                        <thead role="rowgroup" class="">
                                            <!---->
                                            <tr role="row" class="">
                                                <th aria-colindex="1" class="text-right">No</th>
                                                <th aria-colindex="2" class="text-center">Nation</th>
                                                <th aria-colindex="3" class="text-center">Side</th>
                                                <th aria-colindex="4" class="text-right">Rate</th>
                                                <th aria-colindex="5" class="text-right">Amount</th>
                                                <th aria-colindex="6" class="text-right">Win/Loss</th>
                                                <th aria-colindex="7" class="text-center">Place Date</th>
                                                <th aria-colindex="8" class="text-center">Match Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="account_bet_statement">

                                        </tbody>
                                        <!---->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer id="__BVID__694___BV_modal_footer_" class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        Close
                    </button>
                </footer>
            </div><span tabindex="0"></span>
        </div>
    </div>

</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>