<?php
include('processamentos/config.php');

$sql = "SELECT * FROM aluno";
$resultado = $conexao->query($sql);

$turma1 = [];
$turma2 = [];
$turma3 = [];

if ($resultado->num_rows > 0) {
    while ($aluno = $resultado->fetch_assoc()) {
        if ($aluno['id_turma'] == '1') {
            $turma1[] = $aluno;
        } elseif ($aluno['id_turma'] == '2') {
            $turma2[] = $aluno;
        } elseif ($aluno['id_turma'] == '3') {
            $turma3[] = $aluno;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Gerenciador de Turmas</title>
</head>
<header>
    <a href="index.php">Cadastro Usuário</a>
    <a href="alunos.php">Cadastro Alunos</a>   
    <a href="gerenciadorAlunos.php">Gerenciador de Turmas</a>   
</header>
<body>
<div class="container">
    <h2>Gerenciador de Turmas</h2>

    <h3>Turma 1</h3>
    <table>
        <tr>
            <th>Nome</th>
            <th>Setor</th>
            <th>PCD</th>
            <th>Ações</th> 
        </tr>
        <?php foreach ($turma1 as $aluno): ?>
        <tr>
            <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
            <td><?php echo htmlspecialchars($aluno['setor']); ?></td>
            <td><?php echo $aluno['pcd'] == 1 ? 'Sim' : 'Não'; ?></td>
            <td>
                <a href="editarAluno.php?id=<?php echo $aluno['id']; ?>" class="botaoEditar">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <div class="botaoDeletar" onclick="confirmarExclusao(<?php echo $aluno['id']; ?>)">
                    <i class="fa-solid fa-trash"></i> 
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Turma 2</h3>
    <table>
        <tr>
            <th>Nome</th>
            <th>Setor</th>
            <th>PCD</th>
            <th>Ações</th> <!-- Adicionando a coluna de ações -->
        </tr>
        <?php foreach ($turma2 as $aluno): ?>
        <tr>
            <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
            <td><?php echo htmlspecialchars($aluno['setor']); ?></td>
            <td><?php echo $aluno['pcd'] == 1 ? 'Sim' : 'Não'; ?></td>
            <td>
                <a href="editarAluno.php?id=<?php echo $aluno['id']; ?>" class="botaoEditar">
                    <i class="fa-solid fa-pen-to-square"></i> 
                </a>
                <div class="botaoDeletar" onclick="confirmarExclusao(<?php echo $aluno['id']; ?>)">
                    <i class="fa-solid fa-trash"></i> 
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Turma 3</h3>
    <table>
        <tr>
            <th>Nome</th>
            <th>Setor</th>
            <th>PCD</th>
            <th>Ações</th> <!-- Adicionando a coluna de ações -->
        </tr>
        <?php foreach ($turma3 as $aluno): ?>
        <tr>
            <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
            <td><?php echo htmlspecialchars($aluno['setor']); ?></td>
            <td><?php echo $aluno['pcd'] == 1 ? 'Sim' : 'Não'; ?></td>
            <td>
                <a href="editarAluno.php?id=<?php echo $aluno['id']; ?>" class="botaoEditar">
                    <i class="fa-solid fa-pen-to-square"></i> 
                </a>
                <div class="botaoDeletar" onclick="confirmarExclusao(<?php echo $aluno['id']; ?>)">
                    <i class="fa-solid fa-trash"></i>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
<script>
    function confirmarExclusao(id) {
        if (confirm("Tem certeza que deseja excluir este aluno?")) {
            window.location.href = "processamentos/delete.php?id=" + id;
        }
    }
</script>
</html>