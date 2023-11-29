<?php
require_once("../auth.php");
$pedidos = [
    ['id' => 1, 'data' => '2023-10-28', 'status' => 'Concluído', 'itens' => ['Cupcake de Chocolate', 'Cupcake de Baunilha']],
    ['id' => 2, 'data' => '2023-10-27', 'status' => 'Concluído', 'itens' => ['Cupcake de Morango', 'Cupcake Red Velvet']],
    ['id' => 3, 'data' => '2023-10-26', 'status' => 'Em andamento', 'itens' => ['Cupcake de Limão', 'Cupcake de Cenoura']],
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle = "Meus Pedidos"; ?></title>
    <link rel="shortcut icon" href="../assets/icon-cupcake.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php include('header.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <?php include('user.php'); ?>
          

            <div class="col-md-8">                
                <?php foreach ($pedidos as $pedido): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Pedido #<?php echo $pedido['id']; ?></h3>
                                    <p>Data: <?php echo $pedido['data']; ?></p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p><?php echo $pedido['status']; ?></p>
                                </div>
                            </div>

                            <ul>
                                <?php foreach ($pedido['itens'] as $item): ?>
                                    <li><?php echo $item; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        
        </div>
    </div>
</body>
</html>