<?php
/**
 * Created by PhpStorm.
 * User: Klaczek Kamil
 * Date: 02.04.2017
 * Time: 22:50
 */
    session_start();

    $validation = true;

    //sprawdzamy poprawność loginu
    $registration_login = $_POST['registration_login'];

    if (strlen($registration_login)<5 || strlen($registration_login)>20) {
        $validation = false;
        $_SESSION['error_registration_login'] = "Login musi posiadać od 5 do 20 znaków";
    }
    if (ctype_alnum($registration_login)==false){
        $validation = false;
        $_SESSION['error_registration_login'] = "Login może składać się z cyfr i liter bez polskich znaków";
    }



    //email
    $registration_email = $_POST['registration_email'];
    $registration_email_sanitized = filter_var($registration_email, FILTER_SANITIZE_EMAIL);

    if (($registration_email!=$registration_email_sanitized) || (filter_var($registration_email_sanitized, FILTER_VALIDATE_EMAIL)==FALSE)){
        $validation = false;
        $_SESSION['error_registration_email'] = "Podaj poprawny adres e-mail";
    }


    //password
    $registration_password1 = $_POST['registration_password1'];
    $registration_password2 = $_POST['registration_password2'];

    if (strlen($registration_password1)<5 || strlen($registration_password1)>20) {
        $validation = false;
        $_SESSION['error_registration_password'] = "Hasło musi posiadać od 5 do 20 znaków";
    }
    if ($registration_password1 != $registration_password2) {
        $validation = false;
        $_SESSION['error_registration_password'] = "Hasła różne";
    }
    $registration_password_hash = password_hash($registration_password1, PASSWORD_DEFAULT);

    //checkbox
    $registration_regulations =$_POST['registration_regulations'];
    if (!isset($registration_regulations)){
        $validation = false;
        $_SESSION['error_registration_regulations'] = "Regulamin nie został zaakceptowany";
    }


    //reCAPTACH
    $secret_key = '6LfPRBsUAAAAAJGksJAqvW-Uwml83Sgs17CjbuR2';

    $recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
    //zmienna metoda get "?"
    //zmienna rechapta zostanie zwrócona w formacie json

    $recaptcha = json_decode($recaptcha);

    if (!($recaptcha->success)){
        $validation = false;
        $_SESSION['error_recaptcha'] = "Potwierdź, że nie jesteś botem";
    }

    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connection->connect_errno!=0){
        echo "Error". $connection->connect_errno;
        exit();
    }
    else {
        $result = @$connection->query("SELECT id FROM User WHERE email='$registration_email'");

        $how_many_emails = $result->num_rows;

        if ($how_many_emails > 0){
            $validation = false;
            $_SESSION['error_registration_email'] = "Adres e-mail już istenieje";
        }


        $result = @$connection->query("SELECT id FROM User WHERE login='$registration_login'");

        $how_many_logins = $result->num_rows;

        if ($how_many_logins > 0){
            $validation = false;
            $_SESSION['error_registration_login'] = "Podany login już istenieje";
        }


        if ($validation == true){
            //poprawna walidacja

            if ($connection->query("INSERT INTO user VALUES (NULL, '$registration_login', '$registration_password_hash', '$registration_email')")){
                $_SESSION['success_registration']="Rejestracja przebiegła pomyślnie zaloguj się";

            }
            else {
                echo "Error". $connection->connect_errno;
                exit();
            }
        }

        $connection->close();
    }



    header('Location: ../index.php')

?>