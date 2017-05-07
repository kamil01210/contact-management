<?php

	// show all php errors, warnings and notices
	error_reporting(E_ALL);

	// single database connection for entire page
    require_once "includes/connect.php";
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    if ($connection->connect_errno!=0)
        die("Error: " . $connection->connect_errno);
		
	$connection->set_charset("utf8");
	
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Title</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet/less" type="text/css" href="css/style.less" />
</head>
