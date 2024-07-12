<?php
session_start();
include('conexion.php');
if(isset($_SESSION['cor'])){
	$corr = $_SESSION['cor'];
	$idc=$_SESSION['id_car'];
	$cons = "select * from det_carrito where id_carrito=$idc";
	$result=$enlace->query($cons);
	$con2 = "select max(id_venta) as idmax from venta";
	$result2=$enlace->query($con2);
	$row=mysqli_fetch_array($result);
	$row2=mysqli_fetch_array($result2);
	$idv = 0;
	if($row2['idmax']==null){
		$idv=1;
	}else{
		$idv=$row2['idmax'] + 1;
	}
	$detv="select * from det_carrito where id_carrito=$idc";
	$result3 = mysqli_query($enlace, $detv);
	$con=1;
	$total = 0;
	while($row3=mysqli_fetch_array($result3)){
		$vino = $row3['nombre_vino'];
		$pre = $row3['precio'];
		$can = $row3['cantidad'];
		if($con==1){
			$query_det="Insert into det_venta(id_ven,nombre_vino,precio,cantidad) values($idv,'$vino', $pre, $can)";
			$con=2;
		}else{
			$query_det = $query_det.",($idv,'$vino', $pre, $can)";
		}
		$total = $total + ($pre*$can);
	}
	$query_det = $query_det.";";
	$venta="insert into venta values($idv, '$corr', $total)";
	if(mysqli_query($enlace, $venta) && mysqli_query($enlace, $query_det)){
		$del1 = "delete from det_carrito where id_carrito=$idc";
		$up = "update carrito set total=0 where id_carrito=$idc";
		if(mysqli_query($enlace, $del1) && mysqli_query($enlace, $up)){
			echo"<script>alert('Venta realizada correctamente'); window.location='trab.php'</script>";
		}else{
			echo"<script>alert('La venta fue realizada mas sin embargo no se pudo vaciar el carrito'); window.location='trab.php'</script>";
		}
	}else{
		echo"<script>alert('Hubo un error'); window.location='trab.php'</script>";
	}
}else{
	echo"<script>alert('Primero debe iniciar sesion'); window.location='index.php'</script>";
}
?>