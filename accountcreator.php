<?php
include("conexion.php");
include("encriptor.php");
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$lastnames=$_POST['lastnames'];
$birth=$_POST['birth'];
$sexo=$_POST['sexo'];
$email=$_POST['email'];
$password=encrypt($password);






$query="SELECT * FROM User where Username_User='$username' or Mail_User='$email'";
$result = mysqli_query($conexion, $query);
$insert = "INSERT INTO USER(Password_User, Name_User, LastName_User, Gender_User, BirthDate_User, Mail_User, Username_User, Administrator_User) VALUES ('$password', '$name', '$lastnames', $sexo, '$birth', '$email', '$username', 0)";



if(mysqli_num_rows($result) == 0){ #Checa si hay almenos alguna cuenta que coincidan ambos



    $result = mysqli_query($conexion, $insert);
    if($result){
        session_start();
        $query2="SELECT * FROM User where Username_User='$username' and Password_User='$password'";
        $result = mysqli_query($conexion, $query2);
        while($row=mysqli_fetch_assoc($result)) {
            $_SESSION["CurrentUserIDSession"] = $row["ID_User"];
            $_SESSION["CurrentUserAdministratorSession"] = $row["Password_User"];
        }
        echo "<script> window.location='/DeltaTrain/index.php'</script>";
    }
    


    
}
else{



    echo "<script> history.back(); </script>"; #aquí va lo de error



}