<html>
<?php
  

    if ( empty($_POST) OR empty($_POST['login']) OR empty($_POST['papel']) OR empty($_POST['nome']) OR empty($_POST['senha']) ) {
        echo "Error on POST!<br><br>";
        goto links;       
    }

    include '../../globals/configdb.php';
    include '../model/admin_dao.php';
    
    $nome  = addslashes( $_POST['nome'] );
    $login = addslashes( $_POST['login'] );
    $pass  = sha1( $_POST['senha'] );
    $nivel = addslashes( $_POST['papel'] );
    $id_centro = 0;
    
    if( existUser($login ) ) {
        goto links;
    }

    insertUser($nome, $login, $pass, $papel, $id_centro);
    
    echo "Usuário inserido com sucesso!<br><br>";

links:
    include "admin_links.php";

?>
</html>


