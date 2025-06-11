<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <?php include ("navbar.php");
    ?>
    <div class ="container mt-5">
      <div class ="row">
        <div class ="col-md-12">
          <div class ="card">
            <div class ="card-header">
              <h4>Editar consulta
              <a href = "index.php" class = "btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
              <div class ="card-body">
                <?php
                if (isset($_GET['id'])) {
                    $consulta_id = mysqli_real_escape_string($conexao, $_GET['id']);
                    $sql = "SELECT * FROM consultaMedica where ID ='$consulta_id'";
                    $query = mysqli_query($conexao, $sql);

                if(mysqli_num_rows($query) > 0) {
                    $consulta = mysqli_fetch_array($query);
                ?>
                <form action = "acao.php"method="POST">
                <input type ="hidden" name = "consulta_id" value ="<?=$consulta['id']?>">

                  <div class = "mb-3">
                    <label>Especialidade</label>
                    <input type ="text" name = "especialidade" value ="<?=$consulta['especialidade']?>" class = "form-control">
                </div>
                  <div class = "mb-3">
                    <label>Duração</label>
                    <input type ="number" step ="1" name = "duracao" value ="<?=$consulta['duracao_minutos']?>" class = "form-control">
                </div>
                  <div class = "mb-3">
                    <label>Valor</label>
                    <input type ="number" step="0.01" name = "valor" value ="<?=$consulta['valor']?>" class = "form-control">
                </div>
                  <div class = "mb-3">
                    <label>Médico</label>
                    <input type ="text" name = "medico" value ="<?=$consulta['nome_medico']?>" class = "form-control">
               </div>
                <div class = "mb-3">
                  <button type = "submit" name = "update-consulta" class = "btn btn-primary">Editar</button>
              </div>
                </form>
                <?php
                }
            } 

                ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>