<?php


class Calculadora
{
    public function calcularMedia(array $notas): ?float
    {
        $quantidadeDeNotas = sizeof($notas);
        $soma = 0;

        if (!$quantidadeDeNotas){
            return null;

        } else {

            for ($i = 0; $i < $quantidadeDeNotas; $i++){
                $soma += $notas[$i];
            }

            return $soma/$quantidadeDeNotas;

        }
    }
}