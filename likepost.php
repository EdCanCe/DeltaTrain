<?php
include("conexion.php");
$userID = $_GET['userID'];
$postID = $_GET['postID'];

$query = "INSERT INTO LikedPost(FKID_User_LikedPost, FKID_Post_LikedPost) VALUES ($userID, $postID);";
$result = mysqli_query($conexion, $query);