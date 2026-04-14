<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../session.php');
include('../include/market_limit.php');
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
	if($eventType == 1 or $eventType == 2 or $eventType ==4 or $eventType ==5 or $eventType ==8 or $eventType ==7522){
	}else{
		header("Location: index");
	}
}else{
	header("Location: index");
}

$market_limit_data = get_market_limit($conn,$event_id,$marketId,true,$eventType);

$match_max = $bookmaker_min = $bookmaker_max = $bookmakersmall_max = 1;
if(!empty($market_limit_data)){
	$match_max = $market_limit_data['match_max'];
	$bookmaker_min = $market_limit_data['bookmaker_min'];
	if(get_inplay_status($marketId))
		$bookmaker_max = $market_limit_data['bookmaker_live'];
	else
		$bookmaker_max = $market_limit_data['bookmaker_max'];
		
	$bookmakersmall_max = 25000;
}

$event_name = '';
if($event_id == ELECTION_EVENT_ID){
	$event_name = ELECTION_MARKET_NAME;
}
elseif($event_id == IPL_EVENT_ID){
	$event_name = 'Indian Premier League';//IPL_MARKET_NAME;
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
	include("head_css.php");
?>
    <style>
        .back1 {
            background-color: rgba(114,187,239,.5);
        }
        .lay1 {
            background-color: rgba(250,169,186,.5);
        }
        .rate_change_link {
            background : #FD7 !important;
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
                <div style="position: relative;">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a data-toggle="tab" href="#odds" class="nav-link active">Odds</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#match" class="nav-link">Matched Bet (
                <span id="count_open_bet">0</span>  )</a></li>
                    </ul>
                    <div id="tvvv" onclick="openTV();" class="tv-icon">
                        <p class="mb-0"><i class="fas fa-tv"></i></p>
                    </div>
                    <div class="tab-content">
                        <div id="odds" class="tab-pane active">
                            <div id="matchDate1" class="match-title mt-1"><span class="match-name event_name_heading"><?php echo $event_name;?></span> <span class="float-right" id="matchdate"></span></div>
                            
                            <?php if($eventType == 4){ ?>
								<div id="scoreboard-box"></div>
							<?php } else if($eventType == 1 || $eventType == 2){ ?>
								<div class="col-xl-12" style="border: 3px solid #000;padding: 0px;">
									<iframe id="iframe-tracker-1" width="100%" height="230px" src="http://7777exch.com/ScorePanel.aspx?Eventid=<?php echo $event_id; ?>" style="overflow: hidden; border: 0px; height: 230px;" class="visible"></iframe>
								</div>
							<?php }?>
                            <!---->
                            <div id="match_odds_all_full_markets"></div>
                            <div id="bookmaker_market_div_secure" style="display:none;"> </div>
                            
                            <div id="bookmakersmall1_market_div_secure" style="display:none;"> </div>
                            <!---->
                            <?php if($eventType == 4 || $eventType == 8){ ?>
								<div class="">
									<ul class="nav nav-tabs mt-2 fancy-nav">
										<li class="nav-item active"><a href="#fancy" data-toggle="tab" href="javascript:void(0)" class="nav-link active">Fancy</a></li>
										<li class="nav-item"><a href="#fancy1" data-toggle="tab" href="javascript:void(0)" class="nav-link">Fancy 1</a></li>
										<li class="nav-item"><a href="#meter" data-toggle="tab" href="javascript:void(0)" class="nav-link">Meter</a></li>
										<li class="nav-item"><a href="#khado" data-toggle="tab" href="javascript:void(0)" class="nav-link">Khado</a></li>
										<li class="nav-item"><a href="#oddeven" data-toggle="tab" href="javascript:void(0)" class="nav-link">Odd Even</a></li>
										<li class="nav-item"><a href="#wicket" data-toggle="tab" href="javascript:void(0)" class="nav-link">Wicket</a></li>
										<li class="nav-item"><a href="#four" data-toggle="tab" href="javascript:void(0)" class="nav-link">Four</a></li>
										<li class="nav-item"><a href="#six" data-toggle="tab" href="javascript:void(0)" class="nav-link">Six</a></li>
										<li class="nav-item"><a href="#cc" data-toggle="tab" href="javascript:void(0)" class="nav-link">Cricket Casino</a></li>
									</ul>
									<div class="tab-content">
										<div id="fancy" class="tab-pane active">
											<div class="fancy-market">
												<div id="fancy_odds_market" style="display:none;">
													<div class="table-header"><div class="market-title float-left country-name box-4"><span>Fancy Market</span> <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p></div> <div class="box-1 float-left lay text-center"><b>NO</b></div> <div class="back box-1 float-left back text-center"><b>YES</b></div></div>
													<div class="table-body">
														<div id="secure"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
											
												<div id="ball_odds_market" style="display:none;">
													<div class="table-header"><div class="market-title float-left country-name box-4"><span>Ball By Ball Session</span> <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p></div> <div class="box-1 float-left lay text-center"><b>NO</b></div> <div class="back box-1 float-left back text-center"><b>YES</b></div></div>
													<div class="table-body">
														<div id="secure_ball"></div>

													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
										</div>
										</div>
										<div id="fancy1" class="tab-pane">
											<div class="fancy-market">
												<div id="fancy_odds_market1" style="display:none;">
													<div class="table-header"><div class="market-title float-left country-name box-4"><span>Fancy1 Market</span> <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p></div> <div class="box-1 float-left lay text-center"><b>LAY</b></div> <div class="back box-1 float-left back text-center"><b>BACK</b></div></div>
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
											<div id="meter_odds_market" style="display:none;">
												<div class="fancy-market">
													<div class="table-header"><div class="market-title float-left country-name box-4"><span>Meter Market</span> <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p></div> <div class="box-1 float-left lay text-center"><b>LAY</b></div> <div class="back box-1 float-left back text-center"><b>BACK</b></div></div>
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
										
											<div id="khado_odds_market" style="display:none;">
												<div class="fancy-market">
													<div class="table-header"><div class="market-title float-left country-name box-4"><span>Khado Market</span> <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p></div> <div class="back box-1 float-left back text-center"><b>BACK</b></div> <div class="box-1 float-left lay text-center"><b>LAY</b></div></div>
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
											<!--<div class="no-record-msg">No real-time records found</div>-->
											<div class="fancy-market">
												<div id="oddeven_odds_market" style="display:none;">
													<div class="table-header"><div class="market-title float-left country-name box-4"><span>Odd Even Market</span> <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p></div> <div class="box-1 float-left back text-center"><b>ODD</b></div> <div class="back box-1 float-left back text-center"><b>EVEN</b></div></div>
													<div class="table-body">
														<div id="secure_oddeven"></div>
													</div>
													<!---->
													<div>
														<!---->
													</div>
												</div>
											</div>
										</div>
										<div id="wicket" class="tab-pane">
											<div class="no-record-msg">No real-time records found</div>
										</div>
										<div id="four" class="tab-pane">
											<div class="no-record-msg">No real-time records found</div>
										</div>
										<div id="six" class="tab-pane">
											<div class="no-record-msg">No real-time records found</div>
										</div>
										<div id="cc" class="tab-pane">
											<div class="no-record-msg">No real-time records found</div>
										</div>
									</div>
								</div>
                            <?php } ?>
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
</html>
<div id="errorMsg" class="b-toaster b-toaster-top-center" style="display:none;">
	<div class="b-toaster-slot vue-portal-target">
		<div role="alert" aria-live="assertive" aria-atomic="true" id="bet-error-class" class="b-toast b-toast-solid b-toast-prepend b-toast-danger">
			<div tabindex="0"  class="toast">           
				 <header class="toast-header">
				 	<strong class="mr-2" id="errorMsgText"></strong>                
				 	<button type="button" aria-label="Close" class="close ml-auto mb-1">&times;</button>            
				 </header>            
				<div class="toast-body"> 
				</div>       
			</div>    
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>
<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">   
var GAME_ID = '<?php echo $event_id; ?>';
//var GAME_ID = "30065962";
//var SCOREBOARD_SOCKET_URL = "wss://sportsscore24.com";
var SCOREBOARD_URL = "wss://sportsscore24.com/";
var ssocket = null;
var socketScoreBoard;
scoreboardConnect();

function scoreboardConnect(){
     socketScoreBoard = io.connect(SCOREBOARD_URL, { transports: ['websocket'] });
	console.log(1);
    socketScoreBoard.on("connect", function() {
    	console.log(2);
      socketScoreBoard.emit("subscribe", {
        type: 1,
        rooms: [parseInt(GAME_ID)]
      });
    });
    socketScoreBoard.on("error", function(abc) {
      console.log(abc);
    });
    socketScoreBoard.on("update", function(response) {
      console.log(response);
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
      // console.log("disconnect");
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

function openTV(){
	var name = "collapseTV";
	if($("#" + name).length == 0) {
		$("#matchDate1" ).append('<div data-v-68a8f00a="" id="collapseTV"><iframe data-v-68a8f00a="" src="http://www.7777exch.com/LiveVideoMatch/<?php echo $marketId;?>/250" width="100%" height="250" class="video-iframe"></iframe></div>');
 		
	}
	else{
		$("#" + name).remove();
	}	
}
</script>
<script>
    var SKIP_FANCY_EVENTID = ('<?php echo SKIP_FANCY; ?>').split(',');
    
    var html_fancy_market_new="";
    var html_fancy_market_new1="";
    var html_ball_market_new="";
    var html_khado_market_new="";
    var html_meter_market_new="";
    var html_oddeven_market_new ="";
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

    var site_url = '<?php echo WEB_URL; ?>';
    var socket = io("<?php echo SPORTS_SOCKET; ?>");

    function kFormatter(num) {
        return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + ' K' : Math.sign(num)*Math.abs(num)
    }

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

    socket.on('connect', function() {
        socket.emit('getOddData', {
            eventId: '<?php echo $marketId; ?>'
        });
        
        socket.emit('getMatches', {
            eventType: '<?php echo $eventType; ?>'
        });
    });
    
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


                                var inPlay = 1;
                                html_match_odds = "";
                                html_match_odds +="";
                                match_odds_lay_place_status = "";

                                for(k=0;k<args.body.data.length;k++){
                                    market_type_name = args.body.data[k].market_name;
                                    market_market_id = args.body.data[k].marketid;
                                    market_odd_name = market_type_name;

                                    /*html_match_odds +="<div class='market-title mt-1'> "+market_type_name+" <p class="float-right mb-0"><i class="fas fa-info-circle"></i></p></div>
                                    <span class='float-right m-r-10'>Maximum Bet <span>1</span></span></div><div class='table-header'><div class='float-left country-name box-4 '><b></b></div><div class='box-1 float-left hidden-portrait'></div><div class='box-1 float-left hidden-portrait'></div><div class='back box-1  float-left text-center'><b>BACK</b></div><div class='lay box-1 float-left text-center'><b>LAY</b></div><div class='box-1 float-left hidden-portrait'></div><div class='box-1 float-left hidden-portrait'></div></div><div data-title='OPEN' class='table-body'>";

                                    */
                                    html_match_odds	+=	"<div class='market-title mt-1'>"+market_type_name+"<p class='float-right mb-0'><i class='fas fa-info-circle'></i></p></div><div class='main-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Max:<span id='match_odds_max_bet'>1</span></b></div> <div class='back box-1 float-left text-center'><b>BACK</b></div> <div class='lay box-1 float-left text-center'><b>LAY</b></div></div>";
                                    if(market_type_name == "Match Odds"){
                                            marketType = "MATCH_ODDS";
                                    }else if(market_type_name == "Tied Match"){
                                            marketType = "TIE_ODDS";
                                    }else if(market_type_name == "To Win the Toss"){
                                            marketType = "TOSS_ODDS";
                                    }else{
                                        if(market_type_name){
                                            market_type_name = market_type_name.replace(".","_");
                                            market_type_name = market_type_name.replace(" ","_");
                                            market_type_name = market_type_name.replace("/","_");
                                            market_type_name = market_type_name.replace(" ","_");
                                            marketType = market_type_name;
                                        }
                                        marketType = market_type_name;
                                    }
                                    market_type_name2 = marketType;
                                    market_marketid = market_type_name2;

                                    for(j=0;j<args.body.data[k].runners.length;j++){

                                        var selectionId = args.body.data[k].runners[j].id;

                                        selectorIdArray.push(selectionId);
                                        runnerName = args.body.data[k].runners[j].name;
                                        marketName = args.body.data[k].runners[j].name;
                                        var bet_suspended = args.body.data[k].runners[j].status;
                                        
                                        if(market_type_name == "Match Odds"){
                                                marketType = "MATCH_ODDS";
                                        }else if(market_type_name == "Tied Match"){
                                                marketType = "TIE_ODDS";
                                        }else if(market_type_name == "To Win the Toss"){
                                                marketType = "TOSS_ODDS";
                                        }else{
                                            if(market_type_name){
                                                market_type_name = market_type_name.replace(".","_");
                                                market_type_name = market_type_name.replace(" ","_");
                                                market_type_name = market_type_name.replace("/","_");
                                                market_type_name = market_type_name.replace(" ","_");
                                                marketType = market_type_name;
                                            }
                                            marketType = market_type_name;
                                        }

                                        if(args.body.data[k].runners[j].back[2]){
                                            one_price_1 = args.body.data[k].runners[j].back[2].price || "";
                                            one_size_1 = args.body.data[k].runners[j].back[2].size;
                                            if(parseFloat(one_size_1)){
                                                one_size_1 = parseFloat(one_size_1);
                                            }
                                            else{
                                                one_size_1 = 0;
                                            }
                                            //one_size_1 = parseFloat(one_size_1) >= 1000 ? one_size_1/1000 + "K" : one_size_1;
                                        }
                                        else{
                                            one_price_1 = "";
                                            one_size_1 = "";
                                        }
                                        if(args.body.data[k].runners[j].back[1]){
                                            one_price_2 = args.body.data[k].runners[j].back[1].price || "";
                                            one_size_2 = args.body.data[k].runners[j].back[1].size;
                                            if(parseFloat(one_size_2)){
                                                one_size_2 = parseFloat(one_size_2);
                                            }
                                            else{
                                                one_size_2 = 0;
                                            }
                                        //	one_size_2 = one_size_2 >= 1000 ? one_size_2/1000 + "K" : one_size_2;
                                        }
                                        else{
                                                one_price_2 = "";
                                                one_size_2 = "";
                                        }
                                        if(args.body.data[k].runners[j].back[k]){
                                                one_price_3 = args.body.data[k].runners[j].back[k].price || "";
                                                one_size_3 = args.body.data[k].runners[j].back[k].size;
                                                if(parseFloat(one_size_2)){
                                                    one_size_3 = parseFloat(one_size_3);
                                                }
                                                else{
                                                    one_size_3 = 0;
                                                }
                                        //	one_size_3 = one_size_3 >= 1000 ? one_size_3/1000 + "K" : one_size_3;
                                        }
                                        else{
                                            one_price_3 = "";
                                            one_size_3 = "";
                                        }
                                        if(args.body.data[k].runners[j].lay[0]){
                                            lay_one_price_1  = args.body.data[k].runners[j].lay[0].price || "";
                                            lay_one_size_1 = args.body.data[k].runners[j].lay[0].size;
                                            if(parseFloat(lay_one_size_1)){
                                                lay_one_size_1 = parseFloat(lay_one_size_1);
                                            }
                                            else{
                                                lay_one_size_1 = 0;
                                            }
                                        //	lay_one_size_1 = lay_one_size_1 >= 1000 ? lay_one_size_1/1000 + "K" : lay_one_size_1;
                                        }
                                        else{
                                            lay_one_size_1 = "";
                                            lay_one_price_1 = "";
                                        }
                                        if(args.body.data[k].runners[j].lay[1]){
                                            lay_one_price_2  = args.body.data[k].runners[j].lay[1].price || "";
                                            lay_one_size_2 = args.body.data[k].runners[j].lay[1].size;
                                            if(parseFloat(lay_one_size_2)){
                                                lay_one_size_2 = parseFloat(lay_one_size_2);
                                            }
                                            else{
                                                lay_one_size_2 = 0;
                                            }
                                        //	lay_one_size_2 = lay_one_size_2 >= 1000 ? lay_one_size_2/1000 + "K" : lay_one_size_2;
                                        }
                                        else{
                                            lay_one_size_2 = "";
                                            lay_one_price_2 = "";
                                        }
                                        if(args.body.data[k].runners[j].lay[2]){
                                            lay_one_price_3  = args.body.data[k].runners[j].lay[2].price || "";
                                            lay_one_size_3 = args.body.data[k].runners[j].lay[2].size;
                                            if(parseFloat(lay_one_size_3)){
                                                lay_one_size_3 = parseFloat(lay_one_size_3);
                                            }
                                            else{
                                                lay_one_size_3 = 0;
                                            }
                                        //	lay_one_size_3 = lay_one_size_3 >= 1000 ? one_size_2/1000 + "K" : lay_one_size_3;
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

                                        html_match_odds +="<div data-title='"+bet_suspended+"' class='table-row "+is_suspended+"' id='fullSelection_"+selectionId+"_"+market_marketid+"'  eventtype='4' eventid='"+eventId+"' marketid='"+market_market_id+"' selectionid='"+selectionId+"' eventname='"+runnerName+"' status='"+status+"'><div class='float-left country-name box-4'><span class='team-name'><b>"+runnerName+"</b></span><p><span class='float-left' style='color: black;' id='live_match_points_"+selectionId+"_"+market_marketid+"'>0</span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div id='back_3_"+selectionId+"_"+market_marketid+"' class='box-1 back1 float-left hidden-portrait text-center' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+one_price_1+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"' ><button><span class='odd d-block'>"+one_price_1+"</span> <span class='d-block'>"+one_size_1+"</span></button></div><div class='box-1 back2 float-left back-2 hidden-portrait text-center' id='back_2_"+selectionId+"_"+market_marketid+"' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+one_price_2+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><button><span class='odd d-block'>"+one_price_2+"</span> <span class='d-block'>"+one_size_2+"</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_"+selectionId+"_"+market_marketid+"' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+one_price_3+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><button><span class='odd d-block'>"+one_price_3+"</span> <span class='d-block'>"+one_size_3+"</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_"+selectionId+"_"+market_marketid+"' side='Lay' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+lay_one_price_1+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><button><span class='odd d-block'>"+lay_one_price_1+"</span> <span class='d-block'>"+lay_one_size_1+"</span></button></div><div class='box-1 lay-2 float-left hidden-portrait text-center' id='lay_2_"+selectionId+"_"+market_marketid+"' side='Lay' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+lay_one_price_2+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'><button><span class='odd d-block'>"+lay_one_price_2+"</span> <span class='d-block'>"+lay_one_size_2+"</span></button></div><div class='box-1 float-left hidden-portrait text-center lay1' id='lay_3_"+selectionId+"_"+market_marketid+"'><button><span class='odd d-block' side='Lay' selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+lay_one_price_3+"' oddsmarketId="+oddsmarketId+" event_name='"+eventName2+"' market_odd_name='"+market_odd_name+"' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='"+inPlay+"'>"+lay_one_price_3+"</span> <span class='d-block'>"+lay_one_size_3+"</span></button></div></div>";




                                    }
                                    html_match_odds += "</div>";
                                }

                                html_match_odds +="";
                                getlive_match_point();
                                $(".event_name_heading").attr("eventid", eventId);
                                $(".event_name_heading").attr("marketid", oddsmarketId);
//						$(".event_name_heading").attr("event_name", eventName);
                               // $(".event_name_heading").text(eventName);
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

                                    html_bookmaker_odds = "";
                                    html_bookmaker_odds += "<div id='bookmaker_market_div_0'><div class='market-title mt-1'>Bookmaker market<p class='float-right mb-0'><i class='fas fa-info-circle'></i></p></div><div class='bookmaker-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:<?php echo $bookmaker_min;?> Max:<?php echo $bookmaker_max;?> </b></div><div class='back box-1 float-left text-center'><b>BACK</b></div><div class='lay box-1 float-left text-center'><b>LAY</b></div></div>";
                                    for(z=0;z<args.body1.body.cricket[0].bookmaker.length;z++){

                                        if(args.body1.body.cricket[0].bookmaker[z] && args.body1.body.cricket[0].bookmaker[z]){                                       
                                            html_bookmaker_odds += "<div class='table-body' id='match_odds_bookmaker_market_"+z+"'>";

                                            var bookmaker1_data = args.body1.body.cricket[0].bookmaker[z];

                                            runnerName = bookmaker1_data['name'];
                                            book_status = bookmaker1_data['status'];
                                            selectionId = bookmaker1_data['selectionId'];

                                            marketType = "BOOKMAKER_ODDS";
                                            selectorIdBookmakerArray.push(selectionId);

                                            marketName = runnerName;
                                            var bet_suspended="";

                                            if(bookmaker1_data.back[0].price){
                                                bookmaker1_back_rate = bookmaker1_data.back[0].price || "";
                                            }else{
                                                bookmaker1_back_rate = "";
                                            }

                                            if(bookmaker1_data.back[0].size){
                                                bookmaker1_back_size = bookmaker1_data.back[0].size || 0;
                                            }else{
                                                bookmaker1_back_size = 0;
                                            }
                                            bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size)/1000) + "K" : bookmaker1_back_size;

                                            if(bookmaker1_data.back[1].price){
                                                bookmaker1_back_2_rate = bookmaker1_data.back[1].price || "";
                                            }else{
                                                bookmaker1_back_2_rate = "";
                                            }

                                            if(bookmaker1_data.back[1].size){
                                                bookmaker1_back_2_size = bookmaker1_data.back[1].size || 0;
                                            }else{
                                                bookmaker1_back_2_size = 0;
                                            }
                                            bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size)/1000) + "K" : bookmaker1_back_2_size;

                                            if(bookmaker1_data.back[2].price){
                                                bookmaker1_back_3_rate = bookmaker1_data.back[2].price || "";
                                            }else{
                                                bookmaker1_back_3_rate = "";
                                            }

                                            if(bookmaker1_data.back[2].size){
                                                bookmaker1_back_3_size = bookmaker1_data.back[2].size || 0;
                                            }else{
                                                bookmaker1_back_3_size = 0;
                                            }
                                            bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size)/1000) + "K" : bookmaker1_back_3_size;


                                            if(bookmaker1_data.lay[0].price){
                                                bookmaker1_lay_rate = bookmaker1_data.lay[0].price || "";
                                            }else{
                                                bookmaker1_lay_rate = "";
                                            }

                                            if(bookmaker1_data.lay[0].size){
                                                bookmaker1_lay_size = bookmaker1_data.lay[0].size || 0;
                                            }else{
                                                bookmaker1_lay_size = 0;
                                            }
                                            bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size)/1000) + "K" : bookmaker1_lay_size;									

                                            if(bookmaker1_data.lay[1].price){
                                                bookmaker1_lay_2_rate = bookmaker1_data.lay[1].price || "";
                                            }else{
                                                bookmaker1_lay_2_rate = "";
                                            }
                                            if(bookmaker1_data.lay[1].size){
                                                bookmaker1_lay_2_size = bookmaker1_data.lay[1].size || 0;
                                            }else{
                                                bookmaker1_lay_2_size = 0;
                                            }
                                            bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size)/1000) + "K" : bookmaker1_lay_2_size;


                                            if(bookmaker1_data.lay[2].price){
                                                bookmaker1_lay_3_rate = bookmaker1_data.lay[2].price || "";
                                            }else{
                                                bookmaker1_lay_3_rate = "";
                                            }
                                            if(bookmaker1_data.lay[2].size){
                                                bookmaker1_lay_3_size = bookmaker1_data.lay[2].size || 0;
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

                                            html_bookmaker_odds += "<div data-title='"+book_status+"' class='table-row "+bookmaker_suspended+"' id='bookmaker_row_"+temp_selectionId+"'><div class='float-left country-name box-4'><span class='team-name'><b>"+runnerName+"</b></span><p><span class='float-left' style='color: black;' id='live_match_points_"+selectionId+"_BOOKMAKER_ODDS'>0</span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div class='box-1 back1 float-left  text-center' id='back_3_"+temp_selectionId+"_BOOKMAKER_ODDS' ><button><span class='odd d-block'>"+bookmaker1_back_3_rate+"</span> <span class='d-block'>"+bookmaker1_back_3_size+"</span></button></div><div class='box-1 back2 float-left back-2  text-center' id='back_2_"+temp_selectionId+"_BOOKMAKER_ODDS' ><button><span class='odd d-block'>"+bookmaker1_back_2_rate+"</span> <span class='d-block'>"+bookmaker1_back_2_size+"</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_"+temp_selectionId+"_BOOKMAKER_ODDS' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_back_rate+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKER_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='1'><button><span class='odd d-block'>"+bookmaker1_back_rate+"</span> <span class='d-block'>"+bookmaker1_back_size+"</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_"+temp_selectionId+"_BOOKMAKER_ODDS' side='Lay'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_lay_rate+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKER_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='1'><button><span class='odd d-block'>"+bookmaker1_lay_rate+"</span> <span class='d-block'>"+bookmaker1_lay_size+"</span></button></div><div class='box-1 lay-2 float-left  text-center' id='lay_2_"+temp_selectionId+"_BOOKMAKER_ODDS' ><button><span class='odd d-block'>"+bookmaker1_lay_2_rate+"</span> <span class='d-block'>"+bookmaker1_lay_2_size+"</span></button></div><div class='box-1 lay-1 float-left  text-center' id='lay_3_"+temp_selectionId+"_BOOKMAKER_ODDS' ><button><span class='odd d-block'>"+bookmaker1_lay_3_rate+"</span> <span class='d-block'>"+bookmaker1_lay_3_size+"</span></button></div></div> </div>";

                                        }

                                    }

                                    html_bookmaker_odds += "</div><div class='table-remark text-right remark' id='bookmaker-remakrs-"+z+"'>"+bookmaker_remarks+"</div><div></div></div>";

                                    if(html_bookmaker_odds != ""){
                                    	$("#bookmaker_market_div_secure").css('display','block');
                                        $("#bookmaker_market_div_secure").html(html_bookmaker_odds);
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
										html_bookmaker_odds += "<div id='bookmakersmall_market_div_0'><div class='market-title mt-1'>Bookmaker market<p class='float-right mb-0'><i class='fas fa-info-circle'></i></p></div><div class='bookmaker-market'><div class='table-header'><div class='float-left country-name box-6 min-max'><b>Min:<?php echo $bookmaker_min;?> Max:<?php echo $bookmakersmall_max;?> </b></div><div class='back box-1 float-left text-center'><b>BACK</b></div><div class='lay box-1 float-left text-center'><b>LAY</b></div></div>";
										for(z=0;z < bm_small1_datas.length;z++){

											if(bm_small1_datas[z] && bm_small1_datas[z]){
												html_bookmaker_odds += "<div class='table-body' id='match_odds_bookmakersmall_market_"+z+"'>";

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

												html_bookmaker_odds += "<div data-title='"+book_status+"' class='table-row "+bookmaker_suspended+"' id='bookmakersmall_row_"+temp_selectionId+"'><div class='float-left country-name box-4'><span class='team-name'><b>"+runnerName+"</b></span><p><span class='float-left' style='color: black;' id='live_match_points_"+selectionId+"_BOOKMAKERSMALL_ODDS'>0</span> <span class='float-right' style='display: none; color: black;'>0</span></p></div><div class='box-1 back1 float-left  text-center' id='back_3_"+temp_selectionId+"_BOOKMAKER_ODDS' ><button><span class='odd d-block'>"+bookmaker1_back_3_rate+"</span> <span class='d-block'>"+bookmaker1_back_3_size+"</span></button></div><div class='box-1 back2 float-left back-2  text-center' id='back_2_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS' ><button><span class='odd d-block'>"+bookmaker1_back_2_rate+"</span> <span class='d-block'>"+bookmaker1_back_2_size+"</span></button></div><div class='box-1 back float-left back lock text-center back-1'  id='back_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS' side='Back'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_back_rate+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='1'><button><span class='odd d-block'>"+bookmaker1_back_rate+"</span> <span class='d-block'>"+bookmaker1_back_size+"</span></button></div><div class='box-1 lay float-left text-center lay-1' id='lay_1_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS' side='Lay'  selectionid='"+selectionId+"' runner='"+runnerName+"' marketname='"+runnerName+"' markettype='"+marketType+"' fullmarketodds='"+bookmaker1_lay_rate+"'  oddsmarketId="+oddsmarketId+" event_name='"+eventName+"' market_odd_name='BOOKMAKERSMALL_ODDS' marketId='"+selectionId+"' eventId='"+eventId+"'   inplay='1'><button><span class='odd d-block'>"+bookmaker1_lay_rate+"</span> <span class='d-block'>"+bookmaker1_lay_size+"</span></button></div><div class='box-1 lay-2 float-left  text-center' id='lay_2_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS' ><button><span class='odd d-block'>"+bookmaker1_lay_2_rate+"</span> <span class='d-block'>"+bookmaker1_lay_2_size+"</span></button></div><div class='box-1 lay-1 float-left  text-center' id='lay_3_"+temp_selectionId+"_BOOKMAKERSMALL_ODDS' ><button><span class='odd d-block'>"+bookmaker1_lay_3_rate+"</span> <span class='d-block'>"+bookmaker1_lay_3_size+"</span></button></div></div> </div>";

											}

										}

										html_bookmaker_odds += "</div><div class='table-remark text-right remark' id='bookmakersmall-remakrs-"+z+"'>"+bookmaker_remarks+"</div><div></div></div>";

										if(html_bookmaker_odds != "" && bm_small1_datas.length > 0){
											$("#bookmakersmall1_market_div_secure").css('display','block');
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

    socket.on('eventGetLiveEventsFancyData', function(args) {
        if(args.body == undefined){
            window.location.href = "/index";
        }
        else{

            if(args.body.cricket[0]){
                if(args.body.cricket[0]){
                	if(args.body.cricket[0][0]){
						args.body.cricket[0] = args.body.cricket[0][0];
					}
                    //var eventName = args.body.cricket[0][0].matchName;
                    //var eventName = args.body.cricket[0].runners[1].name + ' V ' +args.body.cricket[0].runners[0].name;
                    //$('.event_name_heading').text(eventName);
                    var oddsmarketId = args.body.cricket[0].marketid;
                    var eventId=args.body.cricket[0].matchid;
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
                    if(args.body.cricket[0].inplay)
                        max_bet = '<?php echo $match_max;?>';;
                        
                    if('<?php echo ($event_id == ELECTION_EVENT_ID)?"TRUE":"FALSE";?>' == "TRUE" ){
                    	max_bet = '<?php echo ELECTION_MAX;?>';
                    }

                    $('#match_odds_max_bet').text(max_bet);

                    for(k=0;k<args.body.cricket.length;k++){
                        market_type_name = args.body.cricket[k].marketName;
                        //market_marketid = args.body.cricket[k].marketId;
                        if(market_type_name == "Match Odds"){
                                marketType = "MATCH_ODDS";
                        }else if(market_type_name == "Tied Match"){
                                marketType = "TIE_ODDS";
                        }else if(market_type_name == "To Win the Toss"){
                                marketType = "TOSS_ODDS";
                        }else{
                                if(market_type_name){
                                        market_type_name = market_type_name.replace(".","_");
                                        market_type_name = market_type_name.replace(" ","_");
                                        market_type_name = market_type_name.replace("/","_");
                                        market_type_name = market_type_name.replace(" ","_");
                                        marketType = market_type_name;
                                }
                                marketType = market_type_name;
                        }

                        market_type_name2 = marketType;
                        market_marketid = market_type_name2;
                        if(market_marketid){
                                market_marketid = market_marketid.replace(".","_");
                        }

                        if(args.body.cricket[k].runners){
                            for(j=0;j<args.body.cricket[k].runners.length;j++){

                                    var selectionId = args.body.cricket[k].runners[j].id;
                                    //selectorIdArray[k*(j+1)] = selectionId;
                                    runnerName = args.body.cricket[k].runners[j].name;
                                    marketName = args.body.cricket[k].runners[j].name;
                                    var bet_suspended = args.body.cricket[k].runners[j].status;

                                    if(args.body.cricket[k].runners[j].back[2]){
                                            one_price_1 = args.body.cricket[k].runners[j].back[2].price;
                                            if(!one_price_1){
                                                    one_price_1 = "";
                                            }
                                            one_size_1 = args.body.cricket[k].runners[j].back[2].size || 0;
                                    }
                                    else{
                                            one_price_1 = "";
                                            one_size_1 = 0;
                                    }
                                    if(args.body.cricket[k].runners[j].back[1]){
                                            one_price_2 = args.body.cricket[k].runners[j].back[1].price;
                                            if(!one_price_2){
                                                    one_price_2 = "";
                                            }
                                            one_size_2 = args.body.cricket[k].runners[j].back[1].size || 0;
                                    }
                                    else{
                                            one_price_2 = "";
                                            one_size_2 = 0;
                                    }
                                    if(args.body.cricket[k].runners[j].back[0]){
                                            one_price_3 = args.body.cricket[k].runners[j].back[0].price;
                                            if(!one_price_3){
                                                    one_price_3 = "";
                                            }
                                            one_size_3 = args.body.cricket[k].runners[j].back[0].size || 0;
                                    }
                                    else{
                                            one_price_3 = "";
                                            one_size_3 = 0;
                                    }
                                    if(args.body.cricket[k].runners[j].lay[0]){
                                            lay_one_price_1  = args.body.cricket[k].runners[j].lay[0].price;
                                            if(!lay_one_price_1){
                                                    lay_one_price_1 = "";
                                            }
                                            lay_one_size_1  = args.body.cricket[k].runners[j].lay[0].size|| 0;
                                    }
                                    else{
                                            lay_one_size_1 = 0;
                                            lay_one_price_1 = "";
                                    }
                                    if(args.body.cricket[k].runners[j].lay[1]){
                                            lay_one_price_2  = args.body.cricket[k].runners[j].lay[1].price;
                                            if(!lay_one_price_2){
                                                    lay_one_price_2 = "";
                                            }
                                            lay_one_size_2  = args.body.cricket[k].runners[j].lay[1].size || 0;
                                    }
                                    else{
                                            lay_one_size_2 = 0;
                                            lay_one_price_2 = "";
                                    }
                                    if(args.body.cricket[k].runners[j].lay[2]){
                                            lay_one_price_3  = args.body.cricket[k].runners[j].lay[2].price;
                                            if(!lay_one_price_3){
                                                    lay_one_price_3 = "";
                                            }
                                            lay_one_size_3 = args.body.cricket[k].runners[j].lay[2].size || 0;
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

                                    if(one_size_1 > 1000){
                                            one_size_1 = one_size_1 /1000;
                                    }
                                    one_size_2 = parseInt(one_size_2);
                                    if(one_size_2){
                                            one_size_2 = one_size_2.toFixed(2);
                                    }
                                    else{
                                            one_size_2 = 0;
                                    }
                                    if(one_size_2 > 1000){
                                            one_size_2 = one_size_2 /1000;
                                    }
                                    one_size_3 = parseInt(one_size_3);
                                    if(one_size_3){
                                    }
                                    else{
                                            one_size_3 = 0;
                                    }
                                    one_size_3 = one_size_3.toFixed(2);
                                    if(one_size_3 > 1000){
                                            one_size_3 = one_size_3 /1000;
                                    }
                                    lay_one_size_1 = parseInt(lay_one_size_1);
                                    if(lay_one_size_1){
                                    }
                                    else{
                                            lay_one_size_1 = 0;
                                    }
                                    lay_one_size_1 = lay_one_size_1.toFixed(2);
                                    if(lay_one_size_1 > 1000){
                                            lay_one_size_1 = lay_one_size_1 /1000;
                                    }
                                    lay_one_size_2 = parseInt(lay_one_size_2);
                                    if(lay_one_size_2){
                                    }
                                    else{
                                            lay_one_size_2 = 0;
                                    }
                                    lay_one_size_2 = lay_one_size_2.toFixed(2);
                                    if(lay_one_size_2 > 1000){
                                            lay_one_size_2 = lay_one_size_2 /1000;
                                    }
                                    lay_one_size_3 = parseInt(lay_one_size_3);
                                    if(lay_one_size_3){
                                    }
                                    else{
                                            lay_one_size_3 = 0;
                                    }
                                    lay_one_size_3 = lay_one_size_3.toFixed(2);
                                    if(lay_one_size_3 > 1000){
                                            lay_one_size_3 = lay_one_size_3 /1000;
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
                                    if(one_size_1 == 0 && one_size_2 == 0 && one_size_3 == 0 && lay_one_size_1==0 && lay_one_size_2 == 0 && lay_one_size_3 == 0){
                                            //window.location.href = "/index";
                                    }
                                    
                                    
                                    if($("#back_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != one_price_1)
                                        $("#back_3_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
                                    else
                                        $("#back_3_"+selectionId+"_"+market_marketid).removeClass('rate_change_link');
                                    if($("#back_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != one_price_2)
                                        $("#back_2_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
                                    else
                                        $("#back_2_"+selectionId+"_"+market_marketid).removeClass('rate_change_link');
//                                    if($("#back_1_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != one_price_3)
//                                        $("#back_1_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
//                                    else
//                                        $("#back_1_"+selectionId+"_"+market_marketid).removeClass('rate_change_link');


//                                    if($("#lay_1_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != lay_one_price_1)
//                                        $("#lay_1_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
//                                    else
//                                        $("#lay_1_"+selectionId+"_"+market_marketid).removeClass('rate_change_link');
                                    if($("#lay_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != lay_one_price_2)
                                        $("#lay_2_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
                                    else
                                        $("#lay_2_"+selectionId+"_"+market_marketid).removeClass('rate_change_link');
                                    if($("#lay_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds") != lay_one_price_3)
                                        $("#lay_3_"+selectionId+"_"+market_marketid).addClass('rate_change_link');
                                    else
                                        $("#lay_3_"+selectionId+"_"+market_marketid).removeClass('rate_change_link');
                        
                        
                        
                                    $("#back_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds",one_price_1);
                                    $("#back_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds",one_price_2);
                                    $("#back_1_"+selectionId+"_"+market_marketid).attr("fullmarketodds",one_price_3);

                                    back_1_html = "<button><span class='odd d-block'>"+one_price_1+"</span> <span class='d-block'>"+one_size_1+"</span></button>";
                                    back_2_html = "<button><span class='odd d-block'>"+one_price_2+"</span> <span class='d-block'>"+one_size_2+"</span></button>";
                                    back_3_html = "<button><span class='odd d-block'>"+one_price_3+"</span> <span class='d-block'>"+one_size_3+"</span></button>";


                                    $("#back_1_"+selectionId+"_"+market_marketid).html(back_3_html);
                                    $("#back_2_"+selectionId+"_"+market_marketid).html(back_2_html);
                                    $("#back_3_"+selectionId+"_"+market_marketid).html(back_1_html);
                                    
                                    $('#fullSelection_'+selectionId+'_'+market_marketid).attr("title",bet_suspended);
                                    $("#fullSelection_"+selectionId).attr("data-title",bet_suspended);
                                    if(bet_suspended != "ACTIVE" && bet_suspended != "OPEN"){
										$('#fullSelection_'+selectionId+'_'+market_marketid).addClass("suspended");
									}else{
										$('#fullSelection_'+selectionId+'_'+market_marketid).removeClass("suspended");
									}

                                    lay_1_html = "<button><span class='odd d-block'>"+lay_one_price_1+"</span> <span class='d-block'>"+lay_one_size_1+"</span></button>";
                                    lay_2_html = "<button><span class='odd d-block'>"+lay_one_price_2+"</span> <span class='d-block'>"+lay_one_size_2+"</span></button>";
                                    lay_3_html = "<button><span class='odd d-block'>"+lay_one_price_3+"</span> <span class='d-block'>"+lay_one_size_3+"</span></button>";
                                    $("#lay_1_"+selectionId+"_"+market_marketid).html(lay_1_html);
                                    $("#lay_2_"+selectionId+"_"+market_marketid).html(lay_2_html);
                                    $("#lay_3_"+selectionId+"_"+market_marketid).html(lay_3_html);
                                    $("#lay_1_"+selectionId+"_"+market_marketid).attr("fullmarketodds",lay_one_price_1);
                                    $("#lay_2_"+selectionId+"_"+market_marketid).attr("fullmarketodds",lay_one_price_2);
                                    $("#lay_3_"+selectionId+"_"+market_marketid).attr("fullmarketodds",lay_one_price_3);

                            }
                        }

                        if(args.body.cricket[k].bookmaker && args.body.cricket[k].bookmaker != null){
                            for(z=0;z<args.body.cricket[k].bookmaker.length;z++){

                                var bookmaker1_data = args.body.cricket[k].bookmaker[z];

                                runnerName = bookmaker1_data['name'];
                                book_status = bookmaker1_data['status'];
                                selectionId = bookmaker1_data['selectionId'];
                                
                               var temp_selectionId;
                               temp_selectionId = runnerName.split(" ").join('_');
								

                                marketType = "BOOKMAKER_ODDS";
                                selectorIdBookmakerArray.push(selectionId);

                                marketName = runnerName;
                                var bet_suspended="";

                                if(bookmaker1_data.back[0].price){
                                    bookmaker1_back_rate = bookmaker1_data.back[0].price || "";
                                }else{
                                    bookmaker1_back_rate = "";
                                }

                                if(bookmaker1_data.back[0].size){
                                    bookmaker1_back_size = bookmaker1_data.back[0].size || 0;
                                }else{
                                    bookmaker1_back_size = 0;
                                }
                                bookmaker1_back_size = parseFloat(bookmaker1_back_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_size)/1000) + "K" : bookmaker1_back_size;


                                if(bookmaker1_data.back[1].price){
                                    bookmaker1_back_2_rate = bookmaker1_data.back[1].price || "";
                                }else{
                                    bookmaker1_back_2_rate = "";
                                }

                                if(bookmaker1_data.back[1].size){
                                    bookmaker1_back_2_size = bookmaker1_data.back[1].size || 0;
                                }else{
                                    bookmaker1_back_2_size = 0;
                                }
                                bookmaker1_back_2_size = parseFloat(bookmaker1_back_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_2_size)/1000) + "K" : bookmaker1_back_2_size;


                                if(bookmaker1_data.back[2].price){
                                    bookmaker1_back_3_rate = bookmaker1_data.back[2].price || "";
                                }else{
                                    bookmaker1_back_3_rate = "";
                                }

                                if(bookmaker1_data.back[2].size){
                                    bookmaker1_back_3_size = bookmaker1_data.back[2].size || 0;
                                }else{
                                    bookmaker1_back_3_size = 0;
                                }
                                bookmaker1_back_3_size = parseFloat(bookmaker1_back_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_back_3_size)/1000) + "K" : bookmaker1_back_3_size;



                                if(bookmaker1_data.lay[0].price){
                                    bookmaker1_lay_rate = bookmaker1_data.lay[0].price || "";
                                }else{
                                    bookmaker1_lay_rate = "";
                                }
                                if(bookmaker1_data.lay[0].size){
                                    bookmaker1_lay_size = bookmaker1_data.lay[0].size || 0;
                                }else{
                                    bookmaker1_lay_size = 0;
                                }
                                bookmaker1_lay_size = parseFloat(bookmaker1_lay_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_size)/1000) + "K" : bookmaker1_lay_size;


                                if(bookmaker1_data.lay[1].price){
                                    bookmaker1_lay_2_rate = bookmaker1_data.lay[1].price || "";
                                }else{
                                    bookmaker1_lay_2_rate = "";
                                }
                                if(bookmaker1_data.lay[1].size){
                                    bookmaker1_lay_2_size = bookmaker1_data.lay[1].size || 0;
                                }else{
                                    bookmaker1_lay_2_size = 0;
                                }
                                bookmaker1_lay_2_size = parseFloat(bookmaker1_lay_2_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_2_size)/1000) + "K" : bookmaker1_lay_2_size;

                                if(bookmaker1_data.lay[2].price){
                                    bookmaker1_lay_3_rate = bookmaker1_data.lay[2].price ||"";
                                }else{
                                    bookmaker1_lay_3_rate = "";
                                }
                                if(bookmaker1_data.lay[2].size){
                                    bookmaker1_lay_3_size = bookmaker1_data.lay[2].size || 0;
                                }else{
                                    bookmaker1_lay_3_size = 0;
                                }
                                bookmaker1_lay_3_size = parseFloat(bookmaker1_lay_3_size) >= 1000 ? parseInt(parseInt(bookmaker1_lay_3_size)/1000) + "K" : bookmaker1_lay_3_size;

                                bookmaker_suspended = "";
                                if(book_status != "ACTIVE"){
                                    bookmaker_suspended = "suspended";
                                }

                                if(book_status != "ACTIVE" || (bookmaker1_back_rate == 0 && bookmaker1_lay_rate == 0)){
                                    $("#bookmaker_row_"+temp_selectionId).addClass("suspended");
                                }else{
                                    $("#bookmaker_row_"+temp_selectionId).removeClass("suspended");
                                }
                                $("#bookmaker_row_"+temp_selectionId).attr("data-title",book_status);

                                $("#back_1_"+temp_selectionId+"_BOOKMAKER_ODDS").attr("fullmarketodds",bookmaker1_back_rate);
                                $("#back_2_"+temp_selectionId+"_BOOKMAKER_ODDS").attr("fullmarketodds",bookmaker1_back_2_rate);
                                $("#back_3_"+temp_selectionId+"_BOOKMAKER_ODDS").attr("fullmarketodds",bookmaker1_back_3_rate);
                                $("#lay_1_"+temp_selectionId+"_BOOKMAKER_ODDS").attr("fullmarketodds",bookmaker1_lay_rate);
                                $("#lay_2_"+temp_selectionId+"_BOOKMAKER_ODDS").attr("fullmarketodds",bookmaker1_lay_2_rate);
                                $("#lay_3_"+temp_selectionId+"_BOOKMAKER_ODDS").attr("fullmarketodds",bookmaker1_lay_3_rate);

                                back_1_html = "<button><span class='odd d-block'>"+bookmaker1_back_rate+"</span> <span class='d-block'>"+bookmaker1_back_size+"</span></button>";
                                back_2_html = "<button><span class='odd d-block'>"+bookmaker1_back_2_rate+"</span> <span class='d-block'>"+bookmaker1_back_2_size+"</span></button>";
                                back_3_html = "<button><span class='odd d-block'>"+bookmaker1_back_3_rate+"</span> <span class='d-block'>"+bookmaker1_back_3_size+"</span></button>";

                                lay_1_html = "<button><span class='odd d-block'>"+bookmaker1_lay_rate+"</span> <span class='d-block'>"+bookmaker1_lay_size+"</span></button>";
                                lay_2_html = "<button><span class='odd d-block'>"+bookmaker1_lay_2_rate+"</span> <span class='d-block'>"+bookmaker1_lay_2_size+"</span></button>";
                                lay_3_html = "<button><span class='odd d-block'>"+bookmaker1_lay_3_rate+"</span> <span class='d-block'>"+bookmaker1_lay_3_size+"</span></button>";

                                $("#back_1_"+temp_selectionId+"_BOOKMAKER_ODDS").html(back_1_html);
                                $("#back_2_"+temp_selectionId+"_BOOKMAKER_ODDS").html(back_2_html);
                                $("#back_3_"+temp_selectionId+"_BOOKMAKER_ODDS").html(back_3_html);

                                $("#lay_1_"+temp_selectionId+"_BOOKMAKER_ODDS").html(lay_1_html);
                                $("#lay_2_"+temp_selectionId+"_BOOKMAKER_ODDS").html(lay_2_html);
                                $("#lay_3_"+temp_selectionId+"_BOOKMAKER_ODDS").html(lay_3_html);

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
            var smdlm_c = [1,2];
            var mdlm_c = [1,2];
            var dlm_c = [1,2];
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
            if(!SKIP_FANCY_EVENTID.includes(_event_id)){
                if(args.body.session){
                    if(args.body.session[0]){
                        if(args.body.session[0].value){
                                if(args.body.session[0].value.session){
                                        eventId = $(".event_name_heading").attr("eventid");
                                        event_name = $(".event_name_heading").attr("event_name");
                        counter2 = 0;
                        //start for
                        var body2 = args.body.session[0].value.session.map(a =>  {let b = {}; b = a; b['SelectionId'] = parseInt(b['SelectionId']); return b;});
                        args.body.session[0].value.session = _.sortBy(body2, 'SelectionId' );

                        for (i = 0; i < args.body.session[0].value.session.length; i++) {
                                html_fancy_market_new = "";
                                var eventId = <?php echo $event_id; ?>;
                                marketId = args.body.session[0].value.session[i].SelectionId;
                                if(marketId == "" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session[0].value.session[i].GameStatus.toUpperCase() == "CLOSED"){
                        //	if(marketId == ""){

                                }else{

                                min_stack = args.body.session[0].value.session[i].Min;
                                max_stack = args.body.session[0].value.session[i].Max;

                                marketName = args.body.session[0].value.session[i].RunnerName;
                                statusLabel = args.body.session[0].value.session[i].GameStatus;

                                if(statusLabel == ""){
                                        $(".fancy-suspend-tr_" + marketId).removeClass("suspended");

                                }
                                else if(statusLabel == "BALL_RUN"){

                                        $(".fancy-suspend-tr_" + marketId).addClass("suspended");

                                }
                                else if(statusLabel == "SUSPEND"){
                                        $(".fancy-suspend-tr_" + marketId).addClass("suspended");

                                }
                                else{
                                        $(".fancy-suspend-tr_" + marketId).addClass("suspended");

                                }
                                $(".fancy-suspend-tr_" + marketId).attr("data-title",statusLabel);
                                if(args.body.session[0].value.session[i] != undefined){
                                                runsNo = args.body.session[0].value.session[i].LayPrice1;
                                                oddsNo = args.body.session[0].value.session[i].LaySize1;
                                                runsYes = args.body.session[0].value.session[i].BackPrice1;
                                                oddsYes = args.body.session[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        eventName2 = eventName.split(' ').join('_');
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
                                        if(check_runsNo_interger == true){
                                                runsNo = 0;
                                        }
                                        if(check_oddsNo_interger == true){
                                                oddsNo = 0;
                                        }
                                        if(check_runsYes_interger == true){
                                                runsYes = 0;
                                        }
                                        if(check_oddsYes_interger == true){
                                                oddsYes = 0;
                                        }
                        marketId = parseInt(marketId);
                        n1 = smdlm_c.includes(marketId);
                        n2 = mdlm_c.includes(marketId);
                        n3 = dlm_c.includes(marketId);
                        //if(!n1 && !n2 && !n3){
                        if(true){

                                m1 = marketIdArray.includes(marketId);
                                if(m1){
                                        marketIdArrayNew[counter2] = marketId;
                                                counter2++;
                                        lay_runs_info = "<span class='odd d-block'>"+runsNo+"</span> <span>"+oddsNo+"</span>";
                                        $("#fancy_market_lay_btn_" + marketId).attr("event_name", event_name);
                                        $("#fancy_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
                                        $("#fancy_market_lay_btn_" + marketId).attr("selectionid", marketId);
                                        $("#fancy_market_lay_btn_" + marketId).attr("runner", marketName);
                                        $("#fancy_market_lay_btn_" + marketId).attr("marketname", marketName);
                                        $("#fancy_market_lay_btn_" + marketId).attr("eventid", eventId);
                                        $("#fancy_market_lay_btn_" + marketId).attr("marketid", marketId);
                                        $("#fancy_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
                                        $("#fancy_market_lay_btn_" + marketId).html(lay_runs_info);

                                        back_runs_info = "<span class='odd d-block'>"+runsYes+"</span> <span>"+oddsYes+"</span>";
                                        $("#fancy_market_back_btn_" + marketId).attr("event_name", event_name);
                                        $("#fancy_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
                                        $("#fancy_market_back_btn_" + marketId).attr("selectionid", marketId);
                                        $("#fancy_market_back_btn_" + marketId).attr("runner", marketName);
                                        $("#fancy_market_back_btn_" + marketId).attr("marketname", marketName);
                                        $("#fancy_market_back_btn_" + marketId).attr("eventid", eventId);
                                        $("#fancy_market_back_btn_" + marketId).attr("marketid", marketId);
                                        $("#fancy_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
                                        $("#fancy_market_back_btn_" + marketId).html(back_runs_info);


                                }else{
                                        marketIdArrayNew[counter2] = marketId;
                                        counter2++;


                                        back_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsYes+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"'  selectionid='"+marketId+"' market_odd_name='' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+oddsYes+"'";

                                        lay_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsNo+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"' selectionid='"+marketId+"' market_odd_name='' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+oddsNo+"'";


                                        html_fancy_market_new	+=	"<div id='fancyBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended fancy-suspend-tr_" + marketId + "'><div class='float-left country-name box-4'><span><b>"+marketName+"</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-"+marketId+"' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-"+marketId+"' class='min-max-info collapse'> <span><b>Min:</b> "+min_stack+" </span> <span><b>Max:</b> "+max_stack+" </span> </div> </div> </div> <p id='live_match_points_"+marketId+"_FANCY_ODDS'><span class='float-left' style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='fancy_market_lay_btn_" + marketId + "' "+lay_attribute+"><button><span class='odd d-block'>"+runsNo+"</span> <span class='d-block'>"+oddsNo+"</span></button></div><div class='box-1 back float-left text-center back-1' id='fancy_market_back_btn_" + marketId + "' "+back_attribute+"><button><span class='odd d-block'>"+runsYes+"</span> <span class='d-block'>"+oddsYes+"</span></button></div></div></div></div>";
                                        lastrunsNo = runsNo;
                                        lastrunsYes = runsYes;
                                        
                                        $("#secure").after(html_fancy_market_new);


                                }
                                }
                        }
                        }

                                if(html_fancy_market_new != ""){
                                        $("#fancy_odds_market").show();
                                        getlive_match_point();

                                }else{

                                }
                                var z = $.grep(marketIdArray, function(el){return $.inArray(el, marketIdArrayNew) == -1});
                        if(z){
                                        for(i=0;i<z.length;i++){
                                                marketId = z[i];
                                                if($("#fancyBetMarket_"+eventId+"_"+marketId).length > 0){
                                                        document.getElementById("fancyBetMarket_"+eventId+"_"+marketId).remove();
                                                        $(".fancy-suspend-tr_"+marketId).remove();

                                                }
                                        }
                                }
                                marketIdArray = marketIdArrayNew;
                }
                        //end for
                }
                }
                }

                if(args.body.session1){

                    if(args.body.session1[0]){
                            if(args.body.session1[0].value){
                                    if(args.body.session1[0].value.session){
                                            eventId = $(".event_name_heading").attr("eventid");
                                            event_name = $(".event_name_heading").attr("event_name");
                            counter2 = 0;
                            marketIdArrayNewFancy1 = [];
                            //start for
                            var body2 = args.body.session1[0].value.session.map(a =>  {let b = {}; b = a; b['SelectionId'] = parseInt(b['SelectionId']); return b;});
                            args.body.session1[0].value.session = _.sortBy(body2, 'SelectionId' );

                            for (i = 0; i < args.body.session1[0].value.session.length; i++) {
                                    html_fancy_market_new1 = "";
                                    var eventId = <?php echo $event_id; ?>;
                                    marketId = args.body.session1[0].value.session[i].SelectionId;
                                    if(marketId == "" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.session1[0].value.session[i].GameStatus.toUpperCase() == "CLOSED"){
                            //	if(marketId == ""){

                                    }else{

                                    min_stack = args.body.session1[0].value.session[i].Min;
                                    max_stack = args.body.session1[0].value.session[i].Max;

                                    marketName = args.body.session1[0].value.session[i].RunnerName;
                                    statusLabel = args.body.session1[0].value.session[i].GameStatus;

                                    if(statusLabel == ""){
                                            $(".fancy1-suspend-tr_" + marketId).removeClass("suspended");

                                    }
                                    else if(statusLabel == "BALL_RUN"){

                                            $(".fancy1-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else if(statusLabel == "SUSPEND"){
                                            $(".fancy1-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else{
                                            $(".fancy1-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    $(".fancy1-suspend-tr_" + marketId).attr("data-title",statusLabel);
                                    if(args.body.session1[0].value.session[i] != undefined){
                                                    runsNo = args.body.session1[0].value.session[i].LayPrice1;
                                                    oddsNo = args.body.session1[0].value.session[i].LaySize1;
                                                    runsYes = args.body.session1[0].value.session[i].BackPrice1;
                                                    oddsYes = args.body.session1[0].value.session[i].BackSize1;
                                            }
                                            eventName = marketName;
                                            eventName2 = eventName.split(' ').join('_');
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
                                            if(check_runsNo_interger == true){
                                                    runsNo = 0;
                                            }
                                            if(check_oddsNo_interger == true){
                                                    oddsNo = 0;
                                            }
                                            if(check_runsYes_interger == true){
                                                    runsYes = 0;
                                            }
                                            if(check_oddsYes_interger == true){
                                                    oddsYes = 0;
                                            }
                            marketId = parseInt(marketId);
                            n1 = smdlm_c.includes(marketId);
                            n2 = mdlm_c.includes(marketId);
                            n3 = dlm_c.includes(marketId);
                            //if(!n1 && !n2 && !n3){
                            if(true){

                                    m1 = marketIdArrayFancy1.includes(marketId);
                                    if(m1){
                                            marketIdArrayNewFancy1[counter2] = marketId;
                                                    counter2++;
    //                                        if(runsNo == 0){
    //                                                runsNo = "";
    //                                                oddsNo = "";
    //                                        }
    //
    //                                        if(runsYes == 0){
    //                                                runsYes = "";
    //                                                oddsYes = "";
    //                                        }

                                            lay_runs_info = "<span class='odd d-block'>"+runsNo+"</span> <span>"+kFormatter(oddsNo)+"</span>";
                                            $("#fancy1_market_lay_btn_" + marketId).attr("event_name", event_name);
                                            $("#fancy1_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
                                            $("#fancy1_market_lay_btn_" + marketId).attr("selectionid", marketId);
                                            $("#fancy1_market_lay_btn_" + marketId).attr("runner", marketName);
                                            $("#fancy1_market_lay_btn_" + marketId).attr("marketname", marketName);
                                            $("#fancy1_market_lay_btn_" + marketId).attr("eventid", eventId);
                                            $("#fancy1_market_lay_btn_" + marketId).attr("marketid", marketId);
                                            $("#fancy1_market_lay_btn_" + marketId).attr("fullfancymarketrate", runsNo);
                                            $("#fancy1_market_lay_btn_" + marketId).html(lay_runs_info);

                                            back_runs_info = "<span class='odd d-block'>"+runsYes+"</span> <span>"+kFormatter(oddsYes)+"</span>";
                                            $("#fancy1_market_back_btn_" + marketId).attr("event_name", event_name);
                                            $("#fancy1_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
                                            $("#fancy1_market_back_btn_" + marketId).attr("selectionid", marketId);
                                            $("#fancy1_market_back_btn_" + marketId).attr("runner", marketName);
                                            $("#fancy1_market_back_btn_" + marketId).attr("marketname", marketName);
                                            $("#fancy1_market_back_btn_" + marketId).attr("eventid", eventId);
                                            $("#fancy1_market_back_btn_" + marketId).attr("marketid", marketId);
                                            $("#fancy1_market_back_btn_" + marketId).attr("fullfancymarketrate", runsYes);

                                            $("#fancy1_market_back_btn_" + marketId).html(back_runs_info);


                                    }else{
                                            marketIdArrayNewFancy1[counter2] = marketId;
                                            counter2++;


                                            back_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsYes+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"'  selectionid='"+marketId+"' market_odd_name='FANCY1_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+runsYes+"'";

                                            lay_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsNo+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"' selectionid='"+marketId+"' market_odd_name='FANCY1_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+runsNo+"'";



                                            html_fancy_market_new1	+=	"<div id='fancy1BetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple'> <div data-title='SUSPENDED' class='table-row suspended fancy1-suspend-tr_" + marketId + "'><div class='float-left country-name box-4'><span><b>"+marketName+"</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-"+marketId+"' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-"+marketId+"' class='min-max-info collapse'> <span><b>Min:</b> "+min_stack+" </span> <span><b>Max:</b> "+max_stack+" </span> </div> </div> </div> <p id='live_match_points_"+marketId+"_FANCY_ODDS'><span class='float-left' style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='fancy1_market_lay_btn_" + marketId + "' "+lay_attribute+"><button><span class='odd d-block'>"+runsNo+"</span> <span class='d-block'>"+kFormatter(oddsNo)+"</span></button></div><div class='box-1 back float-left text-center back-1' id='fancy1_market_back_btn_" + marketId + "' "+back_attribute+"><button><span class='odd d-block'>"+runsYes+"</span> <span class='d-block'>"+kFormatter(oddsYes)+"</span></button></div></div></div></div>";

                                            lastrunsNo = runsNo;
                                            lastrunsYes = runsYes;
                                            $("#secure1").after(html_fancy_market_new1);
                                    }
                                    }
                            }
                            }

                                    if(html_fancy_market_new1 != ""){
                                            $("#fancy_odds_market1").show();

                                    }else{

                                    }
                                    var z = $.grep(marketIdArrayFancy1, function(el){return $.inArray(el, marketIdArrayNewFancy1) == -1});
                            if(z){
                                            for(i=0;i<z.length;i++){
                                                    marketId = z[i];
                                                    if($("#fancy1BetMarket_"+eventId+"_"+marketId).length > 0){
                                                            document.getElementById("fancy1BetMarket_"+eventId+"_"+marketId).remove();
                                                            $(".fancy1-suspend-tr_"+marketId).remove();

                                                    }
                                            }
                                    }
                                    marketIdArrayFancy1 = marketIdArrayNewFancy1;
                    }
                            //end for
                    }
                    }
                }

                if(args.body.khado){

                    if(args.body.khado[0]){
                        if(args.body.khado[0].value){
                                    if(args.body.khado[0].value.session){
                                            eventId = $(".event_name_heading").attr("eventid");
                                            event_name = $(".event_name_heading").attr("event_name");
                            marketIdArrayNewKhado = [];
                            counter2 = 0;
                            //start for
                            var body2 = args.body.khado[0].value.session.map(a =>  {let b = {}; b = a; b['SelectionId'] = parseInt(b['SelectionId']); return b;});
                            args.body.khado[0].value.session = _.sortBy(body2, 'SelectionId' );

                            for (i = 0; i < args.body.khado[0].value.session.length; i++) {
                                    html_khado_market_new = "";
                                    var eventId = <?php echo $event_id; ?>;
                                    marketId = args.body.khado[0].value.session[i].SelectionId;
                                    if(marketId == "" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.khado[0].value.session[i].GameStatus.toUpperCase() == "CLOSED"){
                            //	if(marketId == ""){

                                    }else{

                                    min_stack = args.body.khado[0].value.session[i].Min;
                                    max_stack = args.body.khado[0].value.session[i].Max;

                                    marketName = args.body.khado[0].value.session[i].RunnerName;
                                    statusLabel = args.body.khado[0].value.session[i].GameStatus;

                                    if(statusLabel == ""){
                                            $(".khado-suspend-tr_" + marketId).removeClass("suspended");

                                    }
                                    else if(statusLabel == "BALL_RUN"){

                                            $(".khado-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else if(statusLabel == "SUSPEND"){
                                            $(".khado-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else{
                                            $(".khado-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    $(".khado-suspend-tr_" + marketId).attr("data-title",statusLabel);
                                    if(args.body.khado[0].value.session[i] != undefined){
                                                    runsNo = args.body.khado[0].value.session[i].LayPrice1;
                                                    oddsNo = args.body.khado[0].value.session[i].LaySize1;
                                                    runsYes = args.body.khado[0].value.session[i].BackPrice1;
                                                    oddsYes = args.body.khado[0].value.session[i].BackSize1;
                                            }
                                            eventName = marketName;
                                            eventName2 = eventName.split(' ').join('_');
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
                                            if(check_runsNo_interger == true){
                                                    runsNo = 0;
                                            }
                                            if(check_oddsNo_interger == true){
                                                    oddsNo = 0;
                                            }
                                            if(check_runsYes_interger == true){
                                                    runsYes = 0;
                                            }
                                            if(check_oddsYes_interger == true){
                                                    oddsYes = 0;
                                            }
                            marketId = parseInt(marketId);
                            n1 = smdlm_c.includes(marketId);
                            n2 = mdlm_c.includes(marketId);
                            n3 = dlm_c.includes(marketId);
                            //if(!n1 && !n2 && !n3){
                            if(true){

                                    m1 = marketIdArrayKhado.includes(marketId);
                                    if(m1){
                                            marketIdArrayNewKhado[counter2] = marketId;
                                                    counter2++;
                                            if(runsNo == 0){
                                                    runsNo = "";
                                                    oddsNo = "";
                                            }

                                            if(runsYes == 0){
                                                    runsYes = "";
                                                    oddsYes = "";
                                            }

                                            lay_runs_info = "<span class='odd d-block'>"+runsNo+"</span> <span>"+oddsNo+"</span>";
                                            $("#khado_market_lay_btn_" + marketId).attr("event_name", event_name);
                                            $("#khado_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
                                            $("#khado_market_lay_btn_" + marketId).attr("selectionid", marketId);
                                            $("#khado_market_lay_btn_" + marketId).attr("runner", marketName);
                                            $("#khado_market_lay_btn_" + marketId).attr("marketname", marketName);
                                            $("#khado_market_lay_btn_" + marketId).attr("eventid", eventId);
                                            $("#khado_market_lay_btn_" + marketId).attr("marketid", marketId);
                                            $("#khado_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
                                            $("#khado_market_lay_btn_" + marketId).html();

                                            winning_zone = parseInt(runsYes) + parseInt(runsNo);

                                            back_runs_info = "<span class='odd d-block'>"+runsYes+"</span> <span>"+oddsYes+"</span>";
                                            $("#khado_market_back_btn_" + marketId).attr("event_name", event_name);
                                            $("#khado_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
                                            $("#khado_market_back_btn_" + marketId).attr("selectionid", marketId);
                                            $("#khado_market_back_btn_" + marketId).attr("runner", marketName+ ' - ' +runsNo );
                                            $("#khado_market_back_btn_" + marketId).attr("marketname", marketName);
                                            $("#khado_market_back_btn_" + marketId).attr("eventid", eventId);
                                            $("#khado_market_back_btn_" + marketId).attr("marketid", marketId);
                                            $("#khado_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);
                                            $("#khado_market_back_btn_" + marketId).attr("winnig_zone", winning_zone);

                                            $("#khado_market_back_btn_" + marketId).html(back_runs_info);


                                    }else{
                                            marketIdArrayNewKhado[counter2] = marketId;
                                            counter2++;

                                            winning_zone = runsYes + runsNo;
                                            back_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsYes+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"'  selectionid='"+marketId+"' market_odd_name='KHADO_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='KHADO_ODDS' inplay='1' fullfancymarketrate='"+oddsYes+"' winnig_zone='"+winning_zone+"'";

                                            lay_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsNo+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"' selectionid='"+marketId+"' market_odd_name='KHADO_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='KHADO_ODDS' inplay='1' fullfancymarketrate='"+oddsNo+"'";

                                            html_khado_market_new	+=	"<div id='khadoBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended khado-suspend-tr_" + marketId + "'><div class='float-left country-name box-4'><span><b>"+marketName+' - '+ runsNo +"</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-"+marketId+"' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-"+marketId+"' class='min-max-info collapse'> <span><b>Min:</b> "+min_stack+" </span> <span><b>Max:</b> "+max_stack+" </span> </div> </div> </div> <p id='live_match_points_"+marketId+"_KHADO_ODDS'><span class='float-left' style='color: black;'>0</span></p></div><div class='box-1 back float-left text-center back-1' id='khado_market_back_btn_" + marketId + "' "+back_attribute+"><button><span class='odd d-block'>"+runsYes+"</span> <span class='d-block'>"+oddsYes+"</span></button></div><div class='box-1 lay float-left text-center' id='khado_market_lay_btn_" + marketId + "' "+lay_attribute+"><button></button></div></div></div></div>";

                                            lastrunsNo = runsNo;
                                            lastrunsYes = runsYes;
                                            $("#secure_khado").after(html_khado_market_new);

                                    }
                                }
                            }
                            }

                                    if(html_khado_market_new != ""){
                                            $("#khado_odds_market").show();

                                    }else{

                                    }
                                    var z = $.grep(marketIdArrayKhado, function(el){return $.inArray(el, marketIdArrayNewKhado) == -1});
                            if(z){
                                            for(i=0;i<z.length;i++){
                                                    marketId = z[i];
                                                    if($("#khadoBetMarket_"+eventId+"_"+marketId).length > 0){
                                                            document.getElementById("khadoBetMarket_"+eventId+"_"+marketId).remove();
                                                            $(".khado-suspend-tr_"+marketId).remove();

                                                    }
                                            }
                                    }
                                    marketIdArrayKhado = marketIdArrayNewKhado;
                    }
                            //end for
                        }
                    }
                }

                if(args.body.ballByBall){

                    if(args.body.ballByBall[0]){
                            if(args.body.ballByBall[0].value){
                                    if(args.body.ballByBall[0].value.session){
                                            eventId = $(".event_name_heading").attr("eventid");
                                            event_name = $(".event_name_heading").attr("event_name");
                            counter2 = 0;
                            marketIdArrayNewBall = [];
                            //start for
                            var body2 = args.body.ballByBall[0].value.session.map(a =>  {let b = {}; b = a; b['SelectionId'] = parseInt(b['SelectionId']); return b;});
                            args.body.ballByBall[0].value.session = _.sortBy(body2, 'SelectionId' );

							var is_first_over_run = false, over_number = '';
                            for (i = 0; i < args.body.ballByBall[0].value.session.length; i++) {
                                    html_ball_market_new = "";
                                    var eventId = <?php echo $event_id; ?>;
                                    marketId = args.body.ballByBall[0].value.session[i].SelectionId;
                                    if(marketId == "" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.ballByBall[0].value.session[i].GameStatus.toUpperCase() == "CLOSED"){
                            //	if(marketId == ""){

                                    }else{
									
                                    min_stack = args.body.ballByBall[0].value.session[i].Min;
                                    max_stack = args.body.ballByBall[0].value.session[i].Max;

                                    marketName = args.body.ballByBall[0].value.session[i].RunnerName;
                                    statusLabel = args.body.ballByBall[0].value.session[i].GameStatus;

									if(args.body.ballByBall[0].value.session[i].marketId != '1.2102101733333'){
										if(marketName.search("Only ") == -1){
										
											/*if(is_first_over_run == false){
												if(marketName.search("over run") != -1){
												
													is_first_over_run = true;
													over_number = parseInt(marketName);
													over_number++;
												
													continue;
												}
											}else if(is_first_over_run && marketName.search(over_number+" over run") != -1){
												continue;
											}*/
										
											continue;
										}
									}
									
                                    
                                    if(statusLabel == ""){
                                            $(".ballByBall-suspend-tr_" + marketId).removeClass("suspended");

                                    }
                                    else if(statusLabel == "BALL_RUN"){

                                            $(".ballByBall-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else if(statusLabel == "SUSPEND"){
                                            $(".ballByBall-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else{
                                            $(".ballByBall-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    $(".ballByBall-suspend-tr_" + marketId).attr("data-title",statusLabel);
                                    if(args.body.ballByBall[0].value.session[i] != undefined){
                                                    runsNo = args.body.ballByBall[0].value.session[i].LayPrice1;
                                                    oddsNo = args.body.ballByBall[0].value.session[i].LaySize1;
                                                    runsYes = args.body.ballByBall[0].value.session[i].BackPrice1;
                                                    oddsYes = args.body.ballByBall[0].value.session[i].BackSize1;
                                            }
                                            eventName = marketName;
                                            eventName2 = eventName.split(' ').join('_');
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
                                            if(check_runsNo_interger == true){
                                                    runsNo = 0;
                                            }
                                            if(check_oddsNo_interger == true){
                                                    oddsNo = 0;
                                            }
                                            if(check_runsYes_interger == true){
                                                    runsYes = 0;
                                            }
                                            if(check_oddsYes_interger == true){
                                                    oddsYes = 0;
                                            }
                            marketId = parseInt(marketId);
                            n1 = smdlm_c.includes(marketId);
                            n2 = mdlm_c.includes(marketId);
                            n3 = dlm_c.includes(marketId);
                            //if(!n1 && !n2 && !n3){
                            
                            if(true){

                                    m1 = marketIdArrayBall.includes(marketId);
                                    if(m1){
                                            marketIdArrayNewBall[counter2] = marketId;
                                                    counter2++;
                                            if(runsNo == 0){
                                                    runsNo = "";
                                                    oddsNo = "";
                                            }

                                            if(runsYes == 0){
                                                    runsYes = "";
                                                    oddsYes = "";
                                            }

                                            lay_runs_info = "<span class='odd d-block'>"+runsNo+"</span> <span>"+oddsNo+"</span>";
                                            $("#ball_market_lay_btn_" + marketId).attr("event_name", event_name);
                                            $("#ball_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
                                            $("#ball_market_lay_btn_" + marketId).attr("selectionid", marketId);
                                            $("#ball_market_lay_btn_" + marketId).attr("runner", marketName);
                                            $("#ball_market_lay_btn_" + marketId).attr("marketname", marketName);
                                            $("#ball_market_lay_btn_" + marketId).attr("eventid", eventId);
                                            $("#ball_market_lay_btn_" + marketId).attr("marketid", marketId);
                                            $("#ball_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
                                            $("#ball_market_lay_btn_" + marketId).html(lay_runs_info);

                                            back_runs_info = "<span class='odd d-block'>"+runsYes+"</span> <span>"+oddsYes+"</span>";
                                            $("#ball_market_back_btn_" + marketId).attr("event_name", event_name);
                                            $("#ball_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
                                            $("#ball_market_back_btn_" + marketId).attr("selectionid", marketId);
                                            $("#ball_market_back_btn_" + marketId).attr("runner", marketName);
                                            $("#ball_market_back_btn_" + marketId).attr("marketname", marketName);
                                            $("#ball_market_back_btn_" + marketId).attr("eventid", eventId);
                                            $("#ball_market_back_btn_" + marketId).attr("marketid", marketId);
                                            $("#ball_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);

                                            $("#ball_market_back_btn_" + marketId).html(back_runs_info);


                                    }else{
                                            marketIdArrayNewBall[counter2] = marketId;
                                            counter2++;


                                            back_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsYes+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"'  selectionid='"+marketId+"' market_odd_name='BALL_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+oddsYes+"'";

                                            lay_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsNo+"' side='Lay' marketid='"+marketId+"' eventid='"+eventId+"' selectionid='"+marketId+"' market_odd_name='BALL_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+oddsNo+"'";



                                            html_ball_market_new	+=	"<div id='ballBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended ballByBall-suspend-tr_" + marketId + "'><div class='float-left country-name box-4'><span><b>"+marketName+"</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-"+marketId+"' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-"+marketId+"' class='min-max-info collapse'> <span><b>Min:</b> "+min_stack+" </span> <span><b>Max:</b> "+max_stack+" </span> </div> </div> </div> <p id='live_match_points_"+marketId+"_FANCY_ODDS'><span class='float-left' style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='ball_market_lay_btn_" + marketId + "' "+lay_attribute+"><button><span class='odd d-block'>"+runsNo+"</span> <span class='d-block'>"+oddsNo+"</span></button></div><div class='box-1 back float-left text-center back-1' id='ball_market_back_btn_" + marketId + "' "+back_attribute+"><button><span class='odd d-block'>"+runsYes+"</span> <span class='d-block'>"+oddsYes+"</span></button></div></div></div></div>";

                                            lastrunsNo = runsNo;
                                            lastrunsYes = runsYes;
                                            $("#secure_ball").after(html_ball_market_new);


                                    }
                                    }
                            }
                            }

                                    if(html_ball_market_new != ""){
                                            $("#ball_odds_market").show();

                                    }
                                    var z = $.grep(marketIdArrayBall, function(el){return $.inArray(el, marketIdArrayNewBall) == -1});
                            if(z){
                                            for(i=0;i<z.length;i++){
                                                    marketId = z[i];
                                                    if($("#ballBetMarket_"+eventId+"_"+marketId).length > 0){
                                                            document.getElementById("ballBetMarket_"+eventId+"_"+marketId).remove();
                                                            $(".ballByBall-suspend-tr_"+marketId).remove();
                                                    }
                                            }
                                    }
                                    marketIdArrayBall = marketIdArrayNewBall;
                    }
                            //end for
                    }
                    }
                            }

                if(args.body.oddEven){

                    if(args.body.oddEven[0]){
                        if(args.body.oddEven[0].value){
                                if(args.body.oddEven[0].value.session){
                                    eventId = $(".event_name_heading").attr("eventid");
                                    event_name = $(".event_name_heading").attr("event_name");
                                    counter2 = 0;
                                     marketIdArrayNewOddeven = [];
                                    //start for
                                    var body2 = args.body.oddEven[0].value.session.map(a =>  {let b = {}; b = a; b['SelectionId'] = parseInt(b['SelectionId']); return b;});
                                    args.body.oddEven[0].value.session = _.sortBy(body2, 'SelectionId' );


                                    for (i = 0; i < args.body.oddEven[0].value.session.length; i++) {
                                        html_oddeven_market_new = "";
                                        var eventId = <?php echo $event_id; ?>;
                                        marketId = args.body.oddEven[0].value.session[i].SelectionId;
                                        if(marketId == "" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.oddEven[0].value.session[i].GameStatus.toUpperCase() == "CLOSED"){
                                        //	if(marketId == ""){

                                        }else{

                                    min_stack = args.body.oddEven[0].value.session[i].Min;
                                    max_stack = args.body.oddEven[0].value.session[i].Max;

                                    marketName = args.body.oddEven[0].value.session[i].RunnerName;
                                    statusLabel = args.body.oddEven[0].value.session[i].GameStatus;

                                    if(statusLabel == ""){
                                            $(".oddeven-suspend-tr_" + marketId).removeClass("suspended");

                                    }
                                    else if(statusLabel == "BALL_RUN"){

                                            $(".oddeven-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else if(statusLabel == "SUSPEND"){
                                            $(".oddeven-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else{
                                            $(".oddeven-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                $(".oddeven-suspend-tr_" + marketId).attr("data-title",statusLabel);
                                if(args.body.oddEven[0].value.session[i] != undefined){
                                                runsNo = args.body.oddEven[0].value.session[i].LayPrice1;
                                                oddsNo = args.body.oddEven[0].value.session[i].LaySize1;
                                                runsYes = args.body.oddEven[0].value.session[i].BackPrice1;
                                                oddsYes = args.body.oddEven[0].value.session[i].BackSize1;
                                        }
                                        eventName = marketName;
                                        if(eventName){
                                                eventName2 = eventName.split(' ').join('_');
                                        }
                                        else{
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
                                        if(check_runsNo_interger == true){
                                                runsNo = 0;
                                        }
                                        if(check_oddsNo_interger == true){
                                                oddsNo = 0;
                                        }
                                        if(check_runsYes_interger == true){
                                                runsYes = 0;
                                        }
                                        if(check_oddsYes_interger == true){
                                                oddsYes = 0;
                                        }
                        marketId = parseInt(marketId);
                        n1 = smdlm_c.includes(marketId);
                        n2 = mdlm_c.includes(marketId);
                        n3 = dlm_c.includes(marketId);
                        //if(!n1 && !n2 && !n3){
                        
                        if(true){

                                m1 = marketIdArrayOddeven.includes(marketId);
                                if(m1){
                                        marketIdArrayNewOddeven[counter2] = marketId;
                                                counter2++;
                                        if(runsNo == 0){
                                                runsNo = "";
                                                oddsNo = "";
                                        }

                                        if(runsYes == 0){
                                                runsYes = "";
                                                oddsYes = "";
                                        }

                                        lay_runs_info = "<span class='odd d-block'>"+runsNo+"</span> <span>"+kFormatter(oddsNo)+"</span>";
                                        $("#oddeven_market_lay_btn_" + marketId).attr("event_name", event_name);
                                        $("#oddeven_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
                                        $("#oddeven_market_lay_btn_" + marketId).attr("selectionid", marketId);
                                        $("#oddeven_market_lay_btn_" + marketId).attr("runner", marketName);
                                        $("#oddeven_market_lay_btn_" + marketId).attr("marketname", marketName);
                                        $("#oddeven_market_lay_btn_" + marketId).attr("eventid", eventId);
                                        $("#oddeven_market_lay_btn_" + marketId).attr("marketid", marketId);
                                        $("#oddeven_market_lay_btn_" + marketId).attr("fullfancymarketrate", runsNo);
                                        $("#oddeven_market_lay_btn_" + marketId).html(lay_runs_info);

                                        back_runs_info = "<span class='odd d-block'>"+runsYes+"</span> <span>"+kFormatter(oddsYes)+"</span>";
                                        $("#oddeven_market_back_btn_" + marketId).attr("event_name", event_name);
                                        $("#oddeven_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
                                        $("#oddeven_market_back_btn_" + marketId).attr("selectionid", marketId);
                                        $("#oddeven_market_back_btn_" + marketId).attr("runner", marketName);
                                        $("#oddeven_market_back_btn_" + marketId).attr("marketname", marketName);
                                        $("#oddeven_market_back_btn_" + marketId).attr("eventid", eventId);
                                        $("#oddeven_market_back_btn_" + marketId).attr("marketid", marketId);
                                        $("#oddeven_market_back_btn_" + marketId).attr("fullfancymarketrate", runsYes);

                                        $("#oddeven_market_back_btn_" + marketId).html(back_runs_info);


                                }else{
                                        marketIdArrayNewOddeven[counter2] = marketId;
                                        counter2++;


                                        odd_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsYes+"' side='Lay' marketid='"+oddsmarketId+"' eventid='"+eventId+"'  selectionid='"+marketId+"' market_odd_name='ODDEVEN_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+oddsYes+"'";

                                        even_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsNo+"' side='Lay' marketid='"+oddsmarketId+"' eventid='"+eventId+"' selectionid='"+marketId+"' market_odd_name='ODDEVEN_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='FANCY_ODDS' inplay='1' fullfancymarketrate='"+oddsNo+"'";

                                        html_oddeven_market_new += " <div id='oddevenBetMarket_" + eventId + "_" + marketId + "'>  <div class='fancy-tripple' >   <div data-title='SUSPENDED' class='table-row suspended oddeven-suspend-tr_" + marketId + "'>    <div class='float-left country-name box-4'>    <span><b>"+marketName+"</b></span> <div class='float-right'> <div class='info-block'> <a data-toggle='collapse' data-target='#min-max-"+marketId+"' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-"+marketId+"' class='min-max-info collapse'> <span><b>Min:</b> "+min_stack+" </span> <span><b>Max:</b> "+max_stack+" </span> </div> </div> </div> <p id='live_match_points_"+marketId+"_FANCY_ODDS'>     <span class='float-left' style='color: black;'>0</span>    </p>   </div>   <div class='box-1 back float-left text-center lay-1' id='oddeven_market_back_btn_" + marketId + "' "+odd_attribute+">    <button>     <span class='odd d-block'>"+runsNo+"</span>     <span class='d-block'>"+kFormatter(oddsNo)+"</span>    </button>   </div>   <div class='box-1 back float-left text-center back-1' id='oddeven_market_lay_btn_" + marketId + "' "+even_attribute+">    <button>     <span class='odd d-block'>"+runsYes+"</span>     <span class='d-block'>"+kFormatter(oddsYes)+"</span>    </button>   </div>  </div> </div></div>";

                                        lastrunsNo = runsNo;
                                        lastrunsYes = runsYes;
                                        if(marketIdArrayOddeven[i-1]){
                                                $('#oddevenBetMarket_'+eventId+'_'+marketIdArrayOddeven[i-1]).after(html_oddeven_market_new);
                                        }
                                        else if(i > 0){
                                                var x = args.body.oddEven[0].value.session[i - 1].SelectionId;
                                                if($('#oddevenBetMarket_'+eventId+'_'+x).length > 0){

                                                        $('#oddevenBetMarket_'+eventId+'_'+x).after(html_oddeven_market_new);
                                                }
                                                else{
                                                        $("#secure_oddeven").after(html_oddeven_market_new);
                                                }
                                        }
                                        else{
                                                $("#secure_oddeven").after(html_oddeven_market_new);
                                        }

                                }
                                }
                        }
                        }

                        if(html_oddeven_market_new != ""){
                                $('#oddeven').find('.fancy-message').hide();
                                $("#oddeven_odds_market").show();

                        }else{

                        }
                                var z = $.grep(marketIdArrayOddeven, function(el){return $.inArray(el, marketIdArrayNewOddeven) == -1});
                        if(z){
                                        for(i=0;i<z.length;i++){
                                                marketId = z[i];
                                                if($("#oddevenBetMarket_"+eventId+"_"+marketId).length > 0){
                                                        document.getElementById("oddevenBetMarket_"+eventId+"_"+marketId).remove();
                                                        $(".oddeven-suspend-tr_"+marketId).remove();

                                                }
                                        }
                                }
                                marketIdArrayOddeven = marketIdArrayNewOddeven;
                }
                        //end for
                }
                }

                }

                if(args.body.meter){

                    if(args.body.meter[0]){
                            if(args.body.meter[0].value){
                                    if(args.body.meter[0].value.session){
                                            eventId = $(".event_name_heading").attr("eventid");
                                            event_name = $(".event_name_heading").attr("event_name");
                            counter2 = 0;
                            marketIdArrayNewMeter = [];
                            //start for
                            var body2 = args.body.meter[0].value.session.map(a =>  {let b = {}; b = a; b['SelectionId'] = parseInt(b['SelectionId']); return b;});
                            args.body.meter[0].value.session = _.sortBy(body2, 'SelectionId' );


                            for (i = 0; i < args.body.meter[0].value.session.length; i++) {
                                    html_meter_market_new = "";
                                    var eventId = <?php echo $event_id; ?>;
                                    marketId = args.body.meter[0].value.session[i].SelectionId;
                                if(marketId == "" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "OFFLINE" || args.body.meter[0].value.session[i].GameStatus.toUpperCase() == "CLOSED"){
                                //	if(marketId == ""){

                                }else{

                                    min_stack = args.body.meter[0].value.session[i].Min;
                                    max_stack = args.body.meter[0].value.session[i].Max;

                                    marketName = args.body.meter[0].value.session[i].RunnerName;
                                    statusLabel = args.body.meter[0].value.session[i].GameStatus;

                                    if(statusLabel == ""){
                                            $(".meter-suspend-tr_" + marketId).removeClass("suspended");

                                    }
                                    else if(statusLabel == "BALL_RUN"){

                                            $(".meter-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else if(statusLabel == "SUSPEND"){
                                            $(".meter-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    else{
                                            $(".meter-suspend-tr_" + marketId).addClass("suspended");

                                    }
                                    $(".meter-suspend-tr_" + marketId).attr("data-title",statusLabel);
                                    if(args.body.meter[0].value.session[i] != undefined){
                                                    runsNo = args.body.meter[0].value.session[i].LayPrice1;
                                                    oddsNo = args.body.meter[0].value.session[i].LaySize1;
                                                    runsYes = args.body.meter[0].value.session[i].BackPrice1;
                                                    oddsYes = args.body.meter[0].value.session[i].BackSize1;
                                            }
                                            eventName = marketName;
                                            eventName2 = eventName.split(' ').join('_');
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
                                            if(check_runsNo_interger == true){
                                                    runsNo = 0;
                                            }
                                            if(check_oddsNo_interger == true){
                                                    oddsNo = 0;
                                            }
                                            if(check_runsYes_interger == true){
                                                    runsYes = 0;
                                            }
                                            if(check_oddsYes_interger == true){
                                                    oddsYes = 0;
                                            }

                                            marketId = parseInt(marketId);
                                            n1 = smdlm_c.includes(marketId);
                                            n2 = mdlm_c.includes(marketId);
                                            n3 = dlm_c.includes(marketId);

                                            //if(!n1 && !n2 && !n3){
                                            if(true){

                                            m1 = marketIdArrayMeter.includes(marketId);

                                            if(m1){
                                                marketIdArrayNewMeter[counter2] = marketId;
                                                        counter2++;
                                                if(runsNo == 0){
                                                        runsNo = "";
                                                        oddsNo = "";
                                                }

                                                if(runsYes == 0){
                                                        runsYes = "";
                                                        oddsYes = "";
                                                }

                                                lay_runs_info = "<span class='odd d-block'>"+runsNo+"</span> <span>"+kFormatter(oddsNo)+"</span>";
                                                $("#meter_market_lay_btn_" + marketId).attr("event_name", event_name);
                                                $("#meter_market_lay_btn_" + marketId).attr("fullmarketodds", runsNo);
                                                $("#meter_market_lay_btn_" + marketId).attr("selectionid", marketId);
                                                $("#meter_market_lay_btn_" + marketId).attr("runner", marketName);
                                                $("#meter_market_lay_btn_" + marketId).attr("marketname", marketName);
                                                $("#meter_market_lay_btn_" + marketId).attr("eventid", eventId);
                                                $("#meter_market_lay_btn_" + marketId).attr("marketid", marketId);
                                                $("#meter_market_lay_btn_" + marketId).attr("fullfancymarketrate", oddsNo);
                                                $("#meter_market_lay_btn_" + marketId).html(lay_runs_info);

                                                back_runs_info = "<span class='odd d-block'>"+runsYes+"</span> <span>"+kFormatter(oddsYes)+"</span>";
                                                $("#meter_market_back_btn_" + marketId).attr("event_name", event_name);
                                                $("#meter_market_back_btn_" + marketId).attr("fullmarketodds", runsYes);
                                                $("#meter_market_back_btn_" + marketId).attr("selectionid", marketId);
                                                $("#meter_market_back_btn_" + marketId).attr("runner", marketName);
                                                $("#meter_market_back_btn_" + marketId).attr("marketname", marketName);
                                                $("#meter_market_back_btn_" + marketId).attr("eventid", eventId);
                                                $("#meter_market_back_btn_" + marketId).attr("marketid", marketId);
                                                $("#meter_market_back_btn_" + marketId).attr("fullfancymarketrate", oddsYes);

                                                $("#meter_market_back_btn_" + marketId).html(back_runs_info);


                                            }else{
                                                marketIdArrayNewMeter[counter2] = marketId;
                                                counter2++;

                                                back_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsYes+"' side='Lay' marketid='"+oddsmarketId+"' eventid='"+eventId+"'  selectionid='"+marketId+"' market_odd_name='METER_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='METER_ODDS' inplay='1' fullfancymarketrate='"+oddsYes+"'";

                                                lay_attribute = " event_name='"+event_name+"' fullmarketodds='"+runsNo+"' side='Lay' marketid='"+oddsmarketId+"' eventid='"+eventId+"' selectionid='"+marketId+"' market_odd_name='METER_ODDS' runner='"+marketName+"' marketname='"+marketName+"' markettype='METER_ODDS' inplay='1' fullfancymarketrate='"+oddsNo+"'";

                                                html_meter_market_new	+=	"<div id='meterBetMarket_" + eventId + "_" + marketId + "'><div class='fancy-tripple' > <div data-title='SUSPENDED' class='table-row suspended meter-suspend-tr_" + marketId + "'><div class='float-left country-name box-4'><span><b>"+marketName+"</b></span> <div class='float-right'> <div class='info-block'> <a href='javascript:void(0);' data-toggle='collapse' data-target='#min-max-"+marketId+"' aria-expanded='false' class='info-icon collapsed'> <i class='fas fa-info-circle m-l-10'></i> </a> <div id='min-max-"+marketId+"' class='min-max-info collapse'> <span><b>Min:</b> "+min_stack+" </span> <span><b>Max:</b> "+max_stack+" </span> </div> </div> </div> <p id='live_match_points_"+marketId+"_METER_ODDS'><span class='float-left' style='color: black;'>0</span></p></div><div class='box-1 lay float-left text-center lay-1' id='meter_market_lay_btn_" + marketId + "' "+lay_attribute+"><button><span class='odd d-block'>"+runsNo+"</span> <span class='d-block'>"+kFormatter(oddsNo)+"</span></button></div><div class='box-1 back float-left text-center back-1' id='meter_market_back_btn_" + marketId + "' "+back_attribute+"><button><span class='odd d-block'>"+runsYes+"</span> <span class='d-block'>"+kFormatter(oddsYes)+"</span></button></div></div></div></div>";
                                                lastrunsNo = runsNo;
                                                lastrunsYes = runsYes;
                                                $("#secure_meter").after(html_meter_market_new);

                                            }
                                        }
                                    }
                            }

                                    if(html_meter_market_new != ""){
                                            $("#meter_odds_market").show();

                                    }else{

                                    }
                                    var z = $.grep(marketIdArrayMeter, function(el){return $.inArray(el, marketIdArrayNewMeter) == -1});
                            if(z){
                                            for(i=0;i<z.length;i++){
                                                    marketId = z[i];
                                                    if($("#meterBetMarket_"+eventId+"_"+marketId).length > 0){
                                                            document.getElementById("meterBetMarket_"+eventId+"_"+marketId).remove();
                                                            $(".meter-suspend-tr_"+marketId).remove();

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

	setTimeout(getlive_match_point,3000);
	
    function getlive_match_point(){

    var added_team_1;
    var added_team_2;
    var added_team_3;
    var eventId = <?php echo $event_id; ?>;
                            $.ajax({
                                     type: 'POST',
                                     url: '../ajaxfiles/get_live_match_points_v2.php',
                                     dataType: 'json',
                                     data: {eventId:eventId,market_ids:selectorIdArray},
                                     success: function(response) {

                                             var status = response.status;

                                            if(status == 'ok'){
                                                    if(response.data){
                                                            //if(response.data == "MATCH_ODDS" ){
                                                            for(var i in response.data){
                                                                    if(i != "FANCY_ODDS" && i != "METER_ODDS" && i != "KHADO_ODDS"){

                                                                            var market_1 = parseInt(response.data[i].market_ids.team_1);
                                                                            var market_2 = parseInt(response.data[i].market_ids.team_2);
                                                                            var market_3 = parseInt(response.data[i].market_ids.team_3);
                                                                            var team_1_exposure= parseInt(response.data[i].exposure.team_1);
                                                                            var team_2_exposure= parseInt(response.data[i].exposure.team_2);
                                                                            var team_3_exposure= parseInt(response.data[i].exposure.team_3);
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

    jQuery(document).on("click", ".back-1", function () {        
		$("#popup_color").removeClass("back");			
		$("#popup_color").removeClass("lay");	
		$("#popup_color").addClass("back");
		
		var fullmarketodds = $(this).attr("fullmarketodds");
		if (fullmarketodds != "") {
				side = $(this).attr("side");
				selectionid = $(this).attr("selectionid");
				market_odd_name = $(this).attr("markettype");

				if(['ODDEVEN_ODDS','FANCY1_ODDS','BALL_ODDS','METER_ODDS','KHADO_ODDS'].includes($(this).attr("market_odd_name")))
					market_odd_name = $(this).attr("market_odd_name");

				runner = $(this).attr("runner");
				market_runner_name = runner;
				marketname = $(this).attr("marketname");
				markettype = $(this).attr("markettype");
				fullfancymarketrate = $(this).attr("fullfancymarketrate");
				odds_change_value = "disabled";
				runs_lable = 'Runs';
				runs_lable = 'Odds';
				fullfancymarketrate = fullmarketodds;
				eventId = '<?php echo $event_id;?>';//$(this).attr("eventid");
				marketId = $(this).attr("marketid");
				event_name = $(this).attr("event_name");
				$(".select").removeClass("select");
				$(this).addClass("select");
				return_html = "";
				winnig_zone = 0;
				if(markettype == "KHADO_ODDS"){
					winnig_zone = $(this).attr("winnig_zone");
					$("#profitLiability").text(winnig_zone);
				}
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
				//$('.modal').show();
				$('#open_back_place_bet').modal("show");
		}
    });

    jQuery(document).on("click", ".lay-1", function () {		
        $("#popup_color").removeClass("back");			
        $("#popup_color").removeClass("lay");	
        $("#popup_color").addClass("lay");
        var fullmarketodds = $(this).attr("fullmarketodds");
        if (fullmarketodds != "") {
                side = $(this).attr("side");
                selectionid = $(this).attr("selectionid");
                market_odd_name = $(this).attr("markettype");

                if(['ODDEVEN_ODDS','FANCY1_ODDS','BALL_ODDS','METER_ODDS','KHADO_ODDS'].includes($(this).attr("market_odd_name")))
                    market_odd_name = $(this).attr("market_odd_name");

                runner = $(this).attr("runner");
                market_runner_name = runner;
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
                //$('.modal').show();			
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
        if(bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS"){
            odds = (odds/100)+1;
        }
        if(bet_markettype != "FANCY_ODDS"){
            if(bet_stake_side == "Lay"){
                profit = parseInt(inputStake);
            }else{
                profit = (odds - 1 ) * inputStake;
            }
        }
        if(bet_markettype == "MATCH_ODDS" || bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS"){
            $("#profitLiability").text(profit.toFixed(2));
        }
    });

    jQuery(document).on("click", ".label_stake", function () {
       stake = $(this).attr("stake");
       eventId = $("#fullMarketBetsWrap").attr("eventid");
        $("#inputStake").val(stake);
        odds =  parseFloat($("#odds_val").val());
        inputStake = $("#inputStake").val();
        bet_stake_side = $("#bet_stake_side").val();
        bet_markettype = $("#bet_markettype").val();
        
        if(bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS"){
            odds = (odds/100)+1;
        }
        
        if(bet_markettype != "FANCY_ODDS"){
            if(bet_stake_side == "Lay"){
                profit = (odds - 1 ) * inputStake;
            }else{
                profit = (odds - 1 ) * inputStake;
            }
        }
        if(bet_markettype == "MATCH_ODDS" || bet_markettype == "BOOKMAKER_ODDS" || bet_markettype == "BOOKMAKERSMALL_ODDS"){
            $("#profitLiability").text(profit.toFixed(2));
        }
    });

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
                        runsNo = $('.select').attr("fullmarketodds");
                        oddsNo = $('.select').attr("fullfancymarketrate");
                    }

                    $(".placeBet").addClass("disable");
                    $("#inputStake").val("");
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
						 url: '../ajaxfiles/bet_place_v2_.php',
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
							refresh(1);
							getlive_match_point();
							$("#placeBet").html('Submit');
							$(".placeBet").removeClass("disable");
							//$('.modal').hide();
							$('#open_back_place_bet').modal("hide");
						 }
					 });
            });
        
</script>  
<div id="open_back_place_bet" class="modal" role="dialog" >
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
                        <input type="text" placeholder="0" disabled readonly class="stakeinput" id="odds_val"> </span>                                       
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
<?php
	include "footer.php";
?>
</html>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>