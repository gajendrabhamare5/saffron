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
         <div class="report-container">
            <div class="card rules-container rulespage">
               <div class="card-header">
                  <h4 class="mb-0">Rules</h4>
               </div>
               <ul class="nav nav-tabs game-nav-bar">

                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game4" class="sports nav-link active">
                        <div>
                           Cricket
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game1" class="sports nav-link">
                        <div>
                           Football
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game2" class="sports nav-link"
                        onclick="tab_view('tennis')">
                        <div>
                           Tennis
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        
                        <div>
                           Esoccer
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Horse Racing
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Greyhound Racing
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Table Tennis
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Basketball
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Boxing
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Mixed Martial Arts
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           American Football
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Volleyball
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Badminton
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Snooker
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Ice Hockey
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           E Games
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Politics
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Futsal
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Handball
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Motor Sports
                        </div>
                     </a>
                  </li>
                  <li class="nav-item text-center">
                     <a data-toggle="tab" href="#game6" class="sports nav-link">
                        <div>
                           Kabaddi
                        </div>
                     </a>
                  </li>
               </ul>
               <div class="card-body container-fluid container-fluid-5">

                  <div class="row row5 mt-2">
                     <div class="col-12">
                        <div role="tablist">

                           <div class="tab-content">
                              <div id="game1" class="tab-pane container pl-0 pr-0">
                                 <div class="game-listing-container" id="football_event"
                                    style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
                                    <div class="game-list pt-1 pb-1 container-fluid">
                                       <div class="row row5">
                                          <div class="col-12">
                                             <p class="text-center mb-1 mt-1">No real-time records found</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="game2" class="tab-pane container pl-0 pr-0">
                                 <div class="game-listing-container" id="tennis_event"
                                    style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
                                    <div class="game-list pt-1 pb-1 container-fluid">
                                       <div class="row row5">
                                          <div class="col-12">
                                             <p class="text-center mb-1 mt-1">No real-time records found</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="game4" class="tab-pane container pl-0 pr-0 active">
                                 <div class="game-listing-container" id="cricket_event"
                                    style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;"></div>
                              </div>
                              <div id="game6" class="tab-pane container pl-0 pr-0">
                                 <div class="game-listing-container"
                                    style="max-height: calc((100vh - 184px) / 2);max-height: 250px; overflow-x: auto;">
                                    <div class="game-list pt-1 pb-1 container-fluid">
                                       <div class="row row5">
                                          <div class="col-12">
                                             <p class="text-center mb-1 mt-1">No real-time records found</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                          <!--  <div id="accordion">
                              <div class="card card_rules">
                                 <div id="heading0" data-toggle="collapse" data-target="#collapse0" aria-expanded="false" aria-controls="collapse0" class="card-header collapsed">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Motor Sport
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse0" aria-labelledby="heading0" data-parent="#accordion" class="collapse" style="">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading1" data-toggle="collapse" data-target="#collapse1" aria-controls="collapse1" class="card-header collapsed" aria-expanded="false">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Mixed Martial Arts
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse1" aria-labelledby="heading1" data-parent="#accordion" class="collapse" style="">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading2" data-toggle="collapse" data-target="#collapse2" aria-controls="collapse2" class="card-header collapsed" aria-expanded="false">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Big Bash League
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse2" aria-labelledby="heading2" data-parent="#accordion" class="collapse" style="">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading3" data-toggle="collapse" data-target="#collapse3" aria-controls="collapse3" class="card-header collapsed" aria-expanded="false">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Lunch Favourite
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse3" aria-labelledby="heading3" data-parent="#accordion" class="collapse" style="">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading4" data-toggle="collapse" data-target="#collapse4" aria-controls="collapse4" class="card-header collapsed" aria-expanded="false">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Bookmaker
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse4" aria-labelledby="heading4" data-parent="#accordion" class="collapse" style="">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading5" data-toggle="collapse" data-target="#collapse5" aria-controls="collapse5" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Teenpatti
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse5" aria-labelledby="heading5" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading6" data-toggle="collapse" data-target="#collapse6" aria-controls="collapse6" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          CricketCasino
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse6" aria-labelledby="heading6" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading7" data-toggle="collapse" data-target="#collapse7" aria-controls="collapse7" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Politics
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse7" aria-labelledby="heading7" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading8" data-toggle="collapse" data-target="#collapse8" aria-controls="collapse8" class="card-header collapsed" aria-expanded="false">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Fancy Market 1
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse8" aria-labelledby="heading8" data-parent="#accordion" class="collapse" style="">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading9" data-toggle="collapse" data-target="#collapse9" aria-controls="collapse9" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          IPL
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse9" aria-labelledby="heading9" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading10" data-toggle="collapse" data-target="#collapse10" aria-controls="collapse10" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Kabaddi
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse10" aria-labelledby="heading10" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading11" data-toggle="collapse" data-target="#collapse11" aria-controls="collapse11" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          World Cup
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse11" aria-labelledby="heading11" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading12" data-toggle="collapse" data-target="#collapse12" aria-controls="collapse12" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Binary
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse12" aria-labelledby="heading12" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading13" data-toggle="collapse" data-target="#collapse13" aria-controls="collapse13" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Fancy
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse13" aria-labelledby="heading13" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading14" data-toggle="collapse" data-target="#collapse14" aria-controls="collapse14" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Match
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse14" aria-labelledby="heading14" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading15" data-toggle="collapse" data-target="#collapse15" aria-controls="collapse15" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Khado
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse15" aria-labelledby="heading15" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="card card_rules">
                                 <div id="heading16" data-toggle="collapse" data-target="#collapse16" aria-controls="collapse16" class="card-header">
                                    <h5 class="mb-0"><button class="btn btn-link">
                                          Election
                                       </button>
                                    </h5>
                                 </div>
                                 <div id="collapse16" aria-labelledby="heading16" data-parent="#accordion" class="collapse">
                                    <div class="card-body">
                                       <table class="table table-bordered">
                                          <tbody>
                                             <tr>
                                                <td><span class="text-danger">1. Even odd game betting rate rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.1 Completed game is valid , in case due to rain over are reduced or match abandoned particular game will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.2 All bets regarding to ODD/EVEN player/partnership are valid if one legal delivery is being played, else the bets will be deleted. Player odd/even all advance bets will be valid if one legal delivery is being played in match otherwise voided.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.3 All bets regarding Odd/Even sessions will be deleted if the particular session is incomplete, for example match got abandoned or finished before the end of particular session.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1.4 In any circumstances management decision will be final.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2 Top batsman rules:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">2.1 If any player does not come as per playing eleven then all bets will be get deleted for the particular player.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2.2 two players done the same run in a single match (M Agarwal 30 runs and A Rayudu 30 runs, whole inning top batsmen score also 30 run) then both player settlement to be get done 50 percent (50% , 50%)rate on their original value which given by our exchange.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Suppose we have opened value of M Agarwal 3.75 back and customer place bets on 10000 @ 3.75 rates and A Rayudu 3.0 back and customer place bets on 10000 @ 3.0 rates.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Whole inning result announces 30 run by both player then</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on M Agarwal you will be get half amount of this rate (10000*3.75/2=18750 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Rule of top batsman:-if you bet on A Rayudu you will be get half amount of this rate (10000*3.00/2=15000 you will get)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Top batsman only 1st inning valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For one day 50 over and for t-20 match 20 over must be played for top batsmen otherwise all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Man of the Match Rules</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted in case the match is abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. In case Man of the Match is shared between two players then Dead heat rule will be applicable, For example K Perera and T Iqbal shares the Man of the Match, then the settlement will be done 50% of the rates accordingly.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Rules similar to our Top Batsman rules.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Sixes by Team</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All bets will be deleted if both the teams hits same number of sixes.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Super over will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum 6 or 10 over runs</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. All the bets will be deleted if both the teams score is same (Runs scored in 6 or 10 overs)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. 6 overs for T20 and 10 overs for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">4. Both the innings are valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5. This fancy will be valid for 1st 6 overs of both innings for T20 and 1st 10 overs of both innings for ODI</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Batsman Match</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Batsman Match:- Bets for Favourite batsman from the two batsman matched.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if any one of the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless one ball being played by both the mentioned players.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if over reduced or Match abandoned.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if both the player scored same run. For example H Amla and J Bairstow are the batsman matched, H Amla and J Bairstow both scored 38 runs then all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Opening Pair</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. Bets for Favourite opening pair from the two mentioned opening pair.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. Runs made by both the opening player will be added. For example:- J Roy scored 20 runs and J Bairstow scored 30 runs result will be 50 runs.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">3. Highest run made by the pair will be declared as winner. For example: Opening pair ENG total is 70 runs and Opening pair SA is 90 runs, then SA 90 runs will be declared as winner.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Our exchange Special</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned player is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both innings will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Direction of First Boundary</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through off side of the stump will be considered as off side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">The boundary hit through leg side of the stump will be considered as leg side four.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered as valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st Inning will be considered</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Fifty &amp; Century by Batsman</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if match abandoned or over reduced.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted if the mentioned batsman is not included in playing 11.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">All bets will be deleted unless the batsman faces one legal ball.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Both Innings will be valid.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">1st over Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Boundaries through extras (byes,leg byes,wide,overthrow) will not be considered.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Only 1st inning will be valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Odd Even Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Incompleted games will be deleted. Over reduced or abandoned all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">For example:-275 run SL bhav must be played 50 over if rain comes or any condition otherwise 275 run SL bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Next Man out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Next man out fancy advance &amp; in regular.
                                                      Both inning will be valid. If any player does not come in opening then all bets will be deleted. If over reduced or abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Caught out</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Caught out fancy in advance &amp; in regular.
                                                      Both inning will be valid. If over reduced or match abandoned then all bets will be deleted.</span>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Wkt &amp; All out Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">5 wkt in 10 over &amp; All out in 20 over fancy is valid for both inning. If match abandoned or over reduced all bets will be deleted.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Test Match: Game Completed Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">1. This is the fancy for match to be won/ completed in which day &amp; session (Completed: Game has to be completed)</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">2. If match drawn then all the sessions will be considered as lost.</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Meter Fancy</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case match abandoned or over reduced mid point rule will be applicable</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">For example: If Dhoni meter is 75 / 77 and the match abandoned or over reduced, then the result will be 76</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">In case of single difference result will be given for the higher rate of the final rate (eg 53/54) and match gets abandoned then the result will be given as 54</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Midpoint rule is applicable for test match also. However for lambi meter/ inning meter 70 overs has to be played only then the same will be considered as valid</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Maximum Boundaries:-</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">If the number of fours or sixes of both the team is equal, then all bets of the respective event will get voided</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="text-danger">Khado:- Test</span></td>
                                             </tr>
                                             <tr>
                                                <td><span class="">Minimum 70 over has to be played by the particular team only then the Khado of the team will be considered as valid, else the same will be voided</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div> -->
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
<script src="../storage/js/jquery.dataTables.min.js" type="text/javascript"></script>

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="../storage/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
   jQuery(document).on("click", ".collapsed1", function(e) {
      e.preventDefault();
      e.stopPropagation();
      console.log(this);
      id = $(this).attr('id');
      id = id.split("heading");
      id = id[1];
      console.log(id);
      console.log($("#collapse" + id + "").is(":visible"));
      if ($("#collapse" + id + "").is(":visible")) {
         $("#collapse" + id + "").attr('aria-expanded', 'false');
         $("#collapse" + id + "").addClass('collapse');
      } else {
         $("#collapse" + id + "").attr('aria-expanded', 'true');
         $("#collapse" + id + "").removeClass('collapse');
      }
   });
</script>
<?php
include "footer.php";
?>

</html>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>