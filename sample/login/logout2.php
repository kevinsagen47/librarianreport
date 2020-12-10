<?php
session_start();
//unset($_SESSION["id"]);
unset($_SESSION["permission"]);
header("Location:list_index.php");
?>
