<?php
include("conexion.php");
$userID = $_GET['userID'];
$postID = $_GET['postID'];

$query = "DELETE FROM LikedPost WHERE FKID_User_LikedPost = ".$userID." and FKID_Post_LikedPost = ".$postID;
$result = mysqli_query($conexion, $query);