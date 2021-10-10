<?php include __DIR__ . '/../inicio-html.php'; ?>

<a href="/listar-cursos" class="btn btn-primary mb-2">Voltar</a>
<form action="/salvar-curso<?=isset($curso) ? '?id='. $curso->getid() : '';?>" method="post">
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" class="form-control"
            value="<?= isset($curso) ? $curso->getDescricao() : '';?>"
        >
    </div>
    <button class="btn btn-primary">Salvar</button> 
</form>

<?php include __DIR__ . '/../fim-html.php';?>
