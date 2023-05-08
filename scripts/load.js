setTimeout(function(){
    let loaderWindow = document.getElementsByClassName("loader-1")[0];
    console.log(loaderWindow+"parte3");
    loaderWindow.classList.add("loader-2");
    loaderWindow.style = "display: none;"

}, 5000); // espera 5000 milisegundos (5 segundos) y luego llama a miFuncion


// Esperar a que se cargue la página completamente
window.addEventListener('load', function() {
    let loaderWindow = document.getElementsByClassName("loader-1")[0];
    console.log(loaderWindow+"parte1");
    loaderWindow.classList.add("loader-2");
  });
  
  // Verificar si pasaron 5 segundos y la página aún no cargó completamente
  setTimeout(function() {
    let loaderWindow = document.getElementsByClassName("loader-1")[0];
    loaderWindow.style = "display: none;"
    if (document.readyState != 'complete') {
        console.log(loaderWindow+"parte2");
        loaderWindow.classList.add("loader-2");
    }
  }, 2000);
  