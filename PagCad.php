<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="Projeto1Cad1.css"/>
    </head>
    <body>
        <?php
        require_once 'ClassConexao1.php';
        require_once 'ClassUser1.php';
        $p = new ClassConexao();
        $u = new ClassUser();

        if (isset($_POST['cads'])) {
            $u->setEmail($_POST['lge']);
            $u->setNome($_POST['nome']);
            $u->setSenha($_POST['pswd']);

            $p->cadastroUsu($u);
            echo "Cadastro realizado com sucesso!";
        }
        if (isset($_POST['vt'])) {

            header('location: \Class1\index.php');
            die();
        }
        ?>
        <div id="form-cad">
            <form method="POST" action="">
                <fieldset>
                    <legend>Cadastro </legend>
                    <p><label for="Lg">E-mail: <input type="text" name="lge"id="Lg"size="20" maxlength="50"/></label></p>
                    <p><label for="Nc">Nome:  <input type="text" name="nome"id="Nc"size="20" maxlength="50"/></label></p>
                    <p><label for="pwd"><label>Senha: <input type="password" name="pswd"id="pwd" size="20" maxlength="8" placeholder="8 dígitos"/></label></p><br>
                    <input type="submit" name="vt" id="Bvt" value="Voltar">
                    <input type="submit" name="cads" id="Bcd" value="Cadastrar">
                </fieldset>
            </form>
        </div>

    </body>
</html>