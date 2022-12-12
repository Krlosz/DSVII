<?php
session_start();
include "Class/config.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        require_once('Class/Consultas.php');
        $obj_usuario = new Consultas();
        $result = $obj_usuario->SelectUsuario($uname, $pass);
        //$sql = "SELECT * FROM usuarios WHERE usuario='$uname' AND Contraseña='$pass'";
        // $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['usuario'] === $uname && $row['Contraseña'] === $pass) {
                $_SESSION['usuario'] = $row['usuario'];
                //$_SESSION['nombre'] = $row['nombre'];
                $_SESSION['id'] = $row['id'];
                header("Location: Productos.php");
                exit();
            } else {
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
