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
    <div class="casino-title"><span class="casino-name">Casino War</span><span class="d-block"><a href="#" onclick="view_rules()" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

                            <?php
                                include("casino_header.php");
                            ?>
    <!---->
    <div class="casino-video">
        <iframe src="<?php echo IFRAME_URL."".CASINOWAR_CODE;?>" width="100%" height="200px" style="border: 0px;"></iframe>
        <div class="clock clock2digit flip-clock-wrapper">
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
        </div>
        <div class="video-overlay">
            <div>
                <div>
                    <h3 class="text-white">Dealer</h3>
                    <div><img id="card_c7" src="../storage/front/img/cards_new/1.png"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="casino-container table-casino war">
        <div class="table-card-container">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th class="box-1 table-card text-center"><img id="card_c1" src="../storage/front/img/cards_new/1.png"></th>
                        <th class="box-1 table-card text-center"><img id="card_c2" src="../storage/front/img/cards_new/1.png"></th>
                        <th class="box-1 table-card text-center"><img id="card_c3" src="../storage/front/img/cards_new/1.png"></th>
                        <th class="box-1 table-card text-center"><img id="card_c4" src="../storage/front/img/cards_new/1.png"></th>
                        <th class="box-1 table-card text-center"><img id="card_c5" src="../storage/front/img/cards_new/1.png"></th>
                        <th class="box-1 table-card text-center"><img id="card_c6" src="../storage/front/img/cards_new/1.png"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <ul class="nav nav-tabs table-tabs">
            <li class="nav-item"><a data-toggle="tab" href="#tab1" class="nav-link active">1</a></li>
            <li class="nav-item"><a data-toggle="tab" href="#tab2" class="nav-link">2</a></li>
            <li class="nav-item"><a data-toggle="tab" href="#tab3" class="nav-link">3</a></li>
            <li class="nav-item"><a data-toggle="tab" href="#tab4" class="nav-link">4</a></li>
            <li class="nav-item"><a data-toggle="tab" href="#tab5" class="nav-link">5</a></li>
            <li class="nav-item"><a data-toggle="tab" href="#tab6" class="nav-link">6</a></li>
        </ul>
        <div class="tab-content mt-1">
            <div id="tab1" class="tab-pane container-fluid container-fluid-5 active">
                <div class="row row5">
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6"><b>Winner 1</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info0" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info0" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_1_b_btn market_1_row back-1"><span class="odds d-block"><b  class="market_1_b_value">0.00</b></span> <span style="color: black;" class="market_1_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Black 1</b> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info1" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info1" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_2_b_btn market_2_row back-1"><span class="odds d-block"><b  class="market_2_b_value">0.00</b></span> <span style="color: black;" class="market_2_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Red 1</b> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info2" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info2" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_3_b_btn market_3_row back-1"><span class="odds d-block"><b  class="market_3_b_value">0.00</b></span> <span style="color: black;" class="market_3_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Odd 1</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info3" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info3" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_4_b_btn market_4_row back-1"><span class="odds d-block"><b  class="market_4_b_value">0.00</b></span> <span style="color: black;" class="market_4_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Even 1</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info4" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info4" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_5_b_btn market_5_row back-1"><span class="odds d-block"><b  class="market_5_b_value">0.00</b></span> <span style="color: black;" class="market_5_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/spade.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info5" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info5" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_6_b_btn market_6_row back-1"><span class="odds d-block"><b  class="market_6_b_value">0.00</b></span> <span style="color: black;" class="market_6_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/club.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info6" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info6" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_7_b_btn market_7_row back-1"><span class="odds d-block"><b  class="market_7_b_value">0.00</b></span> <span style="color: black;" class="market_7_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/heart.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info7" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info7" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_8_b_btn market_8_row back-1"><span class="odds d-block"><b  class="market_8_b_value">0.00</b></span> <span style="color: black;" class="market_8_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/diamond.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info8" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info8" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_9_b_btn market_9_row back-1"><span class="odds d-block"><b  class="market_9_b_value">0.00</b></span> <span style="color: black;" class="market_9_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab2" class="tab-pane container-fluid container-fluid-5">
                <div class="row row5">
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6"><b>Winner 2</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info9" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info9" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_11_b_btn market_11_row back-1"><span class="odds d-block"><b  class="market_11_b_value">0.00</b></span> <span style="color: black;" class="market_11_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Black 2</b> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info10" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info10" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_12_b_btn market_12_row back-1"><span class="odds d-block"><b  class="market_12_b_value">0.00</b></span> <span style="color: black;" class="market_12_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Red 2</b> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info11" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info11" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_13_b_btn market_13_row back-1"><span class="odds d-block"><b  class="market_13_b_value">0.00</b></span> <span style="color: black;" class="market_13_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Odd 2</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info12" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info12" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_14_b_btn market_14_row back-1"><span class="odds d-block"><b  class="market_14_b_value">0.00</b></span> <span style="color: black;" class="market_14_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Even 2</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info13" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info13" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_15_b_btn market_15_row back-1"><span class="odds d-block"><b  class="market_15_b_value">0.00</b></span> <span style="color: black;" class="market_15_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/spade.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info14" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info14" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_16_b_btn market_16_row back-1"><span class="odds d-block"><b  class="market_16_b_value">0.00</b></span> <span style="color: black;" class="market_16_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/club.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info15" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info15" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_17_b_btn market_17_row back-1"><span class="odds d-block"><b  class="market_17_b_value">0.00</b></span> <span style="color: black;" class="market_17_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/heart.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info16" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info16" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_18_b_btn market_18_row back-1"><span class="odds d-block"><b  class="market_18_b_value">0.00</b></span> <span style="color: black;" class="market_18_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/diamond.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info17" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info17" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_19_b_btn market_19_row back-1"><span class="odds d-block"><b class="market_19_b_value">0.00</b></span> <span style="color: black;" class="market_19_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab3" class="tab-pane container-fluid container-fluid-5">
                <div class="row row5">
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6"><b>Winner 3</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info18" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info18" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_21_b_btn market_21_row back-1"><span class="odds d-block"><b class="market_21_b_value">0.00</b></span> <span style="color: black;" class="market_21_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Black 3</b> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info19" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info19" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_22_b_btn market_22_row back-1"><span class="odds d-block"><b class="market_22_b_value">0.00</b></span> <span style="color: black;" class="market_22_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Red 3</b> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info20" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info20" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_23_b_btn market_23_row back-1"><span class="odds d-block"><b class="market_23_b_value">0.00</b></span> <span style="color: black;" class="market_23_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Odd 3</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info21" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info21" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_24_b_btn market_24_row back-1"><span class="odds d-block"><b class="market_24_b_value">0.00</b></span> <span style="color: black;" class="market_24_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Even 3</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info22" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info22" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_25_b_btn market_25_row back-1"><span class="odds d-block"><b class="market_25_b_value">0.00</b></span> <span style="color: black;" class="market_25_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/spade.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info23" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info23" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_26_b_btn market_26_row back-1"><span class="odds d-block"><b class="market_26_b_value">0.00</b></span> <span style="color: black;" class="market_26_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/club.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info24" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info24" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_27_b_btn market_27_row back-1"><span class="odds d-block"><b class="market_27_b_value">0.00</b></span> <span style="color: black;" class="market_27_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/heart.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info25" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info25" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_28_b_btn market_28_row back-1"><span class="odds d-block"><b class="market_28_b_value">0.00</b></span> <span style="color: black;" class="market_28_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/diamond.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info26" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info26" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_29_b_btn market_29_row back-1"><span class="odds d-block"><b  class="market_29_b_value">0.00</b></span> <span style="color: black;" class="market_29_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab4" class="tab-pane container-fluid container-fluid-5">
                <div class="row row5">
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6"><b>Winner 4</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info27" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info27" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_31_b_btn market_31_row back-1"><span class="odds d-block"><b  class="market_31_b_value">0.00</b></span> <span style="color: black;" class="market_31_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Black 4</b> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info28" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info28" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_32_b_btn market_32_row back-1"><span class="odds d-block"><b  class="market_32_b_value">0.00</b></span> <span style="color: black;" class="market_32_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Red 4</b> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info29" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info29" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended  market_33_b_btn market_33_row back-1"><span class="odds d-block"><b  class="market_33_b_value">0.00</b></span> <span style="color: black;" class="market_33_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Odd 4</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info30" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info30" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_34_b_btn market_34_row back-1"><span class="odds d-block"><b  class="market_34_b_value">0.00</b></span> <span style="color: black;" class="market_34_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Even 4</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info31" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info31" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_35_b_btn market_35_row back-1"><span class="odds d-block"><b  class="market_35_b_value">0.00</b></span> <span style="color: black;" class="market_35_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/spade.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info32" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info32" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_36_b_btn market_36_row back-1"><span class="odds d-block"><b  class="market_36_b_value">0.00</b></span> <span style="color: black;" class="market_36_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/club.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info33" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info33" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_37_b_btn market_37_row back-1"><span class="odds d-block"><b  class="market_37_b_value">0.00</b></span> <span style="color: black;" class="market_37_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/heart.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info34" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info34" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_38_b_btn market_38_row back-1"><span class="odds d-block"><b  class="market_38_b_value">0.00</b></span> <span style="color: black;" class="market_38_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/diamond.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info35" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info35" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_39_b_btn market_39_row back-1"><span class="odds d-block"><b  class="market_39_b_value">0.00</b></span> <span style="color: black;" class="market_39_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab5" class="tab-pane container-fluid container-fluid-5">
                <div class="row row5">
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6"><b>Winner 5</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info36" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info36" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_41_b_btn market_41_row back-1"><span class="odds d-block"><b  class="market_41_b_value">0.00</b></span> <span style="color: black;" class="market_41_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Black 5</b> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info37" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info37" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_42_b_btn market_42_row back-1"><span class="odds d-block"><b  class="market_42_b_value">0.00</b></span> <span style="color: black;" class="market_42_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Red 5</b> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info38" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info38" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_43_b_btn market_43_row back-1"><span class="odds d-block"><b  class="market_43_b_value">0.00</b></span> <span style="color: black;" class="market_43_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Odd 5</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info39" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info39" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_44_b_btn market_44_row back-1"><span class="odds d-block"><b  class="market_44_b_value">0.00</b></span> <span style="color: black;" class="market_44_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Even 5</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info40" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info40" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_45_b_btn market_45_row back-1"><span class="odds d-block"><b  class="market_45_b_value">0.00</b></span> <span style="color: black;" class="market_45_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/spade.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info41" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info41" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_46_b_btn market_46_row back-1"><span class="odds d-block"><b  class="market_46_b_value">0.00</b></span> <span style="color: black;" class="market_46_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/club.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info42" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info42" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_47_b_btn market_47_row back-1"><span class="odds d-block"><b  class="market_47_b_value">0.00</b></span> <span style="color: black;" class="market_47_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/heart.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info43" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info43" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_48_b_btn market_48_row back-1"><span class="odds d-block"><b  class="market_48_b_value">0.00</b></span> <span style="color: black;" class="market_48_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/diamond.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info44" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info44" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_49_b_btn market_49_row back-1"><span class="odds d-block"><b class="market_49_b_value">0.00</b></span> <span style="color: black;" class="market_49_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab6" class="tab-pane container-fluid container-fluid-5">
                <div class="row row5">
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6"><b>Winner 6</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info45" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info45" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_51_b_btn market_51_row back-1"><span class="odds d-block"><b class="market_51_b_value">0.00</b></span> <span style="color: black;" class="market_51_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Black 6</b> <span class="card-icon"><span class="card-black">]</span></span> <span class="card-icon"><span class="card-black">}</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info46" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info46" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_52_b_btn market_52_row back-1"><span class="odds d-block"><b class="market_52_b_value">0.00</b></span> <span style="color: black;" class="market_52_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Red 6</b> <span class="card-icon"><span class="card-red">[</span></span> <span class="card-icon"><span class="card-red">{</span></span>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info47" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info47" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_53_b_btn market_53_row back-1"><span class="odds d-block"><b class="market_53_b_value">0.00</b></span> <span style="color: black;" class="market_53_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Odd 6</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info48" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info48" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_54_b_btn market_54_row back-1"><span class="odds d-block"><b class="market_54_b_value">0.00</b></span> <span style="color: black;" class="market_54_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6"><b>Even 6</b>
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info49" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info49" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_55_b_btn market_55_row back-1"><span class="odds d-block"><b class="market_55_b_value">0.00</b></span> <span style="color: black;" class="market_55_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/spade.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info50" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info50" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_56_b_btn market_56_row back-1"><span class="odds d-block"><b class="market_56_b_value">0.00</b></span> <span style="color: black;" class="market_56_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/club.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info51" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info51" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_57_b_btn market_57_row back-1"><span class="odds d-block"><b class="market_57_b_value">0.00</b></span> <span style="color: black;" class="market_57_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/heart.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info52" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info52" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_58_b_btn market_58_row back-1"><span class="odds d-block"><b class="market_58_b_value">0.00</b></span> <span style="color: black;" class="market_58_b_exposure market_exposure">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="box-6 card-type-icon"><img src="../storage/front/img/cards_new/diamond.png">
                                            <div class="info-block float-right"><a href="" data-toggle="collapse" data-target="#min-max-info53" aria-expanded="false" class="info-icon collapsed"><i class="fas fa-info-circle m-l-10"></i></a>
                                                <div id="min-max-info53" class="min-max-info collapse"><span class="m-r-5"><b>Min:</b>100</span> <span class="m-r-5"><b>Max:</b>100000</span></div>
                                            </div>
                                        </td>
                                        <td class="box-4 back text-center suspended market_59_b_btn market_59_row back-1"><span class="odds d-block"><b class="market_59_b_value">0.00</b></span> <span style="color: black;" class="market_59_b_exposure market_exposure">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
	   
	   <div class="remark text-right pr-2">
                                    <!---->
                                </div>
                                <div class="last-result-tiele"><span>Last Result</span> <span class="float-right"><a href="casinoresults?game_type=war" class="">View All</a></span></div>
                                <div class="last-result-container text-right mt-1" id="last-result">
								
								
								
								</div>
	   
    </div>
    <!---->
    <!---->
