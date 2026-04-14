<?php 
include "../include/conn.php";
$title = SITE_NAME;

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login_assets/theme1.css">
    <link rel="stylesheet" type="text/css" href="login_assets/theme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>
<body class="login">
<div class="wrapper">
    <div class="container-fluid">
        <div class=" row">
            <div class="main col-md-12">
                <div class="loginInner1">
                    <div class="featured-box-login featured-box-secundary default">
                        <h4 class="text-center">RESULT LOGIN <i class="fas fa-hand-point-down"></i></h4>
                        <span id="errortext" style="color: red;padding-bottom: 12px;"></span>
                          
                            <div class="form-group m-b-20">
                                <input name="inputUserid" id="email" placeholder="User Name" class="form-control" required="" value="" type="text">
                                <i class="fas fa-user"></i>
                                <span id="username-error" class="error">please fill the username</span>
                            </div>
                            <div class="form-group m-b-20">
                                <input name="inputPassword" id="pass" placeholder="Password  " value="" class="form-control" required="" autocomplete="off" type="password">
                                <i class="fas fa-key"></i>
                                <span id="password-error" class="error">please fill the Password</span>
                            </div>
                            
                            
							
                            <div class="form-group text-center">
                                <button type="submit" id="logi"  class="btn btn-submit btn-login"  onclick="goLogin()">Login<i class="fas fa-sign-in-alt"></i></button>
								
                            </div>
                           
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>

</html>

<script>
        	function goLogin()
			{
			
					var username = $("#email").val();
					var password = $("#pass").val();
					if(username=="" || password=="")
					{
						$("#errortext").css({"display":"block"});
						$("#errortext").text("Please Enter Email and Password");
					}
					else
					{
					
					$('#logi').html("<i class='fa fa-spinner fa-spin' id='loading'></i>Loading");
					$('#logi').attr("disabled","disabled");
					 $.ajax({
						 type: 'POST',
						 url: 'ajaxfiles/logincheck.php',
						 data: {username:username,password:password},
						 success: function(response) {
						 console.log(response); 
							if(response=="NA")
							{
								$("#errortext").css({"display":"block"});
								$("#errortext").text("Account is not activated!");
								$('#logi').text("Login");	
								$('#logi').attr("disabled",false);								
							}
							else if(response=="0")
							{
								$("#errortext").css({"display":"block"});
								$("#errortext").text("Wrong Username & Password!");
								$('#logi').text("Login");	
								$('#logi').attr("disabled",false);																
							}
							else if(response == "verify")
							{
								$("#errortext").css({"display":"block"});
								$("#errortext").html("Please verify your email from your inbox or spam. </br> <a href='email_resend.php?"+email+"' style='color:blue'>Resend Mail</a>");
								$('#logi').text("Login");	
								$('#logi').attr("disabled",false);																
							}
							else if(response == "skey")
							{
								location.href="two-step_auth.php";
							}
							else
							{
								location.href="index.php";
							}
						 }
					 });
					}
			} 
			function hideError()
			{
				$("#errortext").text("");
				$("#errortext").hide();
			}
      </script>