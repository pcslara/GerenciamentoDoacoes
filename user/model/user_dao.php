<?php

include '../../globals/configdb.php';

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

function getProdutos() {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM produto ORDER BY nome DESC";
    $arr = array();
    $i = 0;
    foreach ( $db->query( $sql ) as $row) {
        $arr[$i] = $row;
        $i++;  
    }
    
    return $arr;
    
}

function getDadosCentro($id) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT * FROM centro_apoio WHERE id='$id'";
    $results = $db->query( $sql );
    return $results->fetchArray();
    
    return $arr;
    
}


function getDemandasCentro($centro_id) {
    
    $db = new PDO( 'sqlite:../../database/doacoespet.db' );
    
    $sql = "SELECT p.nome, p.unidade_medida, d.quantidade FROM demanda d, produto p WHERE d.centro_id=$centro_id ORDER BY p.nome DESC";
    $arr = array();
    $i = 0;
    foreach ( $db->query( $sql ) as $row) {
        $arr[$i] = $row;
        $i++;  
    }
    
    return $arr;
    
}


    
?>
