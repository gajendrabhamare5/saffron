<?php
include('include/conn.php');
include('session.php');	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
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
                        <div data-v-3af2cc68="" class="col-md-10 featured-box">
                            <div data-v-3af2cc68="" class="bollywood-tbl">
                                <div data-v-3af2cc68="">
                                    <div data-v-3af2cc68="" class="row row5 justify-content-center" style="margin-top: 10%;">
                                        <div data-v-3af2cc68="" class="col-md-4 m-b-20 div-figure">
                                            <a data-v-3af2cc68="" href="live_aaa" class=""><img data-v-3af2cc68="" src="storage/front/img/banners/aaa.jpg" class="img-fluid"></a>
                                        </div>
                                    </div>
                                    <div data-v-3af2cc68="" class="row row5 justify-content-center">
                                        <div data-v-3af2cc68="" class="col-md-4 m-b-30 div-figure">
                                            <a data-v-3af2cc68="" href="live_ddb" class=""><img data-v-3af2cc68="" src="storage/front/img/banners/ddb.jpg" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/socket.io.js"></script>
            </div>
            <?php 
			include("footer.php");
			?>
        </div>
    </div>
    
      <?php
				include("footer-js.php");
			?>

</body>

</html><script type="text/javascript" src="js/jquery.min.js"></script><script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>