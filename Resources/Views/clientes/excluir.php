<div class="container">
    <div class="card">
        <div class="card-header">
            Excluir cliente
        </div>
        <div class="card-body">
            <p>Tem certeza que deseja excluir este cliente?</p>
            <a href="<?php echo URL; ?>clientes">
                <button type="button" class="btn btn-secondary">Cancelar</button></a>
            <a href="<?php echo URL; ?>clientes/excluir/?id=<?php echo filter_input(INPUT_GET, 'id', FILTER_DEFAULT); ?>&confirmacao=ok">
                <button type="button" class="btn btn-danger">Excluir</button></a>
        </div>
    </div>
    <?php if (filter_input(INPUT_GET, 'confirmacao', FILTER_DEFAULT) == "ok") {
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
        if ($this->model->delete($id) > 0) {
            echo '<div class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Aêêê! O cliente <b>' . $id . '</b> foi excluido com sucesso!</p>
          </div>';
        } else {
            echo '<div class="alert alert-danger  mt-4" role="alert">
            <h4 class="alert-heading">Algo errado!</h4>
            <p>Opa! Infelizmente não conseguimos excluir este cliente ' . $id . ' no banco de dados.</p>
            <hr>

          </div>';
        }

    } ?>
</div>
