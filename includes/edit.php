<?php
/**
 * Created by PhpStorm.
 * User: Kamil Klaczek
 * Date: 30.06.2017
 * Time: 20:00
 */
        if (isset($_GET["edit"]) ) {

            $user_id = $_GET["edit"];

            $result = $connection->query("SELECT * FROM contact WHERE id_user='" . ($user_id + 0) . "'");
        }

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();


            $avatar = "";
            if (!empty($row["contact_photo"]) && $row['contact_photo']!='Array')
                $_SESSION['avatar'] = "<img src=\"data:image/jpeg;base64,".($row["contact_photo"])."\"/>";

            $_SESSION['contact_name'] = $row["contact_name"];
            $_SESSION['contact_lastname'] = $row["contact_lastname"];
            $_SESSION['contact_phone_1'] = $row["contact_phone_1"];
            $_SESSION['contact_phone_2'] = $row["contact_phone_2"];
            $_SESSION['contact_phone_3'] = $row["contact_phone_3"];
            $_SESSION['contact_email_1'] = $row["contact_email_1"];
            $_SESSION['contact_email_2'] = $row["contact_email_2"];
            $_SESSION['contact_email_3'] = $row["contact_email_3"];
            $_SESSION['contact_profession'] = $row["contact_profession"];
            $_SESSION['contact_address_line_1'] = $row["contact_address_line_1"];
            $_SESSION['contact_address_line_2'] = $row["contact_address_line_2"];
            $_SESSION['contact_address_line_3'] = $row["contact_address_line_3"];
}
?>