</div>
                        <?php
							include("open_bet.php");
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js'></script>

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
	var markettype = "CASINO_WAR";
	var markettype_2 = markettype;
	var back_html = "";
	var lay_html = "";
	var gstatus = "";
	var last_result_id = '0';
	function websocket(type) {
    socket = io.connect(websocketurl);
    socket.on('connect', function() {
    	socket.emit('Room', 'War');
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
				
				if (data.t1[0].C1 != 1) {
						$("#card_c1").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
					}
					
				if (data.t1[0].C2 != 1) {
						$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C2 + ".png");
					}
					
				if (data.t1[0].C3 != 1) {
						$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C3 + ".png");
					}
					
				if (data.t1[0].C4 != 1) {
						$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C4 + ".png");
					}
					
				if (data.t1[0].C5 != 1) {
						$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C5 + ".png");
					}
					
				if (data.t1[0].C6 != 1) {
						$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C6 + ".png");
					}
				if (data.t1[0].C7 != 1) {
						$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/" + data.t1[0].C7 + ".png");
					}
					
				
			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : typeof data.t1[0].mid == "string" ? data.t1[0].mid.split(".")[1] : data.t1[0].mid;
			
				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
					runner = data['t2'][j].nat || data['t2'][j].nation;
					b1 = data['t2'][j].b1;
					l1 = data['t2'][j].l1;
				  	
				  	
				  	markettype = "CASINO_WAR";
					
				 	
				  	$(".market_"+selectionid+"_b_value").text(b1);
				  	$(".market_"+selectionid+"_b_btn").attr("side","Back");
				  	$(".market_"+selectionid+"_b_btn").attr("selectionid",selectionid);
				  	$(".market_"+selectionid+"_b_btn").attr("marketid",selectionid);
				  	$(".market_"+selectionid+"_b_btn").attr("runner",runner);
				  	$(".market_"+selectionid+"_b_btn").attr("marketname",runner);
				  	$(".market_"+selectionid+"_b_btn").attr("eventid",eventId);
				  	$(".market_"+selectionid+"_b_btn").attr("markettype",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("event_name",markettype);
				  	$(".market_"+selectionid+"_b_btn").attr("fullmarketodds",b1);
				  	$(".market_"+selectionid+"_b_btn").attr("fullfancymarketrate",b1);
					
				
					
				 	gstatus =  data['t2'][j].gstatus.toString();
					if(gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED"){
						
						$(".market_" + selectionid + "_row").addClass("suspended");
						$(".market_"+selectionid+"_b_btn").removeClass("back-1");
					}
					else {
						$(".market_"+selectionid+"_b_btn").addClass("back-1");
						$(".market_" + selectionid + "_row").removeClass("suspended");
					}
			}
			
		
        }
    });
	
    socket.on('gameResult', function(args){
    	if(args.data){
				updateResult(args.data);
			}else{
				updateResult(args['res']);
			}
    });
    socket.on('error', function(data){
    });
    socket.on('close', function(data){
    });
}

