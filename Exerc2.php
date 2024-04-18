<!-- 2. Entre com 10 números e armazene em um vetor. Ao final o programa deverá 
mostrar: 
a. quantos negativos foram digitados; 
b. quantos positivos foram digitados; 
c. quantos pares e ímpares.-->

<!DOCTYPE html>
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

            // Analisando os números
            foreach ($numeros as $numero) {
                // Verificando se o número é negativo ou positivo
                if ($numero < 0) {
                    $negativos++;
                } elseif ($numero > 0) {
                    $positivos++;
                }

                // Verificando se o número é par ou ímpar
                if ($numero % 2 == 0) {
                    $pares++;
                } else {
                    $impares++;
                }
            }
        }

        // Exibindo campos para entrada de números
        for ($i = 1; $i <= 10; $i++) {
            echo "Número $i: <input type='number' name='numero_$i' required><br>";
        }
        ?>
        <br>
        <input type="submit" value="Analisar">
    </form>

    <?php
    // Exibindo resultados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Resultados:</h3>";
        echo "Quantidade de números negativos: $negativos<br>";
        echo "Quantidade de números positivos: $positivos<br>";
        echo "Quantidade de números pares: $pares<br>";
        echo "Quantidade de números ímpares: $impares<br>";
    }
    ?>
</body>
</html>