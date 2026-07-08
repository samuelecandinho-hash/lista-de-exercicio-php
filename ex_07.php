<?php

function CalcularDesconto($preco){
   
    $preco_final = $preco;

    
    if ($preco > 100 && $preco <= 500 ){
      
        $preco_final = $preco * 0.90 ; 
        $texto = "Desconto de 10%";
    }
    elseif ($preco > 500 && $preco <= 1000 ){
       
        $preco_final = $preco * 0.80; 
         $texto "Desconto de 20%";
    }
    elseif ($preco > 1000){
     
        $preco_final = $preco * 0.70;
        $texto = "Desconto de 30%";
    }
    
    
    return [
       'preco_final' = $preco_final,
         'mensagem' = $texto
        ];
}

$preco = "101";

$preco_final = CalcularDesconto($preco);
$texto = CalcularDesconto($preco);
echo "preço inicial: $preco<br>";
echo "Desconto:"
echo "preço final: $preco_final<br>";

?>