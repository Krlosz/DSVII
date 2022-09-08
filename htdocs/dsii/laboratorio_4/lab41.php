<?php
$numero = $_POST['num'];
function obtener_factorial($numero)
{
   if($numero==1)
      return 1;
   else
      return $numero * obtener_factorial($numero-1);
} 
$resultado = obtener_factorial($numero);
echo "<br/> El factorial es ". $resultado ;
?>