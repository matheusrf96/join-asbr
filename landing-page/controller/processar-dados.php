<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../model/lead.php";

if(isset($_POST)){
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $regiao = $_POST['regiao'];
    $unidade = $_POST['unidade'];

    $lead = new Lead($nome, $dataNascimento, $email, $telefone, $regiao, $unidade);
    $lead->inserirLead();
    $lead->enviarLead();

    header("refresh:2;url=../index.html");

}

?>