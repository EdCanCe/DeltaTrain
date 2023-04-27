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
    <title>DeltaTrain | Perfil</title>
    <link rel="stylesheet" href="/DeltaTrain/styles/main.css">
    <!-- Enlazando archivo de estilos normalize-->
    <link rel="stylesheet" href="/DeltaTrain/styles/normalize.css">
    <!-- Enlazando archivo de estilos para la barra lateral -->
    <link rel="stylesheet" href="/DeltaTrain/styles/sidebar.css">
    <!-- Enlazando archivo de estilos para el formulario -->
    <link rel="stylesheet" href="/DeltaTrain/styles/form.css">
    <!-- Enlazando archivo de estilos para las alertas -->
    <link rel="stylesheet" href="/DeltaTrain/styles/alerts.css">
    <!-- Enlazando archivo de estilos para el perfil -->
    <link rel="stylesheet" href="/DeltaTrain/styles/profile.css">
    <!-- Enlazando la fuente Material Symbols Outlined de Google -->
    <link rel="stylesheet" href="/DeltaTrain/styles/follow.css">
    <!-- Enlazando la fuente Material Symbols Outlined de Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Enlazando la fuente Material Symbols Rounded de Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Enlazando la fuente Poppins de Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    <!-- Añadiendo el icono a la página -->
    <link rel="icon" href="/DeltaTrain/imgs/logo.svg">
