<?php
include("variablesGlobales.php");
include("conexion.php");
session_start();
$CurrentUserID = $_SESSION["CurrentUserIDSession"];
$pData = $_POST['postData'];

$query = "INSERT INTO Post(FKID_User_Post, Info_Post) VALUES($CurrentUserID, '$pData')";
$result = mysqli_query($conexion, $query);

echo "<script> window. location='/DeltaTrain/home'</script>";