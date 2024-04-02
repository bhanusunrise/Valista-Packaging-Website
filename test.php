<?php
include_once("backend/API.php");

$allNews = getAllNews();
$selectedNews = getNews("sad");

var_dump($allNews);

echo "<br/>";

var_dump($selectedNews);





?>