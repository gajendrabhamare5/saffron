<?php
include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head_css2.php");
?>
<style>
    input.custom-text {
        display: inline-block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem 0.1rem .375rem .75rem;
        line-height: 1.5;
        color: #495057;
        vertical-align: middle;
        background-size: 8px 10px;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }

    table.dataTable thead .sorting_asc:after {
        display: none;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card {
        box-shadow: 0 0 5px #a4a4a4;
    }

    .card {
        margin-bottom: 10px;
    }

    .card-header {
        padding: .5rem 1rem;
        margin-bottom: 0;
       /*  background-color: rgba(0, 0, 0, .03); */
        border-bottom: 1px solid rgba(0, 0, 0, .125);
    }

    .card-header {
       /*  background-color: #2c3e50; */
        color: #ffffff;
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    h4, .h4 {
        font-size: 20px;
        font-weight: 400;
        margin-bottom: 0;
    }

    .card-title {
        margin-bottom: 0;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1rem 1rem;
    }

    .card-body {
        padding: 6px;
    }

    .row.row5 {
        margin-left: -5px;
        margin-right: -5px;
    }

    @media (min-width: 768px) {
        .col-md-3 {
            flex: 0 0 auto;
            width: 25%;
        }
    }

    @media (min-width: 992px) {
        .col-lg-2 {
            flex: 0 0 auto;
            width: 16.66666667%;
        }
    }

    @media (min-width: 992px) {
        .col-lg-3 {
            flex: 0 0 auto;
            width: 25%;
        }
    }

    .row.row5 > [class*="col-"], .row.row5 > [class*="col"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .react-datepicker-wrapper {
        /* display: inline-block; */
        padding: 0;
        border: 0;
    }

    .react-datepicker__input-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .custom-datepicker {
        position: relative;
    }

    button, input, optgroup, select, textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .form-control, .form-select {
        background-color: #ffffff !important;
        color: #000000 !important;
        border-color: #dbdbdb !important;
        padding: 5px;
        border-radius: 0;
    }

    .form-control:disabled, .form-control[readonly] {
        background-color: #e9ecef;
        opacity: 1;
    }

    .fa, .fab, .fad, .fal, .far, .fas {
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        line-height: 1;
    }

    .far {
        font-weight: 400;
    }

    .fa, .far, .fas {
        font-family: "Font Awesome 5 Free";
    }

    .custom-datepicker i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
    }

    .fa-calendar:before {
        content: "\f133";
    }

    .input-group {
        position: relative;
        display: flex
    ;
        flex-wrap: wrap;
        align-items: stretch;
        width: 100%;
    }

    .position-relative {
        position: relative !important;
    }

    .form-select {
        display: block;
        width: 100%;
        padding: .375rem 2.25rem .375rem .75rem;
        -moz-padding-start: calc(0.75rem - 3px);
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e);
        background-repeat: no-repeat;
        background-position: right .75rem center;
        background-size: 16px 12px;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .form-control, .form-select {
        background-color: #ffffff !important;
        color: #000000 !important;
        border-color: #dbdbdb !important;
        padding: 5px;
        border-radius: 0;
    }

    .input-group>.form-control, .input-group>.form-select {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
    }

    .btn, .form-control, .form-select {
        height: 38px;
        border-radius: 0;
    }

    .btn-primary {
        background-color: #0088cc;
        color: #ffffff;
        border-color: #0088cc;
    }

    .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
        background-color: #0088cc;
        color: ffffff;
        border-color: #0088cc;
    }

    .btn:hover, .btn:focus, .btn:active {
        opacity: 0.85;
    }

    .d-grid {
        display: grid !important;
    }

    .mt-2 {
        margin-top: .5rem !important;
    }

    .row.row10 {
        margin-left: -10px;
        margin-right: -10px;
    }

    .input-group>.form-control, .input-group>.form-select {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
    }

    .input-group:not(.has-validation)>.dropdown-toggle:nth-last-child(n+3), .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        margin-left: -1px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .input-group span {
        display: flex;
        align-items: center;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-responsive {
        min-height: 300px;
    }

    table {
        caption-side: bottom;
        border-collapse: collapse;
        --bs-table-bg: transparent;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;

        background-color: #f7f7f7;
        color: #333;
        margin-bottom: 0;
    }

    .table {
        background-color: #f7f7f7;
        color: #333;
        margin-bottom: 0;
    }

    tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
    }

    tbody, td, tfoot, th, thead, tr {
        border-color: #c7c8ca;
    }

    .table>thead {
        vertical-align: bottom;
    }

    .table-bordered>:not(caption)>* {
        border-width: 1px 0;
    }

    .table td, .table th {
        /* padding: 4px 8px; */
        font-size: 16px;
    }

    .table-bordered thead td, .table-bordered thead th {
        border-bottom-width: 0;
    }

    .report-date {
        width: 190px;
    }

    .report-sr {
        width: 70px;
    }

    .report-amount {
        width: 100px;
    }

    .round-id {
        width: 150px;
    }

</style>

<style>
    /* Custom Pagination Styling */
    .pagination-container {
        display: flex;
        gap: 20px;
        align-items: center;
        flex-wrap: wrap;
        font-size: 16px;
        justify-content : center;
    }

        .pagination {
        list-style: none;
        padding: 0;
        margin: 0;
        }

        .page-btn {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 6px 12px;
            /* margin-right: 5px; */
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
            height: 38px;
            line-height: 26px;
        }

        .page-btn:hover {
        background-color: #f0f0f0;
        }

        .page-input {
        width: 80px;
        display: inline-block;
        padding: 5px;
        font-size: 14px;
        height: 32px;
        margin-left: 5px;
        }

        .pagination  > li:first-child {
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .pagination > li:nth-child(4n) {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

        .dataTables_paginate {
            display: none;
        }

        .dataTables_info {
            display: none;
        }

        .browserbox {
            display: none;
        }

        table {
            width: 100% !important;
        }


       
       
    </style>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div class="wrapper">
            <?php
            include("header.php");
            ?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">

                        <?php
                        include("left_sidebar.php");
                        ?>
                        <div class="col-md-10 report-main-content m-t-5">
                            <div class="loader" style="display:none;"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Casino Results</h4>
                                </div>
                                <div class="card-body container-fluid container-fluid-5">
                                    <div class="report-form">
                                        <div class="row row5">
                                            <div class="col-lg-2 col-md-3 col-5">
                                            <div class="react-datepicker-wrapper">
                                                <div class="react-datepicker__input-container">
                                                    <div class="mb-2 custom-datepicker date-container"><input  type="date" name="game_date" id="game_date" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                                        <!-- <i class="far fa-calendar mr-2"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-7">
                                            <div class="mb-2 input-group form-group position-relative">
                                            <select name="reportType" class="custom-select " id="casino_type">
                                                <option value="" disabled="disabled">Casino Type</option>

                                                <option value="teen" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    1 Day Teenpatti</option>

                                                <option value="teen9" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen9") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Test Teenpatti</option>

                                                <option value="teen20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    20-20 Teenpatti</option>

                                                <option value="teen8" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen8") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Open Teenpatti</option>

                                                <option value="poker" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "poker") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    1 Day Poker</option>

                                                <option value="poker20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "poker20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    20-20 Poker</option>

                                                <option value="poker6" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "poker6") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    6 Player Poker</option>

                                                <option value="ab20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "ab20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Andar Bahar</option>

                                                <option value="abj" <?php if (isset($_GET['game_type'])) {
                                                                        if ($_GET['game_type'] == "abj") {
                                                                            echo "selected='selected'";
                                                                        }
                                                                    } ?>>
                                                    Andar Bahar 2</option>

                                                <option value="3cardj" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "3cardj") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    3 Card Judgement</option>

                                                <option value="card32" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "card32") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    32 Cards - A</option>

                                                <option value="card32eu" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "card32eu") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    32 Cards - B</option>

                                                <option value="worli" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "worli") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Worli Matka</option>

                                                <option value="worli2" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "worli2") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Instant Worli Matka</option>

                                                <option value="lucky7" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "lucky7") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Lucky 7 - A</option>

                                                <option value="lucky7eu" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "lucky7eu") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Lucky 7 - B</option>

                                                <option value="dt20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "dt20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    20-20 Dragon Tiger</option>

                                                <option value="dt202" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "dt202") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    20-20 Dragon Tiger 2</option>

                                                <option value="dt6" <?php if (isset($_GET['game_type'])) {
                                                                        if ($_GET['game_type'] == "dt6") {
                                                                            echo "selected='selected'";
                                                                        }
                                                                    } ?>>
                                                    1-Day Dragon Tiger</option>

                                                <option value="aaa" <?php if (isset($_GET['game_type'])) {
                                                                        if ($_GET['game_type'] == "aaa") {
                                                                            echo "selected='selected'";
                                                                        }
                                                                    } ?>>
                                                    Amar Akbar Anthoni</option>

                                                <option value="aaa2" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "aaa2") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Amar Akbar Anthoni2</option>

                                                <option value="btable" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "btable") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Bollywood Casino</option>

                                                <option value="war" <?php if (isset($_GET['game_type'])) {
                                                                        if ($_GET['game_type'] == "war") {
                                                                            echo "selected='selected'";
                                                                        }
                                                                    } ?>>
                                                    War</option>

                                                <option value="dtl20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "dtl20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    20-20 Dragon Tiger Lion</option>

                                                <option value="meter" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "meter") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Casino Meter</option>

                                                <option value="cmatch20" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "cmatch20") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Cricket Casino 20-20</option>

                                                <option value="baccarat" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "baccarat") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Baccarat</option>

                                                <option value="baccarat2" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "baccarat2") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Baccarat 2</option>

                                                <option value="race20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "race20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Race 20-20</option>

                                                <option value="queen" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "queen") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Queen</option>

                                                <option value="cricketv3" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "cricketv3") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Five Cricket</option>

                                                <option value="superover" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "superover") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Super Over</option>
                                                <option value="ballbyball" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "ballbyball") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Ball By Ball</option>
                                                <option value="goal" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "goal") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Goal</option>
                                                <option value="lucky15" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "lucky15") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Lucky15</option>
                                                <option value="superover3" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "superover3") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Mini Super Over</option>
                                                <option value="superover2" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "superover2") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Super Over 2</option>
                                                <option value="lucky7eu2" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "lucky7eu2") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Lucky 7 - C</option>
                                                <option value="teen41" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen41") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Queen Top Open Teenpatti</option>
                                                <option value="teen42" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen42") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Jack Top Open Teenpatti</option>
                                                <option value="teen6" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen6") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Teenpatti - 2.0</option>
                                                <option value="teen33" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen33") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Instant Teenpatti 3.0</option>
                                                <option value="teen3" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen3") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Instant Teenpatti</option>
                                                <option value="teen32" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen32") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Instant Teenpatti 2.0</option>
                                                <option value="sicbo2" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "sicbo2") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Sic Bo 2</option>
                                                <option value="sicbo" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "sicbo") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Sic Bo</option>
                                                <option value="lottcard" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "lottcard") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>
                                                    Lottery</option>
                                                <option value="trap" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "trap") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    The Trap</option>
                                                <option value="patti2" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "patti2") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    2 Cards Teenpatti</option>
                                                <option value="teensin" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teensin") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    29Card Baccarat</option>
                                                <option value="teenmuf" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teenmuf") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>
                                                    Muflis Teenpatti</option>
                                                <option value="race17" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "race17") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>> Race17</option>

                                                <option value="teen20b" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen20b") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>> 20-20 Teenpatti B</option>
                                                <option value="trio" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "trio") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>TRIO</option>
                                                <option value="notenum" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "notenum") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>> Note Number</option>
                                                <option value="kbc" <?php if (isset($_GET['game_type'])) {
                                                                        if ($_GET['game_type'] == "kbc") {
                                                                            echo "selected='selected'";
                                                                        }
                                                                    } ?>> KBC</option>
                                                <option value="teen120" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen120") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>> 1 CARD 20-20</option>
                                                <option value="teen1" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen1") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>> 1 CARD ONE-DAY</option>
                                                <option value="race2" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "race2") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>> Race to 2nd</option>
                                                <option value="dum10" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "dum10") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>> Dus ka Dum</option>
                                                <option value="teen20c" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen20c") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>20-20 Teenpatti C</option>
                                                <option value="cmeter1" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "cmeter1") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>1 Card Meter</option>
                                                <option value="teenjoker" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teenjoker") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Teenpatti Joker</option>
                                                <option value="btable2" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "btable2") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Bollywood Casino 2</option>
                                                <option value="ab3" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "ab3") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>ANDAR BAHAR 50 CARDS </option>
                                                 <option value="ab4" <?php if (isset($_GET['game_type'])) {
                                                                    if ($_GET['game_type'] == "ab4") {
                                                                        echo "selected='selected'";
                                                                    }
                                                                } ?>>ANDAR BAHAR 150 cards</option>
                                                <option value="roulette13" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "roulette13") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                            } ?>>ROULETTE </option>
                                                    <option value="ourroullete" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "ourroullete") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>Unique Roulette </option>
                                                    <option value="roulette12" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "roulette12") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>Beach Roulette </option>
                                                    <option value="roulette11" <?php if (isset($_GET['game_type'])) {
                                                                                if ($_GET['game_type'] == "roulette11") {
                                                                                    echo "selected='selected'";
                                                                                }
                                                                            } ?>>Golden Roulette </option>
                                                <option value="poison" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "poison") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Teenpatti Poison One Day  </option>
                                                <option value="poison20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "poison20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Teenpatti Poison 20-20  </option>
                                                <option value="joker20" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "joker20") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Teenpatti Joker 20-20 </option> 
                                                <option value="joker120" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "joker120") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Unlimited Joker 20-20 </option>
                                                <option value="joker1" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "joker1") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Unlimited Joker Oneday </option>                                
                                                <option value="teen62" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teen62") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>V-VIP Teenpatti 1-day </option>
                                                <option value="mogambo" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "mogambo") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Mogambo </option>
                                                <option value="lucky5" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "lucky5") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Lucky 6 </option>
                                                <option value="dolidana" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "dolidana") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Dolidana </option>
                                                <option value="teenunique" <?php if (isset($_GET['game_type'])) {
                                                                            if ($_GET['game_type'] == "teenunique") {
                                                                                echo "selected='selected'";
                                                                            }
                                                                        } ?>>Unique Teenpatti </option>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="casino_result()">Submit</button></div>
                                        </div>
                                        <!-- <div class="row row10 mt-2 justify-content-between">
                                            <div class="col-lg-2 col-6">
                                            <div class="mb-2 input-group position-relative">
                                                <span class="me-2">Show</span>
                                                <select class="form-select">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                </select>
                                                <span class="ms-2">Entries</span>
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-6">
                                            <div class="mb-2 input-group position-relative"><span class="me-2">Search:</span><input type="search" class="form-control" placeholder="0 records..." value=""></div>
                                            </div>
                                        </div> -->
                                        <div class="mt-2 table-responsive">
                                            <table role="table" class="table table-bordered table-striped" id="casino_result_table">
                                            <thead role="rowgroup" class="">
                                                <tr role="row">
                                                    <th colspan="1" role="columnheader" class="round-id">Round ID</th>
                                                    <th colspan="1" role="columnheader" class="winner">Winner</th>
                                                </tr>
                                            </thead>
                                            <tbody role="rowgroup" id="casino_result"></tbody>
                                            </table>
                                            <div class="pagination-container" style="display:none;">
                                                <ul class="pagination mb-0 d-flex align-items-center">
                                                    <li><button id="firstPage" class="page-btn">First</button></li>
                                                    <li><button id="prevPage" class="page-btn">Previous</button></li>
                                                    <li><button id="nextPage" class="page-btn">Next</button></li>
                                                    <li><button id="lastPage" class="page-btn">Last</button></li>
                                                </ul>
                                                <ul class="pagination mb-0 d-flex align-items-center">
                                                <li><span class="me-2">Page <b><span id="currentpage">1</span> of <span id="totalPages">1</span></b></span> | Go to Page <input type="text" id="pageNumber" class="page-input form-control d-inline-block ms-2" value="1"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <?php
            include("footer.php");
            ?>
        </div>
    </div>
    <?php
    include("footer-js.php");
    ?>
    <?php


