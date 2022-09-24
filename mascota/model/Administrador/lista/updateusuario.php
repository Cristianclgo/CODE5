<?php
session_start();
require_once("../../../db/connection.php");
include("../../../controller/validarSesion.php");

$sql="SELECT * FROM usuario,estado, tipousuario WHERE usuario.tipoUsua = tipousuario.tipoUsua 
and usuario.id_estado= estado.id_estado 
and usuario.iduser='".$_GET['id']. "'";
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
if(isset($_POST["update"]))

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
}

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
    <title>Document</title>
</head>
<body onload="centrar();"> 
    <table border="1"class="center" >
        <form name="frm_consulta" method="POST" autocomplete="off">
            <tr>
                <td>id usuario</td>
                <td><input readonly name="doc" type="text" value= "<?php echo $result ['iduser']  ?>"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input name="nom" type="text" value= "<?php echo $result ['nombreUser']  ?>"></td>
            </tr>
            
            <tr>
                <td>Direccion</td>
                <td><input name="dir" type="text" value= "<?php echo $result ['direccion']  ?>"></td>
            </tr>
            
            <tr>
                <td>Correo</td>
                <td><input name="cor" type="email" value= "<?php echo $result ['correo']  ?>"></td>
            </tr>
            
            <tr>
                <td>Contraseña</td>
                <td><input name="pass" type="password" value= "<?php echo $result ['contraseña']  ?>"></td>
            </tr>
            <tr>
                <td>Tipo usuario</td>
                <td>                  
                    <select name ="tipousu">
                    <option value="<?php echo $result ['tipoUsua']  ?>"><?php echo $result ['clasiUser']  ?></option>
                       <?php
                        //Codigo php ciclo
                        do{
              
                        ?>
                    <option value="<?php echo ($fila['tipoUsua'])?>"><?php echo ($fila['clasiUser'])?></option>
                    <?php   } while ($fila=mysqli_fetch_assoc($query_tusu));
                    ?>
                    </select>
            </td>
            </tr>

            <tr>
                <td>Estado</td>
                <td>                  
                    <select name ="idest">
                    <option value="<?php echo $result ['id_estado']  ?>"><?php echo $result ['estado']  ?></option>
                       <?php
                        //Codigo php ciclo
                        do{
              
                        ?>
                    <option value="<?php echo ($filaest['id_estado'])?>"><?php echo ($filaest['estado'])?></option>
                    <?php   } while ($filaest=mysqli_fetch_assoc($query_est));
                    ?>
                    </select>
            </td>
            </tr>




            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
                <td><input type="submit" name="update" value="Actualizar"></td>
                

                <td><input type="submit" name="delete" value="Eliminar"></td>
                
                
            </tr>












        </form>

    </table>
</body>
</html>  
