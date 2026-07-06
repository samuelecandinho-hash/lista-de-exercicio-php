<?php 

function calcularformula($x, $y) 
{
if (($x + $y) == 0) {
    return "Não é possível dividir por 0!";
}

$resultado = (pow($x, 2) + pow($y,2)) / ($x +$y);

return $resultado;

}
$x = 10;
$y = 5;
echo "Valor de X: $x <br>";
echo "Valor de Y: $y <br>";
echo "Resultado: " . calcularformula($x,$y);


