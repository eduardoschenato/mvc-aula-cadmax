<html>
    <head>
        <title>Usuários</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Lista de Usuários Cadastrados</h1>
        <a href="usuario.php">Inserir</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>Ações</th>
            </tr>
            <?php foreach($usuarios as $usuario){ ?>
                <tr>
                    <td><?php echo $usuario->getNome() ?></td>
                    <td><?php echo $usuario->getLogin() ?></td>
                    <td>
                        <a href="usuario.php?id=<?php echo $usuario->getId() ?>">Editar</a>
                        <a href="excluirUsuario.php?id=<?php echo $usuario->getId() ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
