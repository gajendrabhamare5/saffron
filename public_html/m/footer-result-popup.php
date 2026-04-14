<script>
function view_casiono_result(event_id, casino_type) {
    $(".loader").show();
    $("#cards_data").html("");

    $("#round_no").text(event_id);
let clean = event_id.toString().substring(3); // "250612132034"
  if(event_id.toString().length <= 12){
        clean=event_id;
    }
    
    // 2. Extract parts from the clean string
    let year = "20" + clean.toString().substring(0, 2);  // "25" -> "2025"
    let month = clean.toString().substring(2, 4);        // "06"
    let day = clean.toString().substring(4, 6);  
    if(event_id.toString().length <= 12){
        day= clean.toString().substring(2, 4); 
        month  = clean.toString().substring(4, 6);    
    
    }   
    let hour = clean.toString().substring(6, 8);         // "13"
    let minute = clean.toString().substring(8, 10);      // "20"
    let second = clean.toString().substring(10, 12);     // "34"

    // 3. Combine into readable format
    let formatted = `${day}/${month}/${year} ${hour}:${minute}:${second}`;

    $("#matchtime").text(formatted);
     if(clean.toString().length != 12){
        $(".matchtime-id").hide();
    }
    if (casino_type == "teen20") {
        result_title = "20-20 Teenpatti Result";
    } else if (casino_type == "teen") {
        result_title = "Teenpatti 1-day Result";
    } else if (casino_type == "teen9") {
        result_title = "Test Teenpatti Result";
    } else if (casino_type == "war") {
        result_title = "Casino War Result";
    } else if (casino_type == "teen8") {
        result_title = "Teenpatti Open Result";
    } else if (casino_type == "poker") {
        result_title = "Poker 1-Day Result";
    } else if (casino_type == "poker20") {
        result_title = "20-20 Poker Result";
    } else if (casino_type == "poker9" || casino_type == "poker6") {
        result_title = "Poker 6 Players Result";
    } else if (casino_type == "ab20") {
        //aa baki
        result_title = "Andar Bahar Result";
    } else if (casino_type == "abj") {
        //aa baki
        result_title = "Andar Bahar 2 Result";
    } else if (casino_type == "3cardj") {
        result_title = "3 Cards Judgement Result";
    } else if (casino_type == "card32") {
        result_title = "32 Cards  A Result";
    } else if (casino_type == "card32eu") {
        result_title = "32 Cards B Result";
    } else if (casino_type == "worli") {
        //aa baki
        result_title = "Worli Matka Result";
    } else if (casino_type == "worli2") {
        result_title = "Instant Worli Result";
    } else if (casino_type == "lucky7") {
        result_title = "Lucky 7 - A Result";
    } else if (casino_type == "lucky7eu") {
        result_title = "Lucky 7 - B Result";
    } else if (casino_type == "dt20") {
        result_title = "20-20 Dragon Tiger Result";
    } else if (casino_type == "dt202") {
        result_title = "20-20 Dragon Tiger 2 Result";
    } else if (casino_type == "dt6") {
        result_title = "1 Day Dragon Tiger Result";
    } else if (casino_type == "aaa") {
        result_title = "Amar Akbar Anthony Result";
    } else if (casino_type == "aaa2") {
        result_title = "Amar Akbar Anthony 2 Result";
    } else if (casino_type == "btable") {
        result_title = "Bollywood Casino Result";
    } else if (casino_type == "dtl20") {
        result_title = "20-20 D T L Result";
    } else if (casino_type == "meter") {
        result_title = "Casino Meter Result";
    } else if (casino_type == "cmatch20") {
        //aa baki
        result_title = "Cricket Match 20-20 Result";
    } else if (casino_type == "baccarat") {
        result_title = "Baccarat Result";
    } else if (casino_type == "baccarat2") {
        result_title = "Baccarat 2 Result";
    } else if (casino_type == "cmatch20") {
        result_title = "Result";
    } else if (casino_type == "race20") {
        result_title = "Race 20 Result";
    } else if (casino_type == "queen") {
        result_title = "Queen Result";
    } else if (casino_type == "cricketv3") {
        result_title = "AUS VS IND 5FIVE CRICKET Result";
    } else if (casino_type == "superover") {
        result_title = "SUPER OVER Result";
    } else if (casino_type == "ballbyball") {
        result_title = "Ball By Ball Result";
    } else if (casino_type == "lucky7eu2") {
        result_title = "Lucky 7 - C Result";
    } else if (casino_type == "goal") {
        result_title = "Goal Result";
    } else if (casino_type == "lucky15") {
        result_title = "Lucky 15 Result";
    } else if (casino_type == "superover3") {
        result_title = "Mini Super Over Result";
    } else if (casino_type == "superover2") {
        result_title = "Super Over 2 Result";
    } else if (casino_type == "teen41") {
        result_title = "Queen Top Open Teenpatti Result";
    } else if (casino_type == "teen42") {
        result_title = "Jack Top Open Teenpatti Result";
    } else if (casino_type == "teen33") {
        result_title = "Instant Teenpatti 3.0 Result";
    } else if (casino_type == "teen3") {
        result_title = "Instant Teenpatti Result";
    } else if (casino_type == "teen32") {
        result_title = "Instant Teenpatti 2.0 Result";
    } else if (casino_type == "teen6") {
        result_title = "Teenpatti - 2.0 Result";
    } else if (casino_type == "sicbo2") {
        result_title = "Sic Bo 2 Result";
    } else if (casino_type == "sicbo") {
        result_title = "Sic Bo Result";
    } else if (casino_type == "lottcard") {
        result_title = "Lottery Result";
    } else if (casino_type == "trap") {
        result_title = "The Trap Result";
    } else if (casino_type == "patti2") {
        result_title = "2 Cards Teenpatti Result";
    } else if (casino_type == "teensin") {
        result_title = "29Card Baccarat Result";
    } else if (casino_type == "teenmuf") {
        result_title = " Muflis Teenpatti Result";
    } else if (casino_type == "race17") {  
        result_title = "Race to 17 Result";
    } else if (casino_type == "teen20b") {
            result_title = "20-20 Teenpatti B Result";
    }else if (casino_type == "teen20c") {
        result_title = "20-20 Teenpatti C Result";
    }  else if (casino_type == "trio") {
            result_title = "TRIO Result";
        } else if (casino_type == "notenum") {
            result_title = "Note Number Result";
        } else if (casino_type == "kbc") {
            result_title = "K.B.C Result";
        } else if (casino_type == "teen120") {
            result_title = "1 CARD 20-20 Result";
        } else if (casino_type == "teen1") {
            result_title = "1 CARD ONE-DAY Result";
        } else if (casino_type == "race2") {
            result_title = "Race to 2nd Result";
        } else if (casino_type == "dum10") {
            result_title = "Dus ka Dum Result";
        } else if (casino_type == "cmeter1") {
            result_title = "1 Card Meter Result";
        } else if (casino_type == "teenjoker") {
            result_title = "Teenpatti Joker Result";
        } else if (casino_type == "btable2") {
            result_title = "Bollywood Casino 2 Result";
        }else if (casino_type == "ab3") {
       
        result_title = "Andar Bahar 50 Cards Result";
    } else if (casino_type == "ab4") {
       
        result_title = "Andar Bahar 150 Cards Result";
    }
    else if (casino_type == "roulette13") {
        result_title = "Roulette";
    }
    else if (casino_type == "ourroullete") {
        result_title = "Unique Roulette";
    }
    else if (casino_type == "roulette12") {
        result_title = "Beach Roulette";
    }
    else if (casino_type == "roulette11") {
        result_title = "Golden Roulette";
    }
    else if (casino_type == "joker20") {
        result_title = "Teenpatti Joker 20-20 Result";
    }
    else if (casino_type == "joker120") {
        result_title = "Unlimited Joker 20-20 Result";
    }else if (casino_type == "joker1") {
        result_title = "Unlimited Joker Oneday Result";
    }else if (casino_type == "poison") {
        result_title = "Teenpatti poison Oneday Result";
    }else if (casino_type == "poison20") {
        result_title = "Teenpatti poison 20-20 Result";
    }else if (casino_type == "lucky5") {
        result_title = "Lucky 6 Result";
    }else if (casino_type == "teen62") {
        result_title = "V-VIP Teenpatti 1-day Result";
    }else if (casino_type == "mogambo") {
        result_title = "Mogambo Result";
    }else if (casino_type == "dolidana") {
        result_title = "Doli dana Result";
    }else if (casino_type == "teenunique") {
        result_title = "Unique Teenpatti";
    }
    
    $("#result_title").text(result_title);
    $.ajax({
        type: 'POST',
        url: '../ajaxfiles/get_result_cards_mobile.php',
        dataType: 'text',
        data: {
            event_id: event_id,
            casino_type: casino_type
        },
        success: function(response) {
            $(".loader").hide();
            $('.casino_result_popup').show();
            $('#casino_result_popup').modal("show");
            $("#cards_data").html(response);
            if (casino_type == "ab20") {
                jQuery("#result-a-cards").owlCarousel({

                    rtl: true,
                    loop: false,
                    margin: 2,
                    nav: true,
                    responsive: {
                        0: {
                            items: 7
                        },

                        600: {
                            items: 7
                        },

                        1000: {
                            items: 7
                        },
                    }
                });
                jQuery("#result-b-cards").owlCarousel({

                    rtl: true,
                    loop: false,
                    margin: 2,
                    nav: true,
                    responsive: {
                        0: {
                            items: 7
                        },

                        600: {
                            items: 7
                        },

                        1000: {
                            items: 7
                        },
                    }
                });
            }
        }
    });
}
</script>
 <!-- style="height: 210px;" -->
