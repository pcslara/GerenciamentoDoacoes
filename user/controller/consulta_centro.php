<?php
   include '../model/user_dao.php';
   header('Content-Type: application/json');
   echo json_encode(getDadosCentro($_GET['id']));
?>
