<?php 

session_start();
unset($_SESSION['Game']);
$_SESSION['end'] = 'Ваши результаты';
header('location: ../game.php');

?>