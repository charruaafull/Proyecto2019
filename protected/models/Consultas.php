<?php

class Consultas
{

    public static function getProductos($cat = '', $pag = '')
    {
        if ($pag):
            if ($pag == 1):
                $offset = 0;
            else:
                $offset = ($pag - 1) * 9;
            endif;
        endif;
        $sql = "Select * From Pro_Tbl " .
            "Join Lin_Tbl On Lin_Pro = Id_Lin ";
        if ($cat):
            $sql .= " Where Lin_Pro = $cat";
        endif;
        $sql .= " LIMIT 9 ";
        if ($pag):
            $sql .= "OFFSET $offset";
        endif;
        return sistema::getFilas($sql);
    }

    public static function getTotalProductos($cat)
    {
        $sql = "Select count(*) as tot From Pro_Tbl Where Lin_Pro = $cat";
        $res = sistema::getFila($sql);
        return $res['tot'];
    }

    public static function getProducto($prod)
    {
        $sql = "Select * From Pro_Tbl Where Id_Pro = $prod";
        return sistema::getFila($sql);
    }

    public static function getCategorias()
    {
        $sql = "Select * From Lin_Tbl";
        return sistema::getFilas($sql);
    }

    public static function nuevoUsuario($username, $nombre, $apellido, $email, $password)
    {
        $sql = "Insert Into " .
            "Usu_Tbl " .
            "(" .
            "Use_Usu," .
            "Nom_Usu," .
            "Ape_Usu," .
            "Eml_Usu," .
            "Psw_Usu" .
            ") " .
            "VALUES " .
            "(" .
            "'$username'," .
            "'$nombre'," .
            "'$apellido'," .
            "'$email'," .
            "'$password'" .
            ")";
        return sistema::execute($sql);
    }

    public static function getCuenta($username, $password)
    {
        $sql = "Select * From Usu_Tbl Where Use_Usu = '$username' and Psw_Usu = '$password'";
        return sistema::getFila($sql);
    }

}
