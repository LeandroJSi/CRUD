<?php
require_once 'ClassConexao1.php';
class Companhia extends ClassConexao {
    private $cnpj;
    private $nome;
    private $Fnome;
    private $fone;
    
    public function getCnpj() {
        return $this->cnpj;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getFnome() {
        return $this->Fnome;
    }

    public function getFone() {
        return $this->fone;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setFnome($Fnome) {
        $this->Fnome = $Fnome;
    }

    public function setFone($fone) {
        $this->fone = $fone;
    }
    
    public function cadastroComp(Companhia $companhia){
       $conexao = $this->conectaDB();
       $sql="INSERT INTO companhia(cnpj,nomeemp,foneemp,nomeFantasia)VALUES (?,?,?,?)";
       $comp =$conexao->prepare($sql);
       $comp->bindValue(1,$companhia->getCnpj());
       $comp->bindValue(2,$companhia->getNome());
       $comp->bindValue(3,$companhia->getFone());
       $comp->bindValue(4,$companhia->getFnome());
       $comp->execute();
       return $conexao->lastInsertId();
   }
   public function buscaCompanhia($id) {
        $sql = "SELECT companhia.id FROM companhia join clientes on clientes.IdEmpresa=companhia.id where clientes.CPF=?";
        $busc = $this->conectaDb()->prepare($sql);
        $busc->bindValue(1, $id);

        $res = array();
        $busc->execute();
        if ($busc->rowCount() > 0) {
            $res = $busc->fetch(PDO::FETCH_ASSOC);
            return $res["id"];
        } else {
            return 0;
        }
    }
}
