<?php

require_once("config.php");

if(isset($_POST['register'])){

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    $saved = $stmt->execute($params);

    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registre-se - Que Cake</title>
    <link rel="shortcut icon" href="./assets/icon-cupcake.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />    
    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto register-container">

        <p>&larr; <a href="index.html">Home</a></p>

        <h4 class="txt-main">Junte-se a milhares de outros......</h4>
        <p>Já tem uma conta? <a href="login.php" class="txt-main-second">Entre aqui</a></p>

        <form action="" method="POST" class="register-form">

            <div class="form-group">
                <label for="name">Nome Completo</label>
                <input class="form-control" type="text" name="name" placeholder="Seu nome" />
            </div>

            <div class="form-group">
                <label for="username">Usuário</label>
                <input class="form-control" type="text" name="username" placeholder="Usuário" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Endereço de email" />
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input class="form-control" type="password" name="password" placeholder="Senha" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Registrar-se" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>