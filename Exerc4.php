<!--4. Crie um vetor que armazene o nome de todos os meses do ano. Peça ao usuário 
que digite um número e ele informe qual o nome do mês correspondente. -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome do Mês</title>
</head>
<body>
    <h2>Nome do Mês</h2>
    <form action="" method="post">
        Digite o número do mês (1 a 12): <input type="number" name="numero_mes" min="1" max="12" required><br><br>
        <input type="submit" value="Verificar">
    </form>

    <?php
    // Definindo o vetor com os nomes dos meses
    $meses = [
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro'
    ];

    // Processamento dos dados do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // se a requisição HTTP é do tipo POST
        $numero_mes = $_POST["numero_mes"];

        // Verifica se o número do mês está dentro do intervalo válido
        if ($numero_mes >= 1 && $numero_mes <= 12) {
            // Obtém o nome do mês correspondente ao número fornecido
            $nome_mes = $meses[$numero_mes];
            echo "<p>O mês $numero_mes é $nome_mes</p>";
        } /*else {
            echo "<p>Número do mês inválido. Por favor, digite um número entre 1 e 12.</p>";
        }*/
    }
    ?>
</body>
</html>