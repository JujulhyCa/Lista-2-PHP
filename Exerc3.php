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
            $resultados = [];

            // Processamento dos dados do formulário
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebendo e armazenando os números
                for ($i = 1; $i <= 10; $i++) {
                    $numero = $_POST["numero_$i"];
                    $numeros[] = $numero;
                }

                // Recebendo o número para multiplicação
                $multiplicador = $_POST["multiplicador"];

               // Multiplicando cada elemento do vetor pelo número fornecido
                foreach ($numeros as $numero) {
                    $resultados[] = $numero * $multiplicador;
                }
            }
            // Exibindo campos para entrada de números
            for ($i = 1; $i <= 10; $i++) {
                echo "Número $i: <input type='number' name='numero_$i' required><br>";
            }
            ?>
            <br>
            Número para multiplicar: <input type="number" name="multiplicador" required><br><br>
            <input type="submit" value="Calcular">
    </form>

    <?php
    // Exibindo o resultado da multiplicação em todas as posições do vetor
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($resultados)) {
    // se a requisição HTTP é do tipo POST e se a variável $resultados não está vazia
        echo "<h3>Resultado da Multiplicação em todas as posições do vetor:</h3>";
        foreach ($resultados as $indice => $resultado) {
            echo "Posição $indice: $resultado<br>";
        }
    }
    ?>
</body>
</html>
