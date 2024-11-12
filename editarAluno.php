<?php
include('processamentos/config.php');

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM aluno WHERE id = $id";
    $resultado = $conexao->query($sql);

    // Se o aluno existir, pega os dados
    if ($resultado->num_rows > 0) {
        $aluno = $resultado->fetch_assoc();
    } else {
        echo "Aluno não encontrado!";
        exit();
    }
} else {
    echo "ID não fornecido!";
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Editar Aluno</title>
</head>
<header>
    <a href="index.php">Cadastro Usuário</a>
    <a href="alunos.php">Cadastro Alunos</a>   
    <a href="gerenciadorAlunos.php">Gerenciador de Turmas</a>   
</header>
<body>
<div class="container">
    <h2>Editar Aluno</h2>
    <form method="post" action="processamentos/atualizarAluno.php">
        <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required>

        <label for="setor">Setor:</label>
        <input type="text" name="setor" value="<?php echo htmlspecialchars($aluno['setor']); ?>" required>

        <label for="pcd">PCD:</label>
        <select name="pcd">
            <option value="1" <?php echo $aluno['pcd'] == 1 ? 'selected' : ''; ?>>Sim</option>
            <option value="0" <?php echo $aluno['pcd'] == 0 ? 'selected' : ''; ?>>Não</option>
        </select>

        <button type="submit">Salvar Alterações</button>
    </form>
</div>
</body>
</html>
