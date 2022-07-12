<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AppModel;

class ServicosController
{
    private AppModel $model;

    public function __construct()
    {
        $this->model = new AppModel("servicos");
        
    }
    public function index(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'servicos/barra.php';
        require VIEW . 'servicos/index.php';
        require VIEW . 'theme/footer.php';
    }
    public function excluir(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'servicos/barra.php';
        require VIEW . 'servicos/excluir.php';
        require VIEW . 'theme/footer.php';
    }
    public function detalhar(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'servicos/barra.php';
        require VIEW . 'servicos/detalhar.php';
        require VIEW . 'theme/footer.php';
    }
    public function editar(): void
    {

        require VIEW . 'theme/header.php';
        require VIEW . 'servicos/barra.php';
        if (isset($_POST['descricaoServico'])) {
            $this->model->editarServico();
        }
        require VIEW . 'servicos/editar.php';
        require VIEW . 'theme/footer.php';
    }
    public function incluir(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'servicos/barra.php';
        if (isset($_POST['descricaoServico'])) {
            $this->model->incluirServico();
        }
        require VIEW . 'servicos/incluir.php';
        require VIEW . 'theme/footer.php';
    }
}
