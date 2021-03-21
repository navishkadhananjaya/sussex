<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

unset($_SESSION['user_email']);

header('Location: index.php');
session_destroy();
?>
