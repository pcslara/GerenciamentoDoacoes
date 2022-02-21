<html>
<?php
    include 'admin_isauthuser.php';
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if ( empty($_POST) OR empty($_POST['login']) OR empty($_POST['papel']) OR empty($_POST['nome']) OR empty($_POST['senha']) ) {
        echo "Error on POST!<br><br>";
        goto links;       
    }

    include '../model/admin_dao.php';
    
    $nome  = addslashes( $_POST['nome'] );
    $login = addslashes( $_POST['login'] );
    $pass  = sha1( $_POST['senha'] );
    $papel = addslashes( $_POST['papel'] );
    $id_centro = addslashes( $_POST['id_centro'] );
    
    if( existUser($login ) ) {
        echo "Já existe um usuário com este login<br><br>";
        goto links;
    }

    if( insertUser( $nome, $login, $pass, $papel, $id_centro) ) {
        echo "Usuário inserido com sucesso!<br><br>";
    } else {
        echo "Erro ao inserir o usuário!<br><br>";
    }

links:
    include "../view/admin_links.php";

?>
</html>


