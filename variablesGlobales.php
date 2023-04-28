<?php
$navConCuenta = '
<!-- Barra lateral -->
<div class="sidebar">



        <div class="top">



            <!-- Logo y nombre de la empresa -->
            <div class="logo">
                <img src="/DeltaTrain/imgs/logo.svg" alt="deltatrain">
                <span>DeltaTrain</span>
            </div>
            <!-- Botón para abrir/cerrar la barra lateral -->
            <span class="material-symbols-outlined icon" id="btn-sidebar">keyboard_double_arrow_right</span>
        
        
        
        </div>



        <!-- Información del usuario -->
        <div class="user">
            <div>
                <a id="RealUserProfile" href="">
                    <img id="RealUserIcon" style="background-color: black; width: 50px;" alt="">
                </a>
            </div>
            <div class="user-data">
                <p id="RealUserName" class="username">Usuario</p>
                <p id="RealUserType" class="user-range"></p>
            </div>
        </div>



        <!-- Lista de enlaces de navegación -->
        <ul>



            <li>
                <a href="/DeltaTrain/home">
                    <span class="material-symbols-outlined icon">home</span>
                    <span class="nav-item">Home</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/daily">
                    <span class="material-symbols-outlined icon">calendar_month</span>
                    <span class="nav-item">Actividades</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                    <span class="nav-item">Rutinas</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">cookie</span>
                    <span class="nav-item">Recetas</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/support">
                    <span class="material-symbols-rounded icon">contact_support</span>
                    <span class="nav-item">Contacto</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/settings">
                    <span class="material-symbols-rounded icon">settings</span>
                    <span class="nav-item">Ajustes</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/logout">
                    <span class="material-symbols-rounded icon">tab_close</span>
                    <span class="nav-item">Cerrar Sesión</span>
                </a>
            </li>



        </ul>
        


</div>';

$navConAdmin = '
<!-- Barra lateral -->
<div class="sidebar">



        <div class="top">



            <!-- Logo y nombre de la empresa -->
            <div class="logo">
                <img src="/DeltaTrain/imgs/logo.svg" alt="">
                <span>DeltaTrain</span>
            </div>
            <!-- Botón para abrir/cerrar la barra lateral -->
            <span class="material-symbols-outlined icon" id="btn-sidebar">keyboard_double_arrow_right</span>
        
        
        
        </div>



        <!-- Información del usuario -->
        <div class="user">
            <div>
                <a id="RealUserProfile" href="">
                    <img id="RealUserIcon" style="background-color: black; width: 50px;" alt="">
                </a>
            </div>
            <div class="user-data">
                <p id="RealUserName" class="username">Usuario</p>
                <p id="RealUserType" class="user-range"></p>
            </div>
        </div>



        <!-- Lista de enlaces de navegación -->
        <ul>



            <li>
                <a href="/DeltaTrain/home">
                    <span class="material-symbols-outlined icon">home</span>
                    <span class="nav-item">Home</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/daily">
                    <span class="material-symbols-outlined icon">calendar_month</span>
                    <span class="nav-item">Actividades</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                    <span class="nav-item">Rutinas</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">cookie</span>
                    <span class="nav-item">Recetas</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/suppport">
                    <span class="material-symbols-rounded icon">contact_support</span>
                    <span class="nav-item">Contacto</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/settings">
                    <span class="material-symbols-rounded icon">settings</span>
                    <span class="nav-item">Ajustes</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/logout">
                    <span class="material-symbols-rounded icon">tab_close</span>
                    <span class="nav-item">Cerrar Sesión</span>
                </a>
            </li>



        </ul>
        


</div>';

$navSinCuenta = '
<!-- Barra lateral -->
<div class="sidebar">



        <div class="top">



            <!-- Logo y nombre de la empresa -->
            <div class="logo">
                <img src="/DeltaTrain/imgs/logo.svg" alt="">
                <span>DeltaTrain</span>
            </div>
            <!-- Botón para abrir/cerrar la barra lateral -->
            <span class="material-symbols-outlined icon" id="btn-sidebar">keyboard_double_arrow_right</span>
        
        
        
        </div>
        


        <!-- Lista de enlaces de navegación -->
        <ul>



            <li>
                <a href="/DeltaTrain/support">
                    <span class="material-symbols-rounded icon">contact_support</span>
                    <span class="nav-item">Contacto</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/">
                    <span class="material-symbols-rounded icon">tab_move</span>
                    <span class="nav-item">Iniciar Sesión</span>
                </a>
            </li>



        </ul>
        


