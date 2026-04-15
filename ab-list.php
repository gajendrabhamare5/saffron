<?php
include('include/conn.php');include('session.php');	$user_id = $_SESSION['CLIENT_LOGIN_ID'];

?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>

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
                                        <div class="m-b-30 div-figure">
                                            <a href="live_ab202" class=""><img src="storage/front/img/casinoicons/andar-bahar2_new.jpg" class="img-fluid"></a>
                                        </div>
                                        <div class="m-b-30 div-figure">
                                            <a href="live_ab20" class=""><img src="storage/front/img/casinoicons/andar-bahar_new.jpg" class="img-fluid"></a>
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