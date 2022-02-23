<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<title>Definir demanda</title>
<h1>Definir demanda</h1>

<?php 
   include '../model/manager_dao.php';
?>




<form action="../controller/manager_def_demanda.php" method="POST" onsubmit="return confirm('Confirma o envio destes dados?');">
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
  
  Produto:<br>
  <select id="produto_id" name="produto_id">
      <?php
        $produtos = getProdutos();
        foreach ($produtos as $produto ) {
            $id = $produto['id'];
            $nome = $produto['nome'];
            echo "<option value=\"$id\">$nome</option>";
        }
      ?>
  </select><br>
  
  Quantidade:<br>
  <input type="text" name="quantidade" id="quantidade"><br>

  <input type="submit"  value="Salvar">
</form><br>

</html>
