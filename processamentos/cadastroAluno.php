<?php
include_once("config.php");

if ($conexao->connect_errno) {
    echo "Falha ao conectar no MySQL: " . $conexao->connect_error;
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $conexao -> real_escape_string($_POST['nome']);
        $setor = $conexao -> real_escape_string($_POST['setor']);
        $usuario_id = (int) $_POST['usuarios'];
        $turma_id = (int) $_POST['prioridade'];
        $pcd = isset($_POST['pcd']) && $_POST['pcd'] == 'sim' ? 1 : 0; 

        $sql = "INSERT INTO aluno (nome, setor, id_usuario, id_turma, pcd)
                VALUES ('$nome', '$setor', $usuario_id, '$turma_id', $pcd)";

        if ($conexao->query($sql) === TRUE) {
            header('Location: ../alunos.php?sucesso=1');
            exit();
        } else {
            echo "Erro: " . $sql . "<br>" . $conexao->error;
        }
    }
}
?>