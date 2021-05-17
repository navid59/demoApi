<?php
$products = array(
    array(
        'id' => 1,
        'pName'     => 'T-shirt Alfa',
        'pDetail'   => 'De Vara',
        'pPrice'    => rand(10, 50),
        'pCode'     =>  str_shuffle('CODE1234567890'),
        'pCategory' => "Fashion",
        "pVat"      => 0
    ),
    array(
        'id' => 2,
        'pName' => 'T-shirt Beta',
        'pDetail' => 'De Iarna',
        'pPrice' => rand(10, 50),
        'pCode'     =>  str_shuffle('CODE1234567890'),
        'pCategory' => "Fashion",
        "pVat"      => 0
    ),
    array(
        'id' => 3,
        'pName' => 'T-shirt Gamma',
        'pDetail' => 'De Dama',
        'pPrice' => mt_rand(50, 1000) / 10,
        'pCode'     =>  str_shuffle('CODE1234567890'),
        'pCategory' => "Fashion",
        "pVat"      => 0
    ),
    array(
        'id' => 4,
        'pName' => 'T-shirt Delta',
        'pDetail' => 'De Copi',
        'pPrice' => rand(10, 50),
        'pCode'     =>  str_shuffle('CODE1234567890'),
        'pCategory' => "Fashion",
        "pVat"      => 0
    )
);

$trader = array(
    array(
        'id'            => 1,
        'posSignature'  => 'LXTP-3WDM-WVXL-GC8B-Y5DA',
        'notifyUrl'     => 'http://35.204.43.65/demo/ipn.php',
        'redirectUrl'   => 'http://35.204.43.65/demo/return.php',
        'apiKey'        => 'Uxf3OY--rDK3Qae8CiJJUlAcuRJFp7tzGY4M8KocQaCGyfEqUGhGskv0'
    ),
);

$billingShippingInfo = array(
    array(
        'id'         => 1,
        'firstName'  => 'fName',
        'lastName'   => 'Lname',
        'email'      => 'navid@netopia-system.com',
        'phone'      => str_shuffle('1234567890'),
        'address'    => 'Sos 1 Dec , Strada Ferdinand, nr 2',
        'address2'   => 'Ap 387',
        'zip'        => '123456',
    ),
);

$colorRange = array("Red", "Green", "Blue", "Black", "Yellow", "grey", "beige", "silver", "indigo", "orange" );
