<?php
include('../include/conn.php');
include "session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <title><?php echo SITE_NAME; ?> | Live Casino</title>
    <?php

    include("header.php");
    ?>
    <style>
        .custom_btn {
            background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
            border: 1px solid rgba(0, 0, 0, 0.3);
            margin-left: 0.167em;
            margin-right: 0.167em;
            margin-bottom: 0.333em;
            height: 30px;
            width: 30px;
        }

        .custom_btn2 {
            background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
            border: 1px solid rgba(0, 0, 0, 0.3);
            margin-left: 0.167em;
            margin-right: 0.167em;
            margin-bottom: 0.333em;
            height: 30px;
            width: 75px;
        }

        .custom_btn3 {
            background: #2a3f54;
            color: white;
            border: 1px solid rgba(0, 0, 0, 0.3);
            margin-left: 0.167em;
            margin-right: 0.167em;
            margin-bottom: 0.333em;
            height: 30px;
            width: 75px;
            pointer-events: none;
            display: none;
        }

        .dataTables_filter {
            width: unset !important;
        }

        div.dt-buttons {
            float: right;
        }

        .img-wrap {
            position: relative;
            display: inline-block;
            border: 1px red solid;
            font-size: 0;
        }

        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            background-color: #FFF;
            padding: 5px 2px 2px;
            color: red;
            font-weight: bold;
            cursor: pointer;
            opacity: 1;
            text-align: center;
            font-size: 22px;
            line-height: 10px;
            border-radius: 50%;
        }

        .img-wrap:hover .close {
            opacity: 1;
        }

        .remove_img_preview {
            position: absolute;
            /* top: -31px;
			right: 17px; */
            background: black;
            color: white;
            border-radius: 50px;
            font-size: 0.9em;
            padding: 0 0.3em 0;
            text-align: center;
            cursor: pointer;
            right: 42px;
        }

        .remove_img_preview:before {
            content: "×";
        }

        .gallery1 {
            display: grid;
            grid-template-columns: auto auto auto;
        }

        .gallery1 span[id*="1_"] {
            position: relative;
        }

        .gallery1 span[id*="1_"] img {
            max-height: 140px !important;
        }

        .gallerySec1 {
            display: grid;
            grid-template-columns: auto auto auto;
        }

        .gallerySec1 span[id*="1_"] {
            position: relative;
        }

        .gallerySec1 span[id*="1_"] img {
            max-height: 140px !important;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Exposure Remove</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Exposure Remove</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action dataTable no-footer nowrap display" id="example">
                                    <thead>
                                        <tr class="headings">

                                            <th class="column-title" style="display: table-cell;"></th>
                                            <th class="column-title" style="display: table-cell;">User Name</th>
                                            <th class="column-title" style="display: table-cell;">Event Name</th>
                                            <th class="column-title" style="display: table-cell;">Market Name</th>
                                            <th class="column-title" style="display: table-cell;">Market Type</th>
                                            <th class="column-title" style="display: table-cell;">Exposure Amount</th>
                                            <th class="column-title" style="display: table-cell;">Max Winning Amount</th>
                                            <th class="column-title" style="display: table-cell;">Date</th>
                                            <th class="column-title" style="display: table-cell;">Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <td colspan="4" class="dataTables_empty" style="text-align:center;">Loading data...</td>

                                        </tr>

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
    </body>

</html>

<!-- 


<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js" type="text/javascript"></script> -->

<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" type="text/javascript"></script>

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
    function show_banner_modal() {
        $("#modals-add").modal('show');
    }

   
    //Start View Record//
    $(function() {
        $('#example').dataTable({
            dom: 'Blfrtip',
            
            "aLengthMenu": [
                [10, 25, 50, 100, 200],
                [10, 25, 50, 100, 200]
            ],
            "processing": true,
            "serverSide": true,
            "responsive": false,
            "ordering": false,
            "stateSave": true,

            "order": [],
            "ajax": {
                "url": "ajaxfiles/view_exposure.php",
                "type": "POST"
            },

        });

    });

    function delete_exposure(id,bet_status) {
        if (bet_status == 1) {

            if (confirm("This exposure has active bets. Do you still want to delete?")) {
                deleteExposure(id);
            }

        } else {

            if (confirm("Are you sure you want to delete this record?")) {
                deleteExposure(id);
            }

        }
    }

    function deleteExposure(id) {

    $.ajax({
        type: 'POST',
        url: 'ajaxfiles/exposure_delete.php',
        dataType: 'JSON',
        data: {
            id: id,
            type: 'delete'
        },
        success: function(response) {

            if (response.status == "ok") {

                $(".alert-success1").text(response.message);
                $(".alert-success1").fadeIn('fast').delay(3000).hide(0);

                setTimeout(function() {
                    $('#example').DataTable().ajax.reload(null, false);
                }, 2000);

            } else {

                $(".alert-danger1").text(response.message);
                $(".alert-danger1").fadeIn('fast').delay(3000).hide(0);
            }
        }
    });

}

</script>