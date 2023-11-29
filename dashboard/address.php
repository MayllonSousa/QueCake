<?php
require_once("../auth.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cupcake";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 4;
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];

    $sql = "INSERT INTO enderecos (cliente_id, rua, numero, cidade, estado, cep) VALUES ('$userId', '$rua', '$numero', '$cidade', '$estado', '$cep')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$userId = 4;
$sql_select = "SELECT * FROM enderecos WHERE cliente_id = '$userId'";
$result = $conn->query($sql_select);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle = "Meus endereços"; ?></title>
    <link rel="shortcut icon" href="../assets/icon-cupcake.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<?php include('header.php'); ?>

<div class="container mt-5">
    <div class="row">
        <?php include('user.php'); ?>

        <div class="col-md-8">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card mb-3">';
                    echo '<div class="card-body">';
                    echo "<p class='card-text'>Rua: " . $row["rua"] . "</p>";
                    echo "<p class='card-text'>Número: " . $row["numero"] . "</p>";
                    echo "<p class='card-text'>Cidade: " . $row["cidade"] . "</p>";
                    echo "<p class='card-text'>Estado: " . $row["estado"] . "</p>";
                    echo "<p class='card-text'>CEP: " . $row["cep"] . "</p>";
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>

            <button class="btn btn-primary btn-sm" id="showFormBtn">Adicionar Endereço</button>

            <form method="post" action="" id="addressForm" class="card mb-3 hidden">
                <div class="card-body">
                    <div class="form-group">
                        <label for="rua">Rua:</label>
                        <input type="text" class="form-control" name="rua" required>
                    </div>

                    <div class="form-group">
                        <label for="numero">Numero:</label>
                        <input type="text" class="form-control" name="numero" required>
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" name="cidade" required>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input type="text" class="form-control" name="estado" required>
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP:</label>
                        <input type="text" class="form-control" name="cep" required>
                    </div>

                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-primary btn-sm" value="Adicionar Endereço">
                    </div>
                </div>
            </form>

            <?php
            if ($result->num_rows === 0) {
                echo "<p>Nenhum endereço cadastrado</p>";
            }
            ?>
        </div>
    </div>
</div>

<script>
    document.getElementById('showFormBtn').addEventListener('click', function() {
        document.getElementById('addressForm').classList.remove('hidden');
    });
</script>

</body>
</html>

<?php
$conn->close();
?>