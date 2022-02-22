<html>
<?php
    include 'admin_isauthuser.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if ( empty($_POST) OR empty($_POST['nome']) OR empty($_POST['papel']) OR empty($_POST['nome']) ) {
        echo "Error on POST!<br><br>";
        goto links;       
    }

    include '../model/admin_dao.php';
    
    $id  = addslashes( $_POST['id'] );
    $nome  = addslashes( $_POST['nome'] );
    $login = addslashes( $_POST['login'] );
    $pass = "";
    
    if( $_POST['senha'] != "" )
        $pass  = sha1( $_POST['senha'] );
    
    $papel = addslashes( $_POST['papel'] );
    $id_centro = addslashes( $_POST['id_centro'] );
    
    if( $_POST['action'] == "Salvar" ) {
        if( updateUser( $id, $nome, $login, $pass, $papel, $id_centro) ) {
            echo "Usuário atualizado com sucesso!<br><br>";
        } else {
            echo "Erro ao atualizar o usuário!<br><br>";
        }
    } else if( $_POST['action'] == "Remover" ) {
        if( removerUsuario( $id ) ) {
             echo "Usuário $id removido com sucesso !<br><br>";
        } else {
             echo "Erro ao remover o usuário!<br><br>";
        }    
    }

links:
    include "../view/admin_links.php";

?>
</html>


