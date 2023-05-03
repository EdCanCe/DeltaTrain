const followButtonNormal = document.querySelector('.follow-button.normal-follow');
const followButtonTop = document.querySelector('.follow-button.top-follow');

let widthFollow = followButtonNormal.getBoundingClientRect().width;
let paddingFollow = followButtonNormal.getBoundingClientRect().padding;
followButtonTop.style.width = `${widthFollow}px`;
followButtonTop.style.padding = `${paddingFollow}px`;




let left = followButtonNormal.offsetLeft;

followButtonTop.style.left = `${left}px`;



/*const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Aquí se ejecuta el código cuando el botón de seguimiento es visible
      console.log('El botón de seguimiento es visible en la pantalla');
      followButtonTop.classList.add('invisible');
    }else{
      followButtonTop.classList.remove('invisible');
    }
  });
}, {
  root: null, // Observar el viewport
  rootMargin: '0px', // No aplicar margen adicional
  threshold: 1.0 // El botón de seguimiento debe estar completamente visible
});

observer.observe(followButtonNormal);*/



let profileBody = document.querySelector('.profile-body');
let userDatesContaienerFixed = document.querySelector('.user-dates-container--fixed');

let widthProfileBody = profileBody.getBoundingClientRect().width;
userDatesContaienerFixed.style.width = `${widthProfileBody}px`;




let backButton=document.querySelector('.back-button');

backButton.addEventListener('click', (e)=>{
  window.history.back();
});