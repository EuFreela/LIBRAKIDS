<?php

    include "conexao.php";
    
    $video = $_POST['id_tutorial'];

    $query_tutorial = "SELECT * FROM cards WHERE id = :VIDEO";
    
    $statement = $PDO->prepare($query_tutorial);
    $statement->bindParam(":VIDEO", $video);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetch(PDO::FETCH_OBJ);

        $retornoJson = array(
            "status" => "SUCESSO",
            "id" => $resultadoQuery->id,
            "nome" => $resultadoQuery->name,
            "video" => $resultadoQuery->video,
            "imagem" => $resultadoQuery->image,
            "categoria" => $resultadoQuery->category_id,
        );
        
    } else{
        $retornoJson = array("status" => "FALHA");
    }

    echo json_encode($retornoJson);
    
?>