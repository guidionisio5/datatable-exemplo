<?php

include_once ('include/conexao.php');

try{

    $sql = 'SELECT `id`,`nome`,`email`,`ativo`,`data_cadastro` FROM tb_usuarios';

    $comando = $con->prepare($sql);
    $comando->execute();

    // fetch ajuda a organizar o que virá do banco
    $retorno = $comando->fetchAll(PDO::FETCH_ASSOC); 
    $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);
    echo $json;

}catch(PDOException $erro){
    // Tratamento de erro ou excercao
    $retorno = array('retorno'=>'erro','mensagem'=>$erro->getMessage());

    $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);
    echo $json;
}

// Fechar a conexão
$con = null;

?>