<?php require_once '../modelos/Rol.php';
// segun "a" sea una opcion, se ejecutara lo correspondiente pasandole los datos desde aqui a el modelo roles
$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new Rol();

	switch ($accion) {
		case 'Ingresar':
			$rol->setNombre( $_POST['nombre']) ;
			$rol->ingresar();
			break;
		case 'Editar':
			$rol->setId(base64_decode($_POST['id']));
			$rol->setNombre( $_POST['nombre']);
			$rol->editar();
			break;
		case 'eliminar':
			$rol->setId(base64_decode($_GET['id']));
			$rol->eliminar();
			break;
	}
}

header('Location: ../vistas/roles');