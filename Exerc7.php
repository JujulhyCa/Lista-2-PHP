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
        for ($i = 1; $i <= 10; $i++) {
            echo "Aluno $i:<br>";
            echo "Nome: <input type='text' name='nome_$i' required><br>";
            echo "Nota 1: <input type='number' name='nota1_$i' step='0.01' min='0' max='10' required><br>";
            echo "Nota 2: <input type='number' name='nota2_$i' step='0.01' min='0' max='10' required><br><br>";
        }
        ?>
        <input type="submit" value="Calcular">
    </form>