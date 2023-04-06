<?php #Esta página muestra el feed del usuario
include("variablesGlobales.php");
include("conexion.php");
session_start();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeltaTrain | Feed</title>
    <link rel="stylesheet" href="styles/main.css">
    <!-- Enlazando archivo de estilos normalize-->
    <link rel="stylesheet" href="styles/normalize.css">
    <!-- Enlazando archivo de estilos para la barra lateral -->
    <link rel="stylesheet" href="styles/sidebar.css">
    <!-- Enlazando archivo de estilos para el formulario -->
    <link rel="stylesheet" href="styles/form.css">
    <!-- Enlazando archivo de estilos para las alertas -->
    <link rel="stylesheet" href="styles/alerts.css">
    <!-- Enlazando la fuente Material Symbols Outlined de Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Enlazando la fuente Material Symbols Rounded de Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Enlazando la fuente Poppins de Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    <!-- Añadiendo el icono a la página -->
    <link rel="icon" href="imgs/logo.svg">
</head>
<body>



<?php
        echo $alertas;
        echo "<script src='scripts/alert.js'></script>";

        if(isset($_SESSION["CurrentUserIDSession"])){ #Checa si ya inició sesión
            $CurrentUserID = $_SESSION["CurrentUserIDSession"]; #Recoge el id del usuario
            $CurrentUserAdministrator = $_SESSION["CurrentUserAdministratorSession"]; #Recoge sobre si el usuario es administrador o no
            if($CurrentUserAdministrator == '0'){ #Es 0 en caso de ser un usuario normal
                echo $navConCuenta;
                echo "<script> window. location='/DeltaTrain/feed.php'</script>"; #Como ya tienes sesión y no deberías de iniciarla te manda a tu feed directamente
            }
            else{ #Si se usa este es porque el usuario es admin
                echo $navConAdmin;
            }
        }
        else{ #Si se usa este es porque aún no se ha iniciado sesión
            echo $navSinCuenta; #En este caso como es el login no, pero para todo lo demás te debe saltar que ocupas crear la sesión primero
        }



        if(!isset($_SESSION["ErrorHeader"])) $_SESSION["ErrorHeader"] = "";
        if(!isset($_SESSION["ErrorText"])) $_SESSION["ErrorText"] = "";
        if($_SESSION["ErrorHeader"] != ""){
            makeAlert($_SESSION["ErrorHeader"], $_SESSION["ErrorText"]);
            $_SESSION["ErrorHeader"] = "";
            $_SESSION["ErrorText"] = "";
        }
    ?>



    <div class="main-content">



        <div class="box">








        </div>
    </div>
    


    
<script src="scripts/sidebar.js"></script>
<script src="scripts/script-form.js"></script>
<script src="scripts/alert.js"></script>

</body>
</html>