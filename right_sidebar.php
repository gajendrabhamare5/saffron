<style>
.placeBetLoader {
    display: none;
}

.placeBetLoader.show {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.3);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 50px;
    color: #fff;
    z-index: 1;
    top: 0;
}

.my-bet .card-body {
    overflow-y: auto;
    max-height: calc(100vh - 230px);
}

.my-bet .card-body table thead {
    position: sticky;
    top: 0;
}

.sidebar-right-inner .table>tbody tr{
    gap: 0px !important;
}
</style>
<div id="sidebar-right" class="col-md-3 sidebar-right" style="position: relative;overflow-x: hidden;overflow-y: auto;">
    <div class="ps">
        <div class="sidebar-right-inner">
             <?
            if (isset($isevent)) {
            ?>
             <div class="card m-b-10 hideptv" style="border: 0px;">
                <div class="card-header">
                    <h6 class="card-title" id="tvvv">
                        Live Match <span class="float-right"><i class="fa fa-tv"></i> live stream started </span>
                    </h6>
                </div>
                <div align="center" class="tv-container collapse">
                    <div id="matchDate1" class="match-title mt-1">
                        <span class="float-right" id="matchdate"></span>
                    </div>
                </div>
            </div> 
            <? } ?>
            <?
            if (isset($lottcard)) {
            ?>
            <div class="lottery-buttons"><button class="btn btn-lottery">Repeat</button><button
                    class="btn btn-lottery">Clear</button><button class="btn btn-lottery">Remove</button></div>
            <?
            }
            ?>
            <div class="card m-b-10 place-bet hideplacebet" style="display: none;">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">Place Bet</h6>
                </div>
                <div style="position: relative;">
                    <div class="bet_slip_details">
                    </div>
                    <div class='placeBetLoader'>
                        <i class='fa fa-spinner fa-pulse fa-fw'></i>
                    </div>
                </div>
               
            </div>

            <div id="sidebar-box-div">
                
            </div> 

            <div class="card m-b-10 my-bet">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">My Bet</h6>
                </div>
                <div class="card-body">
                    <table class="coupon-table table  table-borderedless mybetlist">
                        <thead>
                            <tr>
                                <th style="width: 60%;">
                                    Matched Bet
                                </th>
                                <th class="text-right">
                                    Odds
                                </th>
                                <th class="text-center">
                                    Stake
                                </th>
                            </tr>
                        </thead>
                        <tr id='matched_bet'></tr>

                    </table>
                </div>
            </div>

            <?php

            if (isset($is_five_cricket) ) {
            ?>
            <div class="card m-b-10">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">Rules</h6>
                </div>
                <div class="row row5 cc-rules">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <?php
                                        if (isset($is_five_cricket)) {
                                            echo "AUS";
                                        }
                                        if (isset($is_super_over)) {
                                            echo "END";
                                        }
                                        ?>
                                </h5>
                                <div class="row row5 mt-1">
                                    <div class="col-7">Cards</div>
                                    <div class="col-5 text-right">Value</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/A.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">1 Run</div>
                                </div>
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/2.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">2 Run</div>
                                </div>
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/3.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">3 Run</div>
                                </div>
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/4.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">4 Run</div>
                                </div>
                                <!---->
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/6.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">6 Run</div>
                                </div>
                                <!---->
                                <!---->
                                <!---->
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/10.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">0 Run</div>
                                </div>
                                <!---->
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/K.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">Wicket</div>
                                </div>
                                <!---->
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <?php
                                        if (isset($is_five_cricket)) {
                                            echo "IND";
                                        }
                                        if (isset($is_super_over)) {
                                            echo "RSA";
                                        }
                                        ?>
                                </h5>
                                <div class="row row5 mt-1">
                                    <div class="col-7">Cards</div>
                                    <div class="col-5 text-right">Value</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/A.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">1 Run</div>
                                </div>
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/2.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">2 Run</div>
                                </div>
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/3.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">3 Run</div>
                                </div>
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/4.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">4 Run</div>
                                </div>
                                <!---->
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/6.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">6 Run</div>
                                </div>
                                <!---->
                                <!---->
                                <!---->
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/10.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">0 Run</div>
                                </div>
                                <!---->
                                <div class="row row5 mt-1">
                                    <div class="col-7"><img src="storage/front/img/cricketv/K.jpg"> <span
                                            class="ml-2">X</span> <span class="ml-2">10</span></div>
                                    <div class="col-5 text-right value">Wicket</div>
                                </div>
                                <!---->
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
             

            if (isset($is_super_over) ) { ?>

            <div class="mt-2 w-100">
					<div class="sidebar-box place-bet-container super-over-rule">
						<div class="sidebar-title">
							<h4>ENGLAND vs RSA Inning's Card Rules</h4>
						</div>
						<div class="table-responsive">
							<table class="table">
							<thead>
								<tr>
									<th>Cards</th>
									<th class="text-center">Count</th>
									<th class="text-end">Value</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="storage/front/img/cards_new/cardA.png"><span class="ms-2">X</span></td>
									<td class="text-center">5</td>
									<td class="text-end"><img src="storage/front/img/cards_new/ball1.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/cards_new/card2.png"><span class="ms-2">X</span></td>
									<td class="text-center">5</td>
									<td class="text-end"><img src="storage/front/img/cards_new/ball2.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/cards_new/card3.png"><span class="ms-2">X</span></td>
									<td class="text-center">5</td>
									<td class="text-end"><img src="storage/front/img/cards_new/ball3.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/cards_new/card4.png"><span class="ms-2">X</span></td>
									<td class="text-center">5</td>
									<td class="text-end"><img src="storage/front/img/cards_new/ball4.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/cards_new/card6.png"><span class="ms-2">X</span></td>
									<td class="text-center">5</td>
									<td class="text-end"><img src="storage/front/img/cards_new/ball6.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/cards_new/card10.png"><span class="ms-2">X</span></td>
									<td class="text-center">5</td>
									<td class="text-end"><img src="storage/front/img/cards_new/ball0.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/cards_new/cardK.png"><span class="ms-2">X</span></td>
									<td class="text-center">5</td>
									<td class="text-end"><span>Wicket</span><img src="storage/front/img/cards_new/wicket.png"></td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
				</div>
          <?  }
            
            if (isset($isPatti2)) {
            ?>
            <div class="card m-b-10">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">Rules</h6>
                </div>
                <div class="row row5 cc-rules">

                    <div class="col-12">
                        <div class="card">
                            <!--  <div class="card-header">
                                        <h5 class="card-title">
                                        <?php
                                        echo "Color Plus Rules";

                                        ?>
                                    </h5>
                                        
                                    </div> -->
                            <div class="card-body p-2">
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-12 text-center"><b>Color Plus Rules</b></div>

                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Three card Sequence</div>
                                    <div class="col-5 text-right value">1 TO 3</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Four card color</div>
                                    <div class="col-5 text-right value">1 TO 9</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Four card Sequence</div>
                                    <div class="col-5 text-right value">1 TO 9</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Three of a kind</div>
                                    <div class="col-5 text-right value">1 TO 12</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Three card pure Sequence</div>
                                    <div class="col-5 text-right value">1 TO 15</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Four card pure Sequence</div>
                                    <div class="col-5 text-right value">1 TO 150</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Four of a kind</div>
                                    <div class="col-5 text-right value">1 TO 200</div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            if (isset($isTeensin)) {
            ?>
            <div class="card m-b-10">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">Rules</h6>
                </div>
                <div class="row row5 cc-rules">

                    <div class="col-12">
                        <div class="card">
                            <!--  <div class="card-header">
                                        <h5 class="card-title">
                                        <?php
                                        echo "Color Plus Rules";

                                        ?>
                                    </h5>
                                        
                                    </div> -->
                            <div class="card-body p-2">
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-12 text-center"><b>Color Plus Rules</b></div>

                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Straight</div>
                                    <div class="col-5 text-right value">1 TO 2</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Flush</div>
                                    <div class="col-5 text-right value">1 TO 5</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Trio</div>
                                    <div class="col-5 text-right value">1 TO 20</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Straight Flush</div>
                                    <div class="col-5 text-right value">1 TO 30</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            if (isset($isTeenMuf)) {
            ?>
            <div class="card m-b-10">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">Rules</h6>
                </div>
                <div class="row row5 cc-rules">

                    <div class="col-12">
                        <div class="card">
                            <!--  <div class="card-header">
                                        <h5 class="card-title">
                                        <?php
                                        echo "Color Plus Rules";

                                        ?>
                                    </h5>
                                        
                                    </div> -->
                            <div class="card-body p-2">
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-12 text-center"><b>Top 9</b></div>

                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Card 9</div>
                                    <div class="col-5 text-right value">1 TO 3</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Card 8</div>
                                    <div class="col-5 text-right value">1 TO 4</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Card 7</div>
                                    <div class="col-5 text-right value">1 TO 5</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Card 6</div>
                                    <div class="col-5 text-right value">1 TO 8</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Card 5</div>
                                    <div class="col-5 text-right value">1 TO 30</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            if (isset($isTeen20b) || isset($isopenTeen)) {
            ?>
            <div class="card m-b-10">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">Rules</h6>
                </div>
                <div class="row row5 cc-rules">

                    <div class="col-12">
                        <div class="card">
                            <!--  <div class="card-header">
                                        <h5 class="card-title">
                                        <?php
                                        echo "Color Plus Rules";

                                        ?>
                                    </h5>
                                        
                                    </div> -->
                            <div class="card-body p-2">
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-12 text-center"><b>Pair Plus</b></div>

                                </div>

                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Pair</div>
                                    <div class="col-5 text-right value">1 TO 1</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Flush</div>
                                    <div class="col-5 text-right value">1 TO 4</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Straight</div>
                                    <div class="col-5 text-right value">1 TO 6</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Trio</div>
                                    <div class="col-5 text-right value">1 TO 30</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Straight Flush</div>
                                    <div class="col-5 text-right value">1 TO 40</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
           
             if (isset($poker)) {
            ?>
            <div class="card m-b-10">
                <div class="card-header">
                    <h6 class="card-title d-inline-block">Rules</h6>
                </div>
                <div class="row row5 cc-rules">

                    <div class="col-12">
                        <div class="card">
                            <!--  <div class="card-header">
                                        <h5 class="card-title">
                                        <?php
                                        echo "Color Plus Rules";

                                        ?>
                                    </h5>
                                        
                                    </div> -->
                            <div class="card-body p-2">
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-12 text-center"><b>Bonus 1 (2 Cards Bonus)</b></div>

                                </div>

                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Pair (2-10)</div>
                                    <div class="col-5 text-right value">1 TO 3</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">A/Q or A/J Off Suited</div>
                                    <div class="col-5 text-right value">1 TO 5</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Pair (JQK)</div>
                                    <div class="col-5 text-right value">1 TO 10</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">A/K Off Suited</div>
                                    <div class="col-5 text-right value">1 TO 15</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">A/Q or A/J Suited</div>
                                    <div class="col-5 text-right value">1 TO 20</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">A/K Suited</div>
                                    <div class="col-5 text-right value">1 TO 25</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">A/A</div>
                                    <div class="col-5 text-right value">1 TO 30</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-12 text-center"><b>Bonus 2 (7 Cards Bonus)</b></div>

                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Three of a Kind</div>
                                    <div class="col-5 text-right value">1 TO 3</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Straight</div>
                                    <div class="col-5 text-right value">1 TO 4</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Flush</div>
                                    <div class="col-5 text-right value">1 TO 6</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Full House</div>
                                    <div class="col-5 text-right value">1 TO 8</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Four of a Kind</div>
                                    <div class="col-5 text-right value">1 TO 30</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Straight Flush</div>
                                    <div class="col-5 text-right value">1 TO 50</div>
                                </div>
                                <div class="row row5 mt-1"
                                    style="border-bottom: 1px solid; border-color: #c7c8ca; padding: 3px 0;">
                                    <div class="col-7">Royal Flush</div>
                                    <div class="col-5 text-right value">1 TO 100</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }

           
             if (isset($isdolidana) ) { ?>

            <div class="mt-2 w-100">
					<div class="sidebar-box place-bet-container  doli-dana-rules">
						<div class="sidebar-title">
							<h4>Rules</h4>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered">
							<thead>
								<tr>
									<th>Win</th>
									<!-- <th class="text-center"></th> -->
									<th>Loss</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="storage/front/img/dice/dice3.png"><img src="storage/front/img/dice/dice3.png"></td>
									<!-- <td class="text-center"></td> -->
									<td class="text-end"><img src="storage/front/img/dice/dice1.png"><img src="storage/front/img/dice/dice1.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/dice/dice5.png"><img src="storage/front/img/dice/dice5.png"></td>
									<!-- <td class="text-center"></td> -->
									<td class="text-end"><img src="storage/front/img/dice/dice2.png"><img src="storage/front/img/dice/dice2.png"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/dice/dice6.png"><img src="storage/front/img/dice/dice6.png"></td>
									<!-- <td class="text-center"></td> -->
									<td class="text-end"><img src="storage/front/img/dice/dice4.png?1"><img src="storage/front/img/dice/dice4.png?1"></td>
								</tr>
								<tr>
									<td><img src="storage/front/img/dice/dice5.png"><img src="storage/front/img/dice/dice6.png"></td>
									<!-- <td class="text-center"></td> -->
									<td class="text-end"><img src="storage/front/img/dice/dice1.png"><img src="storage/front/img/dice/dice2.png"></td>
								</tr>
								
							</tbody>
							</table>
						</div>
					</div>
				</div>
          <?  } ?>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</div>