
		
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
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
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
if($user_id != 4 and $user_id != 284){
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
$(".info-block").click(function(){
	$($(this).children('div')[0]).toggle();
});

$(".card_rules").click(function(){
	$($(this).children('div')[1]).toggle();
});


</script>
<script>
	document.onreadystatechange = function () {
		var state = document.readyState
		if (state == 'interactive') {
		} else if (state == 'complete') {
			setTimeout(function () {
				if(document.getElementById('load') != null){
					document.getElementById('load').style.visibility = "hidden";
				}
			}, 1000);
		}
	}
	
			
/* var socket1 = io("<?php echo SITE_IP; ?>");
//var socket = io("https://betfairfancy.com:4001");

socket1.on('otherLoggedInUsers',function(args){
	
	var userId = "<?php echo $_SESSION['LOGIN_ENC_ID'];?>";
	var randomString = "<?php echo $_SESSION['LOGIN_STRING'];?>";
	var siteId = "<?php echo SITE_ID;?>";
	if((args.userId == userId) && (args.randomString != randomString) && (args.siteId == siteId)){
		location.href = "logout";
	}
}); */
</script>

<script>
/*  var socket123 = io("<?php echo SITE_IP; ?>");
 socket123.on('connect', function() {
      		
	  });
socket123.on("pinged",function(args){
		socket123.emit('ponged',{user_id:"<?php echo $_SESSION['CLIENT_LOGIN_ID'];?>", siteId: <?php echo SITE_ID; ?>});
	});  */
	/* window.setInterval(function(){
        jQuery.ajax({
             type: 'POST',
             url: '../ajaxfiles/continue_login_chk.php',
             dataType: 'json',
             data: {},
             success: function(response) {
                
                if(response.status == "error"){
                    location.href="login";
                }
            }
               
    });
}, 2000); */
</script>

<div id="myMarketModal" role="dialog" class="modal" aria-modal="true">
   <div class="modal-dialog modal-lg">
      <span tabindex="0"></span>
      <div role="document" tabindex="-1" class="modal-content">
         <header class="modal-header">
            <h5 class="modal-title">My Market</h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">&times;</button>
         </header>
         <div class="modal-body">
            <table class="table table-hover">
               <thead>
                  <tr class="theme1font">
                     <th>Event Type</th>
                     <th>Event Name</th>
                     <th>Match Name</th>
                     <th>Trade</th>
                  </tr>
               </thead>
               <tbody id="myMarketTableBody"></tbody>
            </table>
         </div>
      </div>
      <span tabindex="0"></span>
   </div>
</div>