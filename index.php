<?php
    session_start();

    if (isset($_SESSION['logged']) && $_SESSION['logged']==true){
        header('Location: panel.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet/less" type="text/css" href="css/style.less" />
</head>
<body>
    <div class="content">
       <div class="form-container">
           <div class="forms">
               <div class="form-body well noradius noshadow">
                   <h2 class="border-bottom">Jestem klientem</h2>


                   <?php
                   if (isset($_SESSION['error'])) {
                       echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error'].'</div>';
                       unset($_SESSION['error']);
                   }
                   ?>




                   <?php
                   if (isset($_SESSION['success_registration'])) {
                       echo '<div class="alert-info clearfix mbt30 mtp30">'.$_SESSION['success_registration'].'</div>';
                       unset($_SESSION['success_registration']);
                   }
                   ?>


                   <form name="login" id="login" method="post" class="clearfix" action="forms/login.php">
                       <div class="form-group">
                           <label class="control-label required" for="login_login">Login</label>
                           <input type="text" name="login" placeholder="Twój login" class="" value="">
                       </div>
                       <div class="form-group">
                           <label class="control-label required" for="login_password">Hasło</label>
                           <input autocomplete="off" type="password" name="password" class=""  value="" placeholder="Wprowadź hasło">
                       </div>
                       <button type="submit" class="btn btn-primary pull-right">Zaloguj</button>
                       <div class="btn btn-link push-form pull-left nopadding">Chcę założyć konto</div>

                   </form>
               </div>
               <div class="form-body well noradius noshadow">
                   <h2 class="border-bottom">Jestem nowym użytkownikiem</h2>
                   <form name="registration" method="post" class="clearfix" action="forms/registration.php">
                       <?php
                       if (isset($_SESSION['error_mails'])) {
                           echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_mails'].'</div>';
                           unset($_SESSION['error_mails']);
                       }
                       ?>

                       <div class="form-group">
                           <label class="control-label <?php if (isset($_SESSION['error_registration_login'])) echo "required"; ?>" for="registration_login">Login</label>
                           <input type="text" name="registration_login" placeholder="Twój login" class="" >
                            <?php
                                if (isset($_SESSION['error_registration_login'])) {
                                    echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_registration_login'].'</div>';
                                    unset($_SESSION['error_registration_login']);
                                }
                            ?>
                       </div>
                       <div class="form-group">
                           <label class="control-label required" for="registration_login">E-mail</label>
                           <input type="text" name="registration_email" placeholder="Twój e-mail" class="" value="">
                           <?php
                           if (isset($_SESSION['error_registration_email'])) {
                               echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_registration_email'].'</div>';
                               unset($_SESSION['error_registration_email']);
                           }
                           ?>
                       </div>
                       <div class="form-group">
                           <label class="control-label required" for="registration_password">Hasło</label>
                           <input type="password" name="registration_password1" class=""  value="" placeholder="Wprowadź hasło">
                       </div>
                       <div class="form-group">
                           <label class="control-label required" for="registration_password">Powtórz hasło</label>
                           <input autocomplete="off" type="password" name="registration_password2" class="" value="" placeholder="Wprowadź hasło">
                       </div>
                       <?php
                       if (isset($_SESSION['error_registration_password'])) {
                           echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_registration_password'].'</div>';
                           unset($_SESSION['error_registration_password']);
                       }
                       ?>
                       <div class="form-group">
                           <label><input type="checkbox" name="registration_regulations" />Akceptuję regulamin</label>
                       </div>
                       <?php
                       if (isset($_SESSION['error_registration_regulations'])) {
                           echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_registration_regulations'].'</div>';
                           unset($_SESSION['error_registration_regulations']);
                       }
                       ?>
                       <div class="g-recaptcha" data-sitekey="6LfPRBsUAAAAAIigA21Ru5Oi4qz9vI-gE8aK3PAe"></div>
                       <?php
                       if (isset($_SESSION['error_recaptcha'])) {
                           echo '<div class="alert-danger clearfix mbt30 mtp30">'.$_SESSION['error_recaptcha'].'</div>';
                           unset($_SESSION['error_recaptcha']);
                       }
                       ?>



                       <button type="submit" class="btn btn-primary pull-right">Stwórz konto</button>
                       <div class="btn btn-link push-form pull-left nopadding">Mam już konto</div>

                   </form>
               </div>
           </div>
       </div>
    </div>
    <script src="js/less.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>