<div class="container">
    <div class="card">
        <div class="card-header">
            Excluir venda
        </div>
        <div class="card-body">
            <p>Tem certeza que deseja excluir este venda?</p>
            <a href="<?php echo URL; ?>vendas">
                <button type="button" class="btn btn-secondary">Cancelar</button></a>
            <a href="<?php echo URL; ?>vendas/excluir/?id=<?php echo filter_input(INPUT_GET, 'id', FILTER_DEFAULT); ?>&confirmacao=ok">
                <button type="button" class="btn btn-danger">Excluir</button></a>
        </div>
    </div>
    <?php if (filter_input(INPUT_GET, 'confirmacao', FILTER_DEFAULT) == "ok") {
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
        if ($this->vendas->delete($id) > 0) {
            echo '<div class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Aêêê! A venda <b>' . $id . '</b> foi excluída com sucesso!</p>
          </div>';
        } else {
            echo '<div class="alert alert-danger  mt-4" role="alert">
            <h4 class="alert-heading">Algo errado!</h4>
            <p>Opa! Infelizmente não conseguimos excluir este venda ' . $id . ' no banco de dados.</p>
            <hr>

          </div>';
        }

    } ?>
</div>
