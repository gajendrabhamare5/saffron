<html><head>
<title> <?php echo PROJECTNAME; ?></title>
<link rel="stylesheet" type="text/css" href="https://dzm0kbaskt4pv.cloudfront.net/v2/static/backend/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://dzm0kbaskt4pv.cloudfront.net/v2/static/backend/css/style.css">
<style type="text/css">
        .error-page {
            background-color: #eee;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .token-box{
            padding: 5px;
            background: #e2e2e2;
            border: 1px solid #dadada;
        }
    </style>
</head>
<body cz-shortcut-listen="true">
<div class="error-page">
<div class="text-center container">
<?php

$transaction_password_random = $handler->layout['transaction_password'];
?>
<h1><span class="text-success">Success! Your password has been updated successfully.</span></h1>
<h1>Your transaction password is <span class="text-info token-box"><?php echo $transaction_password_random; ?></span>. </h1>
<h2>Please remember this transaction password, from now on all transcation of the website can be done only with this password and keep one thing in mind, do not share this password with anyone.</h2>
<h2 class="mt-3 text-dark">Thank you, Team  <?php echo PROJECTNAME.''.SUFFIXNAME; ?></h2>
<div class="font-hindi">
<h1 class="mt-5"><span class="text-success">Success! आपका पासवर्ड बदला जा चुका है।</span></h1>
<h1>आपका लेनदेन पासवर्ड <span class="text-info token-box"><?php echo $transaction_password_random; ?></span> है।</h1>
<h2>कृपया इस लेन-देन के पासवर्ड को याद रखें, अब से वेबसाइट के सभी हस्तांतरण केवल इस पासवर्ड से किए जा सकते हैं और एक बात का ध्यान रखें, इस पासवर्ड को किसी के साथ साझा न करें।</h2>
<h2 class="mt-3 text-dark">धन्यवाद, टीम  <?php echo PROJECTNAME.''.SUFFIXNAME; ?></h2>
</div>
<a href="/admin" class="btn btn-dark btn-lg mt-5" style="min-width: 200px"><i class="fas fa-arrow-left mr-3"></i>Back</a>
</div>
</div>

</body></html>