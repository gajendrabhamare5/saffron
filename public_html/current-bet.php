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
        background-color: var(--theme1-bg);
        border-bottom: 1px solid rgba(0, 0, 0, .125);
    }

    .card-header {
        background-color:  var(--theme1-bg);
        color: #ffffff;
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    h4,
    .h4 {
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

    .row.row5>[class*="col-"],
    .row.row5>[class*="col"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .react-datepicker-wrapper {
        display: inline-block;
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

    button,
    input,
    optgroup,
    select,
    textarea {
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

    .form-control,
    .form-select {
        background-color: #ffffff !important;
        color: #000000 !important;
        border-color: #dbdbdb !important;
        padding: 5px;
        border-radius: 0;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #e9ecef;
        opacity: 1;
    }

    .fa,
    .fab,
    .fad,
    .fal,
    .far,
    .fas {
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

    .fa,
    .far,
    .fas {
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

    .fa-calendar:before {
        content: "\f133";
    }

    .input-group {
        position: relative;
        display: flex;
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

    .form-control,
    .form-select {
        background-color: #ffffff !important;
        color: #000000 !important;
        border-color: #dbdbdb !important;
        padding: 5px;
        border-radius: 0;
    }

    .input-group>.form-control,
    .input-group>.form-select {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
    }

    .btn,
    .form-control,
    .form-select {
        height: 38px;
        border-radius: 0;
    }

    .btn-primary {
        background-color: var(--theme1-bg);
        color: #ffffff;
        border: var(--theme1-bg);
    }

    .btn{
        border-color: var(--theme1-bg);
    }

    .btn:hover{
        background-color: var(--theme1-bg);
        color: #ffffff;
        border-color: var(--theme1-bg);
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

    .input-group>.form-control,
    .input-group>.form-select {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
    }

    .input-group:not(.has-validation)>.dropdown-toggle:nth-last-child(n+3),
    .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
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

    .table-responsive {
        min-height: 300px;
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

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: #c7c8ca;
    }

    .table>thead {
        vertical-align: bottom;
    }

    .table-bordered>:not(caption)>* {
        border-width: 1px 0;
    }

    .table td,
    .table th {
        /* padding: 4px 8px; */
        font-size: 16px;
    }

    .table thead th {
        vertical-align: middle;
        border-bottom: 2px solid #dee2e6;
    }

    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 0;
    }

    .report-date {
        width: 190px;
    }

    .report-sr {
        width: 70px;
    }

    .report-amount {
        width: 100px;
    }

    .report-action {
        width: 50px;
    }

    .form-check-input:checked {
        background-color: #2c3e50;
        border-color: #2c3e50;
    }

    .form-check-input:checked[type=radio] {
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e);
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
        justify-content: center;
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

    .pagination>li:first-child {
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .pagination>li:nth-child(4n) {
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
    }

    .dataTables_paginate {
        display: none;
    }

    .dataTables_info {
        display: none;
    }

    .browserbox {
        display: none;
    }

    table {
        width: 100% !important;
    }

    /* .filter-db {
        display: flex;
        justify-content: space-between;
    } */

    .dt-toolbar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 20px;
        margin-bottom: 15px;
    }

    .dataTables_length,
    .dataTables_filter,
    .dt-custom-controls,
    .dt-buttons {
        margin: 0 !important;
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
                                    <h4 class="card-title">Current Bets</h4>
                                </div>
                                <div class="card-body container-fluid container-fluid-5">
                                    <div class="report-form">
                                        <div class="row row5">
                                            <div class="col-lg-2 col-md-3">
                                                <div class="mb-2 input-group form-group position-relative">
                                                    <select name="reportType" id="report_type" class="custom-select">
                                                        <option value="">Select Report Type</option>
                                                        <option value="sports">Sports</option>
                                                        <option value="casino">Casino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="get_account_statement();">Submit</button></div>
                                        </div>
                                        <!-- <div class="row row5 mt-2 justify-content-between align-items-center">
                                            <div class="col-lg-2 col-5">
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
                                            <div class="col-lg-4 col-md-6 col-7 text-center">
                                            <div class="form-check form-check-inline"><input type="radio" class="form-check-input" id="all" name="filter" value="all" checked="">All<label class="form-check-label" for="all"></label></div>
                                            <div class="form-check form-check-inline"><input type="radio" class="form-check-input" id="back" name="filter" value="all">Back<label class="form-check-label" for="back"></label></div>
                                            <div class="form-check form-check-inline"><input type="radio" class="form-check-input" id="lay" name="filter" value="all">Lay<label class="form-check-label" for="lay"></label></div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 text-left col-7">
                                            <div>Total Bets: <span class="me-2">0</span> Total Amount: <span class="me-2">0</span></div>
                                            </div>
                                            <div class="col-lg-2 col-5">
                                            <div class="mb-2 input-group position-relative"><span class="me-2">Search:</span><input type="search" class="form-control" placeholder="0 records..." value=""></div>
                                            </div>
                                        </div> -->
                                        <div class="mt-2 table-responsive">
                                            <table role="table" aria-busy="false" aria-colcount="6" class="table table-bordered" id="account_history_table">
                                                <thead>
                                                    <tr role="row">
                                                        <th colspan="1" role="columnheader" class="report-sport common">Sports</th>
                                                        <th colspan="1" role="columnheader">Event Name</th>
                                                        <th colspan="1" role="columnheader" class="common">Market Name</th>
                                                        <th colspan="1" role="columnheader">Nation</th>
                                                        <th colspan="1" role="columnheader" class="report-amount text-end">User Rate</th>
                                                        <th colspan="1" role="columnheader" class="report-amount text-end">Amount</th>
                                                        <th colspan="1" role="columnheader" class="report-date">Place Date</th>
                                                        <th colspan="1" role="columnheader" class="report-action">
                                                            <div class="text-end">
                                                                <div class="form-check form-check-inline"><input type="checkbox" class="form-check-input" title="Toggle All Current Page Rows Selected" style="cursor: pointer;"></div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody role="rowgroup"></tbody>
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
    var initialTotals = {
        total_bets: null,
        total_amount: null
    };

    function get_account_statement() {
        $(".loader").show();

        // Get the report type and bet type
        var report_type = $("#report_type").val();
        if (report_type == "") {
            // Display error if no report type is selected
            $("#bet-error-class").addClass("b-toast-danger");
            $("#errorMsgText").text("Select report type!");
            $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
            $(".loader").hide();
            return;
        }

        $(".common").hide();
        if (report_type == "sports") {
            $(".common").show();
        }

        var selectedBetType = $('input[name="betType"]:checked').val();
        var account_html = "";

        if ($.fn.DataTable.isDataTable('#account_history_table')) {
            $("#account_history_table").DataTable().destroy();
        }
        table = $('#account_history_table').dataTable({
            bProcessing: true,
            bServerSide: true,
            sAjaxSource: "../ajaxfiles/current_bet.php",
            iDisplayLength: 10,
            lengthMenu: [
                [10, 50, 100, 200, 500, 1000, -1],
                [10, 50, 100, 200, 500, 1000, "All"]
            ],
            fnServerData: function(sSource, aoData, fnCallback) {
                aoData.push({
                    name: "report_type",
                    value: report_type
                });
                aoData.push({
                    name: "BetType",
                    value: selectedBetType
                });

                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: sSource,
                    data: aoData,
                    success: function(json) {
                        $(".pagination-container").show();
                        $(".loader").hide();

                        initialTotals.total_bets = json.total_bets;
                        initialTotals.total_amount = json.total_amount;
                        $(".tot_bets").text(initialTotals.total_bets); // Set totals for the first time
                        $(".tot_amount").text(initialTotals.total_amount);


                        fnCallback(json);
                        updatePaginationControls();
                    }
                });
            },
            fnRowCallback: function(nRow, aData, iDisplayIndex) {
                $(".loader").hide();
                return nRow;
            },
             createdRow: function(row, data, index) {
                if (data.bet_type == "Back" || data.bet_type == "Yes") {
                    $(row).addClass('back');
                } else {
                    $(row).addClass('lay');
                }
            },
            aoColumns: [{
                    mDataProp: "event_type_label",
                    bSortable: false,
                    visible: report_type == "sports"
                },
                {
                    mDataProp: "event_name",
                    bSortable: false
                },
                {
                    mDataProp: "market_name",
                    bSortable: false,
                    visible: report_type == "sports"
                },
                {
                    mDataProp: "nation",
                    bSortable: false
                },
                {
                    mDataProp: "user_rate",
                    bSortable: false
                },
                {
                    mDataProp: "amount",
                    bSortable: false
                },
                {
                    mDataProp: "datetime",
                    bSortable: false
                },
                {
                    mDataProp: "action",
                    bSortable: false
                }
            ],
            dom: '<"dt-toolbar"lfrB>tp', // B for buttons
            initComplete: function(nRow, aData, iDisplayIndex) {
                // Define the radio buttons HTML
                var radioHtml = `
                <div class="dt-custom-controls justify-content-around d-flex align-items-center" style="gap: 15px;flex:2;">
                    <div class="d-flex align-items-center" style="gap: 10px;">
                    
                        <div class="form-check form-check-inline">
                            <input type="radio" class="betType form-check-input" id="all" name="betType" value="all" checked>
                            <label class="form-check-label" for="all">All</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="betType form-check-input" id="back" name="betType" value="back">
                            <label class="form-check-label" for="back">Back</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="betType form-check-input" id="lay" name="betType" value="lay">
                            <label class="form-check-label" for="lay">Lay</label>
                        </div>
                    </div>
                    <div>
                        Total Bets: <span class="tot_bets">0</span> |
                        Total Amount: <span class="tot_amount">0</span>
                    </div>
                </div>
            `;

                // Append the radio buttons after the DataTable length menu
                $(".dataTables_length").after(radioHtml);

                // Update totals if data is available
                if (initialTotals.total_bets !== null && initialTotals.total_amount !== null) {
                    $(".tot_bets").text(initialTotals.total_bets);
                    $(".tot_amount").text(initialTotals.total_amount);
                }

                // Set up change handler for bet type radio buttons
                $(".betType").on("change", function() {
                    // Update the selected bet type based on the radio button selection
                    selectedBetType = $('input[name="betType"]:checked').val();
                    table.api().ajax.reload();
                });
            }
        });
    }

    function updatePaginationControls() {
        if (table) {
            $('.dataTables_wrapper select, .dataTables_wrapper input[type="search"]').addClass('form-control');
            let pageInfo = table.api().page.info();
            console.log("pageInfo=", pageInfo);
            $("#pageNumber").val(pageInfo.page + 1);
            $("#currentpage").text(pageInfo.page + 1);
            $("#totalPages").text(pageInfo.pages);
        }
    }

    // Pagination Button Handlers
    $("#firstPage").on("click", function() {
        if (table) table.api().page('first').draw('page');
    });

    $("#prevPage").on("click", function() {
        if (table) table.api().page('previous').draw('page');
    });

    $("#nextPage").on("click", function() {
        if (table) table.api().page('next').draw('page');
    });

    $("#lastPage").on("click", function() {
        if (table) table.api().page('last').draw('page');
    });

    $("#pageNumber").on("change", function() {
        let pageNum = parseInt($(this).val(), 10) - 1;
        if (!isNaN(pageNum) && table) {
            table.api().page(pageNum).draw('page');
        }
    });

    $(document).on('change', '#report_type', function(e) {
        var report_type = $(this).val();
        $(".common").hide();
        if (report_type == "sports") {
            $(".common").show();
        }
        loadtables(); // Reload tables when the report type changes
    });

    $(document).ready(function() {
        loadtables();
        $(".common").hide();
    });

    function loadtables() {
        // Check if the table element exists
        var report_type = $("#report_type").val();
        if ($.fn.DataTable.isDataTable('#account_history_table')) {
            $('#account_history_table').DataTable().clear().destroy();
        }
        var columnDefs = [];
        if (report_type === "sports") {
            columnDefs.push({
                mDataProp: "event_type_label",
                bSortable: false
            });
        }
        columnDefs.push({
            mDataProp: "event_name",
            bSortable: false
        });
        if (report_type === "sports") {
            columnDefs.push({
                mDataProp: "market_name",
                bSortable: false
            });
        }
        columnDefs.push({
            mDataProp: "nation",
            bSortable: false
        }, {
            mDataProp: "user_rate",
            bSortable: false
        }, {
            mDataProp: "amount",
            bSortable: false
        }, {
            mDataProp: "datetime",
            bSortable: false
        });
        // Initialize DataTable
        table = $('#account_history_table').dataTable({
            aoColumns: columnDefs,
            dom: '<"dt-toolbar"lfrB>tp', // B for buttons
            initComplete: function() {
                // Add radio buttons for bet type
                var radioHtml = `
                <div class="dt-custom-controls justify-content-around d-flex align-items-center" style="gap: 15px;flex:2;">
                    <div class="d-flex align-items-center" style="gap: 10px;">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="betType form-check-input" id="all" name="betType" value="all" checked>
                            <label class="form-check-label" for="all">All</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="betType form-check-input" id="back" name="betType" value="back">
                            <label class="form-check-label" for="back">Back</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="betType form-check-input" id="lay" name="betType" value="lay">
                            <label class="form-check-label" for="lay">Lay</label>
                        </div>
                    </div>
                    <div>
                        Total Bets: <span class="tot_bets">0</span> |
                        Total Amount: <span class="tot_amount">0</span>
                    </div>
                </div>
            `;
                $(".dataTables_length").after(radioHtml);
            }
        });

        table.api().clear().draw();
        $('.dataTables_empty').hide();
        $(".pagination-container").hide();
        $('.dataTables_wrapper select, .dataTables_wrapper input[type="search"]').addClass('form-control');

    }
</script>

<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
    <div class="b-toaster-slot vue-portal-target">
        <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
            <div tabindex="0" class="toast">
                <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                    <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
                </header>
                <div class="toast-body"> </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>