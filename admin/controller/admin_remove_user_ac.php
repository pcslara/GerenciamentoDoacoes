<html>
<?php
    if(!isset($_SESSION)) session_start();

    
    if( $_SESSION['usernivel'] != 3 ) {
        session_destroy();
        header("Location: index.php");
    }
    
    $usernivel = $_SESSION['usernivel'];
    
    if ( empty($_GET) OR empty($_GET['id'])  ) {
        echo "Error on POST!<br><br>";
        goto links;       
    }

    include 'confdb.php';
    $id = $_GET['id'];

    $query = "DELETE FROM user WHERE id='$id' and 3=$usernivel";
    mysqli_query($conn, $query) or die("Erro no DELETE");
    
    echo "Usuário removido com sucesso!<br><br>";
links:
    include "links_admin.php";

?>
</html>


