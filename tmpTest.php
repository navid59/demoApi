<?php 

        $url = 'https://secure.sandbox.netopia-payments.com//sandbox/authorize';
        $ch = curl_init($url);
  
        // Array DATA
        // $payload = (string) "paReq=".$this->paReq."&"."backUrl=".$this->backUrl; 
        $payload = (string) "paReq=0gk3qUgLpOb0lxKfBU0GqsYJeh7AC2zpNS7UZ2pRk_yeXNMkxjSBC8ewVb5BKeLDXk6hEnfzATF_bi8jL4cijxU=&backUrl=test.com/ipn";
        
        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        
  
        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type : application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization : Uxf3OY--rDK3Qae8CiJJUlAcuRJFp7tzGY4M8KocQaCGyfEqUGhGskv0'));
  
        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
        // Execute the POST request
        $result = curl_exec($ch);
        print_r($result);
        echo ('<hr>');
        // if (!curl_errno($ch)) {
        //       switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
        //           case 200:  # OK
        //               $arr = array(
        //                   'status'  => 1,
        //                   'code'    => $http_code,
        //                   'message' => "You send your request, successfully",
        //                   'data'    => json_decode($result)
        //               );
        //               break;
        //           case 404:  # Not Found
        //               $arr = array(
        //                   'status'  => 0,
        //                   'code'    => $http_code,
        //                   'message' => "You send request to wrong URL",
        //                   'data'    => json_decode($result)
        //               );
        //               break;
        //           case 400:  # Bad Request
        //               $arr = array(
        //                   'status'  => 0,
        //                   'code'    => $http_code,
        //                   'message' => "You send Bad Request",
        //                   'data'    => json_decode($result)
        //               );
        //               break;
        //           case 405:  # Method Not Allowed
        //               $arr = array(
        //                   'status'  => 0,
        //                   'code'    => $http_code,
        //                   'message' => "Your method of sending data are Not Allowed",
        //                   'data'    => json_decode($result)
        //               );
        //               break;
        //           default:
        //               $arr = array(
        //                   'status'  => 0,
        //                   'code'    => $http_code,
        //                   'message' => "Opps! Something is wrong, verify how you send data & try again!!!",
        //                   'data'    => json_decode($result)
        //               );
        //       }
        //   } else {
        //       $arr = array(
        //           'status'  => 0,
        //           'code'    => 0,
        //           'message' => "Opps! There is some problem, you are not able to send data!!!"
        //       );
        //   }
        
        // Close cURL resource
        curl_close($ch);
        // 
        // 
        $str = $result;
        $strFrom = 'name="paRes" value="';
        $strTo ='<input type="submit" value="Submit">';
        $substring = string_between_two_string($str, $strFrom, $strTo);
        
        $pasRes = substr($substring, 0, -5);
        print_r($pasRes);


        function string_between_two_string($str, $starting_word, $ending_word)
            {
                $subtring_start = strpos($str, $starting_word);
                //Adding the strating index of the strating word to 
                //its length would give its ending index
                $subtring_start += strlen($starting_word);  
                //Length of our required sub string
                $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;  
                // Return the substring from the index substring_start of length size 
                return substr($str, $subtring_start, $size);  
            }
