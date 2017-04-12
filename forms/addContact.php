<?php
/**
 * Created by PhpStorm.
 * User: Klaczek Kamil
 * Date: 06.04.2017
 * Time: 15:54
 */

    session_start();


    $validation = true;
    $user_id = $_SESSION['id'];
    $contact_firstname = $_POST['contact_firstname'];
    $contact_lastname = $_POST['contact_lastname'];


    if ($contact_firstname == false || (strlen($contact_firstname)) < 2) {
        $validation = false;
        $_SESSION['error_contact_firstname'] = "Uzupełnij pole, minimalna ilość znaków 3.";
    }

    function sanitize($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }

    $contact_email_1 = $_POST['contact_email_1'];
    $contact_email_2 = $_POST['contact_email_2'];
    $contact_email_3 = $_POST['contact_email_3'];
    $contact_phone_1 = $_POST['contact_phone_1'];
    $contact_phone_2 = $_POST['contact_phone_2'];
    $contact_phone_3 = $_POST['contact_phone_3'];

    if ($contact_email_1!=sanitize($contact_email_1)){
        $validation = false;
        $_SESSION['error_contact_email_1'] = "Niepoprawny pierwszy adres e-mail";
    }
    if ($contact_email_2!=sanitize($contact_email_2)){
        $validation = false;
        $_SESSION['error_contact_email_2'] = "Niepoprawny drugi adres e-mail";
    }
    if ($contact_email_3!=sanitize($contact_email_3)){
        $validation = false;
        $_SESSION['error_contact_email_2'] = "Niepoprawny pierwszy adres e-mail";
    }


    $image = $_FILES['contact_photo']['tmp_name'];
    if ((isset($image))) {
        if (getimagesize($image) == false){
            $_SESSION['error_contact_photo'] = "Niepoprawny typ pliku";
        }
        else{
            $image_array = getimagesize($image);
            $image_width = $image_array[0];
            $image_height = $image_array[1];
            if (($image_width > 1200) || ($image_height > 1200)){
                $_SESSION['error_contact_photo'] = "Za duży plik";
            }
            else {
                $image = addslashes($_FILES['contact_photo']['tmp_name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);
            }
        }
    }


    if ($validation == true){

        require_once "connect.php";

        $connection = @new mysqli($host, $db_user, $db_password, $db_name);

        if ($connection->connect_errno!=0){
            echo "Error". $connection->connect_errno;
            exit();
        }
        else {
            if ($connection->query("INSERT INTO contact VALUES (NULL, '$user_id', '$image', '$contact_firstname', '$contact_lastname' ,'$contact_email_1', '$contact_email_2', '$contact_email_3', '$contact_phone_1', '$contact_phone_2', '$contact_phone_3')")){
                $_SESSION['success_add']="Dodano kontakt";

            }
            else {
                echo "Error". $connection->connect_errno;
                exit();
            }
        }
    }

    header('Location: ../panel.php')
?>