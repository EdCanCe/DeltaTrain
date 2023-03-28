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
    <title>DeltaTrain</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="imgs/logo.svg">
</head>
<body>

    <?php
        if(isset($_SESSION["CurrentUserIDSession"])){ #Checa si ya inició sesión
            $CurrentUserID = $_SESSION["CurrentUserIDSession"]; #Recoge el id del usuario
            $CurrentUserAdministrator = $_SESSION["CurrentUserAdministratorSession"]; #Recoge sobre si el usuario es administrador o no
            if($CurrentUserAdministrator == '0'){ #Es 0 en caso de ser un usuario normal
                echo $navConCuenta; #Este llama a variablesGlobales para generar el nav rápidamente
            }
            else{ #Si se usa este es porque el usuario es admin
                echo $navConAdmin;
            }
        }
        else{ #Si se usa este es porque aún no se ha iniciado sesión
            echo $navSinCuenta; #En este caso como es el login no, pero para todo lo demás te debe saltar que ocupas crear la sesión primero
        }

    ?>






    <div class="wrapper" id="wrapper">




        <form action="login.php" method="post" class="form" id="form">
            <h2>Iniciar Sesión</h2>

            <div class="contenedor-input">
                
                <input type="text" name="username" id="usuario" required>
                <label class="label-input" for="usuario">
                    <span class="text-input"><i class="bi bi-person-fill"></i> Usuario</span>
                </label>
                <i class="input-line"></i>
                
            </div>

            <div class="contenedor-input">
                <input type="password" name="password" id="contrasena" required>
                <label class="label-input" for="contrasena">
                    <span class="text-input"><i class="bi bi-lock-fill"></i> Contraseña</span>
                </label>
                <i class="input-line"></i>
            </div>

            


            <div class="contenedor-redirec">
                <a href="crear_cuenta.html"><span>No tienes cuenta? Crear Cuenta</span></a>
            </div>

            <button type="submit" class="btn-submit" id="btn-submit">
                <span class="txt-send">Registrarse</span>
                <span class="icon-send"><i class="bi bi-person-plus-fill"></i></span>
                <span class="icon-send2"><i class="bi bi-person-check-fill"></i></span>
            </button>
        </form>
    </div>

<script src="scripts/sidebar.js"></script>
<script src="scripts/script-form.js"></script>

</body>
</html>