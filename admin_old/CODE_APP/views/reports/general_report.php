<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>General Reports</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-report_type">Select Type:</label>
                                    <select class="form-control" name="search-report_type" id="search-report_type">
                                        <option value="general_report">General Report</option>
                                        <option value="cr_report">Credit Reference Report</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label style="width: 100%">&nbsp;</label>
                                <button type="submit" class="btn btn-diamond" id="loaddata">Load</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive data-table">
                <table id="example" class="custom-table table table-striped">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="table_body">
                        <tr>
                            <td colspan="100%" align="center">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var xhr;
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
        search_string += set_search_single("report_type", $('#search-report_type').val());
        return search_string;
    }


    function call_page(limit_page, orderby) {
        
        $('#divLoading').addClass('show');
        var limit = 0;
        if (typeof limit_page != 'undefined')
            limit = limit_page;

        $('#table_body').html('<tr><td colspan="100%" align="center">Loading...</td></tr>');

        call_xhr(MASTER_URL + '/reports/general-report/get_general/' + limit, preparesearch());
        xhr.success(function (data) {
            $('#divLoading').removeClass('show');
            if (typeof (data.result) != "undefined") {
                $('#pagination').html(data.links);
                $('#table_body').html(data.result);
            }
        });
    }

    $(document).ready(function () {
        $(".date").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
        call_page();
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
    });

</script>