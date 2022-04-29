<?php 

session_start();
unset($_SESSION['end']);
header('location: ../game.php');

?>