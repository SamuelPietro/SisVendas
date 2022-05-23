
<div class="container">

    <div class="card">
        <div class="card-header">
            Detalhes da venda
        </div>
        <div class="card-body">


            <div class="mt-3"><b>Cliente:</b></div>
            <div>
                <?php echo $this->model->getClienteId();?>
            </div>
            <div class="mt-3"><b>Descrição do serviço:</b></div>
            <div>
                <?php echo $this->model->getServicoId();?>
            </div>
            <div class="mt-3"><b>Data da Venda:</b></div>
            <div>
                <?php echo $this->model->getDataVenda();?>
            </div>
            <div class="mt-3"><b>Horas Trabalhadas:</b></div>
            <div>
                <?php echo $this->model->getHorasTrabalhadas();?>
            </div>
            <div class="mt-3"><b>Valor Faturado:</b></div>
            <div>
                <?php echo moeda($this->model->getValorFaturado());?>
            </div>
            <div class="mt-3"><b>Valor de custo:</b></div>
            <div>
                <?php echo moeda($this->model->getValorCusto());?>
            </div>
            <div class="mt-3"><b>Resultado da venda:</b></div>
            <div>
                <?php echo moeda($this->model->getResultadoVenda());?>
            </div>
            <div class="mt-3"><b>Data de cadastro:</b></div>
            <div>
                <?php echo formatData($this->model->getDatCadVenda());?>
            </div>

            </tbody>
        </div>
    </div>

</div>
