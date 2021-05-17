<?php 
class bank {
    
    function __construct(){        
    }

    static function validateBackUrl($backUrl) {
        /**
         * to Verify backUrl
         */

        // get backUrl, check if has localhost:8080, replace by Sandbox url
        // Temporary, just replaced by static Str
        
        return ("https://secure.sandbox.netopia-payments.com/sandbox/authorize");
    }
}