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

echo gerarSenha(64);