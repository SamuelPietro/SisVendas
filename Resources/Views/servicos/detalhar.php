<?php
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$f = new \Core\functions();
$array = $this->model->getByKey($id);
foreach ($array as $key => $value) { ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detalhes do serviço
            </div>
            <div class="card-body">


                <div class="mt-3"><b>Identificação do serviço:</b></div>
                <div>
                    <?php echo $value->id; ?>
                </div>
                <div class="mt-3"><b>Descrição do Serviço:</b></div>
                <div>
                    <?php echo $value->descricaoServico; ?>
                </div>
                <div class="mt-3"><b>Valor do serviço:</b></div>
                <div>
                    <?php echo $f->moeda($value->valorHoraServico); ?>
                </div>
                <div class="mt-3"><b>Data de cadastro do serviço:</b></div>
                <div>
                    <?php echo $f->formatData($value->datCadServico); ?>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
