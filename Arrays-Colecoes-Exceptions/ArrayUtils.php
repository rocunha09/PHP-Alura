<?php


class ArrayUtils
{
    public static function remover($elemento, array &$lista)
    {

        $result = array_search($elemento, $lista, true);
        if(is_int($result)){
            unset($lista[$result]);

        } else {
            return false;

        }
    }
}