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
    <title>DeltaTrain | Feed</title>
    <link rel="stylesheet" href="/DeltaTrain/styles/main.css">
    <!-- Enlazando archivo de estilos normalize-->
    <link rel="stylesheet" href="/DeltaTrain/styles/normalize.css">
    <!-- Enlazando archivo de estilos para la barra lateral -->
    <link rel="stylesheet" href="/DeltaTrain/styles/sidebar.css">
    <!-- Enlazando archivo de estilos para el formulario -->
    <link rel="stylesheet" href="/DeltaTrain/styles/form.css">
    <!-- Enlazando archivo de estilos para la pantalla de carga -->
    <link rel="stylesheet" href="/DeltaTrain/styles/load.css">
    <!-- Enlazando archivo de estilos para las alertas -->
    <link rel="stylesheet" href="/DeltaTrain/styles/alerts.css">
    <!-- Enlazando la fuente Material Symbols Outlined de Google -->
    <link rel="stylesheet" href="/DeltaTrain/styles/recipe_creator.css">
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
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';

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



    <!-- Contenido principal de la pagina -->
    <div class="main-content">



        <!-- Ejercicios de la receta contenedor principal -->
        <div class="recipes-main-container">

                <!-- Cabecera del contenedor de la receta -->
                <div class="recipes-head">
                    <h1 class="recipes-name">
                    <input type="text" name="recipes-name" id="nameData" required>
                    <span class="placeholder-input">Nombre de la receta</span>
                    <i class="input-line"></i>
                    <span class="message"></span>
                    </h1>
                    
                    <span class="material-symbols-outlined icon">cooking</span>
                </div>



                <!-- Cuerpo de del contenedor de la receta -->
                <div class="recipes-body">

                <div class="input-container image">
                    <input type="file" name="banner" id="pictureData">
                    <div class="text-input-image">
                    <span>Agregar Imagen</span><span class='material-symbols-outlined icon'>add_photo_alternate</span>
                    </div>
                    <div class="vew-image-container">
                        <img src="" alt="">
                    </div>        
                </div>

                    <div class="nutritional-information-container">
                        <h3>Información nuticiónal
                            <span class="material-symbols-outlined">nutrition</span>
                        </h3>
                        <h4>Tamaño de la porción: 
                        <span>
                            <input type="text" maxlength="8" id="portionData">
                        </span>
                        </h4>
                        <ul>
                            <li>Proteinas: <span><input type="text" maxlength="8" id="proteinData"></span></li>
                            <li>Grasas: <span><input type="text" maxlength="8" id="fatData"></span></li>
                            <li>Carbohidratos: <span><input type="text" maxlength="8"  id="carbsData"></span></li>
                        </ul>
                    </div>

                    <!-- Contenedor del ejercicio -->
                    <div class="ingredients-container">
                        <h3>Ingredientes<span class="material-symbols-outlined">
                            receipt_long
                            </span></h3>
                        <ol>
                            <li><span><input type="text" class="ingredientData" required></span><button class="delete-btn">Eliminar</button></li>
                        </ol>
                        <div class="add-ingredient-container">
                            <button class="add-ingredient-button">
                                <span>Añadir Ingrediente</span>
                                <span class="material-symbols-outlined icon">add_circle</span>
                            </button>
                        </div>
                    </div>



                    <div class="preparation-container">
                        <h3>Preparación<span class="material-symbols-outlined">
                        outdoor_grill
                        </span>
                        </h3>
                        <textarea id="preparationData" cols="30" rows="10" style="resize:vertical;" required></textarea>
                    </div>
                    
                </div>



                <!-- Agregar ejercicio a la receta contenedor -->
                <div class="add-exercise-container">
                    <a class="mouse-hover" onclick="insertRecipe()">
                        <span>Guardar receta</span>
                        <span class="material-symbols-outlined icon">add_circle</span>
                    </a>
                </div>
        
        </div>
    </div>
        

    


    
<script src="/DeltaTrain/scripts/sidebar.js"></script>
<script src="/DeltaTrain/scripts/script-form.js"></script>
<script src='/DeltaTrain/scripts/image.js'></script>
<script src="/DeltaTrain/scripts/recipe-creator.js"></script>

</body>
</html>