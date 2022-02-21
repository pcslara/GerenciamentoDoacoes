<?php

include '../../globals/configdb.php';

function getProdutos() {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM produto ORDER BY nome DESC";
    $results = $db->query( $sql );
    $arr = array();
    $i = 0;
    while ($row = $results->fetchArray()) {
        $arr[$i] = $row;
        $i++;  
    }
    
    return $arr;
    
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

function existDemanda($centro_id, $produto_id ) {
    
    $db = new SQLite3( '../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM demanda WHERE (centro_id = '".$centro_id ."' AND produto_id = '".$produto_id ."') LIMIT 1";
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


function defineDemanda($centro_id, $produto_id, $quantidade) {
    
    $db = new SQLite3( '../../database/doacoespet.db' );

    if (existDemanda($centro_id, $produto_id))
        $sql = "UPDATE demanda SET quantidade='$quantidade' WHERE centro_id='$id' AND produto_id='$produto_id'";
    else
       $sql = "INSERT INTO demanda(centro_id, produto_id, quantidade) VALUES('$centro_id', '$produto_id', '$quantidade')";

    return $db->exec( $sql );
}


    
?>
