<?php
    session_start();
    require_once 'connect.php';

    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $check = $_POST['check'];

    if (empty($user_name)) {
        $_SESSION['massage'] = 'Введите имя пользователя!';
        header('location: ../logup.php');
    }

    $check_name = mysqli_query($connection, "SELECT * FROM `users` 
    WHERE `user_name` = '$user_name'");

    if (mysqli_num_rows($check_name) > 0) {
        $_SESSION['massage'] = 'имя пользователя уже занято!';
        header('location: ../logup.php');
    }
    if (empty($user_password)) {
        $_SESSION['massage'] = 'Введите пароль!';
        header('location: ../logup.php');
    }
    if (empty($check)) {
        $_SESSION['massage'] = 'Введите пароль повторно!';
        header('location: ../logup.php');
    }

    if (empty($user_name) && empty($user_password) && empty($check)) {
        $_SESSION['massage'] = 'Заполните форму!';
        header('location: ../logup.php');
    }
    else{
        if ($user_password != $check){
            $_SESSION['massage'] = 'пароли не совпадают!';
            header('location: ../logup.php');
        }
        else{
            $path = '../../imgs/avatars/' . time() . $_FILES['user_avatar']['name'];
            if (move_uploaded_file($_FILES['user_avatar']['tmp_name'], $path)){
                $user_password = sha1($user_password);
                mysqli_query($connection, "INSERT INTO `users` 
            (`user_id`, `user_name`, `user_passwoed`, `user_avatar`) 
            VALUES (NULL, '$user_name', '$user_password', '$path')");
                header('location: ../login.php');
            }
            else{
                $_SESSION['massage'] = 'не удалось загрузить аватар!';
            }
        }
    }

?>

