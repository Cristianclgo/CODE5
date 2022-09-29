
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM usuario, tipousuario WHERE iduser = '".$_SESSION['id_user']."' AND usuario.tipoUsua = tipousuario.tipoUsua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>
<form method="POST">

<tr><br>
    <td colspan='2' align="center">
    <div class="banner"> 
             <input type="submit"  value="Cerrar sesión" name="btncerrar" class="btn btn-outline-danger"/>
        </div>
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
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">

</head>
    <body>
    <header>
            <div class="logo">
                <img src="img/logo.png" style="float: left">
            </div>
        </header>
        <section class="title">
        
               
            
            <h1 Class="text-uppercase fw-bold" ><?php echo $usua['nombreUser']?>&nbsp;PROPIETARIO</h1>
        </section>
    
        <nav class="navegacion">
           
            <ul class="menu wrapper" >
    
                <li class="first-item">
                    <a href="lista/masvisi.php">
                        <img src="img/estado2.png" alt="" class="imagen">
                        <span class="text-item">CONSULTAR ESTADO DE MASCOTA</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                
                
            </ul>
            
        </nav>
    </body>
</html>