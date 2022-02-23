<?php
    #include 'isauthuser.php';
    #include 'header.php';
    header('Content-Type: text/html; charset=utf-8');
   include '../model/user_dao.php';

?>	

<html>
<title>Página principal</title>
<h1>Consultar Demandas</h1>

<form action="user_get_demanda_centro.php" method="GET">
  Centro de Apoio:<br>
  <select id="centro_id" name="centro_id">
      <?php
        $centros = getCentros();
        foreach ($centros as $centro ) {
            $id = $centro['id'];
            $nome = $centro['nome'];
            echo "<option value=\"$id\">$nome</option>";
        }
      ?>
  </select><br>
  <input type="submit"  value="Consultar">
</form><br>

  
</html>
