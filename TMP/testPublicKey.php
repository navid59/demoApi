<?php
$data = 'eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiIiLCJpYXQiOjE2MjA5OTA1OTIsImlzcyI6Ik5FVE9QSUEgUGF5bWVudHMiLCJzdWIiOiIySGYwUWVKUnVHLVVhbTZVVXBUM1drd2dmRW9iczFNaFZBWG1rX0pzQzYzR2ZFeGhjd0djcnNyQ040ZVhlOGdDNXQ4Y1BtRF9sTjF2SkpXUkFZaEd1Zz09In0';
$signature = 'H0jNa3Bh0pocNMZiQqhouNs6vn_bXDOoQ5NHaLfk_bzks3yclni9pTK5gFUAuROEV62kElysbpxix1GX7b_YPrtBj57iaja_aDscQe1yhGxks35cYzo35bCF1JmcbwKioKLpCs3vMNsP_t34sGiktZooUpknfHAY62Us3C0INeA';

$fileName = "/var/www/html/demo/certificates/live.LXTP-3WDM-WVXL-GC8B-Y5DA.public.cer";
if (file_exists($fileName)) {
    $pubkeyid = openssl_pkey_get_public($fileName);
    
    $ok = openssl_verify($data, $signature, $pubkeyid);
    if ($ok == 1) {
        echo "good\n";
    } elseif ($ok == 0) {
        echo "bad\n";
    } else {
        echo "ugly\n";
    }
}else {
    die("File Not Exist");
}





