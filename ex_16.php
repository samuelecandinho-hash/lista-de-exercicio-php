<?php

function gerarSenha($tamanho){
$ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
$mi = "abcdefghijklmnopqrstuvyxwz";
$nu = "0123456789";
$si = "!@#$%¨&*()_+=";
$senha = "";

$senha .= str_shuffle($ma);
$senha .= str_shuffle($mi);
$senha .= str_shuffle($nu);
$senha .= str_shuffle($si);

return substr(str_shuffle($senha),0,$tamanho);


}
echo gerarSenha(10);

function analisarsenha($senha){

    preg_match_all('/[A-Z]/', $senha, $ma);
    preg_match_all('/[a-z]/', $senha, $mi);
    preg_match_all('/[0-9]/', $senha, $nu);
    preg_match_all('/[!@#$%¨&*()_+=]/', $senha, $si);
    $maiusculo = count($ma[0]);
    $minusculo = count($mi[0]);
    $numeros = count($nu[0]);
    $simbolos = count($si[0]);
    $tamanho = strlen($senha);
    if ($tamanho >= 8 && $maiusculo >= 1 && $minusculo >= 1 && $numeros >= 1 && $simbolos >= 1) {
        
    echo "Senha media";
    }
    elseif ($tamanho >= 8 && $maiusculo >= 2 && $minusculo >= 2 && $numeros >= 2 && $simbolos >= 2) {
        echo "Senha forte";
    }
     elseif ($tamanho >= 8 && $maiusculo >= 3 && $minusculo >= 3 && $numeros >= 3 && $simbolos >= 3) {
        echo "Senha muito forte";
    }
    else {
        echo "senha fraca";
    }


}

