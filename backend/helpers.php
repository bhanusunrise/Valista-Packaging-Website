<?php

    // pasindubhanukagood@gmail.com
    // 1234
    function getEncryptedPassword($password){
        $frontText = "Lorem Ipsum Valista";
        $backText = "Lorem Ipsum Packaging";
        $password = $frontText.$password.$backText;
        $password = md5($password);
        return $password;
    }

    function getOTP(){
        $OTP = rand(111111, 999999);
        return $OTP;
    }

    function getImageName(){
        $fileName =  date("Y-m-d_h-i-sa");
        $randomNumber = rand(000000, 999999);
        $fileName = $fileName."_".$randomNumber;
        return $fileName;
    }

    function getConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "valista";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        return $conn;
    }

    function getTokenExpireTime(){
        
        $currentTimestamp = time();
        $futureTimestamp = strtotime('+10 hours', $currentTimestamp);
        $futureDateTime = date('Y-m-d H:i:s', $futureTimestamp);
        return $futureDateTime;
    }

    function getTokenID(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890/*-+!@#$%^&()_=[]{}\|;:';
        $tokenID = '';
        $length = 10;

        for ($i = 0; $i < $length; $i++) {
            $tokenID .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $tokenID;
    }

    function isTokenExpiretimeOvercame($anotherDateTime){
        
        $isExpired = false;
        $currentDateTime = time();
        $anotherDateTime;

        if ($currentDateTime < $anotherDateTime) {
            $isExpired = true;
        }
        
        return $isExpired;
    }

?>