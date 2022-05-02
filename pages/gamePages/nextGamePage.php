<?php 

require_once 'game_bd.php';
session_start();

$_SESSION['word'][$_SESSION['i']] = $_POST['word'];

$_SESSION['i']++;

if ($_SESSION['i'] == 9) {
    header('location: ../gamePages/EndGame.php');  
}

header('location: ../game.php');

?>