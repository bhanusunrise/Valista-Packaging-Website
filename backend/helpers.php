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

    function getImageName($fileName){
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

    function uploadImage($imageData, $targetDirectory) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($imageData["name"], PATHINFO_EXTENSION));
        $newFileName = getImageName($imageData["name"]); // Get the new file name
        $targetFile = $targetDirectory . $newFileName . '.' . $imageFileType; // Use the new file name with the original extension
        echo $targetFile;

        // Check if image file is an actual image or fake image
        $check = getimagesize($imageData["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check file size
        /*
        if ($imageData["size"] > 500000) {
            $uploadOk = 0;
        }*/

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($imageData["tmp_name"], $targetFile)) {
                //return $targetFile;
            } else {
                return false;
            }
        }
    }

    function imagePathChanger($imagePath){
        // Check if the string length is greater than 3
        if (strlen($imagePath) > 3) {
            // Remove the first three characters using substr
            $result = substr($imagePath, 3);
            return $result;
        } else {
            // If the string length is less than or equal to 3, return the original string
            return $imagePath;
        }
    }



?>