<script src="storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="storage/front/js/flipclock.js" type="text/javascript"></script>   
<script src="storage/front/js/flipclock.js" type="text/javascript"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha512-pgGHFWjBtbKHTTDW5buGZ9mU0nGfxNavf5kWK/Od2ugA//9FuMHAunkAiMe5jeL/5WW1r0UxwKi6D5LpMOJD3w==" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- jQuery (if needed) -->
<script src="https://code.jquery.com/jquery-5.3.0.min.js"></script>

<div class="stop-site" style="display:none;"><div><p>Due to some inactivity or security reasons stop your website, please close the developer tool.</p> <p>Thank you for your support</p></div></div>
	
	<script>
	 if (curPageName!='login.php' && curPageName!='index.php') {
	    fetchrules("football fancy");
     }
    function  fetchrules(rulestype){

         jQuery.ajax({
             type: 'POST',
             url: 'ajaxfiles/rules_details.php',
             dataType: 'text',
             data: {rulestype:rulestype,curPageName:curPageName},
             success: function(response) {
                console.log(response.length);
                    var strupper = rulestype.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    });
                    $("#rules_title").html(strupper);
                    $("#rules_details").html(response);
              
            }
               
    });
    }
    $(document).on('click','.rule-type',function(event){
        var rulestype=$(this).find('li').html().trim();
        $.ajax({
             type: 'POST',
             url: 'ajaxfiles/rules_details.php',
             dataType: 'text',
             data: {rulestype:rulestype,curPageName:curPageName},
             success: function(response) {
                 
                $("#rules_title").html(rulestype);
                $("#rules_details").html(response);
                }
               
    });
    });
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

<?php
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
if($user_id != 4){
?>
setInterval(function(){
	var devtools = function() {};
	devtools.toString = function() {
	  if (!this.opened) {
	  	debugger;
	  }
	  this.opened = true;
	}
	console.log('%c', devtools);
},1000);

<?php
}
?>


</script>
	<script>
            
        document.onreadystatechange = function () {
            var state = document.readyState
            if (state == 'interactive') {
            } else if (state == 'complete') {
                setTimeout(function () {
					if(document.getElementById('load') != null)
						document.getElementById('load').style.visibility = "hidden";  
                }, 1000);
            }
        }
		
		
/* var socket1 = io("<?php echo SITE_IP; ?>", {
			transports: ['websocket']
		});
//var socket = io("https://betfairfancy.com:4001");
//console.log(12);

socket1.on('otherLoggedInUsers',function(args){
	
	
	var userId = "<?php echo $_SESSION['LOGIN_ENC_ID'];?>";
	var randomString = "<?php echo $_SESSION['LOGIN_STRING'];?>";
	var siteId = "<?php echo SITE_ID;?>";
	if((args.userId == userId) && (args.randomString != randomString) && (args.siteId == siteId)){
		location.href = "logout";
	}
});
 */
        
//	window.onresize = function(){
//	 if((window.outerHeight-window.innerHeight)>100){
//	   $(".stop-site").show();
//	 }else{
//		$(".stop-site").hide();
//	}
//	}
//
//	 if((window.outerHeight-window.innerHeight)>100){
//	   $(".stop-site").show();
//	 }else{
//		$(".stop-site").hide();
//	}

$(document).on('click', '.rules-left-sidebar .nav-link', function (e) {
    e.preventDefault();

    // Remove active class from all tabs and nav links
    $('.rules-left-sidebar .nav-link').removeClass('active');
    $('.tab-content .tab-pane').removeClass('active show');

    // Add active class to clicked nav
    $(this).addClass('active');

    // Show the corresponding tab pane
    const target = $(this).attr('aria-controls'); // e.g., tules-tabs-tabpane-0
    $('#' + target).addClass('active show');
});


$(document).ready(function () {
  $('#lang-dropdown').on('click', function (e) {
    e.stopPropagation(); // prevent click from bubbling up
    $('.dropdown-menu').toggleClass('show'); // toggle visibility
  });

  // Close dropdown if clicked outside
  $(document).on('click', function () {
    $('.dropdown-menu').removeClass('show');
  });
});

$(document).ready(function () {
  $('.search-toggle').on('click', function () {
    $('.search-input').toggle(); // toggles visibility
  });
});


