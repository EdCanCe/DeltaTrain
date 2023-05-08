<?php
include("conexion.php");
$postID = $_GET['postID'];

$query = 'UPDATE Post SET Visibility_Post = 1 WHERE ID_Post = '.$postID;
$result = mysqli_query($conexion, $query);