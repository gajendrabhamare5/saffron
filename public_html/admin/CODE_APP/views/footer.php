<?php 
	$userdata = $handler->users->data();
?>
</div>
</div>
</div>
<style>
	.toast-title{
    color: #000;
    font-size: 14px;
}
</style>
 
<footer>

    <div class="modal fade" id="modal-user-detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">User Detail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" id="search-user-details">
                </div>
            </div>
        </div>
    </div>

</footer>
</div>
<link href="../../toastr/toastr.min.css?319" rel="stylesheet">
<script src="../../toastr/toastr.min.js?213" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<script src="<?php echo MASTER_URL; ?>/assets/js/all.js?1" type="text/javascript"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/custom.js?11222" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>

<script type="text/javascript">
	var websocketurl = '<?php echo GAME_IP; ?>';
var socket123 = io("<?php echo GAME_IP; ?>");

var cricket_tree_html = '';
	var soccer_tree_html = '';
	var tennis_tree_html = '';

	
    var _socket = io.connect(websocketurl, {
            transports: ['websocket']
    });
    
	<?php
		if($userdata['Id'] != 1){
	?>
	_socket.on('otherLoggedInUsers',function(args){
		var userId = "<?php echo base64_encode($userdata['Id']);?>";
		var randomString = "<?php echo $handler->session->userdata('LOGIN_STRING');?>";
		var siteId = "<?php echo SITE_ID;?>";
		if((args.userId == userId) && (args.randomString != randomString) && (args.siteId == siteId)){
			location.href = "/admin/logout";
		}
	});
<?php	
		}
	?>
    
	
	_socket.on("pinged",function(args){
		_socket.emit('ponged',{user_id:"<?php echo $userdata['Id'];?>", siteId: <?php echo SITE_ID; ?>});
	});

		
	var cric_loaded = false;
	var socc_loaded = false;
	var tenn_loaded = false;
	
	_socket.on('connect', function () {

		_socket.emit('getMatches', {
			eventType: 1
		});
		
		_socket.emit('getMatches', {
			eventType: 4
		});
		
		_socket.emit('getMatches', {
			eventType: 2
		});
	});
	
	_socket.on('eventGetLiveEventName', function (data) {
	
	
		if(!(cric_loaded && socc_loaded && tenn_loaded)){	
		
			if (data) {
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

							data = main_datas.sport;

							key = Object.keys(data.body)[0];
							eventType = parseInt(data.body[key].SportId);
						// console.log("eventType",eventType);
						
							var cricCompetitions = {};
						
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

										if (eventType == 4) {
									
											var competition_name = data.body[i].cname;
										
											if(cricCompetitions[competition_name] == undefined)
												cricCompetitions[competition_name] = [];
											
											cricCompetitions[competition_name].push(data.body[i]);
										
										}
									
										if (eventType == 1) {
											// console.log('event type 1');
											event_name = data.body[i].matchName;

											marketTime = data.body[i].matchdate;
											marketDateTime = data.body[i].matchdate;


											var temp_event_name = event_name.split('/');
											temp_event_name = (temp_event_name[0]).split(' v ');
											var home_team = (temp_event_name[0]).trim();
										
											if(event_id == '30306599')
												continue;
										
											if(['Karnataka','Jammu And Kashmir','Baroda','Uttarakhand','Chhattisgarh','Himachal Pradesh','Gujarat','Maharashtra','Jharkhand','Tamil Nadu','Odisha','Bengal','Railways','Tripura','Punjab','Uttar Pradesh','','Hyderabad','Chandigarh','Nagaland','Bihar','Arunachal Pradesh','Mumbai','Delhi','Haryana','Andhra','Mizoram','Sikkim','Vidarbha','Rajasthan','Services','Saurashtra','Meghalaya','Manipur','Kerala','Puducherry','Madhya Pradesh','Goa'].includes(home_team)){
												continue;
											}


											inPlay = data.body[i].inPlay || "0";
											marketId = data.body[i].marketid;
											marketinPlay = data.body[i].inPlay || "0";
											isFancy = data.body[i].fancy || "0";
											is_tv = data.body[i].tv || "0";
											fancySpan = "";
											if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
												market_status = "active";
											} else {
												market_status = "";

											}

											if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
												fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
											} else {
												fancy_status = "";

											}

											if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
												tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
											} else {
												tv_status = "";

											}


											b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
											b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
											b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b3 : "-";


											l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
											l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
											l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";


											if (b11 == undefined || b11 == "undefined") {
												b11 = 0;
											}
											if (b21 == undefined || b21 == "undefined") {
												b21 = 0;
											}
											if (b31 == undefined || b31 == "undefined") {
												b31 = 0;
											}


											if (l11 == undefined || l11 == "undefined") {
												l11 = 0;
											}
											if (l21 == undefined || l21 == "undefined") {
												l21 = 0;
											}
											if (l31 == undefined || l31 == "undefined") {
												l31 = 0;
											}
										
											soccer_tree_html += 
											'	<li class="">'+
											'	   <a href="/admin/events-analysis?eventType='+ eventType +'&amp;eventId='+ event_id +'&marketId='+ marketId + '" style="cursor: pointer;">'+ event_name +'</a>'+
											'	</li>';
										}
									
										if (eventType == 2) {
											// console.log('event type 2');
											event_name = data.body[i].matchName;

											marketTime = data.body[i].matchdate;
											marketDateTime = data.body[i].matchdate;


											var temp_event_name = event_name.split('/');
											temp_event_name = (temp_event_name[0]).split(' v ');
											var home_team = (temp_event_name[0]).trim();
										
											if(event_id == '30306599')
												continue;
										
											if(['Karnataka','Jammu And Kashmir','Baroda','Uttarakhand','Chhattisgarh','Himachal Pradesh','Gujarat','Maharashtra','Jharkhand','Tamil Nadu','Odisha','Bengal','Railways','Tripura','Punjab','Uttar Pradesh','','Hyderabad','Chandigarh','Nagaland','Bihar','Arunachal Pradesh','Mumbai','Delhi','Haryana','Andhra','Mizoram','Sikkim','Vidarbha','Rajasthan','Services','Saurashtra','Meghalaya','Manipur','Kerala','Puducherry','Madhya Pradesh','Goa'].includes(home_team)){
												continue;
											}


											inPlay = data.body[i].inPlay || "0";
											marketId = data.body[i].marketid;
											marketinPlay = data.body[i].inPlay || "0";
											isFancy = data.body[i].fancy || "0";
											is_tv = data.body[i].tv || "0";
											fancySpan = "";
											if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
												market_status = "active";
											} else {
												market_status = "";

											}

											if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
												fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
											} else {
												fancy_status = "";

											}

											if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
												tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
											} else {
												tv_status = "";

											}


											b11 = parseFloat(data.body[i].b1) != 0 ? data.body[i].b1 : "-";
											b21 = parseFloat(data.body[i].b2) != 0 ? data.body[i].b2 : "-";
											b31 = parseFloat(data.body[i].b3) != 0 ? data.body[i].b3 : "-";


											l11 = parseFloat(data.body[i].l1) != 0 ? data.body[i].l1 : "-";
											l21 = parseFloat(data.body[i].l2) != 0 ? data.body[i].l2 : "-";
											l31 = parseFloat(data.body[i].l3) != 0 ? data.body[i].l3 : "-";


											if (b11 == undefined || b11 == "undefined") {
												b11 = 0;
											}
											if (b21 == undefined || b21 == "undefined") {
												b21 = 0;
											}
											if (b31 == undefined || b31 == "undefined") {
												b31 = 0;
											}


											if (l11 == undefined || l11 == "undefined") {
												l11 = 0;
											}
											if (l21 == undefined || l21 == "undefined") {
												l21 = 0;
											}
											if (l31 == undefined || l31 == "undefined") {
												l31 = 0;
											}
										
											tennis_tree_html += 
											'	<li>'+
											'	   <a href="/admin/events-analysis?eventType='+ eventType +'&amp;eventId='+ event_id +'&marketId='+ marketId + '" style="cursor: pointer;">'+ event_name +'</a>'+
											'	</li>';
										}

									}
								}

							}


							if (eventType == 4) {
								// console.log('event type 4');
							
	 							// console.log('CompetitionCric',cricCompetitions);
							
								for(var i in cricCompetitions){
									cricCompetition = cricCompetitions[i];
	 								//console.log('CompetitionCric',cricCompetition);

									/* cricket_tree_html +=
											'	<li class="mtree-node">'+
											'	   <a href="#">'+ i +'</a>'+
											'		<ul class="mtree-level-2">'; */
				
									for(var ii in cricCompetition){
										cricEvent = cricCompetition[ii];
									
											event_name = cricEvent.matchName;
											event_id = cricEvent.matchid;

											marketTime = cricEvent.matchdate;
											marketDateTime = cricEvent.matchdate;

											inPlay = cricEvent.inPlay || "0";
											marketId = cricEvent.marketid;
											marketinPlay = cricEvent.inPlay || "0";
											isFancy = cricEvent.fancy || "0";
											is_tv = cricEvent.tv || "0";
											fancySpan = "";
											if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" || marketinPlay == 1) {
												market_status = "active";
											} else {
												market_status = "";

											}

											if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
												fancy_status = "<span class='game-icon'><img src='storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
											} else {
												fancy_status = "";
											}

											if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
												tv_status = "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
											} else {
												tv_status = "";
											}


											b11 = parseFloat(cricEvent.b1) != 0 ? cricEvent.b1 : "-";
											b21 = parseFloat(cricEvent.b2) != 0 ? cricEvent.b2 : "-";
											b31 = parseFloat(cricEvent.b3) != 0 ? cricEvent.b3 : "-";


											l11 = parseFloat(cricEvent.l1) != 0 ? cricEvent.l1 : "-";
											l21 = parseFloat(cricEvent.l2) != 0 ? cricEvent.l2 : "-";
											l31 = parseFloat(cricEvent.l3) != 0 ? cricEvent.l3 : "-";


											if (b11 == undefined || b11 == "undefined") {
												b11 = 0;
											}
											if (b21 == undefined || b21 == "undefined") {
												b21 = 0;
											}
											if (b31 == undefined || b31 == "undefined") {
												b31 = 0;
											}


											if (l11 == undefined || l11 == "undefined") {
												l11 = 0;
											}
											if (l21 == undefined || l21 == "undefined") {
												l21 = 0;
											}
											if (l31 == undefined || l31 == "undefined") {
												l31 = 0;
											}
										
											cricket_tree_html += 
											'	<li class="">'+
											'	   <a href="/admin/events-analysis?eventType='+ eventType +'&amp;eventId='+ event_id +'&marketId='+ marketId + '" style="cursor: pointer;">'+ event_name +'</a>'+
											'	</li>';
									}
								
									/* cricket_tree_html += 
											'		</ul>';
											'	</li>'; */
								}
							
								$("#tree_cricket").html(cricket_tree_html);
								cricket_tree_html = "";
								cricCompetitions = [];
								cric_loaded = true;
								loadMtree();
							}
							if (eventType == 1) {
								$("#tree_soccer").html(soccer_tree_html);
								soccer_tree_html = "";
								socc_loaded = true;
								loadMtree();
							}
							if (eventType == 2) {
								$("#tree_tennis").html(tennis_tree_html);
								tennis_tree_html = "";
								tenn_loaded = true;
								loadMtree();
							}
						
						}
					}
				}
			}
		
		}
	});
	
	
	function loadMtree(){
		if(cric_loaded && socc_loaded && tenn_loaded){	
			console.log('initialize_tree');
			initialize_mtree();
		}
	}

	function initialize_mtree(){
	if ($('ul.mtree').length) {
		var collapsed = true;
		var close_same_level = false;
		var duration = 400;
		var listAnim = true;
		var easing = 'easeOutQuart';
		$('.mtree ul').css({
			'overflow': 'hidden',
			'height': (collapsed) ? 0 : 'auto',
			'display': (collapsed) ? 'none' : 'block'
		});
		var node = $('.mtree li:has(ul)');
		node.each(function(index, val) {
			$(this).children(':first-child').css('cursor', 'pointer')
			$(this).addClass('mtree-node mtree-' + ((collapsed) ? 'closed' : 'open'));
			$(this).children('ul').addClass('mtree-level-' + ($(this).parentsUntil($('ul.mtree'), 'ul').length + 1));
		});
		$('.mtree li > *:first-child').on('click.mtree-active', function(e) {
			if ($(this).parent().hasClass('mtree-closed')) {
				$('.mtree-active').not($(this).parent()).removeClass('mtree-active');
				$(this).parent().addClass('mtree-active');
			} else if ($(this).parent().hasClass('mtree-open')) {
				$(this).parent().removeClass('mtree-active');
			} else {
				$('.mtree-active').not($(this).parent()).removeClass('mtree-active');
				$(this).parent().toggleClass('mtree-active');
			}
		});
		node.children(':first-child').on('click.mtree', function(e) {
			var el = $(this).parent().children('ul').first();
			var isOpen = $(this).parent().hasClass('mtree-open');
			if ((close_same_level || $('.csl').hasClass('active')) && !isOpen) {
				var close_items = $(this).closest('ul').children('.mtree-open').not($(this).parent()).children('ul');
				if ($.Velocity) {
					close_items.velocity({
						height: 0
					}, {
						duration: duration,
						easing: easing,
						display: 'none',
						delay: 100,
						complete: function() {
							setNodeClass($(this).parent(), true)
						}
					});
				} else {
					close_items.delay(100).slideToggle(duration, function() {
						setNodeClass($(this).parent(), true);
					});
				}
			}
			el.css({
				'height': 'auto'
			});
			if (!isOpen && $.Velocity && listAnim) el.find(' > li, li.mtree-open > ul > li').css({
				'opacity': 0
			}).velocity('stop').velocity('list');
			if ($.Velocity) {
				el.velocity('stop').velocity({
					height: isOpen ? [0, el.outerHeight()] : [el.outerHeight(), 0]
				}, {
					queue: false,
					duration: duration,
					easing: easing,
					display: isOpen ? 'none' : 'block',
					begin: setNodeClass($(this).parent(), isOpen),
					complete: function() {
						if (!isOpen) $(this).css('height', 'auto');
					}
				});
			} else {
				setNodeClass($(this).parent(), isOpen);
				el.slideToggle(duration);
			}
			e.preventDefault();
		});

		function setNodeClass(el, isOpen) {
			if (isOpen) {
				el.removeClass('mtree-open').addClass('mtree-closed');
			} else {
				el.removeClass('mtree-closed').addClass('mtree-open');
			}
		}
		if ($.Velocity && listAnim) {
			$.Velocity.Sequences.list = function(element, options, index, size) {
				$.Velocity.animate(element, {
					opacity: [1, 0],
					translateY: [0, -(index + 1)]
				}, {
					delay: index * (duration / size / 2),
					duration: duration,
					easing: easing
				});
			};
		}
		if ($('.mtree').css('opacity') == 0) {
			if ($.Velocity) {
				$('.mtree').css('opacity', 1).children().css('opacity', 0).velocity('list');
			} else {
				$('.mtree').show(200);
			}
		}
	}
}

