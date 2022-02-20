<html>
<title>Adicionar Usuário</title>
<h1>Adicionar Usuário</h1>

<form action="../controller/admin_add_user_ac.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
  Nome:<br>
  <input type="text" name="nome" id="nome"><br>
  Login:<br>
  <input type="text" name="login" id="login"><br>
  Senha:<br>
  <input type="text" name="senha" id="login"><br>
  Tipo de usuário (atenção!):<br>
  <select id="papel" name="papel">
      <option value="GERENTE">Gerente de Ponto de Apoio</option>
      <option value="ADMIN">Adminstrador</option>
  </select><br>
  <input type="submit"  value="Salvar">
</form><br>
<br>
<?php include "admin_links.php"; ?>
</html>
