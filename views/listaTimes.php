<html>
    <head>
        <title>Times</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Lista de Times</h1>
        <a href="time.php">Inserir</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>País</th>
                <th>Ações</th>
            </tr>
            <?php foreach($times as $time){ ?>
                <tr>
                    <td><?php echo $time->getNome() ?></td>
                    <td><?php echo $time->getNomePais() ?></td>
                    <td>
                        <a href="time.php?id=<?php echo $time->getId() ?>">Editar</a>
                        <a href="excluirTime.php?id=<?php echo $time->getId() ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>