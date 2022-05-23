<?php

namespace controller;

require_once 'model/VendasModel.php';

class Controller
{
    public function __construct()
    {
        $this->model = new \model\VendasModel();
    }
    public function index()
    {
        require('view/header.php');
        require('view/Vendas/barra.php');
        require('view/Vendas/listar.php');
        require('view/footer.php');
    }
    public function excluir()
    {
        require('view/header.php');
        require('view/Vendas/barra.php');
        require('view/Vendas/excluir.php');
        require('view/footer.php');
    }
    public function detalhar()
    {
        $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
        require('view/header.php');
        require('view/Vendas/barra.php');
        require('view/Vendas/detalhar.php');
        require('view/footer.php');
    }

    public function editar()
    {
        $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
        require('view/header.php');
        require('view/Vendas/barra.php');

        if (isset($_POST['dataVenda'])) {
            $this->model->editar();
        }
        require('view/Vendas/editar.php');
        require('view/footer.php');
    }
    public function incluir()
    {
        require('view/header.php');
        require('view/Vendas/barra.php');
        if (isset($_POST['dataVenda'])) {
            $this->model->incluir();
        }
        require('view/Vendas/incluir.php');
        require('view/footer.php');
    }
    public function importar()
    {
        require('view/header.php');
        require('view/Vendas/barra.php');
        require('view/Vendas/importar.php');
        if (isset($_POST['submit'])) {
            if ($_FILES["file"]["size"] > 0) {
                $this->model->importar();
            }
            require('view/footer.php');
        }
    }
}
