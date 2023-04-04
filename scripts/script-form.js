/*const form = document.querySelector('.form');
  
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const formData = new FormData(form);
    
    const xhr = new XMLHttpRequest();
    
    xhr.open('POST', 'login.php');
    
    xhr.addEventListener('readystatechange', function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Actualiza aquí el contenido de la página con la respuesta del servidor
      }
    });
    
    xhr.send(formData);
  });
*/

const validateInput = (message,e)=>{
    let input=e.target;
    let inputLine = input.parentElement.querySelector(".input-line");
    let inputPlaceholder = input.parentElement.querySelector(".placeholder-input");
    //vefica que el input tenga contenido, si no tiene agrega la clase error-input a los elemtos respectivos del input
    if(input.value.trim()===""){
        input.classList.add("error-input");
        input.parentElement.lastElementChild.classList.add("error-input");
        input.parentElement.lastElementChild.innerText=message;
        inputLine.classList.add("error-input");
        inputPlaceholder.classList.add("error-input");
    }
    else{
      input.classList.remove("error-input");
      input.parentElement.lastElementChild.classList.remove("error-input");
      input.parentElement.lastElementChild.innerText="";
      inputLine.classList.remove("error-input");
      inputPlaceholder.classList.remove("error-input");
    }
}



const inputUser = document.querySelector("#username");
inputUser.addEventListener('blur', (e)=>validateInput("Se requiere el Usuario", e));

const inputPasswor = document.querySelector("#password");
inputPasswor.addEventListener('blur', (e)=>validateInput("Se requiere la contraseña", e));

const inputName = document.querySelector("#name");
inputName.addEventListener('blur', (e)=>validateInput("Se requieren tus nombre(s)", e));

const inputLastName = document.querySelector("#lastnames");
inputLastName.addEventListener('blur', (e)=>validateInput("Se requieren tus apellidos(s)", e));

const inputDate = document.querySelector("#birth");
inputDate.addEventListener('blur', (e)=>validateInput("Se requiere tu fecha de nacimiento", e));





const validateInputEmailFormat = e => {
  let input = e.target;
  const regex = new RegExp(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
  let inputLine = input.parentElement.querySelector(".input-line");
  let inputPlaceholder = input.parentElement.querySelector(".placeholder-input");
  
  if(!regex.test(input.value)){
    input.classList.add("error-input");
    input.parentElement.lastElementChild.classList.add("error-input");
    input.parentElement.lastElementChild.innerText="Introduzca un correo valido";
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

