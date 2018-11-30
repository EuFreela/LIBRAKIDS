<?php

    include "conexao.php";
    
    $usuario = $_POST['id_usuario'];
    $quiz = $_POST['id_quiz'];
    $status = $_POST['status'];
    $escolha = $_POST['escolha'];

    if($status == "acertou"){

        $query_pontoAtual = "SELECT * FROM points WHERE users_id = :USER";

        $stmtPontoAtual = $PDO->prepare($query_pontoAtual);
        $stmtPontoAtual->bindParam(":USER", $usuario);
        $stmtPontoAtual->execute();

        if($stmtPontoAtual->rowCount() > 0){
            $resultadoPontoAtual = $stmtPontoAtual->fetch(PDO::FETCH_OBJ);
            $pontoAtual = $resultadoPontoAtual->score;
    
            $query_pontos = "UPDATE points SET score = :SCORE WHERE users_id = :USER";
        
            $statement = $PDO->prepare($query_pontos);
            $statement->execute(array(
                ':USER' => $usuario,
                ':SCORE' => $pontoAtual+1,
            ));
        }

        $query_historico = "INSERT INTO history (choice, status_choice, users_id, quiz_id) VALUES (:CHOICE, :MENSAGEM, :USER, :QUIZ)";
        $stmtHistorico = $PDO->prepare($query_historico);
        $stmtHistorico->execute(array(
            ':CHOICE' => $escolha,
            ':MENSAGEM'=> "ACERTOU",
            ':USER' => $usuario,
            ':QUIZ' => $quiz,
        ));
        
    } else{

        $query_historico = "INSERT INTO history (choice, status_choice, users_id, quiz_id) VALUES (:CHOICE, :MENSAGEM, :USER, :QUIZ)";
        $stmtHistorico = $PDO->prepare($query_historico);
        $stmtHistorico->execute(array(
            ':CHOICE' => $escolha,
            ':MENSAGEM'=> "ERROU",
            ':USER' => $usuario,
            ':QUIZ' => $quiz,
        ));

    }
     

    
?>