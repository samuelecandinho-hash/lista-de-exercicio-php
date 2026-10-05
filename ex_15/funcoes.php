<?php

date_default_timezone_set('America/Sao_Paulo');

function calcularImc(float $peso, float $altura): array
{
    if ($altura <= 0 || $peso <= 0) {
        return ['erro' => 'Peso e altura devem ser maiores que zero.'];
    }

    $imc = $peso / ($altura ** 2);

    if ($imc < 18.5) {
        $classificacao = 'Abaixo do peso';
    } elseif ($imc < 25) {
        $classificacao = 'Peso normal';
    } elseif ($imc < 30) {
        $classificacao = 'Sobrepeso';
    } else {
        $classificacao = 'Obesidade';
    }

    return ['imc' => round($imc, 2), 'classificacao' => $classificacao];
}

function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function gerarSenhaAleatoria(int $tamanho = 12): string
{
    $tamanho = max($tamanho, 4);
    $grupos = [
        'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'abcdefghijklmnopqrstuvwxyz',
        '0123456789',
        '!@#$%&*?',
    ];

    $senha = [];
    foreach ($grupos as $grupo) {
        $senha[] = $grupo[random_int(0, strlen($grupo) - 1)];
    }

    $todos = implode('', $grupos);
    while (count($senha) < $tamanho) {
        $senha[] = $todos[random_int(0, strlen($todos) - 1)];
    }

    for ($i = count($senha) - 1; $i > 0; $i--) {
        $j = random_int(0, $i);
        [$senha[$i], $senha[$j]] = [$senha[$j], $senha[$i]];
    }

    return implode('', $senha);
}

function contarVogais(string $texto): int
{
    return preg_match_all('/[aeiouáéíóúâêîôûàãõäëïöü]/iu', $texto);
}

function inverterTexto(string $texto): string
{
    return implode('', array_reverse(mb_str_split($texto, 1, 'UTF-8')));
}

function calcularIdade(string $dataNascimento): int
{
    try {
        $nascimento = new DateTime($dataNascimento);
    } catch (Exception $e) {
        return -1;
    }

    return (new DateTime('today'))->diff($nascimento)->y;
}

function converterMoeda(float $valor, string $origem, string $destino): float|string
{
    $cotacoes = ['BRL' => 1.0, 'USD' => 5.00, 'EUR' => 5.50];

    $origem = strtoupper($origem);
    $destino = strtoupper($destino);

    if (!isset($cotacoes[$origem], $cotacoes[$destino])) {
        return 'Moeda não suportada.';
    }

    return round($valor * $cotacoes[$origem] / $cotacoes[$destino], 2);
}

function formatarTelefone(string $telefone): string
{
    $numeros = preg_replace('/\D/', '', $telefone);

    if (strlen($numeros) === 11) {
        return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $numeros);
    }
    if (strlen($numeros) === 10) {
        return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $numeros);
    }

    return 'Telefone inválido.';
}

function gerarSaudacao(?int $hora = null): string
{
    $hora ??= (int) date('G');

    if ($hora >= 5 && $hora < 12) {
        return 'Bom dia!';
    }
    if ($hora >= 12 && $hora < 18) {
        return 'Boa tarde!';
    }
    return 'Boa noite!';
}

function validarSenhaForte(string $senha): bool
{
    return mb_strlen($senha, 'UTF-8') >= 8
        && preg_match('/\p{Lu}/u', $senha)
        && preg_match('/\p{Ll}/u', $senha)
        && preg_match('/\d/', $senha)
        && preg_match('/[^\p{L}\p{N}]/u', $senha);
}

function validarCpf(string $cpf): bool
{
    $cpf = preg_replace('/\D/', '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += $cpf[$i] * (($t + 1) - $i);
        }
        $digito = ((10 * $soma) % 11) % 10;
        if ($cpf[$t] != $digito) {
            return false;
        }
    }

    return true;
}