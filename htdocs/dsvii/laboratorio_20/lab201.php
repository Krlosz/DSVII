<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 20</title>
</head>

<body>
    <form action="lab201.php" method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        Email: <input type="email" name="email"><br>
        Edad: <input type="number" name="edad" min="0" max="120"><br><br>
        <input type="submit" name="guardar" value="Guardar Datos">

    </form>
    <?php

    include("UsuariosMDB.php");
    $usrs = new UsuariosMDB();
    if (array_key_exists('guardar', $_POST)) {
        $usrs->insertarRegistro($_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['email'], $_REQUEST['edad']);
        echo "registro insertado exitosamente <br><br>";
    }
    echo "Registros en la coleccion usuarios: <br>";
    $usrs->obtenerRegistros()


    ?>


</body>

</html>