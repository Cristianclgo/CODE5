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

<!--selecciona tabla  a trabajar-->
<?php
    $control = "SELECT * From afiliacion";
    //WHERE tipoUsua >= 1
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);
?>

<!--selecciona tabla estado-->
<?php
    $sqle = "SELECT * From mascotasclientes WHERE id_mascota";
    $query_est=mysqli_query($mysqli,$sqle);
    $fila_est=mysqli_fetch_assoc($query_est);
?>




<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $afilb=    $_POST['Afilb'];
        $fechaafil=    $_POST['dateafilb'];
        $idmascota=   $_POST['id_mascota'];
        

        $validar ="SELECT * FROM afiliacion WHERE Afilb='$afilb' or id_mascota='$idmascota'";
        $queryi=mysqli_query($mysqli,$validar);
        $fila1=mysqli_fetch_assoc($queryi);
    
       if ($fila1) {
           echo '<script>alert ("AFILIACION YA EXISTE //");</script>';
           echo '<script>windows.location="registrousu.php"</script>';
       }
        else if ($afilb=="" || $fechaafil=="" || $idmascota=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="afiliacion.php"</script>';
        }

        else
        {

           $insertsql="INSERT INTO afiliacion(Afilb,dateafilb,id_mascota) VALUES('$afilb','$fechaafil','$idmascota')";
           mysqli_query($mysqli,$insertsql) or die(mysqli_error());
           echo '<script>alert (" Registro Exitoso, Gracias");</script>';
           echo '<script>window.location="afiliacion.php"</script>';
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
            <h1>   <?php echo $usua['clasiUser']?> AFILIACIÒN</h1>
        </section>
        <table border="1" class="center">
            <form name ="frm_usu" method="POST" autocomplete="off">
               
            
       


            
            
            
            
            




     <!--tabla donde se digitan las variables-->
            
            
            <tr>
                    <th colspan="2">Registrar Afiliaciòn</th>
                </tr>
                <tr>
                    <th><label>ID</label></th>
                    <th><input type="number" name="Afilb" placeholder="Ingrese numero de afiliaciòn" ></th>
                </tr>
                <tr>
                    <th><label>FECHA AFILIACIÒN</label></th>
                    <th><input type="date" name="dateafilb" placeholder="SELECCIONAR FECHA" ></th>
                </tr>
                
                <tr>
                    <th>ID MASCOTA</th>
                    <th>
                    <select name="id_mascota" >
                        <option value="">Seleccione id mascota a agregar</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila_est['id_mascota']) ?>"><?php echo ($fila_est['nom_masc'])?> </option>
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