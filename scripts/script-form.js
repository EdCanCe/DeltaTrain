let inputContainer = document.querySelectorAll('.input-container.image');

for(let i=0; i<inputContainer.length; i++){
      let input = inputContainer[i].querySelector('input[type=file]');
      let viewImageContainer = inputContainer[i].querySelector('.vew-image-container');
      let text=inputContainer[i].querySelector('.text-input-image');

      inputContainer[i].addEventListener('dragover', (event)=>{
        event.preventDefault();
        text.innerHTML='<span>Subir Imagen</span><span class="material-symbols-outlined icon">download_for_offline</span>';
        inputContainer[i].classList.add('dragover');
      });

      inputContainer[i].addEventListener('dragleave', (event)=>{
        event.preventDefault();
        text.innerHTML="<span>Agregar Foto de perfil</span><span class='material-symbols-outlined icon'>add_photo_alternate</span>";
        inputContainer[i].classList.remove('dragover');
      });


      // Agregar evento de escucha de drop en el div "input-container image"
      inputContainer[i].addEventListener('drop', (e) => {
        e.preventDefault();
        const file = e.dataTransfer.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = () => {
            viewImageContainer.querySelector('img').setAttribute('src', reader.result);
          };
          reader.readAsDataURL(file);
          viewImageContainer.classList.add('active');
          input.files = e.dataTransfer.files;
        } else {
          viewImageContainer.querySelector('img').setAttribute('src', '');
          viewImageContainer.classList.remove('active');
          input.files = null;
        }
        inputContainer[i].classList.remove('dragover');
      });

      // Agregar evento de escucha de clic en el div "input-container image"
      inputContainer[i].addEventListener('click', () => {
        input.click();
      });

      // Agregar evento de escucha de cambio en el input
      input.addEventListener('change', () => {
        const file = input.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = () => {
            viewImageContainer.querySelector('img').setAttribute('src', reader.result);
          };
          reader.readAsDataURL(file);
          viewImageContainer.classList.add('active');
          text.innerHTML='<span>Subir Imagen</span><span class="material-symbols-outlined icon">download_for_offline</span>';
        } else {
          viewImageContainer.querySelector('img').setAttribute('src', '');
          viewImageContainer.classList.remove('active');
        }
      });
}


 
 /*
  // Selecciona el formulario y agrega un manejador de eventos al evento 'submit'
  const form = document.querySelector('.form');
  form.addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

  // Crea un objeto FormData con los datos del formulario
  const formData = new FormData(form);

  // Crea un objeto XMLHttpRequest
  const xhr = new XMLHttpRequest();

  // Configura la solicitud XMLHttpRequest
  xhr.open('POST', 'login.php');

  // Agrega un manejador de eventos para el cambio de estado de la solicitud
  xhr.addEventListener('readystatechange', function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Actualiza aquí el contenido de la página con la respuesta del servidor
    }
  });

  // Envía la solicitud con los datos del formulario
  xhr.send(formData);
});
*/

// Función para validar un campo de entrada
const validateInput = (message, e) => {
  let input = e.target;
  let inputLine = input.parentElement.querySelector(".input-line");
  let inputPlaceholder = input.parentElement.querySelector(".placeholder-input");

  // Verifica que el campo tenga contenido, si no tiene agrega la clase 'error-input' a los elementos correspondientes del campo
  if(input.value.trim() === "") {
    input.classList.add("error-input");
    input.parentElement.lastElementChild.classList.add("error-input");
    input.parentElement.lastElementChild.innerText = message;
    inputLine.classList.add("error-input");
    inputPlaceholder.classList.add("error-input");
  }
  else {
    input.classList.remove("error-input");
    input.parentElement.lastElementChild.classList.remove("error-input");
    input.parentElement.lastElementChild.innerText = "";
    inputLine.classList.remove("error-input");
    inputPlaceholder.classList.remove("error-input");
  }
};

// Selecciona los campos de entrada y agrega manejadores de eventos para el evento 'blur' (cuando el campo pierde el foco)
const inputUser = document.querySelector("#username");
inputUser.addEventListener('blur', (e) => validateInput("Se requiere el Usuario", e));

const inputPasswor = document.querySelector("#password");
inputPasswor.addEventListener('blur', (e) => validateInput("Se requiere la contraseña", e));

const inputName = document.querySelector("#name");
inputName.addEventListener('blur', (e) => validateInput("Se requieren tus nombre(s)", e));

const inputLastName = document.querySelector("#lastnames");
inputLastName.addEventListener('blur', (e) => validateInput("Se requieren tus apellidos(s)", e));

