<?php
	include("../include/conn.php");
	include('../include/flip_function.php');
	include('../session.php');
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
		
	$get_parent_ids = $conn->query("select parentSuperMDL from user_login_master where UserID=$user_id");
	$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
	$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

	$get_access = $conn->query("select cricket_access,soccer_access,soccer_access,video_access from user_master where Id=$parentSuperMDL");
	$fetch_access = mysqli_fetch_assoc($get_access);
	
	if($fetch_access['video_access'] != 1){
		echo "<script>alert('you are does not access this game');window.location.href='/';</script>";
		exit();
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<?php
	include("head_css.php");
?>

<style>
.selected{
    background: green;
    color: #fff;
}

.casino-title{
    display: flex;
}

.casino-title .d-block{
    margin-top:1px;
}

.casino-title a{
    color: #fff;
    text-decoration: underline;
}
</style>
<body cz-shortcut-listen="true">
    <div id="app">
        <?php
	include ("loader.php");
?>
        <div>
            <?php
				include("header.php");
			?>
            <div class="main-content">
                <!---->
                <!---->
                <div>
                   
                    <div class="tab-content">
                        <div id="bhav" class="tab-pane active">
                            <div class="casino-title"><span class="casino-name">Worli Matka</span><span class="d-block"><a href="#" onclick="view_rules()" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                            <?php
                                include("casino_header.php");
                            ?>
                            <!---->
                            <div class="casino-video">
                                <iframe src="<?php echo IFRAME_URL."".WORLI_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
                                <div class="clock clock3digit flip-clock-wrapper">
                                    <ul class="flip play">
                                        <li class="flip-clock-before">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">9</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">0</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">0</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="flip play">
                                        <li class="flip-clock-before">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">1</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">1</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">0</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">0</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="flip play">
                                        <li class="flip-clock-before">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">1</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">1</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flip-clock-active">
                                            <a href="#">
                                                <div class="up">
                                                    <div class="shadow"></div>
                                                    <div class="inn">0</div>
                                                </div>
                                                <div class="down">
                                                    <div class="shadow"></div>
                                                    <div class="inn">0</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="video-overlay">
                                    <div>
									<img id="card_c1" src="../storage/front/img/cards/1.png">
												<img id="card_c2" src="../storage/front/img/cards/1.png"> 
												<img id="card_c3" src="../storage/front/img/cards/1.png">
									</div>
                                </div>
                            </div>
                            <div class="worli-matka">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase active tab_menu_btn single_tab_btn" onclick="tab_view('single')">Single</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn pana_tab_btn" onclick="tab_view('pana')">Pana</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn sp_tab_btn" onclick="tab_view('sp')">SP</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn dp_tab_btn" onclick="tab_view('dp')">DP</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn trio_tab_btn" onclick="tab_view('trio')">Trio</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn cycle_tab_btn" onclick="tab_view('cycle')">Cycle</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn motorsp_tab_btn" onclick="tab_view('motorsp')">Motor SP</a></li>
                                </ul>
                                <ul class="nav nav-tabs">
                                   
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn fifty-six-charts_tab_btn" onclick="tab_view('fifty-six-charts')">56 Charts</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn sixty-four-charts_tab_btn" onclick="tab_view('sixty-four-charts')">64 Charts</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn abr_tab_btn" onclick="tab_view('abr')">ABR</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn commonsp_tab_btn" onclick="tab_view('commonsp')">Common SP</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn commondp_tab_btn" onclick="tab_view('commondp')">Common DP</a></li>
									<li class="nav-item"><a href="javascript:void(0);" class="nav-link text-uppercase tab_menu_btn colordp_tab_btn" onclick="tab_view('colordp')">Color DP</a></li>
                                </ul>
                                <div class="tab-content">
                                    <!---->
                                    <div id="single" class="tab-pane active">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5" class="box-10 text-center">9.5</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_1_row">
                                                    <tr>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="1 Single"><span class="casino-font">1</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="2 Single"><span class="casino-font">2</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="3 Single"><span class="casino-font">3</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="4 Single"><span class="casino-font">4</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="5 Single"><span class="casino-font">5</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="6 Single"><span class="casino-font">6</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="7 Single"><span class="casino-font">7</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="8 Single"><span class="casino-font">8</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="9 Single"><span class="casino-font">9</span></td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="0 Single"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive mt-2 mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="4" class="box-10 text-center">9.5</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_1_row">
                                                    <tr>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="Line 1 Single"><span class="odds"><b>Line 1</b></span>
                                                            <p class="mb-0">1|2|3|4|5</p>
                                                        </td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="Odd Single"><span class="odds"><b>Odd</b></span>
                                                            <p class="mb-0">1|3|5|7|9</p>
                                                        </td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="Even Single"><span class="odds"><b>Even</b></span>
                                                            <p class="mb-0">2|4|6|8|0</p>
                                                        </td>
                                                        <td class="back text-center  back-1 market_1_b_btn" nat_1="Line 2 Single"><span class="odds"><b>Line 2</b></span>
                                                            <p class="mb-0">6|7|8|9|0</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="pana" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5" class="box-10 text-center">
                                                            SP: 140 
                                                    | DP: 240 
                                                    | TP: 700
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_2_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="5"><span class="casino-font">5</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center back-1 market_2_b_btn" nat_1="0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-2 worli-place close-bet-slip container-fluid container-fluid-5 pt-1 pb-1">
                                            <div class="row row5">
                                                <div class="col-6 text-center pt-2"><span class="worli-place-card"></span></div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-danger btn-sm">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sp" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6" class="text-center">140</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_3_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="1 SP"><span class="casino-font">1</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="2 SP"><span class="casino-font">2</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="3 SP"><span class="casino-font">3</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="4 SP"><span class="casino-font">4</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="5 SP"><span class="casino-font">5</span></td>
                                                        <td rowspan="2" class="back text-center back-1 market_3_b_btn" nat_1="SP-ALL"><span class="odds"><b>SP ALL</b></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="6 SP"><span class="casino-font">6</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="7 SP"><span class="casino-font">7</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="8 SP"><span class="casino-font">8</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="9 SP"><span class="casino-font">9</span></td>
                                                        <td class="back text-center back-1 market_3_b_btn" nat_1="0 SP"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="dp" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6" class="text-center">240</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_4_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="1 DP"><span class="casino-font">1</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="2 DP"><span class="casino-font">2</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="3 DP"><span class="casino-font">3</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="4 DP"><span class="casino-font">4</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="5 DP"><span class="casino-font">5</span></td>
                                                        <td rowspan="2" class="back text-center back-1 market_4_b_btn" nat_1="DP-ALL"><span class="odds"><b>DP ALL</b></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="6 DP"><span class="casino-font">6</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="7 DP"><span class="casino-font">7</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="8 DP"><span class="casino-font">8</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="9 DP"><span class="casino-font">9</span></td>
                                                        <td class="back text-center back-1 market_4_b_btn" nat_1="0 DP"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="trio" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">700</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_5_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_5_b_btn"  nat_1="ALL Trio">
                                                            <button class="btn btn-primary text-uppercase">All Trio</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="cycle" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <tbody class="suspended market_6_row">
                                                    <tr>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="5"><span class="casino-font">5</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center  back-1 market_6_b_btn" nat_1="0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-2 worli-place close-bet-slip container-fluid container-fluid-5 pt-1 pb-1">
                                            <div class="row row5">
                                                <div class="col-6 text-center pt-2"><span class="worli-place-card"></span></div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-danger btn-sm">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="motorsp" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5" class="box-10 text-center">140</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_7_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="5"><span class="casino-font">5</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center back-1 market_7_b_btn" nat_1="0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-2 worli-place close-bet-slip container-fluid container-fluid-5 pt-1 pb-1">
                                            <div class="row row5">
                                                <div class="col-6 text-center pt-2"><span class="worli-place-card"></span></div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-danger btn-sm">Clear</button>
                                                    <button class="btn btn-primary btn-sm disabled back-1 market_7_b_btn place_open_motor" nat_1="place_bet" disabled>Place Bet</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="chart56" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6" class="text-center">140</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_8_row">
                                                    <tr>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-5"><span class="casino-font">5</span></td>
                                                        <td rowspan="2" class="back text-center  back-1 market_8_b_btn" nat_1="56CHART"><span class="odds"><b>56 Chart</b></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center  back-1 market_8_b_btn" nat_1="56-0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="chart64" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6" class="text-center">140</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_9_row">
                                                    <tr>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-5"><span class="casino-font">5</span></td>
                                                        <td rowspan="2" class="back text-center  back-1 market_9_b_btn" nat_1="64CHART"><span class="odds"><b>64 Chart</b></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center  back-1 market_9_b_btn" nat_1="64-0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="abr" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6" class="text-center">140</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_10_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-A" style="width: 25%;"><span class="casino-font">A</span></td>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-B" style="width: 25%;"><span class="casino-font">B</span></td>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-R" style="width: 25%;"><span class="casino-font">R</span></td>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-ABR" style="width: 25%;"><span class="casino-font">ABR</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-AB" style="width: 25%;"><span class="casino-font">AB</span></td>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-AR" style="width: 25%;"><span class="casino-font">AR</span></td>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-BR" style="width: 25%;"><span class="casino-font">BR</span></td>
                                                        <td class="back text-center back-1 market_10_b_btn" nat_1="ABR-ABR Cut" style="width: 25%;"><span class="casino-font abrcut">ABR CUT</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="commonsp" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5" class="box-10 text-center">140</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_11_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-5"><span class="casino-font">5</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center back-1 market_11_b_btn" nat_1="Common SP-0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="commondp" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5" class="box-10 text-center">240</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="suspended market_12_row">
                                                    <tr>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-5"><span class="casino-font">5</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center back-1 market_12_b_btn" nat_1="Common DP-0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="colordp" class="tab-pane">
                                        <div class="table-responsive mb-1">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6" class="text-center">240</th>
                                                    </tr>
                                                </thead>
                                                    <tr>
                                                <tbody class="suspended market_13_row">
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-1"><span class="casino-font">1</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-2"><span class="casino-font">2</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-3"><span class="casino-font">3</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-4"><span class="casino-font">4</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-5"><span class="casino-font">5</span></td>
                                                        <td rowspan="2" class="back text-center back-1 market_13_b_btn" nat_1="Color DP-11"><span class="odds"><b>COLOR DP ALL</b></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-6"><span class="casino-font">6</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-7"><span class="casino-font">7</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-8"><span class="casino-font">8</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-9"><span class="casino-font">9</span></td>
                                                        <td class="back text-center back-1 market_13_b_btn" nat_1="Color DP-0"><span class="casino-font">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="remark text-right pr-2">
                                    <marquee scrollamount="3">
                                        <p class="mb-0">welcome pana</p>
                                    </marquee>
                                </div>
                                 <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=worli" class="">View All</a></span></div>
                                <div class="last-result-container text-right mt-1" id="last-result">
								
								
								
								</div>
                            </div>
                        </div>
                        <?php
							include("open_bet.php");
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js'></script>

     <script>
 
 function tab_view(tab_name){
	 $(".tab_menu_btn").removeClass("active");
	 $("."+tab_name+"_tab_btn").addClass("active");
	 $("#single").hide();
	 $("#pana").hide();
	 $("#sp").hide();
	 $("#dp").hide();
	 $("#trio").hide();
	 $("#cycle").hide();
	 $("#motorsp").hide();
	 $("#fifty-six-charts").hide();
	 $("#sixty-four-charts").hide();
	 $("#abr").hide();
	 $("#commonsp").hide();
	 $("#commondp").hide();
	 $("#colordp").hide();
	 $("#"+tab_name).show();
	 
	 $(".back-1").removeClass("selected");
	$(".lay-1").removeClass("selected");
	nat_1="";
	nat_count = 0;
	back = 0;
	last_word = "";
 }
 </script>



 <script type="text/javascript">
	var site_url = '<?php echo WEB_URL; ?>';
	var websocketurl = '<?php echo GAME_IP; ?>';
	var clock = new FlipClock($(".clock"), {
		clockFace: "Counter"
	});
	var oldGameId = 0;
    var resultGameLast = 0;
    var selectionid = "";
	var runner = "";
	var b1 = "";
	var bs1 = "";
	var l1 = "";
	var ls1 = "";
	var markettype = "INSTANT_WORLI";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	
	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'worli');
    });
    socket.on('game', function(data) {	
    	
		  if (data && data['t1'] && data['t1'][0]) {
		  	if(oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0"){
		  		setTimeout(function(){
						clearCards();
					},<?php echo CASINO_RESULT_TIMEOUT; ?>);
		  	}
		  	oldGameId = data.t1[0].mid;
        		if(data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast){
				$(".casino-remark").text(data.t1[0].remark);
				if (data.t1[0].C1 != 1){ 
					$("#card_c1").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
				}
				if (data.t1[0].C2 != 3){ 
					$("#card_c2").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
				}
				if (data.t1[0].C3 != 1){ 
					$("#card_c3").attr("src",site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
				}
				
			}
			clock.setValue(data.t1[0].autotime);
			
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
			eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
				  	if(selectionid == 1){
						b1 = 9.5;
				  	}else if(selectionid == 2){
						b1 = 0;
				  	}else if(selectionid == 3){
						b1 = 140;
				  	}else if(selectionid == 4){
						b1 = 240;
				  	}else if(selectionid == 5){
						b1 = 700;
				  	}else if(selectionid == 6){
						b1 = 0;
				  	}else if(selectionid == 7){
						b1 = 140;
				  	}else if(selectionid == 8){
						b1 = 140;
				  	}else if(selectionid == 9){
						b1 = 140;
				  	}else if(selectionid == 10){
						b1 = 140;
				  	}else if(selectionid == 11){
						b1 = 140;
				  	}else if(selectionid == 12){
						b1 = 240;
				  	}else if(selectionid == 13){
						b1 = 240;
				  	}
				  	
				  	
				  	markettype = "WORLI_MATKA";
				 	
				  	$(".market_"+selectionid+"_b_btn").attr("side","Back");
				  	$(".market_"+selectionid+"_b_btn").attr("selectionid",selectionid);
				  	$(".market_"+selectionid+"_b_btn").attr("marketid",selectionid);
				  	
				  	$(".market_"+selectionid+"_b_btn").attr("eventid",eventId);
				  	$(".market_"+selectionid+"_b_btn").attr("markettype",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("event_name",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("fullmarketodds",b1);
				  	$(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",b1);
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0"){
						$(".market_"+selectionid+"_row").addClass("suspended");
					}
					else{
				  		$(".market_"+selectionid+"_row").removeClass("suspended");
					}
			}
        }
    });
    socket.on('gameResult', function(args){
    	updateResult(args.data);
    });
    socket.on('error', function(data){
    });
    socket.on('close', function(data){
    });
}
	function clearCards(){
	refresh(markettype);
	$("#card_c1").attr("src",site_url + "storage/front/img/cards/1.png");
			$("#card_c2").attr("src",site_url + "storage/front/img/cards/1.png");
			$("#card_c3").attr("src",site_url + "storage/front/img/cards/1.png");
}

	function updateResult(data) {
	
		data = JSON.parse(JSON.stringify(data));
		resultGameLast = data[0].mid;
		
		if(last_result_id != resultGameLast){
			last_result_id = resultGameLast;
			refresh(markettype);
		}
		
		var html = "";
		casino_type = "'worli'";
		data.forEach((runData) => {
			
				ab = "playera";
				ab1 = "R";
				
				eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
				html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs  '+ ab +' last-result">'+ ab1 + '</span>';
		});
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){	
			$("#card_c1").attr("src","../storage/front/img/cards/1.png");
			$("#card_c2").attr("src","../storage/front/img/cards/1.png");
			$("#card_c3").attr("src","../storage/front/img/cards/1.png");
			
			
		}
	}

	function teenpatti(type) {
		gameType = type
		websocket();
	}
	teenpatti("ok");
	
	var nat_1="";
	var nat_count = 0;
	var back = 0;
	var last_word = "";
	var motor_all_selection = "";
	jQuery(document).on("click", ".back-1", function () {		
	
	
	
	
	$(this).addClass("selected");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			
			nat_1_temp = $(this).attr("nat_1");
			runner = $(this).attr("nat_1");
			market_runner_name  = runner;
			
			if(selectionid == 2){
				//3 click
				
				
				
				nat_1 += nat_1_temp;
				nat_count++;
				back++;
				last_word = "Pana";
				motor_all_selection = "";
				full_market_name = nat_1+" "+last_word;
				
				if(nat_count != 3){
						return false;
				}
			}else if(selectionid == 6){
				// 2click
				
				
				nat_1 += nat_1_temp;
				nat_count++;
				back++;
				motor_all_selection = "";
				last_word = "Cycle";
				full_market_name = nat_1+" "+last_word;
				
				if(nat_count != 2){
						return false;
				}
			}else if(selectionid == 7){
				//4 click open max 9
				$(".place_open_motor").addClass("disabled");
				$(".place_open_motor").attr('disabled', true);
				
				
				
				check_already = nat_1.includes(nat_1_temp);
				if(check_already){
					return false;
				}
				if(nat_1_temp != "place_bet"){
					nat_1 += nat_1_temp;
				}
				
				
				
				nat_count++;
				back++;
				last_word = "Motor SP";
				full_market_name = nat_1+" "+last_word;
				
				if(nat_count >= 4){
					$(".place_open_motor").removeClass("disabled");
					$(".place_open_motor").attr('disabled', false);
					
					if(nat_1_temp != "place_bet"){	
						return false;
					}
					
				}
				
				if(nat_count <= 3){
					$(this).addClass("selected");
					return false;
				}
				if(nat_count >= 9){
						return false;
				}
			}else{
				nat_1 = "";
				$(".selected").removeClass("selected");
				nat_count = 0;
				last_word = "";
				full_market_name = market_runner_name;
				motor_all_selection = "";
			}
			
			
			$("#popup_color").removeClass("back");		
	$("#popup_color").removeClass("lay");			
	$("#popup_color").addClass("back");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("nat_1");
			market_runner_name = runner;
			marketname = $(this).attr("nat_1");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';
			
		
			
			fullfancymarketrate = fullmarketodds;
			
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			
			
			return_html = "";
			
				$(this).addClass("selected");
			$("#inputStake").val();
			$("#market_runner_label").text(full_market_name);
			$("#bet_stake_side").val("Back");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);			
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(full_market_name);
			$("#market_odd_name").val(market_odd_name);
			
			$('#profitLiability').text('0');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("0");
			
			$('.open_back_place_bet').show();
			$('#open_back_place_bet').modal("show");
		}
	});			
	
	jQuery(document).on("click", ".close-bet-slip", function () {
	 
	 $(".back-1").removeClass("selected");
	$(".lay-1").removeClass("selected");
	nat_1="";
	nat_count = 0;
	back = 0;
	last_word = "";
 });
	
	jQuery(document).on("input", "#inputStake", function () {
	var stake = $("#inputStake").val();
	eventId = $("#fullMarketBetsWrap").attr("eventid");
	$("#inputStake").val(stake);
	odds = parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = parseInt(inputStake);
		}else{
			profit = (odds - 1 ) * inputStake;
		}
	}
	$("#profitLiability").text(profit.toFixed(2));
});
jQuery(document).on("click", ".label_stake", function () {
   stake = $(this).attr("stake");
   eventId = $("#fullMarketBetsWrap").attr("eventid");
	$("#inputStake").val(stake);
	odds =  parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = (odds - 1 ) * inputStake;
		}else{
			profit = (odds - 1 ) * inputStake;
		}
	}
	$("#profitLiability").text(profit.toFixed(2));
});

