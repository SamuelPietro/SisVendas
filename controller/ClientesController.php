<?php

namespace controller;

require_once 'model/ClientesModel.php';

class Controller
{
    public function __construct()
    {
        $this->model = new \model\ClientesModel();
    }
    public function index()
    {
        require('view/header.php');
        require('view/Clientes/barra.php');
        require('view/Clientes/listar.php');
        require('view/footer.php');
    }
    public function excluir()
    {
        require('view/header.php');
        require('view/Clientes/barra.php');
        require('view/Clientes/excluir.php');
        require('view/footer.php');
    }
    public function detalhar()
    {
        $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
        require('view/header.php');
        require('view/Clientes/barra.php');
        require('view/Clientes/detalhar.php');
        require('view/footer.php');
    }
    public function editar()
    {

        $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
        require('view/header.php');
        require('view/Clientes/barra.php');
        if (isset($_POST['cnpj'])) {
            $this->model->editar();
        }
        require('view/Clientes/editar.php');
        require('view/footer.php');
    }
    public function incluir()
    {
        require('view/header.php');
        require('view/Clientes/barra.php');
        if (isset($_POST['cnpj'])) {
            $this->model->incluir();
        }
        require('view/Clientes/incluir.php');
        require('view/footer.php');
    }
}
