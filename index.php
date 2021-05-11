<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('lib/request.php');
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
                <p class="lead">Below is a PHP example to make paymets using NETOPIA Payments API. </p>
            </div>
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Make Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="getStatus-tab" data-toggle="tab" href="#getStatus" role="tab" aria-controls="getStatus" aria-selected="false">Payment Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="expirePayment-tab" data-toggle="tab" href="#expirePayment" role="tab" aria-controls="expirePayment" aria-selected="false">Expire Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="confirmURL-tab" data-toggle="tab" href="#confirmURL" role="tab" aria-controls="confirmURL" aria-selected="false">Confirm URL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="returnURL-tab" data-toggle="tab" href="#returnURL" role="tab" aria-controls="returnURL" aria-selected="false">Return URL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="document-tab" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false">API DocumentL</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php include_once("assets/theme/checkout.php"); ?>
                    </div>
                    <div class="tab-pane fade" id="getStatus" role="tabpanel" aria-labelledby="getStatus-tab">Check a payment status</div>
                    <div class="tab-pane fade" id="expirePayment" role="tabpanel" aria-labelledby="expirePayment-tab">Expire a Payment</div>
                    <div class="tab-pane fade" id="confirmURL" role="tabpanel" aria-labelledby="confirmURL-tab">
                        <div class="panel panel-primary" id="result_panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">IPN Log</h3>
                            </div>
                            <div class="list-group">
                                <span id="containerDivIpnLog">Real Time Log</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="returnURL" role="tabpanel" aria-labelledby="returnURL-tab">
                        <div class="panel panel-primary" id="result_panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Success Page Log</h3>
                            </div>
                            <div class="list-group">
                                <span id="containerDivReturnLog">Real Time Log</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">DOCUMENT HERE</div>
                </div>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            // 'use strict';

            // window.addEventListener('load', function() {
            // // Fetch all the forms we want to apply custom Bootstrap validation styles to
            // var forms = document.getElementsByClassName('needs-validation');

            // // Loop over them and prevent submission
            // var validation = Array.prototype.filter.call(forms, function(form) {
            //     form.addEventListener('submit', function(event) {
            //     if (form.checkValidity() === false) {
            //         event.preventDefault();
            //         event.stopPropagation();
            //     }
            //     form.classList.add('was-validated');
            //     }, false);
            // });
            // }, false);
            // Submit Form by Ajax 
        })();
        </script>
    </body>
</html>