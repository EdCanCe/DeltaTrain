<?php
session_start();
include("conexion.php");
include("encriptor.php");
include("variablesGlobales.php");
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$lastnames=$_POST['lastnames'];
$birth=$_POST['birth'];
$sexo=$_POST['sexo'];
$email=$_POST['email'];
$description=$_POST['description'];
$password=encrypt($password);



#Checar que todos los datos cumplan con los criterios
#Permitir a una función rellenar los datos
if(!isset($GLOBALS["errorForm"])) $GLOBALS["errorForm"]="";
if(!isset($GLOBALS["setForm"])) $GLOBALS["setForm"]="";
validateChar($username, "username");
validateChar($name, "name");
validateChar($birth, "birth");
validateChar($lastnames, "lastnames");
validateChar($email, "email");
$_SESSION["setForm"]=$GLOBALS["setForm"];
if($GLOBALS["errorForm"]!=""){
    $_SESSION["ErrorHeader"] = "NO SE PUDO MODIFICAR LA CUENTA";
    $_SESSION["ErrorText"] = "Colocó caracteres no permitidos en algún campo.";
    $GLOBALS["errorForm"] = "";
    echo "<script> window.location='/DeltaTrain/createaccount.php'</script>";
    return;
}



#Checar si las imágenes que subió están en el formato correcto
$pfpName = $_FILES["pfp"]["name"];
$bannerName = $_FILES["banner"]["name"];
$pfpType = $_FILES["pfp"]["type"];
$bannerType = $_FILES["banner"]["type"];
if((($pfpName != "" and substr($pfpType, 0, 5) != "image") or ($bannerName != "" and substr($bannerType, 0, 5) != "image"))){
    $_SESSION["ErrorHeader"] = "NO SE PUDO MODIFICAR LA CUENTA";
    $_SESSION["ErrorText"] = "Las imágenes que subió son de un formato no aceptado.";
    echo "<script> window.location='/DeltaTrain/createaccount.php'</script>";
    return;
}
$pfpSize = $_FILES["pfp"]["size"];
$bannerSize = $_FILES["banner"]["size"];
if(($pfpName != "" and $pfpSize > 3*1024*1024) or ($bannerName != "" and $bannerSize > 3*1024*1024)){
    $_SESSION["ErrorHeader"] = "NO SE PUDO MODIFICAR LA CUENTA";
    $_SESSION["ErrorText"] = "Las imágenes que subió son muy pesadas, el tamaño máximo es de 3mb.";
    echo "<script> window.location='/DeltaTrain/createaccount.php'</script>";
    return;
}



$query="SELECT * FROM User where (Username_User='$username' or Mail_User='$email') and not ID_User=".$_SESSION["CurrentUserIDSession"];
$result = mysqli_query($conexion, $query);
$insert = "UPDATE User SET Password_User='$password', Name_User='$name', LastName_User='$lastnames', Gender_User=".$sexo.", BirthDate_User='$birth', Mail_User='$email', Username_User='$username', Administrator_User=0, Description_User='$description' WHERE ID_User = ".$_SESSION["CurrentUserIDSession"];



if(mysqli_num_rows($result) == 0){ #Checa si hay almenos alguna cuenta que coincidan ambos



    $result = mysqli_query($conexion, $insert);
    if($result){
        session_destroy();
        session_start();
        $query2="SELECT * FROM User where Username_User='$username' or Mail_User='$email'";
        $result = mysqli_query($conexion, $query2);
        while($row=mysqli_fetch_assoc($result)) {
            $_SESSION["CurrentUserIDSession"] = $row["ID_User"];
            $_SESSION["CurrentUserAdministratorSession"] = $row["Administrator_User"];
        }
    }
    $newUserId=0;
    if($pfpName!=""){
        $pfpData = addslashes(file_get_contents($_FILES["pfp"]["tmp_name"]));
        $query = 'UPDATE User SET Pfp_User = "'.$pfpData.'" WHERE ID_User = '.$_SESSION["CurrentUserIDSession"];
        $result = mysqli_query($conexion, $query);
    }
    if($bannerName!=""){
        $bannerData = addslashes(file_get_contents($_FILES["banner"]["tmp_name"]));
        $query = 'UPDATE User SET Banner_User = "'.$bannerData.'" WHERE ID_User = '.$_SESSION["CurrentUserIDSession"];
        $result = mysqli_query($conexion, $query);
    }
    echo "<script> window.location='/DeltaTrain/index.php'</script>";
    


    
}
else{



    $_SESSION["ErrorHeader"] = "NO SE PUDO MODIFICAR LA CUENTA";
    $_SESSION["ErrorText"] = "Ya existe una cuenta con el mismo nombre de usuario o correo asociados";
    echo "<script> window.location='/DeltaTrain/configuration.php'</script>"; 



}