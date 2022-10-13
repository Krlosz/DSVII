<?php
    if(array_key_exists('enviar', $_POST))
    {
        $expire = time()+60*5;
        setcookie("user", $_REQUEST['visitante'], $expire);
        header("Refresh:0");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 13</title>
</head>
<body>
    <h1> Creacion de Cookies</h1>
    <h2>La cookie "User" tendrá sólo 5 minutos de duración</h2>
    <?php
        if(isset($_COOKIE["user"]))
        {
            print("<BR/> Hola <BR>". $_COOKIE["user"]. "</BR> gracias por visitar nuestro sitio web <BR/>");
        }
        else
        {
            ?>
            <form name="formcookie" method="post" action="lab142.php">
            <br/>Hola, primera vez que te vemos por nuestro sitio web ¿Cómo te llamas?
            <input type="text" name="visitante">
            <input name="enviar" type="submit" value="Gracias por identificarte">
            </form>
            <?PHP
        }
    ?>
</body>
</html>