<?php 

session_start();

unset($_SESSION['end']);
unset($_SESSION['play']);
unset($_SESSION['word']);
unset($_SESSION['correct']);
unset($_SESSION['wrong']);

header('location: ../game.php');

?>