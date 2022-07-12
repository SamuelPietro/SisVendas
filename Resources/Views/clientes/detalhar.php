<?php
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$array = $this->model->getByKey($id);
foreach ($array as $key => $value) { ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Detalhes do cliente
        </div>
        <div class="card-body">

            <div class="mt-3"><b>Identificação do cliente:</b></div>
            <div> <?php echo $value->id;?></div>

            <div class="mt-3"><b>Razão Social:</b></div>
            <div><?php echo $value->razaoSocial; ?></div>

            <div class="mt-3"><b>CNPJ:</b></div>
            <div><?php echo $value->cnpj; ?></div>

            <div class="mt-3"><b>CEP:</b></div>
            <div><?php echo $value->cep; ?></div>

            <div class="mt-3"><b>Logradouro:</b></div>
            <div><?php echo $value->logradouro; ?></div>

            <div class="mt-3"><b>Número:</b></div>
            <div><?php echo $value->numero; ?></div>

            <div class="mt-3"><b>Complemento:</b></div>
            <div><?php echo $value->complemento; ?></div>

            <div class="mt-3"><b>Bairro:</b></div>
            <div><?php echo $value->bairro; ?></div>

            <div class="mt-3"><b>Cidade:</b></div>
            <div><?php echo $value->cidade; ?></div>

            <div class="mt-3"><b>UF:</b></div>
            <div><?php echo $value->uf; ?></div>

            <div class="mt-3"><b>Data de cadastro:</b></div>
            <div><?php echo $value->datCadCliente; ?></div>

            <?php } ?>
        </div>
    </div>
</div>
