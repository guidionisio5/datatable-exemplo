<?php

// include do arquivo de conexao
include_once('include/conexao.php');

try{

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];

    if($senha != $confirmar){
        // cria um array para armazenar a mensagem de erro
        $retorno = array('Mensagem'=>'Senhas não conferem, verifique e tente novamente');
        
        // cria uma variavel que ira receber o array acima convertido em JSON 
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

        // retorno em formato JSON 
        echo $json;
        // encerra o script
        exit;
    }

    $sql = "INSERT INTO tb_usuarios (`nome`,`email`,`senha`) VALUES ('$nome','$email','$senha')";

    $comando = $con->prepare($sql);
    $comando->execute();

    // mensagem de retorno
    $retorno = array('Mensagem'=>'Usuário adicionado com sucesso');
    $json = json_encode($retorno, JSON_UNESCAPED_UNICODE); 
    echo $json;

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>