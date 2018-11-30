<?php

    include "conexao.php";
    
    $email = $_POST['email_login'];
    $senha = $_POST['senha_login'];

    $query_login = "SELECT * FROM users WHERE email = :EMAIL AND pwd = :SENHA";
    
    $statement = $PDO->prepare($query_login);
    $statement->bindParam(":EMAIL", $email);
    $statement->bindParam(":SENHA", $senha);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetch(PDO::FETCH_OBJ);

        $retorno = array(
            "status" => "sucesso",
            "id" => $resultadoQuery->id,
            "email" => $resultadoQuery->email,
            "nome" => $resultadoQuery->name,
        );

    } else{
        $retorno = array("status" => "falha");
    }

    echo json_encode($retorno);
    
?>
