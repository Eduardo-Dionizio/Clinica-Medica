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
    <div class ="container mt-5">
      <div class ="row">
        <div class ="col-md-12">
          <div class ="card">
            <div class ="card-header">
              <h4>Visualizar consulta:
              <a href = "index.php" class = "btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
              <div class ="card-body">
                <?php

            if (isset($_GET['id']))  {
                $consulta_id = mysqli_real_escape_string($conexao, $_GET['id']);
                $sql = "SELECT * FROM consultaMedica WHERE id ='$consulta_id'";
                $query = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($query) > 0 ) {
                $consulta = mysqli_fetch_array($query);
            ?>    
            

            
                  <div class = "mb-3">
                     <div class = "mb-3">
                    <label>Especialidade</label>
                    <p class = 'form-control'>
                    <?=$consulta['especialidade'];?>
                    </p>
                </div>
                  <div class = "mb-3">
                    <label>Duração</label>
                      <p class = 'form-control'>
                    <?=$consulta['duracao_minutos'];?>    
                    </p>
                </div>
                  <div class = "mb-3">
                    <label>Valor</label>
                      <p class = 'form-control'>
                        <?=$consulta['valor'];?>
                        </p>
                    </div>
                  <div class = "mb-3">
                    <label>Médico</label>
                    <p class = 'form-control'>
                        <?=$consulta['nome_medico'];?>
                        </p>
               </div>
                <?php
                }
            }
            ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>