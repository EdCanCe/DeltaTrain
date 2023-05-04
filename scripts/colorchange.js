let body = document.querySelector('body');

let brightRed = "#950011";
let darkRed = "#950011b2";

let brightOrange = "#952600";
let darkOrange = "#952600b2";

let brightYellow = "#957200";
let darkYellow = "#957200b2";

let brightGreen = "#009532";
let darkGreen = "#009532b2";

let brightBlue = "#005a95";
let darkBlue = "#005a95b2";

let brightSky = "#008395";
let darkSky = "#008395b2";

let brightPurple = "#660095";
let darkPurple = "#660095b2";


const r = document.querySelector(':root');


function oscurecerColor(color, porcentaje) {
  // Parsear el código hexadecimal a RGB
  var r = parseInt(color.slice(1, 3), 16);
  var g = parseInt(color.slice(3, 5), 16);
  var b = parseInt(color.slice(5, 7), 16);
  
  // Calcular el porcentaje de oscurecimiento
  var factor = 1 - 60 / 100;
  
  // Aplicar el factor de oscurecimiento a cada componente RGB
  r = Math.floor(r * factor);
  g = Math.floor(g * factor);
  b = Math.floor(b * factor);
  
  // Convertir los componentes RGB de vuelta a hexadecimal y devolver el color oscurecido
  return "#" + (r < 16 ? "0" : "") + r.toString(16) + (g < 16 ? "0" : "") + g.toString(16) + (b < 16 ? "0" : "") + b.toString(16);
}



function changeColor(userColor){
    if(userColor==0){
        r.style.setProperty('--color-1', brightRed);
        r.style.setProperty('--color-6', darkRed);
        body.style.backgroundColor=oscurecerColor(brightRed, 60);
    }else if(userColor==1){
        r.style.setProperty('--color-1', brightOrange);
        r.style.setProperty('--color-6', darkOrange);
        body.style.backgroundColor=oscurecerColor(brightOrange);
    }else if(userColor==2){
        r.style.setProperty('--color-1', brightYellow);
        r.style.setProperty('--color-6', darkYellow);
        body.style.backgroundColor=oscurecerColor(brightYellow);
    }else if(userColor==3){
        r.style.setProperty('--color-1', brightGreen);
        r.style.setProperty('--color-6', darkGreen);
        body.style.backgroundColor=oscurecerColor(brightGreen);
    }else if(userColor==4){
        r.style.setProperty('--color-1', brightBlue);
        r.style.setProperty('--color-6', darkBlue);
        body.style.backgroundColor=oscurecerColor(brightBlue);
    }else if(userColor==5){
        r.style.setProperty('--color-1', brightSky);
        r.style.setProperty('--color-6', darkSky);
        body.style.backgroundColor=oscurecerColor(brightSky);
    }else if(userColor==6){
        r.style.setProperty('--color-1', brightPurple);
        r.style.setProperty('--color-6', darkPurple);
        body.style.backgroundColor=oscurecerColor(brightPurple);
    }else if(userColor==7){
        r.style.setProperty('--color-1', brightCustom);
        r.style.setProperty('--color-6', darkCustom);
        body.style.backgroundColor=oscurecerColor(brightCustom);
    }
}


// let body = document.querySelector('body');

// let color = e.target.value;
//     let colorTransparent=color+'b2';
//     console.log(colorTransparent);
//     let root=document.querySelector(':root');
//     root.style.setProperty('--main-solid', color);
//     root.style.setProperty('--main-transparent',  colorTransparent)

