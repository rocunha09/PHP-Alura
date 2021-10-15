<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;

class FormularioInsercao implements InterfaceControladorRequisicao
{
    /*
     * Um recurso muito interessante do PHP, chamado de Trait,
     * permite ter um pedaço de código compartilhado entre classes
     * como se ele tivesse sido escrito individualmente em cada uma delas.
     * Isso inclui acessar propriedades e métodos privados.
     *
     * desta forma eliminamos a herança que havia em uma classe abstrata que
     * apenas auxiliava na renderização do html.
     */
    use RenderizadorDeHtmlTrait;

    public function processaRequisicao() :void
    {
        echo $this->renderizaHtml('cursos/formulario.php', [
            "titulo" => "Cadastrar Curso"
        ]);

    }

}