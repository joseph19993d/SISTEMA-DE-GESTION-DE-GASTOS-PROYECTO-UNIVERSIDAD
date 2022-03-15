"use strict";

console.log("Hello");
/*
var h = "";
h += "Ancho del área visible de la página web:" + document.body.clientWidth + "\ n";
     h += "El área visible de la página web es alta:" + document.body.clientHeight + "\ n";
     h += "Ancho del área visible de la página web:" + document.body.offsetWidth + "(incluido el ancho del borde y la barra de desplazamiento)" + "\ n";
     h += "La altura del área visible de la página web:" + document.body.offsetHeight + "(incluido el ancho del borde)" + "\ n";
     h += "El ancho del texto completo de la página web:" + document.body.scrollWidth + "\ n";
     h += "El texto completo de la página web es alto:" + document.body.scrollHeight + "\ n";
     h += "La página web se desplazó hacia arriba:" + document.body.scrollTop + "\ n";
     h += "Página izquierda para desplazarse:" + document.body.scrollLeft + "\ n";
     h += "En el cuerpo de la página:" + window.screenTop + "\ n";
     h += "Parte izquierda del cuerpo de la página web:" + window.screenLeft + "\ n";
     h += "Resolución de pantalla ancha:" + window.screen.width + "\ n";
     h += "Alta resolución de pantalla:" + window.screen.height + "\ n";
     h += "Ancho del área de trabajo disponible en la pantalla:" + window.screen.availWidth + "\ n";
     h += "Altura de área de trabajo disponible de la pantalla:" + window.screen.availHeight + "\ n";
     h += "La configuración de su pantalla es" + window.screen.colorDepth + "bit color" + "\ n";
     h += "Su configuración de pantalla" + window.screen.deviceXDPI + "píxeles / pulgada" + "\ n";
alert(h);
*/




let Op= document.getElementById("options");
console.log(Op.innerHTML);
let PAlto= document.documentElement.clientHeight;
let PAncho= document.documentElement.clientWidth;



//let setOptions3= document.getElementById("contenedor1");

//const options3 = setOptions2.innerHTML;
//console.log(options3);
/*
//IMG by RANGE{
//
let rango= document.getElementById("Rango");
//
function setImagenWidth (e){
//
let rango1= document.getElementById("Rango");
rango1.setAttribute("type","text");
//
let rango2= document.getElementById("Rango");
let ValurRango2= rango2.value;
console.log(ValurRango2);
rango2.setAttribute("Type","range");
//
let img1= document.getElementById("img1");
console.log(img1);
//
img1.setAttribute("width", ValurRango2+"0px");
let Width1= img1.getAttribute("width");
console.log(Width1);
//
e.preventDefault();
}
rango.addEventListener("click",setImagenWidth);
//

//}
*/
let X= 0;
let Y=0;

function loadWindowsZise  (e) {
    console.log("Ancho del área visible de la página web:" + document.body.clientWidth );

    //Validar si es celular
    //validate if the navigator is for a cell phone
    if( navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i) ){ Y=0; }else{ Y=0;}
    
    if(Y !=0){

        PAncho= document.documentElement.clientWidth;
        console.log(PAncho);
    
        // renstringir el acceso a range volviendolo invisible
       // let newRange= document.getElementById("Rango");
        //newRange.type="hidden"; 
        alert("ES ANDROID");
        let options2= document.getElementById("smallOrBig");
        
        Op.innerHTML= `<div id="small" >  </div>`
        options2.innerHTML= ` <input type="button"  id="OptioSmall" value= "opciones" > </input>`;
    
        let setOptions= document.getElementById("OptioSmall");
        
    
        setOptions.addEventListener("click",setOptions1);
        let X2=0;
        function setOptions1(e){

        X2++;
        if(X2 % 2 != 0  ){
            console.log(X2);
        let setOptions2= document.getElementById("contenedor1"); 
        setOptions2.innerHTML=`
        <a href="../administrador/index.php"   class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Administrador</a>
        <p>
        <a href="../compañero/index.php"   class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Usuario</a> <!---->
        <p>
        <a href="../invitados/index.php"   class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Invitado</a>
        <p>
        <a href="../gastos/index.php"   class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Gasto</a>
        <p>

        <a href="../sala/index.php"   class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">sala</a>
        <p>
        <a href="../sesion/pruebas/fotos/mostrar.php"   class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Fotos</a>  
        `  
        }else{
            // setOptions2.innerHTML=options3;
            let setOptions2= document.getElementById("contenedor1"); 
            setOptions2.innerHTML=`
            <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all"   href = "../sesion/cerrar.php" id=boton  >Cerra sesion</a>
            <p>
            <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all"    href = "index.php" id=boton  >Volver a cargar</a>
            <p>
            <a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"    href=" ../sesion/bienvenida.php " id="boton"> Inicio</a>
            ` 
        }
        e.preventDefault();
        }
    }else{
   
        
    
    
        PAlto= document.documentElement.clientHeight;
        PAncho= document.documentElement.clientWidth;
        console.log( "El ancho es="+ PAncho);
        PAncho= PAncho-50;
        let options2= document.getElementById("smallOrBig");
        if(PAncho <300){X++;}
        
        if(X>1 || PAncho <300 ){
        let PAncho2= PAncho/2;
        
        }
    
    PAncho= PAncho+50;
    // si el ancho es mayor que 475 entonces cambia a boton opciones
    if(PAncho < 475){
        Op.innerHTML= `<div id="small" >  </div>`
        options2.innerHTML= ` <input type="button"  id="OptioSmall" value= "opciones" > </input>`;
    
        let setOptions= document.getElementById("OptioSmall");
        
    
        setOptions.addEventListener("click",setOptions1);
        let X2=0;

        function setOptions1(e){
        X2++;
        if(X2 % 2 != 0  ){
            console.log(X2);
        let setOptions2= document.getElementById("contenedor1"); 
        setOptions2.innerHTML=`
        <a href="../administrador/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Administrador</a>
        <p>
        <a href="../compañero/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Usuario</a> <!---->
        <p>
        <a href="../invitados/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Invitado</a>
        <p>
        <a href="../gastos/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Gasto</a>
        <p>
    
        <a href="../sala/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">sala</a>
        <p>
        <a href="../sesion/pruebas/fotos/mostrar.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Fotos</a>  
        `  
        }else{
            // setOptions2.innerHTML=options3;
            let setOptions2= document.getElementById("contenedor1"); 
            setOptions2.innerHTML=`
            <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "../sesion/cerrar.php" id=boton  >Cerra sesion</a>
            <p>
            <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "bienvenida.php" id=boton  >Volver a cargar</a>
            <p>
            <a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href=" ../sesion/bienvenida.php " id="boton"> Inicio</a>
            ` 
        }
        e.preventDefault();
        }
    }else  {
    // si no, entonces deja las opciones normales
    Op.innerHTML= `   
    <ul>
          <li>
    <a href="../administrador/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Administrador</a>
    <a href="../compañero/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Usuario</a> <!---->
    <a href="../invitados/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Invitado</a>
    <a href="../gastos/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Gasto</a>
    <a href="../sala/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">sala</a>
    <a href="../sesion/pruebas/fotos/mostrar.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Fotos</a>  
    
          </li>
    <ul>
            
    `;
    options2.innerHTML= `
    <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "../sesion/cerrar.php" id=boton  >Cerra sesion</a>
    <p>
    <a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  width="60px"  href=" ../sesion/bienvenida.php " id="boton"> Inicio</a>
    `;
    }
    
    
    }}
    



