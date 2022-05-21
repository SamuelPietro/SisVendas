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
    public function getId($id, $tabela)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $tabela WHERE id = :id");
        $stmt->execute(["id" => $id]);
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
