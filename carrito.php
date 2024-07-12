<?php
session_start();
if(isset($_SESSION['cor'])){
	$beb = $_GET['nombre'];
	$prec = $_GET['pre'];
	include('conexion.php');
	$corr = $_SESSION['cor'];
	$idc = "select * from carrito where usuario='$corr'";
	$result = $enlace->query($idc);
	$idcar=0;
	if($result->num_rows > 0){
		$row = mysqli_fetch_array($result);
		$idcar = $row['id_carrito'];
	}else{
		$cons = mysqli_query($enlace, "select max(id_carrito) as maxi from carrito;");
		$row = mysqli_fetch_array($cons);
		if($row['maxi']!=null){
			$idcar=$row['maxi']+1;
		}else{
			$idcar=1;
		}
		$inscar = "insert into carrito values($idcar, '$corr', 0)";
		if(mysqli_query($enlace, $inscar)){
		}else{
			echo"<script>alert('Hubo un error'); window.location='trab.php'</script>";
		}
	}
	$_SESSION['id_car'] = $idcar;
	$busq = "select * from det_carrito where nombre_vino='$beb' and id_carrito=$idcar";
	$result1 = $enlace->query($busq);
	if($result1->num_rows > 0){
		$row = mysqli_fetch_array($result1);
		$id_de = $row['id_det'];
		$mod = "update det_carrito set cantidad=cantidad+1 where id_det=$id_de;";
		if(mysqli_query($enlace, $mod)){
		}else{
			echo"<script>alert('Hubo un error'); window.location='trab.php'</script>";
		}
	}else{
		$query = "insert into det_carrito (id_carrito, nombre_vino, precio, cantidad) values($idcar, '$beb', $prec, 1)";
		if(mysqli_query($enlace, $query)){
		}else{
			echo"<script>alert('Hubo un error'); window.location='trab.php'</script>";
		}
	}
	$modtot = "update carrito set total=total+$prec where id_carrito=$idcar";
	if(mysqli_query($enlace, $modtot)){
		echo"<script>alert('Vino agregado al carrito correctamente'); window.location='trab.php'</script>";
	}else{
		echo"<script>alert('Hubo un error'); window.location='trab.php'</script>";
	}
}else{
	echo"<script>alert('No se puede realizar la accion'); window.location='index.php'</script>";
}
?>