<div id="casino_result_popup" class="modal casino_result_popup" role="dialog">
    <div class="modal-dialog" style="    max-width: 100% !important;">
        <div class="modal-dialog modal-md">
            <div role="document" id="__BVID__28___BV_modal_content_" tabindex="-1" class="modal-content">
                <header id="__BVID__28___BV_modal_header_" class="modal-header">
                    <h5 id="result_title" class="modal-title">Result Details</h5>
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div id="__BVID__28___BV_modal_body_" class="modal-body">
                    <!---->
                    <!---->
                    <div class="d-flex justify-content-between">
                        <h6 class="text-left round-id"><b>Round Id:</b> <span id="round_no">0</span>
                        <h6 class="text-right matchtime-id"><b>Match Time: </b> <span id="matchtime">0</span>
                        </h6>
</div>
                         <div>
                        <div id="cards_data">

                        </div>


                    </div>
                </div>
                <!---->
            </div>
        </div>
    </div>

</div>

<div id="rules_popup" class="modal" role="dialog">
    <div class="modal-dialog rules-modal-dialog" style="max-width: 100% !important;">
        <div class="modal-dialog modal-lg rules-modal-dialog">
            <div role="document" id="__BVID__51___BV_modal_content_" tabindex="-1" class="modal-content rules-modal-content">
                <header id="__BVID__51___BV_modal_header_" class="modal-header">
                    <h5 class="modal-title rules-modal-title" id="Rules">Rules</h5>
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div id="__BVID__51___BV_modal_body_" class="modal-body rules_popup_image">



                </div>
                <!---->
            </div>
        </div>
    </div>

</div>