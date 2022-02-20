<html>
<title>Adicionar Usuários</title>
<h1>Adicionar Usuários</h1>

<form action="admin_add_users_ac.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
 Nome;Login;Senha;Tipo<br>
 Tipo: <br>
      1=Professor<br>
      2=Aluno<br>
      3=Admin (atenção)<br>
 <textarea rows="40" cols="100" name="users" id="users">
 </textarea><br>
 




 <input type="submit"  value="Salvar">
</form><br>
<br>
<?php include "links_admin.php"; ?>
</html>
