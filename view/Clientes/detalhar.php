
<div class="container">

    <div class="card">
        <div class="card-header">
            Detalhes do cliente
        </div>
        <div class="card-body">


            <div class="mt-3"><b>Identificação do cliente:</b></div>
            <div>
                <?php echo $this->model->getClientesId();?>
            </div>
            <div class="mt-3"><b>CNPJ:</b></div>
            <div>
                <?php echo mask($this->model->getCnpj(), "##.###.###/####-##");?>
            </div>
            <div class="mt-3"><b>Razão Social:</b></div>
            <div>
                <?php echo $this->model->getRazaoSocial();?>
            </div>
            <div class="mt-3"><b>Endereço:</b></div>
            <div>
                <?php echo $this->model->getEndereco();?>
            </div>
            <div class="mt-3"><b>Cidade:</b></div>
            <div>
                <?php echo $this->model->getCidade();?>
            </div>
            <div class="mt-3"><b>UF:</b></div>
            <div>
                <?php echo $this->model->getUf();?>
            </div>
            <div class="mt-3"><b>CEP:</b></div>
            <div>
                <?php echo mask($this->model->getCep(), "##.###-###");?>
            </div>
            <div class="mt-3"><b>Data de cadastro:</b></div>
            <div>
                <?php echo formatData($this->model->getDatCadCliente());?>
            </div>

            </tbody>
        </div>
    </div>

</div>
