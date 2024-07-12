<?php
	$servidor = "localhost";
	$usuario = "root";
	$clave = "";
	$baseDeDatos = "vinateria"; 

	$enlace = mysqli_connect ($servidor, $usuario, $clave, $baseDeDatos);
	if(!$enlace){
		echo "error en la conexion";
		exit;
	}
?>