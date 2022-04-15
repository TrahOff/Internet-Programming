<?php
    session_start();
    require_once 'connect.php';

    $_SESSION['delete'] = 'Вы уверены?';

    $user_password = sha1($_POST['delete_password']);
    $user_name = $_SESSION['user']['user_name'];
    $old_avatar = $_SESSION['user']['user_avatar'];

    $check_name = mysqli_query($connection, "SELECT * FROM `users` 
    WHERE `user_name` = '$user_name'");

    $check_user = mysqli_query($connection, "SELECT * FROM `users` 
    WHERE `user_name` = '$user_name' AND `user_passwoed` = '$user_password'");

    if (mysqli_num_rows($check_name) > 0) {
        if (mysqli_num_rows($check_user) > 0) {
            $update = mysqli_query($connection, "DELETE FROM `users` WHERE `user_name` = '$user_name'  ");
            unlink($old_avatar);
            unset($_SESSION['user']);
            unset($_SESSION['delete']);
            header('location: ../../index.php');

        }
        else{
            $_SESSION['error'] = 'неверный пароль!';
            header('location: ../profile.php');

        }
    }
    else{
        $_SESSION['error'] = 'пользователь не найден!';
        //header('location: ../profile.php');
    }

    ?>
<pre>
    <?php
    print_r($_SESSION['error']);
    ?>
</pre>
