<?php

    include "conexao.php";
    
    $email = $_POST['email_usuario'];

    $query_usuario = "SELECT * FROM users WHERE email = :EMAIL";
    
    $statement = $PDO->prepare($query_usuario);
    $statement->bindParam(":EMAIL", $email);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoUsuario = $statement->fetch(PDO::FETCH_OBJ);

        $retorno = array(
            "status" => "sucesso",
            "id" => $resultadoUsuario->id,
            "email" => $resultadoUsuario->email,
            "nome" => $resultadoUsuario->name,
        );

        //QUERY PARA OS PONTOS
        $query_pontos = "SELECT * FROM points WHERE users_id = :USER";
        
        $statementPontos = $PDO->prepare($query_pontos);
        $statementPontos->bindParam(":USER", $resultadoUsuario->id);
        $statementPontos->execute();

        if($statementPontos->rowCount() > 0){
            $resultadoPontos = $statementPontos->fetch(PDO::FETCH_OBJ);

            $retorno += array(
                "pontos" => $resultadoPontos->score,
            );

        }

    } else{
        $retorno = array("status" => "falha");
    }

    echo json_encode($retorno);
    
?>