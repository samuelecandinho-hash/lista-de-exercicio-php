<?php 

function converterTemperatura(&$TD,$EO,$TO,$ED){

switch ($ED) {
 case "C":
        if ($EO == 'K') {
        $TD = $TO-273;

        }
        elseif ($EO == 'F'){
          $TD = ($TO-32)*5/9;
        }
  
    break;
 case "K":
        if ($EO == 'C') {
        $TD = $TO+273;

        }
        elseif ($EO == 'F') {
        $TD = (($TO-32) * 5/9) +273;
        }
    break;

case "F": 
          if ($EO == 'C') {
      $TD = ($TO * 9/5)+32;

        }
        elseif ($EO == 'K'){
        $TD = ($TO-459) * 5/9;
        }
    break;
  
}
   

return $TD;
};
$TD = " ";
$EO = "F";
$TO = "200";
$ED = "C";

converterTemperatura($TD, $EO, $TO, $ED);

echo "escala de origem: $EO <br>";
echo "temperatura de origem: $TO <br>";
echo "escala de destino: $ED <br>";
echo  "temperatura do destino: $TD <br>";



?>