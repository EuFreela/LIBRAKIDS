<?php

    $dataSourceName = "mysql:host=localhost;dbname=libras;charset=utf8";
    $usuario = "root";
    $senha = "@@Senha098@@"; 

    try{
        $PDO = new PDO($dataSourceName, $usuario, $senha);

    } catch(PDOException $erro){
        echo "Erro de conexão.";
        exit;
    }   

?>
