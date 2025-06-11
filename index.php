<?php
require 'conexao.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de consultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <?php include ("navbar.php");
    ?>
    <div class = "container mt-4">
        <div class ="row">
            <div class = "col-md-12">
                <div class ="card">
                    <div class ="card-header">
        <h4> Lista de consultas cadastradas:
            <a href="consulta-create.php" class= "btn btn-primary float-end">Adicionar consulta</a>
    </div>
    <div class ="card-body">
        <table class = "table table-bordered table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Especialidade</th>
                <th>Duração</th>
                <th>Valor</th>
                <th>Médico</th>
                <th>Ações</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $sql = 'SELECT * FROM consultaMedica';
              $consultas = mysqli_query($conexao, $sql);
              if (mysqli_num_rows($consultas) > 0) {
                foreach($consultas as $consulta) {
                ?>
                <tr>
                <td><?=$consulta['id']?></td>
                <td><?=$consulta['especialidade']?></td>
                <td><?=$consulta['duracao_minutos']?></td>
                <td><?=$consulta['valor']?></td>
                <td><?=$consulta['nome_medico']?></td>
                
              <td>
            <a href = "consulta-view.php?id=<?=$consulta['id']?>" class = "btn btn-secondary btn-sm">Visualizar</a>
            <a href = "consulta-update.php?id=<?=$consulta['id']?>" class = "btn btn-success btn-sm">Editar</a>
            <form action ="acao.php" method = "POST" class ="d-inline">
              <button onclick ="return confirm('Deseja excluir está consulta?')" type ="submit" name ="delete-consulta" value = "<?=$consulta['id']?>" class = "btn btn-danger btn-sm">
                Excluir</button>
              </form>
                </td>
              
              <?php
              
                }
              } else {
                echo '<h5>Nenhuma consulta encontrada</h5>';
              }
              ?>
              
                
              


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>