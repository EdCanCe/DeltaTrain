<?php
include("conexion.php");
$userA = $_GET['userA'];
$userB = $_GET['userB'];

$query = "INSERT INTO Follow(FKID_UserA_Follow, FKID_UserB_Follow) VALUES ($userA, $userB);";
$result = mysqli_query($conexion, $query);