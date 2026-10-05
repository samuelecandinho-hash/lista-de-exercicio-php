<?php
require_once __DIR__ . '/funcoes.php';

function mostrar(string $titulo, string $chamada, mixed $resultado): void
{
    if (is_bool($resultado)) {
        $resultado = $resultado ? 'true (sim)' : 'false (não)';
    } elseif (is_array($resultado)) {
        $resultado = print_r($resultado, true);
    }

    echo '<tr>'
        . '<td>' . htmlspecialchars($titulo) . '</td>'
        . '<td><code>' . htmlspecialchars($chamada) . '</code></td>'
        . '<td><pre>' . htmlspecialchars((string) $resultado) . '</pre></td>'
        . '</tr>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca de Funções PHP</title>
    <style>
        body {
            font-family: system-ui, sans-serif;
            margin: 2rem auto;
            max-width: 960px;
            padding: 0 1rem;
            color: #222;
        }

        h1 {
            margin-bottom: .25rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: .5rem .75rem;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #f3f4f6;
        }

        pre {
            margin: 0;
            white-space: pre-wrap;
        }

        code {
            background: #f3f4f6;
            padding: 2px 4px;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <h1>Biblioteca de Funções PHP</h1>
    <p>Exemplos práticos de cada função de <code>funcoes.php</code>.</p>

    <table>
        <tr>
            <th>Função</th>
            <th>Chamada</th>
            <th>Resultado</th>
        </tr>
        <?php
        mostrar('Calcular IMC', 'calcularImc(72, 1.75)', calcularImc(72, 1.75));
        mostrar('Validar e-mail (válido)', 'validarEmail("ana@exemplo.com")', validarEmail('ana@exemplo.com'));
        mostrar('Validar e-mail (inválido)', 'validarEmail("ana@@exemplo")', validarEmail('ana@@exemplo'));
        mostrar('Gerar senha aleatória', 'gerarSenhaAleatoria(14)', gerarSenhaAleatoria(14));
        mostrar('Contar vogais', 'contarVogais("Programação em PHP")', contarVogais('Programação em PHP'));
        mostrar('Inverter texto', 'inverterTexto("Olá, mundo!")', inverterTexto('Olá, mundo!'));
        mostrar('Calcular idade', 'calcularIdade("2000-05-20")', calcularIdade('2000-05-20') . ' anos');
        mostrar('Converter moeda', 'converterMoeda(100, "BRL", "USD")', 'US$ ' . converterMoeda(100, 'BRL', 'USD') . ' (cotação de exemplo)');
        mostrar('Formatar telefone', 'formatarTelefone("47912345678")', formatarTelefone('47912345678'));
        mostrar('Saudação conforme o horário', 'gerarSaudacao()', gerarSaudacao() . ' (agora: ' . date('H:i') . ')');
        mostrar('Validar senha forte (fraca)', 'validarSenhaForte("abc123")', validarSenhaForte('abc123'));
        mostrar('Validar senha forte (forte)', 'validarSenhaForte("Abc@1234x")', validarSenhaForte('Abc@1234x'));
        mostrar('Validar CPF (bônus)', 'validarCpf("529.982.247-25")', validarCpf('529.982.247-25'));
        ?>
    </table>
</body>

</html>