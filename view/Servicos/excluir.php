<div class="container">
    <div class="card">
        <div class="card-header">
            Excluir serviço
        </div>
        <div class="card-body">
            <p>Tem certeza que deseja excluir este serviço?</p>
            <a href="?atividade=Servicos"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            <a href="?atividade=Servicos&acao=excluir&id=
              <?php echo filter_input(INPUT_GET, 'id', FILTER_DEFAULT); ?>&confirmacao=ok">
                <button type="button" class="btn btn-danger">Excluir</button></a>
        </div>
    </div>
    <?php if (filter_input(INPUT_GET, 'confirmacao', FILTER_DEFAULT) == "ok") {
        $this->model->excluir(filter_input(INPUT_GET, 'id', FILTER_DEFAULT), "servicos");
    } ?>
</div>
