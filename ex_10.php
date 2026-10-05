<?php 
function calcularMedia($nota) {
$soma = array_sum($nota);
$quantidade = count($nota);
$media = $soma / $quantidade;

if ($media > 7) {
    $texto = "Aprovado";
}
elseif ($media >= 5 ) {
    $texto = "recuperação";
}
else {
    $texto = "Reprovado";
}

$MaxNota = Max($nota);
$MinNota = Min($nota);

return [
    "Max" => $MaxNota,
    "Min" => $MinNota,
    "soma" => $soma,   
    "media" => $media,
    "situação" => $texto,
];
}

$nota = [5,7,8,9,10];
$situacao = calcularMedia(["situação"]);
$Min = calcularMedia(["Min"]);
$Max = calcularMedia(["Max"]);
$Min = calcularMedia(["media"]);

echo "Situação do aluno: ". $situacao ."<br>";
echo "Nota mais alta: " . $Max ."<br>";
echo "Nota mais baixa: " . $Min ."<br>";
echo "Media do aluno: " . $media ."<br>";






?>