<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 29.04.2017
 * Time: 13:33
 */

        $user_id = $_SESSION['id'];

        if (isset($_GET["del"]) && !empty($_GET["del"])) {
            $del = $connection->query("DELETE FROM contact WHERE id_user='".($user_id + 0)."' AND id=".($_GET["del"]+0)." LIMIT 1");
            // LIMIT 1 - usuwanie tylko jednego
            if ($connection->affected_rows) {
                echo "<br/><br/>";
                echo "<p class='alert-success clearfix mbt30 mtp30'>Kontakt został usunięty</p>";
            }
        }

    $result = $connection->query("SELECT * FROM contact WHERE id_user='" . ($user_id + 0) . "'");

		echo "<br/><br/>";
		
        if ($result && $result->num_rows > 0) {
            // output data of each row
            // robię pętle do ostatniego wiersza i wszystkie echa i poprzypisywać do zmiennych

            echo <<<html
     <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Email(e)</th>
                <th>Telefon(y)</th>
                <th>Zawód</th>
                <th>Adres</th>
                <th>Kod pocztowy</th>
                <th>Miasto</th>
                <th></th>
            </tr>
        </thead>
       
html;

            $i=1;
            while ($row = $result->fetch_assoc()) {
				
				$phones = "{$row["contact_phone_1"]}";
				if ( !empty($row["contact_phone_2"]) )
					$phones .= "<br/>{$row["contact_phone_2"]}";
				if ( !empty($row["contact_phone_3"]) )
					$phones .= "<br/>{$row["contact_phone_3"]}";
				
				$emails = "{$row["contact_email_1"]}";
				if ( !empty($row["contact_email_2"]) )
					$emails .= "<br/>{$row["contact_email_2"]}";
				if ( !empty($row["contact_email_3"]) )
					$emails .= "<br/>{$row["contact_email_3"]}";

				$avatar = "";
				if (!empty($row["contact_photo"]) && $row['contact_photo']!='Array')
					$avatar = "<img src=\"data:image/jpeg;base64,".($row["contact_photo"])."\"/>";
				
                echo <<<html
        <tr>
            <td>{$i}</td>
            <td class="text-center photo">{$avatar}</td>
            <td>{$row["contact_name"]}</td>
            <td>{$row["contact_lastname"]}</td>
            <td>{$emails}</td>
            <td>{$phones}</td>
            <td>{$row["contact_profession"]}</td>
            <td>{$row["contact_address_line_1"]}</td>
            <td>{$row["contact_address_line_2"]}</td>
            <td>{$row["contact_address_line_3"]}</td>
            <td class="options">
				<a href="edit.php?edit={$row["id"]}" class=""><span class="glyphicon glyphicon-pencil primary-color" aria-hidden="true"></span></a>
				<a href="?del={$row["id"]}" onclick="return confirm('Czy na pewno chcesz usunąć?');"><span class="glyphicon glyphicon-remove red" aria-hidden="true"></span></a>
			</td>
        </tr>
html;
            $i++;
            }
            echo "</table>";
        } else {
            echo '<p class="alert-danger bg-dange">Nie ma jeszcze żadnych kontaktów</p>';
        }
