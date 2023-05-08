<?php
include("conexion.php");
$userID = $_GET['userID'];
$postID = $_GET['postID'];

$query = "INSERT INTO LikedPost(FKID_User_LikedPost, FKID_Post_LikedPost) VALUES ($userID, $postID);";
$result = mysqli_query($conexion, $query);

$query = "SELECT Username_User from User WHERE ID_User = $userID";
$result = mysqli_query($conexion, $query);
while($row=mysqli_fetch_assoc($result)){
    $userID = $row["Username_User"];
}

$query = "SELECT FKID_User_Post from Post WHERE ID_Post = $postID";
$result = mysqli_query($conexion, $query);
$postUser="";
while($row=mysqli_fetch_assoc($result)){
    $postUser = $row["FKID_User_Post"];
}

$query = "INSERT INTO Notis(FKID_User_Notis, Description_Notis, Source_Notis) VALUES ($postUser, '¡@$userID le dió like a uno de tus posts!', '/DeltaTrain/post/$postID');";
$result = mysqli_query($conexion, $query);