<!DOCTYPE html>
<html lang="pt-br">
    <head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="Projeto1.css"/>
    </head>
	
    <body>
        <?php            
            require_once 'Login.php';
            $l=new Login();
            if(isset($_SESSION['Usu'])){
                header('location: \Class1\PagCad.php');
            }
            if(isset($_POST['login'])){
                if((!empty($_POST['email'])) and (!empty($_POST['pass']))){
                    $l->Logar($_POST['email'],$_POST['pass']); 
                }
                   
            }
                   
            if(isset($_POST['cads'])){
                header('location: \Class1\PagCad.php');    
            }
        ?>
        <div id="p">
            <div id="form-cad">
                <form method="POST" action="">
                    <fieldset>
                        <legend>Login:</legend>
                        
                        <p><label for="User">Email:  <label><input type="text" name="email" size="20" maxlength="35" placeholder="Endereço de email"></p>
                        <p><label for="Pass">Senha:</label><input type="password" name="pass" size="20" maxlength="8" placeholder=" 8 dígitos"/></p>
                        <input type="submit" id="Cad" name="cads" value="Cadastro" size="20">
                        <input type="submit" id="Login" name="login" value="Login" size="20">
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>