</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#user-account_summary').on('click', function () {
            if (!$('#master-balance-detail').is(':hidden')) {
                $('.loader-ac_balance').show();
                $.ajax({
                    type: 'POST',
                    url: MASTER_URL + '/account-summary',
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.results) {
                            $('#ac_summary-credit_reference').html(data.results.credit_reference);
                            $('#ac_summary-down_level_balances').html(data.results.down_level_balances);
                            $('#ac_summary-down_level_credit_reference').html(data.results.down_level_credit_reference);
                            $('#ac_summary-master_balance').html(data.results.master_balance);
                            $('#ac_summary-up_pl').html(data.results.up_pl);
                            $('#ac_summary-down_pl').html(data.results.down_pl);
                            $('#ac_summary-available_balance').html(data.results.available_balance);
                            $('#ac_summary-available_balance_with_pl').html(data.results.available_balance_with_pl);
                            $('#ac_summary-my_pl').html(data.results.my_pl);
                        }
                        $('.loader-ac_balance').hide();
                    }
                });
                return false;
            }
        });
        $("#search-account_details").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: MASTER_URL + '/reports/common/get_clients',
                    data: {'search': request.term, 'type': 'public'},
                    type: 'get',
                    dataType: "json",
                    success: function (data) {
                        response($.map(data.results, function (item) {
                            return item.text;
                        }));
                    },
                    error: function (data) {
                    }
                });
            },
            select: function (event, ui) {
                $("#clientList").attr("data-value", ui.item.value);
            },
            minLength: 3,
            autoFill: true,
        });
        $("#search-account_details").on('keyup', function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                $('#clientList').trigger('click');
            }
        });
        $('#clientList').on('click', function () {

            var userId = $(this).attr("data-value");
            if ($.trim(userId) == "") {
                // alert("Please select user!");
				 toastr.clear()
                        toastr.warning("", "Please select user!", {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                return;
            }
            $.ajax({
                url: MASTER_URL + "/reports/common/useralldetails",
                dataType: "json",
                data: {"uid": userId},
                method: "POST",
                success: function (response) {
                    if (response.success == true) {
                        $("#search-user-details").html(response.html);
                        $("#modal-user-detail").modal("show");
                    }
                }
            });
        });
        
       // setInterval(auth,1000 * 6);
    });
    
	function updateUserStatus(){
		$.ajax({
			url		:	MASTER_URL + "/reports/common/update_user_status",
			success	:	function(response){
			}
		});
	}

	updateUserStatus();
	setInterval(function(){
		updateUserStatus();
	},5000);
    function auth(){
       //  $.get(MASTER_URL + "/home/auth",function (responce){
//             if(!responce.is_login){
//                 window.location = '/admin/login';
//             }
//         });
    }
</script>
	
	<script>
	
	setTimeout(function(){ injectJS(); }, 1000);

function injectJS(){    
        var frame =  $('iframe');
        var contents =  frame.contents();
        var body = contents.find('body').attr("oncontextmenu", "return false");
        var body = contents.find('body').append('<div>New Div</div>');    
    }
	$(document).bind("contextmenu",function(e) {
 e.preventDefault();
});

$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});

document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
}


/* setInterval(function(){
	var devtools = function() {};
	devtools.toString = function() {
	  if (!this.opened) {
	  	debugger;
	  }
	  this.opened = true;
	}
	console.log('%c', devtools);
},1000);
 */


</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="92c0bcc2ae8499e72e572f86-|49" defer=""></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

</body>
</html>