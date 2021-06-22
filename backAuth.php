<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('lib/log.php');
include_once('lib/verifyAuth.php');

include_once __DIR__ . '/vendor/autoload.php';
/**
 * Load .env 
 * Read Base root , ... from .env
 * The  env var using in UI ,...
 */

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$setRealTimeLog = 
            [
                "BackUrl"   =>  "Is hitting - come from bank",
                "input"     => "Listen to Bank to get paRes",
                "Output"    => "Will Call VerifyAuth"
            ];
log::setRealTimeLog($setRealTimeLog);

$setRealTimeLog = $_REQUEST;
log::setRealTimeLog($setRealTimeLog);

/**
 * Define verifyAuth class
 */
$verifyAuth = new verifyAuth();
/**
 * Set params for /payment/card/verify-auth
 * Format Json
 */
$jsonAuthParam = $verifyAuth->setVerifyAuth();

/**
 * Send request to /payment/card/verify-auth
 */
$paymentResult = $verifyAuth->sendRequestVerifyAuth($jsonAuthParam);
$paymentResultArr = json_decode($paymentResult);

?>
<!doctype html>
<html lang="en">
    <?php include_once("assets/theme/inc/header.inc"); ?>
    <body class="bg-light">
        <div class="container">
            <?php include_once("assets/theme/inc/topNav.inc"); ?>
            <div class="row">
                <?php include_once("assets/theme/backAuthForm.php"); ?>
            </div>
        </div>
        <?php include_once("assets/theme/inc/footer.inc"); ?>
    </body>
</html>
