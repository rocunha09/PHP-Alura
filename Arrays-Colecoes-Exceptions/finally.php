<?php
//conselho do instrutor: sempre manter EM AMBIENTE DE DESENVOLVIMENTO: o report de erros ativado para todos os tipos, sempre manter o display errors ativado...
//O CONSELHO ASSIM DEVE SER PRATICADO NO php.ini
//um @ na linha de código que está dando erro, vai suprimir os avisos, porém não é aconselhado utilizá-lo
error_reporting(E_ALL);
ini_set('display_errors', 1);

//geralmente os frameworks aproveitam os recursos da linguagem e criam classes próprias para tratamento de erros, para entender melhor, veja em:
//https://www.php.net/manual/en/function.set-error-handler.php

//OBS.: A partir da versão 8 do PHP, todos os erros serão exibidos por padrão, o que evita os casos de erros passarem despercebidos por problemas de configuração.



//estudando funcionamento do finally

$arquivo = fopen('temp.txt', 'w'); //abrir/criar arquivo com permissão de escrita

try {
    echo "Abrindo / Criando arquivo..." . PHP_EOL;
    //se a permissão estiver correta, este texto será gravado no arquivo, caso contrário iremos para o catch
    fwrite($arquivo, 'testando permissão de escrita...'); 

} catch (\Throwable $th) {
    echo "você não tem permissão para editar ester arquivo";

}finally{
    echo "Fechando arquivo...";
    fclose($arquivo);
}

/*
O finally sempre será executado, independente da execução do código passar pelo catch ou não... 
de certa forma tornando-se necesário, e sendo utilizando em momentos bem específicos, como por exemplo fechar um arquivo
mesmo se a operação ter sido completada ou não, evitando assim problemas com o arquivo aberto mesmo após a execução do código...
o caso que é necessário usar o finally: Quando queremos executar um código mesmo após a instrução return, que pode estar no try ou no catch.
*/
