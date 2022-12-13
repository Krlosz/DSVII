<?php
require_once('modelo.php');

class Consultas extends modeloCredencialesBD
{

    public function __construct()
    {
        parent::__construct();
    }

    public function selectCategorias()
    {
        $instruccion = "Call sp_categorias()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function SelectOne($id)
    {

        $instruccion = "Call sp_selectOne('$id')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        foreach ($resultado as $row) :
            return $row;
        endforeach;
    }

    public function Delete($id)
    {
        require('config_basic.php');
        mysqli_query($conn, "Call sp_delete('$id')");
    }

    public function SelectAll()
    {
        $instruccion = "Call sp_select()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function CategoriaSelect($id)
    {
        require('config_basic.php');
        $select = mysqli_query($conn, "Call sp_selectByCategoria('$id')");
        return $select;
    }

    public function SelectUsuario($u, $p)
    {

        require('config_basic.php');
        $select = mysqli_query($conn, "Call sp_SelectUsuario('$u','$p')");
        return $select;
    }
}

/////inicio de php
// class Consultas
// {

//     public function selectCategorias()
//     {
//         require('config.php');
//         $categorias = mysqli_query($conn, "Call sp_categorias()");
//         //var_dump($categorias);
//         return $categorias;
//     }
//     public function SelectOne($id)
//     {
//         require('config.php');
//         $select = mysqli_query($conn, "Call sp_selectOne('$id')");
//         foreach ($select as $row) :
//             return $row;
//         endforeach;
//     }

//     public function Delete($id)
//     {
//         require('config.php');
//         mysqli_query($conn, "Call sp_delete('$id')");
//     }

//     public function SelectAll()
//     {
//         require('config.php');
//         $select = mysqli_query($conn, "Call sp_select()");
//         return $select;
//     }
//     public function CategoriaSelect($id)
//     {
//         require('config.php');
//         $select = mysqli_query($conn, "Call sp_selectByCategoria('$id')");
//         return $select;
//     }

//     //Consultas de usuario
//     public function SelectUsuario($u, $p)
//     {

//         require('config.php');
//         $select = mysqli_query($conn, "Call sp_SelectUsuario('$u','$p')");
//         return $select;
//     }
// } 
