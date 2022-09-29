
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM usuario, tipousuario WHERE iduser = '".$_SESSION['id_user']."' AND usuario.tipoUsua = tipousuario.tipoUsua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
?>

<?php
if ((isset($_POST["guardar"])) && ($_POST["guardar"] == "frm_usu")) 
{
    $tip_usumasco = $_POST['tipusumasco'];
    $sql_usu = "SELECT * FROM tipomascotas WHERE tip_masc = '$tip_usumasco'";
    $tip = mysqli_query($mysqli, $sql_usu);
    $row = mysqli_fetch_assoc($tip);

    if ($row){
        echo '<script>alert ("El tipo mascota ya existe !!!Cambielo ");</script>';
        echo '<script>window.location="agregartipomascota.php"</script>';
    }

    elseif ($_POST["tipusumasco"] == ""){
        echo '<script>alert ("Campos vacios");</script>';
        echo '<script>window.location="agregartipomascota.php"</script>';

    }

    else{
        $tipo = $_POST["tipusumasco"];
        $sql_usu = "INSERT INTO tipomascotas (tip_masc) VALUES('$tip_usumasco')";
        $tip = mysqli_query($mysqli, $sql_usu);
        echo '<script>alert ("Registro ingresado en el sistema");</script>';
        echo '<script>window.location="agregartipomascota.php"</script>';

    }


}

?>
<form method="POST">

<tr><br>
    <td colspan='2' align="center">
    <div class="banner"> 
    
            <!--<input type="submit"  value="Cerrar sesión" name="btncerrar" class="btn btn-outline-danger"/>-->
           <input type="submit" formaction="indexA.php" value="Regresar"class="btn btn-outline-primary" />
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    
    <title>taller</title>
</head>
    <body>
        <header>
            <div class="logo">
                <img src="img/logo.png" style="float: left">
            </div>
        </header>
        <section class="title">
            <h1 class="text-uppercase fw-bold"> AGREGAR TIPOS MASCOTA</h1>
        </section>
        <section class="d-flex justify-content-center">
            <form name ="frm_usu" method="POST" autocomplete="off">
            <br>
            <form class="row g-3 needs-validation center"novalidate name ="frm_usu" method="POST" autocomplete="off"> 
                
                <div class="mb-3">    
                    <tr>
                        <th><label>Identificador</label></th>
                        <th><input type="text" placeholder="Id" readonly class="form-control"></th>
                    </tr>
                </div>
                <div class="mb-3">                      
                    <tr>
                        <th><label>Tipo Mascota</label></th>
                        <th><input style="text-transform:uppercase" type="text" name="tipusumasco"class="form-control" placeholder="Ingresar Tipo Mascota"></th>
                    </tr>
                </div>
                <div class="mb-3">                      
                    <tr>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </div>
                <div class="mb-3">  
                    <tr>
                        <th colspan="2"><input type="submit" name="btn-guardar" value="Guardar"class="btn btn-success"></th>
                        <input type="hidden" name="guardar" value="frm_usu">
                    </tr>        
                </div>



            </form>
        </table>

        </section>
       
        
    </body>
</html>