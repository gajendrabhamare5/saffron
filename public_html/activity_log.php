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

    .fa-calendar:before {
        content: "\f133";
    }

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
        background-color:  var(--theme1-bg);
        color: #ffffff;
        border-color:  var(--theme1-bg);
    }

    .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
        background-color:  var(--theme1-bg);
        color: ffffff;
        border-color:  var(--theme1-bg);
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

    .table-responsive {
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

    tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
    }

    tbody, td, tfoot, th, thead, tr {
        border-color: #c7c8ca;
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
        width: 190px;
    }

    .report-sr {
        width: 70px;
    }

    .report-amount {
        width: 100px;
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
        .browserbox{
            display: none;
        }
        table{
            width: 100% !important;
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
                                    <h4 class="card-title">Activity Log</h4>
                                </div>
                                <div class="card-body container-fluid container-fluid-5">
                                    <div class="report-form">
                                        <div class="row row5">
                                            <div class="col-lg-2 col-md-3 col-6">
                                            <div class="react-datepicker-wrapper">
                                                <div class="react-datepicker__input-container">
                                                    <div class="mb-2 custom-datepicker date-container"><input  type="date" name="from_date" id="from_date" class="form-control" value="<?php echo date("Y-m-d", strtotime("-7 days")); ?>">
                                                        <!-- <i class="far fa-calendar mr-2"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-6">
                                            <div class="react-datepicker-wrapper">
                                                <div class="react-datepicker__input-container">
                                                    <div class="mb-2 custom-datepicker date-container"><input  type="date" name="to_date" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                                        <!-- <i class="far fa-calendar mr-2"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-3">
                                            <div class="mb-2 input-group form-group position-relative">
                                                <select name="reportType" id="report_type" class="custom-select">
                                                    <option value="">Select Log Type</option>
                                                    <option value="endlogin">Login</option>
                                                    <option value="password">Change Password</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="get_account_statement();">Submit</button></div>
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
                                            <table role="table"  aria-busy="false" aria-colcount="6" class="table table-bordered" id="account_history_table">
                                            <thead role="rowgroup" class="">
                                                <tr role="row">
                                                    <th colspan="1" role="columnheader">Username</th>
                                                    <th colspan="1" role="columnheader">Date</th>
                                                    <th colspan="1" role="columnheader">Ip Address</th>
                                                    <th colspan="1" role="columnheader" class="browserbox">Browser Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody role="rowgroup" id="account_history">

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
        from_date = $("#from_date").val();
        to_date = $("#to_date").val();
        var report_type = $("#report_type").val();
        if(report_type == ""){
            $("#bet-error-class").addClass("b-toast-danger");
            $("#errorMsgText").text("select log type !");
            $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
            $(".loader").hide();
            return;
        }
        $(".browserbox").hide();
        if(report_type == "password"){
            $(".browserbox").show();
           
        }
        var account_html = "";
        if ($.fn.DataTable.isDataTable('#account_history_table')) {
            $("#account_history_table").DataTable().destroy();
        }
        
        table = $('#account_history_table').dataTable({
            bProcessing: true,
            bServerSide: true,
            sAjaxSource: "../ajaxfiles/activity_log.php",
            iDisplayLength: 10,
            lengthMenu: [
                [10, 50, 100, 200, 500, 1000, -1],
                [10, 50, 100, 200, 500, 1000, "All"],
            ],
            fnServerData: function(sSource, aoData, fnCallback) {
                aoData.push({
                    name: "from_date",
                    value: from_date,
                });
                aoData.push({
                    name: "to_date",
                    value: to_date,
                });
                aoData.push({
                    name: "report_type",
                    value: report_type,
                });
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: sSource,
                    data: aoData,
                    success: function(json) {
                        $(".pagination-container").show();
                        $(".loader").hide();                        
                        
                        fnCallback(json);
                        /* tableNew.api().draw(false); */
                        updatePaginationControls();
                    },
                });
            },
            fnRowCallback: function(nRow, aData, iDisplayIndex) {

                $(".loader").hide();
                
                return nRow;
            },
            aoColumns: [
                {
                    mDataProp: "user",
                    bSortable: false
                },
                {
                    mDataProp: "date",
                    bSortable: false
                },
                {
                    mDataProp: "ip",
                    bSortable: false
                },                
                ...(report_type === "password" ? [{
        mDataProp: "browser",
        bSortable: false
    }] : [])
            ],
        });
      
        /* $.ajax({
            type: 'POST',
            url: '../ajaxfiles/activity_log.php',
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
                    $(".pagination-container").show();
                    data = response.data;
                    c_balance = 0;
                    for (var i in data) {
                        sr_no = parseInt(i) + 1;
                        login_date_time = data[i]['date_time'];
                        username = data[i]['username'];
                        ip_address = data[i]['ip_address'];
                        user_agent = data[i]['user_agent'];
                        
                            account_html += "<tr>";
                        
                        account_html += "<td>" + username + "</td>";
                        account_html += "<td>" + login_date_time + "</td>";
                        account_html += "<td>" + ip_address + "</td>";
                        if(report_type == "password"){
                            account_html += "<td>" + user_agent + "</td>";
                        }
                        account_html += "</tr>";
                    }

                    $("#account_history").html(account_html);
                    if ($.fn.DataTable.isDataTable('#account_history_table')) {
            $("#account_history_table").DataTable().destroy();
        }
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

                }else{
                    $("#bet-error-class").addClass("b-toast-danger");
                    $("#errorMsgText").text(response.message);
                    $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
                    $(".loader").hide();
                    return;
                }
            }
        }); */
    }

    function updatePaginationControls() {
        if (table) { 
            $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');
            let pageInfo = table.api().page.info();
            console.log("pageInfo=",pageInfo);
            console.log("pageInfo=",pageInfo.page + 1);
            $("#pageNumber").val(pageInfo.page + 1);
            $("#currentpage").text(pageInfo.page + 1);
            $("#totalPages").text(pageInfo.pages);
        }
    }

    // Pagination Button Handlers
    $("#firstPage").on("click", function () {
        if (table) table.api().page('first').draw('page');
    });

    $("#prevPage").on("click", function () {
        if (table) table.api().page('previous').draw('page');
    });

    $("#nextPage").on("click", function () {
        if (table) table.api().page('next').draw('page');
    });

    $("#lastPage").on("click", function () {
        if (table) table.api().page('last').draw('page');
    });

    $("#pageNumber").on("change", function () {
        let pageNum = parseInt($(this).val(), 10) - 1;
        if (!isNaN(pageNum) && table) {
            table.api().page(pageNum).draw('page');
        }
    });
    $(document).on('change','#report_type',function(e){
    
        var report_type=$(this).val();
       
        $(".browserbox").hide();
        if(report_type == "password"){
            console.log("report_type=",report_type);
            $(".browserbox").show();
        }
        loadtables();
       /*  get_account_statement(); */
});
    $(document).ready(function() {
        loadtables();
        $(".browserbox").hide();
    });
    function loadtables(){
        var report_type = $("#report_type").val();
        console.log("report_type1=",report_type);
        if ($.fn.DataTable.isDataTable('#account_history_table')) {
        $('#account_history_table').DataTable().clear().destroy();
    }

    // Define column configuration dynamically based on report_type
    var columnDefs = [
        {
            mDataProp: "user",
            bSortable: false
        },
        {
            mDataProp: "date",
            bSortable: false
        },
        {
            mDataProp: "ip",
            bSortable: false
        }
    ];

    // Add browser column for "password" report type
    if (report_type === "password") {
        columnDefs.push({
            mDataProp: "browser",
            bSortable: false
        });
    }

    // Initialize DataTable with new column configuration
    table = $('#account_history_table').DataTable({
        aoColumns: columnDefs,
    });

    // Clear and redraw the table after initialization
    table.clear().draw();
        $('.dataTables_empty').hide();
        $(".pagination-container").hide();
        $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');
    }
</script>

<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>