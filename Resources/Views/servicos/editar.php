<?php
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$array = $this->model->getByKey($id);
$f = new \Core\functions();
foreach ($array as $key => $value) { ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Editar serviço
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group row mt-3">
                    <label class="col-3 col-form-label" for="descricaoServico">Descrição do serviço</label>
                    <div class="col-9">
                        <input id="descricaoServico" name="descricaoServico" type="text" class="form-control"
                            value="<?php echo $value->descricaoServico; ?>">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-3 col-form-label" for="valorHoraServico">Valor da hora</label>
                    <div class="col-9">
                        <input id="valorHoraServico" name="valorHoraServico" type="text" class="form-control"
                            value="<?php echo $value->valorHoraServico; ?>">
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