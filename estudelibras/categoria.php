<?php

    include "conexao.php";

    $query_tutorial = "SELECT * FROM category";

    $statement = $PDO->prepare($query_tutorial);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetchAll(PDO::FETCH_OBJ);

        foreach($resultadoQuery as $resultado) {
            $retornoJson[] = array(
                "status" => "SUCESSO",
                "id" => $resultado->id,
                "nome" => $resultado->name,
                "imagem" => $resultado->image,
            );
        }

    } else{
        $retornoJson = array("status" => "FALHA");
    }

    echo json_encode(["categorias" => $retornoJson]);
?>