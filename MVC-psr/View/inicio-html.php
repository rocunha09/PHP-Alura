<!DOCTYPE html>
    <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <title>Document</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        </head>
        <body>

        <?php if(isset($_SESSION['logado'])) { ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/listar-cursos">Lista de Cursos <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/novo-curso">Cadastrar Curso <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item active justify-content-end">
                        <a href="/realiza-logout" class="btn btn-danger btn-sm" id="logout">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php } ?>

        <div class="container">
            <div class="jumbotron">
                <h1><?=$titulo; ?></h1>
            </div>

            <?php if(isset($_SESSION['mensagem'])) { ?>

                <div class="alert alert-<?= $_SESSION['tipoMensagem']; ?>">
                    <?= $_SESSION['mensagem']; ?>
                </div>

            <?php
                    unset($_SESSION['tipoMensagem']);
                    unset($_SESSION['mensagem']);
                }
            ?>