function getType(data){
	var data1 = data;
	if(data){
		data = data.split('DD');
		if(data.length > 1){
			var obj = {
				type	:	'[',
				color	:	'red',
				card	:	data[0]
			}
			return obj;
		}
		else{
			data = data1;
			data = data.split('HH');
			if(data.length > 1){
				var obj = {
					type	:	'{',
					color	:	'red',
					card	:	data[0]
				}
				return obj;
			}
			else{
				data = data1;
				data = data.split('SS');
				if(data.length > 1){
					var obj = {
						type	:	'}',
						color	:	'black',
						card	:	data[0]
					}
					return obj;
				}
				else{
					data = data1;
					data = data.split('CC');
					if(data.length > 1){
						var obj = {
							type	:	']',
							color	:	'black',
							card	:	data[0]
						}
						return obj;
					}
					else{
						return 0;
					}
				}
			}
		}
	}
	return 0;
}



function clearCards(){
		refresh(markettype);
		$("#card_c1").attr("src",site_url + "storage/front/img/cards_new/1.png");
		$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
	}
function updateResult(data) {

	if(data && data[0]){
		resultGameLast = data[0].mid;
		
		if(last_result_id != resultGameLast){
			last_result_id = resultGameLast;
			
		}
		
		html = "";
		var ab = "";
		var ab1 = "";
		casino_type = "'war'";
		data.forEach((runData) => {
			ab = "playerb";
				ab1 = "R";
				
				eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="last-result ml-1  '+ ab +' last-result">'+ ab1 + '</span>';
			
		});
		
		
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){		
			$("#card_c1").attr("src",site_url + "storage/front/img/cards_new/1.png");
			$("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c4").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c5").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c6").attr("src", site_url + "storage/front/img/cards_new/1.png");
			$("#card_c7").attr("src", site_url + "storage/front/img/cards_new/1.png");
		}
    }
}
function teenpatti(type) {
    gameType = type
    websocket();
}

