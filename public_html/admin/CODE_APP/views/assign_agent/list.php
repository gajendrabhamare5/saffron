<?php
defined('BASEPATH') or exit('No direct script access allowed');
$agent_id = $handler->layout['agent_id'];
$today = date("Y-m-d");
?>
<style>
    /*    .input-group{
            margin: 10px 0;
        }*/

    /*    th {
            white-space: nowrap;
        }*/

    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active,
    .open>.dropdown-toggle.btn-default {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad;
    }

    .btn-custom-button {
        cursor: pointer;
        background: #444;
        padding: 5px 10px;
        text-decoration: none;
        color: #fff;
        border-radius: 3px;
        margin-right: 3px;
        text-transform: uppercase;
        display: inline-block;
        border: none;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link {
        color: #495057;
    }

    /* ////////////// */

   #clientListTable{
    border:unset;
   }

   /* Container */
.dataTables_paginate {
    text-align: right;
    margin-top: 20px;
}

/* All pagination buttons */
.dataTables_paginate .paginate_button {
    background-color: #fff !important; /* dark background */
    color: #ced4da !important;
    border: none !important;
    padding: 6px 12px;
    margin: 0 2px;
    border-radius: 4px;
    font-weight: bold;
    cursor: pointer;
}

/* Active Page Button */
.dataTables_paginate .paginate_button.current {
    background: unset !important;
    background-color: #ae4600 !important; /* Teal active background */
    color: white !important;
    border-radius: 4px;
}

/* Hover effect */
/* .dataTables_paginate .paginate_button:hover {
    background-color: #666 !important;
} */

/* Disable default borders on pagination container */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    box-shadow: none !important;
}

#top-controls {
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: unset !important;
}

.custom-dt-select{
    display: inline-block;
    width: 100%;
    height: calc(1.5em + 0.94rem + 2px);
    padding: 0.47rem 1.75rem 0.47rem 0.75rem;
    font-size: 0.8125rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: #fff url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='8' height='10' viewBox='0 0 8 10'><path fill='%23343a40' d='M4 0L0 4h8zM4 10L0 6h8z'/></svg>") 
    no-repeat right 0.75rem center / 8px 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    height: calc(1.5em + 0.5rem + 2px);
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    padding-left: 0.5rem;
    font-size: 0.7109375rem;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    color: #0056b3;
}

.nav-tabs .nav-link{
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
}

.buttons-pdf {
    background-color: #cb0606;
    color: #fff;
    box-shadow: 0 5px 6px -6px #000;
    border: 1px solid #cb0606;
    height: 34px;
    cursor: pointer;
    /* font-size: 1rem; */
    line-height: 1.5;
    padding: .375rem .75rem;
    border-radius: 0.25rem;
}

.buttons-excel {
    background-color: #217346;
    color: #fff;
    box-shadow: 0 5px 6px -6px #000;
    border: 1px solid #217346;
    height: 34px;
    cursor: pointer;
    padding: 8px 6px;
    line-height: 1.5;
    padding: .375rem .75rem;
    border-radius: 0.25rem;
}

.label {
    font-family: "Roboto Condensed", sans-serif;
}

.popup-box {
    background-color: #ddd;
    border: 1px solid #666;
    float: left;
    margin: 1px 2px 0;
    min-width: 48%;
    text-align: right;
    height: calc(1.5em + 0.94rem + 2px);
    width: 100%;
    padding: 0.47rem 0.75rem;
    line-height: 1.5;
    color: #495057;
}

