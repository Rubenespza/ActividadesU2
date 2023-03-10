<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<head>
<title>Tablas de Multiplicar</title>
</head>
<body>
<form action="promedio.php" method="post">

<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$numero = $_POST['numero'];
      echo '
      <input type="hidden" id="numero" name="numero" value="'.$numero.'">';
			$rango1 = $_POST['rango1'];
      echo '
      <input type="hidden" id="rango1" name="rango1" value="'.$rango1.'">';
			$rango2 = $_POST['rango2'];
      echo '
      <input type="hidden" id="rango2" name="rango2" value="'.$rango2.'">';
      $nombre = $_POST['nombre'];
      echo '
      <input type="hidden" id="nombre" name="nombre" value="'.$nombre.'">';
      $correo = $_POST['correo'];
      echo '
      <input type="hidden" id="correo" name="correo" value="'.$correo.'">';
      echo "<table border='0'>";

			echo "<h2>Tabla de multiplicación del $numero</h2>";
      if ($rango1<=$rango2) {
        for ($i = $rango1; $i <= $rango2; $i++) {
          $respuesta = isset($_POST['respuesta'.$i]) ? $_POST['respuesta'.$i] : '';
          echo "<tr><td>$numero x $i</td><td>
          <input type='text' id='respuesta".$i."' name='respuesta".$i."' value='$respuesta'></td></tr>";
        }
      }
      else {
        for ($i = $rango1; $i >= $rango2; $i--) {
          $respuesta = isset($_POST['respuesta'.$i]) ? $_POST['respuesta'.$i] : '';
          echo "<tr><td>$numero x $i</td><td>
          <input type='text' id='respuesta".$i."' name='respuesta".$i."' value='$respuesta'></td></tr>";
        }
      }

			
			
			echo "</table>";
		}
    echo "</table>";
    echo "<button type='submit'>Calcular</button>";
    echo "</form>";
	?>
</body>
</html>