<?php
    session_start();
    require_once 'connect.php';

    $user_name = $_POST['user_name'];
    $user_password = sha1($_POST['user_password']);

    $check_user = mysqli_query($connection, "SELECT * FROM `users` 
    WHERE `user_name` = '$user_name' AND `user_passwoed` = '$user_password'");

    $check_name = mysqli_query($connection, "SELECT * FROM `users` 
    WHERE `user_name` = '$user_name'");

    if (mysqli_num_rows($check_name) > 0){
        if (mysqli_num_rows($check_user) > 0){
            $user = mysqli_fetch_assoc($check_user);

            $_SESSION['user'] = [
                "id" => $user['id'],
                "user_name" => $user['user_name'],
                "user_avatar" => $user['user_avatar'],
                "user_password" => $user['user_password']
            ];

            header('location: ../profile.php');
        }
        else{
            $_SESSION['massage'] = 'неверный пароль!';
            header('location: ../login.php');
        }
    }
    else{
        $_SESSION['massage'] = 'пользователь не существует!';
        header('location: ../login.php');
    }

?>

<pre>
    <?php
    print_r($_SESSION['user']);
    ?>
</pre>