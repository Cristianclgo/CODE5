
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM usuario, tipousuario WHERE iduser = '".$_SESSION['id_user']."' AND usuario.tipoUsua = tipousuario.tipoUsua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>
<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['clasiUser']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="../index.html" value="Regresar" />
    </tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();

   
    header('location: ../../index.html');
}
	
?>

</div>

</div>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>taller</title>
</head>
    <body>
        <section class="title">
            <h1>INTERFAZ    <?php echo $usua['clasiUser']?></h1>
        </section>
    
        <nav class="navegacion">
           
            <ul class="menu wrapper" >
    
                <li class="first-item">
                    <a href="agregar-usu.php">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">AGREGAR TIPO DE USUARIO</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="agregarusuario.php">
                        <img src="img/ejecucion.png" alt="" class="imagen">
                        <span class="text-item">AGREGAR USUARIO</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="agregartipomascota.php">
                        <img src="img/MASCOTA.png" alt="" class="imagen">
                        <span class="text-item">AGREGAR TIPO DE MASCOTA</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="agregarmascli.php">
                        <img src="img/registromascota.png" alt="" class="imagen">
                        <span class="text-item">AGREGAR MASCOTA CLIENTE</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="agregartipesta.php">
                        <img src="img/estado.png" alt="" class="imagen">
                        <span class="text-item">CREAR ESTADO</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="afiliacion.php">
                    <a href="afiliacion.php">
                        <img src="img/afiliacion.jpg" alt="" class="imagen">
                        <span class="text-item">AFILIACION</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="medicame.php">
                        <img src="img/medicame.jpg" alt="" class="imagen">
                        <span class="text-item">MEDICAMENTOS</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="visita.php">
                        <img src="img/visita.jpg" alt="" class="imagen">
                        <span class="text-item">VISITA</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="recibo.php">
                        <img src="img/recibo.jpg" alt="" class="imagen">
                        <span class="text-item">RECIBO</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="lista/lista_usuarios.php">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">CONSULTAR LISTA DE USUARIOS</span>
                        <span class="down-item"></span>
                    </a>
                </li>

                
                
            </ul>
            
        </nav>
    </body>
</html>