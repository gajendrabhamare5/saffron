<?php
include('../include/conn.php');
include "session.php";

$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$controller_controller_type =     $_SESSION['CONTROLLER_CONTROLLER_TYPE'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
    header("Location: ../logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo SITE_NAME; ?> | Upload Logo</title>
    <?php
    include("header.php");
    ?>
    <div class="right_col" role="main" style="min-height: 1171px;">

        <div class="">
            <!--<div class="page-title">
               <div class="title_left">
                  <h3>Stop Rate Setting</h3>
               </div>
            </div>-->
            <div class="clearfix"></div>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Upload Logo</h2>
                            <div class="clearfix"></div>

                        </div>
                        <!-- <div class="x_content">
						
						<div class="alert alert-success" style="display:none;">
						<strong></strong>
					</div>
					<div class="alert alert-danger" style="display:none;">
						<strong></strong>
					</div> -->




                        <div class="item form-group">
                            <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sport_name">Casino List <span class="required">*</span>
							</label> -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="card-body">
                                    <!-- <div class="form-group">
									<label class="form-label" style="float:left;width:50%;">
										<input type="radio" name="device" value="Mob"> Mobile
									</label>
									<label class="form-label">
										<input type="radio" name="device" value="Web"> Web
										</label>

								</div> -->
                                    <div class="form-group">
                                        <label class="form-label">Select Image</label>
                                        <input type="file" name="image_file" accept="image/*" class="form-control" onchange="readURL(this,1);" id="image_file">
                                        <img id="blah1" src="http://via.placeholder.com/1168x456" style="max-width:200px;max-height:200px;margin: auto;padding: 10px;">
                                    </div>
                                    <script>
                                        function readURL(input, id) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    $('#blah' + id)
                                                        .attr('src', e.target.result);
                                                };
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>
                                    <!-- <div class="form-group">
									<label class="form-label">Url</label>
									<input type="text" class="form-control" id="url" name="url">
								</div> -->
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <button type="button" onclick="add_image()" class="btn btn-primary">Add</button>
                                </div>
                                </select>
                            </div>
                        </div>

                        <!--  <label class="control-label col-md-12 col-sm-12 col-xs-12" >
	<a id="maintanancelist" onclick="doMaintance()" type="submit" class="btn btn-danger">Restart</a></label> -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    include("footer.php");
    ?>
    </body>

</html>



<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="../js/socket.io.js"></script>
<script type="text/javascript">
    function add_image(){
			var image_file = $('#image_file').prop('files')[0];
			var title = $("#title").val();

			var form_data = new FormData();

			form_data.append('image_file', image_file);
			form_data.append('title', title);
			
			if (!image_file) {
            alert("Please select a image.");
            return;
        }
			
				$.ajax({
					type: "POST",
					data: form_data,
					dataType: 'text',
					contentType: false,
					cache: false,
					processData: false,
					url: "ajaxfiles/logo_add_process.php",
					success: function(response){
						
						if(response.trim() == "ok")
						{
							location.reload();
						}
						else if(response.trim() == "updated")
						{
                            alert(" Image updated Successfully.");
							location.reload();
						}
                        else if(response.trim() == "update_error")
						{
							alert("Sorry, Image not update.");
						}
						else if(response.trim() == "image_error")
						{
							alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
						}
						else if(response.trim() == "size_error")
						{
							alert("Slider image exceeds the size limit by 800 Kb..");
						}
						else if(response.trim() == "move_error")
						{
							alert("Sorry, there was an error uploading your file.");
						}
					}
				});
		}
</script>