<?php
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$array = $this->vendas->getByKey($id);
$f = new \Core\functions();
foreach ($array as $key => $value) { ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Editar venda
        </div>
        <div class="card-body">
            <form method="POST">

                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="cliente">Cliente</label>
                    <div class="col-12">
                        <select class="form-control" name="cliente" id="cliente">
                            <?php
                            $arrayCliente = $this->clientes->allValues();
                            foreach ($arrayCliente as $key => $cliente ) {
                                if($value->clienteId == $cliente->id) {
                                    echo "<option selected value='".$cliente->id . "'>$cliente->razaoSocial</option>";
                                }else {
                                    echo "<option value='" . $cliente->id . "'>$cliente->razaoSocial</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="servico">Serviço</label>
                    <div class="col-12">
                        <select class="form-control" name="servico" id="servico">
                            <?php
                            $arrayServico = $this->servicos->allValues();
                            foreach ($arrayServico as $key => $servico ) {
                                if($value->servicoId == $servico->id) {
                                    echo "<option selected value='".$servico->id . "'>$servico->descricaoServico</option>";
                                }else {
                                    echo "<option value='" . $servico->id . "'>$servico->descricaoServico</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="dataVenda">Data Venda</label>
                    <div class="col-12">
                        <input id="dataVenda" name="dataVenda" type="date" class="form-control"
                               value="<?php echo $value->dataVenda; ?>">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="horasTrabalhadas">Horas trabalhadas</label>
                    <div class="col-12">
                        <input id="horasTrabalhadas" name="horasTrabalhadas" type="number" class="form-control"
                               value="<?php echo $value->horasTrabalhadas; ?>">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="valorFaturado">Valor faturado</label>
                    <div class="col-12">
                        <input id="valorFaturado" name="valorFaturado" type="text" class="valor form-control"
                               value="<?php echo $value->valorFaturado; ?>">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-  3 col-form-label" for="valorCusto">Valor custo</label>
                    <div class="col-12">
                        <input id="valorCusto" name="valorCusto" type="text" class="valor form-control"
                               value="<?php echo $value->valorCusto; ?>">
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
</div>
<?php } ?>