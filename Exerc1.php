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