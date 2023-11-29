<?php require_once("../auth.php"); ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $pageTitle = "Dashboard"; ?></title>
    <link rel="shortcut icon" href="../assets/icon-cupcake.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include('header.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <?php include('user.php'); ?>

            <div class="col-md-8">

                <div class="card mb-3">
                    <div class="card-body" style="text-align: center;">
                        <div class="image-container" style="width: 100%; height: 100%; overflow: hidden;">
                            <img class="ordermap" src="../assets/ordermap.png" style="width: 76%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
                
            </div>
        
        </div>
    </div>

</body>
</html>