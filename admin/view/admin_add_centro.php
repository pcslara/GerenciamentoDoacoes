<html>
<title>Adicionar Usuário</title>
<h1>Adicionar Usuário</h1>

<form action="../controller/admin_add_centro.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
  Nome:<br>
  <input type="text" name="nome" id="nome"><br>
  Endereço:<br>
  <input type="text" name="endereco" id="endereco" size="80"><br>
  Nome Contato:<br>
  <input type="text" name="nome_contato" id="nome_contato"><br>
  Telefone Contato:<br>
  <input type="text" name="telefone_contato" id="telefone_contato"><br><br>
  <input type="submit"  value="Salvar">
</form><br>
<br>
<?php include "admin_links.php"; ?>
</html>