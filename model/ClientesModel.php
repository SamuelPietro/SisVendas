<?php

namespace model;

class ClientesModel
{
    private $clientesId;
    private $cnpj;
    private $razaoSocial;
    private $endereco;
    private $cidade;
    private $uf;
    private $cep;
    private $datCadCliente;

    public function __construct()
    {
        $this->dao = new \dao\Dao();
    }

    public function excluir($id, $tabela)
    {
        if ($this->dao->excluir($id, $tabela) > 0) {
            echo '<div class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Aêêê! O cliente <b>' . $id . '</b> foi excluido com sucesso!</p>
          </div>';
        } else {
            echo '<div class="alert alert-danger  mt-4" role="alert">
            <h4 class="alert-heading">Algo errado!</h4>
            <p>Opa! Infelizmente não conseguimos excluir este cliente ' . $id . ' no banco de dados.</p>
            <hr>

          </div>';
        }
    }
    public function listar()
    {
        $array = $this->dao->getAll("Clientes");
        foreach ($array as $key => $value) {
            echo '<tr><th scope="row">' . $value['razaoSocial'] . '</th>

        <td>' . $value['cnpj'] . '</td>

        <td>

        <a href="?atividade=Clientes&acao=detalhar&id=' . $value['id'] . '">
            <i class="fa fa-eye text-success" aria-hidden="true" style="font-size:25px; "></i>
        </a>
        <a href="?atividade=Clientes&acao=editar&id=' . $value['id'] . '">
            <i class="fa fa-pencil text-warning px-4" aria-hidden="true" style="font-size:25px;"></i>
        </a>
        <a href="?atividade=Clientes&acao=excluir&id=' . $value['id'] . '">
            <i class="fa fa-trash text-danger" aria-hidden="true" style="font-size:25px;"></i>
        </a>
        </td></tr>';
        }
    }
    public function detalhar($id)
    {
        $array = $this->dao->getId($id, "Clientes");
        foreach ($array as $key => $value) {
            $this->clientesId = $value['id'];
            $this->cnpj = $value['cnpj'];
            $this->razaoSocial = $value['razaoSocial'];
            $this->endereco = $value['endereco'];
            $this->cidade = $value['cidade'];
            $this->uf = $value['uf'];
            $this->cep = $value['cep'];
            $this->datCadCliente = $value['datCadCliente'];
            return $this;
        }
    }

    /**
     * Get the value of clientesId
     */
    public function getClientesId()
    {
        return $this->clientesId;
    }

    /**
     * Get the value of cnpj
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Get the value of razaoSocial
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Get the value of uf
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Get the value of datCadCliente
     */
    public function getDatCadCliente()
    {
        return $this->datCadCliente;
    }
}
