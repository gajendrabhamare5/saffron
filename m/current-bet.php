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

    /*  .form-check-input:checked[type=radio] {
    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e);
} */
    .form-check-input[type=radio] {
        border-radius: 50%;
    }

    .form-check-input:checked[type=radio] {
        background-image: url(../storage/download.svg);
    }

    .form-check-inline .form-check-input {
        position: static;
        margin-top: 0;
        margin-right: .3125rem;
        margin-left: 0;
    }

    .form-check-input:checked {
        background-color: #2C3E50;
        border-color: #2C3E50;
    }

    .form-check-input {
        width: 1em;
        height: 1em;
        margin-top: .25em;
        vertical-align: top;
        background-color: #fff;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        border: 1px solid rgba(0, 0, 0, .25);
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
    }

    .form-check-input[type=checkbox] {
        border-radius: .25em;
        margin-bottom: 8px;
        width: 13px;
        height: 13px;
    }

    .form-check {
        min-height: 1.5rem;
        /* padding-left: 1.5em; */
        margin-bottom: .125rem;
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
                        <h4 class="mb-0">Current Bets</h4>
                    </div>
                    <div class="card-body container-fluid container-fluid-5">
                        <!-- <div class="row row5">
                            <div class="col-6">
                                <div class="form-group mb-0">
                                    <input type="date" name="from_date" id="from_date" class="custom-text" value="<?php echo date("Y-m-d", strtotime("-7 days")); ?>" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-0">
                                    <input type="date" name="to_date" id="to_date" class="custom-text" value="<?php echo date("Y-m-d"); ?>" />
                                </div>
                            </div>
                        </div> -->
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <select name="reportType" id="report_type" class="custom-select">
                                        <option value="">Select Report Type</option>
                                        <option value="sports">Sports</option>
                                        <option value="casino">Casino</option>
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
                                        <thead>
                                            <tr class="headings">

                                                <th class="report-sport common">Sports</th>
                                                <th class="">Event name</th>
                                                <th class=" common">Market name</th>
                                                <th class="">Nation</th>
                                                <th class="report-amount text-right">User Rate</th>
                                                <th class="report-amount text-right">Amount</th>
                                                <th class="report-date">Place Date</th>
                                                <th class="report-action">
                                                    <div class="form-check form-check-inline"><input type="checkbox" class="form-check-input" title="Toggle All Current Page Rows Selected" style="cursor: pointer;"></div>
                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- <tbody>

                                    <tr>

                                        <td colspan="6" class="dataTables_empty" style="text-align:center;">Loading data...</td>

                                    </tr>



                                    </tbody> -->

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

                        </div>
                        <!-- <div class="row row5 mt-2">
                            <div class="col-12">

                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
include "footer.php";
?>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/js/jquery.dataTables.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="../storage/js/bootstrap.min.js" type="text/javascript"></script>

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
            dom: 'lfrBtp', // B for buttons
            initComplete: function(nRow, aData, iDisplayIndex) {
                // Define the radio buttons HTML
                var radioHtml = `
            <div class="radio-container" style="display: inline-block; margin-left: 15px;">
                <div class="form-check form-check-inline">
                    <input type="radio" class="betType mr-1 form-check-input" id="all" name="betType" value="all" checked="">All<label class="form-check-label" for="all"></label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="betType mr-1 form-check-input" id="back" name="betType" value="back">Back<label class="form-check-label" for="back"></label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="betType mr-1 form-check-input" id="lay" name="betType" value="lay">Lay<label class="form-check-label" for="lay"></label>
                </div>
            </div>
            <div>Total Bets: <span class="mr-2 tot_bets">0</span> Total Amount: <span class="mr-2 tot_amount">0</span></div>
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
            $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');
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
            dom: 'lfrBtp', // B for buttons
            initComplete: function() {
                // Add radio buttons for bet type
                var radioHtml = `
                <div class="radio-container" style="display: inline-block; margin-left: 15px;">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="betType mr-1 form-check-input" id="all" name="betType" value="all" checked="">All<label class="form-check-label" for="all"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="betType mr-1 form-check-input" id="back" name="betType" value="back">Back<label class="form-check-label" for="back"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="betType mr-1 form-check-input" id="lay" name="betType" value="lay">Lay<label class="form-check-label" for="lay"></label>
                    </div>
                </div>
                <div>Total Bets: <span class="mr-2 tot_bets">0</span> Total Amount: <span class="mr-2 tot_amount">0</span></div>
            `;
                $(".dataTables_length").after(radioHtml);
            }
        });

        table.api().clear().draw();
        $('.dataTables_empty').hide();
        $(".pagination-container").hide();
        $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');

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