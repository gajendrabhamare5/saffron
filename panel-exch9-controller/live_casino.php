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
                    <h3>Live Casino</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Live Casino</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="alert alert-success" style="display:none;">
                                <strong></strong>
                            </div>
                            <div class="alert alert-danger" style="display:none;">
                                <strong></strong>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action dataTable no-footer nowrap display" id="example">
                                    <thead>
                                        <tr class="headings">

                                            <th class="column-title" style="display: table-cell;"></th>
                                            <th class="column-title" style="display: table-cell;">Image</th>
                                            <th class="column-title" style="display: table-cell;">Category</th>
                                            <th class="column-title" style="display: table-cell;">Provider</th>
                                            <th class="column-title" style="display: table-cell;">Game Type</th>
                                            <th class="column-title" style="display: table-cell;">Game Name</th>
                                            <th class="column-title" style="display: table-cell;">Game Id</th>
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
<div class="modal fade" id="modals-add">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Add Casino <span id="delete_uname"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">

                <div class="form-row">

                    <div class="form-group col">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" id="image_file">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="game_category" id="game_category">
                            <option value="livecasino">Live Casino</option>
                            <option value="slot">Slots</option>
                            <option value="fantasy">Fantasy</option>
                        </select>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Provider</label>
                        <input type="text" class="form-control" id="game_provider">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Game Type</label>
                        <input type="text" class="form-control" id="game_type">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Game Name</label>
                        <input type="text" class="form-control" id="game_name">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Game Id</label>
                        <input type="text" class="form-control" id="game_id">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger deleteentry add_btn" onclick="add_casino()">Submit</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modals-edit">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="float: left;">Edit Casino <span id="delete_uname"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col">
                                <label class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image_file_edit" onchange="removeOld()">
                                <div class="clearfix"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group col img_class">
                            <img src="" alt="" id="img_section" style="height:30px;width:60px;">
                        </div>
                        <div class="form-group col">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="game_category" id="edit_game_category">
                            <option value="livecasino">Live Casino</option>
                            <option value="slot">Slots</option>
                            <option value="fantasy">Fantasy</option>
                        </select>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Provider</label>
                        <input type="text" class="form-control" id="edit_game_provider">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Game Type</label>
                        <input type="text" class="form-control" id="edit_game_type">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Game Name</label>
                        <input type="text" class="form-control" id="edit_game_name">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Game Id</label>
                        <input type="text" class="form-control" id="edit_game_id">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>
                    </div>
                    <input type="hidden" id="hidden_banner_id" value="">

                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger deleteentry edit_btn" onclick="edit_banner()">Submit</button>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript">
    function show_banner_modal() {
        $("#modals-add").modal('show');
    }

    function add_casino() {
        $('.add_btn').html('Loading..');
        $('.add_btn').css('pointer-events', 'none');
        var game_type = $("#game_type").val();
        var game_name = $("#game_name").val();
        var game_id = $("#game_id").val();
        var game_provider = $("#game_provider").val();
        var game_category = $("#game_category").val();
        var type = 'add';
        var image_file = $('#image_file').prop('files')[0];
        if (image_file == "" || image_file == null) {
            alert("Please choose an image.");
            $('.add_btn').html('Submit');
            $('.add_btn').css('pointer-events', 'auto');
        } else if (game_category == "") {
            alert("Enter Game Category.");
            $('.add_btn').html('Submit');
            $('.add_btn').css('pointer-events', 'auto');
        } else if (game_provider == "") {
            alert("Enter Game Provider.");
            $('.add_btn').html('Submit');
            $('.add_btn').css('pointer-events', 'auto');
        } else if (game_type == "") {
            alert("Enter Game Type.");
            $('.add_btn').html('Submit');
            $('.add_btn').css('pointer-events', 'auto');
        } else if (game_name == "") {
            alert("Enter Game Name.");
            $('.add_btn').html('Submit');
            $('.add_btn').css('pointer-events', 'auto');
        } else if (game_id == "") {
            alert("Enter Game Id.");
            $('.add_btn').html('Submit');
            $('.add_btn').css('pointer-events', 'auto');
        } else {
            var form_data = new FormData();
            form_data.append('image_file', image_file);
            form_data.append('game_type', game_type);
            form_data.append('game_name', game_name);
            form_data.append('game_id', game_id);
            form_data.append('game_provider', game_provider);
            form_data.append('game_category', game_category);
            form_data.append('type', type);
            $.ajax({
                type: "POST",
                url: "ajaxfiles/live_casino_process.php",
                data: form_data,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                success: function(response) {
                    $('.add_btn').html('Submit');
                    $('.add_btn').css('pointer-events', 'auto');
                    if (response.status == "ok") {
                        location.reload();
                    } else if (response.status == "size") {
                        alert("Image size exceeds 3MB.");
                    } else if (response.status == "extension") {
                        alert("Only .jpg, .jpeg or .png images are allowed.");
                    } else {
                        alert("Something went wrong.");

                    }
                }
            });
        }

    }
    //Start View Record//
    $(function() {
        $('#example').dataTable({
            dom: 'Blfrtip',
            buttons: [{
                text: '+',
                className: "custom_btn",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button');
                },
                action: function(e, dt, node, config) {
                    show_banner_modal();
                }
            }],
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
                "url": "ajaxfiles/live_casino_list.php",
                "type": "POST"
            },

        });

    });

    function delete_banner_image(id) {
        if (id) {
            var isConfirm = confirm("Are you sure want to delete?");
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxfiles/live_casino_process.php',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        type: 'delete'
                    },
                    success: function(response) {
                        var status = response.status;
                        var message = response.message;
                        if (status == "ok") {
                            $(".alert-success1").text(message);
                            $(".alert-success1").fadeIn('fast').delay(3000).hide(0);
                            setTimeout(function() {
                                $(".close").click();
                                $('#example').DataTable().ajax.reload(null, false);
                            }, 2000);
                        } else {
                            $(".alert-danger1").text(message);
                            $(".alert-danger1").fadeIn('fast').delay(3000).hide(0);
                        }
                    }
                });
            }

        }

    }

    function fetch_banner_data(id) {
        if (id) {
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/live_casino_process.php',
                dataType: 'JSON',
                data: {
                    id: id,
                    type: 'fetch'
                },
                success: function(response) {
                    var image = response.image;
                    var game_provider = response.game_provider;
                    var game_type = response.game_type;
                    var game_name = response.game_name;
                    var game_category = response.game_category;
                    var game_id = response.game_id;
                    $("#edit_game_type").val(game_type);
                    $("#edit_game_name").val(game_name);
                    $("#edit_game_id").val(game_id);
                    $("#edit_game_provider").val(game_provider);
                    $("#edit_game_category").val(game_category);
                    $("#hidden_banner_id").val(id);
                    $("#img_section").attr('src', image);
                    $("#modals-edit").modal('show');
                }
            });
        }
    }

    function removeOld() {
        $("#img_section").attr('src', '');
        $(".img_class").css('display', 'none');
    }

    function edit_banner() {
        $('.edit_btn').html('Loading..');
        $('.edit_btn').css('pointer-events', 'none');
       var game_type =  $("#edit_game_type").val();
        var game_name = $("#edit_game_name").val();
        var game_id =  $("#edit_game_id").val();
        var game_provider =  $("#edit_game_provider").val();
        var game_category =  $("#edit_game_category").val();
        var id = $("#hidden_banner_id").val();
        var image_file = $('#image_file_edit').prop('files')[0];
        var type = 'edit';
        var form_data = new FormData();
        form_data.append('image_file', image_file);
        form_data.append('game_type', game_type);
            form_data.append('game_name', game_name);
            form_data.append('game_id', game_id);
            form_data.append('game_provider', game_provider);
            form_data.append('game_category', game_category);
        form_data.append('id', id);
        form_data.append('type', type);
        $.ajax({

            type: "POST",
            url: "ajaxfiles/live_casino_process.php",
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function(response) {
                $('.edit_btn').html('Submit');
                $('.edit_btn').css('pointer-events', 'auto');
                if (response.status == "ok") {
                    location.reload();
                } else if (response.status == "size") {
                    alert("Image size exceeds 3MB.");
                } else if (response.status == "extension") {
                    alert("Only .jpg, .jpeg or .png images are allowed.");
                } else {
                    alert("Something went wrong.");
                }
            }

        });
    }
</script>