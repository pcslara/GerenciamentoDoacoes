<html>
<?php
    

    if ( empty($_POST) OR empty($_POST['centro_id']) OR empty($_POST['produto_id']) OR empty($_POST['quantidade']) ) {
        echo "Error on POST!<br><br>";
        goto links;       
    }

    include '../model/manager_dao.php';
    
    $centro_id  = addslashes( $_POST['centro_id'] );
    $produto_id = addslashes( $_POST['produto_id'] );
    $quantidade  = addslashes( $_POST['quantidade'] );
    
    if( defineDemanda($centro_id, $produto_id, $quantidade) ){ 
        echo "Demanda definida com sucesso!<br><br>";
    } else {
        echo "Erro ao definir demanda<br><br>";
    }

links:
    include "../view/manager_links.php";

?>
</html>


