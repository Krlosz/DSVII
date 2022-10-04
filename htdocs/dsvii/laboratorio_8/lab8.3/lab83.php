<?php
include('../lab8.1/class_lib.php');
$num = $_POST['num'];
$Cal = new Calculo($num);
$Cal->matrix();