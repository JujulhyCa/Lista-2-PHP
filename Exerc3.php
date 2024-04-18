<!-- 3. Digite 10 valores numéricos e armazene em um mapa ordenado. Em seguida, 
solicite ao usuário um número para multiplicar todos os elementos do vetor. O 
programa deverá exibir o resultado da multiplicação do número dado pelo 
usuário em todos os elementos armazenados.-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicação de Elementos</title>
</head>
<body>
    <h2>Multiplicação de Elementos</h2>
    <form action="" method="post">

        <?php
            // Definindo o vetor e inicializando variáveis
            $numeros = [];
            $resultado = null;

            // Processamento dos dados do formulário
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebendo e armazenando os números
                for ($i = 1; $i <= 10; $i++) {
                    $numero = $_POST["numero_$i"];
                    $numeros[] = $numero;
                }

                // Recebendo o número para multiplicação
                $multiplicador = $_POST["multiplicador"];

                // Multiplicando todos os elementos pelo número fornecido
                $resultado = 1;
                foreach ($numeros as $numero) {
                    $resultado *= $numero;
                }
                $resultado *= $multiplicador;
            }
