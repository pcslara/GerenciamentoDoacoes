<?php
   ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
   include '../model/admin_dao.php';
   $id = $_GET['id'];
   
   $row = getUsuario( $id );
   
   $nome = "";
   $papel = "";
   $login = "";
   $id_centro = "";
   
   if ( $row != null) {
       $nome = $row['nome'];
       $login = $row['login'];
       $papel = $row['papel'];
       $id_centro = $row['id_centro'];
   }

?>

<html>
<title>Editar Usuário</title>
<h1>Editar Usuário</h1>

<form action="../controller/admin_edit_user.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
  Nome:<br>
  <input type="text" name="nome" id="nome" value="<?php echo $nome;?>"></input><br>
  Login:<br>
  <input type="text" name="login" id="login" value="<?php echo $login;?>"></input><br>
  Senha (deixe em branco para manter a senha antiga):<br>
  <input type="text" name="senha" id="senha"></input><br>
  Tipo de usuário (atenção!):<br>
  <select id="papel" name="papel">
      <option value="ADMIN" <?php echo $papel == "ADMIN" ? "selected='selected'" : "";?>>Administrador</option>
      <option value="GERENTE" <?php echo $papel == "GERENTE" ? "selected='selected'" : "";?>>Gerente</option>
  </select><br>

    Centro de Apoio:<br>
  <select id="id_centro" name="id_centro">
      <?php
        $centros = getCentros();
        foreach ($centros as $centro ) {
            $id = $centro['id'];
            $nome = $centro['nome'];
            if( $id_centro == $id )
                echo "<option selected='selected' value=\"$id\">$nome</option>";
            else
                echo "<option value=\"$id\">$nome</option>";
        }
      ?>
  </select><br>
    
  
  <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
  <input type="submit"  value="Salvar">
  <a href="">Remover</a>
</form>

</html>
