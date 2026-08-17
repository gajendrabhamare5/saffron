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
                        <div class="col-md-10 featured-box">
                            <div class="coupon-card">
                                <div class="game-heading"><span class="card-header-title">
                                        TEMBO CASINO
                                    </span></div>
                            </div>
                            <div class="row row5">
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/tembo1.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/tembo2.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/lucky72.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/baccarat2.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/baccaratb2.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/dragontiger2.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/teenpattioneday.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/dragontiger.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/baccarat.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2">
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/teenpatti2020.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/lucky7.jpg" class="img-fluid"></a></div>
                                </div>
                                <div class="col-3 mb-2"  data-target='#games_modal' data-toggle='modal'>
                                    <div class="casino-icon"><a href="javascript:void(0)"><img src="storage/casinotab/tembo_casino/baccaratb.jpg" class="img-fluid"></a></div>
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

</html>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>