<!-- 5. Faça um programa que leia 20 números inteiros. Crie, a seguir, um vetor 
resultante que contenha todos os números primos do vetor digitado. Mostre os 
valores do vetor resultante.-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Primos</title>
</head>
<body>
    <h2>Números Primos</h2>
    <form action="" method="post">
        <?php
            // Definindo o vetor de números e inicializando variáveis
            $numeros = [];
            $vetor_resultante = [];

            // Processamento dos dados do formulário
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebendo e armazenando os números
                for ($i = 1; $i <= 20; $i++) {
                    $numero = $_POST["numero_$i"];
                    $numeros[] = $numero;
                }

                // Função para verificar se um número é primo
                function ehPrimo($numero) {
                    if ($numero <= 1) {
                        return false;
                    }
                    for ($i = 2; $i <= sqrt($numero); $i++) {
                        if ($numero % $i == 0) {
                            return false;
                        }
                    }
                    return true;
                }