/* if(typeof markettype === 'undefined') {
		markettype = 1;
} */
$.ajax({
    type: 'POST',
    url: 'ajaxfiles/refresh_balance.php',
    dataType: 'json',
    data: { curPageName: curPageName },
    success: function(response) {
        var account_balance = response.balance;
        var account_exposure = response.exposure;
        var account_winning_exposure = response.winning;
        $("#betCredit").text(account_balance);
        $("#betExposure").text(account_exposure);
        $("#betWinningExposure").text(account_winning_exposure);
    }
});
/* function updateUserStatus(){
	$.ajax({
		url		:	'ajaxfiles/update_user_status.php',
		success	:	function(response){
		}
	});
} */

updateUserStatus();
setInterval(function(){
	updateUserStatus();
},5000);
setTimeout(function() {
    if (typeof markettype === 'undefined') {
        markettype = 1;
    }
    /* refresh(markettype);
     */
    if (typeof eventIdOpenbet === 'undefined') {
        eventIdOpenbet = 1;
    }


    refresh(markettype, eventIdOpenbet);
}, 2000);


function refresh(markettype = 1, eventId = 1) {
    var open_bet = [];
    var html_open_bet_details = "";
    $.ajax({
        type: 'POST',
        url: 'ajaxfiles/refresh_balance.php',
        dataType: 'json',
        data: { curPageName: curPageName },
        success: function(response) {
            var account_balance = response.balance;
            var account_exposure = response.exposure;
            var account_winning_exposure = response.winning;
            $("#betCredit").text(account_balance);
            $("#betExposure").text(account_exposure);
            $("#betWinningExposure").text(account_winning_exposure);
        }
    });
    if (curPageName != "home.php" || curPageName != "home") {
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/open_bet.php',
            dataType: 'json',
            data: { markettype: markettype, eventId: eventId, curPageName: curPageName },
            success: function(response) {
                var check_status = response['status'];
                if (check_status == "ok") {

                    open_bet_data = response['open_bet_data'];

                    /* if(markettype == '2020_CRICKET_MATCH')
                    	cc20_explosure(open_bet_data); */

                    if (open_bet_data) {
                        for (i = 0; i < open_bet_data.length; i++) {
                            bet_stack = open_bet_data[i].bet_stack;
                            market_name = open_bet_data[i].market_name;
                            bet_odds = open_bet_data[i].bet_odds;
                            bet_runs = open_bet_data[i].bet_runs;
                            bet_runs2 = open_bet_data[i].bet_runs2;
                            var event_name = open_bet_data[i].event_name;
                            bet_type = open_bet_data[i].bet_type;
                            market_type = open_bet_data[i].market_type; 
                            
                            if (bet_type == "No" || bet_type == "Lay") {
                                class_type = "lay";
                            } else {
                                class_type = "back";
                            }

                            var odds = bet_odds;

                            if (market_type == "BOOKMAKER_ODDS" || market_type == "BOOKMAKER_TIED_ODDS" || market_type == "BOOKMAKERSMALL_ODDS") {
                                odds = parseFloat(odds) * 100 - 100;
                                odds = odds.toFixed(2);
                            }

                            if (market_type == "KHADO_ODDS") {
                                odds = bet_runs;
                                market_name += '-' + ((bet_runs2 - bet_runs) + 1);
                            } else if (bet_runs > 0) {
                                odds = bet_runs;
                                market_name += ' / ' + bet_odds;
                            }
                            if(open_bet_data[i].joker_card && open_bet_data[i].joker_card.length > 0){
                                market_name += " - Joker "+open_bet_data[i].joker_card;
                                if(oldGameId == open_bet_data[i].event_id || $(".round_no").text() == open_bet_data[i].event_id){
                                    window.jokerPlacedForEvent = open_bet_data[i].event_id;
                                    if(typeof selectedCard !== 'undefined') { selectedCard = open_bet_data[i].joker_card; }
                                    $("#select_joker").attr("src", site_url + "storage/front/img/cards_new/" + open_bet_data[i].joker_card + ".png");
                                    $(".joker-display").attr("src", site_url + "storage/front/img/cards_new/" + open_bet_data[i].joker_card + ".png");
                                    $(".teen2cards").hide();
                                }
                            }
                            var cards_dis="";
                            
                            if(event_name == "TEENUNIQUE"){
                               var dealer_cards = "";
                                var your_cards = "";
                                var cardsunique = [1, 2, 3, 4, 5, 6];

                                var selectedCards = open_bet_data[i].market_name.split(',').map(Number);

                                cardsunique.forEach(element => {
                                    if (selectedCards.includes(element)) {
                                        your_cards += `<img src="/storage/front/img/s${element}.png" class="teenuni_card${element}" alt="Card ${element}">`;
                                    } else {
                                        dealer_cards += `<img src="/storage/front/img/s${element}.png" class="teenuni_card${element}" alt="Card ${element}">`;
                                    }
                                });
                                cards_dis = `<tr class="open_bet"><td class="w-100"><div class="unique-your-card">
                                    <span>
                                        <h4>Your Card</h4>
                                        <span>
                                            ${your_cards}
                                        </span>
                                    </span>
                                    <span>
                                        <h4>Dealer Card</h4>
                                        <span>
                                            ${dealer_cards}
                                        </span>
                                    </span>
                                </div></td></tr>`;
                            }

                            html_open_bet_details += "<tr class='" + class_type + " open_bet'><td>" + market_name + "</td> <td class='text-right'><span>" + odds + "</span></td> <td style='text-align: right;'>" + bet_stack + "</td></tr>"+cards_dis;


                        }
                        $(".open_bet").remove();
                        $("#matched_bet").after(html_open_bet_details);
                    } else {
                        $(".open_bet").remove();
                    }
                }
            }
        });

        if (curPageName != "event_full_market.php" || curPageName != "event_full_market") {
            
            main_event_id = $(".round_no").text();
            $.ajax({
                type: 'POST',
                url: 'ajaxfiles/get_casino_on_page_exposure.php',
                dataType: 'json',
                data: { markettype: markettype, main_event_id: main_event_id, curPageName: curPageName },
                success: function(response) {
                    status = response.status;

                    if (status == "ok") {
                        total_exposure_data = response.data;



                        $(".market_exposure").css("color", "black");
                        $(".market_exposure").text("");

                        for (var exp in total_exposure_data) {
                            market_id = total_exposure_data[exp].market_id;
                            total_exposure = total_exposure_data[exp].total_exposure;
                            if(total_exposure == 0 || total_exposure == '0' ){
                                total_exposure = '';
                            }
                            if(total_exposure == ''){ 
                                continue;
                            }
                            if (total_exposure < 0) {
                                console.log(`total_exposure=.market_${market_id}_b_exposure=${market_id}=${total_exposure}`);
                                $(".market_" + market_id + "_b_exposure").css("color", "red");
                                $(".market_" + market_id + "_b_exposure").text(total_exposure);
                            } else {
                                $(".market_" + market_id + "_b_exposure").css("color", "green");
                                $(".market_" + market_id + "_b_exposure").text(total_exposure);
                            }


                        }
                        

                    }
                }
            });
            if(markettype == "DOLIDANA"){
                var main_event_id2 = $(".round_no2").val();
                $.ajax({
                    type: 'POST',
                    url: 'ajaxfiles/get_casino_on_page_exposure.php',
                    dataType: 'json',
                    data: { markettype: markettype, main_event_id: main_event_id2, curPageName: curPageName },
                    success: function(response) {
                        var status = response.status;

                        if (status == "ok") {
                        var total_exposure_data = response.data;



                            

                            for (var exp in total_exposure_data) {
                                var market_id = total_exposure_data[exp].market_id;
                                var total_exposure = total_exposure_data[exp].total_exposure;
                                if(total_exposure == 0 || total_exposure == '0'){
                                    total_exposure = '';
                                }
                                if(total_exposure == ''){ 
                                    $(".market_" + market_id + "_b_exposure").css("color", "black");
                                    $(".market_" + market_id + "_b_exposure").text("");
                                    continue;
                                }
                                if (total_exposure < 0) {
                                    console.log(`total_exposure2=.market_${market_id}_b_exposure=${market_id}=${total_exposure}`);
                                    $(".market_" + market_id + "_b_exposure").css("color", "red");
                                    $(".market_" + market_id + "_b_exposure").text(total_exposure);
                                } else {
                                    $(".market_" + market_id + "_b_exposure").css("color", "green");
                                    $(".market_" + market_id + "_b_exposure").text(total_exposure);
                                }

                            }


                        }
                    }
                });
            }

            
        }
    }
}

function balance_exposure() {
    var balance_value = "on";
    balance_value = $('input[name="balance_exposure"]:checked').val();

    if (balance_value == "on") {
        $("#betExposure").show();
    } else {
        $("#betExposure").hide();
    }
}

function balance_checkbox() {
    var balance_value = "on";
    balance_value = $('input[name="balance_checkbox"]:checked').val();

    if (balance_value == "on") {
        $("#betCredit").show();
    } else {
        $("#betCredit").hide();
    }
}

/* function cc20_explosure(open_bet_data){
	
	if(event_name == "2020_CRICKET_MATCH"){
		
	}
} */

//setInterval(check_authantication,1000 * 30)

function check_authantication() {
    $.ajax({
        type: 'POST',
        url: 'ajaxfiles/auth.php',
        dataType: 'json',
        success: function(response) {
            if (response.status == false) {
                window.location.href = 'login';
            }
        }
    });
}

jQuery(document).on("click", "#headerMenu", function() {
    if ($(".headerMenu1").is(":visible")) {
        $(".headerMenu1").hide();
    } else {
        $(".headerMenu1").show();
    }
});

jQuery(document).on("click", function(event) {
    // Check if the clicked element is outside of the menu or the toggle button
    if (!$(event.target).closest("#headerMenu").length && !$(event.target).closest(".headerMenu1").length) {
        $(".headerMenu1").hide();
    }
});

jQuery(document).on("click", "#searchHeader", function() {
    if ($("#searchHeader1").hasClass("search-input-show")) {
        $("#searchHeader1").removeClass("search-input-show");
    } else {
        $("#searchHeader1").addClass("search-input-show");
    }
});

jQuery(document).on("click", ".close", function() {
    $("#errorMsg").hide();
});

$(document).ready(function() {

    $('#btn_exposure_popup').on('click', function() {
        $.ajax({
            type: 'POST',
            url: 'ajaxfiles/myExposure',
            dataType: 'json',
            success: function(response) {
                if (response) {

                    var popup_body = '';
                    for (var i = 0; i < response.length; i++) {

                        var eventType = response[i].eventType;
                        var sport_category = 'Other';
                        if (eventType == 1) {
                            sport_category = 'Soccer';
                        } else if (eventType == 2) {
                            sport_category = 'Tennis';
                        } else if (eventType == 4) {
                            sport_category = 'Cricket';
                        } else if (eventType == 8) {
                            sport_category = 'Election';
                        }

                        popup_body += '<tr>';
                        popup_body += '	<td>' + sport_category + '</td>';
                        popup_body += '	<td><a href="/event_full_market?eventType=' + response[i].eventType + '&eventId=' + response[i].eventId + '&marketId=' + response[i].oddsmarketId + '" class="text-link">' + response[i].eventName + '</a></td>';
                        popup_body += '	<td>MATCH_ODDS</td>';
                        popup_body += '	<td>' + response[i].trade + '</td>';
                        popup_body += '</tr>';
                    }

                    if (response.length == 0) {
                        popup_body += '<tr>';
                        popup_body += '	<td colspan="100%" align="center">No real-time records found</td>';
                        popup_body += '</tr>';
                    }

                    $('#myMarketTableBody').html(popup_body);
                    $('#myMarketModal').modal('show');
                }
                return false;
            }
        });
        return false;
    });

});

