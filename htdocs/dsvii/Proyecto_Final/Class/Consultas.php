<?php


class Consultas
{

    public function selectCategorias()
    {
        require('config.php');
        $categorias = mysqli_query($conn, "Call sp_categorias()");
        //var_dump($categorias);
        return $categorias;
    }
    public function SelectOne($id)
    {
        require('config.php');
        $select = mysqli_query($conn, "Call sp_selectOne('$id')");
        foreach ($select as $row) :
            return $row;
        endforeach;
    }

    public function Delete($id)
    {
        require('config.php');
        mysqli_query($conn, "Call sp_delete('$id')");
    }

    public function SelectAll()
    {
        require('config.php');
        $select = mysqli_query($conn, "Call sp_select()");
        return $select;
    }
    public function CategoriaSelect($id)
    {
        require('config.php');
        $select = mysqli_query($conn, "Call sp_selectByCategoria('$id')");
        return $select;
    }

    //Consultas de usuario
    public function SelectUsuario($u, $p)
    {

        require('config.php');
        $select = mysqli_query($conn, "Call sp_SelectUsuario('$u','$p')");
        return $select;
    }
}
