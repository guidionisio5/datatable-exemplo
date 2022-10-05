<?php

include 'function.php';

try{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $confirma = $_POST['confirmar'];

    validaCampoVazio($nome,'nome');
    validaCampoVazio($email,'email');
    validaCampoVazio($telefone,'telefone');
    validaCampoVazio($cpf,'cpf');
    validaCampoVazio($senha,'senha');
    validaCampoVazio($confirma,'confirma');

    checkEmailUser($email);


    if($senha != $confirma) {

       $retorno = array(
        'retorno'=>'erro',
        'Mensagem'=>'Senhas não conferem, tente novamente');
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

       echo $json;
       exit();

    } 

    // Criptografar a senha do usuario
    // Alguns algo de cript: sha1, md5, password hash php
    
    $senha_cripto = sha1($senha);

    $sql = "INSERT INTO tb_login (`nome`, `email`, `telefone`, `cpf`, `senha`) values ('$nome', '$email', '$telefone', '$cpf', '$senha_cripto')";
        
    $msg = "usuario adc";

    addUpdDel($sql,$msg);

}catch(PDOException $erro) {
    pdocatch($erro);
}

?>