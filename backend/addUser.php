<?php

include 'function.php';

try{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirma = $_POST['confirmar'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

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
    


        $sql = "INSERT INTO tb_login (`nome`, `email`, `senha`,`telefone`,`cpf`) values ('$nome', '$email', '$senha_cripto','$telefone','$cpf')";
        
        $msg = "usuario adc";

        addUpdDel($sql,$msg);

}catch(PDOException $erro) {
    pdocatch($erro);
}

?>