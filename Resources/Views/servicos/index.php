<div class="container">
    <div class="card">
        <div class="card-header">
            Listando serviços
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">Código Serviço</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor Hora</th>
                            <th scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $array = $this->model->allValues();
                        foreach ($array as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?php echo $value->id; ?></th>
                                <td><?php echo $value->descricaoServico; ?></td>
                                <?php $f = new \Core\functions(); ?>
                                <td><?php echo $f->moeda($value->valorHoraServico); ?></td>
                                <td>
                                    <a href="<?php echo URL; ?>servicos/detalhar/?id=<?php echo $value->id; ?>">
                                        <i class="fa fa-eye text-success" aria-hidden="true"
                                           style="font-size:25px; "></i>
                                    </a>
                                    <a href="<?php echo URL; ?>servicos/editar/?id=<?php echo $value->id; ?>">
                                        <i class="fa fa-pencil text-warning px-4" aria-hidden="true"
                                           style="font-size:25px;"></i>
                                    </a>
                                    <a href="<?php echo URL; ?>servicos/excluir/?id=<?php echo $value->id; ?>">
                                        <i class="fa fa-trash text-danger" aria-hidden="true"
                                           style="font-size:25px;"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
