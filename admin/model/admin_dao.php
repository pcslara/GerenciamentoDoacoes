<?php
function existUser($login ) {
    include '../../globals/configdb.php';
    
    $sql = "SELECT `id`, `nome` FROM `usuario` WHERE (`login` = '".$login ."') LIMIT 1";
    $query = mysqli_query($conn, $sql);
    
    
    if (mysqli_num_rows($query) == 1) {
        return true;    
    }
    
    return false;
}

function insertUser($nome, $login, $pass, $papel, $id_centro) {
    
    include '../../globals/configdb.php';
    
    $query = "INSERT INTO usuario(nome, login, pass, papel, id_centro, ativo) VALUES('$nome', '$login', '$pass', '$papel','$id_centro', '1' )";
    
    mysqli_query($conn, $query) or die("Erro no insert user");
    
}
    
?>
