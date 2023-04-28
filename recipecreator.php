<?php
include("variablesGlobales.php");
include("conexion.php");
session_start();
$CurrentUserID = $_SESSION["CurrentUserIDSession"];
$preparation = $_GET['prepataion'];
$portion = $_GET['portion'];
$type = $_GET['type'];
$protein = $_GET['protein'];
$fat = $_GET['fat'];
$carbs = $_GET['carbs'];
$name = $_GET['name'];
$ingredients = $_GET['ingredients'];

$ingredient = explode('<', $ingredients);
for($i=0;$i<count($ingredient);$i++){
    $query = "SELECT * FROM Ingredient where Name_Ingredient = ".$ingredient[$i];
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) == 0) $query = "INSERT INTO Ingredient(Name_Ingredient) VALUES ('".$ingredient[$i]."')";
    $result = mysqli_query($conexion, $query);
}
