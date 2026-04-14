<style>
  .table-dark.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, .05) !important;
}
  .custom-analysis-table {
    margin-bottom: 20px !important;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    border-radius: 6px;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: var(--theme1-bg) !important;
  }

  .data-table table td a {
    background: none !important;
  }

  .spin {
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }
</style>

<!-- <style>
    .card {
  border: none;
  border-radius: 6px;
  box-shadow: 0 0 5px;
}
.card-header {
  font-weight: 600;
  font-size: 14px;
  background-color: var(--theme1-bg) !important;
}
.card-body {
  background: #fff;
  border-radius: 0 0 6px 6px;
}
.border-top {
  border-color: #dee2e6 !important;
}

.border-top {
     border-top: none !important;
} 

@media (max-width: 767px) {
  .card-body .row > [class*='col-'] {
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 8px;
    background: #fff;
  }

  .card-body .row {
    gap: 10px;
  }

  .card-body h6 {
    font-size: 14px;
  }
}

a{
    color: white !important;
}


</style> -->

<style>
  .card {
    border: none;
    border-radius: 6px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  }

  .card-header {
    font-weight: 600;
    font-size: 14px;
    background-color: var(--theme1-bg) !important;
  }

  .card-body {
    background: #fff;
    border-radius: 0 0 6px 6px;
  }

  .border-top {
    border-color: none !important;
  }

  .card-body h6 {
    background-color: rgba(0, 0, 0, 0.05);
    border: 1px solid #dee2e6;
    text-align: center;
    padding: 6px 5px;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 4px;
    margin-bottom: 8px;
  }

  .card-body .market-row,
  .card-body .row.border-top {
    /* border-top: 1px solid #dee2e6; */
    padding: 5px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  @media (min-width: 768px) {
    .card-body .row>.col-md-4 {
      flex: 0 0 33.333%;
      max-width: 33.333%;
    }
  }

  @media (max-width: 767px) {
    .card-body .row>[class*='col-'] {
      flex: 0 0 100%;
      max-width: 100%;
      border: 1px solid #dee2e6;
      border-radius: 6px;
      padding: 10px;
      background: #fff;
    }

    .card-body .row {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      /* spacing between boxes */
    }

    .card-body h6 {
      font-size: 13px;
    }

    .market-row {
      font-size: 13px;
    }
  }

  a {
    color: white !important;
    text-decoration: none;
  }
</style>



<div class="col-md-12 main-container">
  <div class="listing-grid">
    <div class="detail-row d-flex align-items-center justify-content-between">
      <h2>Market Analysis
        <a href="javascript:void(0)" title="Refresh Data" class="text-dark pl-2 refresh-btn" style="font-size: 14px;">
          <i class="fa fa-sync"></i>
        </a>
      </h2>
      <div>
        <input type="text" id="searchEvent" class="form-control" placeholder="Search event" style="max-width: 300px;">
      </div>
    </div>

    <div class="table-responsive data-table" style="overflow: hidden;margin-top:10px" id="analysis_html">

    </div>
  </div>
</div>
<script type="text/javascript">
  var xhr;

  function call_xhr(url, mydata) {
    if (xhr && xhr.readyState != 4)
      xhr.abort();
    xhr = $.ajax({
      url: url,
      type: 'POST',
      dataType: 'json',
      data: mydata,
      error: function(data) {

      }
    });
  }
  $(document).ready(function() {
    call_page();

   
  });
 function call_page() {

      call_xhr(MASTER_URL + '/market_analysis/get_analysis/');
      xhr.success(function(data) {
        // console.log("data",data);

        var analysis_html = '';

        if (typeof(data.results) != "undefined") {


          // $.each(data.results, function (index1, event_data) {


          //     var market_column = event_data['market_pl'].length;
          //     analysis_html +=
          //             '<table id="example" class="table table-striped table-bordered custom-analysis-table"">' +
          //             '  <tbody id="analysis_html">'
          //     analysis_html +=
          //             '<tr>' +
          //             '    <td colspan="'+ +market_column + 1 +'">' +
          //             '        <p>' +
          //             '            <strong>' +
          //             '                <a href="' + MASTER_URL + '/events-analysis?eventType='+event_data.event_type+'&eventId=' + event_data.event_id + '&marketId=' + event_data.oddsmarketId + '">' + event_data.event_name + '</a>' +
          //             '            </strong>' +
          //             '        </p>' +
          //             '    </td>' +
          //             '</tr>' +
          //             '<tr>';
          //     var market_column = event_data['market_pl'].length;
          //     $.each(event_data['market_pl'], function (index2, market_data) {

          //         var td_width = '';
          //         if (market_column == 2) {
          //             td_width = 'width="37.5%"';
          //         } else if (market_column == 3) {
          //             td_width = 'width="25%"';
          //         }
          //         var td_style = (market_data.pl > 0) ? ' color:green; ' : ' color:red; ';
          //         analysis_html +=
          //                 '    <td ' + td_width + '>' +
          //                 '        <p class="tm-dtls">' +
          //                 '            <strong>' + market_data.market_name + '</strong>' +
          //                 '            <span style="' + td_style + '">' + market_data.pl + '</span>' +
          //                 '        </p>' +
          //                 '    </td>';

          //     });

          //     analysis_html += '    <td width="25%"><p class="tm-dtls"><strong>Total Bets</strong> <span>' + event_data.total_bet + '</span></p></td>';
          //     analysis_html += '</tr>' +
          //             '</tbody>' +
          //             '</table>';
          // });

          //                     $.each(data.results, function (index1, event_data) {

          //     var market_column = event_data['market_pl'].length;

          //     analysis_html += '<div class="card mb-3">';

          //     analysis_html +=
          //         '<div class="card-header d-flex justify-content-between align-items-center text-white p-2">' +
          //         '<span>' + event_data.event_name + '</span>' +
          //         '<small>' + (event_data.event_date || '') + '</small>' +
          //         '</div>';

          //     analysis_html += '<div class="card-body p-2">';

          //     analysis_html +=
          //         '<a href="' + MASTER_URL + '/events-analysis?eventType=' + event_data.event_type +
          //         '&eventId=' + event_data.event_id + '&marketId=' + event_data.oddsmarketId +
          //         '" class="text-primary font-weight-bold d-block mb-2">' + (event_data.event_title || event_data.event_name) + '</a>';

          //     $.each(event_data['market_pl'], function (index2, market_data) {
          //         var td_style = (market_data.pl > 0) ? 'color:green;' : 'color:red;';
          //         analysis_html +=
          //             '<div class="row border-top pt-1">' +
          //             '<div class="col-6">' + market_data.market_name + '</div>' +
          //             '<div class="col-6 text-right" style="' + td_style + '">' + market_data.pl + '</div>' +
          //             '</div>';
          //     });

          //     analysis_html +=
          //         '<div class="row border-top pt-1">' +
          //         '<div class="col-6"><strong>Total Bets</strong></div>' +
          //         '<div class="col-6 text-right"><span>' + event_data.total_bet + '</span></div>' +
          //         '</div>';

          //     analysis_html += '</div></div>';
          // });


          $.each(data.results, function(index1, event_data) {
              //  console.log("event_data",event_data);

            var market_column = event_data['market_pl'].length;
            var event_id = event_data.event_id;

            var marketTypeMap = {};
            if (data.ytfy && data.ytfy[event_id]) {
              $.each(data.ytfy[event_id], function(i, mkt) {
                marketTypeMap[mkt.market_id] = mkt.market_type || 'Unknown';
              });
            }

            analysis_html += '<div class="card mb-3">';
            analysis_html +=
              '<div class="card-header d-flex justify-content-between align-items-center text-white p-2">' +
              '<span>' +
              '                <a href="' + MASTER_URL + '/events-analysis?eventType=' + event_data.event_type + '&eventId=' + event_data.event_id + '&marketId=' + event_data.oddsmarketId + '">' + event_data.event_name + '/' + event_data.event_id + '</a></span>' +
              '<small>' + (event_data.event_date || '') + '</small>' +
              '</div>';

            // Card Body Start
            analysis_html += '<div class="card-body p-2">';

            // Attach market_type to each market
            $.each(event_data.market_pl, function(i, m) {
              m.market_type = marketTypeMap[m.market_id] || 'Unknown';
            });

            // Group by market_type
            var marketTypeGroups = {};
            $.each(event_data.market_pl, function(index2, market_data) {
              var type = market_data.market_type || 'Unknown';
              if (!marketTypeGroups[type]) {
                marketTypeGroups[type] = [];
              }
              marketTypeGroups[type].push(market_data);
            });

            analysis_html += '<div class="row">';

            $.each(marketTypeGroups, function(market_type, markets) {
              analysis_html += '<div class="col-sm-12 col-xl-4 mb-3">';

              // Market Type Title
              analysis_html +=
                '<h6 class="mb-1 text-uppercase text-primary border-bottom pb-1" style="background-color: rgba(0, 0, 0, 0.05);border: 1px solid #dee2e6;text-align: left;padding-left: 5px;padding-top: 5px;">' +
                market_type + '</h6>';

              // Group by market_name and sum PL
              var marketNameTotals = {};
              $.each(markets, function(i, m) {
                if (!marketNameTotals[m.market_name]) {
                  marketNameTotals[m.market_name] = 0;
                }
                marketNameTotals[m.market_name] += parseFloat(m.pl);
              });

              // Print each market_name
              $.each(marketNameTotals, function(name, totalPL) {
                var td_style = (totalPL > 0) ? 'color:green;' : 'color:red;';
                analysis_html +=
                  '<div class="row  pt-1 px-2">' +
                  '<div class="col-6 text-truncate">' + name + '</div>' +
                  '<div class="col-6 text-right fw-bold" style="' + td_style + '">' +
                  totalPL.toFixed(2) + '</div>' +
                  '</div>';
              });

              analysis_html += '</div>';
            });

            analysis_html += '</div>';

            // Total Bets
            // analysis_html +=
            //     '<div class="row border-top pt-1 mt-2">' +
            //     '<div class="col-6"><strong>Total Bets</strong></div>' +
            //     '<div class="col-6 text-right"><span>' + event_data.total_bet + '</span></div>' +
            //     '</div>';

            // Close Card
            analysis_html += '</div></div>';
          });



          $('#analysis_html').html(analysis_html);
        }
      });
    }
    
  $(".refresh-btn").on("click", function() {
    let icon = $(this).find("i");
    icon.addClass("spin");

    // Remove spin after 2 seconds (or when your data reload finishes)
    setTimeout(() => {
      icon.removeClass("spin");
    }, 1000);
  });

  $(".refresh-btn").on("click", function() {
    let icon = $(this).find("i");

    icon.addClass("fa-spin");

    call_page();

    xhr.always(function() {
      icon.removeClass("fa-spin");
    });
  });

  $(document).on('input', '#searchEvent', function() {
    var searchValue = $(this).val().toLowerCase().trim();

    // Loop through each card
    $('#analysis_html .card').each(function() {
      var eventName = $(this).find('.card-header a').text().toLowerCase();

      // Show or hide cards based on match
      if (eventName.includes(searchValue)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
</script>