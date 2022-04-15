<?php
    session_start();
    require_once 'connect.php';

    $_SESSION['avatar'] = 'Смена аватара';

    $user_name = $_SESSION['user']['user_name'];
    $user_password = sha1($_POST['user_password']);
    $user_avatar = $_SESSION['user']['user_avatar'];
    $new_avatar = '../../imgs/avatars/' . time() . $_FILES['user_avatar']['name'];
    $old_avatar = $_SESSION['user']['user_avatar'];

    $check_user = mysqli_query($connection, "SELECT * FROM `users` 
        WHERE `user_name` = '$user_name' AND `user_passwoed` = '$user_password'");

    $check_name = mysqli_query($connection, "SELECT * FROM `users` 
        WHERE `user_name` = '$user_name'");

    if (mysqli_num_rows($check_name) > 0){
        if (mysqli_num_rows($check_user) > 0) {
            if (move_uploaded_file($_FILES['user_avatar']['tmp_name'], $new_avatar)){
                unlink($old_avatar);
                $update = mysqli_query($connection, "UPDATE `users` 
                SET `user_avatar` = '$new_avatar' WHERE `users`.`user_name` = '$user_name'");
                $_SESSION['user']['user_avatar'] = $new_avatar;
                header('location: ../profile.php');
                unset($_SESSION['avatar']);
            } else {
                $_SESSION['error'] = 'Не удалось загрузить новый аватар!';
            }
        } else {
            $_SESSION['error'] = 'Неверный пароль!';
            header('location: ../profile.php');
        }
    } else {
        $_SESSION['error'] = 'Пользователь не найден!';
        header('location: ../profile.php');
    }