<?php

    include "conexao.php";

    $quiz = $_POST['id_card'];

    $query_quiz = "SELECT * FROM quiz WHERE cards_id = :IDCARD";

    $statement = $PDO->prepare($query_quiz);
    $statement->bindParam(":IDCARD", $quiz);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetch(PDO::FETCH_OBJ);

        $retornoQuiz = array(
            "status" => "SUCESSO",
            "id" => $resultadoQuery->id,
            "pergunta" => $resultadoQuery->ask,
            "respostaCorreta" => $resultadoQuery->correct_answer,
            "resposta1" => $resultadoQuery->answer_1,
            "resposta2" => $resultadoQuery->answer_2,
            "resposta3" => $resultadoQuery->answer_3,
            "card_id" => $resultadoQuery->cards_id,
        );

    } else{
        $retornoJson = array("status" => "FALHA");
    }

    echo json_encode(["quiz" => $retornoQuiz]);
?>