<?php
include("../include/conn.php");
include("../include/flip_function.php");
include("../session.php");
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");

?>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: unset;
    }


    a.button.btn.btn-diamond {
        margin: 0 4px 4px 0;
    }
</style>
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
        text-align: left;
    }

    
</style>
<style>
        /* Custom Pagination Styling */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            flex-wrap: wrap;
            flex-direction: column;
        }
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }
        .pagination li {
            margin: 0 2px;
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .pagination button {
            padding: 5px 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            cursor: pointer;
        }
        .pagination button:hover {
            background-color: #f2f2f2;
        }
        .page-input {
            width: 100px;
            text-align: center;
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

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div>
            <?php
            include("header.php");
            ?>
            <div class="report-container account_stat">
                <!---->

                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Activity Log</h4>
                    </div>
                    <div class="card-body container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-6">
                            <div class="date-container">
    <input  type="date" name="from_date" id="from_date" class="form-control" value="<?php echo date("Y-m-d", strtotime("-7 days")); ?>">
        <i class="far fa-calendar mr-2"></i>
</div>
                              <!--   <div class="form-group mb-0">
                                    <input type="date" name="from_date" id="from_date" class="form-control" value="<?php echo date("Y-m-d", strtotime("-7 days")); ?>" />
                                </div> -->
                            </div>
                            <div class="col-6">
                            <div class="date-container">
    <input  type="date" name="to_date" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
        <i class="far fa-calendar mr-2"></i>
</div>
                               <!--  <div class="form-group mb-0">
                                    <input type="date" name="to_date" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>" />
                                </div> -->
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <select name="reportType" id="report_type" class="custom-select">
                                        <option value="">Select Log Type</option>
                                        <option value="endlogin">Login</option>
                                        <option value="password">Change Password</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-sm" onclick="get_account_statement();">Submit</button>
                            </div>
                        </div>
                        <!---->
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-bordered" id="account_history_table">
                                        <!---->
                                        <!---->
                                        <thead role="rowgroup" class="">
                                            <!---->
                                            <tr role="row" class="">
                                                <th role="columnheader" scope="col" aria-colindex="1" class="">Username</th>
                                                <th role="columnheader" scope="col" aria-colindex="2" class="">Date</th>
                                                <th role="columnheader" scope="col" aria-colindex="3" class="">Ip Address</th>
                                                <th role="columnheader" scope="col" aria-colindex="4" class="browserbox">Browser Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody id="account_history">
                                           
                                            <!-- <tr role="row" class="b-table-empty-row">
                                                <td colspan="3" role="cell" class="maintd">
                                                    <div role="alert" aria-live="polite">
                                                        <div class="text-center my-2">There are no records to show</div>
                                                    </div>
                                                </td>
                                            </tr> -->
                                          
                                        </tbody>
                                        <!---->
                                    </table>
                                    <div class="pagination-container">
        <ul class="pagination">
            <li><button id="firstPage">First</button></li>
            <li><button id="prevPage">Previous</button></li>
            <li><button id="nextPage">Next</button></li>
            <li><button id="lastPage">Last</button></li>
        </ul>
        <ul class="pagination">
        <li><span class="me-2">Page <b><span id="currentpage">1</span> of <span id="totalPages">1</span></b></span> | Go to Page <input type="text" id="pageNumber" class="page-input form-control" value="1"></li>
        </ul>
    </div>
   
                                 
                                </div>
                            </div>
                            <!---->
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <!---->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../storage/js/jquery.dataTables.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">


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
<?php
include "footer.php";
?>

</html>

<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
<div class="b-toaster-slot vue-portal-target">
    <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
        <div tabindex="0"  class="toast">
            <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>