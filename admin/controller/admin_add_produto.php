<html>
<?php
    

    if ( empty($_POST) OR empty($_POST['nome']) OR empty($_POST['unidade_medida']) ) {
        echo "Error on POST!<br><br>";
        goto links;       
    }

    include '../model/admin_dao.php';
    
    $nome  = addslashes( $_POST['nome'] );
    $unidade_medida = addslashes( $_POST['unidade_medida'] );
    
    if( insertProduto($nome, $unidade_medida) ){ 
        echo "Produto inserido com sucesso!<br><br>";
    } else {
        echo "Erro ao inserir o produto<br><br>";
    }

links:
    include "../view/admin_links.php";

?>
</html>


