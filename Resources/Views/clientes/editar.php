<?php
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$array = $this->model->getByKey($id);
foreach ($array as $key => $value) { ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar cliente
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="razaoSocial">Razão Social</label>
                        <div class="col-12">
                            <input id="razaoSocial" name="razaoSocial" type="text" class="form-control"
                                   value="<?php echo $value->razaoSocial; ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="cnpj">CNPJ</label>
                        <div class="col-12">
                            <input id="cnpj" name="cnpj" type="text" class="cnpj form-control"
                                   value="<?php echo $value->cnpj; ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="cep">CEP</label>
                        <div class="col-12">
                            <input id="cep" name="cep" type="text" class="cep form-control"
                                   value="<?php echo $value->cep; ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="logradouro">Logradouro</label>
                        <div class="col-12">
                            <input id="logradouro" name="logradouro" type="text" class="form-control"
                                   value="<?php echo $value->logradouro; ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="numero">Número</label>
                        <div class="col-12">
                            <input id="numero" name="numero" type="text" class="form-control"
                                   value="<?php echo $value->numero; ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="complemento">Complemento</label>
                        <div class="col-12">
                            <input id="complemento" name="complemento" type="text" class="form-control"
                                   value="<?php echo $value->complemento; ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="bairro">Bairro</label>
                        <div class="col-12">
                            <input id="bairro" name="bairro" type="text" class="form-control"
                                   value="<?php echo $value->bairro; ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="cidade">Cidade</label>
                        <div class="col-12">
                            <input id="cidade" name="cidade" type="text" class="form-control"
                                   value="<?php echo $value->cidade; ?>">
                        </div>

                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-12 col-form-label" for="uf">UF</label>
                        <div class="col-12">
                            <input id="uf" name="uf" type="text" class="form-control" maxlength="2"
                                   value="<?php echo $value->uf; ?>">
                        </div>
                    </div>


                    <div class="form-group row mt-3">
                        <div class="offset-3 col-9">
                            <button type="submit" class="btn btn-success">SALVAR</button>
                            <button type="reset" class="btn btn-danger">REDEFINIR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>