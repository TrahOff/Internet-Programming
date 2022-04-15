<?php
    session_start();
    require_once 'connect.php';

    $_SESSION['password'] = 'Смена пароля';

    $user_name = $_SESSION['user']['user_name'];
    $user_password = sha1($_POST['old_password']);
    $new_password = sha1($_POST['new_password']);
    $check_new_password = sha1($_POST['check_new_password']);

    $check_user = mysqli_query($connection, "SELECT * FROM `users` 
    WHERE `user_name` = '$user_name' AND `user_passwoed` = '$user_password'");

     $check_name = mysqli_query($connection, "SELECT * FROM `users` 
    WHERE `user_name` = '$user_name'");

    if ($new_password == $check_new_password) {
        if (mysqli_num_rows($check_name) > 0) {
            if (mysqli_num_rows($check_user) > 0) {
                header('location: ../profile.php');
                unset($_SESSION['password']);
                $user = mysqli_fetch_assoc($check_user);
                $update = mysqli_query($connection, "UPDATE `users` SET `user_passwoed` = '$new_password' 
            WHERE `users`.`user_name` = '$user_name'");
            }
            else{
                $_SESSION['error'] = 'неверный пароль!';
                header('location: ../profile.php');

            }
        }
        else{
            $_SESSION['error'] = 'пользователь не найден!';
            header('location: ../profile.php');

        }
    }
    else{
        $_SESSION['error'] = 'пароли не совпадают!';
        header('location: ../profile.php');
    }
?>

<pre>
    <?php
    print_r($_SESSION['error']);
    ?>
</pre>
