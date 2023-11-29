<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        if(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"] = $user;
            header("Location: dashboard/dashboard.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Que Cake</title>
    <link rel="shortcut icon" href="./assets/icon-cupcake.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto login-container">

            <p>&larr; <a href="index.html">Home</a></p>

            <h4 class="txt-main">Entre em Que Cake</h4>

            <form action="" method="POST" class="login-form">

                <div class="form-group">
                    <label for="username">Usuário ou Email</label>
                    <input class="form-control" type="text" name="username" placeholder="Nome de usuário ou email" />
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input class="form-control" type="password" name="password" placeholder="Senha" />
                </div>

                <input type="submit" class="btn btn-success btn-block" name="login" value="Entrar" />

            </form>            
            <p>Não tem uma conta ainda? <a href="register.php" class="txt-main-second">Registre-se aqui</a></p>
            
        </div>
    </div>
</div>
    
</body>
</html>