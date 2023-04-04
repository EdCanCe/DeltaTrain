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
const inputEmail = document.querySelector("#email");
inputEmail.addEventListener('blur', validateInputEmailFormat, (e)=>validateInput("Se requiere el correo", e));
inputEmail.addEventListener('input', validateInputEmailFormat);



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

