<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Cadastro Usuários</title>
</head>
<header>
<a href="index.php">Cadastro Usuário</a>
<a href="alunos.php">Cadastro Alunos</a>   
<a href="gerenciadorAlunos.php">Gerenciador de Turmas</a>   
</header>
<body>
    <div class="conteudo">
    <h2>Cadastro de Usuários</h2>
    <form method="post" action="processamentos/cadastroUsuario.php">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Email:</label>
    <input type="email" name="email" required>
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
</html>