<?php
include('../include/conn.php');
include "session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo SITE_NAME; ?> | Account balance</title>
    <?php

    include("header.php");
    ?>

    <link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <link href="assets/toastr.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"/>-->
    <link rel="stylesheet" type="text/css" href="assets/multi-select-autocomplete/style.css"/>

    <style>
        
        .ui-autocomplete {
            position: absolute !important;
            z-index: 1000 !important;
            cursor: default !important;
            padding: 0 !important;
            margin-top: 2px !important;
            list-style: none !important;
            background-color: #ffffff !important;
            border: 1px solid #ccc !important;
            -webkit-border-radius: 5px !important;
            -moz-border-radius: 5px !important;
            border-radius: 5px !important;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2) !important;
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2) !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2) !important;
        }

        .ui-autocomplete>li {
            padding: 3px 20px !important;
            border-bottom: 1px solid #ccc !important;
            font-size: 16px !important;
        }

        .ui-autocomplete>li.ui-state-focus {
            background-color: #DDD !important;
        }

        .ui-helper-hidden-accessible {
            display: none !important;
        }
    </style>
    <div class="right_col" role="main" style="min-height: 1171px;">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Account balance</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">
                       
                            <div class="col-md-12 col-sm-12 col-xs-12">


                                <div class="col-md-4">
                                    
                                    <div class="control-group">

                                        <div class="controls">
                                            <label class="form-group ">Client Name:</label>
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                <input type="text" class="form-control" name="client_name" id="client_name">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">



                                    <div class="control-group">

                                        <div class="controls">
                                            <label class="form-group ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">

                                                <button type="submit" id="submitblance" onclick="balnce_sum()" class="btn btn-success">Submit</button>
                                               
                                            </div>
                                        </div>
                                    </div>

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

    <script src="assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/toastr.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="assets/multi-select-autocomplete/autocomplete.multiselect.js"></script>   


    </body>
   
    <script>
        $(document).ready(function() {
            $("#client_name").autocomplete({
                source: "ajaxfiles/ajax_autocomplete_client_name.php",
               /*  multiselect: true,
                select: function( event , ui ) {
                    alert( "You selected: " + ui.item.label );
                } */
            });
        });
       
       

        function balnce_sum() {
            console.log($("#client_name").val());
            var user_name=$("#client_name").val()
            if (user_name == "") {
                toastr.clear()
                toastr.error("", "Please enter OTP", {
                    "timeOut": "3000",
                    "extendedTImeout": "0"
                });

            } else {
                jQuery("#submitblance").attr("disabled","disabled");
                jQuery("#submitblance").removeAttr("onclick");
                
                $.ajax({
                    type: 'POST',
                    url: 'ajaxfiles/account_balace_equal_process.php',
                    dataType: 'JSON',
                    data: {
                        user_name: user_name,
                    },
                    success: function(response) {
                        var status = response.status;
                        var message = response.message;
                        if (status == "ok") {
                            toastr.clear()
                            toastr.success("", message, {
                                "timeOut": "3000",
                                "extendedTImeout": "0"
                            });
                            location.reload();
                        } else {
                            jQuery("#submitblance").removeAttr("disabled");
                            jQuery("#submitblance").attr("onclick", "balnce_sum()");
                            toastr.clear()
                            toastr.error("", message, {
                                "timeOut": "3000",
                                "extendedTImeout": "0"
                            });

                        }

                    }
                });
            } 

        }

    </script>

</html>