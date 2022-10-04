<?php
include('class_lib.php');
$porc = $_POST['porcentaje'];
$Cal = new Calculo($porc);
$img = $Cal->verificar_porcentaje();

echo "<img src='$img' alt=''>";