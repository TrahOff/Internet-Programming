<?php

    session_start();
    require_once 'connect.php';
    $delete_id = $_GET['delete_id'];

    $check_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `user_id` = '$delete_id'");

    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        $delete_avatar = $user['user_avatar'];
        unlink($delete_avatar);
        $deleted = mysqli_query($connection, "DELETE FROM `users` WHERE `user_id` = '$delete_id'");
        header('location: ../profile.php');
    }
    else{
        $_SESSION['error'] = 'Пользователь уже удалён!';
        header('location: ../profile.php');
    }

?>
