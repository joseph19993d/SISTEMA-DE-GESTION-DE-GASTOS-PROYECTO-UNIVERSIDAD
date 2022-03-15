<?php require_once '../modelos/Historial.php';
// segun "a" sea una opcion, se ejecutara lo correspondiente pasandole los datos desde aqui a el modelo Historiales
$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$Historial = new Historial();

	switch ($accion) {
		case 'Ingresar':
			$Historial->setInforme( $_POST['informe']) ;
			$Historial->ingresar('');
			break;
		case 'Editar':
			$Historial->setId(base64_decode($_POST['id']));
			$Historial->setInforme( $_POST['informe']);
			$Historial->editar();
			break;
		case 'eliminar':
			$Historial->setId(base64_decode($_GET['id']));
			$Historial->eliminar();
			break;
	}
}

header('Location: ../vistas/historial');