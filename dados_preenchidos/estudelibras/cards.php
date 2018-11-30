<?php

    include "conexao.php";

    $categoria = $_POST['categoria_id'];

    /* PEGA TODOS OS CARDS EXISTENTES */
    $query_cursos = "SELECT * FROM cards WHERE category_id = :CATEGORIA";
    
    $statement = $PDO->prepare($query_cursos);
    $statement->bindParam(":CATEGORIA", $categoria);
    $statement->execute();

    if($statement->rowCount() > 0){
        $resultadoQuery = $statement->fetchAll(PDO::FETCH_OBJ);

        foreach($resultadoQuery as $resultado) {
            $retornoJson[] = array(
                "status" => "sucesso",
                "id" => $resultado->id,
                "nome" => $resultado->name,
                "video" => $resultado->video,
                "imagem" => $resultado->image,
                "categoria" => $resultado->category_id,
            );
        }
        
    } else{
        $retornoJson = array("status" => "FALHA");
    }

    echo json_encode(["cards" => $retornoJson]);
    
?>