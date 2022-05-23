<?php

namespace controller;

require_once 'model/ClientesModel.php';

class Controller
{
    public function __construct()
    {
        $this->model = new \model\ClientesModel();
        $this->conn = new \conexao\Conexao();
        $this->pdo = $this->conn->getInstance();
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
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_DEFAULT);
            $razaoSocial = filter_input(INPUT_POST, 'razaoSocial', FILTER_DEFAULT);
            $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
            $cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
            $uf = filter_input(INPUT_POST, 'uf', FILTER_DEFAULT);
            $cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE Clientes SET
            cnpj = :cnpj,
            razaoSocial = :razaoSocial,
            endereco = :endereco,
            cidade = :cidade,
            uf = :uf,
            cep = :cep
            WHERE id = :id");

            $stmt->execute(array(
                'id' => $id,
                'cnpj' => $cnpj,
                'razaoSocial' => $razaoSocial,
                'endereco' => $endereco,
                'cidade' => $cidade,
                'uf' => $uf,
                'cep' => $cep
                ));
                $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {
                $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
                echo '<div class="container alert alert-success" role="alert">
                Cliente atualizado com sucesso!
              </div>';
            }
        }
        require('view/Clientes/editar.php');
        require('view/footer.php');
    }
    public function incluir()
    {
        require('view/header.php');
        require('view/Clientes/barra.php');
        if (isset($_POST['cnpj'])) {
            $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_DEFAULT);
            $razaoSocial = filter_input(INPUT_POST, 'razaoSocial', FILTER_DEFAULT);
            $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
            $cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
            $uf = filter_input(INPUT_POST, 'uf', FILTER_DEFAULT);
            $cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO Clientes (cnpj, razaoSocial, endereco, cidade, uf, cep)
            VALUES (:cnpj, :razaoSocial, :endereco, :cidade, :uf, :cep)");

            $stmt->execute(array(
                'cnpj' => $cnpj,
                'razaoSocial' => $razaoSocial,
                'endereco' => $endereco,
                'cidade' => $cidade,
                'uf' => $uf,
                'cep' => $cep,
                ));
                $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {
                echo '<div class="container alert alert-success" role="alert">
                Cliente cadastrado com sucesso!
              </div>';
            }
        }
        require('view/Clientes/incluir.php');
        require('view/footer.php');
    }
}
