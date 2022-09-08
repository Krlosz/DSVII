<?php

    session_start();
    if(count($_SESSION['datos'] )== 0){
        $_SESSION['datos'] = array();
    }

    if (isset($_POST['numero'])) {
  
        array_push($_SESSION['datos'],$_POST[numero]);
}

header("location: lab43test.php");

if(isset($_POST["reset_btn"])) {
    $_SESSION['datos'] = array();
  }
?>
