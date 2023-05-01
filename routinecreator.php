<?php
include("variablesGlobales.php");
include("conexion.php");
session_start();
$CurrentUserID = $_SESSION["CurrentUserIDSession"];
$name = $_POST['name'];
$exercises = $_POST['exercises'];
$pfpName = $_FILES["picture"]["name"];
$pfpType = $_FILES["picture"]["type"];

$exercise = explode('>', $exercises); #Esta parte crea los ejercicios
for($i=0;$i<count($exercise)-1;$i++){ #Itera por cada ejercicio
    $parts = explode('<', $exercise[$i]);
    $exerciseName = $parts[0];
    $exerciseNotes = $parts[1];
    $exerciseTables = $parts[2];
    if($exerciseTables == "|||") $exerciseTables="";
    $query = 'INSERT INTO Exercise(Name_Exercise, Description_Exercise) VALUES ("'.$exerciseName.'", "'.$exerciseNotes."~".$exerciseTables.'")';
    $result = mysqli_query($conexion, $query);
}


$query = "INSERT INTO Routine(FKID_User_Routine, Name_Routine) VALUES ($CurrentUserID, '$name')"; #Esta parte crea la receta
$result = mysqli_query($conexion, $query);


$query = "SELECT * FROM Routine WHERE FKID_User_Routine = $CurrentUserID and Name_Routine = '$name'"; #Esta parte te da el ID de la rutina que se acaba de crear
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_row($result);
$idRoutine = $row[0];


for($i=0;$i<count($exercise)-1;$i++){
    $parts = explode('<', $exercise[$i]);
    $exerciseName = $parts[0];
    $exerciseNotes = $parts[1];
    $exerciseTables = $parts[2];
    if($exerciseTables == "|||") $exerciseTables="";
    $query = "SELECT ID_Exercise FROM Exercise WHERE Name_Exercise = '".$exerciseName."' and Description_Exercise = '".$exerciseNotes."~".$exerciseTables."'";
    echo $query;
    $result = mysqli_query($conexion, $query);
    while($row=mysqli_fetch_assoc($result)){
        $query = "INSERT INTO RoutineExercise(FKID_Routine_RoutineExercise, FK_Exercise_RoutineExercise) VALUES ($idRoutine, ".$row['ID_Exercise'].")";
        $result2 = mysqli_query($conexion, $query);
    }
}


$query = "INSERT INTO UserActivity(FKID_Routine_UserActivity, Type_UserActivity, Visibility) VALUES ($idRoutine, 1, 1)"; #Esta parte hace la actividad del usuario
$result = mysqli_query($conexion, $query);


if(($pfpName != "" and substr($pfpType, 0, 5) != "image")){ #Esta parte añade las imágenes en caso de tener que meterlas
    $_SESSION["ErrorHeader"] = "NO SE PUDO CREAR LA RECETA";
    $_SESSION["ErrorText"] = "Las imágenes que subió son de un formato no aceptado.";
    echo "<script> window.location='/DeltaTrain/routines/create'</script>";
    return;
}
$pfpSize = $_FILES["picture"]["size"];
if($pfpName != "" and $pfpSize > 3*1024*1024){
    $_SESSION["ErrorHeader"] = "NO SE PUDO CREAR LA RECETA";
    $_SESSION["ErrorText"] = "Las imágenes que subió son muy pesadas, el tamaño máximo es de 3mb.";
    echo "<script> window.location='/DeltaTrain/routines/create'</script>";
    return;
}
if($pfpName!=""){
    $query = "SELECT * FROM UserActivity WHERE FKID_Routine_UserActivity = $idRoutine";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_row($result);
    $activityID = $row[0];
    $pfpData = addslashes(file_get_contents($_FILES["picture"]["tmp_name"]));
    $query = 'INSERT INTO Visuals(FKID_UserActivity_Visuals, Info_Visuals) VALUES ('.$activityID.',"'.$pfpData.'")';
    $result = mysqli_query($conexion, $query);
}

echo "<script> window. location='/DeltaTrain/routines/".$idRoutine."'</script>";