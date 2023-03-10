<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabla</title>
</head>
<body>
<?php
    $editar = $_GET["editar"];
    $nombre = $_GET["nombre"];
    $matricula = $_GET["matricula"];
    $correo = $_GET["correo"];
    $materia = $_GET["materia"];
    $calificacion = $_GET["calificacion"];

    $enlace = mysqli_connect("localhost", "root", "", "tec");
    $datos == "UPDATE calificaciones SET Materia='$materia',Nombre='$nombre',correo='$Correo',Calificacion='$calificacion',Matricula='$matricula' WHERE IdCalificacion = '$editar'";
    if ($enlace->query($datos) == TRUE) {
        $enlace->close();
        header("Location: inicio.php");
        exit();
    } else {
        $enlace->close();
        header("Location: inicio.php");
        exit();
    }
?>
</body>
</html>