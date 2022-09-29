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
           echo '<script>windows.location="agregarusuario.php"</script>';
       }
        else if ($idusu=="" || $nombreUsu=="" || $direccion=="" || $correo=="" || $tipoUsua=="" || $idestado==""|| $contraseña=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="agregarusuario.php"</script>';
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
        <!--<td colspan='2' align="center"><?php echo $usua['clasiUser']?></td>-->
    </tr>
<tr><br>
    <td colspan='2' align="center">
    <div class="banner"> 
    
            <input type="submit"  value="Cerrar sesión" name="btncerrar" class="btn btn-outline-danger"/>
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
            <h1 class="text-uppercase fw-bold">  AGREGAR USUARIO</h1>
        </section>
        <section class="d-flex justify-content-center">
            <form name ="frm_usu" method="POST" autocomplete="off">
                        
     <!--tabla donde se digitan las variables-->
            
            
            <!--<tr>
                    <th class="fw-bold" colspan="2">Registrar Usuario</th>
                </tr>-->
                <br>
            <form class="row g-3 needs-validation"novalidate> 
                <div class="mb-3">
                                                                        
                       <!-- <th><label class="col-2 col-form-label mb-3">ID</label></th>-->
                        <input type="number"name="idusu" size="20"placeholder="Ingrese Documento Identidad"class="form-control"require><br>
                    
                </div>
                <div class="mb-3">    
                    <tr>
                        <!--<th><label class="mb-3">NOMBRE COMPLETO </label></th>-->
                        <input type="text"  name="nom" placeholder="Ingrese Nombres Completos" class="form-control"  require ><br>
                    </tr>
                </div>
                <div class="mb-3">    
                    <tr>
                        <!--<th><label class="mb-3">DIRECCION</label></th>-->
                        <input type="text"  name="dir" placeholder="Direccion"class="form-control"  require ><br>
                    </tr>
                </div>
                <div class="mb-3">       
                    <tr>
                                   
                
                        <!--<th><label class="mb-3">CORREO</label></th>-->
                        <input type="email"  name="correo" placeholder="Ingrese el correo"class="form-control"  require><br>
                    </tr>
                </div>  
                <div class="mb-3">      
                    <tr>
                        <!--<th><label class="mb-3">CONTRASEÑA</label></th>-->
                        <input type="password"  name="pass" placeholder="Ingrese Contraseña" class="form-control" require>
                    </tr>

                </div>
                <div class="mb-3">   
                    <tr>
                        <!--<th >TIPO DE USUARIO  </th>-->
                        
                        <select  class="form-select" name="tipousua" >
                            <option value="" >seleccione tipo de usuario</option>
                            <?php
                                do{

                            ?>
                        <option value="<?php echo ($fila['tipoUsua']) ?>"><?php echo ($fila['clasiUser'])?> </option>
                        <?php  } while($fila=mysqli_fetch_assoc($query));
                        ?>

                        </select> 
                       
                    </tr>
                    
                </div>
                <div class="mb-3"> 
                    <tr>
                        <!--<th><label class="mb-3">ESTADO DE USUARIO  </label></th>-->
                        
                        <select class="form-select" name="idest" >
                            <option value="">seleccione el estado del usuario</option>
                            <?php
                                do{

                            ?>
                        <option value="<?php echo ($fila_est['id_estado']) ?>"><?php echo ($fila_est['estado'])?> </option>
                        <?php  } while($fila_est=mysqli_fetch_assoc($query_est));
                        ?>

                        </select> 
                     
                    </tr>
                </div>
                <div class="mb-3"> 
                    
                    <tr>
                        &nbsp;
                        
                    
                    
                        <input type="submit" name="validar" value="Registrar" class="btn btn-success">
                        <input type="hidden" name="MM_insert" value="formreg">
                           
                    </tr>
                </div>


            </form>
      
        </section>
    
       
        
    </body>
</html>