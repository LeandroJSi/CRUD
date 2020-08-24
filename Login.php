<?php

require_once 'ClassConexao1.php';

class Login extends ClassConexao {

    public function __construct() {
        
    }

    public function Logar($email, $senha) {
        $lg = $this->conectaDB()->prepare("SELECT id,email,senha,nome,admi FROM usuario WHERE email=? and senha=?");
        $lg->bindValue(1, $email);
        $lg->bindValue(2, $senha);
        $lg->execute();

        if ($lg->rowCount() == 0) {
            header('location: ..\Class1\index.php');
            
        } else {
            session_start();
            $rst = $lg->fetch();
            $_SESSION['Usu'] = $rst;
            $_SESSION['Usu'];
            header('location: ..\Class1\Perfil.php');
        }
    }

    public function Deslogar($x) {
        if ($x=='sair') {
           session_unset();
           session_destroy();
           header("location: ..\Class1\index.php");
        }  
    }

}
