<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('lib/log.php');

// Log
$setRealTimeLog = ["IPN"    =>  "IPN Is hitting"];
log::setRealTimeLog($setRealTimeLog);

$aHeaders = apache_request_headers();
if(!is_array($aHeaders))
{
    $setRealTimeLog['missingHeader'] = "headers are missing";
    echo $setRealTimeLog['missingHeader'] . PHP_EOL;
    log::setRealTimeLog($setRealTimeLog);
	exit;
}

$verificationToken = null;
foreach($aHeaders as $headerName=>$headerValue)
{
	if(strcasecmp('Verification-token', $headerName) == 0)
	{
		$verificationToken = $headerValue;
		break;
	}
}

if($verificationToken === null)
{
    $setRealTimeLog['missingVerificationToken'] = "Verification-token is missing";
    echo $setRealTimeLog['missingVerificationToken'] . PHP_EOL;
    log::setRealTimeLog($setRealTimeLog);
	exit;
}

$publickKeyFilePath = 'certificates/live.LXTP-3WDM-WVXL-GC8B-Y5DA.public.cer';
if (file_exists($publickKeyFilePath)) {
    $publicKey = openssl_pkey_get_public('file://' . $publickKeyFilePath);
    if($publicKey === false)
    {

        $setRealTimeLog['notValidPublicKey'] = '`' . $publickKeyFilePath . '` is not a valid public key'; 
        echo $setRealTimeLog['notValidPublicKey'] . PHP_EOL;
        log::setRealTimeLog($setRealTimeLog);
        exit;
    }
} else {
    $setRealTimeLog['missingPublicKey'] = "The public key $publickKeyFilePath does not exist"; 
    echo $setRealTimeLog['missingPublicKey'];
    log::setRealTimeLog($setRealTimeLog);
    exit;
}


$HTTP_RAW_POST_DATA = file_get_contents('php://input');
$input = json_decode($HTTP_RAW_POST_DATA);


die(print_r($input));

// $setRealTimeLog = "IPN"    =>  "IPN Is hitting"];
// log::setRealTimeLog($setRealTimeLog);

$setRealTimeLog = $_REQUEST;
log::setRealTimeLog($setRealTimeLog);



$ipnLog = $_REQUEST;
log::setIpnLog($ipnLog);