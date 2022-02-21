<?php
    include '../controller/admin_isauthuser.php';
?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<title>Adicionar Usuário</title>
<h1>Adicionar Usuário</h1>




<form action="../controller/admin_add_user.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
  Nome:<br>
  <input type="text" name="nome" id="nome"><br>
  Login:<br>
  <input type="text" name="login" id="login"><br>
  Senha:<br>
  <input type="text" name="senha" id="senha"><br>
  Tipo de usuário (atenção!):<br>
  <select id="papel" name="papel">
      <option value="GERENTE">Gerente de Centro de Apoio</option>
      <option value="ADMIN">Adminstrador</option>
  </select><br>
  Centro de Apoio:<br>
  <select id="id_centro" name="id_centro">
      <?php
        include '../model/admin_dao.php';
        $centros = getCentros();
        foreach ($centros as $centro ) {
            $id = $centro['id'];
            $nome = $centro['nome'];
            echo "<option value=\"$id\">$nome</option>";
        }
      ?>
  </select><br>
  
  <input type="submit"  value="Salvar">
</form><br>

<script>
$("#papel").change( function() {
  if ($(this).val() == "GERENTE") {
    $('#id_centro').show();
  } else {
    $('#id_centro').hide();
  }
});
</script>

<br>
<?php include "admin_links.php"; ?>
</html>
