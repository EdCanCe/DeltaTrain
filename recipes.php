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
    <title>DeltaTrain | Recetas</title>
    <link rel="stylesheet" href="/DeltaTrain/styles/main.css">
    <!-- Enlazando archivo de estilos normalize-->
    <link rel="stylesheet" href="/DeltaTrain/styles/normalize.css">
    <!-- Enlazando archivo de estilos para la barra lateral -->
    <link rel="stylesheet" href="/DeltaTrain/styles/sidebar.css">
    <!-- Enlazando archivo de estilos para el formulario -->
    <link rel="stylesheet" href="/DeltaTrain/styles/form.css">
    <!-- Enlazando archivo de estilos para las alertas -->
    <link rel="stylesheet" href="/DeltaTrain/styles/alerts.css">
    <!-- Enlazando archivo de estilos principales para el perfil -->
    <link rel="stylesheet" href="/DeltaTrain/styles/recipes_user.css">
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



        <!-- Rutinas del usuario contenedor principal -->
        <div class="recipes-main-container">



            <!-- Cabecera de la sección rutinas -->
            <div class="recipes-head">
                <h1 id="recipesHeader">Recetas</h1>
                <span class="material-symbols-outlined icon">cooking</span>
            </div>


            <!-- Cuerpo de la sección rurinas -->
            <div class="recipes-body">


                <?php
                if(isset($_GET["user"])){
                    $query = "SELECT Username_User, ID_User FROM User WHERE Username_User = '".$_GET["user"]."'";
                    $result = mysqli_query($conexion, $query);
                    if(mysqli_num_rows($result) == 0){
                        $_SESSION["ErrorHeader"] = "ERROR 404";
                        $_SESSION["ErrorText"] = "La página que trató de acceder no existe.";
                        echo "<script> window.location='/DeltaTrain/home'</script>";
                    }
                    while($row=mysqli_fetch_assoc($result)){
                        ?><script>document.title="DeltaTrain | Recetas de <?php echo $row["Username_User"]?>";</script><?php
                        $mainUser = $row["ID_User"];
                        ?><script>document.getElementById("recipesHeader").textContent="Recetas de <?php echo $row["Username_User"]; ?>";</script><?php
                    }
                }else{
                    if(!isset($_SESSION["CurrentUserIDSession"])) echo "<script> window. location='/DeltaTrain/login'</script>"; #Como no iniciaste sesión te manda a hacerlo
                    $mainUser = $CurrentUserID;
                }
                ?>


                <?php
                $query="SELECT ID_Recipe, Name_Recipe FROM Recipe WHERE FKID_User_Recipe =".$mainUser;
                $result = mysqli_query($conexion, $query);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <div class="recipes-container">
                        <a href="/DeltaTrain/recipes/<?php echo $row["ID_Recipe"] ?>">
                        <h3 class="recipes-name"><?php echo $row["Name_Recipe"] ?></h3>
                        </a>
                    </div>
                    <?php
                }
                ?>



            </div>



            <?php
            if(!isset($_GET["user"]) and isset($_SESSION["CurrentUserIDSession"])){
                ?>
                    <!-- Crear rutina contenedor -->
                    <div class="create-recipes-container">
                        <a href="recipes/create">
                            <span>Crear receta nueva</span>
                            <span class="material-symbols-outlined icon">add_circle</span>
                        </a>
                    </div>
                <?php
            }
            ?>



        </div>


        
    </div>

    
    


    
<script src="/DeltaTrain/scripts/sidebar.js"></script>
<script src='/DeltaTrain/scripts/image.js'></script>
</body>
</html>