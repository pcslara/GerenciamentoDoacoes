<html>
<title>Editar Usuário</title>
<h1>EditarUsuário</h1>


<table border="1">
<tr>
<th>Nome</th><th>Login</th><th>Papel</th><th>Centro de Apoio</th><th></th>
</tr>

<?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        include '../model/admin_dao.php';
        $usuarios = getUsuarios();
       
        foreach ( $usuarios as $row ) {
            $nome = $row['nome'];
            $login = $row['login'];           
            $papel = $row['papel'];                       
            $id = $row['id'];
            $centro = getCentroNomeById( $row['id_centro'] );

            echo "<tr><td>$nome</td><td>$login</td><td>$papel</td><td>$centro</td><td><a href='admin_edit_user_form.php?id=$id'>editar</a></td></tr>";
       }

?>
</table>
<br>
<?php 

    include "../view/admin_links.php";
?>

</html>
