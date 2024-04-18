<!-- 2. Entre com 10 números e armazene em um vetor. Ao final o programa deverá 
mostrar: 
a. quantos negativos foram digitados; 
b. quantos positivos foram digitados; 
c. quantos pares e ímpares.-->

!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Números</title>
</head>
<body>
    <h2>Análise de Números</h2>
    <form action="" method="post">

    <?php
        // Definição de variáveis
        $numeros = [];

        // Processamento dos dados do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recebendo e armazenando os números
            for ($i = 1; $i <= 10; $i++) {
                $numero = $_POST["numero_$i"];
                $numeros[] = $numero;
            }

            // Inicialização de contadores
            $negativos = 0;
            $positivos = 0;
            $pares = 0;
            $impares = 0;