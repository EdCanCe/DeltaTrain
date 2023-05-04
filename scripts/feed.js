function openNormal(){
    document.getElementById("posts-container").style="display:block;";
    document.getElementById("posts-container-follow").style="display:none;";
}

function openFollow(){
    document.getElementById("posts-container-follow").style="display:block;";
    document.getElementById("posts-container").style="display:none;";
}

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
            imagePreview.innerHTML = "<video src='"+reader.result+"' type='video/mp4' controls ></video>";
        }
    };
  
    if (file) {
        reader.readAsDataURL(file);
    }
});

function likePost(userID, postID){
    let extra = "";
    if(postID[postID.length - 1] == 'e'){
        extra = "e";
        postID = postID.substr(0, postID.length - 1);
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // Mostrar la respuesta en la consola del navegador
        console.log(this.responseText);
        }
    };
    xhr.open("GET", "/DeltaTrain/likepost.php?userID=" + userID + "&postID=" + postID, true);
    xhr.send();
    document.getElementById("like-"+postID+extra).innerHTML='<span id="heartFill" class="material-symbols-outlined">heart_broken</span>';
    document.getElementById("like-"+postID+extra).setAttribute( "onClick", "unlikePost("+userID+", '"+postID+extra+"')");
    let span = document.getElementById('like-cuantity-'+postID);
    let currentValue = parseInt(span.textContent);
    let newValue = currentValue + 1;
    span.textContent = newValue;
}

function unlikePost(userID, postID){
    let extra = "";
    if(postID[postID.length - 1] == 'e'){
        extra = "e";
        postID = postID.substr(0, postID.length - 1);
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        // Mostrar la respuesta en la consola del navegador
        console.log(this.responseText);
        }
    };
    xhr.open("GET", "/DeltaTrain/unlikepost.php?userID=" + userID + "&postID=" + postID, true);
    xhr.send();
    document.getElementById("like-"+postID+extra).innerHTML='<span id="heartFill" class="material-symbols-outlined">favorite</span>';
    document.getElementById("like-"+postID+extra).setAttribute( "onClick", "likePost("+userID+", '"+postID+extra+"')");
    let span = document.getElementById('like-cuantity-'+postID);
    let currentValue = parseInt(span.textContent);
    let newValue = currentValue - 1;
    span.textContent = newValue;
}

function makeComment(postID){
    document.getElementById("commented-post").innerHTML = "[ Se ha vinculado con el post ]";
    document.getElementById("commentedPost").value = postID;
    document.querySelector('#text-area-editor').style = "display: block ";
    document.querySelector('#text-area-editor').scrollIntoView({ 
        behavior: 'smooth' 
    });
}