<?php
/**
 * Created by PhpStorm.
 * User: Kamil Klaczek
 * Date: 02.04.2017
 * Time: 21:26
 */
    session_start();


    session_unset();

    header ('Location: ../index.php');

?>