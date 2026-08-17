<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_URL; ?>/storage/js/plugins/OwlCarousel2/assets/owl.theme.default.css">
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
        background:unset;
    }
    
    span.account_bets {
        cursor: pointer;
        background: #444;
        padding: 5px 10px;
        text-decoration: none;
        color: #fff;
        border-radius: 3px;
        margin-right: 3px;
        text-transform: uppercase;
        display: inline-block;
    }
    a.button.btn.btn-diamond {
        margin: 0 4px 4px 0;
    }
</style>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Casino Results</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="search-date" id="search-date" class="form-control" value="<?php echo DATE('Y-m-d'); ?>" readonly="" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="search-type" id="search-type" class="form-control">
                                        <option value="teen">1 Day Teenpatti</option>
                                        <option value="teen9">Test Teenpatti</option>
                                        <option value="teen20">20-20 Teenpatti</option>
                                        <option value="teen8">Open Teenpatti</option>
                                        <option value="poker">1 Day Poker </option>
                                        <option value="poker20">20-20 Poker</option>
                                        <option value="poker9">6 Player Poker</option>
                                        <option value="ab20">Andar Bahar Casino</option>
                                        <option value="worli">Worli Matka</option>
                                        <option value="worli2">Instant Worli</option>
                                        <option value="3cardj">3 Cards Judgement</option>
                                        <option value="card32">32 Cards - A</option>
                                        <option value="dt20">20-20 Dragon Tiger</option>
                                        <option value="dt6">1 Day Dragon Tiger</option>
                                        <option value="aaa">Amar Akbar Anthoni</option>
                                        <option value="btable">Bollywood Table</option>
                                        <option value="card32eu">Card 32 - B</option>
                                        <option value="war">War</option>
                                        <option value="dtl20">DTL 20</option>
                                        <option value="cmeter">Casino Meter</option>
                                        <option value="cmatch20">20-20 Casino Match</option>
                                        <option value="teen6">Teenpatti 2.0</option>
                                        <option value="lucky7">Lucky 7 - A</option>
                                        <option value="lucky7eu">Lucky 7 - B</option>
                                        <option value="baccarat">Baccarat</option>
                                        <option value="baccarat2">Baccarat 2</option>
                                        <option value="dt202">20-20 Dragon Tiger - 2</option>
                                        <option value="abj">Andar Bahar 2</option>
                                        <option value="cricketv3">5Five Cricket</option>
                                        <option value="queen">Queen</option>
                                        <option value="race20">Race 20-20</option>
                                        <option value="superover">Super Over</option>


                                        <!--<option value="war">War</option>
                                        <option value="teenOdi">1 Day Teenpatti</option>
                                        <option value="teen9">Test Teenpatti</option>
                                        <option value="teen20">20-20 Teenpatti</option>
                                        
                                        <option value="poker">1 Day Poker</option>
                                        <option value="poker20">20-20 Poker</option>
                                        <option value="ab20">Andar Bahar Casino</option>
                                        <option value="card32">32 Cards-A</option>
                                        <option value="card32eu">32 Cards-B</option>
                                        <option value="lucky7">Lucky 7 - A</option>
                                        <option value="lucky7eu">Lucky 7 - B</option>
                                        <option value="dtl20">DTL 20</option>
                                        <option value="dt20">20-20 Dragon Tiger</option>
                                        <option value="dt6">1 Day Dragon Tiger</option>
                                        <option value="btable">Bollywood Table</option>-->
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-diamond" id="loaddata">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <div class="col-md-12">
                            <div class="col-md-2" style="float: right;">
                                Search: 
                                <div class="form-group">    
                                    <input type="text" name="search-round_id" id="search-round_id" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table id="account_history_table" class="table table-striped table-bordered datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>Round ID</th>
                        <th>Winner</th>
                    </tr>
                </thead>
                <tbody id="bet_tbody">
                    
                </tbody>
            </table>
            <div class="row m-t-10 m-b-10">
                <div class="col-md-6">
                </div>
                <div class="col-md-6" id="pagination"></div>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div id="modalresult" class="modal fade show" tabindex="-1" style="">
    <div class="modal-dialog" style="min-width: 650px">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Result Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body nopading" id="result-details" style="min-height: 300px">

            </div>
        </div>
    </div>
