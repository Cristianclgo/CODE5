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

<!--selecciona tabla usuario-->
<?php
    $control = "SELECT * From usuario";
    //WHERE tipoUsua >= 1
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);
?>

<!--selecciona tabla tipo mascotas-->
<?php
    $sqlm = "SELECT * From tipomascotas";
    $query_tm=mysqli_query($mysqli,$sqlm);
    $fila_tm=mysqli_fetch_assoc($query_tm);
?>




<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $idmasc=    $_POST['idmasc'];
        $nombreMasc=    $_POST['nombreMasc'];
        $idUsua=   $_POST['idUsua'];
        $colorMasc=     $_POST['colorMasc'];
        $tipMasc=     $_POST['tipMasc'];
       

        $validar ="SELECT * FROM mascotasclientes WHERE id_mascota='$idmasc'";
        $queryi=mysqli_query($mysqli,$validar);
        $fila1=mysqli_fetch_assoc($queryi);
    
       if ($fila1) {
           echo '<script>alert ("/ID MASCOTA YA EXIXTE //CAMBIELOS//");</script>';
           echo '<script>windows.location="agregarmascli.php"</script>';
       }
        else if ($idmasc=="" || $nombreMasc=="" || $idUsua=="" || $colorMasc=="" || $tipMasc=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="agregarmascli.php"</script>';
        }

        else
        {

           $insertsql="INSERT INTO mascotasclientes(id_mascota,nom_masc,iduser,color,id_tip_masc)  
           VALUES('$idmasc','$nombreMasc','$idUsua','$colorMasc','$tipMasc')";
           mysqli_query($mysqli,$insertsql) or die(mysqli_error());
           echo '<script>alert (" Registro Exitoso, Gracias");</script>';
           echo '<script>window.location="agregarmascli.php"</script>';
        }
    }
?>

<!--este es el diseño de la parte de arriba-->
<form method="POST">

  
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
            <h1 class="text-uppercase fw-bold">    AGREGAR MASCOTA DEL CLIENTE</h1>
        </section>
        <section class="d-flex justify-content-center"><br>
        <form class="row g-3 needs-validation center"novalidate name ="frm_usu" method="POST" autocomplete="off">


     <!--tabla donde se digitan las variables-->


            <div class="mb-3"> 
            
                <tr style="background-color: rgb(181, 178, 178);">
                    <th colspan="2">Registrar Mascota</th><br>
                </tr>
            </div>
            <div class="mb-3">       
                <tr>
                    <th><label>ID</label></th>
                    <th><input type="number" name="idmasc" placeholder="Ingrese id de la Mascota" class="form-control"require></th>
                </tr>
            </div>
            <div class="mb-3">   
                <tr>
                    <th><label>NOMBRE MASCOTA</label></th>
                    <th><input type="text" name="nombreMasc" placeholder="Ingrese Nombre de la mascota"class="form-control"require ></th>
                </tr>
            </div>
            <div class="mb-3">  
                <tr>
                    <th>ID USUARIO</th>
                    <th>
                    <select name="idUsua"class="form-select" >
                        <option value="">seleccione usuario</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila['iduser']) ?>"><?php echo ($fila['nombreUser'])?> </option>
                    <?php  } while($fila=mysqli_fetch_assoc($query));
                    ?>

                    </select> 
                   </th>   
                </tr>
            </div>
            <div class="mb-3"> 
                <tr>
                    <th><label>COLOR</label></th>
                    <th><input type="text" name="colorMasc" placeholder="Ingrese color"class="form-control"require ></th>
                </tr>
               
            </div>
            <div class="mb-3"> 
                <tr>
                    <th>TIPO DE MASCOTA</th>
                    <th>
                    <select class="form-select" name="tipMasc" >
                        <option value="">SELECCIONE TIPO DE MASCOTA</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila_tm['id_tip_masc']) ?>"><?php echo ($fila_tm['tip_masc'])?> </option>
                    <?php  } while($fila_tm=mysqli_fetch_assoc($query_tm));
                    ?>

                    </select> 
                   </th>   
                </tr>
            </div>
            <div class="mb-3">  
                
                <tr>
                    <th colspan="2">&nbsp;</th>
                </tr>
                <tr><boton class="btn btn-success">
                    <th colspan="2">
                         <input type="submit" name="validar" value="Registrar"class="btn btn-success"></th>
                        <input type="hidden" name="MM_insert" value="formreg">
                    </boton>
                </tr>        
            </div>







            </form>
        </section>

    
       
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>