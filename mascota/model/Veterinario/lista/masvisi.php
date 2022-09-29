
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
        
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        
        <input type="submit" formaction="../indexV.php" value="Regresar"class="btn btn-outline-primary" />
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>taller</title>
    
</head>

    <body>
   
        <section class="title">
            <h1  class="text-uppercase fw-bold">FORMULARIO CONSULTAR VISITAS</h1>
        </section>
        <table class="table table-striped" >
            <form name="frm_consulta" method="POST" autocomplete="off">
            <tr class="table-info");">
                        
                        <th scope="col">#</th>
                        <th scope="col">ID VISITA</th>
                        <th scope="col">FECHA DE VISITA</th>
                        <th scope="col">HORA DE VISITA</th>
                        <th scope="col">ID PROPIETARIO </th>
                        <th scope="col">PROPIETARIO </th>
                        <th scope="col">MASCOTA</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">TEMPERATURA</th>
                        <th scope="col">RITMO CARDIACO</th>
                        <th scope="col">RECOMENDACIONES</th>
                        <th scope="col">VALOR</th>
                        <th scope="col">ACCION 1</th>
                        
                        <th scope="col">ACCION 2</th>
            </tr>
            <tbody>
            <tr>
                <?php
                    $sql="SELECT * FROM visita,usuario,mascotasclientes,estado where visita.iduser = usuario.iduser 
                    and visita.id_estado = estado.id_estado and usuario.iduser = mascotasclientes.iduser";
                    $i=0;
                    $query = mysqli_query($mysqli,$sql);
                    while($result=mysqli_fetch_assoc($query)){
                        $i++;                    
                ?>
            </tr>                
                <tr>
                    <td><?php echo $i ?></td>  
                    <td><input readonly name="idvis" type="text" value= "<?php echo $result ['idVisita']  ?>"class="form-control"> </td>  
                    <td><input readonly name="fechavis" type="date" value= "<?php echo $result ['dateVisita']  ?>"class="form-control"> </td>  
                   
                    <td><input readonly name="horvis" type="hour" value= "<?php echo $result ['timeVisita']  ?>"class="form-control"> </td>  
                    
                    <td><input  readonly name="idusu" type="number" value= "<?php echo $result ['iduser']  ?>"class="form-control"> </td>  
                    <td><input  readonly name="prop" type="text" value= "<?php echo $result ['nombreUser']  ?>"class="form-control"> </td>                     

                    <td><input readonly name="mas" type="text" value= "<?php echo $result ['nom_masc']  ?>"class="form-control"> </td>
                    <td><input readonly name="est" type="text" value= "<?php echo $result ['estado']  ?>"class="form-control"> </td>  


                    <td><input readonly name="tem" type="text" value= "<?php echo $result ['temperatura']  ?>"class="form-control"> </td> 
                    <td><input readonly name="ritmo" type="text" value= "<?php echo $result ['ritmoCardio']  ?>"class="form-control"> </td>
                      

                    <td><input readonly name="recom" type="text" value= "<?php echo $result ['recomendaciones']  ?>"class="form-control"> </td> 
                    <td><input readonly name="val" type="text" value= "<?php echo $result ['valor']  ?>"class="form-control"> </td> 

                    <td>
                        <button type="button" class="btn btn-primary">
                            <a href="?id=<?php echo $result['iduser'] ?>" onclick="window.open('recibo.php?id=<?php echo $result['iduser'] ?>','','width= 2000,height=1000, toolbar=NO');void(null);"class="btn btn-primary btn-sm">
                            <i class="fas fa-prescription-bottle-alt btn-outline-light"></i><br> MEDICAMENTOS</a>
                        </button>
                    </td>
                    <td>
                    <button type="button" class="btn btn-Success">     
                        <a href="?id=<?php echo $result['idVisita'] ?>" onclick="window.open('med1.php?id=<?php echo $result['idVisita'] ?>','','width= 600,height=500, toolbar=NO');void(null);"class="btn btn-Success btn-sm">
                        <i class="fas fa-pills btn-outline-light"></i><br>MEDICAMENTOS RECETADOS</a>
                    </button></td>   
                </tr>
                    <?php 
                    }
                    ?>  
            </form>

            
        </table>
        

            
        
    </body>
</html>