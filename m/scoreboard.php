<?php
	include('include/conn.php');
	include('include/flip_function.php');
	include('session.php');
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$event_id = $_REQUEST['eventId'];
?>
<html style="overflow : hidden;">
	<head>
		<style>
			.scorecard-mobile{
				'height' : '100%';
			}
		</style>
		<script type="text/javascript" src="/js/socket.io-2.js?id=1"></script>
		<?php
include("head_css2.php");
?>
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript">
			var GAME_ID = '<?php echo $event_id;?>';
			var SCOREBOARD_URL = "wss://sportsscore24.com/";
			var ssocket = null;
			var socketScoreBoard;

			scoreboardConnect();
			function scoreboardConnect(){
				socketScoreBoard = io.connect(SCOREBOARD_URL, { transports: ['websocket'] });
				socketScoreBoard.on("connect", function() {
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
		</script>
	</head>
	<div style="height : 100%;" id="scoreboard-box">
        
      	</div>
</html>