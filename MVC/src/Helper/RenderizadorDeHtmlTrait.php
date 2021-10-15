<?php


namespace Alura\Cursos\Helper;


trait RenderizadorDeHtmlTrait
{
    public function renderizaHtml(string $caminhoTemplate, array $dados) :string
    {
        //extraindo as variáveis do array de dados.
        extract($dados);

        //usando ouput buffer pode-se capturar o que veio do arquivo, empacotar tudo em uma string
        //esta por sua vez é chamada de html para retornar, e então pimpa-se o buffer, onde o método foi chamado
        //será realizado um echo nesta string.
        ob_start();
        require __DIR__ . '/../../view/' . $caminhoTemplate;

        //pega o conteúdo e limpa o buffer de uma vez
        $html = ob_get_clean();

        return $html;
    }
}