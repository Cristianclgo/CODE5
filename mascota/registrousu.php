<?php
  
  require_once("db/connection.php");

?>


<?php
    $control = "SELECT * From tip_user WHERE id_tip_user >= 2";
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);
?>



<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $cedula=    $_POST['doc'];
        $nombre=    $_POST['nom'];
        $usuario=   $_POST['user'];
        $clave=     $_POST['pass'];
        $idusu=     $_POST['idusu'];

        $validar ="SELECT * FROM user WHERE cedula='$cedula' or user='$usuario'";
        $queryi=mysqli_query($mysqli,$validar);
        $fila1=mysqli_fetch_assoc($queryi);
    
       if ($fila1) {
           echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN //CAMBIELOS//");</script>';
           echo '<script>windows.location="registrousu.php"</script>';
       }
        else if ($cedula=="" || $nombre=="" || $usuario=="" || $clave=="" || $idusu=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="registrousu.php"</script>';
        }

        else
        {

           $insertsql="INSERT INTO user(cedula,nombres,user,password,id_tip_user) VALUES('$cedula','$nombre','$usuario','$clave','$idusu')";
           mysqli_query($mysqli,$insertsql) or die(mysqli_error());
           echo '<script>alert (" Registro Exitoso, Gracias");</script>';
           echo '<script>window.location="index.html"</script>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="controller/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="login-box">
        <img src="controller/image/logo1.png" class="avatar" alt="Imagen Avar">
               
        <form method="POST" name="formreg" autocomplete="off">
            <label for="usuario"> REGISTRO DE USUARIOS </label> 
            <input type="number" name="doc" placeholder="Ingrese Documento Identidad" >
            <input type="text" name="nom" placeholder="Ingrese Nombres Completos" >
            <input type="text" name="user" placeholder="Ingrese un Usuario" >
            <input type="password" name="pass" placeholder="Ingrese Contraseña" >
            
            <!--select-->

            

            <select name="idusu">
                <option value="">Seleccione uno...</option>
               
               
               <?php
                   do {
                
                ?>
                    <option value="<?php echo($fila['id_tip_user'])?>"> <?php echo($fila['tip_user'])?>

               <?php   
                   }while($fila=mysqli_fetch_assoc($query));
               
               ?>
            </select>


            <input type="submit" name="validar" value="Registrarme">
            <input type="hidden" name="MM_insert" value="formreg">
        </form>


    
    </div>
</body>
</html>