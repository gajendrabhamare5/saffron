<div class="col-md-12 main-container">
    <div class="listing-grid">
        <div class="detail-row">
            <h2>Market Analysis</h2>
            <div class="m-t-20">
            </div>
        </div>

        <div class="table-responsive data-table" style="overflow: hidden" id="analysis_html">

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
    $(document).ready(function () {
        call_page();
        function call_page() {

            call_xhr(MASTER_URL + '/market_analysis/get_analysis/');
            xhr.success(function (data) {
                var analysis_html = '';

                if (typeof (data.results) != "undefined") {


                    $.each(data.results, function (index1, event_data) {
                        var market_column = event_data['market_pl'].length;
                        analysis_html +=
                                '<table id="example" class="table table-striped table-bordered">' +
                                '  <tbody id="analysis_html">'
                        analysis_html +=
                                '<tr>' +
                                '    <td colspan="'+ +market_column + 1 +'">' +
                                '        <p>' +
                                '            <strong>' +
                                '                <a style="background: none; color: #460bf3; text-decoration: underline" href="' + MASTER_URL + '/events-analysis?eventType='+event_data.event_type+'&eventId=' + event_data.event_id + '&marketId=' + event_data.oddsmarketId + '">' + event_data.event_name + '</a>' +
                                '            </strong>' +
                                '        </p>' +
                                '    </td>' +
                                '</tr>' +
                                '<tr>';
                        var market_column = event_data['market_pl'].length;
                        $.each(event_data['market_pl'], function (index2, market_data) {

                            var td_width = '';
                            if (market_column == 2) {
                                td_width = 'width="37.5%"';
                            } else if (market_column == 3) {
                                td_width = 'width="25%"';
                            }
                            var td_style = (market_data.pl > 0) ? ' color:green; ' : ' color:red; ';
                            analysis_html +=
                                    '    <td ' + td_width + '>' +
                                    '        <p class="tm-dtls">' +
                                    '            <strong>' + market_data.market_name + '</strong>' +
                                    '            <span style="' + td_style + '">' + market_data.pl + '</span>' +
                                    '        </p>' +
                                    '    </td>';

                        });

                        analysis_html += '    <td width="25%"><p class="tm-dtls"><strong>Total Bets</strong> <span>' + event_data.total_bet + '</span></p></td>';
                        analysis_html += '</tr>' +
                                '</tbody>' +
                                '</table>';
                    });

                    $('#analysis_html').html(analysis_html);
                }
            });

          /*   setTimeout(call_page, 1000 * 30); */
        }
    });
</script>