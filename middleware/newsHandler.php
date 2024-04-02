<?php

include_once("../backend/API.php");

var_dump($_POST);
$title = $_POST["news-title"];
$description = $_POST["news-description"];
$imageName = $_FILES["news-image"];
$targetDirectory = "../uploads/";

if(isset($_POST['add'])){
    $newsTitle = getNews($title);
    if($newsTitle == "0 results"){
         $uploadedImagePath = uploadImage($imageName, $targetDirectory);
        if($uploadedImagePath !== false) {
            echo $uploadedImagePath;
            addNews($title, $description, $uploadedImagePath);
            header('Location: ../dashboard.php');
        } else {
        echo "Sorry, there was an error uploading your file.";

    }
    }
}

?>