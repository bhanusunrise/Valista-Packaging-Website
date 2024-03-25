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



    ?>