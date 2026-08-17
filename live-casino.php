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
<style>
    .featured-box {
        flex: 0 0 68% !important;
    }

    .casino-tab {
        align-content: flex-start;
        background-color: var(--theme1-bg);
        height: 100%;
        width: 100%;
    }

    .casino-tab .nav-item {
        width: 100%;
    }

    .casino-tab .nav-link {
        color: white;
        height: 34px;
    }

    .casino-sub-tab-list {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-top: 0;
        padding: 0 5px;
        justify-content: space-between;
        background-color: var(--theme1-bg);
    }

    .casino-sub-tab-list .casino-sub-tab {
        width: 100%;

        margin: 0;
        background-color: var(--theme1-bg);
    }

    .game-heading {
        color: var(--theme1-bg);
        padding: 0px;
    }

    .nav-link.active {
        /* background-color: var(--bg-primary); */
        color: #fff;
        font-weight: bold;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        height: 34px;
        color: #fff;
    }

    .casino-sub-tab-list .nav-pills .nav-link {
        background-color: transparent;
        border: 0;
        color: #fff;
        text-decoration: none;
    }

    .nav-pills .nav-link {
        font-size: 16px;
        text-align: center;
        line-height: 1;
        cursor: pointer;
        white-space: nowrap;
        color: white !important;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        background-color: #0d6efd !important;
    }

    .nav-tabs .nav-link {
        background-color: var(--theme1-bg) !important;
        color: #fff !important;
    }

    .nav-tabs {
        background-color: var(--theme1-bg) !important;
        margin-bottom: 5px;
    }

    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        background-color: var(--theme2-bg) !important;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: var(--theme2-bg) !important;
    }

    .container-fluid {
    padding-right: 2px;
    padding-left: 2px;
    }
</style>

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
                       
                        $all_live_casino = [];
                       
                        $aviator_casino = $conn->query("SELECT * FROM live_casino_list where game_category='livecasino'");
                    
                        while ($row = mysqli_fetch_assoc($aviator_casino)) {
                          
                            // Normalize keys
                            $provider  = ucwords(strtolower(trim($row['game_provider'])));
                            $provider  = preg_replace('/\s+/', ' ', $provider);
                            $type = ucwords(strtolower(trim($row['game_type'])));
                            $type = preg_replace('/\s+/', ' ', $type);

                            // Assign back if needed for consistent display
                            $row['game_provider'] = $provider;
                            $row['game_type'] = $type;

                            $all_live_casino[$provider][$type][] = $row;
                        }
                        ?>
                        <div class="col-md-2 pt-2">
                            <ul class="nav nav-pills casino-tab slot-nav-bar">
                                <?php
                                $p_index = 0;
                                foreach ($all_live_casino as $provider => $types) {
                                    $p_id = strtolower(preg_replace('/\s+/', '', $provider));
                                    $active = ($p_index === 0) ? 'active' : '';
                                ?>

                                    <li class="nav-item <?php echo $active; ?>">
                                        <a data-id="<?php echo $p_id; ?>" class="tabshow nav-link <?php echo $active; ?>">
                                            <span> <?php echo $provider; ?></span></a>
                                    </li>

                                <?php
                                    $p_index++;
                                }
                                ?>
                            </ul>
                        </div>

                       
                        <div class="col-md-8 featured-box  live-casino">
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

                                   
                                    <?php
                                    $pane_index = 0;
                                    foreach ($types as $type => $games) {
                                        $type_id = strtolower(preg_replace('/\s+/', '', $type));
                                        $unique_id = $provider_id . '_' . $type_id;
                                        $pane_active = ($pane_index === 0) ? 'active' : '';
                                    ?>
                                        <div id="<?php echo $unique_id; ?>" class="tab-pane2 <?php echo $pane_active; ?>" style="<?php echo ($pane_active) ? '' : 'display:none;'; ?>">
                                            <div class="container-fluid">
                                                <div class="row row5" style="display: flex;flex-wrap: wrap;">
                                                    <?php foreach ($games as $game) {
                                                        $game_id_new = trim($game['game_id']);

                                                    ?>
                                                        <div style="width: 14.2857%;padding: 3px;">
                                                            <div class="casino-icon" style="position: relative;margin-bottom: 5px;">
                                                                <a class="casino_games" data-game_id="<?php echo $game_id_new; ?>"
                                                                    data-game_name="<?php echo $game['game_name']; ?>">
                                                                    <img src="<?php echo WEB_URL . $game['image']; ?>" class="img-fluid" style="width: 100%;display: block;height:auto;">

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

                            <?php
                                $parent_index++;
                            }
                            ?>
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- <script type="text/javascript" src="js/socket.io.js"></script> -->
            <script type="text/javascript" src="js/jquery.min.js?1"></script>
         
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <link href="toastr/toastr.min.css?102" rel="stylesheet" />
            <script src="toastr/toastr.min.js?102" type="text/javascript"></script>
            <!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->
             <script>
                $(document).ready(function(){
                    console.log("JS working"); // test
                });
                </script>
            <script type="text/javascript">
                function url_redirect(link) {
                    location.href = '<?php echo str_replace("index", "", MOBILE_URL); ?>' + link;
                }
            </script>
</body>
<?php
include("footer.php");
?>

</html>

<?php
include("footer-js.php");
?>  

<style>
    .live-casino .casino-icon img {
        width: 100%;
        height: 200px;
    }
    </style>
    

<script  type="text/javascript">
    
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

        /* var user_db = '<?php echo $user_id; ?>';
        var LOGINDEMOID = '<?php echo LOGINDEMOID; ?>'; */

        /* if (user_db == LOGINDEMOID) {
            // toastr.clear()
            //                 toastr.error("", "Sorry for inconvience! USE Real ID to play all these games", {
            //                     "timeOut": "3000",
            //                     "extendedTImeout": "0",


            //                 });
            toastr.clear()
            toastr.warning("", "Sorry for inconvience! USE Real ID to play all these games", {
                "timeOut": "3000",
                "iconClass": "toast-warning",
                "positionClass": "toast-top-center",
                "extendedTImeout": "0"
            });
            return true;
        }
        live_game_id = $(this).data('game_id');
        live_game_name = $(this).data('game_name');
        $("#alert_modal").modal(); */

    });

    
</script>


<script type="text/javascript" src='footer-js.js?<?php echo time(); ?>'></script>