<?php 

session_start();
require_once 'game_bd.php';
unset($_SESSION['Game']);
$_SESSION['end'] = 'Ваши результаты';

$_SESSION['correct'] = 0;
$_SESSION['wrong'] = 0;

for ($i = 0; $i < 10; $i++) {
    if ($_SESSION['word'][$i] == $_SESSION['play'][$i]['sound_write']) {
        $_SESSION['class'][$i] = 'true';
        $_SESSION['correct']++;
    } else {
        $_SESSION['class'][$i] = 'false';
        $_SESSION['wrong']++;
    }
}

header('location: ../game.php');

?>