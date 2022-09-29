<!--codigo no cambia por cada boton ya que con este autentica conexion-->
<?php
session_start();
require_once("../../../db/connection.php");
include("../../../controller/validarSesion.php");
$sql = "SELECT * FROM usuario, tipousuario WHERE iduser = '".$_SESSION['id_user']."' AND usuario.tipoUsua = tipousuario.tipoUsua";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
?>

<!--aqui va la instruccion que valida la tabla usuario de la base de datos-->

<!--selecciona tabla  tipousuario-->
<?php
    $control = "SELECT * From visita";
    //WHERE tipoUsua >= 1
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);
?>

<?php
    $sqlm = "SELECT * From medicamentos WHERE idMedicamento";
    $query_med=mysqli_query($mysqli,$sqlm);
    $fila_med=mysqli_fetch_assoc($query_med);
?>

<!--selecciona tabla estado-->
<?php
    $sqle = "SELECT * From estado WHERE id_estado > 2";
    $query_est=mysqli_query($mysqli,$sqle);
    $fila_est=mysqli_fetch_assoc($query_est);
?>





<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $idrec=    $_POST['idRecibo'];
        $idvis=    $_POST['idVisita'];
        $idmedica=   $_POST['idMedicamento'];
        


        $validar ="SELECT * FROM recibos WHERE idRecibo='$idrec'";
        $queryi=mysqli_query($mysqli,$validar);
        $fila1=mysqli_fetch_assoc($queryi);
    
       if ($fila1) {
           echo '<script>alert ("Ya existe recibo");</script>';
           echo '<script>windows.location="recibo.php"</script>';
       }
        else if ($idrec=="" || $idvis=="" || $idmedica=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="recibo.php"</script>';
        }

        else
        {

           $insertsql="INSERT INTO recibos(idRecibo,idVisita,idMedicamento) VALUES
           ('$idrec','$idvis','$idmedica')";
           
           mysqli_query($mysqli,$insertsql) or die(mysqli_error());
           echo '<script>alert (" Registro Exitoso, Gracias");</script>';
           echo '<script>window.location="recibo.php"</script>';
        }
    }
?>

<!--este es el diseño de la parte de arriba-->
<form method="POST">

   
    
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    
    <title>taller</title>
</head>
    <body>
        <section class="title">
            <h1 class="text-uppercase fw-bold"> RECIBO</h1>
        </section>
        <section class="d-flex justify-content-center">
            <form name ="frm_usu" method="POST" autocomplete="off">
               
            
       


            
            
            
            
            




     <!--tabla donde se digitan las variables-->
     
        
       
     <div class="mb-3 fw-bold">
            
            <tr>
                    <th colspan="2">Registrar Recibo</th>
                </tr>
                <tr>
                    <th><label>ID RECIBO</label></th>
                    <th><input type="number" name="idRecibo" placeholder="id Recibo" class="form-control"></th>
                </tr>
        </div> 
            <div class="mb-3 fw-bold">
                <tr>
                    
                    <th>ID VISITA</th>
                    <th>
                    <select name="idVisita" class="form-control">
                        <option value="">selecccione la visita a facturar</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila['idVisita']) ?>"><?php echo ($fila['idVisita'])?> </option>
                    <?php  } while($fila=mysqli_fetch_assoc($query));
                    ?>

                    </select> 
                   </th>   
                </tr>
                </div> 
            <div class="mb-3 fw-bold">
                <tr>
                    <th>ID MEDICAMENTO</th>
                    <th>
                    <select name="idMedicamento"class="form-control" >
                        <option value="">SELECCIONE MEDICAMENTO</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila_med['idMedicamento']) ?>"><?php echo ($fila_med['Medicamento'])?> </option>
                    <?php  } while($fila_med=mysqli_fetch_assoc($query_med));
                    ?>

                    </select> 
                   </th>   
                </tr>
               
                </div> 
            <div class="mb-3 fw-bold">
                
                



                
                <tr>
                    <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" name="validar" value="Registrar" class="form-control btn btn-Success btn-sm"></th>
                    <input type="hidden" name="MM_insert" value="formreg">
                </tr>        

                </div> 


            </form>
        </section>

    
       
        
    </body>
</html>