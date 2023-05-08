<?php
include("conexion.php");
$userA = $_GET['userA'];
$userB = $_GET['userB'];

$query = "DELETE FROM Follow WHERE FKID_UserB_Follow = ".$userB." and FKID_UserA_Follow = ".$userA;
$result = mysqli_query($conexion, $query);

$query = "SELECT Username_User from User WHERE ID_User = $userA";
$result = mysqli_query($conexion, $query);
$userID="";
while($row=mysqli_fetch_assoc($result)){
    $userID = $row["Username_User"];
}

$query = "DELETE FROM Notis WHERE FKID_User_Notis = $userB and Source_Notis = '/DeltaTrain/$userID'";
$result = mysqli_query($conexion, $query);