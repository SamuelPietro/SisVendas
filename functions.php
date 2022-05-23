<?php

function mask($val, $mask)
{
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; $i++) {
        if ($mask[$i] == '#') {
            if (isset($val[$k])) {
                $maskared .= $val[$k++];
            }
        } else {
            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
    }
    return $maskared;
}
function formatData($timestamp)
{

    return date('d/m/Y H:i:s', strtotime(str_replace("-", "/", $timestamp)));
}
function validar_cnpj($cnpj)
{
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

    // Valida tamanho
    if (strlen($cnpj) != 14) {
        return false;
    }

    // Verifica se todos os digitos são iguais
    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    // Valida primeiro dígito verificador
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
        return false;
    }

    // Valida segundo dígito verificador
    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}
function moeda($valor)
{
    return "R$ " . number_format($valor, 2, ",", ".");
}
function removePontuacao($string)
{
    return utf8_encode(preg_replace('/[^a-z0-9]/i', '', $string));
}
