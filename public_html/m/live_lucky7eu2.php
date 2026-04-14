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
    .img-fluid {
    max-width: 100%;
    height: 50px;
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

.casino-table {
        background-color: #f7f7f7;
        color: #333;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .casino-table-full-box {
        width: 100%;
        border-left: 1px solid #c7c8ca;
        border-right: 1px solid #c7c8ca;
        border-top: 1px solid #c7c8ca;
        background-color: #f2f2f2;
    }

   .casino-table-full-box {
    display: flex;
    flex-wrap: wrap;
    padding: 10px;
    border: 0;
    justify-content: space-between;
    align-items: flex-start;
}

 .lucky7low, .lucky7high {
    width: 40%;
}

.casino-odds {
    font-size: 14px;
    font-weight: bold;
    line-height: 1;
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

    .casino-odds-box-theme {
	    background-image: linear-gradient(to right, #0088cc, #2c3e50);
	    color: #ffffff;
	    border-radius: 4px;
	    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
	    border: 0;
	}

	.casino-nation-book {
    font-size: 12px;
    font-weight: bold;
    min-height: 18px;
    z-index: 1;
}

img, svg {
    vertical-align: middle;
}

.lucky7 img {
    height: 50px;
}

.casino-table-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
    }

    .casino-table-box {
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

    .casino-table-left-box, .casino-table-right-box {
    display: flex
;
    flex-wrap: wrap;
    padding: 10px;
    border: 0;
}

    .casino-table-left-box, .casino-table-right-box {
        width: 49%;
    }

    .lucky7odds {
    width: calc(50% - 10px);
    margin-right: 10px;
}

.card-odd-box-container {
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
}

    .card-odd-box img {
        height: 45px;
    }

    .lucky7cards {
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    width: 24%;
    background-color: #f2f2f2;
    padding: 10px 0 0 0;
    height: 130px;
    align-content: flex-start;
}

.lucky7cards {
        width: 49%;
        margin-top: 10px;
    }


.card-odd-box-container {
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
}

.card-odd-box {
    display: flex
;
    flex-wrap: wrap;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
    margin-bottom: 4px;
    margin-right: 4px;
    cursor: pointer;
}

.casino-last-result-title {
    padding: 10px;
    background-color: #2c3e50d9;
    color: #ffffff;
    font-size: 14px;
    display: flex
;
    justify-content: space-between;
    margin-top: 10px;
    width: 100%;
}

.casino-last-result-title a {
    color: #ffffff;
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
        color: #fff;
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
                <div class="casino-title"><span class="casino-name">Lucky 7 - c</span><span class="d-block"><a href="#" onclick="view_rules('lucky7eu2')" data-target="#rules_popup" data-toggle="modal" id="rules_popup_btn" class="ml-1" role="button">Rules</a></span></div>

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
                               <iframe src="<?php echo IFRAME_URL."".LUCKY7EU2_CODE;?>" width="100%" height="250px" style="border: 0px;"></iframe>
                               <?php
                                
                            }else{
                                ?>
                                <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                                <?php

                            }
                            ?>

                            	<!-- <iframe id="casinoIframe" src="" width="100%" height="200" style="border: 0px;"></iframe>
                               <iframe src="<?php echo IFRAME_URL; echo LUCKY7EU2_CODE; ?>" width="100%" height="200" style="border: 0px;"></iframe> -->
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
                                    <div><img id="card_c1" src="/storage/front/img/cards/1.png"></div>
                                </div>
                            </div>
                            <div class="casino-detail">
                                <div class="casino-table">
                                    <div class="casino-table-full-box">
                                        <div class=" lucky7low">
                                            <div class="casino-odds text-center market_1_b_value">2</div>
                                            <div class="casino-odds-box back casino-odds-box-theme suspended market_1_row back-1 market_1_b_btn"><span class="casino-odds">Low Card</span></div>
                                            <div class="casino-nation-book text-center market_1_b_exposure market_exposure" ></div>
                                        </div>
                                        <div class="lucky7"><img src="/storage/front/img/andar_bahar/7.jpg"></div>
                                        <div class=" lucky7high">
                                            <div class="casino-odds text-center market_2_b_value">2</div>
                                            <div class="casino-odds-box back casino-odds-box-theme suspended market_2_row back-1 market_2_b_btn"><span class="casino-odds">High Card</span></div>
                                            <div class="casino-nation-book text-center market_2_b_exposure market_exposure"></div>
                                        </div>
                                    </div>
                                    <div class="casino-table-box mt-3">
                                        <div class="casino-table-left-box">
                                            <div class=" lucky7odds">
                                            <div class="casino-odds text-center market_3_b_value">2.1</div>
                                            <div class="casino-odds-box back casino-odds-box-theme  suspended market_3_row back-1 market_3_b_btn"><span class="casino-odds">Even</span></div>
                                            <div class="casino-nation-book text-center market_3_b_exposure market_exposure"></div>
                                            </div>
                                            <div class=" lucky7odds">
                                            <div class="casino-odds text-center market_4_b_value">1.79</div>
                                            <div class="casino-odds-box back casino-odds-box-theme suspended market_4_row back-1 market_4_b_btn"><span class="casino-odds">Odd</span></div>
                                            <div class="casino-nation-book text-center market_4_b_exposure market_exposure"></div>
                                            </div>
                                        </div>
                                        <div class="casino-table-right-box">
                                            <div class=" lucky7odds">
                                            <div class="casino-odds text-center market_5_b_value">1.95</div>
                                            <div class="casino-odds-box back casino-odds-box-theme suspended market_5_row back-1 market_5_b_btn"><span class="casino-odds"><span class="card-icon ms-1"><span class="card-red ">{</span></span><span class="card-icon ms-1"><span class="card-red ">[</span></span></span></div>
                                            <div class="casino-nation-book text-center market_5_b_exposure market_exposure"></div>
                                            </div>
                                            <div class=" lucky7odds">
                                            <div class="casino-odds text-center market_6_b_value">1.95</div>
                                            <div class="casino-odds-box back casino-odds-box-theme  suspended market_6_row back-1 market_6_b_btn"><span class="casino-odds"><span class="card-icon ms-1"><span class="card-black ">}</span></span><span class="card-icon ms-1"><span class="card-black ">]</span></span></span></div>
                                            <div class="casino-nation-book text-center market_6_b_exposure market_exposure"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="casino-table-box mt-3">
                                        <div class="lucky7cards">
                                            <div class="casino-odds w-100 text-center market_20_b_value">4</div>
                                            <div class="card-odd-box-container suspended market_20_row back-1 market_20_b_btn">
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/1.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/2.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/3.jpg"></div>
                                            </div>
                                            </div>
                                            <div class="casino-nation-book text-center w-100 market_20_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="lucky7cards">
                                            <div class="casino-odds w-100 text-center market_21_b_value">4</div>
                                            <div class="card-odd-box-container suspended market_21_row back-1 market_21_b_btn">
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/4.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/5.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/6.jpg"></div>
                                            </div>
                                            </div>
                                            <div class="casino-nation-book text-center w-100 market_21_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="lucky7cards">
                                            <div class="casino-odds w-100 text-center market_22_b_value">4</div>
                                            <div class="card-odd-box-container suspended market_22_row back-1 market_22_b_btn">
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/8.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/9.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/10.jpg"></div>
                                            </div>
                                            </div>
                                            <div class="casino-nation-book text-center w-100 market_22_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="lucky7cards">
                                            <div class="casino-odds w-100 text-center market_23_b_value">4</div>
                                            <div class="card-odd-box-container suspended market_23_row back-1 market_23_b_btn">
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/11.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/12.jpg"></div>
                                            </div>
                                            <div class="card-odd-box">
                                                <div class=""><img src="/storage/front/img/andar_bahar/13.jpg"></div>
                                            </div>
                                            </div>
                                            <div class="casino-nation-book text-center w-100 market_23_b_exposure market_exposure"></div>
                                        </div>
                                    </div>
                                    <div class="casino-table-full-box lucky7acards mt-3">
                                        <div class="casino-odds w-100 text-center market_7_b_value">12</div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_7_row back-1 market_7_b_btn"><img src="/storage/front/img/andar_bahar/1.jpg"></div>
                                            <div class="casino-nation-book market_7_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_8_row back-1 market_8_b_btn"><img src="/storage/front/img/andar_bahar/2.jpg"></div>
                                            <div class="casino-nation-book market_8_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_9_row back-1 market_9_b_btn"><img src="/storage/front/img/andar_bahar/3.jpg"></div>
                                            <div class="casino-nation-book market_9_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_10_row back-1 market_10_b_btn"><img src="/storage/front/img/andar_bahar/4.jpg"></div>
                                            <div class="casino-nation-book market_10_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_11_row back-1 market_11_b_btn"><img src="/storage/front/img/andar_bahar/5.jpg"></div>
                                            <div class="casino-nation-book market_11_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_12_row back-1 market_12_b_btn"><img src="/storage/front/img/andar_bahar/6.jpg"></div>
                                            <div class="casino-nation-book market_12_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_13_row back-1 market_13_b_btn"><img src="/storage/front/img/andar_bahar/7.jpg"></div>
                                            <div class="casino-nation-book market_13_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_14_row back-1 market_14_b_btn"><img src="/storage/front/img/andar_bahar/8.jpg"></div>
                                            <div class="casino-nation-book market_14_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_15_row back-1 market_15_b_btn"><img src="/storage/front/img/andar_bahar/9.jpg"></div>
                                            <div class="casino-nation-book market_15_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_16_row back-1 market_16_b_btn"><img src="/storage/front/img/andar_bahar/10.jpg"></div>
                                            <div class="casino-nation-book market_16_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_17_row back-1 market_17_b_btn"><img src="/storage/front/img/andar_bahar/11.jpg"></div>
                                            <div class="casino-nation-book market_17_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_18_row back-1 market_18_b_btn"><img src="/storage/front/img/andar_bahar/12.jpg"></div>
                                            <div class="casino-nation-book market_18_b_exposure market_exposure"></div>
                                        </div>
                                        <div class="card-odd-box">
                                            <div class="suspended market_19_row back-1 market_19_b_btn"><img src="/storage/front/img/andar_bahar/13.jpg"></div>
                                            <div class="casino-nation-book market_19_b_exposure market_exposure"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-last-result-title"><span>Last Result</span><span><a href="casinoresults?game_type=lucky7eu2">View All</a></span></div>
                                <div class="casino-last-results" id="last-result"></div>
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


</body>

</html>

<script type="text/javascript" src="../js/socket.io.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../storage/front/js/flipclock.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src='footer-js.js?33'></script>

<?

include("betpopcss.php");
?>

<script type="text/javascript">
	var site_url = '<?php echo WEB_URL; ?>' ;
	var websocketurl = '<?php echo GAME_IP; ?>';
	var clock = new FlipClock($(".clock"), {
                        clockFace: "Counter"
                    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var data6;
	var markettype = "LUCKY7C";
	var markettype_2 = markettype;
	var last_result_id = '0';

	function websocket(type) {
    socket = io.connect(websocketurl, {
                transports: ['websocket']
            });
    socket.on('connect', function() {
    	socket.emit('Room', 'lucky7eu2');
    });
    socket.on('gameIframe', function(data){
    	$("#casinoIframe").attr('src',data);
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
					$("#card_c1").attr("src",site_url + "storage/front/img/cards_new/" + data.t1[0].C1 + ".png");
				}

			}
			clock.setValue(data.t1[0].autotime);
			$(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
			$("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
			eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

				for(var j in data['t2']){
				  	selectionid = parseInt(data['t2'][j].sid);
				  	runner = data['t2'][j].nat || data['t2'][j].nation;
				  	b1 = data['t2'][j].rate;
				  	b1_label = b1;
					$('.market_'+selectionid+'_b_value').text(b1);
				  	if(selectionid == 1 || selectionid == 3 || selectionid == 5 || selectionid == 7){
						$(".market_"+selectionid+"_min_max").html("Min:"+data['t2'][j].min+" Max:"+data['t2'][j].max+"");

				  	}
				  	if(selectionid == 1){
				  		$(".n-bck").html(data['t2'][j].min);
						$(".x-bck").html(data['t2'][j].max);
				  	}

				  	markettype = "LUCKY7C";

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
		data = data.split('SS');
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
			data = data.split('DD');
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
				data = data.split('HH');
				if(data.length > 1){
					var obj = {
						type	:	']',
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
							type	:	'}',
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
	$("#card_c1").attr("src",site_url + "storage/front/img/cards/1.png");
}
function updateResult(data) {

	if(data && data[0]){
		resultGameLast = data[0].mid;

		if(last_result_id != resultGameLast){
			last_result_id = resultGameLast;
			//refresh(markettype);
		}

		html = "";
		var ab = "";
		var ab1 = "";
		casino_type = "'lucky7eu2'";
		data.forEach((runData) => {
			if(parseInt(runData.win) == 1){
				ab = "result-a";
				ab1 = "L";

			}
			else if(parseInt(runData.win) == 2){
				ab = "result-b";
				ab1 = "H";

			}
			else{
				ab = "result-c";
				ab1 = "T";
			}

			eventId = runData.mid == 0 ? 0 : runData.mid;
			html += '<span onclick="view_casiono_result('+eventId+','+casino_type+')"  class="ball-runs ml-1  '+ ab +' result">'+ ab1 + '</span>';
		});
		$("#last-result").html(html);
		if(oldGameId == 0 || oldGameId == resultGameLast){
			$("#card_c1").attr("src",site_url + "storage/front/img/cards/1.png");
		}
    }
}
function teenpatti(type) {
    gameType = type
    websocket();
}

teenpatti("ok");
	jQuery(document).on("click", ".back-1", function () {
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
			$(".placeBet").attr('disabled',false);
			$("#inputStake").val("");

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
//    stake = $(this).attr("stake");
//    eventId = $("#fullMarketBetsWrap").attr("eventid");
// 	$("#inputStake").val(stake);

  eventId = $("#fullMarketBetsWrap").attr("eventid");
   var currentStake = parseFloat($("#inputStake").val()) || 0;
		var buttonStake = parseFloat($(this).attr("stake")) || 0;
		var totalStake = currentStake + buttonStake;

	$("#inputStake").val(totalStake);

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
		bet_stake_side = $("#bet_stake_side").val();
		bet_event_id = $("#bet_event_id").val();
		bet_marketId = $("#bet_marketId").val();
		oddsmarketId = bet_marketId;
		eventType = 'LUCKY7C';
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
				 url: '../ajaxfiles/bet_place_lucky7eu2_teenpatti.php',
				 dataType: 'json',
				 data: {eventId:bet_event_id,eventType:eventType,marketId:bet_marketId,stack:inputStake,type:type,odds:oddsNo,runs:runsNo,bet_market_type:bet_market_type,oddsmarketId:oddsmarketId,eventManualType:eventManualType,market_runner_name:market_runner_name,market_odd_name:market_odd_name,bet_event_name:bet_event_name},
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
							toastr.clear()
					toastr.success("", message, {
						"timeOut": "3000",
						"iconClass":"toast-success",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
					/*$("#bet-error-class").addClass("b-toast-success");*/
						}else{
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
                            <div class="mt-1 d-flex"><span>Range: 100 to 25k</span></div>
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