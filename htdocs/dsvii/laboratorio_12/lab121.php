<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 12</title>

    <link rel="stylesheet" href="css/estilo.css">
</head>
<h1>Manejo de sesiones</h1>
<h2>Paso 1: se crea la variable de sesion y se almace</h2>

<?php
$var = "Ejemplo Sesiones";
$_SESSION['var'] = $var;
print("<p>Valor de la variable sesion: $var</p>\n")
?>
<a href="lab122.php">Paso 2</a>

<body>

</body>

</html>