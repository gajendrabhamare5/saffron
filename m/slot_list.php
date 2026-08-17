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
if ($parentKingAdmin > 0) {
    $check_cess_parent = $parentKingAdmin;
} else {
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
<style>
    .live_csino_div .casino-name {
        background-image: linear-gradient(var(--theme1-bg), var(--theme2-bg));
        color: var(--primary-color);
        padding: 5px;
        position: absolute;
        width: 100%;
        bottom: -15px;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 14px;
    }

    .live_csino_div .casino-icon .casino-name {
        bottom: 0;
    }

    :root {
        --red-color: #ff0000;
        --yellow-color: #ffff00;
        --green-color: #00ff00;
        --white-color: #fff;
    }

    .blinking span {
        animation: blinkingText .8s infinite
    }

    .blinking:hover span {
        animation: blinkingHoverText .8s infinite
    }

    @keyframes blinkingText {
        0% {
            color: var(--red-color)
        }

        20% {
            color: var(--red-color)
        }

        40% {
            color: var(--yellow-color)
        }

        60% {
            color: var(--yellow-color)
        }

        80% {
            color: var(--white-color)
        }

        100% {
            color: var(--white-color)
        }
    }

    @keyframes blinkingHoverText {
        0% {
            color: var(--red-color)
        }

        20% {
            color: var(--red-color)
        }

        40% {
            color: var(--yellow-color)
        }

        60% {
            color: var(--yellow-color)
        }

        80% {
            color: var(--white-color)
        }

        100% {
            color: var(--white-color)
        }
    }

    @keyframes blinkingHoverWhite {
        0% {
            color: var(--red-color)
        }

        20% {
            color: var(--red-color)
        }

        40% {
            color: var(--yellow-color)
        }

        60% {
            color: var(--yellow-color)
        }

        80% {
            color: var(--white-color)
        }

        100% {
            color: var(--white-color)
        }
    }

    /* .slot-nav-bar2 {
		background-color: #106ea0;
	} */
    .row.row5>[class*=col-] {
        padding-left: 1px;
        padding-right: 1px;
    }

    .casinoicons {
        margin-bottom: 2px;
    }

     .casino-tables img {
        height: auto !important;
        width: 100% !important;
     }
</style>

<body cz-shortcut-listen="true">
    <div id="app">
        <?php
        include("loader.php");
        ?>
        <div>
            <?php
            include("header.php");
            ?>
            <div class="main-content">
                <div class="loader"><i class="fa fa-spinner fa-spin" style="font-size: 38px;"></i></div>
                <ul class="nav nav-tabs game-nav-bar">
                    <?
                    if ($user_id  != LOGINDEMOID) {
                    ?>
                        <li class="nav-item"><a href="aviator-list" class="type nav-link newclass blink_me"> <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 457.6 277.4" style="
    /* height: 23px; */
    height: 24px;
    transform: rotate(10deg);
">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #e40539;
                                            }
                                        </style>
                                    </defs>
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <g>
                                            <path class="cls-1" d="M61.85,273.4c-1.8-3.5-2.3-3.9-4-3-3.2,1.7-5.5,1.1-9-2.5l-3.3-3.4,4.4-1.9c2.4-1.1,8-2.2,12.4-2.6,27.1-2.5,84.1-19.2,161-47.1,32.1-11.7,80.4-30.1,81.3-31,1.2-1.2-1-1.5-11.9-1.7-10.6-.2-11.7,0-16.5,2.4-13.1,6.8-74.6,31.2-92.8,36.7l-6.9,2.1-6.4-5-6.5-4.9-3.6,1.5c-21.3,9-88,36.4-89.2,36.6-1,.2-1.6-.6-1.8-2.3-.3-2.4.5-3,7.8-6.9,4.5-2.3,7.9-4.5,7.5-4.8-.3-.4-4.3-.9-8.9-1.3-9.7-.8-17.3-4-28.2-11.9-4.8-3.5-7.8-5-10-5-4.3,0-6.4.9-6.4,2.7,0,.8,6.8,8.7,15.1,17.6,13,13.7,14.9,16.2,13.3,16.8-3.7,1.5-4.8.8-16.3-10.3-6.4-6.2-14.6-14.2-18.3-17.7l-6.7-6.5-8.8,4.2-8.8,4.2-.3-3.4c-.2-2,.2-4.4.8-5.5s6.5-4.8,13.1-8.2c11.8-6,14.2-8,12.2-10-.7-.7-4.1.5-10.2,3.5l-9.1,4.6v-2.5c0-2,1.4-3.3,7.7-7,10.3-6,17.3-8.1,22.3-6.6,2.1.6,10.7,6.3,19.1,12.6,19,14.3,29.4,19.9,35.9,19.2,5.3-.5,34-13.7,61.9-28.5,18.3-9.7,21.6-12.1,19.5-14.2-.7-.7-7.1,1.8-21.4,8.5-14.7,7-20.5,9.3-21.1,8.4-1.2-2-.1-3.3,5.6-6.3,3-1.6,5.5-3.4,5.5-4,0-.7-1.3-2.5-2.8-4l-2.9-2.7-19.8,9.6c-10.9,5.2-20,9.3-20.2,9.1-.8-.7,2.5-12.8,3.8-14.1.8-.8,9.5-5.6,19.4-10.8,17.7-9.4,18-9.6,17.8-12.7,0-1.7-.4-3.4-.7-3.7s-3.9.9-8,2.7l-7.4,3.3-8.9-9.3c-4.8-5.1-8.9-9.6-9.1-10-.5-1.4,8.8-7.9,14.6-10.1,10.4-4,10.9-3.9,118.5,11.3,35.6,5,65.5,9.7,66.5,10.4,1.6,1.1,1.6,1.4-.1,4.8l-1.7,3.7,2.8,1c1.5.5,5.8,2.1,9.5,3.6l6.9,2.5,10.1-4.3c12.4-5.2,32.9-15.6,45.6-23.2l9.4-5.5,3.2,2.4c3.2,2.4,6.9,3.1,7.9,1.6.3-.5-2.5-6.9-6.3-14.3-3.7-7.4-8.7-18.4-11-24.4-2.4-6.1-4.8-11.6-5.4-12.4-.9-1-3.3-1.2-10.7-.8-10.8.5-18.1,2.6-42,12-15.4,6-67.7,31.5-70.6,34.4-1.3,1.4-3.4,1.4-19.2-.1-9.7-.9-18-1.6-18.4-1.6-1.4,0-.8-5.5,1.1-9.7,1.6-3.4,3.9-5.4,14-12.1,14.3-9.5,28.2-16.5,37.4-18.9l6.5-1.7,9.9,3.9c14.3,5.6,16.3,5.6,39.8-1,38.2-10.6,43.5-11.8,52.2-11.9,8-.1,8.3,0,11.6,3.3,2.6,2.5,5.7,8.3,12,23,4.7,10.8,9,21.3,9.7,23.5,1.7,5.4.8,11.9-2.4,16-6.7,8.8-38,25.2-82.1,42.8-22.8,9.1-61.8,21.9-162.5,53.3-31.1,9.7-64.7,20.3-74.6,23.6-10,3.2-18.9,5.9-19.8,5.9-.8,0-2.5-1.8-3.6-4ZM291.35,168.4c3.8-2.3,7.1-6.9,5.8-8-.6-.5-144.9-20.8-158.8-22.3-1.2-.1-2,.4-2,1.3,0,1.2,15.5,4.6,72,16.1,39.6,8.1,73.7,14.7,75.9,14.8,2.3.1,5.2-.7,7.1-1.9h0ZM247.65,122c4.2-2.3,11.2-5.8,15.4-7.7,4.3-1.9,7.8-3.7,7.8-4.1s-2.8-1.3-6.2-2c-7.7-1.7-13.7-.9-22.4,3.3-6.7,3.1-18.9,11.7-18.1,12.6.6.5,9.3,1.9,13.5,2.2,1.3,0,5.8-1.9,10-4.3h0ZM282.15,115.8c7.5-3.8,10.7-6,10.5-7.1-.4-2.1-18.3-9.2-23.4-9.3-2.2,0-4.9.6-6,1.4q-2.1,1.6,10.4,6.5c2.6,1,4.8,2.3,5,2.9s-1.9,2.2-4.7,3.6c-5.5,2.8-6.6,4-5.7,6.1.8,2.3,2.3,1.9,13.9-4.1h0Z"></path>
                                            <path class="cls-1" d="M440.55,196.2c-6.8-10.1-13.5-20.3-14.9-22.8-1.5-2.5-5.5-14.1-9.1-25.7l-6.5-21.3,5.1-5c2.7-2.8,5.1-4.9,5.2-4.8.1.2,5.2,9.4,11.4,20.6,11.9,21.3,15.8,31,23.1,58,3.3,11.9,3.3,12.3,1.7,15.7-.9,1.9-2.1,3.5-2.6,3.5s-6.5-8.2-13.4-18.2h0ZM454.65,206.5c.2-1.9-.5-4.6-1.7-6.7-1.8-3.1-22-30.4-24.3-32.9-1.2-1.3-3,1.5-2.2,3.5,1.2,3.4,26,39.9,26.9,39.6.6-.1,1.1-1.7,1.3-3.5h0Z"></path>
                                            <path class="cls-1" d="M295.35,148.3c-13.2-2.6-24.6-4.9-25.4-5.1-.8-.2,11.3-5.4,27-11.6l28.3-11.4,5.3,5.9c2.9,3.2,5.2,6.3,5.3,6.9,0,.6-2.3,5.5-5.1,10.8-4.8,9.1-5.2,9.6-8.2,9.5-1.8-.1-14-2.3-27.2-5h0Z"></path>
                                            <path class="cls-1" d="M334.85,152.1c0-.2,1.6-3.6,3.6-7.5,1.9-4,4.1-9,4.9-11.1l1.3-3.8-5.3-6.9c-5.3-6.8-5.4-6.9-3.2-8.1,2-1.1,2.6-.8,6.2,3.2,2.2,2.5,4.3,4.5,4.6,4.5s1.7-3.9,3-8.7l2.4-8.8.3,4.9c.2,2.6-.2,8-.8,11.8l-1,7,5.1,6.4,5.1,6.4-2.7,1c-2.2.9-2.9.6-5-1.8-1.3-1.5-2.5-3-2.5-3.4-.1-2.3-1.9-.1-3.9,4.6-1.2,3-2.8,5.9-3.5,6.5-1.4,1.1-8.6,4.3-8.6,3.8h0Z"></path>
                                            <path class="cls-1" d="M404.75,114.7c-7.2-16.1-7.3-16.4-5.8-17.5,1.5-1,21.2-.4,24.2.7.9.4,1.7,1.4,1.7,2.2,0,4.2-12.6,21.3-15.6,21.3-.9,0-2.8-2.9-4.5-6.7h0ZM414.15,104.7c4.8-2,8.7-4,8.7-4.4,0-1.2-4.4-1.9-13.2-1.9-8.2,0-8.8.1-8.8,2,0,2.4,2.7,8,3.8,8,.4,0,4.6-1.6,9.5-3.7Z"></path>
                                            <path class="cls-1" d="M385.05,75.9c-10.7-19.1-14-27.3-20.7-51.6-4-14.3-4.3-18.7-1.6-22l1.9-2.3,14.8,22.3,14.8,22.3,7.6,24.2c4.2,13.2,7.4,24.2,7.1,24.3-.3.1-3.5.3-7.1.6l-6.5.4-10.3-18.2h0ZM391.85,46.5c0-1.5-23.2-37.5-26.1-40.6-1.3-1.3-2.9,1.2-2.9,4.7,0,2.5,8.8,15.4,22.3,32.7,4.6,6,6.7,7,6.7,3.2Z"></path>
                                        </g>
                                    </g>
                                </svg> </a></li>
                    <?
                    }
                    ?>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Lottery </a></li>
                    <li class="nav-item"><a href="home" class="nav-link newclass"> Sports </a></li>
                    <!-- <li class="nav-item"><a href="sports" class="nav-link"> Sports </a></li> -->
                    <li class="nav-item"><a href="slot"
                            class="nav-link newclass"> Our Casino
                        </a></li>
                    <?
                   // if ($user_id  != LOGINDEMOID) {
                    ?>
                        <li class="nav-item"><a href="live_casino" class="type nav-link newclass"> Live Casino </a></li>
                         <li class="nav-item"><a href="slot_list" class="type nav-link newclass router-link-exact-active router-link-active active"> Slots </a></li>
                    <li class="nav-item"><a href="fantasy_list" class="type nav-link newclass"> Fantasy </a></li>
                    <?
                   // }
                    ?>
                   
                    <!-- <?php if (ELECTION_EVENT_ID != '') { ?>
						<li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID; ?>&eventId=<?php echo ELECTION_EVENT_ID; ?>&marketId=<?php echo ELECTION_MARKET_ID; ?>" class="nav-link"> <?php echo ELECTION_MARKET_NAME; ?> </a></li>
					<?php } ?> -->
                    <!--  <li class="nav-item"><a href="others" class="nav-link"> Others </a></li> -->
                </ul>
                <?php
                $all_live_casino = array();
                $aviator_casino = $conn->query("SELECT * FROM live_casino_list where game_category='slot'");

                while ($aviator_casino_data = mysqli_fetch_assoc($aviator_casino)) {
                    // Normalize keys
                    $game_provider = ucwords(strtolower(trim($aviator_casino_data['game_provider'])));
                    $game_provider = preg_replace('/\s+/', ' ', $game_provider);
                    $game_type = ucwords(strtolower(trim($aviator_casino_data['game_type'])));
                    $game_type = preg_replace('/\s+/', ' ', $game_type);

                    // Assign back if needed for consistent display
                    $aviator_casino_data['game_provider'] = $game_provider;
                    $aviator_casino_data['game_type'] = $game_type;

                    $all_live_casino[$game_provider][$game_type][] = $aviator_casino_data;
                }

                ?>

                <ul class="nav nav-tabs slot-nav-bar">
                    <?php
                    $tab_index = 0;
                    foreach ($all_live_casino as $provider => $types) {
                        $provider_id = strtolower(preg_replace('/\s+/', '', $provider));
                        $active_class = ($tab_index === 0) ? 'active' : '';
                        
                    ?>
                        <li class="nav-item <?php echo $active_class; ?>">
                            <a data-id="<?php echo $provider_id; ?>" class="tabshow nav-link <?php echo $active_class; ?>">
                                <?php echo $provider; ?>
                            </a>
                        </li>
                    <?php
                        $tab_index++;
                    }
                    ?>
                </ul>

                <div id="show_casino" style="display:block;">
                    <div class="tab-content">
                        <?php
                        $parent_index = 0;
                        foreach ($all_live_casino as $provider => $types) {
                            $provider_id = strtolower(preg_replace('/\s+/', '', $provider));
                            $active_class = ($parent_index === 0) ? 'active' : '';
                        ?>
                            <div id="<?php echo $provider_id; ?>" class="tab-pane <?php echo $active_class; ?> casino-tables" style="<?php echo ($active_class) ? '' : 'display:none;'; ?>">
                                <ul class="nav nav-tabs slot-nav-bar2">
                                    <?php
                                   
                                    $child_index = 0;
                                    foreach ($types as $type => $games) {
                                        $type_id = strtolower(preg_replace('/\s+/', '', $type));
                                        $unique_id = $provider_id . '_' . $type_id;
                                        $child_active = ($child_index === 0) ? 'active' : '';
                                    ?>
                                        <li class="nav-item <?php echo $child_active; ?>">
                                            <a data-id="<?php echo $unique_id; ?>" class="tabshow2 nav-link <?php echo $child_active; ?>">
                                                <?php echo $type; ?>
                                            </a>
                                        </li>
                                    <?php
                                        $child_index++;
                                    }
                                    ?>
                                </ul>

                                <div class="tab-content">
                                    <?php
                                    $pane_index = 0;
                                    foreach ($types as $type => $games) {
                                        $type_id = strtolower(preg_replace('/\s+/', '', $type));
                                        $unique_id = $provider_id . '_' . $type_id;
                                        $pane_active = ($pane_index === 0) ? 'active' : '';
                                    ?>
                                        <div id="<?php echo $unique_id; ?>" class="tab-pane2 <?php echo $pane_active; ?> casino-tables" style="<?php echo ($pane_active) ? '' : 'display:none;'; ?>">
                                            <div class="container-fluid">
                                                <div class="row row5">
                                                    <?php foreach ($games as $game){
                                                        $game_id_new=trim($game['game_id']);
                                                       
                                                        ?>
                                                        <div class="col-6 text-center">
                                                            <div class="casinoicons">
                                                                <a class="casino_games" data-game_id='<?php echo $game_id_new; ?>' data-game_name='<?php echo $game['game_name']; ?>'>
                                                                    <img src="<?php echo WEB_URL . $game['image']; ?>" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $pane_index++;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                            $parent_index++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/socket.io.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <link href="../toastr/toastr.min.css?102" rel="stylesheet"/>
<script src="../toastr/toastr.min.js?102" type="text/javascript"></script> 
    <script type="text/javascript">
        function url_redirect(link) {
            location.href = '<?php echo str_replace("index", "", MOBILE_URL); ?>' + link;
        }
    </script>
</body>
<?php
include "footer.php";
?>
<style>
    .nav-tabs .nav-link.active,
    .nav-tabs .nav-link {
        color: var(--primary-color) !important;
    }
    .border-radius-10 div {
    border-radius: 8px !important;
}
</style>

</html>
<div id="games_modal" class="modal" role="dialog">
    <div class="modal-dialog" style="max-width: 100% !important;">
        <div class="modal-dialog modal-lg">
            <div role="document" id="__BVID__51___BV_modal_content_" tabindex="-1" class="modal-content">
                <header id="__BVID__51___BV_modal_header_" class="modal-header">
                    <h5 class="modal-title casino_names" id="Rules">Bookmaker Rules</h5>
                    <button type="button" aria-label="Close" data-dismiss="modal" class="close">&times;</button>
                </header>
                <div id="__BVID__51___BV_modal_body_" class="modal-body1 casinoIframe">
                    <div class="">
                        <span class="text-danger">Coming Soon</span>
                    </div>
                </div>
                <!---->
            </div>
        </div>
    </div>
</div>
<div id="alert_modal" class="modal" role="dialog">
    <div class="modal-dialog border-radius-10 modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body  text-center" style="border-radius: 10px;">
                <div class="p-3 position-relative" style="z-index: 10; border-radius: 10px;">
                    <div class="position-relative" style="z-index: 10;">
                        <h1 class="font-weight-bold mb-2"  style="font-size: 22px;"><i class="fa fa-exclamation-triangle"></i> IMPORTANT NOTE</h1>
                        <p class="confirmation-message font-weight mb-2" style="font-size: 16px;">₹ 10 = 1 Point in Casino Games<br>Please Accept Our Terms</p>
                        <div class="d-flex gap-2 mt-4">
                            <button type="button" data-dismiss="modal" class="btn btn-danger flex-fill">Cancel</button>
                            <button onclick="create_url()"  data-dismiss="modal" type="button" class="btn btn-success flex-fill">Accept</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script type="text/javascript">
    $('#all_casino').show();
    $('.tab-pane2').hide();
    $('.tab-pane2.active').show();

    // Handle main tabs (provider)
    $(document).on('click', '.tabshow', function() {
        var showtab = $(this).data('id');

        // Reset main tabs
        $('.tabshow').removeClass('active');
        $('.tab-pane').removeClass('active').hide();

        // Activate selected
        $(this).addClass('active');
        $("#" + showtab).addClass('active').show();

        // Reset and show first inner tab in this pane
        var $parent = $("#" + showtab);
        $parent.find('.tabshow2').removeClass('active').first().addClass('active');
        $parent.find('.tab-pane2').removeClass('active').hide().first().addClass('active').show();
    });

    // Handle inner tabs (game type)
    $(document).on('click', '.tabshow2', function() {
        var showtab = $(this).data('id');
        var $parent = $(this).closest('.tab-pane');

        $parent.find('.tabshow2').removeClass('active');
        $parent.find('.tab-pane2').removeClass('active').hide();

        $(this).addClass('active');
        $parent.find('#' + showtab).addClass('active').show();
    });

    var live_game_id = "";
    var live_game_name = "";

    function showComingSoon(e) {
    toastr.clear()
    toastr.success("", "Block By Upline", {
        "timeOut": "3000",
        "iconClass": "toast-warning",
        "positionClass": "toast-top-center",
        "extendedTImeout": "0"
    });
}

    $(document).on('click', '.casino_games', function() {
         showComingSoon();

        /* var user_db = '<?php echo $user_id;?>' ;   
        var LOGINDEMOID = '<?php echo LOGINDEMOID;?>' ;   
      
if (user_db  == LOGINDEMOID) {
     toastr.clear()
					toastr.warning("", "Sorry for inconvience! USE Real ID to play all these games", {
						"timeOut": "3000",
						"iconClass":"toast-warning",
						"positionClass":"toast-top-center",
						"extendedTImeout": "0"
					});
                    return true;
}
        live_game_id = $(this).data('game_id');
        live_game_name = $(this).data('game_name');
        $("#alert_modal").modal(); */

    });

    function create_url() {
        $(".casino_names").html("");
        $.ajax({
            type: "POST",
            url: '../ajaxfiles/createSessionForLiveCasino',
            dataType: 'JSON',
            data: {
                deviceType: 0,
                game_id: live_game_id
            },
            success: function(response_data) {
                var check_status = response_data['status'];
                var message = response_data['message'];
                if (response_data && response_data.status == "ok" && response_data.data) {
                    $(".casino_names").html(live_game_name);
                    $("#games_modal").modal();

                    var html = "<iframe id='iframebox' src=" + response_data.data.url + " frameborder='0' style='height: 100vh !important;width: 100vw !important;'></iframe>";
                    $(".casinoIframe").html(html);
                } else {
                    error_message_text = message;
                    toastr.clear()
                    toastr.error("", message, {
                        "timeOut": "3000",
                        "extendedTImeout": "0"
                    });
                }
            }
        });

    }
</script>
<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>