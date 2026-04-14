<footer>
	<p class="text-center">
		&copy; Copyright 2021. All Rights Reserved. Powered by <?php echo SITE_NAME;?>.
	</p>
</footer>

<div role="dialog" class="modal fade" id="modal_login_popup" aria-modal="true">
	<div class="modal-dialog modal-lg"><span tabindex="0"></span>
		<div role="document" tabindex="-1" class="modal-content" id="__BVID__151___BV_modal_content_">
			<header class="modal-header" id="__BVID__151___BV_modal_header_">
				<h5 class="modal-title" id="__BVID__151___BV_modal_title_"></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</header>
			<div class="modal-body" id="__BVID__151___BV_modal_body_">
				<div style="box-shadow: 0px 0px 5px; padding: 10px;">
					<h2>Dear Client,</h2>
					<h5 class="mb-1">You are requested to login with our official site <a href="javascript:void(0)">'<?php echo WEB_URL;?>'</a> only. Please check the site name before you login.</h5>
					<h5 class="mb-1">Thanks for your support.</h5>
					<h5 class="mb-1">Team <?php echo SITE_NAME;?></h5></div>
				<div class="mt-5 font-hindi" style="box-shadow: 0px 0px 5px; padding: 10px;">
					<h2>प्रिय ग्राहक,</h2>
					<h5 class="mb-1">आपसे अनुरोध है कि केवल हमारी आधिकारिक साइट <a href="javascript:void(0)">'<?php echo WEB_URL;?>'</a> से लॉगिन करें। लॉगइन करने से पहले साइट का नाम जरूर देख लें।</h5>
					<h5 class="mb-1">आपके समर्थन के लिए धन्यवाद।</h5>
					<h5 class="mb-1">टीम <?php echo SITE_NAME;?></h5></div>
				<div class="text-right mt-3">
					<button class="btn btn-primary" style="min-width: 100px;" class="close" data-dismiss="modal">OK</button>
				</div>
			</div>
			<!---->
		</div><span tabindex="0"></span></div>
</div>


<div id="myMarketModal" role="dialog" class="modal fade" aria-modal="true">
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



<div role="dialog" class="modal fade" id="rulesPopup" aria-modal="true">
	<div class="modal-dialog modal-lg"><span tabindex="0"></span>
		<div role="document" tabindex="-1" class="modal-content" id="__BVID__151___BV_modal_content_">
			<header class="modal-header" id="__BVID__151___BV_modal_header_">
				<h5 class="modal-title" id="__BVID__151___BV_modal_title_">Rules</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</header>
			<div class="modal-body" id="__BVID__151___BV_modal_body_">
				<div class="container-fluid"><div data-typeid="" class="row rules-container"><div class="sidebar col-md-2 sidebar-title" style="margin-top: 0px;"><ul><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Football Fancy
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Motor Sport
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Mixed Martial Arts
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Big Bash League
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Lunch Favourite
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Bookmaker
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Teenpatti
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                CricketCasino
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Politics
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Fancy Market 1
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                IPL
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Kabaddi
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                World Cup
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Binary
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Fancy
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Match
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Khado
                            </li></a><a href="javascript:void(0)" class="text-white rule-type"><li>
                                Election
                            </li></a></ul></div> <div class="col nopading rules-description"><div class="card"><div class="card-header"><h4 class="card-title"  id="rules_title">Football Fancy</h4></div> <div class="card-body">
                                <table class="table table-bordered" id="rules_details">
                                    <tr class="norecordsfound"><td class="text-center">No records Found</td></tr>
                                </table></div></div></div></div></div>
			</div>
			<!---->
		</div><span tabindex="0"></span></div>
</div>


<!-- <script type="text/javascript" src="js/socket.io.js"></script> -->
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
             url: 'ajaxfiles/continue_login_chk.php',
             dataType: 'json',
             data: {},
             success: function(response) {
                
                if(response.status == "error"){
                    location.href="/login";
                }
            }
               
    });
}, 2000); */
    
</script>

<div id="games_modal" class="modal" role="dialog" >
   <div class="modal-dialog" style="max-width: 100% !important;">
        <div class="modal-dialog modal-lg">
            <div role="document" id="__BVID__51___BV_modal_content_" tabindex="-1" class="modal-content">
                <header id="__BVID__51___BV_modal_header_" class="modal-header">
                    <!-- <h5 class="modal-title" id="Rules">Bookmaker Rules</h5> -->
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div id="__BVID__51___BV_modal_body_" class="modal-body">
                    
					
					<div class="">
						<span class="text-danger">Coming Soon</span>
					</div>
					
                </div>
                <!---->
            </div></div>
    </div>
    
</div>

                    
                    
                    