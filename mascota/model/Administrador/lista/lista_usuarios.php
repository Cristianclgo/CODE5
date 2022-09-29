
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
<tr><br>
    <td colspan='2' align="center">
    <div class="banner"> 
    
        
        <input type="submit" formaction="../indexA.php" value="Regresar"class="btn btn-outline-primary" />
        
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
    <link rel="stylesheet" href="../estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>taller</title>
    
</head>
    <body>
    <header>
            <div class="logo">
                <img src="..\img/logo.png" style="float: left">
            </div>
    </header>
        <section class="title">
            <h1 class="text-uppercase fw-bold">FORMULARIO CONSULTAR USUARIOS</h1>
        </section><br>
        <table class="table table-striped" >
           <!-- <form class="row g-3 needs-validation center"novalidate name ="frm_usu" method="POST" autocomplete="off">-->
                
                    <tr class="table-Success");">
                        
                        <th scope="col">#</th>
                        <th scope="col">ID USUARIO</th>
                        <th scope="col">Nombre</th>
                        <th scope="col"> Direccion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Tipo usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                        <th scope="col"></th>
                    </tr>
                    <tbody>
                        <tr>
                            <th scope="row">

                            <?php
                                $sql="SELECT * FROM usuario,estado, tipousuario WHERE usuario.tipoUsua = tipousuario.tipoUsua and usuario.id_estado= estado.id_estado";
                                $i=0;
                                $query = mysqli_query($mysqli,$sql);
                                while($result=mysqli_fetch_assoc($query)){
                                    $i++;                    
                            ?>
                            </th>
                        </tr>
                  
                    <tr>
                        
                        <td><?php echo $i ?></td>  
                        <td><input name="doc" type="text" value= "<?php echo $result ['iduser']  ?>"class="form-control" > </td>  
                        <td><input name="nom" type="text" value= "<?php echo $result ['nombreUser']  ?>"class="form-control" > </td>  
                    
                        <td><input name="dir" type="text" value= "<?php echo $result ['direccion']  ?>"class="form-control" > </td>  
                        
                        <td><input name="correo" type="email" value= "<?php echo $result ['correo']  ?>"class="form-control" > </td>  
                                             
                        <td><input name="est" type="text" value= "<?php echo $result ['clasiUser']  ?>"class="form-control" > </td>  
                        <td><input name="rol" type="text" value= "<?php echo $result ['estado']  ?>"class="form-control" > </td>  
                        <td><a href="?id=<?php echo $result['iduser'] ?>" onclick="window.open('updateusuario.php?id=<?php echo $result['iduser'] ?>','','width= 600,height=500, toolbar=NO');void(null);"class="btn btn-outline-primary"><i class="fas fa-redo"></i> Update</a></td>
                        <td>
                            <a href="?id=<?php echo $result['iduser'] ?>" onclick="window.open('updateusuario.php?id=<?php echo $result['iduser'] ?>','','width= 600,height=500, toolbar=NO');void(null);"class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete</a></td>    
                    </tr>
                  
                  
                        <?php 
                        }
                        ?>  
            </form>


        </table>


            
        
    </body>
</html>