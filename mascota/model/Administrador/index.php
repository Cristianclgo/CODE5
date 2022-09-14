<?php
    require_once("../../db/connection.php");
    session_start();
    $query = "SELECT * FROM user, tip_user WHERE cedula = '".$_SESSION['id_user']."' AND user.id_tip_user = tip_user.id_tip_user";
    $usuarios = mysqli_query($mysqli, $query) or die(mysqli_error());
    $row_usuarios = mysqli_fetch_assoc($usuarios);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Formulario Inicio Sesion | CAEC</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="form1.usuario.focus()">

    <div class="login-box">
        <!--crea una caja imaginaria-->
        

        <!--insertamos una imagen-->
        <h1>REPORTE POR FECHAS <?php echo $row_usuarios['nombres'];?>  <?php echo $row_usuarios['tip_user'];?></h1>
        <!--Inserta titulo-->
        <form method="POST" name="form1" id="form1" autocomplete="off">
            <!--crea formularios-->
            <table width="1095" border="1">
                <tr>
                    <label for="fechini">Fecha Inicial </label>
                    <input type="date" name="fechini" id="fechini">
                    <label for="fechfin">Fecha Final</label>
                    <input type="date" name="fechfin" id="fechfin">
                    <input type="text" value="<?php echo $row_usuarios['tip_user'];?>">
                    <input type="submit" name="inicio" id="inicio" value="BUSCAR">
                </tr>
                <tr bgcolor="#E9D2FF">
                    <td width="49" align="center">ID</td>
                    <td width="149" align="center">NOMBRE</td>
                    <td width="49" align="center">Fecha Ingreso</td>
                    <td width="149" align="center">fecha Final</td>
                </tr>


                <?php 
            
                if(isset($_POST["inicio"]))
                {
	                $btn=$_POST["inicio"];
                	//$bus=$_POST["txtbus"]; para buscar con la cedula
	                $fechini=$_POST["fechini"];
	                $fechfinal=$_POST["fechfin"];
                    if($fechini=="" || $fechfinal=="")
	                {
	                    echo '<script>alert (" DATOS VACIOS, INGRESE FECHA INICIAL Y FINAL PARA CONSULTAR");</script>';
	
        	        }
	                else
	                {
                        $sql="SELECT * FROM `reporte` WHERE `f_ini` >= '$fechini' AND f_sal <= '$fechfinal'"; 
                        $i=0;
                        $cs = mysqli_query($mysqli, $sql);
                        while($resul=mysqli_fetch_array($cs))
                            {
                            $i++;
                    ?>
            <tr>
                <td align="center"><span class="Estilo30"><?php echo $resul['id_entrada']?></span></td>
            </tr>

    <?php }}}?>
            </table>


        </form>
    </div>
</body>

</html>

