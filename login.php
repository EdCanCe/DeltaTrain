<?php
session_start();
session_destroy();
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
include("conexion.php");

$query ="SELECT * FROM User where Username_User='$username' and Password_User='$password'";
$result = mysqli_query($conexion, $query);

if(mysqli_num_rows($result) == 0){ #Checa si hay almenos alguna cuenta que coincidan ambos

}
else{
    while($row=mysqli_fetch_assoc($result)) {
        $_SESSION["CurrentUserIDSession"] = $row["ID_User"];
        $_SESSION["CurrentUserAdministratorSession"] = $row["Password_User"];
    }
    echo "<script> window. location='/DeltaTrain/index.php'</script>";
}

mysqli_free_result($query);
mysqli_close($conexion);