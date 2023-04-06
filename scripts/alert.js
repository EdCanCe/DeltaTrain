let alertDiv = document.getElementById("alerts");

function dissapearAlert(){
    alertDiv.style.opacity = "0";
    setTimeout(() => { alertDiv.style.display = "none"; }, 300);
}

function appearAlert(header, body){
    document.getElementById("AlertHeader").textContent = header;
    document.getElementById("AlertBody").textContent = body;
    alertDiv.style.opacity = "1";
    alertDiv.style.display = "flex";
}