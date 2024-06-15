<?php
session_start();
if (sesstion_destroy()) {
    header("Location: login.php");
    exit;
}
?>