.custom-modal-label{
    padding-top: calc(0.47rem + 1px);
    padding-bottom: calc(0.47rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 1.5;
}

.modal-dialog{
    max-height: calc(100% - 3.5rem);
    max-width: 530px;
}

.modal-body {
    background-color: transparent;
    overflow-y: auto;
    overflow-x: hidden;
    max-height: calc(100vh - 58px);
}

.modal-content input {
    background-color: #fff;
    border: 1px solid #666;
    float: left;
    margin: 1px 2px 0;
    min-width: 48%;
    text-align: right;
    height: calc(1.5em + 0.94rem + 2px);
    width: 100%;
    padding: 0.47rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    border-radius: 0.25rem;

    width: 100%;
    border: 1px solid #ced4da;

}

.modal-content textarea {
    background-color: #fff;
    border: 1px solid #666;
    float: left;
    margin: 1px 2px 0;
    min-width: 48%;
    text-align: right;
    height: calc(1.5em + 0.94rem + 2px);
    width: 100%;
    padding: 0.47rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    border-radius: 0.25rem;

    width: 100%;
    border: 1px solid #ced4da;
    height: auto;
}

.btn-primary{
    background-color: #46A29F !important;
    border-color: #46A29F !important;
    color: #FFFFF !important;
}
.mx-input{
    background-color: #e9ecef !important;
    opacity: 1;
}

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<div class="col-md-12 main-container">
    <div class="listing-grid">
        <div class="detail-row">
            <div class="row">
                <div class="col-md-6 m-b-10">
                    <h2 class="d-inline-block">Assign Agent List</h2>
                </div>
               
                <div class="table-controls d-flex flex-wrap justify-content-between align-items-center mb-3"></div>
                <!-- <div class="col-md-12 m-b-10">
                    <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link active" data-toggle="tab" href="#active-user" onclick="tab_view('1')">Active User
                            </a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link" data-toggle="tab" href="#active-user" onclick="tab_view('0')">Deactive User
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
        <div class='table-responsive tab-content'>

            <div id="active-user" class="tab-pane active">
                <table id="clientListTable" class="table table-striped  table-bordered " style="width:100%">
                    <thead>
                        <tr>
                           
                            <th>S.No.</th>
                            <th>User Name</th>
                            <th>Assign Agent Settings</th>
                            <th>Mobile Number</th>
                            <th>Depo Mobile Number</th>
                            <th>First Bonus Status</th>
                            
                        </tr>
                    </thead>
                    <tbody id=""></tbody>
                </table>
            </div>
            
        </div>
        <div class="row m-t-10 m-b-10">
            <div class="col-md-6">
            </div>
            <div class="col-md-6" id="pagination">
            </div>
        </div>
    </div>

    <div class="listing-grid">
        <div class="detail-row">
            <div class="row">
                <div class="col-md-6 m-b-10">
                    <h2 class="d-inline-block">User Creation</h2>
                </div>
            </div>
            <div class="card-body">
  <form method="post" class="ajaxFormSubmit">
    <div class="row g-3 align-items-end">
      
      <div class="col-md-2">
        <label for="from_date" class="form-label">From Date:</label>
        <input type="date" id="from_date" name="from_date" class="form-control mx-input" value="<?php echo $today; ?>">
      </div>

      <div class="col-md-2">
        <label for="to_date" class="form-label">To Date:</label>
        <input type="date" id="to_date" name="to_date" class="form-control mx-input" value="<?php echo $today; ?>">
      </div>

      <div class="col-md-2">
        <button type="submit" id="loaddata" class="btn btn-primary">
          Download CSV
        </button>
      </div>

    </div>
  </form>
</div>

        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>


<script type="text/javascript">
    var user_status=1;
    function tab_view(status) {

        user_status = status;
        console.log(user_status,"user_status");
        setTimeout(() => {
            // Remove old controls so they don’t pile up
            $('#top-controls').remove();
            $('#bottom-buttons').remove();

            // Then reinitialize the table
            call_page();
        }, 100);

    }

    var xhr, xhr_gud, xhr_act, xhr_sel, xhr_cs, xhr_cp, xhr_scr;
    var _agent_id = '<?php echo $agent_id; ?>';

    function set_search_single(field_name, field_val) {
        if ($.trim(field_name) != "" && $.trim(field_val) != "") {
            return ("&" + $.trim(field_name) + "=" + $.trim(field_val));
        } else {
            return "";
        }
    }

    function preparesearch() {
        var search_string = "";
        search_string += set_search_single("common_search", $('#search-common').val());
        search_string += set_search_single("from_date", $('#search-from_date').val());
        search_string += set_search_single("to_date", $('#search-to_date').val());
        search_string += set_search_single("agent_id", _agent_id);
        return search_string;
    }

    function prepareorderby() {
        var data = '';
        if ($('.btn-orderby.active').length > 0) {
            data += set_search_single("orderby", $('.btn-orderby.active').attr('data-order'));
            data += set_search_single("sort", $('.btn-orderby.active').attr('data-sort'));
        }
        return data;
    }

    function resetorderby() {
        $('.btn-orderby').attr({
            'src': MASTER_URL + '/assets/images/sort_both.png',
            'data-sort': ''
        });
        $('.btn-orderby').removeClass('active');
    }

    function call_page(limit_page, orderby) {
        $('#divLoading').addClass('show');

        var limit = 0;
        if (typeof limit_page != 'undefined')
            limit = limit_page;
        var postdata = preparesearch() + prepareorderby();
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/manage_clients/get_user_list/' + limit+'/'+user_status,
            type: 'POST',
            dataType: 'json',
            data: postdata,
            success: function(data) {
                if (typeof(data.result) != "undefined") {
                    
                    $("#clientListTable").DataTable().destroy();
                    //  $('#pagination').html(data.links);
                    console.log(data.result,"data.result");
                   
                    $('#clientListTable').DataTable({
                        // "destroy": true,
                        "ordering": false,
                        "paging": true,
                        "pagingType": 'full_numbers',
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                        "pageLength": 25,
                        "initComplete": function() {
                            $('#divLoading').removeClass('show');
                        },
                        dom: '<"top-controls-wrapper"lfB>rt<"bottom"ip>',
                        buttons: [],
                        language: {
                            paginate: {
                                first: '«',
                                last: '»',
                                next: '›',
                                previous: '‹'
                            }
                        },
                        "drawCallback": function() {
                            $('.dataTables_paginate > a').addClass('btn btn-diamond');
                        }
                    });
                    $('#divLoading').removeClass('show');
                    $('.dataTables_filter input').addClass('form-control');
                     setTimeout(() => {
                        // Ensure custom row exists
                        if ($('#top-controls').length === 0) {
                        $('<div id="top-controls" class="d-flex justify-content-between align-items-center mb-3"></div>')
                            .insertBefore('.nav-tabs'); // ABOVE tabs
                        }

                        // Move only ONE copy of search & length controls
                        // $('.top-controls-wrapper .dataTables_length').appendTo('#top-controls');
                        // $('.top-controls-wrapper .dataTables_filter').appendTo('#top-controls');

                        //  $('.dataTables_length select').addClass('form-select custom-dt-select');

                        // Move buttons below tabs
                        // if ($('#bottom-buttons').length === 0) {
                        // $('<div id="bottom-buttons" class="mt-2"></div>').insertAfter('.nav-tabs');
                        // }
                        // $('.dt-buttons').appendTo('#bottom-buttons');
                    }, 100);
                }
            }
        });
    }

    $(document).ready(function() {

        call_page();
        $('#pagination').delegate('a', 'click', function() {
            var page = $(this).attr('href').split('/');
            if ($.trim(page) != '') {
                page = page[page.length - 1];
                call_page(page);
            }
            return false;
        });
        $('.btn-orderby').on('click', function() {

            var order_sort = 'ASC',
                src = 'sort_asc';
            if ($(this).attr('data-sort') == 'ASC') {
                order_sort = 'DESC', src = 'sort_desc';
            }

            resetorderby();
            $(this).attr({
                'src': MASTER_URL + '/assets/images/' + src + '.png',
                'data-sort': order_sort
            });
            $(this).addClass('active');
            call_page();
        });
        $('#search-common').on('keyup', function() {
            call_page(0);
        });

        $('#form-search').on('reset', function() {
            resetorderby();
            setTimeout(function() {
                call_page(0);
            }, 1);
        });
        
      
       
        
        $('#generate_form').on('submit', function() {

            var user_id = $('#generate_user_id').val();
            var amount = $('#generate_amount').val();
            var master_password = $('#generate_master_password').val();
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> The Transaction Password field is required.' +
                    '</div>';
                $('#generate_form').find('.modal_error').html(error);
                return false;
            }
            $('#btn-generate_points').attr('disabled', true);
            var data = "&user_name=" + user_id + "&transaction_points=" + amount + "&transaction_type=5&master_password=" + master_password;
            if (xhr_act && xhr_act.readyState != 4)
                xhr_act.abort();
            xhr_act = $.ajax({
                url: MASTER_URL + '/manage-clients/generate_points',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(rdata) {
                    alert(rdata.message);
                    if (rdata.status == 'ok') {
                        setTimeout(function() {
                            $('#generate-modal').modal('hide');
                            $('#generate_amount').val('0');
                        }, 1000);
                        call_page();
                    }
                    $('#btn-generate_points').attr('disabled', false);
                    return false;
                }
            });
            return false;
        });
        $('#generate_form').on('input', '#generate_amount', function() {
            var g_amount = Number($(this).val());
            var generate_second = Number($('#generate-second').text());
            var generate_second_diff = generate_second + g_amount;
            $('#generate-second-diff').text((generate_second_diff).toFixed(2));
        });
        
       
    });
</script>