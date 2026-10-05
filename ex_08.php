<?php 

function ordenarNomes($nomes) {
    sort($nomes);
    return $nomes;
}

$nomes = ['Samuel','Lucas','Daniel','Roberto'];
$nomes_sort = ordenarNomes($nomes);
echo "Nomes ordenados:";

foreach ($nomes_sort as $nome) {
    echo $nome . "<br>";
}
?>