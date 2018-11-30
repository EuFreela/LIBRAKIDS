<?php

    include "conexao.php";

    $user = $_POST['usuario_id'];

    $query_tutorial = "SELECT * FROM history WHERE users_id = :USER";

    $statement = $PDO->prepare($query_tutorial);
    $statement->bindParam(":USER", $user);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetchAll(PDO::FETCH_OBJ);

        foreach($resultadoQuery as $resultado) {
            $retornoJson[] = array(
                "status" => "SUCESSO",
                "id" => $resultado->id,
                "escolha" => $resultado->choice,
                "status_choice" => $resultado->status_choice,
                "quiz_id" => $resultado->quiz_id,
                "user_id" => $resultado->users_id,
            );
        }

    } else{
        $retornoJson = array("status" => "FALHA");
    }

    echo json_encode(["history" => $retornoJson]);
?>