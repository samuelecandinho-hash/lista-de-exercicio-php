<?php

function CalcularDesconto($preco)
{


    if ($preco > 100 && $preco <= 500) {

        $preco = $preco * 0.90;
        $texto = "Desconto de 10%";
    } elseif ($preco > 500 && $preco <= 1000) {

        $preco = $preco * 0.80;
        $texto = "Desconto de 20%";
    } elseif ($preco > 1000) {

        $preco = $preco * 0.70;
        $texto = "Desconto de 30%";
    }
    else {
        $texto = "sem desconto";
    }

       return [
        "preco" => $preco,
        "texto" => $texto
    ];
}

$preco = 101;
$resultado = CalcularDesconto($preco);
$preco_final = $resultado["preco"];
$texto = $resultado["texto"];
echo "preço inicial: $preco <br>";
echo $texto;
echo "preço final: $preco_final <br>";

?>