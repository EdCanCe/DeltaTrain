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
$unique = time();
$portionSend=$portion."|".$protein."|".$fat."|".$carbs."|".$unique;
$query = "INSERT INTO Recipe(FKID_User_Recipe, Name_Recipe, Preparation_Recipe, Portions_Recipe) VALUES ($CurrentUserID, '$name', '$preparation', '$portionSend')";
$result = mysqli_query($conexion, $query);


$query = "SELECT * FROM Recipe WHERE FKID_User_Recipe = $CurrentUserID AND Name_Recipe = '$name' AND Preparation_Recipe = '$preparation' AND Portions_Recipe = '$portionSend'"; #Esta parte te da el ID de la receta que se acaba de hacer
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_row($result);
$idRecipe = $row[0];

for($i=0;$i<count($ingredient)-1;$i++){ #Esta parte crea los ingredientes por receta
    $query = "SELECT ID_Ingredient FROM Ingredient where Name_Ingredient = '".$ingredient[$i]."'";
    $result = mysqli_query($conexion, $query);
    while($row=mysqli_fetch_assoc($result)){
        $query = "INSERT INTO RecipeIngredient(FKID_Recipe_RecipeIngredient, FKID_Ingredient_RecipeIngredient) VALUES ($idRecipe, ".$row['ID_Ingredient'].")";
        $result2 = mysqli_query($conexion, $query);
    }
}