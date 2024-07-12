<?php
	include('conexion.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="module" src="js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="index.css">
    <title>Usuarios</title>
</head>
<body>
    <div class="wrapper">
    <form  action="#" name="inicio" method="post">
            <h1>Iniciar sesion</h1>
            <div class="input-box">
                <input type="email" placeholder="Correo" name="correo" required>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Contraseña" name="contrasena" required>
            </div>
            
            <div class="row mt-3 mb-3 text-center">
                <div class="g-2 col-12 col-md-6  d-grid gap-2 d-md-block">
                    <input type="submit" name="inic" class="btn" value="Iniciar sesion">           
                </div>
                <div class="g-2 col-12 col-md-6  d-grid gap-2 d-md-block">
                    <button type="reset" class="btn"> <i class="bi bi-save2"></i> Borrar</button>
                </div>
            </div>
			<center>No tienes cuenta?<a href="registrar.php">Crea una</a></center>

        </form>
    </div>
</body>
    <?php
    if(isset($_POST['inic'])){
        $correo= $_POST['correo'];
        $contrasena= $_POST['contrasena'];

        $cons = "select * from usuarios where correo='$correo' and contrasena='$contrasena'";
		$result = $enlace->query($cons);
    	if ($result->num_rows > 0) {
		$row = mysqli_fetch_array($result);
		session_start();
		$_SESSION['cor'] = $row['correo'];
		$_SESSION['nombre'] = $row['nombre'];
		echo "<script> alert('Inicio de sesion correcto'); window.location='trab.php' </script>";
    }else{
        echo '<script>alert("Correo o contraseña incorrectos"); window.location="index.php";</script>:';
    }
	}
    ?>
</html>