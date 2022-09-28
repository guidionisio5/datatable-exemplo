<?php

include 'include/conexao.php';

try{

    $id = $_POST['id'];

    $sql = "UPDATE tb_usuarios SET ativo = NOT ativo WHERE id = $id";

    $update = $con->prepare($sql);
    $update->execute();

    $retorno = array('retorno'=>'ok','mensagem'=>'Usuário alterado com sucesso!');
    $json = json_encode($retorno, JSON_UNESCAPED_UNICODE); 
    echo $json;

}catch(PDOException $erro){

    $retorno = array('retorno'=>'erro','mensagem'=>$erro->getMessage());
    $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);
    echo $json;

}

?>