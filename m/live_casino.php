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

	if($parentKingAdmin > 0){
		$check_cess_parent = $parentKingAdmin;
	}
	else{
		$check_cess_parent = $parentSuperMDL;
	}

	$get_access = $conn->query("select cricket_access,soccer_access,tennis_access,video_access from user_master where Id=$check_cess_parent");
	$fetch_access = mysqli_fetch_assoc($get_access);

    $userAgent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/android|iphone|ipad|ipod|blackberry|iemobile|opera mini/i', $userAgent)) {
    $device = 'Mob';
} else {
    $device = 'Web';
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
.sports .nav-tabs .nav-link.active {
    background-color: var(--theme1-bg90) !important;
}
</style>
<?php
	include("head_css.php");
?>
<script type="text/javascript">
var check = false;
(function(a) {
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
        .test(a) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
        .test(a.substr(0, 4))) check = true;
})(navigator.userAgent || navigator.vendor || window.opera);
if (check == false) {
    window.location.assign('<?php echo WEB_URL."home"; ?>');
}
</script>

<body cz-shortcut-listen="true">
    <div id="app">
        <!--
<?php
	include ("loader.php");
?>
 -->
 <style>
    .flex-wrap{
        margin-top: 5px !important; 
    }
    .casinowidth{
        width: calc(48%);
    }
    .casinoicons img {
    width: 197px;
     height: 103px !important; 
}
 </style>
        <div>
            <?php
				include("header.php");
			?>
            <div class="latest-event d-xl-none">

              
            </div>
            <div class="main-content">
                <ul class="nav nav-tabs game-nav-bar">
                <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Lottery </a></li>
                    <li class="nav-item"><a href="home"
                            class="type nav-link router-link-exact-active router-link-active active newclass"> Sports </a></li>
                    <!-- <li class="nav-item"><a href="home" class="type nav-link"> Sports </a></li> -->
                    <li class="nav-item"><a href="slot" class="type nav-link newclass"> Our Casino </a></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass" > Live Casino </a></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Slots </a></li>
                    <li class="nav-item"><a href="javascript:void(0)" class="type nav-link newclass"> Fantasy </a></li>
                    <!-- <?php if(ELECTION_EVENT_ID != ''){ ?>
                    	<li class="nav-item"><a href="/m/event_full_market?eventType=<?php echo ELECTION_EVENT_TYPE_ID;?>&eventId=<?php echo ELECTION_EVENT_ID;?>&marketId=<?php echo ELECTION_MARKET_ID;?>" class="type nav-link"> <?php echo ELECTION_MARKET_NAME;?> </a></li>
                    <?php } ?> -->
                   <!--  <li class="nav-item"><a href="others" class="type nav-link"> Others </a></li> -->
                </ul>
                <div>
                   
                  
                    <div class="tab-content">
                        <div id="casino-tables" class="tab-pane active casino-tables">
                            <div class="container-fluid1">
                              
                                <div class="d-flex flex-wrap">
                              
                                <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="javascript:void(0)" class=""><img
                                                src="../storage/casinotab/livecasino/livecasino1.jpg"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="javascript:void(0)" class=""><img
                                                src="../storage/casinotab/livecasino/livecasino2.png"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                              
                                <div class="casinowidth text-center">
                                    <div class="casinoicons">
                                        <a href="javascript:void(0)" class=""><img
                                                src="../storage/casinotab/livecasino/livecasino3.png"
                                                class="img-fluid">
                                        </a>
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

    <script type="text/javascript" src="https://saffronexch247.com/js/socket.io.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <div role="dialog" class="modal in" id="modal_login_notification_popup" aria-modal="true">
        <div class="modal-dialog modal-xl"><span tabindex="0"></span>
            <div role="document" tabindex="-1" class="modal-content" id="__BVID__151___BV_modal_content_">
                <header class="modal-header" id="__BVID__151___BV_modal_header_">
                    <h5 class="modal-title" id="__BVID__151___BV_modal_title_"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </header>
                <div class="modal-body" id="__BVID__151___BV_modal_body_">
                    <div style="box-shadow: 0px 0px 5px; padding: 10px;">
                        <h4>Dear Client,</h4>
                        <h6 class="mb-1">You are requested to login with our official site <a
                                href="javascript:void(0)">'<?php echo SITE_NAME; ?>.com'</a> only. Please check the site
                            name before you login.</h6>
                        <h6 class="mb-1">Thanks for your support.</h6>
                        <h6 class="mb-1">Team <?php echo SITE_NAME; ?></h6>
                    </div>
                    <div class="mt-3 font-hindi" style="box-shadow: 0px 0px 5px; padding: 10px;">
                        <h4>प्रिय ग्राहक,</h4>
                        <h6 class="mb-1">आपसे अनुरोध है कि केवल हमारी आधिकारिक साइट <a
                                href="javascript:void(0)">'<?php echo SITE_NAME; ?>.com'</a> से लॉगिन करें। लॉगइन करने
                            से पहले साइट का नाम जरूर देख लें।</h6>
                        <h6 class="mb-1">आपके समर्थन के लिए धन्यवाद।</h6>
                        <h6 class="mb-1">टीम <?php echo SITE_NAME; ?></h6>
                    </div>
                    <div class="text-right mt-3">
                        <button class="btn btn-primary" style="min-width: 100px;" data-dismiss="modal">OK</button>
                    </div>
                </div>
                <!---->
            </div><span tabindex="0"></span>
        </div>
    </div>