teenpatti("ok");
	jQuery(document).on("click", ".back-1", function () {			$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("back");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';
			
			fullfancymarketrate = fullmarketodds;
			
			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			
			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name);
			$("#bet_stake_side").val("Back");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);			
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);
			
			$('#profitLiability').text('0');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("0");
			
			$('.open_back_place_bet').show();
			$('#open_back_place_bet').modal("show");
		}
	});			jQuery(document).on("click", ".lay-1", function () {		$("#popup_color").removeClass("back");			$("#popup_color").removeClass("lay");			$("#popup_color").addClass("lay");
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
			side = $(this).attr("side");
			selectionid = $(this).attr("selectionid");
			market_odd_name = $(this).attr("markettype");
			runner = $(this).attr("runner");
			market_runner_name = runner;
			marketname = $(this).attr("marketname");
			markettype = $(this).attr("markettype");
			fullfancymarketrate = $(this).attr("fullfancymarketrate");
			odds_change_value = "disabled";
			runs_lable = 'Runs';
			runs_lable = 'Odds';
			fullfancymarketrate = fullmarketodds;	

			eventId = $(this).attr("eventid");
			marketId = $(this).attr("marketid");
			event_name = $(this).attr("event_name");
			$(".select").removeClass("select");
			$(this).addClass("select");
			return_html = "";
			
			$("#inputStake").val();
			$("#market_runner_label").text(market_runner_name);
			$("#bet_stake_side").val("Lay");
			$("#odds_val").val(fullmarketodds);
			$("#bet_event_id").val(eventId);
			$("#bet_marketId").val(marketId);
			$("#bet_event_name").val(event_name);
			$("#bet_market_name").val(marketname);
			$("#bet_markettype").val(markettype);
			$("#fullfancymarketrate").val(fullfancymarketrate);			
			$("#oddsmarketId").val(marketId);
			$("#market_runner_name").val(market_runner_name);
			$("#market_odd_name").val(market_odd_name);
			
			$('#profitLiability').text('0');
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("0");
			
			$('.open_back_place_bet').show();			
			$('#open_back_place_bet').modal("show");
		}
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
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'CASINO_WAR';
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
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		$("#loadingMsg").show();
		$('.header_Back_'+bet_event_id).remove();
		$('.header_Lay_'+bet_event_id).remove();
		$('#betSlipFullBtn').hide();
		$('#backSlipHeader').hide();
		$('#laySlipHeader').hide();
		$(".back-1").removeClass("select");
		$(".lay-1").removeClass("select");
		
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		setTimeout(function(){ 
			$.ajax({
				 type: 'POST',
				 url: '../ajaxfiles/bet_place_casino_war.php',
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
</script>  
<div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog" >
   <div class="modal-dialog">
      <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
         <header id="__BVID__30___BV_modal_header_" class="modal-header">
            <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Placebet</h5>
            <button type="button" data-dismiss="modal" class="close">&times;</button>                
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