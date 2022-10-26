<?php
    require_once('entidade/Usuario.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){ // se o método chamado for tipo Post
        $usuario = new Usuario();
        $result = $usuario->getUsuario($_POST['username']); 
        $row = $result->fetch_assoc(); 
        if($_POST['username'] == $row['usuario'] and $_POST['password'] == $row['senha']){ // se o usuario e senha for valido
            session_start(); // inicializa session 
            $_SESSION['loggedin'] = TRUE; // seta no session loggedin verdadeiro
            $_SESSION["usuario"] = $row["nome"];  // seta no session usuario Witer
            header("location: inicio.php"); // redireciona para inicio
            } else {
                $_SESSION['loggedin'] = FALSE; // se não seta no session loggedin falso
        }
    }
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .title{text-align: center; margin-top:30px;}
        .wrapper{ width: 350px; padding: 20px; margin: auto; margin-top: 50px;}
    </style>
</head>
<body>
    <h1 class="title">Cadastro de alunos Fatec</h1>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>Favor inserir login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>    
</body>
</html>