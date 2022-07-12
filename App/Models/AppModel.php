<?php

declare(strict_types=1);

namespace App\Models;

use Core\Dao;
use Core\functions;

class AppModel extends Dao
{
    private string $table;

    public function __construct($table)
    {
        $this->table = $table;
        parent::__construct($this->table);
    }

    public function editarCliente()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE Clientes SET
        razaoSocial = :razaoSocial,
        cnpj = :cnpj,
        cep = :cep,
        logradouro = :logradouro,
        numero = :numero,
        complemento = :complemento,
        bairro = :bairro,
        cidade = :cidade,
        uf = :uf
        WHERE id = '$id'");
        $stmt->execute($_POST);
        $rowCount = $stmt->rowCount();
        if ($rowCount == 1) {
            echo '<div class="container alert alert-success" role="alert">
            Cliente atualizado com sucesso!
          </div>';
        }
    }

    public function incluirCliente()
    {
        $stmt = $this->pdo->prepare("INSERT INTO Clientes (
                      razaoSocial, cnpj, cep, logradouro, numero, complemento, bairro, cidade, uf)
            VALUES (:razaoSocial, :cnpj, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :uf)");
        $stmt->execute($_POST);
        $rowCount = $stmt->rowCount();
        if ($rowCount == 1) {
            echo '<div class="container alert alert-success" role="alert">
                Cliente cadastrado com sucesso!
              </div>';
        }
    }

    public function editarServico()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE servicos SET descricaoServico = :descricaoServico,
            valorHoraServico = :valorHoraServico WHERE id = '$id'");
        $stmt->execute($_POST);
        $rowCount = $stmt->rowCount();
        if ($rowCount == 1) {
            echo '<div class="container alert alert-success" role="alert">
                Sua edição foi salva com sucesso!
              </div>';
        }
    }

    public function incluirServico()
    {
        $stmt = $this->pdo->prepare("INSERT INTO servicos (descricaoServico, valorHoraServico)
            VALUES (:descricaoServico, :valorHoraServico)");
        $stmt->execute($_POST);
        $rowCount = $stmt->rowCount();
        if ($rowCount == 1) {
            echo '<div class="container alert alert-success" role="alert">
                Sua edição foi salva com sucesso!
              </div>';
        }
    }

    public function editarVenda()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
        $resultadoVenda = $_POST['valorFaturado'] - $_POST['valorCusto'];

        $stmt = $this->pdo->prepare("UPDATE vendas SET
            clienteId = :cliente,
            servicoId = :servico,
            dataVenda = :dataVenda,
            horasTrabalhadas = :horasTrabalhadas,
            valorFaturado = :valorFaturado,
            valorCusto = :valorCusto,
            resultadoVenda = $resultadoVenda
            WHERE id = '$id'");

        $stmt->execute($_POST);
        $rowCount = $stmt->rowCount();
        if ($rowCount == 1) {
            echo '<div class="container alert alert-success" role="alert">
                Vanda atualizada com sucesso!
              </div>';
        }
    }

    public function incluirVenda()
    {
        $resultadoVenda = $_POST['valorFaturado'] - $_POST['valorCusto'];
        $stmt = $this->pdo->prepare("INSERT INTO Vendas (clienteId, servicoId, dataVenda, horasTrabalhadas, valorFaturado, valorCusto, resultadoVenda)
        VALUES (:cliente, :servico, :dataVenda, :horasTrabalhadas, :valorFaturado, :valorCusto, $resultadoVenda)");
        $stmt->execute($_POST);
        $rowCount = $stmt->rowCount();
        if ($rowCount == 1) {
            echo '<div class="container alert alert-success" role="alert">
                Vanda atualizada com sucesso!
              </div>';
        }
    }

    public function importar()
    {
        $fileName = $_FILES["file"]["tmp_name"];
        $file = fopen($fileName, "r");

        echo "<div class='container mt-3'><h3> Dados encontrados </h3>";
        echo '<div class="table-responsive"><table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">Razão Social</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Logradouro</th>
                        <th scope="col">Número</th>
                        <th scope="col">Complemento</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">UF</th>
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
            $f = new functions();
            $razaoSocial = utf8_encode($column[0]);
            $cnpj = $f->mask($f->removePontuacao($column[1]), "##.###.###/####-##");
            $cep = $f->mask($f->removePontuacao($column[2]), "#####-###");
            $logradouro = utf8_encode($column[3]);
            $numero = utf8_encode($column[4]);
            $complemento = utf8_encode($column[5]);
            $bairro = utf8_encode($column[6]);
            $cidade = utf8_encode($column[7]);
            $uf = $f->removePontuacao($column[8]);
            $dataVenda = date('Y-m-d', strtotime(str_replace("/", "-", $column[9])));
            $idServico = $f->removePontuacao($column[10]);
            $descricaoServico = utf8_encode($column[11]);
            $horasTrabalhadas = $column[12];
            $valorFaturado = $column[13];
            $valorCusto = $column[14];
            $resultadoVenda = $column[15];
            $valorHoraServico = number_format(floatval($f->removePontuacao($valorFaturado)) / floatval($f->removePontuacao($horasTrabalhadas)), 2, '.', '');



            $stmt = $this->pdo->prepare("INSERT INTO clientes (
                      cnpj, razaoSocial, cep, logradouro, numero, complemento, bairro, cidade, uf)
            VALUES (:cnpj, :razaoSocial, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :uf)
                        ON DUPLICATE KEY UPDATE cnpj= :cnpj");
            $stmt->execute(array(
                'razaoSocial' => $razaoSocial,
                'cnpj' => $cnpj,
                'cep' => $cep,
                'logradouro' => $logradouro,
                'numero' => $numero,
                'complemento' => $complemento,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'uf' => $uf,

            ));
            $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {

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
            $idCliente = $this->getIdByCnpj($cnpj)[0]->id;

            $stmt = $this->pdo->prepare("INSERT INTO vendas (clienteId, servicoId, dataVenda, horasTrabalhadas, valorFaturado, valorCusto, resultadoVenda)
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
            if ($stmt->rowCount() == 1) {
                echo '<div class="container alert alert-success" role="alert">
                Venda cadastrada com sucesso!
              </div>';
            }

            echo "<tr><td>$cnpj</td>";
            echo "<td>$razaoSocial</td>";
            echo "<td>$cep</td>";
            echo "<td>$logradouro</td>";
            echo "<td>$numero</td>";
            echo "<td>$complemento</td>";
            echo "<td>$bairro</td>";
            echo "<td>$cidade</td>";
            echo "<td>$uf</td>";

            echo "<td>" . date('d/m/Y', strtotime(str_replace("-", "/", $dataVenda))) . "</td>";
            echo "<td>$idServico</td>";
            echo "<td>$descricaoServico</td>";
            echo "<td>$horasTrabalhadas</td>";
            echo "<td>$valorFaturado</td>";
            echo "<td>$valorCusto</td>";
            echo "<td>$resultadoVenda</td>";
            echo "</tr>";
        }
        echo '</tbody></table></div></div>';
    }

    private function getIdByCnpj(string $cnpj)
    {
        $sql = "SELECT * FROM clientes WHERE cnpj = :cnpj";
        $query = $this->pdo->prepare($sql);
        $query->execute(["cnpj" => $cnpj]);
        return $query->fetchAll();
    }

}
