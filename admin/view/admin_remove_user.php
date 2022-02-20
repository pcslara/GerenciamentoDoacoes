<?php
    if(!isset($_SESSION)) session_start();

    
    if( $_SESSION['usernivel'] != 3 ) {
        session_destroy();
        header("Location: index.php");
    }
?>

<html>
<title>Remover Usuário</title>
<h1>Remover Usuário</h1>


<table border="1">
<tr>
<th>Nome</th><th>Login</th><th>Nível</th><th></th>
</tr>

<?php
       include 'utils.php'; 
       include 'confdb.php';
 
       $query = "SELECT * FROM user WHERE 1 ORDER BY nome";
       $result = mysqli_query($conn, $query);
       if (!$result) {
            $message  = 'Invalid query: ' . mysqli_error($conn) . "\n";
            $message .= 'Whole query: ' . $query;
            die($message);
       }
       
       while (($row = mysqli_fetch_assoc($result))  ) {
            $nome = $row['nome'];
            $login = $row['login'];           
            $nivel = translate_user( $row['nivel'] );   
            $id = $row['id'];

            echo "<tr><td>$nome</td><td>$login</td><td>$nivel</td><td><a href='admin_remove_user_ac.php?id=$id' onclick=\"return confirm('Confirma a deleção do usuário? Esta operação não poderá ser desfeita.')\">remover</a></td></tr>";
       }

?>
</table>
<br>
<?php 

    include "links_admin.php";
?>

</html>
