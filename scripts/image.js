let imagenes = document.querySelectorAll('img');

for (let i = 0; i < imagenes.length; i++) {
  if (!imagenes[i].classList.contains('img-extended-exeption')) {
    imagenes[i].addEventListener("click", function() {
      let pantallaCompleta = document.createElement('div');
      pantallaCompleta.classList.add('img-extended-container');

      let imagenAmpliada = new Image();
      imagenAmpliada.src = this.src;
      imagenAmpliada.classList.add('img-extended-image');
      
      pantallaCompleta.innerHTML='<button class="close-btn"><span class="material-symbols-outlined">close</span><button>';
      pantallaCompleta.appendChild(imagenAmpliada);
      document.body.appendChild(pantallaCompleta);

      let scale = 1;
      let x = 0;
      let y = 0;

      function updateTransform() {
        imagenAmpliada.style.transform = `scale(${scale}) translate(${x}px, ${y}px)`;
      }

      function zoom(delta) {
        const factor = delta > 0 ? 1.2 : 0.8;
        scale *= factor;
        updateTransform();
      }

      function pan(dx, dy) {
        x += dx;
        y += dy;
        updateTransform();
      }

      pantallaCompleta.addEventListener('wheel', function(event) {
        event.preventDefault();
        zoom(event.deltaY);
      });

      let isDragging = false;
      let lastX = 0;
      let lastY = 0;

      pantallaCompleta.addEventListener('mousedown', function(event) {
        event.preventDefault();
        isDragging = true;
        lastX = event.clientX;
        lastY = event.clientY;
      });

      pantallaCompleta.addEventListener('mousemove', function(event) {
        event.preventDefault();
        if (isDragging) {
          const dx = event.clientX - lastX;
          const dy = event.clientY - lastY;
          lastX = event.clientX;
          lastY = event.clientY;
          pan(dx, dy);
        }
      });

      pantallaCompleta.addEventListener('mouseup', function(event) {
        event.preventDefault();
        isDragging = false;
      });

      pantallaCompleta.addEventListener('mouseleave', function(event) {
        event.preventDefault();
        isDragging = false;
      });

      pantallaCompleta.querySelector('.close-btn').addEventListener('click', function() {
        document.body.removeChild(pantallaCompleta);
      });
    });
  }
}
