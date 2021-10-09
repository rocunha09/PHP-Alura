<?php

if(!empty($_SERVER["PATH_INFO"])){
   
    switch ($_SERVER["PATH_INFO"]) {
        case '/listar-cursos':
            require "listar-cursos.php";
            break;
    
        case '/novo-curso':
            require "formulario-novo-curso.php";
            break;
        
        default:
            echo "<h1>404 - page Not Found</h1>";
            break;
    }

} else {
    echo "<h1>404 - page Not Found</h1>";
}


