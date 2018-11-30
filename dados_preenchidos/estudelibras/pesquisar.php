<?php

    $categoria = $_POST['categoria_id'];

    $query_tutorial = "SELECT * FROM cards WHERE category_id = :CATEGORY";

    $statement = $PDO->prepare($query_tutorial);
    $statement->bindParam(":CATEGORY", $categoria);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetch(PDO::FETCH_OBJ);

        foreach($resultadoQuery as $resultado) {
            $retornoJson = array(
                "status" => "sucesso",
                "id" => $resultado->id,
                "nome" => $resultado->name,//["name"],
                "video" => $resultado->video,//["video"],
                "descricao" => $resultado->description,
                "categoria" => $resultado->category_id,
            );
        }

    } else{
        $retornoJson = array("status" => "FALHA");
    }

    echo json_encode(["history" => $retornoJson]);
?>