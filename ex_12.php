<?php

function produtoMaisCaro(array $produtos): array
{
    $maisCaro = $produtos[0];
    foreach ($produtos as $produto) {
        if ($produto['preco'] > $maisCaro['preco']) {
            $maisCaro = $produto;
        }
    }
    return $maisCaro;
}

function produtoMaisBarato(array $produtos): array
{
    $maisBarato = $produtos[0];
    foreach ($produtos as $produto) {
        if ($produto['preco'] < $maisBarato['preco']) {
            $maisBarato = $produto;
        }
    }
    return $maisBarato;
}

function mediaPrecos(array $produtos): float
{
    return array_sum(array_column($produtos, 'preco')) / count($produtos);
}

function pesquisarProduto(array $produtos, string $busca): array
{
    $busca = trim($busca);
    if ($busca === '') {
        return [];
    }

    return array_values(array_filter(
        $produtos,
        fn($p) => mb_stripos($p['nome'], $busca, 0, 'UTF-8') !== false
    ));
}

function analisarProdutos(array $produtos, string $busca = ''): array
{
    if (empty($produtos)) {
        return ['erro' => 'Nenhum produto informado.'];
    }

    return [
        'mais_caro' => produtoMaisCaro($produtos),
        'mais_barato' => produtoMaisBarato($produtos),
        'media_precos' => round(mediaPrecos($produtos), 2),
        'pesquisa' => [
            'termo' => $busca,
            'resultados' => pesquisarProduto($produtos, $busca),
        ],
    ];
}

$produtos = [
    ['nome' => 'Arroz 5kg', 'preco' => 28.90],
    ['nome' => 'Feijão 1kg', 'preco' => 8.49],
    ['nome' => 'Azeite Extra Virgem', 'preco' => 42.00],
    ['nome' => 'Leite Integral', 'preco' => 5.79],
    ['nome' => 'Arroz Integral 1kg', 'preco' => 9.90],
];

print_r(analisarProdutos($produtos, 'arroz'));