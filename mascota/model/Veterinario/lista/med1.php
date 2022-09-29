<?php
session_start();
require_once("../../../db/connection.php");
include("../../../controller/validarSesion.php");

$sql="SELECT * FROM recibos,visita,medicamentos WHERE 
recibos.idMedicamento = medicamentos.idMedicamento 
and recibos.idVisita = visita.idVisita 
and recibos.idVisita='".$_GET['id']. "'";
$query = mysqli_query($mysqli,$sql);
$result = mysqli_fetch_assoc($query);

$sql_tusu= "Select * from tipousuario";
$query_tusu=mysqli_query($mysqli, $sql_tusu);
$fila=mysqli_fetch_assoc($query_tusu);

$sql_est= "SELECT * From estado WHERE id_estado < 3";
$query_est=mysqli_query($mysqli, $sql_est);
$filaest=mysqli_fetch_assoc($query_est);

?>

<!--acciones de boton actualizar o eliminar-->
<?php
/*if(isset($_POST["update"]))

{
        $idusu=    $_POST['doc'];
        $nombreUsu=    $_POST['nom'];
        $direccion=   $_POST['dir'];
        $correo=     $_POST['cor'];
        $tipoUsua=     $_POST['tipousu'];
        $idestado=     $_POST['idest'];
        $contraseña=     $_POST['pass'];
       $sql_update="UPDATE usuario SET nombreUser = '$nombreUsu', direccion = '$direccion', correo = '$correo', 
        tipoUsua = '$tipoUsua', id_estado = '$idestado', contraseña = '$contraseña' WHERE iduser = '".$_GET['id']."'";
        $cs=mysqli_query($mysqli, $sql_update);
        echo '<script>alert (" Actualización Exitosa ");</script>';
    //echo "actulizar";
}
elseif(isset($_POST["delete"]))
{
    //echo "borrar";
    $sql_delete="DELETE FROM usuario WHERE iduser = '".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sql_delete);
    echo '<script>alert (" Registro Eliminado Exitosamente ");</script>';
}*/

?>

<!--acciones dentro de las tablas-->

<!DOCTYPE html>
<html lang="en">
    <script> 
        function centrar() { 
            iz=(screen.width-document.body.clientWidth) / 2; 
            de=(screen.height-document.body.clientHeight) / 2; 
            moveTo(iz,de); 
        }     
        </script>
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Medicamento Recetado</title>
    
    
</head>
<body onload="centrar();"> 
<section class="title">
            <h1 class="text-uppercase fw-bold">&nbsp;MEDICAMENTOS RECETADOS</h1>
        </section>

    <section class="d-flex justify-content-center">
        <form name="frm_consulta" method="POST" autocomplete="off">
        <div class="mb-3 fw-bold">
            <tr >
                <td >Id Visita</td>
                <td><input readonly name="idvis" type="number" value= "<?php echo $result ['idVisita']  ?>"class="form-control"></td>
            </tr>
            </div> 
            <div class="mb-3 fw-bold">
            <tr>
                <td>Medicamento</td>
                <td><input readonly name="med" type="text" value= "<?php echo $result ['Medicamento']  ?>"class="form-control"></td>
            </tr>
            </div> 
            <div class="mb-3 fw-bold">
            <tr>
                <td>Recomendaciones</td>
                <td><input readonly name="med" type="text" value= "<?php echo $result ['recomendaciones']  ?>"class="form-control"></td>
            </tr>
            </div> 
            
            




            <!--<tr>
                <td colspan="2">&nbsp;</td>
            </tr>
                <td><input type="submit" name="update" value="Actualizar"></td>
                

                <td><input type="submit" name="delete" value="Eliminar"></td>
                
                
            </tr>-->












        </form>

    </section>
</body>
</html>  