const inputDate = document.querySelector("#birth");
inputDate.addEventListener('blur', (e) => validateInput("Se requiere tu fecha de nacimiento", e));

// Función para validar el formato de correo electrónico de un campo de entrada
const validateInputEmailFormat = e => {
  let input = e.target;
  const regex = new RegExp(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
  let inputLine = input.parentElement.querySelector(".input-line");
  let inputPlaceholder = input.parentElement.querySelector(".placeholder-input");

  if(!regex.test(input.value)) {
    input.classList.add("error-input");
    input.parentElement.lastElementChild.classList.add("error-input");
    input.parentElement.lastElementChild.innerText = "Introduzca un correo valido";
    inputLine.classList.add("error-input");
    inputPlaceholder.classList.add("error-input");
  }else{
    input.classList.remove("error-input");
    input.parentElement.lastElementChild.classList.remove("error-input");
    input.parentElement.lastElementChild.innerText="";
    inputLine.classList.remove("error-input");
    inputPlaceholder.classList.remove("error-input");
  }
}

//Selecciona el campo email y agrega el manejador de evento blur e input llamando a las funciones para validar su contenido
// const inputEmail = document.querySelector("#email");
// inputEmail.addEventListener('blur', validateInputEmailFormat, (e)=>validateInput("Se requiere el correo", e));
// inputEmail.addEventListener('input', validateInputEmailFormat);



const btnSubmit = document.querySelector(".btn-submit");
btnSubmit.addEventListener('click', function(){
  btnSubmit.innerHTML = '<i class="bi bi-send-check-fill"></i>';
});
btnSubmit.addEventListener('mouseover', function(){
  btnSubmit.innerHTML = '<span class="material-symbols-rounded icon">send</span>';
});
btnSubmit.addEventListener('mouseout', function(){
  btnSubmit.innerHTML = 'Enviar';
});




//Aqui lo copie por que si descomento el de colorchage.js no jala

let brightRed = "#c70000";
let darkRed = "#950011b2";

let brightOrange = "#db7900";
let darkOrange = "#955400b2";

let brightYellow = "#eeff00";
let darkYellow = "#969e02b2";

let brightGreen = "#00ff84";
let darkGreen = "#00a857b2";

let brightBlue = "#0018d1";
let darkBlue = "#0011a8b2";

let brightSky = "#00d1ca";
let darkSky = "#00a8a3b2";

let brightPurple = "#7100e3";
let darkPurple = "#5400a8b2";

const r = document.querySelector(':root');

function changeColor(userColor){
    if(userColor==0){
        r.style.setProperty('--color-1', brightRed);
        r.style.setProperty('--color-6', darkRed);
    }else if(userColor==1){
        r.style.setProperty('--color-1', brightOrange);
        r.style.setProperty('--color-6', darkOrange);
    }else if(userColor==2){
        r.style.setProperty('--color-1', brightYellow);
        r.style.setProperty('--color-6', darkYellow);
    }else if(userColor==3){
        r.style.setProperty('--color-1', brightGreen);
        r.style.setProperty('--color-6', darkGreen);
    }else if(userColor==4){
        r.style.setProperty('--color-1', brightBlue);
        r.style.setProperty('--color-6', darkBlue);
    }else if(userColor==5){
        r.style.setProperty('--color-1', brightSky);
        r.style.setProperty('--color-6', darkSky);
    }else if(userColor==6){
        r.style.setProperty('--color-1', brightPurple);
        r.style.setProperty('--color-6', darkPurple);
    }
}



let colorSelectorContainer = document.querySelectorAll('.color-selector');

colorSelectorContainer[0].querySelector('span').style.backgroundColor=brightRed;
colorSelectorContainer[1].querySelector('span').style.backgroundColor=brightOrange;
colorSelectorContainer[2].querySelector('span').style.backgroundColor=brightYellow;
colorSelectorContainer[3].querySelector('span').style.backgroundColor=brightGreen;
colorSelectorContainer[4].querySelector('span').style.backgroundColor=brightBlue;
colorSelectorContainer[5].querySelector('span').style.backgroundColor=brightSky;
colorSelectorContainer[6].querySelector('span').style.backgroundColor=darkPurple;



for (let i = 0; i < colorSelectorContainer.length; i++) {
  let input = colorSelectorContainer[i].querySelector('input');

  colorSelectorContainer[i].addEventListener('click', () => {
    input.click();
  });

  input.addEventListener('change', () => {
    if (input.checked) {
      changeColor(input.value);
      input.parentElement.classList.add('selec');
      console.log(`El input ${input.value} está seleccionado`);
    } else {
      input.parentElement.classList.remove('selec');
      console.log(`El input ${input.value} no está seleccionado`);
    }
  });
}



