<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1234');
define('DB_DATABASE', 'volunteer_db');
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die(mysqli_error($connection));
?>
