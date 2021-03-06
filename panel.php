<?php
    session_start();

    if (!isset($_SESSION['logged'])){
        header('Location: index.php');
    exit();
    }

    include_once 'header.php';
?>
<body>
    <div class="container">
        <?php
            if (isset($_SESSION['success_add'])) {
                echo '<div class="alert-info clearfix mbt30 mtp30">'.$_SESSION['success_add'].'</div>';
                unset($_SESSION['success_add']);
            }
            if (isset($_SESSION['success_edit'])) {
                echo '<div class="alert-info clearfix mbt30 mtp30">'.$_SESSION['success_edit'].'</div>';
                unset($_SESSION['success_edit']);
            }
            if (isset($_SESSION['error_edit_photo'])) {
                echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_edit_photo'].'</div>';
                unset($_SESSION['error_edit_photo']);
            }
            if (isset($_SESSION['error_contact_photo'])) {
                echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_contact_photo'].'</div>';
                unset($_SESSION['error_contact_photo']);
            }
        ?>
        <div class="row">
            <div class="col-md-12 mtp40">
                <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#add_contact">
                    Dodaj kontakt
                </button>
                <a class=" btn btn-primary pull-right clearfix" href="forms/logout.php">Wyloguj</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mtp20">
                    <?php
                        echo "<h2 class='text-center'>Witaj " . $_SESSION['user'] ."!</h2>";
                    ?>
                </div>
            </div>
        </div>

        <div class="table-responsive contacts-list">
            <?php
                include_once('includes/listContact.php');
            ?>
        </div>


        <?php include_once('addModal.php'); ?>

    </div>

    <?php include_once 'footer.php'?>