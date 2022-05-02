<?php 

require_once 'game_bd.php';
session_start();
$_SESSION['Game'] = 'проверим ваши знания';

$_SESSION['ids'] = range(1, 10);
shuffle($_SESSION['ids']);
$_SESSION['i'] = 0;

for ($i = 0; $i < 10; $i++) {
    $id = $_SESSION['ids'][$i];
    $check_id = mysqli_query($connection_game,"SELECT * FROM `game` WHERE `sound_id` = '$id'");
    if (mysqli_num_rows($check_id) > 0) {
        $sound = mysqli_fetch_assoc($check_id);
        $_SESSION['play'][$i] = [
            "sound_id" => $sound['sound_id'],
            "sound_name" => $sound['sound_name'],
            "sound_write" => $sound['sound_write']
        ];
        print_r($_SESSION['play'][$i]);
        print_r("<br>");
    }
}

header('location: ../game.php');

?>