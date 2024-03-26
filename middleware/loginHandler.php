<?php

include_once('../backend/API.php');

if(isset($_POST['sign-in'])) {

        // Setup and store variables

    $email = $_POST["email"];
    $password = $_POST["password"];
    $password =  getEncryptedPassword($password);
    $user = (getUsers($email, $password));

    
    if($user == "0 results"){
       header("Location: ../login.html");

    }else{
        $token = getToken($email); 
        if($token == "0 results"){
            createToken($email);
        }elseif(isTokenExpiretimeOvercame(getTokenExpireTime())){
            deleteToken($email);
            createToken($email);
        }
        header('Location: ../dashboard.html');
    }
}else{
    header("Location: ../login.html");
}


?>