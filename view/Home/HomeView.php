
<div class="container print">
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title">Vendas diarias</h4>
            <?php $this->model->grafVendasDiaria(); ?>
        </div>

        <div class="card-body">
            <div class="container d-flex flex-wrap justify-content-center">
                <h4 class="card-title col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">Vendas diarias detalhadas</h4>
                <div class="text-end">
                    <div class="btn btn-info" style="display: block;" id="btnExpandir">EXPANDIR</div>
                    <div class="btn btn-info" style="display: none;" id="btnRecolher">RECOLHER</div>

                </div>
            </div>
            <div id="CntDetalhar" style="display: none;" class="table-responsive">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Valor Faturado</th>
                            <th scope="col">Valor Custo</th>
                            <th scope="col">Resultado venda</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $this->model->vendasDiariaDetalhada(); ?>
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-group mt-3">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Vendas faturadas por cliente</h4>
                <?php $this->model->grafVendasByCliente(); ?>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vendas faturadas por serviço</h4>
                <?php $this->model->grafVendasByServico(); ?>
            </div>
        </div>
    </div>

</div>
