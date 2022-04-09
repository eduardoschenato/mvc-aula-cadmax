<html>
    <head>
        <title>Jogadores</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Cadastro de Jogador</h1>
        <a href="jogadores.php">Voltar</a>
        <form action="salvarJogador.php" method="POST">
            <fieldset>
                <legend>Dados do jogador</legend>
                <input type="hidden" name="id" value="<?php echo $jogador->getId(); ?>">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $jogador->getNome(); ?>">
                <br>
                <label for="posicao">Posição:</label>
                <input type="text" name="posicao" id="posicao" placeholder="Posição" value="<?php echo $jogador->getPosicao(); ?>">
                <br>
                <label for="overall">Overall:</label>
                <input type="number" name="overall" id="overall" placeholder="Overall" value="<?php echo $jogador->getOverall(); ?>">
                <br>
                <label for="idPais">País:</label>
                <select name="idPais" id="idPais">
                    <?php foreach($paises as $pais) { ?>
                        <option value="<?php echo $pais->getId(); ?>" <?php echo ($pais->getId() == $jogador->getIdPais()) ? "selected" : ""; ?>><?php echo $pais->getNome(); ?></option>
                    <?php } ?>
                </select>
                <br>
                <label for="idTime">Time:</label>
                <select name="idTime" id="idTime">
                    <?php foreach($times as $time) { ?>
                        <option value="<?php echo $time->getId(); ?>" <?php echo ($time->getId() == $jogador->getIdTime()) ? "selected" : ""; ?>>
                            <?php echo $time->getNome(); ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <button type="submit">Salvar</button>
            </fieldset>
        </form>
    </body>
</html>