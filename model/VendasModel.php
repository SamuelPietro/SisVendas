<?php

namespace model;

class VendasModel
{
    private $id;
    private $clienteId;
    private $servicoId;
    private $dataVenda;
    private $horasTrabalhadas;
    private $valorFaturado;
    private $valorCusto;
    private $resultadoVenda;
    private $datCadVenda;


    public function __construct()
    {
        $this->dao = new \dao\Dao();
        $this->conn = new \conexao\Conexao();
        $this->pdo = $this->conn->getInstance();
    }


    public function excluir($id, $tabela)
    {
        if ($this->dao->excluir($id, $tabela) > 0) {
            echo '<div class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Aêêê! A venda <b>' . $id . '</b> foi excluido com sucesso!</p>
          </div>';
        } else {
            echo '<div class="alert alert-danger  mt-4" role="alert">
            <h4 class="alert-heading">Algo errado!</h4>
            <p>Opa! Infelizmente não conseguimos excluir esta venda ' . $id . ' no banco de dados.</p>
            <hr>

          </div>';
        }
    }
    public function listar()
    {
        $vendas = $this->dao->getAll("Vendas");
        foreach ($vendas as $key => $value) {
            $clientes = $this->dao->getId($value['clienteId'], "clientes");
            $servicos = $this->dao->getId($value['servicoId'], "Servicos");
            $data = date('d/m/Y', strtotime(str_replace("-", "/", $value['dataVenda'])));

            echo '<tr><th scope="row">' . $clientes[0]['razaoSocial'] . '</th>

            <td>' . $data . '</td>
            <td>' . $servicos[0]['descricaoServico'] . '</td>
            <td>' . moeda($value['valorFaturado']) . '</td>

        <td>

        <a href="?atividade=Vendas&acao=detalhar&id=' . $value['id'] . '">
            <i class="fa fa-eye text-success" aria-hidden="true" style="font-size:25px; "></i>
        </a>
        <a href="?atividade=Vendas&acao=editar&id=' . $value['id'] . '">
            <i class="fa fa-pencil text-warning px-4" aria-hidden="true" style="font-size:25px;"></i>
        </a>
        <a href="?atividade=Vendas&acao=excluir&id=' . $value['id'] . '">
            <i class="fa fa-trash text-danger" aria-hidden="true" style="font-size:25px;"></i>
        </a>
        </td></tr>';
        }
    }
    public function detalhar($id)
    {
        $array = $this->dao->getId($id, "vendas");
        foreach ($array as $key => $value) {
            $this->id = $value['id'];
            $this->clienteId = $value['clienteId'];
            $this->servicoId = $value['servicoId'];
            $this->dataVenda = $value['dataVenda'];
            $this->horasTrabalhadas = $value['horasTrabalhadas'];
            $this->valorFaturado = $value['valorFaturado'];
            $this->valorCusto = $value['valorCusto'];
            $this->resultadoVenda = $value['resultadoVenda'];

            $this->datCadVenda = $value['datCadVenda'];
            return $this;
        }
    }
    public function editar()
    {
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
    public function incluir()
    {
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
    public function importar()
    {
        $fileName = $_FILES["file"]["tmp_name"];
                $file = fopen($fileName, "r");

                echo "<div class='container mt-3'><h3> Dados encontrados </h3>";
                echo '<div class="table-responsive"><table class="table table-striped mt-3">
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
            $valorHoraServico = number_format(floatval(removePontuacao($valorFaturado)) / floatval(removePontuacao($horasTrabalhadas)), 2, '.', '');


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
                $this->detalhar(filter_input(INPUT_GET, 'id', FILTER_DEFAULT));
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
            $idCliente = $this->getIdByCnpj($cnpj);

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
        echo '</tbody></table></div></div>';
    }
    public function optionlistServicos($tabela)
    {
        $array = $this->dao->getAll($tabela);
        return $array;
    }
    public function getIdByCnpj($cnpj)
    {
        $cnpj = $this->dao->getCnpj($cnpj, "clientes");
        return $cnpj[0]['id'];
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of clienteId
     */
    public function getClienteId()
    {
        $clientes = $this->dao->getId($this->clienteId, "clientes");
        return $clientes[0]['razaoSocial'];
    }

    /**
     * Get the value of servicoId
     */
    public function getServicoId()
    {
        $servicos = $this->dao->getId($this->servicoId, "servicos");
        return $servicos[0]['descricaoServico'];
    }

    /**
     * Get the value of dataVenda
     */
    public function getDataVenda()
    {
        return $this->dataVenda;
    }

    /**
     * Get the value of horasTrabalhadas
     */
    public function getHorasTrabalhadas()
    {
        return $this->horasTrabalhadas;
    }

    /**
     * Get the value of valorFaturado
     */
    public function getValorFaturado()
    {
        return $this->valorFaturado;
    }

    /**
     * Get the value of valorCusto
     */
    public function getValorCusto()
    {
        return $this->valorCusto;
    }

    /**
     * Get the value of resultadoVenda
     */
    public function getResultadoVenda()
    {
        return $this->resultadoVenda;
    }

    /**
     * Get the value of datCadVenda
     */
    public function getDatCadVenda()
    {
        return $this->datCadVenda;
    }
}
