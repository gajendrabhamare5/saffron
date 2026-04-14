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
.answer-name.false {
    background-color: #fc4242;
}
.answer-name.true {
    background-color: #03b37f;
}
   .answer-name {
    width: 80%;
    padding: 6px;
    margin: 0 auto;
    color: #fff;
    text-align: center;
    border: 3px solid #72bbef;
    border-top: 0;
}
.question-name {
    width: 100%;
    background: #46A29F;
    border-radius: 12px;
    color: var(--text-secondary);
    padding: 6px;
    border: 1px solid var(--text-fancy);
    text-align: center;
}
.kbc-result-box .kbchf .kbc-result-box-five{
    border: 1px solid #115dbf;
    color: #115dbf;
    padding: 5px;
    font-weight: bold;
    text-transform: uppercase;
    
} 

.kbc-result-box .kbchf .kbc-result-box-half {
    border: 1px solid #03b37f;
    color: #03b37f;
    padding: 5px;
    font-weight: bold;
    text-transform: uppercase;
}
.kbc-result-box .kbchf .kbc-result-box-full {
    border: 1px solid #fc4242;
    color: #fc4242;
    padding: 5px;
    font-weight: bold;
    text-transform: uppercase;
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
                        <h4 class="mb-0">Account Statement</h4>
                    </div>
                    <div class="card-body container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-6">
                            <div class="date-container">
                                <input type="date" name="from_date" id="from_date" class="form-control" value="<?php echo date("Y-m-d", strtotime("-7 days")); ?>">
                                    <i class="far fa-calendar mr-2"></i>
                            </div>
                                
                            </div>
                            <div class="col-6">
                            <div class="date-container">
                                <input type="date" name="to_date" id="to_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                <i class="far fa-calendar mr-2"></i>
                            </div>
                               
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <select name="reportType" id="report_type" class="custom-select">
                                      <!--   <option value="1">All</option> -->
                                        <option value="2">Deposit/Withdraw Report</option>
                                        <option value="4">Sport Report</option>
                                        <option value="5">Casino Reports</option>
                                        <option value="6">Third-Party Casino Reports</option>
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
                                                <th role="columnheader" scope="col" aria-colindex="1" class="report-date text-center">Date</th>
                                                <th role="columnheader" scope="col" aria-colindex="2" class="report-sr text-right">Sr no</th>
                                                <th role="columnheader" scope="col" aria-colindex="3" class="report-amount text-right">Credit</th>
                                                <th role="columnheader" scope="col" aria-colindex="4" class="report-amount text-right">Debit</th>
                                                <th role="columnheader" scope="col" aria-colindex="5" class="report-amount text-right">Pts</th>
                                                <th role="columnheader" scope="col" aria-colindex="6" class="text-center">Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody id="account_history">
                                            <!---->
                                            <!-- <tr role="row" class="b-table-empty-row">
                                                <td colspan="6" role="cell" class="">
                                                    <div role="alert" aria-live="polite">
                                                        <div class="text-center my-2">There are no records to show</div>
                                                    </div>
                                                </td>
                                            </tr> -->
                                            <!---->
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
<script src="../storage/js/jquery.dataTables.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="../storage/js/bootstrap.min.js" type="text/javascript"></script>
<script>
    var table;
    function get_account_statement() {
        $(".loader").show();
        from_date = $("#from_date").val();
        to_date = $("#to_date").val();
        report_type = $("#report_type").val();
        var account_html = "";
        if ($.fn.DataTable.isDataTable('#account_history_table')) {
            $("#account_history_table").DataTable().destroy();
        }
        /* table = $('#account_history_table').dataTable({
            bProcessing: true,
            bServerSide: true,
            sAjaxSource: "../ajaxfiles/account_statement.php",
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
                    mDataProp: "date",
                    bSortable: false
                },
                {
                    mDataProp: "srno",
                    bSortable: false
                },
                {
                    mDataProp: "credit",
                    bSortable: false
                },
                {
                    mDataProp: "debit",
                    bSortable: false,
                },
                {
                    mDataProp: "balance",
                    bSortable: false,
                },
                {
                    mDataProp: "remark",
                    bSortable: false,
                }
            ],
        }); */
        $.ajax({
            type: 'POST',
            url: '../ajaxfiles/account_statement.php',
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
var color="";
if(c_balance >0){
    color = "green";
}
if(c_balance <0){
    color = "red";
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
                        account_html += "<td>" + account_date_time + "</td>";
                        account_html += "<td>" + sr_no + "</td>";
                        account_html += "<td style='color:green;'>" + credit_amount + "</td>";
                        account_html += "<td style='color:red;'>" + debit_amount + "</td>";
                        account_html += `<td style='color:${color}'>${c_balance.toFixed(2)}</td>`;
                        account_html += "<td style='text-align:center;'>" + remakrs + "</td>";
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

 
    $(document).on("click", ".bet_shows", function () {
        var bet_id = $(this).data('bet_id');
       
        if($('.extra_'+bet_id).length > 0){
             $(".extradiv").html("");
            return true;
        }
         $(".extradiv").html("");
        $.ajax({
            type: 'POST',
            url: '../ajaxfiles/account_bet_statement_kbc.php',
            dataType: 'JSON',
            data: {
                bet_id: bet_id,
            },
            success: function(response) {
                data_bets = response.data;
                bet_type_kbc = response.bet_type;
                if(data_bets.length > 0){
                    var html=`<div class="extradiv"><div class="extra_${bet_id} kbc-result-box d-flex flex-wrap justify-content-between align-items-center flex-1 mt-3">`;
                    data_bets.forEach(element => {
                        console.log("element=",element);
                        html+=`<div class="casino-box-row">
                                <div class="question-name"><b>${element.qus}</b></div>
                                <div class="answer-name ${element.statuss}">${element.market_name}</div>
                            </div>`;
                    });
                    var typee="";
                    if(bet_type_kbc == "5"){
                        typee=`<div class="kbc-result-box-five">5 Cards</div>`;
                    }
                    if(bet_type_kbc == "4"){
                        typee=`<div class="kbc-result-box-half">4 Cards Quit</div>`;
                    }
                    if(bet_type_kbc == "50"){
                        typee=`<div class="kbc-result-box-full">50-50 Quit</div>`;
                    }
                    html+=`<div class="casino-box-row">
                            <div class="kbchf">
                            ${typee}
                            </div>
                        </div>
                    </div></div>`;
                    console.log(html);
                    $("."+bet_id).after(html);

                }
                
            }
        });
    });

    function view_account_bet(bet_time, event_id, game_type, event_type, market_id, market_type) {
        $.ajax({
            type: 'POST',
            url: '../ajaxfiles/account_bet_statement_mobile.php',
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
                console.log("response",response);
                
                $("#bet_time").val(bet_time);
                $("#account_bet_statement").html(response);
                $('#account_bet_popup').modal("show");
            }
        });
    }
    $(document).ready(function() {
        $("#account_history_table").DataTable({});
        $('.dataTables_empty').hide();
        $(".pagination-container").hide();
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
<?php
include "footer.php";
?>

</html>

<div id="account_bet_popup" class="modal" role="dialog">
    <div class="modal-dialog" style="    max-width: 100% !important;">
        <div class="modal-dialog modal-md">
            <div role="document" id="__BVID__46___BV_modal_content_" tabindex="-1" class="modal-content">
                <!---->
                <div id="__BVID__46___BV_modal_body_" class="modal-body">
                    <div class="container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-12 text-center">
                                <div id="match_delete" role="radiogroup" tabindex="-1">
                                     <div class="custom-control custom-control-inline custom-radio">
                                        <input id="matched" type="radio" name="match_delete" autocomplete="off" value="1" checked="checked" class="custom-control-input">
                                        <label for="matched" class="custom-control-label"><span>Matched</span></label>
                                    </div> 
                                     <!-- <div class="custom-control custom-control-inline custom-radio">
                                    <input id="all" type="radio" name="match_delete" autocomplete="off" value="0"
                                        class="custom-control-input" checked>
                                    <label for="all" class="custom-control-label"><span>All</span></label>
                                </div>
                            
                                <div class="custom-control custom-control-inline custom-radio">
                                    <input id="matched_back" type="radio" name="match_delete" autocomplete="off" value="Back"
                                        class="custom-control-input">
                                    <label for="matched_back" class="custom-control-label"><span>Back</span></label>
                                </div>
                                <div class="custom-control custom-control-inline custom-radio">
                                    <input id="matched_lay" type="radio" name="match_delete" autocomplete="off" value="Lay"
                                        class="custom-control-input">
                                    <label for="matched_lay" class="custom-control-label"><span>Lay</span></label>
                                </div> -->
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="deleteed" type="radio" name="match_delete" autocomplete="off" value="2" class="custom-control-input">
                                        <label for="deleteed" class="custom-control-label"><span>Deleted</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row5">
                            <input type="hidden" name="bet_time" id="bet_time" />
                            <div class="col-12" id="account_bet_statement">


                            </div>
                        </div>
                    </div>
                </div>
                <footer id="__BVID__46___BV_modal_footer_" class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        Cancel
                    </button>
                </footer>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>