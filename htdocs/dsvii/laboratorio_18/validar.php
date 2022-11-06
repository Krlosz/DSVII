<?php
include('validaciones.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$rep_password = $_POST['rep_password'];
$ip = $_POST['ip'];


$val = new validaciones();
$valip = $val->verificar_ip($ip);
$valemail = $val->verificar_email($email);

if ($valip == 0) {
    $valip = "";
} else {
    $valip = "La ip no es invalida";
}


if ($valemail == false) {
    $valemail = "el email no es valido";
} else {
    $valemail = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
</head>

<body>
    <form action="/" method="post">
        <label for="">Nombre</label>
        <br />
        <input type="text" name="nombre" value="<?php echo $nombre ?>" placeholder="Santy" />
        <br />
        <br />

        <label for="">Apellido</label>
        <br />
        <input type="text" name="apellido" value="<?php echo $apellido ?>" placeholder="Mutis" />

        <br />
        <br />

        <label for="">Email</label>
        <br />
        <input type="email" name="email" value="<?php echo $email ?>" placeholder="@Santy@gmail.com" pattern="/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/" />
        <h4><?php echo $valemail ?></h4>

        <label for="">Password</label>
        <br />
        <input type="password" name="password" value="<?php echo $password ?>" placeholder="********" pattern="/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/" />
        <br><br>

        <label for="">Repetir Password</label>
        <br />
        <input type="password" name="rep_password" value="<?php echo $rep_password ?>" placeholder="*****" pattern="/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/" />
        <h4><?php $valpassword = $val->verificar_password_strenght($password); ?></h4>

        <label for="">Ip</label>
        <br />
        <input type="number" name="ip" value="<?php echo $ip ?>" placeholder="12.120,120" />

        <h4><?php echo $valip; ?></h4>
        <input type="submit" value="Registrar Usuario" pattern="/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" . "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/" />
    </form>

</body>

</html>