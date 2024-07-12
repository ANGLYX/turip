<?php
session_start();
include('conexion.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>eCommerce template By Adobe Dreamweaver</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script> 
<script src="js/all.min.js"></script>
<link href="eCommerceAssets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="diseno.css">
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body class="container-fluid" style="background-image: none">
<div id="mainWrapper" class="container mt-4">
  <div class="row justify-content-center">
    <header class="col-12 text-center">
      <div id="logo"> <img src="logo/logoo.jpg" class="card-img-top" alt="..."> </div>
    </header>
  </div>
  <section id="offer" class="text-center mt-4">
    <video class="video" src="video/p3r68-cdx67/videovino.mp4" controls></video>
  </section>
  <style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: #4A0E28;;
    }

    header {
        color: #fff;
        padding: 0;
        margin-bottom: 30px;
    }

    .logo {
        display: flex;
        height: 200px;
        margin: 50px;
        margin-top: -250px;
    }

    header h1 {
        font-size: 3em;
        margin: 80px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .container.custom-container {
        width: 80%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px;
        background-color: #4A0E28;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 50px;
    }

    .product:hover {
        transform: translateY(-5px);
    }

    .product img {
        max-width: 100%;
        width: 500px;
        height: 225px;
        border-radius: 20px;
    }

    .product p {
        color: #ffffff;
        font-size: 1.5em;
    }

    #datetime {
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #date, #time {
        font-size: 20px;
        margin: 2px 0;
        color: #FFFFFF;
    }

    .sociales {
        padding-top: 40px;
        padding-bottom: 40px;
        margin-top: 5px;
        float: right;
    }

    .sociales li {
        display: inline-block;
        justify-content: flex-end;
        left: 100px;
    }

    .sociales a {
        padding: 10px;
    }

    h1 {
        color: #FFFFFF;
    }

    .boton1 {
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px;
        transition: background-color 0.3s;
        background-color: #000000;
        color: rgba(255, 255, 255, 1.00);
        box-shadow: 0 0 20px rgba(217, 221, 2, 0.897);
        border: 2px solid #C9AA00;
        box-shadow: 0 0 35px rgba(226, 255, 62, 0.89);
    }
	  .vinoc{
		  border: 10px solid black;
	  }
  </style>
  <div id="content"></div>
  <script src="reloj.js"></script>
  <div class="container custom-container text-center mt-4"> <a href="comentario.php" class="boton1" onclick="redirigir()">Agregar Comentario</a>
    <audio controls loop>
      <source src="audio/audio.mp3" type="audio/mpeg">
    </audio>
  </div>
  <script src="audio.js"></script>
  <center>
    <h1>¿Cuál es el tipo de vino que más te gustaría descubrir?</h1>
    <?php
    $idcar = 0;
    if ( isset( $_SESSION[ 'cor' ] ) ) {
        if ( isset( $_SESSION[ 'id_car' ] ) ) {
            $idcar = $_SESSION[ 'id_car' ];
        } else {
			$corr = $_SESSION['cor'];
            $idc = "select * from carrito where usuario='$corr'";
            $result = $enlace->query( $idc );
            if ( $result->num_rows > 0 ) {
                $row = mysqli_fetch_array( $result );
                $idcar = $row[ 'id_carrito' ];
            } else {
                $cons = mysqli_query( $enlace, "select max(id_carrito) as maxi from carrito;" );
                $row = mysqli_fetch_array( $cons );
                if ( $row[ 'maxi' ] != null ) {
                    $idcar = $row[ 'maxi' ] + 1;
                } else {
                    $idcar = 1;
                }
                $inscar = "insert into carrito values($idcar, '$corr', 0)";
                if ( mysqli_query( $enlace, $inscar ) ) {} else {
                    echo "<script>alert('Hubo un error'); window.location='trab.php'</script>";
                }
            }
			$_SESSION['id_car'] = $idcar;
        }
		$carri = "select * from det_carrito where id_carrito=$idcar";
		$result2 = $enlace->query($carri);
        ?>
    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"> Carrito </a>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Carrito</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
		  <?php
		if($result2->num_rows > 0){
			$total = 0;
		 while($row2 = mysqli_fetch_array($result2)){
			 $total = $total + ($row2['cantidad']*$row2['precio']);
		?>
        <div class="row border-5 vinoc rounded-3 mb-2">
			<div class="col-6">
				<p><?php echo $row2['nombre_vino']; ?></p>
				<p>Cantidad: <?php echo $row2['cantidad']; ?></p>
			</div>
			<div class="col-6">
				<p>Precio: $<?php echo $row2['precio']; ?></p>
				<p>Subtotal: $<?php echo ($row2['cantidad']*$row2['precio']); ?></p>
			</div>
		</div>
		<?php
			 }
		?>
		  <strong><p>Total: <?php echo $total; ?></p></strong>
		  <a href="venta.php" class="btn btn-primary">Comprar</a>
		  <br>
		  <strong><a href="vaccar.php">Vaciar carrito</a></strong>
		  <?php
		}
		  ?>			
      </div>
    </div>
	  <br>
	<a href="cerses.php">Cerrar sesion</a>
    <?php } else { ?>
    <a href="index.php">Iniciar sesión</a>
    <?php } ?>
  </center>
  <div id="datetime" class="text-center mt-4">
    <p id="date"></p>
    <p id="time"></p>
  </div>
  <div class="products row mt-4">
    <div class="product col-md-4 mb-4">
      <div class="button-container text-center"> <a href="apartadorosa.html" onclick="handleClick()"> <img src="img/vinorosa.jpg" alt="Imagen Botón" class="button-image img-fluid"> </a>
        <p>Vino Rosa</p>
      </div>
    </div>
    <div class="product col-md-4 mb-4">
      <div class="button-container text-center"> <a href="apartadotinto.html" onclick="handleClick()"> <img src="img/vinotinto.jpg" alt="Imagen Botón" class="button-image img-fluid"> </a>
        <p>Vino Tinto</p>
      </div>
    </div>
    <div class="product col-md-4 mb-4">
      <div class="button-container text-center"> <a href="apartadoblanco.html" onclick="handleClick()"> <img src="img/vinoblanco.jpg" alt="Imagen Botón" class="button-image img-fluid"> </a>
        <p>Vino Blanco</p>
      </div>
    </div>
    <div class="product col-md-4 mb-4">
      <div class="button-container text-center"> <a href="apartadodulce.html" onclick="handleClick()"> <img src="img/vinodulce.jpg" alt="Imagen Botón" class="button-image img-fluid"> </a>
        <p>Vino Dulce</p>
      </div>
    </div>
    <div class="product col-md-4 mb-4">
      <div class="button-container text-center"> <a href="apartadoespumoso.html" onclick="handleClick()"> <img src="img/vinoespumoso.jpg" alt="Imagen Botón" class="button-image img-fluid"> </a>
        <p>Vino Espumoso</p>
      </div>
    </div>
    <div class="product col-md-4 mb-4">
      <div class="button-container text-center"> <a href="apartadoseco.html" onclick="handleClick()"> <img src="img/vinoseco.jpg" alt="Imagen Botón" class="button-image img-fluid"> </a>
        <p>Vino Seco</p>
      </div>
    </div>
  </div>
  <footer class="text-center mt-4">
    <div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius sem neque. Integer ornare.</p>
    </div>
  </footer>
</div>
</body>
</html>
