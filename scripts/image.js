let imagenes = document.querySelectorAll('img');

for(let i=0; i<imagenes.length; i++){

    if(!imagenes[i].classList.contains('img-extended-exeption')){

        imagenes[i].addEventListener("click", function(){
        
            let pantallaCompleta = document.createElement('div');
            
            pantallaCompleta.classList.add('img-extended-container')
    
            let imagenAmpliada= new Image();
            imagenAmpliada.src=this.src;
    
            pantallaCompleta.appendChild(imagenAmpliada);
    
            document.body.appendChild(pantallaCompleta);
    
            pantallaCompleta.addEventListener('click', function(){
                document.body.removeChild(pantallaCompleta);
            })
    
        })

    }

}