<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="L_Func.css"/>
    </head>
    <body>
        <?php
        require_once 'Login.php';
        require_once 'ClassConexao1.php';
        
        $Deslogar=new Login();
        /* Chamada de função para encerrar sessão*/
        session_start();
        if((isset($_GET['x']))and($_GET['x']=='sair')){
            $Deslogar->Deslogar($_GET['x']);
        }
        if(!isset($_SESSION['Usu'])){
            header('location: \Class1\index.php');
        }
        ?>
        <div id="CaixaPrincipal">
            <nav>
                <ul>
                    <li><a href="Perfil.php" class="botoes" name="mp">Meu Perfil</a></li>
                    <li><a href="Consulta.php" class="botoes" name="cs">Consultar</a></li>
                    <?php if($_SESSION['Usu']['admi']<>0){echo '<li><a href="Cadastro.php" class="botoes" name="cd">Cadastrar</a></li>';}?>
                    <?php if($_SESSION['Usu']['admi']<>0){echo '<li><a href="Atualiza.php" class="botoes" name="at">Atualizar</a></li>';}?>
                    <li id="sr"><a href="Perfil.php?x=sair" class="botoes" name="sr">Sair</a></li>
                </ul>
            </nav>
            <section>
                <div id="conteudo">
                    <img src="Perfil.png" id="ImgPerfil">
                    <p><b>Nome:</b> <?php echo $_SESSION['Usu']['nome']?></p>
                    <p><b>Email:</b> <?php echo $_SESSION['Usu']['email']?></p>
                </div>
            </section>
        </div>
    </body>
    </