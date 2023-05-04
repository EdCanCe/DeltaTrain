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
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_row($result);
    $id = $row[0];
    $query = "UPDATE Post SET FKID_UserActivity_Post = $id WHERE FKID_User_Post = $CurrentUserID and Info_Post = '".$pData."'";
    $result = mysqli_query($conexion, $query);
}

if(isset($_FILES["picture"]["name"]) and $_FILES["picture"]["name"]!=""){ #significa que si se puede subir el archivo
    $pfpName = $_FILES["picture"]["name"];
    $pfpType = $_FILES["picture"]["type"];
    if(!((substr($pfpType, 0, 5) == 'image') or (substr($pfpType, 0, 5) == 'video'))){ #Esta parte añade las imágenes en caso de tener que meterlas
        $_SESSION["ErrorHeader"] = "NO SE PUDO VINCULAR EL ARCHIVO";
        $_SESSION["ErrorText"] = "Los archivos que subió son de un formato no aceptado, sin embargo si se creó el post.";
        echo "<script> window.location='/DeltaTrain/home'</script>";
        return;
    }
    if((substr($pfpType, 0, 5) == 'image')){
        $query = "UPDATE Post SET MediaType_Post = 0 WHERE FKID_User_Post = $CurrentUserID and Info_Post = '".$pData."'";
    }else{
        $query = "UPDATE Post SET MediaType_Post = 1 WHERE FKID_User_Post = $CurrentUserID and Info_Post = '".$pData."'";
    }
    $result = mysqli_query($conexion, $query);
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

if(isset($_POST['commentedPost']) and $_POST['commentedPost']!=""){
    $query = "UPDATE Post SET FKID_Post_Post = ".$_POST['commentedPost']." WHERE FKID_User_Post = $CurrentUserID and Info_Post = '".$pData."' ORDER BY Date_Post DESC";
    $result = mysqli_query($conexion, $query);
}

$query = "SELECT ID_Post FROM Post WHERE FKID_User_Post = $CurrentUserID and Info_Post = '".$pData."' ORDER BY Date_Post DESC";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_row($result);
$id = $row[0];

echo "<script> window. location='/DeltaTrain/post/".$id."'</script>";