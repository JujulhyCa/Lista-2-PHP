<!-- 1. Entre com os dados de 10 alunos de uma classe, recebendo as informações como 
nome e uma nota do aluno. Armazene estes dados em um mapa ordenado. Ao 
final do programa mostrar a média de nota da classe, e o nome do aluno que 
obteve maior nota. -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alunos</title>
</head>
<body>
    <h2>Registro de Alunos</h2>
    <form action="" method="post">
        <?php
        // Número total de alunos
        $total_alunos = 10;

        // Inicialização de variáveis
        $alunos = [];
        $media_notas = 0;
        $maior_nota = 0;
        $aluno_maior_nota = '';

        // Processamento dos dados do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // se a requisição HTTP é do tipo POST
            // Loop para receber dados de cada aluno
            for ($i = 1; $i <= $total_alunos; $i++) {
                $nome_aluno = $_POST['nome_aluno_' . $i];
                $nota_aluno = $_POST['nota_aluno_' . $i];

                // Armazenamento dos dados do aluno em um array associativo
                $alunos[$nome_aluno] = $nota_aluno;

                // Atualização da média das notas
                $media_notas += $nota_aluno;

                // Verificação da maior nota e armazenamento do nome do aluno
                if ($nota_aluno > $maior_nota) {
                    $maior_nota = $nota_aluno;
                    $aluno_maior_nota = $nome_aluno;
                }
            }

            // Cálculo da média das notas
            $media_notas /= $total_alunos;

            // Ordena o array de alunos por nome
            ksort($alunos);
        }

        // Exibição do formulário para entrada de dados dos alunos
        for ($i = 1; $i <= $total_alunos; $i++) {
            echo "Nome do Aluno $i: <input type='text' name='nome_aluno_$i' required><br>";
            echo "Nota do Aluno $i: <input type='number' step='0.01' name='nota_aluno_$i' required><br><br>";
        }
        ?>
        <input type="submit" value="Enviar">
    </form>

    <?php
    // Exibição da média das notas e do aluno com a maior nota
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Média de Notas da Classe: " . number_format($media_notas, 2) . "</h3>";
        echo "<h3>Aluno com Maior Nota: $aluno_maior_nota - Nota: $maior_nota</h3>";
    }
    ?>
</body>
</html>