</div>';

$alertas='
<div class="alerts" id="alerts">
    <div class="alert-body">
        <h1 id="AlertHeader">Título</h1>
        <div class="f-modal-alert">
            <div class="f-modal-icon f-modal-error animate">
                <span class="f-modal-x-mark">
                    <span class="f-modal-line f-modal-left animateXLeft"></span>
                    <span class="f-modal-line f-modal-right animateXRight"></span>
                </span>
                <div class="f-modal-placeholder"></div>
                <div class="f-modal-fix"></div>
            </div>
        </div>
        <p id="AlertBody">Este mensaje significa que no se pudo iniciar sesión</p>
        <div>
            <button onclick="dissapearAlert()">Cerrar</button>
        </div>
    </div>
</div>
';



function makeAlert($header, $body){
    echo "<script>appearAlert('".$header."', '".$body."')</script>";
}

function validateChar($word, $index){
    $noEmojisWord = mb_ereg_replace('[[:^print:]]', '', $word);
    if ((strlen($noEmojisWord) == strlen($word)) and (((preg_match('/^[a-zA-Z0-9ñÑ\-_\(\)\$\%\&]+$/', $word))) or ($index=="email" and (preg_match('/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9\-_\(\)\$\%\&@\.]+$/', $word))) or (($index!="username" and $index!="email") and (preg_match('/^[a-zA-Z0-9áéíóúüñÑÁÉÍÓÚÜ\s\-_\(\)\$\%\&]+$/', $word))))) {
        if($index=="username"){
            session_start();
            include("conexion.php");
            $query2 = "SELECT * FROM NONUSABLE where Word_NONUSABLE='$word'";
            $result2 = mysqli_query($conexion, $query2);
            if(mysqli_num_rows($result2)!=0){ # significa que está usando un nombre no permitido
                $_SESSION["ErrorHeader"] = "NO SE PUDO HACER EL PROCESO";
                $_SESSION["ErrorText"] = "Ya existe una cuenta con el mismo nombre de usuario";
                $GLOBALS["errorForm"] = "a";
                echo "<script>history.back()</script>";
            }
        }
        $GLOBALS["setForm"] = $GLOBALS["setForm"].$index."|".$word."|";
        #El string cumple con los criterios
    } else {
        $GLOBALS["errorForm"] = "a";
    }
    
}

function loadFormData($previousData){
    $newData = explode('|', $previousData);
    for($i=0;$i<count($newData)-1;$i+=2){
        echo '<script> document.getElementById("'.$newData[$i].'").value="'.$newData[$i+1].'" </script>';
    }
    $GLOBALS["setForm"] = "";
}

$navConCuentaAbajo = '
<!-- Barra lateral -->
<div class="sidebar-lower">



        <!-- Lista de enlaces de navegación -->
        <ul>



            <li>
                <a href="/DeltaTrain/home">
                    <span class="material-symbols-outlined icon">home</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/daily">
                    <span class="material-symbols-outlined icon">calendar_month</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">cookie</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/support">
                    <span class="material-symbols-rounded icon">contact_support</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/settings">
                    <span class="material-symbols-rounded icon">settings</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/logout">
                    <span class="material-symbols-rounded icon">tab_close</span>
                </a>
            </li>



        </ul>
        


</div>';

$navConAdminAbajo = '
<!-- Barra lateral -->
<div class="sidebar-lower">



        <!-- Lista de enlaces de navegación -->
        <ul>



            <li>
                <a href="/DeltaTrain/home">
                    <span class="material-symbols-outlined icon">home</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/daily">
                    <span class="material-symbols-outlined icon">calendar_month</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">cookie</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/suppport">
                    <span class="material-symbols-rounded icon">contact_support</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/settings">
                    <span class="material-symbols-rounded icon">settings</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/logout">
                    <span class="material-symbols-rounded icon">tab_close</span>
                </a>
            </li>



        </ul>
        


</div>';

$navSinCuentaAbajo = '
<!-- Barra lateral -->
<div class="sidebar-lower">
        


        <!-- Lista de enlaces de navegación -->
        <ul>



            <li>
                <a href="/DeltaTrain/support">
                    <span class="material-symbols-rounded icon">contact_support</span>
                </a>
            </li>



            <li>
                <a href="/DeltaTrain/">
                    <span class="material-symbols-rounded icon">tab_move</span>
                </a>
            </li>



        </ul>
        


</div>';