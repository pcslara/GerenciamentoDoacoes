<?php


function existUser($login ) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT id FROM usuario WHERE (login = '".$login ."') LIMIT 1";
    $count = 0;
    foreach ( $db->query( $sql ) as $row) {
        $count++;
    }
    
    if ($count == 1) {
        return true;    
    }
    
    return false;
}


function getCentros() {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM centro_apoio ORDER BY nome DESC";
    
    $arr = array();
    $i = 0;
    foreach ( $db->query( $sql ) as $row) {
        $arr[$i] = $row;
        $i++;  
    }
    
    return $arr;
    
}
function removeCentro( $id ) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "DELETE FROM centro_apoio WHERE id='$id'";
    
    return $db->exec( $sql );
    
}
function updateCentro( $id, $nome, $nome_contato, $telefone_contato, $endereco ) {

    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    $sql = "UPDATE centro_apoio SET nome='$nome', nome_contato='$nome_contato', telefone_contato='$telefone_contato', endereco='$endereco' WHERE id='$id'";
    return $db->exec( $sql );
}

function updateProduto( $id, $nome, $unidade_medida ) {

    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    $sql = "UPDATE produto SET nome='$nome', unidade_medida='$unidade_medida' WHERE id='$id'";
    return $db->exec( $sql );
}


function getCentro( $id_centro) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM centro_apoio WHERE id=$id_centro";
    foreach ( $db->query( $sql ) as $row){
        return $row;
    }
    
    return null;
    
}

function getProduto( $id) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM produto WHERE id=$id";
    $arr = array();
    $i = 0;
    foreach ( $db->query( $sql ) as $row) {
        return $row;
    }
    
    return null;
    
}

function getCentroNomeById( $id_centro) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT nome, endereco, id  FROM centro_apoio WHERE id=$id_centro";
    $arr = array();
    $i = 0;
    foreach ( $db->query( $sql ) as $row) {
        return $row['nome'];
    }
    
    return null;
    
}


function getUsuarios() {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario ORDER BY nome DESC";
    $arr = array();
    $i = 0;
    foreach ( $db->query( $sql ) as $row) {
        $arr[$i] = $row;
        $i++;  
    }
    
    return $arr;
    
}

function getProdutos() {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM produto ORDER BY nome DESC";
   
    $arr = array();
    $i = 0;
    foreach ( $db->query( $sql ) as $row){
        $arr[$i] = $row;
        $i++;  
    }
    return $arr;
}

function getUsuario( $id ) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario WHERE id='$id'";
    foreach ( $db->query( $sql ) as $row) {
        return $row;
    }
    
    return null;
    
}

function removerUsuario( $id ) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "DELETE FROM usuario WHERE id='$id'";
    
    return $db->exec( $sql );
    
}

function removeProduto( $id ) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "DELETE FROM produto WHERE id='$id'";
    
    return $db->exec( $sql );
    
}

function getUsuarioByLogin( $login ) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario WHERE login='$login'";
    
    foreach ( $db->query( $sql ) as $row) {
        return $row;
    }
    
    return null;
}

function insertProduto($nome, $unidade_medida) {
    
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "INSERT INTO produto(nome, unidade_medida) VALUES('$nome', '$unidade_medida')";
    
    return $db->exec( $sql );
    
}

function insertUser($nome, $login, $pass, $papel, $id_centro) {
    
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "INSERT INTO usuario(nome, login, pass, papel, id_centro, ativo) VALUES('$nome', '$login', '$pass', '$papel','$id_centro', '1' )";
    
    return $db->exec( $sql );
    
}

function canLogin( $login, $pass ) {
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM usuario WHERE login='$login' AND pass='$pass'";
    
    
    foreach( $db->query( $sql ) as $row ) {
        return true;  
    }
    
    return false;
    
}

function updateUser($id, $nome, $login, $pass, $papel, $id_centro) {
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    if( $pass != "" ) {
        $sql = "UPDATE usuario SET nome='$nome', login='$login', pass='$pass', papel='$papel', id_centro='$id_centro' WHERE id='$id'";
    } else {
        $sql = "UPDATE usuario SET nome='$nome', login='$login', papel='$papel', id_centro='$id_centro' WHERE id='$id'";
    }
    return $db->exec( $sql );
    
}

function insertCentro($nome, $endereco, $nome_contato, $telefone_contato) {
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    $sql = "INSERT INTO centro_apoio(nome, endereco, nome_contato, telefone_contato) VALUES('$nome', '$endereco', '$nome_contato', '$telefone_contato' )";
    return $db->exec( $sql );
    
}



    
?>
