<?php
	include('conexion.php');
?>


<!DOCTYPE html>
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
    <form  action="#" name="vinateria" method="post">
            <h1>Cliente</h1>

            <div class="input-box">
                <input type="text" placeholder="Nombre(s)" name="nombre" required>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Apellidos" name="apellidos" required>
            </div>

            <div class="input-box">
                <input type="email" placeholder="Correo" name="correo" required>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Contraseña" name="contrasena" required>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Telefono" name="telefono" required>
            </div>
            
            <div class="row mt-3 mb-3 text-center">
                <div class="g-2 col-12 col-md-6  d-grid gap-2 d-md-block">
                    <input type="submit" name="registro" class="btn" value="Registrarse">           
                </div>
                <div class="g-2 col-12 col-md-6  d-grid gap-2 d-md-block">
                    <button type="reset" class="btn"> <i class="bi bi-save2"></i> Borrar</button>
                </div>
            </div>

        </form>
    </div>
</body>
    <?php
    if(isset($_POST['registro'])){

        $nombre= $_POST['nombre'];
        $apellidos= $_POST['apellidos'];
        $correo= $_POST['correo'];
        $contrasena= $_POST['contrasena'];
        $telefono= $_POST['telefono'];

        $insertarDatos = "INSERT INTO usuarios VALUES('$nombre', '$apellidos', '$correo', '$contrasena', '$telefono')";
    if(mysqli_query($enlace,$insertarDatos)){
        echo '<script>alert("Cuenta creada correctamente"); window.location="index.php";</script>:';
    }else{
        echo '<script>alert("Hubo un error"); window.location="registrar.php";</script>:';
    }
    }
    ?>
    
    
</html>