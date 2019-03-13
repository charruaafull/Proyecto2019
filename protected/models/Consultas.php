<?php

class Consultas
{

    public static function getProductos($cat = '')
    {
        $sql = "Select * From Pro_Tbl " .
            "Join Lin_Tbl On Lin_Pro = Id_Lin ";
        if ($cat):
            $sql .= " Where Lin_Pro = $cat";
        endif;
        $sql .= " LIMIT 9";
        return sistema::getFilas($sql);
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

}
