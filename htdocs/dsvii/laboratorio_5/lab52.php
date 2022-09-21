<?php
if ($_FILES['nombre_archivo_cliente']['size'] < 1000000) {
    if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
        $nombreDirectorio = "archivos/";
        $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
        $ext = pathinfo($nombrearchivo, PATHINFO_EXTENSION);
        $nombreCompleto = $nombreDirectorio . $nombrearchivo;

        if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {

            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                echo "Archivo repetido, se cambiara el nombre a $nombrearchivo
        <br><br>";
            }
            //if(){}
            move_uploaded_file(
                $_FILES['nombre_archivo_cliente']['tmp_name'],
                $nombreDirectorio . $nombrearchivo
            );

            echo "El archivo se ha subido satisfactoriamente al directorio
        $nombreDirectorio <br><a href='/dsii/laboratorio_5/lab52.html'>volver</a>";
        } else {
            echo 'El tipo de archivo no es correcto, solo se aceptan gif, png, jpg y jpeg.<br><a href="/dsii/laboratorio_5/lab52.html">Volver<a/>';
        }
    }
} else {
    echo 'El archivo debe ser menor a 1 mb<br><a href="/dsii/laboratorio_5/lab52.html">Volver<a/>';
}
?>
<!--this text just prevents saving bug-->