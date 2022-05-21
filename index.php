<?php

// Carrega configurações/funções gerais do sistema
require('config.php');
require('functions.php');

// Verifica o modo para debugar
if (DEBUG === false) {
    // Esconde todos os erros
    error_reporting(0);
    ini_set("display_errors", 0);
} else {
    // Mostra todos os erros
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

// Carrega o cabeçalho, folhas de estilo e scripts
require('view/head.php');

require('dao/Conexao.php');
require('dao/Dao.php');

$atividade = filter_input(INPUT_GET, 'atividade', FILTER_DEFAULT);
$acao = filter_input(INPUT_GET, 'acao', FILTER_DEFAULT);
if (empty($atividade)) {
    $atividade = "Home";
}
if (empty($acao)) {
    $acao = "index";
}

require('controller/' . $atividade . 'Controller.php');
$controller = ucwords($atividade) . 'Controller';
$controller = new \controller\Controller();
$controller->$acao();
