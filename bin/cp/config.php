<?php 
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'britaszk_test');
define('DBPASSWORD', 'oqeHwBWzZEW.');
define('DBNAME', 'britaszk_britsoc');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if($db === false) {
    die("Error: connection error. " . mysqli_connect_error());
}
?>