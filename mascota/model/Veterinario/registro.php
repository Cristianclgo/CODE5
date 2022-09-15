<?php 
    session_start();
    require_once("../connections/connection.php");
	include("../includes/validarSesion.php");
	$sql = "SELECT * FROM user, tip_user WHERE user = '".$_SESSION['usuario']."' AND user.id_tip_user = tip_user.id_tip_user";
	$usuarios = mysqli_query($mysqli, $sql) or die(mysqli_error());
	$usua = mysqli_fetch_assoc($usuarios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Menu Administrador</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<header>
		<span id="button-menu" class="fa fa-bars"></span>
		<span class="usuario"> <?php echo $usua['tip_user']?></span>
		<span class="usuario"> 
			<a href="../includes/salir.php"><img src="../image/salir.png" width=30></a>
			<?php echo $usua['nombres']?>
		</span>
		
		<nav class="navegacion">
			<ul class="menu" >
				<!-- TITULAR -->
				<li class="title-menu">Todas las categorias</li>
				<!-- TITULAR -->

				<li><a href="#"><span class="fa fa-home icon-menu"></span>Inicio</a></li>

				<li class="item-submenu" menu="1">
					<a href="#"><span class="fa fa-suitcase icon-menu"></span>Servicios</a>
					<ul class="submenu">
						<li class="title-menu"><span class="fa fa-suitcase icon-menu"></span>Servicios</li>
						<li class="go-back">Atras</li>

						<li><a href="#">Diseño web</a></li>
						<li><a href="#">Alojamiento web</a></li>
						<li><a href="#">Dominios</a></li>
					</ul>
				</li>

				<li class="item-submenu" menu="2">
					<a href="#"><span class="fa fa-shopping-bag icon-menu"></span>Tienda</a>
					<ul class="submenu">
						<li class="title-menu"><span class="fa fa-shopping-bag icon-menu"></span>Tienda</li>
						<li class="go-back">Atras</li>

						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smarphones</a></li>
						<li><a href="#">Consolas de viejuegos</a></li>
					</ul>
				</li>

				<li><a href="#"><span class="fa fa-envelope icon-menu"></span>Contacto</a></li>
				<li><a href="#"><span class="fa fa-tag icon-menu"></span>Blog</a></li>
			</ul>
		</nav>
	</header>
</body>
</html>