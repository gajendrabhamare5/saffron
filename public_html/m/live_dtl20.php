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

if ($fetch_access['video_access'] != 1) {
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
   .casino-title {
      display: flex;
   }

   .casino-title .d-block {
      margin-top: 1px;
   }

   .casino-title a {
      color: #fff;
      text-decoration: underline;
   }

   .casino-table {
      background-color: #f7f7f7;
      color: #333;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-top: 5px;
   }

   .casino-table-box {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: flex-start;
      padding: 5px;
   }

   .casino-table-left-box,
   .casino-table-center-box,
   .casino-table-right-box {
      width: 49%;
      border-left: 1px solid #c7c8ca;
      border-right: 1px solid #c7c8ca;
      border-top: 1px solid #c7c8ca;
      background-color: #f2f2f2;
   }

   .casino-table-left-box,
   .casino-table-right-box {
      width: 100%;
      padding: 0 5px;
   }

   .casino-table-header,
   .casino-table-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      border-bottom: 1px solid #c7c8ca;
   }

   .casino-nation-detail {
      display: flex;
      align-items: flex-start;
      flex-direction: column;
      flex-wrap: wrap;
      justify-content: center;
      padding-left: 5px;
      min-height: 46px;
   }

   .casino-table-header .casino-nation-detail {
      font-weight: bold;
      min-height: unset;
   }

   .casino-nation-detail {
      width: 60%;
   }

   .casino-odds-box {
      display: flex;
      flex-wrap: wrap;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 5px 0;
      font-weight: bold;
      border-left: 1px solid #c7c8ca;
      cursor: pointer;
      min-height: 46px;
   }

   .casino-table-header .casino-odds-box {
      cursor: unset;
      padding: 2px;
      min-height: unset;
      height: auto !important;
   }

   .casino-odds-box {
      width: 40%;
   }

   .back {
      background-color: #72bbef !important;
   }

   .casino-table-header,
   .casino-table-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      border-bottom: 1px solid #c7c8ca;
   }

   .casino-nation-name {
      font-size: 12px;
      font-weight: bold;
   }

   .card-icon {
      font-family: Card Characters !important;
      display: inline-block;
      width: unset;
   }

   .ms-1 {
      margin-left: .25rem !important;
   }

   .card-black {
      color: #000000 !important;
   }

   .card-red {
      color: #ff0000 !important;
   }

   .casino-table-left-box,
   .casino-table-right-box {
      width: 49%;
   }

   .casino-nation-name img {
      height: 35px;
      vertical-align: middle;
   }

   .navtab {
      display: flex;
      flex-wrap: wrap;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none;
   }

   .navtab,
   .tab-content {
      width: 100%;
   }

   button,
   input,
   optgroup,
   select,
   textarea {
      margin: 0;
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
   }

   .nav-link {
      display: block;
      padding: .5rem 1rem;
      color: #0d6efd;
      text-decoration: none;
      transition: color .15sease-in-out, background-color .15sease-in-out, border-color .15sease-in-out;
   }

   .nav-pills .nav-link {
      background: 0 0;
      border: 0;
      border-radius: .25rem;
   }

   .nav-pills .nav-link {
      background-color: #cccccc;
      color: #000000;
      border-radius: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      -ms-border-radius: 0;
      -o-border-radius: 0;
      border-right: 1px solid #2c3e50;
      font-weight: bold;
      font-size: 16px;
      text-align: center;
      line-height: 1;
      cursor: pointer;
      white-space: nowrap;
   }

   .nav-pills .nav-link.active,
   .nav-pills .show>.nav-link {
      background-color: var(--theme2-bg);
      color: #ffffff;
   }

   .nav-pills .nav-item:last-child .nav-link {
      border-right: 0;
   }

   .casino-table .tab-content {
      width: 100%;
   }

   .fade {
      transition: opacity .15slinear;
   }

   .fade:not(.show) {
      opacity: 0;
   }

   .tab-content>.active {
      /*display: none;*/
   }
 
   b {
      font-weight: bold;
   }

   .casino-last-result-title {
      padding: 10px;
      background-color: #2c3e50d9;
      color: #ffffff;
      font-size: 14px;
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      width: 100%;
   }

   .casino-last-results {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-end;
      margin-top: 10px;
      width: 100%;
   }

   .casino-last-results .result {
      background: #355e3b;
      color: #fff;
      height: 25px;
      width: 25px;
      border-radius: 50%;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      font-weight: bold;
      margin-left: 5px;
      cursor: pointer;
   }

   .casino-last-results .result.result-b {
      color: #ffff33;
   }

   .casino-last-results .result.result-c {
      color: #33c6ff;
   }

   .casino-last-results .result.result-a {
      color: #ff4500;
   }

   .suspended:after {
      width: 100% !important;
   }
