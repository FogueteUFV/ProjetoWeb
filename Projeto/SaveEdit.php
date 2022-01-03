<?php
    require_once 'InscriDAO.php';
    require_once 'Inscricao.php';
    
    $nootbook = new Inscricao();
    
    $nootbook->setNome($_POST['nome']);
    $nootbook->setCpf($_POST['cpf']);
    $nootbook->setEmail($_POST['email']);
    $nootbook->setMatricula($_POST['matricula']);
    $nootbook->setSexo($_POST['sexo']);
    $nootbook->setData($_POST['data']);
    $nootbook->setSenha($_POST['senha']);
    
    $nootbookDAO = new InscriDAO();
    session_start();
    $nootbookDAO->alterar($nootbook, $_SESSION['matricula']);
    header('location: Logado.php');
?>