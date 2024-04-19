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

                // Exibindo campos para entrada de números
                for ($i = 1; $i <= 20; $i++) {
                    echo "Número $i: <input type='number' name='numero_$i' required><br>";
                }

                // Processamento dos dados do formulário
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    /// Recebendo e armazenando os números
                    for ($i = 1; $i <= 5; $i++) {
                        $nome_campo = "numero_$i";
                        if (isset($_POST[$nome_campo])) {
                            $numero = $_POST[$nome_campo];
                            $numeros[] = $numero;
                        }
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

                    // Filtrando os números primos e armazenando no vetor resultante
                    foreach ($numeros as $numero) {
                        if (ehPrimo($numero)) {
                            $vetor_resultante[] = $numero;
                        }
                    }
                }
        ?>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        // Exibindo os números primos do vetor resultante ou a mensagem de saída
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($vetor_resultante)) {
                echo "<h3>Números Primos:</h3>";
                echo implode(', ', $vetor_resultante);
            } else {
                echo "<p>Não há número(s) primo(s).</p>";
            }
        }
    ?>
</body>
</html>
