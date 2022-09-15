<?php
require_once("../db/connection.php");
session_start();
if($_POST["inicio"]){
	// inicia sesion para los usuarios
	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];
	
	
	/// consultamos el usuario segun el usuario y la clave
	$con="select * from usuario where iduser = '$usuario' and contraseña = '$clave' AND id_estado = 1"; 	
	$query=mysqli_query($mysqli, $con);
	$fila=mysqli_fetch_assoc($query);
	
	if($fila){		
		/// si el usario y la clave son correctas, creamo las sessiones 
			
		$_SESSION['id_user'] = $fila['iduser']; 
		$_SESSION['nombres'] = $fila['nombreUser']; 
		$_SESSION['tipo'] = $fila['tipoUsua'];
		///$_SESSION['usuario'] = $fila['user'];
		
				/// dependiendo del tipo de usuario lo redireccinamos a una pagina
		/// si es un client
		if($_SESSION['tipo'] == 1){
			header("Location: ../model/Administrador/indexA.php"); 
			exit();
		}
		/// si es un vendedor
		elseif($_SESSION['tipo'] == 2){
			header("Location: ../model/Propietario/indexP.php"); 
			exit();		
		}
		elseif($_SESSION['tipo'] == 3){
			header("Location: ../model/Veterinario/indexV.php"); 
			exit();		
		}
		
		
	}else{
		/// si el usuario y la clave son incorrectas lo lleva a la pagina de inio y se muestra un mensaje
		header("Location: ../errorlog.html"); 
		exit();
	}
	
}	
?>