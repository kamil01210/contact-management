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
    <div class="row mbt40 mtp40">
        <div class="col-md-12">
            <a class="btn btn-primary pull-left" href="panel.php">
                Wróć
            </a>
            <a class=" btn btn-primary pull-right clearfix" href="forms/logout.php">Wyloguj</a>
        </div>
    </div>
    <?php
		include_once('includes/edit.php');
	?>

    <div class="form-container edit-form">
        <div class="form">
            <div class="form-body well noradius noshadow">
                <h2 class="border-bottom">Edytuj kontakt</h2>


                <form name="contact_contact" method="post" class="clearfix" action="forms/edit.php" enctype="multipart/form-data">
                    <input hidden name="edit_user_id" value="<?php echo $_SESSION["edit_user_id"]?>"/>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <?php echo $_SESSION["avatar"]?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="contact_photo">Zdjęcie kontaktu</label>
                                    <input class="pbt10" type="file" name="contact_photo" value="">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label required" for="contact_firstname">Imię</label>
                        <input type="text" name="contact_firstname" placeholder="Podaj imię" class="" value="<?php echo $_SESSION["contact_name"]?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="contact_lastname">Nazwisko</label>
                        <input type="text" name="contact_lastname" placeholder="Podaj nazwisko" class="" value="<?php echo $_SESSION["contact_lastname"]?>"">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="contact_phone_1">Telefon</label>
                        <input type="text" name="contact_phone_1" placeholder="Podaj numer telefon" class="" value="<?php echo $_SESSION["contact_phone_1"]?>"">
                    </div>

                    <div class="more more-phones-push push mbt30">
                                    <span class="btn btn-noborder btn-more">Więcej numerów telefonu <span class="cross"><span></span><span></span></span>
                                </span></div>
                    <div class="more-phones more-hidden">
                        <div class="form-group">
                            <label class="control-label" for="contact_phone_2">Telefon</label>
                            <input type="text" name="contact_phone_2" placeholder="Podaj numer telefon" class="" value="<?php echo $_SESSION["contact_phone_2"]?>"">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="contact_phone_3">Telefon</label>
                            <input type="text" name="contact_phone_3" placeholder="Podaj numer telefon" class="" value="<?php echo $_SESSION["contact_phone_3"]?>"">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="contact_email_1">E-mail</label>
                        <input type="text" name="contact_email_1" placeholder="Podaj e-mail" class="" value="<?php echo $_SESSION["contact_email_1"]?>"">
                    </div>


                    <div class="more more-emails-push push mbt30">
                                    <span class="btn btn-noborder btn-more">Więcej maili <span class="cross"><span></span><span></span></span>
                                </span></div>
                    <div class="more-emails more-hidden">
                        <div class="form-group">
                            <label class="control-label" for="contact_email_2">E-mail</label>
                            <input type="text" name="contact_email_2" placeholder="Podaj e-mail" class="" value="<?php echo $_SESSION["contact_email_2"]?>"">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="contact_email_3">E-mail</label>
                            <input type="text" name="contact_email_3" placeholder="Podaj e-mail" class="" value="<?php echo $_SESSION["contact_email_3"]?>"">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label" for="contact_profession">Zawód</label>
                        <input type="text" name="contact_profession" placeholder="Podaj zawód" class="" value="<?php echo $_SESSION["contact_profession"]?>"">
                    </div>


                    <div class="more more-address-push push mbt30">
                                    <span class="btn btn-noborder btn-more">Edytuj adres<span class="cross"><span></span><span></span></span>
                                </span></div>
                    <div class="more-address more-hidden">
                        <div class="form-group">
                            <label class="control-label required" for="contact_address_line_1">Adres</label>
                            <input type="text" name="contact_address_line_1" placeholder="Podaj adres" class="" value="<?php echo $_SESSION["contact_address_line_1"]?>"">
                        </div>
                        <div class="form-group">
                            <label class="control-label required" for="contact_address_line_2">Kod pocztowy</label>
                            <input type="text" id="contact_address_line_2" name="contact_address_line_2" placeholder="Podaj kod pocztowy" class="" value="<?php echo $_SESSION["contact_address_line_2"]?>"" pattern="^[0-9]{2}-[0-9]{3}$">
                        </div>
                        <div class="form-group">
                            <label class="control-label required" for="contact_address_line_3">Miasto</label>
                            <input type="text" name="contact_address_line_3" placeholder="Podaj miasto" class="" value="<?php echo $_SESSION["contact_address_line_3"]?>"">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Edytuj kontakt</button>
                </form>
            </div>
        </div>
    </div>

	

</div>

<?php include_once 'footer.php'?>