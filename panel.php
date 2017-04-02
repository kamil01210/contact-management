<?php
    session_start();

    if (!isset($_SESSION['logged'])){
        header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet/less" type="text/css" href="css/style.less" />
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mtp40">
            <a class=" btn btn-primary pull-right clearfix" href="forms/logout.php">Wyloguj</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mtp20">
                <?php
                    echo "<h2 class='text-center'>Witaj " . $_SESSION['user'] . " !</h2>";
                ?>
            </div>
        </div>
    </div>
</div>

<script src="js/less.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>