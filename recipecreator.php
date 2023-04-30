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
$pfpName = $_FILES["picture"]["name"];
$pfpType = $_FILES["picture"]["type"];


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


$query = "INSERT INTO UserActivity(FKID_Recipe_UserActivity, Type_UserActivity, Visibility) VALUES ($idRecipe, 2, 1)"; #Esta parte hace la actividad del usuario
$result = mysqli_query($conexion, $query);


if(($pfpName != "" and substr($pfpType, 0, 5) != "image")){ #Esta parte añade las imágenes en caso de tener que meterlas
    $_SESSION["ErrorHeader"] = "NO SE PUDO CREAR LA RECETA";
    $_SESSION["ErrorText"] = "Las imágenes que subió son de un formato no aceptado.";
    echo "<script> window.location='/DeltaTrain/recipes/create'</script>";
    return;
}
$pfpSize = $_FILES["pfp"]["size"];
if($pfpName != "" and $pfpSize > 3*1024*1024){
    $_SESSION["ErrorHeader"] = "NO SE PUDO CREAR LA RECETA";
    $_SESSION["ErrorText"] = "Las imágenes que subió son muy pesadas, el tamaño máximo es de 3mb.";
    echo "<script> window.location='/DeltaTrain/recipes/create'</script>";
    return;
}
if($pfpName!=""){
    $query = "SELECT * FROM UserActivity WHERE FKID_Recipe_UserActivity = $idRecipe";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_row($result);
    $activityID = $row[0];
    $pfpData = addslashes(file_get_contents($_FILES["pfp"]["tmp_name"]));
    $query = 'INSERT INTO Visuals(FKID_UserActivity_Visuals, Info_Visuals) VALUES ('.$activityID.',"'.$pfpData.'")';
    $result = mysqli_query($conexion, $query);
}