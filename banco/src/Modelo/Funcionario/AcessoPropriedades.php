<?php


namespace Banco\Modelo\Funcionario;


trait AcessoPropriedades
{
    public function __get($name)
    {
        $metodo = 'recupera' . ucfirst($name);
        echo $this->$metodo();

    }

    public function __set($atributo, $valor)
    {
        $atributo = strtolower($atributo);
        $this->$atributo = $valor;
    }
}