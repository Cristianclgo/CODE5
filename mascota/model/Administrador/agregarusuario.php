<!--codigo no cambia por cada boton ya que con este autentica conexion-->
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM usuario, tipousuario WHERE iduser = '".$_SESSION['id_user']."' AND usuario.tipoUsua = tipousuario.tipoUsua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
?>

<!--aqui va la instruccion que valida la tabla usuario de la base de datos-->

<!--selecciona tabla  tipousuario-->
<?php
    $control = "SELECT * From tipousuario";
    //WHERE tipoUsua >= 1
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);
?>

<!--selecciona tabla estado-->
<?php
    $sqle = "SELECT * From estado WHERE id_estado < 3";
    $query_est=mysqli_query($mysqli,$sqle);
    $fila_est=mysqli_fetch_assoc($query_est);
?>




<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $idusu=    $_POST['idusu'];
        $nombreUsu=    $_POST['nom'];
        $direccion=   $_POST['dir'];
        $correo=     $_POST['correo'];
        $tipoUsua=     $_POST['tipousua'];
        $idestado=     $_POST['idest'];
        $contraseña=     $_POST['pass'];

        $validar ="SELECT * FROM usuario WHERE iduser='$idusu' or nombreUser='$nombreUsu'";
        $queryi=mysqli_query($mysqli,$validar);
        $fila1=mysqli_fetch_assoc($queryi);
    
       if ($fila1) {
           echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN //CAMBIELOS//");</script>';
           echo '<script>windows.location="registrousu.php"</script>';
       }
        else if ($idusu=="" || $nombreUsu=="" || $direccion=="" || $correo=="" || $tipoUsua=="" || $idestado==""|| $contraseña=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="registrousu.php"</script>';
        }

        else
        {

           $insertsql="INSERT INTO usuario(iduser,nombreUser,direccion,correo,tipoUsua,id_estado,contraseña) VALUES('$idusu','$nombreUsu','$direccion','$correo','$tipoUsua','$idestado','$contraseña')";
           mysqli_query($mysqli,$insertsql) or die(mysqli_error());
           echo '<script>alert (" Registro Exitoso, Gracias");</script>';
           echo '<script>window.location="agregarusuario.php"</script>';
        }
    }
?>

<!--este es el diseño de la parte de arriba-->
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
            <h1>   <?php echo $usua['clasiUser']?> AGREGAR USUARIO</h1>
        </section>
        <table border="1" class="center">
            <form name ="frm_usu" method="POST" autocomplete="off">
               
            
       


            
            
            
            
            




     <!--tabla donde se digitan las variables-->
            
            
            <tr>
                    <th colspan="2">Registrar Usuario</th>
                </tr>
                <tr>
                    <th><label>ID</label></th>
                    <th><input type="number" name="idusu" placeholder="Ingrese Documento Identidad" ></th>
                </tr>
                <tr>
                    <th><label>NOMBRE COMPLETO</label></th>
                    <th><input type="text" name="nom" placeholder="Ingrese Nombres Completos" ></th>
                </tr>
                <tr>
                    <th><label>DIRECCION</label></th>
                    <th><input type="text" name="dir" placeholder="Direccion" ></th>
                </tr>
                <tr>
                    <th><label>CORREO</label></th>
                    <th><input type="email" name="correo" placeholder="Ingrese el correo" ></th>
                </tr>
                
                
                <tr>
                    <th><label>CONTRASEÑA</label></th>
                    <th><input type="password" name="pass" placeholder="Ingrese Contraseña" ></th>
                </tr>


                <tr>
                    <th>TIPO DE USUARIO</th>
                    <th>
                    <select name="tipousua" >
                        <option value="">seleccione tipo de usuario</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila['tipoUsua']) ?>"><?php echo ($fila['clasiUser'])?> </option>
                    <?php  } while($fila=mysqli_fetch_assoc($query));
                    ?>

                    </select> 
                   </th>   
                </tr>
                


                <tr>
                    <th><label>ESTADO DE USUARIO</label></th>
                    <th>
                    <select name="idest" >
                        <option value="">seleccione el estado del usuario</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila_est['id_estado']) ?>"><?php echo ($fila_est['estado'])?> </option>
                    <?php  } while($fila_est=mysqli_fetch_assoc($query_est));
                    ?>

                    </select> 
                   </th>   
                </tr>


                
                <tr>
                    <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" name="validar" value="Registrar"></th>
                    <input type="hidden" name="MM_insert" value="formreg">
                </tr>        




            </form>
        </table>

    
       
        
    </body>
</html>