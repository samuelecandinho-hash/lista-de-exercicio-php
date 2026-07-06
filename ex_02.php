<?php 

function inverterTexto($texto) {

$caracteres = preg_split('//u', $texto, -1 , PREG_SPLIT_NO_EMPTY,);
$caracteresInvertidos = array_reverse($caracteres);
$TextoInvertido = implode('', $caracteresInvertidos);
$quantidadeCaracteres = mb_strlen($texto);
return [
    "invertido" => $TextoInvertido,
    "Quantidade" => $quantidadeCaracteres
];
};

$textoUsuario = "roberto stockhausen hille";

$resultado = inverterTexto($textoUsuario);

echo $textoUsuario . "<br>";
echo $resultado['invertido'] . "<br>";
echo $resultado['Quantidade'] . "<br>";