<?php
    $check = $conn->query("SELECT * FROM home_image WHERE device='$device' LIMIT 1");
$row   = $check->fetch_assoc();

if ($device == 'Mob' && $row) {
    
?>

	<div role="dialog" class="modal in" id="home_poup" aria-modal="true">
        <div class="modal-dialog modal-xl"><span tabindex="0"></span>
            <div role="document" tabindex="-1" class="modal-content" id="__BVID__151___BV_modal_content_">
                <header class="modal-header" id="__BVID__151___BV_modal_header_">
                    <h5 class="modal-title" id="__BVID__151___BV_modal_title_"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </header>
                
                <img src="../<?php echo $row['image'] . '?' . time(); ?>" style="height:95vh">
               
            </div><span tabindex="0"></span>
        </div>
    </div>

<?php
/* if(!isset($_SESSION['login_popup'])){
    echo '<script type="text/javascript">$(document).ready(function (){$("#modal_login_notification_popup").modal("show"); });</script>';
}
$_SESSION['login_popup'] = 1; */
if (!isset($_SESSION['home_poup'])) {
	echo '<script type="text/javascript">$(document).ready(function (){$("#home_poup").modal("show"); });</script>';
}
$_SESSION['home_poup'] = 1;
}
?>

<script type="text/javascript">
    function url_redirect(link) {
        location.href = '<?php echo str_replace("index","",MOBILE_URL); ?>' + link;
    }
    </script>
</body>

<?php
	include "footer.php";
?>

</html>

<script type="text/javascript">
var cricket_html = "";
var football_html = "";
var tennis_html = "";


function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var strTime = hours + ':' + minutes + '' + ampm;
    return strTime;
}

var month_name = function(dt) {
    mlist = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    return mlist[dt.getMonth()];
};

var b11 = "-";
var b21 = "-";
var b31 = "-";

var l11 = "-";
var l21 = "-";
var l31 = "-";

var site_url = '<?php echo WEB_URL; ?>';
var socket = io("<?php echo SITE_SPORTS_IP; ?>");

$.ajax({
    type: 'GET',
    url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
    success: function(data) {
        setData(data);
    }
});
var event_type_array = {};

