<?php 

session_start();
$_SESSION['Game'] = 'проверим ваши знания';
header('location: ../game.php');

?>