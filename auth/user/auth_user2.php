<?php 
   header('Access-Control-Allow-Origin: *');
   header('Access-Control-Allow-Methods: GET, POST');
   header("Access-Control-Allow-Headers: X-Requested-With");
   
   if(!isset($_SESSION)) session_start();
   if (empty($_POST) OR empty($_POST['user']) OR empty($_POST['pass'])) {
      http_response_code(400);
      die('Acesso negado');
   }

   include '../../admin/model/admin_dao.php';

   $_SESSION['usertimestamp'] = time(); 
   $login = $_POST['user'];
   $pass = $_POST['pass'];

   if ( !canLogin( $login, sha1( $pass ) ) ) {

      http_response_code(403);
      die('Usuário e/ou senha inválidos.');



   } else {
      $res = getUsuarioByLogin( $login );

      $_SESSION['userid'] = $res['id'];
      $_SESSION['nome'] = $res['nome'];
      $_SESSION['papel'] = $res['papel'];


      if( $res['papel'] == 0  ) {
         http_response_code(401);
         die('Usuário não ativado.');
      } else if ( $res['papel'] == 'GERENTE' ) {
         http_response_code(201);
      } else if( $res['papel'] == 'ADMIN' ) {
         http_response_code(201);
      } 
   }

?>
