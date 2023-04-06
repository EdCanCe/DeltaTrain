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
    <title>DeltaTrain | Creación de cuenta</title>
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

    <div class="main-content">
        

        
        <div class="box">

        
            <form action="accountcreator.php" method="post" class="form" id="form">



                <!--Titulo del formulario-->
                <h2>Crear Cuenta</h2>



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




                <!--Campo para ingresar los nombres del usuario-->
                <div class="input-container">
                    <input type="text" name="name" id="name" required>
                    <span class="placeholder-input">Nombre(s)</span>
                    <i class="input-line"></i>
                    <span class="message"></span>
                </div>



                <!--Campo para ingresar los apellidos del usuario-->
                <div class="input-container">
                    <input type="text" name="lastnames" id="lastnames" required>
                    <span class="placeholder-input">Apellido(s)</span>
                    <i class="input-line"></i>
                    <span class="message"></span>
                </div>



                <!--Campo para ingresar la fecha de nacimiento del usuario-->
                <div class="input-container">
                    <input type="date" name="birth" id="birth" required>
                    <span class="placeholder-input"><span class="material-symbols-outlined icon">event</span> Fecha de Nacimiento</span>
                    <i class="input-line"></i>
                    <span class="message"></span>
                </div>



                <div class="input-container input-container-radio">
                    <span class="text-input-genero">Sexo</span>
                    <p class="letras-chiquitas">Este dato se pide para poder realizar una calculadora de calorías</p>
                    <div>
                        <div><span>Hombre</span><input type="radio" name="sexo" id="masculino" value="0"></div>
                        <div><span>Mujer</span><input type="radio" name="sexo" id="femenino" value="1"></div>
                    </div>
                    
                </div>



                <!--Campo para ingresar el correo del usuario-->
                <div class="input-container">
                    <input type="text" name="email" id="email" required>
                    <span class="placeholder-input"><span class="material-symbols-outlined">mail</span> Correo</span>
                    <i class="input-line"></i>
                    <span class="message"></span>
                </div>



                <!--Link para redireccionar a el inicio de sesión-->
                <div class="links-container">
                    <a href="">¿Ya tienes cuenta? Inicia Sesión</a>
                </div>



                <!--Boton para enviar formulario-->
                <button type="submit" class="btn-submit">Enviar</button> 



            </form>
        </div>
    </div>

<script src="scripts/sidebar.js"></script>
<script src="scripts/alert.js"></script>

</body>
</html>