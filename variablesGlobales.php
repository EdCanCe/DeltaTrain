<?php
$navConCuenta = '
<!-- Barra lateral -->
<div class="sidebar">



        <div class="top">



            <!-- Logo y nombre de la empresa -->
            <div class="logoDT">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"   viewBox="0 0 1500 1500" style="enable-background:new 0 0 1500 1500;" xml:space="preserve"> <g id="Capa_3" class="st0"> </g> <g id="Capa_1_1_">  <g transform="translate(0.000000,1500.000000) scale(0.100000,-0.100000)">   <path class="st1" d="M11307,8594c-23-23-789-738-1701-1589L7947,5456L5798,4335L3649,3213l-405-482c-223-266-404-484-402-486    c2-1,201,126,443,283l440,285l909,388c500,214,911,388,912,386c1-1-666-470-1481-1042c-816-572-1482-1041-1481-1042    c1-2,2172,1112,4824,2474c2652,1363,4820,2479,4818,2480c-2,2-533-109-1182-246c-648-137-1180-248-1182-246c-2,1,556,413,1240,915    s1246,915,1250,919c3,3-29,750-73,1658l-1958,2616.1l-854.5-1602.2"/>   <path class="st1" d="M7660,10819L5004,9429l-667-1335c-367-734-665-1334-662-1334s456,435,1007,966c552,531,1008,968,1015,971    c6,2,96-41,200-96c167-88,188-102,186-123c-8-67-748-3545-757-3555c-6-6-933-618-2061-1358c-1127-741-2054-1352-2060-1357    c-5-6,15,3,45,20s1475,794,3210,1727s3160,1702,3166,1708c6,7,289,1223,628,2702c339,1480,622,2695,629,2701s329,262,717,569    c708,560,728,575,720,574C10317,12209,9120,11583,7660,10819z M8108,10667c-102-85-1516-1413-1510-1418c4-4,67-33,140-65    c78-34,232-63,232-72c0-22-820-4025-829-4047c-6-14-310-129-712-344c-332-179-629-338-659-354c-97-53-40-12,160,113    c392,247,579,371,584,388c17,59,766,3668,764,3680c-2,9-140,86-307,173l-305,158l-45-41c-26-22-307-298-625-612l-580-571l51,95    c29,52,209,383,401,735l350,640l1448,781c797,430,1454,782,1459,783C8131,10689,8123,10680,8108,10667z"/>  </g>  <polygon class="st2" points="923.6,514.9 858,796.9 1044.8,638.5  "/> </g> <g id="Capa_4" class="st0"> </g> <g id="Capa_5" class="st0"> </g> <g id="Capa_6" class="st0"> </g> </svg>
                <span>DeltaTrain</span>
            </div>
            <!-- Botón para abrir/cerrar la barra lateral -->
            <span class="material-symbols-outlined icon" id="btn-sidebar">keyboard_double_arrow_right</span>
        
        
        
        </div>



        <!-- Información del usuario -->
        <div class="user">
            <div>
                <a id="RealUserProfile" href="">
                    <img id="RealUserIcon" style="background-color: black; width: 50px;" alt="" class="img-extended-exeption">
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
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                    <span class="nav-item">Rutinas</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">local_dining</span>
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
            <div class="logoDT">
                <img src="/DeltaTrain/imgs/logoDT.svg" alt="">
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
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                    <span class="nav-item">Rutinas</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">local_dining</span>
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



            <li>
                <a href="/DeltaTrain/print.php">
                    <span class="material-symbols-rounded icon">database</span>
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
            <div class="logoDT">
                <img src="/DeltaTrain/imgs/logoDT.svg" alt="">
                <span>DeltaTrain</span>
            </div>
            <!-- Botón para abrir/cerrar la barra lateral -->
            <span class="material-symbols-outlined icon" id="btn-sidebar">keyboard_double_arrow_right</span>
        
        
        
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
            $query2 = "SELECT * FROM NONUSABLE WHERE Word_NONUSABLE='$word'";
            $result2 = mysqli_query($conexion, $query2);
            if(mysqli_num_rows($result2)!=0){ # significa que está usando un nombre no permitido
                $GLOBALS["errorForm"] = "reserved";
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

function brToSpace($word){
    $newData = explode('<br>', $word);
    $dataPass="";
    for($i=0;$i<count($newData);$i++){
        $dataPass=$dataPass.$newData[$i]." ";
    }
    return $dataPass;
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
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">local_dining</span>
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
                <a href="/DeltaTrain/routines">
                    <span class="material-symbols-outlined icon">fact_check</span>
                </a>
            </li>



            <li>
                <div>
                <a href="/DeltaTrain/recipes">
                    <span class="material-symbols-outlined icon">local_dining</span>
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

$navSinCuentaAbajo = '
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