<!-- 7. Crie um programa em PHP que receba os seguintes dados de 10 alunos: nome, 
nota1 e nota2. Armazene esses dados em um mapa ordenado que contenha 
também o armazenamento da média de nota do aluno. Seu programa deve 
imprimir a lista dos aprovados com as médias finais e outra lista dos reprovados 
sem exibir o valor da média. -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<body>
    <h2>Lista de Alunos</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php
        // Exibindo campos para entrada de dados dos alunos
        for ($i = 1; $i <= 5; $i++) {
            echo "Aluno $i:<br>";
            echo "Nome: <input type='text' name='nome_$i' required><br>";
            echo "Nota 1: <input type='number' name='nota1_$i' step='0.01' min='0' max='10' required><br>";
            echo "Nota 2: <input type='number' name='nota2_$i' step='0.01' min='0' max='10' required><br><br>";
        }
        ?>
        <input type="submit" value="Calcular">
    </form>
    <?php
    // Processamento dos dados do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inicializando um array associativo para armazenar os dados dos alunos
        $alunos = [];

        // Recebendo e armazenando os dados dos alunos
        for ($i = 1; $i <= 10; $i++) {
            $nome = isset($_POST["nome_$i"]) ? $_POST["nome_$i"] : '';
            $nota1 = isset($_POST["nota1_$i"]) ? $_POST["nota1_$i"] : '';
            $nota2 = isset($_POST["nota2_$i"]) ? $_POST["nota2_$i"] : '';

            // Verificando se os campos foram preenchidos antes de processar os dados
            if ($nome !== '' && $nota1 !== '' && $nota2 !== '') {
                // Calculando a média das notas
                $media = ($nota1 + $nota2) / 2;

                // Armazenando os dados do aluno no mapa ordenado
                $alunos[$nome] = ['nota1' => $nota1, 'nota2' => $nota2, 'media' => $media];
            }
        }

        // Separando os alunos aprovados e reprovados
        $aprovados = [];
        $reprovados = [];
        foreach ($alunos as $nome => $dados) {
            if ($dados['media'] >= 6.0) {
                $aprovados[$nome] = $dados['media'];
            } else {
                $reprovados[] = $nome;
            }
        }

        // Exibindo a lista de alunos aprovados
        if (!empty($aprovados)) {
        // se a variável $aprovados não está vazia
            echo "<h3>Alunos Aprovados:</h3>";
            foreach ($aprovados as $nome => $media) {
                echo "$nome - Média: $media<br>";
            }
        }

        // Exibindo a lista de alunos reprovados
        if (!empty($reprovados)) {
        // se a variável $reprovados não está vazia
            echo "<h3>Alunos Reprovados:</h3>";
            foreach ($reprovados as $nome) {
                echo "$nome<br>";
            }
        }
    }
    ?>
</body>
</html>