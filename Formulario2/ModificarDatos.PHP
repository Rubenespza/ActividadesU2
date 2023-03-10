<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabla</title>
</head>
<body>
<?php

require_once('Config.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_GET["tabla"]!=""){
$Tabla=$_GET["tabla"];
$Nombre=$_GET["nombre"];
$Correo=$_GET["correo"];
$Calificacion=$_GET["calificacion"];
$Matricula=$_GET["matricula"];
$Id=$_GET["idrecord"];

$_GET["tabla"]="";



$sql = "UPDATE record SET tabla='$Tabla',nombre='$Nombre',correo='$Correo',calificación='$Calificacion',matricula='$Matricula' WHERE IdRecord = '$Id'";


$resultado = mysqli_query($conn,$sql);
}
header("Location: Tabla.php"); 
mysqli_close( $conn );



?>
</body>
</html>