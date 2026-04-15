<script src="storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="storage/front/js/flipclock.js" type="text/javascript"></script>   
<script src="storage/front/js/flipclock.js" type="text/javascript"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha512-pgGHFWjBtbKHTTDW5buGZ9mU0nGfxNavf5kWK/Od2ugA//9FuMHAunkAiMe5jeL/5WW1r0UxwKi6D5LpMOJD3w==" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (if needed) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
	</script>