</head>
<body>



    <?php
        echo $alertas;
        echo "<script src='/DeltaTrain/scripts/alert.js'></script>";
        echo "<script src='/DeltaTrain/scripts/load-pfp.js'></script>";
        echo "<script src='/DeltaTrain/scripts/colorchange.js'></script>";

        if(isset($_SESSION["CurrentUserIDSession"])){ #Checa si ya inició sesión
            $CurrentUserID = $_SESSION["CurrentUserIDSession"]; #Recoge el id del usuario
            $CurrentUserAdministrator = $_SESSION["CurrentUserAdministratorSession"]; #Recoge sobre si el usuario es administrador o no
            if($CurrentUserAdministrator == '0'){ #Es 0 en caso de ser un usuario normal
                echo $navConCuenta;
                echo $navConCuentaAbajo;
            }
            else{ #Si se usa este es porque el usuario es admin
                echo $navConAdmin;
                echo $navConAdminAbajo;
            }



            mysqli_query($conexion, "SET GLOBAL max_allowed_packet=1073741824");
            $query = "SELECT Pfp_User, Username_User, Color_User from User where ID_User = $CurrentUserID";
            $result = mysqli_query($conexion, $query);
            $pfpData = "";
            while($row=mysqli_fetch_assoc($result)){
                if(!is_null($row["Pfp_User"])){
                    ?><script>loadpfp('data:image/jpeg;base64,<?php echo base64_encode($row["Pfp_User"]); ?>', "RealUserIcon");</script><?php
                }
                ?><script>document.getElementById("RealUserName").textContent="<?php echo $row["Username_User"]; ?>";</script><?php
                ?><script>document.getElementById("RealUserProfile").href="/DeltaTrain/<?php echo $row["Username_User"]; ?>";</script><?php
                ?><script>document.title="DeltaTrain | <?php echo $row["Username_User"]; ?>";</script><?php
                ?><script>changeColor(<?php echo $row["Color_User"] ?>)</script><?php
            }


        }
        else{ #Si se usa este es porque aún no se ha iniciado sesión
            echo $navSinCuenta;
            echo $navSinCuentaAbajo;
        }



        if(!isset($_SESSION["ErrorHeader"])) $_SESSION["ErrorHeader"] = "";
        if(!isset($_SESSION["ErrorText"])) $_SESSION["ErrorText"] = "";
        if($_SESSION["ErrorHeader"] != ""){
            makeAlert($_SESSION["ErrorHeader"], $_SESSION["ErrorText"]);
            $_SESSION["ErrorHeader"] = "";
            $_SESSION["ErrorText"] = "";
        }
    ?>    



    <!-- Contenido principal de la pagina -->
    <div class="main-content">



        <!-- Perfil de usuario contenedor principal -->
        <div class="profile-body">



            <!-- Banner del perfil -->
            <div class="profile-banner-container">
                <img src="/DeltaTrain/imgs/banner.png" id="profileBanner" alt="banner">
            </div>


            <!-- Foto del perfil -->
            <div class="profile-user-img-container">
                <img src="/DeltaTrain/imgs/pfp.png"  id="profilePfp" alt="user-img">
            </div>



            <!-- Datos del perfil del usuario -->
            <div class="user-dates-container">

                <div>
                    <span class="username" id="profileUsername">Usuario</span>
                    <span class="follow-button">a</span>
                </div>
                <br>
                <span class="user-description" id="profileDescription">Descripción del usuario</span>

            </div>



            <!-- Esto permite cargar los datos de las fotos en el perfil del usuario -->
            <?php
                if(!isset($_GET["user"])){ #checa primero que se haya dado un usario
                    $_SESSION["ErrorHeader"] = "NO SE PUDO ACCEDER AL USUARIO";
                    $_SESSION["ErrorText"] = "Se necesita proporcionar un username.";
                    echo "<script> window.location='/DeltaTrain/feed.php'</script>";
                }
                $query = "SELECT Username_User, Description_User, Pfp_User, Banner_User from User where Username_User = '".$_GET["user"]."'";
                $result = mysqli_query($conexion, $query);
                if(mysqli_num_rows($result) == 0){
                    $_SESSION["ErrorHeader"] = "NO SE PUDO ACCEDER AL USUARIO";
                    $_SESSION["ErrorText"] = "Se necesita proporcionar un username con una cuenta existente.";
                    echo "<script> window.location='/DeltaTrain/feed.php'</script>";
                }
                while($row=mysqli_fetch_assoc($result)){
                    ?><script>document.getElementById("profileUsername").innerHTML="<?php echo $row["Username_User"]; ?>";</script><?php
                    ?><script>document.getElementById("profileDescription").innerHTML="<?php echo preg_replace('/\s+/', ' ',  (nl2br($row["Description_User"]))); ?>";</script><?php
                    if(!is_null($row["Pfp_User"])){
                        ?><script>loadpfp('data:image/jpeg;base64,<?php echo base64_encode($row["Pfp_User"]); ?>', "profilePfp");</script><?php
                    }
                    if(!is_null($row["Banner_User"])){
                        ?><script>loadpfp('data:image/jpeg;base64,<?php echo base64_encode($row["Banner_User"]); ?>', "profileBanner");</script><?php
                    }

                }
            ?>



            <!-- Barra de navegación del perfil -->
            <div class="profile-sections-container">

                <div class="profile-section">
                    <a href="">
                    <span>Publicaciones</span>
                    <i></i>
                    </a>
                </div>

                <div class="profile-section">
                    <a href="">
                    <span>Publicaciones</span>
                    <i></i>
                    </a>
                </div>

                <div class="profile-section">
                    <a href="">
                    <span>Publicaciones</span>
                    <i></i>
                    </a>
                </div>

                <div class="profile-section">
                    <a href="">
                    <span>Publicaciones</span>
                    <i></i>
                    </a>
                </div>

            </div>



            <!-- Sección de posts -->
            <div class="post-body">


                <!-- Contenedor del post -->
                <div class="post-container">

                    <div class="post-div-1">
                        <div class="post-user-img-container">
                            <img src="/DeltaTrain/imgs/defaultpfp2.jpg" id="post-user-img-container" alt="user-img">
                        </div>
                    </div>
                    
                    <div class="post-div-2">
                        <div class="post-head-container">
                            <div>
                                <span class="username-post">Usuario</span>
                                <span class="date-post">dd/mm/yy</span>
                            </div>
                            
                            <span class="material-symbols-outlined more-post">more_horiz</span>
                        </div>

                        <span>Hola como estan asdas asdasd asdasdas asdasdas asds adas asdsad asdasdfwterh thfgjhyh adgaf dasd asd asd asd asd asdasdasd awsd sad as das d</span>
                    
                        <div class="interactions-post-container">
                            <span class="material-symbols-outlined like">favorite</span>
                            <span class="material-symbols-outlined comment">chat_bubble</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</body>



<!--Enlazando archivo JavaScript de la sidebar-->
<script src="/DeltaTrain/scripts/sidebar.js"></script>
<script src='/DeltaTrain/scripts/image.js'></script>




</html>