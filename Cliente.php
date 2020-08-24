<?php

require_once 'ClassCOnexao1.php';

class Cliente extends ClassConexao {

    private $CPF;
    private $CNH;
    private $fone;
    private $nome;

    public function getCPF() {
        return $this->CPF;
    }

    public function getCNH() {
        return $this->CNH;
    }

    public function getFone() {
        return $this->fone;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setCPF($CPF) {
        $this->CPF = $CPF;
    }

    public function setCNH($CNH) {
        $this->CNH = $CNH;
    }

    public function setFone($fone) {
        $this->fone = $fone;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function cadastroCliente(Cliente $cliente, $idComp) {
        $conexao =$this->conectaDB();
        $sql = "INSERT INTO clientes(CPF,CNH,Fone,nome,idEmpresa)VALUES (?,?,?,?,?)";
        $cmd =$conexao->prepare($sql);
        $cmd->bindValue(1, $cliente->getCPF());
        $cmd->bindValue(2, $cliente->getCNH());
        $cmd->bindValue(3, $cliente->getFone());
        $cmd->bindValue(4, $cliente->getNome());
        $cmd->bindValue(5, $idComp);
        $cmd->execute();
        return $conexao->lastInsertId();
    }
    
    
    public function buscaCliente($cpf) {
        $sql = "SELECT clientes.nome,clientes.CPF,clientes.CNH,clientes.Fone,carro.placa,carro.modelo,carro.cor,carro.ano,carro.marca,companhia.cnpj,companhia.nomeemp,companhia.foneemp,companhia.nomeFantasia, endereco.cep, endereco.rua, endereco.num, endereco.bairro, endereco.cidade, endereco.estado FROM clientes join companhia on clientes.idEmpresa=companhia.id join carro on companhia.id=carro.idEmpresa join endereco on clientes.id = endereco.idCliente where clientes.CPF=?";
        $busc = $this->conectaDb()->prepare($sql);
        $busc->bindValue(1, $cpf);

        $res = array();
        $busc->execute();
        if ($busc->rowCount() > 0) {
            $res = $busc->fetch(PDO::FETCH_ASSOC);
            return $res;
        } else {
            return 0;
        }
    }

    public function atualizarCliente($nome, $fone, $cep, $rua, $num, $bairro, $cidade, $cpf) {
        $sql = "update clientes join carro on clientes.idEmpresa = carro.idEmpresa join endereco on clientes.id = endereco.idCliente set clientes.nome=?, clientes.Fone=?,endereco.cep=?, endereco.rua=?, endereco.num=?, endereco.bairro=?, endereco.cidade=? where clientes.CPF=?";
        $cmd = $this->conectaDB()->prepare($sql);
        $cmd->bindValue(1, $nome);
        $cmd->bindValue(2, $fone);
        $cmd->bindValue(3, $cep);
        $cmd->bindValue(4, $rua);
        $cmd->bindValue(5, $num);
        $cmd->bindValue(6, $bairro);
        $cmd->bindValue(7, $cidade);
        $cmd->bindValue(8, $cpf);
        $cmd->execute();
    }
        public function DeletarCliente($id) {
        $sql = "Delete companhia from companhia where companhia.id=?";
        $cmd = $this->conectaDB()->prepare($sql);
        $cmd->bindValue(1,$id);
        $cmd->execute();
    }

}
