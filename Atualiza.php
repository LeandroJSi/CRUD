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
        require_once 'Cliente.php';
        require_once 'Carro.php';
        $Deslogar= new Login();
        $Cliente = new Cliente();
        $Carro= new Carro();
        if (isset($_POST['btnBuscar'])) {
            $dados_Cliente = array();
            $cpf = $_POST['pesquisa'];
            $dados_Cliente = $Cliente->buscaCliente($cpf);

            if (empty($dados_Cliente)) {
                $nome="";
                $fone="";
                $cep="";
                $rua="";
                $num="";
                $bairro="";
                $cidade="";
                $placa="";
                $modelo="";
                $cor="";
                $ano="";
                $marca="";
                $retorno="Cliente não encontrado!";
               
            } else {
                $nome = $dados_Cliente["nome"];
                $fone = $dados_Cliente["Fone"];
                $cep = $dados_Cliente["cep"];
                $rua = $dados_Cliente["rua"];
                $num = $dados_Cliente["num"];
                $bairro = $dados_Cliente["bairro"];
                $cidade = $dados_Cliente["cidade"];
                $placa = $dados_Cliente["placa"];
                $modelo=$dados_Cliente["modelo"];
                $cor=$dados_Cliente["cor"];
                $ano=$dados_Cliente["ano"];
                $marca=$dados_Cliente["marca"];
                $retorno="Alterações salvas com sucesso!";
            }
        }
        if (isset($_POST['btnEditar'])) {
            
            $Cliente->atualizarCliente($_POST['nome'], $_POST['fone'], $_POST['cep'], $_POST['rua'], $_POST['num'], $_POST['bairro'], $_POST['cidade'], $_POST['pesquisa']);
            $Carro->atualizarCarro($_POST['placa'], $_POST['modelo'], $_POST['cor'], $_POST['ano'], $_POST['marca'], $_POST['pesquisa']);
        }
         /* Chamada de função para encerrar sessão*/
         session_start();
        if((isset($_GET['x']))and($_GET['x']=='sair')){
            $Deslogar->Deslogar($_GET['x']);
        } 
        ?>    
        <div id="CaixaPrincipal">
            <nav>
                <ul>
                    <li><a href="Perfil.php" class="botoes" name="mp">Meu Perfil</a></li>
                    <li><a href="Consulta.php" class="botoes" name="cs">Consultar</a></li>
                    <?php if($_SESSION['Usu']['admi']<>0){echo '<li><a href="Cadastro.php" name="cd">Cadastrar</a></li>';}?>
                    <?php if($_SESSION['Usu']['admi']<>0){echo '<li><a href="Atualiza.php" name="at">Atualizar</a></li>';}?>
                    <li id="sr"><a href="Atualiza.php?x=sair" name="sr">Sair</a></li>
                </ul>

            </nav>
            <section>
                <div id="conteudo">
                    <form id="bp" method="post" action="">
                        <input type="text" name="pesquisa" id="pesq" size="50" maxlength="11" placeholder="Informe o CPF do cliente" value="<?php if(isset($_POST['btnBuscar'])){echo $cpf;} ?>"/>
                         <input type="submit" name="btnBuscar" id="busc" size="30" value="Buscar">
                        <fieldset id="InputsApresentacao">    
                            <legend>Cliente</legend>   
                            <input type="text" name="nome" size="84" maxlength="30" placeholder="Nome" value="<?php if (isset($_POST['btnBuscar'])){echo $nome;}?>"/>
                            <input type="text" name="fone" size="20" maxlength="13" placeholder="Telefone" value="<?php if (isset($_POST['btnBuscar'])){echo $fone;}?>"/>
                            <input type="text" name="cep" size="22" maxlength="8" placeholder="Cep" value="<?php if (isset($_POST['btnBuscar'])){echo $cep;}?>"/>
                            <input type="text" name="rua" size="25" maxlength="20" placeholder="Rua" value="<?php if (isset($_POST['btnBuscar'])){echo $rua;}?>"/>
                            <input type="text" name="num" size="2" maxlength="4" placeholder="Nº" value="<?php if (isset($_POST['btnBuscar'])){echo $num;}?>"/>
                            <input type="text" name="bairro" size="20" maxlength="20" placeholder="Bairro" value="<?php if (isset($_POST['btnBuscar'])){echo $bairro;}?>"/>
                            <input type="text" name="cidade" size="20" maxlength="20" placeholder="Cidade" value="<?php if (isset($_POST['btnBuscar'])){echo $cidade;}?>"/>
                        </fieldset>
                        <fieldset id="InputsApresentacao">
                            <legend>Veículo</legend>
                            <input type="text" name="placa" size="12" maxlength="7" placeholder="Placa" value="<?php if (isset($_POST['btnBuscar'])){echo $placa;}?>"/>
                            <input type="text" name="modelo" size="13" maxlength="20" placeholder="Modelo" value="<?php if (isset($_POST['btnBuscar'])){echo $modelo;}?>"/>
                            <input type="text" name="cor" size="12" maxlength="20" placeholder="Cor" value="<?php if (isset($_POST['btnBuscar'])){echo $cor;}?>"/>
                            <input type="text" name="ano" size="6" maxlength="4" placeholder="Ano" value="<?php if (isset($_POST['btnBuscar'])){echo $ano;}?>"/>
                            <input type="text" name="marca" size="12" maxlength="20" placeholder="Marca" value="<?php if (isset($_POST['btnBuscar'])){echo $marca;}?>"/>
                        </fieldset>
                        <input type="submit" name="btnEditar" id="btnEdit" size="20" value="Editar">
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>
