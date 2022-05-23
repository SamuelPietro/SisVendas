<?php

namespace model;

class ServicosModel
{
    private $servicoId;
    private $descricaoServico;
    private $valorHoraServico;
    private $datCadServico;

    public function __construct()
    {
        $this->dao = new \dao\Dao();
    }

    public function excluir($id, $tabela)
    {
        if ($this->dao->excluir($id, $tabela) > 0) {
            echo '<div class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Aêêê! O item <b>' . $id . '</b> foi excluido com sucesso!</p>
          </div>';
        } else {
            echo '<div class="alert alert-danger  mt-4" role="alert">
            <h4 class="alert-heading">Algo errado!</h4>
            <p>Opa! Infelizmente não conseguimos excluir este item ' . $id . ' no banco de dados.</p>
            <hr>

          </div>';
        }
    }
    public function listar()
    {
        $array = $this->dao->getAll("servicos");
        foreach ($array as $key => $value) {
            echo '<tr><th scope="row">' . $value['id'] . '</th>
        <td>' . $value['descricaoServico'] . '</td>
        <td>' . moeda($value['valorHoraServico']) . '</td>

        <td>

        <a href="?atividade=Servicos&acao=detalhar&id=' . $value['id'] . '">
            <i class="fa fa-eye text-success" aria-hidden="true" style="font-size:25px; "></i>
        </a>
        <a href="?atividade=Servicos&acao=editar&id=' . $value['id'] . '">
            <i class="fa fa-pencil text-warning px-4" aria-hidden="true" style="font-size:25px;"></i>
        </a>
        <a href="?atividade=Servicos&acao=excluir&id=' . $value['id'] . '">
            <i class="fa fa-trash text-danger" aria-hidden="true" style="font-size:25px;"></i>
        </a>
        </td></tr>';
        }
    }
    public function detalhar($id)
    {
        $array = $this->dao->getId($id, "servicos");
        foreach ($array as $key => $value) {
            $this->servicoId = $value['id'];
            $this->descricaoServico = $value['descricaoServico'];
            $this->valorHoraServico = $value['valorHoraServico'];
            $this->datCadServico = $value['datCadServico'];
            return $this;
        }
    }
    /**
     * Get the value of servicoId
     */
    public function getServicoId()
    {
        return $this->servicoId;
    }

    /**
     * Get the value of descricaoServico
     */
    public function getDescricaoServico()
    {
        return $this->descricaoServico;
    }

    /**
     * Get the value of valorHoraServico
     */
    public function getValorHoraServico()
    {
        return $this->valorHoraServico;
    }

    /**
     * Get the value of datCadServico
     */
    public function getDatCadServico()
    {
        return $this->datCadServico;
    }
}
