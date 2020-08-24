<?php
require_once 'ClassConexao1.php';
class EnderecoComp extends ClassConexao{
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    
    public function getCep() {
        return $this->cep;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function cadastroEndComp(EnderecoComp $Endcomp,$idComp){
       
       $sql="INSERT INTO enderecocomp(cep,rua,num,bairro,cidade,estado,idEmpresa)VALUES (?,?,?,?,?,?,?)";
       $cmd = $this->conectaDB()->prepare($sql);
       $cmd->bindValue(1,$Endcomp->getCep());
       $cmd->bindValue(2,$Endcomp->getRua());
       $cmd->bindValue(3,$Endcomp->getNumero());
       $cmd->bindValue(4,$Endcomp->getBairro());
       $cmd->bindValue(5,$Endcomp->getCidade());
       $cmd->bindValue(6,$Endcomp->getEstado());
       $cmd->bindValue(7,$idComp);
       
       $cmd->execute();
       
   }
    
}
