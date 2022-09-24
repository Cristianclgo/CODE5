
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
        <input type="submit" formaction="../index.php" value="Regresar" />
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
                    <a href="#">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">OPCION 1</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="img/ejecucion.png" alt="" class="imagen">
                        <span class="text-item">OPCION 2</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="img/implementar.jpg" alt="" class="imagen">
                        <span class="text-item">OPCION 3</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="img/planear.png" alt="" class="imagen">
                        <span class="text-item">OPCION 4</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 5</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="first-item">
                    <a href="#">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">OPCION 6</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 7</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 8</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 9</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 10</span>
                        <span class="down-item"></span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 11</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                
            </ul>
            
        </nav>
    </body>
</html>