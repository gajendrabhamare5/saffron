<?php
include('../include/conn.php');
include "session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo SITE_NAME; ?> | Bet History</title>
    <?php

    include("header.php");
    ?>
    <link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <style>
        .ui-autocomplete {
            position: absolute;
            z-index: 1000;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .ui-autocomplete>li {
            padding: 3px 20px;
            border-bottom: 1px solid #ccc;
            font-size: 16px;
        }

        .ui-autocomplete>li.ui-state-focus {
            background-color: #DDD;
        }

        .ui-helper-hidden-accessible {
            display: none;
        }
    </style>
    <div class="right_col" role="main" style="min-height: 1171px;">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Bet History</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">

                        <div class="x_content">

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" id="datatable">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title" style="display: table-cell;">User Name</th>

                                            <th class="column-title" style="display: table-cell;">Event Name </th>
                                            <th class="column-title" style="display: table-cell;">Market </th>
                                            <th class="column-title" style="display: table-cell;">Type </th>
                                            <th class="column-title" style="display: table-cell;">Stake </th>
                                            <th class="column-title" style="display: table-cell;">Rate</th>
                                            <th class="column-title" style="display: table-cell;">Odds</th>
                                            <th class="column-title" style="display: table-cell;">Result</th>
                                            <th class="column-title" style="display: table-cell;">Status</th>
                                           
                                            <th class="column-title" style="display: table-cell;">Date Time</th>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php


                                       
                                            if ($login_type == 5) {
                                                $get_pnl_report  = $conn->query("select * from bet_details_deleted as b order by bet_deleted_id desc limit 10");



                                                $get_pnl_report_casino  = $conn->query("select * from bet_teen_details_deleted as b order by bet_deleted_id desc limit 10");
                                            }


                                            $all_master_details = array();
                                            $get_all_user_data = $conn->query("select * from user_login_master where UserType=1");
                                            while ($fetch_get_all_user_data = mysqli_fetch_assoc($get_all_user_data)) {
                                                $user_id = $fetch_get_all_user_data['UserID'];
                                                $master_emaild = $fetch_get_all_user_data['Email_ID'];
                                                $all_master_details[$user_id] = $master_emaild;
                                            }

                                            while ($fetch_pnrl_report = mysqli_fetch_assoc($get_pnl_report)) {
                                        ?>
                                                <tr>

                                                    <td>
                                                        <?php
                                                        $userid=$fetch_pnrl_report['user_id'];
                                                        $dl_email = $all_master_details[$userid];
                                
                                                        echo strip_tags($dl_email);
                                                        ?>
                                                    </td>
                                                   
                                                    <td><?php echo $fetch_pnrl_report['event_name']; ?></td>
                                                    <td><?php echo $fetch_pnrl_report['market_name']; ?></td>
                                                    <td><?php echo $fetch_pnrl_report['bet_type']; ?></td>
                                                    <td><?php echo $fetch_pnrl_report['bet_stack']; ?></td>
                                                    <td><?php echo $fetch_pnrl_report['bet_runs']; ?></td>
                                                    <td><?php echo $fetch_pnrl_report['bet_odds']; ?></td>
                                                    <td><?php echo $fetch_pnrl_report['bet_result']; ?></td>
                                                    <td><?php
                                                        if ($fetch_pnrl_report['bet_result'] > 0) {
                                                            echo "Client Win";
                                                        } else if ($fetch_pnrl_report['bet_result'] < 0) {
                                                            echo "Client Loss";
                                                        } else {
                                                            echo "No Result";
                                                        }
                                                        ?></td>

                                                    
                                                    <td><?php echo date("d-m-Y H:i:s", strtotime($fetch_pnrl_report['bet_time'])); ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }


                                            while ($fetch_get_pnl_report_casino = mysqli_fetch_assoc($get_pnl_report_casino)) {
                                            ?>
                                                <tr>

                                                    <td>
                                                        <?php
                                                        $userid=$fetch_get_pnl_report_casino['user_id'];
                                                        $dl_email = $all_master_details[$userid];
                                
                                                        echo strip_tags($dl_email);
                                                        ?>
                                                    </td>

                                                    
                                                    <td><?php echo $fetch_get_pnl_report_casino['event_name'] . " (" . $fetch_get_pnl_report_casino['event_id'] . ")"; ?></td>

                                                    <td><?php echo $fetch_get_pnl_report_casino['market_name']; ?></td>
                                                    <td><?php echo $fetch_get_pnl_report_casino['bet_type']; ?></td>
                                                    <td><?php echo $fetch_get_pnl_report_casino['bet_stack']; ?></td>
                                                    <td><?php echo $fetch_get_pnl_report_casino['bet_runs']; ?></td>
                                                    <td><?php echo $fetch_get_pnl_report_casino['bet_odds']; ?></td>
                                                    <td><?php echo $fetch_get_pnl_report_casino['bet_result']; ?></td>
                                                    <td><?php
                                                        if ($fetch_get_pnl_report_casino['bet_result'] > 0) {
                                                            echo "Client Win";
                                                        } else if ($fetch_get_pnl_report_casino['bet_result'] < 0) {
                                                            echo "Client Loss";
                                                        } else {
                                                            echo "No Result";
                                                        }
                                                        ?></td>

                                                   

                                                    <td><?php echo date("d-m-Y H:i:s", strtotime($fetch_get_pnl_report_casino['bet_time'])); ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                       

                                        ?>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>

    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
    <script src="assets/vendors/jszip/dist/jszip.min.js" type="text/javascript"></script>
    <script src="assets/vendors/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/vendors/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>

    <script src="assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>

</html>