<?php 
        
    if(!isset($_SESSION)) session_start();
    if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['pass']))) {
        header("Location: ../../index.php");
    }
    
    include '../../admin/model/admin_dao.php';
    
    $_SESSION['usertimestamp'] = time(); 
    $login = $_POST['user'];
    $pass = $_POST['pass'];
    
    if ( !canLogin( $login, sha1( $pass ) ) ) {
       
       $_SESSION['loginerrormsg'] = 'Usuário e/ou senha inválidos.';
       header("location: ../../index.php");
    
    
    } else {
        $res = getUsuarioByLogin( $login );
      
        $_SESSION['userid'] = $res['id'];
        $_SESSION['nome'] = $res['nome'];
        $_SESSION['papel'] = $res['papel'];
        
        
        if( $res['papel'] == 0  ) {
            $_SESSION['loginerrormsg'] = 'Usuário não ativado.';
            header("location: ../../index.php");
            exit("");
        } else if ( $res['papel'] == 'GERENTE' ) {
            header("Location: ../../manager/view/manager_main.php");            
        } else if( $res['papel'] == 'ADMIN' ) {
            header("Location: ../../admin/view/admin_main.php");
        } 
    }
    
?>
