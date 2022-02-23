<html>
<?php

    include 'admin_isauthuser.php';
    

    if ( empty($_POST) OR empty($_POST['nome']) OR empty($_POST['endereco']) ) {
        echo "Error on POST!<br><br>";
        goto links;       
    }

    include '../model/admin_dao.php';
    
    $nome  = addslashes( $_POST['nome'] );
    $endereco = addslashes( $_POST['endereco'] );
    $nome_contato  = addslashes( $_POST['nome_contato'] );
    $telefone_contato = addslashes( $_POST['telefone_contato'] );
    
    if( insertCentro($nome, $endereco, $nome_contato, $telefone_contato) ){ 
        echo "Centro de apoio inserido com sucesso!<br><br>";
    } else {
        echo "Erro ao inserir o centro de apoio<br><br>";
    }

links:
    include "../view/admin_links.php";

?>
</html>


