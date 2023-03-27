const btn_toggle=document.querySelector('.btn-toggle');
const sidebar=document.querySelector('.sidebar');
const logo=document.querySelector('.logo');
const wrapper=document.querySelector('.wrapper');


btn_toggle.addEventListener("click", () =>{
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
        logo.setAttribute("style", "display:flex;");
        wrapper.setAttribute("style", "left:240px;widht:calc(100% - 240px)");
        
        return
    }
    wrapper.setAttribute("style", "left:85px;widht:calc(100% - 85px)");
    
})



