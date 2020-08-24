<?php
require_once 'ClassConexao1.php';
class Carro extends ClassConexao{
    private $placa;
    private $modelo;
    private $ano;
    private $cor;
    private $marca;
    
    public function getPlaca() {
        return $this->placa;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function cadastroCarro(Carro $carro,$idComp){
       $sql="INSERT INTO carro(placa,modelo,cor,ano,marca,idEmpresa)VALUES (?,?,?,?,?,?)";
       $cmd = $this->conectaDB()->prepare($sql);
       $cmd->bindValue(1,$carro->getPlaca());
       $cmd->bindValue(2,$carro->getModelo());
       $cmd->bindValue(3,$carro->getCor());
       $cmd->bindValue(4,$carro->getAno());
       $cmd->bindValue(5,$carro->getMarca());
       $cmd->bindValue(6,$idComp);
       $cmd->execute();
   }
   public function atualizarCarro($placa, $modelo, $cor, $ano, $marca,$cpf) {
        $sql = "update clientes join carro on clientes.idEmpresa = carro.idEmpresa set carro.placa=?, carro.modelo=?, carro.cor=?, carro.ano=?, carro.marca=? where clientes.CPF=?";
        $cmd = $this->conectaDB()->prepare($sql);
        $cmd->bindValue(1, $placa);
        $cmd->bindValue(2, $modelo);
        $cmd->bindValue(3, $cor);
        $cmd->bindValue(4, $ano);
        $cmd->bindValue(5, $marca);
        $cmd->bindValue(6, $cpf);
        $cmd->execute();
    }
    
}
