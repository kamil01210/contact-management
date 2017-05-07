<?php
/**
 * Created by PhpStorm.
 * User: Klaczek Kamil
 * Date: 06.04.2017
 * Time: 15:54
 */
 
    session_start();


    $validation = true;
    $user_id = ($_SESSION['id']+0);
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
	
		$insert = $connection->query(
							"INSERT INTO `contact`(`id`, `id_user`, `contact_photo`, `contact_name`, `contact_lastname`, `contact_email_1`, `contact_email_2`,".
							"`contact_email_3`, `contact_phone_1`, `contact_phone_2`, `contact_phone_3`, `contact_profession`,".
							"`contact_address_line_1`, `contact_address_line_2`, `contact_address_line_3`)".
							"VALUES (null, '{$user_id}', '{$image}', '{$contact_firstname}', '{$contact_lastname}', '{$contact_email_1}', '{$contact_email_2}',".
							"'{$contact_email_3}', '{$contact_phone_1}', '{$contact_phone_2}', '{$contact_phone_3}', '{$contact_profession}',".
							"'{$contact_address_line_1}', '{$contact_address_line_2}', '{$contact_address_line_3}');"
						);
			
			
            if ($insert) {
                $_SESSION['success_add'] = "Dodano kontakt";
            } else {
                die("Error: " . $connection->error);
            }
    }

    header('Location: ../panel.php')
?>