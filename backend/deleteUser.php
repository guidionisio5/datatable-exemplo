<?php

include_once ('include/conexao.php');

try{
    
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_usuarios WHERE id=$id";

    $comando = $con->prepare($sql);
    $comando->execute();

    $retorno = array('retorno'=>'ok','mensagem'=>'Usuário excluido com sucesso!');
    $json = json_encode($retorno, JSON_UNESCAPED_UNICODE); 
    echo $json;

}catch(PDOException $erro){

    $retorno = array('retorno'=>'erro','mensagem'=>$erro->getMessage());
    $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);
    echo $json;
}

// Fechar a conexão
$con = null;

?>