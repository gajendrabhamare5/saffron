<style>
    .bg-green{
        background-color: #00a65a !important;
    }

    .bg-red{
        background-color: #dd4b39 !important;
    }

    .bg-aqua{
        background-color: #00c0ef !important;
    }
    .bg-yellow{
        background-color: #f39c12 !important;
    }

    .bg-red, .bg-yellow, .bg-aqua, .bg-blue, .bg-green {
        color: #fff !important;
    }

    .info-box {
        display: block;
        min-height: 90px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        border-radius: 2px;
        margin-bottom: 15px;
    }

    .info-box-icon {
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
        display: block;
        float: left;
        height: 90px;
        width: 90px;
        text-align: center;
        font-size: 45px;
        line-height: 90px;
        background: rgba(0,0,0,0.2);
    }

    .info-box-content {
        padding: 5px 10px;
        margin-left: 90px;
    }

    .info-box-text {
        text-transform: uppercase;
    }

    .info-box-text {
        display: block;
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding-top: 5px;
    }

    .info-box-number {
        display: block;
        font-weight: bold;
        font-size: 18px;
        padding: 5px 0;
    }

    .info-box .progress, .info-box .progress .progress-bar {
        border-radius: 0;
    }

    .info-box .progress {
        background: rgba(0,0,0,0.2);
        margin: 5px -10px 5px -10px;
        height: 2px;
    }

    .progress, .progress>.progress-bar, .progress .progress-bar, .progress>.progress-bar .progress-bar {
        border-radius: 1px;
    }

    .progress, .progress>.progress-bar {
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .progress {
        height: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    }

    .info-box .progress .progress-bar {
        background: #fff;
    }

    .info-box-text {
        display: block;
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="col-md-12 main-container">
    <div class="listing-grid">
        <h4>My Profit & Loss</h4>
        <div class="row">
            <div class="col-md-3">
                <!-- Info Boxes Style 2 -->
                <div class="info-box" id="bg-today_pl">
                    <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Today</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="info-box-number" id="today-pl">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3">
                <div class="info-box" id="bg-weekly_pl">
                    <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Weekly</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="info-box-number" id="weekly-pl">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3">
                <div class="info-box" id="bg-monthly_pl">
                    <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Monthly</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="info-box-number" id="monthly-pl">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 main-container">
    <div class="listing-grid">
        <h4></h4>
        <div class="row">
            <div class="col-md-3">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow" id="bg-pending_results">
                    <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pending Results</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="info-box-number" id="pending_results">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        get_dashboard_data();
        setInterval(get_dashboard_data, 1000 * 60);
        function get_dashboard_data() {

            $.ajax({
                url: 'dashboard/get_dashboard_data',
                type: 'get',
                dataType: 'json',
                success: function (responce) {

                    $('#today-pl').text(responce.pl.today);
                    $('#weekly-pl').text(responce.pl.weekly);
                    $('#monthly-pl').text(responce.pl.monthly);

                    $('#pending_results').text(responce.pending_results);

                    $('#bg-today_pl, #bg-weekly_pl, #bg-monthly_pl').removeClass('bg-aqua bg-green bg-red');

                    if (responce.pl.today == 0)
                        $('#bg-today_pl').addClass('bg-aqua');
                    else if (responce.pl.today > 0)
                        $('#bg-today_pl').addClass('bg-green');
                    else
                        $('#bg-today_pl').addClass('bg-red');

                    if (responce.pl.weekly == 0)
                        $('#bg-weekly_pl').addClass('bg-aqua');
                    else if (responce.pl.weekly > 0)
                        $('#bg-weekly_pl').addClass('bg-green');
                    else
                        $('#bg-weekly_pl').addClass('bg-red');

                    if (responce.pl.monthly == 0)
                        $('#bg-monthly_pl').addClass('bg-aqua');
                    else if (responce.pl.monthly > 0)
                        $('#bg-monthly_pl').addClass('bg-green');
                    else
                        $('#bg-monthly_pl').addClass('bg-red');
                }
            });

        }
    });
</script>