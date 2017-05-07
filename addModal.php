<div class="modal fade" id="add_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-add-contact" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <div class="form">
                        <div class="form-body well noradius noshadow">
                            <h2 class="border-bottom">Dodaj kontakt</h2>


                            <form name="contact_contact" method="post" class="clearfix" action="forms/addContact.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label" for="contact_photo">Zdjęcie kontaktu</label>
                                    <input class="pbt10" type="file" name="contact_photo" value="">
                                    <?php
                                    if (isset($_SESSION['error_contact_photo'])) {
                                        echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_contact_photo'].'</div>';
                                        unset($_SESSION['error_contact_photo']);
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label required" for="contact_firstname">Imię</label>
                                    <input type="text" name="contact_firstname" placeholder="Podaj imię" class="" value="">
                                    <?php
                                    if (isset($_SESSION['error_contact_firstname'])) {
                                        echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_contact_firstname'].'</div>';
                                        unset($_SESSION['error_contact_firstname']);
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="contact_lastname">Nazwisko</label>
                                    <input type="text" name="contact_lastname" placeholder="Podaj nazwisko" class="" value="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="contact_phone_1">Telefon</label>
                                    <input type="text" name="contact_phone_1" placeholder="Podaj numer telefon" class="" value="">
                                </div>

                                <div class="more more-phones-push push mbt30">
                                    <span class="btn btn-noborder btn-more">Więcej numerów telefonu <span class="cross"><span></span><span></span></span>
                                </div>
                                <div class="more-phones more-hidden">
                                    <div class="form-group">
                                        <label class="control-label" for="contact_phone_2">Telefon</label>
                                        <input type="text" name="contact_phone_2" placeholder="Podaj numer telefon" class="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="contact_phone_3">Telefon</label>
                                        <input type="text" name="contact_phone_3" placeholder="Podaj numer telefon" class="" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="contact_email_1">E-mail</label>
                                    <input type="text" name="contact_email_1" placeholder="Podaj e-mail" class="" value="">
                                    <?php
                                    if (isset($_SESSION['error_contact_email_1'])) {
                                        echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_contact_email_1'].'</div>';
                                        unset($_SESSION['error_contact_email_1']);
                                    }
                                    ?>
                                </div>


                                <div class="more more-emails-push push mbt30">
                                    <span class="btn btn-noborder btn-more">Więcej maili <span class="cross"><span></span><span></span></span>
                                </div>
                                <div class="more-emails more-hidden">
                                    <div class="form-group">
                                        <label class="control-label" for="contact_email_2">E-mail</label>
                                        <input type="text" name="contact_email_2" placeholder="Podaj e-mail" class="" value="">
                                        <?php
                                        if (isset($_SESSION['error_contact_email_2'])) {
                                            echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_contact_email_2'].'</div>';
                                            unset($_SESSION['error_contact_email_2']);
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="contact_email_3">E-mail</label>
                                        <input type="text" name="contact_email_3" placeholder="Podaj e-mail" class="" value="">
                                        <?php
                                        if (isset($_SESSION['error_contact_email_3'])) {
                                            echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_contact_email_3'].'</div>';
                                            unset($_SESSION['error_contact_email_3']);
                                        }
                                        ?>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="control-label" for="contact_profession">Zawód</label>
                                    <input type="text" name="contact_profession" placeholder="Podaj zawód" class="" value="">
                                </div>


                                <div class="more more-address-push push mbt30">
                                    <span class="btn btn-noborder btn-more">Dodaj adres<span class="cross"><span></span><span></span></span>
                                </div>
                                <div class="more-address more-hidden">
                                    <div class="form-group">
                                        <label class="control-label required" for="contact_address_line_1">Adres</label>
                                        <input type="text" name="contact_address_line_1" placeholder="Podaj adres" class="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label required" for="contact_address_line_2">Kod pocztowy</label>
                                        <input type="text" id="contact_address_line_2" name="contact_address_line_2" placeholder="Podaj kod pocztowy" class="" value="" pattern="^[0-9]{2}-[0-9]{3}$">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label required" for="contact_address_line_3">Miasto</label>
                                        <input type="text" name="contact_address_line_3" placeholder="Podaj miasto" class="" value="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Dodaj kontakt</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>