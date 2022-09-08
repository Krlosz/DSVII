<?php
$numero1 = $_POST['numero1'];
$numero2 = $_POST['numero2'];
$numero3 = $_POST['numero3'];
$numero4 = $_POST['numero4'];
$numero5 = $_POST['numero5'];
$numero6 = $_POST['numero6'];

$suma1=$numero1+$numero2;
$suma2=$numero3+$numero4;
$suma3=$numero5+$numero6;

echo "<table border=3>";
   // for ($i=1; $i<=1; $i++)
  //  {

        echo "<td>".$numero1."</td>";
        echo "<td>".$numero2."</td>";
        echo "<td>".$suma1."</td>";
        echo "<td>".$numero3."</td>";
        echo "<td>".$numero4."</td>";
        echo "<td>".$suma2."</td>";
        echo "<td>".$numero5."</td>";
        echo "<td>".$numero6."</td>";
        echo "<td>".$suma3."</td>";
        echo "</tr>";
   // }
    echo "</table>";

?>



