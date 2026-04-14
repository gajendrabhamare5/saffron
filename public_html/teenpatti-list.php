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
                                        <div class="game-heading"><span class="card-header-title">
                        Teenpatti
                    </span></div>
                                    </div>
                                    <div>
                                         <div class="d-inline-block casinoicons">
                                            <a href="live_teen20c" class=""><img src="storage/front/img/casinoicons/teen20c.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_teen41" class=""><img src="storage/front/img/casinoicons/teen41.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_teen42" class=""><img src="storage/front/img/casinoicons/teen42.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_teen33" class=""><img src="storage/front/img/casinoicons/teen33.jpg" class="img-fluid"></a>
                                        </div>
                                         <div class="d-inline-block casinoicons">
                                            <a href="live_teen3" class=""><img src="storage/front/img/casinoicons/teen3.jpg" class="img-fluid"></a>
                                        </div>

                                         <div class="d-inline-block casinoicons">
                                            <a href="live_teen32" class=""><img src="storage/front/img/casinoicons/teen32.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_teen20b" class=""><img src="storage/front/img/casinoicons/teen20b.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_teenmuf" class=""><img src="storage/front/img/casinoicons/teenmuf.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_patti2" class=""><img src="storage/front/img/casinoicons/patti2.jpg" class="img-fluid"></a>
                                        </div>
                                         <div class="d-inline-block casinoicons">
                                            <a href="live_odi_teenpatti" class=""><img src="storage/mobile/img/casinoicons/teen.jpg" class="img-fluid"></a>
                                        </div>

                                            <div class="d-inline-block casinoicons">
                                            <a href="live_20_teenpatti" class=""><img src="storage/mobile/img/casinoicons/teen20.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_test_teenpatti" class=""><img src="storage/mobile/img/casinoicons/teen9.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="d-inline-block casinoicons">
                                            <a href="live_open_teenpatti" class=""><img src="storage/mobile/img/casinoicons/teen8.jpg" class="img-fluid"></a>
                                        </div>
                                         <div class="d-inline-block casinoicons">
                                            <a href="live_teen6" class=""><img src="storage/mobile/img/casinoicons/teen6.jpg" class="img-fluid"></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
			include("footer.php");
			?>
			
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/socket.io.js"></script>
        </div>
    </div>
    
   <?php
				include("footer-js.php");
				
			?>
</body>

</html><script type="text/javascript" src="js/jquery.min.js"></script>    <script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>