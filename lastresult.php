<?

include('include/conn.php');
include('include/flip_function.php');
include('session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$currentDateTime = date("Y-m-d H:i:s");

$get_account_data = $conn->query("select event_name from bet_teen_details where TIMESTAMPDIFF(MINUTE, NOW(), event_time) >= 30");

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
                        <div class="col-md-10 featured-box">
                            <div class="row row5 aaa-container aaa">
                                <div class="text-center">
                                   <button class="btn btn-success" id="showBtn">Show Names</button>
                                </div>

                                <div class="card mt-3" id="nameList" style="display:none;">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">John</li>
                                            <li class="list-group-item">Michael</li>
                                            <li class="list-group-item">Sarah</li>
                                            <li class="list-group-item">David</li>
                                            <li class="list-group-item">Emma</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <script type="text/javascript" src="js/jquery.min.js"></script>
            <?php
            include("footer.php");
            ?>
        </div>
    </div>
<script>
    $('#showBtn').click(function(){
        $('#nameList').slideToggle();
    });
</script>
</body>

<?php
include("footer-js.php");
include("footer-result-popup.php");
?>

</html>