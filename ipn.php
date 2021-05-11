<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('lib/log.php');

$setRealTimeLog = 
            [
                "IPN"    =>  "Is hitting",
            ];
log::setRealTimeLog($setRealTimeLog);

$setRealTimeLog = $_REQUEST;
log::setRealTimeLog($setRealTimeLog);


$ipnLog = $_REQUEST;
log::setIpnLog($ipnLog);