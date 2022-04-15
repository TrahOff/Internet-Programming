<?php

    session_start();
    require_once 'connect.php';
    $delete_id = $_GET['change_id'];

    $check_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `user_id` = '$delete_id'");
    $path = '../../imgs/avatars/unacceptable.jpg';
    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        unlink($user['user_avatar']);
        $update = mysqli_query($connection, "UPDATE `users` 
        SET `user_avatar` = '$path' WHERE `users`.`user_id` = '$delete_id'");
        header('location: ../profile.php');
    }
    else{
        header('location: ../profile.php');
    }
?>
