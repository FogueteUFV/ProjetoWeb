<?php

    require_once 'Inscricao.php';
    require_once 'InscriDAO.php';

    $insc = new InscriDAO();

    $insc->remover($_GET['matricula']);
    header('location: Listar.php');
?>