/* function view_rules(image_url) {
    if (image_url != "") {
        return_data = '<img src="storage/front/img/rules/' + image_url + '" class="img-fluid">';
    }
    $("#rules_popup").modal('show');
    $(".rules_popup_image").html(return_data);
} */

    function view_rules(gametype = "") {
        var image_url = "";
        var return_data = "";
        var ruletitle = "Rules";
        // console.log("gametype=",gametype);
        
    
        if(gametype == ""){
            gametype = markettype_2;
        }
    
        if (gametype == "BACCARAT") {
            image_url = "baccarat.jpg";
        } else if (gametype == "2020_DRAGON_TIGER2") {
            image_url = "dragon-tiger-20-rules.jpg";
        } else if (gametype == "BACCARAT2") {
            image_url = "baccarat2-rules.jpg";
        } else if (gametype == "LUCKY7B") {
            image_url = "lucky7-rules.jpg";
        } else if (gametype == "2020_CRICKET_MATCH") {
            image_url = "cmatch20-rules.jpg";
        } else if (gametype == "CASINO_METER") {
            image_url = "cmeter-rules.jpg";
        } else if (gametype == "CASINO_WAR") {
            image_url = "war-rules.jpg";
        } else if (gametype == "DTL20") {
            image_url = "dtl20-rules.jpg";
        } else if (gametype == "TESTTEENPATTI") {
            image_url = "tp-rules.jpg";
        } else if (gametype == "ODITEENPATTI") {
            image_url = "tp-rules.jpg";
        } else if (gametype == "OPENTEENPATTI") {
            // image_url = "tp-rules.jpg";
            image_url = "<div class='rules-section'><ul class='pl-2 pr-2 list-style'><li>The game is played with a regular 52 cards single deck, between 2 players A and B.</li><li>Each player will receive 3 cards.</li><li><b>Rules of regular teenpatti winner</b></li></ul> <div><img src='storage/front/img/rules/teen20b.jpg'></div></div>";
        } else if (gametype == "2020TEENPATTI") {
            // image_url = "tp-rules.jpg";
            
        } else if (gametype == "ODI_POKER") {
            image_url = "poker-rules.jpeg";
        } else if (gametype == "6_PLAYER_POKER") {
            image_url = "poker-rules.jpeg";
        } else if (gametype == "2020_POKER") {
            image_url = "poker-rules.jpeg";
        } else if (gametype == "32CARDS") {
            image_url = "tt_cards_rule.jpg";
        } else if (gametype == "ODI_DRAGON_TIGER") {
            image_url = "dt6-rules.jpg";
        } else if (gametype == "2020_DRAGON_TIGER") {
            image_url = "dragon-tiger-20-rules.jpg";
        } else if (gametype == "32CARDSB") {
            image_url = "tt_cards_rule.jpg";
        } else if (gametype == "AMAR_AKBAR_ANTHONY") {
            image_url = "aaa-rules.jpg";
        } else if (gametype == "B_TABLE") {
            image_url = "ddb-rules.jpg";
        } else if (gametype == "LUCKY7") {
            image_url = "lucky7-rules.jpg";
        } else if (gametype == "RACE_20") {
            image_url = "race20.jpg";
        } else if (gametype == "ABJ") {
            image_url = "abj-rules.jpg";
        } else if (gametype == "SUPER_OVER") {
            image_url = "superover.jpg";
        } else if (gametype == "cmeter") {
            ruletitle = "Casino Meter Rules";
            image_url = `<div class="rules-section">
                                               <div><style type="text/css">
        .rules-section .row.row5 {
            margin-left: -5px;
            margin-right: -5px;
        }
        .rules-section .pl-2 {
            padding-left: .5rem !important;
        }
        .rules-section .pr-2 {
            padding-right: .5rem !important;
        }
        .rules-section .row.row5 > [class*="col-"], .rules-section .row.row5 > [class*="col"] {
            padding-left: 5px;
            padding-right: 5px;
        }
        .rules-section
        {
            text-align: left;
            margin-bottom: 10px;
        }
        .rules-section .table
        {
            color: #fff;
            border:1px solid #444;
            background-color: #222;
            font-size: 12px;
        }
        .rules-section .table td, .rules-section .table th
        {
            border-bottom: 1px solid #444;
        }
        .rules-section ul li, .rules-section p
        {
            margin-bottom: 5px;
        }
        .rules-section::-webkit-scrollbar {
            width: 8px;
        }
        .rules-section::-webkit-scrollbar-track {
            background: #666666;
        }

        .rules-section::-webkit-scrollbar-thumb {
            background-color: #333333;
        }
        .rules-section .rules-highlight
        {
            color: #FDCF13;
            font-size: 16px;
        }
        .rules-section .rules-sub-highlight {
            color: #FDCF13;
            font-size: 14px;
        }
        .rules-section .list-style, .rules-section .list-style li
        {
            list-style: disc;
        }
        .rules-section .rule-card
        {
            height: 20px;
            margin-left: 5px;
        }
        .rules-section .card-character
        {
            font-family: Card Characters;
        }
        .rules-section .red-card
        {
            color: red;
        }
        .rules-section .black-card
        {
            color: black;
        }
        .rules-section .cards-box
        {
            background: #fff;
            padding: 6px;
            display: inline-block;
            color: #000;
            min-width: 150px;
        }
    </style>

<div class="rules-section">
                                            <div>
                                            
                                                <img src="storage/front/img/rules/cmeter.jpg" class="img-fluid">
                                            </div>
                                        </div></div>
                                        <div><div class="rules-section">
                                                <h6 class="rules-highlight">Low Zone:</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The Player who bet on Low Zone will have all cards from Ace to 8 of all suits 3 cards of 9, Heart , Club &amp; Diamond.</li>
                                                </ul>
                                                <h6 class="rules-highlight">High Zone:</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The Player who bet on high Zone will have all the cards of JQK of all suits plus 3 cards of 10, Heart, Club &amp; Diamond.</li>
                                                </ul>
                                                <h6 class="rules-highlight">Spade 9 &amp; Spade 10:</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If you Bet on Low Card, Spade of 9 &amp; 10 will calculated along with High Cards.</li>
                                                    <li>If you Bet on High Card, Spade of 9 &amp; 10 will calculated along with Low Cards.</li>
                                                </ul>
                                               
                                            </div></div>
                                            </div>`;
        } else if(gametype == "dum10") {
            ruletitle = "Dus Ka Dum Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Dus Ka Dum is an unique and instant result game.</li>
                                                    <li>It is played with a regular single deck of 52 cards.</li>
                                                    <li>In this game each card has point value</li>
                                                </ul>
                                                <h6 class="rules-highlight">Point value of cards:</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Ace = 1</td>
                                                                <td>8 = 8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2 = 2</td>
                                                                <td>9 = 9</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3 = 3</td>
                                                                <td>10 = 10</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4 = 4</td>
                                                                <td>J = 11</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5 = 5</td>
                                                                <td>Q = 12</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6 = 6</td>
                                                                <td>K = 13</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7 = 7</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p>(Suit of card is irrelevant in point value)</p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Dus ka Dum is a one card game. The dealer will draw a single card every time which will decide the result of the game. Hence that particular game will be over.</li>
    <li>Now always the last drawn card will be removed and kept aside. Thereafter a new game will commence from the remaining cards. Then the same process will continue till there is a winning chance or otherwise up to 35 cards or so.</li>
                                                    <li>All the drawn cards will be added to current total.</li>
                                                </ul>
                                                <p>Example1: </p>
                                                <p>If first four drawn cards are: 7, 9, J, 4</p>
                                                <p>So current total is 31, now on opening of 5th card bet will be for next total 40 or more.</p>
                                                <p>Eaxmple2: If the current total of first 11 drawn cards is 84 the bet will open for next total 90 or more.</p>
                                                <p>Example3: The current total of first 12 drawn cards is 79 the bet will open for next total 90 or more (because on opening of any cards 80 is certainty). </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The objective of the game is to achieve next (decade) total or more and therefor win.</li>
                                                    <li>Both back and lay options will be available.</li>
                                                </ul>
                                                <div><div class="rules-section">
                                            <h6 class="rules-highlight">Side bets:</h6>
                                            <p>
                                                <h7 class="rules-sub-highlight">Odd even:</h7> Here you can bet on every card whether it will be an odd card or an even card.
                                            </p>
                                            <p>Odd cards: A, 3, 5, 7, 9, J, K</p>
                                            <p>Even cards: 2, 4, 6, 8, 10, Q</p>
                                            <p>
                                                <h7 class="rules-sub-highlight">Red Black:</h7> Here you can bet on every card whether it will be a red card or a black card.
                                            </p>
                                            <p>Red cards: Hearts, Diamonds</p>
                                            <p>Black cards: Spades, Clubs</p>
                                        </div></div>
                                            </div>`;
        } else if(gametype == "teen3") {
            ruletitle = "Instant Teenpatti Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Instant Teenpatti is a shorter version of Indian origin game teenpatti.
                                                    </li>
                                                    <li>This game is played with a regular 52 cards deck between Player A and Player B .</li>
                                                    <li>In Instant Teenpatti all the three cards of Player A and the first two cards of Player B will be pre-defined for all the games .These five cards will be permanentley placed on the table .</li>
                                                </ul>
                                            </div> 
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">3 Pre-defined cards of Player A :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>King of Spades</li>
                                                    <li>Queen of Hearts </li>
                                                    <li>10 of Diamonds</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">2 Pre-defined cards of Player B :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>9 of Clubs</li>
                                                    <li>8 of Spades </li>
                                                    <li>So now the game will begin with the remaining 47 cards</li>
                                                    <li>(52-5 pre-defined cards = 47 )</li>
                                                    <li>Instant Teenpatti is a one card game. one card will be dealt to Player B that will be the third and the last card of player B which will decide the result of the game. Hence that particular game will be
                                                        over.
                                                    </li>
                                                    <li>Now always the last drawn card of player B will be removed and kept aside. Thereafter a new game will commence from the remaining 46 cards then the same process will continue till both the players have winning
                                                        chances or otherwise upto 35 cards or so.</li>
                                                    <li>The objective of the game is to make the best three card hands as per the hand rankings and therefor win.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rankings of card hands from Highest to Lowest :
                                                </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                     <li>1. Straight Flush (Pure Sequence)</li>
                                                    <li>2. Trail (Three of a Kind)</li>
                                                    <li>3. Straight (Sequence)</li>
                                                    <li>4. Flush (Color)</li>
                                                    <li>5. Pair (Two of a Kind)</li>
                                                    <li>6. High Card </li>
                                                </ul>
                                                <div>You have betting options of Back and Lay.</div>
                                            </div></div>
                                            <div class="rules-section">
                                                <h6 class="rules-highlight">Rankings of card hands from Highest to Lowest :
                                                </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                     <li>1. Straight Flush (Pure Sequence)</li>
                                                    <li>2. Trail (Three of a Kind)</li>
                                                    <li>3. Straight (Sequence)</li>
                                                    <li>4. Flush (Color)</li>
                                                    <li>5. Pair (Two of a Kind)</li>
                                                    <li>6. High Card </li>
                                                </ul>
                                                <div>You have betting options of Back and Lay.</div>
                                            </div>`;
        } else if(gametype == "race2") {
            ruletitle = "Race To Second Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Race to 2nd is a new kind of game and the brilliance of this game will test your nerve.</li>
                                                    <li>In this unique game the player who has the 2nd highest ranking card will be the winner (and not the highest ranking card )</li>
                                                    <li>Race to 2nd is played with a regular single deck of 52 cards.</li>
                                                    <li>This game is played among 4 players  : 
                                                        <div>Player A,   Player B,   Player C  and Player D </div> </li>
                                                        <li> <div>All the 4 players will be dealt one card each.</div> </li>
                                                         <li><div>The objective of the game is to guess which player will have the 2nd highest ranking card and therefor win.</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">RANKINGS OF CARDS FROM HIGHEST TO LOWEST :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>A,   K,   Q,   J,   10,   9,   8,   7,   6,   5,   4,   3,   2 </li>
                                                    <li>Here Ace of spades is the highest ranking card </li>
                                                    <li>And 2 of Diamonds is the lowest ranking card.</li>
                                                    <li>If any two or more players have same hands with the same ranking cards but of different suits the ranking of the players will be decided based on below suits sequence.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Suit Sequence : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>
                                                        <div class="cards-box">
                                                            <span class="card-character black-card ml-1">}</span>
                                                            <span class="ml-0">SPADES </span>
                                                            <span class="ml-0">1st</span>
                                                            <span class="ml-0">( First )</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span class="card-character red-card ml-1">{</span>
                                                            <span class="ml-0">HEARTS </span>
                                                            <span class="ml-0">2nd</span>
                                                            <span class="ml-0">( Second )</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span class="card-character black-card ml-1">]</span>
                                                            <span class="ml-0">CLUBS </span>
                                                            <span class="ml-0">3rd</span>
                                                            <span class="ml-0">( Third )</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span class="card-character red-card ml-1">[</span>
                                                            <span class="ml-0">DIAMONDS </span>
                                                            <span class="ml-0">4th</span>
                                                            <span class="ml-0">( Fourth )</span>
                                                        </div>
                                                    </li>
                                                    <li>Example 1 :
                                                        <div>If all the players have following hands </div>
                                                        <div>Player A  -   5 of Hearts </div>
                                                        <div>Player B  -    Ace of Hearts </div>
                                                        <div>Player C  -    2 of Clubs </div>
                                                        <div>Player D  -    King of Clubs </div>
                                                        <div>Here all four Players have different hands the ranking of the cards will be as follows :</div>
                                                        <div>Highest Ranking card (1st) will be Ace of Hearts.</div>
                                                        <div>Second Highest Ranking card (2nd) will be King of Clubs.</div>
                                                        <div>Third Highest Ranking card  (3rd) will be 5 of Hearts.</div>
                                                        <div>Fourth Highest Ranking card  (4th) will be 2 of Clubs.</div>
                                                        <div>Here the second Highest Ranking card is King of Clubs So Player D will be the winner.</div>
                                                    </li>
                                                    <li>Example 2 :
                                                        <div>If all the players have following hands</div>
                                                        <div>Player A  - 3 of Spades </div>
                                                        <div>Player B  -  3 of Hearts </div>
                                                        <div>Player C  -   3 of Clubs </div>
                                                        <div>Player D  -   3 of Diamonds </div>
                                                        <div>As here all four players have same hands but of different suits the ranking of the cards will be as follows :</div>
                                                        <div>Highest Ranking card ( 1st ) will be  3 of Spades.</div>
                                                        <div>Second Highest  Ranking card (2nd )  will be 3 of Hearts.</div>
                                                        <div>Third Highest Ranking card (3rd) will be  3 of Clubs.</div>
                                                        <div>Fourth Highest Ranking card (4th) will be 3 of Diamonds.</div>
                                                        <div>Here, the second highest ranking card is 3 of Hearts so player B will be the winner.</div></li>
                                                        <li><div>You will have betting options of Back and Lay on every card.</div> </li>
                                                        <li><div>In this game there will be no Tie.</div> 
                                                    </li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "aaa2"){
            ruletitle = "Amar Akbar Anthony 2 Rules";
            image_url = `<div>
    
    <div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is ACE,2,3,4,5, or 6 Amar Wins. </li>
                                                    <li>If the card is 7,8,9 or 10 Akbar wins. </li>
                                                    <li>If the card is J,Q or K Anthony wins.</li>
                                                </ul>
                                            </div></div><div><div class="rules-section">
                                                <p>
                                                    <b class="rules-sub-highlight">EVEN</b>
                                                    <span class="ml-2">(PAYOUT 2.12)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is 2 , 4 , 6 , 8 , 10 , Q</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">ODD</b>
                                                    <span class="ml-2">(PAYOUT 1.83)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is A , 3 , 5 , 7 , 9 , J , K</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">RED</b>
                                                    <span class="ml-2">(PAYOUT 1.97)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card color is DIAMOND or HEART</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">BLACK</b>
                                                    <span class="ml-2">(PAYOUT 1.97)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card color is CLUB or SPADE</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">UNDER 7</b>
                                                    <span class="ml-2">(PAYOUT 2.0)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is A , 2 , 3 , 4 , 5 , 6</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">OVER 7</b>
                                                    <span class="ml-2">(PAYOUT 2.0)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is 8 , 9 , 10 , J , Q , K</li>
                                                </ul>
                                                <p>
                                                    <b>Note: </b>
                                                    <span>If the card is 7, Bets on under 7 and over 7 will lose 50% of the bet amount.</span>
                                                </p>
                                                <p>
                                                    <b class="rules-sub-highlight">CARDS</b>
                                                    <span class="ml-2">(PAYOUT 12.0)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>A , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , J , Q , K</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "ab3") {
            ruletitle = "Andar Bahar 50 Cards Rules";
            image_url = `<div>
    <div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>1. Andar Bahar is a fast paced Indian origin game.</li>
                                                    <li>2. It is played with a regular deck of 52 cards.</li>
                                                    <li>3. This game is played between two sides Andar and Bahar.</li>
                                                    <li>4. The objective of the game is to place bet on cards of your choice whether they will be on the Andar side or the Bahar side and therefor win.</li>
                                                    <li>5. The odds will be available on every card to place your bets upto 46th card.</li>
                                                    <li>6. At the start of the game first card will be drawn on the Bahar side and the next card will be drawn on the Andar side and so on upto the 50th card.</li>
                                                    <li>7. When the card is to be open on the Bahar side odds will be available for both the Andar side and the Bahar side.
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li>* If you place bets on the Bahar side and you win on that particular first card the payout will be 25% of your bet amount from 1st card to 31st card and from the 33rd card to 45th card the payout
                                                                will be 20% of your bet amount.</li>
                                                            <li>* Winning on all cards other than that particular first card payout will be 100%.</li>
                                                        </ul>
                                                    </li>
                                                    <li>8. When the card is to be open on the Andar side the odds will be available only for the Bahar side. The payout will be 100% of your bet amount on all the cards.</li>
                                                    <li>9. The game will be considered over after the 50th card is drawn. The pending bets on remaining 2 cards will be cancelled (Pushed).</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "teen1"){
            ruletitle = "1 Card One-Day Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>1 CARD ONE-DAY is a very easy and fast paced game.</li>
                                                    <li>This game is played with 8 decks of regular 52 cards between the player and dealer.</li>
                                                    <li>Both, the player and dealer will be dealt one card each.</li>
                                                    <li>The objective of the game is to guess whether the player or  dealer will draw a card of the higher value and will therefore win.</li>
                                                    <li>You can place your bets on the player as well as dealer.</li>
                                                    <li>You have a betting option of Back and Lay for the main bet.</li>
                                                    <li><b>Ranking of cards :</b> from lowest to highest</li>
                                                    <li>2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , J , Q , K , A</li>
                                                    <li>If the player and dealer both have the same hand with the same ranking cards but of different suits then the winner will be decided according to the order of the suits.</li>
                                                    <li><b>Order of suits :</b> from highest to lowest</li>
                                                    <li>Spades , Hearts , Clubs , Diamonds</li>
                                                    <li>eg      Clubs  ACE               Diamonds    ACE</li>
                                                    <li>Here ACE of Clubs wins.</li>
                                                    <li><b>TIE :</b> If both,the player and dealer hands have the same ranking cards which are of the same suit then it will be a TIE. In that case bets placed  (Back and Lay ) on both the player and dealer will be returned. (pushed)</li>
                                                    <li>eg:  Ace of Spades                Ace of Spades</li>
                                                    <li><b>7 DOWN   7 UP :</b> Here you can bet whether it will be a 7Down card or a 7UP card irrespective of suits.</li>
                                                    <li><b>7DOWN cards:</b> A, 2, 3, 4, 5, 6</li>
                                                    <li><b>7UP cards :</b> 8, 9, 10, J, Q, K</li>
                                                    <li><b>CARD  7 :</b> If the card drawn is 7, bets placed on both, 7Down and 7Up will lose half of the bet amount.</li>
                                                    <li>For 7Down- 7Up you can bet on either or both the player and dealer.</li>
                                                    <li><b>Note :</b> In case of a <b>TIE</b> between the player and dealer, bets placed on 7Down and 7Up will be considered valid.</li>
                                                </ul>
                                            </div>`;
        } else if(gametype == "teen120"){
            ruletitle = "1 Card 20-20 Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>1 CARD 20-20 is a very easy and fast paced game.</li>
                                                    <li>This game is played with 8 decks of regular 52 cards between the player and dealer.</li>
                                                    <li>Both, the player and dealer will be dealt one card each.</li>
                                                    <li>The objective of the game is to guess whether the player or  dealer will draw a card of the higher value and will therefore win.</li>
                                                    <li>You can place your bets on the player as well as dealer.</li>
                                                    <li><b>Ranking of cards :</b> from lowest to highest</li>
                                                    <li>2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , J , Q , K , A</li>
                                                    <li>If the player and dealer both have the same hands with the same ranking cards but of different suits then the winner will be decided according to the order of the suits
                                                    </li>
                                                    <li><b>Order of suits :</b> from highest to lowest</li>
                                                    <li>Spades , Hearts , Clubs , Diamonds</li>
                                                    <li>eg      Clubs  ACE               Diamonds    ACE</li>
                                                    <li>Here ACE of Clubs wins.</li>
                                                    <li>If both,the player and dealer hands have the same ranking cards which are of the same suit, then it will be a TIE.</li>
                                                    <li>eg      Spades ACE             Spades ACE</li>
                                                    <li>In case of a TIE ,bets placed on both the player and dealer will lose the bet amount.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Side Bets</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li><b>Pair :</b> Here you can bet that both, the player and dealer will have the same ranking cards irrespective of suits</li>
                                                    <li><b>Tie :</b> Here you can bet that the game will be a Tie.</li>
                                                    <li><b>Note :</b> In case of a Tie between the player and dealer, bets placed on Side bets will be considered valid.</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "kbc") {
            ruletitle = "K.B.C Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Kaun Banega Crorepati  (KBC ) is a unique and a new concept game played with a regular 52 cards deck.</li>
                                                    <li>As the name itself suggests there are very high returns on your bets.</li>
                                                    <li><b>How to play KBC :</b> There is a set of five questions and each question has options</li>
                                                    <li>5 cards will be drawn one by one from the deck as the answers to this questions 1 to 5 respectively.</li>
                                                    <li><b>Q1. </b><b>RED</b>(Hearts &amp; Diamonds) or <b>BLACK</b>(Spades &amp; Clubs )</li>
                                                    <li><b>Q2. </b><b>ODD</b>(A,3,5,7,9,J,K) or <b>EVEN</b>(2,4,6,8,10,Q)</li>
                                                    <li><b>Q3. </b><b>7UP</b>(8,9,10,J,Q,K) or <b>7DOWN</b>(A,2,3,4,5,6)</li>
                                                    <li><b>Q4. </b><b>3 CARD JUDGEMENT</b>(A,2,3   or  4,5,6   or  8,9,10  or  J,Q,K)
                                                        <div>Any 1card from the set of 3cards you choose.</div>
                                                    </li>
                                                    <li><b>Q5. </b><b>SUITS ( COLOR )</b>(Spades  or   Hearts   or   Clubs    or   Diamonds)
                                                        <div>You have to select your choice of answer from given options for all the questions.</div>
                                                        <div>At the start of the game you have three choices to play this game .</div>
                                                    </li>
                                                    <li><b>1. Five Questions :</b> Going for all the 5 questions</li>
                                                    <li><b>2. Four questions  (Four card quit )  :</b>   Going for the 1st  4 questions .</li>
                                                    <li><b>3. 50-50 Quit :</b> Going for 5 questions but 50-50 quit after the 4th question.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">About the Odds :  </h6>
                                                <h6 class="rules-sub-highlight">1. Five questions : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>a. If you are going with an ODD card as your 2nd answer your winning odds will be 101 times of your betting amount.</li>
                                                    <li>eg: bet amount : 1000 x  101 odds  = 1,01,000 net winning amount.</li>
                                                    <li>b. If you are going with an EVEN card as your 2nd answer your winning odds will be 111 times of your betting amount.</li>
                                                    <li>eg: bet amount : 1000 x  111 odds  = 1,11,000 net winning amount.</li>
                                                </ul>
                                                <h6 class="rules-sub-highlight">2. Four Questions (Four card quit ) : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>a. If you are going with an ODD card as your 2nd answer your winning odds will be 26.5 times of your betting amount.</li>
                                                    <li>eg : bet amount : 1000 x  26.5 odds  = 26,500 net winning amount.</li>
                                                    <li>b. If you are going with an EVEN card as your 2nd answer your winning odds will be 29 times of your betting amount.</li>
                                                    <li>eg : bet amount : 1000 x  29 odds  =  29,000 net winning amount.</li>
                                                </ul>
                                                <h6 class="rules-sub-highlight">3. 50-50 Quit : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>In this you will get half of your winning amount after the 4th card and the remaining half of your winning amount + half of your initial bet amount will be placed on the 5th card as your betting amount.</li>
                                                    <li><b>If all the five answers are correct :</b></li>
                                                    <li>eg 1(a) ODD CARD :bet amount : 1000 x 63.76 odds   = 63,760 net winning amount.</li>
                                                    <li>eg 1(b) EVEN CARD :bet amount : 1000 x  69.65 odds  = 69,650 net winning amount.</li>
                                                    <li><b>If the 5th answer is incorrect :</b></li>
                                                    <li>eg 2(a) ODD CARD: bet amount : 1000 x  12.75 odds  = 12,750 net winning amount.</li>
                                                    <li>eg 2(b) EVEN CARD: bet amount : 1000 x  14 odds  = 14,000 net winning amount.</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "notenum"){
            ruletitle = "Note Number Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>This game is played with 80 cards containing two decks of fourty cards each.</li>
                                                    <li>Each deck contains cards from Ace to 10 of all four suits (It means There is no Jack, No Queen and No King in this game ).</li>
                                                    <li>This game is for Fancy bet lovers.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Odd and Even Cards :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>To bet on odd card or even card , Betting odds are available on every cards.</li>
                                                    <li>Both back and Lay price is available for both, odd and even.</li>
                                                    <li>(Here 2,4,6,8 and 10 are named Even Card.)</li>
                                                    <li>(Here 1,3,5,7, and 9 are named Odd Card.)</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Red and Black Cards :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>To bet on Red card or Black Card bettings odds are available on every cards .</li>
                                                    <li>(Here Heart and Diamond are named Red Card )</li>
                                                    <li>(Spade and Club are named Black Card )</li>
                                                    <li>Both Back and Lay price is available for both, Red card and Black Card.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Low and High cards :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>To bet on Low or High card bettings odds are available on every cards .</li>
                                                    <li>(Here Ace ,2,3,4, and 5 are named low Card )</li>
                                                    <li>( Here 6,7,8,9 and 10 are named High card )</li>
                                                    <li>Both back and lay price is available for both, Low card and High Card .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Baccarat :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>In this game six cards will open.</li>
                                                    <li>For this bet this six cards are divided in two groups i.e. Baccarat 1 and Baccarat 2.</li>
                                                    <li>Baccarat 1 is 1st, 2nd and 3rd cards to be open.</li>
                                                    <li>Baccarat 2 is 4th ,5th and 6th cards to be open.</li>
                                                    <li>This is a bet for comparison of Baccarat value of both the group i.e. Baccarat 1 and Baccarat 2.</li>
                                                    <li>The group having higher baccarat value will win.</li>
                                                    <li>To calculate baccarat value we will add point value of all three cards of that group and We will take last digit of that total as Baccarat value .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Point Value of cards :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Ace = 1</li>
                                                    <li>2 = 2</li>
                                                    <li>3 = 3</li>
                                                    <li>4 = 4</li>
                                                    <li>5 = 5</li>
                                                    <li>6 = 6</li>
                                                    <li>7 = 7</li>
                                                    <li>8 = 8</li>
                                                    <li>9 = 9</li>
                                                    <li>10 = 0</li>
                                                </ul>
                                                <p><b>Example:</b></p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Suppose three cards are 2,5,8</li>
                                                    <li>2+5+8 = 15 , Here last digit is 5 so baccarat value is 5 .</li>
                                                    <li>1,2,4</li>
                                                    <li>1+2+4 = 7 , In this case total is in single digit so we will take that single digit as baccarat value i.e. 7</li>
                                                    <li>Note : In case If baccarat value of both the group is equal , In that case half of the betting amount will be returned.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">FIX Point Card :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>It is a bet for selecting any fix point card ( Suits are irrelevant ).</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "trio") {
            ruletitle = "Trio Rules";
            image_url = `<div class="rules-section">
                                                <h6 class="rules-highlight">Session :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a total of point value of all three cards .</li>
                                                    <li>Point Value of Cards ( Suits doesn't matter )
                                                        <div class="pl-2 pr-2">Ace  = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">3 = 3</div>
                                                        <div class="pl-2 pr-2">4 = 4</div>
                                                        <div class="pl-2 pr-2">5 = 5</div>
                                                        <div class="pl-2 pr-2">6 = 6</div>
                                                        <div class="pl-2 pr-2">7 = 7</div>
                                                        <div class="pl-2 pr-2">8 = 8</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10 = 10</div>
                                                        <div class="pl-2 pr-2">Jack = 11</div>
                                                        <div class="pl-2 pr-2">Queen = 12</div>
                                                        <div class="pl-2 pr-2">King = 13</div>
                                                    </li>
                                                    <li>1+10+13 = 24 , Here session is 24.</li>
                                                    <li>It is a bet for having session 21 Yes or No .</li>
                                                    <li>Both back and lay rate of session 21 is available.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">3 card Judgement :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>In this bet you are offered set of three cards from which atleast one card must come in game .</li>
                                                    <li>Both Back and Lay rate is available for 3 card judgement.</li>
                                                    <li>Two sets of three cards are offered for " 3 card Judgement " .</li>
                                                    <li>Set One : (1,2,4 )</li>
                                                    <li>Set 2 : ( Jack , queen , King )</li>
                                                    <li>Suits doesn't matter .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Two Red Only :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a bet for having two red cards only in the game (not more not less )</li>
                                                    <li>(Here Heart and Diamond are named Red card).</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Two Black only :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a bet for having two black cards only in the game (not more not less )</li>
                                                    <li>(Here Spade and Club are named Black card ).</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Two Odd only :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a bet for having two odd cards only in the game (not more not less ).</li>
                                                    <li>1,3,5,7,9,Jack and King are named odd cards.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Two Even only :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a bet for having two even cards only in the game (not more not less ).</li>
                                                    <li>2,4,6,8,10 and Queen are named even cards .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Pair :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a bet for having Two cards of same rank .</li>
                                                    <li>( Trio is also valid for Pair ).</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Flush :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is bet for having all three cards of same suits .</li>
                                                    <li>(If straight Flush come Flush is valid.)</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Straight :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is bet for having all three cards in the sequence .
                                                        <div class="pl-2 pr-2">Eg : 4,5,6</div>
                                                        <div class="pl-2 pr-2">Jack, Queen, King</div>
                                                    </li>
                                                    <li>(If Straight Flush come Straight is valid.)</li>
                                                    <li>Note : King , Ace , 2 is not valid for straight .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Trio :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a bet for having all three cards of same rank .
                                                        <div class="pl-2 pr-2">Eg: 4 Heart , 4 Spade , 4 Diamond</div>
                                                        <div class="pl-2 pr-2">J Heart , J Club , J Diamond</div>
                                                    </li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Straight Flush :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a bet for having all three cards in a sequence and also of same suits .
                                                        <div class="pl-2 pr-2">Eg : Jack (Heart), Queen (Heart ), King (Heart)</div>
                                                        <div class="pl-2 pr-2">4 (Club), 5(Club) ,6 (Club )</div>
                                                    </li>
                                                    <li>Note : King , Ace and 2 is not valid for Straight Flush .</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "teen20b") {
            ruletitle = "20-20 Teenpatti B Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>The game is played with a regular 52 cards single deck, between 2 players A and B.</li>
                                                    <li>Each player will receive 3 cards.</li>
                                                    <li><b>Rules of regular teenpatti winner</b></li>
                                                </ul>
                                                <div>
                                                    <img src="storage/front/img/rules/teen20b.jpg">
                                                </div>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of 3 baccarat</h6>
                                                <p>There are 3 criteria for winning the 3 Baccarat .</p>
                                                <h7 class="rules-sub-highlight">First criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having trio will win,</li>
                                                    <li>If both game has trio then higher trio will win.</li>
                                                    <li>Ranking of trio from high to low.
                                                        <div class="pl-2 pr-2">1,1,1</div>
                                                        <div class="pl-2 pr-2">K,K,K</div>
                                                        <div class="pl-2 pr-2">Q,Q,Q</div>
                                                        <div class="pl-2 pr-2">J,J,J</div>
                                                        <div class="pl-2 pr-2">10,10,10</div>
                                                        <div class="pl-2 pr-2">9,9,9</div>
                                                        <div class="pl-2 pr-2">8,8,8</div>
                                                        <div class="pl-2 pr-2">7,7,7</div>
                                                        <div class="pl-2 pr-2">6,6,6</div>
                                                        <div class="pl-2 pr-2">5,5,5</div>
                                                        <div class="pl-2 pr-2">4,4,4</div>
                                                        <div class="pl-2 pr-2">3,3,3</div>
                                                        <div class="pl-2 pr-2">2,2,2</div>
                                                    </li>
                                                    <li>If none of the game have got trio then second criteria will apply.</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">Second criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having all the three face card will win.</li>
                                                    <li>Here JACK, QUEEN AND KING are named face card.</li>
                                                    <li>if both the game have all three face cards then game having highest face card will win.</li>
                                                    <li>Ranking of face card from High to low :
                                                        <div class="pl-2 pr-2">Spade King</div>
                                                        <div class="pl-2 pr-2">Heart King</div>
                                                        <div class="pl-2 pr-2">Club King</div>
                                                        <div class="pl-2 pr-2">Diamond King</div>
                                                    </li>
                                                    <li>Same order will apply for Queen (Q) and Jack (J) also .</li>
                                                    <li>If second criteria is also not applicable, then 3rd criteria will apply .</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">3rd criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having higher baccarat value will win .</li>
                                                    <li>For deciding baccarat value we will add point value of all the three cards</li>
                                                    <li>Point value of all the cards :
                                                        <div class="pl-2 pr-2">1 = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">To</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10, J ,Q, K has zero (0) point value .</div>
                                                    </li>
                                                </ul>
                                                <p><b>Example 1st:</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Last digit of total will be considered as baccarat value
                                                        <div class="pl-2 pr-2">2,5,8 =</div>
                                                        <div class="pl-2 pr-2">2+5+8 =15 here last digit of total is 5 , So baccarat value is 5.</div>
                                                    </li>
                                                </ul>
                                                <p><b>Example 2nd :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>1,3,K</li>
                                                    <li>1+3+0 = 4 here total is in single digit so we will take this single digit 4 as baccarat value</li>
                                                </ul>
                                                <p><b>If baccarat value of both the game is equal then Following condition will apply :</b></p>
                                                <p><b>Condition 1 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having more face card will win.</li>
                                                    <li>Example : Game A has 3,4,k and B has 7,J,Q then game B will win as it has more face card then game A .</li>
                                                </ul>
                                                <p><b>Condition 2 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If Number of face card of both the game are equal then higher value face card game will win.</li>
                                                    <li>Example : Game A has 4,5,K (K Spade ) and Game B has 9,10,K ( K Heart ) here baccarat value of both the game is equal (9 ) and both the game have same number of face card so game A will win because It has got higher value face card then Game B .</li>
                                                </ul>
                                                <p><b>Condition 3 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If baccarat value of both the game is equal and none of game has got face card then in this case Game having highest value point card will win .</li>
                                                    <li>Value of Point Cards :
                                                        <div class="pl-2 pr-2">Ace = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">3 = 3</div>
                                                        <div class="pl-2 pr-2">4 = 4</div>
                                                        <div class="pl-2 pr-2">5 = 5</div>
                                                        <div class="pl-2 pr-2">6 = 6</div>
                                                        <div class="pl-2 pr-2">7 = 7</div>
                                                        <div class="pl-2 pr-2">8 = 8</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10 = 0 (Zero )</div>
                                                    </li>
                                                    <li>Example : GameA: 1,6,10 And GameB: 7,10,10</li>
                                                    <li>here both the game have same baccarat value . But game B will win as it has higher value point card i.e. 7 .</li>
                                                </ul>
                                                <p><b>Condition 4 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If baccarat value of both game is equal and none of game has got face card and high point card of both the game is of equal point value , then suits of both high card will be compared</li>
                                                    <li>Example :
                                                        <div class="pl-2 pr-2">
                                                            Game A : 1(Heart) ,2(Heart) ,5(Heart)
                                                        </div>
                                                        <div class="pl-2 pr-2">
                                                            Game B : 10 (Heart) , 3 (Diamond ) , 5 (Spade )
                                                        </div>
                                                    </li>
                                                    <li>Here Baccarat value of both the game (8) is equal . and none of game has got face card and point value of both game's high card is equal so by comparing suits of both the high card ( A 5 of Heart , B 5 of spade ) game B is declared 3 Baccarat winner .</li>
                                                    <li>Ranking of suits from High to low :
                                                        <div class="pl-2 pr-2">Spade</div>
                                                        <div class="pl-2 pr-2">Heart</div>
                                                        <div class="pl-2 pr-2">Club</div>
                                                        <div class="pl-2 pr-2">Diamond</div>
                                                    </li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Total :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a comparison of total of all three cards of both the games.</li>
                                                    <li>Point value of all the cards for the bet of total
                                                        <div class="pl-2 pr-2">Ace = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">3 = 3</div>
                                                        <div class="pl-2 pr-2">4 = 4</div>
                                                        <div class="pl-2 pr-2">5 = 5</div>
                                                        <div class="pl-2 pr-2">6 = 6</div>
                                                        <div class="pl-2 pr-2">7 = 7</div>
                                                        <div class="pl-2 pr-2">8 = 8</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10 = 10</div>
                                                        <div class="pl-2 pr-2">Jack = 11</div>
                                                        <div class="pl-2 pr-2">Queen = 12</div>
                                                        <div class="pl-2 pr-2">King = 13</div>
                                                    </li>
                                                    <li>suits doesn't matter</li>
                                                    <li>If total of both the game is equal , it is a Tie .</li>
                                                    <li>If total of both the game is equal then half of your bet amount will returned.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Pair Plus :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>This bet provides multiple option to win a price .</li>
                                                    <li>Option 1 : Pair</li>
                                                    <li>If you got pair you will get equal value return of your betting amount .</li>
                                                    <li>Option 2 : Flush</li>
                                                    <li>If you have all three cards of same suits you will get 4 times return of your betting amount .</li>
                                                    <li>Option 3 : Straight</li>
                                                    <li>If you have straight ( three cards in sequence eg : 4,5,6 eg: J,Q,K ) (but king ,Ace ,2 is not a straight ) you will get six times return of your betting amount .</li>
                                                    <li>Option 4 : Trio</li>
                                                    <li>If you have got all the cards of same rank ( eg: 4,4,4 J,J,J ) you will get 30 times return of your betting amount .</li>
                                                    <li>Option 5 : Straight Flush</li>
                                                    <li>If you have straight of all three cards of same suits ( Three cards in sequence eg: 4,5,6 ) ( but King ,Ace ,2 is not straight ) you will get 40 times return of your betting amount .</li>
                                                    <li>Note : If you have trio then you will receive price of trio only , In this case you will not receive price of pair .</li>
                                                    <li>If you have straight flush you will receive price of straight flush only , In this case you will not receive price of straigh and flush .</li>
                                                    <li>It means you will receive only one price whichever is higher .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Color :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>This is a bet for having more cards of red or Black (Heart and Diamond are named RED , Spade and Club are named BLACK ).</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "race17"){
            ruletitle = "Race To 17 Rules";
            image_url = `<div class="rules-section">
                                                <h6 class="rules-highlight">Main:</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is played with regular 52 card deck.</li>
                                                    <li>Value of</li>
                                                </ul>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Ace = 1 </li>
                                                    <li>2 = 2 </li>
                                                    <li>3 = 3 </li>
                                                    <li>4 = 4 </li>
                                                    <li>5 = 5 </li>
                                                    <li>6 = 6 </li>
                                                    <li>7 = 7 </li>
                                                    <li>8 = 8 </li>
                                                    <li>9 = 9 </li>
                                                    <li>10 = 0 </li>
                                                    <li>Jack = 0 </li>
                                                    <li>Queen = 0 </li>
                                                    <li>King = 0</li>
                                                </ul>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Five(5) card will be pulled from the deck. </li>
                                                    <li>It is a race to reach 17 or plus.</li>
                                                    <li>If you bet on 17(Back) , &amp; then,</li>
                                                    <li>Total of given (5) cards, comes under seventeen(17) you loose.</li>
                                                    <li>Total of (5) cards comes over sixteen(16) you win.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Fancy :</h6>
                                                <h7 class="rules-sub-highlight">Big card(7,8,9)</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>here 7,8,9 are named big card.</li>
                                                    <li>Back/ lay of big card rate is available to bet on every card.</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">Zero card(10, jack , queen, king).</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>here 10, jack, queen, king is named zero card.</li>
                                                    <li>Back &amp; lay rate to bet on zero card is available on every card.</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">Any zero card.</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Here 10, jack, queen, king, is named zero card, it is bet for having at least one zero card in game( not necessary game will go up to 5 cards). You can bet on this before start of game only.</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "teenmuf"){
            ruletitle = "Muflis Teenpatti Rules";
            image_url = `
                                              <style type="text/css">
        .rules-section .row.row5 {
            margin-left: -5px;
            margin-right: -5px;
        }
        .rules-section .pl-2 {
            padding-left: .5rem !important;
        }
        .rules-section .pr-2 {
            padding-right: .5rem !important;
        }
        .rules-section .row.row5 > [class*="col-"], .rules-section .row.row5 > [class*="col"] {
            padding-left: 5px;
            padding-right: 5px;
        }
        .rules-section
        {
            text-align: left;
            margin-bottom: 10px;
        }
        .rules-section .table
        {
            color: #fff;
            border:1px solid #444;
            background-color: #222;
            font-size: 12px;
        }
        .rules-section .table td, .rules-section .table th
        {
            border-bottom: 1px solid #444;
        }
        .rules-section ul li, .rules-section p
        {
            margin-bottom: 5px;
        }
        .rules-section::-webkit-scrollbar {
            width: 8px;
        }
        .rules-section::-webkit-scrollbar-track {
            background: #666666;
        }

        .rules-section::-webkit-scrollbar-thumb {
            background-color: #333333;
        }
        .rules-section .rules-highlight
        {
            color: #FDCF13;
            font-size: 16px;
        }
        .rules-section .rules-sub-highlight {
            color: #FDCF13;
            font-size: 14px;
        }
        .rules-section .list-style, .rules-section .list-style li
        {
            list-style: disc;
        }
        .rules-section .rule-card
        {
            height: 20px;
            margin-left: 5px;
        }
        .rules-section .card-character
        {
            font-family: Card Characters;
        }
        .rules-section .red-card
        {
            color: red;
        }
        .rules-section .black-card
        {
            color: black;
        }
        .rules-section .cards-box
        {
            background: #fff;
            padding: 6px;
            display: inline-block;
            color: #000;
            min-width: 150px;
        }
        .rules-section img
        {
            height: 30px;
            margin-right: 5px;
        }
    </style>
                                    <div class="rules-section">
                                            <h6 class="rules-highlight">Main Bet:</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li><b>It is played with regular 52 card deck</b> between two teams .A &amp; B.</li>
                                                <li><b>Lowest of the 2 games will win.</b></li>
                                                <li>In regular teenpatti 
                                                    <div class="cards-box">
                                                        <span class="card-character black-card ml-1">2]</span>
                                                        <span class="card-character black-card ml-1">3}</span>
                                                        <span class="card-character red-card ml-1">5{</span>
                                                    </div>
                                                    of different color(suits) is the lowest game, But in this game it is the best game.
                                                </li>
                                                <li>In regular teenpatti 
                                                    <div class="cards-box">
                                                        <span class="card-character black-card ml-1">Q}</span>
                                                        <span class="card-character black-card ml-1">K}</span>
                                                        <span class="card-character black-card ml-1">A}</span>
                                                    </div>
                                                    of same color(suits) is the highest game, But it is the worst game.
                                                </li>
                                            </ul>
                                        </div>
                                        <div><div class="rules-section">
                                            <h6 class="rules-highlight">Fancy:</h6>
                                            <h7 class="rules-sub-highlight">TOP9</h7>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>Here, 2 conditions apply:</li>
                                                <li>Condition 1<div>Game must not have,</div></li>
                                            </ul>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>Pair</li>
                                                <li>Color</li>
                                                <li>Sequence</li>
                                                <li>Trio</li>
                                                <li>Pure sequence</li>
                                            </ul>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>Condition 2</li>
                                            </ul>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>If your game has the highest card of <b>9</b>, you will receive triple(x3) amount of your betting value.</li>
                                                <li>If your game has the highest card of <b>8</b>, you will receive quadruple(x4) amount of your betting value.</li>
                                                <li>If your game has the highest card of <b>7</b>, you will will receive (x5) amount of your betting value.</li>
                                                <li>If your game has the highest card of <b>6</b>, you will receive (x8) amount of your betting value.</li>
                                                <li>If your game has the highest card of <b>5</b>, you will receive (x30) amount of your betting value.</li>
                                            </ul>
                                        </div></div>
                                        <div><div class="rules-section">
                                            <h6 class="rules-highlight">M(muflis) bacarrat.:</h6>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>Baccarat is where you take the last digit of the total of the 3 cards of the game.</li>
                                                <li>Value of cards are:</li>
                                            </ul>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>Ace = 1 point</li>
                                                <li>2 = 2 point</li>
                                                <li>3 = 3 point</li>
                                                <li>4 = 4 point</li>
                                                <li>5 = 5 point</li>
                                                <li>6 = 6 point</li>
                                                <li>7 = 7 point</li>
                                                <li>8 = 8 point</li>
                                                <li>9 = 9 point</li>
                                                <li>10 , jack , queen, king , all have zero points value( suit or color of the card doesn’t matter in point value)</li>
                                            </ul>
                                            <h7 class="rules-sub-highlight">Example 1:</h7>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>if game is
                                                    <div class="pl-2 pr-2">2 ,5 ,8</div>
                                                    <div class="pl-2 pr-2">2 + 5 + 8 = 15</div>
                                                </li>
                                                <li>Here last digit is 5</li>
                                                <li>So bacarrat value is 5</li>
                                            </ul>
                                            <h7 class="rules-sub-highlight">Example 2:</h7>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>Game is
                                                    <div class="pl-2 pr-2">1, 4, K</div>
                                                    <div class="pl-2 pr-2">1 + 4 + 0 = 5</div>
                                                </li>
                                                <li>If answer is in one digit , then that one digit is considered as baccarat value.</li>
                                                <li>M baccarat is comparision of baccarat value of both the game.</li>
                                                <li>But here lower value baccarat will win.</li>
                                                <li>If baccarat value is tie of both the game then,</li>
                                                <li>game having lowest card will win.</li>
                                                <li>ace is highest card.</li>
                                                <li>&amp; 2 is lowest card.</li>
                                                <li>If lowest card of both game is equal then color will be compared.</li>
                                                <li>Diamond color is lowest.</li>
                                                <li>Then club then heart then spade.</li>
                                            </ul>
                                            <h7 class="rules-sub-highlight">Example:</h7>
                                            <ul class="pl-2 pr-2 list-style">
                                                <li>
                                                    <div>if bacarrat value is tie &amp; lowest card of game A is</div>
                                                    <div class="cards-box pl-2 pr-2">
                                                        <span class="card-character red-card ml-1">2{</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>&amp; lowest card of game B is</div>
                                                    <div class="cards-box pl-2 pr-2">
                                                        <span class="card-character red-card ml-1">2[</span>
                                                    </div>
                                                </li>
                                                <li>then game B will win.</li>
                                            </ul>
                                        </div>`;
        } else if(gametype == "teensin"){
            ruletitle = "29Cards Baccarat Rules";
            image_url = `<div class="rules-section">
                                                <p>Here We use total of 29 cards :</p>
                                                <ul class="pl-2 pr-2 mt-2 list-style">
                                                    <li>2*4 ( All four color of 2 )</li>
                                                    <li>3*4 ( All four color of 3)</li>
                                                    <li>4*4 ( All four color of 4 )</li>
                                                    <li>5*4</li>
                                                    <li>6*4</li>
                                                    <li>7*4</li>
                                                    <li>8*4</li>
                                                    <li>9 of spade .</li>
                                                    <li>It is played between two players A and B each player will get 3 cards .</li>
                                                </ul>
                                                <p>
                                                    <b>To win regular bet there is two criteria :</b>
                                                </p>
                                                <ul class="pl-2 pr-2 mt-2 list-style">
                                                    <li>1st : If any player has trio he will win if both have trio the one who has got higher trio will win .</li>
                                                    <li>2nd : If nobody has trio baccarat value will be compared . Higher baccarat value game will win .</li>
                                                    <li>To get the baccarat value , from the total of three cards last digit will be taken as baccarat value .</li>
                                                    <li>Point Value of cards :</li>
                                                    <li>2=2</li>
                                                    <li>3=3</li>
                                                    <li>4=4</li>
                                                    <li>5=5</li>
                                                    <li>6=6</li>
                                                    <li>7=7</li>
                                                    <li>8=8</li>
                                                    <li>9=9</li>
                                                </ul>
                                                <p>
                                                    <b>Note : Suits doesnt matter in point value of cards</b>
                                                </p>
                                                <p>Example : 2,5,8</p>
                                                <p>2+5+8 = 15 , here last digit is 5 so baccarat value is 5</p>
                                                <p>If the total is in single digit 2,2,3</p>
                                                <p>2+2+3 =7 , in this case the single digit is 7 is considered as baccarat value</p>
                                                <p>
                                                    <b>If both players have same baccarat value then highest card of both the game will be compared whose card is higher will win .</b>
                                                </p>
                                                <ul class="pl-2 pr-2 mt-2 list-style">
                                                    <li>If 1st highest card is equal , then 2nd high card will be compared</li>
                                                    <li>If 2nd highest card is equal , then 3rd high card will be compared</li>
                                                    <li>If 3rd highest card is equal , then game will be tied and Money will be returned.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <p>
                                                    <b>Fancy:</b>
                                                </p>
                                                <p>
                                                    <b>HIGH CARD :</b>
                                                </p>
                                                <p>It is comparison of the high value card of both the game , the game having higher high value card then other game will win . if high value card is same the 2nd high card will be compared if 2nd high card is same then 3rd high card will be compared . If 3rd high card is same then game is tie .</p>
                                                <p>
                                                    <b>Money return :</b>
                                                </p>
                                                <p>
                                                    <b>PAIR :</b>
                                                </p>
                                                <p>You can bet for pair on any of your selected game</p>
                                                <p>Only condition is If you bet for pair you must have pair in that game .</p>
                                                <p>
                                                    <b>Example :</b>
                                                </p>
                                                <p>6,6,4</p>
                                                <p>5,5,2</p>
                                                <p>4,4,4 ( trio will be also considerd as a Pair )</p>
                                                <p>
                                                    <b>LUCKY 9 :</b>
                                                </p>
                                                <p>It is bet for having card 9 among any of total six card of both games .</p>
                                                <p>
                                                    <b>COLOR PLUS :</b>
                                                </p>
                                                <p>You can bet for color plus on any game A or B .</p>
                                                <p>If you bet on color plus you get 4 option to win price</p>
                                                <p>if you have</p>
                                                <ul class="pl-2 pr-2 mt-2 list-style">
                                                    <li>1. sequence 3.4,5 of different suit , You will get 2 times of betting amount .</li>
                                                    <li>2. if you get color 3,5,7 of same suit , you will get 5 times of betting amount</li>
                                                    <li>3. If you get trio 4,4,4 , You will get 20 times of betting amount .</li>
                                                    <li>4. If you get pure sequence 4,5,6 of same suit , You will get 30 times of betting amount .</li>
                                                </ul>
                                                <p>If you get pure sequence you will not get price of color and simple sequence</p>
                                                <p>Means you will get only one price in any case</p>
                                            </div>
                                        </div>`;
        } else if(gametype == "patti2"){
            ruletitle = "2 Cards Teenpatti Rules";
            image_url = `<div class="rules-section">
                                                <h6 class="rules-highlight">Color Plus:</h6>
                                                <div>
                                                    <p>It contains seven circumstances to bet on simultaneously, however you can only win prize money on the item which has the higher rate.</p>
                                                    <p>The seven outcomes on which you can bet are listed below:</p>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>
                                                        <div>3 card sequence</div>
                                                        <div class="cards-box">
                                                            <span>E.g</span>
                                                            <span class="card-character red-card ml-1">2{</span>
                                                            <span class="card-character black-card ml-1">3]</span>
                                                            <span class="card-character red-card ml-1">4[</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>3 of a Kind</div>
                                                        <div class="cards-box">
                                                            <span>E.g</span>
                                                            <span class="card-character red-card ml-1">3{</span>
                                                            <span class="card-character red-card ml-1">3[</span>
                                                            <span class="card-character black-card ml-1">3}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>3 card pure sequence</div>
                                                        <div class="cards-box">
                                                            <span>E.g</span>
                                                            <span class="card-character red-card ml-1">2{</span>
                                                            <span class="card-character red-card ml-1">3{</span>
                                                            <span class="card-character red-card ml-1">4{</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>4 card colour</div>
                                                        <div class="cards-box">
                                                            <span>E.g</span>
                                                            <span class="card-character black-card ml-1">2]</span>
                                                            <span class="card-character black-card ml-1">6]</span>
                                                            <span class="card-character black-card ml-1">7]</span>
                                                            <span class="card-character black-card ml-1">9]</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>4 card sequence</div>
                                                        <div class="cards-box">
                                                            <span>E.g</span>
                                                            <span class="card-character black-card ml-1">2}</span>
                                                            <span class="card-character red-card ml-1">3[</span>
                                                            <span class="card-character black-card ml-1">4]</span>
                                                            <span class="card-character red-card ml-1">5[</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>4 card pure sequence</div>
                                                        <div class="cards-box">
                                                            <span>E.g</span>
                                                            <span class="card-character black-card ml-1">2}</span>
                                                            <span class="card-character black-card ml-1">3}</span>
                                                            <span class="card-character black-card ml-1">4}</span>
                                                            <span class="card-character black-card ml-1">5}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>4 of a kind</div>
                                                        <div class="cards-box">
                                                            <span>E.g</span>
                                                            <span class="card-character red-card ml-1">3{</span>
                                                            <span class="card-character black-card ml-1">3]</span>
                                                            <span class="card-character red-card ml-1">3[</span>
                                                            <span class="card-character black-card ml-1">3}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="mt-2">
                                                    <div>if your card is</div>
                                                    <div class="cards-box">
                                                        <span>E.g</span>
                                                        <span class="card-character red-card ml-1">6[</span>
                                                        <span class="card-character red-card ml-1">7[</span>
                                                        <span class="card-character red-card ml-1">8[</span>
                                                        <span class="card-character red-card ml-1">9[</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p>Here you will win prize in case there is a 4 card pure sequence only…! Hence they wil not receive the prize of:</p>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>3 card sequence</li>
                                                    <li>4 card sequence</li>
                                                    <li>4 card color</li>
                                                    <li>3 card pure sequence</li>
                                                </ul>
                                                <div class="mt-2">
                                                    <p>Next example.</p>
                                                    <p>If the cards are:</p>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>King of Spades</li>
                                                    <li>King of Clubs</li>
                                                    <li>King of Diamonds</li>
                                                    <li>King of Hearts</li>
                                                </ul>
                                                <div class="mt-2">
                                                    <p>In this instance you will only receive the prize of 4 of a kind, therefore you will not win prize of 3 of a kind.</p>
                                                    <p>You will only be able to win one prize, the one which is the most beneficial to them.</p>
                                                </div>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Main:</h6>
                                                <p>In case of consecutive cards, the third card is to be considered in ascending order only. For example,</p>
                                                <p>if the first two cards are king &amp; ace then the third card is 2,  so it becomes: k, A &amp; 2 (which is not sequence).</p>
                                                <p>If the first two cards are 2 &amp; 3, then third card is 4, so it becomes 2,3,4 (it will not be 1,2,3).</p>
                                                <p>The sequence in order from 1st to last is listed below:</p>
                                                <div class="row row5 pl-2 pr-2">
                                                    <div class="col-6">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Queen &amp; King</td>
                                                                    <td class="text-right">1st</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ace &amp; 2</td>
                                                                    <td class="text-right">2nd</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jack &amp; Queen</td>
                                                                    <td class="text-right">3rd</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10 &amp; Jack</td>
                                                                    <td class="text-right">4th</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>9 &amp; 10</td>
                                                                    <td class="text-right">5th</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8 &amp; 9</td>
                                                                    <td class="text-right">6th</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-6">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>7 &amp; 8</td>
                                                                    <td class="text-right">7th</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6 &amp; 7</td>
                                                                    <td class="text-right">8th</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5 &amp; 6</td>
                                                                    <td class="text-right">9th</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4 &amp; 5</td>
                                                                    <td class="text-right">10th</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3 &amp; 4</td>
                                                                    <td class="text-right">11th</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2 &amp; 3</td>
                                                                    <td class="text-right">12th</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p>If it is alternative cards eg. 6 &amp; 8. Or 2 &amp; 4 Or Q &amp; A</p>
                                                    <p>This type of alternative game will not be considered as a sequence..!</p>
                                                    <p>If it comes 4 &amp; 4 this will be considered as a trio of 4</p>
                                                    <p>Another example is Ace &amp; Ace, which will be considered as trio of Ace.</p>
                                                </div>
                                                <div class="mt-2">
                                                    <p>Best combination of  games in order of 1st to last:</p>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Pure sequence: 1st  best combination</li>
                                                    <li>Trio (3 of a kind): 2nd best combination</li>
                                                    <li>Sequence (straight): 3rd best combination</li>
                                                    <li>colour (suits): 4th best combination</li>
                                                </ul>
                                                <div>
                                                    <p>After that, all the games will be valued of higher card.</p>
                                                </div>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Mini Baccarat:</h6>
                                                <p>It is a comparison between the last digit of Total of both the sides Value of cards for baccarat is:</p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Ace = one point</li>
                                                    <li>2 = 2 point</li>
                                                    <li>3 = 3 point</li>
                                                    <li>4 = 4 point</li>
                                                    <li>5 = 5 point</li>
                                                    <li>6 = 6 point</li>
                                                    <li>7 = 7 point</li>
                                                    <li>8 = 8 point</li>
                                                    <li>9 = 9 point</li>
                                                    <li>10 = 0 point</li>
                                                    <li>Jack = 0 point</li>
                                                    <li>Queen = 0 point</li>
                                                    <li>King = 0 point</li>
                                                </ul>
                                                <div class="mt-2">
                                                    <p>Total of two card can be ranged between 0 to 18</p>
                                                    <p>If total is in single digit ,then the same will be considered as baccarat value</p>
                                                    <p>If the total is of double digit, then the last digit wil be considered as baccarat value Higher value baccarat will win.</p>
                                                    <p>If baccarat value of both the sides are equal, then both side’s will lose their bets..</p>
                                                </div>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Total:</h6>
                                                <p>Session is total of 2 cards value</p>
                                                <p>value of each cards</p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Ace = 1 point</li>
                                                    <li>2 = 2 point</li>
                                                    <li>3 = 3 point</li>
                                                    <li>4 = 4 point</li>
                                                    <li>5 = 5 point</li>
                                                    <li>6 = 6 point</li>
                                                    <li>7 = 7 point</li>
                                                    <li>8 = 8 point</li>
                                                    <li>9 = 9 point</li>
                                                    <li>10 = 10 point</li>
                                                    <li>Jack = 11 point</li>
                                                    <li>Queen = 12 point</li>
                                                    <li>King = 13 point</li>
                                                </ul>
                                            </div></div>`;
        } 
        // else if(gametype = "thetrap") {
        //     ruletitle = "The Trap Rules";
        //     image_url = `<div class="rules-section">
        //                                         <ul class="pl-4 pr-4 list-style">
        //                                             <li> Trap is a 52 card deck game.</li>
        //                                             <li>Keeping Ace= 1 point, 2= 2 points, 3= 3 points, 4= 4 points, 5= 5 points, 6= 6 points, 7=7 points, 8= 8 Points, 9= 9 points, 10= 10 points, Jack= 11 points, Queen= 12 points and King= 13 points.</li>
        //                                             <li>Here there are two sides in TRAP. A and B respectively.
        //                                             </li>
        //                                             <li>First card that will open in the game would be from side 'A', next card will open in the game from Side 'B'. Likewise till the end of the game.</li>
        //                                             <li>Any side that crosses a total score of 15 would be the winner of the game. For Example: the total score should be 16 or above.
        //                                             </li>
        //                                             <li>But if at any stage your score is at 13, 14, 15 then you will get into the trap which ideally means you lose.</li>
        //                                             <li>Hence there are only two conditions from which you can decide the winner here either your opponent has to be trapped in the score of 13, 14, 15 or your total score should be above 15.</li>
        //                                         </ul>
        //                                     </div>`;
        // } 
        else if(gametype == "superover") {
            ruletitle = "Super Over Rules";
            image_url = `<div class="rules-section">
                                                            <div>
                                                                <img src="storage/front/img/rules/superover.jpg" class="img-fluid">
                                                            </div>
                                                        </div>`;
        } else if(gametype == "lucky7eu2") {
            ruletitle = "Lucky 7 - C Rules";
            image_url = `<div class="rules-section">
                            <ul class="pl-4 pr-4 list-style">
                                <li>Lucky 7 is a 8 deck playing cards game, total 8 * 52 = 416 cards.</li>
                                <li>If the card is from ACE to 6, LOW Wins.</li>
                                <li>If the card is from 8 to KING, HIGH Wins.</li>
                                <li>If the card is 7, bets on high and low will lose 50% of the bet amount.</li>
                            </ul>
                            <div>
                                <b class="rules-sub-highlight">LOW:</b>1,2,3,4,5,6 | <b class="rules-sub-highlight">HIGH:</b>8,9,10,J,Q,K
                                                                    </div>
                            <div>Payout:2.0</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">EVEN:</b>2,4,6,8,10,Q
                                                                    </div>
                            <div>Payout:2.10</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">ODD:</b>1,3,5,7,9,J,K
                                                                    </div>
                            <div>Payout:1.79</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">RED:</b>
                            </div>
                            <div>Payout:1.95</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">BLACK:</b>
                            </div>
                            <div>Payout:1.95
                            </div>
                            <br>
                            <b class="rules-sub-highlight">CARDS:</b>1,2,3,4,5,6,7,8,9,10,J,Q,K
                        <div>PAYOUT: 12.0</div>
                        </div>`;
        } else if(gametype == "cmeter1") {
            ruletitle = "1 Card Meter Rules";
            image_url = `<div class="rules-section">
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>1 Card meter will be played with 8 deck of cards.</li>
                                                <li>In this game the value of the cards will be as follow
                                                    <p>ACE =1, 2=2, 3=3, ……, Jack =11, Queen=12, King=13.</p>
                                                </li>
                                                <li>In this game there will be two players which will be named as Fighter A &amp; Fighter B.</li>
                                                <li>1 card each will be dealt to both the fighters.</li>
                                                <li>In this game the winner will be the fighter who will have the higher value card and also his point difference will be calculated.</li>
                                            </ul>
                                            <p>For example,</p>
                                            <p>Fighter A has 7.</p>
                                            <p>Fighter B has King (K).</p>
                                            <p>So fighter B will be the winner with 6 points (13-7 = 6).</p>
                                            <p>here the winning amount will be calculated on the point differences.</p>
                                            <p>Like,</p>
                                            <p>1 point 1 time bet amount.</p>
                                            <p>2 points 2 times bet amount.</p>
                                            <p>3 points 3 times bet amount.</p>
                                            <p>4 points 4 times bet amount.</p>
                                            <p>5 points 5 times bet amount.</p>
                                            <p>6 points 6 times bet amount.</p>
                                            <p>7 points 7 times bet amount.</p>
                                            <p>8 points 8 times bet amount.</p>
                                            <p>9 points 9 times bet amount.</p>
                                            <p>10 points 10 times bet amount.</p>
                                            <p>11 points 11 times bet amount.</p>
                                            <p>12 points 12 times bet amount.</p>
                                            <p>(12 times bet amount will be the highest)</p>
                                            <p>So in this case the difference is 6 points thus the winning amount for Fighter B will be 6 times of the bet amount and similarly For Fighter A the losing amount will be 6 times of the bet amount.</p>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>In this game If punter place bet of 100 amount &amp; If he loses by 12 points then he will lose 1200 amount.
                                                    <p>In short in this game punter can win or lose up to 12 times of his betting amount. </p>
                                                </li>
                                                <li>If both the fighters have same value cards but of different suits then the winner will be decided by the ranking of the suits
                                                    <p>Ie. Spades hearts clubs diamonds</p>
                                                    <p>And in this case the winning amount will be 1 time of the bet amount.
                                                    </p>
                                                    <p>If both the fighters have the same value cards and of the same suits then in this case it will be a tieand the bet amount will be pushed( Returned)</p>
                                                </li>
                                                <li>2% will be charged on winning amount only.</li>
                                            </ul>
                                        </div>
                                           `;
        } else if(gametype == "cc20") {
            ruletitle = "Cricket Match 20-20 Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>This is a game of twenty-20 cricket. We will alreadty have score of first batting team, &amp; score of second batting team up to 19.4 overs. At this stage second batting team will be always 12 run short of first batting team(IF THE SCORE IS TIED, SECOND BAT WILL WIN). This 12 run has to be scored by 2 scoring shots or (two steps).</li>
                                                    <li>1st step is to be select a scoring shot from 2 , 3 , 4 , 5 , 6 ,7 , 8 , 9 , 10. The one who bet will get rate according to the scoring shot he select from 2 to 10, &amp; that will be considered as ball number 19.5.</li>
                                                    <li>2nd step is to open a card from 40 card deck of 1 to 10 of all suites. This will be considered last ball of the match. This twenty-20 game consist of scoring shots of 1 run to 10 runs.</li>
                                                    <li class="text-danger"><b>IF THE SCORE IS TIED SECOND BAT WILL WIN</b></li>
                                                </ul>
                                            </div>`;
        } else if(gametype == "5_cricket"){
            ruletitle = "Five Five Cricket Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/cricketv3.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "ddb") {
            ruletitle = "Bollywood Casino Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The bollywood table game will be played with a total of 16 cards including (J,Q, K, A) these cards and 2 deck that means game is playing with total 16*2 = 32 cards</li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character black-card ml-1">A}</span>
                                                            <span>Don Wins</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">A{</span>
                                                            <span class="card-character red-card ml-1">A[</span>
                                                            <span class="card-character black-card ml-1">A]</span>
                                                            <span>Amar Akbar Anthony Wins</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character black-card ml-1">K}</span>
                                                            <span class="card-character black-card ml-1">Q}</span>
                                                            <span class="card-character black-card ml-1">J}</span>
                                                            <span>Sahib Bibi aur Ghulam Wins.</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">K[</span>
                                                            <span class="card-character black-card ml-1">K]</span>
                                                            <span>Dharam Veer Wins.</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">K{</span>
                                                            <span class="card-character black-card ml-1">Q]</span>
                                                            <span class="card-character red-card ml-1">Q[</span>
                                                            <span class="card-character red-card ml-1">Q{</span>
                                                            <span>Kis Kisko Pyaar Karoon Wins.</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">J{</span>
                                                            <span class="card-character black-card ml-1">J]</span>
                                                            <span class="card-character red-card ml-1">J[</span>
                                                            <span>Ghulam Wins.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>
                                                        <b>ODD:</b>
                                                        <span>J K A</span>
                                                    </li>
                                                    <li>
                                                        <b>DULHA DULHAN:</b>
                                                        <span>Q K</span>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <b>BARATI:</b>
                                                        <span>A J</span>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <b>RED:</b>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <b>BLACK:</b>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <span>J,Q,K,A</span>
                                                        <div>PAYOUT: 3.75</div>
                                                    </li>
                                                    <li>A = DON</li>
                                                    <li>B = AMAR AKBAR ANTHONY</li>
                                                    <li>C = SAHIB BIBI AUR GHULAM</li>
                                                    <li>D = DHARAM VEER</li>
                                                    <li>E = KIS KISKO PYAAR KAROON</li>
                                                    <li>F = GHULAM</li>
                                                    
                                                </ul>
                                            </div>`;
        } else if(gametype == "aaa") {
            ruletitle = "Amar Akbar Anthony Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is ACE,2,3,4,5, or 6 Amar Wins. </li>
                                                    <li>If the card is 7,8,9 or 10 Akbar wins. </li>
                                                    <li>If the card is J,Q or K Anthony wins.</li>
                                                </ul>
                                            </div><div><div class="rules-section">
                                                <p>
                                                    <b class="rules-sub-highlight">EVEN</b>
                                                    <span class="ml-2">(PAYOUT 2.12)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is 2 , 4 , 6 , 8 , 10 , Q</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">ODD</b>
                                                    <span class="ml-2">(PAYOUT 1.83)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is A , 3 , 5 , 7 , 9 , J , K</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">RED</b>
                                                    <span class="ml-2">(PAYOUT 1.97)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card color is DIAMOND or HEART</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">BLACK</b>
                                                    <span class="ml-2">(PAYOUT 1.97)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card color is CLUB or SPADE</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">UNDER 7</b>
                                                    <span class="ml-2">(PAYOUT 2.0)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is A , 2 , 3 , 4 , 5 , 6</li>
                                                </ul>
                                                <p>
                                                    <b class="rules-sub-highlight">OVER 7</b>
                                                    <span class="ml-2">(PAYOUT 2.0)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>If the card is 8 , 9 , 10 , J , Q , K</li>
                                                </ul>
                                                <p>
                                                    <b>Note: </b>
                                                    <span>If the card is 7, Bets on under 7 and over 7 will lose 50% of the bet amount.</span>
                                                </p>
                                                <p>
                                                    <b class="rules-sub-highlight">CARDS</b>
                                                    <span class="ml-2">(PAYOUT 12.0)</span>
                                                </p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>A , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , J , Q , K</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "casino_war") {
            ruletitle = "Casino War Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/war.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "lucky7eu") {
            ruletitle = "Lucky 7 - B Rules";
            image_url = `<div class="rules-section">
                            <ul class="pl-4 pr-4 list-style">
                                <li>Lucky 7 is a 8 deck playing cards game, total 8 * 52 = 416 cards.</li>
                                <li>If the card is from ACE to 6, LOW Wins.</li>
                                <li>If the card is from 8 to KING, HIGH Wins.</li>
                                <li>If the card is 7, bets on high and low will lose 50% of the bet amount.</li>
                            </ul>
                            <div>
                                <b class="rules-sub-highlight">LOW:</b>1,2,3,4,5,6 | <b class="rules-sub-highlight">HIGH:</b>8,9,10,J,Q,K
                                                                    </div>
                            <div>Payout:2.0</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">EVEN:</b>2,4,6,8,10,Q
                                                                    </div>
                            <div>Payout:2.10</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">ODD:</b>1,3,5,7,9,J,K
                                                                    </div>
                            <div>Payout:1.79</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">RED:</b>
                            </div>
                            <div>Payout:1.95</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">BLACK:</b>
                            </div>
                            <div>Payout:1.95
                            </div>
                            <br>
                            <b class="rules-sub-highlight">CARDS:</b>1,2,3,4,5,6,7,8,9,10,J,Q,K
                        <div>PAYOUT: 12.0</div>
                        </div>`;
        } else if(gametype == 'lucky7') {
            ruletitle = "Lucky 7 - A Rules";
            image_url = `<div class="rules-section">
                            <ul class="pl-4 pr-4 list-style">
                                <li>Lucky 7 is a 8 deck playing cards game, total 8 * 52 = 416 cards.</li>
                                <li>If the card is from ACE to 6, LOW Wins.</li>
                                <li>If the card is from 8 to KING, HIGH Wins.</li>
                                <li>If the card is 7, bets on high and low will lose 50% of the bet amount.</li>
                            </ul>
                            <div>
                                <b class="rules-sub-highlight">LOW:</b>1,2,3,4,5,6 | <b class="rules-sub-highlight">HIGH:</b>8,9,10,J,Q,K
                                                                    </div>
                            <div>Payout:2.0</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">EVEN:</b>2,4,6,8,10,Q
                                                                    </div>
                            <div>Payout:2.10</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">ODD:</b>1,3,5,7,9,J,K
                                                                    </div>
                            <div>Payout:1.79</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">RED:</b>
                            </div>
                            <div>Payout:1.95</div>
                            <br>
                            <div>
                                <b class="rules-sub-highlight">BLACK:</b>
                            </div>
                            <div>Payout:1.95
                            </div>
                            <br>
                            <b class="rules-sub-highlight">CARDS:</b>1,2,3,4,5,6,7,8,9,10,J,Q,K
                        <div>PAYOUT: 12.0</div>
                        </div>`;
        } else if(gametype == "ab202") {
            ruletitle = "Andar Bahar 2 Rules";
            image_url = `<div class="rules-section">
                                                <h6 class="rules-highlight">Rules</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>
                                                        Andar Bahar is a very simple game that involves the use of a single pack of cards.Game is played between the House and the Player. The dealer deals a single card face up on the Joker place and then proceeds to deal cards face up on A (ANDAR) and B (BAHAR)
                                                        spots. When a card appears that matches the value of the Joker card then the game ends. Before the start of the game, players bet on which side they think the game will end.
                                                    </li>
                                                    <li>
                                                        Before dealer starts dealing/opening cards from the deck, he/she also offers a side bet to the players who have estimated time to bet if the card/joker will be dealt as the 1st card.
                                                    </li>
                                                    <li>
                                                        If the 1st placed card doesn't match the value of the Joker's card, the game continues and the dealer then offers the option to players to put their 2nd bet on the same joker card to be dealt either on ANDAR or on BAHAR. The players again have estimated
                                                        time to decide if they want to place a 2nd bet. Dealer deals the cards one at a time alternating between two spots.
                                                    </li>
                                                    <li>
                                                        If the 1st dealt card in 1st bet matches the joker’s card, Bahar side wins with payout 1:0,5
                                                    </li>
                                                    <li>
                                                        If the 1st dealt card in 1st bet matches the joker’s card, Andar side wins with payout 1:0,5
                                                    </li>
                                                    <li>
                                                        If the 2nd dealt card in 1st bet matches the joker’s card, Bahar side wins with payout 1:0,5
                                                    </li>
                                                    <li>
                                                        If the 2nd dealt card in 1st bet matches the joker’s card, Andar side wins with payou 1:0,5
                                                    </li>
                                                </ul>
                                            </div>
                                            <div><style type="text/css">
            .rules-section .row.row5 {
                margin-left: -5px;
                margin-right: -5px;
            }
            .rules-section .pl-2 {
                padding-left: .5rem !important;
            }
            .rules-section .pr-2 {
                padding-right: .5rem !important;
            }
            .rules-section .row.row5 > [class*="col-"], .rules-section .row.row5 > [class*="col"] {
                padding-left: 5px;
                padding-right: 5px;
            }
            .rules-section
            {
                text-align: left;
                margin-bottom: 10px;
            }
            .rules-section .table
            {
                color: #fff;
                border:1px solid #444;
                background-color: #222;
                font-size: 12px;
            }
            .rules-section .table td, .rules-section .table th
            {
                border-bottom: 1px solid #444;
            }
            .rules-section ul li, .rules-section p
            {
                margin-bottom: 5px;
            }
            .rules-section::-webkit-scrollbar {
                width: 8px;
            }
            .rules-section::-webkit-scrollbar-track {
                background: #666666;
            }
    
            .rules-section::-webkit-scrollbar-thumb {
                background-color: #333333;
            }
            .rules-section .rules-highlight
            {
                color: #FDCF13;
                font-size: 16px;
            }
            .rules-section .rules-sub-highlight {
                color: #FDCF13;
                font-size: 14px;
            }
            .rules-section .list-style, .rules-section .list-style li
            {
                list-style: disc;
            }
            .rules-section .rule-card
            {
                height: 20px;
                margin-left: 5px;
            }
            .rules-section .card-character
            {
                font-family: Card Characters;
            }
            .rules-section .red-card
            {
                color: red;
            }
            .rules-section .black-card
            {
                color: black;
            }
            .rules-section .cards-box
            {
                background: #fff;
                padding: 6px;
                display: inline-block;
                color: #000;
                min-width: 150px;
            }
            .rules-section img
            {
                height: 30px;
                margin-right: 5px;
            }
            .rules-section .casino-tabs {
                background-color: #222 !important;
                border-radius: 0;
            }
            .rules-section .casino-tabs .nav-tabs .nav-link
            {
                color: #fff !important;
            }
            .rules-section .casino-tabs .nav-tabs .nav-link.active
            {
                color: #FDCF13 !important;
                border-bottom: 3px solid #FDCF13 !important;
            }
        </style>
    
    <div class="rules-section">
                                                <h6 class="rules-highlight">Payout</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Bet</th>
                                                                <th>Description</th>
                                                                <th>Payout</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1st Bet Bahar</td>
                                                                <td>Payout if Bahar Wins on the 1st bet</td>
                                                                <td>1 to 1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>1st Bet Andar</td>
                                                                <td>Payout if Andar wins on the 1st bet </td>
                                                                <td>1 to 1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2nd Bet Bahar</td>
                                                                <td>Payout if Bahar wins on the 2nd bet </td>
                                                                <td>1 to 1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2nd Bet Andar </td>
                                                                <td>Payout if Andar wins on the 1st bet</td>
                                                                <td>1 to 1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Side Bets Bahar</td>
                                                                <td>Payout for winning side bet.</td>
                                                                <td>1 to 14</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Side Bets Andar</td>
                                                                <td>Payout for winning side bet.</td>
                                                                <td>1 to 14</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div></div>`;
        } else if(gametype == "32cards_b") {
            ruletitle = "32 Cards B Rules";
            image_url = `<div class="rules-section">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Cards Deck</th>
                                                                <th>Value</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>6(SPADE) 6(HEART) 6(CLUB) 6(DIAMOND)</td>
                                                                <td>6 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7(SPADE) 7(HEART) 7(CLUB) 7(DIAMOND)</td>
                                                                <td>7 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8(SPADE) 8(HEART) 8(CLUB) 8(DIAMOND)</td>
                                                                <td>8 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9(SPADE) 9(HEART) 9(CLUB) 9(DIAMOND)</td>
                                                                <td>9 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10(SPADE) 10(HEART) 10(CLUB) 10(DIAMOND)</td>
                                                                <td>10 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>J(SPADE) J(HEART) J(CLUB) J(DIAMOND)</td>
                                                                <td>11 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Q(SPADE) Q(HEART) Q(CLUB) Q(DIAMOND)</td>
                                                                <td>12 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>K(SPADE) K(HEART) K(CLUB) K(DIAMOND)</td>
                                                                <td>13 POINT</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>This is a value card game &amp; Winning result will count on Highest cards total.</li>
                                                    <li>There are total 4 players, every player have default prefix points. Default points will be consider as following table.</li>
                                                </ul>
                                                <h6 class="rules-highlight">Playing Game Rules:</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div><b>PLAYER 8</b></div>
                                                                    <div>8 Point</div>
                                                                </td>
                                                                <td>
                                                                    <div><b>PLAYER 9</b></div>
                                                                    <div>9 Point</div>
                                                                </td>
                                                                <td>
                                                                    <div><b>PLAYER 10</b></div>
                                                                    <div>10 Point</div>
                                                                </td>
                                                                <td>
                                                                    <div><b>PLAYER 11</b></div>
                                                                    <div>11 Point</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>In game, every player has to count sum of default points and their ownopened card's point.</li>
                                                    <li>If in first level, the sum is same with more than one player, then thatwill be tie and winner tied players go for next level.</li>
                                                    <li>This sum will go and go upto Single Player Highest Sum of Point.</li>
                                                    <li>At last Highest Point Cards's Player declare as a Winner.</li>
                                                </ul>
                                            </div>`;
        } else if(gametype == "32cards_a") {
            ruletitle = "32 Cards A Rules";
            image_url = `<div class="rules-section">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Cards Deck</th>
                                                                <th>Value</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>6(SPADE) 6(HEART) 6(CLUB) 6(DIAMOND)</td>
                                                                <td>6 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7(SPADE) 7(HEART) 7(CLUB) 7(DIAMOND)</td>
                                                                <td>7 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8(SPADE) 8(HEART) 8(CLUB) 8(DIAMOND)</td>
                                                                <td>8 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9(SPADE) 9(HEART) 9(CLUB) 9(DIAMOND)</td>
                                                                <td>9 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10(SPADE) 10(HEART) 10(CLUB) 10(DIAMOND)</td>
                                                                <td>10 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>J(SPADE) J(HEART) J(CLUB) J(DIAMOND)</td>
                                                                <td>11 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Q(SPADE) Q(HEART) Q(CLUB) Q(DIAMOND)</td>
                                                                <td>12 POINT</td>
                                                            </tr>
                                                            <tr>
                                                                <td>K(SPADE) K(HEART) K(CLUB) K(DIAMOND)</td>
                                                                <td>13 POINT</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>This is a value card game &amp; Winning result will count on Highest cards total.</li>
                                                    <li>There are total 4 players, every player have default prefix points. Default points will be consider as following table.</li>
                                                </ul>
                                                <h6 class="rules-highlight">Playing Game Rules:</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div><b>PLAYER 8</b></div>
                                                                    <div>8 Point</div>
                                                                </td>
                                                                <td>
                                                                    <div><b>PLAYER 9</b></div>
                                                                    <div>9 Point</div>
                                                                </td>
                                                                <td>
                                                                    <div><b>PLAYER 10</b></div>
                                                                    <div>10 Point</div>
                                                                </td>
                                                                <td>
                                                                    <div><b>PLAYER 11</b></div>
                                                                    <div>11 Point</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>In game, every player has to count sum of default points and their ownopened card's point.</li>
                                                    <li>If in first level, the sum is same with more than one player, then thatwill be tie and winner tied players go for next level.</li>
                                                    <li>This sum will go and go upto Single Player Highest Sum of Point.</li>
                                                    <li>At last Highest Point Cards's Player declare as a Winner.</li>
                                                </ul>
                                            </div>`;
        } else if(gametype == 'dt202') {
            ruletitle = "20-20 Dragon Tiger 2 Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/dt202.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == 'dtl20') {
            ruletitle = "20-20 D T L Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>20-20 DTL(Dragon Tiger Lion) is a 52 playing cards game, In DTL game 3 hands are dealt: for each 3 player. The player will bets which will win. </li>
                                                    <li>The ranking of cards is, from lowest to highest: Ace, 2, 3, 4, 5, 6, 7,8, 9, 10, Jack, Queen and King when Ace is “1” and King is “13”.</li>
                                                    <li>On same card with different suit, Winner will be declare based on below winning suit sequence.
                                                        <p>
                                                            </p><div class="cards-box">
                                                                <span class="card-character black-card ml-1">1}</span>
                                                                <span>1st</span>
                                                            </div>
                                                        <p></p>
                                                        <p>
                                                            </p><div class="cards-box">
                                                                <span class="card-character red-card ml-1">1{</span>
                                                                <span>2nd</span>
                                                            </div>
                                                        <p></p>
                                                        <p>
                                                            </p><div class="cards-box">
                                                                <span class="card-character black-card ml-1">1]</span>
                                                                <span>3rd</span>
                                                            </div>
                                                        <p></p>
                                                        <p>
                                                            </p><div class="cards-box">
                                                                <span class="card-character red-card ml-1">1[</span>
                                                                <span>4th</span>
                                                            </div>
                                                        <p></p>
                                                    </li>
                                                </ul>
                                            </div>`;
        } else if(gametype == "odi_dragon_tiger"){
            ruletitle = "1 Day Dragon Tiger Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/dt6.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "20_dragon_tiger") {
            ruletitle = "20-20 Dragon Tiger Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/dt202.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "baccarat2") {
            ruletitle = "Baccarat 2 Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>In the Baccarat game two hands are dealt; once for the banker and another for the player. The player best which will win or if they will tie. The winning hand has the closest value to nine. In case of Banker winning, if banker's point sum is equals to 6, then payout will be 50%.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules for Players:</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td rowspan="3">When Player’s first two cards total:</td>
                                                                <td>0-1-2-3-4-5</td>
                                                                <td>Draw a card</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6-7</td>
                                                                <td>Stands</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8-9</td>
                                                                <td>Natural-Neither hand draws</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div></div>
                                            <div>                                        <div class="rules-section">
                                                <h6 class="rules-highlight">Rules for Banker:</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>When the PLAYER stands on 6 or 7, the BANKER will always draw on totals of 0-1-2-3-4 and 5, and stands on 6-7-8 and 9.When the PLAYER does not have a natural, the BANKER shall draw on the totals of 0-1 or 2, and then observe the following rules:</li>
                                                </ul>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>When Banker’s first two cards total:</td>
                                                                <td>Draws when Player’s third card is:</td>
                                                                <td>Does not draw when Player’s third card is:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>1-2-3-4-5-6-7-9-0</td>
                                                                <td>8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>2-3-4-5-6-7</td>
                                                                <td>1-8-9-0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>4-5-6-7</td>
                                                                <td>1-2-3-8-9-0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>6-7</td>
                                                                <td>1-2-3-4-5-8-9-0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td colspan="2">STANDS</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8-9</td>
                                                                <td colspan="2">NATURAL-NEITHER HAND DRAWS</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If the PLAYER takes no third card BANKER stands on 6. The hand closest to 9 wins.All Winning bets are paid even money.TIE bets pay 8 for 1</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Side Bets:</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                      <li><b>Player Pair</b> - Bet on the chance that the first two cards dealt to the player, are a pair.</li>
                                                    <li><b>Banker Pair</b> - Bet on the chance that the first two cards dealt to the banker, are a pair.</li>
                                                    <li>Select the Player/Banker winning score and get paid according to the payout shown. in the event of tie, bets on  “Winning Total” are lost</li>
                                                </ul>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>1-4(7:5:1)</td>
                                                                <td>5-6(4:1)</td>
                                                                <td>7(4:5:1)</td>
                                                                <td>8(3:1)</td>
                                                                <td>9(2:5:1)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>For example, if you believe the Player/Banker winning score will be ‘5-6’(meaning 5 or 6) then if this side bet wins you can win 4 times your side bet amount</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "baccarat") {
            ruletitle = "Baccarat Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>In the Baccarat game two hands are dealt; once for the banker and another for the player. The player best which will win or if they will tie. The winning hand has the closest value to nine. In case of Banker winning, if banker's point sum is equals to 6, then payout will be 50%.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules for Players:</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td rowspan="3">When Player’s first two cards total:</td>
                                                                <td>0-1-2-3-4-5</td>
                                                                <td>Draw a card</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6-7</td>
                                                                <td>Stands</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8-9</td>
                                                                <td>Natural-Neither hand draws</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules for Banker:</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>When the PLAYER stands on 6 or 7, the BANKER will always draw on totals of 0-1-2-3-4 and 5, and stands on 6-7-8 and 9.When the PLAYER does not have a natural, the BANKER shall draw on the totals of 0-1 or 2, and then observe the following rules:</li>
                                                </ul>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>When Banker’s first two cards total:</td>
                                                                <td>Draws when Player’s third card is:</td>
                                                                <td>Does not draw when Player’s third card is:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>1-2-3-4-5-6-7-9-0</td>
                                                                <td>8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>2-3-4-5-6-7</td>
                                                                <td>1-8-9-0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>4-5-6-7</td>
                                                                <td>1-2-3-8-9-0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>6-7</td>
                                                                <td>1-2-3-4-5-8-9-0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td colspan="2">STANDS</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8-9</td>
                                                                <td colspan="2">NATURAL-NEITHER HAND DRAWS</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If the PLAYER takes no third card BANKER stands on 6. The hand closest to 9 wins.All Winning bets are paid even money.TIE bets pay 8 for 1</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Side Bets:</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li><b>Player Pair</b> - Bet on the chance that the first two cards dealt to the player, are a pair.</li>
                                                    <li><b>Banker Pair</b> - Bet on the chance that the first two cards dealt to the banker, are a pair.</li>
                                                    <li><b>Big</b> - Bet on the chance that the total number of cards dealt between Player and Banker is 5 or 6.</li>
                                                    <li><b>Small</b> - Bet on the chance that the total number of cards dealt between Player and Banker is 4.</li>
                                                    <li><b>Perfect Pair</b> - Bet on the chance that the first two Player or Banker cards form a pair of the same suit.</li>
                                                    <li><b>Either Pair</b> - Bet on the chance that either the first two cards of the Banker hand or the first two cards of the Player hand (or both) form a pair.</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "6player_poker"){
            ruletitle = "Poker 6 Players Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/poker6.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "20poker") {
            ruletitle = "20-20 Poker Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/poker6.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "1day_poker"){
            ruletitle = "Poker 1-Day Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/poker6.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "open_teenpatti") {
            ruletitle = "Teenpatti Open Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "test_teenpatti") {
            ruletitle = "Teenpatti Test Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "20_teenpatti") {
            ruletitle = "20-20 Teenpatti Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>The game is played with a regular 52 cards single deck, between 2 players A and B.</li>
                                                    <li>Each player will receive 3 cards.</li>
                                                    <li><b>Rules of regular teenpatti winner</b></li>
                                                </ul>
                                                <div>
                                                    <img src="storage/front/img/rules/teen20b.jpg">
                                                </div>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of 3 baccarat</h6>
                                                <p>There are 3 criteria for winning the 3 Baccarat .</p>
                                                <h7 class="rules-sub-highlight">First criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having trio will win,</li>
                                                    <li>If both game has trio then higher trio will win.</li>
                                                    <li>Ranking of trio from high to low.
                                                        <div class="pl-2 pr-2">1,1,1</div>
                                                        <div class="pl-2 pr-2">K,K,K</div>
                                                        <div class="pl-2 pr-2">Q,Q,Q</div>
                                                        <div class="pl-2 pr-2">J,J,J</div>
                                                        <div class="pl-2 pr-2">10,10,10</div>
                                                        <div class="pl-2 pr-2">9,9,9</div>
                                                        <div class="pl-2 pr-2">8,8,8</div>
                                                        <div class="pl-2 pr-2">7,7,7</div>
                                                        <div class="pl-2 pr-2">6,6,6</div>
                                                        <div class="pl-2 pr-2">5,5,5</div>
                                                        <div class="pl-2 pr-2">4,4,4</div>
                                                        <div class="pl-2 pr-2">3,3,3</div>
                                                        <div class="pl-2 pr-2">2,2,2</div>
                                                    </li>
                                                    <li>If none of the game have got trio then second criteria will apply.</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">Second criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having all the three face card will win.</li>
                                                    <li>Here JACK, QUEEN AND KING are named face card.</li>
                                                    <li>if both the game have all three face cards then game having highest face card will win.</li>
                                                    <li>Ranking of face card from High to low :
                                                        <div class="pl-2 pr-2">Spade King</div>
                                                        <div class="pl-2 pr-2">Heart King</div>
                                                        <div class="pl-2 pr-2">Club King</div>
                                                        <div class="pl-2 pr-2">Diamond King</div>
                                                    </li>
                                                    <li>Same order will apply for Queen (Q) and Jack (J) also .</li>
                                                    <li>If second criteria is also not applicable, then 3rd criteria will apply .</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">3rd criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having higher baccarat value will win .</li>
                                                    <li>For deciding baccarat value we will add point value of all the three cards</li>
                                                    <li>Point value of all the cards :
                                                        <div class="pl-2 pr-2">1 = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">To</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10, J ,Q, K has zero (0) point value .</div>
                                                    </li>
                                                </ul>
                                                <p><b>Example 1st:</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Last digit of total will be considered as baccarat value
                                                        <div class="pl-2 pr-2">2,5,8 =</div>
                                                        <div class="pl-2 pr-2">2+5+8 =15 here last digit of total is 5 , So baccarat value is 5.</div>
                                                    </li>
                                                </ul>
                                                <p><b>Example 2nd :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>1,3,K</li>
                                                    <li>1+3+0 = 4 here total is in single digit so we will take this single digit 4 as baccarat value</li>
                                                </ul>
                                                <p><b>If baccarat value of both the game is equal then Following condition will apply :</b></p>
                                                <p><b>Condition 1 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having more face card will win.</li>
                                                    <li>Example : Game A has 3,4,k and B has 7,J,Q then game B will win as it has more face card then game A .</li>
                                                </ul>
                                                <p><b>Condition 2 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If Number of face card of both the game are equal then higher value face card game will win.</li>
                                                    <li>Example : Game A has 4,5,K (K Spade ) and Game B has 9,10,K ( K Heart ) here baccarat value of both the game is equal (9 ) and both the game have same number of face card so game A will win because It has got higher value face card then Game B .</li>
                                                </ul>
                                                <p><b>Condition 3 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If baccarat value of both the game is equal and none of game has got face card then in this case Game having highest value point card will win .</li>
                                                    <li>Value of Point Cards :
                                                        <div class="pl-2 pr-2">Ace = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">3 = 3</div>
                                                        <div class="pl-2 pr-2">4 = 4</div>
                                                        <div class="pl-2 pr-2">5 = 5</div>
                                                        <div class="pl-2 pr-2">6 = 6</div>
                                                        <div class="pl-2 pr-2">7 = 7</div>
                                                        <div class="pl-2 pr-2">8 = 8</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10 = 0 (Zero )</div>
                                                    </li>
                                                    <li>Example : GameA: 1,6,10 And GameB: 7,10,10</li>
                                                    <li>here both the game have same baccarat value . But game B will win as it has higher value point card i.e. 7 .</li>
                                                </ul>
                                                <p><b>Condition 4 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If baccarat value of both game is equal and none of game has got face card and high point card of both the game is of equal point value , then suits of both high card will be compared</li>
                                                    <li>Example :
                                                        <div class="pl-2 pr-2">
                                                            Game A : 1(Heart) ,2(Heart) ,5(Heart)
                                                        </div>
                                                        <div class="pl-2 pr-2">
                                                            Game B : 10 (Heart) , 3 (Diamond ) , 5 (Spade )
                                                        </div>
                                                    </li>
                                                    <li>Here Baccarat value of both the game (8) is equal . and none of game has got face card and point value of both game's high card is equal so by comparing suits of both the high card ( A 5 of Heart , B 5 of spade ) game B is declared 3 Baccarat winner .</li>
                                                    <li>Ranking of suits from High to low :
                                                        <div class="pl-2 pr-2">Spade</div>
                                                        <div class="pl-2 pr-2">Heart</div>
                                                        <div class="pl-2 pr-2">Club</div>
                                                        <div class="pl-2 pr-2">Diamond</div>
                                                    </li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Total :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a comparison of total of all three cards of both the games.</li>
                                                    <li>Point value of all the cards for the bet of total
                                                        <div class="pl-2 pr-2">Ace = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">3 = 3</div>
                                                        <div class="pl-2 pr-2">4 = 4</div>
                                                        <div class="pl-2 pr-2">5 = 5</div>
                                                        <div class="pl-2 pr-2">6 = 6</div>
                                                        <div class="pl-2 pr-2">7 = 7</div>
                                                        <div class="pl-2 pr-2">8 = 8</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10 = 10</div>
                                                        <div class="pl-2 pr-2">Jack = 11</div>
                                                        <div class="pl-2 pr-2">Queen = 12</div>
                                                        <div class="pl-2 pr-2">King = 13</div>
                                                    </li>
                                                    <li>suits doesn't matter</li>
                                                    <li>If total of both the game is equal , it is a Tie .</li>
                                                    <li>If total of both the game is equal then half of your bet amount will returned.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Pair Plus :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>This bet provides multiple option to win a price .</li>
                                                    <li>Option 1 : Pair</li>
                                                    <li>If you got pair you will get equal value return of your betting amount .</li>
                                                    <li>Option 2 : Flush</li>
                                                    <li>If you have all three cards of same suits you will get 4 times return of your betting amount .</li>
                                                    <li>Option 3 : Straight</li>
                                                    <li>If you have straight ( three cards in sequence eg : 4,5,6 eg: J,Q,K ) (but king ,Ace ,2 is not a straight ) you will get six times return of your betting amount .</li>
                                                    <li>Option 4 : Trio</li>
                                                    <li>If you have got all the cards of same rank ( eg: 4,4,4 J,J,J ) you will get 30 times return of your betting amount .</li>
                                                    <li>Option 5 : Straight Flush</li>
                                                    <li>If you have straight of all three cards of same suits ( Three cards in sequence eg: 4,5,6 ) ( but King ,Ace ,2 is not straight ) you will get 40 times return of your betting amount .</li>
                                                    <li>Note : If you have trio then you will receive price of trio only , In this case you will not receive price of pair .</li>
                                                    <li>If you have straight flush you will receive price of straight flush only , In this case you will not receive price of straigh and flush .</li>
                                                    <li>It means you will receive only one price whichever is higher .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Color :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>This is a bet for having more cards of red or Black (Heart and Diamond are named RED , Spade and Club are named BLACK ).</li>
                                                    <li><b>NOTE :</b> For side bets you can place bets on either or both the players .</li>
                                                    <li><b>NOTE :</b> In case of a tie between the player A and Player B bets placed on player A and Player B (Main Bets ) will be returned ( Pushed ).</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "odi_teenpatti") {
            ruletitle = "Teenpatti 1-day Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Teenpatti is an indian origin three cards game.</li>
                                                    <li>This game is played with a regular 52 cards deck between Player A and Player B .</li>
                                                    <li>The objective of the game is to make the best three cards hand as per the hand rankings and win.</li>
                                                    <li>You have a betting option of Back and Lay for the main bet.</li>
                                                    <li>Rankings of the card hands from highest to lowest :</li>
                                                    <li>1. Straight Flush (pure Sequence )</li>
                                                    <li>2. Trail  (Three of a Kind )</li>
                                                    <li>3. Straight (Sequence)</li>
                                                    <li>4. Flush (Color )</li>
                                                    <li>5. Pair (Two of a kind )</li>
                                                    <li>6. High Card </li>
                                                </ul>
                                                <div>
                                                    <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                </div>
                                            </div>
                                            <div><div class="rules-section">
                                                <div>
                                                    <h6 class="rules-highlight">Side bets  :</h6>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li><b>CONSECUTIVE CARDS:</b> It is a bet of having two or more consecutive cards in the game.</li>
                                                    <li>eg: 2,3,5      10,3,9      Q,5,K     6,7,8    A,K,7</li>
                                                    <li>For both the players Back and Lay odds are available, you can bet on either or both the players.</li>
                                                    <li><b>Odd - Even :</b>  Here you can bet on every card whether it will be an odd card or an even card.</li>
                                                    <li><b>ODD CARDS :</b> A,3,5,7,9,J,K</li>
                                                    <li><b>EVEN CARDS:</b> 2,4,6,8,10,Q</li>
                                                    <li><b>NOTE:</b> In case of a Tie between the player A and player B bets placed on player A and player B  (Main bets ) will be returned. (Pushed)</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "teen32") {
            ruletitle = "Instant Teenpatti 2.0 Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Instant Teenpatti-2.0 is a shorter version of Indian origin game teenpatti.
                                                    </li>
                                                    <li>This game is played with a regular 52 cards deck between Player A and Player B .</li>
                                                    <li>In Instant Teenpatti-2.0 all the three cards of Player A and the first two cards of Player B will be pre-defined for all the games .These five cards will be permanently placed on the table .</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">3 Pre-defined cards of Player A :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>2 of Hearts</li>
                                                    <li>2 of Spades </li>
                                                    <li>3 of Clubs</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">2 Pre-defined cards of Player B :</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>8 of Hearts</li>
                                                    <li>9 of Hearts </li>
                                                    <li>So now the game will begin with the remaining 47 cards</li>
                                                    <li>(52-5 pre-defined cards = 47 )</li>
                                                    <li>Instant Teenpatti-2.0 is a one card game. one card will be dealt to Player B that will be the third and the last card of player B which will decide the result of the game. Hence that particular game will be
                                                        over.
                                                    </li>
                                                    <li>Now always the last drawn card of player B will be removed and kept aside. Thereafter a new game will commence from the remaining 46 cards then the same process will continue till both the players have winning
                                                        chances or otherwise upto 35 cards or so.</li>
                                                    <li>The objective of the game is to make the best three card hands as per the hand rankings and therefor win.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rankings of card hands from Highest to Lowest :
                                                </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>1. Straight Flush (Pure Sequence)</li>
                                                    <li>2. Trail (Three of a Kind)</li>
                                                    <li>3. Straight (Sequence)</li>
                                                    <li>4. Flush (Color)</li>
                                                    <li>5. Pair (Two of a Kind)</li>
                                                    <li>6. High Card </li>
                                                </ul>
                                                <div>You have betting options of Back and Lay.</div>
                                            </div></div>`;
        } else if (gametype == "ballbyball"){
            ruletitle = "Ball By Ball Rules";
            image_url = `<div class="rules-section">
                                                <h6 class="rules-highlight">Run Section : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>In 1, 2, 3, 4, 6, and boundary (4 or 6) events, only bat runs will
                                                        be considered.</li>
                                                    <li>In 0 runs, only dot balls will be considered.</li>
                                                    <li><b>Note:</b> Wickets or extras with runs will not be considered in
                                                        the above-mentioned events.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Wicket Section : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Particular Wickets (Caught, Bowled, Run Out, LBW, Stumped, and
                                                        Others) or Wickets (Any Wickets) only wicket will be considered.
                                                    </li>
                                                    <li><b>Note:</b> Any runs with Wickets will not be considered in these
                                                        events.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Extra Section : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Extra balls (no ball, wide, bye, and Leg Bye) &amp; Extras (any extras)
                                                        Only extras will be considered.</li>
                                                    <li><b>Note:</b> Any runs or wicket on extra balls will not be
                                                        considered in these events.</li>
                                                    <li>In the case of No Ball with runout, the result will be No Ball.
                                                    </li>
                                                </ul>
                                            </div></div>
                                            <div> <div class="rules-section">
                                                <h6 class="rules-highlight">Disclaimer:</h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The videos are from different broadcasters, so in such cases, the
                                                        scoreboard will update late. We will give results only on the basis
                                                        of our rules and as per the videos displayed.</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "sicbo"){
            ruletitle = "Sic Bo Rules";
            image_url = `<div class="rules-section">
                                                <h6 class="rules-highlight">Game Rules : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Sic Bo is an exciting game of chance played with three regular dice with face value 1 to 6. The objective of Sic Bo is to predict the outcome of the shake of the three dice.</li>
                                                    <li>After betting time has expired, the dice are shaken in a dice shaker. A number of bet spots — from zero to several — then have multipliers randomly applied to them before the dice come to rest and the result is known. If the player’s bet is placed on the bet spot with the applied multiplier, your bet is multiplied accordingly.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Bet Type : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>You can place many kinds of bets on the Sic Bo table, and each type of bet has its own payout. Your bet is returned on top of your winnings.
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li><span><strong>Small/Big</strong> — place your bet on the total of the three dice being Small (4–10) or Big (11–17). Wins pay 1:1, but these bets lose to any Triple.</span></li>
                                                            <li><span><strong>Even/Odd</strong> — place your bet on the total of the three dice being Odd or Even. Wins pay 1:1, but these bets lose to any Triple.</span></li>
                                                            <li><span><strong>Total</strong> — place your bet on any of the 14 betting areas labelled 4–17. Total is the total of the three dice and excludes 3 and 18. You win if the total of the three dice adds up to the Total number on which you placed your bet. Payouts vary depending on the winning total.</span></li>
                                                            <li><span><strong>Single</strong> — place your bet on any of the six betting areas labelled ONE, TWO, THREE, FOUR, FIVE and SIX, which represent the six face values of a dice.</span><ul class="singleBets--2f9e7"><li><span>If 1 of 3 dice shows the number you bet on, you get paid 1:1.</span></li><li><span>If 2 of 3 dice show the number you bet on, you get paid 2:1.</span></li><li><span>If all 3 dice show the number you bet on, you get paid 3:1.</span></li></ul></li>
                                                            <li><span><strong>Double</strong> — place your bet on any of the six Double-labelled betting areas. To win, 2 of 3 dice must show the same number. Wins pay 8:1. Please note that regardless of whether 2 or 3 dice show the same number, the payout remains the same.</span></li>
                                                            <li><span><strong>Triple</strong> — place your bet on any of the six Triple-labelled betting areas. To win, all 3 dice must match the number chosen, and you get paid 150:1.</span></li>
                                                            <li><span><strong>Any Triple</strong> — place your bet on this box to cover all six different Triple bets at once. To win, all three dice must show the same number, and you get paid 30:1.</span></li>
                                                            <li><span><strong>Combination</strong> — place your bet on any or all 15 possible 2 dice combinations. Wins pay 5:1.</span></li>
                                                        </ul>
                                                    </li>
                                                    <li>After the betting is closed, random bet spots will be highlighted showing the multiplied payouts.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Winning Numbers : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The WINNING NUMBERS display shows the most recent winning numbers.</li>
                                                    <li>The result of the most recently completed round is listed on the left: the total of the three dice on the upper line, following with the result of three individual dice below.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Statistics : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>In the roadmap below, the Winning numbers are displayed in the patterns of Small (S), Big (B), and Triple (T) results. Each cell represents the result of a past round. The result of the earliest round is recorded in the upper left corner. Read the column downwards all the way to the bottom; then start at the top of the adjacent column to the right, and so forth.</li>
                                                    <li>This representation may be of help to you in predicting the results of future rounds.</li>
                                                    <li>Below the roadmap, you can see the statistics of Small, Big, and Triple bets for the last 50 rounds.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Payouts : </h6>
                                                <ul>
                                                    <li>Your payout depends on the type of bet placed. The payout range depends on whether the bet you have placed on the bet spot of your choice has a multiplier applied to it. If there is no multiplier, then the regular payout is applied. Your bet is returned on top of your winnings.</li>
                                                </ul>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Bet</th>
                                                            <th>Payout</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Small/Big</td>
                                                            <td>1:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Even/Odd</td>
                                                            <td>1:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Double</td>
                                                            <td>8:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Triple</td>
                                                            <td>150:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Any Triple</td>
                                                            <td>30:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 4 or 17</td>
                                                            <td>50:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 5 or 16</td>
                                                            <td>20:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 6 or 15</td>
                                                            <td>15:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 7 or 14</td>
                                                            <td>12:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 8 or 13</td>
                                                            <td>8:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 9 or 12</td>
                                                            <td>6:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 10 or 11</td>
                                                            <td>6:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Combination</td>
                                                            <td>5:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="d-flex justify-content-between">
                                                                    <div>
                                                                        <ul class="list-style">
                                                                            <li>Single</li>
                                                                            <li>Double</li>
                                                                            <li>Triple</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <div>1:1</div>
                                                                        <div>2:1</div>
                                                                        <div>3:1</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p>Malfunction voids all pays and play.</p>
                                            </div></div>`;
        } else if (gametype == "teen33"){
            ruletitle = "Instant Tenpatti 3.0 Rules";
            image_url = `<div class="rules-section">
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>Instant Teenpatti-3.0 is a shorter version of Indian origin game teenpatti.</li>
                                                        <li>This game is played with a regular 52 cards deck between player A and Player B.</li>
                                                        <li>In Instant Teenpatti 3.0 all three cards of Player A and first two cards of Player B will be pre-defined for all the games. These five cards will be permanently placed on the table</li>
                                                    </ul>
                                                </div>
                                                <div><div class="rules-section">
                                                    <h6 class="rules-highlight">3 Pre-defined cards of Player A :</h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>9 of Clubs</li>
                                                        <li>8 of Hearts</li>
                                                        <li>6 of Spades</li>
                                                    </ul>
                                                </div></div>
                                                <div><div class="rules-section">
                                                    <h6 class="rules-highlight">2 Pre-defined cards of Player B:</h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>9 of Diamonds</li>
                                                        <li>5 of Clubs</li>
                                                        <li>So now the game will begin with the remaining 47 cards</li>
                                                        <li>(52-5 pre-defined cards = 47)</li>
                                                        <li>Instant Teenpatti-3.0 is a one card game. One card will be dealt to Player B that will be the third and last card of player B which will decide the result of the game. Hence that particular game will be over.</li>
                                                        <li>Now always the last drawn card of player B will be removed and kept aside. Thereafter a new game will commence for the remaining 46 cards then the same process will continue till both the player have winning chances or otherwise upto 35 cards or so.</li>
                                                        <li>The objective of the game is to make the best three card hands as per the hand rankings and therefor win.</li>
                                                    </ul>
                                                </div></div>
                                                <div><div class="rules-section">
                                                    <h6 class="rules-highlight">Rankings of cards hands from Highest to lowest:</h6>
                                                    <ul class="pl-4 pr-4 list-style">
                                                        <li>1. Straight Flush (Pure Sequence)</li>
                                                        <li>2. Trail (Three of a kind)</li>
                                                        <li>3. Straight (Sequence)</li>
                                                        <li>4. Flush (Color)</li>
                                                        <li>5. Pair (Two of kind)</li>
                                                        <li>6. High Card</li>
                                                    </ul>
                                                </div>
                                                <div>You have betting options of Back and Lay.</div></div>`;
        } else if(gametype == "sicbo2"){
            ruletitle = "Sic Bo 2 Rules";
            image_url = `<div class="rules-section">
                                                <h6 class="rules-highlight">Game Rules : </h6>
                                                <ul class="pl-4 pr-4 list-style">
    <li>This casino operates similarly to Sicbo, with the key difference being that each round alternates between two Sicbo machines. For example, the first round will start on the first machine, the second round on the second machine, and this alternating pattern will continue throughout the game.</li>
                                                    <li>Sic Bo is an exciting game of chance played with three regular dice with face value 1 to 6. The objective of Sic Bo is to predict the outcome of the shake of the three dice.</li>
                                                    <li>After betting time has expired, the dice are shaken in a dice shaker. A number of bet spots — from zero to several — then have multipliers randomly applied to them before the dice come to rest and the result is known. If the player’s bet is placed on the bet spot with the applied multiplier, your bet is multiplied accordingly.</li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Bet Type : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>You can place many kinds of bets on the Sic Bo table, and each type of bet has its own payout. Your bet is returned on top of your winnings.
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li><span><strong>Small/Big</strong> — place your bet on the total of the three dice being Small (4–10) or Big (11–17). Wins pay 1:1, but these bets lose to any Triple.</span></li>
                                                            <li><span><strong>Even/Odd</strong> — place your bet on the total of the three dice being Odd or Even. Wins pay 1:1, but these bets lose to any Triple.</span></li>
                                                            <li><span><strong>Total</strong> — place your bet on any of the 14 betting areas labelled 4–17. Total is the total of the three dice and excludes 3 and 18. You win if the total of the three dice adds up to the Total number on which you placed your bet. Payouts vary depending on the winning total.</span></li>
                                                            <li><span><strong>Single</strong> — place your bet on any of the six betting areas labelled ONE, TWO, THREE, FOUR, FIVE and SIX, which represent the six face values of a dice.</span><ul class="singleBets--2f9e7"><li><span>If 1 of 3 dice shows the number you bet on, you get paid 1:1.</span></li><li><span>If 2 of 3 dice show the number you bet on, you get paid 2:1.</span></li><li><span>If all 3 dice show the number you bet on, you get paid 3:1.</span></li></ul></li>
                                                            <li><span><strong>Double</strong> — place your bet on any of the six Double-labelled betting areas. To win, 2 of 3 dice must show the same number. Wins pay 8:1. Please note that regardless of whether 2 or 3 dice show the same number, the payout remains the same.</span></li>
                                                            <li><span><strong>Triple</strong> — place your bet on any of the six Triple-labelled betting areas. To win, all 3 dice must match the number chosen, and you get paid 150:1.</span></li>
                                                            <li><span><strong>Any Triple</strong> — place your bet on this box to cover all six different Triple bets at once. To win, all three dice must show the same number, and you get paid 30:1.</span></li>
                                                            <li><span><strong>Combination</strong> — place your bet on any or all 15 possible 2 dice combinations. Wins pay 5:1.</span></li>
                                                        </ul>
                                                    </li>
                                                    <li>After the betting is closed, random bet spots will be highlighted showing the multiplied payouts.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Winning Numbers : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The WINNING NUMBERS display shows the most recent winning numbers.</li>
                                                    <li>The result of the most recently completed round is listed on the left: the total of the three dice on the upper line, following with the result of three individual dice below.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Statistics : </h6>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>In the roadmap below, the Winning numbers are displayed in the patterns of Small (S), Big (B), and Triple (T) results. Each cell represents the result of a past round. The result of the earliest round is recorded in the upper left corner. Read the column downwards all the way to the bottom; then start at the top of the adjacent column to the right, and so forth.</li>
                                                    <li>This representation may be of help to you in predicting the results of future rounds.</li>
                                                    <li>Below the roadmap, you can see the statistics of Small, Big, and Triple bets for the last 50 rounds.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Payouts : </h6>
                                                <ul>
                                                    <li>Your payout depends on the type of bet placed. The payout range depends on whether the bet you have placed on the bet spot of your choice has a multiplier applied to it. If there is no multiplier, then the regular payout is applied. Your bet is returned on top of your winnings.</li>
                                                </ul>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Bet</th>
                                                            <th>Payout</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Small/Big</td>
                                                            <td>1:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Even/Odd</td>
                                                            <td>1:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Double</td>
                                                            <td>8:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Triple</td>
                                                            <td>150:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Any Triple</td>
                                                            <td>30:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 4 or 17</td>
                                                            <td>50:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 5 or 16</td>
                                                            <td>20:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 6 or 15</td>
                                                            <td>15:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 7 or 14</td>
                                                            <td>12:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 8 or 13</td>
                                                            <td>8:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 9 or 12</td>
                                                            <td>6:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total 10 or 11</td>
                                                            <td>6:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Combination</td>
                                                            <td>5:1</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="d-flex justify-content-between">
                                                                    <div>
                                                                        <ul class="list-style">
                                                                            <li>Single</li>
                                                                            <li>Double</li>
                                                                            <li>Triple</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <div>1:1</div>
                                                                        <div>2:1</div>
                                                                        <div>3:1</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p>Malfunction voids all pays and play.</p>
                                            </div></div>`;
        } else if(gametype == "teen42"){
            ruletitle = "Jack Top Open Teenpatti Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Jack top teenpatti is a unique version of Indian origin game teenpatti (Flush).</li>
                                                    <li>This game is played with a regular 52 cards deck between player A and player B.</li>
                                                    <li>In Jack top open teenpatti all three cards of player A will be pre-defined for all the
                                                        games. These three cards will be permanently placed on the table.
                                                        <h6>3 pre-defined cards of player A</h6>
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li>Jack of clubs</li>
                                                            <li>10 of Spades</li>
                                                            <li>8 of Spades</li>
                                                        </ul>
                                                    </li>
                                                    <li>So now the game will begin with the remaining 49 cards (52-3 pre-defined cards =
                                                        49).
                                                    </li>
                                                    <li>Jack top open teenpatti is a three-card game. Three cards will be dealt to player B
                                                        simultaneously (at the same time) which will decide the result of the game Hence
                                                        that particular game will be over.
                                                    </li>
                                                    <li>Now always the last three drawn cards of player B will be removed and kept aside
                                                        thereafter a new game will commence from the remaining 46 cards then the same
                                                        process will continue till both players have winning chances or otherwise up to 36
                                                        cards or so.
                                                    </li>
                                                    <li>The objective of the game is to make the best three card hands as per the hand
                                                        rankings and therefor win.
                                                        <h6>Ranking of card hands from Highest to Lowest</h6>
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li>Straight Flush (Pure Sequence)</li>
                                                            <li>Trail (Three of a kind)</li>
                                                            <li>Straight (Sequence)</li>
                                                            <li>Flush (Color)</li>
                                                            <li>Pair (Two of a kind)</li>
                                                            <li>High card</li>
                                                            <li>You have betting options of Back and Lay.</li>
                                                            <li>Side bet market will be considered valid though the game ends in Tie (No Result).</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <div>
                                                    <h6 class="rules-highlight">Side bet:</h6>
                                                </div>
                                                <p><b>Under 21- Over 21:</b> It is a total point value of all three cards of Player B.</p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Here you can bet whether the total point value of all the 3 cards of player B will be
                                                        under 21 or over 21.
                                                    </li>
                                                    <li><b>Point Values:</b></li>
                                                </ul>
                                                <div>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>A = 1</td>
                                                                <td>2 = 2</td>
                                                                <td>3 = 3</td>
                                                                <td>4 = 4</td>
                                                                <td>5 = 5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6 = 6</td>
                                                                <td>7 = 7</td>
                                                                <td>8 = 8</td>
                                                                <td>9 = 9</td>
                                                                <td>10 = 10</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">J = 11</td>
                                                                <td colspan="2">Q = 12</td>
                                                                <td>K = 13</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div></div>`;
        } else if(gametype == "teen41"){
            ruletitle = "Queen Top Open Teenpatti Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Queen top teenpatti is a unique version of Indian origin game teenpatti (Flush).</li>
                                                    <li>This game is played with a regular 52 cards deck between player A and player B.</li>
                                                    <li>In Queen top open teenpatti all three cards of player A will be pre-defined for all the
                                                        games. These three cards will be permanently placed on the table.
                                                        <h6>3 pre-defined cards of player A</h6>
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li>Queen of Spade</li>
                                                            <li>Jack of Hearts</li>
                                                            <li>9 of Diamonds</li>
                                                        </ul>
                                                    </li>
                                                    <li>So now the game will begin with the remaining 49 cards (52-3 pre-defined cards =
                                                        49).
                                                    </li>
                                                    <li>Queen top open teenpatti is a three-card game. Three cards will be dealt to player B
                                                        simultaneously (at the same time) which will decide the result of the game Hence
                                                        that particular game will be over.
                                                    </li>
                                                    <li>Now always the last three drawn cards of player B will be removed and kept aside
                                                        thereafter a new game will commence from the remaining 46 cards then the same
                                                        process will continue till both players have winning chances or otherwise up to 36
                                                        cards or so.
                                                    </li>
                                                    <li>The objective of the game is to make the best three card hands as per the hand
                                                        rankings and therefor win.
                                                        <h6>Ranking of card hands from Highest to Lowest</h6>
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li>Straight Flush (Pure Sequence)</li>
                                                            <li>Trail (Three of a kind)</li>
                                                            <li>Straight (Sequence)</li>
                                                            <li>Flush (Color)</li>
                                                            <li>Pair (Two of a kind)</li>
                                                            <li>High card</li>
                                                            <li>You have betting options of Back and Lay.</li>
                                                            <li>Side bet market will be considered valid though the game ends in Tie (No Result).</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div><div class="rules-section">
                                                <div>
                                                    <h6 class="rules-highlight">Side bet:</h6>
                                                </div>
                                                <p><b>Under 21- Over 21:</b> It is a total point value of all three cards of Player B.</p>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Here you can bet whether the total point value of all the 3 cards of player B will be
                                                        under 21 or over 21.
                                                    </li>
                                                    <li><b>Point Values:</b></li>
                                                </ul>
                                                <div>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>A = 1</td>
                                                                <td>2 = 2</td>
                                                                <td>3 = 3</td>
                                                                <td>4 = 4</td>
                                                                <td>5 = 5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6 = 6</td>
                                                                <td>7 = 7</td>
                                                                <td>8 = 8</td>
                                                                <td>9 = 9</td>
                                                                <td>10 = 10</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">J = 11</td>
                                                                <td colspan="2">Q = 12</td>
                                                                <td>K = 13</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div></div>`;
        } else if(gametype == "superover2"){
            ruletitle = "Super Over 2 Rules";
            image_url = `<div class="rules-section">
                                                            <ul>
                                                                <li>1.Two wickets are allowed for each batting team in the Super over. If the batting team loses both wickets, then their innings ends.
                                                                </li>
                                                                <li>2.If scores of the team are same, then the match will be considered as Tie (No Result), Difference of wickets between the team doesn't count.
                                                                </li>
                                                                <li>3.Session and fancy markets will be considered valid, though the match ends in Tie
                                                                </li>
                                                                <li>4.Team scoring maximum run in the allocated super over will be considered as winner
                                                                </li>
                                                                <li>5.Odds will be available for every ball</li>
                                                                <li>6. Results are Based on Stream Only. Streams Played By RNG.</li>
                                                            </ul>
                                                        </div>`;
        } else if(gametype == "lucky15"){
            ruletitle = "Lucky 15 Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Lucky 15 is an exciting and fun game with higher odds to win more on each ball. It consists of 15 balls (15 videos) in which 3 zero runs, 3 one runs, 3 two runs, 2 fours, 2 sixes, and 2 wickets in each round.</li>
                                                    <li>A randomly picked video will be played one by one out of 15 videos and users will have a chance to place a bet on every ball played.</li>
                                                    <li>Round will end when there is only one ball left or all balls of the same run left.</li>
                                                    <li>To make this game more exciting, remaining balls will be displayed to users to predict the outcome of the next ball and place a bet.</li>
                                                    <li>Good Luck and win more !!!</li>
                                                </ul>
                                            </div>`;
        } else if(gametype == "ab204") {
            ruletitle = "Andar Bahar 150 Cards Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>*Andar Bahar is an Indian origin game.</li>
                                                    <li>*The game is played with 3 decks, totaling 156 cards (52 * 3 = 156)</li>
                                                    <li>*This game is played between two sides: Andar and Bahar.</li>
                                                    <li>*At the start of the game, the first card will be drawn on the Bahar side, but odds will be available for the Andar side.</li>
                                                    <li>*When the card is drawn on the Andar side, odds will be available for the Bahar side, and so on.</li>
                                                    <li>*The odds will be available on every card to place your bets up to the 144th card. After opening the 149th card, all remaining bets for the Andar side will be canceled(pushed) automatically.</li>
                                                    <li>*The game will be considered over after the 150th card is drawn. The pending Bahar side bets will be canceled (pushed).</li>
                                                    <li>*When you place a bet on the Andar side and the next card opens on the Bahar side with the same value, a 20% refund on the bet amount will be given to the client (valid for both Andar and Bahar sides).</li>
                                                    <li>Example: If you place a bet of 100 points on the number 8 on the Andar side and the next card with the number 8 opens on the Bahar side, your bet loss will be only 80 points.</li>
                                                    <li>*If the first card is not opened after the betted card, a winning payout of 100% of the bet amount will be given.</li>
                                                </ul>
                                            </div>`;
        } else if(gametype == "goal") {
            ruletitle = "Goal Rules";
            image_url = `<div>
                                            <div class="rules-section">
                                                <h6 class="rules-highlight">1. Objective</h6>
                                                <p>The goal of this game is to predict which player or method will result in the next goal, providing players with exciting opportunities to win big.</p>
                                            </div>
                                            <br></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">2. Betting Options</h6>
                                                <ul class="pl-2 pr-2 ">
                                                    <li>
                                                        <h7 class="rules-sub-highlight">1.Who Will Goal Next?</h7>
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li><b>Description:</b> Predict which player (from the available player selection) will score the next goal.</li>
                                                            <li><b>Winning Criteria:</b> If the selected player scores the next goal, the bet is won.</li>
                                                            <li><b>No Goal Condition:</b> If no goal is scored by any player (i.e., the shot is missed or saved), the bet is considered a No Goal.</li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <h7 class="rules-sub-highlight">2. Method of the Next Goal</h7>
                                                        <ul class="pl-4 pr-4 list-style">
                                                            <li><b>Description:</b> Predict the method by which the next goal will be scored. The following options are available:
                                                                <ul class="pl-4 pr-4 list-style">
                                                                    <li><b>Header Goal:</b> The goal scorer must use their head to score. The last touch on the ball before entering the net must be from the head.</li>
                                                                    <li><b>Free-kick Goal:</b> The goal must be scored directly from a free-kick, meaning no additional touches are allowed before the ball crosses the goal line.</li>
                                                                    <li><b>Penalty Goal:</b> The goal must be scored from a penalty, and the penalty taker must be the one who scores.</li>
                                                                    <li><b>Shot Goal:</b> This includes all other types of goals that are not covered by the above categories, including shots from open play, volleys, or any other direct goals.</li>
                                                                </ul>
                                                            </li>
                                                            
                                                            <li><b>Winning Criteria:</b> If the goal is scored by the method selected, the bet is won.</li>
                                                            <li><b>No Goal Condition:</b> If the goal attempt fails or is blocked, the bet is considered a No Goal.</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                                <br></div>
                                                <div><div class="rules-section">
                                                <h6 class="rules-highlight">3. General Rules</h6>
                                                <p><b>No Goal Condition:</b> In all instances, if no goal is scored (due to a miss, save, or other reasons), the bet will be marked as a No Goal.</p>
                                                <p><b>Goal Misses or Saved Shots:</b> If a player misses or the shot is saved, bets placed on that player or method will be settled as No Goal.</p>
                                                <p><b>Broadcast Delays:</b> Please note that the video feeds used to confirm goal outcomes may come from different broadcasters, which can result in a delay in updating the scoreboard. However, the final result will be determined by our official rules and the video evidence available at the time.</p>
                                            </div>
                                            <br></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">4. Disclaimers</h6>
                                                <p><b>Official Decision:</b> In case of any disputes regarding the goal, the casino’s decision based on video reviews will be final.</p>
                                                <p><b>Video Evidence:</b> The casino reserves the right to use available video footage to confirm whether a goal was scored by the chosen player or method. If the footage is inconclusive, the bet may be voided and refunded.</p>
                                            </div>
                                            <br></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">5. Terms of Participation</h6>
                                                <p>All players must be aware of the potential delay in goal announcements due to broadcast lag.</p>
                                                <p>Players accept that the casino's decision is final in the event of any discrepancies.</p>
                                                <br>
                                                <p class="text-center"><b>"Best of luck! Enjoy the excitement of the casino and win BIG!"</b></p>
                                            </div></div>`;
        } else if(gametype == "superover3"){
            ruletitle = "Mini Superover Rules";
            image_url = `<div class="rules-section">
                                                            <ul class="pl-2 pr-2">
                                                                <li>Mini Super Over is a shorter version of super over cricket.</li>
                                                                <li>This game is played between two teams. Team batting first is India and
                                                                    team batting second is Australia.
                                                                </li>
                                                                <li>Mini Super over is a four Ball each side match.</li>
                                                                <li>This game is played with 21 card deck.
                                                                    <ul class="pl-2 pr-2">
    <li>A = (One run) X 3 cards</li>
                                                                        <li>2 = (Two runs) X 3 cards</li>
                                                                        <li>3 = (Three runs) X 3 cards</li>
                                                                        <li>4 = (Four runs) X 3 cards</li>
                                                                        <li>6 = (Six runs) X 3 cards</li>
                                                                        <li>10 = (0 run) X 3 cards</li>
                                                                        <li>K = (wicket) X 3 cards</li>
                                                                        <li>21 cards total</li>
                                                                    </ul>
                                                                </li>
                                                                <li>If wicket falls at any stage of the innings the team batting will be
                                                                    considered as all out.
                                                                </li>
                                                                <li>If scores of both the teams are equal then the match will be
                                                                    considered as Tie.
                                                                </li>
                                                                <li>Difference of wicket between teams does not count.</li>
                                                                <li>Session and Fancy markets will be considered valid though the
                                                                    match ends in Tie.
                                                                </li>
                                                                <li>Team Scoring maximum runs will be the winner.</li>
                                                                <li>At the end of each inning deck will be shuffled.</li>
                                                                <li>Odds will be available for every ball.</li>
                                                                <li>Term boundary in fancy market defines four &amp; six both or scoring four
                                                                    runs or six runs both will be considered as boundary.
                                                                </li>
                                                            </ul>
                                                        </div>`;
        } else if(gametype == "ourroullete") {
            ruletitle = "Unqiue Roullete Rules";
            image_url = `<div class="rules-section">
                                                <p>Unique Roulette is a unique game compared to other traditional Roulette. This game is played with numbered cards from 0 to 36. Dealer will draw a card one by one until only one card is left in the deck. Only available numbers in the deck are open for bet in every round and odds are dynamics based on numbers left in the deck.</p>
                                                <p>Bets made on the numbered spaces on the betting area, or on the lines between them, are called Inside Bets, while bets made on the special boxes below and to the side of the main grid of numbers are called Outside Bets.</p>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">INSIDE BETS:</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li><b>Straight Up</b> — place your chip directly on any single number (including zero).</li>
                                                    <li><b>Split Bet</b> — place your chip on the line between any two numbers, either on the vertical or horizontal.</li>
                                                    <li><b>Street Bet</b> — place your chip at the end of any row of numbers. A Street Bet covers remaining numbers on that Street.</li>
                                                    <li><b>Corner Bet</b> — place your chip at the corner (central intersection) where four numbers meet. All remaining numbers on that corner are covered.</li>
                                                    <li><b>Line Bet</b> — place your chip at the end of two rows on the intersection between the two rows. A line bet covers all the remaining numbers in both rows.</li>
                                                </ul>
                                                <br>
                                                <br>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">OUTSIDE BETS:</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li><b>Column Bet</b> — place your chip in one of the boxes marked "2 to 1" at the end of the column that covers all remaining numbers in that column. The zero is not covered by any column bet.</li>
                                                    <li><b>Dozen Bet</b> — place your chip in one of the three boxes marked "1st 12," "2nd 12" or "3rd 12" to cover the remaining numbers alongside the box.</li>
                                                    <li><b>Red/Black</b> — place your chip in the Red or Black box to cover the all remaining red or all remaining black numbers. The zero is not covered by these bets.</li>
                                                    <li><b>Even/Odd</b> — place your chip in one of these boxes to cover the remaining even or remaining odd numbers. The zero is not covered by these bets.</li>
                                                    <li><b>1-18/19-36</b> — place your chip in either of these boxes to cover the first or second set of remaining numbers. The zero is not covered by these bets.</li>
                                                </ul>
                                                <br>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <p>Each bet covers a different set of numbers and offers different payout odds. Bet spots will be highlighted.</p>
                                                <p>Good Luck!!!</p>
                                            </div></div>`;
        } else if(gametype == "btable2") {
            ruletitle = "Bollywood Casino 2 Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>The bollywood table game will be played with a total of 16 cards including (J,Q, K, A) these cards and 2 deck that means game is playing with total 16*2 = 32 cards</li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character black-card ml-1">A}</span>
                                                            <span>Don Wins</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">A{</span>
                                                            <span class="card-character red-card ml-1">A[</span>
                                                            <span class="card-character black-card ml-1">A]</span>
                                                            <span>Amar Akbar Anthony Wins</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character black-card ml-1">K}</span>
                                                            <span class="card-character black-card ml-1">Q}</span>
                                                            <span class="card-character black-card ml-1">J}</span>
                                                            <span>Sahib Bibi aur Ghulam Wins.</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">K[</span>
                                                            <span class="card-character black-card ml-1">K]</span>
                                                            <span>Dharam Veer Wins.</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">K{</span>
                                                            <span class="card-character black-card ml-1">Q]</span>
                                                            <span class="card-character red-card ml-1">Q[</span>
                                                            <span class="card-character red-card ml-1">Q{</span>
                                                            <span>Kis Kisko Pyaar Karoon Wins.</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cards-box">
                                                            <span>If the card is</span>
                                                            <span class="card-character red-card ml-1">J{</span>
                                                            <span class="card-character black-card ml-1">J]</span>
                                                            <span class="card-character red-card ml-1">J[</span>
                                                            <span>Ghulam Wins.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>
                                                        <b>ODD:</b>
                                                        <span>J K A</span>
                                                    </li>
                                                    <li>
                                                        <b>DULHA DULHAN:</b>
                                                        <span>Q K</span>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <b>BARATI:</b>
                                                        <span>A J</span>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <b>RED:</b>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <b>BLACK:</b>
                                                        <span>Payout: 1.97</span>
                                                    </li>
                                                    <li>
                                                        <span>J,Q,K,A</span>
                                                        <div>PAYOUT: 3.75</div>
                                                    </li>
                                                    <li>A = DON</li>
                                                    <li>B = AMAR AKBAR ANTHONY</li>
                                                    <li>C = SAHIB BIBI AUR GHULAM</li>
                                                    <li>D = DHARAM VEER</li>
                                                    <li>E = KIS KISKO PYAAR KAROON</li>
                                                    <li>F = GHULAM</li>
                                                    
                                                </ul>
                                            </div>`;
        } else if(gametype == "teen20c") {
            ruletitle = "20-20 Teenpatti C Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>The game is played with a regular 52 cards single deck, between 2 players A and B.</li>
                                                    <li>Each player will receive 3 cards.</li>
                                                    <li><b>Rules of regular teenpatti winner</b></li>
                                                </ul>
                                                <div>
                                                    <img src="storage/front/img/rules/teen20b.jpg">
                                                </div>
                                            </div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of 3 baccarat</h6>
                                                <p>There are 3 criteria for winning the 3 Baccarat .</p>
                                                <h7 class="rules-sub-highlight">First criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having trio will win,</li>
                                                    <li>If both game has trio then higher trio will win.</li>
                                                    <li>Ranking of trio from high to low.
                                                        <div class="pl-2 pr-2">1,1,1</div>
                                                        <div class="pl-2 pr-2">K,K,K</div>
                                                        <div class="pl-2 pr-2">Q,Q,Q</div>
                                                        <div class="pl-2 pr-2">J,J,J</div>
                                                        <div class="pl-2 pr-2">10,10,10</div>
                                                        <div class="pl-2 pr-2">9,9,9</div>
                                                        <div class="pl-2 pr-2">8,8,8</div>
                                                        <div class="pl-2 pr-2">7,7,7</div>
                                                        <div class="pl-2 pr-2">6,6,6</div>
                                                        <div class="pl-2 pr-2">5,5,5</div>
                                                        <div class="pl-2 pr-2">4,4,4</div>
                                                        <div class="pl-2 pr-2">3,3,3</div>
                                                        <div class="pl-2 pr-2">2,2,2</div>
                                                    </li>
                                                    <li>If none of the game have got trio then second criteria will apply.</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">Second criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having all the three face card will win.</li>
                                                    <li>Here JACK, QUEEN AND KING are named face card.</li>
                                                    <li>if both the game have all three face cards then game having highest face card will win.</li>
                                                    <li>Ranking of face card from High to low :
                                                        <div class="pl-2 pr-2">Spade King</div>
                                                        <div class="pl-2 pr-2">Heart King</div>
                                                        <div class="pl-2 pr-2">Club King</div>
                                                        <div class="pl-2 pr-2">Diamond King</div>
                                                    </li>
                                                    <li>Same order will apply for Queen (Q) and Jack (J) also .</li>
                                                    <li>If second criteria is also not applicable, then 3rd criteria will apply .</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">3rd criteria:</h7>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having higher baccarat value will win .</li>
                                                    <li>For deciding baccarat value we will add point value of all the three cards</li>
                                                    <li>Point value of all the cards :
                                                        <div class="pl-2 pr-2">1 = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">To</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10, J ,Q, K has zero (0) point value .</div>
                                                    </li>
                                                </ul>
                                                <p><b>Example 1st:</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Last digit of total will be considered as baccarat value
                                                        <div class="pl-2 pr-2">2,5,8 =</div>
                                                        <div class="pl-2 pr-2">2+5+8 =15 here last digit of total is 5 , So baccarat value is 5.</div>
                                                    </li>
                                                </ul>
                                                <p><b>Example 2nd :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>1,3,K</li>
                                                    <li>1+3+0 = 4 here total is in single digit so we will take this single digit 4 as baccarat value</li>
                                                </ul>
                                                <p><b>If baccarat value of both the game is equal then Following condition will apply :</b></p>
                                                <p><b>Condition 1 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>Game having more face card will win.</li>
                                                    <li>Example : Game A has 3,4,k and B has 7,J,Q then game B will win as it has more face card then game A .</li>
                                                </ul>
                                                <p><b>Condition 2 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If Number of face card of both the game are equal then higher value face card game will win.</li>
                                                    <li>Example : Game A has 4,5,K (K Spade ) and Game B has 9,10,K ( K Heart ) here baccarat value of both the game is equal (9 ) and both the game have same number of face card so game A will win because It has got higher value face card then Game B .</li>
                                                </ul>
                                                <p><b>Condition 3 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If baccarat value of both the game is equal and none of game has got face card then in this case Game having highest value point card will win .</li>
                                                    <li>Value of Point Cards :
                                                        <div class="pl-2 pr-2">Ace = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">3 = 3</div>
                                                        <div class="pl-2 pr-2">4 = 4</div>
                                                        <div class="pl-2 pr-2">5 = 5</div>
                                                        <div class="pl-2 pr-2">6 = 6</div>
                                                        <div class="pl-2 pr-2">7 = 7</div>
                                                        <div class="pl-2 pr-2">8 = 8</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10 = 0 (Zero )</div>
                                                    </li>
                                                    <li>Example : GameA: 1,6,10 And GameB: 7,10,10</li>
                                                    <li>here both the game have same baccarat value . But game B will win as it has higher value point card i.e. 7 .</li>
                                                </ul>
                                                <p><b>Condition 4 :</b></p>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>If baccarat value of both game is equal and none of game has got face card and high point card of both the game is of equal point value , then suits of both high card will be compared</li>
                                                    <li>Example :
                                                        <div class="pl-2 pr-2">
                                                            Game A : 1(Heart) ,2(Heart) ,5(Heart)
                                                        </div>
                                                        <div class="pl-2 pr-2">
                                                            Game B : 10 (Heart) , 3 (Diamond ) , 5 (Spade )
                                                        </div>
                                                    </li>
                                                    <li>Here Baccarat value of both the game (8) is equal . and none of game has got face card and point value of both game's high card is equal so by comparing suits of both the high card ( A 5 of Heart , B 5 of spade ) game B is declared 3 Baccarat winner .</li>
                                                    <li>Ranking of suits from High to low :
                                                        <div class="pl-2 pr-2">Spade</div>
                                                        <div class="pl-2 pr-2">Heart</div>
                                                        <div class="pl-2 pr-2">Club</div>
                                                        <div class="pl-2 pr-2">Diamond</div>
                                                    </li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Total :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>It is a comparison of total of all three cards of both the games.</li>
                                                    <li>Point value of all the cards for the bet of total
                                                        <div class="pl-2 pr-2">Ace = 1</div>
                                                        <div class="pl-2 pr-2">2 = 2</div>
                                                        <div class="pl-2 pr-2">3 = 3</div>
                                                        <div class="pl-2 pr-2">4 = 4</div>
                                                        <div class="pl-2 pr-2">5 = 5</div>
                                                        <div class="pl-2 pr-2">6 = 6</div>
                                                        <div class="pl-2 pr-2">7 = 7</div>
                                                        <div class="pl-2 pr-2">8 = 8</div>
                                                        <div class="pl-2 pr-2">9 = 9</div>
                                                        <div class="pl-2 pr-2">10 = 10</div>
                                                        <div class="pl-2 pr-2">Jack = 11</div>
                                                        <div class="pl-2 pr-2">Queen = 12</div>
                                                        <div class="pl-2 pr-2">King = 13</div>
                                                    </li>
                                                    <li>suits doesn't matter</li>
                                                    <li>If total of both the game is equal , it is a Tie .</li>
                                                    <li>If total of both the game is equal then half of your bet amount will returned.</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Pair Plus :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>This bet provides multiple option to win a price .</li>
                                                    <li>Option 1 : Pair</li>
                                                    <li>If you got pair you will get equal value return of your betting amount .</li>
                                                    <li>Option 2 : Flush</li>
                                                    <li>If you have all three cards of same suits you will get 4 times return of your betting amount .</li>
                                                    <li>Option 3 : Straight</li>
                                                    <li>If you have straight ( three cards in sequence eg : 4,5,6 eg: J,Q,K ) (but king ,Ace ,2 is not a straight ) you will get six times return of your betting amount .</li>
                                                    <li>Option 4 : Trio</li>
                                                    <li>If you have got all the cards of same rank ( eg: 4,4,4 J,J,J ) you will get 30 times return of your betting amount .</li>
                                                    <li>Option 5 : Straight Flush</li>
                                                    <li>If you have straight of all three cards of same suits ( Three cards in sequence eg: 4,5,6 ) ( but King ,Ace ,2 is not straight ) you will get 40 times return of your betting amount .</li>
                                                    <li>Note : If you have trio then you will receive price of trio only , In this case you will not receive price of pair .</li>
                                                    <li>If you have straight flush you will receive price of straight flush only , In this case you will not receive price of straigh and flush .</li>
                                                    <li>It means you will receive only one price whichever is higher .</li>
                                                </ul>
                                            </div></div>
                                            <div><div class="rules-section">
                                                <h6 class="rules-highlight">Rules of Color :</h6>
                                                <ul class="pl-2 pr-2 list-style">
                                                    <li>This is a bet for having more cards of red or Black (Heart and Diamond are named RED , Spade and Club are named BLACK ).</li>
                                                </ul>
                                            </div></div>`;
        } else if(gametype == "thetrap") {
            ruletitle = "The Trap Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li> Trap is a 52 card deck game.</li>
                                                    <li>Keeping Ace= 1 point, 2= 2 points, 3= 3 points, 4= 4 points, 5= 5 points, 6= 6 points, 7=7 points, 8= 8 Points, 9= 9 points, 10= 10 points, Jack= 11 points, Queen= 12 points and King= 13 points.</li>
                                                    <li>Here there are two sides in TRAP. A and B respectively.
                                                    </li>
                                                    <li>First card that will open in the game would be from side ‘A’, next card will open in the game from Side ‘B’. Likewise till the end of the game.</li>
                                                    <li>Any side that crosses a total score of 15 would be the winner of the game. For Example: the total score should be 16 or above.
                                                    </li>
                                                    <li>But if at any stage your score is at 13, 14, 15 then you will get into the trap which ideally means you lose.</li>
                                                    <li>Hence there are only two conditions from which you can decide the winner here either your opponent has to be trapped in the score of 13, 14, 15 or your total score should be above 15.</li>
                                                </ul>
                                            </div>`;
        } else if(gametype == "lottcard") {
            ruletitle = "Lottery Rules";
            image_url = `<div class="nav nav-pills" role="tablist"><div class="nav-item"><a role="tab" data-rr-ui-event-key="rules" id="lott-rules-tabs-tab-rules" aria-controls="lott-rules-tabs-tabpane-rules" aria-selected="true" class="nav-link active" tabindex="0" href="#">Rules</a></div><div class="nav-item"><a role="tab" data-rr-ui-event-key="payout" id="lott-rules-tabs-tab-payout" aria-controls="lott-rules-tabs-tabpane-payout" aria-selected="false" tabindex="-1" class="nav-link" href="#">Payout</a></div></div><div class="mt-1 tab-content">
                                <div role="tabpanel" id="lott-rules-tabs-tabpane-rules" aria-labelledby="lott-rules-tabs-tab-rules" class="fade tab-pane active show">
                                    <div class="lottery-rules-box">
                                        <div class="lottery-rules-row">
                                            <div class="lottery-rules-title-name">
                                            <div>Single</div>
                                            <div>Singles play can be placed between 0-9</div>
                                            </div>
                                            <div class="lottery-rules-cards">
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/A.png">
                                                <div>1</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/2.png">
                                                <div>2</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/3.png">
                                                <div>3</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/4.png">
                                                <div>4</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/5.png">
                                                <div>5</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/6.png">
                                                <div>6</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/7.png">
                                                <div>7</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/8.png">
                                                <div>8</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/9.png">
                                                <div>9</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/10.png">
                                                <div>0</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="lottery-rules-row">
                                            <div class="lottery-rules-title-name">
                                            <div>Double</div>
                                            <div>Singles play can be placed between 00-99</div>
                                            </div>
                                            <div class="lottery-rules-cards">
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/A.png">
                                                <div>1</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/2.png">
                                                <div>2</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/3.png">
                                                <div>3</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/4.png">
                                                <div>4</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/5.png">
                                                <div>5</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/6.png">
                                                <div>6</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/7.png">
                                                <div>7</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/8.png">
                                                <div>8</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/9.png">
                                                <div>9</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/10.png">
                                                <div>0</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="lottery-rules-row">
                                            <div class="lottery-rules-title-name">
                                            <div>Tripple</div>
                                            <div>Singles play can be placed between 000-999</div>
                                            </div>
                                            <div class="lottery-rules-cards">
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/A.png">
                                                <div>1</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/2.png">
                                                <div>2</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/3.png">
                                                <div>3</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/4.png">
                                                <div>4</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/5.png">
                                                <div>5</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/6.png">
                                                <div>6</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/7.png">
                                                <div>7</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/8.png">
                                                <div>8</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/9.png">
                                                <div>9</div>
                                            </div>
                                            <div class="lottery-card">
                                                <img src="storage/front/img/cards/10.png">
                                                <div>0</div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" id="lott-rules-tabs-tabpane-payout" aria-labelledby="lott-rules-tabs-tab-payout" class="fade tab-pane">
                                    <div class="table-responsive">
                                        <h4>Game Play Payout</h4>
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th>Point</th>
                                                <th>Card</th>
                                                <th>Payout</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Play Single</td>
                                                <td>First Card</td>
                                                <td>1 to 9.5</td>
                                            </tr>
                                            <tr>
                                                <td>Play Double</td>
                                                <td>First Second Card</td>
                                                <td>1 to 95</td>
                                            </tr>
                                            <tr>
                                                <td>Play Tripple</td>
                                                <td>First Second Third Card</td>
                                                <td>1 to 900</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <h4>Play Limit</h4>
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th>Play</th>
                                                <th>Minimum Play</th>
                                                <th>Maximum Play</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Singles Play</td>
                                                <td>10</td>
                                                <td>20K</td>
                                            </tr>
                                            <tr>
                                                <td>Doubles Play</td>
                                                <td>10</td>
                                                <td>5K</td>
                                            </tr>
                                            <tr>
                                                <td>Tripples Play</td>
                                                <td>10</td>
                                                <td>3K</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>`
        } else if(gametype == "teen6"){
            ruletitle = "Teenpatti 2.0 Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Teenpatti is an indian origin three cards game</li>
                                                    <li>This game is played with a regular 52 cards deck between Player A and Player B .</li>
                                                    <li>The objective of the game is to make the best three cards hand as per the hand rankings and win.</li>
                                                    <li>You have a betting option of Back and Lay for the main bet.</li>
                                                    <li>Rankings of the card hands from highest to lowest :</li>
                                                    <li>1. Straight Flush (pure Sequence )</li>
                                                    <li>2. Trail  (Three of a Kind )</li>
                                                    <li>3. Straight (Sequence)</li>
                                                    <li>4. Flush (Color )</li>
                                                    <li>5. Pair (Two of a kind )</li>
                                                    <li>6. High Card </li>
                                                </ul>
                                                <div>
                                                    <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                </div>
                                            </div>
                                            <div><div class="rules-section">
                                                <div>
                                                    <h6 class="rules-highlight">Side bets  :</h6>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li><b>Under 21 - Over 22 :</b> It is a total point value of all the three cards.</li>
                                                    <li>here you can bet whether the total point value of all the 3 cards will be    Under 21 or Over 22.</li>
                                                    <li><b>Point Values :</b>
                                                        <div>A= 1</div>
                                                        <div>2= 2</div>
                                                        <div>3= 3</div>
                                                        <div>4= 4</div>
                                                        <div>5= 5</div>
                                                        <div>6= 6</div>
                                                        <div>7= 7</div>
                                                        <div>8= 8</div>
                                                        <div>9= 9</div>
                                                        <div>10= 10</div>
                                                        <div>J= 11</div>
                                                        <div>Q= 12</div>
                                                        <div>K= 13</div>
                                                    </li>
                                                    <li>you can bet on either or both the players .</li>
                                                    <li><b>Suits:</b>
                                                        <div>Here you can bet on every card whether it will be a Spade ,Heart,Club or a Diamond card .</div>
                                                    </li>
                                                    <li><b>Odd - Even :</b>
                                                        <div>Here you can bet on every card whether it will be an Odd card or an Even card.</div>
                                                    </li>
                                                    <li><b>Odd Cards :</b> A,3,5,7,9,J,K</li>
                                                    <li><b>Even Cards :</b> 2,4,6,8,10,Q</li>
                                                    <li><b>Fix Cards :</b>
                                                        <div>Here you can place bets on fix cards of your choice from Ace (A) to King (K). </div>
                                                        <div>This bet is availabe for every card.  </div>
                                                    </li>
                                                </ul>
    
                                            </div></div>`;
        } else if(gametype == "race20"){
            ruletitle = "Race 20 Rules";
            image_url = `<div class="rules-section">
                                                <div>
                                                    <img src="storage/front/img/rules/race20.jpg" class="img-fluid">
                                                </div>
                                            </div>`;
        } else if(gametype == "teenjoker") {
            ruletitle = "Teenpatti Joker Rules";
            image_url = `<div class="rules-section">
                                                    <p>Welcome to JOKER TEENPATTI, a new version of Indian Teenpatti game.</p>
                                                    <p>Teenpatti is a very simple game and one of the most played games on our platform. To keep the game as simple as it is and make it more exciting , we have introduced a Joker to the game. The game follows the same standard rules of Teenpatti but The Joker can act as any missing or highest card to make a high hand to defeat the opponent player. You can also do side bets on Joker before the round starts.</p>
                                                    <p>For Example:</p>
                                                    <img src="storage/front/img/rules/joker1.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest card.</p>
                                                    <img src="storage/front/img/rules/joker2.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest color card.</p>
                                                    <h4>Standard Rules.</h4>
                                                    <div>
                                                        <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                    </div>
                                                </div>`;
        }else if(gametype == "joker1") {
            ruletitle = "Unlimited Joker Oneday Rules";
            image_url = `<div class="rules-section">
                                                    <p>Welcome to Unlimited Joker Teenpatti, a new version of Joker Teenpatti.</p>
                                                    <p>Teenpatti games are the most popular on our platforms and we are very excited to announce this new version of Teenpatti called Unlimited Joker Teenpatti. To keep the game as simple as it is and make it more exciting , we have introduced a Joker to the game. The game follows the same standard rules of Teenpatti but at the beginning of the round players can select their own Joker that can act as any missing or highest card to make a high hand to defeat the opponent player OR play regular Teenpatti without selecting any Joker.</p>
                                                    <p>For Example:</p>
                                                    <img src="storage/front/img/rules/joker1.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest card.</p>
                                                    <img src="storage/front/img/rules/joker2.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest color card.</p>
                                                    <h4>Standard Rules.</h4>
                                                    <div>
                                                        <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                    </div>
                                                </div>`;
        }else if(gametype == "joker20") {
            ruletitle = "Teenpatti Joker 20-20 Rules";
            image_url = `<div class="rules-section">
                                                    <p>Welcome to JOKER TEENPATTI 20-20, a new version of Indian Teenpatti game.</p>
                                                    <p>Teenpatti is a very simple game and one of the most played games on our platform. To keep the game as simple as it is and make it more exciting , we have introduced a Joker to the game. The game follows the same standard rules of Teenpatti but The Joker can act as any missing or highest card to make a high hand to defeat the opponent player. You can also do side bets on Joker before the round starts.</p>
                                                    <p>For Example:</p>
                                                    <img src="storage/front/img/rules/joker1.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest card.</p>
                                                    <img src="storage/front/img/rules/joker2.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest color card.</p>
                                                    <h4>Standard Rules.</h4>
                                                    <div>
                                                        <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                    </div>
                                                </div>`;
        }else if(gametype == "joker120") {
            ruletitle = "Unlimited Joker 20-20";
            image_url = `<div class="rules-section">
                                                    <p>Welcome to Unlimited Joker Teenpatti 20-20, a new version of Joker Teenpatti 20-20.</p>
                                                    <p>Teenpatti games are the most popular on our platforms and we are very excited to announce this new version of Teenpatti called Unlimited Joker Teenpatti. To keep the game as simple as it is and make it more exciting , we have introduced a Joker to the game. The game follows the same standard rules of Teenpatti but at the beginning of the round players can select their own Joker that can act as any missing or highest card to make a high hand to defeat the opponent player OR play regular Teenpatti without selecting any Joker.</p>
                                                    <p>For Example:</p>
                                                    <img src="storage/front/img/rules/joker1.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest card.</p>
                                                    <img src="storage/front/img/rules/joker2.jpg" class="img-fluid">
                                                    <p>Player A wins because THE JOKER can act as the highest color card.</p>
                                                    <h4>Standard Rules.</h4>
                                                    <div>
                                                        <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                    </div>
                                                </div>`;
        }else if(gametype == "poison20") {
            ruletitle = "Teenpatti Poison 20-20";
            image_url = `<div class="rules-section">
                                                    <p>Welcome to <b>Teenpatti Poison 20-20</b>, a new variation of Teenpatti.</p>
                                                    <p>As Teenpatti games are becoming more and more famous and popular on our platforms, we are excited to introduce you to <b>Teenpatti Poison 20-20</b>. The game follows the same standard rules of Teenpatti but at the beginning of the round the dealer draws a <b>Poison</b> card before dealing to the players. <b>The Poison</b> card is toxic and makes the player lose as soon as any player gets it. If no <b>Poison</b> card is dealt then the game continues as per Teenpatti standard rules.</p>
                                                    <p>For Example:</p>
                                                    <img src="storage/front/img/rules/joker3.jpg" class="img-fluid">
                                                    <p>Player A wins because Player B is dealt with <b>THE POISON</b> card.</p>
                                                    <h4>Standard Rules.</h4>
                                                    <div>
                                                        <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                    </div>
                                                </div>`;
        }else if(gametype == "poison") {
            ruletitle = "Teenpatti Poison One Day";
            image_url = `<div class="rules-section">
                            <p>Welcome to <b>Teenpatti Poison ONE DAY</b>, a new variation of Teenpatti.
                            </p>
                            <p>As Teenpatti games are becoming more and more famous and popular on our platforms, we are excited to introduce you to <b>Teenpatti Poison ONE DAY</b>. The game follows the same standard rules of Teenpatti but at the beginning of the round the dealer draws a <b>Poison</b> card before dealing to the players. <b>The Poison</b> card is toxic and makes the player lose as soon as any player gets it. If no <b>Poison</b> card is dealt then the game continues as per Teenpatti standard rules.</p>
                            <p>For Example:</p>
                            <img src="/storage/front/img/cards_new/joker3.jpg" class="img-fluid">
                            <p>Player A wins because Player B is dealt with <b>THE POISON</b> card.</p>
                            <h4>Standard Rules.</h4>
                            <div>
                                <img src="/storage/front/img/cards_new/teen6.jpg" class="img-fluid">
                            </div>
                            </div>`;
        }else if(gametype == "teenunique") {
            ruletitle = "Unique Teenpatti Rules";
            image_url = `<div class="rules-section">
                            <p>Welcome to Unique Teenpatti, a new variation of Teenpatti.</p>
                            <p>We are excited to introduce you to a new variation of Teenpatti game <b>Unique Teenpatti.</b> The game follows the same standard rules of Teenpatti but at the beginning of the round the player has a chance to select their own three cards from six cards on the table. Once a player selects their three cards from six cards on the table, the other three cards belong to the opponent player. After card selection is done, the dealer will deal six cards on the table to decide the winner. Good Luck and wind BIG!!!.</p>
                            <h4>Standard Rules:</h4>
                            <div>
                                <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                            </div>
                            </div>`;
        }else if(gametype == "lucky5") {
            ruletitle = "Lucky 6 Rules";
            image_url = `<div class="rules-section">
                        <p>* Lucky 6 is a 8 deck playing cards game, total 8 * 44 = 352 cards.<br>
                            (Deck count A,1,2,3,4,5,6,7,8,9,10,j cards only)
                        </p>
                        <p>* If the card is from ACE to 5, LOW Wins.</p>
                        <p>* If the card is from 7 to Jack, HIGH Wins.</p>
                        <p>* If the card is 6, bets on high and low will lose 50% of the bet amount.</p>
                        <br>
                        <p>LOW: 1,2,3,4,5  |  HIGH:7,8,9,10,J<br>Payout : 2.0</p>
                        <br>
                        <p>EVEN : 2,4,6,8,10<br>Payout : 2.1</p>
                        <br>
                        <p>ODD : 1,3,5,7,9,J<br>Payout : 1.79</p>
                        <br>
                        <p>RED :<span class="d-inline-block cards-box"> <span class="card-character red-card ml-1">{</span> Heart, <span class="card-character red-card ml-1">[</span> Diamond</span><br>Payout :1.95</p>
                        <br>
                        <p>BLACK :  <span class="d-inline-block cards-box"><span class="card-character black-card ml-1">}</span>Spade, <span class="card-character black-card ml-1">]</span> Club</span><br>Payout :1.95</p>
                        <br>
                        <p>CARDS :1,2,3,4,5,6,7,8,9,10,J<br>
                            Payout&nbsp;:&nbsp;10.0
                        </p>
                        </div>`;
        }else if(gametype == "roulette12") {
            ruletitle = "Beach Roulette Rules";
            image_url = `<div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Game Rules:</h6>
                                <p>The objective in Roulette is to predict the number on which the ball will land by placing one or more bets that cover that particular number. The wheel in European Roulette includes the numbers 1-36 plus a single 0 (zero).</p>
                                <p>After betting time has expired, the ball is spun within the Roulette wheel. The ball will eventually come to rest in one of the numbered pockets within the wheel. You win if you have placed a bet that covers that particular number..</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Bet Types:</h6>
                                <p>You can place many different kinds of bets on the Roulette table. Bets can cover a single number or a certain range of numbers, and each type of bet has its own payout rate.</p>
                                <p>Bets made on the numbered spaces on the betting area, or on the lines between them, are called Inside Bets, while bets made on the special boxes below and to the side of the main grid of numbers are called Outside Bets.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">INSIDE BETS:</h6>
                                <ul class="pl-2 pr-2 list-style">
                                    <li><b>Straight Up</b> — place your chip directly on any single number (including zero).</li>
                                    <li><b>Split Bet</b> — place your chip on the line between any two numbers, either on the vertical or horizontal.</li>
                                    <li><b>Street Bet</b> — place your chip at the end of any row of numbers. A Street Bet covers remaining numbers on that Street.</li>
                                    <li><b>Corner Bet</b> — place your chip at the corner (central intersection) where four numbers meet. All remaining numbers on that corner are covered.</li>
                                </ul>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">OUTSIDE BETS:</h6>
                                <ul class="pl-2 pr-2 list-style">
                                    <li><b>Column Bet</b> — place your chip in one of the boxes marked "2 to 1" at the end of the column that covers all remaining numbers in that column. The zero is not covered by any column bet.</li>
                                    <li><b>Dozen Bet</b> — place your chip in one of the three boxes marked "1st 12," "2nd 12" or "3rd 12" to cover the remaining numbers alongside the box.</li>
                                    <li><b>Red/Black</b> — place your chip in the Red or Black box to cover the all remaining red or all remaining black numbers. The zero is not covered by these bets.</li>
                                    <li><b>Even/Odd</b> — place your chip in one of these boxes to cover the remaining even or remaining odd numbers. The zero is not covered by these bets.</li>
                                    <li><b>1-18/19-36</b> — place your chip in either of these boxes to cover the first or second set of remaining numbers. The zero is not covered by these bets.</li>
                                </ul>
                                <br>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Winning Numbers:</h6>
                                <p>The WINNING NUMBERS display shows the most recent winning numbers.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Place Bets &amp; Payouts:</h6>
                                <p>In Settings icon shows the minimum and maximum allowed bet limits at the table, which may change from time to time. Open the Bet Limits to check your current limits.</p>
                                <p>In Settings icon also shows the payouts of all covers section.</p>
                                <p>To participate in the game, you must have sufficient funds to cover your bets. You can see your current BALANCE on your screen.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">PLACE YOUR BETS:</h6>
                                <p>The CHIP DISPLAY allows you to select the value of each chip you wish to bet. Only chips of denominations that can be covered by your current balance will be enabled and you can change chips amount from Set Button Values.</p>
                                <p>Once you have selected a chip, place your bet by simply clicking/tapping the appropriate betting spot on the game table. Each time you click/tap the betting spot, the amount of your bet increases by the value of the selected chip or up to the maximum limit for the type of bet you have selected. Once you have bet the maximum limit, no additional funds will be accepted for that bet, and a message will appear above your bet to notify you that you have bet the maximum.</p>
                                <p><b>NOTE:</b> Please do not minimise your browser or open any other tab in your browser while betting time remains, and you have placed bets on the table. Such actions may be interpreted as leaving the game, and your bets will therefore be declined for that particular game round.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <p>The Clear button becomes available after you have placed any bet. that clear all your bets.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-trash"></i></span>
                                </p>
                                <p>The Rebet button allows you to repeat all bets from the previous game round. This button is available only before the first chip is placed.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-redo"></i></span>
                                </p>
                                <p>The Undo button removes the last bet you placed.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-undo"></i></span>
                                </p>
                            </div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Back table limits:</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Covers</th>
                                            <th>Team</th>
                                            <th>Pays</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 Nr</td>
                                            <td>Straight bet</td>
                                            <td>35:1</td>
                                        </tr>
                                        <tr>
                                            <td>2 Nrs</td>
                                            <td>Split bet</td>
                                            <td>17:1</td>
                                        </tr>
                                        <tr>
                                            <td>3 Nrs</td>
                                            <td>Street bet</td>
                                            <td>11:1</td>
                                        </tr>
                                        <tr>
                                            <td>4 Nrs</td>
                                            <td>Corner bet</td>
                                            <td>8:1</td>
                                        </tr>
                                        <tr>
                                            <td>12 Nrs</td>
                                            <td>Dozen bet</td>
                                            <td>2:1</td>
                                        </tr>
                                        <tr>
                                            <td>18 Nrs</td>
                                            <td>Half board</td>
                                            <td>1:1</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Lay table limits:</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Covers</th>
                                            <th>Team</th>
                                            <th>Pays</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 Nr</td>
                                            <td>Straight bet</td>
                                            <td>39:1</td>
                                        </tr>
                                        <tr>
                                            <td>2 Nrs</td>
                                            <td>Split bet</td>
                                            <td>19.5:1</td>
                                        </tr>
                                        <tr>
                                            <td>3 Nrs</td>
                                            <td>Street bet</td>
                                            <td>13:1</td>
                                        </tr>
                                        <tr>
                                            <td>4 Nrs</td>
                                            <td>Corner bet</td>
                                            <td>9.75:1</td>
                                        </tr>
                                        <tr>
                                            <td>12 Nrs</td>
                                            <td>Dozen bet</td>
                                            <td>3.25:1</td>
                                        </tr>
                                        <tr>
                                            <td>18 Nrs</td>
                                            <td>Half board</td>
                                            <td>2.1:1</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>`;
        }else if(gametype == "roulette11") {
            ruletitle = "Golden Roulette Rules";
            image_url = `<div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Game Rules:</h6>
                                <p>The objective in Roulette is to predict the number on which the ball will land by placing one or more bets that cover that particular number. The wheel in European Roulette includes the numbers 1-36 plus a single 0 (zero).</p>
                                <p>After betting time has expired, the ball is spun within the Roulette wheel. The ball will eventually come to rest in one of the numbered pockets within the wheel. You win if you have placed a bet that covers that particular number..</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Bet Types:</h6>
                                <p>You can place many different kinds of bets on the Roulette table. Bets can cover a single number or a certain range of numbers, and each type of bet has its own payout rate.</p>
                                <p>Bets made on the numbered spaces on the betting area, or on the lines between them, are called Inside Bets, while bets made on the special boxes below and to the side of the main grid of numbers are called Outside Bets.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">INSIDE BETS:</h6>
                                <ul class="pl-2 pr-2 list-style">
                                    <li><b>Straight Up</b> — place your chip directly on any single number (including zero).</li>
                                    <li><b>Split Bet</b> — place your chip on the line between any two numbers, either on the vertical or horizontal.</li>
                                    <li><b>Street Bet</b> — place your chip at the end of any row of numbers. A Street Bet covers remaining numbers on that Street.</li>
                                    <li><b>Corner Bet</b> — place your chip at the corner (central intersection) where four numbers meet. All remaining numbers on that corner are covered.</li>
                                </ul>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">OUTSIDE BETS:</h6>
                                <ul class="pl-2 pr-2 list-style">
                                    <li><b>Column Bet</b> — place your chip in one of the boxes marked "2 to 1" at the end of the column that covers all remaining numbers in that column. The zero is not covered by any column bet.</li>
                                    <li><b>Dozen Bet</b> — place your chip in one of the three boxes marked "1st 12," "2nd 12" or "3rd 12" to cover the remaining numbers alongside the box.</li>
                                    <li><b>Red/Black</b> — place your chip in the Red or Black box to cover the all remaining red or all remaining black numbers. The zero is not covered by these bets.</li>
                                    <li><b>Even/Odd</b> — place your chip in one of these boxes to cover the remaining even or remaining odd numbers. The zero is not covered by these bets.</li>
                                    <li><b>1-18/19-36</b> — place your chip in either of these boxes to cover the first or second set of remaining numbers. The zero is not covered by these bets.</li>
                                </ul>
                                <br>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Winning Numbers:</h6>
                                <p>The WINNING NUMBERS display shows the most recent winning numbers.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Place Bets &amp; Payouts:</h6>
                                <p>In Settings icon shows the minimum and maximum allowed bet limits at the table, which may change from time to time. Open the Bet Limits to check your current limits.</p>
                                <p>In Settings icon also shows the payouts of all covers section.</p>
                                <p>To participate in the game, you must have sufficient funds to cover your bets. You can see your current BALANCE on your screen.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">PLACE YOUR BETS:</h6>
                                <p>The CHIP DISPLAY allows you to select the value of each chip you wish to bet. Only chips of denominations that can be covered by your current balance will be enabled and you can change chips amount from Set Button Values.</p>
                                <p>Once you have selected a chip, place your bet by simply clicking/tapping the appropriate betting spot on the game table. Each time you click/tap the betting spot, the amount of your bet increases by the value of the selected chip or up to the maximum limit for the type of bet you have selected. Once you have bet the maximum limit, no additional funds will be accepted for that bet, and a message will appear above your bet to notify you that you have bet the maximum.</p>
                                <p><b>NOTE:</b> Please do not minimise your browser or open any other tab in your browser while betting time remains, and you have placed bets on the table. Such actions may be interpreted as leaving the game, and your bets will therefore be declined for that particular game round.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <p>The Clear button becomes available after you have placed any bet. that clear all your bets.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-trash"></i></span>
                                </p>
                                <p>The Rebet button allows you to repeat all bets from the previous game round. This button is available only before the first chip is placed.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-redo"></i></span>
                                </p>
                                <p>The Undo button removes the last bet you placed.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-undo"></i></span>
                                </p>
                            </div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Back table limits:</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Covers</th>
                                            <th>Team</th>
                                            <th>Pays</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 Nr</td>
                                            <td>Straight bet</td>
                                            <td>35:1</td>
                                        </tr>
                                        <tr>
                                            <td>2 Nrs</td>
                                            <td>Split bet</td>
                                            <td>17:1</td>
                                        </tr>
                                        <tr>
                                            <td>3 Nrs</td>
                                            <td>Street bet</td>
                                            <td>11:1</td>
                                        </tr>
                                        <tr>
                                            <td>4 Nrs</td>
                                            <td>Corner bet</td>
                                            <td>8:1</td>
                                        </tr>
                                        <tr>
                                            <td>12 Nrs</td>
                                            <td>Dozen bet</td>
                                            <td>2:1</td>
                                        </tr>
                                        <tr>
                                            <td>18 Nrs</td>
                                            <td>Half board</td>
                                            <td>1:1</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Lay table limits:</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Covers</th>
                                            <th>Team</th>
                                            <th>Pays</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 Nr</td>
                                            <td>Straight bet</td>
                                            <td>39:1</td>
                                        </tr>
                                        <tr>
                                            <td>2 Nrs</td>
                                            <td>Split bet</td>
                                            <td>19.5:1</td>
                                        </tr>
                                        <tr>
                                            <td>3 Nrs</td>
                                            <td>Street bet</td>
                                            <td>13:1</td>
                                        </tr>
                                        <tr>
                                            <td>4 Nrs</td>
                                            <td>Corner bet</td>
                                            <td>9.75:1</td>
                                        </tr>
                                        <tr>
                                            <td>12 Nrs</td>
                                            <td>Dozen bet</td>
                                            <td>3.25:1</td>
                                        </tr>
                                        <tr>
                                            <td>18 Nrs</td>
                                            <td>Half board</td>
                                            <td>2.1:1</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>`;
        }else if(gametype == "roulette13") {
            ruletitle = "Roulette Rules";
            image_url = `<div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Game Rules:</h6>
                                <p>The objective in Roulette is to predict the number on which the ball will land by placing one or more bets that cover that particular number. The wheel in European Roulette includes the numbers 1-36 plus a single 0 (zero).</p>
                                <p>After betting time has expired, the ball is spun within the Roulette wheel. The ball will eventually come to rest in one of the numbered pockets within the wheel. You win if you have placed a bet that covers that particular number..</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Bet Types:</h6>
                                <p>You can place many different kinds of bets on the Roulette table. Bets can cover a single number or a certain range of numbers, and each type of bet has its own payout rate.</p>
                                <p>Bets made on the numbered spaces on the betting area, or on the lines between them, are called Inside Bets, while bets made on the special boxes below and to the side of the main grid of numbers are called Outside Bets.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">INSIDE BETS:</h6>
                                <ul class="pl-2 pr-2 list-style">
                                    <li><b>Straight Up</b> — place your chip directly on any single number (including zero).</li>
                                    <li><b>Split Bet</b> — place your chip on the line between any two numbers, either on the vertical or horizontal.</li>
                                    <li><b>Street Bet</b> — place your chip at the end of any row of numbers. A Street Bet covers remaining numbers on that Street.</li>
                                    <li><b>Corner Bet</b> — place your chip at the corner (central intersection) where four numbers meet. All remaining numbers on that corner are covered.</li>
                                </ul>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">OUTSIDE BETS:</h6>
                                <ul class="pl-2 pr-2 list-style">
                                    <li><b>Column Bet</b> — place your chip in one of the boxes marked "2 to 1" at the end of the column that covers all remaining numbers in that column. The zero is not covered by any column bet.</li>
                                    <li><b>Dozen Bet</b> — place your chip in one of the three boxes marked "1st 12," "2nd 12" or "3rd 12" to cover the remaining numbers alongside the box.</li>
                                    <li><b>Red/Black</b> — place your chip in the Red or Black box to cover the all remaining red or all remaining black numbers. The zero is not covered by these bets.</li>
                                    <li><b>Even/Odd</b> — place your chip in one of these boxes to cover the remaining even or remaining odd numbers. The zero is not covered by these bets.</li>
                                    <li><b>1-18/19-36</b> — place your chip in either of these boxes to cover the first or second set of remaining numbers. The zero is not covered by these bets.</li>
                                </ul>
                                <br>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Winning Numbers:</h6>
                                <p>The WINNING NUMBERS display shows the most recent winning numbers.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Place Bets &amp; Payouts:</h6>
                                <p>In Settings icon shows the minimum and maximum allowed bet limits at the table, which may change from time to time. Open the Bet Limits to check your current limits.</p>
                                <p>In Settings icon also shows the payouts of all covers section.</p>
                                <p>To participate in the game, you must have sufficient funds to cover your bets. You can see your current BALANCE on your screen.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">PLACE YOUR BETS:</h6>
                                <p>The CHIP DISPLAY allows you to select the value of each chip you wish to bet. Only chips of denominations that can be covered by your current balance will be enabled and you can change chips amount from Set Button Values.</p>
                                <p>Once you have selected a chip, place your bet by simply clicking/tapping the appropriate betting spot on the game table. Each time you click/tap the betting spot, the amount of your bet increases by the value of the selected chip or up to the maximum limit for the type of bet you have selected. Once you have bet the maximum limit, no additional funds will be accepted for that bet, and a message will appear above your bet to notify you that you have bet the maximum.</p>
                                <p><b>NOTE:</b> Please do not minimise your browser or open any other tab in your browser while betting time remains, and you have placed bets on the table. Such actions may be interpreted as leaving the game, and your bets will therefore be declined for that particular game round.</p>
                            </div>
                        </div>
                        <div>
                            <div class="rules-section">
                                <p>The Clear button becomes available after you have placed any bet. that clear all your bets.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-trash"></i></span>
                                </p>
                                <p>The Rebet button allows you to repeat all bets from the previous game round. This button is available only before the first chip is placed.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-redo"></i></span>
                                </p>
                                <p>The Undo button removes the last bet you placed.</p>
                                <p>
                                    <span class="rule-inner-icon"><i class="fas fa-undo"></i></span>
                                </p>
                            </div>
                            <div class="rules-section">
                                <h6 class="rules-highlight">Back table limits:</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Covers</th>
                                            <th>Team</th>
                                            <th>Pays</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 Nr</td>
                                            <td>Straight bet</td>
                                            <td>35:1</td>
                                        </tr>
                                        <tr>
                                            <td>2 Nrs</td>
                                            <td>Split bet</td>
                                            <td>17:1</td>
                                        </tr>
                                        <tr>
                                            <td>3 Nrs</td>
                                            <td>Street bet</td>
                                            <td>11:1</td>
                                        </tr>
                                        <tr>
                                            <td>4 Nrs</td>
                                            <td>Corner bet</td>
                                            <td>8:1</td>
                                        </tr>
                                        <tr>
                                            <td>12 Nrs</td>
                                            <td>Dozen bet</td>
                                            <td>2:1</td>
                                        </tr>
                                        <tr>
                                            <td>18 Nrs</td>
                                            <td>Half board</td>
                                            <td>1:1</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>`;
        }else if(gametype == "ourroullete") {
            ruletitle = "Unique Roulette Rules";
            image_url = ` <div>
                                <div class="rules-section">
                                    <p>Unique Roulette is a unique game compared to other traditional Roulette. This game is played with numbered cards from 0 to 36. Dealer will draw a card one by one until only one card is left in the deck. Only available numbers in the deck are open for bet in every round and odds are dynamics based on numbers left in the deck.</p>
                                    <p>Bets made on the numbered spaces on the betting area, or on the lines between them, are called Inside Bets, while bets made on the special boxes below and to the side of the main grid of numbers are called Outside Bets.</p>
                                </div>
                            </div>
                            <div>
                                <div class="rules-section">
                                    <h6 class="rules-highlight">INSIDE BETS:</h6>
                                    <ul class="pl-2 pr-2 list-style">
                                        <li><b>Straight Up</b> — place your chip directly on any single number (including zero).</li>
                                        <li><b>Split Bet</b> — place your chip on the line between any two numbers, either on the vertical or horizontal.</li>
                                        <li><b>Street Bet</b> — place your chip at the end of any row of numbers. A Street Bet covers remaining numbers on that Street.</li>
                                        <li><b>Corner Bet</b> — place your chip at the corner (central intersection) where four numbers meet. All remaining numbers on that corner are covered.</li>
                                        <li><b>Line Bet</b> — place your chip at the end of two rows on the intersection between the two rows. A line bet covers all the remaining numbers in both rows.</li>
                                    </ul>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div>
                                <div class="rules-section">
                                    <h6 class="rules-highlight">OUTSIDE BETS:</h6>
                                    <ul class="pl-2 pr-2 list-style">
                                        <li><b>Column Bet</b> — place your chip in one of the boxes marked "2 to 1" at the end of the column that covers all remaining numbers in that column. The zero is not covered by any column bet.</li>
                                        <li><b>Dozen Bet</b> — place your chip in one of the three boxes marked "1st 12," "2nd 12" or "3rd 12" to cover the remaining numbers alongside the box.</li>
                                        <li><b>Red/Black</b> — place your chip in the Red or Black box to cover the all remaining red or all remaining black numbers. The zero is not covered by these bets.</li>
                                        <li><b>Even/Odd</b> — place your chip in one of these boxes to cover the remaining even or remaining odd numbers. The zero is not covered by these bets.</li>
                                        <li><b>1-18/19-36</b> — place your chip in either of these boxes to cover the first or second set of remaining numbers. The zero is not covered by these bets.</li>
                                    </ul>
                                    <br>
                                </div>
                            </div>
                            <div>
                                <div class="rules-section">
                                    <p>Each bet covers a different set of numbers and offers different payout odds. Bet spots will be highlighted.</p>
                                    <p>Good Luck!!!</p>
                                </div>
                            </div>`;
        }else if(gametype == "mogambo"){
            ruletitle = "Mogambo Rules";
            image_url = `<div class="rules-section">
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>1. Mogambo game is played with regular 52 cards deck between Daga/Teja&nbsp;and&nbsp;Mogambo.</li>
                                                <li>2. The objective of the game is to make Highest ranking card to win.</li>
                                                <li>3. Cards are ranked from lowest to highest:
                                                    <p>2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, A (Ace is the highest card)</p>
                                                </li>
                                                <li>4. On same card with different suit, Winner will be declare based
                                                    <p>on below winning suit sequence.</p>
                                                    <p>(Spade,Heart,Club,Diamond)</p>
<div>
                                                        <img src="storage/front/img/rules/img1.jpg">
                                                      
                                                    </div>
                                              </li>
                                                <li>5.Card Deal:
                                                    <p>Daga/Teja is dealt 2 cards,</p>
                                                    <p>Mogambo is dealt 1 card.</p>
                                                </li>
                                                <li>6. To decide the winner of the round, each cards are compared separately with the higher-value card between          Daga/Teja&nbsp;and&nbsp;Mogambo.</li>
                                                <li>7. Example Round
                                                    <p>Daga/Teja reveals K<span class="card-character  ml-1">}</span> and 10<span class="card-character red-black ml-1">]</span>.</p>
                                                    <p>Mogambo reveals Q<span class="card-character  ml-1">[</span>.</p>
                                                    <p>The highest card for Daga/Teja is K<span class="card-character ml-1">}</span>. Therefore, the winner is Daga/Teja.</p>
                                                </li>
                                               
                                            </ul>
                                            <br>
                                            <p>*****************</p>
                                            <br>
                                            <p>3 Card Total :  Total sum&nbsp;of&nbsp;your&nbsp;3&nbsp;cards</p>
                                            <p>Card Value : A, 2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, </p>
                                            <p>(Ace Value is 1 - K value is 13)</p>
                                            <p>Note : If the game is completed before the 3 cards are revealed, the 3 card Total bets&nbsp;is&nbsp;returned.</p>
                                        </div>`;
        } else if(gametype == "dolidana"){
            ruletitle = "Doli Dana Rules";
            image_url = `<div class="rules-section">
                                    <h6 class="rules-highlight">Winning Dice</h6>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>3:3</li>
                                                <li>5:5</li>
                                                <li>6:6</li>
                                                <li>5:6 or 6:5</li>
                                            </ul>
                                            <h6 class="rules-highlight">Losing Dice</h6>
                                            <ul class="pl-4 pr-4 list-style">
                                                <li>1:1</li>
                                                <li>2:2</li>
                                                <li>4:4</li>
                                                <li>1:2 or 2:1</li>
                                            </ul>
                                            <p>Any other combo (like 2:5, 3:4, etc.):</p>
                                            <p>* No win / no loss Dice passes to the next player</p>
                                            <p><b>•Any Pair</b> : |1:1||2:2||3:3||4:4||5:5||6:6|</p>
                                            <p><b>•ODD:</b> 3,5,7,9,11 | <b>EVEN:</b> 2,4,6,8,10,12</p>
                                            <p>•If the Dice total = 7 (e.g., 1:6, 2:5, 3:4, etc.) Bets on Greater than 7 and Less than 7 both lose 50% of the bet Amount.</p>
                                            <p>Examples: 2:5 = 7 -&gt; 50% loss on both
                                                &lt;7 and&gt;7
                                                    </p><p>1:6 = 7 -&gt; 50% loss on both
                                                        &lt;7 and&gt;7</p>
                                            <p></p>
                                            <p><b>Note</b>: All other bets settle immediately, but the main bet waits until Player A or&nbsp;Player&nbsp;B&nbsp;win/Loss(player&nbsp;Back/Lay).</p>
											<h6 class="rules-highlight">Result Integrity &amp; Error-Correction Policy</h6>
											<ul class="pl-4 pr-4 list-style">
                                                <li>1) Authoritative Result<br>
												The Original Dice Number Result generated and recorded by our server is the sole, final, and binding outcome for every round.
												</li>
                                                <li>2) Display Errors &amp; Corrections<br>
												If any technical issue causes an incorrect, missing, duplicated, delayed, or otherwise erroneous display of the result, Dolidana Casino may update the displayed result to match the Original Dice Number Result. All settlements (wins/losses/payouts) are made only against the Original Dice Number Result.
												</li>
												<li>3) Player Acceptance<br>
												By participating, you agree that if a display error occurs, you must accept the corrected/updated result reflecting the Original Dice Number Result, and any settlement made on that basis.
												</li>
                                            </ul>   
                        </div>`;
        }else if(gametype == "teen62") {
            ruletitle = "V VIP Teenpatti 1-day Rules";
            image_url = `<div class="rules-section">
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li>Teenpatti is an indian origin three cards game.</li>
                                                    <li>This game is played with a regular 52 cards deck between Player A and Player B .</li>
                                                    <li>The objective of the game is to make the best three cards hand as per the hand rankings and win.</li>
                                                    <li>You have a betting option of Back and Lay for the main bet.</li>
                                                    <li>Rankings of the card hands from highest to lowest :</li>
                                                    <li>1. Straight Flush (pure Sequence )</li>
                                                    <li>2. Trail  (Three of a Kind )</li>
                                                    <li>3. Straight (Sequence)</li>
                                                    <li>4. Flush (Color )</li>
                                                    <li>5. Pair (Two of a kind )</li>
                                                    <li>6. High Card </li>
                                                </ul>
                                                <div>
                                                    <img src="storage/front/img/rules/teen6.jpg" class="img-fluid">
                                                </div>
                                            </div>
                                            <div><div class="rules-section">
                                                <div>
                                                    <h6 class="rules-highlight">Side bets  :</h6>
                                                </div>
                                                <ul class="pl-4 pr-4 list-style">
                                                    <li><b>CONSECUTIVE CARDS:</b> It is a bet of having two or more consecutive cards in the game.</li>
                                                    <li>eg: 2,3,5      10,3,9      Q,5,K     6,7,8    A,K,7</li>
                                                    <li>For both the players Back and Lay odds are available, you can bet on either or both the players.</li>
                                                    <li><b>Odd - Even :</b>  Here you can bet on every card whether it will be an odd card or an even card.</li>
                                                    <li><b>ODD CARDS :</b> A,3,5,7,9,J,K</li>
                                                    <li><b>EVEN CARDS:</b> 2,4,6,8,10,Q</li>
                                                    <li><b>NOTE:</b> In case of a Tie between the player A and player B bets placed on player A and player B  (Main bets ) will be returned. (Pushed)</li>
                                                </ul>
                                            </div></div>`;
        }else if(gametype == "worli3") {
            ruletitle = "Matka Market Rules";

            image_url = `
                        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@100..900&display=swap');
            .rules-section {
                font-family: "Noto Sans Devanagari", sans-serif;font-size:18px;
                
            }
            .rules-section .row.row5 {
                margin-left: -5px;
                margin-right: -5px;
            }

            .rules-section .pl-2 {
                padding-left: 0.5rem !important;
            }

            .rules-section .pr-2 {
                padding-right: 0.5rem !important;
            }

            .rules-section .row.row5 > [class*="col-"],
            .rules-section .row.row5 > [class*="col"] {
                padding-left: 5px;
                padding-right: 5px;
            }

            .rules-section {
                text-align: left;
                margin-bottom: 10px;
            }

            .rules-section .table {
                color: #fff;
                border: 1px solid #444;
                background-color: #222;
                font-size: 12px;
            }

            .rules-section .table td,
            .rules-section .table th {
                border-bottom: 1px solid #444;
            }

            .rules-section ul li,
            .rules-section p {
                margin-bottom: 5px;
            }

            .rules-section::-webkit-scrollbar {
                width: 8px;
            }

            .rules-section::-webkit-scrollbar-track {
                background: #666666;
            }

            .rules-section::-webkit-scrollbar-thumb {
                background-color: #333333;
            }

            .rules-section .rules-highlight {
                color: #fdcf13;
                font-size: 16px;
            }

            .rules-section .rules-sub-highlight {
                color: #fdcf13;
                font-size: 14px;
            }

            .rules-section .list-style,
            .rules-section .list-style li {
                list-style: disc;
            }

            .rules-section .rule-card {
                height: 20px;
                margin-left: 5px;
            }

            .rules-section .card-character {
                font-family: Card Characters;
            }

            .rules-section .red-card {
                color: red;
            }

            .rules-section .black-card {
                color: black;
            }

            .rules-section .cards-box {
                background: #fff;
                padding: 6px;
                display: inline-block;
                color: #000;
                min-width: 150px;
            }
        </style>

                    <div class="rules-section">
                                                <h5>मटका एक भारतीय आँकड़ों (Numbers) पर आधारित लोकप्रिय खेल है, जिसमें परिणाम अंक गणना (Calculation) के आधार पर निकाले जाते हैं।</h5>
                                                <p>कार्ड और उनकी वैल्यू</p>
                                                <p>इस खेल में ताश (Cards) का उपयोग किया जाता है।</p>
                                                <p>उपयोग होने वाले कार्ड</p>
                                                <p>A, 2, 3, 4, 5, 6, 7, 8, 9, 10</p>
                                                <p>चारों सूट में:</p>
                                                <p>♠ Spade</p>
                                                <p>♥ Heart</p>
                                                <p>♣ Club</p>
                                                <p>♦ Diamond</p>
                                                <h6 class="rules-highlight">🔢 कार्ड वैल्यू (Card Value):</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>कार्ड</th>
                                                                <th>वैल्यू</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A (Ace)</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>4</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>6</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>7</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>9</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>0</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p>⚠️ नोट: इस प्रणाली में 10 को 0 माना जाता है, जो मटका की अंक-गणना में बहुत महत्वपूर्ण होता है। आँकड़ा (Single Digit)</p>
                                                <p>इसका मतलब है 0 से 9 के बीच का कोई भी एक नंबर जिस पर आप दांव लगाते हैं</p>
                                                <p>तीन पत्तों (या कार्ड्स/नंबरों) के कुल जोड़ से जो आख़िरी अंक निकलता है, उसे आँकड़ा कहा जाता है। इसी आँकड़ा के आधार पर रिज़ल्ट तय होता है।</p>
                                                <p>आंकड़ा कैसे बनता है?</p>
                                                <p>आंकड़ा हमेशा पाना (Patti) के जोड़ से पैदा होता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>मान लीजिए पाना खुला: 2-3-9</li>
                                                    <li>इनका जोड़ करें: 2 + 3 + 9 = 14</li>
                                                    <li>जोड़ का आखिरी अंक क्या है? 4</li>
                                                    <li>तो इस खेल का 'सिंगल आंकड़ा' 4 कहलाएगा।</li>
                                                </ul>
                                                <h6 class="rules-highlight">जोड़ी</h6>
                                                <p>मटका में 'जोड़ी' (Jodi) का अर्थ बहुत ही सीधा है—यह दो अंकों की एक संख्या होती है।</p>
                                                <p>जैसा कि नाम से पता चलता है, जब दो अंकों को मिलाकर एक साथ दांव लगाया जाता है, तो उसे 'जोड़ी' कहा जाता है। यह संख्या 00 से 99 के बीच की कोई भी संख्या हो सकती है।</p>
                                                <h7 class="rules-sub-highlight">जोड़ी कैसे बनती है?</h7>
                                                <p>मटका खेल दो चरणों में होता है: <b>ओपन (Open)</b> और <b>क्लोज (Close)।</b></p>
                                                <p><b>ओपन (Open):</b> खेल की शुरुआत में निकलने वाला पहला <b>आंकड़ा</b> ।</p>
                                                <p><b>क्लोज (Close):</b> खेल के अंत में निकलने वाला दूसरा आंकड़ा ।</p>
                                                <p><b>जोड़ी:</b> जब इन दोनों अंकों को साथ रखा जाता है, तो वह 'जोड़ी' बन जाती है।</p>
                                                <h7 class="rules-sub-highlight"> जोड़ी कैसे बनती है?</h7>
                                                <p>मटका का पूरा रिजल्ट दो हिस्सों में आता है: <b>ओपन (Open)</b> और <b>क्लोज (Close)</b>। इन दोनों के सिंगल अंकों को साथ जोड़ने पर 'जोड़ी' बनती है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li><b>स्टेप 1:</b> पहले 'ओपन' का रिजल्ट आता है (जैसे आंकड़ा निकला: 4)</li>
                                                    <li><b>स्टेप 2:</b> फिर कुछ घंटों बाद 'क्लोज' का रिजल्ट आता है (जैसे आंकड़ा निकला: 7)</li>
                                                    <li>फाइनल जोड़ी: इन दोनों को मिलाकर जो संख्या बनी, यानी 47, उसे उस दिन की 'जोड़ी' कहा जाता है।</li>
                                                </ul>
                                                <h6 class="rules-highlight">पाना</h6>
                                                <p>मटका के संदर्भ में, <b>'पाना' (Pana)</b> एक बहुत ही महत्वपूर्ण शब्द है। यह खेल के दांव लगाने का एक विशिष्ट तरीका है।</p>
                                                <p>सरल शब्दों में, <b>पाना 3 अंकों का एक समूह होता है।</b></p>
                                                <h7 class="rules-sub-highlight">पाना (Pana) कैसे काम करता है?</h7>
                                                <p>जब आप मटका खेलते हैं, तो आपको 0 से 9 के बीच के अंक चुनने होते हैं। लेकिन इन एकल अंकों (Single Digit) के पीछे <b>तीन अंकों का एक सेट</b> होता है, जिसे 'पाना' कहा जाता है।</p>
                                                <p>उदाहरण के लिए:</p>
                                                <p>अगर आपने तीन अंक चुने: 1, 2, और 5</p>
                                                <p>इन तीनों को जोड़ने पर: 1 + 2 + 5 = 8</p>
                                                <p>यहाँ 8 आपका 'सिंगल आंकड़ा (Single Digit) है और 125 आपका 'पाना' है।</p>
                                                <h6 class="rules-highlight">सिंगल पाना</h6>
                                                <p>मटका में <b>SP</b> का मतलब <b>'सिंगल पाना'</b> (Single Pana) होता है।</p>
                                                <h7 class="rules-sub-highlight">Single Pana (SP) की परिभाषा</h7>
                                                <p>सिंगल पाना उसे कहते हैं जिसमें <b>तीनों अंक अलग-अलग</b> होते हैं। इसमें कोई भी अंक दोहराया (Repeat) नहीं जाता।</p>
                                                <p><b>मटका में पाना हमेशा छोटे से बड़े अंक की तरफ लिखा जाता है। सिंगल पाना कुल 120 कॉम्बिनेशन होते हैं।</b></p>
                                                <h6 class="rules-highlight">डबल पाना</h6>
                                                <p>मटका की भाषा में DP का मतलब होता है <b>"डबल पाना" (Double Pana)।</b></p>
                                                <p>जैसा कि नाम से ही पता चलता है, जब किसी पाने (3 अंकों के सेट) में कोई भी दो अंक एक जैसे <b>(duplicate)</b> होते हैं, तो उसे 'डबल पाना' कहा जाता है।</p>
                                                <h7 class="rules-sub-highlight">डबल पाना की पहचान</h7>
                                                <p>इसमें तीन में से दो अंक बिल्कुल समान होते हैं और तीसरा अंक अलग होता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li><b>उदाहरण:</b> * 112 (यहाँ 1 दोबारा आया है)</li>
                                                    <li>559 (यहाँ 5 दोबारा आया है)</li>
                                                    <li>400 (यहाँ 0 दोबारा आया है)</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">डबल पाना (DP) से सिंगल अंक कैसे निकलता है?</h7>
                                                <p>नियम वही है—तीनों अंकों को जोड़ें और जोड़ का आखिरी अंक आपका 'सिंगल' होगा।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>उदाहरण 1: पाना 223</li>
                                                    <li>जोड़: 2 + 2 + 3 = 7</li>
                                                    <li>सिंगल अंक बना: 7</li>
                                                </ul>
                                                <h6 class="rules-highlight">TRIO (ट्रायो)</h6>
                                                <p>जब किसी पाने के तीनों अंक एक जैसे होते हैं, तो उसे ट्रिपल पाना या <b>'ट्रियो'</b> कहा जाता है। मटका में 0 से 9 तक के अंकों के लिए केवल <b>10 ट्रिपल</b> पाने ही संभव हैं।</p>
                                                <h7 class="rules-sub-highlight">TRIO आँकड़ा के उदाहरण</h7>
                                                <p><b>111 / 222 / 333 / 444 / 555 / 666 / 777 / 888 / 999 / 000</b></p>
                                                <h6 class="rules-highlight">Cycle (साइकिल)</h6>
                                                <p>जब आप दो अंकों की एक जोड़ी चुनते हैं और यह शर्त लगाते हैं कि रिजल्ट के पाने (3 अंकों के सेट) में ये दो अंक जरूर आएंगे, तो उसे साइकिल पाना कहते हैं।</p>
                                                <p><b>उदाहरण:</b> मान लीजिए आपने <b>'1-2'</b> की साइकिल (CP) ली।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>अब अगर रिजल्ट का पाना 123, 124, 125, 126, 127, 128, 129 या 120 में से कोई भी आता है, तो आप जीत जाएंगे।</li>
                                                    <li>शर्त सिर्फ इतनी है कि उस तीन अंकों के पाने में '1' और '2' दोनों होने चाहिए।</li>
                                                </ul>
                                                <h6 class="rules-highlight">Motor SP (मोटर SP)</h6>
                                                <h7 class="rules-sub-highlight">खिलाड़ी कम से कम 4 और ज़्यादा से ज़्यादा 9 कार्ड चुनता है।</h7>
                                                <p><b>मान लीजिए आप 4 अंक चुनते हैं: 1, 2, 3, 4। अब इन चार अंकों से जितने भी संभव 3-अंकों के 'सिंगल पाने' (SP) बन सकते हैं, मोटर उन सबका एक सेट बना देता है।</b></p>
                                                <p><b>उदाहरण (4 अंकों की मोटर - 1234): इससे निम्नलिखित 4 'सिंगल पाने' बनेंगे:</b></p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>123</li>
                                                    <li>124</li>
                                                    <li>134</li>
                                                    <li>234</li>
                                                </ul>
                                                <p><b>अगर रिजल्ट में इन चारों में से कोई भी एक पाना आ जाता है, तो आप जीत जाते हैं।</b></p>
                                                <h6 class="rules-highlight">56 Chart (56 चार्ट)</h6>
                                                <p><b>56 चार्ट्स</b> मटका गेम में इस्तेमाल होने वाला एक संरचित चार्ट है,</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li> चार्ट में कुल 56 नंबर या संयोजन होते हैं।</li>
                                                    <li> ये नंबर आम तौर पर 0 और 1 को छोड़कर बनते हैं।</li>
                                                    <li> नंबर 2 से लेकर 9 तक के अलग-अलग संयोजन शामिल होते हैं।</li>
                                                </ul>
                                                <h6 class="rules-highlight">64 Chart (64 चार्ट)</h6>
                                                <p>64 चार्ट्स मटका गेम में इस्तेमाल होने वाला एक संरचित चार्ट है, चार्ट में कुल 64 नंबर या संयोजन होते हैं।</p>
                                                <p>आम तौर पर चार्ट में 0 और 1 शामिल होते हैं।</p>
                                                <p>==================================</p>
                                                <h6 class="rules-highlight">ABR (A/B/R)</h6>
                                                <h7 class="rules-sub-highlight">अकी-बेकी (Aki-Beki) - सम और विषम अंक</h7>
                                                <p>जिसका उपयोग 'Odd' और 'Even' अंकों के लिए किया जाता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>अकी (Aki): इसका मतलब है विषम अंक (Odd Numbers)। अंक: 1, 3, 5, 7, 9</li>
                                                    <li>बेकी (Beki): इसका मतलब है सम अंक (Even Numbers)। अंक: 2, 4, 6, 8, 0</li>
                                                </ul>
                                                <p>खेल में उपयोग: खिलाड़ी अक्सर दांव लगाते समय कहते हैं कि "आज ओपन में 'अकी' (विषम) अंक आएगा"। अगर रिजल्ट 1, 3, 5, 7 या 9 में से कुछ भी आता है, तो वे जीत जाते हैं।</p>
                                                <p>रोन (Ron) - अंकों का क्रम</p>
                                                <p>'रोन' का मतलब होता है सीक्वेंस (Sequence) या लगातार आने वाले अंक।</p>
                                                <p>जब किसी पाने (Pana) के तीनों अंक लगातार क्रम में होते हैं, तो उसे 'रोन पाना' कहा जाता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>उदाहरण: 123, 234, 456, 789, 890।</li>
                                                </ul>
                                                <h6 class="rules-highlight">कॉमन सिंगल पन्ना (Common SP)</h6>
                                                <p>सरल शब्दों में: "यह एक ऐसा दांव है जहाँ खिलाड़ी 0 से 9 के बीच का कोई एक अंक चुनता है। यदि रिजल्ट में आने वाले तीन अंकों के पन्ने (Pana) में आपका चुना हुआ अंक एक बार मौजूद है, तो आप विजेता माने जाते हैं।"</p>
                                                <h6 class="rules-highlight">Common DP (कॉमन डबल पन्ना)</h6>
                                                <p>"कॉमन डबल पन्ना एक ऐसा दांव है जहाँ खिलाड़ी 0 से 9 के बीच का कोई एक अंक चुनता है। इस दांव में जीत तब मानी जाती है जब ड्रॉ (रिजल्ट) में आने वाले तीन कार्ड्स या अंकों के सेट में दो शर्तें पूरी हों:</p>
                                                <p>ड्रॉ में कोई भी एक जोड़ी (Pair) मौजूद हो (यानी दो अंक एक समान हों)।</p>
                                                <p>उस जोड़ी या सेट में खिलाड़ी द्वारा चुना हुआ अंक अनिवार्य रूप से शामिल हो।"</p>
                                                <h6 class="rules-highlight">Color DP (कलर डबल पन्ना)</h6>
                                                <p>"Color DP एक ऐसा दांव है जहाँ जीत का फैसला अंकों के सम-विषम क्रम (Odd/Even Sequence) और जोड़ी (Pair) के आधार पर होता है। इसमें खिलाड़ी 0 से 9 के बीच का कोई एक अंक चुनता है।</p>
                                                <p>जीतने के लिए ड्रॉ के तीन कार्डों/अंकों में ये शर्तें पूरी होनी चाहिए:</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>कलर (Color Sequence): तीनों अंक या तो विषम (Odd) होने चाहिए (जैसे: 1, 3, 5, 7, 9) या तीनों अंक सम (Even) होने चाहिए (जैसे: 2, 4, 6, 8, 0)।</li>
                                                    <li>जोड़ी (Pair): उन तीन अंकों में कम से कम दो अंक एक समान (Pair) होने चाहिए।</li>
                                                    <li>चुना हुआ नंबर: उस सम या विषम जोड़ी वाले सेट में खिलाड़ी का चुना हुआ अंक मौजूद होना चाहिए।"</li>
                                                </ul>
                                            </div>`;
        }
    
        if (image_url != "") {
            // return_data = '<img src="../storage/front/img/rules/' + image_url + '" class="img-fluid">';
          ///  console.log(image_url,"jjjjjjj");
             return_data =  image_url 
        }else{
            console.log("KKKKK");    
        }
        $("#rules_popup").modal('show');
        $(".rules_popup_image").html(return_data);
        $(".rules-modal-title").html(ruletitle);
    }