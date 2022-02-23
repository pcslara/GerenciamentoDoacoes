<?php
    session_save_path("/tmp");
    if(!isset($_SESSION)) session_start();

    if( !isset($_SESSION['papel']) OR $_SESSION['papel'] != "ADMIN" ) {
        session_destroy();
        header("Location: ../../index.php");
    }
    
?>
