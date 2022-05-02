<?php
    $connection_game = mysqli_connect('localhost', 'root', '', 'game');

    if (!$connection_game){
        die('connection error!');
    }
?>