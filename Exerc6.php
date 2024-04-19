<!-- 6. Faça um programa que receba o nome de 5 produtos e seus respectivos preços, 
calcule e mostre: 
a. A quantidade de produtos com preço inferior a R$50,00. 
b. O nome dos produtos com preço entre R$50,00 e R$100,00. 
c. A média dos preços dos produtos com preço superior a R$100,00. -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Produtos</title>
</head>
<body>
    <h2>Análise de Produtos</h2>
    <form action="" method="post">
        <?php
            // Definindo arrays para armazenar nomes e preços dos produtos
            $nomes_produtos = [];
            $precos_produtos = [];

            // Processamento dos dados do formulário
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebendo e armazenando nomes e preços dos produtos
                for ($i = 1; $i <= 5; $i++) {
                    $nome_produto = $_POST["nome_produto_$i"];
                    $preco_produto = $_POST["preco_produto_$i"];

                    // Adicionando os nomes e preços dos produtos aos arrays correspondentes
                    $nomes_produtos[] = $nome_produto;
                    $precos_produtos[] = $preco_produto;
                }

                // Inicializando variáveis para armazenar resultados
                $quantidade_preco_inferior_50 = 0;
                $nomes_preco_entre_50_e_100 = [];
                $soma_precos_superior_100 = 0;
                $quantidade_precos_superior_100 = 0;

                // Calculando resultados
                foreach ($precos_produtos as $indice => $preco) {
                    if ($preco < 50) {
                        $quantidade_preco_inferior_50++;
                    } elseif ($preco >= 50 && $preco <= 100) {
                        $nomes_preco_entre_50_e_100[] = $nomes_produtos[$indice];
                    } elseif ($preco > 100) {
                        $soma_precos_superior_100 += $preco;
                        $quantidade_precos_superior_100++;
                    }
                }

                // Calculando média dos preços dos produtos com preço superior a R$100,00
                $media_precos_superior_100 = $quantidade_precos_superior_100 > 0 ? $soma_precos_superior_100 / $quantidade_precos_superior_100 : 0;
            }

            // Exibindo campos para entrada de nomes e preços dos produtos
            for ($i = 1; $i <= 5; $i++) {
                echo "Produto $i:<br>";
                echo "Nome: <input type='text' name='nome_produto_$i' required><br>";
                echo "Preço: R$ <input type='number' name='preco_produto_$i' step='0.01' min='0' required><br><br>";
            }
            ?>
            <input type="submit" value="Calcular">
        </form>

        <?php
            // Exibindo os resultados
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<h3>Resultados:</h3>";
                echo "a. Quantidade de produtos com preço inferior a R$50,00: $quantidade_preco_inferior_50<br>";
                echo "b. Nome dos produtos com preço entre R$50,00 e R$100,00: ";
                if (!empty($nomes_preco_entre_50_e_100)) {
                    echo implode(', ', $nomes_preco_entre_50_e_100) . "<br>";
                } else {
                    echo "Nenhum produto encontrado nessa faixa de preço.<br>";
                }
                echo "c. Média dos preços dos produtos com preço superior a R$100,00: R$ " . number_format($media_precos_superior_100, 2);
            }
        ?>
</body>
</html>