
<div class="container">
    <div class="card">
        <div class="card-header">
            Listando serviços
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <style>
                    a:link {
                        text-decoration: none;
                    }

                    a:visited {
                        text-decoration: none;
                    }

                    a:hover {
                        text-decoration: none;
                    }

                    a:active {
                        text-decoration: none;
                    }

                    .fa:hover,
                    .fa:active {
                        -webkit-transform: scale(1.3);
                        -moz-transform: scale(1.3);
                        -ms-transform: scale(1.3);
                        -o-transform: scale(1.3);
                        transform: scale(1.3);
                    }
                </style>
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
                        <?php $this->model->listar(); ?>
                    </tbody>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</div>
