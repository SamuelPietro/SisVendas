
<div class="container">

    <div class="card">
        <div class="card-header">
            Detalhes do serviço
        </div>
        <div class="card-body">


            <div class="mt-3"><b>Identificação do serviço:</b></div>
            <div>
                <?php echo $this->model->getServicoId();?>
            </div>
            <div class="mt-3"><b>Descrição do Serviço:</b></div>
            <div>
                <?php echo $this->model->getDescricaoServico();?>
            </div>
            <div class="mt-3"><b>Valor do serviço:</b></div>
            <div>
                <?php echo $this->model->getValorHoraServico();?>
            </div>
            <div class="mt-3"><b>Data de cadastro do serviço:</b></div>
            <div>
                <?php echo formatData($this->model->getDatCadServico());?>
            </div>

            </tbody>
        </div>
    </div>

</div>
