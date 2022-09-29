<?php
  
  require_once("db/connection.php");

?>


<?php
    $control = "SELECT * From tipousuario WHERE tipoUsua >= 2";
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);
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
        else if ($idusu=="" || $nombreUsu=="" || $direccion=="" || $correo=="" || $tipoUsua=="" || $idestado=="" || $contraseña=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
           echo '<script>windows.location="registrousu.php"</script>';
        }

        else
        {

           $insertsql="INSERT INTO usuario(iduser,nombreUser,direccion,correo,tipoUsua,id_estado,contraseña) VALUES('$idusu','$nombreUsu','$direccion','$correo','$tipoUsua','$idestado','$contraseña')";
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
            <input type="number" name="idusu" placeholder="Ingrese Documento Identidad" >
            <input type="text" name="nom" placeholder="Ingrese Nombres Completos" >
            <input type="text" name="dir" placeholder="Direccion" >
            <input type="email" name="correo" placeholder="Ingrese el correo" >
            <input type="number" name="tipousua" placeholder="ingrese tipo usuario" >
            <input type="text" name="idest" placeholder="ingrese estado del usuario" >
            <input type="password" name="pass" placeholder="Ingrese Contraseña" >
            
            <!--select-->

            



            <input type="submit" name="validar" value="Registrarme">
            <input type="hidden" name="MM_insert" value="formreg">
        </form>


    
    </div>
</body>
</html>