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
    $control = "SELECT * From usuario WHERE tipoUsua = 2 ";
    //WHERE tipoUsua >= 1
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);
?>

<?php
    $sqlm = "SELECT * From mascotasclientes WHERE id_mascota";
    $query_mas=mysqli_query($mysqli,$sqlm);
    $fila_mas=mysqli_fetch_assoc($query_mas);
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
        $idvis=    $_POST['idVisita'];
        $fecha=    $_POST['dateVisita'];
        $Hora=   $_POST['timeVisita'];
        $idusu=     $_POST['iduser'];
        $idmascota=     $_POST['id_mascota'];
        $idestado=     $_POST['idest'];
        $temperatura=     $_POST['temp'];
        $ritmoc=     $_POST['ritmocar'];
        $recomendaciones=     $_POST['reco'];
        $valor=     $_POST['valor'];


        $validar ="SELECT * FROM visita WHERE idVisita='$idvis'";
        $queryi=mysqli_query($mysqli,$validar);
        $fila1=mysqli_fetch_assoc($queryi);
    
       if ($fila1) {
           echo '<script>alert ("id visita ya existe");</script>';
           echo '<script>windows.location="visita.php"</script>';
       }
        else if ($idvis=="" || $fecha=="" || $Hora=="" || $idusu=="" || $idmascota=="" || $idestado==""|| $temperatura==""|| $ritmoc==""|| $recomendaciones==""
        || $valor=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="visita.php"</script>';
        }

        else
        {

           $insertsql="INSERT INTO visita(idVisita,dateVisita,timevisita,iduser,id_mascota,id_estado,temperatura,ritmoCardio,recomendaciones,valor) VALUES
           ('$idvis','$fecha','$Hora','$idusu','$idmascota','$idestado','$temperatura','$ritmoc','$recomendaciones','$valor')";
           
           mysqli_query($mysqli,$insertsql) or die(mysqli_error());
           echo '<script>alert (" Registro Exitoso, Gracias");</script>';
           echo '<script>window.location="visita.php"</script>';
        }
    }
?>

<!--este es el diseño de la parte de arriba-->
<form method="POST">
<tr><br>
    <td colspan='2' align="center">
    <div class="banner"> 

    <input type="submit" formaction="indexV.php" value="Regresar"class="btn btn-outline-primary" />
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
    
    <title>Visita</title>
</head>
    <body>
    <header>
            <div class="logo">
                <img src="img/logo.png" style="float: left">
            </div>
        </header>
        <section class="title">
            <h1 class="text-uppercase fw-bold"> VISITA</h1>
        </section>
        <section class="d-flex justify-content-center">
        <form name ="frm_usu" method="POST" autocomplete="off">  
            




     <!--tabla donde se digitan las variables-->
     
        
         <div class="mb-3">
                <tr>
                    <th><label>ID VISITA</label></th>
                    <th><input type="number" name="idVisita" placeholder="id Visita"class="form-control" ></th>
                </tr>
                </div> 
        <div class="mb-3">
                <tr>
                    <th><label>FECHA VISITA</label></th>
                    <th><input type="date" name="dateVisita" placeholder="seleccione fecha visita" ></th>
                </tr>
               
        
                <tr>
                    <th><label>HORA VISITA</label></th>
                    <th><input type="time" name="timeVisita" placeholder="Direccion" ></th>
                </tr>
                </div> 
        <div class="mb-3">
                
                <tr>
                    <th>PROPIETARIO</th>
                    <th>
                    <select name="iduser" class="form-select">
                        <option value="">SELECCIONE EL PROPIETARIO DE LA MASCOTA</option>
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
                    <th>MASCOTA</th>
                    <th>
                    <select name="id_mascota" class="form-select">
                        <option value="">SELECCIONE MASCOTA A ATENDER</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila_mas['id_mascota']) ?>"><?php echo ($fila_mas['nom_masc'])?> </option>
                    <?php  } while($fila_mas=mysqli_fetch_assoc($query_mas));
                    ?>

                    </select> 
                   </th>   
                </tr>
                </div> 
        <div class="mb-3">

                <tr>
                    <th><label>ESTADO DE MASCOTA</label></th>
                    <th>
                    <select name="idest"class="form-select" >
                        <option value="">seleccione el estado de la mascota</option>
                          <?php
                            do{

                         ?>
                    <option value="<?php echo ($fila_est['id_estado']) ?>"><?php echo ($fila_est['estado'])?> </option>
                    <?php  } while($fila_est=mysqli_fetch_assoc($query_est));
                    ?>

                    </select> 
                   </th>   
                </tr>
                </div> 
        <div class="mb-3">
                <tr>
                    <th><label>TEMPERATURA</label></th>
                    <th><input type="number" name="temp" placeholder="Digite temperatura"class="form-control" ></th>
                </tr>
                </div> 
        <div class="mb-3">

                <tr>
                    <th><label>RITMO CARDIACO</label></th>
                    <th><input type="number" name="ritmocar" placeholder="Digite ritmo cardiaco"class="form-control" ></th>
                </tr>

                <tr>
                    <th><label>RECOMENDACIONES</label></th>
                    <th><input type="text" name="reco" placeholder="Digite recomendaciones"class="form-control" ></th>
                </tr>

                <tr>
                    <th><label>VALOR</label></th>
                    <th><input type="money" name="valor" placeholder="Digite Valor"class="form-control" ></th>
                </tr>
                

                </div> 
        
                
                <tr>
                    <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <button class="form-control btn btn-success">
                    <th colspan="2"><input type="submit" name="validar" value="Registrar"class="form-control btn btn-success"></th>
                    <input type="hidden" name="MM_insert" value="formreg" >
                    </button>
                </tr>        

                
       


            </form>
        </section>

    
       
        
    </body>
</html>