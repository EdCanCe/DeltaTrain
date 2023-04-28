function doUnfollow(userA, userB){

    var xhr = new XMLHttpRequest();

    // Definir la función que se ejecutará cuando la respuesta sea recibida
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // Mostrar la respuesta en la consola del navegador
        console.log(this.responseText);
        }
    };

    // Enviar la petición al archivo PHP que inserta los datos
    xhr.open("GET", "unfollow.php?userA=" + userA + "&userB=" + userB, true);
    xhr.send();
    document.getElementById("followbutton").innerHTML="Seguir";
    document.getElementById('followbutton').setAttribute( "onClick", "doFollow("+userA+", "+userB+")");
}

function doFollow(userA, userB){

    var xhr = new XMLHttpRequest();

    // Definir la función que se ejecutará cuando la respuesta sea recibida
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // Mostrar la respuesta en la consola del navegador
        console.log(this.responseText);
        }
    };

    // Enviar la petición al archivo PHP que inserta los datos
    xhr.open("GET", "follow.php?userA=" + userA + "&userB=" + userB, true);
    xhr.send();
    document.getElementById("followbutton").innerHTML="Siguiendo";
    document.getElementById('followbutton').setAttribute( "onClick", "doUnfollow("+userA+", "+userB+")");
}

function turnFollow(){

}