<?php session_start();
unset($_SESSION["s_id"]);
unset($_SESSION["s_username"]);
unset($_SESSION["s_image"]);
session_destroy();
header("location:index.php");
?>