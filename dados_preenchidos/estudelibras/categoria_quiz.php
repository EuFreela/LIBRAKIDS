<?php

    include "conexao.php";

    $categoria = $_POST['id_categoria'];

    $query_quiz = "SELECT * FROM quiz WHERE category_id = :IDCATEGORIA";

    $statement = $PDO->prepare($query_quiz);
    $statement->bindParam(":IDCATEGORIA", $categoria);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetchAll(PDO::FETCH_OBJ);
        
        foreach($resultadoQuery as $resultado) {
            $retornoQuiz[] = array(
                "status" => "SUCESSO",
                "id" => $resultado->id,
                "pergunta" => $resultado->ask,
                "resposta1" => $resultado->answer_1,
                "resposta2" => $resultado->answer_2,
                "resposta3" => $resultado->answer_3,
                "respostaCorreta" => $resultado->correct_answer,
                "categoria_id" => $resultado->category_id,
            );
        }

    } else{
        $retornoQuiz = array("status" => "FALHA");
    }

    echo json_encode(["quiz" => $retornoQuiz]);
?>