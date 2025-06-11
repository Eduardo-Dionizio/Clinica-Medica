<?php
session_start();
require 'conexao.php';

if (isset($_POST["create-consulta"])) {
    $especialidade = mysqli_real_escape_string($conexao, trim($_POST['especialidade']));
    $duracao = mysqli_real_escape_string($conexao, trim($_POST['duracao']));
    $valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
    $medico = mysqli_real_escape_string($conexao, trim($_POST['medico']));


    
  $sql = "INSERT INTO consultaMedica (especialidade, duracao_minutos, valor, nome_medico)
        VALUES ('$especialidade', $duracao, $valor, '$medico')";
   
    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0 ) {
        $_SESSION['mensagem'] = 'Sua consulta foi criada.';
        header ('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Sua consulta não foi criada.';
        header ('Location : index.php');
        exit;
    }

}

if (isset($_POST['update-consulta'])) {
    $consulta_id = mysqli_real_escape_string($conexao, $_POST['consulta_id']);

    $especialidade = mysqli_real_escape_string($conexao, trim($_POST['especialidade']));
    $duracao = mysqli_real_escape_string($conexao, trim($_POST['duracao']));
    $valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
    $medico = mysqli_real_escape_string($conexao, trim($_POST['medico']));


    
  $sql = "UPDATE consultaMedica SET especialidade = '$especialidade', duracao_minutos = '$duracao', valor = '$valor', nome_medico = '$medico'";
   
  $sql .= "WHERE ID ='$consulta_id'";  
  mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0 ) {
        $_SESSION['mensagem'] = 'Sua consulta foi atualizada.';
        header ('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Sua consulta não foi atualizada.';
        header ('Location : index.php');
        exit;
    }

}

if (isset($_POST['delete-consulta'])) {
    $consulta_id = mysqli_real_escape_string($conexao, $_POST['delete-consulta']);

    $sql = "DELETE FROM consultamedica where id = '$consulta_id'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0 ) {
        $_SESSION['mensagem'] = 'Sua consulta foi atualizada.';
        header ('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Sua consulta não foi atualizada.';
        header ('Location : index.php');
        exit;
    }

}
?>