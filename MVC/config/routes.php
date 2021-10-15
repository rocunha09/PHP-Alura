<?php

use Alura\Cursos\Controller\{RealizarLogin,
    ListarCursos,
    FormularioInsercao,
    Persistencia,
    Exclusao,
    formularioEdicao,
    FormularioLogin,
    RealizarLogout};

$rotas = [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioEdicao::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class,
    '/realiza-logout' => RealizarLogout::class
];

return $rotas;