include("footer-result-popup.php");
?>
    <script src="storage/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <script src="storage/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>
<script>
    var tableNew;
    function casino_result() {
        $(".loader").show();
        var game_date = $("#game_date").val();
        var casino_type = $("#casino_type").val();
        if (casino_type == "meter") {
            casino_type = "c" + casino_type;
        }
        var return_html = "";
        if (casino_type == "") {
            $("#bet-error-class").removeClass("b-toast-success");
            $("#bet-error-class").removeClass("b-toast-danger");
            $("#bet-error-class").addClass("b-toast-danger");
            $("#errorMsgText").text("Please Select Casino Type");
            $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
        }
        if ($.fn.DataTable.isDataTable('#casino_result_table')) {
            $("#casino_result_table").DataTable().destroy();
        }
        tableNew = $('#casino_result_table').dataTable({
            bProcessing: true,
            bServerSide: true,
            sAjaxSource: "../ajaxfiles/casino_result.php",
            iDisplayLength: 10,
            lengthMenu: [
                [10, 50, 100, 200, 500, 1000, -1],
                [10, 50, 100, 200, 500, 1000, "All"],
            ],
            fnServerData: function(sSource, aoData, fnCallback) {
                aoData.push({
                    name: "game_date",
                    value: game_date,
                });
                aoData.push({
                    name: "casino_type",
                    value: casino_type,
                });
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: sSource,
                    data: aoData,
                    success: function(json) {
                        $(".pagination-container").show();
                        $(".loader").hide();

                        fnCallback(json);
                        /* tableNew.api().draw(false); */
                        updatePaginationControls();
                    },
                });
            },
            fnRowCallback: function(nRow, aData, iDisplayIndex) {

                $(".loader").hide();

                return nRow;
            },
            aoColumns: [{
                    mDataProp: "round",
                    bSortable: false
                },
                {
                    mDataProp: "winner",
                    bSortable: false
                }
            ],
        });
        /* $.ajax({
            type: 'POST',
            url: '../ajaxfiles/casino_result.php',
            dataType: 'json',
            data: {
                game_date: game_date,
                casino_type: casino_type
            },
            success: function(response) {
                status = response.status;
                $(".loader").hide();
                if (status == "ok") {
                    result_data = response.data;
                    if (result_data != null) {
                        for (var i in result_data) {
                            result_status = result_data[i]['result_status'];
                            result_status_text = "";
                            if (casino_type == "poker" || casino_type == "poker20") {
                                result_status_text = "Poker " + result_status + " - ";
                            } else if (casino_type == "poker6" || casino_type == "card32" || casino_type ==
                                "card32eu") {
                                result_status_text = "Player " + result_status + " - ";
                            }

                          
                            return_html += "<tr><td onclick='view_casiono_result(" + result_data[i][
                                    'event_id'
                                ] + ")'>" + result_data[i]['event_id'] + "</td><td><b>Winner:</b> " +
                                result_status_text + " " + result_data[i]['game_type'] + "</td></tr>";
                        }
                    } else {
                        $("#bet-error-class").removeClass("b-toast-success");
                        $("#bet-error-class").removeClass("b-toast-danger");
                        $("#bet-error-class").addClass("b-toast-danger");
                        $("#errorMsgText").text("No records found");
                        $("#errorMsg").fadeIn('fast').delay(3000).hide(0);
                    }

                    $("#casino_result").html(return_html);
                    $("#casino_result_table").DataTable({
                        "ordering": false,
                        "pagingType": "full_numbers",
                        "pageLength": 50,
                        "drawCallback": function() {
                            $('.dataTables_paginate > a,.dataTables_paginate span a').addClass(
                                'button btn btn-diamond').removeClass('paginate_button');
                            //                $('.dataTables_paginate > a,.dataTables_paginate span a.current').addClass('disabled');
                        },

                    });

                }

            }
        }); */
    }

    function updatePaginationControls() {
        if (tableNew) {
            $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');
            let pageInfo = tableNew.api().page.info();
            console.log("pageInfo=", pageInfo);
            $("#pageNumber").val(pageInfo.page + 1);
            $("#currentpage").text(pageInfo.page + 1);
            $("#totalPages").text(pageInfo.pages);
        }
    }

    // Pagination Button Handlers
    $("#firstPage").on("click", function() {
        if (tableNew) tableNew.api().page('first').draw('page');
    });

    $("#prevPage").on("click", function() {
        if (tableNew) tableNew.api().page('previous').draw('page');
    });

    $("#nextPage").on("click", function() {
        if (tableNew) tableNew.api().page('next').draw('page');
    });

    $("#lastPage").on("click", function() {
        if (tableNew) tableNew.api().page('last').draw('page');
    });

    $("#pageNumber").on("change", function() {
        let pageNum = parseInt($(this).val(), 10) - 1;
        if (!isNaN(pageNum) && tableNew) {
            tableNew.api().page(pageNum).draw('page');
        }
    });
    $(document).ready(function() {
        $('#casino_result_table').dataTable({
            aoColumns: [{
                    mDataProp: "round",
                    bSortable: false
                },
                {
                    mDataProp: "winner",
                    bSortable: false
                }
            ],
        });
        $('.dataTables_empty').hide();
        $(".pagination-container").hide();
        $('.dataTables_wrapper select,.dataTables_wrapper input').addClass('form-control');
    });

    function view_casiono_result(event_id) {
        $(".loader").show();
        $("#cards_data").html("");

        $("#round_no").text(event_id);
        var result_title = '';

        var casino_type = $("#casino_type").val();
        if (casino_type == "teen20") {
            result_title = "20-20 Teenpatti Result";
        } else if (casino_type == "teen") {
            result_title = "1 Day Teenpatti Result";
        } else if (casino_type == "teen9") {
            result_title = "Test Teenpatti Result";
        } else if (casino_type == "war") {
            result_title = "Casino War Result";
        } else if (casino_type == "teen8") {
            result_title = "Open Teenpatti Result";
        } else if (casino_type == "poker") {
            result_title = "1 Day Poker Result";
        } else if (casino_type == "poker20") {
            result_title = "20-20 Poker Result";
        } else if (casino_type == "poker6") {
            result_title = "6 Player Poker Result";
        } else if (casino_type == "ab20") {
            //aa baki
            result_title = "Andar Bahar Result";
        } else if (casino_type == "abj") {
            //aa baki
            result_title = "Andar Bahar 2 Result";
        } else if (casino_type == "3cardj") {
            result_title = "3 Card Judgement Result";
        } else if (casino_type == "card32") {
            result_title = "32 Cards - A Result";
        } else if (casino_type == "card32eu") {
            result_title = "32 Cards - B Result";
        } else if (casino_type == "worli") {
            //aa baki
            result_title = "32 Cards - B Result";
        } else if (casino_type == "worli2") {
            result_title = "Instant Worli Matka Result";
        } else if (casino_type == "lucky7") {
            result_title = "Lucky 7 - A Result";
        } else if (casino_type == "lucky7eu") {
            result_title = "Lucky 7 - B Result";
        } else if (casino_type == "dt20") {
            result_title = "20-20 Dragon Tiger Result";
        } else if (casino_type == "dt202") {
            result_title = "20-20 Dragon Tiger 2 Result";
        } else if (casino_type == "dt6") {
            result_title = "1-Day Dragon Tiger Result";
        } else if (casino_type == "aaa") {
            result_title = "Amar Akbar Anthony Result";
        } else if (casino_type == "aaa2") {
            result_title = "Amar Akbar Anthony 2 Result";
        } else if (casino_type == "btable") {
            result_title = "Bollywood Casino Result";
        } else if (casino_type == "dtl20") {
            result_title = "20-20 Dragon Tiger Lion Result";
        } else if (casino_type == "cmeter") {
            //aa baki
            result_title = "Casino Meter Result";
        } else if (casino_type == "cmatch20") {
            //aa baki
            result_title = "Cricket Casino 20-20 Result";
        } else if (casino_type == "baccarat") {
            result_title = "Baccarat Result";
        } else if (casino_type == "baccarat2") {
            result_title = "Baccarat 2 Result";
        } else if (casino_type == "race20") {
            result_title = "Race 20-20 Result";
        } else if (casino_type == "queen") {
            result_title = "Queen Result";
        } else if (casino_type == "cricketv3") {
            result_title = "Five Cricket Result";
        } else if (casino_type == "superover") {
            result_title = "Super over Result";
        } else if (casino_type == "ballbyball") {
            result_title = "Ball By Ball";
        } else if (casino_type == "goal") {
            result_title = "Goal";
        } else if (casino_type == "lucky15") {
            result_title = "Lucky15";
        } else if (casino_type == "superover3") {
            result_title = "Mini Super Over";
        } else if (casino_type == "superover2") {
            result_title = "Super Over 2";
        } else if (casino_type == "teen41") {
            result_title = "Queen Top Open Teenpatti";
        } else if (casino_type == "teen42") {
            result_title = "Jack Top Open Teenpatti";
        } else if (casino_type == "teen6") {
            result_title = "Teenpatti - 2.0";
        } else if (casino_type == "teen33") {
            result_title = "Instant Teenpatti 3.0";
        } else if (casino_type == "teen3") {
            result_title = "Instant Teenpatti";
        } else if (casino_type == "teen32") {
            result_title = "Instant Teenpatti 2.0";
        } else if (casino_type == "sicbo2") {
            result_title = "Sicbo 2";
        } else if (casino_type == "sicbo") {
            result_title = "Sicbo";
        } else if (casino_type == "lottcard") {
            result_title = "Lottery";
        } else if (casino_type == "trap") {
            result_title = "The Trap";
        } else if (casino_type == "patti2") {
            result_title = "2 Cards Teenpatti";
        } else if (casino_type == "teensin") {
            result_title = "29Card Baccarat";
        } else if (casino_type == "teenmuf") {
            result_title = "Muflis Teenpatti";
        } else if (casino_type == "race17") {
            result_title = "Race17";
        } else if (casino_type == "teen20b") {
            result_title = "20-20 Teenpatti B";
        } else if (casino_type == "trio") {
            result_title = "TRIO";
        } else if (casino_type == "notenum") {
            result_title = "Note Number";
        } else if (casino_type == "kbc") {
            result_title = "KBC";
        } else if (casino_type == "teen120") {
            result_title = "1 CARD 20-20";
        } else if (casino_type == "teen1") {
            result_title = "1 CARD ONE-DAY";
        } else if (casino_type == "race2") {
            result_title = "Race to 2nd";
        } else if (casino_type == "dum10") {
            result_title = "Dus ka Dum";
        } else if (casino_type == "teen20c") {
            result_title = "20-20 Teenpatti C";
        }
        else if (casino_type == "cmeter1") {
            result_title = "1 Card Meter";
        }
        else if (casino_type == "teenjoker") {
            result_title = "Teenpatti Joker";
        } else if (casino_type == "btable2") {
            result_title = "Bollywood Casino 2";
        } else if (casino_type == "ab3") {
            result_title = "ANDAR BAHAR 50 CARDS";
        }else if (casino_type == "ab4") {
            result_title = "ANDAR BAHAR 150 CARDS";
        }else if (casino_type == "roulette13") {
            result_title = "ROULETTE";
        }else if (casino_type == "roulette12") {
            result_title = "Beach Roulette";
        }else if (casino_type == "roulette11") {
            result_title = "Golden Roulette";
        }else if (casino_type == "ourroullete") {
            result_title = "Unique Roulette";
        }else if (casino_type == "poison") {
            result_title = "Teenpatti Poison One Day";
        }else if (casino_type == "Poison20") {
            result_title = "Teenpatti Poison 20-20";
        }else if (casino_type == "joker20") {
            result_title = "Teenpatti Joker 20-20";
        }else if (casino_type == "joker120") {
            result_title = "Unlimited Joker 20-20";
        }else if (casino_type == "joker1") {
            result_title = "Unlimited Joker Oneday";
        }else if (casino_type == "teen62") {
            result_title = "V-VIP Teenpatti 1-day";
        }else if (casino_type == "mogambo") {
            result_title = "MOGAMBO";
        }else if (casino_type == "lucky5") {
            result_title = "Lucky 6";
        }else if (casino_type == "dolidana") {
            result_title = "Dolidana";
        }else if (casino_type == "teenunique") {
            result_title = "Unique Teenpatti";
        }
        $("#result_title").text(result_title);
        $.ajax({
            type: 'POST',
            url: '../ajaxfiles/get_result_cards.php',
            dataType: 'text',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
                $(".loader").hide();
                $('#casino_result_popup').modal("show");
                $("#cards_data").html(response);

            }
        });
    }
