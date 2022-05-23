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
