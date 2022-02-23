<?php
   include '../model/user_dao.php';
   
   header('Content-Type: application/json');
   
   header('Access-Control-Allow-Origin: *');
   header('Access-Control-Allow-Methods: GET, POST');
   header("Access-Control-Allow-Headers: X-Requested-With");

   echo json_encode(getDadosCentro($_GET['id']));
?>
