<?php

function normalizarDeslocamento(int $deslocamento): int
{
    return (($deslocamento % 26) + 26) % 26;
}

function deslocarCaractere(string $caractere, int $deslocamento): string
{
    if (ctype_upper($caractere)) {
        $base = ord('A');
    } elseif (ctype_lower($caractere)) {
        $base = ord('a');
    } else {
        return $caractere;
    }

    return chr((ord($caractere) - $base + $deslocamento) % 26 + $base);
}

function aplicarCifra(string $texto, int $deslocamento): string
{
    $deslocamento = normalizarDeslocamento($deslocamento);
    $resultado = '';

    foreach (str_split($texto) as $caractere) {
        $resultado .= deslocarCaractere($caractere, $deslocamento);
    }

    return $resultado;
}

function criptografarMensagem(string $texto, int $chave = 3): string
{
    return aplicarCifra($texto, $chave);
}

function descriptografarMensagem(string $texto, int $chave = 3): string
{
    return aplicarCifra($texto, -$chave);
}

$original = "Mensagem secreta: encontro às 15h!";
$cifrada = criptografarMensagem($original, 3);
$decifrada = descriptografarMensagem($cifrada, 3);

echo "Original:        $original\n";
echo "Criptografada:   $cifrada\n";
echo "Descriptografada: $decifrada\n";