<?php

namespace dao;

class Dao
{
    public function __construct()
    {
        $this->conn = new \conexao\Conexao();
        $this->pdo = $this->conn->getInstance();
    }
    public function getAll($tabela)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $tabela");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAllOrder($tabela)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $tabela ORDER BY dataVenda ASC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getId($id, $tabela)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $tabela WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCnpj($cnpj, $tabela)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $tabela WHERE cnpj = :cnpj");
        $stmt->execute(["cnpj" => $cnpj]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function excluir($id, $tabela)
    {
        //$pdo = Conexao::conectar();
        $stmt = $this->pdo->prepare("DELETE FROM $tabela WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
