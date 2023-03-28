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
                echo $navConCuenta;
                echo "<script> window. location='/DeltaTrain/feed.php'</script>"; #Como ya tienes sesión y no deberías de crearla te manda a tu feed directamente
            }
            else{ #Si se usa este es porque el usuario es admin
                echo $navConAdmin;
            }
        }
        else{ #Si se usa este es porque aún no se ha iniciado sesión
            echo $navSinCuenta; #En este caso como es el login no, pero para todo lo demás te debe saltar que ocupas crear la sesión primero
        }

    ?>

    <div class="wrapper">
    <form action="iniciar_sesion.php" method="post" class="form">
        <h2>Crear Cuenta</h2>

        <div class="contenedor-input">
            <input type="text" name="usuario" id="usuario" required>
            <label for="usuario">
                <span class="text-input"><i class="bi bi-person-fill"></i> Usuario</span>
            </label>
            <i class="input-line"></i>
        </div>

        <div class="contenedor-input">
            <input type="password" name="contrasena" id="contrasena" required>
            <label for="contrasena">
                <span class="text-input"><i class="bi bi-lock-fill"></i> Contraseña</span>
            </label>
            <i class="input-line"></i>
        </div>

        <div class="contenedor-input">
            <input type="text" name="nombres" id="nombres" required>
            <label for="nombres">
                <span class="text-input">Nombre(s)</span>
            </label>
            <i class="input-line"></i>
        </div>

        <div class="contenedor-input">
            <input type="text" name="apellidos" id="apellidos" required>
            <label for="apellidos">
                <span class="text-input">Apellidos(s)</span>
            </label>
            <i class="input-line"></i>
        </div>

        <div class="contenedor-input">
            <input type="date" name="fech-naciento" id="fech-naciento" max="`new Date().toISOString().split('T')[0]`" min="`new Date(new Date().setFullYear(new Date().getFullYear()-15)).toISOString().split('T')[0]`" required>
            <label for="apellidos">
                <span class="text-input"><i class="bi bi-calendar-event-fill"></i> Fecha de nacimiento</span>
            </label>
            <i class="input-line"></i>
        </div>

        <div class="contenedor-input contenedor-input-radio">
            <span class="text-input-genero">Genero</span>
            <div>
                <div><span>Masculino</span><input type="radio" name="genero" id=""></div>
                <div><span>Femenino</span><input type="radio" name="genero" id=""></div>
            </div>
        </div>

        <div class="contenedor-input">
            <input type="email" name="correo" id="correo" required>
            <label for="correo">
                <span class="text-input"><i class="bi bi-envelope-fill"></i> Correo</span>
            </label>
            <i class="input-line"></i>
        </div>

        <div class="contenedor-redirec">
            <a href=""><span>Ya tienes cuenta? Inicia Sesión</span></a>
        </div>

        <button type="submit" class="btn-submit">
            <span class="txt-send">Registrarse</span>
            <span class="icon-send"><i class="bi bi-person-plus-fill"></i></span>
        </button>
    
    </form>
    </div>

<script src="scripts/sidebar.js"></script>

</body>
</html>