</div>

<script src="<?php echo WEB_URL; ?>/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>

<script type="text/javascript">

	$("#account_history_table").DataTable({
		 "drawCallback": function () {
                $('.dataTables_paginate > a,.dataTables_paginate span a').addClass('button btn btn-diamond').removeClass('paginate_button');
//                $('.dataTables_paginate > a,.dataTables_paginate span a.current').addClass('disabled');
            },
            "pagingType": "full_numbers"
	});

    var q = '<?php echo $this->input->get('q'); ?>';
    if (q !== '')
        $('#search-type').val(q);

    var xhr;
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
        search_string += set_search_single("date", $('#search-date').val());
        search_string += set_search_single("type", $('#search-type').val());
        search_string += set_search_single("round_id", $('#search-round_id').val());
        return search_string;
    }


    function call_page(limit_page, orderby) {
        var limit = 0;
        if (typeof limit_page != 'undefined')
            limit = limit_page;
        var data = "";
        if (typeof (orderby) != 'undefined' && orderby != '') {
            data = '&orderby=' + orderby;
        }

        $('#bet_tbody').html('');

        call_xhr(MASTER_URL + '/reports/casino-results/get_casino_results/' + limit, preparesearch() + data);
        xhr.success(function (data) {
            if (typeof (data.result) != "undefined") {
                
				if($.fn.DataTable.isDataTable('#account_history_table')){
					$('#account_history_table').dataTable().fnDestroy();
				}
				$('#bet_tbody').html(data.result);
				
				$("#account_history_table").DataTable({
					 "drawCallback": function () {
                $('.dataTables_paginate > a,.dataTables_paginate span a').addClass('button btn btn-diamond').removeClass('paginate_button');
//                $('.dataTables_paginate > a,.dataTables_paginate span a.current').addClass('disabled');
            },
            "pagingType": "full_numbers"
				});
				
            }
        });
    }

    $(document).ready(function () {
        $("#search-date").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            endDate: '+0d',
        });
        call_page();
       /*  $('#pagination').delegate('a', 'click', function () {
            var page = $(this).attr('href').split('/');
            if ($.trim(page) != '') {
                page = page[page.length - 1];
                if (isNaN(page))
                    page = 0;
                call_page(page);
            }
            return false;
        }); */

        $('#form-search').on('submit', function () {
            call_page(0);
            return false;
        });

        $('#search-round_id').on('keyup', function () {
            call_page(0);
            return false;
        });

        $('#bet_tbody').on('click', '.btn_modal_result', function () {
            var id = $(this).attr('href');
            var type = $(this).attr('data-type');
            $('#modal-round_id').text(id);
            $('#modalresult').modal('show');
            $('#result-details').html('loading...');
            call_xhr(MASTER_URL + '/reports/casino-results/get_result/' + type + '/' + id, '');
            xhr.success(function (data) {
                $('#modalresult').find('.modal-dialog').removeClass('modal-md modal-dialog-centered');
                if (type == 'war') {
                    $('#modalresult').find('.modal-dialog').addClass('modal-md modal-dialog-centered');
                }
                if (typeof (data.result) != "undefined") {
                    $('#pagination').html(data.links);
                    $('#result-details').html(data.result);
                    if (type == 'ab20') {
                        $('.last-result-slider').owlCarousel({
                            loop: false,
                            margin: 2,
                            nav: true,
                            dots: false,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 3
                                },
                                1000: {
                                    items: 8
                                }
                            }
                        });
                    }
                }
            });
            return false;
        });
    });

</script>