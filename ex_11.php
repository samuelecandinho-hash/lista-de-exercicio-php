<?php

function formatarTexto(string $texto): array
{
    return [
        'maiusculas' => mb_strtoupper($texto, 'UTF-8'),
        'minusculas' => mb_strtolower($texto, 'UTF-8'),
        'primeira_maiuscula' => mb_convert_case($texto, MB_CASE_TITLE, 'UTF-8'),
        'total_caracteres' => mb_strlen($texto, 'UTF-8'),
    ];
}

$texto = "relatório mensal de vendas da região sul";
print_r(formatarTexto($texto));