</script>

<div id="account_bet_popup" class="modal" role="dialog">
    <div class="modal-dialog" style="    max-width: 80% !important;">
        <div class="modal-dialog modal-full"><span tabindex="0"></span>
            <div role="document" id="__BVID__694___BV_modal_content_" tabindex="-1" class="modal-content">
                <!---->
                <div id="__BVID__694___BV_modal_body_" class="modal-body">
                    <div class="container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-12 text-center">
                                <div id="match_delete" role="radiogroup" tabindex="-1">
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="matched" type="radio" name="match_delete" autocomplete="off" checked='checked' value="1" class="custom-control-input">
                                        <label for="matched" class="custom-control-label"><span>Matched</span></label>
                                    </div>
                                    <div class="custom-control custom-control-inline custom-radio">
                                        <input id="deleteed" type="radio" name="match_delete" autocomplete="off" value="2" class="custom-control-input">
                                        <label for="deleteed" class="custom-control-label"><span>Deleted</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row5">
                            <div class="col-12">
                                <input type="hidden" name="bet_time" id="bet_time" />
                                <div class="table-responsive">
                                    <table role="table" aria-busy="false" aria-colcount="8" class="table b-table table-bordered" id="__BVID__886">
                                        <!---->
                                        <!---->
                                        <thead role="rowgroup" class="">
                                            <!---->
                                            <tr role="row" class="">
                                                <th aria-colindex="1" class="text-right">No</th>
                                                <th aria-colindex="2" class="text-center">Nation</th>
                                                <th aria-colindex="3" class="text-center">Side</th>
                                                <th aria-colindex="4" class="text-right">Rate</th>
                                                <th aria-colindex="5" class="text-right">Amount</th>
                                                <th aria-colindex="6" class="text-right">Win/Loss</th>
                                                <th aria-colindex="7" class="text-center">Place Date</th>
                                                <th aria-colindex="8" class="text-center">Match Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="account_bet_statement">

                                        </tbody>
                                        <!---->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer id="__BVID__694___BV_modal_footer_" class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        Close
                    </button>
                </footer>
            </div><span tabindex="0"></span>
        </div>
    </div>

</div>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>