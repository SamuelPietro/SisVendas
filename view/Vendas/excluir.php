<div class="container">
    <div class="card">
        <div class="card-header">
            Excluir venda
        </div>
        <div class="card-body">
            <p>Tem certeza que deseja excluir este venda?</p>
            <a href="?atividade=Vendas"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            <a href="?atividade=Vendas&acao=excluir&id=
              <?php echo filter_input(INPUT_GET, 'id', FILTER_DEFAULT); ?>&confirmacao=ok">
                <button type="button" class="btn btn-danger">Excluir</button></a>
        </div>
    </div>
    <?php if (filter_input(INPUT_GET, 'confirmacao', FILTER_DEFAULT) == "ok") {
        $this->model->excluir(filter_input(INPUT_GET, 'id', FILTER_DEFAULT), "vendas");
    } ?>
</div>
