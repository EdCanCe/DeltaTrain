//rojo, naranja, amarillo, verde lima, azul rey, azul cielo, morado

let brightRed = "#c70000";
let darkRed = "#950011b2";

let brightOrange = "#db7900";
let darkOrange = "#955400b2";

let brightYellow = "#eeff00";
let darkYellow = "#969e02b2";

let brightGreen = "#00ff84";
let darkGreen = "#00a857b2";

let brightBlue = "#0018d1";
let darkBlue = "#0011a8b2";

let brightSky = "#00d1ca";
let darkSky = "#00a8a3b2";

let brightPurple = "#7100e3";
let darkPurple = "#5400a8b2";

const r = document.querySelector(':root');

function changeColor(userColor){
    if(userColor==0){
        r.style.setProperty('--color-1', brightRed);
        r.style.setProperty('--color-6', darkRed);
    }else if(userColor==1){
        r.style.setProperty('--color-1', brightOrange);
        r.style.setProperty('--color-6', darkOrange);
    }else if(userColor==2){
        r.style.setProperty('--color-1', brightYellow);
        r.style.setProperty('--color-6', darkYellow);
    }else if(userColor==3){
        r.style.setProperty('--color-1', brightGreen);
        r.style.setProperty('--color-6', darkGreen);
    }else if(userColor==4){
        r.style.setProperty('--color-1', brightBlue);
        r.style.setProperty('--color-6', darkBlue);
    }else if(userColor==5){
        r.style.setProperty('--color-1', brightSky);
        r.style.setProperty('--color-6', darkSky);
    }else if(userColor==6){
        r.style.setProperty('--color-1', brightPurple);
        r.style.setProperty('--color-6', darkPurple);
    }
}