<?php
include('../include/conn.php');
include "session.php";


$getTheme = $conn->query("SELECT * FROM theme_settings WHERE id=1");
$theme = mysqli_fetch_assoc($getTheme);
$theme1_color = $theme['theme1_color'];
$theme2_color = $theme['theme2_color'];
$primary_color = $theme['primary_color'];
$secondary_color = $theme['secondary_color'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo SITE_NAME; ?> | Theme Settings</title>
    <?php

    include("header.php");
    ?>

    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="assets/toastr.min.css" rel="stylesheet" />

    <div class="right_col" role="main" style="min-height: 1171px;">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Theme Color Update</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">
                        <form action="theme_color.php" method="post" id="themeForm">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="col-md-4">

                                    <div class="control-group">

                                        <div class="controls">
                                            <label class="form-group ">Theme 1</label>
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                <input type="color" class="form-control" name="theme1_color" id="theme1_color" value="<?php echo $theme1_color; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="control-group">

                                        <div class="controls">
                                            <label class="form-group ">Theme 2</label>
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                <input type="color" class="form-control" name="theme2_color" id="theme2_color" value="<?php echo $theme2_color; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="control-group">

                                        <div class="controls">
                                            <label class="form-group ">Primary Color</label>
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                <input type="color" class="form-control" name="primary_color" id="primary_color" value="<?php echo $primary_color; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="control-group">

                                        <div class="controls">
                                            <label class="form-group ">Secondary Color</label>
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                <input type="color" class="form-control" name="secondary_color" id="secondary_color" value="<?php echo $secondary_color; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">

                                    <div class="controls">
                                        <label
                                            class="form-group ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">

                                            <!-- <button type="submit" class="btn btn-success">Search</button> -->
                                            <a href="javascript:void(0);" onclick="save_theme()"
                                                class="btn btn-success">Save Theme</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="x_content">

                            <div class="table-responsive" style="overflow-x: hidden;">
                                <table class="table table-striped jambo_table bulk_action" id="example">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title" style="display: table-cell;">User Name</th>

                                            <th class="column-title" style="display: table-cell;">Master </th>
                                            <th class="column-title" style="display: table-cell;">Master </th>
                                            <th class="column-title" style="display: table-cell;">Master </th>
                                            <th class="column-title" style="display: table-cell;">Master </th>
                                            <th class="column-title" style="display: table-cell;">Master </th>

                                            <th class="column-title" style="display: table-cell;">Event</th>
                                            <th class="column-title" style="display: table-cell;">Market </th>
                                            <th class="column-title" style="display: table-cell;">Type </th>
                                            <th class="column-title" style="display: table-cell;">Stake </th>
                                            <th class="column-title" style="display: table-cell;">Rate</th>
                                            <th class="column-title" style="display: table-cell;">Odds</th>
                                            <th class="column-title" style="display: table-cell;">Result</th>
                                            <th class="column-title" style="display: table-cell;">Status</th>
                                            <th class="column-title" style="display: table-cell;">Action</th>
                                            <th class="column-title" style="display: table-cell;">Date Time</th>

                                        </tr>

                                    </thead>


                                </table>

                            </div>
                        </div> -->
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
    <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"
        type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"
        type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"
        type="text/javascript"></script>
    <script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
    <script src="assets/vendors/jszip/dist/jszip.min.js" type="text/javascript"></script>
    <script src="assets/vendors/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/vendors/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>

    <script src="assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="assets/toastr.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </body>

    <script>
        function save_theme() {
            var theme1_color = $("#theme1_color").val();
            var theme2_color = $("#theme2_color").val();
            var primary_color = $("#primary_color").val();
            var secondary_color = $("#secondary_color").val(); 

            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/theme_color_process.php',
                dataType: 'JSON',
                data: {
                    theme1_color: theme1_color,
                    theme2_color: theme2_color,
                    primary_color: primary_color,
                    secondary_color: secondary_color
                },
                success: function(response) {
                    if (response.status == "success") {
                        toastr.success(response.message);
                         setTimeout(function () {
                            location.reload();
                        }, 3000);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        }
    </script>
</html>