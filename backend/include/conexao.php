<?php

try{
    // dados da conexão com o BD
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('BASEDADOS','db_datatable');

    $con = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDADOS.";charset=utf8",USUARIO,SENHA);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado com sucesso!";

}catch(PDOException $erro){
    echo "Erro ao conectar no banco de dados: ".$erro->getMessage();
}

?>