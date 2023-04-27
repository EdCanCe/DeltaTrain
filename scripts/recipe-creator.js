let addIngredientButton = document.querySelector(".add-ingredient-button");
let ingredientsContainer=document.querySelector('.ingredients-container');
let ingredientOl=ingredientsContainer.querySelector('ol');
let ingredientLi= ingredientOl.querySelector('li:first-child');
let ingredientInput=ingredientLi.querySelector('input');
let ingredientDelete=ingredientOl.getElementsByClassName("delete-btn");

addIngredientButton.addEventListener('click', function(){
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
});

ingredientOl.lastElementChild.querySelector('input').addEventListener('keydown', function(event) {
  if (event.key === 'Enter') {
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
});

for(let i=0; i<ingredientDelete.length;i++){
    ingredientDelete[i].addEventListener('click', function(){
        let ingredientLiParent=this.parentNode;
        ingredientLiParent.parentNode.removeChild(ingredientLiParent);
    });
}








let imageInput = document.querySelector('.image-input');
let imagePreview = document.querySelector('.image-preview');
let imageContainer=document.querySelector('.recipe-img-container');

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
