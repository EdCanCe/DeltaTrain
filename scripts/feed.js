function clickInput(){
    document.getElementById("pictureData").click();
}

function addObject(object, name){
    console.log(object+" "+name);
    document.getElementById("linked-object").innerHTML = "[ Se ha vinculado con "+name+" ]";
    document.getElementById("linkedObject").value = object;
}

function openRecipes(){
    document.getElementById("userRoutines").style = "display:none;";
    document.getElementById("userRecipes").style = "display:flex;";
}

function openRoutines(){
    document.getElementById("userRecipes").style = "display:none;";
    document.getElementById("userRoutines").style = "display:flex;";
}

document.getElementById("pictureData").addEventListener("change", () => {
    const file = document.getElementById("pictureData").files[0];
    const reader = new FileReader();
    const imagePreview = document.getElementById("media-container");

  
    reader.onload = () => {
        if(file.type.startsWith('image/')) imagePreview.innerHTML = "<img src="+reader.result+">";
        else if (file.type.startsWith('video/')) {
            imagePreview.innerHTML = "<video><source src='"+reader.result+"' type='video/mp4'></video>";
        }
    };
  
    if (file) {
        reader.readAsDataURL(file);
    }
  });