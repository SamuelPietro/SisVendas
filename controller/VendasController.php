<?php

namespace controller;

require_once 'model/VendasModel.php';

class Controller
{
    public function __construct()
    {
        $this->model = new \model\VendasModel();
        $this->conn = new \conexao\Conexao();
        $this->pdo = $this->conn->getInstance();
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
            $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            $clienteId = filter_input(INPUT_POST, 'cliente', FILTER_DEFAULT);
            $servicoId = filter_input(INPUT_POST, 'servico', FILTER_DEFAULT);
            $dataVenda = filter_input(INPUT_POST, 'dataVenda', FILTER_DEFAULT);
            $horasTrabalhadas = filter_input(INPUT_POST, 'horasTrabalhadas', FILTER_DEFAULT);
            $valorFaturado = str_replace(",", ".", filter_input(INPUT_POST, 'valorFaturado', FILTER_DEFAULT));
            $valorCusto = str_replace(",", ".", filter_input(INPUT_POST, 'valorCusto', FILTER_DEFAULT));
            $stmt = $this->pdo->prepare("UPDATE vendas SET
            clienteId = :clienteId,
            servicoId = :servicoId,
            dataVenda = :dataVenda,
            horasTrabalhadas = :horasTrabalhadas,
            valorFaturado = :valorFaturado,
            valorCusto = :valorCusto,
            resultadoVenda = :resultadoVenda
            WHERE id = :id");

            $stmt->execute(array(
                'id' => $id,
                'clienteId' => $clienteId,
                'servicoId' => $servicoId,
                'dataVenda' => $dataVenda,
                'horasTrabalhadas' => $horasTrabalhadas,
                'valorFaturado' => $valorFaturado,
                'valorCusto' => $valorCusto,
                'resultadoVenda' => $valorFaturado - $valorCusto,

            ));
                $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {
                $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
                echo '<div class="container alert alert-success" role="alert">
                Vanda atualizada com sucesso!
              </div>';
            }
        }
        require('view/Vendas/editar.php');
        require('view/footer.php');
    }
    public function incluir()
    {
        require('view/header.php');
        require('view/Vendas/barra.php');



        if (isset($_POST['dataVenda'])) {
            $clienteId = filter_input(INPUT_POST, 'cliente', FILTER_DEFAULT);
            $servicoId = filter_input(INPUT_POST, 'servico', FILTER_DEFAULT);
            $dataVenda = filter_input(INPUT_POST, 'dataVenda', FILTER_DEFAULT);
            $horasTrabalhadas = filter_input(INPUT_POST, 'horasTrabalhadas', FILTER_DEFAULT);
            $valorFaturado = str_replace(",", ".", filter_input(INPUT_POST, 'valorFaturado', FILTER_DEFAULT));
            $valorCusto = str_replace(",", ".", filter_input(INPUT_POST, 'valorCusto', FILTER_DEFAULT));
            $stmt = $this->pdo->prepare("INSERT INTO Vendas (clienteId, servicoId, dataVenda, horasTrabalhadas, valorFaturado, valorCusto, resultadoVenda)
            VALUES (:clienteId, :servicoId, :dataVenda, :horasTrabalhadas, :valorFaturado, :valorCusto, :resultadoVenda)");

            $stmt->execute(array(
                'clienteId' => $clienteId,
                'servicoId' => $servicoId,
                'dataVenda' => $dataVenda,
                'horasTrabalhadas' => $horasTrabalhadas,
                'valorFaturado' => $valorFaturado,
                'valorCusto' => $valorCusto,
                'resultadoVenda' => $valorFaturado - $valorCusto,
            ));
                $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {
                echo '<div class="container alert alert-success" role="alert">
                Vanda cadastrada com sucesso!
              </div>';
            }
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
                $fileName = $_FILES["file"]["tmp_name"];
                $file = fopen($fileName, "r");

                echo "<div class='container mt-3'><h3> Dados encontrados </h3>";
                echo '<table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Razão Social</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">UF</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Data Venda</th>
                        <th scope="col">Cód. Serviço</th>
                        <th scope="col">Descrição do Serviço</th>
                        <th scope="col">Horas Trabalhadas</th>
                        <th scope="col">Valor Faturado</th>
                        <th scope="col">Valor Custo</th>
                        <th scope="col">Resultado Venda</th>
                    </tr>
                </thead>
                <tbody>';
                $flag = true;
                while (($column = fgetcsv($file, 10000, ";")) !== false) {
                    if ($flag) {
                        $flag = false;
                        continue;
                    }
                    $cnpj = mask(removePontuacao($column[0]), "##.###.###/####-##");
                    $razaoSocial = utf8_encode($column[1]);
                    $endereco = utf8_encode($column[2]);
                    $cidade = utf8_encode($column[3]);
                    $uf = removePontuacao($column[4]);
                    $cep = mask(removePontuacao($column[5]), "#####-###");
                    $dataVenda = date('Y-m-d', strtotime(str_replace("/", "-", $column[6])));
                    $idServico = removePontuacao($column[7]);
                    $descricaoServico = utf8_encode($column[8]);
                    $horasTrabalhadas = $column[9];
                    $valorFaturado = $column[10];
                    $valorCusto = $column[11];
                    $resultadoVenda = $column[12];
                    $valorHoraServico = number_format(floatval(removePontuacao($valorFaturado)) /
                     floatval(removePontuacao($horasTrabalhadas)), 2, '.', '');


                     $stmt = $this->pdo->prepare("INSERT INTO Clientes (cnpj, razaoSocial, endereco, cidade, uf, cep)
                        VALUES (:cnpj, :razaoSocial, :endereco, :cidade, :uf, :cep)
                        ON DUPLICATE KEY UPDATE cnpj= :cnpj");
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
                        $this->model->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
                        echo '<div class="container alert alert-success" role="alert">
                Novo cliente cadastrado com sucesso!
              </div>';
                    }
                        $stmt = $this->pdo->prepare("INSERT INTO servicos (id, descricaoServico, valorHoraServico)
            VALUES (:id, :descricaoServico, :valorHoraServico) ON DUPLICATE KEY UPDATE id= :id");

                        $stmt->execute(array(
                        'id' => $idServico,
                        'descricaoServico' => $descricaoServico,
                        'valorHoraServico' => $valorHoraServico,

                        ));
                        $rowCount = $stmt->rowCount();
                    if ($rowCount == 1) {
                        echo '<div class="container alert alert-success" role="alert">
                Novo serviço cadastrado com sucesso!
              </div>';
                    }
                    $idCliente = $this->model->getIdByCnpj($cnpj);

                    $stmt = $this->pdo->prepare("INSERT INTO Vendas (clienteId, servicoId, dataVenda, horasTrabalhadas, valorFaturado, valorCusto, resultadoVenda)
            VALUES (:clienteId, :servicoId, :dataVenda, :horasTrabalhadas, :valorFaturado, :valorCusto, :resultadoVenda)");

                    $stmt->execute(array(
                    'clienteId' => $idCliente,
                    'servicoId' => $idServico,
                    'dataVenda' => $dataVenda,
                    'horasTrabalhadas' => $horasTrabalhadas,
                    'valorFaturado' => str_replace(',', '.', str_replace('.', '', $valorFaturado)),
                    'valorCusto' => str_replace(',', '.', str_replace('.', '', $valorCusto)),
                    'resultadoVenda' => str_replace(',', '.', str_replace('.', '', $resultadoVenda)),
                    ));
                    $rowCount = $stmt->rowCount();
                    if ($rowCount == 1) {
                        echo '<div class="container alert alert-success" role="alert">
                Venda cadastrada com sucesso!
              </div>';
                    }






                    echo "<tr><td>$cnpj</td>";
                    echo "<td>$razaoSocial</td>";
                    echo "<td>$endereco</td>";
                    echo "<td>$cidade</td>";
                    echo "<td>$uf</td>";
                    echo "<td>$cep</td>";
                    echo "<td>" . date('d/m/Y', strtotime(str_replace("-", "/", $dataVenda))) . "</td>";
                    echo "<td>$idServico</td>";
                    echo "<td>$descricaoServico</td>";
                    echo "<td>$horasTrabalhadas</td>";
                    echo "<td>$valorFaturado</td>";
                    echo "<td>$valorCusto</td>";
                    echo "<td>$resultadoVenda</td>";
                    echo "</tr>";
                }
                echo '</tbody></table></div>';
            }
            require('view/footer.php');
        }
    }
}