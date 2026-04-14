<?php
include('include/conn.php');include('session.php');	$user_id = $_SESSION['CLIENT_LOGIN_ID'];

?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>
<style>
    .casinoicons{
        width: calc(13% - 10px) !important;
    }
</style>
<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
			include("loader.php");
			?>
        <div class="wrapper">
            <?php
			include("header.php");
			?>
            <div class="main">
                <div class="container-fluid container-fluid-5">
                    <div class="row row5">
                         <?php
						include("left_sidebar.php");
						?>
                        <!---->
                        <div class="col-md-10 featured-box">
                            <div>
                                <div>
                                    <div class="coupon-card">
                                        <div class="game-heading"><span class="card-header-title">LUCKY 7</span></div>
                                    </div>
                                    <div>
                                        
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_lucky15" class=""><img src="storage/front/img/casinoicons/lucky15.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_lucky7" class=""><img src="storage/front/img/casinoicons/lucky7.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_lucky7eu" class=""><img src="storage/front/img/casinoicons/lucky7eu.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_lucky7eu2" class=""><img src="storage/front/img/casinoicons/lucky7eu2.jpg" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/socket.io.js"></script>
           <?php
		   
			include("footer.php");
		   ?>
        </div>
    </div>
 
     <?php
				include("footer-js.php");
			?>


</body>

</html><script type="text/javascript" src="js/jquery.min.js"></script>    <script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>