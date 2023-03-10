<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    /*$datos = "UPDATE `calificaciones` SET `IdCalificacion`='".$editar."',`Nombre`='".$nombre."',`Matricula`='".$matricula."',`Correo`='".$correo."',`Materia`='".$materia."',`Calificacion`='".$calificacion."' WHERE IdCalificacion=".$editar.";";*/

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