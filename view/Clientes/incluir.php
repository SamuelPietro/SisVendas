i<div class="container">
    <div class="card">
        <div class="card-header">
            Incluir novo cliente
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group row mt-3">
                    <label class="col-3 col-form-label" for="razaoSocial">Razão Social</label>
                    <div class="col-12">
                        <input id="razaoSocial" name="razaoSocial" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="cnpj">CNPJ</label>
                    <div class="col-12">
                        <input id="cnpj" name="cnpj" type="text" class="cnpj form-control">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="endereco">Endereço</label>
                    <div class="col-12">
                        <input id="endereco" name="endereco" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="cidade">Cidade</label>
                    <div class="col-12">
                        <input id="cidade" name="cidade" type="text" class="form-control">
                    </div>

                </div>
                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="uf">UF</label>
                        <div class="col-12">
                            <input id="uf" name="uf" type="text" class="form-control" maxlength="2">
                        </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-12 col-form-label" for="cep">CEP</label>
                        <div class="col-12">
                            <input id="cep" name="cep" type="text" class="cep form-control">
                        </div>
                </div>


                <div class="form-group row mt-3">
                    <div class="offset-3 col-9">
                        <button name="submit" type="submit" class="btn btn-success">SALVAR</button>
                        <button name="reset" type="reset" class="btn btn-danger">LIMPAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
