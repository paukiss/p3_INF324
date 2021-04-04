<?php 
	include 'cabecera.inc.php';
    include 'conexion.inc.php';

    if (isset($_GET['usuario']))
        $usuario = $_GET["usuario"];
    else 
        $usuario = $_SESSION['usuario'];
    $resUsuario = mysqli_query($con, "select * from usuario where usuario='".$usuario."' ");
    $datosUsuario = mysqli_fetch_array($resUsuario);
    $ci = $datosUsuario['ci'];

    $resPersona = mysqli_query($con, "select * from persona where ci='".$ci."' ");
    $datosPersona = mysqli_fetch_array($resPersona);
    $_SESSION['usuario'] = $usuario
?>


<div  class="cuadro" style="padding: 10% 2% 10% 2%; width: 10%; ">
	Escoge una configuracion:	
	<br>
	<br>
	<form action="ingreso.php" method="GET">
		<select name="color">
			<option value="1">Blue Template</option>   
			<option value="2">Pink Template</option>
			<option value="3">Orange Template</option>
		</select>
        <br><br>
        <input type="submit" value="Cambiar">
	</form>
	
</div>

<div class="cuadro" style="width: 50%; margin-left: 10%; padding: 2%;">

    <br>
    <strong> Nombre Completo: </strong> <?php echo $datosPersona['nombreCompleto']?>
    <br>
    <strong> CI: </strong> <?php echo $datosPersona['ci']?>
    <br>
    <strong> Fecha Nacimiento: </strong> <?php echo $datosPersona['fechaNacimiento']?>
    <br>
    <strong> Departamento: </strong> <?php echo $datosPersona['departamento']?>
    <br>
    <h2>Notas</h2>
  
    <table class="table" style="width: 100%; text-align: center; background-color: white; ">
        <tr>
            <th>Sigla</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota Final</th>
            
        </tr>
        <?php
            $resNota = mysqli_query($con, "select * from nota where ci='".$ci."'");
            echo '<br>';
            while ($datoNota =  mysqli_fetch_array($resNota))
            {
                echo '<tr>';
                echo '<td>' . $datoNota['sigla'] . '</td>';
                echo '<td>' . $datoNota['nota1'] . '</td>';
                echo '<td> '. $datoNota['nota2'] . '</td>';
                echo '<td>' . $datoNota['nota3'] . '</td>';
                echo '<td>' . $datoNota['notaFinal'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>


<?php 
	include 'pie.inc.php';
?>
