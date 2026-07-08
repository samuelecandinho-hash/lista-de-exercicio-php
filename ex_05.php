<?php 

function analisarTexto($frase){

$palavras = explode(" ",$frase);

return $palavras;
}
$texto = "caralho rapaz";
$vogais = preg_match_all('/[aeiou]/i', $texto, $vog);
$consoantes = preg_match_all('/[BCDFGHJKLMNPQRSTVWXYZ]/i', $texto, $con);
$texto = str_word_count ("caralho rapaz");
echo "Quantidade de palavras: $texto <br>";
$texto = strlen("caralho rapaz");
echo "Quantidade de caracteres: $texto <br>";
$texto = count($vog[0]);
echo "Quantidade de vogais: $texto <br>";
$texto = count($con[0]);
echo "Quantidade de consoantes: $texto <br>";