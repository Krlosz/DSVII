<?php
$numero = $_POST['num'];
if($numero>=80){
    echo "<img src='1.png'/>"; 
}
else if(($numero>=50) and ($numero<=79)){
    echo "<img src='2.png'/>"; 
}
    
else{
    echo "<img src='3.png'/>"; 
}
   
?>