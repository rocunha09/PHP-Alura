<?php
namespace Alura\Cursos\Controller;

class RealizarLogout implements InterfaceControladorRequisicao
{

    public function processaRequisicao(): void
    {
        session_destroy();

        header('Location: /login', true, 302);

    }
}