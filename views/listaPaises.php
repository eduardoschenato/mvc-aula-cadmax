<html>
    <head>
        <title>Países</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Lista de Países</h1>
        <a href="pais.php">Inserir</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>País</th>
                <th>Ações</th>
            </tr>
            <?php foreach($paises as $pais){ ?>
                <tr>
                    <td><?php echo $pais->getNome() ?></td>
                    <td><?php echo $pais->getContinente() ?></td>
                    <td>
                        <a href="pais.php?id=<?php echo $pais->getId() ?>">Editar</a>
                        <a href="excluirPais.php?id=<?php echo $pais->getId() ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>