<?php
include("variablesGlobales.php");
include("conexion.php");
session_start();

$_SESSION["ErrorHeader"] = "ERROR 404";
$_SESSION["ErrorText"] = "La página que trató de acceder no existe.";

if(isset($_SESSION["CurrentUserIDSession"])){ #Checa si ya inició sesión
    echo "<script> window.location='/DeltaTrain/home'</script>";
}
else{ #Si se usa este es porque aún no se ha iniciado sesión
    echo "<script> window.location='/DeltaTrain/login'</script>";
}