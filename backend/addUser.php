<?php

include 'function.php';

try{

    // define os caracteres que iremos remover dos campos preenchidos no form (replace)
    $carac = array('(',')','-',' ','.');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = str_replace($carac,"",$_POST['telefone']);
    $cpf = str_replace($carac,"",$_POST['cpf']);
    $senha = $_POST['senha'];
    $confirma = $_POST['confirmar'];
    

    validaCampoVazio($nome,'nome');
    validaCampoVazio($email,'email');
    validaCampoVazio($senha,'senha');
    validaCampoVazio($confirma,'confirma');
    validaCampoVazio($cpf,'cpf');
    validaCampoVazio($telefone,'telefone');

    checkEmailUser($email);


    if($senha != $confirma) {

       $retorno = array(
        'retorno'=>'erro',
        'Mensagem'=>'Senhas não conferem, tente novamente');
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

       echo $json;
       exit();

    } 

    $senha_cripto = sha1($senha);

        $sql = "INSERT INTO tb_login(`nome`, `email`, `telefone`, `cpf`, `senha`) values ('$nome', '$email', '$telefone', '$cpf', '$senha_cripto')";
        
        $msg = "Usuário adicionado";

        addUpdDel($sql,$msg);

}catch(PDOException $erro) {
    pdocatch($erro);
}

?>