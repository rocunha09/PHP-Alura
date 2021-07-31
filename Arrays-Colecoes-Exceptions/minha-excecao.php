<?php

//criando uma exceção personalizada
//este é apenas um exemplo

class MinhaExcecao extends DomainException
{
    public function exibeNome()
    {
        echo "Rafael";
    }
}

try {
    throw  new MinhaExcecao();
} catch (MinhaExcecao $e) {
    $e->exibeNome();
}
