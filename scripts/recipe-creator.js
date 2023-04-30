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
    ingredientInputLast.value="";
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
        if (event.key == 'Enter') {
            event.preventDefault();
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












function checkWords(){
    let ingredientTag = document.getElementsByClassName("ingredientData");
    let ingredientData = "";
    for(let i=0; i<ingredientTag.length; i++){
        ingredientData = ingredientData + ingredientTag[i].value+"<";
    }
    console.log(ingredientData);
    document.getElementById("hiddenIngredient").value=ingredientData;
    console.log("--> "+document.getElementById("hiddenIngredient").value);
}
//Esto de abajo es para meter los datos
function insertRecipe(){


    /*let requiredInputs = document.querySelectorAll('input[required]');
    let allFilled = true;
    requiredInputs.forEach(input => {
    if (!input.value) {
        allFilled = false;
    }
    });
    requiredInputs = document.querySelectorAll('textarea[required]');
    requiredInputs.forEach(input => {
    if (!input.value) {
        allFilled = false;
    }
    });


    if (!allFilled) {

        alert('Please fill in all required fields');

    }else{
        let ingredientTag = document.getElementsByClassName("ingredientData");
        let ingredientData = "";
        for(let i=0; i<ingredientTag.length; i++){
            ingredientData = ingredientData + ingredientTag[i].value+"<";
        }
        let preparationData = document.getElementById("preparationData").value;
        preparationData = preparationData.replace(/(?:\r\n|\r|\n)/g, '\\n');
        let portionData = document.getElementById("portionData").value;
        let proteinData = document.getElementById("proteinData").value;
        let fatData = document.getElementById("fatData").value;
        let carbsData = document.getElementById("carbsData").value;
        let nameData = document.getElementById("nameData").value;
        let pictureData = document.getElementById("pictureData");
        let formData = new FormData();
        formData.append("preparation", preparationData);
        formData.append("portion", portionData);
        formData.append("protein", proteinData);
        formData.append("fat", fatData);
        formData.append("carbs", carbsData);
        formData.append("name", nameData);
        formData.append("ingredient", ingredientData);
        formData.append("picture", pictureData.files[0]);


        $.ajax({
            url: "../recipecreator.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorMessage) {
            }
        });
    }*/

}