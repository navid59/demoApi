<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('lib/log.php');

$setRealTimeLog = 
            [
                "Do Auth"    =>  "Is hitting - will redirect",
                "What is " => "Send Parameter (paReq , backUrl) to the Bank"
            ];
log::setRealTimeLog($setRealTimeLog);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="assets/img/favicons/favicon.ico">
        <title>Checkout example for Bootstrap</title>
        <link rel="canonical" href="">
        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <!-- <link href="form-validation.css" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="assets/css/json-viewer.css">
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
        
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="py-5">
                <img class="d-block mx-auto mb-4" src="assets/img/np-logo-blue.svg" alt="" width="200">
                <h2>NETOPIA Payments - API CARD</h2>
                <p class="lead">You will redirect to the your Bank for Auth. </p>
            </div>
            <div class="row">
                <?php include_once("assets/theme/doAuthForm.php"); ?>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; <?=date("Y");?> NETOPIA Payments</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="https://netopia-payments.com/contact-suport/" target="_blank">Support</a></li>
            </ul>
        </footer>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="assets/js/vendor/popper.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="assets/js/vendor/holder.min.js"></script>
        <script type="text/javascript" src="assets/js/json-viewer.js"></script>
        <script src="assets/js/src/custom.js"></script>
        <script>
        
        (function() {
            alert("Hello Do Auth - make Form & Submit to Bank - Temporarry Alert");
            document.getElementById('authForm').submit();
        })();
        </script>
    </body>
</html>