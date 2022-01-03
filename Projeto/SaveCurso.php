<?php

require_once 'CursoDAO.php';
require_once 'Inscricao.php';
session_start();
$nootbook = new Inscricao();


$nootbook->setCurso($_POST['curso']);
$nootbookDAO = new CursoDAO();
$nootbookDAO->alterar($nootbook, $_SESSION['matricula']);
header('location: Logado.php');
?>