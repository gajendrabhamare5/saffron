<?php
$userdata = $handler->users->data();
?>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: unset;
    }

    span.account_bets {
        cursor: pointer;
        background: #444;
        padding: 5px 10px;
        text-decoration: none;
        color: #fff;
        border-radius: 3px;
        margin-right: 3px;
        text-transform: uppercase;
        display: inline-block;
    }

    span.account_bets1 {
        cursor: pointer;
        background: #444;
        padding: 5px 10px;
        text-decoration: none;
        color: #fff;
        border-radius: 3px;
        margin-right: 3px;
        text-transform: uppercase;
        display: inline-block;
    }

    a.button.btn.btn-diamond {
        margin: 0 4px 4px 0;
    }

    .dataTables_paginate {
        text-align: right;
        margin-top: 20px;
    }

    /* All pagination buttons */
    .dataTables_paginate .paginate_button {
        background-color: #fff !important;
        /* dark background */
        color: #ced4da !important;
        border: none !important;
        padding: 6px 12px;
        margin: 0 2px;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Active Page Button */
    .dataTables_paginate .paginate_button.current {
        background: unset !important;
        background-color: #ae4600 !important;
        /* Teal active background */
        color: white !important;
        border-radius: 4px;
    }

     .ptitle {
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
}
.user-lock-nav {
    padding: 0;
}

.user-lock-nav > li {
    margin-bottom: 5px;
    background: #e4e4e4;
    padding: 5px 10px;
}

.user-lock-nav .arrow-icon {
    width: 25px;
    display: inline-block;
}
.user-lock-container .fa-angle-down {
    font-size: 16px;
    color: #000;
}
.user-lock-nav .custom-control {
    display: inline-block;
}
.user-lock-nav li label {
    margin-bottom: 0;
    padding-left: 5px;
}
.custom-control-label::after, .custom-control-label::before {
    /* width: 20px; */
    height: 20px;
    border-radius: 0;
    background-color: #000;
    border: 1px solid #000;
    position: absolute;
    top: .25rem;
    left: 0;
    display: block;
    width: 1rem;
    height: 1rem;
    content: "";
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 50% 50%;
}
.custom-control-label:before, .custom-file-label, .custom-select {
    transition: background-color 0.15s ease-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.custom-control-label::after, .custom-control-label::before {
    /* width: 20px; */
    height: 20px;
    border-radius: 0;
    background-color: #000;
    border: 1px solid #000;
    position: absolute;
    top: .25rem;
    left: 0;
    display: block;
    width: 1rem;
    height: 1rem;
    content: "";
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 100% 75%;
}
/* .custom-control-label:after {
    background: no-repeat 50% / 50% 50%;
} */
.user-lock-nav .nav-item > .sub-menu {
    margin-left: 30px;
    background-color: #d0d0d0;
}
.user-lock-nav ul li {
    padding: 5px 10px;
}
.user-lock-container .fa-angle-down {
    font-size: 16px;
    color: #000;
}
.user-lock-nav .custom-control {
    display: inline-block;
}
.custom-control-input:disabled + .custom-control-label {
    color: #aaa;
    opacity: 0.7;
}

</style>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>General Lock</h2>
                <form method="post" id="form-search">
                    <div class="m-t-20">
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="search-client_name" id="search-client_name" placeholder="Search By Client Name"></select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="password" name="tpassword" id="tpassword" placeholder="Transaction Code" class="form-control d-inline-block">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!-- <label style="width: 100%">&nbsp</label> -->
                                <button type="submit" class="btn btn-diamond" id="loaddata">Load</button>
                                <button type="reset" class="btn btn-diamond" style="background-color: #eff2f7;border-color: #eff2f7;color: black;">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
    </div>

    <div>
        <div class="row mt-3" id="casino-list-container">
            <!-- <div class="col-lg-6 col-12" style="display: none;">
                <h4 class="ptitle">Events</h4>
                <ul id="accordian1" class="navbar-nav user-lock-nav">
                    <li class="nav-item dropdown show"><a title="click here to expand" data-toggle="collapse" data-target="#menu-40" role="button" aria-expanded="true" class="arrow-icon"><i class="fas fa-angle-down"></i></a> <span class="custom-control custom-checkbox"><input type="checkbox" id="40" class="custom-control-input" value="40"> <label for="40" class="custom-control-label">Politics</label></span>
                        <ul id="menu-40" data-parent="#accordian1" class="sub-menu collapse show" style="">
                            <li><a title="click here to expand" data-toggle="collapse" data-target="#menu-8821780" role="button" aria-expanded="true" class="arrow-icon"><i class="fas fa-angle-down"></i></a> <span class="custom-control custom-checkbox"><input type="checkbox" id="408821780" class="custom-control-input" value="8821780"> <label for="408821780" class="custom-control-label">Assembly Election 2025</label></span>
                                <u l id="menu-8821780" data-parent="#menu-40" class="sub-menu collapse show" style="">
                                    <li><a title="click here to expand" data-toggle="collapse" data-target="#menu-602080933" role="button" aria-expanded="true" class="arrow-icon"><i class="fas fa-angle-down"></i></a> <span class="custom-control custom-checkbox"><input type="checkbox" id="408821780602080933" class="custom-control-input" value="602080933"> <label for="408821780602080933" class="custom-control-label">Assembly Election 2025</label></span>
                                        <ul id="menu-602080933" data-parent="#menu-8821780" class="sub-menu collapse show" style="">
                                            <h5 class="mb-0 font-size-16">
                                                Match
                                            </h5>
                                            <li><span class="custom-control custom-checkbox"><input type="checkbox" id="4088217806020809338144404033474" class="custom-control-input" value="8144404033474"> <label for="4088217806020809338144404033474" class="custom-control-label">OVER</label></span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div> -->
          
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

<style>
    .back {
        box-shadow: inset 3px 0 0px #72bbef;
        background-color: #72bbef57 !important;
        border: 0px solid #72bbef !important;
    }

    .lay {
        box-shadow: inset 3px 0 0px #f994ba;
        background-color: #f994ba57 !important;
        border: 0px solid #f994ba !important;
    }
</style>
<?php
$SPORTS = array(
    '4' => 'Cricket',
    '1' => 'Soccer',
    '2' => 'Tennis',
    'ODITEENPATTI' => '1 Day Teenpatti',
    'TESTTEENPATTI' => 'Test Teenpatti',
    '2020TEENPATTI' => '20-20 Teenpatti',
    'OPENTEENPATTI'    => 'Open Teenpatti',
    'LUCKY7' =>    'Lucky 7 - A',
    'LUCKY7B' =>    'Lucky 7 - B',
    'ODI_POKER'    =>    '1 Day Poker',
    '2020_POKER' =>    '20-20 Poker',
    '6_PLAYER_POKER' => '6 Player Poker',
    'ODI_DRAGON_TIGER'    =>    '1 Day Dragon Tiger',
    '2020_DRAGON_TIGER'    =>    '20-20 Dragon Tiger',
    '2020_DRAGON_TIGER2' =>    '20-20 Dragon Tiger - 2',
    'DTL20' => 'DTL 20',
    'BACCARAT' => 'BACCARAT',
    'BACCARAT2' => 'BACCARAT 2',
    'AB20' => 'Andar Bahar Casino',
    '3_CARD_J' => '3 Cards Judgement',
    '32CARDS' => '32 Cards - A',
    '32CARDSB' => '32 Cards - B', 
    '2020_CRICKET_MATCH' => '2020 Cricket Casino',
    'CASINO_METER' => 'Casino Meter',
    'CASINO_WAR' => 'War',
    'INSTANT_WORLI' => 'Instant Worli',
    'AMAR_AKBAR_ANTHONY' => 'Amar Akbar Anthony',
    'B_TABLE' => 'Bollywood Table'
);

$casino_option = '';
foreach (unserialize(GAME_LIST) as $key => $value) {
    $casino_option .= '<option value="' . $key . '">' . $value . '</option>';
}

$CASINO = array(
    '4' => 'Cricket',
    '1' => 'Soccer',
    '2' => 'Tennis',
);
$sports_option = '';
foreach ($CASINO as $key => $value) {
    $sports_option .= '<option value="' . $key . '">' . $value . '</option>';
}
?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo WEB_URL; ?>/js/socket.io.js" type="text/javascript"></script>
<link href="<?php echo MASTER_URL; ?>/toastr/toastr.min.css?319" rel="stylesheet">
<script src="<?php echo MASTER_URL; ?>/toastr/toastr.min.js?213" type="text/javascript"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    var xhr, xhr_ac_details;
    var _user_id = 0;
    var id;
    var game_type;
    var event_type;
    var market_type;
    var market_id;
    var client_name;

    let cricketMatches = []; 
    let footballMatches = [];
    let tennisMatches = [];


   var matchesBySport = {
    "1": [],
    "2": [],
    "4": []
};

    var socket = io('<?php echo GAME_IP; ?>');
        socket.on('connect', function () {
            
            socket.emit('getMatchesOnlyOnce', {
                eventType: 4
            });
        });

        socket.on('eventGetMatchesOnlyOnce', function (data) {
            
            var data1 = data;
            if (data) {
                for(var x in data1){
			        data.sport = data1[x];
			
			if (data.sport) {
                
				if (data.sport.body) {
                    var list_sport = data.sport.body;
					eventNotIncluded = data.eventNotIncluded;
					
					var result = Object.keys(data.sport.body).length;
					if (result > 0) {
						var main_datas = data;
						var main_x = data;
                        
						smdl_c = ['1', '2'];
						mdl_c = ['1', '2'];
						dl_c = ['1', '2'];
						smdl_s = ['1', '2'];
						smdl_b = ['1', '2'];
						smdl_r = ['1', '2'];
						mdl_s = ['1', '2'];
						dl_s = ['1', '2'];
						smdl_t = ['1', '2'];
						mdl_t = ['1', '2'];
						mdl_b = ['1', '2'];
						mdl_r = ['1', '2'];
						dl_t = ['1', '2'];
						dl_b = ['1', '2'];
						dl_r = ['1', '2'];
						evnt = ['1', '2'];
						evnt = eventNotIncluded || [];
					
						data = main_datas.sport;
						
						key = Object.keys(data.body)[0];
						eventType = parseInt(data.body[key].SportId);
                          
                       

						for (var i in data.body) {

							if (data.body[i]) {
								event_id = data.body[i].matchid.toString();
								marketId = data.body[i].marketid;

								n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
								n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString());
								n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());

								s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
								s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
								s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());

								t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
								t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
								t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());

								b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
								b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
								b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());

								r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
								r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
								r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
								e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
								if (!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !r1 && !r2 && !r3 && !e1) {
								
								
									matchName = data.body[i].matchName;
                                        marketId = data.body[i].marketid;

										 matchesBySport[eventType].push({
                                            matchName: matchName,
                                            marketId: marketId
                                        });
									
								}
							}
						}
                    }
                }
            }
        }
        }
            
        });

        

    function set_search_single(field_name, field_val) {
        if ($.trim(field_name) != "" && $.trim(field_val) != "") {
            return ("&" + $.trim(field_name) + "=" + (encodeURIComponent($.trim(field_val))));
        } else {
            return "";
        }
    }

    function preparesearch() {
        var search_string = "";
        search_string += set_search_single("client_name", $('#search-client_name').val());
        return search_string;
    }


    $(document).ready(function() {

        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            placeholder: '',
            ajax: {
                url: MASTER_URL + '/reports/userlock/get_clients',
                data: function(params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                }
            },
        });


        
