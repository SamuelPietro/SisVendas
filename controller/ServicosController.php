<?php

namespace controller;

require_once 'model/ServicosModel.php';

class Controller
{
    public function __construct()
    {
        $this->model = new \model\ServicosModel();
        $this->conn = new \conexao\Conexao();
        $this->pdo = $this->conn->getInstance();
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
            $descricaoServico = filter_input(INPUT_POST, 'descricaoServico', FILTER_DEFAULT);
            $valorHoraServico = filter_input(INPUT_POST, 'valorHoraServico', FILTER_DEFAULT);
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE servicos SET descricaoServico = :descricaoServico,
            valorHoraServico = :valorHoraServico WHERE id = :id");
            $stmt->execute(array(
                'id' => $id,
                'descricaoServico' => $descricaoServico,
                'valorHoraServico' => $valorHoraServico,
                ));
                $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {
                echo '<div class="container alert alert-success" role="alert">
                Sua edição foi salva com sucesso!
              </div>';
            }
        }
        require('view/Servicos/editar.php');
        require('view/footer.php');
    }
    public function incluir()
    {
        require('view/header.php');
        require('view/Servicos/barra.php');
        if (isset($_POST['descricaoServico'])) {
            $descricaoServico = filter_input(INPUT_POST, 'descricaoServico', FILTER_DEFAULT);
            $valorHoraServico = filter_input(INPUT_POST, 'valorHoraServico', FILTER_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO servicos (descricaoServico, valorHoraServico)
            VALUES (:descricaoServico, :valorHoraServico)");

            $stmt->execute(array(
                'descricaoServico' => $descricaoServico,
                'valorHoraServico' => $valorHoraServico,
                ));
                $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {
                echo '<div class="container alert alert-success" role="alert">
                Serviço cadastrado com sucesso!
              </div>';
            }
        }
        require('view/Servicos/incluir.php');
        require('view/footer.php');
    }
    public function importar()
    {
        require('view/header.php');
        require('view/Servicos/barra.php');
        require('view/Servicos/incluir.php');
        require('view/footer.php');
    }
}
