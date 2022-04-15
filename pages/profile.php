<?php
session_start();
include "../pages/template/header.php";
require_once 'template/connect.php';
if(!$_SESSION['user']){
    header('location: login.php');
} else { ?>
        <link href="../style/login.css" type="text/css" rel="stylesheet">
<main>
    <h2>ПРОФИЛЬ</h2>
    <?php

    if(!$_SESSION['password'] && !$_SESSION['avatar'] && !$_SESSION['delete']) {
        unset($_SESSION['error']);
        if ($_SESSION['user']['user_name'] == 'TrahOff') {
    ?>
    <div class="profile">
        <div class="profile-avatar">
            <img alt="" src="<?= $_SESSION['user']['user_avatar'] ?>">
        </div>
        <form action="template/logout.php">
            <div class="profile-menu">
                <div class="profile-header">
                    <h1><?= $_SESSION['user']['user_name'] ?></h1>
                </div>
                <div class="profile-menu-elements">
                    <nav>
                        <ul>
                            <li><a href="template/change_password.php">сменить пароль</a></li>
                            <li><a href="template/change_avatar.php">сменить аватар</a></li>
                        </ul>
                    </nav>
                    <div class="profile-button">
                        <button type="submit" name="repeat">Выход</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="admin">
        <div class="admin_action">
            <h2>Мои приказы абсолютны</h2>
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">ID</div>
                    <div class="col col-2">имя</div>
                    <div class="col col-3">аватар</div>
                    <div class="col col-4">удалить</div>
                </li>
                <?php
                $result = mysqli_query($connection, "SELECT * FROM `users`");
                while(($user = mysqli_fetch_assoc($result)) != false) {
                    if ($user['user_name'] != 'TrahOff') {
                        ?>
                        <li class="table-row">
                            <div class="col col-1"><?=$user['user_id']?></div>
                            <div class="col col-2"><?=$user['user_name']?></div>
                            <div class="col col-3" data-label="Customer Name">
                                <a href="template/admin_change_user_avatar.php?change_id=<?=$user['user_id']?>">
                                    <img class="user_img" alt="" src="<?=$user['user_avatar']?>">
                                </a>
                            </div>
                            <div class="col col-4" data-label="Amount">
                                <a href="template/admin_delete_user.php?delete_id=<?=$user['user_id']?>">
                                    <img alt="" class="icons" src="../imgs/delete_close.png" title="Удалить">
                                </a>
                            </div>
                        </li>
                    <?php } } ?>
            </ul>
        </div>
    </div>
    <?php
        } else {
            if (!$_SESSION['other']) {?>
    <div class="profile">
        <div class="profile-avatar">
            <img alt="" src="<?= $_SESSION['user']['user_avatar'] ?>">
        </div>
        <form action="template/logout.php">
            <div class="profile-menu">
                <div class="profile-header">
                    <h1><?= $_SESSION['user']['user_name'] ?></h1>
                </div>
                <div class="profile-menu-elements">
                    <nav>
                        <ul>
                            <li><a href="template/change_password.php">сменить пароль</a></li>
                            <li><a href="template/change_avatar.php">сменить аватар</a></li>
                            <li><a href="template/other_users.php">другие пользователи</a></li>
                            <li><a href="template/delete_user.php">удалить профиль</a></li>
                        </ul>
                    </nav>
                    <div class="profile-button">
                        <button type="submit" name="repeat">Выход</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php } else { ?>
    <h2>Другие пользователи</h2>
    <div class="other_users">
        <div class="num_user">
            <form action="template/unset.php" class="other">
                <nav>
                    <?php
                    $result = mysqli_query($connection, "SELECT * FROM `users`");
                    while(($user = mysqli_fetch_assoc($result)) != false) {
                        if ($user['user_name'] != $_SESSION['user']['user_name']) {
                    ?>
                    <ul class="users-table">
                        <li class="user">
                            <div class="user_name"><?=$user['user_name']?></div>
                            <div class="user_avatar" data-label="Customer Name">
                                <img class="user_img" alt="" src="<?=$user['user_avatar']?>">
                            </div>
                        </li>
                    </ul>
                    <?php } } ?>
                </nav>
                <div class="user-button">
                    <button type="submit" name="repeat">Вернуться в свой профиль</button>
                </div>
            </form>
        </div>
    </div>
    <?php } } }
    if($_SESSION['password'] && !$_SESSION['avatar'] && !$_SESSION['delete']) {
        unset($_SESSION['error']);
    ?>
    <div class="enter">
        <div class="form">
            <div class="form-panel">
                <div class="form-header">
                    <h1><?php echo $_SESSION['password'] ?></h1>
                </div>
                <div class="form-content">
                    <form method="post" action="../pages/profile.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Введите имя пользователя</label>
                            <input type="text" id="username" name="user_name" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="old_password">Старый пароль</label>
                            <input type="password" id="username" name="old_password" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="new_password">Новый Пароль</label>
                            <input type="password" id="username" name="new_password" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="check_password">Повторите новый пароль</label>
                            <input type="password" id="username" name="check_new_password" required="required"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="repeat">Сменить пароль</button>
                        </div>
                        <div class="form-group">
                            <a href="template/unset.php">Вернуться в профиль</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    } if(!$_SESSION['password'] && $_SESSION['avatar'] && !$_SESSION['delete']){
        unset($_SESSION['error']);
    ?>
    <div class="enter">
        <div class="form">
            <div class="form-panel">
                <div class="form-header">
                    <h1><?php echo $_SESSION['avatar'] ?></h1>
                </div>
                <div class="form-content">
                    <form method="post" action="../pages/template/change_avatar.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="avatar">Новый аватар</label>
                            <input type="file" id="avatar" name="user_avatar" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Введите пароль</label>
                            <input type="password" id="password" name="user_password" required="required"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="repeat">Сменить аватар</button>
                        </div>
                        <div class="form-group">
                            <a href="template/unset.php">Вернуться в профиль</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } if(!$_SESSION['password'] && !$_SESSION['avatar'] && $_SESSION['delete']) {
        unset($_SESSION['error']);
    ?>
    <div class="enter">
        <div class="form">
            <div class="form-panel">
                <div class="form-header">
                    <h1><?php echo $_SESSION['delete'] ?></h1>
                </div>
                <div class="form-content">
                    <form method="post" action="../pages/template/delete_user.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="delete_password">Введите пароль</label>
                            <input type="password" id="delete_password" name="delete_password" required="required"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="repeat">Удалить профиль</button>
                        </div>
                        <div class="form-group">
                            <a href="template/unset.php">Вернуться в профиль</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } if ($_SESSION['error']) { ?>
    <div class="enter">
        <div class="form">
            <div class="form-panel">
                <div class="form-header">
                    <h1>Ошибка изменений</h1>
                </div>
                <div class="form-content">
                    <form method="post" action="../pages/profile.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label ><?php echo $_SESSION['error'] ?></label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="repeat">повторить попытку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } unset($_SESSION['password']); unset($_SESSION['avatar']); unset($_SESSION['delete']); ?>
</main>
<?php } ?>
<?php include "template/footer.php"?>