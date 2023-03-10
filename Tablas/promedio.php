<!DOCTYPE html>
<html lang="en">
<head>
<title>Tablas de Multiplicar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
</head>
<body>
<?php
# Cargar la biblioteca PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

# Crear una instancia de PHPMailer
$mail = new PHPMailer(true);
        $numero = $_POST["numero"];
        $rango1=$_POST["rango1"];
        $rango2=$_POST["rango2"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $cantidad=0;
        $puntos=0;
        if ($rango1 <= $rango2) {
            $cantidad = ($rango2 - $rango1) + 1;
            for ($i=$rango1; $i <= $rango2; $i++) { 
                $respuestaU = $_POST["respuesta".$i];
                $respuesta = ($numero * $i);
                $color = "danger";
                $op=75;
                if ($i % 2 == 0) {
                    $op=50;
                }
                if ($respuestaU == $respuesta) {
                $color = "success";
                $puntos++;
                }
                    echo '
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-6 bg-primary bg-opacity-'.$op.' border-1 rounded-start-3">'.$numero.' x '.$i.'</div>
                            <div class="col-2 bg-'.$color.' border-1 rounded-end-3">Su respuesta: '.$respuestaU.'</div>
                        </div>
                    </div>';
            }
        }
        else{
            $cantidad = ($rango1 - $rango2) + 1;
            for ($i=$rango1; $i >= $rango2; $i--) { 
                $respuestaU = $_POST["respuesta".$i];
                $respuesta = ($numero * $i);
                $color = "danger";
                $op=75;
                if ($i % 2 == 0) {
                    $op=50;
                }
                if ($respuestaU == $respuesta) {
                    $color = "success";
                    $puntos++;
                }
                echo '
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-6 bg-primary bg-opacity-'.$op.' border-0 rounded-start-3">'.$numero.' x '.$i.'</div>
                        <div class="col-2 bg-'.$color.' border-0 rounded-end-3">Su respuesta: '.$respuestaU.'</div>
                    </div>
                </div>';
            }
        }
        $puntiacion = round(($puntos / $cantidad)*100 );
        echo '<h3 class="text-center">Su calificacion total es: '.$puntiacion.' / 100</h3>';

    try {
        # Configurar el servidor SMTP y las credenciales de autenticación
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rubenespza18@hotmail.com';
        $mail->Password = 'Apple1624';
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Port = 587;

        # Configurar los detalles del correo electrónico
        $mail->setFrom('rubenespza18@hotmail.com', 'Tablas de Multiplicar');
        $mail->addAddress($correo, $nombre);
        $mail->isHTML(true);
        $mail->Subject = 'Puntaje logrado';
        $mail->Body    = 'La puntuacion conseguida por practicar la tabla del <b>' . $numero . '</b> entre el rango <b>' . $rango1 . '</b> al <b>' . $rango2 . '</b> es de: <b>'.$puntiacion.'</b>';
        
        #Enviar el correo electrónico
        if($mail->send()) {
            echo 'El correo se ha enviado correctamente.';
        } else {
            echo 'Ha ocurrido un error al enviar el correo: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo 'Mensaje ' . $mail->ErrorInfo;
    }
    $enlace=mysqli_connect("localhost","root","","tablamultiplicacion");
$query="INSERT INTO usuario(Nombre,Tabla,RangoI,RangoF,Puntuacion,Correo) VALUES (?,?,?,?,?,?)";
$sentencia=mysqli_prepare($enlace,$query);
mysqli_stmt_bind_param($sentencia,"ssssis", $nombre,$numero,$rango1,$rango2,$puntiacion,$correo);
mysqli_stmt_execute($sentencia);
mysqli_stmt_close($sentencia);
mysqli_close($enlace);
    ?>
</body>
</html>