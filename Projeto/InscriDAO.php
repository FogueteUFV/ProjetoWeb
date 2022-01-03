<?php
require_once 'Conexao.php';
require_once 'Inscricao.php';

class InscriDAO{

    public function criar(Inscricao $inscricao){
        $sql = 'insert into inscricao (cpf, nome, email, matricula, sexo, data, permi, senha) values (?,?,?,?,?,?,?,?)';
        $stmt  = Conexao::conecta()->prepare($sql);
        $stmt->bindvalue(1,$inscricao->getCpf());
        $stmt->bindvalue(2,$inscricao->getNome());
        $stmt->bindvalue(3,$inscricao->getEmail());
        $stmt->bindvalue(4,$inscricao->getMatricula());
        $stmt->bindvalue(5,$inscricao->getSexo());
        $stmt->bindvalue(6,$inscricao->getData());
        $stmt->bindvalue(7,0);
        $stmt->bindvalue(8,MD5($inscricao->getSenha()));
        $stmt->execute();
    }

    public function alterar(Inscricao $inscricao, $ins){
        $sql = 'update inscricao set nome=?, email=?,sexo=?,data=?,senha=? where matricula = ?';
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindvalue(1,$inscricao->getNome());
        $stmt->bindvalue(2,$inscricao->getEmail());
        $stmt->bindvalue(3,$inscricao->getSexo());
        $stmt->bindvalue(4,$inscricao->getData());
        $stmt->bindvalue(5,MD5($inscricao->getSenha()));
        $stmt->bindvalue(6,$ins);

        $stmt->execute();
    }

    public function ler($ins){
        $sql = 'select * from inscricao where matricula = ?';
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindvalue(1,$ins);
        $stmt->execute();

        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
        
    }
    public function list($ins){ 
        $sql = 'select * from incricao where curso = ?';
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindvalue(1,$ins);
        $stmt->execute();

        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;

    }
    public function cadastro(){
        $sql = 'select * from inscricao where permi = 0';
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function remover($matricula){
        $sql ='delete from inscricao where matricula = ?';
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1,$matricula);
        $stmt->execute();

        
    }


}


?>