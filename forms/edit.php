<?php
/**
 * Created by PhpStorm.
 * User: Klaczek Kamil
 * Date: 30.05.2017
 * Time: 15:54
 */
 
    session_start();


    $validation = true;
    $photo_validation = false;
    $user_id = ($_SESSION['id']+0);
    $edit_user_id = htmlspecialchars($_POST['edit_user_id']);
    $contact_firstname = htmlspecialchars($_POST['contact_firstname']);
    $contact_lastname = htmlspecialchars($_POST['contact_lastname']);


    if ($contact_firstname == false || (strlen($contact_firstname)) < 2) {
        $validation = false;
        $_SESSION['error_contact_firstname'] = "Uzupełnij pole, minimalna ilość znaków 3.";
    }

    function sanitize($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }

    $contact_email_1 = htmlspecialchars($_POST['contact_email_1']);
    $contact_email_2 = htmlspecialchars($_POST['contact_email_2']);
    $contact_email_3 = htmlspecialchars($_POST['contact_email_3']);
    $contact_phone_1 = htmlspecialchars($_POST['contact_phone_1']);
    $contact_phone_2 = htmlspecialchars($_POST['contact_phone_2']);
    $contact_phone_3 = htmlspecialchars($_POST['contact_phone_3']);
    $contact_profession = htmlspecialchars($_POST['contact_profession']);
    $contact_address_line_1 = htmlspecialchars($_POST['contact_address_line_1']);
    $contact_address_line_2 = htmlspecialchars($_POST['contact_address_line_2']);
    $contact_address_line_3 = htmlspecialchars($_POST['contact_address_line_3']);


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


    $image = $_FILES['contact_photo'];
    if ((isset($image) && !empty($image) && !empty($image['tmp_name']))) {
        if (getimagesize($image['tmp_name']) == false){
            $_SESSION['error_contact_photo'] = "Niepoprawny typ pliku";
        }
        else{
            $image_array = getimagesize($image['tmp_name']);
            $image_width = $image_array[0];
            $image_height = $image_array[1];
            if (($image_width > 1200) || ($image_height > 1200)){
                $_SESSION['error_contact_photo'] = "Za duży plik";
            }
            else {
                $image = base64_encode( file_get_contents( $_FILES['contact_photo']['tmp_name'] ) );
                $photo_validation = true;
            }
        }
    }

    $contact_profession = $_POST['contact_profession'];
    $contact_address_line_1 = $_POST['contact_address_line_1'];
    $contact_address_line_2 = $_POST['contact_address_line_2'];
    $contact_address_line_3 = $_POST['contact_address_line_3'];




    if ($validation == true){

		require_once "../includes/connect.php";
		$connection = new mysqli($host, $db_user, $db_password, $db_name);
		if ($connection->connect_errno!=0)
			die("Error: " . $connection->error);
		
		$connection->set_charset("utf8");
		if ($photo_validation == true)
            $insert = $connection->query("UPDATE contact SET contact_photo='$image', contact_name='$contact_firstname', contact_lastname='$contact_lastname', contact_email_1='$contact_email_1', contact_email_2='$contact_email_2', contact_email_3='$contact_email_3', contact_phone_1='$contact_phone_1', contact_phone_2='$contact_phone_2', contact_phone_3='$contact_phone_3', contact_profession='contact_profession', contact_address_line_1='$contact_address_line_1', contact_address_line_2='$contact_address_line_2', contact_address_line_3='$contact_address_line_3'   WHERE id_user='".($user_id + 0)."' AND id='".($edit_user_id + 0)."'");
		else
            $insert = $connection->query("UPDATE contact SET contact_name='$contact_firstname', contact_lastname='$contact_lastname', contact_email_1='$contact_email_1', contact_email_2='$contact_email_2', contact_email_3='$contact_email_3', contact_phone_1='$contact_phone_1', contact_phone_2='$contact_phone_2', contact_phone_3='$contact_phone_3', contact_profession='contact_profession', contact_address_line_1='$contact_address_line_1', contact_address_line_2='$contact_address_line_2', contact_address_line_3='$contact_address_line_3'   WHERE id_user='".($user_id + 0)."' AND id='".($edit_user_id + 0)."'");



            if ($insert) {
                $_SESSION['success_edit'] = "Edytowano kontakt";
            } else {
                die("Error: " . $connection->error);
            }
    }

    header('Location: ../panel.php')
?>