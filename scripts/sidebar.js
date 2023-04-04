const btn=document.querySelector("#btn-sidebar");
  const sidebar=document.querySelector(".sidebar");

  let sidebarActive=false;

  btn.addEventListener('click', ()=>{
    if(sidebarActive){
      sidebar.classList.remove("active");
      btn.classList.add("bi-chevron-double-right");
      btn.classList.remove("bi-chevron-double-left");
      sidebarActive=false;
    }else{
      sidebar.classList.add("active");
      btn.classList.add("bi-chevron-double-left");
      btn.classList.remove("bi-chevron-double-right");
      sidebarActive=true;
    }
    
  });
