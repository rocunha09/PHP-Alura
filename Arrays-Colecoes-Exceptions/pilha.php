<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    //isto gera uma exception
    /*
    $arrayFixo = new splFixedArray(2);
    $arrayFixo[3] = 'Valor';
    */
    
    //isto gera um error
    /*
    $divisao = intdiv(5, 0);
    */

    //tratando com try catch
    //tente execuar, se não conseguir pegue o erro e exiba uma mensagem na tela...
    //neste caso pegamos apenas o erro em um pedaço de código, porém isso pode ser encapsulado
    //ou seja, digamos que este erro ocorreu na função 2, e a função 1 colocou a execução inteira da função 2 no bloco try catch
    //desta forma a função 2 inteira não seria executada se houvesse um erro
    /*
    try{
        $arrayFixo = new splFixedArray(2);
        $arrayFixo[3] = 'Valor';
    }catch(RuntimeException $problema){
        echo "Aconteceu um erro na função 1" . PHP_EOL;
    }
    */

    //podemos ter mais de um catch para o tratamento, ou realizar o multi catch que é quando colocamos em um único bloco separando-os por um Pipe
    // multicatch ficaria assim: }catch (RuntimeException | DivisionByZeroError $problema){}
    
    try{
        funcao2();

    }catch(RuntimeException $problema){
        echo "erro na função 2, tratado..." .PHP_EOL;        
    }catch(DivisionByZeroError $problema){
        echo "erro na função 2, tratado..." .PHP_EOL;        
    }

    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    
    echo 'Entrei na função 2' . PHP_EOL;


        $arrayFixo = new splFixedArray(2);
        $arrayFixo[3] = 'Valor';
        $divisao = intdiv(5, 0); //isto gera um error que será tratado no catch da função 1
    
    
        for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    //var_dump(debug_backtrace()); //visualizando a pilha de execução para debug
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
