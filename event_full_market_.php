<?php
include('include/conn2.php');
include('include/flip_function.php');
include('session.php');
include('include/market_limit.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$get_parent_ids = $conn->query("select parentDL,parentMDL,parentSuperMDL from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentDL = $fetch_parent_ids['parentDL'];
$parentMDL = $fetch_parent_ids['parentMDL'];		
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


if($_GET['eventId']){
	$event_id = $_GET['eventId'];
}else{
	echo "<h1>Error:</h1>";
	exit();
}
if($_GET['marketId']){
	$marketId = strval($_GET['marketId']);
}else{
	echo "<h1>Error:</h1>";
	exit();
}
if($_GET['eventType']){
	$eventType = $_GET['eventType'];
	if($eventType == 1 or $eventType == 2 or $eventType == 4 or $eventType == 8){
	}else{
		header("Location: index");
	}
}else{
	header("Location: index");
}

$market_limit_data = get_market_limit($conn,$event_id,$marketId,true,$eventType);

$match_max = $bookmaker_min = $bookmaker_max = 50000;
if(!empty($market_limit_data)){
	$match_max = $market_limit_data['match_max'];
	
	$bookmaker_min = $market_limit_data['bookmaker_min'];
	if(get_inplay_status($marketId))
		$bookmaker_max = $market_limit_data['bookmaker_live'];
	else
		$bookmaker_max = $market_limit_data['bookmaker_max'];
}
else{
	$match_max = 50000;
	$bookmaker_min = 1000;
	if(get_inplay_status($marketId)){
		$bookmaker_max = 50000;
	}
	else{
		$bookmaker_max = 50000;
		if($eventType == 4){
			$bookmaker_max = 200000;
		}
		
	}
}
$event_name = '';
if($event_id == ELECTION_EVENT_ID){
	$event_name = ELECTION_MARKET_NAME;
}elseif($event_id == IPL_EVENT_ID){
	$event_name = IPL_MARKET_NAME;
}
$get_url = $conn->query("select * from tv_url_master where event_id=$event_id");
$fetch_get_url = mysqli_fetch_assoc($get_url);
$iframe_score_url = $fetch_get_url['score_url'];
if(empty($iframe_score_url))
{
	$iframe_score_url="";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
    <style>
        .rate_change_link {
            background : #FC1 !important;
        }
    </style>
<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
			include("loader.php");;
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
                        <!---->
                        <div class="col-md-10 featured-box load game-page">
                            <div class="row row5">
                                <div class="col-md-9 featured-box-detail sports-wrapper m-b-10">
                                    <!---->
                                    <div class="game-heading"><span class="card-header-title event_name_heading"><?php echo $event_name;?></span> <span class="float-right" id="matchdate"></span></div>
                                    <div class="markets">
                                        <!---->
                                        
                                        <?php if($eventType == 4){ ?>
                                        	<div id="scoreboard-box"></div>
                                        <?php } else if($eventType == 1 || $eventType == 2){ ?>
                                        	<div class="col-xl-12" style="padding: 0px;">
												
													<div id="scoreboard-box" style="background: black;">
													
												</div>
												
												
                                        	</div>
                                        <?php }?>

										<?php 
										if($event_id != IPL_EVENT_ID){
										?>                                                                                 
											<div class="main-market" id="match_odds_all_full_markets"></div>
										<?php 
										}
										?>
										<iframe src="https://score.sportside9.com/#/?params=31620323&param=4"></iframe>
                                        <div class="row row5 bookmaker-market mt-1" id="bookmaker_market_div" style="display:none;">
                                            <div class="bm1 col-xl-12" id="bm1-head">
                                                <div>
                                                    <div class="market-title mt-1">
                                                        Bookmaker market
                                                        <a href="javascript:void(0)"  data-toggle="modal" data-target="#view_bookmaker_rules" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
                                                    <div class="table-header">
                                                        <div class="float-left country-name box-4 text-info"><b>Min: <span id="bookmaker_min">1</span> 
            Max: <span id="bookmaker_max">1</span></b></div>
                                                        <div class="box-1 float-left"></div>
                                                        <div class="box-1 float-left"></div>
                                                        <div class="back box-1 float-left text-center"><b>BACK</b></div>
                                                        <div class="lay box-1 float-left text-center"><b>LAY</b></div>
                                                        <div class="box-1 float-left"></div>
                                                        <div class="box-1 float-left"></div>
                                                    </div>
                                                    <div class="table-body" id="match_odds_bookmaker_market"></div>
                                                    <div class="table-remark text-right remark" id="bookmaker-remakrs">
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bm2 col-4" id="bm2-head" style="display:none;">
												<div>
													<div class="market-title mt-1">
														Bookmaker market
														<a href="javascript:void(0)" class="m-r-5 game-rules-icon">
															<span>
																<i class="fa fa-info-circle float-right"></i>
															</span>
														</a>
													</div>
													<div class="table-header">
														<div class="float-left country-name box-6 text-info">
															<b>
																Min: <span>500</span> 
																Max: <span>25K</span>
															</b>
														</div>
														<div class="back box-2 float-left text-center">
															<b>BACK</b>
														</div>
														<div class="lay box-2 float-left text-center">
															<b>LAY</b>
														</div>
													</div>
													<div class="table-body" id="bookmakersmall1_market_div_secure">
														
													</div>
													<div class="table-remark text-right remark">
														Exclusive Bookmaker With Better Rates For Small Bets
													</div>
													<div></div>
												</div>
											</div>
                                        </div>
                                        
                                        
                                    </div>
                                    <?php if($eventType == 4 || $eventType == 8){ ?>
										<div class="fancy-market row row5">
											<div class="col-6">
												<div class="" id="fancy_odds_market" style="display:none;">
													<div>
														<div class="market-title mt-1">
															Session Market
															<a href="javascript:void(0)" data-target="#view_fancy_rules" data-toggle="modal" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
														<div class="table-header">
															<div class="float-left country-name box-6"></div>
															<div class="box-1 float-left lay text-center"><b>No</b></div>
															<div class="back box-1 float-left back text-center"><b>Yes</b></div>
															<div class="box-2 float-left"></div>
														</div>
														<div class="table-body">
															<div id="secure"></div>
														</div>
														<div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-6">
												<div class="" id="over_by_over_odds_market" style="display:none;">
													<div>
														<div class="market-title mt-1">
															Over by Over Session Market	
															<a href="javascript:void(0)" data-target="#view_fancy_rules" data-toggle="modal" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
														<div class="table-header">
															<div class="float-left country-name box-6"></div>
															<div class="box-1 float-left lay text-center"><b>No</b></div>
															<div class="back box-1 float-left back text-center"><b>Yes</b></div>
															<div class="box-2 float-left"></div>
														</div>
														<div class="table-body">
															<div id="secure_over_by_over"></div>
														</div>
														<div>
														</div>
													</div>
												</div>
												<div class="" id="ball_odds_market" style="display:none;">
													<div>
														<div class="market-title mt-1">
															 Ball By Ball Market
															<a href="javascript:void(0)" data-target="#view_fancy_rules" data-toggle="modal" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
														<div class="table-header">
															<div class="float-left country-name box-6"></div>
															<div class="box-1 float-left lay text-center"><b>No</b></div>
															<div class="back box-1 float-left back text-center"><b>Yes</b></div>
															<div class="box-2 float-left"></div>
														</div>
														<div class="table-body">
															<div id="secure_ball"></div>
														</div>
														<div>
														</div>
													</div>
												</div>
			
											</div>
										</div>
										<div class="markets">
											<!---->
										</div>
										<ul class="nav nav-tabs mt-1">
											<li class="nav-item"><a data-toggle="tab" href="#fancy1" class="nav-link active">Fancy1</a></li>
											<li class="nav-item"><a data-toggle="tab" href="#meter" class="nav-link">Meter</a></li>
											<li class="nav-item"><a data-toggle="tab" href="#khado" class="nav-link">Khado</a></li>
											<li class="nav-item"><a data-toggle="tab" href="#oddeven" class="nav-link">Odd Even</a></li>
											<li class="nav-item"><a data-toggle="tab" href="#wicket" class="nav-link">Wicket</a></li>
											<li class="nav-item"><a data-toggle="tab" href="#four" class="nav-link">Four</a></li>
											<li class="nav-item"><a data-toggle="tab" href="#six" class="nav-link">Six</a></li>
											<li class="nav-item"><a data-toggle="tab" href="#cc" class="nav-link">Cricket Casino</a></li>
										</ul>
										<div class="tab-content fancy-tab">
                                        <div id="fancy1" class="tab-pane active">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1">No real-time records found</div> 
                                                <div class="" id="fancy_odds_market1" style="display:none;">
                                                    <div class="market-title mt-1">
                                                        Fancy1 Market
                                                        <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
                                                    <div class="table-header">
                                                        <div class="float-left country-name box-6"></div>
                                                        <div class="back box-1 float-left back text-center"><b>BACK</b></div>
                                                        <div class="box-1 float-left lay text-center"><b>LAY</b></div>
                                                        <div class="box-2 float-left"></div>
                                                    </div>
                                                    <div class="table-body">

                                                        <div id="secure1"></div>


                                                    </div>
                                                    <!---->
                                                    <div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div id="meter" class="tab-pane">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1">No real-time records found</div> 
                                                <div class="" id="meter_odds_market" style="display:none;"> 
                                                    <div class="market-title mt-1">
                                                        Meter Market
                                                        <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
                                                    <div class="table-header">
                                                        <div class="float-left country-name box-6"></div>
                                                        <div class="box-1 float-left lay text-center"><b>NO</b></div>
                                                        <div class="back box-1 float-left back text-center"><b>YES</b></div>
                                                        <div class="box-2 float-left"></div>
                                                    </div>
                                                    <div class="table-body">

                                                        <div id="secure_meter"></div>


                                                    </div>
                                                    <!---->
                                                    <div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div id="khado" class="tab-pane">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1">No real-time records found</div> 
                                                <div id="khado_odds_market" style="display:none;"> 
                                                    <div class="market-title mt-1">
                                                        Khado Market
                                                        <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
                                                    <div class="table-header">
                                                        <div class="float-left country-name box-6"></div>
                                                        <div class="back box-1 float-left back text-center"><b>BACK</b></div>
                                                        <div class="box-1 float-left lay text-center"><b>LAY</b></div>
                                                        <div class="box-2 float-left"></div>
                                                    </div>
                                                    <div class="table-body">

                                                        <div id="secure_khado"></div>


                                                    </div>
                                                    <!---->
                                                    <div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div id="oddeven" class="tab-pane">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1" style="">No real-time records found</div>
                                            </div>
                                            <div class="" id="oddeven_odds_market" style="display:none;"> 
                                                    <div class="market-title mt-1">
                                                        Odd Even
                                                        <a href="javascript:void(0)" class="m-r-5 game-rules-icon"><span><i class="fa fa-info-circle float-right"></i></span></a></div>
                                                    <div class="table-header">
                                                        <div class="float-left country-name box-6"></div>
                                                        <div class="back box-1 float-left back text-center"><b>ODD</b></div>
                                                        <div class="back box-1 float-left back text-center"><b>EVEN</b></div>
                                                        <div class="box-2 float-left"></div>
                                                    </div>
                                                    <div class="table-body">

                                                        <div id="secure_oddeven"></div>


                                                    </div>
                                                    <!---->
                                                    <div>
                                                        <!---->
                                                    </div>
                                                </div>
                                        </div>
                                        <div id="wicket" class="tab-pane">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1" style="">No real-time records found</div>
                                            </div>
                                        </div>
                                        <div id="four" class="tab-pane">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1" style="">No real-time records found</div>
                                            </div>
                                        </div>
                                        <div id="six" class="tab-pane">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1" style="">No real-time records found</div>
                                            </div>
                                        </div>
                                        <div id="cc" class="tab-pane">
                                            <div class="fancy-market">
                                                <div class="fancy-message col-12 mt-1" style="">No real-time records found</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php
									include("right_sidebar.php");
								?>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
<script type="text/javascript" src="js/socket.io.js"></script>
			<script type="text/javascript" src="js/jquery.min.js"></script>
             <?php
				include("footer.php");
				
			?>
        </div>
    </div>
   
   <?php
				include("footer-js.php");
			?>

</body>

</html>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>

<script type="text/javascript">   

$(function () { 
	var header = $("#sidebar-right"); 
	$(window).scroll(function () { 
		var scroll = $(window).scrollTop(); 
		
		if (scroll >= $(window).height()/3) { 
			$("#sidebar-right").css('position','fixed') ;
			$("#sidebar-right").css('top','0px') ;
			$("#sidebar-right").css('right','0px') ;
			$("#sidebar-right").css('width','25.5%') ;
		} else { 
			$("#sidebar-right").css('position','relative') ;
			$("#sidebar-right").css('top','0px') ;
			$("#sidebar-right").css('right','0px') ;
			$("#sidebar-right").css('width','25.5%') ;
		} 
	}); 
}); 

var GAME_ID;
//var GAME_ID = "30065962";
//var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
var SCOREBOARD_URL = "wss://sportsscore24.com/";
var ssocket = null;
var socketScoreBoard;


function scoreboardConnect(){
    socketScoreBoard = io.connect(SCOREBOARD_URL, { transports: ['websocket'] });
    socketScoreBoard.on("connect", function() {
      socketScoreBoard.emit("subscribe", {
        type: 1,
        rooms: [parseInt(GAME_ID)]
      });
    });
    socketScoreBoard.on("error", function(abc) {
      
    });
    socketScoreBoard.on("update", function(response) {
      if (
        response.data != undefined &&
        response.data != null &&
        response.data.isfinished == 1
      ) {
        socketScoreBoard.emit("unsubscribe", {type: 1, rooms: [] });
        // $("#scoreboard-box").html("");
      } else {
        if (response.data != undefined && response.data != null) {
          //self.scoreboardData = response.data;
          updateScoreBoard(response.data);    
        } else {
          $("#scoreboard-box").html("");
        }
      }
    });
    socketScoreBoard.on("disconnect", function() {
    });
}

function updateScoreBoard(data){
	
    if(data.isfinished == "1"){
        $("#scoreboard-box").hide();
        return;
    }else{
        $("#scoreboard-box").show();
    }

    var scoreboardStr="";
    scoreboardStr += "<div class=\"scorecard scorecard-mobile\"><div data-v-68a8f00a='' class='score-inner'>";
    scoreboardStr += "    <div class=\"row\">";
    scoreboardStr += "        <span class=\"team-name col-2\">"+data.spnnation1+"<\/span>";
    scoreboardStr += "        <span class=\"score col-6\">"+data.score1+"<\/span>";
    scoreboardStr += "<span class=\"col-2 run-rate\">";
    if(data.spnrunrate1 != null && data.spnrunrate1 != ""){
        scoreboardStr += "CRR "+data.spnrunrate1;
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "<span class=\"col-2 run-rate\">";
    if(data.spnreqrate1 != null && data.spnreqrate1 != ""){
        scoreboardStr += " RR "+data.spnreqrate1;    
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "    <\/div>";
    scoreboardStr += "    <div class=\"row m-t-10\">";
    scoreboardStr += "        <span class=\"team-name col-2\">"+data.spnnation2+"<\/span>";
    scoreboardStr += "        <span class=\"score col-6\">"+data.score2+"<\/span>";
    scoreboardStr += "        <span class=\"col-2 run-rate\">";
    if(data.spnrunrate2 != null && data.spnrunrate2 != ""){
        scoreboardStr += "CRR "+data.spnrunrate2;
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "        <span class=\"col-2 run-rate\">";
    if(data.spnreqrate2 != null && data.spnreqrate2 != ""){
        scoreboardStr += " RR "+data.spnreqrate2;    
    }
    scoreboardStr += "<\/span>";
    scoreboardStr += "    <\/div>";
    scoreboardStr += "    <div class=\"row\">";
    scoreboardStr += "        <div class=\"col-6 m-t-10\">";
    if(data.spnballrunningstatus != ""){
        scoreboardStr += "<p>";
        if(data.dayno != ""){
            scoreboardStr += "<span>Day "+data.dayno+"<\/span> | ";
        }
        scoreboardStr += data.spnballrunningstatus+"<\/p>";
    }else if(data.spnmessage != ""){
        scoreboardStr += "<p>";
        if(data.dayno != ""){
            scoreboardStr += "<span>Day "+data.dayno+"<\/span> | ";
        }
        scoreboardStr += data.spnmessage+"<\/p>";
    }
    
    scoreboardStr += "        <\/div>";
    scoreboardStr += "        <div class=\"col-6 ball-runs-container m-t-5\">";
    scoreboardStr += "            <p class=\"text-right ball-by-ball\">";
    $.each(data.balls, function(key, ballVal) {
        if(ballVal != ""){
            var b_class = "";
            if(ballVal == '4'){
                b_class = "four";
            }else if(ballVal == '6'){
                b_class = "six";
            }else if(ballVal == 'ww'){
                b_class = "wicket";
            }
            scoreboardStr += "<span class=\"ball-runs "+b_class+"\">"+ballVal+"<\/span> ";    
        }
    });
    scoreboardStr += "            <\/p>";
    scoreboardStr += "        <\/div>";
    scoreboardStr += "    <\/div>";
    scoreboardStr += "<\/div><\/div>";
    $("#scoreboard-box").html(scoreboardStr);
    return;
}

$('#tvvv').on('click',function (){
	var name = "collapseTV";
	if($("#" + name).length == 0) {
		$('.tv-container').addClass('show');
		<?php
		
		$get_url = $conn->query("select * from tv_url_master where event_id=$event_id");
		$fetch_get_url = mysqli_fetch_assoc($get_url);
		$iframe_url = $fetch_get_url['url'];
		?>
		$("#matchDate1").append('<div data-v-68a8f00a="" id="collapseTV"><iframe data-v-68a8f00a="" src="<?php echo $iframe_url;?>" width="100%" style="height: 204px;" class="video-iframe"></iframe></div>');
	}
	else{
		$('.tv-container').removeClass('show');
		$("#" + name).remove();
	}	
});
function openTV(){
	
}

	
</script> 
<script>
   var iframe_score_url='<?php echo $iframe_score_url ?>';
    var SKIP_FANCY_EVENTID = ('<?php echo SKIP_FANCY; ?>').split(',');
    
    $('.nav-tabs').on('click','a',function (){
        $('.nav-tabs a').removeClass('active');
        $('.fancy-message').show();
        $(this).addClass('active');
        var tab = $(this).attr('href');
        $('.fancy-tab .tab-pane').removeClass('active');
        $(tab).find('.fancy-message').hide();
        $(tab).addClass('active');
        return false;
    });
var html_fancy_market_new="";
var html_fancy_market_new1="";
var html_ball_market_new="";
var html_khado_market_new="";
var html_meter_market_new="";
var html_oddeven_market_new="";
var one_size_1 = 0;
var one_size_2 = 0;
var one_size_3=0;
var lay_one_size_1 = 0;
var lay_one_size_2 = 0;
var lay_one_size_3 = 0;
var runnerName;
var marketName;
var runsNo ="";
var runsYes ="";
var oddsNo="";
var oddsYes="";
var runRate="";
var class_add_yes_change="";
var class_add_no_change="";
var marketIdArray = [];
var marketIdArrayNew = [];

var marketIdArrayOver = [];
var marketIdArrayOverNew = [];

var selectorIdArray = [];
var selectorIdBookmakerArray = [];

var marketIdArrayFancy1 = [];
var marketIdArrayNewFancy1 = [];

var marketIdArrayKhado = [];
var marketIdArrayNewKhado = [];

var marketIdArrayOddeven = [];
var marketIdArrayNewOddeven = [];

var marketIdArrayBall = [];
var marketIdArrayNewBall = [];

var marketIdArrayMeter = [];
var marketIdArrayNewMeter = [];

var bookmaker1_back_rate="";
var bookmaker1_back_size="";
var bookmaker1_lay_rate="";
var bookmaker1_lay_size="";

var bookmaker1_back_2_rate="";
var bookmaker1_back_2_size="";
var bookmaker1_lay_2_rate="";
var bookmaker1_lay_2_size="";


var bookmaker1_back_3_rate="";
var bookmaker1_back_3_size="";
var bookmaker1_lay_3_rate="";
var bookmaker1_lay_3_size="";


var html_bookmaker_odds= "";
var oddsmarketId = <?php echo $marketId; ?>;
var eventId = <?php echo $event_id; ?>;
var eventIdOpenbet = <?php echo $event_id; ?>;
var site_url = '<?php echo WEB_URL; ?>';
var socket = io("<?php echo SPORTS_SOCKET; ?>");

function kFormatter(num) {
    return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + ' K' : Math.sign(num)*Math.abs(num)
}
    
socket.on('connect', function() {
    socket.emit('getOddData', {
        eventId: '<?php echo $marketId; ?>'
    });
    socket.emit('getMatches', {
        eventType: '<?php echo $eventType; ?>'
    });
});

function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + '' + ampm;
  return strTime;
}

socket.on('eventGetLiveEventName', function (data) {
    if (data) {
        if (data.sport) {
            if (data.sport.body) {

                var result = Object.keys(data.sport.body).length;
                if (result > 0) {
                    var main_datas = data;

                    data = main_datas.sport;

                    for (var i in data.body) {

                        if (data.body[i]) {

                            var _event_id = data.body[i].matchid.toString();

                            if ('<?php echo $event_id; ?>' == _event_id) {
                                
                                var matchNameArr = data.body[i].matchName.split('/');
                                $('.event_name_heading').text(matchNameArr[0].trim());
                                $(".event_name_heading").attr("event_name", matchNameArr[0].trim());
                                
                                var matchdate = data.body[i].matchdate;
                                var matchdate_ = (matchdate).toString();
                                var date_string = '';
                                if(matchdate_.search("(IST)") > 0 ){
									matchdate = (matchdate.replace(/\s\s+/g, ' ').replace(' (IST)', '')).trim();
									var matchdateArr = matchdate.split(' ');
									var _matchdate = matchdateArr[0] +' '+ matchdateArr[1] +' '+ matchdateArr[2];
									var _matchtime = matchdateArr[3];
									var _date = new Date(_matchdate);
									date_string = (_date.getMonth()+1) + '/' + _date.getDate() + '/' + _date.getFullYear() + ' ' + _matchtime;
								}
								else{
									var _date = new Date(matchdate);
									var _matchtime = formatAMPM(_date);
									date_string = (_date.getMonth()+1) + '/' + _date.getDate() + '/' + _date.getFullYear() + ' '+ _matchtime;
								}
                                
                                
                                $('#matchdate').text(date_string);
                                
                                var inPlay = data.body[i].inPlay;
								if(inPlay == "False" || inPlay == false || inPlay == "false"){
									$("#tvvv").hide();
								}
								else{
									$("#tvvv").show();
								}
                            }
                        }
                    }
                }
            }
        }
    }

});

var ix = 0;
socket.on('eventGetLiveEventFancyData', function(args) {
    if(args.body == undefined){
        //window.location.href = "/index";
    }
    else{
        if(args.body.data){
			if(args.body.data[0]){
				matchdate = args.body.data[0].matchdate;
				$("#matchdate").html(matchdate);
				eventName = args.body.data[0].matchName;
				eventName2 = args.body.data[0].matchName;
				oddsmarketId = args.body.data[0].marketid;
				eventId = args.body.data[0].matchid;
				marketId = args.body.data[0].marketid;
				oldGameId = args.body.data[0].oldGameId;
				
				GAME_ID = oldGameId;
				
				if(iframe_score_url != ""){
					 $("#scoreboard-box").html('<iframe id="iframe-tracker-1" width="100%" height="230px" src="'+iframe_score_url+'" style="overflow: hidden; border: 0px; height: 230px;" class="visible"></iframe>');
				}
				else
				{
					scoreboardConnect();
				}
				var inPlay = 1;
				html_match_odds = "";
				html_match_odds +="";
				match_odds_lay_place_status = "";
				for(k=0;k<args.body.data.length;k++){
					market_type_name = args.body.data[k].market_name;
					market_market_id = args.body.data[k].marketid;
					market_odd_name = market_type_name;
					html_match_odds +="<div class='market-title mt-1'> "+market_type_name+" <a href='javascript:void(0)' class='m-r-5 game-rules-icon' data-toggle='modal' data-target='#view_match_rules'><span><i class='fa fa-info-circle float-right'></i></span></a> <span class='float-right m-r-10'>Maximum Bet <span id='match_odds_max_bet_"+k+"'>1</span></span></div><div class='table-header'><div class='float-left country-name box-4 min-max'><b></b></div><div class='box-1 float-left'></div><div class='box-1 float-left'></div><div class='back box-1 float-left text-center'><b>BACK</b></div><div class='lay box-1 float-left text-center'><b>LAY</b></div><div class='box-1 float-left'></div><div class='box-1 float-left'></div></div><div data-title='OPEN' class='table-body'>";
					if(market_type_name == "Match Odds"){
							marketType = "MATCH_ODDS";
					}
					else if(market_type_name == "Tied Match"){
							marketType = "TIE_ODDS";
					}
					else if(market_type_name == "To Win the Toss"){
							marketType = "TOSS_ODDS";
					}
					else{
						if(market_type_name){
						market_type_name = market_type_name.replace(".","_");
						market_type_name = market_type_name.replace(" ","_");
						market_type_name = market_type_name.replace("/","_");
						market_type_name = market_type_name.replace(" ","_");
						marketType = market_type_name;
						}
						marketType = market_type_name.toUpperCase();
					}
					market_type_name2 = marketType.toUpperCase();;
					market_marketid = market_type_name2;
					
					args.body.data[k].status;
					if(args.body.data[k].runners){
						for(j=0;j<args.body.data[k].runners.length;j++){
							var selectionId = args.body.data[k].runners[j].id;
							selectorIdArray.push(selectionId);
							runnerName = args.body.data[k].runners[j].name;
							marketName = args.body.data[k].runners[j].name;
							var bet_suspended = args.body.data[k].runners[j].status;
							if(market_type_name == "Match Odds"){
									marketType = "MATCH_ODDS";
							}
							else if(market_type_name == "Tied Match"){
									marketType = "TIE_ODDS";
							}
							else if(market_type_name == "To Win the Toss"){
									marketType = "TOSS_ODDS";
							}
							else{
								if(market_type_name){
									market_type_name = market_type_name.replace(".","_");
									market_type_name = market_type_name.replace(" ","_");
									market_type_name = market_type_name.replace("/","_");
									market_type_name = market_type_name.replace(" ","_");
									marketType = market_type_name.toUpperCase();;
								}
								marketType = market_type_name.toUpperCase();
							}

							if(args.body.data[k].runners[j].back[2]){
									one_price_1 = args.body.data[k].runners[j].back[2].price || "";
									one_size_1 = args.body.data[k].runners[j].back[2].size || "";
							}
							else{
									one_price_1 = "";
									one_size_1 = "";
							}
							if(args.body.data[k].runners[j].back[1]){
									one_price_2 = args.body.data[k].runners[j].back[1].price || "";
									one_size_2 = args.body.data[k].runners[j].back[1].size || "";
							}
							else{
									one_price_2 = "";
									one_size_2 = "";
							}
							if(args.body.data[k].runners[j].back[0]){
									one_price_3 = args.body.data[k].runners[j].back[0].price || "";
									one_size_3 = args.body.data[k].runners[j].back[0].size || "";
							}
							else{
									one_price_3 = "";
									one_size_3 = "";
							}
							if(args.body.data[k].runners[j].lay[0]){
									lay_one_price_1  = args.body.data[k].runners[j].lay[0].price || "";
									lay_one_size_1  = args.body.data[k].runners[j].lay[0].size|| "";
							}
							else{
									lay_one_size_1 = "";
									lay_one_price_1 = "";
							}
							if(args.body.data[k].runners[j].lay[1]){
									lay_one_price_2  = args.body.data[k].runners[j].lay[1].price || "";
									lay_one_size_2  = args.body.data[k].runners[j].lay[1].size || "";
							}
							else{
									lay_one_size_2 = "";
									lay_one_price_2 = "";
							}
							if(args.body.data[k].runners[j].lay[2]){
									lay_one_price_3  = args.body.data[k].runners[j].lay[2].price || "";
									lay_one_size_3 = args.body.data[k].runners[j].lay[2].size || "";
							}
							else{
									lay_one_price_3 = "";
									lay_one_size_3 = "";
							}
							if(one_size_1 == 0 && one_size_2 == 0 && one_size_3 == 0 && lay_one_size_1==0 && lay_one_size_2 == 0 && lay_one_size_3 == 0){
							//	window.location.href = "/index";
							}
						
							var is_suspended = '';
							if(bet_suspended != "ACTIVE" && bet_suspended != "OPEN"){
								is_suspended = 'suspended';
							}

							html_match_odds +="<div data-title='"+bet_suspended+"' class='table-row "+is_suspended+"' id='fullSelection_"+selectionId+"_"+market_marketid+"'  eventtype='4' eventid='"+eventId+"' marketid='"+market_market_id+"' selectionid='"+selectionId+"' eventname='"+runnerName+"' status='"+status+"'><div class='float-left country-name box-4'><span class='team-name'><b>"+runnerName+"</b></span><p><span class='float-left' style='color: black;' id='live_match_points_"+selectionId+"_"+market_marketid+"'>0</span> <span class='float-right' style='display: none; color: black;'>0</span></p></div>"+
												"<div id='back_3_"+selectionId+"_"+market_marketid+"' class='box-1 back2 float-left  text-center' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+one_price_1+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"' ><span class='odd d-block'>"+one_price_1+"</span> <span class='d-block'>"+one_size_1+"</span></div><div class='box-1 back1 float-left  text-center' id='back_2_"+selectionId+"_"+market_marketid+"' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+one_price_2+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><span class='odd d-block'>"+one_price_2+"</span> <span class='d-block'>"+one_size_2+"</span></div><div class='box-1 back float-left back back-1 lock text-center'  id='back_1_"+selectionId+"_"+market_marketid+"' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+one_price_3+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><span class='odd d-block'>"+one_price_3+"</span> <span class='d-block'>"+one_size_3+"</span></div>"+
												"<div class='box-1 lay-1 lay float-left text-center' id='lay_1_"+selectionId+"_"+market_marketid+"' side='Lay' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+lay_one_price_1+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><span class='odd d-block'>"+lay_one_price_1+"</span> <span class='d-block'>"+lay_one_size_1+"</span></div><div class='box-1 lay1 float-left text-center' id='lay_2_"+selectionId+"_"+market_marketid+"' side='Lay' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+lay_one_price_2+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><span class='odd d-block'>"+lay_one_price_2+"</span> <span class='d-block'>"+lay_one_size_2+"</span></div><div class='box-1 lay2 float-left text-center' id='lay_3_"+selectionId+"_"+market_marketid+"'><span class='odd d-block' side='Lay' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+lay_one_price_3+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'>"+lay_one_price_3+"</span> <span class='d-block'>"+lay_one_size_3+"</span></div>"+
												"</div>";
						}
					}
					html_match_odds += "</div>";
				}
				html_match_odds +="";
				
				$(".event_name_heading").attr("eventid", eventId);
				$(".event_name_heading").attr("marketid", oddsmarketId);
				$("#match_odds_all_full_markets").html(html_match_odds);
			}
        }
        if(args.body1){
       		if(args.body1.body){
                if(args.body1.body.cricket){
                	if(args.body1.body.cricket[0]){
            			if(args.body1.body.cricket[0][0]){
            				args.body1.body.cricket[0] = args.body1.body.cricket[0][0];
            			}
						bookmaker_remarks = "";
						html_bookmaker_odds = "";
						eventName = $(".event_name_heading").attr("event_name");
						if(args.body1.body.cricket[0].bookmaker && args.body1.body.cricket[0].bookmaker != null){
							z = 0;
							if(args.body1.body.cricket[0].bookmaker){
							var bookmaker1_data = args.body1.body.cricket[0].bookmaker;
							bookmaker_remarks =  args.body1.body.cricket[0].remark;
							for(var b in bookmaker1_data){
								marketType = "BOOKMAKER_ODDS";
								selectionId = bookmaker1_data[b].selectionId
								selectorIdBookmakerArray.push(selectionId);
								runnerName = bookmaker1_data[b].name;
								book_status = bookmaker1_data[b].status;
								
								/* $("#bookmaker_min").html(bookmaker1_data[b].min);
								$("#bookmaker_max").html(bookmaker1_data[b].max); */
								/* $("#bookmaker_min").html('<?php echo $bookmaker_min;?>');
                                 $("#bookmaker_max").html('<?php echo $bookmaker_max;?>'); */
											
								marketName = runnerName;
								var bet_suspended="";
								if(bookmaker1_data[b]['back'][0].price){
										bookmaker1_back_rate = bookmaker1_data[b]['back'][0].price || "";
								}
								else{
										bookmaker1_back_rate = "";
								}
								if(bookmaker1_data[b]['back'][0].size){
										bookmaker1_back_size = bookmaker1_data[b]['back'][0].size || "";
								}
								else{
										bookmaker1_back_size = "";
								}
								if(bookmaker1_data[b]['back'][1].price){
										bookmaker1_back_2_rate = bookmaker1_data[b]['back'][1].price || "";
								}
								else{
										bookmaker1_back_2_rate = "";
								}

								if(bookmaker1_data[b]['back'][1].size){
										bookmaker1_back_2_size = bookmaker1_data[b]['back'][1].size || "";
								}
								else{
										bookmaker1_back_2_size = "";
								}

								if(bookmaker1_data[b]['back'][2].price){
										bookmaker1_back_3_rate = bookmaker1_data[b]['back'][2].price || "";
								}else{
										bookmaker1_back_3_rate = "";
								}

								if(bookmaker1_data[b]['back'][2].size){
										bookmaker1_back_3_size = bookmaker1_data[b]['back'][2].size || "";
								}else{
										bookmaker1_back_3_size = "";
								}

								if(bookmaker1_data[b]['lay'][0].price){
										bookmaker1_lay_rate = bookmaker1_data[b]['lay'][0].price || "";
								}else{
										bookmaker1_lay_rate = "";
								}


								if(bookmaker1_data[b]['lay'][0].size){
										bookmaker1_lay_size = bookmaker1_data[b]['lay'][0].size || "";
								}else{
										bookmaker1_lay_size = "";
								}

								if(bookmaker1_data[b]['lay'][1].price){
										bookmaker1_lay_2_rate = bookmaker1_data[b]['lay'][1].price || "";
								}else{
										bookmaker1_lay_2_rate = "";
								}


								if(bookmaker1_data[b]['lay'][1].size){
										bookmaker1_lay_2_size = bookmaker1_data[b]['lay'][1].size || "";
								}else{
										bookmaker1_lay_2_size = "";
								}

								if(bookmaker1_data[b]['lay'][2].price){
										bookmaker1_lay_3_rate = bookmaker1_data[b]['lay'][2].price || "";
								}else{
										bookmaker1_lay_3_rate = "";
								}


								if(bookmaker1_data[b]['lay'][2].size){
										bookmaker1_lay_3_size = bookmaker1_data[b]['lay'][2].size || "";
								}else{
										bookmaker1_lay_3_size = "";
								}

								bookmaker_suspended = "";
								if(book_status != "ACTIVE"){
										bookmaker_suspended = "suspended";
								}
								
								var temp_selectionId;
								temp_selectionId = runnerName.split(" ").join('_');

								html_bookmaker_odds += "<div data-title='"+book_status+"' class='table-row "+bookmaker_suspended+"' id='bookmaker_row_"+temp_selectionId+"'><div class='float-left country-name box-4'><span class='team-name'><b>"+runnerName+"</b></span><p><span class='float-left' style='color: black;' id='live_match_points_"+selectionId+"_BOOKMAKER_ODDS'>0</span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div class='box-1 back2 float-left text-center betting-disabled' id='back_3_"+temp_selectionId+"_BOOKMAKER_ODDS' ><span class='odd d-block'>"+bookmaker1_back_3_rate+"</span> <span class='d-block'>"+bookmaker1_back_3_size+"</span></div><div class='box-1 back1 float-left back-2 text-center betting-disabled' id='back_2_"+temp_selectionId+"_BOOKMAKER_ODDS' ><span class='odd d-block'>"+bookmaker1_back_2_rate+"</span> <span class='d-block'>"+bookmaker1_back_2_size+"</span></div><div class='box-1 back back-1 float-left back lock text-center'  id='back_1_"+temp_selectionId+"_BOOKMAKER_ODDS' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_back_rate+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKER_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='1'><span class='odd d-block'>"+bookmaker1_back_rate+"</span> <span class='d-block'>"+bookmaker1_back_size+"</span></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_"+temp_selectionId+"_BOOKMAKER_ODDS' side='Lay'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_lay_rate+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKER_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='1'><span class='odd d-block'>"+bookmaker1_lay_rate+"</span> <span class='d-block'>"+bookmaker1_lay_size+"</span></div><div class='box-1 lay1 float-left text-center betting-disabled' id='lay_2_"+temp_selectionId+"_BOOKMAKER_ODDS' ><span class='odd d-block'>"+bookmaker1_lay_2_rate+"</span> <span class='d-block'>"+bookmaker1_lay_2_size+"</span></div><div class='box-1 lay2 float-left text-center betting-disabled' id='lay_3_"+temp_selectionId+"_BOOKMAKER_ODDS' ><span class='odd d-block'>"+bookmaker1_lay_3_rate+"</span> <span class='d-block'>"+bookmaker1_lay_3_size+"</span></div></div>";


							}
						}
						if(html_bookmaker_odds != ""){
								$("#bookmaker_market_div").show();
								$("#match_odds_bookmaker_market").html(html_bookmaker_odds);
								$("#bookmaker-remakrs").html(bookmaker_remarks);
						}
					}
					}
            	}
        	}					
    	}
    	
    	if(args.body1){
			if(args.body1.body){
				if(args.body1.body.bm1){
					
					if(args.body1.body.bm1[0]){
						
						bookmaker_remarks = "";
						html_bookmaker_odds = "";
						eventName = $(".event_name_heading").attr("event_name");
						
						var bm_small1 = args.body1.body.bm1[0];

						if(bm_small1.value && bm_small1.value != null){
							if(bm_small1.value.session && bm_small1.value.session != null){
								bm_small1_datas = bm_small1.value.session;
							
								html_bookmaker_odds = "";
								for(z=0;z < bm_small1_datas.length;z++){

									if(bm_small1_datas[z] && bm_small1_datas[z]){

										var bookmaker1_data = bm_small1_datas[z];

										runnerName = bookmaker1_data['RunnerName'];
										book_status = bookmaker1_data['GameStatus'];
										selectionId = bookmaker1_data['SelectionId'];

										marketType = "BOOKMAKERSMALL_ODDS";
										selectorIdBookmakerArray.push(selectionId);

										marketName = runnerName;
										var bet_suspended="";

										if(bookmaker1_data.BackPrice1){
											bookmaker1_back_rate = bookmaker1_data.BackPrice1 || "";
										}else{
											bookmaker1_back_rate = "";
										}

										if(bookmaker1_data.BackSize1){
											bookmaker1_back_size = bookmaker1_data.BackSize1 || 0;
										}else{
											bookmaker1_back_size = 0;
										}
										bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size)/1000) + "K" : bookmaker1_back_size;

										if(bookmaker1_data.BackPrice2){
											bookmaker1_back_2_rate = bookmaker1_data.BackPrice2 || "";
										}else{
											bookmaker1_back_2_rate = "";
										}

										if(bookmaker1_data.BackSize2){
											bookmaker1_back_2_size = bookmaker1_data.BackSize2 || 0;
										}else{
											bookmaker1_back_2_size = 0;
										}
										bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size)/1000) + "K" : bookmaker1_back_2_size;

										if(bookmaker1_data.BackPrice3){
											bookmaker1_back_3_rate = bookmaker1_data.BackPrice3 || "";
										}else{
											bookmaker1_back_3_rate = "";
										}

										if(bookmaker1_data.BackSize3){
											bookmaker1_back_3_size = bookmaker1_data.BackSize3 || 0;
										}else{
											bookmaker1_back_3_size = 0;
										}
										bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size)/1000) + "K" : bookmaker1_back_3_size;


										if(bookmaker1_data.LayPrice1){
											bookmaker1_lay_rate = bookmaker1_data.LayPrice1 || "";
										}else{
											bookmaker1_lay_rate = "";
										}

										if(bookmaker1_data.LaySize1){
											bookmaker1_lay_size = bookmaker1_data.LaySize1 || 0;
										}else{
											bookmaker1_lay_size = 0;
										}
										bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size)/1000) + "K" : bookmaker1_lay_size;									

										if(bookmaker1_data.LayPrice2){
											bookmaker1_lay_2_rate = bookmaker1_data.LayPrice2 || "";
										}else{
											bookmaker1_lay_2_rate = "";
										}
										if(bookmaker1_data.LaySize2){
											bookmaker1_lay_2_size = bookmaker1_data.LaySize2 || 0;
										}else{
											bookmaker1_lay_2_size = 0;
										}
										bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size)/1000) + "K" : bookmaker1_lay_2_size;


										if(bookmaker1_data.LayPrice3){
											bookmaker1_lay_3_rate = bookmaker1_data.LayPrice3 || "";
										}else{
											bookmaker1_lay_3_rate = "";
										}
										if(bookmaker1_data.LaySize3){
											bookmaker1_lay_3_size = bookmaker1_data.LaySize3 || 0;
										}else{
											bookmaker1_lay_3_size = 0;
										}
										bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size)/1000) + "K" : bookmaker1_lay_3_size;

										bookmaker_suspended = "";
										if(book_status != "ACTIVE"){
											bookmaker_suspended = "suspended";
										}
										var temp_selectionId;
										temp_selectionId = runnerName.split(" ").join('_');
										
										temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");

										html_bookmaker_odds += "<div data-title='"+book_status+"' class='table-row "+bookmaker_suspended+"' id='bookmakersmall_row_"+temp_selectionId+"'><div class='float-left country-name box-6'><span class='team-name'><b>"+runnerName+"</b></span><p><span class='float-left' style='color: black;' id='live_match_points_"+selectionId+"_BOOKMAKERSMALL_ODDS'>0</span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div class='box-2 back back-1 float-left back lock text-center' id='back_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS' side='Back' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_back_rate+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"' inplay='1'><button><span class='odd d-block'>"+bookmaker1_back_rate+"</span> <span class='d-block'>"+bookmaker1_back_size+"</span></button></div><div class='box-2 lay lay-1 float-left text-center' id='lay_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS' side='Lay' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_lay_rate+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"' inplay='1'><span class='odd d-block'>"+bookmaker1_lay_rate+"</span> <span class='d-block'>"+bookmaker1_lay_size+"</span></div></div>";
									}

								}

								if(html_bookmaker_odds != "" && bm_small1_datas.length > 0){
									$('#bm1-head').removeClass('col-xl-8').removeClass('col-xl-12');
									$('#bm1-head').addClass('col-xl-8');
									$("#bm2-head").css('display','block');
									$("#bookmakersmall1_market_div_secure").html(html_bookmaker_odds);
								}
							
							
							
							}

							
						}
					}
				}
			}
		}
	}
});
var xi= 0;
socket.on('eventGetLiveEventsFancyData', function(args) {
    if(args && args.body){
		if(args.body.cricket){
			if(args.body.cricket[0]){
				if(!args.body.cricket[0][0]){
					var xdc = args.body.cricket;
					args.body.cricket = [];
					args.body.cricket[0] = xdc;
				}
				var oddsmarketId = args.body.cricket[0][0].marketid;
				var eventId=args.body.cricket[0][0].matchid;
				var marketId ="";
				var marketName ="";
				var eventName2 ="";
				var runsNo ="";
				var runsYes ="";
				var oddsNo="";
				var oddsYes="";
				var one_click_back_bet_status ="";
				var one_click_lay_bet_status="";
				var class_add_yes_change="";
				var class_add_no_change="";
				var statusLabel ="";
				var status ="";
				var max_bet = 1;
				
				for(k=0;k<args.body.cricket[0].length;k++){
					
					
					mId = args.body.cricket[0][k].marketId;
					max_bet = args.body.cricket[0][k].maxBet;
					bookmaker_min = args.body.cricket[0][k].min;
					bookmaker_max = args.body.cricket[0][k].max;
					<?php 
					if($eventType == 4){
					?>
					$('#match_odds_max_bet_'+k).text(max_bet);
				$("#bookmaker_min").html(bookmaker_min);
				$("#bookmaker_max").html(bookmaker_max);
<?php					
					}
					else{
					?>
					if(args.body.cricket[0][0].inplay){
					//max_bet = '<?php echo $match_max;?>';
				}
				if('<?php echo ($event_id == ELECTION_EVENT_ID)?"TRUE":"FALSE";?>' == "TRUE" ){
					max_bet = '<?php echo ELECTION_MAX;?>';
				}
				$('#match_odds_max_bet_' + k).text(max_bet);
				$("#bookmaker_min").html('<?php echo $bookmaker_min;?>');
				$("#bookmaker_max").html('<?php echo $bookmaker_max;?>');
					<?php
					}
					?>
					market_type_name = args.body.cricket[0][k].marketName;
					if(market_type_name == "Match Odds"){
						marketType = "MATCH_ODDS";
					}
					else if(market_type_name == "Tied Match"){
						marketType = "TIE_ODDS";
					}
					else if(market_type_name == "To Win the Toss"){
						marketType = "TOSS_ODDS";
					}
					else{
						if(market_type_name){
							market_type_name = market_type_name.replace(".","_");
							market_type_name = market_type_name.replace(" ","_");
							market_type_name = market_type_name.replace("/","_");
							market_type_name = market_type_name.replace(" ","_");
							marketType = market_type_name.toUpperCase();
						}
						marketType = market_type_name.toUpperCase();;
					}
					market_type_name2 = marketType.toUpperCase();;
					market_marketid = market_type_name2;
					if(market_marketid){
						market_marketid = market_marketid.replace(".","_");
					}
					if(args.body.cricket[0][k].runners){
						
						for(j=0;j<args.body.cricket[0][k].runners.length;j++){
							var selectionId = args.body.cricket[0][k].runners[j].id;
							runnerName = args.body.cricket[0][k].runners[j].name;
							marketName = args.body.cricket[0][k].runners[j].name;
							var bet_suspended = args.body.cricket[0][k].runners[j].status;
							if(args.body.cricket[0][k].runners[j].back[2]){
								one_price_1 = args.body.cricket[0][k].runners[j].back[2].price;
								if(!one_price_1){
										one_price_1 = "";
								}
								one_size_1 = args.body.cricket[0][k].runners[j].back[2].size || 0;
							}
							else{
								one_price_1 = "";
								one_size_1 = 0;
							}
							if(args.body.cricket[0][k].runners[j].back[1]){
								one_price_2 = args.body.cricket[0][k].runners[j].back[1].price;
								if(!one_price_2){
									one_price_2 = "";
								}
								one_size_2 = args.body.cricket[0][k].runners[j].back[1].size || 0;
							}
							else{
								one_price_2 = "";
								one_size_2 = 0;
							}
							if(args.body.cricket[0][k].runners[j].back[0]){
								one_price_3 = args.body.cricket[0][k].runners[j].back[0].price;
								if(!one_price_3){
									one_price_3 = "";
								}
								one_size_3 = args.body.cricket[0][k].runners[j].back[0].size || 0;
							}
							else{
								one_price_3 = "";
								one_size_3 = 0;
							}
							if(args.body.cricket[0][k].runners[j].lay[0]){
								lay_one_price_1  = args.body.cricket[0][k].runners[j].lay[0].price;
								if(!lay_one_price_1){
									lay_one_price_1 = "";
								}
								lay_one_size_1  = args.body.cricket[0][k].runners[j].lay[0].size|| 0;
							}
							else{
								lay_one_size_1 = 0;
								lay_one_price_1 = "";
							}
							if(args.body.cricket[0][k].runners[j].lay[1]){
								lay_one_price_2  = args.body.cricket[0][k].runners[j].lay[1].price;
								if(!lay_one_price_2){
									lay_one_price_2 = "";
								}
								lay_one_size_2  = args.body.cricket[0][k].runners[j].lay[1].size || 0;
							}
							else{
								lay_one_size_2 = 0;
								lay_one_price_2 = "";
							}
							if(args.body.cricket[0][k].runners[j].lay[2]){
								lay_one_price_3  = args.body.cricket[0][k].runners[j].lay[2].price;
								if(!lay_one_price_3){
									lay_one_price_3 = "";
								}
								lay_one_size_3 = args.body.cricket[0][k].runners[j].lay[2].size || 0;
							}
							else{
								lay_one_price_3 = "";
								lay_one_size_3 = 0;
							}
							one_size_1 = parseInt(one_size_1);
							if(parseInt(one_size_1)){
								one_size_1 = one_size_1.toFixed(2);
							}
							else{
								one_size_1 = 0;
							}
							if(one_size_1 > 10000){
								one_size_1 = one_size_1 /10000;
							}
							one_size_2 = parseInt(one_size_2);
							if(one_size_2){
								one_size_2 = one_size_2.toFixed(2);
							}
							else{
								one_size_2 = 0;
							}
							if(one_size_2 > 10000){
								one_size_2 = one_size_2 /10000;
							}
							one_size_3 = parseInt(one_size_3);
							if(one_size_3){
							}
							else{
								one_size_3 = 0;
							}
							one_size_3 = one_size_3.toFixed(2);
							if(one_size_3 > 10000){
								one_size_3 = one_size_3 /10000;
							}
							lay_one_size_1 = parseInt(lay_one_size_1);
							if(lay_one_size_1){
							}
							else{
								lay_one_size_1 = 0;
							}
							lay_one_size_1 = lay_one_size_1.toFixed(2);
							if(lay_one_size_1 > 10000){
								lay_one_size_1 = lay_one_size_1 /10000;
							}
							lay_one_size_2 = parseInt(lay_one_size_2);
							if(lay_one_size_2){
							}
							else{
								lay_one_size_2 = 0;
							}
							lay_one_size_2 = lay_one_size_2.toFixed(2);
							if(lay_one_size_2 > 10000){
								lay_one_size_2 = lay_one_size_2 /10000;
							}
							lay_one_size_3 = parseInt(lay_one_size_3);
							if(lay_one_size_3){
							}
							else{
								lay_one_size_3 = 0;
							}
							lay_one_size_3 = lay_one_size_3.toFixed(2);
							if(lay_one_size_3 > 10000){
								lay_one_size_3 = lay_one_size_3 /10000;
							}
							one_size_1 = parseFloat(one_size_1);
							one_size_2 = parseFloat(one_size_2);
							one_size_3 = parseFloat(one_size_3);
							lay_one_size_1 = parseFloat(lay_one_size_1);
							lay_one_size_2 = parseFloat(lay_one_size_2);
							lay_one_size_3 = parseFloat(lay_one_size_3);
							one_size_1 = one_size_1.toFixed(2);
							one_size_2 = one_size_2.toFixed(2);
							one_size_3 = one_size_3.toFixed(2);
							lay_one_size_1 = lay_one_size_1.toFixed(2);
							lay_one_size_2 = lay_one_size_2.toFixed(2);
							lay_one_size_3 = lay_one_size_3.toFixed(2);					
							if($("#back_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != one_price_1){
								$("#back_3_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
								var back_3_blink_id = $("#back_3_"+selectionId+"_"+market_marketid);
								setTimeout(function (){
									$(this).removeClass('rate_change_link');
								}.bind(back_3_blink_id),300);
							}					
							if($("#back_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != one_price_2){
								$("#back_2_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
								var back_2_blink_id = $("#back_2_"+selectionId+"_"+market_marketid);
								setTimeout(function (){
									$(this).removeClass('rate_change_link');
								}.bind(back_2_blink_id),300);
							}						
							if($("#lay_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != lay_one_price_2){
								$("#lay_2_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
								var lay_2_blink_id = $("#lay_2_"+selectionId+"_"+market_marketid);
								setTimeout(function (){
									$(this).removeClass('rate_change_link');
								}.bind(lay_2_blink_id),300);
							}					
							if($("#lay_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != lay_one_price_3){
								$("#lay_3_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
								var lay_3_blink_id = $("#lay_3_"+selectionId+"_"+market_marketid);
								setTimeout(function (){
									$(this).removeClass('rate_change_link');
								}.bind(lay_3_blink_id),300); 
							}											
							$("#back_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds",one_price_1);
							$("#back_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds",one_price_2);
							$("#back_1_"+selectionId+"_"+market_marketid).attr("fullmarketodds",one_price_3);
							back_1_html = "<span class='odd d-block'>"+one_price_1+"</span> <span class='d-block'>"+one_size_1+"</span>";
							back_2_html = "<span class='odd d-block'>"+one_price_2+"</span> <span class='d-block'>"+one_size_2+"</span>";
							back_3_html = "<span class='odd d-block'>"+one_price_3+"</span> <span class='d-block'>"+one_size_3+"</span>";
							$("#back_1_"+selectionId+"_"+market_marketid).html(back_3_html);
							$("#back_2_"+selectionId+"_"+market_marketid).html(back_2_html);
							$("#back_3_"+selectionId+"_"+market_marketid).html(back_1_html);
							$('#fullSelection_'+selectionId+'_'+market_marketid).attr("title",bet_suspended);
							$('#fullSelection_'+selectionId+'_'+market_marketid).attr("data-title",bet_suspended);
							if(bet_suspended != "ACTIVE" && bet_suspended != "OPEN"){
								$('#fullSelection_'+selectionId+'_'+market_marketid).addClass("suspended");
							}
							else{
								$('#fullSelection_'+selectionId+'_'+market_marketid).removeClass("suspended");
							}
							lay_1_html = "<span class='odd d-block'>"+lay_one_price_1+"</span> <span class='d-block'>"+lay_one_size_1+"</span>";
							lay_2_html = "<span class='odd d-block'>"+lay_one_price_2+"</span> <span class='d-block'>"+lay_one_size_2+"</span>";
							lay_3_html = "<span class='odd d-block'>"+lay_one_price_3+"</span> <span class='d-block'>"+lay_one_size_3+"</span>";
							$("#lay_1_"+selectionId+"_"+market_marketid).html(lay_1_html);
							$("#lay_2_"+selectionId+"_"+market_marketid).html(lay_2_html);
							$("#lay_3_"+selectionId+"_"+market_marketid).html(lay_3_html);
							$("#lay_1_"+selectionId+"_"+market_marketid).attr("fullmarketodds",lay_one_price_1);
							$("#lay_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds",lay_one_price_2);
							$("#lay_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds",lay_one_price_3);
						}
					}
					if (args.body.cricket[0][k].bookmaker && args.body.cricket[0][k].bookmaker != null) {
						for (z = 0; z < args.body.cricket[0][k].bookmaker.length; z++) {
							var bookmaker1_data = args.body.cricket[0][k].bookmaker;
							for (var b in bookmaker1_data) {
								
								
								marketType = "BOOKMAKER_ODDS";
								selectionId = bookmaker1_data[b].selectionId
								selectorIdBookmakerArray.push(selectionId);
								runnerName = bookmaker1_data[b].name;
								book_status = bookmaker1_data[b].status;
								bookmaker_remarks = bookmaker1_data[b].remark;
								/* $("#bookmaker_min").html('<?php echo $bookmaker_min;?>');
								$("#bookmaker_max").html('<?php echo $bookmaker_max;?>'); */
								var temp_selectionId;
								temp_selectionId = runnerName.split(" ").join('_');
								marketName = runnerName;
								var bet_suspended = "";
								if (bookmaker1_data[b]['back'][0].price) {
									bookmaker1_back_rate = bookmaker1_data[b]['back'][0].price || "";
								}
								else {
									bookmaker1_back_rate = "";
								}
								if (bookmaker1_data[b]['back'][0].size) {
									bookmaker1_back_size = bookmaker1_data[b]['back'][0].size || "";
								}
								else {
									bookmaker1_back_size = "";
								}
								bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size) / 1000) + "K" : bookmaker1_back_size;
								if (bookmaker1_data[b]['back'][1].price) {
									bookmaker1_back_2_rate = bookmaker1_data[b]['back'][1].price || "";
								}
								else {
									bookmaker1_back_2_rate = "";
								}
								if (bookmaker1_data[b]['back'][1].size) {
									bookmaker1_back_2_size = bookmaker1_data[b]['back'][1].size || "";
								}
								else {
									bookmaker1_back_2_size = "";
								}
								bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size) / 1000) + "K" : bookmaker1_back_2_size;
								if (bookmaker1_data[b]['back'][2].price) {
									bookmaker1_back_3_rate = bookmaker1_data[b]['back'][2].price || "";
								}
								else {
									bookmaker1_back_3_rate = "";
								}
								if (bookmaker1_data[b]['back'][2].size) {
									bookmaker1_back_3_size = bookmaker1_data[b]['back'][2].size || "";
								}
								else {
									bookmaker1_back_3_size = "";
								}
								bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size) / 1000) + "K" : bookmaker1_back_3_size;
								if (bookmaker1_data[b]['lay'][0].price) {
									bookmaker1_lay_rate = bookmaker1_data[b]['lay'][0].price || "";
								}
								else {
									bookmaker1_lay_rate = "";
								}
								if (bookmaker1_data[b]['lay'][0].size) {
									bookmaker1_lay_size = bookmaker1_data[b]['lay'][0].size || "";
								}
								else {
									bookmaker1_lay_size = "";
								}
								bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size) / 1000) + "K" : bookmaker1_lay_size;
								if (bookmaker1_data[b]['lay'][1].price) {
									bookmaker1_lay_2_rate = bookmaker1_data[b]['lay'][1].price || "";
								}
								else {
									bookmaker1_lay_2_rate = "";
								}
								if (bookmaker1_data[b]['lay'][1].size) {
									bookmaker1_lay_2_size = bookmaker1_data[b]['lay'][1].size || "";
								}
								else {
									bookmaker1_lay_2_size = "";
								}
								bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size) / 1000) + "K" : bookmaker1_lay_2_size;
								if (bookmaker1_data[b]['lay'][2].price) {
									bookmaker1_lay_3_rate = bookmaker1_data[b]['lay'][2].price || "";
								}
								else {
									bookmaker1_lay_3_rate = "";
								}
								if (bookmaker1_data[b]['lay'][2].size) {
									bookmaker1_lay_3_size = bookmaker1_data[b]['lay'][2].size || "";
								}
								else {
									bookmaker1_lay_3_size = "";
								}
								bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size) / 1000) + "K" : bookmaker1_lay_3_size;
								bookmaker_suspended = "";
								if (book_status != "ACTIVE") {
									bookmaker_suspended = "suspended";
								}
								if (book_status != "ACTIVE") {
									$("#bookmaker_row_" + temp_selectionId).addClass("suspended");
								}
								else {
									$("#bookmaker_row_" + temp_selectionId).removeClass("suspended");
								}
								$("#bookmaker_row_" + temp_selectionId).attr("data-title", book_status);
								$("#back_1_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_rate);
								$("#back_2_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_2_rate);
								$("#back_3_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_back_3_rate);
								$("#lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_rate);
								$("#lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_2_rate);
								$("#lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS").attr("fullmarketodds", bookmaker1_lay_3_rate);
								back_1_html = "<span class='odd d-block'>" + bookmaker1_back_rate + "</span> <span class='d-block'>" + bookmaker1_back_size + "</span>";
								back_2_html = "<span class='odd d-block'>" + bookmaker1_back_2_rate + "</span> <span class='d-block'>" + bookmaker1_back_2_size + "</span>";
								back_3_html = "<span class='odd d-block'>" + bookmaker1_back_3_rate + "</span> <span class='d-block'>" + bookmaker1_back_3_size + "</span>";
								lay_1_html = "<span class='odd d-block'>" + bookmaker1_lay_rate + "</span> <span class='d-block'>" + bookmaker1_lay_size + "</span>";
								lay_2_html = "<span class='odd d-block'>" + bookmaker1_lay_2_rate + "</span> <span class='d-block'>" + bookmaker1_lay_2_size + "</span>";
								lay_3_html = "<span class='odd d-block'>" + bookmaker1_lay_3_rate + "</span> <span class='d-block'>" + bookmaker1_lay_3_size + "</span>";
								$("#back_1_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_1_html);
								$("#back_2_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_2_html);
								$("#back_3_" + temp_selectionId + "_BOOKMAKER_ODDS").html(back_3_html);
								$("#lay_1_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_1_html);
								$("#lay_2_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_2_html);
								$("#lay_3_" + temp_selectionId + "_BOOKMAKER_ODDS").html(lay_3_html);
							}
						}
					}
				}
			}
		}
 		if(args.body){
			if(args.body.bm1){
				if(args.body.bm1[0]){
					bookmaker_remarks = "";
					html_bookmaker_odds = "";
					eventName = $(".event_name_heading").attr("event_name");
					var bm_small1 = args.body.bm1[0];
					if(bm_small1.value && bm_small1.value != null){
						if(bm_small1.value.session && bm_small1.value.session != null){
							bm_small1_datas = bm_small1.value.session;
						
							for(z=0;z < bm_small1_datas.length;z++){
								if(bm_small1_datas[z] && bm_small1_datas[z]){
									var bookmaker1_data = bm_small1_datas[z];

									runnerName = bookmaker1_data['RunnerName'];
									book_status = bookmaker1_data['GameStatus'];
									selectionId = bookmaker1_data['SelectionId'];
									
									var temp_selectionId;
									temp_selectionId = runnerName.split(" ").join('_');
									
									temp_selectionId = temp_selectionId.replace(/[^a-zA-Z ]/g, "");

									marketType = "BOOKMAKERSMALL_ODDS";
									selectorIdBookmakerArray.push(selectionId);

									marketName = runnerName;
									var bet_suspended="";

									if(bookmaker1_data.BackPrice1){
										bookmaker1_back_rate = bookmaker1_data.BackPrice1 || "";
									}else{
										bookmaker1_back_rate = "";
									}

									if(bookmaker1_data.BackSize1){
										bookmaker1_back_size = bookmaker1_data.BackSize1 || 0;
									}else{
										bookmaker1_back_size = 0;
									}
									bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size)/1000) + "K" : bookmaker1_back_size;

									if(bookmaker1_data.BackPrice2){
										bookmaker1_back_2_rate = bookmaker1_data.BackPrice2 || "";
									}else{
										bookmaker1_back_2_rate = "";
									}

									if(bookmaker1_data.BackSize2){
										bookmaker1_back_2_size = bookmaker1_data.BackSize2 || 0;
									}else{
										bookmaker1_back_2_size = 0;
									}
									bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size)/1000) + "K" : bookmaker1_back_2_size;

									if(bookmaker1_data.BackPrice3){
										bookmaker1_back_3_rate = bookmaker1_data.BackPrice3 || "";
									}else{
										bookmaker1_back_3_rate = "";
									}

									if(bookmaker1_data.BackSize3){
										bookmaker1_back_3_size = bookmaker1_data.BackSize3 || 0;
									}else{
										bookmaker1_back_3_size = 0;
									}
									bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size)/1000) + "K" : bookmaker1_back_3_size;


									if(bookmaker1_data.LayPrice1){
										bookmaker1_lay_rate = bookmaker1_data.LayPrice1 || "";
									}else{
										bookmaker1_lay_rate = "";
									}

									if(bookmaker1_data.LaySize1){
										bookmaker1_lay_size = bookmaker1_data.LaySize1 || 0;
									}else{
										bookmaker1_lay_size = 0;
									}
									bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size)/1000) + "K" : bookmaker1_lay_size;									

									if(bookmaker1_data.LayPrice2){
										bookmaker1_lay_2_rate = bookmaker1_data.LayPrice2 || "";
									}else{
										bookmaker1_lay_2_rate = "";
									}
									if(bookmaker1_data.LaySize2){
										bookmaker1_lay_2_size = bookmaker1_data.LaySize2 || 0;
									}else{
										bookmaker1_lay_2_size = 0;
									}
									bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size)/1000) + "K" : bookmaker1_lay_2_size;


									if(bookmaker1_data.LayPrice3){
										bookmaker1_lay_3_rate = bookmaker1_data.LayPrice3 || "";
									}else{
										bookmaker1_lay_3_rate = "";
									}
									if(bookmaker1_data.LaySize3){
										bookmaker1_lay_3_size = bookmaker1_data.LaySize3 || 0;
									}else{
										bookmaker1_lay_3_size = 0;
									}
									bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size)/1000) + "K" : bookmaker1_lay_3_size;

									bookmaker_suspended = "";
									if(book_status != "ACTIVE"){
										bookmaker_suspended = "suspended";
									}

									if(book_status != "ACTIVE" || (bookmaker1_back_rate == 0 && bookmaker1_lay_rate == 0)){
										$("#bookmakersmall_row_"+temp_selectionId).addClass("suspended");
									}else{
										$("#bookmakersmall_row_"+temp_selectionId).removeClass("suspended");
									}
									$("#bookmakersmall_row_"+temp_selectionId).attr("data-title",book_status);

									$("#back_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").attr("fullmarketodds",bookmaker1_back_rate);
									$("#back_2_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").attr("fullmarketodds",bookmaker1_back_2_rate);
									$("#back_3_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").attr("fullmarketodds",bookmaker1_back_3_rate);
									$("#lay_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").attr("fullmarketodds",bookmaker1_lay_rate);
									$("#lay_2_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").attr("fullmarketodds",bookmaker1_lay_2_rate);
									$("#lay_3_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").attr("fullmarketodds",bookmaker1_lay_3_rate);

									back_1_html = "<button><span class='odd d-block'>"+bookmaker1_back_rate+"</span> <span class='d-block'>"+bookmaker1_back_size+"</span></button>";
									back_2_html = "<button><span class='odd d-block'>"+bookmaker1_back_2_rate+"</span> <span class='d-block'>"+bookmaker1_back_2_size+"</span></button>";
									back_3_html = "<button><span class='odd d-block'>"+bookmaker1_back_3_rate+"</span> <span class='d-block'>"+bookmaker1_back_3_size+"</span></button>";

									lay_1_html = "<button><span class='odd d-block'>"+bookmaker1_lay_rate+"</span> <span class='d-block'>"+bookmaker1_lay_size+"</span></button>";
									lay_2_html = "<button><span class='odd d-block'>"+bookmaker1_lay_2_rate+"</span> <span class='d-block'>"+bookmaker1_lay_2_size+"</span></button>";
									lay_3_html = "<button><span class='odd d-block'>"+bookmaker1_lay_3_rate+"</span> <span class='d-block'>"+bookmaker1_lay_3_size+"</span></button>";

									$("#back_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").html(back_1_html);
									$("#back_2_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").html(back_2_html);
									$("#back_3_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").html(back_3_html);

									$("#lay_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").html(lay_1_html);
									$("#lay_2_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").html(lay_2_html);
									$("#lay_3_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS").html(lay_3_html);
					
					
								}

							}
						
						}
						
					}
				}
			}
		}
		var main_x = args;
		var smdlm_c = [];
		var mdlm_c = [];
		var dlm_c = [];
		marketIdArrayNew = [];
		marketIdArrayNewFancy1 = [];
		var n1;
		var n2;
		var n3;
		if(main_x.SMDLMarket[<?php echo SITE_ID; ?>]){
				if(main_x.SMDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL; ?>]){
						if(main_x.SMDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['cricket']){
								smdlm_c = main_x.SMDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentSuperMDL;?>]['cricket'];
						}
				}
		}
		if(main_x.MDLMarket[<?php echo SITE_ID; ?>]){
				if(main_x.MDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentMDL; ?>]){
						if(main_x.MDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['cricket']){
								mdlm_c = main_x.MDLMarket[<?php echo SITE_ID; ?>][<?php echo $parentMDL;?>]['cricket'];
						}
				}
		}
		if(main_x.DLMarket[<?php echo SITE_ID; ?>]){
				if(main_x.DLMarket[<?php echo SITE_ID; ?>][<?php echo $parentDL; ?>]){
						if(main_x.DLMarket[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['cricket']){
								dlm_c = main_x.DLMarket[<?php echo SITE_ID; ?>][<?php echo $parentDL;?>]['cricket'];
						}
				}
		}
		var _event_id = '<?php echo $event_id;?>';
		if (!SKIP_FANCY_EVENTID.includes(_event_id)) {
			if (args.body.session) {
				if (args.body.session[0]) {
					if (args.body.session[0].value) {
						if (args.body.session[0].value.session) {
							eventId = $(".event_name_heading").attr("eventid");
							event_name = $(".event_name_heading").attr("event_name");
							counter2 = 0;
							marketIdArrayNew = [];
							args.body.session[0].value.session = _.sortBy(args.body.session[0].value.session, 'SelectionId');
							args.body.session[0].value.session = _.sortBy(args.body.session[0].value.session, 'SrNo');
							for (i = args.body.session[0].value.session.length - 1; i >= 0; i--) {
								html_fancy_market_new = "";
								var eventId = <?php echo $event_id; ?>;
								marketId = args.body.session[0].value.session[i].SelectionId;
								if (marketId == "" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
								}
								else {
									min_stack = args.body.session[0].value.session[i].Min;
									max_stack = args.body.session[0].value.session[i].Max;
									marketName = args.body.session[0].value.session[i].RunnerName;
									Remark = args.body.session[0].value.session[i].Remark;
									statusLabel = args.body.session[0].value.session[i].GameStatus;
									if (statusLabel == "") {
										$(".fancy-suspend-tr_" + marketId).removeClass("suspended");
									}
									else if (statusLabel == "BALL_RUN") {
										$(".fancy-suspend-tr_" + marketId).addClass("suspended");
									}
									else if (statusLabel == "SUSPEND") {
										$(".fancy-suspend-tr_" + marketId).addClass("suspended");
									}
									else {
										$(".fancy-suspend-tr_" + marketId).addClass("suspended");
									}
									$(".fancy-suspend-tr_" + marketId).attr("data-title", statusLabel);
									if (args.body.session[0].value.session[i] != undefined) {
										runsNo = args.body.session[0].value.session[i].LayPrice1;
										oddsNo = args.body.session[0].value.session[i].LaySize1;
										runsYes = args.body.session[0].value.session[i].BackPrice1;
										oddsYes = args.body.session[0].value.session[i].BackSize1;
									}
									eventName = marketName;
									if (eventName) {
										eventName2 = eventName.split(' ').join('_');
									}
									else {
										eventName2 = marketName
									}
									if (oddsNo == null) {
										oddsNo = "";
									}
									if (oddsYes == null) {
										oddsYes = "";
									}
									check_runsNo_interger = isNaN(runsNo);
									check_oddsNo_interger = isNaN(oddsNo);
									check_runsYes_interger = isNaN(runsYes);
									check_oddsYes_interger = isNaN(oddsYes);
									if (check_runsNo_interger == true) {
										runsNo = 0;
									}
									if (check_oddsNo_interger == true) {
										oddsNo = 0;
									}
									if (check_runsYes_interger == true) {
										runsYes = 0;
									}
									if (check_oddsYes_interger == true) {
										oddsYes = 0;
									}
									marketId = parseInt(marketId);
									n1 = smdlm_c.includes(marketId);
									n2 = mdlm_c.includes(marketId);
									n3 = dlm_c.includes(marketId);
									if (!n1 && !n2 && !n3) {
										m1 = marketIdArray.includes(marketId);
										if (m1) {
											marketIdArrayNew[counter2] = marketId;
											counter2++;
											if(Remark != ""){
												$("#remakrs_"+marketId).show();
												$("#remakrs_"+marketId).text(Remark);
											}
											
											lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
											$("#fancy_market_lay_btn_" + marketId).attr("event_name", event_name);
											$("#fancy_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
											$("#fancy_market_lay_btn_" + marketId).attr("selectionid", marketId);
											$("#fancy_market_lay_btn_" + marketId).attr("runner", marketName);
											$("#fancy_market_lay_btn_" + marketId).attr("marketname", marketName);
											$("#fancy_market_lay_btn_" + marketId).attr("eventid", eventId);
											$("#fancy_market_lay_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#fancy_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
											$("#fancy_market_lay_btn_" + marketId).html(lay_runs_info);
											back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
											$("#fancy_market_back_btn_" + marketId).attr("event_name", event_name);
											$("#fancy_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
											$("#fancy_market_back_btn_" + marketId).attr("selectionid", marketId);
											$("#fancy_market_back_btn_" + marketId).attr("runner", marketName);
											$("#fancy_market_back_btn_" + marketId).attr("marketname", marketName);
											$("#fancy_market_back_btn_" + marketId).attr("eventid", eventId);
											$("#fancy_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
											$("#fancy_market_back_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#fancy_market_back_btn_" + marketId).html(back_runs_info);
										}
										else {
											marketIdArrayNew[counter2] = marketId;
											counter2++;
											back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
											lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
											html_fancy_market_new += "<div class='fancy-tripple' id='fancyBetMarket_" + eventId + "_" + marketId + "'><div data-title='SUSPENDED' class='table-row suspended fancy-suspend-tr_" + marketId + "'><div class='float-left country-name box-6' style='border-bottom: 0px;'><p class='m-b-0'><a href='javascript:void(0)' onclick='view_fancy_bet_book("+eventId+","+marketId+")'> " + marketName + " </a></p><p class='m-b-0' id='live_match_points_" + marketId + "_FANCY_ODDS'><span style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='fancy_market_lay_btn_" + marketId + "' " + lay_attribute + " ><span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span></div><div class='box-1 back float-left text-center back-1' id='fancy_market_back_btn_" + marketId + "' " + back_attribute + "><span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span></div><div class='box-2 float-left text-right min-max' style='border-bottom: 0px;'><span class='d-block'>Min: <span>" + min_stack + "</span></span> <span class='d-block'>Max: <span>" + max_stack + "</span></span></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_"+marketId+"'></div>";
											lastrunsNo = runsNo;
											lastrunsYes = runsYes;
											if (marketIdArray[i - 1]) {
												$('#fancyBetMarket_' + eventId + '_' + marketIdArray[i - 1]).after(html_fancy_market_new);
											}
											else if (i > 0) {
												var x = args.body.session[0].value.session[i - 1].SelectionId;
												if ($('#fancyBetMarket_' + eventId + '_' + x).length > 0) {
													$('#fancyBetMarket_' + eventId + '_' + x).after(html_fancy_market_new);
												}
												else {
													$("#secure").after(html_fancy_market_new);
												}
											}
											else {
												$("#secure").after(html_fancy_market_new);
											}
										}
									}
								}
							}
							if (html_fancy_market_new != "") {
								$('#fancy').find('.fancy-message').hide();
								$("#fancy_odds_market").show();
							}
							else {}
							var z = $.grep(marketIdArray, function (el) {
								return $.inArray(el, marketIdArrayNew) == -1
							});
							if (z) {
								for (i = 0; i < z.length; i++) {
									marketId = z[i];
									if ($("#fancyBetMarket_" + eventId + "_" + marketId).length > 0) {
										document.getElementById("fancyBetMarket_" + eventId + "_" + marketId).remove();
										$(".fancy-suspend-tr_" + marketId).remove();
									}
								}
							}
							marketIdArray = marketIdArrayNew;
						}
					}
				}
			}
			if (args.body.overByOver && true) {
				if (args.body.overByOver[0]) {
					if (args.body.overByOver[0].value) {
						if (args.body.overByOver[0].value.session) {
							eventId = $(".event_name_heading").attr("eventid");
							event_name = $(".event_name_heading").attr("event_name");
							counter2 = 0;
							marketIdArrayOverNew = [];
							html_fancy_market_new = "";
							for (i = args.body.overByOver[0].value.session.length - 1; i >= 0; i--) {
								html_fancy_market_new = "";
								var eventId = <?php echo $event_id; ?>;
								marketId = args.body.overByOver[0].value.session[i].SelectionId;
								if (marketId == "" || args.body.overByOver[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.overByOver[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
								}
								else {
									min_stack = args.body.overByOver[0].value.session[i].Min;
									max_stack = args.body.overByOver[0].value.session[i].Max;
									marketName = args.body.overByOver[0].value.session[i].RunnerName;
									Remark = args.body.overByOver[0].value.session[i].Remark;
									statusLabel = args.body.overByOver[0].value.session[i].GameStatus;
									if (statusLabel == "") {
										$(".fancy_over_by_over-suspend-tr_" + marketId).removeClass("suspended");
									}
									else if (statusLabel == "BALL_RUN") {
										$(".fancy_over_by_over-suspend-tr_" + marketId).addClass("suspended");
									}
									else if (statusLabel == "SUSPEND") {
										$(".fancy_over_by_over-suspend-tr_" + marketId).addClass("suspended");
									}
									else {
										$(".fancy_over_by_over-suspend-tr_" + marketId).addClass("suspended");
									}
									$(".fancy_over_by_over-suspend-tr_" + marketId).attr("data-title", statusLabel);
									if (args.body.overByOver[0].value.session[i] != undefined) {
										runsNo = args.body.overByOver[0].value.session[i].LayPrice1;
										oddsNo = args.body.overByOver[0].value.session[i].LaySize1;
										runsYes = args.body.overByOver[0].value.session[i].BackPrice1;
										oddsYes = args.body.overByOver[0].value.session[i].BackSize1;
									}
									eventName = marketName;
									if (eventName) {
										eventName2 = eventName.split(' ').join('_');
									}
									else {
										eventName2 = marketName
									}
									if (oddsNo == null) {
										oddsNo = "";
									}
									if (oddsYes == null) {
										oddsYes = "";
									}
									check_runsNo_interger = isNaN(runsNo);
									check_oddsNo_interger = isNaN(oddsNo);
									check_runsYes_interger = isNaN(runsYes);
									check_oddsYes_interger = isNaN(oddsYes);
									if (check_runsNo_interger == true) {
										runsNo = 0;
									}
									if (check_oddsNo_interger == true) {
										oddsNo = 0;
									}
									if (check_runsYes_interger == true) {
										runsYes = 0;
									}
									if (check_oddsYes_interger == true) {
										oddsYes = 0;
									}
									marketId = parseInt(marketId);
									n1 = smdlm_c.includes(marketId);
									n2 = mdlm_c.includes(marketId);
									n3 = dlm_c.includes(marketId);
									if (!n1 && !n2 && !n3) {
										m1 = marketIdArrayOver.includes(marketId);
										if (m1) {
											marketIdArrayOverNew[counter2] = marketId;
											counter2++;
											if(Remark != ""){
												$("#remakrs_"+marketId).show();
												$("#remakrs_"+marketId).text(Remark);
											}
											lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
											$("#fancy_market_lay_btn_" + marketId).attr("event_name", event_name);
											$("#fancy_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
											$("#fancy_market_lay_btn_" + marketId).attr("selectionid", marketId);
											$("#fancy_market_lay_btn_" + marketId).attr("runner", marketName);
											$("#fancy_market_lay_btn_" + marketId).attr("marketname", marketName);
											$("#fancy_market_lay_btn_" + marketId).attr("eventid", eventId);
											$("#fancy_market_lay_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#fancy_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
											$("#fancy_market_lay_btn_" + marketId).html(lay_runs_info);
											back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
											$("#fancy_market_back_btn_" + marketId).attr("event_name", event_name);
											$("#fancy_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
											$("#fancy_market_back_btn_" + marketId).attr("selectionid", marketId);
											$("#fancy_market_back_btn_" + marketId).attr("runner", marketName);
											$("#fancy_market_back_btn_" + marketId).attr("marketname", marketName);
											$("#fancy_market_back_btn_" + marketId).attr("eventid", eventId);
											$("#fancy_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
											$("#fancy_market_back_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#fancy_market_back_btn_" + marketId).html(back_runs_info);
										}
										else {
											marketIdArrayOverNew[counter2] = marketId;
											counter2++;
											back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
											lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
											html_fancy_market_new += "<div class='fancy-tripple' id='fancyOverBetMarket_" + eventId + "_" + marketId + "'><div data-title='SUSPENDED' class='table-row suspended fancy_over_by_over-suspend-tr_" + marketId + "'><div class='float-left country-name box-6' style='border-bottom: 0px;'><p class='m-b-0'><a href='javascript:void(0)' onclick='view_fancy_bet_book("+eventId+","+marketId+")'> " + marketName + " </a></p><p class='m-b-0' id='live_match_points_" + marketId + "_FANCY_ODDS'><span style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='fancy_market_lay_btn_" + marketId + "' " + lay_attribute + " ><span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span></div><div class='box-1 back float-left text-center back-1' id='fancy_market_back_btn_" + marketId + "' " + back_attribute + "><span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span></div><div class='box-2 float-left text-right min-max' style='border-bottom: 0px;'><span class='d-block'>Min: <span>" + min_stack + "</span></span> <span class='d-block'>Max: <span>" + max_stack + "</span></span></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_"+marketId+"'></div>";
											lastrunsNo = runsNo;
											lastrunsYes = runsYes;
											if (marketIdArrayOver[i - 1]) {
												$('#fancyOverBetMarket_' + eventId + '_' + marketIdArrayOver[i - 1]).after(html_fancy_market_new);
											}
											else if (i > 0) {
												var x = args.body.overByOver[0].value.session[i - 1].SelectionId;
												if ($('#fancyOverBetMarket_' + eventId + '_' + x).length > 0) {
													$('#fancyOverBetMarket_' + eventId + '_' + x).after(html_fancy_market_new);
												}
												else {
													$("#secure_over_by_over").after(html_fancy_market_new);
												}
											}
											else {
												$("#secure_over_by_over").after(html_fancy_market_new);
											}
										}
									}
								}
							}
							if (html_fancy_market_new != "") {
								$('#fancy').find('.fancy-message').hide();
								$("#over_by_over_odds_market").show();
							}
							else {}
							var z = $.grep(marketIdArrayOver, function (el) {
								return $.inArray(el, marketIdArrayOverNew) == -1
							});
							if (z) {
								for (i = 0; i < z.length; i++) {
									marketId = z[i];
									if ($("#fancyOverBetMarket_" + eventId + "_" + marketId).length > 0) {
										document.getElementById("fancyOverBetMarket_" + eventId + "_" + marketId).remove();
										$(".fancy_over_by_over-suspend-tr_" + marketId).remove();
									}
								}
							}
							marketIdArrayOver = marketIdArrayOverNew;
						}
					}
				}
			}
			
			
			if (args.body.session1  && true) {
				if (args.body.session1[0]) {
					if (args.body.session1[0].value) {
						if (args.body.session1[0].value.session) {
							eventId = $(".event_name_heading").attr("eventid");
							event_name = $(".event_name_heading").attr("event_name");
							counter2 = 0;
							marketIdArrayNewFancy1 = [];
							//start for
							var body2 = args.body.session1[0].value.session.map(a => {
								let b = {};
								b = a;
								b['SelectionId'] = parseInt(b['SelectionId']);
								return b;
							});
							args.body.session1[0].value.session = _.sortBy(body2, 'SelectionId');
							for (i = 0; i < args.body.session1[0].value.session.length; i++) {
								html_fancy_market_new1 = "";
								var eventId = <?php echo $event_id; ?>;
								marketId = args.body.session1[0].value.session[i].SelectionId;
								if (marketId == "" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
									//	if(marketId == ""){
								}
								else {
									min_stack = args.body.session1[0].value.session[i].Min;
									max_stack = args.body.session1[0].value.session[i].Max;
									marketName = args.body.session1[0].value.session[i].RunnerName;
									Remark = args.body.session1[0].value.session[i].Remark;
									statusLabel = args.body.session1[0].value.session[i].GameStatus;
									if (statusLabel == "") {
										$(".fancy1-suspend-tr_" + marketId).removeClass("suspended");
									}
									else if (statusLabel == "BALL_RUN") {
										$(".fancy1-suspend-tr_" + marketId).addClass("suspended");
									}
									else if (statusLabel == "SUSPEND") {
										$(".fancy1-suspend-tr_" + marketId).addClass("suspended");
									}
									else {
										$(".fancy1-suspend-tr_" + marketId).addClass("suspended");
									}
									$(".fancy1-suspend-tr_" + marketId).attr("data-title", statusLabel);
									if (args.body.session1[0].value.session[i] != undefined) {
										runsNo = args.body.session1[0].value.session[i].LayPrice1;
										oddsNo = args.body.session1[0].value.session[i].LaySize1;
										runsYes = args.body.session1[0].value.session[i].BackPrice1;
										oddsYes = args.body.session1[0].value.session[i].BackSize1;
									}
									eventName = marketName;
									if (eventName) {
										eventName2 = eventName.split(' ').join('_');
									}
									else {
										eventName2 = marketName
									}
									if (oddsNo == null) {
										oddsNo = "";
									}
									if (oddsYes == null) {
										oddsYes = "";
									}
									check_runsNo_interger = isNaN(runsNo);
									check_oddsNo_interger = isNaN(oddsNo);
									check_runsYes_interger = isNaN(runsYes);
									check_oddsYes_interger = isNaN(oddsYes);
									if (check_runsNo_interger == true) {
										runsNo = 0;
									}
									if (check_oddsNo_interger == true) {
										oddsNo = 0;
									}
									if (check_runsYes_interger == true) {
										runsYes = 0;
									}
									if (check_oddsYes_interger == true) {
										oddsYes = 0;
									}
									marketId = parseInt(marketId);
									n1 = smdlm_c.includes(marketId);
									n2 = mdlm_c.includes(marketId);
									n3 = dlm_c.includes(marketId);
									if (!n1 && !n2 && !n3) {
										m1 = marketIdArrayFancy1.includes(marketId);
										if (m1) {
											marketIdArrayNewFancy1[counter2] = marketId;
											counter2++;
											if(Remark != ""){
												$("#remakrs_"+marketId).show();
												$("#remakrs_"+marketId).text(Remark);
											}
											if (runsNo == 0) {
												runsNo = "";
												oddsNo = "";
											}
											if (runsYes == 0) {
												runsYes = "";
												oddsYes = "";
											}
											lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
											$("#fancy1_market_lay_btn_" + marketId).attr("event_name", event_name);
											$("#fancy1_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
											$("#fancy1_market_lay_btn_" + marketId).attr("selectionid", marketId);
											$("#fancy1_market_lay_btn_" + marketId).attr("runner", marketName);
											$("#fancy1_market_lay_btn_" + marketId).attr("marketname", marketName);
											$("#fancy1_market_lay_btn_" + marketId).attr("eventid", eventId);
											$("#fancy1_market_lay_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#fancy1_market_lay_btn_" + marketId).attr("fullfancymarketrate", runsNo);
											$("#fancy1_market_lay_btn_" + marketId).html(lay_runs_info);
											back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
											$("#fancy1_market_back_btn_" + marketId).attr("event_name", event_name);
											$("#fancy1_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
											$("#fancy1_market_back_btn_" + marketId).attr("selectionid", marketId);
											$("#fancy1_market_back_btn_" + marketId).attr("runner", marketName);
											$("#fancy1_market_back_btn_" + marketId).attr("marketname", marketName);
											$("#fancy1_market_back_btn_" + marketId).attr("eventid", eventId);
											$("#fancy1_market_back_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#fancy1_market_back_btn_" + marketId).attr("fullfancymarketrate", runsYes);
											$("#fancy1_market_back_btn_" + marketId).html(back_runs_info);
										}
										else {
											marketIdArrayNewFancy1[counter2] = marketId;
											counter2++;
											back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='FANCY1_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + runsYes + "'";
											lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='FANCY1_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + runsNo + "'";
											html_fancy_market_new1 += "<div class='fancy-tripple' id='fancy1BetMarket_" + eventId + "_" + marketId + "'><div data-title='SUSPENDED' class='table-row suspended fancy1-suspend-tr_" + marketId + "'><div class='float-left country-name box-6' style='border-bottom: 0px;'><p class='m-b-0'><a href='javascript:void(0)' onclick='view_fancy_bet_book("+eventId+","+marketId+")'> " + marketName + " </a></p><p class='m-b-0' id='live_match_points_" + marketId + "_FANCY_ODDS'><span style='color: black;'>0</span></p></div><div class='box-1 back float-left text-center back-1' id='fancy1_market_back_btn_" + marketId + "' " + back_attribute + "><span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span></div><div class='box-1 lay float-left text-center lay-1' id='fancy1_market_lay_btn_" + marketId + "' " + lay_attribute + " ><span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span></div><div class='box-2 float-left text-right min-max' style='border-bottom: 0px;'><span class='d-block'>Min: <span>" + min_stack + "</span></span> <span class='d-block'>Max: <span>" + max_stack + "</span></span></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_"+marketId+"'></div>";
											lastrunsNo = runsNo;
											lastrunsYes = runsYes;
											if (marketIdArrayFancy1[i - 1]) {
												$('#fancy1BetMarket_' + eventId + '_' + marketIdArrayFancy1[i - 1]).after(html_fancy_market_new1);
											}
											else if (i > 0) {
												var x = args.body.session1[0].value.session[i - 1].SelectionId;
												if ($('#fancy1BetMarket_' + eventId + '_' + x).length > 0) {
													$('#fancy1BetMarket_' + eventId + '_' + x).after(html_fancy_market_new1);
												}
												else {
													$("#secure1").after(html_fancy_market_new1);
												}
											}
											else {
												$("#secure1").after(html_fancy_market_new1);
											}
										}
									}
								}
							}
							if (html_fancy_market_new1 != "") {
								$('#fancy1').find('.fancy-message').hide();
								$("#fancy_odds_market1").show();
							}
							else {}
							var z = $.grep(marketIdArrayFancy1, function (el) {
								return $.inArray(el, marketIdArrayNewFancy1) == -1
							});
							if (z) {
								for (i = 0; i < z.length; i++) {
									marketId = z[i];
									if ($("#fancy1BetMarket_" + eventId + "_" + marketId).length > 0) {
										document.getElementById("fancy1BetMarket_" + eventId + "_" + marketId).remove();
										$(".fancy1-suspend-tr_" + marketId).remove();
									}
								}
							}
							marketIdArrayFancy1 = marketIdArrayNewFancy1;
						}
						//end for
					}
				}
			}
			if (args.body.khado && true) {
				if (args.body.khado[0]) {
					if (args.body.khado[0].value) {
						if (args.body.khado[0].value.session) {
							eventId = $(".event_name_heading").attr("eventid");
							event_name = $(".event_name_heading").attr("event_name");
							counter2 = 0;
							marketIdArrayNewKhado = [];
							//start for
							var body2 = args.body.khado[0].value.session.map(a => {
								let b = {};
								b = a;
								b['SelectionId'] = parseInt(b['SelectionId']);
								return b;
							});
							args.body.khado[0].value.session = _.sortBy(body2, 'SelectionId');
							for (i = 0; i < args.body.khado[0].value.session.length; i++) {
								html_khado_market_new = "";
								var eventId = <?php echo $event_id; ?>;
								marketId = args.body.khado[0].value.session[i].SelectionId;
								if (marketId == "" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
									//	if(marketId == ""){
								}
								else {
									min_stack = args.body.khado[0].value.session[i].Min;
									max_stack = args.body.khado[0].value.session[i].Max;
									marketName = args.body.khado[0].value.session[i].RunnerName;
									Remark = args.body.khado[0].value.session[i].Remark;
									statusLabel = args.body.khado[0].value.session[i].GameStatus;
									if (statusLabel == "") {
										$(".khado-suspend-tr_" + marketId).removeClass("suspended");
									}
									else if (statusLabel == "BALL_RUN") {
										$(".khado-suspend-tr_" + marketId).addClass("suspended");
									}
									else if (statusLabel == "SUSPEND") {
										$(".khado-suspend-tr_" + marketId).addClass("suspended");
									}
									else {
										$(".khado-suspend-tr_" + marketId).addClass("suspended");
									}
									$(".khado-suspend-tr_" + marketId).attr("data-title", statusLabel);
									if (args.body.khado[0].value.session[i] != undefined) {
										runsNo = args.body.khado[0].value.session[i].LayPrice1;
										oddsNo = args.body.khado[0].value.session[i].LaySize1;
										runsYes = args.body.khado[0].value.session[i].BackPrice1;
										oddsYes = args.body.khado[0].value.session[i].BackSize1;
									}
									eventName = marketName;
									if (eventName) {
										eventName2 = eventName.split(' ').join('_');
									}
									else {
										eventName2 = marketName
									}
									if (oddsNo == null) {
										oddsNo = "";
									}
									if (oddsYes == null) {
										oddsYes = "";
									}
									check_runsNo_interger = isNaN(runsNo);
									check_oddsNo_interger = isNaN(oddsNo);
									check_runsYes_interger = isNaN(runsYes);
									check_oddsYes_interger = isNaN(oddsYes);
									if (check_runsNo_interger == true) {
										runsNo = 0;
									}
									if (check_oddsNo_interger == true) {
										oddsNo = 0;
									}
									if (check_runsYes_interger == true) {
										runsYes = 0;
									}
									if (check_oddsYes_interger == true) {
										oddsYes = 0;
									}
									marketId = parseInt(marketId);
									n1 = smdlm_c.includes(marketId);
									n2 = mdlm_c.includes(marketId);
									n3 = dlm_c.includes(marketId);
									if (!n1 && !n2 && !n3) {
										m1 = marketIdArrayKhado.includes(marketId);
										if (m1) {
											marketIdArrayNewKhado[counter2] = marketId;
											counter2++;
											if(Remark != ""){
												$("#remakrs_"+marketId).show();
												$("#remakrs_"+marketId).text(Remark);
											}
											if (runsNo == 0) {
												runsNo = "";
												oddsNo = "";
											}
											if (runsYes == 0) {
												runsYes = "";
												oddsYes = "";
											}
											lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
											$("#khado_market_lay_btn_" + marketId).attr("event_name", event_name);
											$("#khado_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
											$("#khado_market_lay_btn_" + marketId).attr("selectionid", marketId);
											$("#khado_market_lay_btn_" + marketId).attr("runner", marketName);
											$("#khado_market_lay_btn_" + marketId).attr("marketname", marketName);
											$("#khado_market_lay_btn_" + marketId).attr("eventid", eventId);
											$("#khado_market_lay_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#khado_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
											$("#khado_market_lay_btn_" + marketId).html("");
											winning_zone = parseInt(runsYes) + parseInt(runsNo);
											back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
											$("#khado_market_back_btn_" + marketId).attr("event_name", event_name);
											$("#khado_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
											$("#khado_market_back_btn_" + marketId).attr("selectionid", marketId);
											$("#khado_market_back_btn_" + marketId).attr("runner", marketName + ' - ' + runsNo);
											$("#khado_market_back_btn_" + marketId).attr("marketname", marketName);
											$("#khado_market_back_btn_" + marketId).attr("eventid", eventId);
											$("#khado_market_back_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#khado_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
											$("#khado_market_back_btn_" + marketId).attr("winnig_zone", winning_zone);
											$("#khado_market_back_btn_" + marketId).html(back_runs_info);
										}
										else {
											marketIdArrayNewKhado[counter2] = marketId;
											counter2++;
											winning_zone = parseInt(runsYes) + parseInt(runsNo);
											back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='KHADO_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='KHADO_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "' winnig_zone='" + winning_zone + "'";
											lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='KHADO_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='KHADO_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
											html_khado_market_new += "<div class='fancy-tripple' id='khadoBetMarket_" + eventId + "_" + marketId + "'><div data-title='SUSPENDED' class='table-row suspended khado-suspend-tr_" + marketId + "'><div class='float-left country-name box-6' style='border-bottom: 0px;'><p class='m-b-0'><a href='javascript:void(0)'> " + marketName + ' - ' + runsNo + " </a></p><p class='m-b-0' id='live_match_points_" + marketId + "_KHADO_ODDS'><span style='color: black;'>0</span></p></div><div class='box-1 back float-left text-center back-1' id='khado_market_back_btn_" + marketId + "' " + back_attribute + "><span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span></div><div class='box-1 lay float-left text-center' id='khado_market_lay_btn_" + marketId + "' " + lay_attribute + " ></div><div class='box-2 float-left text-right min-max' style='border-bottom: 0px;'><span class='d-block'>Min: <span>" + min_stack + "</span></span> <span class='d-block'>Max: <span>" + max_stack + "</span></span></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_"+marketId+"'></div>";
											lastrunsNo = runsNo;
											lastrunsYes = runsYes;
											if (marketIdArrayKhado[i - 1]) {
												$('#khadoBetMarket_' + eventId + '_' + marketIdArrayKhado[i - 1]).after(html_khado_market_new);
											}
											else if (i > 0) {
												var x = args.body.khado[0].value.session[i - 1].SelectionId;
												if ($('#khadoBetMarket_' + eventId + '_' + x).length > 0) {
													$('#khadoBetMarket_' + eventId + '_' + x).after(html_khado_market_new);
												}
												else {
													$("#secure_khado").after(html_khado_market_new);
												}
											}
											else {
												$("#secure_khado").after(html_khado_market_new);
											}
										}
									}
								}
							}
							if (html_khado_market_new != "") {
								$("#khado_odds_market").show();
							}
							else {}
							var z = $.grep(marketIdArrayKhado, function (el) {
								return $.inArray(el, marketIdArrayNewKhado) == -1
							});
							if (z) {
								for (i = 0; i < z.length; i++) {
									marketId = z[i];
									if ($("#khadoBetMarket_" + eventId + "_" + marketId).length > 0) {
										document.getElementById("khadoBetMarket_" + eventId + "_" + marketId).remove();
										$(".khado-suspend-tr_" + marketId).remove();
									}
								}
							}
							marketIdArrayKhado = marketIdArrayNewKhado;
						}
						//end for
					}
				}
			}
			if (args.body.ballByBall && true) {
				
				if (args.body.ballByBall[0]) {
					if (args.body.ballByBall[0].value) {
						if (args.body.ballByBall[0].value.session) {
							eventId = $(".event_name_heading").attr("eventid");
							event_name = $(".event_name_heading").attr("event_name");
							counter2 = 0;
							marketIdArrayNewBall = [];
							//start for
							
							var body2 = args.body.ballByBall[0].value.session.map(a => {
								let b = {};
								b = a;
								b['SelectionId'] = parseInt(b['SelectionId']);
								return b;
							});
							args.body.ballByBall[0].value.session = _.sortBy(body2, 'SelectionId');
							var is_first_over_run = false,
								over_number = '';
							for (i = 0; i < args.body.ballByBall[0].value.session.length; i++) {
								html_ball_market_new = "";
								var eventId = <?php echo $event_id; ?>;
								marketId = args.body.ballByBall[0].value.session[i].SelectionId;
								
								if (marketId == "" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
									//	if(marketId == ""){
								}
								else {
									min_stack = args.body.ballByBall[0].value.session[i].Min;
									max_stack = args.body.ballByBall[0].value.session[i].Max;
									marketName = args.body.ballByBall[0].value.session[i].RunnerName;
									Remark = args.body.ballByBall[0].value.session[i].Remark;
									statusLabel = args.body.ballByBall[0].value.session[i].GameStatus;
									
									if (statusLabel == "") {
										$(".ballByBall-suspend-tr_" + marketId).removeClass("suspended");
									}
									else if (statusLabel == "BALL_RUN") {
										$(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
									}
									else if (statusLabel == "SUSPEND") {
										$(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
									}
									else {
										$(".ballByBall-suspend-tr_" + marketId).addClass("suspended");
									}
									$(".ballByBall-suspend-tr_" + marketId).attr("data-title", statusLabel);
									if (args.body.ballByBall[0].value.session[i] != undefined) {
										runsNo = args.body.ballByBall[0].value.session[i].LayPrice1;
										oddsNo = args.body.ballByBall[0].value.session[i].LaySize1;
										runsYes = args.body.ballByBall[0].value.session[i].BackPrice1;
										oddsYes = args.body.ballByBall[0].value.session[i].BackSize1;
									}
									eventName = marketName;
									if (eventName) {
										eventName2 = eventName.split(' ').join('_');
									}
									else {
										eventName2 = marketName
									}
									if (oddsNo == null) {
										oddsNo = "";
									}
									if (oddsYes == null) {
										oddsYes = "";
									}
									check_runsNo_interger = isNaN(runsNo);
									check_oddsNo_interger = isNaN(oddsNo);
									check_runsYes_interger = isNaN(runsYes);
									check_oddsYes_interger = isNaN(oddsYes);
									if (check_runsNo_interger == true) {
										runsNo = 0;
									}
									if (check_oddsNo_interger == true) {
										oddsNo = 0;
									}
									if (check_runsYes_interger == true) {
										runsYes = 0;
									}
									if (check_oddsYes_interger == true) {
										oddsYes = 0;
									}
									marketId = parseInt(marketId);
									n1 = smdlm_c.includes(marketId);
									n2 = mdlm_c.includes(marketId);
									n3 = dlm_c.includes(marketId);
									if (!n1 && !n2 && !n3) {
										m1 = marketIdArrayBall.includes(marketId);
										if (m1) {
											marketIdArrayNewBall[counter2] = marketId;
											counter2++;
											if(Remark != ""){
												$("#remakrs_"+marketId).show();
												$("#remakrs_"+marketId).text(Remark);
											}
											if (runsNo == 0) {
												runsNo = "";
												oddsNo = "";
											}
											if (runsYes == 0) {
												runsYes = "";
												oddsYes = "";
											}
											lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
											$("#ball_market_lay_btn_" + marketId).attr("event_name", event_name);
											$("#ball_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
											$("#ball_market_lay_btn_" + marketId).attr("selectionid", marketId);
											$("#ball_market_lay_btn_" + marketId).attr("runner", marketName);
											$("#ball_market_lay_btn_" + marketId).attr("marketname", marketName);
											$("#ball_market_lay_btn_" + marketId).attr("eventid", eventId);
											$("#ball_market_lay_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#ball_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
											$("#ball_market_lay_btn_" + marketId).html(lay_runs_info);
											back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
											$("#ball_market_back_btn_" + marketId).attr("event_name", event_name);
											$("#ball_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
											$("#ball_market_back_btn_" + marketId).attr("selectionid", marketId);
											$("#ball_market_back_btn_" + marketId).attr("runner", marketName);
											$("#ball_market_back_btn_" + marketId).attr("marketname", marketName);
											$("#ball_market_back_btn_" + marketId).attr("eventid", eventId);
											$("#ball_market_back_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#ball_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
											$("#ball_market_back_btn_" + marketId).html(back_runs_info);
										}
										else {
											marketIdArrayNewBall[counter2] = marketId;
											counter2++;
											back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='BALL_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
											lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='BALL_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
											html_ball_market_new += "<div class='fancy-tripple' id='ballBetMarket_" + eventId + "_" + marketId + "'><div data-title='SUSPENDED' class='table-row suspended ballByBall-suspend-tr_" + marketId + "'><div class='float-left country-name box-6' style='border-bottom: 0px;'><p class='m-b-0'><a href='javascript:void(0)'> " + marketName + " </a></p><p class='m-b-0' id='live_match_points_" + marketId + "_FANCY_ODDS'><span style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='ball_market_lay_btn_" + marketId + "' " + lay_attribute + " ><span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span></div><div class='box-1 back float-left text-center back-1' id='ball_market_back_btn_" + marketId + "' " + back_attribute + "><span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span></div><div class='box-2 float-left text-right min-max' style='border-bottom: 0px;'><span class='d-block'>Min: <span>" + min_stack + "</span></span> <span class='d-block'>Max: <span>" + max_stack + "</span></span></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_"+marketId+"'></div>";
											lastrunsNo = runsNo;
											lastrunsYes = runsYes;
											if (marketIdArrayBall[i - 1]) {
												$('#ballBetMarket_' + eventId + '_' + marketIdArrayBall[i - 1]).after(html_ball_market_new);
											}
											else if (i > 0) {
												var x = args.body.ballByBall[0].value.session[i - 1].SelectionId;
												if ($('#ballBetMarket_' + eventId + '_' + x).length > 0) {
													$('#ballBetMarket_' + eventId + '_' + x).after(html_ball_market_new);
												}
												else {
													$("#secure_ball").after(html_ball_market_new);
												}
											}
											else {
												$("#secure_ball").after(html_ball_market_new);
											}
										}
									}
								}
							}
							if (html_ball_market_new != "") {
								$('#ball').find('.fancy-message').hide();
								$("#ball_odds_market").show();
							}
							else {}
							var z = $.grep(marketIdArrayBall, function (el) {
								return $.inArray(el, marketIdArrayNewBall) == -1
							});
							if (z) {
								for (i = 0; i < z.length; i++) {
									marketId = z[i];
									if ($("#ballBetMarket_" + eventId + "_" + marketId).length > 0) {
										document.getElementById("ballBetMarket_" + eventId + "_" + marketId).remove();
										$(".ballByBall-suspend-tr_" + marketId).remove();
									}
								}
							}
							marketIdArrayBall = marketIdArrayNewBall;
						}
						//end for
					}
				}
			}
			if (args.body.oddEven && true) {
				if (args.body.oddEven[0]) {
					if (args.body.oddEven[0].value) {
						if (args.body.oddEven[0].value.session) {
							eventId = $(".event_name_heading").attr("eventid");
							event_name = $(".event_name_heading").attr("event_name");
							counter2 = 0;
							marketIdArrayNewOddeven = [];
							//start for
							var body2 = args.body.oddEven[0].value.session.map(a => {
								let b = {};
								b = a;
								b['SelectionId'] = parseInt(b['SelectionId']);
								return b;
							});
							args.body.oddEven[0].value.session = _.sortBy(body2, 'SelectionId');
							for (i = 0; i < args.body.oddEven[0].value.session.length; i++) {
								html_oddeven_market_new = "";
								var eventId = <?php echo $event_id; ?>;
								marketId = args.body.oddEven[0].value.session[i].SelectionId;
								if (marketId == "" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
									//	if(marketId == ""){
								}
								else {
									min_stack = args.body.oddEven[0].value.session[i].Min;
									max_stack = args.body.oddEven[0].value.session[i].Max;
									marketName = args.body.oddEven[0].value.session[i].RunnerName;
									Remark = args.body.oddEven[0].value.session[i].Remark;
									statusLabel = args.body.oddEven[0].value.session[i].GameStatus;
									if (statusLabel == "") {
										$(".oddeven-suspend-tr_" + marketId).removeClass("suspended");
									}
									else if (statusLabel == "BALL_RUN") {
										$(".oddeven-suspend-tr_" + marketId).addClass("suspended");
									}
									else if (statusLabel == "SUSPEND") {
										$(".oddeven-suspend-tr_" + marketId).addClass("suspended");
									}
									else {
										$(".oddeven-suspend-tr_" + marketId).addClass("suspended");
									}
									$(".oddeven-suspend-tr_" + marketId).attr("data-title", statusLabel);
									if (args.body.oddEven[0].value.session[i] != undefined) {
										runsNo = args.body.oddEven[0].value.session[i].LayPrice1;
										oddsNo = args.body.oddEven[0].value.session[i].LaySize1;
										runsYes = args.body.oddEven[0].value.session[i].BackPrice1;
										oddsYes = args.body.oddEven[0].value.session[i].BackSize1;
									}
									eventName = marketName;
									if (eventName) {
										eventName2 = eventName.split(' ').join('_');
									}
									else {
										eventName2 = marketName
									}
									if (oddsNo == null) {
										oddsNo = "";
									}
									if (oddsYes == null) {
										oddsYes = "";
									}
									check_runsNo_interger = isNaN(runsNo);
									check_oddsNo_interger = isNaN(oddsNo);
									check_runsYes_interger = isNaN(runsYes);
									check_oddsYes_interger = isNaN(oddsYes);
									if (check_runsNo_interger == true) {
										runsNo = 0;
									}
									if (check_oddsNo_interger == true) {
										oddsNo = 0;
									}
									if (check_runsYes_interger == true) {
										runsYes = 0;
									}
									if (check_oddsYes_interger == true) {
										oddsYes = 0;
									}
									marketId = parseInt(marketId);
									n1 = smdlm_c.includes(marketId);
									n2 = mdlm_c.includes(marketId);
									n3 = dlm_c.includes(marketId);
									if (!n1 && !n2 && !n3) {
										m1 = marketIdArrayOddeven.includes(marketId);
										if (m1) {
											marketIdArrayNewOddeven[counter2] = marketId;
											counter2++;
											if(Remark != ""){
												$("#remakrs_"+marketId).show();
												$("#remakrs_"+marketId).text(Remark);
											}
											if (runsNo == 0) {
												runsNo = "";
												oddsNo = "";
											}
											if (runsYes == 0) {
												runsYes = "";
												oddsYes = "";
											}
											lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
											$("#oddeven_market_lay_btn_" + marketId).attr("event_name", event_name);
											$("#oddeven_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
											$("#oddeven_market_lay_btn_" + marketId).attr("selectionid", marketId);
											$("#oddeven_market_lay_btn_" + marketId).attr("runner", marketName);
											$("#oddeven_market_lay_btn_" + marketId).attr("marketname", marketName);
											$("#oddeven_market_lay_btn_" + marketId).attr("eventid", eventId);
											$("#oddeven_market_lay_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#oddeven_market_lay_btn_" + marketId).attr("fullfancymarketrate", runsNo);
											$("#oddeven_market_lay_btn_" + marketId).html(lay_runs_info);
											back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
											$("#oddeven_market_back_btn_" + marketId).attr("event_name", event_name);
											$("#oddeven_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
											$("#oddeven_market_back_btn_" + marketId).attr("selectionid", marketId);
											$("#oddeven_market_back_btn_" + marketId).attr("runner", marketName);
											$("#oddeven_market_back_btn_" + marketId).attr("marketname", marketName);
											$("#oddeven_market_back_btn_" + marketId).attr("eventid", eventId);
											$("#oddeven_market_back_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#oddeven_market_back_btn_" + marketId).attr("fullfancymarketrate", runsYes);
											$("#oddeven_market_back_btn_" + marketId).html(back_runs_info);
										}
										else {
											marketIdArrayNewOddeven[counter2] = marketId;
											counter2++;
											odd_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='ODDEVEN_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
											even_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='ODDEVEN_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
											html_oddeven_market_new += "<div class='fancy-tripple' id='oddevenBetMarket_" + eventId + "_" + marketId + "'>	<div data-title='SUSPENDED' class='table-row suspended oddeven-suspend-tr_" + marketId + "'> <div class='float-left country-name box-6' style='border-bottom: 0px;'> 	<p class='m-b-0'>  <a href='javascript:void(0)'> " + marketName + " </a> 	</p> 	<p class='m-b-0' id='live_match_points_" + marketId + "_FANCY_ODDS'>  <span style='color: black;'>0</span> 	</p> </div> <div class='box-1 back float-left text-center back-1' id='oddeven_market_back_btn_" + marketId + "' " + odd_attribute + "> 	<span class='odd d-block'>" + runsYes + "</span> 	<span>" + oddsYes + "</span> </div> <div class='box-1 back float-left text-center lay-1' id='oddeven_market_lay_btn_" + marketId + "' " + even_attribute + " > 	<span class='odd d-block'>" + runsNo + "</span> 	<span>" + oddsNo + "</span> </div> <div class='box-2 float-left text-right min-max' style='border-bottom: 0px;'> 	<span class='d-block'>Min: <span>" + min_stack + "</span></span>  	<span class='d-block'>Max: <span>" + max_stack + "</span></span> </div>	</div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_"+marketId+"'></div>";
											lastrunsNo = runsNo;
											lastrunsYes = runsYes;
											if (marketIdArrayOddeven[i - 1]) {
												$('#oddevenBetMarket_' + eventId + '_' + marketIdArrayOddeven[i - 1]).after(html_oddeven_market_new);
											}
											else if (i > 0) {
												var x = args.body.oddEven[0].value.session[i - 1].SelectionId;
												if ($('#oddevenBetMarket_' + eventId + '_' + x).length > 0) {
													$('#oddevenBetMarket_' + eventId + '_' + x).after(html_oddeven_market_new);
												}
												else {
													$("#secure_oddeven").after(html_oddeven_market_new);
												}
											}
											else {
												$("#secure_oddeven").after(html_oddeven_market_new);
											}
										}
									}
								}
							}
							if (html_oddeven_market_new != "") {
								$('#oddeven').find('.fancy-message').hide();
								$("#oddeven_odds_market").show();
							}
							else {}
							var z = $.grep(marketIdArrayOddeven, function (el) {
								return $.inArray(el, marketIdArrayNewOddeven) == -1
							});
							if (z) {
								for (i = 0; i < z.length; i++) {
									marketId = z[i];
									if ($("#oddevenBetMarket_" + eventId + "_" + marketId).length > 0) {
										document.getElementById("oddevenBetMarket_" + eventId + "_" + marketId).remove();
										$(".oddeven-suspend-tr_" + marketId).remove();
									}
								}
							}
							marketIdArrayOddeven = marketIdArrayNewOddeven;
						}
						//end for
					}
				}
			}
			if (args.body.meter && false) {
				if (args.body.meter[0]) {
					if (args.body.meter[0].value) {
						if (args.body.meter[0].value.session) {
							eventId = $(".event_name_heading").attr("eventid");
							event_name = $(".event_name_heading").attr("event_name");
							counter2 = 0;
							marketIdArrayNewMeter = [];
							//start for
							var body2 = args.body.meter[0].value.session.map(a => {
								let b = {};
								b = a;
								b['SelectionId'] = parseInt(b['SelectionId']);
								return b;
							});
							args.body.meter[0].value.session = _.sortBy(body2, 'SelectionId');
							for (i = 0; i < args.body.meter[0].value.session.length; i++) {
								html_meter_market_new = "";
								var eventId = <?php echo $event_id; ?>;
								marketId = args.body.meter[0].value.session[i].SelectionId;
								if (marketId == "" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "CLOSED") {
									//	if(marketId == ""){
								}
								else {
									min_stack = args.body.meter[0].value.session[i].Min;
									max_stack = args.body.meter[0].value.session[i].Max;
									marketName = args.body.meter[0].value.session[i].RunnerName;
									Remark = args.body.meter[0].value.session[i].Remark;
									statusLabel = args.body.meter[0].value.session[i].GameStatus;
									if (statusLabel == "") {
										$(".meter-suspend-tr_" + marketId).removeClass("suspended");
									}
									else if (statusLabel == "BALL_RUN") {
										$(".meter-suspend-tr_" + marketId).addClass("suspended");
									}
									else if (statusLabel == "SUSPEND") {
										$(".meter-suspend-tr_" + marketId).addClass("suspended");
									}
									else {
										$(".meter-suspend-tr_" + marketId).addClass("suspended");
									}
									$(".meter-suspend-tr_" + marketId).attr("data-title", statusLabel);
									if (args.body.meter[0].value.session[i] != undefined) {
										runsNo = args.body.meter[0].value.session[i].LayPrice1;
										oddsNo = args.body.meter[0].value.session[i].LaySize1;
										runsYes = args.body.meter[0].value.session[i].BackPrice1;
										oddsYes = args.body.meter[0].value.session[i].BackSize1;
									}
									eventName = marketName;
									if (eventName) {
										eventName2 = eventName.split(' ').join('_');
									}
									else {
										eventName2 = marketName
									}
									if (oddsNo == null) {
										oddsNo = "";
									}
									if (oddsYes == null) {
										oddsYes = "";
									}
									check_runsNo_interger = isNaN(runsNo);
									check_oddsNo_interger = isNaN(oddsNo);
									check_runsYes_interger = isNaN(runsYes);
									check_oddsYes_interger = isNaN(oddsYes);
									if (check_runsNo_interger == true) {
										runsNo = 0;
									}
									if (check_oddsNo_interger == true) {
										oddsNo = 0;
									}
									if (check_runsYes_interger == true) {
										runsYes = 0;
									}
									if (check_oddsYes_interger == true) {
										oddsYes = 0;
									}
									marketId = parseInt(marketId);
									n1 = smdlm_c.includes(marketId);
									n2 = mdlm_c.includes(marketId);
									n3 = dlm_c.includes(marketId);
									if (!n1 && !n2 && !n3) {
										m1 = marketIdArrayMeter.includes(marketId);
										if (m1) {
											marketIdArrayNewMeter[counter2] = marketId;
											counter2++;
											if(Remark != ""){
												$("#remakrs_"+marketId).show();
												$("#remakrs_"+marketId).text(Remark);
											}
											if (runsNo == 0) {
												runsNo = "";
												oddsNo = "";
											}
											if (runsYes == 0) {
												runsYes = "";
												oddsYes = "";
											}
											lay_runs_info = "<span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span>";
											$("#meter_market_lay_btn_" + marketId).attr("event_name", event_name);
											$("#meter_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
											$("#meter_market_lay_btn_" + marketId).attr("selectionid", marketId);
											$("#meter_market_lay_btn_" + marketId).attr("runner", marketName);
											$("#meter_market_lay_btn_" + marketId).attr("marketname", marketName);
											$("#meter_market_lay_btn_" + marketId).attr("eventid", eventId);
											$("#meter_market_lay_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#meter_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
											$("#meter_market_lay_btn_" + marketId).html(lay_runs_info);
											back_runs_info = "<span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span>";
											$("#meter_market_back_btn_" + marketId).attr("event_name", event_name);
											$("#meter_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
											$("#meter_market_back_btn_" + marketId).attr("selectionid", marketId);
											$("#meter_market_back_btn_" + marketId).attr("runner", marketName);
											$("#meter_market_back_btn_" + marketId).attr("marketname", marketName);
											$("#meter_market_back_btn_" + marketId).attr("eventid", eventId);
											$("#meter_market_back_btn_" + marketId).attr("marketid", oddsmarketId);
											$("#meter_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
											$("#meter_market_back_btn_" + marketId).html(back_runs_info);
										}
										else {
											marketIdArrayNewMeter[counter2] = marketId;
											counter2++;
											back_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsYes + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "'  selectionid='" + marketId + "' market_odd_name='METER_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='METER_ODDS' inplay='1' fullfancymarketrate='" + oddsYes + "'";
											lay_attribute = " event_name='" + event_name + "' fullmarketodds='" + runsNo + "' side='Lay' marketid='" + oddsmarketId + "' eventid='" + eventId + "' selectionid='" + marketId + "' market_odd_name='METER_ODDS' runner='" + marketName + "' marketname='" + marketName + "' markettype='METER_ODDS' inplay='1' fullfancymarketrate='" + oddsNo + "'";
											html_meter_market_new += "<div class='fancy-tripple' id='meterBetMarket_" + eventId + "_" + marketId + "'><div data-title='SUSPENDED' class='table-row suspended meter-suspend-tr_" + marketId + "'><div class='float-left country-name box-6' style='border-bottom: 0px;'><p class='m-b-0'><a href='javascript:void(0)'> " + marketName + " </a></p><p class='m-b-0' id='live_match_points_" + marketId + "_METER_ODDS'><span style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='meter_market_lay_btn_" + marketId + "' " + lay_attribute + " ><span class='odd d-block'>" + runsNo + "</span> <span>" + oddsNo + "</span></div><div class='box-1 back float-left text-center back-1' id='meter_market_back_btn_" + marketId + "' " + back_attribute + "><span class='odd d-block'>" + runsYes + "</span> <span>" + oddsYes + "</span></div><div class='box-2 float-left text-right min-max' style='border-bottom: 0px;'><span class='d-block'>Min: <span>" + min_stack + "</span></span> <span class='d-block'>Max: <span>" + max_stack + "</span></span></div></div></div><div class='table-remark text-right remark' style='display:none;' id='remakrs_"+marketId+"'></div>";
											lastrunsNo = runsNo;
											lastrunsYes = runsYes;
											if (marketIdArrayMeter[i - 1]) {
												$('#meterBetMarket_' + eventId + '_' + marketIdArrayMeter[i - 1]).after(html_meter_market_new);
											}
											else if (i > 0) {
												var x = args.body.meter[0].value.session[i - 1].SelectionId;
												if ($('#meterBetMarket_' + eventId + '_' + x).length > 0) {
													$('#meterBetMarket_' + eventId + '_' + x).after(html_meter_market_new);
												}
												else {
													$("#secure_meter").after(html_meter_market_new);
												}
											}
											else {
												$("#secure_meter").after(html_meter_market_new);
											}
										}
									}
								}
							}
							if (html_meter_market_new != "") {
								$('#meter').find('.fancy-message').hide();
								$("#meter_odds_market").show();
							}
							else {}
							var z = $.grep(marketIdArrayMeter, function (el) {
								return $.inArray(el, marketIdArrayNewMeter) == -1
							});
							if (z) {
								for (i = 0; i < z.length; i++) {
									marketId = z[i];
									if ($("#meterBetMarket_" + eventId + "_" + marketId).length > 0) {
										document.getElementById("meterBetMarket_" + eventId + "_" + marketId).remove();
										$(".meter-suspend-tr_" + marketId).remove();
									}
								}
							}
							marketIdArrayMeter = marketIdArrayNewMeter;
						}
						//end for
					}
				}
			}
		}
    }
});
	
</script>

<script>

var home_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
	var away_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
	if(iframe_score_url != ""){
					 $("#scoreboard-box").html('<iframe id="iframe-tracker-1" width="100%" height="230px" src="'+iframe_score_url+'" style="overflow: hidden; border: 0px; height: 230px;" class="visible"></iframe>');
	}
	else
	{
	socket.on('liveScore', function(args){		
		if(args && args.score){
			<?php
				if($eventType == 1){
			?>
			
			 if(args.score.home){
				if(args.score.home.name){
					home_team_name = args.score.home.name;
					home_team_score = args.score.home.score;
					home_team_numberOfYellowCards = args.score.home.numberOfYellowCards;
					home_team_numberOfRedCards = args.score.home.numberOfRedCards;
					home_team_numberOfCorners = args.score.home.numberOfCorners;
					
				}
			}
			
			if(args.score.away){
				if(args.score.away.name){
					away_team_name = args.score.away.name;
					
					
					away_team_score = args.score.away.score;
					away_team_numberOfYellowCards = args.score.away.numberOfYellowCards;
					away_team_numberOfRedCards = args.score.away.numberOfRedCards;
					away_team_numberOfCorners = args.score.away.numberOfCorners;
					
					
				}
			}
			
			
			soccer_timeElapsed = 0;
			if(args && args.timeElapsed){
				soccer_timeElapsed = args.timeElapsed;
			}
			
			if(eventName2){
				html_score_card = 	"<div class='table-container table-responsive'>"+
							    "	<div class='' style='width:100%'>"+
								"	  <div class='col-sm-12' style='color:#FFFFFF;' id='footballScoreBoard'>"+
								"		 <table style='width:100%'>"+
								"			<tbody>"+
								"			   <tr>"+
								"				  <td style='text-align:center'><span class='badge badge-score' style='background-color:#55c331;padding:8px;'>LIVE</span></td>"+
								"			   </tr>"+
								"			   <tr>"+
								"				  <td style='text-align:center;color:#fff;font-size:17px;'>"+
								"					 <p class='mtitle'><img src='images/football_new.png?12' width='30' height='30'> "+eventName2+"</p>"+
								"				  </td>"+
								"			   </tr>"+
								"			   <tr>"+
								"				  <td style='text-align:center;color:#fff;font-size:17px;'>"+
								"					 <table style='width:100%;border-radius:20px;'>"+
								"						<thead>"+
								"						   <tr>"+
								"							  <th style='text-align:center;font-size:12px;'>&nbsp;</th>"+
								"							  <th style='text-align:center;font-size:12px;'>&nbsp;</th>"+
								"							  <th style='text-align:center;font-size:12px;'><span class='badge badge-score' style='background-color:yellow;width:20px;height:20px;'> </span></th>"+
								"							  <th style='text-align:center;font-size:12px;'><span class='badge badge-score' style='background-color:red;width:20px;height:20px;'> </span></th>"+
								"							  <th style='text-align:center;font-size:12px;'><img src='images/football_new.png?1' width='15' height='15'></th>"+
								"							  <th style='text-align:center;font-size:12px;'><img src='images/football_new.png?1' width='15' height='15'></th>"+
								"						   </tr>"+
								"						</thead>"+
								"						<tbody class='text-center'>"+
								"						   <tr style='background:#ffc722 !important;border-radius:20px;'>"+
								"							  <td style='text-align:left;font-size:14px;height:30px;padding:5px;color:#000'>"+home_team_name+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+home_team_score+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+home_team_numberOfYellowCards+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+home_team_numberOfRedCards+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+home_team_numberOfCorners+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>0-0</td>"+
								"						   </tr>"+
								"						   <tr style='background:#ffc722 !important;border-top:1px solid #000;'>"+
								"							  <td style='text-align:left;font-size:14px;height:30px;padding:5px;color:#000'>"+away_team_name+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+away_team_score+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+away_team_numberOfYellowCards+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+away_team_numberOfRedCards+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'>"+away_team_numberOfCorners+"</td>"+
								"							  <td style='text-align:center;font-size:12px;color:#000'></td>"+
								"						   </tr>"+
								"					</tbody>"+
								"					 </table>"+
								"				  </td>"+
								"			   </tr>"+
								"			</tbody>"+
								"		 </table>"+
								"	  </div>"+
								"  </div>"+
								"</div>";
								$("#scoreboard-box").html(html_score_card);
			}
			
			<?php
				}
			else if($eventType == 2){
			?>
			
			if(args.score.home){
				if(args.score.home.name){
					home_team_name = args.score.home.name;
					home_team_score = args.score.home.score;
					home_team_halfTimeScore = args.score.home.halfTimeScore;
					if(home_team_halfTimeScore == ""){
						home_team_halfTimeScore =0;
					}
					
					
					home_team_gameSequence = "";
					home_team_gameSequence2 = "";
					home_team_gameSequence3 = "";
					
					home_gameSequenceLength = args.score.home.gameSequence.length;
					if(home_gameSequenceLength >= 2){
						home_team_gameSequence = args.score.home.gameSequence[home_gameSequenceLength-2];
						home_team_gameSequence2 = args.score.home.gameSequence[home_gameSequenceLength-1];
						home_team_gameSequence3 = args.score.home.games;
					}
					else if(home_gameSequenceLength == 1){
						home_team_gameSequence = args.score.home.gameSequence[home_gameSequenceLength-1];
						home_team_gameSequence2 = args.score.home.games;
						home_team_gameSequence3 = "-";
					}
					else{
						home_team_gameSequence = args.score.home.games;
						home_team_gameSequence2 = "-";
						home_team_gameSequence3 = "-";
					}
					
					
					home_team_fullTimeScore = args.score.home.fullTimeScore;
					home_team_penaltiesScore = args.score.home.penaltiesScore;
					home_team_sets = args.score.home.sets;
					home_team_games = args.score.home.games;
					home_team_isServing = args.score.home.isServing;
					
					if(home_team_isServing == true){
						home_team_serving_true = '<span class="serviceon"><img src="images/tennis_ball_1.png" width="20" height="20"></span>';
					}
					else{
						home_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
					}
					
					
					
				}
			}
			
			if(args.score.away){
				if(args.score.away.name){
					away_team_name = args.score.away.name;
					
					away_team_score = args.score.away.score;
					away_team_halfTimeScore = args.score.away.halfTimeScore;
					if(away_team_halfTimeScore == ""){
						away_team_halfTimeScore =0;
					}
					
					
					away_team_gameSequence = "";
					away_team_gameSequence2 = "";
					away_team_gameSequence3 = "";
					
					away_gameSequenceLength = args.score.away.gameSequence.length;
					if(away_gameSequenceLength >= 2){
						away_team_gameSequence = args.score.away.gameSequence[away_gameSequenceLength-2];
						away_team_gameSequence2 = args.score.away.gameSequence[away_gameSequenceLength-1];
						away_team_gameSequence3 = args.score.away.games;
					}
					else if(away_gameSequenceLength == 1){
						away_team_gameSequence = args.score.away.gameSequence[away_gameSequenceLength-1];
						away_team_gameSequence2 = args.score.away.games;
						away_team_gameSequence3 = "-";
					}
					else{
						away_team_gameSequence = args.score.away.games;
						away_team_gameSequence2 = "-";
						away_team_gameSequence3 = "-";
					}
					
					
					away_team_fullTimeScore = args.score.away.fullTimeScore;
					away_team_penaltiesScore = args.score.away.penaltiesScore;
					away_team_sets = args.score.away.sets;
					away_team_games = args.score.away.games;
					
					away_team_isServing = args.score.away.isServing;
					
					if(away_team_isServing == true){
						away_team_serving_true = '<span class="serviceon"><img src="images/tennis_ball_1.png" width="20" height="20"></span>';
					}
					else{
						away_team_serving_true = '<span class="serviceoff">&nbsp;</span>';
					}
					
				}
			}
			
			currentSet = "";
			if(args.currentSet){
				currentSet = args.currentSet;
			}
			
			currentGame = "";
			if(args.currentGame){
				currentGame = args.currentGame;
			}
			
			var fullTimeShowMix = "";
			if(args.fullTimeElapsed){
				if(args.fullTimeElapsed.hour && args.fullTimeElapsed.min && args.fullTimeElapsed.sec){
					
					fullTimeHours = args.fullTimeElapsed.hour;
					fullTimeMin = args.fullTimeElapsed.min;
					fullTimeSec = args.fullTimeElapsed.sec;
					
					fullTimeShowMix = fullTimeHours+":"+fullTimeMin+":"+fullTimeSec;
					
				}
				
			}
			
			
			html_score_card = 	"<div class='table-container table-responsive'>"+
								"<div class='' style='width:100%'>"+
								"  <div class='col-sm-12' style='color:#FFFFFF;' id=''>"+
								"	 <table style='width:100%'>"+
								"		<tbody>"+
								"		   <tr>"+
								"			  <td style='text-align:center'><span class='badge badge-score' style='background-color:#55c331;padding:8px;'>LIVE</span></td>"+
								"		   </tr>"+
								"		   <tr>"+
								"			  <td style='text-align:center'>"+
								"				 <table style='width:100%'>"+
								"					<thead>"+
								"					   <tr>"+
								"						  <th></th>"+
								"						  <th width='16%' style='text-align:center;font-size:12px;'>1</th>"+
								"						  <th width='16%' style='text-align:center;font-size:12px;'>2</th>"+
								"						  <th width='16%' style='text-align:center;font-size:12px;'>3</th>"+
								"						  <th style='text-align:center;font-size:12px;width:16%'>Sets</th>"+
								"						  <th style='text-align:center;font-size:12px;width:16%'>Points</th>"+
								"					   </tr>"+
								"					</thead>"+
								"				<tbody>"+
								"					   <tr style='background:#ffc722 !important;color:#000;font-weight:bold;'>"+
								"						  <td style='text-align:left;font-size:12px;height:40px;padding:5px;'>"+home_team_serving_true+""+home_team_name+"</td>"+
								"						  <td width='16%' style='text-align:center;font-size:12px;'>"+home_team_gameSequence+"</td>"+
								"						  <td width='16%' style='text-align:center;font-size:12px;'>"+home_team_gameSequence2+"</td>"+
								"						  <td width='16%' style='text-align:center;font-size:12px;'>"+home_team_gameSequence3+"</td>"+
								"						  <td style='text-align:center;font-size:12px;'>"+home_team_sets+"</td>"+
								"						  <td style='text-align:center;font-size:12px;'>"+home_team_score+"</td>"+
								"					   </tr>"+
								"					   <tr style='background:#ffc722 !important;border-top:1px solid #000;color:#000;font-weight:bold;'>"+
								"						  <td style='text-align:left;font-size:12px;height:40px;padding:5px;'>"+away_team_serving_true+""+away_team_name+"</td>"+
								"						  <td width='16%' style='text-align:center;font-size:12px;'>"+away_team_gameSequence+"</td>"+
								"						  <td width='16%' style='text-align:center;font-size:12px;'>"+away_team_gameSequence2+"</td>"+
								"						  <td width='16%' style='text-align:center;font-size:12px;'>"+away_team_gameSequence3+"</td>"+
								"						  <td style='text-align:center;font-size:12px;'>"+away_team_sets+"</td>"+
								"						  <td style='text-align:center;font-size:12px;'>"+away_team_score+"</td>"+
								"					   </tr>"+
								"					</tbody>"+
								"				 </table>"+
								"			  </td>"+
								"		   </tr>"+
								"		</tbody>"+
								"	 </table>"+
								 " </div>"+
							   "</div>"+
							"</div>";
			
			
			$("#scoreboard-box").html(html_score_card);
			
								
			<?php
				}
			?>
			
			
		}
	});
	}
	
</script>
<script>
jQuery(document).on("click", ".back-1", function () {
    var fullmarketodds = $(this).attr("fullmarketodds");
    if(fullmarketodds != ""){	
            side = $(this).attr("side");
            selectionid = $(this).attr("selectionid");
            market_odd_name = $(this).attr("markettype");

            if(['ODDEVEN_ODDS','FANCY1_ODDS','BALL_ODDS','METER_ODDS','KHADO_ODDS'].includes($(this).attr("market_odd_name")))
                market_odd_name = $(this).attr("market_odd_name");

            runner = $(this).attr("runner");
            market_runner_name  = runner;
            marketname = $(this).attr("marketname");
            markettype = $(this).attr("markettype");
            fullfancymarketrate = $(this).attr("fullfancymarketrate");		

            runs_lable = 'Runs';
                    odds_change_value ="disabled";
                    if(markettype != 'FANCY_ODDS'){
                            odds_change_value ="";
                            runs_lable = 'Odds';
                            fullfancymarketrate = fullmarketodds;
                    }

            eventId = '<?php echo $event_id;?>';//$(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");			winnig_zone = 0;			if(markettype == "KHADO_ODDS"){				winnig_zone = $(this).attr("winnig_zone");			}			
            $(".select").removeClass("select");
            $(this).addClass("select");
            return_html = "";			
            return_html += "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th></th><th style='width: 35%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Odds</th><th style='width: 15%; text-align: left;'>Stake</th><th style='width: 15%; text-align: right;'>Profit</th></tr></thead><tbody>";
            return_html +="<tr><td class='text-center'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times'></i></a></td><td>"+runner+"</td><td class='bet-odds'><div class='form-group'> <input placeholder='0' value='"+fullmarketodds+"' id='odds_val' disabled readonly type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'><div class='spinner-buttons input-group-btn btn-group-vertical'> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-up'></i></button> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-down'></i></button></div></div></td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='"+eventId+"'/><input type='hidden' id='bet_marketId' value='"+selectionid+"'/><input type='hidden' id='bet_event_name' value='"+event_name+"'/><input type='hidden' id='bet_market_name' value='"+marketname+"'/><input type='hidden' id='bet_markettype' value='"+markettype+"'/><input type='hidden' id='fullfancymarketrate' value='"+fullfancymarketrate+"'/> <input type='hidden' id='oddsmarketId' value='"+marketId+"'/><input type='hidden' id='market_runner_name' value='"+market_runner_name+"'/><input type='hidden' id='market_odd_name' value='"+market_odd_name+"'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit' id='profitLiability'>"+winnig_zone+"</td></tr>";
            return_html +="<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
                    <?php
                            $get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
                            $num_rows = $get_button_value->num_rows;
                            $button_array = array();
                            if($num_rows <= 0){
                                $button_array[] = 1000;
								$button_array[] = 5000;
								$button_array[] = 10000;
								$button_array[] = 25000;
								$button_array[] = 50000;
								$button_array[] = 100000;
								$button_array[] = 200000;
								$button_array[] = 500000;
								$button_array[] = 1000000;
								$button_array[] = 2500000;
                            }else{
                                    $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                                    $fetch_button_value = $fetch_button_value_data['button_value'];
                                    $default_stake = $fetch_button_value_data['default_stake'];
                                    $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                                    $button_array = explode(",",$fetch_button_value);
                            }
                            foreach($button_array as $button_value){
                    ?>
                            return_html +=" <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake'> <?php echo $button_value; ?> </button>";
                    <?php
                            }
                    ?>
              return_html +="</td></tr></tbody></table><div class='col-md-12'> <button type='button' class='btn btn-sm btn-danger float-left close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></form></div></div></div>"
              $(".bet_slip_details").html(return_html);
    }
});

jQuery(document).on("click", ".lay-1", function () {
    var fullmarketodds = $(this).attr("fullmarketodds");
    if(fullmarketodds != ""){	
            side = $(this).attr("side");
            selectionid = $(this).attr("selectionid");
            market_odd_name = $(this).attr("markettype");


            if(['ODDEVEN_ODDS','FANCY1_ODDS','BALL_ODDS','METER_ODDS','KHADO_ODDS'].includes($(this).attr("market_odd_name")))
                market_odd_name = $(this).attr("market_odd_name");

            runner = $(this).attr("runner");
            market_runner_name  = runner;
            marketname = $(this).attr("marketname");
            markettype = $(this).attr("markettype");
            fullfancymarketrate = $(this).attr("fullfancymarketrate");	

            runs_lable = 'Runs';
                    odds_change_value = "disabled";
                    if(markettype != 'FANCY_ODDS'){
                            odds_change_value = "";
                            runs_lable = 'Odds';
                            fullfancymarketrate = fullmarketodds;
                    }
            eventId = '<?php echo $event_id;?>';//$(this).attr("eventid");
            marketId = $(this).attr("marketid");
            event_name = $(this).attr("event_name");
            $(".select").removeClass("select");
            $(this).addClass("select");
            return_html = "";
            return_html += "<div class='bet-slip-data'><div><div class='table-responsive lay'><form><table class='coupon-table table table-borderedless'><thead><tr><th></th><th style='width: 35%; text-align: left;'>(Bet for)</th><th style='width: 25%; text-align: left;'>Odds</th><th style='width: 15%; text-align: left;'>Stake</th><th style='width: 15%; text-align: right;'>Liability</th></tr></thead><tbody>";
            return_html +="<tr><td class='text-center'><a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times'></i></a></td><td>"+runner+"</td><td class='bet-odds'><div class='form-group'> <input placeholder='0' value='"+fullmarketodds+"' id='odds_val' disabled readonly type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'><div class='spinner-buttons input-group-btn btn-group-vertical'> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-up'></i></button> <button disabled='disabled' class='custom-btn-spinner btn btn-xs btn-default'><i class='fa fa-angle-down'></i></button></div></div></td><td class='bet-stakes'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Lay'/><input type='hidden' id='bet_event_id' value='"+eventId+"'/><input type='hidden' id='bet_marketId' value='"+selectionid+"'/><input type='hidden' id='bet_event_name' value='"+event_name+"'/><input type='hidden' id='bet_market_name' value='"+marketname+"'/><input type='hidden' id='bet_markettype' value='"+markettype+"'/><input type='hidden' id='fullfancymarketrate' value='"+fullfancymarketrate+"'/> <input type='hidden' id='oddsmarketId' value='"+marketId+"'/><input type='hidden' id='market_runner_name' value='"+market_runner_name+"'/><input type='hidden' id='market_odd_name' value='"+market_odd_name+"'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit' id='profitLiability'>0</td></tr>";
            return_html +="<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
                    <?php
                            $get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
                            $num_rows = $get_button_value->num_rows;
                            $button_array = array();
                            if($num_rows <= 0){
								$button_array[] = 1000;
								$button_array[] = 5000;
								$button_array[] = 10000;
								$button_array[] = 25000;
								$button_array[] = 50000;
								$button_array[] = 100000;
								$button_array[] = 200000;
								$button_array[] = 500000;
								$button_array[] = 1000000;
								$button_array[] = 2500000;
                            }else{
								$fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
								$fetch_button_value = $fetch_button_value_data['button_value'];
								$default_stake = $fetch_button_value_data['default_stake'];
								$one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
								$button_array = explode(",",$fetch_button_value);
                            }
                            foreach($button_array as $button_value){
                    ?>
                            return_html +=" <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake'> <?php echo $button_value; ?> </button>";
                    <?php
                            }
                    ?>
              return_html +="</td></tr></tbody></table><div class='col-md-12'> <button type='button' class='btn btn-sm btn-danger float-left close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></form></div></div></div>"
              $(".bet_slip_details").html(return_html);
    }
});

jQuery(document).on("input", "#inputStake", function () {
	var stake = $("#inputStake").val();
	eventId = $(".event_name_heading").attr("eventid");
	$("#inputStake").val(stake);
	odds = parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(inputStake >= 1){
		$("#placeBets").removeClass('disable');
	}else{
		$("#placeBets").addClass('disable');
	}
	if(bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS"){
            odds = (odds/100)+1;
        }
	if(bet_markettype != "FANCY_ODDS"){
            if(bet_stake_side == "Lay"){
                    profit = parseInt(inputStake);
            }else{
                    profit = (odds - 1 ) * inputStake;
            }
		// net exposure
		bet_marketId = $("#bet_marketId").val();
		bet_event_id = $("#bet_event_id").val();
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/place_bet_net_exposure_v2.php',
			 dataType: 'json',
			 data: {eventId:bet_event_id,stack:inputStake,runs:odds,bet_market_type:bet_markettype,marketId:bet_marketId,bet_stake_side:bet_stake_side,market_ids:selectorIdArray},
			 success: function(response) {
						 var status = response.status;
						if(status == 'ok'){
							
							
							if(response.data){
								//if(response.data == "MATCH_ODDS" ){
								for(var i in response.data){
									var market_1 = parseInt(response.data[i].market_ids.team_1);
									var market_2 = parseInt(response.data[i].market_ids.team_2);
									var market_3 = parseInt(response.data[i].market_ids.team_3);
									var market_4 = parseInt(response.data[i].market_ids.team_4);
									var market_5 = parseInt(response.data[i].market_ids.team_5);
									var market_6 = parseInt(response.data[i].market_ids.team_6);
									var market_7 = parseInt(response.data[i].market_ids.team_7);
									var market_8 = parseInt(response.data[i].market_ids.team_8);
									var market_9 = parseInt(response.data[i].market_ids.team_9);
									var market_10 = parseInt(response.data[i].market_ids.team_10);
									var team_1_exposure= parseInt(response.data[i].exposure.team_1);
									var team_2_exposure= parseInt(response.data[i].exposure.team_2);
									var team_3_exposure= parseInt(response.data[i].exposure.team_3);
									var team_4_exposure= parseInt(response.data[i].exposure.team_4);
									var team_5_exposure= parseInt(response.data[i].exposure.team_5);
									var team_6_exposure= parseInt(response.data[i].exposure.team_6);
									var team_7_exposure= parseInt(response.data[i].exposure.team_7);
									var team_8_exposure= parseInt(response.data[i].exposure.team_8);
									var team_9_exposure= parseInt(response.data[i].exposure.team_9);
									var team_10_exposure= parseInt(response.data[i].exposure.team_10);
									added_team_1 = selectorIdArray[0];
									added_team_2 = selectorIdArray[1];
									if(selectorIdArray[2]){
										added_team_3 = selectorIdArray[2];
									}
									added_team_4 = selectorIdArray[3];
									added_team_5 = selectorIdArray[4];
									added_team_6 = selectorIdArray[5];
									added_team_7 = selectorIdArray[6];
									added_team_8 = selectorIdArray[7];
									added_team_9 = selectorIdArray[8];
									added_team_10 = selectorIdArray[9];
									if(market_1 == NaN && market_2 == NaN && market_3 == NaN){
										$("#live_match_points_"+added_team_3+"_"+i).text(0);
										$("#live_match_points_"+added_team_2+"_"+i).text(0);
										$("#live_match_points_"+added_team_1+"_"+i).text(0);
									}
									$("#live_match_points_"+market_1+"_"+i).text(team_1_exposure);
									if(team_1_exposure >= 0){
										$("#live_match_points_"+market_1+"_"+i).css('color','green');
									}
									else{
										$("#live_match_points_"+market_1+"_"+i).css('color','red');
									}
									$("#live_match_points_"+market_2+"_"+i).text(team_2_exposure);
									if(team_2_exposure >= 0){
										$("#live_match_points_"+market_2+"_"+i).css('color','green');
									}
									else{
										$("#live_match_points_"+market_2+"_"+i).css('color','red');
									}
									$("#live_match_points_"+market_3+"_"+i).text(team_3_exposure);
									if(team_3_exposure >= 0){
										$("#live_match_points_"+market_3+"_"+i).css('color','green');
									}
									else{
										$("#live_match_points_"+market_3+"_"+i).css('color','red');
									}
									if(team_4_exposure){
										$("#live_match_points_"+market_4+"_"+i).text(team_4_exposure);
										if(team_4_exposure >= 0){
											$("#live_match_points_"+market_4+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_4+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_5+"_"+i).text(team_5_exposure);
										if(team_5_exposure >= 0){
											$("#live_match_points_"+market_5+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_5+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_6+"_"+i).text(team_6_exposure);
										if(team_6_exposure >= 0){
											$("#live_match_points_"+market_6+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_6+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_7+"_"+i).text(team_7_exposure);
										if(team_7_exposure >= 0){
											$("#live_match_points_"+market_7+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_7+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_8+"_"+i).text(team_8_exposure);
										if(team_8_exposure >= 0){
											$("#live_match_points_"+market_8+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_8+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_9+"_"+i).text(team_9_exposure);
										if(team_9_exposure >= 0){
											$("#live_match_points_"+market_9+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_9+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_10+"_"+i).text(team_10_exposure);
										if(team_10_exposure >= 0){
											$("#live_match_points_"+market_10+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_10+"_"+i).css('color','red');
										}
									}
								}
								
							}
						
						}
					 }
		});
		// net exposure
	}else{
		fullfancymarketrate = $("#fullfancymarketrate").val();
		if(fullfancymarketrate > 100){
			profit = fullfancymarketrate * inputStake / 100;
		}else{
			profit = fullfancymarketrate * inputStake / 100;
		}
		
		bet_marketId = $("#bet_marketId").val();
		bet_event_id = $("#bet_event_id").val();
		market_odds = fullfancymarketrate;
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/place_bet_net_exposure_v2.php',
			 dataType: 'json',
			 data: {eventId:bet_event_id,market_odds:market_odds,stack:inputStake,runs:odds,bet_market_type:bet_markettype,marketId:bet_marketId,bet_stake_side:bet_stake_side,market_ids:selectorIdArray},
			 success: function(response) {
						 var status = response.status;
						if(status == 'ok'){
							
							
							if(response.data){
								
								for(var i in response.data){
									if(i == "FANCY_ODDS"){
										for(j in response.data[i]){
											var fancy_market_ids = response.data[i][j].market_ids.team_1;
											var fancy_exposure = response.data[i][j].exposure.team_1;
											
											if(fancy_exposure > 0){
												$("#live_match_points_"+fancy_market_ids+"_"+i).css('color','green');
											}else{
												$("#live_match_points_"+fancy_market_ids+"_"+i).css('color','red');
											}
											$("#live_match_points_"+fancy_market_ids+"_"+i).text(fancy_exposure);
											$("#live_match_points_"+fancy_market_ids+"_"+i).show();
										}
									}
									
								}
								
							}
						
						}
					 }
		});
	}
	if(bet_markettype == "MATCH_ODDS" || bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS"){
		$("#profitLiability").text(profit.toFixed(2));
	}
	$("#placeBet").removeAttr('disabled');
});
jQuery(document).on("click", ".label_stake", function () {
   stake = $(this).attr("stake");
   eventId = $(".event_name_heading").attr("eventid");
	$("#inputStake").val(stake);
	odds =  parseFloat($("#odds_val").val());
    inputStake = $("#inputStake").val();
    bet_stake_side = $("#bet_stake_side").val();
	bet_markettype = $("#bet_markettype").val();
	if(inputStake >= 1){
		$("#placeBets").removeClass('disable');
	}else{
		$("#placeBets").addClass('disable');
	}
	if(bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS"){
            odds = (odds/100)+1;
        }
	if(bet_markettype != "FANCY_ODDS"){
		if(bet_stake_side == "Lay"){
			profit = (odds - 1 ) * inputStake;
		}else{
			profit = (odds - 1 ) * inputStake;
		}
		// net exposure
		bet_marketId = $("#bet_marketId").val();
		bet_event_id = $("#bet_event_id").val();
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/place_bet_net_exposure_v2.php',
			 dataType: 'json',
			 data: {eventId:bet_event_id,stack:inputStake,runs:odds,bet_market_type:bet_markettype,marketId:bet_marketId,bet_stake_side:bet_stake_side,market_ids:selectorIdArray},
			 success: function(response) {
						 var status = response.status;
						if(status == 'ok'){
							
							
							if(response.data){
								//if(response.data == "MATCH_ODDS" ){
								for(var i in response.data){
									var market_1 = parseInt(response.data[i].market_ids.team_1);
									var market_2 = parseInt(response.data[i].market_ids.team_2);
									var market_3 = parseInt(response.data[i].market_ids.team_3);
									var market_4 = parseInt(response.data[i].market_ids.team_4);
									var market_5 = parseInt(response.data[i].market_ids.team_5);
									var market_6 = parseInt(response.data[i].market_ids.team_6);
									var market_7 = parseInt(response.data[i].market_ids.team_7);
									var market_8 = parseInt(response.data[i].market_ids.team_8);
									var market_9 = parseInt(response.data[i].market_ids.team_9);
									var market_10 = parseInt(response.data[i].market_ids.team_10);
									var team_1_exposure= parseInt(response.data[i].exposure.team_1);
									var team_2_exposure= parseInt(response.data[i].exposure.team_2);
									var team_3_exposure= parseInt(response.data[i].exposure.team_3);
									var team_4_exposure= parseInt(response.data[i].exposure.team_4);
									var team_5_exposure= parseInt(response.data[i].exposure.team_5);
									var team_6_exposure= parseInt(response.data[i].exposure.team_6);
									var team_7_exposure= parseInt(response.data[i].exposure.team_7);
									var team_8_exposure= parseInt(response.data[i].exposure.team_8);
									var team_9_exposure= parseInt(response.data[i].exposure.team_9);
									var team_10_exposure= parseInt(response.data[i].exposure.team_10);
									added_team_1 = selectorIdArray[0];
									added_team_2 = selectorIdArray[1];
									if(selectorIdArray[2]){
										added_team_3 = selectorIdArray[2];
									}
									added_team_4 = selectorIdArray[3];
									added_team_5 = selectorIdArray[4];
									added_team_6 = selectorIdArray[5];
									added_team_7 = selectorIdArray[6];
									added_team_8 = selectorIdArray[7];
									added_team_9 = selectorIdArray[8];
									added_team_10 = selectorIdArray[9];
									if(market_1 == NaN && market_2 == NaN && market_3 == NaN){
										$("#live_match_points_"+added_team_3+"_"+i).text(0);
										$("#live_match_points_"+added_team_2+"_"+i).text(0);
										$("#live_match_points_"+added_team_1+"_"+i).text(0);
									}
									$("#live_match_points_"+market_1+"_"+i).text(team_1_exposure);
									if(team_1_exposure >= 0){
										$("#live_match_points_"+market_1+"_"+i).css('color','green');
									}
									else{
										$("#live_match_points_"+market_1+"_"+i).css('color','red');
									}
									$("#live_match_points_"+market_2+"_"+i).text(team_2_exposure);
									if(team_2_exposure >= 0){
										$("#live_match_points_"+market_2+"_"+i).css('color','green');
									}
									else{
										$("#live_match_points_"+market_2+"_"+i).css('color','red');
									}
									$("#live_match_points_"+market_3+"_"+i).text(team_3_exposure);
									if(team_3_exposure >= 0){
										$("#live_match_points_"+market_3+"_"+i).css('color','green');
									}
									else{
										$("#live_match_points_"+market_3+"_"+i).css('color','red');
									}
									if(team_4_exposure){
										$("#live_match_points_"+market_4+"_"+i).text(team_4_exposure);
										if(team_4_exposure >= 0){
											$("#live_match_points_"+market_4+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_4+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_5+"_"+i).text(team_5_exposure);
										if(team_5_exposure >= 0){
											$("#live_match_points_"+market_5+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_5+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_6+"_"+i).text(team_6_exposure);
										if(team_6_exposure >= 0){
											$("#live_match_points_"+market_6+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_6+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_7+"_"+i).text(team_7_exposure);
										if(team_7_exposure >= 0){
											$("#live_match_points_"+market_7+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_7+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_8+"_"+i).text(team_8_exposure);
										if(team_8_exposure >= 0){
											$("#live_match_points_"+market_8+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_8+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_9+"_"+i).text(team_9_exposure);
										if(team_9_exposure >= 0){
											$("#live_match_points_"+market_9+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_9+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_10+"_"+i).text(team_10_exposure);
										if(team_10_exposure >= 0){
											$("#live_match_points_"+market_10+"_"+i).css('color','green');
										}
										else{
											$("#live_match_points_"+market_10+"_"+i).css('color','red');
										}
									}
								}
								
							}
						
							
						}
					 }
		});
		// net exposure
	}
	else{
		fullfancymarketrate = $("#fullfancymarketrate").val();
		if(fullfancymarketrate > 100){
			profit = fullfancymarketrate * inputStake / 100;
		}else{
			profit = fullfancymarketrate * inputStake / 100;
		}
		
		bet_marketId = $("#bet_marketId").val();
		bet_event_id = $("#bet_event_id").val();
		market_odds = fullfancymarketrate;
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/place_bet_net_exposure_v2.php',
			 dataType: 'json',
			 data: {eventId:bet_event_id,market_odds:market_odds,stack:inputStake,runs:odds,bet_market_type:bet_markettype,marketId:bet_marketId,bet_stake_side:bet_stake_side,market_ids:selectorIdArray},
			 success: function(response) {
						 var status = response.status;
						if(status == 'ok'){
							
							
							if(response.data){
								
								for(var i in response.data){
									if(i == "FANCY_ODDS"){
										for(j in response.data[i]){
											var fancy_market_ids = response.data[i][j].market_ids.team_1;
											var fancy_exposure = response.data[i][j].exposure.team_1;
											
											if(fancy_exposure > 0){
												$("#live_match_points_"+fancy_market_ids+"_"+i).css('color','green');
											}else{
												$("#live_match_points_"+fancy_market_ids+"_"+i).css('color','red');
											}
											$("#live_match_points_"+fancy_market_ids+"_"+i).text(fancy_exposure);
											$("#live_match_points_"+fancy_market_ids+"_"+i).show();
										}
									}
									
								}
								
							}
						
						}
					 }
		});
	}
	if(bet_markettype == "MATCH_ODDS" || bet_markettype == "BOOKMAKER_ODDS"){
		$("#profitLiability").text(profit.toFixed(2));
	}
	$("#placeBet").removeAttr('disabled');
});
jQuery(document).on("click", ".close-bet-slip", function () {
	 $('.bet-slip-data').remove();
	 $(".back-1").removeClass("select");
	$(".lay-1").removeClass("select");
	getlive_match_point();
 });
 
 setTimeout(getlive_match_point,3000);
 
function getlive_match_point(){
var added_team_1;
var added_team_2;
var added_team_3;
	var eventId = <?php echo $event_id; ?>;
				$.ajax({
					 type: 'POST',
					 url: 'ajaxfiles/get_live_match_points_v2.php',
					 dataType: 'json',
					 data: {eventId:eventId,market_ids:selectorIdArray},
					 success: function(response) {
						 
						 var status = response.status;
						 
						if(status == 'ok'){
							if(response.data){
								//if(response.data == "MATCH_ODDS" ){
									
									if(!response.data['MATCH_ODDS']){
									var ij = 0;
									while(selectorIdArray[ij]){
										$("#live_match_points_"+selectorIdArray[ij]+"_MATCH_ODDS").text(0);
										$("#live_match_points_"+selectorIdArray[ij]+"_MATCH_ODDS").css('color','black');
										ij++;
									}
									
									var ij = 0;
									while(selectorIdBookmakerArray[ij]){
										$("#live_match_points_"+selectorIdBookmakerArray[ij]+"_BOOKMAKER_ODDS").text(0);
										$("#live_match_points_"+selectorIdBookmakerArray[ij]+"_BOOKMAKER_ODDS").css('color','black');
										$("#live_match_points_"+selectorIdBookmakerArray[ij]+"_BOOKMAKERSMALL_ODDS").text(0);
										$("#live_match_points_"+selectorIdBookmakerArray[ij]+"_BOOKMAKERSMALL_ODDS").css('color','black');
										ij++;
									}
								}
								
								for(var i in response.data){
									if(i != "FANCY_ODDS" && i != "METER_ODDS" && i != "KHADO_ODDS"){
									
										var market_1 = 0;
										var market_2 = 0;
										var market_3 = 0;
										if(response.data[i].market_ids){
											market_1 = parseInt(response.data[i].market_ids.team_1);
											market_2 = parseInt(response.data[i].market_ids.team_2);
											market_3 = parseInt(response.data[i].market_ids.team_3);
										}
										var team_1_exposure = 0;
										var team_2_exposure = 0;
										var team_3_exposure = 0;
										if(response.data[i].exposure){
											team_1_exposure= parseInt(response.data[i].exposure.team_1);
											team_2_exposure= parseInt(response.data[i].exposure.team_2);
											team_3_exposure= parseInt(response.data[i].exposure.team_3);
										}
										added_team_1 = selectorIdArray[0];
										added_team_2 = selectorIdArray[1];
										if(selectorIdArray[2]){
											added_team_3 = selectorIdArray[2];
										}
										if(market_1 == NaN && market_2 == NaN && market_3 == NaN){
											$("#live_match_points_"+added_team_3+"_"+i).text(0);
											$("#live_match_points_"+added_team_2+"_"+i).text(0);
											$("#live_match_points_"+added_team_1+"_"+i).text(0);
										}
										$("#live_match_points_"+market_1+"_"+i).text(team_1_exposure);
										if(team_1_exposure >= 0){
											$("#live_match_points_"+market_1+"_"+i).css('color','green');
										}else{
											$("#live_match_points_"+market_1+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_2+"_"+i).text(team_2_exposure);
										if(team_2_exposure >= 0){
											$("#live_match_points_"+market_2+"_"+i).css('color','green');
										}else{
											$("#live_match_points_"+market_2+"_"+i).css('color','red');
										}
										$("#live_match_points_"+market_3+"_"+i).text(team_3_exposure);
										if(team_3_exposure >= 0){
											$("#live_match_points_"+market_3+"_"+i).css('color','green');
										}else{
											$("#live_match_points_"+market_3+"_"+i).css('color','red');
										}
									}else{
										
										for(j in response.data[i]){
											var fancy_market_ids = response.data[i][j].market_ids.team_1;
											var fancy_exposure = response.data[i][j].exposure.team_1;
											
											if(fancy_exposure > 0){
												$("#live_match_points_"+fancy_market_ids+"_"+i).css('color','green');
											}else{
												$("#live_match_points_"+fancy_market_ids+"_"+i).css('color','red');
											}
											$("#live_match_points_"+fancy_market_ids+"_"+i).text(fancy_exposure);
											$("#live_match_points_"+fancy_market_ids+"_"+i).show();
										}
									}
								}
								
							}
						}
					 }
				});
}	
jQuery(document).on("click", "#placeBet", function () {
	 $("#placeBet").html('<i class="fa fa-spinner  fa-spin"></i> Submit');
	 $("#placeBet").addClass('disabled');
		var last_place_bet= "";
		bet_stake_side = $("#bet_stake_side").val();
		bet_type = bet_stake_side;
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = '<?php echo $marketId; ?>';
		eventType = <?php echo $eventType; ?>;
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
			//bet_market_type = "MATCH_ODDS";
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
		}else{
			bet_market_type = "FANCY_ODDS";
			fullfancymarketrate = oddsNo;
			if(fullfancymarketrate > 100){
				return_stake = parseInt(inputStake);
			}else{
				return_stake = fullfancymarketrate * inputStake / 100;
				return_stake = parseInt(return_stake);
			}
			runsNo = $('#odds_val').val(); //$('.select').attr("fullmarketodds");
			oddsNo = $('#fullfancymarketrate').val(); //$('.select').attr("fullfancymarketrate"); 
		}
		$(".placeBet").addClass("disable");
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
		$("#placeBets").addClass('disable');
		$("#bet-error-class").removeClass("b-toast-danger");
		$("#bet-error-class").removeClass("b-toast-success");
		
		$.ajax({
			 type: 'POST',
			 url: 'ajaxfiles/bet_place_v2.php',
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
				refresh(1,eventIdOpenbet);
			 }
		 });
	});
	
	function view_fancy_bet_book(event_id,market_id){
				$(".loader").show();
				$.ajax({
					 type: 'POST',
					 url: 'ajaxfiles/view_fancy_bet_book.php',
					 dataType: 'text',
					 data: {event_id:event_id,market_id:market_id},
					 success: function(response) {
						 $(".loader").hide();
						 $("#fancy_bet_book_run").html(response);
						 $("#view_fancy_bet_book").modal('show');
					 }
				});
			}
	</script>
	<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>
	
	<div id="view_fancy_bet_book" class="modal" role="dialog" style="display: none;">
   <div class="modal-dialog" style="    max-width: 20% !important;">
        <div class="modal-dialog modal-lg">
            <div role="document" id="__BVID__51___BV_modal_content_" tabindex="-1" class="modal-content">
                <header id="__BVID__51___BV_modal_header_" class="modal-header">
                    <h5 class="modal-title" id="result_title">Run Position</h5>
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div id="__BVID__51___BV_modal_body_" class="modal-body">
                    <!---->
                    <!---->
                    <div id="fancy_bet_book_run">
                        
                    </div>
                </div>
                <!---->
            </div></div>
    </div>
    
</div>

<?php
	include("event_full_market_rules_popup.php");
?>