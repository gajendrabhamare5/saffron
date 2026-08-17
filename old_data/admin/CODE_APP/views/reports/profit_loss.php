<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .pl-boxes{
        margin-bottom: 10px;
    }
</style>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Profit Loss</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-client_name">Search By Client Name:</label>
                                    <select class="form-control" name="search-client_name" id="search-client_name"></select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-from_date">From:</label>
                                    <input type="text" class="form-control has-feedback-left date" name="search-from_date" readonly id="search-from_date" placeholder="Choose Date" aria-describedby="inputSuccess2Status" autocomplete="off" value="<?php echo DATE('Y-m-d', strtotime('-7 day')); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-to_date">To:</label>
                                    <input type="text" class="form-control has-feedback-left date" name="search-to_date" readonly id="search-to_date" placeholder="Choose Date" aria-describedby="inputSuccess2Status" autocomplete="off" value="<?php echo DATE('Y-m-d', time()); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label style="width: 100%">&nbsp;</label>
                                <button type="submit" class="btn btn-diamond" id="loaddata">Load</button>&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="page_contents" style="display: none;">
                <div class="pl-boxes">
                    <h4 style="margin-left: 5px; ">Profit & Loss For Event Type</h4>
                    <div id="pl-box-html"></div>
                </div>
                <table id="example" class="custom-table table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sports</th>
                            <th>Markets</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="table_body">
                        <tr>
                            <td colspan="100%" align="center">Loading...</td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 m-t-10 m-b-10">
                    <div class="col-md-6"></div>
                    <div class="col-md-6" id="pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-profit_loss">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="title-profit_loss"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <table class="table table-striped table-bordered" id="popupData">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>TranDate</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Closing</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-profit_loss">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var xhr, xhr_more_details;
    var _user_id = 0;
    function call_xhr(url, mydata)
    {
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: mydata,
            error: function (data) {

            }
        });
    }

    function set_search_single(field_name, field_val) {
        if ($.trim(field_name) != "" && $.trim(field_val) != "")
        {
            return ("&" + $.trim(field_name) + "=" + $.trim(field_val));
        } else
        {
            return "";
        }
    }

    function preparesearch()
    {
        var search_string = "";
        search_string += set_search_single("from_date", $('#search-from_date').val());
        search_string += set_search_single("client_name", $('#search-client_name').val());
        search_string += set_search_single("to_date", $('#search-to_date').val());
        return search_string;
    }


    function call_page(limit_page, orderby) {

        $('#page_contents').css('display', 'block');
        $('#divLoading').addClass('show');
        var limit = 0;
        if (typeof limit_page != 'undefined')
            limit = limit_page;
        var data = "";
        if (typeof (orderby) != 'undefined' && orderby != '') {
            data = '&orderby=' + orderby;
        }

        $('#t1_body').html('<tr><td colspan="100%" align="center">Loading...</td></tr>');
        $('#t2_body').html('<tr><td colspan="100%" align="center">Loading...</td></tr>');

        call_xhr(MASTER_URL + '/reports/profit_loss/get_profit_loss/' + limit, preparesearch() + data);
        xhr.success(function (data) {

            $('#divLoading').removeClass('show');
            if (typeof (data.result) != "undefined") {
                $('#pagination').html(data.links);
                $('#table_body').html(data.result);
                $('#pl-box-html').html(data.pl_box);
                $('#pl_summary').html(data.pl_summary);
            }
        });
    }

    $(document).ready(function () {
        $(".date").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            endDate: '+0d',
        });
        $('#pagination').delegate('a', 'click', function () {
            var page = $(this).attr('href').split('/');
            if ($.trim(page) != '') {
                page = page[page.length - 1];
                if (isNaN(page))
                    page = 0;
                call_page(page);
            }
            return false;
        });

        $('#search-common').on('keyup', function () {
            call_page(0);
        });

        $('#form-search').on('submit', function () {
            call_page(0);
            return false;
        });

        $('#form-search').on('reset', function () {
            setTimeout(function () {
                call_page(0);
            }, 1);
        });

        $('#common_search').on('keyup', function () {
            call_page();
        });

        $('#table_body').on('click', '.market_more_details', function () {
            $('#modal-profit_loss').modal('show');
            $('#tbody-profit_loss').html('<tr><td colspan="100%" align="center">Loading...</td></tr>');
            var market = $(this).attr('data-market');
            var event_type = $(this).attr('data-event_type');
            var formdata = preparesearch() + '&market=' + market+'&event_type='+event_type;
            if (xhr_more_details && xhr_more_details.readyState != 4)
                xhr_more_details.abort();
            xhr_more_details = $.ajax({
                url: MASTER_URL + '/reports/profit_loss/market_more_details',
                type: 'POST',
                dataType: 'json',
                data: formdata,
                success: function (responce) {
                    if (responce.status) {
                        $('#tbody-profit_loss').html(responce.html);
                        $('#title-profit_loss').html(responce.title);
                    }
                }
            });
        });

        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            ajax: {
                url: MASTER_URL + '/reports/common/get_clients',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                }
            },
        });
    });

</script>