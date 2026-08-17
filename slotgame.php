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
                            <ul role="tablist" class="nav nav-tabs m-b-20">
                                <li class="nav-item show"><a data-toggle="tab" data-content="slot-0" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">NEWLY RELEASED GAMES</a></li>
                                <li class="nav-item"><a data-toggle="tab" data-content="slot-1" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">HOT GAMES</a></li>
                                 <li class="nav-item"><a data-toggle="tab" data-content="slot-2" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">SLOTS</a></li>
                                <li class="nav-item"><a data-toggle="tab" data-content="slot-3" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">TABLE GAMES</a></li>
                                <li class="nav-item"><a data-toggle="tab" data-content="slot-4" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">SHOOTING GAMES</a></li>
                                <li class="nav-item"><a data-toggle="tab" data-content="slot-5" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">Instant WIN</a></li>
                                <li class="nav-item"><a data-toggle="tab" data-content="slot-6" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">SCRATCH CARD</a></li>
                                <li class="nav-item"><a data-toggle="tab" data-content="slot-7" href="javascript:void(0)" class="nav-link casino-call" style="white-space: nowrap;">PUSH GAMING</a></li> 
                            </ul>
                            <div class="tab-content">
                                <div id="slot-0" class="tab-pane active show">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                            <?php
										for ($i = 1; $i <= 66; $i++) {
										?>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot/<? echo $i;?>.png" src="storage/casinotab/slot/<? echo $i;?>.png" lazy="loaded"></figure>
                                                </div>
                                                <?php
                                        }
                                        ?>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="slot-1" class="tab-pane">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                           
                                            <?php
										for ($i = 1; $i <= 49; $i++) {
										?>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot1/<? echo $i;?>.png" src="storage/casinotab/slot1/<? echo $i;?>.png" lazy="loaded"></figure>
                                                </div>
                                                <?php
                                        }
                                        ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="slot-2" class="tab-pane">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                           
                                            <?php
										for ($i = 1; $i <= 393; $i++) {
										?>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot2/<? echo $i;?>.png" src="storage/casinotab/slot2/<? echo $i;?>.png" lazy="loaded"></figure>
                                                </div>
                                                <?php
                                        }
                                        ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="slot-3" class="tab-pane">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                           
                                            <?php
										for ($i = 1; $i <= 29; $i++) {
										?>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot3/<? echo $i;?>.png" src="storage/casinotab/slot3/<? echo $i;?>.png" lazy="loaded"></figure>
                                                </div>
                                                <?php
                                        }
                                        ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="slot-4" class="tab-pane">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                           
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot4/1.png" src="storage/casinotab/slot4/1.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot4/2.png" src="storage/casinotab/slot4/2.png" lazy="loaded"></figure>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="slot-5" class="tab-pane">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                           
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot5/1.png" src="storage/casinotab/slot5/1.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot5/2.png" src="storage/casinotab/slot5/2.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot5/3.png" src="storage/casinotab/slot5/3.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot5/4.png" src="storage/casinotab/slot5/4.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot5/5.png" src="storage/casinotab/slot5/5.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot5/6.png" src="storage/casinotab/slot5/6.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot5/7.png" src="storage/casinotab/slot5/7.png" lazy="loaded"></figure>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="slot-6" class="tab-pane">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                           
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/1.png" src="storage/casinotab/slot6/1.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/2.png" src="storage/casinotab/slot6/2.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/3.png" src="storage/casinotab/slot6/3.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/4.png" src="storage/casinotab/slot6/4.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/5.png" src="storage/casinotab/slot6/5.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/6.png" src="storage/casinotab/slot6/6.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/7.png" src="storage/casinotab/slot6/7.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/8.png" src="storage/casinotab/slot6/8.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/9.png" src="storage/casinotab/slot6/9.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/10.png" src="storage/casinotab/slot6/10.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot6/11.png" src="storage/casinotab/slot6/11.png" lazy="loaded"></figure>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="slot-7" class="tab-pane">
                                    <div class="coupon-card coupon-card-first">
                                        <div id="slotGamesAll" class="card-content container-fluid">
                                            <div class="row">
                                           
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot7/1.png" src="storage/casinotab/slot7/1.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot7/2.png" src="storage/casinotab/slot7/2.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot7/3.png" src="storage/casinotab/slot7/3.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot7/4.png" src="storage/casinotab/slot7/4.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot7/5.png" src="storage/casinotab/slot7/5.png" lazy="loaded"></figure>
                                                </div>
                                                <div class="col-md-1"  data-target='#games_modal' data-toggle='modal'>
                                                    <figure><img class="casino-img" data-src="storage/casinotab/slot7/6.png" src="storage/casinotab/slot7/6.png" lazy="loaded"></figure>
                                                </div>
                                                
                                                
                                            </div>
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
    .casino-img {
    max-width: 80px;
    cursor: pointer;
}
</style>

</html>
<script>
    $(document).on('click', '.nav-link', function() {
        var showtab = $(this).data('content');
        $('.nav-item').removeClass('show');
        $('.tab-pane').removeClass('active show');
        $(this).parent().addClass('show');
        $("#" + showtab).addClass('active show');
    });
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>