<html>
    <head>
        <title>País</title>
    </head>
    <body>
        <?php include("views/includes/menu.php"); ?>
        <h1>Cadastro de País</h1>
        <a href="paises.php">Voltar</a>
        <form action="salvarPais.php" method="POST">
            <fieldset>
                <legend>Dados do País</legend>
                <input type="hidden" name="id" value="<?php echo $pais->getId(); ?>">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $pais->getNome(); ?>">
                <br>
                <label for="continente">Continente:</label>
                <input type="text" name="continente" id="continente" placeholder="Continente" value="<?php echo $pais->getContinente(); ?>">
                <br>
                <button type="submit">Salvar</button>
            </fieldset>
        </form>
    </body>
</html>