function setData(data) {
    if (data) {
        if (data.sport) {
            if (data.sport.body) {
                if (data.sportId == 4) {
                    cricket_html = "";
                } else if (data.sportId == 1) {
                    football_html = "";
                } else if (data.sportId == 2) {
                    tennis_html = "";
                }
                var list_sport = data.sport.body;
                eventNotIncluded = data.eventNotIncluded;
                var sportId = data.sportId;
                var result = Object.keys(data.sport.body).length;
                if (result > 0) {
                    var main_datas = data;
                    var main_x = data;


                    smdl_c = ['1', '2'];
                    mdl_c = ['1', '2'];
                    dl_c = ['1', '2'];
                    smdl_s = ['1', '2'];
                    smdl_b = ['1', '2'];
                    smdl_r = ['1', '2'];
                    mdl_s = ['1', '2'];
                    dl_s = ['1', '2'];
                    smdl_t = ['1', '2'];
                    mdl_t = ['1', '2'];
                    mdl_b = ['1', '2'];
                    mdl_r = ['1', '2'];
                    dl_t = ['1', '2'];
                    dl_b = ['1', '2'];
                    dl_r = ['1', '2'];
                    evnt = ['1', '2'];
                    evnt = eventNotIncluded || [];



                    data = main_datas.sport;
                    data.body.sort(function(a, b) {
                        return (a.inPlay === b.inPlay) ? 0 : (a.inPlay ? -1 : 1);
                    });
                    key = Object.keys(data.body)[0];
                    eventType = parseInt(data.body[key].SportId);
                    event_type_array[eventType] = data.body.length;
                    for (var i in data.body) {


                        if (data.body[i]) {
                            event_id = data.body[i].matchid.toString();
                            marketId = data.body[i].marketid;
                            n1 = smdl_c.includes(event_id) || smdl_c.includes(event_id.toString());
                            n2 = mdl_c.includes(event_id) || mdl_c.includes(event_id.toString());
                            n3 = dl_c.includes(event_id) || dl_c.includes(event_id.toString());

                            s1 = smdl_s.includes(event_id) || smdl_s.includes(event_id.toString());
                            s2 = mdl_s.includes(event_id) || mdl_s.includes(event_id.toString());
                            s3 = dl_s.includes(event_id) || dl_s.includes(event_id.toString());

                            t1 = smdl_t.includes(event_id) || smdl_t.includes(event_id.toString());
                            t2 = mdl_t.includes(event_id) || mdl_t.includes(event_id.toString());
                            t3 = dl_t.includes(event_id) || dl_t.includes(event_id.toString());

                            b1 = smdl_b.includes(event_id) || smdl_b.includes(event_id.toString());
                            b2 = mdl_b.includes(event_id) || mdl_b.includes(event_id.toString());
                            b3 = dl_b.includes(event_id) || dl_b.includes(event_id.toString());

                            r1 = smdl_r.includes(event_id) || smdl_r.includes(event_id.toString());
                            r2 = mdl_r.includes(event_id) || mdl_r.includes(event_id.toString());
                            r3 = dl_r.includes(event_id) || dl_r.includes(event_id.toString());
                            e1 = evnt.includes(parseInt(marketId)) || evnt.includes(marketId.toString());
                            if (!n1 && !n2 && !n3 && !s1 && !s2 && !s3 && !t1 && !t2 && !t3 && !b1 && !b2 && !b3 && !
                                r1 && !r2 && !r3 && !e1) {

                                if (eventType == 4) {
                                    event_name = data.body[i].matchName;

                                    marketTime = data.body[i].matchdate;
                                    marketDateTime = data.body[i].matchdate;





                                    inPlay = data.body[i].inPlay || "0";
                                    marketId = data.body[i].marketid;
                                    marketinPlay = data.body[i].inPlay || "0";
                                    isFancy = data.body[i].fancy || "0";
                                    is_tv = data.body[i].tv || "0";
                                    fancySpan = "";
                                    market_status = "";
                                    if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                        marketinPlay == 1) {
                                        market_status = "active-icon";
                                    }

                                    if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                        fancy_status =
                                            "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                    } else {
                                        fancy_status = "";

                                    }

                                    if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                        tv_status =
                                            "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                    } else {
                                        tv_status = "";

                                    }


                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    if (data.body[i].b1) {
                                        back_0 = data.body[i].b1;
                                    }
                                    if (data.body[i].b2) {
                                        back_1 = data.body[i].b2;
                                    }
                                    if (data.body[i].b3) {
                                        back_2 = data.body[i].b3;
                                    }

                                    if (data.body[i].l1) {
                                        lay_0 = data.body[i].l1;
                                    }
                                    if (data.body[i].l2) {
                                        lay_1 = data.body[i].l2;
                                    }
                                    if (data.body[i].b3) {
                                        lay_2 = data.body[i].l3;
                                    }

                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                        "Oct", "Nov", "Dec"
                                    ];

                                    marketTime1 = new Date(marketTime);
                                    marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                    marketMonth = monthNames[marketTime1.getMonth()];
                                    marketYear = marketTime1.getFullYear();
                                    marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                    marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                    var ampm = marketHours >= 12 ? 'pm' : 'am';

                                    marketHours = marketHours % 12;
                                    marketHours = marketHours ? marketHours : 12;

                                    market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                        marketHours + ":" + marketMinutes + " " + ampm;

                                    cricket_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                        eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                        "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong class='match_name_cust'>" +
                                        event_name + "</strong></p><p class='mb-0 match_name_cust'>" + market_full_date +
                                        "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                        market_status + "' style='vertical-align: bottom;'></span></span> " +
                                        tv_status + " " + fancy_status +
                                        " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                        "</a></div></div></div></div> </span>";



                                }


                                if (eventType == 1) {
                                    event_name = data.body[i].matchName;

                                    marketTime = data.body[i].matchdate;
                                    marketDateTime = data.body[i].matchdate;





                                    inPlay = data.body[i].inPlay || "0";
                                    marketId = data.body[i].marketid;
                                    marketinPlay = data.body[i].inPlay || "0";
                                    isFancy = data.body[i].fancy || "0";
                                    is_tv = data.body[i].tv || "0";
                                    fancySpan = "";
                                    market_status = "";
                                    if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                        marketinPlay == 1) {
                                        market_status = "active-icon";
                                    }

                                    if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                        fancy_status =
                                            "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                    } else {
                                        fancy_status = "";

                                    }

                                    if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                        tv_status =
                                            "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                    } else {
                                        tv_status = "";

                                    }


                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    if (data.body[i].b1) {
                                        back_0 = data.body[i].b1;
                                    }
                                    if (data.body[i].b2) {
                                        back_1 = data.body[i].b2;
                                    }
                                    if (data.body[i].b3) {
                                        back_2 = data.body[i].b3;
                                    }

                                    if (data.body[i].l1) {
                                        lay_0 = data.body[i].l1;
                                    }
                                    if (data.body[i].l2) {
                                        lay_1 = data.body[i].l2;
                                    }
                                    if (data.body[i].b3) {
                                        lay_2 = data.body[i].l3;
                                    }



                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                        "Oct", "Nov", "Dec"
                                    ];

                                    marketTime1 = new Date(marketTime);
                                    marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                    marketMonth = monthNames[marketTime1.getMonth()];
                                    marketYear = marketTime1.getFullYear();
                                    marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                    marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                    var ampm = marketHours >= 12 ? 'pm' : 'am';

                                    marketHours = marketHours % 12;
                                    marketHours = marketHours ? marketHours : 12;

                                    market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                        marketHours + ":" + marketMinutes + " " + ampm;

                                    football_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                        eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                        "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong class='match_name_cust'>" +
                                        event_name + "</strong></p><p class='mb-0 match_name_cust'>" + market_full_date +
                                        "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                        market_status + "' style='vertical-align: bottom;'></span></span> " +
                                        tv_status + " " + fancy_status +
                                        " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                        "</a></div></div></div></div> </span>";



                                }

                                if (eventType == 2) {
                                    event_name = data.body[i].matchName;

                                    marketTime = data.body[i].matchdate;
                                    marketDateTime = data.body[i].matchdate;





                                    inPlay = data.body[i].inPlay || "0";
                                    marketId = data.body[i].marketid;
                                    marketinPlay = data.body[i].inPlay || "0";
                                    isFancy = data.body[i].fancy || "0";
                                    is_tv = data.body[i].tv || "0";
                                    fancySpan = "";
                                    market_status = "";
                                    if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                        marketinPlay == 1) {
                                        market_status = "active-icon";
                                    }

                                    if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                        fancy_status =
                                            "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                    } else {
                                        fancy_status = "";

                                    }

                                    if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                        tv_status =
                                            "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                    } else {
                                        tv_status = "";

                                    }


                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    if (data.body[i].b1) {
                                        back_0 = data.body[i].b1;
                                    }
                                    if (data.body[i].b2) {
                                        back_1 = data.body[i].b2;
                                    }
                                    if (data.body[i].b3) {
                                        back_2 = data.body[i].b3;
                                    }

                                    if (data.body[i].l1) {
                                        lay_0 = data.body[i].l1;
                                    }
                                    if (data.body[i].l2) {
                                        lay_1 = data.body[i].l2;
                                    }
                                    if (data.body[i].b3) {
                                        lay_2 = data.body[i].l3;
                                    }



                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                        "Oct", "Nov", "Dec"
                                    ];

                                    marketTime1 = new Date(marketTime);
                                    marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                    marketMonth = monthNames[marketTime1.getMonth()];
                                    marketYear = marketTime1.getFullYear();
                                    marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                    marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                    var ampm = marketHours >= 12 ? 'pm' : 'am';

                                    marketHours = marketHours % 12;
                                    marketHours = marketHours ? marketHours : 12;

                                    market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                        marketHours + ":" + marketMinutes + " " + ampm;

                                    tennis_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                        eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                        "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                        event_name + "</strong></p><p class='mb-0 match_name_cust'>" + market_full_date +
                                        "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                        market_status + "' style='vertical-align: bottom;'></span></span> " +
                                        tv_status + " " + fancy_status +
                                        " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                        "</a></div></div></div></div> </span>";



                                }

                                if (eventType == 3) {
                                    event_name = data.body[i].matchName;

                                    marketTime = data.body[i].matchdate;
                                    marketDateTime = data.body[i].matchdate;





                                    inPlay = data.body[i].inPlay || "0";
                                    marketId = data.body[i].marketid;
                                    marketinPlay = data.body[i].inPlay || "0";
                                    isFancy = data.body[i].fancy || "0";
                                    is_tv = data.body[i].tv || "0";
                                    fancySpan = "";
                                    market_status = "";
                                    if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                        marketinPlay == 1) {
                                        market_status = "active-icon";
                                    }

                                    if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                        fancy_status =
                                            "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                    } else {
                                        fancy_status = "";

                                    }

                                    if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                        tv_status =
                                            "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                    } else {
                                        tv_status = "";

                                    }


                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    if (data.body[i].b1) {
                                        back_0 = data.body[i].b1;
                                    }
                                    if (data.body[i].b2) {
                                        back_1 = data.body[i].b2;
                                    }
                                    if (data.body[i].b3) {
                                        back_2 = data.body[i].b3;
                                    }

                                    if (data.body[i].l1) {
                                        lay_0 = data.body[i].l1;
                                    }
                                    if (data.body[i].l2) {
                                        lay_1 = data.body[i].l2;
                                    }
                                    if (data.body[i].b3) {
                                        lay_2 = data.body[i].l3;
                                    }



                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                        "Oct", "Nov", "Dec"
                                    ];

                                    marketTime1 = new Date(marketTime);
                                    marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                    marketMonth = monthNames[marketTime1.getMonth()];
                                    marketYear = marketTime1.getFullYear();
                                    marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                    marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                    var ampm = marketHours >= 12 ? 'pm' : 'am';

                                    marketHours = marketHours % 12;
                                    marketHours = marketHours ? marketHours : 12;

                                    market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                        marketHours + ":" + marketMinutes + " " + ampm;

                                    golf_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                        eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                        "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                        event_name + "</strong></p><p class='mb-0 match_name_cust'>" + market_full_date +
                                        "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                        market_status + "' style='vertical-align: bottom;'></span></span> " +
                                        tv_status + " " + fancy_status +
                                        " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                        "</a></div></div></div></div> </span>";



                                }
                                if (eventType == 7522) {
                                    event_name = data.body[i].matchName;

                                    marketTime = data.body[i].matchdate;
                                    marketDateTime = data.body[i].matchdate;





                                    inPlay = data.body[i].inPlay || "0";
                                    marketId = data.body[i].marketid;
                                    marketinPlay = data.body[i].inPlay || "0";
                                    isFancy = data.body[i].fancy || "0";
                                    is_tv = data.body[i].tv || "0";
                                    fancySpan = "";
                                    market_status = "";
                                    if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                        marketinPlay == 1) {
                                        market_status = "active-icon";
                                    }

                                    if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                        fancy_status =
                                            "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                    } else {
                                        fancy_status = "";

                                    }

                                    if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                        tv_status =
                                            "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                    } else {
                                        tv_status = "";

                                    }


                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    if (data.body[i].b1) {
                                        back_0 = data.body[i].b1;
                                    }
                                    if (data.body[i].b2) {
                                        back_1 = data.body[i].b2;
                                    }
                                    if (data.body[i].b3) {
                                        back_2 = data.body[i].b3;
                                    }

                                    if (data.body[i].l1) {
                                        lay_0 = data.body[i].l1;
                                    }
                                    if (data.body[i].l2) {
                                        lay_1 = data.body[i].l2;
                                    }
                                    if (data.body[i].b3) {
                                        lay_2 = data.body[i].l3;
                                    }



                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                        "Oct", "Nov", "Dec"
                                    ];

                                    marketTime1 = new Date(marketTime);
                                    marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                    marketMonth = monthNames[marketTime1.getMonth()];
                                    marketYear = marketTime1.getFullYear();
                                    marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                    marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                    var ampm = marketHours >= 12 ? 'pm' : 'am';

                                    marketHours = marketHours % 12;
                                    marketHours = marketHours ? marketHours : 12;

                                    market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                        marketHours + ":" + marketMinutes + " " + ampm;

                                    basketball_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                        eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                        "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                        event_name + "</strong></p><p class='mb-0 match_name_cust'>" + market_full_date +
                                        "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                        market_status + "' style='vertical-align: bottom;'></span></span> " +
                                        tv_status + " " + fancy_status +
                                        " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                        "</a></div></div></div></div> </span>";



                                }

                                if (eventType == 7524) {
                                    event_name = data.body[i].matchName;

                                    marketTime = data.body[i].matchdate;
                                    marketDateTime = data.body[i].matchdate;





                                    inPlay = data.body[i].inPlay || "0";
                                    marketId = data.body[i].marketid;
                                    marketinPlay = data.body[i].inPlay || "0";
                                    isFancy = data.body[i].fancy || "0";
                                    is_tv = data.body[i].tv || "0";
                                    fancySpan = "";
                                    market_status = "";
                                    if (marketinPlay == true || marketinPlay == "True" || marketinPlay == "1" ||
                                        marketinPlay == 1) {
                                        market_status = "active-icon";
                                    }

                                    if (isFancy == true || isFancy == "True" || isFancy == "1" || isFancy == 1) {
                                        fancy_status =
                                            "<span class='game-icon'><img src='../storage/front/img/ic_fancy.png' class='fancy-icon'></span>";
                                    } else {
                                        fancy_status = "";

                                    }

                                    if (is_tv == true || is_tv == "True" || is_tv == "1" || is_tv == 1) {
                                        tv_status =
                                            "<span class='game-icon'><i class='fas fa-tv v-m icon-tv'></i></span>";
                                    } else {
                                        tv_status = "";

                                    }


                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    var back_0 = "-";
                                    var back_1 = "-";
                                    var back_2 = "-";

                                    var lay_0 = "-";
                                    var lay_1 = "-";
                                    var lay_2 = "-";

                                    if (data.body[i].b1) {
                                        back_0 = data.body[i].b1;
                                    }
                                    if (data.body[i].b2) {
                                        back_1 = data.body[i].b2;
                                    }
                                    if (data.body[i].b3) {
                                        back_2 = data.body[i].b3;
                                    }

                                    if (data.body[i].l1) {
                                        lay_0 = data.body[i].l1;
                                    }
                                    if (data.body[i].l2) {
                                        lay_1 = data.body[i].l2;
                                    }
                                    if (data.body[i].b3) {
                                        lay_2 = data.body[i].l3;
                                    }



                                    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep",
                                        "Oct", "Nov", "Dec"
                                    ];

                                    marketTime1 = new Date(marketTime);
                                    marketdate = ("0" + (marketTime1.getDate())).slice(-2);
                                    marketMonth = monthNames[marketTime1.getMonth()];
                                    marketYear = marketTime1.getFullYear();
                                    marketHours = ("0" + (marketTime1.getHours())).slice(-2);
                                    marketMinutes = ("0" + (marketTime1.getMinutes())).slice(-2);
                                    var ampm = marketHours >= 12 ? 'pm' : 'am';

                                    marketHours = marketHours % 12;
                                    marketHours = marketHours ? marketHours : 12;

                                    market_full_date = marketMonth + " " + marketdate + ", " + marketYear + " " +
                                        marketHours + ":" + marketMinutes + " " + ampm;

                                    icehockey_html += "<span onclick=\"url_redirect('event_full_market?eventType=" +
                                        eventType + "&eventId=" + event_id + "&marketId=" + marketId +
                                        "');\"><div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-8'><p class='mb-0 game-name'><strong  class='match_name_cust'>" +
                                        event_name + "</strong></p><p class='mb-0 match_name_cust'>" + market_full_date +
                                        "</p></div><div class='col-4 text-right'><div class='game-icons'><span class='game-icon'><span class='" +
                                        market_status + "' style='vertical-align: bottom;'></span></span> " +
                                        tv_status + " " + fancy_status +
                                        " <span class='game-icon'><img src='../storage/mobile/img/ic_bm.png?1' class='bm-icon'></span></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><b >1</b></div><div class='text-center game-col game-home'><b >X</b></div><div class='text-center game-col game-home'><b >2</b></div></div></div><div class='row row5'><div class='col-12'><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_0 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_0 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_2 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_2 +
                                        "</a></div><div class='text-center game-col game-home'><a href='javascript:void(0);' class='btn-back'>" +
                                        back_1 + "</a> <a href='javascript:void(0);' class='btn-lay'>" + lay_1 +
                                        "</a></div></div></div></div> </span>";



                                }

                            }
                        }

                    }


                    if (eventType == 4) {
                        if (cricket_html == "") {
                            cricket_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#cricket_event").html(cricket_html);
                        //	cricket_html = "";
                    }
                    if (eventType == 2) {
                        if (tennis_html == "") {
                            tennis_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#tennis_event").html(tennis_html);
                        //tennis_html = "";
                    }
                    if (eventType == 1) {
                        if (football_html == "") {
                            football_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#football_event").html(football_html);
                        //football_html = "";
                    }

                    if (eventType == 3) {
                        if (golf_html == "") {
                            golf_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#golf_event").html(golf_html);
                        golf_html = "";
                    }
                    if (eventType == 7522) {
                        if (basketball_html == "") {
                            basketball_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#basketball_event").html(basketball_html);
                        basketball_html = "";
                    }
                    if (eventType == 7524) {
                        if (icehockey_html == "") {
                            icehockey_html =
                                "<div class='game-list pt-1 pb-1 container-fluid'><div class='row row5'><div class='col-12'><p class='text-center mb-1 mt-1'>No real-time records found</p></div></div></div>";
                        }
                        $("#icehockey_event").html(icehockey_html);
                        icehockey_html = "";
                    }
                } else {
                    var x =
                        '<div class="game-listing-container" style="max-height: calc((100vh - 184px) / 2); overflow-x: auto;"> <div class="game-list pt-1 pb-1 container-fluid"><div class="row row5"><div class="col-12"><p class="text-center mb-1 mt-1">No real-time records found</p> </div></div> </div> </div>';
                    if (sportId == 4) {
                        $("#cricket_event").html(x);
                    }
                    if (sportId == 2) {
                        $("#tennis_event").html(x);
                    }
                    if (sportId == 1) {
                        $("#football_event").html(x);
                    }
                }
            }
        }
    }
}