jQuery(document).on("click", "#placeBet", function () {
	
	 $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
	 $(".placeBet").attr('disabled',true);
	$(".placeBet").removeAttr("id","placeBet");		
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		 
		var last_place_bet= "";
		
		bet_stake_side = $("#bet_stake_side").val();		
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'INSTANT_WORLI';
		bet_event_name = $("#bet_event_name").val();
		inputStake = $("#inputStake").val();
		market_runner_name = $("#market_runner_name").val();
		market_odd_name = $("#market_odd_name").val();
		var runsNo; 
		var oddsNo; 
		bet_market_name = $("#bet_market_name").val();
		eventManualType = 'Auto';
		if(bet_stake_side == "Lay"){
			type = "No";
			class_type = "no";
			unmatched_side_type = false;
		}else{
			type = "Yes";
			class_type = "yes";
			unmatched_side_type = true;
		}
		bet_markettype = $("#bet_markettype").val();
		if(bet_markettype != "FANCY_ODDS"){
			bet_market_type = bet_markettype;
			runsNo = parseFloat($("#odds_val").val());
			oddsNo = parseFloat($("#odds_val").val());
			if(bet_stake_side == "Lay"){
				return_stake = (oddsNo - 1 ) * inputStake;
				return_stake = parseInt(return_stake);
			}else{
				return_stake = (oddsNo - 1 ) * inputStake;
				return_stake = parseInt(return_stake);
			}
		bet_seconds = 1;
		bet_sec = 1000;
		}
		
		/* $("#inputStake").val(""); */
		$(".back-1").removeClass("selected");
		$(".lay-1").removeClass("selected");
		$("#loadingMsg").show();
		$('.header_Back_'+bet_event_id).remove();
		$('.header_Lay_'+bet_event_id).remove();
		$('#betSlipFullBtn').hide();
		$('#backSlipHeader').hide();
		$('#laySlipHeader').hide();
		$(".back-1").removeClass("selected");
		$(".lay-1").removeClass("selected");
		
		setTimeout(function(){ 
			$.ajax({
				 type: 'POST',
				 url: '../ajaxfiles/bet_place_worli_matka.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name,bet_type:bet_type},
				 success: function(response) {
					var check_status = response['status'];
					var message = response['message'];
					if(check_status == 'ok'){
							if(bet_markettype != "FANCY_ODDS"){
								oddsNo = runsNo;
							}else{
								oddsNo = oddsNo;
							}
							auth_key = 1;
							$("#bet-error-class").addClass("b-toast-success");
						}else{
							$("#bet-error-class").addClass("b-toast-danger");
						}
						error_message_text = message;
						$("#errorMsgText").text(error_message_text);
						$("#errorMsg").fadeIn('fast').delay(3000).hide(0);
						$(".close-bet-slip").click();
						refresh(markettype);
						$(".placeBet").attr("id","placeBet");
						$("#placeBet").html('Submit');
						$(".placeBet").attr('disabled',false);
						$('.open_back_place_bet').hide();
						$('#open_back_place_bet').modal("hide");
				 }
			 });
		 }, bet_sec - 2000);
	});

	$(document).ready(function(){
$('#open_back_place_bet').on('hide.bs.modal', function () {
  $(".back-1").removeClass("selected");
	$(".lay-1").removeClass("selected");
	back = 0;
	lay = 0;
	nat_count = 0;
	nat_1="";
	$(".selected").removeClass("selected");
	last_word = "";
});
});

	
</script>  
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog" >
   <div class="modal-dialog">
      <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
         <header id="__BVID__30___BV_modal_header_" class="modal-header">
            <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Placebet</h5>
            <button type="button" data-dismiss="modal" class="close close-bet-slip">&times;</button>                
         </header>
         <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
            <div class="place-bet pt-2 pb-2 back" id="popup_color">
               <div class="container-fluid container-fluid-5">
                  <div class="row row5">
                     <div class="col-5"><b id="market_runner_label">Player A</b></div>
                     <div class="col-7 text-right">
                        <div class="float-right">                                        
                        <button class="stakeactionminus btn disabled">
                        	<span class="fa fa-minus"></span>
                        </button>                                        
                        <input type="text" placeholder="0" class="stakeinput" id="odds_val">                                        
                        	<button class="stakeactionminus btn disabled">
                        		<span class="fa fa-plus"></span>
                        	</button>                    
