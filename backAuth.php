<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('lib/log.php');
include_once('lib/verifyAuth.php');
$setRealTimeLog = 
            [
                "BackUrl"   =>  "Is hitting - come from bank",
                "input"     => "Listen to Bank to get paRes",
                "Output"    => "Will Call VerifyAuth"
            ];
log::setRealTimeLog($setRealTimeLog);

$setRealTimeLog = $_REQUEST;
log::setRealTimeLog($setRealTimeLog);

// echo "This is BackUrl, should be display when form Submited from Bank ";
// echo "<br>";
// echo "paRes: ".$_POST['paRes'];



$verifyAuth = new verifyAuth();