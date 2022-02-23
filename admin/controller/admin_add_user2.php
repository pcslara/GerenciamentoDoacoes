<?php
   include 'admin_isauthuser.php';

   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   if ( empty($_POST) OR empty($_POST['login']) OR empty($_POST['papel']) OR empty($_POST['nome']) OR empty($_POST['senha']) ) {
      http_response_code(400);
      die('Erro no POST');
   }

   include '../model/admin_dao.php';

   $nome  = addslashes( $_POST['nome'] );
   $login = addslashes( $_POST['login'] );
   $pass  = sha1( $_POST['senha'] );
   $papel = addslashes( $_POST['papel'] );
   $id_centro = addslashes( $_POST['id_centro'] );

   if( existUser($login ) ) {
      http_response_code(401);
      die('Login indisponível.');
   }

   if( insertUser( $nome, $login, $pass, $papel, $id_centro) ) {
      http_response_code(201);
   } else {
      http_response_code(401);
      die('Erro no registro do usuário');
   }
?>


