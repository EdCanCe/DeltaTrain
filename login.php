<?php
include("encriptor.php");
session_start();
session_destroy();
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$password=encrypt($password);
include("conexion.php");



$query ="SELECT * FROM User where Username_User='$username' and Password_User='$password'";
$result = mysqli_query($conexion, $query);



if(mysqli_num_rows($result) == 0){ #Checa si hay almenos alguna cuenta que coincidan ambos



    $_SESSION["ErrorHeader"] = "NO SE PUDO INICIAR SESIÓN";
    $_SESSION["ErrorText"] = "La cuenta que usted solició no existe o no coincide con su respectiva contraseña";
    echo "<script>window.location='/DeltaTrain/login'</script>";


    
}
else{



    while($row=mysqli_fetch_assoc($result)) {
        $_SESSION["CurrentUserIDSession"] = $row["ID_User"];
        $_SESSION["CurrentUserAdministratorSession"] = $row["Administrator_User"];
    }
    echo "<script>window.location='/DeltaTrain/home'</script>";



}