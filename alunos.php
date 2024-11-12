<?php
include('processamentos/config.php');

$sql = "SELECT id, nome FROM usuarios"; 
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    $usuarios = [];
}
$sql = "SELECT id, nome FROM turma"; 
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $turmas = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    $turmas = [];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Cadastro de Alunos</title>
</head>
<header>
<a href="index.php">Cadastro Usuário</a>
<a href="alunos.php">Cadastro Alunos</a>   
<a href="gerenciadorAlunos.php">Gerenciador de Turmas</a>   
</header>
<body>
    <div class="conteudo">
    <h2>Cadastro de Alunos</h2>
    <form method="post" action="processamentos/cadastroAluno.php">
    <label>Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label>Setor:</label>
    <input type="text" id="setor" name="setor" required>
    <label>Selecione o usuário:</label>
    <select id="usuarios" name="usuarios" required>
            <?php
            foreach ($usuarios as $usuario) {
                echo "<option value='" . $usuario['id'] . "'>" . $usuario['nome'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label>Selecione a turma:</label>
        <select id="prioridade" name="prioridade" required>
        <?php
            foreach ($turmas as $turma) {
                echo "<option value='" . $turma['id'] . "'>" . $turma['nome'] . "</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <label>É PCD?</label>
        <div class="radios">
            <input type="radio" id="sim" name="pcd" value="sim" />
            <label for="sim">Sim</label>
            
            <input type="radio" id="nao" name="pcd" value="nao" />
            <label for="nao">Não</label>
        </div>
        <br>
    <button type="submit">Cadastrar</button>
    <?php if (isset($_GET['sucesso'])) { ?>
                            <div class="linha-erro">
                                <div class="mensagem-erro">
                                    <p>
                                        <?php
                                        if ($_GET['sucesso'] == 1) {
                                            echo "Cadastro feito com sucesso!";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
    </form>
    </div>
</body>
<script>
</script>
</html>