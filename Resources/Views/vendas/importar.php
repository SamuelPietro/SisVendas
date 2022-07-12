<div class="container">
    <div class="card">
        <div class="card-header">
            Importar vendas
        </div>
        <div class="card-body">
            <p>Selecione o arquivo que deseja importar</p>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="custom-file">
                        <input type="file" accept=".csv" name="file" id="file"
                        class="file-input">
                    </label>
                    <br>
                    <small id="fileHelpId" class="form-text text-muted">É permitido apenas arquivos CSV</small>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <button name="submit" type="submit" class="btn btn-success">IMPORTAR</button>
                        <button name="reset" type="reset" class="btn btn-danger">CANCELAR</button>
                        <a id="modelo" class="btn btn-primary" href="<?php echo URL; ?>files/modelo.csv" role="button" download>MODELO PARA PREENCHIMENTO</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
