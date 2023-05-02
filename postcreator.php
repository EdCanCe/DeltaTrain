<?php
include("variablesGlobales.php");
include("conexion.php");
session_start();
$CurrentUserID = $_SESSION["CurrentUserIDSession"];
$pData = $_POST['postData'];
$rid = "";


$query = "INSERT INTO Post(FKID_User_Post, Info_Post) VALUES($CurrentUserID, '$pData')";
$result = mysqli_query($conexion, $query);


if(isset($_POST['linkedObject']) and $_POST['linkedObject']!=""){ #significa que se le añade el objeto vinculado
    $rData = explode('/', $_POST['linkedObject']);
    $type = $rData[0]; //recipes o routines
    $id = $rData[1];
    if($type == "recipes") $query = "SELECT ID_UserActivity FROM UserActivity WHERE FKID_Recipe_UserActivity = $id";
    else $query = "SELECT ID_UserActivity FROM UserActivity WHERE FKID_Routine_UserActivity = $id";
    echo $query;
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_row($result);
    $id = $row[0];
    $query = "UPDATE Post SET FKID_UserActivity_Post = $id WHERE FKID_User_Post = $CurrentUserID and Info_Post = '".$pData."'";
    $result = mysqli_query($conexion, $query);
}

if(isset($_FILES["picture"]["name"])){ #significa que si se puede subir el archivo
    $pfpName = $_FILES["picture"]["name"];
    $pfpType = $_FILES["picture"]["type"];
    if(strpos($pfpType, 'image/') or strpos($pfpType, 'video/')){ #Esta parte añade las imágenes en caso de tener que meterlas
        $_SESSION["ErrorHeader"] = "NO SE PUDO CREAR EL POST";
        $_SESSION["ErrorText"] = "Los archivos que subió son de un formato no aceptado.";
        echo "<script> window.location='/DeltaTrain/home'</script>";
        return;
    }
    $pfpSize = $_FILES["picture"]["size"];
    if($pfpSize > 15*1024*1024){
        $_SESSION["ErrorHeader"] = "NO SE PUDO CREAR EL POST";
        $_SESSION["ErrorText"] = "Los archivos que subió son muy pesadas, el tamaño máximo es de 15mb.";
        echo "<script> window.location='/DeltaTrain/home'</script>";
        return;
    }
    $pfpData = addslashes(file_get_contents($_FILES["picture"]["tmp_name"]));
    $query = "UPDATE Post SET Media_Post = '".$pfpData."' WHERE FKID_User_Post = $CurrentUserID and Info_Post = '".$pData."'";
    $result = mysqli_query($conexion, $query);
}

echo "<script> window. location='/DeltaTrain/home'</script>";