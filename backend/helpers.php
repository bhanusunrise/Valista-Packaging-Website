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

    function getTokenExpireTime($time){
        $current_time = new DateTime(); // Get the current time
        $current_time->modify($time.' hour'); // Add 1 hour
        echo $current_time->format('Y-m-d H:i:s'); // Output the result
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


?>