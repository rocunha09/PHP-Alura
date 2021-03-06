<?php include __DIR__ . '/../inicio-html.php'; ?>

    <?php if(isset($_SESSION['mensagem'])) { ?>

        <div class="alert alert-<?= $_SESSION['tipoMensagem']; ?>">
            <?= $_SESSION['mensagem']; ?>
        </div>

    <?php
            unset($_SESSION['tipoMensagem']);
            unset($_SESSION['mensagem']);
        }
    ?>
    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <spam class="justify-content-start"><?= $curso->getDescricao(); ?></spam>
                <spam class="justify-content-end">
                    <a href="/alterar-curso?id=<?= $curso->getId(); ?>" class="btn btn-warning btn-sm"  id="<?= $curso->getId(); ?>"><i class="material-icons">mode_edit</i></a>
                    <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-danger btn-sm" id="<?= $curso->getId(); ?>"><i class="material-icons">delete_forever</i></a>
                </spam>
            </li>
        <?php endforeach; ?>
    </ul>
    
<?php include __DIR__ . '/../fim-html.php';?>