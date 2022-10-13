<?php
    if(isset($_COOKIE['contador']))
    {
        setcookie('contador', $_COOKIE['contador']+ 1, time() + 365 *24 *60 *60);
        $mensaje= 'Gracias por visitarnos. Número de visitas :' . $_COOKIE['contador'];
    }
    else
    {
        //Caduca en un año
        setcookie('contador', 1, time() + 365*24*60*60);
        $mensaje = 'Bienvenido a nuestro sitio web';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorioa 13</title>
</head>
<body>
        <h3><?PHP echo $mensaje;?></h3>
</body>
</html>