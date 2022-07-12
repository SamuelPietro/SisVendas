<?php
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$f = new \Core\functions();
$array = $this->vendas->getByKey($id);
foreach ($array as $key => $value) { ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detalhes da venda
            </div>
            <div class="card-body">

                <div class="mt-3"><b>Cliente:</b></div>


                <div><a href="<?php echo URL; ?>clientes/detalhar/?id=<?php echo $value->clienteId; ?>">
                        <?php $arrayCliente = $this->clientes->getByKey($value->clienteId);
                        foreach ($arrayCliente as $key => $cliente) {
                            echo $cliente->razaoSocial;
                        }
                        ?>
                    </a></div>

                <div class="mt-3"><b>Descrição do serviço:</b></div>
                <div>
                    <a href="<?php echo URL; ?>servicos/detalhar/?id=<?php echo $value->servicoId; ?>">
                        <?php $arrayServico = $this->servicos->getByKey($value->servicoId);
                        foreach ($arrayServico as $key => $servico) {
                            echo $servico->descricaoServico;
                        }
                        ?>
                    </a>
                </div>

                <div class="mt-3"><b>Data da Venda:</b></div>
                <div><?php echo $f->formatData($value->dataVenda); ?></div>

                <div class="mt-3"><b>Horas Trabalhadas:</b></div>
                <div><?php echo $value->horasTrabalhadas; ?></div>

                <div class="mt-3"><b>Valor Faturado:</b></div>
                <div><?php echo $f->moeda($value->valorFaturado); ?></div>
                <div class="mt-3"><b>Valor de custo:</b></div>
                <div><?php echo $f->moeda($value->valorCusto); ?></div>

                <div class="mt-3"><b>Resultado da venda:</b></div>
                <div><?php echo $f->moeda($value->resultadoVenda); ?></div>

                <div class="mt-3"><b>Data de cadastro:</b></div>
                <div><?php echo $f->formatData($value->datCadVenda); ?></div>

                </tbody>
            </div>
        </div>
    </div>
<?php } ?>