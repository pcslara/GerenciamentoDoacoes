<?php


function existUser($login ) {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT id FROM usuario WHERE (login = '".$login ."') LIMIT 1";
    $results = $db->query( $sql );
    $count = 0;
    while ($row = $results->fetchArray()) {
        $count++;
    }
    
    if ($count == 1) {
        return true;    
    }
    
    return false;
}


function getCentros() {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM centro_apoio ORDER BY nome DESC";
    $results = $db->query( $sql );
    $arr = array();
    $i = 0;
    while ($row = $results->fetchArray()) {
        $arr[$i] = $row;
        $i++;  
    }
    
    return $arr;
    
}

function getCentroNomeById( $id_centro) {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT nome, endereco, id  FROM centro_apoio WHERE id=$id_centro";
    $results = $db->query( $sql );
    $arr = array();
    $i = 0;
    while ($row = $results->fetchArray()) {
        return $row['nome'];
    }
    
    return null;
    
}


function getUsuarios() {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario ORDER BY nome DESC";
    $results = $db->query( $sql );
    $arr = array();
    $i = 0;
    while ($row = $results->fetchArray()) {
        $arr[$i] = $row;
        $i++;  
    }
    
    return $arr;
    
}

function getUsuario( $id ) {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario WHERE id='$id'";
    $results = $db->query( $sql );
    if ($row = $results->fetchArray() ) {
        return $row;
    }
    
    return null;
    
}

function getUsuarioByLogin( $login ) {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario WHERE login='$login'";
    $results = $db->query( $sql );
    if ($row = $results->fetchArray() ) {
        return $row;
    }
    
    return null;
    
}

function insertUser($nome, $login, $pass, $papel, $id_centro) {
    
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "INSERT INTO usuario(nome, login, pass, papel, id_centro, ativo) VALUES('$nome', '$login', '$pass', '$papel','$id_centro', '1' )";
    
    return $db->exec( $sql );
    
}

function canLogin( $login, $pass ) {
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario WHERE login='$login' AND pass='$pass'";
    $results = $db->query( $sql );
    
    if ($row = $results->fetchArray()) {
        return true;  
    }
    
    return false;
    
}

function updateUser($id, $nome, $login, $pass, $papel, $id_centro) {
    $db = new SQLite3( '../../database/doacoespet.db' );
    if( $pass != "" ) {
        $sql = "UPDATE usuario SET nome='$nome', login='$login', pass='$pass', papel='$papel', id_centro='$id_centro' WHERE id='$id'";
    } else {
        $sql = "UPDATE usuario SET nome='$nome', login='$login', papel='$papel', id_centro='$id_centro' WHERE id='$id'";
    }
    return $db->exec( $sql );
    
}

function insertCentro($nome, $endereco, $nome_contato, $telefone_contato) {
    $db = new SQLite3( '../../database/doacoespet.db' );
    $sql = "INSERT INTO centro_apoio(nome, endereco, nome_contato, telefone_contato) VALUES('$nome', '$endereco', '$nome_contato', '$telefone_contato' )";
    return $db->exec( $sql );
    
}



    
?>
