<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laboratorio 4.3</title>
</head>

<body>

    <?php
      session_start();
      
    ?>
     <H2>Laboratorio 4.3: Manejo de Arreglos P1 </H2>
     <form action="lab43.php" method="post">
         <p>Cargar un arreglo unidimensional de 20 elementos, luego mostrar en pantalla la
            posición y el valor del elemento mayor almacenado en el arreglo.</p>
        <input type="text" name="numero" placeholder="Introduzca el valor">
        <input type="submit" value="Cargar">
        <input type="submit" name="reset_btn" value="Resetear" />
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