<?php 
	// cierra las sessiones
	session_start();
	if(isset($_COOKIE[session_name()]))	{
		setcookie(session_name(), "", time()-3600, "/");
	}
	
	unset($_SESSION['usuario']); 
	unset($_SESSION['tipo']);
	$_SESSION = array();
	session_destroy();
	session_write_close();
	header("Location: ../index.html");
	 
?>