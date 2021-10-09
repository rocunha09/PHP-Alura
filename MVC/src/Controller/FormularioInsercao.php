<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao implements InterfaceControladorRequisicao
{
    public function processaRequisicao() :void
    {
        $titulo = "Cadastrar Curso";
        require_once __DIR__ . '/../../View/cursos/formulario.php';
    }

}