<?php

class Inscricao{
    private $nome, $cpf, $email, $dataNasc, $matricula, $sexo, $senha,$curso;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }
    
    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($value){
        $this->cpf = $value;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($value){
        $this->email = $value;
    }
    
    public function getData(){
        return $this->dataNasc;
    }

    public function setData($value){
        $this->dataNasc = $value;
    }
    
    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($value){
        $this->matricula = $value;
    }
    
    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($value){
        $this->sexo = $value;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($value){
        $this->senha = $value;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function setCurso($value){
        $this->curso = $value;
    }
    
}

?>