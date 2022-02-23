<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<title>Editar Usuário</title>
<h1>Editar Usuário</h1>


<table class="table is-bordered">
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
