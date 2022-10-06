<?php

include 'function.php';

try{

    // define os caracteres que iremos remover dos campos preenchidos no form (replace)
    $carac = array('(',')','-',' ','.');

    $id = $_POST['id'];
    $nome = $_POST['edita-nome'];
    $email = $_POST['edita-email'];
    $telefone = str_replace($carac,"",$_POST['edita-telefone']);
    $cpf = str_replace($carac,"",$_POST['edita-cpf']);
    $senha = $_POST['edita-senha'];
    $confirma = $_POST['edita-confirmar'];
    

    validaCampoVazio($nome,'edita-nome');
    validaCampoVazio($email,'edita-email');
    validaCampoVazio($cpf,'edita-cpf');
    validaCampoVazio($telefone,'edita-telefone');
    validaCampoVazio($senha,'edita-senha');
    validaCampoVazio($confirma,'edita-confirma');

    if($senha != $confirma) {

       $retorno = array(
        'retorno'=>'erro',
        'Mensagem'=>'Senhas não conferem, tente novamente');
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

       echo $json;
       exit();

    } 

    $senha_cripto = sha1($senha);

        $sql = "UPDATE tb_login SET `nome` = '$nome', `email` = '$email', `telefone` = '$telefone', `cpf` = '$cpf', `senha` = '$senha_cripto' WHERE id = $id";
        
        $msg = "Usuário alterado";

        addUpdDel($sql,$msg);

}catch(PDOException $erro) {
    pdocatch($erro);
}

?>