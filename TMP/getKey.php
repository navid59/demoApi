<?php
$pub_key = openssl_pkey_get_public(file_get_contents('/var/www/html/demo/certificates/live.LXTP-3WDM-WVXL-GC8B-Y5DA.public.cer')); 
$keyData = openssl_pkey_get_details($pub_key); 
file_put_contents('/var/www/html/demo/certificates/myKey.pub', $keyData['key']); 
?>