<?php 
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'britaszk_britsoc_admin');
define('DBPASSWORD', 'b^W6DYWhcJD6g9C#%!Md');
define('DBNAME', 'britaszk_britsoc');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if($db === false) {
    die("Error: connection error. " . mysqli_connect_error());
}
?>