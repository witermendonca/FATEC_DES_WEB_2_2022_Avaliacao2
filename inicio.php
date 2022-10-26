<?php
    session_start(); // initial session

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ // se não existir loggedin no session ou loggedin não estuver valido volta para index.php
        header("location: index.php");
        exit;
    }
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;}
        .text-black{ color: black !important; font-weight: bold; margin-bottom: 15px;}
        .btn-right{ float: right !important; margin-right: 10px; margin-top: 12px;}
        .wrapper{ width: 650px; padding: 20px;  margin: auto; margin-top: 20px;}

        .alunos {display: block; width: 100%; overflow-x: auto;}
        .data-table {width: 100%; }
        table thead th {padding: 1rem 2rem; text-align: left;}
        table tbody td {padding: 1rem 2rem;}
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3 class=" text-black">Cadastro de Alunos Fatec</h3>
            </div>
            <div class="btn-right ">
                <a href="logout.php" class="btn btn-danger">Sair da conta</a>
            </div>
        </div>
    </nav>
    <div class="page-header">
        <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["usuario"]); ?>
        <br>
        </b>Bem vindo(a).</h1>
    </div>
    <p>
        <a href="cadastro.php" class="btn btn-primary">Cadastro Aluno</a>
        <br><br>
    </p>
    <h2>Alunos Cadastrados</h2>
    <div class="wrapper">
        <section class="aluno">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Sobrenome</th>
                        <th class="text-center">RA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('entidade/Aluno.php');
                        $aluno = new Aluno();
                        $alunos = $aluno->getAll();
                        foreach($alunos as $line){ 
                            $nome = $line['nome'];
                            $sobrenome = $line['sobrenome'];
                            $ra = $line['ra'];
                            echo "<tr><td>$nome</td><td>$sobrenome</td><td>$ra</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
   
</body>
</html>