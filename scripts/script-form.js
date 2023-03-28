window.addEventListener('load', ()=>{


  
    const form=document.getElementById('form');
    const inputLine = document.querySelectorAll('.input-line');
    const labelInput = document.querySelectorAll('.label-input');
    const btnForm = document.getElementById('btn-submit');
    const wrapper=document.getElementById('wrapper');



    form.addEventListener('submit', (e)=> {
        e.preventDefault();
        


        //form.classList.add('valid'); // Agregar la clase "activ" al elemento
        btnForm.classList.add('valid'); // Agregar la clase "activ" al elemento
        wrapper.classList.add('valid');



        //inputLine.forEach(inputLine=>{
          //  inputLine.classList.add('valid'); // Agregar la clase "activ" al elemento
        //});
        


        //labelInput.forEach(labelInput=>{
          //  labelInput.classList.add('valid'); // Agregar la clase "activ" al elemento
        //});


    })
})
