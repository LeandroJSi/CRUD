<?php
require_once 'ClassConexao1.php';
class Endereco extends ClassConexao{
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
    
    public function cadastroEnd(Endereco $e,$idCliente){
       $sql="INSERT INTO endereco(CEP,rua,num,bairro,cidade,estado,idCliente)VALUES (?,?,?,?,?,?,?)";
       $cmd =$this->conectaDB()->prepare($sql);
       $cmd->bindValue(1,$e->getCep());
       $cmd->bindValue(2,$e->getRua());
       $cmd->bindValue(3,$e->getNumero());
       $cmd->bindValue(4,$e->getBairro());
       $cmd->bindValue(5,$e->getCidade());
       $cmd->bindValue(6,$e->getEstado());
       $cmd->bindValue(7,$idCliente);
       $cmd->execute();

   }
    
}