</style>

<body cz-shortcut-listen="true">
   <div id="app">
      <?php
      include("loader.php");
      ?>
      <div>
         <?php
         include("header.php");
         ?>
         <div class="main-content">
            <!---->
            <!---->
            <div>
               <div class="casino-title">
                  <span class="casino-name">20-20 D T L</span>
                  <span class="d-block"><a href="#" onclick="view_rules('dtl20')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span>
               </div>

               <?php
               include("casino_header.php");
               ?>
               <div class="tab-content">
                  <div id="bhav" class="tab-pane active">

                     <!---->
                     <div class="casino-video">


                     <?php 
                            if(!empty(IFRAME_URL_SET)){
                               ?>
                               <iframe src="<?php echo IFRAME_URL."".DTL_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

                      <!--  <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                         <iframe src="../tv/dragon-tiger-lion-2020.html" width="100%" height="200px" style="border: 0px;"></iframe> -->
                        <!-- <iframe src="<?php echo IFRAME_URL;
                                          echo DTL_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe> -->
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
                        </div>
                     </div>


                     <div class="casino-detail">
                        <div class="casino-table">
                           <!-- <div class="casino-table-box d-none d-md-flex">
                                         <div class="casino-table-left-box">
                                            <div class="casino-table-header">
                                               <div class="casino-nation-detail"></div>
                                               <div class="casino-odds-box back">Dragon</div>
                                               <div class="casino-odds-box back">Tiger</div>
                                               <div class="casino-odds-box back">Lion</div>
                                            </div>
                                            <div class="casino-table-body">
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name">Winner</div>
                                                  </div>
                                                  <div class="casino-odds-box back suspended back-1 market_1_row market_1_b_btn"><span class="casino-odds market_1_b_value">2.94</span></div>
                                                  <div class="casino-odds-box back suspended back-1 market_2_row market_2_b_btn"><span class="casino-odds market_2_b_value">2.94</span></div>
                                                  <div class="casino-odds-box back suspended back-1 market_3_row market_3_b_btn"><span class="casino-odds market_3_b_value">2.94</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.97</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name">Odd</div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">1.83</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name">Even</div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">2.12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/1.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/2.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/3.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/4.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="casino-table-right-box">
                                            <div class="casino-table-header">
                                               <div class="casino-nation-detail"></div>
                                               <div class="casino-odds-box back">Dragon</div>
                                               <div class="casino-odds-box back">Tiger</div>
                                               <div class="casino-odds-box back">Lion</div>
                                            </div>
                                            <div class="casino-table-body">
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/5.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/6.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/7.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/8.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/9.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/10.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/11.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/12.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                               <div class="casino-table-row">
                                                  <div class="casino-nation-detail">
                                                     <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/13.jpg"></div>
                                                  </div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                                  <div class="casino-odds-box back"><span class="casino-odds">12</span></div>
                                               </div>
                                            </div>
                                         </div>
                                      </div> -->
                           <ul class="d-xl-none navtab nav-pills" role="tablist">
                              <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-0" role="tab" data-rr-ui-event-key="0" aria-controls="uncontrolled-tab-example-tabpane-0" aria-selected="true" class="nav-link commontabsdtl active">Dragon</button></li>
                              <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-1" role="tab" data-rr-ui-event-key="1" aria-controls="uncontrolled-tab-example-tabpane-1" aria-selected="false" class="nav-link commontabsdtl" tabindex="-1">Tiger</button></li>
                              <li class="nav-item" role="presentation"><button type="button" id="uncontrolled-tab-example-tab-2" role="tab" data-rr-ui-event-key="2" aria-controls="uncontrolled-tab-example-tabpane-2" aria-selected="false" class="nav-link commontabsdtl" tabindex="-1">Lion</button></li>
                           </ul>
                           <div class="tab-content">
                              <div role="tabpanel" id="uncontrolled-tab-example-tabpane-0" aria-labelledby="uncontrolled-tab-example-tab-0" class="fade d-xl-none tab-pane tab-pane-common active show">
                                 <div class="casino-table-box">
                                    <div class="casino-table-left-box">
                                       <div class="casino-table-body">
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Winner</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_1_row market_1_b_btn"><span class="casino-odds market_1_b_value">2.94</span>
                                                <span class="d-block market_1_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-2 market_2_row market_2_b_btn"><span class="casino-odds market_2_b_value">1.97</span><span class="d-block market_2_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_3_row market_3_b_btn"><span class="casino-odds market_3_b_value">1.97</span><span class="d-block market_3_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Odd</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_4_row market_4_b_btn"><span class="casino-odds market_4_b_value">1.83</span> <span class="d-block market_4_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Even</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_5_row market_5_b_btn"><span class="casino-odds market_5_b_value">2.12</span><span class="d-block market_5_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/1.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_6_row market_6_b_btn"><span class="casino-odds market_6_b_value">12</span><span class="d-block market_6_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/2.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_7_row market_7_b_btn"><span class="casino-odds market_7_b_value">12</span><span class="d-block market_7_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/3.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_8_row market_8_b_btn"><span class="casino-odds market_8_b_value">12</span><span class="d-block market_8_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/4.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_9_row market_9_b_btn"><span class="casino-odds market_9_b_value">12</span><span class="d-block market_9_b_exposure market_exposure" style="color: black;"></span></div>

                                          </div>
                                       </div>
                                    </div>
                                    <div class="casino-table-right-box">
                                       <div class="casino-table-body">
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/5.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_10_row market_10_b_btn"><span class="casino-odds market_10_b_value">12</span>
                                                <span class="d-block market_10_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/6.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_11_row market_11_b_btn"><span class="casino-odds market_11_b_value">12</span>
                                                <span class="d-block market_11_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/7.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_12_row market_12_b_btn"><span class="casino-odds market_12_b_value">12</span>
                                                <span class="d-block market_12_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/8.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_13_row market_13_b_btn"><span class="casino-odds market_13_b_value">12</span>
                                                <span class="d-block market_13_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/9.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_14_row market_14_b_btn"><span class="casino-odds market_14_b_value">12</span>
                                                <span class="d-block market_14_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/10.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_15_row market_15_b_btn"><span class="casino-odds market_15_b_value">12</span>
                                                <span class="d-block market_15_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/11.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_16_row market_16_b_btn"><span class="casino-odds market_16_b_value">12</span>
                                                <span class="d-block market_16_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/12.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_17_row market_17_b_btn"><span class="casino-odds market_17_b_value">12</span>
                                                <span class="d-block market_17_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/13.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_18_row market_18_b_btn"><span class="casino-odds market_18_b_value">12</span>
                                                <span class="d-block market_18_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div role="tabpanel" id="uncontrolled-tab-example-tabpane-1" aria-labelledby="uncontrolled-tab-example-tab-1" class="fade d-xl-none tab-pane tab-pane-common">
                                 <div class="casino-table-box">
                                    <div class="casino-table-left-box">
                                       <div class="casino-table-body">
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Winner</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_21_row market_21_b_btn"><span class="casino-odds market_21_b_value">2.94</span>
                                                <span class="d-block market_21_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_22_row market_22_b_btn"><span class="casino-odds market_22_b_value">1.97</span>
                                                <span class="d-block market_22_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_23_row market_23_b_btn"><span class="casino-odds market_23_b_value">1.97</span>
                                                <span class="d-block market_23_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Odd</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_24_row market_24_b_btn"><span class="casino-odds market_24_b_value">1.83</span>
                                                <span class="d-block market_24_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Even</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_25_row market_25_b_btn"><span class="casino-odds market_25_b_value">2.12</span>
                                                <span class="d-block market_25_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/1.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_26_row market_26_b_btn"><span class="casino-odds market_26_b_value">12</span>
                                                <span class="d-block market_26_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/2.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_27_row market_27_b_btn"><span class="casino-odds market_27_b_value">12</span>
                                                <span class="d-block market_27_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/3.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_28_row market_28_b_btn"><span class="casino-odds market_28_b_value">12</span>
                                                <span class="d-block market_28_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/4.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_29_row market_29_b_btn"><span class="casino-odds market_29_b_value">12</span>
                                                <span class="d-block market_29_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="casino-table-right-box">
                                       <div class="casino-table-body">
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/5.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_30_row market_30_b_btn"><span class="casino-odds market_30_b_value">12</span>
                                                <span class="d-block market_30_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/6.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_31_row market_31_b_btn"><span class="casino-odds market_31_b_value">12</span>
                                                <span class="d-block market_31_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/7.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_32_row market_32_b_btn"><span class="casino-odds market_32_b_value">12</span>
                                                <span class="d-block market_32_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/8.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_33_row market_33_b_btn"><span class="casino-odds market_33_b_value">12</span>
                                                <span class="d-block market_33_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/9.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_34_row market_34_b_btn"><span class="casino-odds market_34_b_value">12</span>
                                                <span class="d-block market_34_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/10.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_35_row market_35_b_btn"><span class="casino-odds market_35_b_value">12</span>
                                                <span class="d-block market_35_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/11.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_36_row market_36_b_btn"><span class="casino-odds market_36_b_value">12</span>
                                                <span class="d-block market_36_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/12.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_37_row market_37_b_btn"><span class="casino-odds market_37_b_value">12</span>
                                                <span class="d-block market_37_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/13.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_38_row market_38_b_btn"><span class="casino-odds market_38_b_value">12</span>
                                                <span class="d-block market_38_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div role="tabpanel" id="uncontrolled-tab-example-tabpane-2" aria-labelledby="uncontrolled-tab-example-tab-2" class="fade d-xl-none tab-pane tab-pane-common">
                                 <div class="casino-table-box">
                                    <div class="casino-table-left-box">
                                       <div class="casino-table-body">
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Winner</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_41_row market_41_b_btn"><span class="casino-odds market_41_b_btn">2.94</span>
                                                <span class="d-block market_41_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Black<span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_42_row market_42_b_btn"><span class="casino-odds market_42_b_btn">1.97</span>
                                                <span class="d-block market_42_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Red<span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_43_row market_43_b_btn"><span class="casino-odds market_43_b_btn">1.97</span>
                                                <span class="d-block market_43_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Odd</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_44_row market_44_b_btn"><span class="casino-odds market_44_b_btn">1.83</span>
                                                <span class="d-block market_44_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name">Even</div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_45_row market_45_b_btn"><span class="casino-odds market_45_b_btn">2.12</span>
                                                <span class="d-block market_45_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/1.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_46_row market_46_b_btn"><span class="casino-odds market_46_b_btn">12</span>
                                                <span class="d-block market_46_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/2.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_47_row market_47_b_btn"><span class="casino-odds market_47_b_btn">12</span>
                                                <span class="d-block market_47_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/3.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_48_row market_48_b_btn"><span class="casino-odds market_48_b_btn">12</span>
                                                <span class="d-block market_48_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/4.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_49_row market_49_b_btn"><span class="casino-odds market_49_b_btn">12</span>
                                                <span class="d-block market_49_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="casino-table-right-box">
                                       <div class="casino-table-body">
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/5.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_50_row market_50_b_btn"><span class="casino-odds market_50_b_btn">12</span>
                                                <span class="d-block market_50_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/6.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_51_row market_51_b_btn"><span class="casino-odds market_51_b_btn">12</span>
                                                <span class="d-block market_51_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/7.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_52_row market_52_b_btn"><span class="casino-odds market_52_b_btn">12</span>
                                                <span class="d-block market_52_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/8.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_53_row market_53_b_btn"><span class="casino-odds market_53_b_btn">12</span>
                                                <span class="d-block market_53_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/9.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_54_row market_54_b_btn"><span class="casino-odds market_54_b_btn">12</span>
                                                <span class="d-block market_54_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/10.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_55_row market_55_b_btn"><span class="casino-odds market_55_b_btn">12</span>
                                                <span class="d-block market_55_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/11.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_56_row market_56_b_btn"><span class="casino-odds market_56_b_btn">12</span>
                                                <span class="d-block market_56_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/12.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_57_row market_57_b_btn"><span class="casino-odds market_57_b_btn">12</span>
                                                <span class="d-block market_57_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                          <div class="casino-table-row">
                                             <div class="casino-nation-detail">
                                                <div class="casino-nation-name"><img src="../storage/front/img/andar_bahar/13.jpg"></div>
                                             </div>
                                             <div class="casino-odds-box back suspended back-1 market_58_row market_58_b_btn"><span class="casino-odds market_58_b_btn">12</span>
                                                <span class="d-block market_58_b_exposure market_exposure" style="color: black;"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=dtl20">View All</a></span></div>
                        <div class="last-result-container text-right mt-1" id="last-result">
                        </div>
                        <!---->
                        <!---->
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
      <script src="../js/bootstrap.min.js" type="text/javascript"></script>
      <script type="text/javascript" src='footer-js.js?46'></script>

      <?

      include("betpopcss.php");
      ?>

      <script type="text/javascript">
         jQuery(document).on("click", ".commontabsdtl", function() {

            $(".commontabsdtl").removeClass("active");
            $(".tab-pane-common").removeClass("active");
            $(".tab-pane-common").removeClass("show");

            var tab_name = $(this).attr("aria-controls");
            $(this).addClass("active");
            $("#" + tab_name).addClass("active");
            $("#" + tab_name).addClass("show");
         });

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
         var markettype = "DTL20";
         var markettype_2 = markettype;
         var back_html = "";
         var lay_html = "";
         var gstatus = "";
         var last_result_id = '0';

         function websocket(type) {
            socket = io.connect(websocketurl);
            socket.on('connect', function() {
               socket.emit('Room', 'dtl20');
            });
            socket.on('gameIframe', function(data) {
               $("#casinoIframe").attr('src', data);
            });

            socket.on('game', function(data) {
              
               if (data && data['t1'] && data['t1'][0]) {
                  if (oldGameId != data.t1[0].mid && data.t1[0].mid != 0 && data.t1[0].mid != "0") {
                     setTimeout(function() {
                        clearCards();
                     }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                  }
                  oldGameId = data.t1[0].mid;
                  if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
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



                  }
                  clock.setValue(data.t1[0].autotime);
                  $(".round_no").text(data.t1[0].mid);
                  $("#casino_event_id").val(data.t1[0]);
                  eventId = data.t1[0].mid;

                  for (var j in data['t2']) {
                     selectionid = parseInt(data['t2'][j].sid);
                     runner = data['t2'][j].nat || data['t2'][j].nation;
                     b1 = data['t2'][j].b1;


                     markettype = "DTL20";


                     $(".market_" + selectionid + "_b_value").text(b1);
                     $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                     $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                     $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                     $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                     $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                     $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                     $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                     $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                     $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                     $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);






                     gstatus = data['t2'][j].gstatus.toString();
                     if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {

                        $(".market_" + selectionid + "_row").addClass("suspended");
                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                     } else {
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                     }
                  }


               }
            });

            socket.on('gameResult', function(args) {
               if (args.data) {
                  updateResult(args.data);
               } else {
                  updateResult(args['res']);
               }
            });
            socket.on('error', function(data) {});
            socket.on('close', function(data) {});
         }

         function getType(data) {
            var data1 = data;
            if (data) {
               data = data.split('DD');
               if (data.length > 1) {
                  var obj = {
                     type: '[',
                     color: 'red',
                     card: data[0]
                  }
                  return obj;
               } else {
                  data = data1;
                  data = data.split('HH');
                  if (data.length > 1) {
                     var obj = {
                        type: '{',
                        color: 'red',
                        card: data[0]
                     }
                     return obj;
                  } else {
                     data = data1;
                     data = data.split('SS');
                     if (data.length > 1) {
                        var obj = {
                           type: ']',
                           color: 'black',
                           card: data[0]
                        }
                        return obj;
                     } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                           var obj = {
                              type: '}',
                              color: 'black',
                              card: data[0]
                           }
                           return obj;
                        } else {
                           return 0;
                        }
                     }
                  }
               }
            }
            return 0;
         }


         function clearCards() {
            refresh(markettype);
            $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
            $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
         }

         function updateResult(data) {

            if (data && data[0]) {
               resultGameLast = data[0].mid;

               if (last_result_id != resultGameLast) {
                  last_result_id = resultGameLast;

               }

               html = "";
               var ab = "";
               var ab1 = "";
               casino_type = "'dtl20'";
               data.forEach((runData) => {
                  if (parseInt(runData.win) == 1) {
                     ab = "playera";
                     ab1 = "D";

                  } else if (parseInt(runData.win) == 21) {
                     ab = "playerb";
                     ab1 = "T";

                  } else if (parseInt(runData.win) == 41) {
                     ab = "playerc";
                     ab1 = "L";

                  } else {
                     ab = "playertie";
                     ab1 = "T";

                  }

                  eventId = runData.mid;
                  html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="result ml-1  ' + ab + ' last-result"><b>' + ab1 + '</b></span>';

               });


               $("#last-result").html(html);
               if (oldGameId == 0 || oldGameId == resultGameLast) {
                  $("#card_c1").attr("src", site_url + "storage/front/img/cards_new/1.png");
                  $("#card_c2").attr("src", site_url + "storage/front/img/cards_new/1.png");
                  $("#card_c3").attr("src", site_url + "storage/front/img/cards_new/1.png");
               }
            }
         }

         function teenpatti(type) {
            gameType = type
            websocket();
         }

         teenpatti("ok");
         jQuery(document).on("click", ".back-1", function() {
            $("#popup_color").removeClass("back");
            $("#popup_color").removeClass("lay");
            $("#popup_color").addClass("back");
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

               $('#profitLiability').text('');
               $(".placeBet").attr('disabled', false);
               $("#inputStake").val("");

               $('.open_back_place_bet').show();
               $('#open_back_place_bet').modal("show");
            }
         });


         jQuery(document).on("input", "#inputStake", function() {
            var stake = $("#inputStake").val();
            eventId = $("#fullMarketBetsWrap").attr("eventid");
            $("#inputStake").val(stake);
            odds = parseFloat($("#odds_val").val());
            inputStake = $("#inputStake").val();
            bet_stake_side = $("#bet_stake_side").val();
            bet_markettype = $("#bet_markettype").val();
            if (bet_markettype != "FANCY_ODDS") {
               if (bet_stake_side == "Lay") {
                  profit = parseInt(inputStake);
               } else {
                  profit = (odds - 1) * inputStake;
               }
            }
            $("#profitLiability").text(profit.toFixed(2));
         });
         jQuery(document).on("click", ".label_stake", function() {
            // stake = $(this).attr("stake");
            // eventId = $("#fullMarketBetsWrap").attr("eventid");
            // $("#inputStake").val(stake);
            
  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

            odds = parseFloat($("#odds_val").val());
            inputStake = $("#inputStake").val();
            bet_stake_side = $("#bet_stake_side").val();
            bet_markettype = $("#bet_markettype").val();
            if (bet_markettype != "FANCY_ODDS") {
               if (bet_stake_side == "Lay") {
                  profit = (odds - 1) * inputStake;
               } else {
                  profit = (odds - 1) * inputStake;
               }
            }
            $("#profitLiability").text(profit.toFixed(2));
         });

         jQuery(document).on("click", "#placeBet", function() {

            $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
            $(".placeBet").attr('disabled', true);
            $(".placeBet").removeAttr("id", "placeBet");
            var last_place_bet = "";
            bet_stake_side = $("#bet_stake_side").val();
            bet_type = bet_stake_side;
            bet_event_id = $("#bet_event_id").val();
            bet_marketId = $("#bet_marketId").val();
            oddsmarketId = bet_marketId;
            eventType = 'DTL20';
            bet_event_name = $("#bet_event_name").val();
            inputStake = $("#inputStake").val();
            market_runner_name = $("#market_runner_name").val();
            market_odd_name = $("#market_odd_name").val();
            var runsNo;
            var oddsNo;
            bet_market_name = $("#bet_market_name").val();
            eventManualType = 'Auto';
            if (bet_stake_side == "Lay") {
               type = "No";
               class_type = "no";
               unmatched_side_type = false;
            } else {
               type = "Yes";
               class_type = "yes";
               unmatched_side_type = true;
            }
            bet_markettype = $("#bet_markettype").val();
            if (bet_markettype != "FANCY_ODDS") {
               bet_market_type = bet_markettype;
               runsNo = parseFloat($("#odds_val").val());
               oddsNo = parseFloat($("#odds_val").val());
               if (bet_stake_side == "Lay") {
                  return_stake = (oddsNo - 1) * inputStake;
                  return_stake = parseInt(return_stake);
               } else {
                  return_stake = (oddsNo - 1) * inputStake;
                  return_stake = parseInt(return_stake);
               }
               bet_seconds = 1;
               bet_sec = 1000;
            }

            /* $("#inputStake").val(""); */
            $(".back-1").removeClass("select");
            $(".lay-1").removeClass("select");
            $("#loadingMsg").show();
            $('.header_Back_' + bet_event_id).remove();
            $('.header_Lay_' + bet_event_id).remove();
            $('#betSlipFullBtn').hide();
            $('#backSlipHeader').hide();
            $('#laySlipHeader').hide();
            $(".back-1").removeClass("select");
            $(".lay-1").removeClass("select");

            $("#bet-error-class").removeClass("b-toast-danger");
            $("#bet-error-class").removeClass("b-toast-success");
            setTimeout(function() {
               $.ajax({
                  type: 'POST',
                  url: '../ajaxfiles/bet_place_dtl20.php',
                  dataType: 'json',
                  data: {
                     eventId: bet_event_id,
                     eventType: eventType,
                     marketId: bet_marketId,
                     stack: inputStake,
                     type: type,
                     odds: oddsNo,
                     runs: runsNo,
                     bet_market_type: bet_market_type,
                     oddsmarketId: oddsmarketId,
                     eventManualType: eventManualType,
                     market_runner_name: market_runner_name,
                     market_odd_name: market_odd_name,
                     bet_event_name: bet_event_name,
                     bet_type: bet_type
                  },
                  success: function(response) {
                     var check_status = response['status'];
                     var message = response['message'];
                     if (check_status == 'ok') {
                        if (bet_markettype != "FANCY_ODDS") {
                           oddsNo = runsNo;
                        } else {
                           oddsNo = oddsNo;
                        }
                        auth_key = 1;
                        toastr.clear()
					toastr.success("", message, {
						"timeOut": "3000",
						"iconClass":"toast-success",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-success");*/
                     } else {
                        toastr.clear()
					toastr.warning("", message, {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-danger");*/
                     }
                     /*error_message_text = message;
					$("#errorMsgText").text(error_message_text);
					$("#errorMsg").fadeIn('fast').delay(3000).hide(0);*/
                     
                     $(".close-bet-slip").click();
                     refresh(markettype);
                     $(".placeBet").attr("id", "placeBet");
                     $("#placeBet").html('Submit');
                     $(".placeBet").attr('disabled', false);
                     $('.open_back_place_bet').hide();
                     $('#open_back_place_bet').modal("hide");
                  }
               });
            }, bet_sec - 2000);
         });
      </script>
      <style>
	  .modal-body {
    padding: 0px !important;
}
</style>
      <div id="open_back_place_bet" class="modal open_back_place_bet" role="dialog">
         <div class="modal-dialog" style="margin:0;">
            <div role="document" id="__BVID__30___BV_modal_content_" tabindex="-1" class="modal-content">
               <header id="__BVID__30___BV_modal_header_" class="modal-header">
                  <h5 id="__BVID__30___BV_modal_title_" class="modal-title">Place Bet</h5>
                  <button type="button" data-dismiss="modal" class="close">&times;</button>
               </header>
               <div id="__BVID__30___BV_modal_body_" class="modal-body" style="    padding: 0px;">
                  <div class="place-bet1 pt-2 pb-2 back place-bet-modal" id="popup_color">
                     <div class="row row5">
                        <div class="col-6"><b id="market_runner_label"></b></div>
                        <div class="col-6 text-right pt-1">Profit: <span id="profitLiability"></span></div>
                     </div>
                     <div class="odd-stake-box">
                        <div class="row row5 mt-1">
                           <div class="col-6 text-center">Odds</div>
                           <div class="col-6 text-center">Amount</div>
                        </div>
                        <div class="row row5 mt-1">
                           <div class="col-6"><input type="text" id="odds_val" class="stakeinput w-100" disabled="" value="1.7"></div>
                           <div class="col-6">
                              <div class="float-right"><input type="number" id="inputStake" class="stakeinput w-100" value=""></div>
                              <input type='hidden' id='market_runner_label' value='' />
                              <input type='hidden' id='bet_stake_side' value='' /><input type='hidden' id='bet_event_id' value='' /><input type='hidden' id='bet_marketId' value='' /><input type='hidden' id='bet_event_name' value='' /><input type='hidden' id='bet_market_name' value='' /><input type='hidden' id='bet_markettype' value='' /><input type='hidden' id='fullfancymarketrate' value='' /> <input type='hidden' id='oddsmarketId' value='' /><input type='hidden' id='market_runner_name' value='' /><input type='hidden' id='market_odd_name' value='' />
                           </div>
                        </div>
                     </div>
                     <!-- <div class="row row5">
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
                                </div>
                            </div>
                        </div> -->

                     <!--  <div class="row row5 mt-2">
                            <div class="col-4">
                                <input type="number" placeholder="00" id="inputStake" class="stakeinput w-100">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block  placeBet" id="placeBet">
                                    Submit
                                </button>
                            </div>

                        </div> -->
                     <div class="place-bet-buttons mt-1">
                        <?php
                        $get_button_value = $conn->query("select * from user_master where id=$user_id and (casino_button_value <> '' and casino_button_value IS NOT NULL)");
                        $num_rows = $get_button_value->num_rows;
                        $button_array = array();
                        if ($num_rows <= 0) {
                           $button_array[] = 500;
                           $button_array[] = 1000;
                           $button_array[] = 2000;
                           $button_array[] = 3000;
                           $button_array[] = 4000;
                           $button_array[] = 5000;
                           $button_array[] = 10000;
                           $button_array[] = 20000;
                        } else {
                           $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                           $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                           $default_stake = $fetch_button_value_data['default_stake'];
                           $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                           $button_array = explode(",", $fetch_button_value);
                        }
                        foreach ($button_array as $button_value) {
                        ?>
                           <button type="button" class="btn-place-bet btn btn-secondary btn-block1 label_stake" stake='<?php echo $button_value; ?>'>
                              +<?php echo $button_value; ?>
                           </button>

                        <?php
                        }
                        ?>
                     </div>
                     <div class="mt-1 place-bet-btn-box">
                        <button class="btn btn-link stackclear" style="text-decoration: underline;">Clear</button>
                        <button class="btn btn-info" data-target="#set_btn_value" data-toggle="modal">Edit</button>
                        <button class="btn btn-danger" data-dismiss="modal" class="close">Reset</button>
                        <button class="btn btn-success placeBet" id="placeBet" disabled>Place Bet</button>
                     </div>
                        <div class="mt-1 d-flex"><span>Range: 100 to 5K</span></div>
                  </div>
               </div>
               <!---->
            </div>
         </div>
      </div>
      <div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
         <div class="b-toaster-slot vue-portal-target">
            <div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
               <div tabindex="0" class="toast">
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