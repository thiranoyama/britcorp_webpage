<?php
session_start();

if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true) {
    header("location: /home/britaszk/public_html/welcome.php");
    exit;
}
?>