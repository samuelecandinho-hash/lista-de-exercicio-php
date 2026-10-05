<?php

function calcularMediana(array $numeros): float
{
    sort($numeros);
    $quantidade = count($numeros);
    $meio = intdiv($quantidade, 2);

    if ($quantidade % 2 === 0) {
        return ($numeros[$meio - 1] + $numeros[$meio]) / 2;
    }

    return $numeros[$meio];
}

function contarPares(array $numeros): int
{
    return count(array_filter($numeros, fn($n) => floor($n) == $n && $n % 2 == 0));
}

function contarImpares(array $numeros): int
{
    return count(array_filter($numeros, fn($n) => floor($n) == $n && $n % 2 != 0));
}

function estatisticasNumericas(array $numeros): array
{
    if (empty($numeros)) {
        return ['erro' => 'O vetor está vazio.'];
    }

    $soma = array_sum($numeros);

    return [
        'soma' => $soma,
        'media' => $soma / count($numeros),
        'maior' => max($numeros),
        'menor' => min($numeros),
        'mediana' => calcularMediana($numeros),
        'pares' => contarPares($numeros),
        'impares' => contarImpares($numeros),
    ];
}

print_r(estatisticasNumericas([7, 2, 15, 8, 4, 9, 22, 3]));