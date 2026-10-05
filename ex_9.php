<?php
function analisarNumero($numero){
   if ($numero % 2 == 0) {
       $paridade = "Par";
   } else {
       $paridade = "Ímpar";
   }

   $nu_primo = true;
    if ($numero <= 1) {
         $nu_primo = false;
    } else {
         for ($i = 2; $i <= sqrt($numero); $i++) {
              if ($numero % $i == 0) {
                $nu_primo = false;
                break;
              }
         }
    }
    return [
        "numero" => $numero,
        "paridade" => $paridade,
        "primo" => $nu_primo ? "Sim" : "Não"
    ];
   
}
$numero_usuario = 33;
$resultado = analisarNumero($numero_usuario);

 echo "Número: " . $resultado["numero"] . "<br>";
 echo "É impar ou par?: " . $resultado["paridade"] . "<br>";
 echo "É primo?: " . $resultado["primo"] . "<br>";
?>