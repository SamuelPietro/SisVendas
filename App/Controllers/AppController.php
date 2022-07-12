<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AppModel;

class AppController
{

    private AppModel $servicos;
    private AppModel $vendas;
    private AppModel $clientes;

    public function __construct()
    {
        $this->clientes = new AppModel("clientes");
        $this->servicos = new AppModel("servicos");
        $this->vendas = new AppModel("vendas");
    }
    public function index(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'home/index.php';
        require VIEW . 'theme/footer.php';
    }
}
