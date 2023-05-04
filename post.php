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
    <title>DeltaTrain | Post</title>
    <link rel="stylesheet" href="/DeltaTrain/styles/main.css">
    <!-- Enlazando archivo de estilos normalize-->
    <link rel="stylesheet" href="/DeltaTrain/styles/normalize.css">
    <!-- Enlazando archivo de estilos para la barra lateral -->
    <link rel="stylesheet" href="/DeltaTrain/styles/sidebar.css">
    <!-- Enlazando archivo de estilos para el formulario -->
    <link rel="stylesheet" href="/DeltaTrain/styles/form.css">
    <!-- Enlazando archivo de estilos para las alertas -->
    <link rel="stylesheet" href="/DeltaTrain/styles/alerts.css">
    <!-- Enlazando archivo de estilos para los follows -->
    <link rel="stylesheet" href="/DeltaTrain/styles/follow.css">
    <!-- Enlazando archivo de estilos para el feed -->
    <link rel="stylesheet" href="/DeltaTrain/styles/feed.css">
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
    <link rel="stylesheet" href="/DeltaTrain/styles/load.css">
</head>
<body>



    <?php
        echo $alertas;
        echo "<script src='/DeltaTrain/scripts/alert.js'></script>";
        echo "<script src='/DeltaTrain/scripts/load-pfp.js'></script>";
        echo "<script src='/DeltaTrain/scripts/colorchange.js'></script>";
        echo "<script src='/DeltaTrain/scripts/load.js'></script>";
        

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



        <div class="normal-content">



            <?php
                $query="SELECT * FROM Post WHERE ID_Post = ".$_GET['postID']." ORDER BY Date_Post DESC";
                $result0 = mysqli_query($conexion, $query);
                if(mysqli_num_rows($result0) == 0){
                    $_SESSION["ErrorHeader"] = "ERROR 404";
                    $_SESSION["ErrorText"] = "La página que trató de acceder no existe.";
                    echo "<script> window.location='/DeltaTrain/home'</script>";
                }
                $aux="";
                $aux1="";
                $aux2="";
                while($row0=mysqli_fetch_assoc($result0)){
                    if(isset($row0["FKID_Post_Post"])){ #Significa que es un comentario
                        $query="SELECT * FROM Post WHERE ID_Post = ".$row0["FKID_Post_Post"]." ORDER BY Date_Post DESC";
                        $result2 = mysqli_query($conexion, $query); ?>

                        <div id="posts-container" class="posts-container">
                            <?php
                            $result = mysqli_query($conexion, $query);
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <div class="posts father">
                                <?php
                                $query2 = "SELECT * FROM User WHERE ID_User = ".$row["FKID_User_Post"];
                                $result2 = mysqli_query($conexion, $query2);
                                while($row2=mysqli_fetch_assoc($result2)){
                                    ?>
                                        <div class="post-list">
                                            <a  href="/DeltaTrain/post/<?php echo $row["ID_Post"] ?>">
                                                <div class="post-list-img-container">
                                                    <img src="/DeltaTrain/imgs/Default-PFP.jpg" id="follow-list-img-<?php echo $row2["Username_User"].$row["ID_Post"] ?>">
                                                    <?php if(!is_null($row2["Pfp_User"])){
                                                        ?><script>loadpfp('data:image/jpeg;base64,<?php echo base64_encode($row2["Pfp_User"]); ?>', "follow-list-img-<?php echo $row2["Username_User"].$row["ID_Post"] ?>");</script><?php
                                                    } #carga el pfp del usuario?>
                                                </div>
                                                <div class="post-list-data">
                                                    <h3><?php echo $row2["Name_User"]." ".$row2["LastName_User"]?></h3>
                                                    <p>@<?php echo $row2["Username_User"] ?></p>
                                                    <?php $rdate=date("j/F/y  g:i A", strtotime($row["Date_Post"]));?>
                                                    <p class="date"><small> <?php echo $rdate ?> </small></p>
                                                </div>
                                                </a>
                                            <br>
                                            <p class="post-text"><?php echo nl2br($row["Info_Post"]) ?></p>
                                            <?php #Esta parte checa si hay elemento para añadir
                                                if(isset($row["Media_Post"])){
                                                    ?>
                                                    <div id="media-container-ex" class="media-container"><?php
                                                    if($row["MediaType_Post"] == 0){
                                                        ?>
                                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row["Media_Post"]); ?>"> 
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <video src="data:video/mp4;base64,<?php echo base64_encode($row["Media_Post"]); ?>" type='video/mp4' controls=""> 
                                                        <?php
                                                    }
                                                    ?></div><?php
                                                }
                                            ?>
                                            <?php #Esta parte checa si hay link para añadir
                                                if(isset($row["FKID_UserActivity_Post"])){
                                                    $query3 = "SELECT * FROM UserActivity WHERE ID_UserActivity = ".$row['FKID_UserActivity_Post'];
                                                    $result3 = mysqli_query($conexion, $query3);
                                                    $name="";
                                                    $dir="";
                                                    while($row3=mysqli_fetch_assoc($result3)){
                                                        $sID="";
                                                        if($row3["Type_UserActivity"] == 1){ #rutinas
                                                            $query4 = "SELECT * FROM Routine WHERE ID_Routine = ".$row3['FKID_Routine_UserActivity'];
                                                            $sID = "Name_Routine";
                                                            $dir="routines/".$row3['FKID_Routine_UserActivity'];
                                                        }else{
                                                            $query4 = "SELECT * FROM Recipe WHERE ID_Recipe = ".$row3['FKID_Recipe_UserActivity'];
                                                            $sID = "Name_Recipe";
                                                            $dir="recipes/".$row3['FKID_Recipe_UserActivity'];
                                                        }
                                                        $result4 = mysqli_query($conexion, $query4);
                                                        while($row4=mysqli_fetch_assoc($result4)){
                                                            $name =  $row4[$sID];
                                                        }
                                                    }
                                                    ?>
                                                    <a class="link" href="/DeltaTrain/<?php echo $dir ?>"><?php echo $name ?></a>
                                                    <?php
                                                }
                                                ?>
                                                <?php #Esta madre permite hacer los likes y demás
                                                $quantityLikes=0;
                                                $query3 = "SELECT * FROM LikedPost WHERE FKID_Post_LikedPost = ".$row["ID_Post"];
                                                $result3 = mysqli_query($conexion, $query3);
                                                $quantityLikes = mysqli_num_rows($result3);
                                                if(isset($_SESSION["CurrentUserIDSession"])){
                                                    $typeLike="likePost";
                                                    $typeText="";
                                                    $query3 = "SELECT * FROM LikedPost WHERE FKID_Post_LikedPost = ".$row["ID_Post"]." AND FKID_User_LikedPost =".$_SESSION["CurrentUserIDSession"];
                                                    $result3 = mysqli_query($conexion, $query3);
                                                    if(mysqli_num_rows($result3)==0){
                                                        $typeLike="likePost";
                                                        $typeText="favorite";
                                                    }else{
                                                        $typeLike="unlikePost";
                                                        $typeText="heart_broken";
                                                    }
                                                    ?>
                                                    <div class="post-interact-buttons">
                                                        <button id="like-<?php echo $row['ID_Post'] ?>" onclick="<?php echo $typeLike ?>(<?php echo $CurrentUserID ?>, <?php echo $row['ID_Post'] ?>)"><span id="heartFill" class="material-symbols-outlined"><?php echo $typeText ?></span></button>
                                                        <a class="like-link" href="/DeltaTrain/likes/<?php echo $row["ID_Post"]?>"><span id="like-cuantity-<?php echo $row['ID_Post'] ?>"><?php echo $quantityLikes ?></span> likes</a>
                                                        <button onclick="makeComment( <?php echo $row['ID_Post'] ?> )"><span class="material-symbols-outlined">comment</span></a>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="post-interact-buttons">
                                                        <a class="like-link" href="/DeltaTrain/likes/<?php echo $row["ID_Post"]?>"><span id="like-cuantity-<?php echo $row['ID_Post'] ?>"><?php echo $quantityLikes ?></span> likes</a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                        </div>
                                    <?php
                                }
                                ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <?php
                    }
                }
            ?>



            <div id="posts-container-main" class="posts-container">
                <?php
                $query="SELECT * FROM Post WHERE ID_Post = ".$_GET['postID']." ORDER BY Date_Post DESC";
                $result = mysqli_query($conexion, $query);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <div class="posts">
                    <?php
                    $query2 = "SELECT * FROM User WHERE ID_User = ".$row["FKID_User_Post"];
                    $result2 = mysqli_query($conexion, $query2);
                    while($row2=mysqli_fetch_assoc($result2)){
                        ?>
                            <div class="post-list">
                                <a  href="/DeltaTrain/<?php echo $row2["Username_User"] ?>">
                                    <div class="post-list-img-container">
                                        <img src="/DeltaTrain/imgs/Default-PFP.jpg" id="follow-list-img-<?php echo $row2["Username_User"].$row["ID_Post"] ?>">
                                        <?php if(!is_null($row2["Pfp_User"])){
                                            ?><script>loadpfp('data:image/jpeg;base64,<?php echo base64_encode($row2["Pfp_User"]); ?>', "follow-list-img-<?php echo $row2["Username_User"].$row["ID_Post"] ?>");</script><?php
                                        } #carga el pfp del usuario?>
                                    </div>
                                    <div class="post-list-data">
                                        <h3><?php echo $row2["Name_User"]." ".$row2["LastName_User"]?></h3>
                                        <p>@<?php echo $row2["Username_User"] ?></p>
                                        <?php $rdate=date("j/F/y  g:i A", strtotime($row["Date_Post"]));?>
                                        <p class="date"><small> <?php echo $rdate ?> </small></p>
                                    </div>
                                    </a>
                                <br>
                                <p class="post-text"><?php echo nl2br($row["Info_Post"]) ?></p>
                                <?php #Esta parte checa si hay elemento para añadir
                                    if(isset($row["Media_Post"])){
                                        ?>
                                        <div id="media-container-ex" class="media-container"><?php
                                        if($row["MediaType_Post"] == 0){
                                            ?>
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row["Media_Post"]); ?>"> 
                                            <?php
                                        }else{
                                            ?>
                                                <video src="data:video/mp4;base64,<?php echo base64_encode($row["Media_Post"]); ?>" type='video/mp4' controls=""> 
                                            <?php
                                        }
                                        ?></div><?php
                                    }
                                ?>
                                <?php #Esta parte checa si hay link para añadir
                                    if(isset($row["FKID_UserActivity_Post"])){
                                        $query3 = "SELECT * FROM UserActivity WHERE ID_UserActivity = ".$row['FKID_UserActivity_Post'];
                                        $result3 = mysqli_query($conexion, $query3);
                                        $name="";
                                        $dir="";
                                        while($row3=mysqli_fetch_assoc($result3)){
                                            $sID="";
                                            if($row3["Type_UserActivity"] == 1){ #rutinas
                                                $query4 = "SELECT * FROM Routine WHERE ID_Routine = ".$row3['FKID_Routine_UserActivity'];
                                                $sID = "Name_Routine";
                                                $dir="routines/".$row3['FKID_Routine_UserActivity'];
                                            }else{
                                                $query4 = "SELECT * FROM Recipe WHERE ID_Recipe = ".$row3['FKID_Recipe_UserActivity'];
                                                $sID = "Name_Recipe";
                                                $dir="recipes/".$row3['FKID_Recipe_UserActivity'];
                                            }
                                            $result4 = mysqli_query($conexion, $query4);
                                            while($row4=mysqli_fetch_assoc($result4)){
                                                $name =  $row4[$sID];
                                            }
                                        }
                                        ?>
                                        <a class="link" href="/DeltaTrain/<?php echo $dir ?>"><?php echo $name ?></a>
                                        <?php
                                    }
                                    ?>
                                    <?php #Esta madre permite hacer los likes y demás
                                    $quantityLikes=0;
                                    $query3 = "SELECT * FROM LikedPost WHERE FKID_Post_LikedPost = ".$row["ID_Post"];
                                    $result3 = mysqli_query($conexion, $query3);
                                    $quantityLikes = mysqli_num_rows($result3);
                                    if(isset($_SESSION["CurrentUserIDSession"])){
                                        $typeLike="likePost";
                                        $typeText="";
                                        $query3 = "SELECT * FROM LikedPost WHERE FKID_Post_LikedPost = ".$row["ID_Post"]." AND FKID_User_LikedPost =".$_SESSION["CurrentUserIDSession"];
                                        $result3 = mysqli_query($conexion, $query3);
                                        if(mysqli_num_rows($result3)==0){
                                            $typeLike="likePost";
                                            $typeText="favorite";
                                        }else{
                                            $typeLike="unlikePost";
                                            $typeText="heart_broken";
                                        }
                                        ?>
                                        <div class="post-interact-buttons">
                                            <button id="like-<?php echo $row['ID_Post'] ?>" onclick="<?php echo $typeLike ?>(<?php echo $CurrentUserID ?>, <?php echo $row['ID_Post'] ?>)"><span id="heartFill" class="material-symbols-outlined"><?php echo $typeText ?></span></button>
                                            <a class="like-link" href="/DeltaTrain/likes/<?php echo $row["ID_Post"]?>"><span id="like-cuantity-<?php echo $row['ID_Post'] ?>"><?php echo $quantityLikes ?></span> likes</a>
                                            <button onclick="makeComment( <?php echo $row['ID_Post'] ?> )"><span class="material-symbols-outlined">comment</span></a>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="post-interact-buttons">
                                            <a class="like-link" href="/DeltaTrain/likes/<?php echo $row["ID_Post"]?>"><span id="like-cuantity-<?php echo $row['ID_Post'] ?>"><?php echo $quantityLikes ?></span> likes</a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                            </div>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
                }
                ?>
            </div>


            <?php
            if(isset($_SESSION["CurrentUserIDSession"])){ #Entonces significa que SI se puede hacer un post
                ?>
                    <div class="create-post-container" id="text-area-editor" style="display: none;">
                        <br>
                        <form action="/DeltaTrain/postcreator.php" method="post" enctype="multipart/form-data">
                            <textarea class="post-content" name="postData" placeholder="¿En qué estas pensando?" required></textarea>
                            <div id="media-container" class="media-container">
                                <!-- Aquí iría la imagen después de que se suba -->
                            </div>
                            <div id="link-container" class="link-container">
                                <input type="hidden" name="link">
                            </div>
                            <h2 id="linked-object" class="linked-object"></h2>
                            <h2 id="commented-post" class="linked-object"></h2>
                            <div class="post-buttons">
                                <button type="button" onclick="openRecipes()">Recetas</button>
                                <button type="button" onclick="openRoutines()">Rutinas</button>
                                <button type="button" onclick="clickInput()">Media</button>
                                <button type="submit">Enviar</button>
                            </div>
                            <input id="pictureData" type="file" name="picture" style="display:none;">
                            
                            <input id="commentedPost" type="hidden"  name="commentedPost">
                            
                            <input id="linkedObject" type="hidden"  name="linkedObject">
                        </form>
                        <div class="user-objects">

                            <div id="userRoutines" class="user-object">
                                <h2>Rutinas</h2>
                                <?php
                                $query="SELECT Name_Routine, ID_Routine FROM Routine WHERE FKID_User_Routine =".$_SESSION["CurrentUserIDSession"];
                                $result = mysqli_query($conexion, $query);
                                while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <button onclick="addObject('routines/<?php echo $row['ID_Routine'] ?>', '<?php echo $row['Name_Routine'] ?>')">
                                        <?php echo $row["Name_Routine"] ?>
                                    </button>
                                    <?php
                                }
                                ?>
                            </div>

                            <div id="userRecipes" class="user-object">
                                <h2>Recetas</h2>
                                <?php
                                $query="SELECT Name_Recipe, ID_Recipe FROM Recipe WHERE FKID_User_Recipe =".$_SESSION["CurrentUserIDSession"];
                                $result = mysqli_query($conexion, $query);
                                while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <button onclick="addObject('recipes/<?php echo $row['ID_Recipe'] ?>', '<?php echo $row['Name_Recipe'] ?>')">
                                        <?php echo $row["Name_Recipe"] ?>
                                    </button>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>

                    </div>
                <?php
            }
            ?>


            <div id="posts-container" class="posts-container">
                <?php
                $query="SELECT * FROM Post WHERE FKID_Post_Post = ".$_GET["postID"]." ORDER BY Date_Post DESC";
                $result = mysqli_query($conexion, $query);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <div class="posts">
                    <?php
                    $query2 = "SELECT * FROM User WHERE ID_User = ".$row["FKID_User_Post"];
                    $result2 = mysqli_query($conexion, $query2);
                    while($row2=mysqli_fetch_assoc($result2)){
                        ?>
                            <div class="post-list">
                                <a  href="/DeltaTrain/post/<?php echo $row["ID_Post"] ?>">
                                    <div class="post-list-img-container">
                                        <img src="/DeltaTrain/imgs/Default-PFP.jpg" id="follow-list-img-<?php echo $row2["Username_User"].$row["ID_Post"] ?>">
                                        <?php if(!is_null($row2["Pfp_User"])){
                                            ?><script>loadpfp('data:image/jpeg;base64,<?php echo base64_encode($row2["Pfp_User"]); ?>', "follow-list-img-<?php echo $row2["Username_User"].$row["ID_Post"] ?>");</script><?php
                                        } #carga el pfp del usuario?>
                                    </div>
                                    <div class="post-list-data">
                                        <h3><?php echo $row2["Name_User"]." ".$row2["LastName_User"]?></h3>
                                        <p>@<?php echo $row2["Username_User"] ?></p>
                                        <?php $rdate=date("j/F/y  g:i A", strtotime($row["Date_Post"]));?>
                                        <p class="date"><small> <?php echo $rdate ?> </small></p>
                                    </div>
                                    </a>
                                <br>
                                <p class="post-text"><?php echo nl2br($row["Info_Post"]) ?></p>
                                <?php #Esta parte checa si hay elemento para añadir
                                    if(isset($row["Media_Post"])){
                                        ?>
                                        <div id="media-container-ex" class="media-container"><?php
                                        if($row["MediaType_Post"] == 0){
                                            ?>
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row["Media_Post"]); ?>"> 
                                            <?php
                                        }else{
                                            ?>
                                                <video src="data:video/mp4;base64,<?php echo base64_encode($row["Media_Post"]); ?>" type='video/mp4' controls=""> 
                                            <?php
                                        }
                                        ?></div><?php
                                    }
                                ?>
                                <?php #Esta parte checa si hay link para añadir
                                    if(isset($row["FKID_UserActivity_Post"])){
                                        $query3 = "SELECT * FROM UserActivity WHERE ID_UserActivity = ".$row['FKID_UserActivity_Post'];
                                        $result3 = mysqli_query($conexion, $query3);
                                        $name="";
                                        $dir="";
                                        while($row3=mysqli_fetch_assoc($result3)){
                                            $sID="";
                                            if($row3["Type_UserActivity"] == 1){ #rutinas
                                                $query4 = "SELECT * FROM Routine WHERE ID_Routine = ".$row3['FKID_Routine_UserActivity'];
                                                $sID = "Name_Routine";
                                                $dir="routines/".$row3['FKID_Routine_UserActivity'];
                                            }else{
                                                $query4 = "SELECT * FROM Recipe WHERE ID_Recipe = ".$row3['FKID_Recipe_UserActivity'];
                                                $sID = "Name_Recipe";
                                                $dir="recipes/".$row3['FKID_Recipe_UserActivity'];
                                            }
                                            $result4 = mysqli_query($conexion, $query4);
                                            while($row4=mysqli_fetch_assoc($result4)){
                                                $name =  $row4[$sID];
                                            }
                                        }
                                        ?>
                                        <a class="link" href="/DeltaTrain/<?php echo $dir ?>"><?php echo $name ?></a>
                                        <?php
                                    }
                                    ?>
                                    <?php #Esta madre permite hacer los likes y demás
                                    $quantityLikes=0;
                                    $query3 = "SELECT * FROM LikedPost WHERE FKID_Post_LikedPost = ".$row["ID_Post"];
                                    $result3 = mysqli_query($conexion, $query3);
                                    $quantityLikes = mysqli_num_rows($result3);
                                    if(isset($_SESSION["CurrentUserIDSession"])){
                                        $typeLike="likePost";
                                        $typeText="";
                                        $query3 = "SELECT * FROM LikedPost WHERE FKID_Post_LikedPost = ".$row["ID_Post"]." AND FKID_User_LikedPost =".$_SESSION["CurrentUserIDSession"];
                                        $result3 = mysqli_query($conexion, $query3);
                                        if(mysqli_num_rows($result3)==0){
                                            $typeLike="likePost";
                                            $typeText="favorite";
                                        }else{
                                            $typeLike="unlikePost";
                                            $typeText="heart_broken";
                                        }
                                        ?>
                                        <div class="post-interact-buttons">
                                            <button id="like-<?php echo $row['ID_Post'] ?>" onclick="<?php echo $typeLike ?>(<?php echo $CurrentUserID ?>, <?php echo $row['ID_Post'] ?>)"><span id="heartFill" class="material-symbols-outlined"><?php echo $typeText ?></span></button>
                                            <a class="like-link" href="/DeltaTrain/likes/<?php echo $row["ID_Post"]?>"><span id="like-cuantity-<?php echo $row['ID_Post'] ?>"><?php echo $quantityLikes ?></span> likes</a>
                                            <button onclick="makeComment( <?php echo $row['ID_Post'] ?> )"><span class="material-symbols-outlined">comment</span></a>
                                            
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="post-interact-buttons">
                                            <a class="like-link" href="/DeltaTrain/likes/<?php echo $row["ID_Post"]?>"><span id="like-cuantity-<?php echo $row['ID_Post'] ?>"><?php echo $quantityLikes ?></span> likes</a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                            </div>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
                }
                ?>
            </div>



        </div>
    </div>
<script src="/DeltaTrain/scripts/sidebar.js"></script>
<script src="/DeltaTrain/scripts/script-form.js"></script>
<script src='/DeltaTrain/scripts/image.js'></script>
<script src='/DeltaTrain/scripts/feed.js'></script>
</body>
</html>