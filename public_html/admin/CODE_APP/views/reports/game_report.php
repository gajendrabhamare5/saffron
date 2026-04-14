<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Game Report</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">

                            <div class="col-md-2 col-xs-12">
                                <div class="form-group">
                                    <label for="search-from_date">From</label>
                                    <input type="text" class="form-control date" name="search-from_date" id="search-from_date" placeholder="Choose Date" autocomplete="off" value="<?php echo DATE('Y-m-d', strtotime('-7 day')); ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="search-to_date">To</label>
                                    <input type="text" class="form-control date" name="search-to_date" id="search-to_date" placeholder="Choose Date" autocomplete="off" value="<?php echo DATE('Y-m-d', time()); ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="search-account_type">Type</label>
                                    <select class="form-control" name="search-account_type" id="search-account_type">
                                        <option value="all">ALL</option>
                                        <option value="match_odds">MATCH</option>
                                        <option value="fancy">FANCY</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-3 pull-right">
                                <div class="form-group">
                                    <label for=""> &nbsp;</label>
                                    <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                        <button type="button" class="btn btn-diamond" id="refresh_event_list">Game List</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-8 col-xs-12">
                                        <div class="form-group">
                                            <select class="form-control" name="search-event" id="search-event">
                                                <option value="all">ALL</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12 pull-right">
                                    
                                                <button type="submit" class="btn btn-diamond">Show Game Report</button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-diamond">Master Game Report</button>
                                            
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="custom-table table table-striped">
                            <thead>
                                <tr class="headings">
                                    <th>Sr. No</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <!-- <th>Sr. No</th>
                                    <th>Name</th>
                                    <th class="amount-field">Amount</th> -->
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr>
                            <td colspan="100%" align="center">No data available in table</td>
                        </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div id="pagination"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var xhr;
    var xhr_event_refresh;
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
        search_string += set_search_single("to_date", $('#search-to_date').val());
        search_string += set_search_single("account_type", $('#search-account_type').val());
        search_string += set_search_single("event", $('#search-event').val());
        return search_string;
    }


    function call_page(limit_page, orderby) {
        
        $('#divLoading').addClass('show');
        var limit = 0;
        if (typeof limit_page != 'undefined')
            limit = limit_page;
        var data = "";
        if (typeof (orderby) != 'undefined' && orderby != '') {
            data = '&orderby=' + orderby;
        }

        $('#tbody').html('<tr><td colspan="100%" align="center">Loading...</td></tr>');

        call_xhr(MASTER_URL + '/reports/game_report/get_game_report/' + limit, preparesearch() + data);
        xhr.success(function (data) {
//            if (typeof (data.result) != "undefined") {
            $('#tbody').html(data.html);
            $('#pagination').html(data.links);
            $('#divLoading').removeClass('show');
//            }
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

        $('#search-from_date, #search-to_date, #search-status').on('change', function () {
            call_page(0);
        });
        $('#form-search').on('submit', function () {
            call_page(0);
            return false;
        });

        $('#refresh_event_list').on('click', function () {

            $('#divLoading').addClass('show');
            if (xhr_event_refresh && xhr_event_refresh.readyState != 4)
                xhr_event_refresh.abort();
            xhr_event_refresh = $.ajax({
                url: MASTER_URL + '/reports/game_report/get_game_list/',
                type: 'POST',
                dataType: 'json',
                data: preparesearch(),
                success: function (data) {
                    $('#divLoading').removeClass('show');
                    $('#search-event').html(data.option_html);
                }
            });
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
    });

</script>