<?php

class ClassUser {
   private $id;
   private $email;
   private $nome;
   private $senha;
   
   public function getId() {
       return $this->id;
   }

   public function getEmail() {
       return $this->email;
   }

   public function getNome() {
       return $this->nome;
   }

   public function getSenha() {
       return $this->senha;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setEmail($email) {
       $this->email = $email;
   }

   public function setNome($nome) {
       $this->nome = $nome;
   }

   public function setSenha($senha) {
       $this->senha = $senha;
   }


}
