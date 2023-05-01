<?php
include("conexion.php");
$userA = $_GET['userA'];
$userB = $_GET['userB'];

$query = "DELETE FROM Follow WHERE FKID_UserB_Follow = ".$userB." and FKID_UserA_Follow = ".$userA;
$result = mysqli_query($conexion, $query);