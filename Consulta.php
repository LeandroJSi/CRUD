<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="L_Func.css"/>
    </head>
    <body>
        <?php
        require_once 'Cliente.php';
        require_once 'Login.php';
        require_once 'Companhia.php';
        $Deslogar= new Login();
        $Cliente = new Cliente();
        $empresa= new Companhia();
        
        if (isset($_POST['btnBuscar'])){
            $dados_Cliente = array();
            $Bcpf=$_POST['pesquisa'];
            $dados_Cliente = $Cliente->buscaCliente($Bcpf);

            if (empty($dados_Cliente)) {
                $nome ="";
                $cpf ="";
                $cnh ="";
                $fone ="";
                $cep="";
                $rua="";
                $num="";
                $bairro="";
                $cidade="";
                $estado="";
                $cnpj="";
                $nomeemp="";
                $nomefant="";
                $foneemp="";
                $placa="";
                $modelo="";
                $cor="";
                $ano="";
                $marca="";
                $retorno="Cliente não encontrado!";
            } else {
                $nome = $dados_Cliente["nome"];
                $cpf = $dados_Cliente["CPF"];
                $cnh = $dados_Cliente["CNH"];
                $fone =$dados_Cliente["Fone"];
                $cep=$dados_Cliente["cep"];
                $rua=$dados_Cliente["rua"];
                $num=$dados_Cliente["num"];
                $bairro=$dados_Cliente["bairro"];
                $cidade=$dados_Cliente["cidade"];
                $estado=$dados_Cliente["estado"];
                $cnpj=$dados_Cliente["cnpj"];
                $nomeemp=$dados_Cliente["nomeemp"];
                $nomefant=$dados_Cliente["nomeFantasia"];
                $foneemp=$dados_Cliente["foneemp"];
                $placa=$dados_Cliente["placa"];
                $modelo=$dados_Cliente["modelo"];
                $cor=$dados_Cliente["cor"];
                $ano=$dados_Cliente["ano"];
                $marca=$dados_Cliente["marca"];
                $retorno="";
            }
            if((isset($_GET['Apag']))and ($_GET['Apag']=="sim")){
                $Id=$empresa->buscaCompanhia($_POST['pesquisa']);
                $Cliente->DeletarCliente($Id);
            }
        }
        
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
                    <li><a href="Perfil.php">Meu Perfil</a></li>
                    <li><a href="Consulta.php">Consultar</a></li>
                    <?php if($_SESSION['Usu']['admi']<>0){echo '<li><a href="Cadastro.php" class="botoes" name="cd">Cadastrar</a></li>';}?>
                    <?php if($_SESSION['Usu']['admi']<>0){echo '<li><a href="Atualiza.php" class="botoes" name="at">Atualizar</a></li>';}?>
                    <li id="sr"><a href="Consulta.php?x=sair" name="sr">Sair</a></li>
                </ul>
            </nav>
           
            <section>
                <div id="conteudo">
                    <form id="bp" method="post" action="">
                        <input type="text" name="pesquisa" id="pesq" size="50" maxlength="11" placeholder="Informe o CPF do cliente" value="<?php if(isset($_POST['btnBuscar'])){echo $Bcpf;}?>" required/>
                        <input type="submit" name="btnBuscar" id="busc" size="30" value="Buscar">
                    
                        <fieldset id="InputsApresentacao">
                            <legend>Cliente</legend>
                            <input type="text" disabled="" size="77" maxlength="30" placeholder="Nome" value="<?php if(isset($_POST['btnBuscar'])){echo $nome;}?>"/>
                            <input type="text" disabled="" size="21" maxlength="11" placeholder="CPF" value="<?php if(isset($_POST['btnBuscar'])){echo $cpf;}?>"/>
                            <input type="text" disabled="" size="21" maxlength="11" placeholder="CNH" value="<?php if(isset($_POST['btnBuscar'])){echo $cnh;}?>"/>
                            <input type="text" disabled="" size="18" maxlength="13" placeholder="Telefone" value="<?php if(isset($_POST['btnBuscar'])){echo $fone;}?>"/>
                            <input type="text" disabled="" size="21" maxlength="8"  placeholder="CEP" value="<?php if(isset($_POST['btnBuscar'])){echo $cep;}?>"/>
                            <input type="text" disabled="" size="37" maxlength="20" placeholder="Rua" value="<?php if(isset($_POST['btnBuscar'])){echo $rua;}?>"/>
                            <input type="text" disabled="" size="2" maxlength="5"   placeholder="Nº" value="<?php if(isset($_POST['btnBuscar'])){echo $num;}?>"/>
                            <input type="text" disabled="" size="21" maxlength="20" placeholder="Bairro" value="<?php if(isset($_POST['btnBuscar'])){echo $bairro;}?>"/>
                            <input type="text" disabled="" size="19" maxlength="20" placeholder="Cidade" value="<?php if(isset($_POST['btnBuscar'])){echo $cidade;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="20" placeholder="Estado" value="<?php if(isset($_POST['btnBuscar'])){echo $estado;}?>"/>
                        </fieldset>
                    
                        <fieldset id="InputsApresentacao">
                            <legend>Empresa</legend>   
                            <input type="text" disabled="" size="20" maxlength="11" placeholder="CNPJ" value="<?php if(isset($_POST['btnBuscar'])){echo $cnpj;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="30" placeholder="Nome da empresa" value="<?php if(isset($_POST['btnBuscar'])){echo $nomeemp;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="30" placeholder="Nome fantasia" value="<?php if(isset($_POST['btnBuscar'])){echo $nomefant;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="13" placeholder="Telefone" value="<?php if(isset($_POST['btnBuscar'])){echo $foneemp;}?>"/>
                        </fieldset>
                    
                        <fieldset id="InputsApresentacao">
                            <legend>Veiculo</legend>
                            <input type="text" disabled="" size="20" maxlength="7" placeholder="Placa" value="<?php if(isset($_POST['btnBuscar'])){echo $placa;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="20" placeholder="Modelo" value="<?php if(isset($_POST['btnBuscar'])){echo $modelo;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="30" placeholder="Cor" value="<?php if(isset($_POST['btnBuscar'])){echo $cor;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="4" placeholder="Ano" value="<?php if(isset($_POST['btnBuscar'])){echo $ano;}?>"/>
                            <input type="text" disabled="" size="20" maxlength="20" placeholder="Marca" value="<?php if(isset($_POST['btnBuscar'])){echo $marca;}?>"/>
                        </fieldset>
                        <?php if($_SESSION['Usu']['admi']<>0){echo'<div id="botaoApagar"><a href="Consulta.php?Apag=sim" id="apagar" name="dl">Deletar</a></div>';}?>
                        <div id="retornoBusca"><?php if(isset($_POST['btnBuscar'])){echo "<p>$retorno</p>";}?></div>
                    </form>    
                </div>
            </section>
        </div>
    </body>
</html>
