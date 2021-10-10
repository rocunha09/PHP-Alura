<?php

use Alura\Cursos\Controller\{ListarCursos, FormularioInsercao, Persistencia, Exclusao, formularioEdicao};

$rotas = [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioEdicao::class
];

return $rotas;