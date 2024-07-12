<?php
session_start();
include('conexion.php');
if(isset($_SESSION['cor'])){
	$idc=$_SESSION['id_car'];
	$del1 = "delete from det_carrito where id_carrito=$idc";
	$up = "update carrito set total=0 where id_carrito=$idc";
	if(mysqli_query($enlace, $del1) && mysqli_query($enlace, $up)){
		echo"<script>alert('Carrito vaciado correctamente'); window.location='trab.php'</script>";
	}else{
		echo"<script>alert('El carrito no se pudo vaciar'); window.location='trab.php'</script>";
	}
}else{
	echo"<script>alert('Antes debe iniciar sesion'); window.location='index.php'</script>";
}
?>