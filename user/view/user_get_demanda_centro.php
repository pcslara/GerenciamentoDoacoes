<?php
    include 'isauthuser.php';
    include 'header.php';
    header('Content-Type: text/html; charset=utf-8');
   include '../model/user_dao.php';

?>	

<html>
<title>Demandas de Centro de Apoio específico</title>
<?php
    $dados_centro = getDadosCentro($_GET['centro_id']);
   echo "<h1>Centro de Apoio: " .  $dados_centro['nome'] . "</h1>";
   echo "<h2>Endereço: " .  $dados_centro['nome'] . "</h2>";
   echo "<h2>Nome contato: " .  $dados_centro['nome_contato'] . "</h2>";
   echo "<h2>Telefone contato: " .  $dados_centro['telefone_contato'] . "</h2>";
?>

<table border=1>
   <tr>
      <th>Produto</th>
      <th>Quantidade</th>
      <th>Unidade de Medida</th>
   </tr>

   <?php
       ini_set('display_errors', 1);
       ini_set('display_startup_errors', 1);
       error_reporting(E_ALL);
       $demandas = getDemandasCentro($_GET['centro_id']);

       foreach ( $demandas as $demanda ) {
          $nome = $demanda['nome'];
          $unidade_medida = $demanda['unidade_medida'];
          $quantidade = $demanda['quantidade'];           

          echo "<tr><td>$nome</td><td>$quantidade</td><td>$unidade_medida</td></tr>";
       }

   ?>
</table>

  
</html>