jQuery(document).on("click", ".back-1", function() {
    $(".hideplacebet").show();
    var fullmarketodds = $(this).attr("fullmarketodds");
    if (fullmarketodds != "") {
        var side = $(this).attr("side");
        var selectionid = $(this).attr("selectionid");
        var market_odd_name = $(this).attr("markettype");
        var runner = $(this).attr("runner");
        var market_runner_name = runner;
        var marketname = $(this).attr("marketname");
        var markettype = $(this).attr("markettype");
        var fullfancymarketrate = $(this).attr("fullfancymarketrate");
        
        /* fullmarketodds = (fullmarketodds / 100) + 1;
        fullfancymarketrate = (fullfancymarketrate / 100) + 1;
        fullfancymarketrate = fullfancymarketrate.toFixed(2);
        fullmarketodds = fullmarketodds.toFixed(2); */
        var odds_change_value = "disabled";
        var runs_lable = 'Runs';
        var runs_lable = 'Odds';
        var fullfancymarketrate = fullmarketodds;
        console.log("innnn2=",fullfancymarketrate);
        var eventId = $(this).attr("eventid");
        var marketId = $(this).attr("marketid");
        var event_name = $(this).attr("event_name");
        $(".select").removeClass("select");
        $(this).addClass("select");
        var return_html = "";
        return_html +=
            "<div class='bet-slip-data'><div><div class='table-responsive back'><form><table class='coupon-table table table-borderedless'><thead><tr><th class='place-bet-for'>(Bet for)</th><th class='place-bet-odds'>Odds</th><th class='place-bet-stake'>Stake</th><th class='place-bet-profit'>Profit</th></tr></thead><tbody>";
            // <a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times me-1'></i></a>
        return_html +=
            "<tr><td class='text-center place-bet-for'> <span>"+ runner +"</span></td><td class='bet-odds place-bet-odds'><div class='form-group'> <input placeholder='0' value='" +
            fullmarketodds +
            "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'></div></td><td class='bet-stakes place-bet-stake'><div class='form-group bet-stake'><input type='hidden' id='bet_stake_side' value='Back'/><input type='hidden' id='bet_event_id' value='" +
            eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid +
            "'/><input type='hidden' id='bet_event_name' value='" + event_name +
            "'/><input type='hidden' id='bet_market_name' value='" + marketname +
            "'/><input type='hidden' id='bet_markettype' value='" + markettype +
            "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate +
            "'/> <input type='hidden' id='oddsmarketId' value='" + marketId +
            "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name +
            "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name +
            "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='number' ></div></td><td class='text-right bet-profit place-bet-profit' id='profitLiability'>0</td></tr>";
        return_html += "<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
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
                $button_array[] = 20000;
                $button_array[] = 20000;
            } else {
                $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                $fetch_button_value = $fetch_button_value_data['casino_button_value'];
                $default_stake = $fetch_button_value_data['default_stake'];
                $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                $button_array = explode(",", $fetch_button_value);
            }
            foreach ($button_array as $button_value) {
                $labelprint = $button_value / 1000;

            ?>
        return_html +=
            " <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake btn-place-bet'> +<?php echo $labelprint; ?>k </button>";
        <?php
            }
            ?>
        return_html += "<div class='btn btn-sm btn-link text-dark flex-fill text-end place-bet-clear-btn'>clear</div>";
        return_html +=
            "</td></tr></tbody></table><div class='col-md-12 place-bet-action-buttons'><div> <button type='button' class='btn btn-sm btn-info float-left btn-edit' data-target='#set_btn_value' data-toggle='modal'> Edit </button> </div>"; 
         return_html +=    
            "<div><button type='button' class='btn btn-sm btn-danger close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div></div></form></div></div></div>";
        $(".bet_slip_details").html(return_html);
    }
});

