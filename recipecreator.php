<?php
include("variablesGlobales.php");
include("conexion.php");
session_start();
$CurrentUserID = $_SESSION["CurrentUserIDSession"];
$preparation = $_POST['preparation'];
$portion = $_POST['portion'];
$protein = $_POST['protein'];
$fat = $_POST['fat'];
$carbs = $_POST['carbs'];
$name = $_POST['name'];
$ingredients = $_POST['ingredient'];
$picture = $_POST['picture'];


$ingredient = explode('<', $ingredients); #Esta parte crea los ingredientes que aún no se han creado
for($i=0;$i<count($ingredient)-1;$i++){
    $query = "SELECT * FROM Ingredient where Name_Ingredient = '".$ingredient[$i]."'";
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) == 0){
        $query = 'INSERT INTO Ingredient(Name_Ingredient) VALUES ("'.$ingredient[$i].'")';
    }
    $result = mysqli_query($conexion, $query);
}


$portion = str_replace('|', '', $portion); #Esta parte crea la receta como tal
$protein = str_replace('|', '', $protein);
$fat = str_replace('|', '', $fat);
$carbs = str_replace('|', '', $carbs);
$portionSend=$portion."|".$protein."|".$fat."|".$carbs;
$query = "INSERT INTO Recipe(FKID_User_Recipe, Name_Recipe, Preparation_Recipe, Portions_Recipe) VALUES ($CurrentUserID, '$name', '$preparation', '$portionSend')";
$result = mysqli_query($conexion, $query);


$query = "SELECT * FROM Recipe WHERE FKID_User_Recipe = $CurrentUserID AND Name_Recipe = '$name' AND Preparation_Recipe = '$preparation' AND Portions_Recipe = '$portionSend'"; #Esta parte crea los ingredientes por receta
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_row($result);
$idRecipe = $row[0];