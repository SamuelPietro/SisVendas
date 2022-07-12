<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AppModel;

class VendasController
{


    private AppModel $vendas;
    private AppModel $clientes;
    private AppModel $servicos;

    public function __construct()
    {
        $this->vendas = new AppModel("vendas");
        $this->clientes = new AppModel("clientes");
        $this->servicos = new AppModel("servicos");
        
    }
    public function index(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'vendas/barra.php';
        require VIEW . 'vendas/index.php';
        require VIEW . 'theme/footer.php';
    }
    public function excluir(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'vendas/barra.php';
        require VIEW . 'vendas/excluir.php';
        require VIEW . 'theme/footer.php';
    }
    public function detalhar(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'vendas/barra.php';
        require VIEW . 'vendas/detalhar.php';
        require VIEW . 'theme/footer.php';
    }
    public function editar(): void
    {

        require VIEW . 'theme/header.php';
        require VIEW . 'vendas/barra.php';
        if (isset($_POST['dataVenda'])) {
            $this->vendas->editarVenda();
        }
        require VIEW . 'vendas/editar.php';
        require VIEW . 'theme/footer.php';
    }
    public function incluir(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'vendas/barra.php';
        if (isset($_POST['dataVenda'])) {
            $this->vendas->incluirVenda();
        }
        require VIEW . 'vendas/incluir.php';
        require VIEW . 'theme/footer.php';
    }
    public function importar(): void
    {
        require VIEW . 'theme/header.php';
        require VIEW . 'vendas/barra.php';
        require VIEW . 'vendas/importar.php';
        if (isset($_POST['submit'])) {
            if ($_FILES["file"]["size"] > 0) {
                $this->vendas->importar();
            }
            require VIEW . 'theme/footer.php';
        }
    }
}
