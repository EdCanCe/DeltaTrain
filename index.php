<?php #Esta página muestra el feed del usuario
include("variablesGlobales.php");
include("conexion.php");
session_start();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf8mb4">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeltaTrain</title>
    <link rel="stylesheet" href="/DeltaTrain/styles/main.css">
    <!-- Enlazando archivo de estilos normalize-->
    <link rel="stylesheet" href="/DeltaTrain/styles/normalize.css">
    <!-- Enlazando archivo de estilos para la barra lateral -->
    <link rel="stylesheet" href="/DeltaTrain/styles/sidebar.css">
    <!-- Enlazando archivo de estilos para el formulario -->
    <link rel="stylesheet" href="/DeltaTrain/styles/form.css">
    <!-- Enlazando archivo de estilos para las alertas -->
    <link rel="stylesheet" href="/DeltaTrain/styles/alerts.css">
    <!-- Enlazando la fuente Material Symbols Outlined de Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Enlazando la fuente Material Symbols Rounded de Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Enlazando la fuente Poppins de Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    <!-- Añadiendo el icono a la página -->
    <link rel="icon" href="/DeltaTrain/imgs/logoDT.svg">
    <link rel="stylesheet" href="/DeltaTrain/styles/load.css">
</head>
<body>

    

    <?php
        echo $alertas;
        echo "<script src='/DeltaTrain/scripts/alert.js'></script>";
        echo "<script src='/DeltaTrain/scripts/load-pfp.js'></script>";
        echo "<script src='/DeltaTrain/scripts/colorchange.js'></script>";
        echo "<script src='/DeltaTrain/scripts/load.js'></script>";

        if(isset($_SESSION["CurrentUserIDSession"])){ #Checa si ya inició sesión
            $CurrentUserID = $_SESSION["CurrentUserIDSession"]; #Recoge el id del usuario
            $CurrentUserAdministrator = $_SESSION["CurrentUserAdministratorSession"]; #Recoge sobre si el usuario es administrador o no
            if($CurrentUserAdministrator == '0'){ #Es 0 en caso de ser un usuario normal
                echo $navConCuenta;
                echo $navConCuentaAbajo;
                echo "<script> window. location='/DeltaTrain/home'</script>"; #Como ya tienes sesión y no deberías de iniciarla te manda a tu feed directamente
            }
            else{ #Si se usa este es porque el usuario es admin
                echo $navConAdmin;
                echo $navConAdminAbajo;
                echo "<script> window. location='/DeltaTrain/home'</script>";
            }



            mysqli_query($conexion, "SET GLOBAL max_allowed_packet=1073741824");
            $query = "SELECT Pfp_User, Username_User, Color_User from User WHERE ID_User = $CurrentUserID";
            $result = mysqli_query($conexion, $query);
            $pfpData = "";
            while($row=mysqli_fetch_assoc($result)){
                if(!is_null($row["Pfp_User"])){
                    ?><script>loadpfp('data:image/jpeg;base64,<?php echo base64_encode($row["Pfp_User"]); ?>', "RealUserIcon");</script><?php
                }
                ?><script>document.getElementById("RealUserName").textContent="<?php echo $row["Username_User"]; ?>";</script><?php
                ?><script>document.getElementById("RealUserProfile").href="/DeltaTrain/<?php echo $row["Username_User"]; ?>";</script><?php
                ?><script>changeColor(<?php echo $row["Color_User"] ?>)</script><?php
            }




        }
        else{ #Si se usa este es porque aún no se ha iniciado sesión
            echo $navSinCuenta;
            echo $navSinCuentaAbajo; #En este caso como es el login no, pero para todo lo demás te debe saltar que ocupas crear la sesión primero
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



            <form action="login.php" method="post" class="form" id="form">



                <!--Titulo del formulario-->
                <h2>Iniciar Sesión</h2>



                <!--Campo para ingresar el nombre de usuario-->
                <div class="input-container">
                    <input type="text" name="username" id="username" required>
                    <span class="placeholder-input"><span class="material-symbols-outlined">person</span>&nbsp;Nombre de Usuario</span>
                    <i class="input-line"></i>
                    <span class="message"></span>
                </div>



                <!--Campo para ingresar la contraseña del usuario-->
                <div class="input-container">
                    <input type="password" name="password" id="password" required>
                    <span class="placeholder-input"><span class="material-symbols-outlined icon">lock</span>&nbsp;Contraseña</span>
                    <i class="input-line"></i>
                    <span class="message"></span>
                </div>



                <!--Link para redireccionar a el inicio de sesión-->
                <div class="links-container">
                    <a href="createaccount">¿No tienes cuenta? Créala ahora</a>
                </div>



                <!--Boton para enviar formulario-->
                <button type="submit" class="btn-submit">Iniciar sesión</button> 



            </form>
        </div>
    </div>
    


    
<script src="scripts/sidebar.js"></script>
<script src="scripts/script-form.js"></script>
<script src='/DeltaTrain/scripts/image.js'></script>

</body>
</html>