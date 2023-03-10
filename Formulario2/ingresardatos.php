<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabla</title>
</head>
<body>
    <?php
    $nombre=$_GET["nombre"];
    $precio=$_GET["precio"];
    $cantidad=$_GET["cantidad"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tec";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "INSERT INTO record (tabla, nombre, correo,calificación,matricula) 
VALUES ('".$Tabla."','".$Nombre."','".$Correo."','".$Calificacion."','".$Matricula."')";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


    ?>

</body>
</html>