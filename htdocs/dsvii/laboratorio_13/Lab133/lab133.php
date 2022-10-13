<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Recuperar valor de una Cookie</h1>
    <?php
        if(isset($_COOKIE["user"]))
        
            print("<H2>Bienvenido" . $_COOKIE["user"]. "! </H2></BR>");
        
        else
        
            echo "<H2>Bienvenido invitador! </H2><br>";
            ?>
    <a href="lab131.php">...Regresar</a>&nbsp;
    <a href="lab134.php">Continuar...</a>&nbsp;
</body>
</html>