jQuery(document).on("click", ".lay-1", function() {
    $(".hideplacebet").show();
    var fullmarketodds = $(this).attr("fullmarketodds");
    if (fullmarketodds != "") {
        var side = $(this).attr("side");
        var selectionid = $(this).attr("selectionid");
        var market_odd_name = $(this).attr("markettype");
        var runner = $(this).attr("runner");
        var market_runner_name = runner;
        var marketname = $(this).attr("marketname");
        var markettype = $(this).attr("markettype");
        var fullfancymarketrate = $(this).attr("fullfancymarketrate");
        /* fullfancymarketrate = (fullfancymarketrate / 100) + 1;
        fullmarketodds = (fullmarketodds / 100) + 1;
        fullfancymarketrate = fullfancymarketrate.toFixed(2);
        fullmarketodds = fullmarketodds.toFixed(2); */
        var odds_change_value = "disabled";
        var runs_lable = 'Runs';
        var runs_lable = 'Odds';
        var fullfancymarketrate = fullmarketodds;
        var eventId = $(this).attr("eventid");
        var marketId = $(this).attr("marketid");
        var event_name = $(this).attr("event_name");
        $(".select").removeClass("select");
        $(this).addClass("select");
        var return_html = "";
        return_html +=
            "<div class='bet-slip-data'><div><div class='table-responsive lay'><form><table class='coupon-table table table-borderedless'><thead><tr><th class='place-bet-for'>(Bet for)</th><th class='place-bet-odds'>Odds</th><th class='place-bet-stake'>Stake</th><th class='place-bet-profit'>Profit</th></tr></thead><tbody>";
            // <a href='javascript:void(0);' class='text-danger close-bet-slip'><i class='fa fa-times me-1'></i></a> 
        return_html +=
            "<tr><td class='text-center place-bet-for'><span>"+ runner +"</span> </td><td class='bet-odds place-bet-odds'><div class='form-group'> <input placeholder='0' value='" +
            fullmarketodds +
            "' id='odds_val' type='text' required='required' maxlength='4' readonly='readonly' class='amountint' style='width: 45px; vertical-align: middle;'></div></td><td class='bet-stakes'><div class='form-group bet-stake place-bet-stake'><input type='hidden' id='bet_stake_side' value='Lay'/><input type='hidden' id='bet_event_id' value='" +
            eventId + "'/><input type='hidden' id='bet_marketId' value='" + selectionid +
            "'/><input type='hidden' id='bet_event_name' value='" + event_name +
            "'/><input type='hidden' id='bet_market_name' value='" + marketname +
            "'/><input type='hidden' id='bet_markettype' value='" + markettype +
            "'/><input type='hidden' id='fullfancymarketrate' value='" + fullfancymarketrate +
            "'/> <input type='hidden' id='oddsmarketId' value='" + marketId +
            "'/><input type='hidden' id='market_runner_name' value='" + market_runner_name +
            "'/><input type='hidden' id='market_odd_name' value='" + market_odd_name +
            "'/> <input maxlength='10' name='inputStake' id='inputStake' required='required' type='text' ></div></td><td class='text-right bet-profit place-bet-profit' id='profitLiability'>0</td></tr>";
        return_html += "<tr><td colspan='5' class='value-buttons' style='padding: 5px;'>";
        <?php
            $get_button_value = $conn->query("select * from user_master where id=$user_id and (button_value <> '' and button_value IS NOT NULL)");
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
                $button_array[] = 20000;
                $button_array[] = 20000;
            } else {
                $fetch_button_value_data = mysqli_fetch_assoc($get_button_value);
                $fetch_button_value = $fetch_button_value_data['button_value'];
                $default_stake = $fetch_button_value_data['default_stake'];
                $one_bet_default_stake = $fetch_button_value_data['one_bet_default_stake'];
                $button_array = explode(",", $fetch_button_value);
            }
            foreach ($button_array as $button_value) {
                $labelprint = $button_value / 1000;
            ?>
        return_html +=
            " <button type='button' stake='<?php echo $button_value; ?>' class='btn btn-secondary m-l-5 m-b-5 label_stake btn-place-bet'> +<?php echo $labelprint; ?>k </button>";
        <?php
            }
            ?>
          return_html += "<div class='btn btn-sm btn-link text-dark flex-fill text-end place-bet-clear-btn'>clear</div>"
        return_html +=
            "</td></tr></tbody></table><div class='col-md-12 place-bet-action-buttons'> <div><button type='button' class='btn btn-sm btn-info float-left btn-edit'> Edit </button></div>";
        return_html +=
            "<div> <button type='button' class='btn btn-sm btn-danger close-bet-slip'> Reset </button> <button type='button' class='btn btn-sm btn-success float-right m-b-5 placeBet' id='placeBet'> Submit </button></div> </div></form></div></div></div>";
        $(".bet_slip_details").html(return_html);
    }
});
jQuery(document).on("click", ".place-bet-clear-btn", function() {
    $('#inputStake').val('');
    $('#profitLiability').text('0');
   
  });
</script>