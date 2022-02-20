<?php
  /*if(!isset($_SESSION)) session_start();    
    if( $_SESSION['usernivel'] != 3 ) {
        session_destroy();
        header("Location: index.php");
  }*/


   $id = $_GET['id'];
   include 'confdb.php';
   $query = "SELECT * FROM user WHERE id='$id';";
   $result = mysqli_query($conn, $query);
   if (!$result) {
        $message  = 'Invalid query: ' . mysqli_error($conn) . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
   } 
   $nome = "";
   $tipo = "";
   $login = "";
   
   if (($row = mysqli_fetch_assoc($result))  ) {
       $nome = $row['nome'];
       $login = $row['login'];
       $tipo = $row['nivel'];
   }

?>

<html>
<title>Editar Usuário</title>
<h1>Editar Usuário</h1>

<form action="admin_edit_user_ac.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
  Nome:<br>
  <input type="text" name="nome" id="nome" value="<?php echo $nome;?>"></input><br>
  Login:<br>
  <input type="text" name="login" id="login" value="<?php echo $login;?>"></input><br>
  Senha (deixe em branco para manter a senha antiga):<br>
  <input type="text" name="senha" id="senha"></input><br>
  Tipo de usuário (atenção!):<br>
  <select id="tipo" name="tipo">
      <option value="2" <?php echo $tipo == 2 ? "selected='selected'" : "";?>>Aluno</option>
      <option value="1" <?php echo $tipo == 1 ? "selected='selected'" : "";?>>Professor</option>
      <option value="3" <?php echo $tipo == 3 ? "selected='selected'" : "";?>>Adminstrador</option>
  </select><br>
  <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
  <input type="submit"  value="Salvar">
</form>

</html>