socket.on('connect', function() {
    <?php if($fetch_access['cricket_access'] == 1){ ?>
    socket.emit('getMatches', {
        eventType: 4
    });
    <?php } ?>
});

function tab_view(tab_name) {
    var has_data = false;
    if (tab_name == "football") {
        if (football_html != "") {
            has_data = true;
        }
        <?php if($fetch_access['soccer_access'] == 1){ ?>
        if (!event_type_array['1'] || (event_type_array['1'] && event_type_array['1'] <= 0)) {
            $.ajax({
                type: 'GET',
                url: '<?php echo SITE_SPORTS_IP; ?>getSoccerMatches',
                success: function(data) {
                    setData(data);
                }
            });
        }
        socket.emit('getMatches', {
            eventType: 1
        });
        <?php } ?>
    } else if (tab_name == "tennis") {
        if (tennis_html != "") {
            has_data = true;
        }
        <?php if($fetch_access['tennis_access'] == 1){ ?>
        if (!event_type_array['2'] || (event_type_array['2'] && event_type_array['2'] <= 0)) {
            $.ajax({
                type: 'GET',
                url: '<?php echo SITE_SPORTS_IP; ?>getTennisMatches',
                success: function(data) {
                    setData(data);
                }
            });
        }
        socket.emit('getMatches', {
            eventType: 2
        });
        <?php } ?>
    } else if (tab_name == "cricket") {
        if (cricket_html != "") {
            has_data = true;
        }
        <?php if($fetch_access['cricket_access'] == 1){ ?>
        if (!event_type_array['4'] || (event_type_array['4'] && event_type_array['4'] <= 0)) {
            $.ajax({
                type: 'GET',
                url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
                success: function(data) {
                    setData(data);
                }
            });
        }
        socket.emit('getMatches', {
            eventType: 4
        });
        <?php } ?>
    }else if (tab_name == "politics") {
         
        if (!event_type_array['8'] || (event_type_array['8'] && event_type_array['8'] <= 0)) {
            $.ajax({
                type: 'GET',
                url: '<?php echo SITE_SPORTS_IP; ?>getCricketMatches',
                success: function(data) {
                    setData(data);
                }
            });
        }
        socket.emit('getMatches', {
            eventType: 8
        });
        
     } else {}
    if (!has_data) {
        var html = `<div class='game-list pt-1 pb-1 container-fluid'>
											<div class='row row5'>
												<div class='col-12'>
													<p class='text-center mb-1 mt-1'><i class="fa fa-spinner fa-spin" style="font-size:25px;"></i></p>
												</div>
											</div>
										</div>`;
        if (tab_name == "football") {
            $("#football_event").html(html);
        } else if (tab_name == "tennis") {
            $("#tennis_event").html(html);
        } else if (tab_name == "cricket") {
            $("#cricket_event").html(html);
        }
    } else {
        if (tab_name == "football") {
            $("#football_event").html(football_html);
        } else if (tab_name == "tennis") {
            $("#tennis_event").html(tennis_html);
        } else if (tab_name == "cricket") {
            $("#cricket_event").html(cricket_html);
        }
    }


}

socket.on('eventGetLiveEventName', function(data) {
    args = data;
    setData(data);
});
</script>
<script type="text/javascript" src='footer-js.js?01'></script>