<!DOCTYPE html>
<html >
<head>
    <title>Laboratorio 4.4</title>
</head>
<body>
    
    <?php
      session_start();
      
    ?>

     <H2>Laboratorio 4.4: Manejo de Arreglos P2 </H2>
     <p>Llenar un arreglo solo con números pares. Si se introduce un número impar, solicitar al usuario 
        introduzca un valor correcto hasta que así sea; luego continuar con el siguiente número.</p>
    <form action="lab44.php" method="post">
        <input type="text" name="numero" placeholder="Introduzca el valor">
        <input type="submit" value="Cargar">
        <input type="submit" name="reset" value="Resetear" />
    </form>
    <br/>
    <table border="2">
        <tr  >
            <td>Indice</td>
            <td>Valor</td>
        </tr>
        <?php foreach ($_SESSION['datos'] as $key =>$value): ?>
        <tr>
            <td><?php echo $key  ?></td>
            <td><?php echo $value  ?></td>

        </tr>
        <?php endforeach ?>
    </table>
    



</body>
</html>