<input type='hidden' id='bet_stake_side' value=''/><input type='hidden' id='bet_event_id' value=''/><input type='hidden' id='bet_marketId' value=''/><input type='hidden' id='bet_event_name' value=''/><input type='hidden' id='bet_market_name' value=''/><input type='hidden' id='bet_markettype' value=''/><input type='hidden' id='fullfancymarketrate' value=''/> <input type='hidden' id='oddsmarketId' value=''/><input type='hidden' id='market_runner_name' value=''/><input type='hidden' id='market_odd_name' value=''/> 
							</div>
                     </div>
                  </div>
                  <div class="row row5 mt-2">
                     <div class="col-4">                                    
                     	<input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">                                
                     </div>
                     <div class="col-4">
                        <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                           <!---->Submit                                    
                        </button>
                     </div>
                     <div class="col-4 text-center pt-1"><span id="profitLiability">0</span></div>
                  </div>
                  <div class="row row5 mt-2">
                     <?php										
                     	$get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");					
                     	$num_rows = $get_button_value->num_rows;					
                     	$button_array = array();					
                     	if($num_rows <= 0){						
                     		$button_array[] = 500;						
                     		$button_array[] = 1000;						
                     		$button_array[] = 2000;						
                     		$button_array[] = 3000;						
                     		$button_array[] = 4000;						
                     		$button_array[] = 5000;						
                     		$button_array[] = 10000;						
                     		$button_array[] = 20000;					
                     	}else{						
                     		$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);						
                     		$fetch_button_value = $fetch_button_value_data['button_value'];						
                     		$default_stake = $fetch_button_value_data['default_stake'];						
                     		$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];						
                     		$button_array = explode(",",$fetch_button_value);					}										
                     		foreach($button_array as $button_value){				
                     ?>														
                    	 		<div class="col-4">                                   
                    	 			<button type="button" class="btn btn-secondary btn-block mb-2 label_stake" stake='<?php echo $button_value; ?>'>                                       
                    	 				<?php echo $button_value; ?>                                    
                    	 			</button>                                
                    	 		</div>
                     <?php					
                     		}				
                     ?>								                                                            
                  </div>
               </div>
            </div>
         </div>
         <!---->            
      </div>
   </div>
</div>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
<div class="b-toaster-slot vue-portal-target">
    <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
        <div tabindex="0"  class="toast">
            <header class="toast-header"><strong class="mr-2" id="errorMsgText"></strong>
                <button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>
            </header>
            <div class="toast-body"> </div>
        </div>
    </div>
</div>
</div>
<?php
	include "footer.php";
	include "footer-result-popup.php";
?>
</html>