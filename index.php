<?php #Esta página muestra el feed del usuario

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeltaTrain</title>
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="imgs/logo.svg">


</head>
<body>

    <div class="sidebar">

        <div class="btn-togle-content">
            <div class="btn-toggle">
                <i class="bi bi-list"></i>
            </div>
        </div>
        
        <ul class="nav">
            <li>
                <div class="logo">
                    <img src="imgs/logo.svg" alt="">
                </div>
            </li>
            <li>
                <a href=""> <!-- Este botón redirecciona al feed del usuario -->
                    <i class="bi bi-house-fill"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href=""> <!-- Este botón redirecciona al perfil del usuario -->
                    <i class="bi bi-person-circle"></i>
                    <span>Perfil</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="bi bi-card-checklist"></i>
                    <span>Actividades</span>
                </a>
            </li>
        </ul>

        <ul class="nav-2">
            <li>
                <a href="">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>Contacto</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="bi bi-gear-fill"></i>
                    <span>Opciones</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </li>
        </ul>
    
    </div>

    <div class="wrapper">
        <form action="iniciar_sesion.php" method="post" class="form">
            <h2>Iniciar Sesión</h2>
            <div class="contenedor-input">
                <input type="text" name="usuario" id="usuario" required>
                <label for="usuario">
                    <span class="text-input"><i class="bi bi-person-fill"></i> Usuario</span>
                </label>
            </div>
            <div class="contenedor-input">
                <input type="password" name="contrasena" id="contrasena" required>
                <label for="contrasena">
                    <span class="text-input"><i class="bi bi-lock-fill"></i>Contraseña</span>
                </label>
            </div>
            <button type="submit" class="btn-submit">
                <span class="txt-send">Enviar</span>
                <span class="icon-send"><i class="bi bi-send-fill"></i></span>
            </button>
        </form>
    </div>

<script src="scripts/sidebar.js"></script>

</body>
</html>