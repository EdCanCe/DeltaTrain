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
    <title>DeltaTrain | Configuración de cuenta</title>
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
            echo $navSinCuentaAbajo;
            echo "<script> window. location='/DeltaTrain/login'</script>"; #Como no iniciaste sesión te manda a hacerlo
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



            <?php #Va a permitir rellenar los datos para poder actualizarlos al cargarlos con los actuales.
                $query = "SELECT * FROM User WHERE ID_User=$CurrentUserID";
                $result = mysqli_query($conexion, $query);
                while($row=mysqli_fetch_assoc($result)){?>



                    <form action="accountconfigurator.php" method="post" class="form" id="form" enctype="multipart/form-data">



                    <!--Titulo del formulario-->
                        <h2>Modificar Cuenta</h2>



                        <!--Campo para ingresar el nombre de usuario-->
                        <div class="input-container normal">
                            <input type="text" name="username" id="username" value="<?php echo $row["Username_User"]?>" required>
                            <span class="placeholder-input"><span class="material-symbols-outlined">person</span>&nbsp;Nombre de Usuario</span>
                            <i class="input-line"></i>
                            <span class="message"></span>
                        </div>



                        <!--Campo para ingresar la contraseña del usuario-->
                        <div class="input-container normal">
                            <input type="password" name="password" id="password" required>
                            <span class="placeholder-input"><span class="material-symbols-outlined icon">lock</span>&nbsp;Contraseña</span>
                            <i class="input-line"></i>
                            <span class="message"></span>
                        </div>




                        <!--Campo para ingresar los nombres del usuario-->
                        <div class="input-container normal">
                            <input type="text" name="name" id="name" value="<?php echo $row["Name_User"]?>" required>
                            <span class="placeholder-input">Nombre(s)</span>
                            <i class="input-line"></i>
                            <span class="message"></span>
                        </div>



                        <!--Campo para ingresar los apellidos del usuario-->
                        <div class="input-container normal">
                            <input type="text" name="lastnames" id="lastnames" value="<?php echo $row["LastName_User"]?>" required>
                            <span class="placeholder-input">Apellido(s)</span>
                            <i class="input-line"></i>
                            <span class="message"></span>
                        </div>



                        <!--Campo para ingresar la fecha de nacimiento del usuario-->
                        <div class="input-container normal">
                            <input type="date" name="birth" id="birth" value="<?php echo $row["BirthDate_User"]?>" required>
                            <span class="placeholder-input"><span class="material-symbols-outlined icon">event</span>&nbsp;Fecha de Nacimiento</span>
                            <i class="input-line"></i>
                            <span class="message"></span>
                        </div>



                        <!--Campo para ingresar la descripción del usuario-->
                        <div class="input-container">
                            <textarea name="description" id="description" required><?php echo $row["Description_User"] ?></textarea>
                            <span class="placeholder-input"><span class="material-symbols-outlined">description</span>&nbsp;Descripción del perfil</span>
                            <i class="input-line"></i>
                            <span class="message"></span>
                        </div>



                        <!--Campo para ingresar la foto de perfil del usuario-->
                        <div class="input-container image">
                            <input type="file" accept="image/*" name="pfp" id="pfp">
                            <div class="text-input-image">
                            <span>Agregar Foto de perfil</span><span class='material-symbols-outlined icon'>add_photo_alternate</span>
                            </div>
                            <div class="vew-image-container">
                                <img src="" alt="">
                            </div>        
                        </div>



                        <!--Campo para ingresar el banner del usuario-->
                        <div class="input-container image">
                        <input type="file" accept="image/*" name="banner" id="banner">
                            <div class="text-input-image">
                            <span>Agregar Banner</span><span class='material-symbols-outlined icon'>add_photo_alternate</span>
                            </div>
                            <div class="vew-image-container banner">
                                <img src="" alt="">
                            </div>        
                        </div>



                        <div class="input-container color">
                            <div class="color-selector">
                                <input type="radio" name="color" id="" value="0" <?php if($row['Color_User'] == 0) echo 'checked="checked"' ?>>
                                <span for="radio"></span>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="" value="1" <?php if($row['Color_User'] == 1) echo 'checked="checked"' ?>>
                                <span for="radio"></span>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="" value="2" <?php if($row['Color_User'] == 2) echo 'checked="checked"' ?>>
                                <span for="radio"></span>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="" value="3" <?php if($row['Color_User'] == 3) echo 'checked="checked"' ?>>
                                <span for="radio"></span>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="" value="4" <?php if($row['Color_User'] == 4) echo 'checked="checked"' ?>>
                                <span for="radio"></span>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="" value="5" <?php if($row['Color_User'] == 5) echo 'checked="checked"' ?>>
                                <span for="radio"></span>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="" value="6" <?php if($row['Color_User'] == 6) echo 'checked="checked"' ?>>
                                <span for="radio"></span>
                            </div>
                            
                            
                        </div>



                        <!--Boton para enviar formulario-->
                        <button type="submit" class="btn-submit">Enviar</button> 


                        <?php if(!isset($_SESSION["setForm"])) $_SESSION["setForm"]="";?>
                        <?php loadFormData($_SESSION["setForm"]);
                        $_SESSION["setForm"]="";
                        $GLOBALS["setForm"]="";
                        ?> <!-- Este hace que carguen los datos --> 
                    </form>



                <?php } ?>
        </div>
    </div>
    


    
<script src="scripts/sidebar.js"></script>
<script src="scripts/script-form.js"></script>
<script src='/DeltaTrain/scripts/image.js'></script>

</body>
</html>