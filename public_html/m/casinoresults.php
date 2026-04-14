<?php
include("../include/conn.php");
include("../include/flip_function.php");
include("../session.php");
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: unset;
    }


    a.button.btn.btn-diamond {
        margin: 0 4px 4px 0;
    }
</style>
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
        text-align: left;
    }

    /* .result-image span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 32px;
    } */
</style>
<style>
    /* Custom Pagination Styling */
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 2px;
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .pagination button {
        padding: 5px 10px;
        border: 1px solid #ddd;
        background-color: #fff;
        cursor: pointer;
    }

    .pagination button:hover {
        background-color: #f2f2f2;
    }

    .page-input {
        width: 100px;
        text-align: center;
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

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div>
            <?php
            include("header.php");
            ?>
            <div class="report-container account_stat report-page">
                <!---->


                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Casino Result</h4>
                    </div>
                    <div class="card-body container-fluid container-fluid-5">
                        <div class="row row5">
                            <div class="col-6">
                            <div class="date-container">
    <input  type="date" name="game_date" id="game_date" value="<?php echo date("Y-m-d"); ?>" class="form-control">
        <i class="far fa-calendar mr-2"></i>
</div>
                                <!-- <div class="form-group mb-0">
                                    <input type="date" name="game_date" id="game_date"
                                        value="<?php echo date("Y-m-d"); ?>" class="form-control" />
                                </div> -->
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-0">
                                    <select name="reportType" class="custom-select " id="casino_type">
                                        <option value="" disabled="disabled">Casino Type</option>

                                        <option value="teen" <?php if (isset($_GET['game_type'])) {
                                                                    if ($_GET['game_type'] == "teenOdi") {
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
                                                                } ?>>Teenpatti Poison One Day </option>
                                        <option value="poison20" <?php if (isset($_GET['game_type'])) {
                                                                    if ($_GET['game_type'] == "poison20") {
                                                                        echo "selected='selected'";
                                                                    }
                                                                } ?>>Teenpatti Poison 20-20 </option>
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
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-sm"
                                    onclick="casino_result()">Submit</button>
                            </div>
                        </div>
                        <div class="row row5 mt-2">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-bordered" id="casino_result_table">

                                        <thead role="rowgroup" class="">
                                            <tr role="row" class="">
                                                <th role="columnheader" scope="col" aria-colindex="1" class="round-id">Round Id</th>
                                                <th role="columnheader" scope="col" aria-colindex="2" class="winner">Winner</th>
                                            </tr>
                                                            </thead>
                                                 <tbody id="casino_result">

                                </tbody>
                                    </table>
                                    <div class="pagination-container">
                                        <ul class="pagination">
                                            <li><button id="firstPage">First</button></li>
                                            <li><button id="prevPage">Previous</button></li>
                                            <li><button id="nextPage">Next</button></li>
                                            <li><button id="lastPage">Last</button></li>
                                        </ul>
                                        <ul class="pagination">
                                            <li><span class="me-2">Page <b><span id="currentpage">1</span> of <span id="totalPages">1</span></b></span> | Go to Page <input type="text" id="pageNumber" class="page-input form-control" value="1"></li>

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

</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../storage/js/jquery.dataTables.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">


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
            retrieve: true,
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
        if ($.fn.DataTable.isDataTable('#casino_result_table')) {
            $("#casino_result_table").DataTable().destroy();
        }
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

         let clean = event_id.toString().substring(3); // "250612132034"
      if(event_id.toString().length <= 12){
        clean=event_id;
    }
    // 2. Extract parts from the clean string
    let year = "20" + clean.toString().substring(0, 2);
    let month = clean.toString().substring(2, 4);        // "06"
    let day = clean.toString().substring(4, 6);    
    if(event_id.toString().length <= 12){
    day= clean.toString().substring(2, 4);        // "06"
    month  = clean.toString().substring(4, 6);    
    
    } 
          // "12"
    let hour = clean.toString().substring(6, 8);         // "13"
    let minute = clean.toString().substring(8, 10);      // "20"
    let second = clean.toString().substring(10, 12);     // "34"

    // 3. Combine into readable format
      
    let formatted = `${day}/${month}/${year} ${hour}:${minute}:${second}`;

    $("#matchtime").text(formatted);
    if(clean.toString().length != 12){
        $(".matchtime-id").hide();
    }

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
            url: '../ajaxfiles/get_result_cards_mobile.php',
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

<?php
include "footer.php";
?>

</html>
<div id="casino_result_popup" class="modal" role="dialog">
    <div class="modal-dialog" style="    max-width: 100% !important;">
        <div class="modal-dialog modal-md">
            <div role="document" id="__BVID__28___BV_modal_content_" tabindex="-1" class="modal-content">
                <header id="__BVID__28___BV_modal_header_" class="modal-header">
                    <h5 id="__BVID__28___BV_modal_title_"  class="modal-title">Result</h5>
                     <!--  <h5 class="modal-title" id="result_title" style="font-weight: bold;"></h5> -->
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div id="__BVID__28___BV_modal_body_" class="modal-body">
                    <!---->
                    <!---->
                    <div>
                        <div class="d-flex justify-content-between">
                            <h6 class="text-left round-id"><b>Round Id: </b><span id="round_no">0</span></h6>
                            <h6 class="text-right  matchtime-id"><b>Match Time: </b> <span id="matchtime">0</span></h6>
                            
                        </div>
                        <div id="cards_data">

                            </div>
                    </div>
                </div>
                <!---->
            </div>
        </div>
    </div>

</div>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
    <div class="b-toaster-slot vue-portal-target">
        <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class"
            class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
            <div tabindex="0" class="toast">
                <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                    <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
                </header>
                <div class="toast-body"> </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php
    if (isset($_GET['game_type'])) {
    ?>
        casino_result();
    <?php
    }
    ?>
</script>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>