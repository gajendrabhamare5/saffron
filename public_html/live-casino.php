<?php
include('include/conn.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("head_css.php");
?>

<body cz-shortcut-listen="true" class="" data-modal-open-count="0" style="">
    <div id="app">
        <?php
        include("loader.php");;
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
                        <div class="col-md-10 featured-box  live-casino">
                            <div class="coupon-card">
                                <div class="game-heading"><span class="card-header-title">
                                        LIVE CASINO
                                    </span></div>
                            </div>
                            <div  class="row row5">
                                <div  class="col-4">
                                    <div data-target='#games_modal' data-toggle='modal' class="casino-icon" style="position: relative;"><a  href="javascript:void(0)"><img  src="storage/casinotab/livecasino/livecasino1.jpg" class="img-fluid">
                                            <div  class="casino-name">SuperSpade Casino</div>
                                        </a></div>
                                </div>
                                <div  class="col-4">
                                    <div data-target='#games_modal' data-toggle='modal' class="casino-icon" style="position: relative;"><a  href="javascript:void(0)"><img  src="storage/casinotab/livecasino/livecasino2.png" class="img-fluid">
                                            <div  class="casino-name">Ezugi Casino</div>
                                        </a></div>
                                </div>
                                <div  class="col-4">
                                    <div  data-target='#games_modal' data-toggle='modal' class="casino-icon" style="position: relative;"><a  href="javascript:void(0)"><img  src="storage/casinotab/livecasino/livecasino3.png" class="img-fluid">
                                            <div  class="casino-name">Evolution Casino</div>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/socket.io.js"></script>
            <!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->
            <?php
            include("footer.php");
            ?>
        </div>
    </div>

    <?php
    include("footer-js.php");
    ?>


</body>
<style>
.live-casino .casino-icon img {
    width: 100%;
    height: 200px;
}
</style>
</html>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>