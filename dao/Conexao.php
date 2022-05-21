<?php

namespace conexao;

class Conexao
{
    public static $pdo;
    public function __construct()
    {
    }
    private static function verificaExtensao()
    {
        switch (SGBD) :
            case 'mysql':
                $extensao = 'pdo_mysql';
                break;
            case 'mssql':
                if (SERVER == 'linux') :
                    $extensao = 'pdo_dblib';
                else :
                    $extensao = 'pdo_sqlsrv';
                endif;
                break;
            case 'postgre':
                $extensao = 'pdo_pgsql';
                break;
        endswitch;

        if (!extension_loaded($extensao)) :
            echo "<h1>Extensão {$extensao} não habilitada!</h1>";
            exit();
        endif;
    }

    public function getInstance()
    {
        self::verificaExtensao();
        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        if (!isset(self::$pdo)) {
            try {
                $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                switch (SGBD) :
                    case 'mysql':
                        self::$pdo = new \PDO("mysql:host=" . DB_HOST . ";
                        dbname=" . DB_NOME . ";", DB_USER, DB_PASS, $opcoes);
                        break;
                    case 'mssql':
                        if (SERVER == 'linux') :
                            self::$pdo = new \PDO("dblib:host=" . DB_HOST . ";
                            database=" . DB_NOME . ";", DB_USER, DB_PASS, $opcoes);
                        else :
                            self::$pdo = new \PDO("sqlsrv:server=" . DB_HOST . ";
                            database=" . DB_NOME . ";", DB_USER, DB_PASS, $opcoes);
                        endif;
                        break;
                    case 'postgre':
                        self::$pdo = new \PDO("pgsql:host=" . DB_HOST . ";
                        dbname=" . DB_NOME . ";", DB_USER, DB_PASS, $opcoes);
                        break;
                endswitch;
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }
}
