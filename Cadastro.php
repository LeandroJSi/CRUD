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
        require_once 'Endereco.php';
        require_once 'Companhia.php';
        require_once 'EnderecoComp.php';
        require_once 'Carro.php';

        $Deslogar=new Login();
        $clien = new Cliente();
        $end = new Endereco();
        $comp = new Companhia();
        $compEnd = new EnderecoComp();
        $carro = new Carro();
        
        if (isset($_POST['btnCadastrar'])) {
            $comp->setCnpj($_POST['cnpj']);
            $comp->setNome($_POST['nomeComp']);
            $comp->setFnome($_POST['Fnome']);
            $comp->setFone($_POST['fone']);

            $lastId = $comp->cadastroComp($comp);
         
            $compEnd->setCep($_POST['cepComp']);
            $compEnd->setRua($_POST['ruaComp']);
            $compEnd->setNumero($_POST['numComp']);
            $compEnd->setBairro($_POST['bairroComp']);
            $compEnd->setCidade($_POST['cidadeComp']);
            $compEnd->setEstado($_POST['estadoComp']);
            $compEnd->cadastroEndComp($compEnd, $lastId);

            $carro->setPlaca($_POST['placaCarro']);
            $carro->setModelo($_POST['modeloCarro']);
            $carro->setCor($_POST['corCarro']);
            $carro->setAno($_POST['anoCarro']);
            $carro->setMarca($_POST['marcaCarro']);
            $carro->cadastroCarro($carro, $lastId);

            $clien->setCPF($_POST['cpf']);
            $clien->setCNH($_POST['cnh']);
            $clien->setFone($_POST['fn']);
            $clien->setNome($_POST['nm']);
            $lastIdCliente= $clien->cadastroCliente($clien, $lastId);
            
            $end->setCep($_POST['cep']);
            $end->setRua($_POST['rua']);
            $end->setNumero($_POST['num']);
            $end->setBairro($_POST['bairro']);
            $end->setCidade($_POST['cidade']);
            $end->setEstado($_POST['estado']);
            $end->cadastroEnd($end,$lastIdCliente);
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
                    <li><a href="Perfil.php" name="mp">Meu Perfil</a></li>
                    <li><a href="Consulta.php" name="cs">Consultar</a></li>
                    <li><a href="Cadastro.php" name="cd">Cadastrar</a></li>
                    <li><a href="Atualiza.php" name="at">Atualizar</a></li>
                    <li id="sr"><a href="Cadastro.php?x=sair" name="sr">Sair</a></li>
                </ul>
            </nav>
            <section>
                <div id="conteudo">
                    <form method="POST" action="">
                        <fieldset id="InputsApresentacao">
                            <legend>Cliente</legend>
                            <input type="text" name="nm" id="Nc" size="78" maxlength="30" placeholder="Nome" required=""/>
                            <input type="text" name="cpf" size="21" maxlength="11" placeholder="CPF" required=""/>
                            <input type="text" name="cnh" size="21" maxlength="11" placeholder="CNH" required=""/>
                            <input type="text" name="fn" size="18" maxlength="13" placeholder="Telefone" required=""/>
                            <input type="text" name="cep" size="21" maxlength="8" placeholder="CEP" required=""/>
                            <input type="text" name="rua" size="48" placeholder="Rua" required=""/>
                            <input type="text" name="num" size="2" maxlength="5" placeholder="Nº" required=""/>
                            <input type="text" name="bairro" size="21" maxlength="20" placeholder="Bairro" required=""/>
                            <input type="text" name="cidade" size="19" maxlength="20" placeholder="Cidade" required=""/>
                            <input type="text" name="estado" size="20" maxlength="20" placeholder="Estado" required=""/>
                        </fieldset>
                    
                        <fieldset id="InputsApresentacao">
                            <legend>Empresa</legend>   
                            <input type="text" name="cnpj" size="20" maxlength="11" placeholder="CNPJ" required=""/>
                            <input type="text" name="nomeComp" size="20" maxlength="30" placeholder="Nome da empresa" required=""/>
                            <input type="text" name="Fnome" size="20" maxlength="30" placeholder="Nome fantasia" required=""/>
                            <input type="text" name="fone" size="20" maxlength="13" placeholder="Telefone" required=""/>
                            <input type="text" name="cepComp" size="20" maxlength="8" placeholder="CEP" required=""/>
                            <input type="text" name="ruaComp" size="20" maxlength="20" placeholder="Rua" required=""/>
                            <input type="text" name="numComp" size="2" maxlength="20" placeholder="Nº" required=""/>
                            <input type="text" name="bairroComp" size="20" maxlength="20" placeholder="Bairro" required=""/>
                            <input type="text" name="cidadeComp" size="20" maxlength="20" placeholder="Cidade" required=""/> 
                            <input type="text" name="estadoComp" size="20" maxlength="20" placeholder="Estado" required=""/>
                        </fieldset>
                    
                        <fieldset id="InputsApresentacao">
                            <legend>Veiculo</legend>
                            <input type="text" name="placaCarro" size="20" maxlength="7" placeholder="Placa" required=""/>
                            <input type="text" name="modeloCarro" size="20" maxlength="20" placeholder="Modelo" required=""/>
                            <input type="text" name="corCarro" size="20" maxlength="30" placeholder="Cor" required=""/>
                            <input type="text" name="anoCarro" size="20" maxlength="4" placeholder="Ano" required=""/>
                            <input type="text" name="marcaCarro" size="20" maxlength="20" placeholder="Marca" required=""/>
                        </fieldset>
                        <input type="submit" name="btnCadastrar" id="Cadastrar" value="Cadastrar">
                    </form>
                </div>    
            </section>
        </div>
    </body>
</html>
