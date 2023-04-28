let addIngredientButton = document.querySelector(".add-ingredient-button");
let ingredientsContainer=document.querySelector('.ingredients-container');
let ingredientOl=ingredientsContainer.querySelector('ol');
let ingredientLi= ingredientOl.querySelector('li:first-child');
let ingredientInput=ingredientLi.querySelector('input');
let ingredientDelete=ingredientOl.getElementsByClassName("delete-btn");

function addIngredient(){
    let newIngredientLi=ingredientLi.cloneNode(true);
    ingredientOl.appendChild(newIngredientLi);
    let ingredientLiLast = ingredientOl.querySelector('li:last-child');
    let ingredientInputLast=ingredientLiLast.querySelector('input');
    ingredientInputLast.value='';
    let ingredientDeleteLast=ingredientLiLast.querySelector(".delete-btn");
    ingredientDeleteLast.addEventListener('click', function(){
        let ingredientLiParent=this.parentNode;
        ingredientLiParent.parentNode.removeChild(ingredientLiParent);
    });
}

addIngredientButton.addEventListener('click', function(){
    addIngredient();
    loadEvents();
});

function loadEvents(){
    ingredientOl.lastElementChild.querySelector('input').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            addIngredient();
            loadEvents();
        }
    });
}


loadEvents();


for(let i=0; i<ingredientDelete.length;i++){
    ingredientDelete[i].addEventListener('click', function(){
        let ingredientLiParent=this.parentNode;
        ingredientLiParent.parentNode.removeChild(ingredientLiParent);
    });
}








let imageInput = document.querySelector('.image-input');
let imagePreview = document.querySelector('.image-preview');
let imageContainer=document.querySelector('.recipe-img-main-container');
let divInputFile=document.querySelector('.input-file-div');


divInputFile.addEventListener('click', function(){
  imageInput.click();
});

// divInputFile.addEventListener("dragover", (event) => {
//   event.preventDefault();
// });


// divInputFile.addEventListener("drop", (event) => {
//   event.preventDefault();

//   // Obtenemos la imagen que se soltó
//   let imageFile = event.dataTransfer.files[0];


//   // La agregamos al input file
//   imageInput.files = new DataTransfer().files.add(imageFile);
// });


imageInput.addEventListener('change', () => {
  let file = imageInput.files[0]; // obtener el archivo de imagen seleccionado
  let reader = new FileReader(); // crear un objeto FileReader

  reader.addEventListener('load', () => {
    imageContainer.classList.add('active');
    imagePreview.classList.add('active');
    imagePreview.src = reader.result; // mostrar la imagen en el elemento img
  });

  if (file) {
    reader.readAsDataURL(file); // leer el archivo de imagen como URL de datos
  }
});





//Esto de abajo es para meter los datos
function insertRecipe(){
    let ingredientTag = document.getElementsByClassName("ingredientData");
    let ingredientData = "";
    for(let i=0; i<ingredientTag.length; i++){
        ingredientData = ingredientData + ingredientTag[i].value+"<";
    }
    let preparationData = document.getElementById("preparationData").value;
    let portionData = document.getElementById("portionData").value;
    let typeData = document.getElementById("typeData").value;
    let proteinData = document.getElementById("proteinData").value;
    let fatData = document.getElementById("fatData").value;
    let carbsData = document.getElementById("carbsData").value;
    let nameData = document.getElementById("nameData").value;
    
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "recipecreator.php");

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    let allData = "preparation=" + preparationData + "&portion=" + portionData + "&type=" + typeData + "&protein=" + proteinData + "&fat=" + fatData + "&carbs=" + carbsData + "&name=" + nameData + "&ingredients=" + ingredientData;
    // Enviar la petición al archivo PHP que inserta los datos
    xhr.send(allData);
}