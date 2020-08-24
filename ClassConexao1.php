<?php

require_once 'ClassUser1.php';

class ClassConexao extends ClassUser {

    public function conectaDB() {
        try {
            $cmd = new PDO("mysql:host=localhost;dbname=projeto1", 'root', '');
            return $cmd;
        } catch (PDOException $Erro) {
            return $Erro->getMensagem();
        }
    }

    public function buscarDados($x) {


        $cmd = $this->conectaDB()->prepare("SELECT * FROM usuario where id=?");
        $cmd->bindValue(1, $x);
        $res = array();
        $cmd->execute();
        if ($cmd->rowCount() > 0) {
            $res = $cmd->fetch(PDO::FETCH_ASSOC); 
            var_dump($res);
        } else {
            return 0;
        }
    }

    //Cadastro
    public function cadastroUsu(ClassUser $u) {
        $sql = "INSERT INTO usuario(nome,email,senha)VALUES (?,?,?)";
        $cmd = $this->conectaDB()->prepare($sql);
        $cmd->bindValue(1, $u->getNome());
        $cmd->bindValue(2, $u->getEmail());
        $cmd->bindValue(3, $u->getSenha());
        $cmd->execute();
        header("location: ..\Class1\index.php");
    }
}
