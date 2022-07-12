<div class="container">
    <div class="card">
        <div class="card-header">
            Listando clientes
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Razão Social</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $array = $this->model->allValues();
                        foreach ($array as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?php echo $value->razaoSocial; ?></th>
                                <td><?php echo $value->cnpj; ?></td>
                                <td>
                                    <a href="<?php echo URL; ?>clientes/detalhar/?id=<?php echo $value->id; ?>">
                                        <i class="fa fa-eye text-success" aria-hidden="true"
                                           style="font-size:25px; "></i>
                                    </a>
                                    <a href="<?php echo URL; ?>clientes/editar/?id=<?php echo $value->id; ?>">
                                        <i class="fa fa-pencil text-warning px-4" aria-hidden="true"
                                           style="font-size:25px;"></i>
                                    </a>
                                    <a href="<?php echo URL; ?>clientes/excluir/?id=<?php echo $value->id; ?>">
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
