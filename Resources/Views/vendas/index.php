
<div class="container">
    <div class="card">
        <div class="card-header">
            Listando vendas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Data da venda</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Valor Faturado</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $array = $this->vendas->allValues();
                    $f = new \Core\functions();
                    foreach ($array as $key => $value) { ?>
                        <tr>
                            <th scope="row"><a href="<?php echo URL; ?>clientes/detalhar/?id=<?php echo $value->clienteId; ?>">
                                    <?php $arrayCliente = $this->clientes->getByKey($value->clienteId);
                                    foreach ($arrayCliente as $key => $cliente) {
                                        echo $cliente->razaoSocial;
                                    }
                                    ?>

                                </a></th>
                            <td><?php echo $value->dataVenda; ?></td>
                            <td><a href="<?php echo URL; ?>servicos/detalhar/?id=<?php echo $value->servicoId; ?>">
                                    <?php $arrayServico = $this->servicos->getByKey($value->servicoId);
                                    foreach ($arrayServico as $key => $servico) {
                                        echo $servico->descricaoServico;
                                    }
                                    ?>
                                </a></td>
                            <td><?php echo $f->moeda($value->valorFaturado); ?></td>

                            <td>
                                <a href="<?php echo URL; ?>vendas/detalhar/?id=<?php echo $value->id; ?>">
                                    <i class="fa fa-eye text-success" aria-hidden="true"
                                       style="font-size:25px; "></i>
                                </a>
                                <a href="<?php echo URL; ?>vendas/editar/?id=<?php echo $value->id; ?>">
                                    <i class="fa fa-pencil text-warning px-4" aria-hidden="true"
                                       style="font-size:25px;"></i>
                                </a>
                                <a href="<?php echo URL; ?>vendas/excluir/?id=<?php echo $value->id; ?>">
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
