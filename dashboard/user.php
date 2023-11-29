
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div class="col-md-4">
    <div class="card">
        <div class="card-body text-center">
            <img class="img img-responsive rounded-circle mb-3" width="160" src="../img/<?php echo $_SESSION['user']['photo'] ?>" />
            <h3><?php echo $_SESSION["user"]["name"] ?></h3>
            <p><?php echo $_SESSION["user"]["email"] ?></p>
            <p <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'class="current-page"' : ''; ?>><a href="dashboard.php">Dashboard</a></p>
            <p <?php echo (basename($_SERVER['PHP_SELF']) == 'pedidos.php') ? 'class="current-page"' : ''; ?>><a href="pedidos.php">Ver Pedidos</a></p>
            <p <?php echo (basename($_SERVER['PHP_SELF']) == 'address.php') ? 'class="current-page"' : ''; ?>><a href="address.php">Endereços</a></p>
            <p <?php echo (basename($_SERVER['PHP_SELF']) == 'logout.php') ? 'class="current-page"' : ''; ?>><a href="../logout.php">Sair</a></p>
        </div>
    </div>
</div>
