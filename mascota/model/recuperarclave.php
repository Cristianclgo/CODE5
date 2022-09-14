<?php
require_once("../db/connection.php");
session_start();

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) 
{
$contra = $_POST['cont'];

if ($_POST['cont']== "" || $_POST['conta']== "" )
	{
                 echo '<script>alert (" Datos Vacios no ingreso la Clave");</script>';
                 echo '<script>window.location="../validarcorreo.html"</script>';
	}
	else
	{
    
        $doc = $_SESSION['ced'];
        $insertSQL = "UPDATE user SET password ='$contra'  WHERE cedula = '$doc'";
        mysqli_query($mysqli, $insertSQL) or die(mysqli_error());  	
             echo '<script>alert (" Cambio de Clave Existosa ");</script>';
            echo '<script>window.location="../index.html"</script>';
    
    }
   
}
?>
<?php
if($_POST["inicio"])
{
	// inicia sesion para los usuarios
	$doc = $_POST["doc"];
	$sql="select * from user where cedula = '$doc'"; 	
	$query=mysqli_query($mysqli, $sql);
	$fila=mysqli_fetch_assoc($query);
	
	if($fila)
    {		
		/// si el usario  son correctas.
        $_SESSION['ced']=$fila['cedula'];
    
    ?>
        <html>
            <head>
                <link rel="stylesheet" href="../controller/css/style.css">
                <meta charset="utf-8">
            </head>
            <body>
                <div class="login-box">
                    <!--crea una caja imaginaria-->
                    <img src="../controller/image/logo.png" class="avatar" alt="Avatar Image">

                        <!--insertamos una imagen-->
    
                        <form  method="post"  name="form1" id="form1" autocomplete="off" >
                            <!--crea formularios-->
                            <label for="usuario">Nueva Contraseña</label>
                            <!-- etiqueta lo que se le muestra el usuario -->
                            <input type="text" name="cont" id="cont" placeholder="Nueva Clave" >
                            <label for="usuario">Confirme Contraseña</label>
                            <!-- etiqueta lo que se le muestra el usuario -->
                            <input type="text" name="conta" id="conta" placeholder="Confirme Clave">
                            <!-- Caja de texto donde el usuario digite texto -->
                            <input type="submit" name="inicio" id="inicio" value="cambiar" >
                            <input type="hidden" name="MM_update" value="form1" />
                            <a href="../index.html">Volver Pagina Principal</a>
                             <!--TAREA VALIDA QQUE LAS DOS CONTRASEÑAS SEAN IGUALES Y QUE SEA FUERTE-->
                        </form>
            </body>
        </html>
    <?php
    }  
   else
    {
    echo '<script>alert (" El documento no exite en la Base de Datos");</script>';
    echo '<script>window.location="../validarcorreo.html"</script>';
    }
}
?>