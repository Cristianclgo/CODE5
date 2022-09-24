
<?php
session_start();
require_once("../../../db/connection.php");
include("../../../controller/validarSesion.php");
$sql = "SELECT * FROM usuario, tipousuario WHERE iduser = '".$_SESSION['id_user']."' AND usuario.tipoUsua = tipousuario.tipoUsua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
?>

<?php
//consulta tabla tipo de usuario
    //select * from 'tipo_usuarios'
    $sql_tusu= "Select * from tipousuario";
    $query_tusu=mysqli_query($mysqli, $sql_tusu);
    $fila=mysqli_fetch_assoc($query_tusu);
    //consulta tipo estado
    $sql_est= "SELECT * from estado WHERE id_estado< 3 ";
    $query_est=mysqli_query($mysqli, $sql_est);
    $fila_est=mysqli_fetch_assoc($query_est);
?>

<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['clasiUser']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="../indexA.php" value="Regresar" />
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
    <link rel="stylesheet" href="../estilos.css">
    <title>taller</title>
    
</head>
    <body>
        <section class="title">
            <h1><?php echo $usua['clasiUser']?> FORMULARIO CONSULTAR USUARIOS</h1>
        </section>
        <table border="1"class="center" >
            <form name="frm_consulta" method="POST" autocomplete="off">
                <tr style="background-color: rgb(181, 178, 178);">
                    <td>
                        <!--&nbsp es para dejar espacio en blanco-->
                        N
                    </td>
                    <td>ID USUARIO
                                            
                    </td>

                    <td>
                        Nombre 
                    </td>
                    
                    
                    
                    <td>
                        Direccion 
                    </td>

                   

                    <td>
                        Correo 
                    </td>

                    

                    <td>
                        Tipo usuario
                    </td>

                    <td>
                        Estado
                    </td>

                    <td>
                        Acción
                    </td>

                </tr>
                <?php
                    $sql="SELECT * FROM usuario,estado, tipousuario WHERE usuario.tipoUsua = tipousuario.tipoUsua and usuario.id_estado= estado.id_estado";
                    $i=0;
                    $query = mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                        $i++;                    
                ?>
                <tr>
                    <td><?php echo $i ?></td>  
                    <td><input name="doc" type="text" value= "<?php echo $result ['iduser']  ?>"> </td>  
                    <td><input name="nom" type="text" value= "<?php echo $result ['nombreUser']  ?>"> </td>  
                   
                    <td><input name="dir" type="text" value= "<?php echo $result ['direccion']  ?>"> </td>  
                    
                    <td><input name="correo" type="email" value= "<?php echo $result ['correo']  ?>"> </td>  
                    <                     
                    <td><input name="est" type="text" value= "<?php echo $result ['clasiUser']  ?>"> </td>  
                    <td><input name="rol" type="text" value= "<?php echo $result ['estado']  ?>"> </td>  
                    <td><a href="?id=<?php echo $result['iduser'] ?>" onclick="window.open('updateusuario.php?id=<?php echo $result['iduser'] ?>','','width= 600,height=500, toolbar=NO');void(null);">Update/Delete</a></td>    
                </tr>
                    <?php 
                    }
                    ?>  
            </form>


        </table>


            
        
    </body>
</html>