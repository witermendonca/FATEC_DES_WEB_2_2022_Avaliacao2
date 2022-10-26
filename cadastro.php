<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if( $_POST['name'] != ""  &&   $_POST['sobrenome'] != "" && $_POST['ra'] != "")  { 
            
            require_once('entidade/Aluno.php');
            $aluno = new Aluno();

            $aluno->nome = $_POST['name'];
            $aluno->sobrenome = $_POST['sobrenome'];
            $aluno->ra = $_POST['ra']; 

            $aluno->Cadastrar();

            header("location: inicio.php");
        }
    }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px;  margin: auto; margin-top: 50px;}
        .text-black{ color: black !important; font-weight: bold; margin-bottom: 15px; }
        .btn-right{ float: right !important; margin-right: 10px; margin-top: 12px;}
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3><a class="text-black" href="inicio.php">Cadastro de Alunos Fatec</a></h3>
            </div>
            <div class="btn-right ">
                <a href="logout.php" class="btn btn-danger">Sair da conta</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <h2>Cadastro de novo aluno</h2>
        <form action="cadastro.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>RA Aluno</label>
                <input type="text" name="ra" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>    
</body>
</html>