<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AppModel;

class ClientesController
{
    private AppModel $model;

    public function __construct()
    {
        $this->model = new AppModel("clientes");
        
    }
    public function index(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'clientes/barra.php';
        require VIEW . 'clientes/index.php';
        require VIEW . 'theme/footer.php';

    }
    public function excluir(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'clientes/barra.php';
        require VIEW . 'clientes/excluir.php';
        require VIEW . 'theme/footer.php';

    }
    public function detalhar(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'clientes/barra.php';
        require VIEW . 'clientes/detalhar.php';
        require VIEW . 'theme/footer.php';
    }
    public function editar(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'clientes/barra.php';
        if (isset($_POST['cnpj'])) {
            $this->model->editarCliente();
        }
        require VIEW . 'clientes/editar.php';
        require VIEW . 'theme/footer.php';
    }
    public function incluir(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'clientes/barra.php';
        if (isset($_POST['cnpj'])) {
            $this->model->incluirCliente();
        }
        require VIEW . 'clientes/incluir.php';
        require VIEW . 'theme/footer.php';
    }
}
