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
	.casinoicons{
		margin-bottom: 2px !important;
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
				<div class=" casino-tables">
									  <div class="container-fluid">
											<div class="row row5 ">
												<!-- <?
												$aviator_casino=$conn->query("select * from live_casino_list where lower(game_type)='crash games' and game_category='livecasino'");
												while($aviator_casino_data=mysqli_fetch_assoc($aviator_casino)){
													$game_id_casino=trim($aviator_casino_data['game_id']);
													$image_casino=$aviator_casino_data['image'];
													$csino_game_name=$aviator_casino_data['game_name'];
													?>
													<div class="col-4 text-center">
													<div class="casinoicons">
														<a class="aviator_casino" data-game_id='<? echo $game_id_casino;?>' data-game_name='<? echo $csino_game_name; ?>'><img
																src="<? echo WEB_URL.$image_casino;?>"
																class="img-fluid">
														</a>
													</div>
												</div>	
													<?
												}
												?> -->
											
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/1.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/140511.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/154912.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/170114.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>		
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/168613.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>		
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/500000674.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>			
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/33060327.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>				
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/500000203.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>				
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/jetx.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>					
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/cricketx.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>						
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/balloon.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>						
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/500000397.gif"
																class="img-fluid">
														</a>
													</div>
												</div>						
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/141422.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>						
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/AVIATSR.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>					
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/CRAE.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>						
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/CRAESP.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/MultiPlayerAviator.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/261.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/224.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/235.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/TRB-crashx.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/TRB-aero.jpg"
																class="img-fluid">
														</a>
													</div>
												</div>	
												<div class="col-4 text-center">
													<div class="casinoicons">
													<a href="javascript:void(0);" class="aviator_casino"><img
																src="/storage/mobile/img/aviator_list/aviator.jpg"
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
	var live_game_id ="";
	var live_game_name ="";
	/* $(document).on('click', '.aviator_casino', function () {
		live_game_id = $(this).data('game_id');
		live_game_name = $(this).data('game_name');
		$("#alert_modal").modal();
		
	}); */


	
	function showComingSoon(e) {
    toastr.clear()
    toastr.success("", "Block By Upline", {
        "timeOut": "3000",
        "iconClass": "toast-warning",
        "positionClass": "toast-top-center",
        "extendedTImeout": "0"
    });
}
    $(document).on("click", ".aviator_casino", function(e) {
        showComingSoon();
         e.preventDefault();

    });

	function create_url() {
		$(".casino_names").html("");
		$.ajax({
					type	:	"POST",
					url: '../ajaxfiles/createSessionForLiveCasino',
					dataType: 'JSON',
					data	:	{deviceType : 0,game_id:live_game_id},
					success: function(response_data) {
						var check_status = response_data['status'];
						var message = response_data['message'];
						if(response_data && response_data.status == "ok" && response_data.data){
							$(".casino_names").html(live_game_name);
							$("#games_modal").modal();
							
							var html = "<iframe id='iframebox' src="+response_data.data.url+" frameborder='0' style='height: 100vh !important;width: 100vw !important;'></iframe>";
							$(".casinoIframe").html(html);
						}
						else{
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