
<?php

if (!isset($hola) ) {
	# code...
	echo " No existe ";

    if (empty($hola)) {
    	# code...
    	echo "Esta vacion";
        $hola=1;

    } else {

    	echo "No esta vacio";
    }

}else {
	# code...

	echo "no existe ";
}


if (isset($hola) ) {
	# code...
	echo " Si existe ";
    

    if (empty($hola)) {
    	# code...
    	echo "Esta vacion";
        $hola=0;

    } else {

    	echo "No esta vacio";
    }

}else {
	# code...

	echo "no existe ";
}
?>