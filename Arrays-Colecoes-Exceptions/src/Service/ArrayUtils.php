<?php

namespace Arrays\Service;

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

    public static function encontrarCorrentistasMaiorSaldo(int $saldoInformado, array $lista):array
    {
        $correntistasSaldoMaior = array();

        foreach($lista as $correntista => $saldo){
            if($saldo > $saldoInformado){
                $correntistasSaldoMaior[] = [$correntista => $saldo];
            }
        }
        return $correntistasSaldoMaior;

    }
}