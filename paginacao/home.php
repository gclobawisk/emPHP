<?php 

include ('conexao.php');

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina']:1;
$select = $pdo->query("SELECT * FROM usuarios");
$result = $select->fetchAll();

$total_cursos = $select->rowCount();
$quantidade_pg = 2;

$num_pagina = ceil($total_cursos/$quantidade_pg);
echo $num_pagina;
echo $total_cursos;

$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

$select_cursos = $pdo->query("SELECT * FROM usuarios limit $inicio, $quantidade_pg");
$result_cursos = $select_cursos->fetchAll();

?>

<html lang="pt-br">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <br><br><br>
<div class="container">
  <?php foreach($result_cursos as $row) { ?>

  <div class="media">
    <img style="width: 5%;" class="mr-3" src="http://www.brasil100.com/de/img/cover/musica-brasileira.jpg" alt="Generic placeholder image">
    <div class="media-body">
      <h5 class="mt-0"><?php echo $row['usuario'];?></h5>
      ID: <?php echo $row['id_usuario'];?>
    </div>
  </div>

  <br>
  

  <?php } ?>

  <?php 
  $pagina_anterior = $pagina-1;
  $pagina_posterior = $pagina+1

  ?>

  <nav class="text-center">
  <ul class="pagination">

    <li class="page-item">

      <?php if ($pagina_anterior != 0) { ?>
          
          <a class="page-link" href="http://localhost/teste/?pagina=<?php echo $pagina_anterior; ?>" >Anterior</a>
      
      <?php } else { ?>

        <li class="page-item disabled">
          <a class="page-link" href="#" >Anterior</a>
        </li>

      <?php } ?>
      
    </li>

    <?php 
      
      for($i = 1; $i < $num_pagina; $i++){ ?>
      <li class="page-item active">
        <li class="page-item"><a class="page-link" href="http://localhost/teste/?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      </li>
    <?php }?>

    <?php if ($pagina_posterior <= $num_pagina) { ?>
    
        <li class="page-item">
              <a class="page-link" href="http://localhost/teste/?pagina=<?php echo $i; ?>" >Próximo</a>      
        </li>

    <?php } else { ?>

      <li class="page-item disabled">
          <a class="page-link" href="#" >Próximo</a>
        </li>
       
      <?php } ?>
  </ul>
</nav>


<div>

</body>

<footer>

</footer>




</html>