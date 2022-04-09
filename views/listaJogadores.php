<html>
    <head>
        <title>Jogadores</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Lista de Jogadores</h1>
        <a href="jogador.php">Inserir</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>Posição</th>
                <th>Overall</th>
                <th>País</th>
                <th>Time</th>
                <th>Ações</th>
            </tr>
            <?php foreach($jogadores as $jogador){ ?>
                <tr>
                    <td><?php echo $jogador->getNome() ?></td>
                    <td><?php echo $jogador->getPosicao() ?></td>
                    <td><?php echo $jogador->getOverall() ?></td>
                    <td><?php echo $jogador->getNomePais() ?></td>
                    <td><?php echo $jogador->getNomeTime() ?></td>
                    <td>
                        <a href="jogador.php?id=<?php echo $jogador->getId() ?>">Editar</a>
                        <a href="excluirJogador.php?id=<?php echo $jogador->getId() ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>