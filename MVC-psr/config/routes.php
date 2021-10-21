<?php

use Alura\Cursos\Controller\{CursosEmJson,
    CursosEmXML,
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    FormularioLogin,
    ListarCursos,
    Persistencia,
    RealizarLogin,
    RealizarLogout};

$rotas = [
    '/novo-curso' => FormularioInsercao::class,
    '/alterar-curso' => FormularioEdicao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/listar-cursos' => ListarCursos::class,
    '/realiza-login' => RealizarLogin::class,
    '/realiza-logout' => RealizarLogout::class,
    '/login' => FormularioLogin::class,
    '/listaDeCursosJson' => CursosEmJson::class,
    '/listaDeCursosXML' => CursosEmXML::class
];

return $rotas;