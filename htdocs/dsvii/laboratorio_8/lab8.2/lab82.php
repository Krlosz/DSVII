<?php
include('../lab8.1/class_lib.php');
$num = $_POST['num'];
$Cal = new Calculo($num);
$resul = $Cal->factorial_num();

echo   "<h1>El resultado del factorial es: $resul</h1>";