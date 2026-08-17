<?php
	include("../include/conn.php");
	include("../include/flip_function.php");
	include("../session.php");
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$get_parent_ids = $conn->query("select * from user_login_master where UserID=$user_id");
$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
$parentDL = $fetch_parent_ids['parentDL'];
$parentMDL = $fetch_parent_ids['parentMDL'];		
$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
$parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];



	if($parentKingAdmin > 0){
		$check_cess_parent = $parentKingAdmin;
	}
	else{
		$check_cess_parent = $parentSuperMDL;
	}

	$get_access = $conn->query("select cricket_access,soccer_access,tennis_access,video_access from user_master where Id=$check_cess_parent");
	$fetch_access = mysqli_fetch_assoc($get_access);
	
	/* if($fetch_access['video_access'] == 1){
		echo "<script>window.location.href='home'</script>";
	} */
?>
<!DOCTYPE html>
<html lang="en">

<?php
	include("head_css.php");
?>

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
                <div class="loader"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                <ul class="nav nav-tabs game-nav-bar">
                    <li class="nav-item"><a href="home" class="nav-link "> Sports </a></li>
                    <!-- <li class="nav-item"><a href="sports" class="nav-link"> Sports </a></li> -->
                    <li class="nav-item"><a href="slot" class="nav-link "> Casino + Slot </a></li>
                   <!--  <?php if(ELECTION_EVENT_ID != ''){ ?>
                    	<li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="nav-link"> <?php echo ELECTION_MARKET_NAME;?> </a></li>
                    <?php } ?> -->
                    <li class="nav-item"><a href="others" class="nav-link router-link-exact-active router-link-active active"> Others </a></li>
                </ul>
                
				<div>
   <div class="tab-content">
      <div id="others" class="tab-pane active others">
         <div class="container-fluid mt-3">
            <!----> 
            
            
			<div class="row mt-3">
               
			   
			  <div class="col-12">
			  <h4>Binary</h4>
                  <h5><a href="javascript:void(0);" class=""><u>Binary / <?php echo date("Y-m-d") ?></u> <span class="blinking clickhere"><i class="fas fa-hand-point-left"></i> Click Here
                     </span></a>
                  </h5>
               </div>
			   
            </div>
			
            <hr>	
            <div class="row mt-3">
               
			   
			   <div class="col-12">
                  <h5><a href="javascript:void(0);" class=""><u>Cricket Casino</u> <span class="blinking clickhere"><i class="fas fa-hand-point-left"></i> Click Here
                     </span></a>
                  </h5>
               </div>
            </div>
            <hr>
            <!---->
         </div>
         <!---->
      </div>
   </div>
</div>
								
								
								
            </div>
        </div>
    </div><script type="text/javascript" src="../js/socket.io.js"></script><script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
function url_redirect(link){
	location.href='<?php echo str_replace("index","",MOBILE_URL); ?>'+link;
}
</script>
</body>

<?php
	include "footer.php";
?>
</html>


<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>