<html>
<title>Adicionar Produto</title>
<h1>Adicionar Produto</h1>

<form action="../controller/admin_add_produto.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
  Nome:<br>
  <input type="text" name="nome" id="nome"><br>

  Unidade de Medida:<br>
  <input type="text" name="unidade_medida" id="unidade_medida" size="80"><br>

  <input type="submit"  value="Salvar">
</form><br>
<br>
<?php include "admin_links.php"; ?>
</html>
