<?php 

function mascararCPF($CPF){



return $CPFMascarado = substr_replace($CPF, '***.***.*',0, 7 );
}

$CPF = "14112341232";
echo  mascararCPF($CPF);
