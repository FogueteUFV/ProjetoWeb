<?php
require_once 'Conexao.php';
require_once 'Inscricao.php';

class CursoDAO{

    public function criar(Inscricao $inscricao){
        $sql = 'insert into inscricao curso values (?)';
        $stmt  = Conexao::conecta()->prepare($sql);
        $stmt->bindvalue(1,$inscricao->getCurso());
        $stmt->execute();
    }

    public function alterar(Inscricao $inscricao, $ins){
        $sql = 'update inscricao set curso=? where matricula = ?';
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindvalue(1,$inscricao->getCurso());
        $stmt->bindvalue(2,$ins);
        $stmt->execute();
    }


}


?>