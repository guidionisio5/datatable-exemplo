<?php

// linha de codigo que desabilita o warnings e erro do PHP
// error_reporting(0);

include_once 'conexao.php';

// define que a variável será de uso global
// global $con;

function validaCampoVazio($campo,$nomedocampo){

    if($campo == ''){
        $retorno = array(
            'retorno'=>'erro',
            'Mensagem'=>'Preencha o campo '.$nomedocampo.'!');
            $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);
    
           echo $json;
           exit();
    }
}

function addUpdDel($sql,$mensagemre){



    $comando = $GLOBALS['con'] -> prepare($sql);

        $comando -> execute();

        $retorno = array(
            'retorno'=>'ok',
            'Mensagem'=>$mensagemre
        );
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

        echo $json;
}

function pdocatch($erro){
    $retorno = array(
        'retorno' => 'erro',
        'Mensagem'=> $erro->getMessage());
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);


        echo $json;

}

function checkEmailUser($email){

    $sql = "SELECT email FROM tb_login WHERE email = '$email'";

    $comando = $GLOBALS['con'] -> prepare($sql);

    $comando-> execute();

    $validaEmail = $comando -> fetchAll(PDO::FETCH_ASSOC);

    if($validaEmail !=  null){
        $retorno = array(
            'retorno'=>'error  ',
            'Mensagem'=>'Email já cadastrado!!!'
        );
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

        echo $json;
        exit;
    }

}
?>