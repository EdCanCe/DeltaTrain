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
    <title>Crear Cuenta | DeltaTrain</title>
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

    <div class="wrapper" id="wrapper">
        

        
        <form action="accountcreator.php" method="post" class="form" id="form">



            <h2>Crear Cuenta</h2>



            <div class="contenedor-input">
                <input type="text" name="username" id="usuario" required>
                <label class="label-input" for="username">
                    <span class="text-input"><i class="bi bi-person-fill"></i> Usuario</span>
                </label>
                <i class="input-line"></i>
            </div>



            <div class="contenedor-input">
                <input type="password" name="password" id="contrasena" required>
                <label class="label-input" for="password">
                    <span class="text-input"><i class="bi bi-lock-fill"></i> Contraseña</span>
                </label>
                <i class="input-line"></i>
            </div>



            <div class="contenedor-input">
                <input type="text" name="name" id="nombres" required>
                <label class="label-input" for="name">
                    <span class="text-input">Nombre(s)</span>
                </label>
                <i class="input-line"></i>
            </div>



            <div class="contenedor-input">
                <input type="text" name="lastnames" id="apellidos" required>
                <label class="label-input" for="lastnames">
                    <span class="text-input">Apellidos(s)</span>
                </label>
                <i class="input-line"></i>
            </div>



            <div class="contenedor-input">
                <input type="date" name="birth" id="fech-naciento" max="`new Date().toISOString().split('T')[0]`" min="`new Date(new Date().setFullYear(new Date().getFullYear()-15)).toISOString().split('T')[0]`" required>
                <label class="label-input" for="birth">
                    <span class="text-input"><i class="bi bi-calendar-event-fill"></i> Fecha de nacimiento</span>
                </label>
                <i class="input-line"></i>
            </div>



            <div class="contenedor-input contenedor-input-radio">
                <span class="text-input-genero">Sexo</span>
                <p class="letras-chiquitas">Este dato se pide para poder realizar una calculadora de calorías</p>
                <div>
                    <div><span>Hombre</span><input type="radio" name="sexo" id="masculino" value="0"></div>
                    <div><span>Mujer</span><input type="radio" name="sexo" id="femenino" value="1"></div>
                </div>
                
            </div>



            <div class="contenedor-input">
                <input type="email" name="email" id="correo" required>
                <label  class="label-input" for="email">
                    <span class="text-input"><i class="bi bi-envelope-fill"></i> Correo</span>
                </label>
                <i class="input-line"></i>
            </div>



            <button type="submit" class="btn-submit" id="btn-submit">
                <span class="txt-send">Registrarse</span>
                <span class="icon-send"><i class="bi bi-person-plus-fill"></i></span>
                <span class="icon-send2"><i class="bi bi-person-check-fill"></i></span>
            </button>



            <div class="contenedor-redirec">
                <p><br>¿Ya tienes cuenta? Inicia sesión<br></p>
            </div>



            <button class="btn-submit">
                <a href="index.php"><span class="txt-send">Iniciar sesión</span></a>
                <span class="icon-send"><i class="bi bi-person-fill-up"></i></span>
                <span class="icon-send2"><i class="bi bi-person-check-fill"></i></span>
            </button>



        </form>
    </div>

<script src="scripts/sidebar.js"></script>

</body>
</html>