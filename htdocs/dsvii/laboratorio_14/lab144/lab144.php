<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <?php
    if (isset($_SESSION["usuario_valido"])) {

    ?>
        <h1>Consulta de noticias</h1>

        <FORM name="FORMFiltro" action="lab92.php" method="post">
            <BR />
            Filtrar por: <select name="campos">
                <option value="texto" selected>Descripcion</option>
                <option value="titulo">Titulo</option>
                <option value="categoria">Categoria</option>
            </select>
            con el valor
            <INPUT type="text" name="valor">
            <INPUT type="submit" name="ConsultarFiltro" value="Filtrar Datos">
            <INPUT name="ConsultarTodos" value="Ver todos" type="submit">
        </FORM>

    <?php
        require_once("../lab142/class/noticias.php");

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

        if ($nfilas > 0) {
            print("<TABLE>\n");
            print("<TR>\n");
            print("<TH>Titulo</TH>\n");
            print("<TH>Texto</TH>\n");
            print("<TH>Categoria</TH>\n");
            print("<TH>Fecha</TH>\n");
            print("<TH>Imagen</TH>\n");
            print("</TR>\n");

            foreach ($noticias as $resultado) {
                print("<TR>\n");
                print("<TD>" . $resultado['titulo'] . "</TD>\n");
                print("<TD>" . $resultado['texto'] . "</TD>\n");
                print("<TD>" . $resultado['categoria'] . "</TD>\n");
                print("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</TD>\n");

                if ($resultado['imagen'] != "") {
                    print("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] . "'>
            <IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
                } else {
                    print("<TD>&nbsp;</TD>\n");
                }
                print("</TR>\n");
            }
            print("</TABLE\n");
        } else {
            print("No hay noticias disponibles");
        }
    } else {
        print("<br><br>\n");
        print("<P align='center'>Acceso no autorizado</P>\n");
        print("<P align='center'>[<a href='login.php' target='_top'>Conectar</a>]</P>\n");
    }
    ?>

</body>

</html>