$('#casino-list-container').on('change','input[type="checkbox"]', function() {
    
    var isChecked = $(this).is(':checked');
    var checkbox = $(this);

    var parentId = '0';
    var childId = '';

    if (checkbox.hasClass('casino-checkbox')) {
       var namedClass = checkbox.data('named');
        parentId = checkbox.val();
        // console.log("named",checkbox.data('named'));
        
        // $("."+checkbox.data('named')).removeAttr('disabled');
        if (!isChecked) {
        $("." + namedClass).prop('disabled', false);
    } else {
        $("." + namedClass).prop('disabled', true);
    }
    } else if (checkbox.hasClass('match-checkbox')) {
       
        childId = checkbox.val();
        parentId = checkbox.data('parent');
        
    }
    var username = $('#search-client_name').val();

    // var casinoKey = $(this).val();     
    // var username = $('#search-client_name').val();  
    // var isChecked = $(this).is(':checked');

    // $(this).prop('disabled', true);

    $.ajax({
        url: MASTER_URL + '/reports/userlock/update_status',
        method: 'POST',
        data: {
            // casino_name: casinoKey,
            child_id: childId || 'all',
            sport_type: parentId || '0',
            status: isChecked ? 1 : 0,              // Send 1 for checked, 0 for unchecked
            username : username,
        },
        success: function(response) {
            if (response.status === 'ok') {
                toastr.success("Status updated");
            } 
            // else {
            //     toastr.warning(response.message || "Failed to update");
            // }
        },
    
    });
});


        $('#form-search').on('submit', function() {
            console.log("toster call");

            var tpassword = $("#tpassword").val();
            var client_name = $("#search-client_name").val();
            console.log("client_name",client_name);
            
            $("#bet-error-class").removeClass("b-toast-danger");
            $("#bet-error-class").removeClass("b-toast-success");

            if (client_name === ''||client_name == null ) {

                toastr.clear();
                toastr.warning("Please select user name.", "", {
                    "timeOut": "3000",
                    "iconClass": "toast-warning",
                    "positionClass": "toast-top-center",
                    "extendedTImeout": "0",
                    "closeButton": true,
                    "progressBar": false,
                });

                // toastr.error("");
                return false;
            }

            if (tpassword === '') {

                toastr.clear();
                toastr.warning("Please enter the transaction password.", "", {
                    "timeOut": "3000",
                    "iconClass": "toast-warning",
                    "positionClass": "toast-top-center",
                    "extendedTImeout": "0",
                    "closeButton": true,
                    "progressBar": false,
                });

                // toastr.error("");
                return false;
            }

             

            $.ajax({
                url: MASTER_URL + '/reports/userlock/check_pwd',
                method: 'POST',
                dataType: 'json',
                data: {
                    tpassword: tpassword,
                   client_name:client_name,
                },
                success: function(response) {

                    var message = response['message'];
                    var casino_names = response['casino_names'];
                    var sport_type = response['sport_type'];

                    if (response.status == 'ok') {
                        
                         var casinoHTML = `
                        
                         <div class="col-lg-6 col-12">
                            <h4 class="ptitle">Events</h4>
                            <ul id="accordian1" class="navbar-nav user-lock-nav">`;
                            var gameList = <?php echo json_encode($CASINO); ?>;
                            $.each(gameList, function(key, value) {
                                 var checked = '';
                                 var disableChildren = false;
                                 
                        if ($.inArray(key, sport_type) !== -1) {
                            checked = 'checked';
                           disableChildren = true;
                        }
                               casinoHTML += `
                            <li class="nav-item dropdown">
                                <a title="click here to expand" data-toggle="collapse" data-target="#menu-${key}" role="button" aria-expanded="true" class="arrow-icon">
                                    <i class="fas fa-angle-down"></i>
                                    </a> 
                                <span class="custom-control custom-checkbox">
                                    <input type="checkbox" id="${key}" ${checked} class="custom-control-input casino-checkbox" data-named="${value}" value="${key}">
                                    <label for="${key}" class="custom-control-label">${value}</label>
                                </span>

                                <ul id="menu-${key}" data-parent="#accordian1" class="sub-menu collapse " style="">`;
                                      matchesBySport[key].forEach(match => {
                                        var matchChecked = '';
                                        var matchDisabled = '';
                                        
                                    if ($.inArray(match.marketId.toString(), casino_names) !== -1) {
                                        matchChecked = 'checked';
                                    }
                                    if (disableChildren) {
                                            matchDisabled = 'disabled';
                                        }

                                    casinoHTML += ` 
                                    <li> 
                                        <span class="custom-control custom-checkbox">
                                            <input type="checkbox" id="${match.marketId}" ${matchChecked} ${matchDisabled} class="custom-control-input match-checkbox  ${value}" value="${match.marketId}" data-parent="${key}"> 
                                            <label for="${match.marketId}" class="custom-control-label">${match.matchName}</label>
                                        </span>
                                    </li>`;
                                         });
                                   
                                casinoHTML += `</ul>
                            </li>`;
                            });
                                    
                              casinoHTML += `</ul>
                        </div>
                             <div class="col-lg-6 col-12">
                    <h4 class="ptitle">Casino List</h4>
                    <ul class="user-lock-nav">`;
                     var gameList = <?php echo json_encode(unserialize(GAME_LIST)); ?>;
                     $.each(gameList, function(key, value) {
                        var checked = '';
                        if ($.inArray(key, casino_names) !== -1) {
                            checked = 'checked';
                        }
                            casinoHTML += `
                                <li>
                                    <span class="custom-control custom-checkbox">
                                        <input type="checkbox" id="${key}" ${checked} class="custom-control-input match-checkbox" value="${key}" data-parent="0">
                                        <label for="${key}" class="custom-control-label">${value}</label>
                                    </span>
                                </li>
                            `;
                        });
           
                   casinoHTML +=` </ul>
                                    </div>
                                    `;
                           $('#casino-list-container').html(casinoHTML);
                    } else {
                        toastr.clear()
                        toastr.warning("", message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-center",
                            "extendedTImeout": "0"
                        });
                        /* $("#bet-error-class").addClass("b-toast-danger"); */
                    }

                },


            });



            return false;
        });


        $('#form-search').on('reset', function() {

            $('#search-client_name').html('');
            $('#tpassword').val('');

            // setTimeout(function() {
            //     call_page(0);
            // }, 1);
        });

        // $('#common_search').on('keyup', function() {
        //     call_page();
        // });

        $('#btn-export_to_excel').on('click', function() {
            window.location = MASTER_URL + '/reports/account_statement/export_to_excel/?' + preparesearch();
            return false;
        });

        
    });
</script>
<style>
    .custom-control-inline {
        align-items: center;
    }
</style>