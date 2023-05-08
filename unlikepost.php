<?php
include("conexion.php");
$userID = $_GET['userID'];
$postID = $_GET['postID'];

$query = "DELETE FROM LikedPost WHERE FKID_User_LikedPost = ".$userID." and FKID_Post_LikedPost = ".$postID;
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

$query = "DELETE FROM Notis WHERE FKID_User_Notis = $postUser and Source_Notis = '/DeltaTrain/post/$postID'";
$result = mysqli_query($conexion, $query);