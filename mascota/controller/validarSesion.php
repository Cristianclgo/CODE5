<?php
//Archivo que permite validar la sesi�n

if(!isset($_SESSION['id_user']) || !isset($_SESSION['tipo']))
{
	header("Location: ../../index.html");
	exit;
}
?>