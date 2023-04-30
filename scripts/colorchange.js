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
    }else if(userColor==7){
        r.style.setProperty('--color-1', brightCustom);
        r.style.setProperty('--color-6', darkCustom);
    }
}
