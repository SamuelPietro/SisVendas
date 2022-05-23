<?php

namespace controller;

require_once 'model/ServicosModel.php';

class Controller
{
    public function __construct()
    {
        $this->model = new \model\ServicosModel();
    }
    public function index()
    {
        require('view/header.php');
        require('view/Servicos/barra.php');
        require('view/Servicos/listar.php');
        require('view/footer.php');
    }
    public function excluir()
    {
        require('view/header.php');
        require('view/Servicos/barra.php');
        require('view/Servicos/excluir.php');
        require('view/footer.php');
    }
    public function detalhar()
    {
        $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
        require('view/header.php');
        require('view/Servicos/barra.php');
        require('view/Servicos/detalhar.php');
        require('view/footer.php');
    }
    public function editar()
    {
        $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
        require('view/header.php');
        require('view/Servicos/barra.php');

        if (isset($_POST['descricaoServico'])) {
            $this->model->editar();
        }
        require('view/Servicos/editar.php');
        require('view/footer.php');
    }
    public function incluir()
    {
        require('view/header.php');
        require('view/Servicos/barra.php');
        if (isset($_POST['descricaoServico'])) {
            $this->model->incluir();
        }
        require('view/Servicos/incluir.php');
        require('view/footer.php');
    }
}
