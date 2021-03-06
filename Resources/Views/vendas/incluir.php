i<div class="container">
    <div class="card">
        <div class="card-header">
            Incluir nova venda
        </div>
        <div class="card-body">
            <form method="POST">

                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="cliente">Cliente</label>
                    <div class="col-12">
                        <select class="form-control" name="cliente" id="cliente">
                            <option selected disabled hidden>Selecione o cliente</option>
                            <?php
                            $array = $this->clientes->allValues();
                            foreach ($array as $key => $value) {
                                echo "<option value='".$value->id . "'>$value->razaoSocial</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="servico">Serviço</label>
                    <div class="col-12">
                        <select class="form-control" name="servico" id="servico">
                        <option selected disabled hidden>Selecione o serviço</option>
                            <?php
                            $array = $this->servicos->allValues();
                            foreach ($array as $key => $value) {
                                echo "<option value='".$value->id . "'>$value->descricaoServico</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="dataVenda">Data Venda</label>
                    <div class="col-12">
                        <input id="dataVenda" name="dataVenda" type="date" class="form-control">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="horasTrabalhadas">Horas trabalhadas</label>
                    <div class="col-12">
                        <input id="horasTrabalhadas" name="horasTrabalhadas" type="number" class="form-control">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="valorFaturado">Valor faturado</label>
                    <div class="col-12">
                        <input id="valorFaturado" name="valorFaturado" type="text" class="valor form-control">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="valorCusto">Valor custo</label>
                    <div class="col-12">
                        <input id="valorCusto" name="valorCusto" type="text" class="valor form-control">
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <div class="offset-3 col-9">
                        <button type="submit" class="btn btn-success">SALVAR</button>
                        <button type="reset" class="btn btn-danger">LIMPAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
