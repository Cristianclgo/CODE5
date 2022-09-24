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
    $tip_med = $_POST['tipmed'];
    $sql_usu = "SELECT * FROM medicamentos WHERE Medicamento = '$tip_med'";
    $tip = mysqli_query($mysqli, $sql_usu);
    $row = mysqli_fetch_assoc($tip);

    if ($row){
        echo '<script>alert ("El medicamento ya existe !!!agregue otro ");</script>';
        echo '<script>window.location="medicame.php"</script>';
    }

    elseif ($_POST["tipmed"] == ""){
        echo '<script>alert ("Campos vacios");</script>';
        echo '<script>window.location="medicame.php"</script>';

    }

    else{
        $tipo = $_POST["tipest"];
        $sql_usu = "INSERT INTO medicamentos (Medicamento) VALUES('$tip_med')";
        $tip = mysqli_query($mysqli, $sql_usu);
        echo '<script>alert ("Registro ingresado en el sistema");</script>';
        echo '<script>window.location="medicame.php"</script>';

    }


}

?>
<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['clasiUser']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="indexA.php" value="Regresar" />
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
            <h1>   <?php echo $usua['clasiUser']?> AGREGAR MEDICAMENTOS</h1>
        </section>
        <table border="1" class="center">
            <form name ="frm_usu" method="POST" autocomplete="off">
                <tr>
                    <th colspan="2">AGREGAR MEDICAMENTOS</th>
                </tr>
                <tr>
                    <th><label>ID MEDICAMENTO</label></th>
                    <th><input type="text" placeholder="Id" readonly></th>
                </tr>
                <tr>
                    <th><label>MEDICAMENTO</label></th>
                    <th><input style="text-transform:uppercase" type="text" name="tipmed" placeholder="Ingrese Medicamento"></th>
                </tr>
                <tr>
                    <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" name="btn-guardar" value="Guardar"></th>
                    <input type="hidden" name="guardar" value="frm_usu">
                </tr>        




            </form>
        </table>

    
       
        
    </body>
</html>