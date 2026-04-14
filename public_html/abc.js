
/* if(typeof markettype === 'undefined') {
		markettype = 1;
} */
	setTimeout(function(){
		if(typeof markettype === 'undefined') {
			markettype = 1;
		}
		refresh(markettype);
		
		if(typeof eventIdOpenbet === 'undefined') {
			eventIdOpenbet = 1;
		}
		
		refresh(markettype,eventIdOpenbet);
	},2000);

	function refresh(markettype = 1,eventId=1){		
		var open_bet = [];
		var html_open_bet_details = "";
		$.ajax({			 
			type: 'POST',			 
			url: 'ajaxfiles/open_bet.php',			 
			dataType: 'json',			 
			data: {markettype:markettype,eventId:eventId},			 
			success: function(response) {				 				
				var check_status = response['status'];
				if(check_status == "ok"){
										
					open_bet_data = response['open_bet_data'];
					
					/* if(markettype == '2020_CRICKET_MATCH')
						cc20_explosure(open_bet_data); */
						
                    if(open_bet_data){											
						for(i=0;i<open_bet_data.length;i++){												
							bet_stack = open_bet_data[i].bet_stack;
							market_name = open_bet_data[i].market_name;
							bet_odds = open_bet_data[i].bet_odds;
							bet_runs = open_bet_data[i].bet_runs;
							bet_runs2 = open_bet_data[i].bet_runs2;
							event_name = open_bet_data[i].event_name;
							bet_type = open_bet_data[i].bet_type;
							market_type = open_bet_data[i].market_type;
							if(bet_type == "No" || bet_type == "Lay"){							
								class_type = "lay";
							}
							else{							
								class_type = "back";
							}	
                                                        
							var odds = bet_odds;
							
							if(market_type == "BOOKMAKER_ODDS" || market_type == "BOOKMAKERSMALL_ODDS"){
								odds = parseFloat(odds) * 100 - 100;
								odds = odds.toFixed(2);
							}
							
							if(market_type == "KHADO_ODDS"){
								odds = bet_runs;
								market_name += '-'+ ((bet_runs2 - bet_runs) + 1);
							}
							else if(bet_runs > 0){
								odds = bet_runs;
								market_name += ' / '+bet_odds;
							}
                                                        
							html_open_bet_details += "<tr class='"+class_type+" open_bet'><td>"+market_name+"</td> <td class='text-right'><span>"+odds+"</span></td> <td style='text-align: right;'>"+bet_stack+"</td></tr>";
						}					
						$(".open_bet").remove();
						$("#matched_bet").after(html_open_bet_details);
					}else{
						$(".open_bet").remove();
					}				                
				}			 
			}		 
		});
		$.ajax({        
			type: 'POST',        
			url: 'ajaxfiles/refresh_balance.php',        
			dataType: 'json',       
			data: "",        
			success: function(response) {           
				var account_balance = response.balance;
            	var account_exposure = response.exposure;
            	var account_winning_exposure = response.winning;
			    $("#betCredit").text(account_balance);
            	$("#betExposure").text(account_exposure);
            	$("#betWinningExposure").text(account_winning_exposure);
        	}  
    	});
		
		main_event_id = $(".round_no").text();
		
		$.ajax({			 
			type: 'POST',			 
			url: 'ajaxfiles/get_casino_on_page_exposure.php',			 
			dataType: 'json',			 
			data: {markettype:markettype,main_event_id:main_event_id},			 
			success: function(response) {
				status = response.status;
				
				if(status == "ok"){
					total_exposure_data = response.data;
					
					
					
						$(".market_exposure").css("color","black");
						$(".market_exposure").text("0");
										
					for(var exp in total_exposure_data){
						market_id = total_exposure_data[exp].market_id;
						total_exposure = total_exposure_data[exp].total_exposure;
						
						if(total_exposure < 0){
							$(".market_"+market_id+"_b_exposure").css("color","red");
							$(".market_"+market_id+"_b_exposure").text(total_exposure);
						}else{
							$(".market_"+market_id+"_b_exposure").css("color","green");
							$(".market_"+market_id+"_b_exposure").text(total_exposure);
						}
						
					}
					
					
				}
			}
		});
	}
	
	/* function cc20_explosure(open_bet_data){
	
		if(event_name == "2020_CRICKET_MATCH"){
			
		}
	} */
	
	//setInterval(check_authantication,1000 * 30)
	
	function check_authantication(){
		$.ajax({
    		type: 'POST',
    		url: 'ajaxfiles/auth.php',
    		dataType: 'json',
    		success: function(response) {
        		if (response.status == false) {
	        		window.location.href='login';
        		}
    		}
		});
	}

	jQuery(document).on("click", "#headerMenu", function () {
		if($(".headerMenu1").is(":visible")){
			$(".headerMenu1").hide();
		}
		else{
			$(".headerMenu1").show();
		}
	});
	jQuery(document).on("click", "#searchHeader", function () {
		if($( "#searchHeader1" ).hasClass("search-input-show")){
			$("#searchHeader1").removeClass("search-input-show");
		}
		else{
			$("#searchHeader1").addClass("search-input-show");
		}
	});

	jQuery(document).on("click", ".close", function () {
		$("#errorMsg").hide();
	});
	
	$(document).ready(function() { 
		
		$('#btn_exposure_popup').on('click',function (){
			$.ajax({
				type: 'POST',
				url: 'ajaxfiles/myExposure',
				dataType: 'json',
				success: function(response) {
					if (response) {
					
						var popup_body = '';
						for(var i = 0; i < response.length; i++){
						
							var eventType = response[i].eventType;
							var sport_category = 'Other';
							if(eventType == 1){
								sport_category = 'Soccer';
							}
							else if (eventType == 2){
								sport_category = 'Tennis';
							}
							else if (eventType == 4){
								sport_category = 'Cricket';
							}
							else if (eventType == 8){
								sport_category = 'Election';
							}
							
							popup_body += '<tr>';
							popup_body += '	<td>'+sport_category+'</td>';
							popup_body += '	<td><a href="/event_full_market?eventType='+response[i].eventType+'&eventId='+response[i].eventId+'&marketId='+response[i].oddsmarketId+'" class="text-link">'+response[i].eventName+'</a></td>';
							popup_body += '	<td>MATCH_ODDS</td>';
							popup_body += '	<td>'+response[i].trade+'</td>';
							popup_body += '</tr>';
						}
						
						if(response.length == 0){
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
	
	function view_rules(image_url){
		if(image_url != ""){
			return_data  = '<img src="storage/front/img/rules/'+image_url+'" class="img-fluid">';
		}
		$("#rules_popup").modal('show');
		$(".rules_popup_image").html(return_data);
	}