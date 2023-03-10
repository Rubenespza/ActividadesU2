<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
<?php
    $borrar = $_POST["borrar"];
        
    $enlace = mysqli_connect("localhost", "root", "", "tec");
    $datos = "DELETE FROM `calificaciones` WHERE IdCalificacion=".$borrar.";";
    
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