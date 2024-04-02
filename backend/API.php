<?php

    include 'helpers.php';

    function getUsers($email, $password){

        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? && password = ?");
        $stmt->bind_param("ss", $email, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = array();

            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $stmt->close();
            $conn->close();
            return $data;

        }else{
            $data = "0 results";
            $stmt->close();
            $conn->close();
            return $data;
        }
        

    }

    function getToken($email){
        
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM tokens WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        /*
        if(!($result->num_rows > 0)){
            $result = "No tokens found";
        }*/

        $data = "0 results";

        if ($result->num_rows > 0) {
            $data = array();

            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

        }
        
        $stmt->close();
        $conn->close();
        return $data;
    }

    function createToken($email){
        $conn = getConnection();

        
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO tokens (email, expire_date) VALUES (?, ?)");
        $stmt->bind_param("ss", $emailAddress, $expireDate);

        // Set parameters and execute


        $currentTimestamp = time(); // Get current Unix timestamp
        $time = date('Y-m-d H:i:s', $currentTimestamp);


        $emailAddress = $email;
        $expireDate = getTokenExpireTime($time);
        $stmt->execute();

        echo "New record inserted successfully";

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }

    function deleteToken($email){
        $conn = getConnection();

         // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("DELETE FROM tokens WHERE email=?");
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    function getNews($title){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM updates WHERE title = ?");
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        /*
        if(!($result->num_rows > 0)){
            $result = "No tokens found";
        }*/

        $data = "0 results";

        if ($result->num_rows > 0) {
            $data = array();

            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

        }
        
        $stmt->close();
        $conn->close();
        return $data;
    }

    function addNews($title, $description, $image){
        $conn = getConnection();

        
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO updates (Title, Description, Image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $image);

        // Set parameters and execute
        $image = getImageName($image);

        $stmt->execute();

        echo "New record inserted successfully";

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }

    ?>