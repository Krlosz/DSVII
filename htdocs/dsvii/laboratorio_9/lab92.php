<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <h1>Consulta de noticias</h1>
    <form name="FormFiltro" method="post" action="lab92.php">
        <br>
        Filtrar por: <select name="campos">
            <option value="texto" selected>Descripcion
            <option value="titulo" selected>Titulo
            <option value="categoria" selected>Categoria
        </select>
        con el valor
        <input type="text" name="valor">
        <input name="ConsultarFiltro" value="Filtrar Datos" type="submit" />
        <input name="ConsultarTodos" value="Ver Todos" type="submit" />
    </form>


    <?php
    require_once("class/noticias.php");

    $obj_noticia = new noticia();
    $noticias = $obj_noticia->consultar_noticias();

    if (array_key_exists('ConsultarTodos', $_POST)) {
        $obj_noticia = new noticia();
        $noticias_new = $obj_noticia->consultar_noticias();
    }
    if (array_key_exists('ConsultarFiltro', $_POST)) {
        $obj_noticia = new noticia();
        $noticias = $obj_noticia->consultar_noticias_filtro($_REQUEST['campos'], $_REQUEST['valor']);
    }

    $nfilas = count($noticias);
    echo $nfilas;
    if ($nfilas > 0) {
        print("<table>\n");
        print("<tr>\n");
        print("<th>Titulo</th>\n");
        print("<th>Texto</th>\n");
        print("<th>Categoria</th>\n");
        print("<th>fecha</th>\n");
        print("<th>imagen</th>\n");
        print("</tr>\n");

        foreach ($noticias as $resultado) {
            print("<tr>\n");
            print("<td>" . $resultado['titulo'] . "</td>\n");
            print("<td>" . $resultado['texto'] . "</td>\n");
            print("<td>" . $resultado['categoria'] . "</td>\n");
            print("<td>" . date("j/n/y", strtotime($resultado['fecha'])) . "</td>\n");

            if ($resultado['imagen'] != "") {
                print("<td><a target='_blank' href='img/" . $resultado['imagen'] . "'><img border='0' src='img/iconotexto.gif'></a></td>");
            } else {
                print("<td>&nbsp;</td>\n");
            }
            print("</tr>\n");
        }
        print("</table>\n");
    } else {
        print("no hay noticias disponibles");
    }

    ?>


</body>

</html>