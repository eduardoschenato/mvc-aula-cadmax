<html>
    <head>
        <title>Usuário</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Cadastro de Usuário</h1>
        <a href="usuarios.php">Voltar</a>
        <form action="salvarUsuario.php" method="POST">
            <fieldset>
                <legend>Dados do Usuário</legend>
                <input type="hidden" name="id" 
                value="<?php echo $usuario->getId(); ?>">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome" 
                value="<?php echo $usuario->getNome(); ?>">
                <br>
                <label for="login">Login:</label>
                <input type="text" name="login" id="login" placeholder="Login" 
                value="<?php echo $usuario->getLogin(); ?>">
                <br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <br>
                <button type="submit">Salvar</button>
            </fieldset>
        </form>
    </body>
</html>