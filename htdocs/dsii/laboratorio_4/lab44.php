<?php

session_start();
$tamaño_arreglo = 20;
$duplicado = false;
$par = true;
$mayor=0;
$indice=0;


if(count($_SESSION['datos'] )== 0){
    $_SESSION['datos'] = array();
}

if (isset($_POST['numero'])) {
  
       
        for ($i=0; $i <count($_SESSION['datos']) ; $i++) { 
            if ((($_POST['numero'])%2  != 0 ) || ($_POST['numero']) == "" ) {
                $duplicado = true;
            }
        }
        
        if ($duplicado ==false) {
            array_push($_SESSION['datos'],$_POST[numero]);
        }

    
        
}

header("location: lab44test.php");


if(isset($_POST["reset"])) {
    $_SESSION['datos'] = array();
  }


if(isset($_POST["ramdon"])) {
    for ($i=0; $i < $tamaño_arreglo ; $i++) { 

        $par = true;
        while ($par == true  ) {
        $aleatorio = rand(0, 100) ;
                
            if($aleatorio%2 != 0){
               //impar
             }else{
                $_SESSION['datos'][$i]= $aleatorio ;
                $par = false;
             }
        }
    }
}


?>
