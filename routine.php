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
    <!-- Enlazando archivo de estilos para los follows -->
    <link rel="stylesheet" href="/DeltaTrain/styles/routine.css">
    <!-- Enlazando archivo de estilos para las alertas -->
    <link rel="stylesheet" href="/DeltaTrain/styles/alerts.css">
    <!-- Enlazando archivo de estilos para los follows -->
    <link rel="stylesheet" href="/DeltaTrain/styles/recipe.css">
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


        <!-- Ejercicios de la rutina contenedor principal -->
        <div class="routine-main-container">


            <?php
            if(!isset($_GET["routineID"])){ #checa primero que se haya dado un usario
                $_SESSION["ErrorHeader"] = "ERROR 404";
                $_SESSION["ErrorText"] = "La página que trató de acceder no existe.";
                echo "<script> window.location='/DeltaTrain/home'</script>";
            }
            $query = "SELECT * FROM Routine WHERE ID_Routine = ".$_GET["routineID"];
            $result = mysqli_query($conexion, $query);
            if(mysqli_num_rows($result) == 0){
                $_SESSION["ErrorHeader"] = "ERROR 404";
                $_SESSION["ErrorText"] = "La página que trató de acceder no existe.";
                echo "<script> window.location='/DeltaTrain/home'</script>";
            }
            while($row=mysqli_fetch_assoc($result)){ ?>
                <script>document.title="DeltaTrain | <?php echo $row["Name_Routine"]?>";</script>


            <!-- Cabecera del contenedor de la rutina -->
            <div class="routine-head">
            <h1 class="routine-name"><?php echo $row["Name_Routine"]?></h1>
            <span class="material-symbols-outlined icon">sprint</span>
            </div>


            <!-- Cuerpo de del contenedor de la rutina -->
            <div class="routine-body">


                <?php #permite cargar una foto en caso de que haya una
                $query2 = "SELECT ID_UserActivity FROM UserActivity WHERE FKID_Routine_UserActivity = ".$_GET["routineID"];
                $result2 = mysqli_query($conexion, $query2);
                $row2 = mysqli_fetch_row($result2);
                $idUserActivity = 0;
                if(mysqli_num_rows($result2) != 0) $idUserActivity = $row2[0];
                $query2 = "SELECT Info_Visuals FROM Visuals WHERE FKID_UserActivity_Visuals = ".$idUserActivity;
                $result2 = mysqli_query($conexion, $query2);
                while($row2=mysqli_fetch_assoc($result2)){
                    ?>
                        <div class="recipe-img-container">
                            <img src='data:image/jpeg;base64,<?php echo base64_encode($row2["Info_Visuals"]); ?>' alt="">
                        </div>
                    <?php
                }?>

                <?php
                $query2 = "SELECT * FROM RoutineExercise WHERE FKID_Routine_RoutineExercise = ".$_GET["routineID"];
                $result2 = mysqli_query($conexion, $query2);
                while($row2=mysqli_fetch_assoc($result2)){
                    $query3 = "SELECT * FROM Exercise WHERE ID_Exercise = ".$row2["FK_Exercise_RoutineExercise"];
                    $result3 = mysqli_query($conexion, $query3);
                    while($row3=mysqli_fetch_assoc($result3)){
                        $fulldesc = explode('~', $row3["Description_Exercise"]);
                        $desc = nl2br($fulldesc[0]);
                        $table = $fulldesc[1];
                        ?>
                        <div class="exercise-container">
                            <h3 class="exercise-name"><?php echo $row3["Name_Exercise"] ?></h3>
                            <p class="exercise-description"><?php echo $desc ?></p>
                            <?php
                            if($table!=""){
                                ?>
                                <table>
                                    <tr>
                                        <th>Serie</th>
                                        <th>Duración</th>
                                        <th>Nota</th>
                                    </tr>
                                <?php
                                $parts = explode('|', $table);
                                for($i=0;$i<count($parts)-1;$i+=3){
                                    if($parts[$i+2] == "") $parts[$i+2] = "-";
                                    ?>
                                    <tr>
                                        <td><?php echo $parts[$i] ?></td>
                                        <td><?php echo $parts[$i+1] ?></td>
                                        <td class="set-note"><?php echo $parts[$i+2] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                        <?php

                    }
                }
                ?>
            </div>
            <?php } ?>

            <!-- Agregar ejercicio a la receta contenedor -->
            <div class="add-exercise-container">
            <a href="">
                <span>Modificar rutina</span>
                <span class="material-symbols-outlined icon">add_circle</span>
            </a>
            </div>

        </div>
    </div>

    
    


    
<script src="/DeltaTrain/scripts/sidebar.js"></script>
<script src='/DeltaTrain/scripts/image.js'></script>

</body>
</html>