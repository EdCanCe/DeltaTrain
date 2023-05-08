<?php
include("conexion.php");
$userA = $_GET['userA'];
$userB = $_GET['userB'];

$query = "INSERT INTO Follow(FKID_UserA_Follow, FKID_UserB_Follow) VALUES ($userA, $userB);";
$result = mysqli_query($conexion, $query);

$query = "SELECT Username_User from User WHERE ID_User = $userA";
$result = mysqli_query($conexion, $query);
$userID="";
while($row=mysqli_fetch_assoc($result)){
    $userID = $row["Username_User"];
}

$query = "INSERT INTO Notis(FKID_User_Notis, Description_Notis, Source_Notis) VALUES ($userB, '¡@$userID ha empezado a seguirte!', '/DeltaTrain/$userID');";
$result = mysqli_query($conexion, $query);