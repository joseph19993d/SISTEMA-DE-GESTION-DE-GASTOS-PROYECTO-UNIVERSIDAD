
"use strict";
console.log("Hello");
let Op= document.getElementById("options");
console.log(Op.innerHTML);
let PAlto= document.documentElement.clientHeight;
let PAncho= document.documentElement.clientWidth;
let setOptions3= document.getElementById("contenedor1");
let setOptions2= document.getElementById("contenedor1"); 
const options3 = setOptions2.innerHTML
console.log(options3);

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
let X= 0;

function loadWindowsZise  (e) {

//Validar si es celular
//validate if the navigator is for a cell phone
if( navigator.userAgent.match(/Android/i)
|| navigator.userAgent.match(/webOS/i)
|| navigator.userAgent.match(/iPhone/i)
|| navigator.userAgent.match(/iPad/i)
|| navigator.userAgent.match(/iPod/i)
|| navigator.userAgent.match(/BlackBerry/i)
|| navigator.userAgent.match(/Windows Phone/i) ){

    // renstringir el acceso a range volviendolo invisible
    let newRange= document.getElementById("Rango");
    newRange.type="hidden"; 
}

    PAlto= document.documentElement.clientHeight;
    PAncho= document.documentElement.clientWidth;
    console.log(PAncho);
    PAncho= PAncho-50;
    let options2= document.getElementById("smallOrBig");
    if(PAncho <300){X++;}
    
    if(X>1 || PAncho <300 ){
    let img2= document.getElementById("img1");
    let PAncho2= PAncho/2;
    img2.setAttribute("width", PAncho2+"px");
    let Width2= img2.getAttribute("width");
    console.log(Width2);
    let newRange= document.getElementById("Rango");
    let newWidth= (PAncho+50)/200;
    console.log("ancho dividido"+ newWidth);
    newRange.value=newWidth; 

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
    setOptions2.innerHTML=`
    <a href="../administrador/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Administradores</a>
    <p>
    <a href="../compañero/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Usuarios</a> <!---->
    <p>
    <a href="../invitados/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Invitados</a>
    <p>
    <a href="../gastos/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Gastos</a>
    <p>
   
    <a href="../sala/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">salas</a>
    <p>
    <a href="../sesion/pruebas/fotos/mostrar.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Fotos</a>  
    `  
    }else{
        // setOptions2.innerHTML=options3;
        setOptions2.innerHTML=`
        <a href="../historial/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Historial</a>
        <p>
        <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "cerrar.php" id=boton  >Cerra sesion</a>
        <p>
        <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "bienvenida.php" id=boton  >Volver a cargar</a>
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
<a href="../compañero/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Usuario</a> 
<a href="../invitados/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Invitado</a>
<a href="../gastos/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Gasto</a>
<a href="../sala/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">sala</a>
<a href="../sesion/pruebas/fotos/mostrar.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Fotos</a>  

      </li>
<ul>
        
`;
options2.innerHTML= `
<a href="../historial/index.php" class="ui-btn ui-icon-search ui-btn-icon-top" id="boton">Historial</a>
<p>
<a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "cerrar.php" id=boton  >Cerra sesion</a>`;
}


}



    



