<html>
    <head>
        <title>Times</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Cadastro de Time</h1>
        <a href="times.php">Voltar</a>
        <form action="salvarTime.php" method="POST">
            <fieldset>
                <legend>Dados do time</legend>
                <input type="hidden" name="id" value="<?php echo $time->getId(); ?>">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $time->getNome(); ?>">
                <br>
                <label for="idPais">País:</label>
                <select name="idPais" id="idPais">
                    <option value="null">Selecione</option>
                    <?php foreach($paises as $pais) { ?>
                        <option value="<?php echo $pais->getId(); ?>" 
                            <?php echo ($pais->getId() == $time->getIdPais()) ? "selected" : ""; ?>>
                                <?php echo $pais->getNome(); ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <button type="submit">Salvar</button>
            </fieldset>
        </form>
    </body>
</html>